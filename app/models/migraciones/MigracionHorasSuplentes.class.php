<?php

/**
 * HORAS SUPLENTES
 * Migra el cuadro HORAS CATEDRA ATENDIDAS X SUPLENTES
 */
abstract class MigracionHorasSuplentes extends MigracionBase {
    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
           // le paso el parametro 2 pq corresponde a tabla oltp-codigos duracion_en_tipo 
            $objHorasSuplente = self::GetHorasSuplente($objOfertaDictada->IdOfertaDictada,2);
            $objHorasSuplente->Horas = ($objCelTotal->Valor) ? $objCelTotal->Valor : 0;
            $objHorasSuplente->Save();
        }
        return true;
    }
    public static function GetHorasSuplente($intIdOfertaDictada ) {
        $objHorasSuplente = OLTPHorasSuplentes::LoadByIdOfertaDictada($intIdOfertaDictada);
        if (!$objHorasSuplente) {
            $objHorasSuplente = new OLTPHorasSuplentes();
            $objHorasSuplente->IdOfertaDictada = $intIdOfertaDictada;
           }
        return $objHorasSuplente;
    }
}



?>
