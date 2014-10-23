<?php

/**
 * Personas
 * Migra el cuadro Cantidad de personas que cumplen cada funcion docente
 */
abstract class MigracionPersonas extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);
        $blnTieneItinerantes = in_array(539, $objCuadro->GetColumnasIds());
        $intItinerantes = 0;
        foreach ($objCuadro->GetFilas() as $objFila) {
            $intTotal = (int) $objFila->GetCelda($objCuadro->GetColumna(79))->Valor;
            if ($blnTieneItinerantes) 
                $intItinerantes = $objFila->GetCelda($objCuadro->GetColumna(539))->Valor;
            if ($intTotal) {
                $objFuncion = self::GetFuncion($objOfertaDictada->IdOfertaDictada, $objFila->CodigoRelacional);
                $objFuncion->Personas = $intTotal;
                $objFuncion->Itinerantes = ($intItinerantes) ? $intItinerantes : 0;
                LogHelper::Debug(sprintf('Guardando Personas :: Oferta: %s | Funcion: %s | Personas: %d | Itinerantes: %d',
                                        $objOfertaDictada->COfertaAgregadaObject->Descripcion,
                                        $objFuncion->CFuncion, $intTotal, $intItinerantes));
                $objFuncion->Save();
            }
        }
        return true;
    }

    public static function GetFuncion($intIdOfertaDictada, $intCFuncion) {
        $objFuncion = OLTPPersonas::LoadByIdOfertaDictadaCFuncion($intIdOfertaDictada, $intCFuncion);
        if (!$objFuncion) {
            $objFuncion = new OLTPPersonas();
            $objFuncion->IdOfertaDictada = $intIdOfertaDictada;
            $objFuncion->CFuncion = $intCFuncion;
        }
        return $objFuncion;
    }

}

?>
