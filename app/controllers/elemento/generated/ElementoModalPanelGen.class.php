<?php
class ElementoModalPanelGen extends EditPanelBase {

    public $mctElemento;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intIdElemento;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdElemento' => false,
        'txtNombre' => true,
        'lstIdPerfilObject' => true,
        'txtUndato' => true,
        'txtOtrodato' => true,
        'lstElementoHijoAsId' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objElemento = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(ElementoModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objElemento)
            $objElemento = new Elemento();
        
        $this->intIdElemento = $objElemento->IdElemento;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Elemento::Noun());
        $this->metaControl_Create($strControlsArray, $objElemento);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objElemento){

        $this->mctElemento = new ElementoMetaControl($this, $objElemento);

        // Call MetaControl's methods to create qcontrols based on Elemento's data fields
        if (in_array('lblIdElemento',$strControlsArray)) 
            $this->objControlsArray['lblIdElemento'] = $this->mctElemento->lblIdElemento_Create();
        if (in_array('txtNombre',$strControlsArray)) 
            $this->objControlsArray['txtNombre'] = $this->mctElemento->txtNombre_Create();
        if (in_array('lstIdPerfilObject',$strControlsArray)) 
            $this->objControlsArray['lstIdPerfilObject'] = $this->mctElemento->lstIdPerfilObject_Create();
        if (in_array('txtUndato',$strControlsArray)) 
            $this->objControlsArray['txtUndato'] = $this->mctElemento->txtUndato_Create();
        if (in_array('txtOtrodato',$strControlsArray)) 
            $this->objControlsArray['txtOtrodato'] = $this->mctElemento->txtOtrodato_Create();
        if (in_array('lstElementoHijoAsId',$strControlsArray))
            $this->objControlsArray['lstElementoHijoAsId'] = $this->mctElemento->lstElementoHijoAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctElemento->objElemento->__Restored)
            $this->objParentControl->objParentControl->lstElementoAsId->objParent->AddElementoAsId($this->mctElemento->objElemento);
        $this->mctElemento->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctElemento->objElemento);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctElemento = null;
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
