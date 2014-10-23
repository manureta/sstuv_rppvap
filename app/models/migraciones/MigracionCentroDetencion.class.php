<?php
/* Migra el cuadro CENTROS DE DETENCION DE DONDE PROVIENEN LOS ALUMNOS */
abstract class MigracionCentroDetencion extends MigracionBase {
    /**  @return boolean   **/
    public static function Ejecutar($objCuadro) {
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);
        $objCentroDetencion = self::GetCentroDetencion($objOfertaDictada->IdOfertaDictada);
        $strCentros = '';
        foreach ($objCuadro->GetFilas() as $objFila) {
            $objCelCentro = $objFila->GetCelda($objCuadro->GetColumna(543));
            if ($objCelCentro->Valor){
                $strCentros .= $objCelCentro->Valor."\r\n";
            }
        }
        if ($strCentros) {
            $objCentroDetencion->Centro = $strCentros;
            $objCentroDetencion->Save();
        }
        return true;
    }

    public static function GetCentroDetencion($intIdOfertaDictada) {
        $objCentroDetencion = OLTPCentroDetencion::LoadByIdOfertaDictada($intIdOfertaDictada);
        if (!$objCentroDetencion) {
            $objCentroDetencion = new OLTPCentroDetencion();
            $objCentroDetencion->IdOfertaDictada = $intIdOfertaDictada;
        }
        return $objCentroDetencion;
    }
 
}
?>
