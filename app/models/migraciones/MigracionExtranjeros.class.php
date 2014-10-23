<?php
/**
* Extranjeros
* Migra el cuadro de población de extranjeros
*/
abstract class MigracionExtranjeros extends MigracionBase {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $objFormacionTipo = self::GetFormacionTipo($objFila);
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                $objCelExtranjeros = $objFila->GetCelda($objColumna);
                if($objCelExtranjeros->Valor) { 
                    $objExtranjeros = self::GetExtranjeros($objOfertaDictada->IdOfertaDictada, $objColumna->CodigoRelacional);
                    $objExtranjeros->Total = $objCelExtranjeros->Valor;
                    $objExtranjeros->Save();
                }
            }
        }
    }

    public static function GetExtranjeros($IdOfertaDictada, $COrigen) {
        $objExtranjeros = OLTPExtranjeros::LoadByIdOfertaDictadaCOrigen($IdOfertaDictada, $COrigen);
        if (!$objExtranjeros) {
            $objExtranjeros = new OLTPExtranjeros();
            $objExtranjeros->IdOfertaDictada = $IdOfertaDictada;
            $objExtranjeros->COrigen = $COrigen;
        }
        return $objExtranjeros;
    }

}
?>
