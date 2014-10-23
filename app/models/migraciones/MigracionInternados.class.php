<?php
/* Migra el cuadro idiomas que se dictan en el establecimiento*/
abstract class MigracionInternados extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        //$objOfertaDictada = self:: GetOfertaDictadabyCuadro($objCuadro);
        foreach ($objCuadro->GetFilas() as $objFila) {
           $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
           $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
           $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
           $objCelVarones = $objFila->GetCelda($objCuadro->GetColumna(7));
           if ($objCelTotal->Valor !='') {
                  $objInternados = self::GetInternados($objOfertaDictada->IdOfertaDictada);
                  $objInternados->Total = ($objCelTotal->Valor) ? $objCelTotal->Valor : 0;
                  $objInternados->Varones = ($objCelVarones->Valor) ? $objCelVarones->Valor : 0;
                  $objInternados->Save();
            }
        }
    }

    public static function GetInternados($intIdOfertaDictada) {
            $objInternados = OLTPInternados:: LoadByIdOfertaDictada($intIdOfertaDictada);
            if (!$objInternados) {
                $objInternados = new OLTPInternados();
                $objInternados->IdOfertaDictada = $intIdOfertaDictada;
            }
            return $objInternados;
     }
  }
?>
