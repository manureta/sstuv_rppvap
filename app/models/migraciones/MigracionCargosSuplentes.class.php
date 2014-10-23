<?php

/**
 * CargosSuplentes
 * Migra el cuadro Cargos Docentes Atendidos por Suplentes
 */
abstract class MigracionCargosSuplentes extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
            
            $objCargoSuplente = self::GetCargoSuplente($objOfertaDictada->IdOfertaDictada, self::GetCategoriaCargoSuplente($objCuadro));
            $objCargoSuplente->Cargos = ($objCelTotal->Valor) ? $objCelTotal->Valor : 0;
            $objCargoSuplente->Save();
        }
        return true;
    }

    public static function GetCargoSuplente($intIdOfertaDictada, $intCCategoriaCargoSuplente ) {
        $objCargoSuplente = OLTPCargosSuplentes::LoadByIdOfertaDictadaCCategoriaCargoSuplente($intIdOfertaDictada, $intCCategoriaCargoSuplente);
        if (!$objCargoSuplente) {
            $objCargoSuplente = new OLTPCargosSuplentes();
            $objCargoSuplente->IdOfertaDictada = $intIdOfertaDictada;
            $objCargoSuplente->CCategoriaCargoSuplente = $intCCategoriaCargoSuplente;
        }
        return $objCargoSuplente;
    }

    public static function GetCategoriaCargoSuplente($objCuadro) {
        switch($objCuadro->IdCuadro) {
            case 150;//'Frente a alumnos Egb3':
                return 2;
            case 148;//'Dirección y Apoyo Egb3':
                return 3;
            default:
                return 1;
        }
    }
}


?>
