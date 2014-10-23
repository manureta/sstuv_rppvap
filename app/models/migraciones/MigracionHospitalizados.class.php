<?php
/* Migra el cuadro idiomas que se dictan en el establecimiento*/
abstract class MigracionHospitalizados extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        //$objOfertaDictada = self:: GetOfertaDictadabyCuadro($objCuadro);
        foreach ($objCuadro->GetFilas() as $objFila) {
           $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
           $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
           $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
           $objCelVarones = $objFila->GetCelda($objCuadro->GetColumna(7));
           if ($objCelTotal->Valor !='') {
                  $objHospitalizados = self::GetHospitalizados($objOfertaDictada->IdOfertaDictada);
                  $objHospitalizados->Total = ($objCelTotal->Valor) ? $objCelTotal->Valor : 0;
                  $objHospitalizados->Varones = ($objCelVarones->Valor) ? $objCelVarones->Valor : 0;
                  $objHospitalizados->Save();
            }
        }
    }

    public static function GetHospitalizados($intIdOfertaDictada) {
            $objHospitalizados = OLTPHospitalizados:: LoadByIdOfertaDictada($intIdOfertaDictada);
            if (!$objHospitalizados) {
                $objHospitalizados = new OLTPHospitalizados();
                $objHospitalizados->IdOfertaDictada = $intIdOfertaDictada;
            }
            return $objHospitalizados;
     }
  }
?>
