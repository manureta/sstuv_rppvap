<?php
class OrganismosDeIntervencionModalPanelGen extends EditPanelBase {

    public $mctOrganismosDeIntervencion;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkNacional' => true,
        'chkProvincial' => true,
        'chkMunicipal' => true,
        'txtProgramas' => true,
        'txtFechaIntervencion' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objOrganismosDeIntervencion = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OrganismosDeIntervencionModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objOrganismosDeIntervencion)
            $objOrganismosDeIntervencion = new OrganismosDeIntervencion();
        
        $this->intId = $objOrganismosDeIntervencion->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(OrganismosDeIntervencion::Noun());
        $this->metaControl_Create($strControlsArray, $objOrganismosDeIntervencion);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objOrganismosDeIntervencion){

        $this->mctOrganismosDeIntervencion = new OrganismosDeIntervencionMetaControl($this, $objOrganismosDeIntervencion);

        // Call MetaControl's methods to create qcontrols based on OrganismosDeIntervencion's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctOrganismosDeIntervencion->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctOrganismosDeIntervencion->lstIdFolioObject_Create();
        if (in_array('chkNacional',$strControlsArray)) 
            $this->objControlsArray['chkNacional'] = $this->mctOrganismosDeIntervencion->chkNacional_Create();
        if (in_array('chkProvincial',$strControlsArray)) 
            $this->objControlsArray['chkProvincial'] = $this->mctOrganismosDeIntervencion->chkProvincial_Create();
        if (in_array('chkMunicipal',$strControlsArray)) 
            $this->objControlsArray['chkMunicipal'] = $this->mctOrganismosDeIntervencion->chkMunicipal_Create();
        if (in_array('txtProgramas',$strControlsArray)) 
            $this->objControlsArray['txtProgramas'] = $this->mctOrganismosDeIntervencion->txtProgramas_Create();
        if (in_array('txtFechaIntervencion',$strControlsArray)) 
            $this->objControlsArray['txtFechaIntervencion'] = $this->mctOrganismosDeIntervencion->txtFechaIntervencion_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctOrganismosDeIntervencion->objOrganismosDeIntervencion->__Restored)
            $this->objParentControl->objParentControl->lstOrganismosDeIntervencionAsId->objParent->AddOrganismosDeIntervencionAsId($this->mctOrganismosDeIntervencion->objOrganismosDeIntervencion);
        $this->mctOrganismosDeIntervencion->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctOrganismosDeIntervencion->objOrganismosDeIntervencion);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctOrganismosDeIntervencion = null;
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
