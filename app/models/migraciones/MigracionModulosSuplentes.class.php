<?php

/**
 * Móodulos SUPLENTES
 * Migra el cuadro Módulos atendidos X SUPLENTES
 */
abstract class MigracionModulosSuplentes extends MigracionBase {
    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
         
            $objModSuplente = self::GetModSuplente($objOfertaDictada->IdOfertaDictada);
            $objModSuplente->Modulos = ($objCelTotal->Valor) ? $objCelTotal->Valor : 0;
            $objModSuplente->Save();
        }
        return true;
    }
    public static function GetModSuplente($intIdOfertaDictada) {
        $objModSuplente = OLTPModulosSuplentes::LoadByIdOfertaDictada($intIdOfertaDictada);
        if (!$objModSuplente) {
            $objModSuplente = new OLTPModulosSuplentes();
            $objModSuplente->IdOfertaDictada = $intIdOfertaDictada;
           }
        return $objModSuplente;
    }
}



?>
