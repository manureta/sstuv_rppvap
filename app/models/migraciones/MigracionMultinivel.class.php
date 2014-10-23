<?php
/**
* Multinivel
* Migracion de secciones Multinivel
*/
abstract class MigracionMultinivel {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){


        $objLocalizacion = $objCuadro->Localizacion;
        $intCModalidad1 = $objCuadro->GetCModalidad1();
        $intIdColumna = array_pop_unref(array_intersect($objCuadro->GetColumnasIds(),array(287, 506)));
        $intValor = $objCuadro->GetFila(417)->GetCeldaByIdColumna($intIdColumna)->Valor;

        $objSeccionMultinivel = self::GetSeccionesMultinivel($objLocalizacion,$intCModalidad1);

        $objSeccionMultinivel->Total = $intValor;
        $objSeccionMultinivel->Save();

    }

    public static function GetSeccionesMultinivel($objLocalizacion, $intCModalidad1){
        $objSeccionMultinivel = OLTPSeccionesMultinivel::LoadByIdLocalizacionCModalidad1($objLocalizacion->IdLocalizacion, $intCModalidad1);
        if(!$objSeccionMultinivel){
            $objSeccionMultinivel = new OLTPSeccionesMultinivel();
            $objSeccionMultinivel->IdLocalizacion = $objLocalizacion->IdLocalizacion;
            $objSeccionMultinivel->CModalidad1 = $intCModalidad1;
        }
        return $objSeccionMultinivel;
    }

}
?>
