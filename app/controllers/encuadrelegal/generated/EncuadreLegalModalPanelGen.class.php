<?php
class EncuadreLegalModalPanelGen extends EditPanelBase {

    public $mctEncuadreLegal;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkDecreto222595' => true,
        'chkLey24374' => true,
        'chkDecreto81588' => true,
        'chkLey23073' => true,
        'chkDecreto468696' => true,
        'txtExpropiacion' => true,
        'txtOtros' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objEncuadreLegal = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(EncuadreLegalModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objEncuadreLegal)
            $objEncuadreLegal = new EncuadreLegal();
        
        $this->intId = $objEncuadreLegal->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(EncuadreLegal::Noun());
        $this->metaControl_Create($strControlsArray, $objEncuadreLegal);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objEncuadreLegal){

        $this->mctEncuadreLegal = new EncuadreLegalMetaControl($this, $objEncuadreLegal);

        // Call MetaControl's methods to create qcontrols based on EncuadreLegal's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctEncuadreLegal->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEncuadreLegal->lstIdFolioObject_Create();
        if (in_array('chkDecreto222595',$strControlsArray)) 
            $this->objControlsArray['chkDecreto222595'] = $this->mctEncuadreLegal->chkDecreto222595_Create();
        if (in_array('chkLey24374',$strControlsArray)) 
            $this->objControlsArray['chkLey24374'] = $this->mctEncuadreLegal->chkLey24374_Create();
        if (in_array('chkDecreto81588',$strControlsArray)) 
            $this->objControlsArray['chkDecreto81588'] = $this->mctEncuadreLegal->chkDecreto81588_Create();
        if (in_array('chkLey23073',$strControlsArray)) 
            $this->objControlsArray['chkLey23073'] = $this->mctEncuadreLegal->chkLey23073_Create();
        if (in_array('chkDecreto468696',$strControlsArray)) 
            $this->objControlsArray['chkDecreto468696'] = $this->mctEncuadreLegal->chkDecreto468696_Create();
        if (in_array('txtExpropiacion',$strControlsArray)) 
            $this->objControlsArray['txtExpropiacion'] = $this->mctEncuadreLegal->txtExpropiacion_Create();
        if (in_array('txtOtros',$strControlsArray)) 
            $this->objControlsArray['txtOtros'] = $this->mctEncuadreLegal->txtOtros_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctEncuadreLegal->objEncuadreLegal->__Restored)
            $this->objParentControl->objParentControl->lstEncuadreLegalAsId->objParent->AddEncuadreLegalAsId($this->mctEncuadreLegal->objEncuadreLegal);
        $this->mctEncuadreLegal->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctEncuadreLegal->objEncuadreLegal);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctEncuadreLegal = null;
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
