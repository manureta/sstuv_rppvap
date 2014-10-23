<?php

/**
 * Egresados primaria
 * Migra el cuadro de egresados de primaria de adultos

 */
abstract class MigracionEgresadosPrimario extends MigracionTrayectoria {

    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsEmpty()) continue;
            if($objFila->TablaTipo == 'oferta_agregada_tipo' && $objFila->CodigoRelacional) {
                $intCOfertaAgregada = $objFila->CodigoRelacional;
            } else {
                throw new MigrationException("MigracionEgresadosPrimario: la fila no contiene oferta_agregada_tipo",$objCuadro);
            }
            $arrOfertasLocales = OLTPOfertaLocal::QueryArray(QQ::AndCondition(QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->COfertaBaseObject->OLTPOfertaAgregadaTipoAsOfertaAgregadaBase->COfertaAgregada, $intCOfertaAgregada),
                 QQ::Equal(QQN::OLTPOfertaLocal()->IdLocalizacion, $objFila->Cuadro->Localizacion->IdLocalizacion),
                 QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->CModalidad1, $objFila->Cuadro->GetCModalidad1())));
            if (count($arrOfertasLocales) == 0) {
                $objOfertaAgregada = OLTPOfertaAgregadaTipo::Load($intCOfertaAgregada);
                throw new MigrationException(sprintf("No se encuentra una Oferta Local de %s de %s", $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($objFila->Cuadro->GetCModalidad1())),$objCuadro);
            }
            $objOfertaLocal = array_pop($arrOfertasLocales);
            $arrPlanDictado = OLTPPlanDictado::LoadArrayByIdOfertaLocal($objOfertaLocal->IdOfertaLocal);
            if (count($arrPlanDictado) == 0) {
                $objPlanDictado = new OLTPPlanDictado();
                $objPlanDictado->IdOfertaLocalObject = $objOfertaLocal;
                $objTituloOferta = array_pop(OLTPTituloOferta::LoadArrayByCOferta($objOfertaLocal->COferta));
                $objPlanDictado->IdTituloOferta = $objTituloOferta->IdTituloOferta;
                $objPlanDictado->Duracion = 0;
                $objPlanDictado->CRequisito = -1;
                $objPlanDictado->CDuracionEn = 1;
                $objPlanDictado->CCondicion = -1;
                $objPlanDictado->CNorma = -2;
                $objPlanDictado->NormaNro = 'ficticio generado';
                $objPlanDictado->NormaAnio = null;
                $objPlanDictado->CDictado = null;
                $objPlanDictado->Save();

            } 
            else $objPlanDictado = array_shift($arrPlanDictado); // primaria tiene un solo plan_dictado por oferta local
            $objGradoOfertaTipo = OLTPGradoOfertaTipo::LoadByCGradoCOferta(-1, $objPlanDictado->IdOfertaLocalObject->COferta);
            $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOfertaTipo, OLTPTrayectoriaTipo::Load(12));
            $objTrayectoria->Total = $objFila->GetCelda($objCuadro->GetColumna(216))->Valor;
            $objTrayectoria->Varones = $objFila->GetCelda($objCuadro->GetColumna(217))->Valor;
            $objTrayectoria->Save();
            $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOfertaTipo, OLTPTrayectoriaTipo::Load(13));
            $objTrayectoria->Total = $objFila->GetCelda($objCuadro->GetColumna(218))->Valor;
            $objTrayectoria->Varones = $objFila->GetCelda($objCuadro->GetColumna(219))->Valor;
            $objTrayectoria->Save();
        }
    }

}

?>
