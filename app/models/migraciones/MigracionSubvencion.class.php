<?php
/**
* Subvencion
* migración de Subvención
*/
abstract class MigracionSubvencion {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){
       // return; // para bugfix 20120307

        $objLocalizacion = $objCuadro->Localizacion;
        $intCModalidad1 = $objCuadro->GetCModalidad1();

        foreach($objCuadro->GetFilas() as $objFila){
            if(!$objFila->IsEmpty()){
                foreach($objFila->GetCeldas() as $objCelda){
                    if($objCelda->Valor == 'on'){
                        $objOfertaLocalArray = MigracionBase::GetOfertaLocalByIdLocalizacionCModalidad1COfertaAgregada($objLocalizacion->IdLocalizacion,$intCModalidad1,$objFila->CodigoRelacional);
                        foreach($objOfertaLocalArray as $objOfertaLocal){
                            $objOfertaLocal->CSubvencion = $objCelda->Columna->CodigoRelacional;
                            $objOfertaLocal->Save();
                        }
                    }

                }
            }
        }
    }

}
?>
