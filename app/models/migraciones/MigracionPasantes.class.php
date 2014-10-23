<?php
/**
* Pasantes
* Migra el cuadro de población de Pasantes
*/
abstract class MigracionPasantes extends MigracionBase {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCOfertaAgregada = $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
            $objTotal = $objFila->GetCeldaByIdColumna(5);
            $objVarones = $objFila->GetCeldaByIdColumna(7);
            if($objTotal->Valor !== '' || $objVarones->Valor !== '') { 
                $objPasantes = self::GetPasantes($objOfertaDictada->IdOfertaDictada);
                $objPasantes->Total = $objTotal->Valor;
                $objPasantes->Varones = $objVarones->Valor;
                LogHelper::Debug(sprintf('Guardando Pasantes :: Localizacion: %s | IdOfertaDictada: %s | Total: %d | Varones: %d',
                                 $objCuadro->Localizacion->Cueanexo, $objOfertaDictada->IdOfertaDictada,
                                 $objTotal->Valor, $objVarones->Valor));
                $objPasantes->Save();
            }
        }
    }

    public static function GetPasantes($IdOfertaDictada) {
        $objPasantes = OLTPPasantes::LoadByIdOfertaDictada($IdOfertaDictada);
        if (!$objPasantes) {
            $objPasantes = new OLTPPasantes();
            $objPasantes->IdOfertaDictada = $IdOfertaDictada;
        }
        return $objPasantes;
    }

}
?>
