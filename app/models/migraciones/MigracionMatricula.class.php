<?php

/**
 * Matricula
 * Migra matrícula de inicial y primario de común y adultos
 */
abstract class MigracionMatricula extends MigracionMatriculaBase {

    /**
     *
     * @param CuadroBase $objCuadro 
     * @return boolean
     */
    public static function Ejecutar(CuadroBase $objCuadro) {


        $objLocalizacion = $objCuadro->objLocalizacion;
        $arrIdsColumnas = $objCuadro->GetColumnasIds();

        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->IsEmpty()) continue;

            if ($objCuadro->GetCModalidad1() != OLTPModalidad1Tipo::ESPECIAL and !in_array($objCuadro->IdDefinicionCuadro,array(518, 287, 298,258, 259,262,256))) {
                $objCelGrado = $objFila->GetCeldaByIdColumna(array_pop_unref(array_intersect($arrIdsColumnas, array(1, 89, 166, 398))));
                $objCelTipoSeccion = $objFila->GetCeldaByIdColumna(array_pop_unref(array_intersect($arrIdsColumnas, array(4, 174))));
                $objCelTurno = $objFila->GetCeldaByIdColumna(2);
                $objCelJornada = in_array(251, $arrIdsColumnas) ? $objFila->GetCeldaByIdColumna(251) : null;
                $objCelNombre = $objFila->GetCeldaByIdColumna(array_pop_unref(array_intersect($arrIdsColumnas, array(3, 173, 90))));

                // si falta una de las pk corto el proceso.... FIXME
                if (!($objCelTurno->Valor !== '' && $objCelNombre->Valor !== '' && $objCelTipoSeccion->Valor !== ''))
                    throw new MigrationException(sprintf('Faltan datos de sección. IdFila %d ', $objFila->IdFila),$objCuadro);
            } 
            else switch ($objCuadro->IdDefinicionCuadro) {
                case 518:
                    $objCelNombre = $objFila->GetCeldaByIdColumna(487);
                    break;
                case 256:
                case 258:
                case 259:
                case 262:
                case 298:
                    $intIdCelGrado = array_pop_unref(array_intersect($arrIdsColumnas, array(391,171)));
                    $objCelGrado = ($intIdCelGrado) ? $objFila->GetCeldaByIdColumna($intIdCelGrado) : null;
                    $objCelTurno = $objFila->GetCeldaByIdColumna(2);
                    if(!in_array(90, $arrIdsColumnas))
                        $strSeccNombre = (string)$objFila->IdDefinicionFila;
                    else
                        $strSeccNombre = $objFila->GetCeldaByIdColumna(90)->Valor;
                    break;
                case 523:
                    $objCelGrado = $objFila->GetCeldaByIdColumna(166);
                    break;
 
            }
            $objCelTotal = $objFila->GetCeldaByIdColumna(5);
            $objCelVarones = $objFila->GetCeldaByIdColumna(7);
            if (in_array(127, $arrIdsColumnas)) {
                $objCelTotalRepitientes = $objFila->GetCeldaByIdColumna(127);
                $objCelVaronesRepitientes = $objFila->GetCeldaByIdColumna(128);
            }
            if (in_array(252, $arrIdsColumnas)) {
                $objCelTotalReinscriptos = $objFila->GetCeldaByIdColumna(252);
                $objCelVaronesReinscriptos = $objFila->GetCeldaByIdColumna(253);
            }            
            $objPlanDictado = self::GetPlanDictado($objFila, true);
           
            // Determino el grado
            switch ($objFila->TablaTipo) {
                // Si el grado está en las filas (especial)
                case 'grado_tipo':
                    $intCGrado = $objFila->CodigoRelacional;
                    break;
                case 'oferta_agregada_tipo'://caso de Organización Modular - Especial
                    if ($objFila->IdFila == 548) {
                        $intCGrado = 20; 
                        break;
                    }
                // Si el grado está en un CodigoValor o si no corresponde
                default:
                    if (isset($objCelGrado)) {
                        $intCGrado = CodigoValor::GetCodigoRelacional($objCelGrado->Valor);
                        break;
                    }
                    // Si llegó acá es porque el grado es "No Corresponde"
                    $intCGrado = -1;
            }

            
            // obtengo la sección

