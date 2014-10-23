<?php
/**
* Computadoras
* Migracion de cuadros de Computadoras
*/
abstract class MigracionComputadoras extends MigracionBase {
    
     protected static $_arrCaracteristicasTipo = array(
        //Computadoras biblioteca         
        //CELESTE 
        "387000412000635" => 446,    // Con fines administrativos exclusivamente 	
        "387000413000635" => 447,    // Con fines pedagógicos exclusivamente
        "387000414000635" => 448,    // Ambos tipos de fines
        //AMARILLO 
        "631000412000635" => 440,    // Con fines administrativos exclusivamente 	
        "631000413000635" => 441,    // Con fines pedagógicos exclusivamente
        "631000414000635" => 442,    // Ambos tipos de fines        
        //CELESTE
        "632000412000635" => 446,    // Con fines administrativos exclusivamente 	
        "632000413000635" => 447,    // Con fines pedagógicos exclusivamente
        "632000414000635" => 448,    // Ambos tipos de fines         
        //MARRON
        "633000412000635" => 449,    // Con fines administrativos exclusivamente 	
        "633000413000635" => 450,    // Con fines pedagógicos exclusivamente
        "633000414000635" => 451,    // Ambos tipos de fines        
        //NARANJA
        "646000412000635" => 452,    // Con fines administrativos exclusivamente 	
        "646000413000635" => 453,    // Con fines pedagógicos exclusivamente
        "646000414000635" => 454,    // Ambos tipos de fines 
        //VERDE
        "647000412000635" => 455,    // Con fines administrativos exclusivamente 	
        "647000413000635" => 456,    // Con fines pedagógicos exclusivamente
        "647000414000635" => 457,    // Ambos tipos de fines
        //ROSA
        "648000412000635" => 461,    // Con fines administrativos exclusivamente 	
        "648000413000635" => 462,    // Con fines pedagógicos exclusivamente
        "648000414000635" => 463,    // Ambos tipos de fines
        //BLANCO
        "649000412000635" => 443,    // Con fines administrativos exclusivamente 	
        "649000413000635" => 444,    // Con fines pedagógicos exclusivamente
        "649000414000635" => 445,    // Ambos tipos de fines
        //VIOLETA
        "650000412000635" => 458,    // Con fines administrativos exclusivamente 	
        "650000413000635" => 459,    // Con fines pedagógicos exclusivamente
        "650000414000635" => 460,    // Ambos tipos de fines         
        //CELESTE
        "713000412000635" => 446,    // Con fines administrativos exclusivamente 	
        "713000413000635" => 447,    // Con fines pedagógicos exclusivamente
        "713000414000635" => 448,    // Ambos tipos de fines         
        //VIOLETA
        "715000412000635" => 458,    // Con fines administrativos exclusivamente 	
        "715000413000635" => 459,    // Con fines pedagógicos exclusivamente
        "715000414000635" => 460,    // Ambos tipos de fines          
    );

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro) {
        $arrUso2ComputadoraTipo = array(
                                        1 => 5, // Computadora de Escritorio
                                        2 => 5,
                                        3 => 5,
                                        4 => 6, // Netbook y Notebook
                                        5 => 6,
                                       );
        $blnSoloTotal = false; // FIXME: que feo que quedo esto de cuadros con y sin niveles...
                               // Mis disculpas al que tenga que leerlo luego...
        if(count($objCuadro->GetColumnas()) < 3) $blnSoloTotal = true;
        foreach($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsEmpty()) continue;
            $intCComputadoraUso = $objFila->CodigoRelacional;
            $intCComputadora = $arrUso2ComputadoraTipo[$objFila->CodigoRelacional];
            if(!$blnSoloTotal) $objCeldaTotal = $objFila->GetCeldaByIdColumna(5);
            foreach($objCuadro->GetColumnas() as $objColumna) {
                $intCOfertaAgregada = null;
                if($blnSoloTotal) { 
                    $objCeldaTotal = $objFila->GetCelda($objColumna);
                }
                if($objColumna->IdDefinicionColumna == 5) {
                    if(!$blnSoloTotal) continue; // en las que hay mas de 1 columna la de total se saltea, se guarda en CantidadTotal en el resto de los rows
                    $intCOfertaAgregada = $objCuadro->GetCOfertaAgregada();
                } elseif($objColumna->IdDefinicionColumna == 635){
                    // MIGRO BIBLIOTECA                   
                    $objCelda = $objFila->GetCelda($objColumna);
                    if ($objCelda->Disabled) continue;
                    $objCaracteristica = MigracionCaracteristicas::GetCaracteristica($objCuadro->Localizacion,self::$_arrCaracteristicasTipo[$objCelda->IdDefinicionCelda]);
                    $objCaracteristica->Cuantos = $objCelda->Valor;
                    $objCaracteristica->Save();
                    continue;
                }
                elseif(!$objColumna->CodigoRelacional) throw new MigrationException("MigracionComputadoras: Columna {$objColumna->IdDefinicionColumna} de Cuadro sin definicion de oferta",$objCuadro);

                $objCelda = $objFila->GetCelda($objColumna);
                if ($objCelda->Disabled) continue;
                $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion,
                                $intCOfertaAgregada ? $intCOfertaAgregada : $objColumna->CodigoRelacional,
                                $objCuadro->GetCModalidad1());
                $objComputadoras = self::GetComputadoras($intCComputadora, $intCComputadoraUso, $objOfertaDictada);
                $objComputadoras->CantidadOferta = $objCelda->Valor ? $objCelda->Valor : 0;
                $objComputadoras->CantidadTotal = $objCeldaTotal->Valor ? $objCeldaTotal->Valor : 0;
                LogHelper::Debug(sprintf('Guardando Computadoras :: CComputadora: %s | CComputadoraUso: %s | OfertaDictada: %s | CantidadTotal: %d | CantidadOferta: %d', $objComputadoras->CComputadora, $objComputadoras->CComputadoraUso, $objComputadoras->IdOfertaDictada, $objComputadoras->CantidadTotal, $objComputadoras->CantidadOferta));
                $objComputadoras->Save();
            }
        }
    }
    
    public static function GetComputadoras($intCComputadora, $intCComputadoraUso, $objOfertaDictada) {       
        $objComputadoras = OLTPComputadoras::LoadByCComputadoraCComputadoraUsoIdOfertaDictada($intCComputadora, $intCComputadoraUso, $objOfertaDictada->IdOfertaDictada);
        if(!$objComputadoras){
            $objComputadoras = new OLTPComputadoras();
            $objComputadoras->IdOfertaDictadaObject = $objOfertaDictada;
            $objComputadoras->CComputadoraUso = $intCComputadoraUso;
            $objComputadoras->CComputadora = $intCComputadora;
        }
        return $objComputadoras;
    }

}
?>
