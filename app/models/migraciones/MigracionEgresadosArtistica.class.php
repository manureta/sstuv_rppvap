<?php

/**
 * EgresadosArtistica
 * nada
 */
abstract class MigracionEgresadosArtistica extends MigracionTrayectoria {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->getFilas() as $objFila) {
            if ($objFila->IsEmpty()) continue;

            $objCelTitulo = $objFila->GetCeldaByIdColumna(402);
            $objCelTotal = $objFila->GetCeldaByIdColumna(5);
            $objCelVarones = $objFila->GetCeldaByIdColumna(7);
            $objPlanDictado = self::GetPlanDictado($objFila);
            //El cuadro 264 va con columna Requisitos.
            if ($objCuadro->IdDefinicionCuadro == 264) {
                $objPlanDictado->CRequisito = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(307)->Valor);
            }
            //QApplication::DisplayAlert($objFila->GetCeldaByIdColumna(307)->Valor);
            if ($objCuadro->IdDefinicionCuadro == 264) {
                $objPlanDictado->CDuracionEn = OLTPDuracionEnTipo::Anios;
                $objPlanDictado->Duracion = $objFila->GetCeldaByIdColumna(578)->Valor;
            } elseif ($objCuadro->IdDefinicionCuadro == 265) {
                $objPlanDictado->CDuracionEn = OLTPDuracionEnTipo::HorasReloj;
                $objPlanDictado->Duracion = $objFila->GetCeldaByIdColumna(312)->Valor;
            }

            $objPlanDictado->Save();

            $objGradoOfertaTipo = OLTPGradoOfertaTipo::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::OLTPGradoOfertaTipo()->COferta, $objPlanDictado->IdOfertaLocalObject->COferta), QQ::Equal(QQN::OLTPGradoOfertaTipo()->CGrado, -1)));
            $objTrayectoriaTipo = OLTPTrayectoriaTipo::Load(12);
            $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOfertaTipo, $objTrayectoriaTipo);
            $objTrayectoria->Total = $objCelTotal->Valor;
            $objTrayectoria->Varones = $objCelVarones->Valor;
            $objTrayectoria->Save();
        }
    }

}

?>
