<?php
/**
* SuperiorSeccionAnio
* Migra el cuadro de secciones por carrera y año de estudio del cuadernillo verde bs as
*/
abstract class MigracionSuperiorSeccionAnio extends MigracionBase {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){

    
          foreach($objCuadro->GetFilas() as $objFila){
            if($objFila->IsIncomplete())break;
            $intIdLocalizacion = $objFila->Cuadro->Localizacion->IdLocalizacion;
            $intNroOrden = $objFila->GetCeldaByIdColumna(165)->Valor;
           // $objPlanDictado = self::GetPlanDictado($objFila);
            $intIdCuadroPlanes = 257;
            $objPlanDictado = MigracionPlanes::GetPlanDictadoByIdDefinicionCuadroIdLocalizacionNroOrden($intIdCuadroPlanes, $intIdLocalizacion, $intNroOrden);        
            $intTipoCarrera = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(291)->Valor);
            foreach($objFila->GetCeldas() as $objCelda){
                $objColumna = $objCelda->Columna;
               
                if($objColumna->TablaTipo != 'grado_oferta_tipo') continue;
                $objOLTPSecciones = self::GetSecciones($objPlanDictado->IdPlanDictado, $objColumna->CodigoRelacional);
                $objOLTPSecciones->Total = $objCelda->Valor;
                $objOLTPSecciones->Save();
            }

        }

    }

    public static function GetSecciones($intIdPlanDictado, $intCGradoOferta){
        $objOLTPSecciones = OLTPSecciones::LoadByIdPlanDictadoCGradoOferta($intIdPlanDictado,$intCGradoOferta);
        if(!$objOLTPSecciones){
            $objOLTPSecciones = new OLTPSecciones();
            $objOLTPSecciones->IdPlanDictado = $intIdPlanDictado;
            $objOLTPSecciones->CGradoOferta = $intCGradoOferta;
        }
        return $objOLTPSecciones;
    }
    public static function GetPlanDictado($objFila){
        $strDescripcion = $objFila->GetCeldaByIdColumna(374)->Valor;

        if (preg_match('/([0-9]+)\s([\w\s]+)/', $strDescripcion, $arrMatches)) {
            $strDescripcion = substr($strDescripcion, strlen($arrMatches[1])+1, strlen($strDescripcion));
        }
        $strDescripcion = trim($strDescripcion);
        $intTipoCarrera = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(291)->Valor);

        $objPlanDictado = OLTPPlanDictado::QuerySingle(QQ::AndCondition(
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdTituloOfertaObject->IdTituloObject->Descripcion,$strDescripcion),
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdPlanEstudioLocalObject->OLTPPlanEstudioLocalSuperior->CTipoCarrera,$intTipoCarrera),
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->IdLocalizacion,$objFila->Cuadro->Localizacion->IdLocalizacion),
                                    QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->COferta,115)
                                ));
        if(!$objPlanDictado) throw new MigrationException("no se encuentra el plan dictado con titulo $strDescripcion con el tipo carrera $intTipoCarrera", $objFila->Cuadro);

        return $objPlanDictado;
    }

}
?>
