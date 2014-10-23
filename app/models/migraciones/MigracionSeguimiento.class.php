<?php

/**
 * Seguimiento
 * Migra el cuadro de Seguimiento Discapacidad

 */
abstract class MigracionSeguimiento extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $objFormacionTipo = self::GetFormacionTipo($objFila);
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();

            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());

            foreach ($objCuadro->GetColumnas() as $objColumna) {

                $objSegTipo = OLTPSeguimientoTipo::Load($objColumna->CodigoRelacional);
                $objCelSeg = $objFila->GetCelda($objColumna);
                if ($objCelSeg->Valor) {
                    $objSeg = self::GetSeguimiento($objOfertaDictada->IdOfertaDictada,
                             $objFormacionTipo->CFormacion,
                             $objColumna->CodigoRelacional);
                    $objSeg->Total = $objCelSeg->Valor;
                    $objSeg->Save();
                }
            }
        }
    }

    public static function GetSeguimiento($intIdOfertaDictada, $intCFormacion, $intCSeguimiento) {
        $objSeg = OLTPSeguimiento::LoadByIdOfertaDictadaCFormacionCSeguimiento($intIdOfertaDictada, $intCFormacion, $intCSeguimiento);
        if (!$objSeg) {
            $objSeg = new OLTPSeguimiento();
            $objSeg->IdOfertaDictada = $intIdOfertaDictada;
            $objSeg->CSeguimiento = $intCSeguimiento;
            $objSeg->CFormacion = $intCFormacion;
        }
        return $objSeg;
    }

}

?>
