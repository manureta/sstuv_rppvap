<?php

class QSaveButton extends QButton {

    protected $objEditPanel;
    protected $arrMethod;
    
    public function __construct($objParentObject, $objEditPanel, $mixMethod, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->objEditPanel = $objEditPanel;
        $this->Method = $mixMethod; //llamo al setter mágico para que haga la magia
        $this->strText = 'Guardar';
        $this->strIcon = 'save';
        $this->AddCssClass('btn-success');
        $this->AddCssClass('qcsavebutton');
        $this->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
        $this->mixCausesValidation = $objEditPanel;
    }
    
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        return call_user_func_array($this->arrMethod, func_get_args());
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