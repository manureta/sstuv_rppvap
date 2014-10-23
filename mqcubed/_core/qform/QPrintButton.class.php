<?php

class QPrintButton extends QButton {

    protected $objEditPanel;
    protected $arrMethod;
    
    /*
     * Siempre ejecuta la misma acción.
     */
    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->strText = 'Imprimir';
        $this->strIcon = 'print';
        $this->AddCssClass('btn-light');
        $this->AddCssClass('qcprintbutton');
        $this->AddCssClass('no-print');
        $this->AddAction(new QClickEvent(), new QJavaScriptAction('window.print();'));
    }
    
    
    public function __get($strName) {
        switch ($strName) {
            case 'EditPanel': return $this->objEditPanel;
            case 'Method': return $this->mixMethod;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }
    
    public function __set($strName, $mixValue) {
        $this->blnModified = true;
        switch ($strName) {
            case 'EditPanel':
                if (!$mixValue instanceof EditPanelBase)
                    throw new QCallerException('El valor no es un EditPanel');
                return $this->objEditPanel = $mixValue;
            case "Method":
                if (is_string($mixValue)) 
                    return $this->arrMethod = array($this->objEditPanel, $mixValue);
                if (!is_callable($mixValue))
                    throw new QCallerException('Parametro de CloseMethod incorrecto. Se espera un array($obj, $strMetodo)');
                return $this->arrMethod = $mixValue;
            default:
                try {
                    parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;
        }
    }
    
}

?>