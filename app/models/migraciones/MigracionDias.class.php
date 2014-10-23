<?php

/**
 * Dias
 * Migra los cuadros de Cantidad de dias de clase efectivamente dictados en el año

 */
abstract class MigracionDias extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
         foreach ($objCuadro->GetFilas() as $objFila) {
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->CodigoRelacional==0){
                        $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion,
                        $objFila->CodigoRelacional,
                        $objCuadro->GetCModalidad1());
                        }   
                 else {
                       $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion,
                       $objColumna->CodigoRelacional,
                       $objCuadro->GetCModalidad1()); 
                        }
                $objCelDias = $objFila->GetCelda($objColumna);
                if ($objCelDias->Valor) {
                    $objDias = self::GetDias($objOfertaDictada->IdOfertaDictada);

                    $objDias->Total = $objCelDias->Valor;
                    $objDias->Save();
                }
            }
        }
    }

    public static function GetDias($intIdOfertaDictada) {
        $objDias =  OLTPDias::LoadByIdOfertaDictada($intIdOfertaDictada);
        if (!$objDias) {
            $objDias = new OLTPDias();
            $objDias->IdOfertaDictada = $intIdOfertaDictada;
                   }
        return $objDias;
    }

}

?>
