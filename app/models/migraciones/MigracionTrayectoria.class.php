<?php

/**
 * Trayectoria
 * Migra el cuadro de Trayectoria

 */
abstract class MigracionTrayectoria extends MigracionMatriculaBase {

    public static function Ejecutar(CuadroBase $objCuadro) {

        $idColumasDeVarones = array(106, 108, 110, 112, 114, 116, 118, 120, 122, 124, 126);
        $idColumasDeTotal = array(105, 107, 109, 111, 113, 115, 117, 119, 121, 123, 125);

        foreach ($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsEmpty()) continue;
            if(in_array($objCuadro->IdDefinicionCuadro, array(221, 628))) {
                $intCGrado = $objFila->CodigoRelacional;
            } elseif($objCuadro->IdDefinicionCuadro == 629) {
                $intCGrado = 20;
            } else {
                $arrIdsColumnas = $objFila->Cuadro->GetColumnasIds();
                $valoranio = $objFila->GetCeldaByIdColumna(array_pop_unref(array_intersect($arrIdsColumnas,array(1,89,166,171,398))))->Valor;
                $intCGrado = CodigoValor::GetCodigoRelacional($valoranio);
                if($intCGrado == -2) {
                    LogHelper::Debug("intCGradoAnio {$intCGrado} valoranio {$valoranio}");
                    continue; // puede ser fila con año vacio no se migra
                }
            }
            $objPlanDictado = self::GetPlanDictado($objFila);
            $objGradoOferta = OLTPGradoOfertaTipo::LoadByCGradoCOferta($intCGrado, $objPlanDictado->IdOfertaLocalObject->COferta);
            if (!$objGradoOferta) {
                $objGrado = OLTPGradoTipo::Load($intCGrado);
                throw new MigrationException (sprintf('La Oferta %s no tiene el Grado %s (Fila %d)',
                $objPlanDictado->IdOfertaLocalObject->COfertaObject->Descripcion, $objGrado->Descripcion, $objFila->IdFila),
                $objCuadro);
            }

            $objTrayectoriaTipo = null;
            $objTrayectoria = null;            
            $intNroOrden =  (in_array(165,$objCuadro->GetColumnasIds()) ?  $objFila->GetCeldaByIdColumna(165)->Valor : 0);


            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if(!in_array($objColumna->IdDefinicionColumna, $idColumasDeVarones)
                        && !in_array($objColumna->IdDefinicionColumna, $idColumasDeTotal)) continue; // nivel y otras
                $objTrayectoriaTipoNew = OLTPTrayectoriaTipo::Load($objColumna->CodigoRelacional);
                if($objTrayectoriaTipoNew != $objTrayectoriaTipo) {
                    $objTrayectoriaTipo = $objTrayectoriaTipoNew;
                    $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOferta, $objTrayectoriaTipo);
                }
                if (in_array($objColumna->IdDefinicionColumna, $idColumasDeVarones)) {
                    $objCelda = $objFila->GetCelda($objColumna);
                    if($objCelda->Valor == '') continue;
                    $objTrayectoria->Varones += $objCelda->Valor;//Acumula solo para Provincia de BsAs que lo tiene cargado asi(#2474).
                } elseif (in_array($objColumna->IdDefinicionColumna, $idColumasDeTotal)) {
                    $objCelda = $objFila->GetCelda($objColumna);
                    if($objCelda->Valor == '') continue;
                    $objTrayectoria->Total += $objCelda->Valor;//Acumula solo para Provincia de BsAs que lo tiene cargado así(#2474).

                }

                //QApplication::DisplayAlert($objTrayectoria->CTrayectoria);
                if((!is_null($objTrayectoria->Varones)) && (!is_null($objTrayectoria->Total))) {

                    // para la migración de trayectoria en córdoba hay que corregir el dato de otros promovidos
                    if (__COD_PROV__ == '14' && $objTrayectoria->CTrayectoria == 11 && $intNroOrden) {
                        // averiguo si estoy en el último año de estudios para descontarle Egresados Fines
                        $intIdCuadroPlanes = $objCuadro->IdCuadro == 167 ? 157 : 430;
                        $objPlanDictado = MigracionPlanes::$arrLocCuadroNroOrdenPlanDictado[$objCuadro->Localizacion->IdLocalizacion][$intIdCuadroPlanes][$intNroOrden];
                        $arrMapUltimoAnioAnioEstudio = array(1=>6, 2=>7, 3=>8, 4=>9, 5=>10, 6=>11, 7=>12);

                        if($intCGrado == $arrMapUltimoAnioAnioEstudio[$objPlanDictado->IdPlanEstudioLocalObject->Duracion]) {
                            $objDAOEgresados = new CuadroDAO();
                            $intIdCuadroEgresados = $objCuadro->IdCuadro == 167 ? 168 : 458;
                            $objDAOEgresados->LoadCuadro($intIdCuadroEgresados, $objCuadro->Localizacion);
                            $objCuadroEgresados = $objDAOEgresados->Cuadro;
                            foreach($objCuadroEgresados->GetFilas() as $objFilaEgresados ) {
                                if($objFilaEgresados->GetCeldaByIdColumna(165)->Valor == $intNroOrden) {
                                    $objTrayectoria->Total -= (int) $objFilaEgresados->GetCeldaByIdColumna(218)->Valor;
                                    $objTrayectoria->Varones -= (int) $objFilaEgresados->GetCeldaByIdColumna(219)->Valor;
                                }
                            }
                        }
                    }
                    $objTrayectoria->Save();
                }
            }
        }
    }



    public static function GetTrayectoria($objPlanDictado, $objGradoOferta, $objTrayectoriaTipo) {
        $objTrayectoria = OLTPTrayectoria::LoadByIdPlanDictadoCGradoOfertaCTrayectoria($objPlanDictado->IdPlanDictado, $objGradoOferta->CGradoOferta, $objTrayectoriaTipo->CTrayectoria);
        if(!$objTrayectoria) {
            $objTrayectoria = new OLTPTrayectoria();
            $objTrayectoria->IdPlanDictado = $objPlanDictado->IdPlanDictado;
            $objTrayectoria->CGradoOferta = $objGradoOferta->CGradoOferta;
            $objTrayectoria->CTrayectoria = $objTrayectoriaTipo->CTrayectoria;
        }
        return $objTrayectoria;
    }



}

?>
