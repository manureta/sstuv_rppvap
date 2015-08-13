<?php
class PerfilModalPanelGen extends EditPanelBase {

    public $mctPerfil;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intIdPerfil;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdPerfil' => false,
        'txtNombre' => true,
        'txtDescripcion' => true,
        'lstUsuarioAsId' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objPerfil = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(PerfilModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objPerfil)
            $objPerfil = new Perfil();
        
        $this->intIdPerfil = $objPerfil->IdPerfil;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Perfil::Noun());
        $this->metaControl_Create($strControlsArray, $objPerfil);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objPerfil){

        $this->mctPerfil = new PerfilMetaControl($this, $objPerfil);

        // Call MetaControl's methods to create qcontrols based on Perfil's data fields
        if (in_array('lblIdPerfil',$strControlsArray)) 
            $this->objControlsArray['lblIdPerfil'] = $this->mctPerfil->lblIdPerfil_Create();
        if (in_array('txtNombre',$strControlsArray)) 
            $this->objControlsArray['txtNombre'] = $this->mctPerfil->txtNombre_Create();
        if (in_array('txtDescripcion',$strControlsArray)) 
            $this->objControlsArray['txtDescripcion'] = $this->mctPerfil->txtDescripcion_Create();
        if (in_array('lstUsuarioAsId',$strControlsArray))
            $this->objControlsArray['lstUsuarioAsId'] = $this->mctPerfil->lstUsuarioAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctPerfil->objPerfil->__Restored)
            $this->objParentControl->objParentControl->lstPerfilAsId->objParent->AddPerfilAsId($this->mctPerfil->objPerfil);
        $this->mctPerfil->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctPerfil->objPerfil);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctPerfil = null;
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
