<?php

/**
 * Poblacion
 * Migra el cuadro de población 
 */
abstract class MigracionPoblacion extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        $objLocalizacion = Session::getLocalizacion();
        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->GetCelda($objCuadro->GetColumna(5))->Valor != '') { 
                $objFormacionTipo = self::GetFormacionTipo($objFila);
                $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();

                $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());

                $objPoblacion = self::GetPoblacion($objOfertaDictada->IdOfertaDictada, $objFormacionTipo->CFormacion, self::GetCPoblacion($objCuadro));
                $objPoblacion->Total = $objFila->GetCelda($objCuadro->GetColumna(5))->Valor;
                $objPoblacion->Varones = $objFila->GetCelda($objCuadro->GetColumna(7))->Valor;
                $objPoblacion->Save();
            }
        }
    }

    public static function GetPoblacion($intIdOfertaDictada, $intCFormacion, $intCPoblacion) {
        $objPoblacion = OLTPPoblacion::LoadByIdOfertaDictadaCFormacionCPoblacion($intIdOfertaDictada, $intCFormacion, $intCPoblacion);
        if (!$objPoblacion) {
            $objPoblacion = new OLTPPoblacion();
            $objPoblacion->IdOfertaDictada = $intIdOfertaDictada;
            $objPoblacion->CFormacion = $intCFormacion;
            $objPoblacion->CPoblacion = $intCPoblacion;
        }
        return $objPoblacion;
    }

    public static function GetCPoblacion($objCuadro) {
        $intCPoblacion = false;
        switch ($objCuadro->IdCuadro) {
           
            case 109: // 1.6 ; Celeste Buenos Aires s/egb c/egb
            case 132: // 2.6 ; Celeste C/EGB -
            case 162: // 3.5 , Celeste C/EGB , Buenos Aires, S/EGB
            case 218: // 2.6, Celeste S/EGB ,Buenos Aires
            case 312: // 7 , Verde Buenos Aires, "Verde
            case 394: // 1.5, Violeta ,Violeta Buenos Aires
            case 442: // 2.5; Violeta ,Violeta Buenos Aires
            case 516: // 8, "Rosa
            case 527: // 14,"Rosa
            case 535: // 22, "Rosa
            case 654: // 1.4 Naranja
            case 769: // 2.5; Violeta ,Violeta Buenos Aires
                return 8;  //// Privacion de libertad

            case 110: // 1.7, Celeste C/EGB ,S/EGB,Celeste Buenos Aires
            case 133: // 2.7, Celeste C/EGB
            case 163: // 3.6, Celeste Buenos Aires, Celeste C/EGB, S/EGB
            case 240: // 2.7, Celeste Buenos Aires , S/EGB
            case 313: // 8, Verde ,Verde Buenos Aires
            case 396: // 1.6, Violeta , Violeta Buenos Aires
            case 445: // 2.7, Violeta 
            case 517: // 9, Rosa
            case 528: // 15, Rosa
            case 536: // 23, Rosa
            case 655: // 1.5 Naranja
            case 770: // 2.7 Violeta bsas
                return 6;  //// Ambito rural

            case 111: // 1.8, Celeste C/EGB - S/EGB, Buenos Aires
            case 134 : // 2.8, Celeste C/EGB
            case 164 : //  3.7 Celeste Buenos Aires, C/EGB, S/EGB
            case 241 : // 2.8, Celeste Buenos Aires,  S/EGB
            case 314 : // 9, Verde, Verde Buenos Aires
            case 397 : // 1.7 Violeta, Violeta Buenos Aires
            case 447 : // 2.8 Violeta
            case 519 : // 10, Rosa
            case 529 : // 16, Rosa
            case 537 : // 24, Rosa
            case 656: // 1.6 Naranja
             case 771: // 2.8 Violeta   BsAs
                return 7;  //// Intercultural b
        }
        throw new MigrationException("No se pudo encontrar el código de CPoblacion para el cuadro",$objCuadro);
    }

    // ESTA FUNCION PASARLA A MIGRACIONBASE
}

?>
