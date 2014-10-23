<?php

class QDialogBox extends QPanel {
    
    public $strTitle;
    public $btnClose;
    protected $blnRemoveChildsOnHide = false;
    protected $mixCloseMethod;
    protected $strJavaScripts = '_core/control_dialog.js';
    
    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->btnClose_Create();
    }
    
    protected function btnClose_Create() {
        $this->btnClose = new QButton($this);
        $this->btnClose->Display = false;
        $this->btnClose->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'HideDialogBox'));
    }

    protected function GetControlHtml() {
        return sprintf('<div style="display:none" class="qdialogbox" id="%s">%s<div style="clear:both"></div></div>', $this->ControlId, (($this->Visible) ? $this->RenderChildren(false) : ''));
    }

    public function ShowDialogBox() {
        if (!isset($this->btnClose) || !($this->btnClose instanceof QButton)) {
            $this->btnClose_Create();
        }
        $this->Visible = true;
        $this->Display = true;
        QApplication::ExecuteJavaScript(
            sprintf('qc.regDB("%s","%s","%s");', 
                $this->ControlId, $this->strTitle, $this->btnClose->ControlId)
        );
    }

    public function HideDialogBox() {
        $this->Display = false;
        if (isset($this->mixCloseMethod) && is_callable($this->mixCloseMethod)) {
            $arrParameters = array();
            foreach ($this->GetChildControls() as $objControl) {
                if ($objControl !== $this->btnClose) $arrParameters[] = $objControl;
            }
            call_user_func_array($this->mixCloseMethod, $arrParameters);
            $this->mixCloseMethod = null;
        }
        QApplication::ExecuteJavaScript(sprintf('qc.hideDB("%s");', $this->ControlId));                
        if ($this->blnRemoveChildsOnHide) {
            foreach ($this->GetChildControls() as $objControl) {
                if ($objControl !== $this->btnClose) {
                    $this->Form->RemoveControl($objControl->ControlId);
                }
            }
        }
    }

    public function __get($strName) {
        switch ($strName) {
            case 'Title': return $this->strTitle;
            case 'RemoveChildsOnHide': return $this->blnRemoveChildsOnHide;
            case 'CloseMethod': return $this->mixCloseMethod;
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
            case 'Title':
                return $this->strTitle = (string) $mixValue;
            case "RemoveChildsOnHide":
                return $this->blnRemoveChildsOnHide = (bool) $mixValue;
            case "CloseMethod":
                if (!is_callable($mixValue))
                    throw new QCallerException('Parametro de CloseMethod incorrecto. Se espera un array($obj, $strMetodo)');
                return $this->mixCloseMethod = $mixValue;
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