<?php

/**
 * Nunca
 * Migra el cuadro Alumnos que nunca asistieron a sala de 4 años 
 */
abstract class MigracionNunca extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCNunca = $objFila->CodigoRelacional;
            if (!$intCNunca) {
                LogHelper::Error('No se encuentra el código relacional de Nunca Asistieron (nunca_tipo) en la fila ' . $objFila->IdFila);
                continue;
            }

            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
            $objCelVarones = $objFila->GetCelda($objCuadro->GetColumna(7));
            if ($objCelTotal->Valor != '') {
                $objNunca = self::GetNunca($objOfertaDictada->IdOfertaDictada, $intCNunca);
                $objNunca->Total = ($objCelTotal->Valor) ? $objCelTotal->Valor : 0;
                $objNunca->Varones = ($objCelVarones->Valor) ? $objCelVarones->Valor : 0;
                LogHelper::Debug(sprintf('Guardando Nunca :: Oferta: %s | Nunca: %s | Total: %d | Varones: %d', $objOfertaDictada->COfertaAgregadaObject->Descripcion, $intCNunca, $objCelTotal->Valor, $objCelVarones->Valor));
                $objNunca->Save();
            }
            return true;
        }
    }

    public static function GetNunca($intIdOfertaDictada, $intCNunca) {
        $objNunca = OLTPNunca::LoadByIdOfertaDictadaCNunca($intIdOfertaDictada, $intCNunca);
        if (!$objNunca) {
            $objNunca = new OLTPNunca();
            $objNunca->IdOfertaDictada = $intIdOfertaDictada;
            $objNunca->CNunca = $intCNunca;
        }
        return $objNunca;
    }

}

?>
