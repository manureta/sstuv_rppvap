<?php

abstract class ConsistenciaBase {
    protected static $strCode = 'X';
    protected static $strMessage = 'Error default, modificar este texto';
    protected $blnAfectaOtroBloque;
    protected $mixIdBloque;
    protected $intIdPagina;

    static public function Ejecutar(BloqueBase $objBloque) {
        throw new Exception(sprintf('Método %s no sobrecargado en página %d, bloque %d', __FUNCTION__, $objBloque->IdPagina, $objBloque->IdBloque));
    }

    static public function EjecutarJavascript() {
        throw new Exception(sprintf('Método %s no sobrecargado en página %d, bloque %d', __FUNCTION__, $objBloque->IdPagina, $objBloque->IdBloque));
    }

    
    public function __set($strName, $mixValue) {
        switch($strName) {
            case 'Code':
                $this->strCode = $mixValue;
            break;
            case 'Message':
                $this->strMessage = $mixValue;
            break;
            case 'AfectaOtroBloque':
                $this->blnAfectaOtroBloque = $mixValue;
            break;
        }
    }
    
    public function __get($strName) {
        switch($strName) {
            case 'Code':
                return $this->strCode ;
            break;
            case 'Message':
                return $this->strMessage ;
            break;
            case 'AfectaOtroBloque':
                return $this->blnAfectaOtroBloque ;
            break;
        }
    }
    
    /**
     * Calcula la cantidad de años de acuerdo a una fecha. Permite 2 tipos, de acuerdo
     * a distintas formas de usar la funcion. Ej. Consistencia9 y Consistencia1
     * @param string | Dato Object $Dato
     * @return type
     */
    static public function CalcularAnios($Dato){
        $value = null;
        if(is_object($Dato)){
            $value = $Dato->Value && $Dato->Value!="" ?$Dato->Value:null;
        }else{
            $value = $Dato && $Dato!="" ?$Dato:null;
        }
        if(!$value) return $value;
        if (is_numeric($value) && strlen($value) == 4) {
            $value = '30/06/'.$value;
        }
        $arrDate = explode('/', $value);
        if(count($arrDate)!=3){
            return null;
        }
        $objDate = new DateTime(sprintf('%d-%d-%d', $arrDate[2], $arrDate[1], $arrDate[0]));
        $objNow = new DateTime();
        $objDiffYear = $objDate->diff($objNow);
        $intDiffYear = $objDiffYear->y;
        return $intDiffYear;
    }
 }
