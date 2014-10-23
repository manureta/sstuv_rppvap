<?php
/**
* Articulacion
* Migra el cuadro de articulación
*/
abstract class MigracionArticulacion extends MigracionBase{
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $objCuadro->GetCOfertaAgregada(), $objCuadro->GetCModalidad1());
            $objCelCarrera = $objFila->GetCelda($objCuadro->GetColumna(573));
            $objCelUniversidad = $objFila->GetCelda($objCuadro->GetColumna(445));
            if ($objCelCarrera->Valor && $objCelUniversidad->Valor) {
                $objArticulacion = self::GetArticulacion($objOfertaDictada->IdOfertaDictada, $objCelCarrera->Valor, $objCelUniversidad->Valor);
                $objArticulacion->Save();  
            }
          //  $objArticulacion = self::GetArticulacion($objOfertaDictada->IdOfertaDictada,$objCelArticulacion->Valor);
        }
        return true;
    }
 
  public static function GetArticulacion($intIdOfertaDictada, $strCarrera, $strUniversidad) {
        $objArticulacion = OLTPArticulacion::LoadByIdOfertaDictadaCarreraUniversidad($intIdOfertaDictada, $strCarrera, $strUniversidad);
        if (!$objArticulacion) {
            $objArticulacion = new OLTPArticulacion();
            $objArticulacion->IdOfertaDictada = $intIdOfertaDictada;
            $objArticulacion->Carrera = $strCarrera; 
            $objArticulacion->Universidad = $strUniversidad;
            $objArticulacion->Save();  
        }
        return $objArticulacion;
    }

}
?>