            //$IdLocalizacion, $intCModalidad1, $intCTurno, $intCJornada, $strNombre, $intCTipoSeccion
            $intCTurno = isset($objCelTurno) ? CodigoValor::GetCodigoRelacional($objCelTurno->Valor) : -1;
            $intCJornada = isset($objCelJornada) ? CodigoValor::GetCodigoRelacional($objCelJornada->Valor) : -1;
            $strNombre = isset($objCelNombre) ? $objCelNombre->Valor : ( isset($strSeccNombre) ? $strSeccNombre : '' );
            // TODO: analizar si la sección es multinivel y cambiarle el código
            $intCTipoSeccion = isset($objCelTipoSeccion) ? CodigoValor::GetCodigoRelacional($objCelTipoSeccion->Valor) : -1;
            
            $objSeccion = self::GetSeccion($objLocalizacion->IdLocalizacion, $objFila->Cuadro->GetCModalidad1(), 
                                           $intCTurno, $intCJornada, $strNombre, $intCTipoSeccion);
            
            $objGradoOferta = OLTPGradoOfertaTipo::LoadByCGradoCOferta($intCGrado, $objPlanDictado->IdOfertaLocalObject->COferta);
            if (!$objGradoOferta) {
                $objGrado = OLTPGradoTipo::Load($intCGrado);
                throw new MigrationException (sprintf('La Oferta %s no tiene el Grado %s (Fila %d)', 
                    $objPlanDictado->IdOfertaLocalObject->COfertaObject->Descripcion, $objGrado->Descripcion, $objFila->IdFila),
                $objCuadro);
            }

            // Alumnos
            $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta);
            $objAlumnos->Total = $objCelTotal->Valor;
            $objAlumnos->Varones = $objCelVarones->Valor;
            LogHelper::Debug(sprintf('Guardando Alumnos :: Nivel: %s | Seccion(%d): %s | Grado: %s | Total: %d | Varones: %d', $objPlanDictado->IdTituloOfertaObject->IdTituloObject->Descripcion, $objSeccion->IdSeccion, $objSeccion->Nombre, $objGradoOferta->CGradoObject->Descripcion, $objCelTotal->Valor, $objCelVarones->Valor));
            $objAlumnos->Save();

            //Repitientes
            if (in_array(127, $arrIdsColumnas)) {
                $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 2);
                $objAlumnos->Total = $objCelTotalRepitientes->Valor;
                $objAlumnos->Varones = $objCelVaronesRepitientes->Valor;
                $objAlumnos->CAlumno = 2;
                $objAlumnos->Save();
            }
            //Reinscriptos
            if (in_array(252, $arrIdsColumnas)) {
                $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 3);
                $objAlumnos->Total = $objCelTotalReinscriptos->Valor;
                $objAlumnos->Varones = $objCelVaronesReinscriptos->Valor;
                $objAlumnos->CAlumno = 3;
                $objAlumnos->Save();
            }
            //Ingresantes 1° anio
            if (in_array(365, $arrIdsColumnas)) {
                $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 2);
                $objAlumnos->Total = $objFila->GetCeldaByIdColumna(365)->Valor;
                $objAlumnos->Varones = $objFila->GetCeldaByIdColumna(366)->Valor;
                $objAlumnos->CAlumno = 4;
                $objAlumnos->Save();
            }
           //Residencia / Pasantia / Práctic / Práctica
            if (in_array(370, $arrIdsColumnas)) {
                $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 2);
                $objAlumnos->Total = $objFila->GetCeldaByIdColumna(370)->Valor;
                $objAlumnos->Varones = $objFila->GetCeldaByIdColumna(373)->Valor;
                $objAlumnos->CAlumno = 5;
                $objAlumnos->Save();
            }
           // Edad
            foreach ($objFila->Cuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != 'edad_tipo')
                    continue;
                $objCelEdad = $objFila->GetCelda($objColumna);
                if ($objCelEdad->Valor) {
                    $objEdad = self::GetEdad($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, $objColumna->CodigoRelacional);
                    $objEdad->Total = $objCelEdad->Valor;
                    LogHelper::Debug(sprintf('Guardando Edad :: Nivel: %s | Seccion: %s | Grado: %s | Edad: %s | Valor: %d', $objPlanDictado->IdTituloOfertaObject->IdTituloObject->Descripcion, $objSeccion->Nombre, $objGradoOferta->CGradoObject->Descripcion, $objColumna->CodigoRelacional, $objCelEdad->Valor));
                    $objEdad->Save();
                }
            }
        }
    }

    public static function GetOfertaAgregadaTipoInicial($intCodSala) {
        switch ($intCodSala) {
            case 20:
            case 21:
            case 22:
                return 800; // Común - Jardin Maternal
            case 23:
            case 24:
            case 25:
                return 300; // Común - Jardin Infantes
            default:
                throw new MigrationException("No se pudo encontrar oferta para el CodigoValor " . $intCodSala);
        }
    }

}

?>
