<?php

/**
 * Trayectoria
 * Migra el cuadro de Trayectoria

 */
abstract class MigracionEgresadosSecundaria extends MigracionTrayectoria {

    public static function Ejecutar(CuadroBase $objCuadro) {

        $idColumasDeVarones = array(106, 108, 110, 112, 114, 116, 118, 120, 122, 124, 126, 217, 219, 310);
        $idColumasDeTotal = array(105, 107, 109, 111, 113, 115, 117, 119, 121, 123, 125, 216, 218, 309);

        $IdColumnaTituloNivel = array_pop_unref(array_intersect($objCuadro->GetColumnasIds(), array(559,561)));
        foreach ($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsEmpty()) continue;

            $intCGradoAnio = -1;//al ser egresado el anio no corresponde
            $objPlanDictado = self::GetPlanDictado($objFila);
            if($IdColumnaTituloNivel) {
                $objCeldaTituloNivel = $objFila->GetCeldaByIdColumna($IdColumnaTituloNivel);
                if($objCeldaTituloNivel->Valor && $objCeldaTituloNivel->Valor != $objPlanDictado->DenominacionTitulo) {
                   $objPlanDictado->DenominacionTitulo = $objFila->GetCeldaByIdColumna($IdColumnaTituloNivel)->Valor;
                   $objPlanDictado->Save();
                }
            }
            $objGradoOfertaTipo = OLTPGradoOfertaTipo::LoadByCGradoCOferta($intCGradoAnio, $objPlanDictado->IdOfertaLocalObject->COferta);

            $objTrayectoriaTipo = null;
            $objTrayectoria = null;
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if(!in_array($objColumna->IdDefinicionColumna, $idColumasDeVarones)
                   && !in_array($objColumna->IdDefinicionColumna, $idColumasDeTotal)) continue; // nivel y otras
                $objTrayectoriaTipoNew = OLTPTrayectoriaTipo::Load($objColumna->CodigoRelacional);
                if($objTrayectoriaTipoNew != $objTrayectoriaTipo) {
                    $objTrayectoriaTipo = $objTrayectoriaTipoNew;
                    $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOfertaTipo, $objTrayectoriaTipo);
                }
                if (in_array($objColumna->IdDefinicionColumna, $idColumasDeVarones)) {
                    $objCelda = $objFila->GetCelda($objColumna);
                    $objTrayectoria->Varones = $objCelda->Valor;
                } elseif (in_array($objColumna->IdDefinicionColumna, $idColumasDeTotal)) {
                    $objCelda = $objFila->GetCelda($objColumna);
                    $objTrayectoria->Total = $objCelda->Valor;
                }
                if((!is_null($objTrayectoria->Varones)) && (!is_null($objTrayectoria->Total)))
                    $objTrayectoria->Save();
            }
        }
    }




}
