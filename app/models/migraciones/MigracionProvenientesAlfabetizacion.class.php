<?php

/**
 * Alumnos de diferentes programas de alfabetizacion
 * Migra 1.8 - ALUMNOS PROVENIENTES DE DIFERENTES PROGRAMAS DE ALFABETIZACIÓN
 */
abstract class MigracionProvenientesAlfabetizacion extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        foreach ($objCuadro->GetFilas() as $objFila) {
            $strPrograma = $objFila->GetCelda($objCuadro->GetColumna(438))->Valor;
            $intTotal = $objFila->GetCelda($objCuadro->GetColumna(5))->Valor;
            $intVarones = $objFila->GetCelda($objCuadro->GetColumna(7))->Valor;
            if ($intTotal != '') {
                $objProvAlf = self::GetProvenientesAlfabetizacion($objCuadro->Localizacion->IdLocalizacion, $strPrograma);
                $objProvAlf->Total = $intTotal;
                $objProvAlf->Varones = $intVarones;
                LogHelper::Debug(sprintf('Guardando Provenientes de Alfabetizacion :: Localizacion: %s | Programa: %s | Total: %d | Varones: %d',
                                        $objCuadro->Localizacion->Cueanexo,
                                        $strPrograma, $intTotal, $intVarones));
                $objProvAlf->Save();
            }
        }
        return true;
    }

    public static function GetProvenientesAlfabetizacion($intIdLocalizacion, $strPrograma) {
        $objProvAlf = OLTPProvenientesAlfabetizacion::LoadByIdLocalizacionPrograma($intIdLocalizacion, $strPrograma);
        if (!$objProvAlf) {
            $objProvAlf = new OLTPProvenientesAlfabetizacion();
            $objProvAlf->IdLocalizacion = $intIdLocalizacion;
            $objProvAlf->Programa = $strPrograma;
        }
        return $objProvAlf;
    }

}

?>
