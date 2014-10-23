<?php
/**
* SuperiorAlumnosCarreraAño
* Migra el cuadro de Alumnos por carrera y año de estudio del cuadernillo verde bs as
*/
abstract class MigracionSuperiorAlumnosCarreraAnio extends MigracionBase {

    const C_GRADO_OFERTA_ALUMNO_SNU_X_SEXO_Y_GRADO = 18;
    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){
        
        foreach($objCuadro->GetFilas() as $objFila){
            if($objFila->IsIncomplete())break;
           // $objPlanDictado = self::GetPlanDictado($objFila);
            $intIdLocalizacion = $objFila->Cuadro->Localizacion->IdLocalizacion;
            $intNroOrden = $objFila->GetCeldaByIdColumna(165)->Valor;
            $intIdCuadroPlanes = 257;
            $objPlanDictado = MigracionPlanes::GetPlanDictadoByIdDefinicionCuadroIdLocalizacionNroOrden($intIdCuadroPlanes, $intIdLocalizacion, $intNroOrden);        
        
                        
            foreach($objFila->GetCeldas() as $objCelda){
                $objColumna = $objCelda->Columna;
                if($objColumna->TablaTipo != 'grado_oferta_tipo') continue;
                $objSeccion = MigracionMatriculaBase::GetSeccion($objCuadro->Localizacion->IdLocalizacion,$objCuadro->GetCModalidad1(),-1,-1,"",-1);
                $objOLTPAlumno = MigracionBase::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objColumna->CodigoRelacional, self::C_GRADO_OFERTA_ALUMNO_SNU_X_SEXO_Y_GRADO);
                if(strpos($objColumna->Nombre,"Total")!==false){
                    $objOLTPAlumno->Total = $objCelda->Valor;
                    if(!$objOLTPAlumno->Varones) $objOLTPAlumno->Varones = 0;
                }else{
                    $objOLTPAlumno->Varones = $objCelda->Valor;
                    if(!$objOLTPAlumno->Total) $objOLTPAlumno->Total = 0;
                }
                $objOLTPAlumno->Save();
            }

        }
    }

    public static function GetPlanDictado($objFila){
        $strDescripcion = $objFila->GetCeldaByIdColumna(374)->Valor;

        if (preg_match('/([0-9]+)\s([\w\s]+)/', $strDescripcion, $arrMatches)) {
            $strDescripcion = substr($strDescripcion, strlen($arrMatches[1])+1, strlen($strDescripcion));
        }
        $strDescripcion = trim($strDescripcion);

        $objPlanDictado = OLTPPlanDictado::QuerySingle(QQ::AndCondition(
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdTituloOfertaObject->IdTituloObject->Descripcion,$strDescripcion),
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->IdLocalizacion,$objFila->Cuadro->Localizacion->IdLocalizacion),
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->COferta,115)
                                ));
        if(!$objPlanDictado) throw new MigrationException("no se encuentra el plan dictado con titulo $strDescripcion", $objFila->Cuadro);

        return $objPlanDictado;
    }

}
?>
