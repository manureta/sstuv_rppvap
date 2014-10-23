<?php
class TipoDatoValorModalPanelGen extends EditPanelBase {

    public $mctTipoDatoValor;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intIdTipoDatoValor;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdTipoDatoValor' => false,
        'txtDescripcion' => true,
        'txtCodigo' => true,
        'txtCTipoDato' => true,
        'txtOrden' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objTipoDatoValor = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(TipoDatoValorModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objTipoDatoValor)
            $objTipoDatoValor = new TipoDatoValor();
        
        $this->intIdTipoDatoValor = $objTipoDatoValor->IdTipoDatoValor;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(TipoDatoValor::Noun());
        $this->metaControl_Create($strControlsArray, $objTipoDatoValor);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objTipoDatoValor){

        $this->mctTipoDatoValor = new TipoDatoValorMetaControl($this, $objTipoDatoValor);

        // Call MetaControl's methods to create qcontrols based on TipoDatoValor's data fields
        if (in_array('lblIdTipoDatoValor',$strControlsArray)) 
            $this->objControlsArray['lblIdTipoDatoValor'] = $this->mctTipoDatoValor->lblIdTipoDatoValor_Create();
        if (in_array('txtDescripcion',$strControlsArray)) 
            $this->objControlsArray['txtDescripcion'] = $this->mctTipoDatoValor->txtDescripcion_Create();
        if (in_array('txtCodigo',$strControlsArray)) 
            $this->objControlsArray['txtCodigo'] = $this->mctTipoDatoValor->txtCodigo_Create();
        if (in_array('txtCTipoDato',$strControlsArray)) 
            $this->objControlsArray['txtCTipoDato'] = $this->mctTipoDatoValor->txtCTipoDato_Create();
        if (in_array('txtOrden',$strControlsArray)) 
            $this->objControlsArray['txtOrden'] = $this->mctTipoDatoValor->txtOrden_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctTipoDatoValor->objTipoDatoValor->__Restored)
            $this->objParentControl->objParentControl->lstTipoDatoValorAsId->objParent->AddTipoDatoValorAsId($this->mctTipoDatoValor->objTipoDatoValor);
        $this->mctTipoDatoValor->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctTipoDatoValor->objTipoDatoValor);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctTipoDatoValor = null;
        $this->blnChangesMade = false;
        $this->objParentControl->HideDialogBox();
    }
    
    // Close Myself and Call ClosePanelMethod Callback
    public function Close() {
        $objParentControl = $this->objParentControl;
        if (!$objParentControl)
            throw new QCallerException('Error llamando al metodo Close de un ModalPanel huerfano');
        while (!$objParentControl instanceof EditPanelBase) {
            if (is_null($objParentControl) ||
                $objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }
        QApplication::ExecuteJavaScript(sprintf('qcodo.EditPanel.ModalClose("%s", "%s", %d);', 
                $this->objCallerControl->ControlId, $objParentControl->ControlId, ($this->blnChangesMade ? 1 : 0)));
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
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
        if (is_array($this->objControlsArray) &&
                $mixValue instanceof QControl) { //solo dejo agregar controles
            return $this->objControlsArray[$strName] = $mixValue;
        }
        try {
            parent::__set($strName, $mixValue);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }
    
     public function GetEndScript() {
        return parent::GetEndScript() . sprintf('$("#%s").attr("onclick","%s");', $this->objParentControl->btnClose->ControlId, sprintf("$('#%s').click();", $this->btnCancel->ControlId));
    }

}
?>
