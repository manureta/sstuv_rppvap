<?php

class QCancelButton extends QButton {

    protected $objEditPanel;
    protected $strMethod;
    
    public function __construct($objParentObject, $objEditPanel, $strMethod, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->objEditPanel = $objEditPanel;
        $this->strMethod = $strMethod;
        $this->Text = 'Volver';
        $this->Icon = 'undo';
        $this->AddCssClass('btn-default');
        $this->AddCssClass('qccancelbutton');
        $this->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
        $this->SetCustomAttribute('data-cancel-text', 'Cancelar');
        $this->SetCustomAttribute('data-back-text', 'Volver');
    }
    
    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $strMethod = $this->strMethod;
        $this->objEditPanel->$strMethod($strFormId, $strControlId, $strParameter);        
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
                    return $this->strMethod = $mixValue;
                if (!is_callable($mixValue))
                    throw new QCallerException('Parametro de CloseMethod incorrecto. Se espera un array($obj, $strMetodo)');
                $this->strMethod = $mixValue[1];
                return $this->objEditPanel = $mixValue[0];
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