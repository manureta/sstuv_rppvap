<?php

/**
 * Idioma
 * Migra el cuadro de Idioma

 */
abstract class MigracionIdioma extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $objFormacionTipo = self::GetFormacionTipo($objFila);
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();

            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());

            foreach ($objCuadro->GetColumnas() as $objColumna) {
                $objIdiomaTipo=  OLTPIdiomaTipo::Load($objColumna->CodigoRelacional);
                $objCelIdioma = $objFila->GetCelda($objColumna);
                if ($objCelIdioma->Valor) {
                    $objIdioma = self::GetIdioma($objOfertaDictada->IdOfertaDictada, $objIdiomaTipo->CIdioma, $objFormacionTipo->CFormacion);
                    $objIdioma->Alumnos = $objCelIdioma->Valor;

                    $objIdioma->Save();
                }
            }
        }
    }

    public static function  GetIdioma($intIdOfertaDictada, $intCIdioma, $intCFormacion) {
        $objIdioma = OLTPIdioma::LoadByIdOfertaDictadaCIdiomaCFormacion($intIdOfertaDictada, $intCIdioma, $intCFormacion);
        if (!$objIdioma) {
            $objIdioma = new OLTPIdioma();
            $objIdioma->IdOfertaDictada = $intIdOfertaDictada;
            $objIdioma->CIdioma = $intCIdioma;
            $objIdioma->CFormacion = $intCFormacion;
        }
        return $objIdioma;
    }

}

?>
