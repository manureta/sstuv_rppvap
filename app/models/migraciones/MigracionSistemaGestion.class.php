<?php

abstract class MigracionSistemaGestion extends MigracionBase {
    public static function Ejecutar(CuadroBase $objCuadro){
        foreach($objCuadro->GetFilas() as $objFila){
            if(!$objFila->IsEmpty()){
                 $objSist = self::GetSistemaGestion($objCuadro->Localizacion, $objFila->GetCeldaByIdColumna(572)->Valor);
                $objSist->Save();
            }                
        }
    }
    
    public static function GetSistemaGestion ($objLocalizacion, $nombre){
        $objSist = OLTPSistemaGestion::LoadByNombreIdLocalizacion($nombre,$objLocalizacion->IdLocalizacion);
        if(!$objSist){
            $objSist = new OLTPSistemaGestion();
            $objSist->IdLocalizacionObject = $objLocalizacion;
            $objSist->Nombre = $nombre;
        }
        return $objSist;
    }
}
?>
