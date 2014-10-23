<?php
/* Migra el cuadro Tiene convenio Con */
abstract class MigracionConvenios extends MigracionBase {
    /**  @return boolean   **/
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $objCuadro->GetCOfertaAgregada(), $objCuadro->GetCModalidad1());
            $objCelConvenios = $objFila->GetCelda($objCuadro->GetColumna(505));
            if ($objCelConvenios->Valor) {
                $objConvenios = self::GetConvenios($objOfertaDictada->IdOfertaDictada,$objCelConvenios->Valor);
                $objConvenios->CConvenio = -1;
                $objConvenios->Save();  
            }
          //  $objConvenios = self::GetConvenios($objOfertaDictada->IdOfertaDictada,$objCelConvenios->Valor);
        }
        return true;
    }
 
  public static function GetConvenios($intIdOfertaDictada,$strConvenio) {
        $objConvenios = OLTPConvenios::LoadByIdOfertaDictadaConvenio($intIdOfertaDictada, $strConvenio);
        if (!$objConvenios) {
            $objConvenios = new OLTPConvenios();
            $objConvenios->IdOfertaDictada = $intIdOfertaDictada;
            $objConvenios->Convenio = $strConvenio; 
            $objConvenios->CConvenio = -1;
            $objConvenios->Save();  
        }
        return $objConvenios;
    }
}
?>
