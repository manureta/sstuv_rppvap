<?php

/**
 * Secciones Multiples
 * Migra el cuadro Secciones Multiples
 */
abstract class MigracionSeccionesMultiples extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        $arrOfertaAgregadaTipoSeccion = array(
                3800 =>  6, // multiple
                300  =>  6,
                800  =>  6,
                3100 =>  6,
                3200 =>  6,
                2700 =>  6,
                400  => 14, //multinivel
                4500 => 14,
                4800 => 14
        );

        $intIdColumnaValor = array_pop_unref(array_intersect($objCuadro->GetColumnasIds(),array(5,133,506,507,545)));
        if(!$intIdColumnaValor) throw new MigrationException("La estructura del cuadro no está contemplada en la migración",$objCuadro);
        $blnMultiplan = false;
        if (in_array($objCuadro->IdDefinicionCuadro, array(603,607))) $blnMultiplan = true;
        foreach ($objCuadro->GetFilas() as $objFila) {
            if (!$blnMultiplan && !$objFila->CodigoRelacional) continue;
            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna($intIdColumnaValor));
            if ($objCelTotal->Disabled) continue;
            //obtener oferta dictada
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion,
                    $blnMultiplan ? 3100 : $objFila->CodigoRelacional,
                    $objCuadro->GetCModalidad1());

            $intCTipoSeccion = $blnMultiplan ? 13 : $arrOfertaAgregadaTipoSeccion[$objFila->CodigoRelacional];
            $objSecciones = self::GetSeccionesMultiples($objOfertaDictada->IdOfertaDictada, $intCTipoSeccion);
            $objSecciones->Total = (int) $objCelTotal->Valor;
            LogHelper::Debug(sprintf('Guardando SeccionesMultiples :: TipoSeccion: %s | OfertaDictada: %s | Total: %d ', $objSecciones->CTipoSeccion, $objSecciones->IdOfertaDictada, $objSecciones->Total));
            $objSecciones->Save();
        }
        return true;
    }

    public static function GetSeccionesMultiples($intIdOfertaDictada, $intCTipoSeccion) {
        $objSecciones = OLTPSeccionesMultiples::LoadByIdOfertaDictadaCTipoSeccion($intIdOfertaDictada, $intCTipoSeccion);
        if (!$objSecciones) {
            $objSecciones = new OLTPSeccionesMultiples();
            $objSecciones->IdOfertaDictada = $intIdOfertaDictada;
            $objSecciones->CTipoSeccion = $intCTipoSeccion;
        }
        return $objSecciones;
    }

}

?>
