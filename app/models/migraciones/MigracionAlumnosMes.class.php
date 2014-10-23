<?php
/**
* AlumnosMes
* Migra los cuadro de Alumnos Mes del blanco y amarillo
*/
abstract class MigracionAlumnosMes extends MigracionBase{
    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){

        $intCGrado = -1;
        $intCLugarAtencion = -1;

        foreach($objCuadro->GetFilas() as $objFila){
            if($objFila->IsIncomplete()) continue;
            // Para el cuadro 1 del cuadernillo blanco indicamos el año de estudio y el lugar de atención
            if($objCuadro->IdDefinicionCuadro == 576){
                $intCGrado = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(166)->Valor);
                $intCLugarAtencion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(542)->Valor);
            }

            $objPlanDictado = self::GetPlanDictado($objFila);
            foreach($objFila->GetCeldas() as $objCelda){
                if($objCelda->Columna->TablaTipo != 'mes_tipo') continue;
                $intCMes = $objCelda->Columna->CodigoRelacional;
                $objAlumnosMes = self::GetOLTPAlumnosMes($objPlanDictado, $intCMes, $intCGrado, $intCLugarAtencion);
                if(strpos($objCelda->Columna->Nombre,'Total')===false){
                    $objAlumnosMes->Varones += $objCelda->Valor;
                    if(is_null($objAlumnosMes->Total))$objAlumnosMes->Total = 0;
                }else{
                    $objAlumnosMes->Total += $objCelda->Valor;
                    if(is_null($objAlumnosMes->Varones))$objAlumnosMes->Varones = 0;
                }
                $objAlumnosMes->Save();
            }
        }
    }

    public static function GetOLTPAlumnosMes($objPlanDictado, $intCMes, $intCGrado,$intCLugarAtencion){
        $objAlumnosMes = OLTPAlumnosMes::LoadByIdPlanDictadoCMesCGradoCLugarAtencion($objPlanDictado->IdPlanDictado, $intCMes, $intCGrado, $intCLugarAtencion);
        if(!$objAlumnosMes){
            $objAlumnosMes = new OLTPAlumnosMes();
            $objAlumnosMes->CMes = $intCMes;
            $objAlumnosMes->IdPlanDictado = $objPlanDictado->IdPlanDictado;
            $objAlumnosMes->CGrado = $intCGrado;
            $objAlumnosMes->CLugarAtencion = $intCLugarAtencion;
        }
        return $objAlumnosMes;

    }


    public static function GetPlanDictado($objFila){
        if($objFila->Cuadro->IdDefinicionCuadro ==576){
            $intCmodalidad1 = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(540)->Valor);
            $intCNivel = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(55)->Valor);
            //Definir la Oferta
            //Cn In   152 ->c_oferta
            //Cn Prim 153
            //Cn Sec  154
            //Es In   155
            //Es Prim 156
            //Es Sec  157
            //Ad Prim 158
            //Ad Sec  159
            $objOfertaLocal = null;
            if($intCmodalidad1 == OLTPModalidad1Tipo::COMUN && in_array($intCNivel,array(3200))){//Cn In
                $intCOferta=152;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::COMUN && in_array($intCNivel,array(1100,2500))){//Cn Prim
                $intCOferta=153;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::COMUN && in_array($intCNivel,array(3100))){//Cn Sec
                $intCOferta=154;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::ESPECIAL && in_array($intCNivel,array(3200))){//Es In
                $intCOferta=155;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::ESPECIAL && in_array($intCNivel,array(1100,2500))){//Es Prim
                $intCOferta=156;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::ESPECIAL && in_array($intCNivel,array(3100))){//Es Sec
                $intCOferta=157;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::ADULTOS && in_array($intCNivel,array(1100,2500))){//Ad Prim
                $intCOferta=158;
            }elseif($intCmodalidad1 == OLTPModalidad1Tipo::ADULTOS && in_array($intCNivel,array(3100))){//Ad Sec
                $intCOferta=159;
            }
            $objOfertaLocal = OLTPOfertaLocal::LoadByIdLocalizacionCOferta($objFila->Cuadro->Localizacion->IdLocalizacion,$intCOferta);
            if(!$objOfertaLocal) {
                $objOfertaTipo = OLTPOfertaTipo::Load($intCOferta);
                throw new MigrationException(sprintf("No Existe la Oferta %s en la fila %d",$objOfertaTipo->Descripcion,$objFila->IdDefinicionFila),$objFila->cuadro);
            }
            $objPlanDictadoArray = OLTPPlanDictado::LoadArrayByIdOfertaLocal($objOfertaLocal->IdOfertaLocal);
            if($objPlanDictadoArray)
                return array_shift($objPlanDictadoArray);
            else
                return MigracionMatriculaBase::CrearPlanDictado($objOfertaLocal);

        }elseif($objFila->Cuadro->IdDefinicionCuadro == 289){
            return MigracionMatriculaBase::GetPlanDictado($objFila);
        }
    }

}
?>
