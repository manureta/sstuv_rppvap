<?php

/**
 * Fines
 * Migra el cuadro Fines 
 */
abstract class MigracionAlumnosFines extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCFines = $objFila->CodigoRelacional;
            if (!$intCFines) {
                LogHelper::Error('No se encuentra el código relacional de Fines (tipo_fines_tipo) en la fila ' . $objFila->IdFila);
                continue;
            }

            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
            $objCelVarones = $objFila->GetCelda($objCuadro->GetColumna(7));
            if ($objCelTotal->Valor != '') {
                $objFines = self::GetAlumnosFines($objOfertaDictada->IdOfertaDictada, $intCFines);
                $objFines->Total = (int) $objCelTotal->Valor;
                $objFines->Varones = (int) $objCelVarones->Valor;
                LogHelper::Debug(sprintf('Guardando Fines :: Oferta: %s | Fines: %s | Total: %d | Varones: %d', $objOfertaDictada->COfertaAgregadaObject->Descripcion, $intCFines, $objCelTotal->Valor, $objCelVarones->Valor));
                $objFines->Save();
            }
        }
    }

    public static function GetAlumnosFines($intIdOfertaDictada, $intCFines) {
        $objFines = OLTPAlumnosFines::LoadByIdOfertaDictadaCTipoFines($intIdOfertaDictada, $intCFines);
        
        if (!$objFines) {
            $objFines = new OLTPAlumnosFines();
            $objFines->IdOfertaDictada = $intIdOfertaDictada;
            $objFines->CTipoFines = $intCFines;
        }
        return $objFines;
    }

}

?>
