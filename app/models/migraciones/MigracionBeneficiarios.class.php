<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MigracionBeneficiarios
 *
 * @author mvillalba
 */
class MigracionBeneficiarios extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        if ($objCuadro->IsEmpty()) return;
        $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $objCuadro->GetCOfertaAgregada(), $objCuadro->GetCModalidad1());

        foreach ($objCuadro->GetFilas() as $objFila) {
            $objCelBeneficiarios = $objFila->GetCelda($objCuadro->GetColumna(196));
            if ($objCelBeneficiarios->Valor != '') {
                $objBeneficiarios = self::GetBeneficiarios($objOfertaDictada->IdOfertaDictada, $objFila->CodigoRelacional);
                $objBeneficiarios->Total = $objCelBeneficiarios->Valor;
                $objBeneficiarios->Save();
            }
        }
    }
    protected static function GetBeneficiarios($intIdOfertaDictada, $intCBeneficio) {
        $objBeneficiarios = OLTPBeneficiarios::LoadByIdOfertaDictadaCBeneficio($intIdOfertaDictada, $intCBeneficio);
         if (!$objBeneficiarios) {
            $objBeneficiarios = new OLTPBeneficiarios();
            $objBeneficiarios->CBeneficio = $intCBeneficio;
            $objBeneficiarios->IdOfertaDictada = $intIdOfertaDictada;
        }
        return $objBeneficiarios;
    }
}
?>
