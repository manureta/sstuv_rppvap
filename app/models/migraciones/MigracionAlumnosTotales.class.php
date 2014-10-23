<?php
/**
 * Total de Alumnos del Establecimiento
 * Migra los cuadros que determinan el total de alumnos del establecimiento
 * del capítulo "Otros Datos"

 */
abstract class MigracionAlumnosTotales extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->IsEmpty()) continue;
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
            $objTotal = $objFila->GetCeldaByIdColumna(5);
            $objVarones = $objFila->GetCeldaByIdColumna(7);
            $objAlumnosTotales = self::GetAlumnosTotales($objOfertaDictada->IdOfertaDictada);
            $objAlumnosTotales->Total = (int) $objTotal->Valor;
            $objAlumnosTotales->Varones = (int) $objVarones->Valor;
            $objAlumnosTotales->Save();
        }
    }

    public static function GetAlumnosTotales($intIdOfertaDictada) {
       // $objAlumnosTotales =OLTPAlumnosTotales::LoadByIdOfertaDictada($intIdOfertaDictada);
        $objAlumnosTotales = OLTPAlumnosTotales::LoadByIdOfertaDictada($intIdOfertaDictada);
        if (!$objAlumnosTotales) {
            $objAlumnosTotales = new OLTPAlumnosTotales();
            $objAlumnosTotales->IdOfertaDictada = $intIdOfertaDictada;
        }
        return $objAlumnosTotales;
    }
}

?>
