<?php
class SituacionAmbientalModalPanelGen extends EditPanelBase {

    public $mctSituacionAmbiental;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkSinProblemas' => true,
        'chkReservaElectroducto' => true,
        'chkInundable' => true,
        'chkSobreTerraplenFerroviario' => true,
        'chkSobreCaminoSirga' => true,
        'chkExpuestoContaminacionIndustrial' => true,
        'chkSobreSueloDegradado' => true,
        'txtOtro' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objSituacionAmbiental = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(SituacionAmbientalModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objSituacionAmbiental)
            $objSituacionAmbiental = new SituacionAmbiental();
        
        $this->intId = $objSituacionAmbiental->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(SituacionAmbiental::Noun());
        $this->metaControl_Create($strControlsArray, $objSituacionAmbiental);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objSituacionAmbiental){

        $this->mctSituacionAmbiental = new SituacionAmbientalMetaControl($this, $objSituacionAmbiental);

        // Call MetaControl's methods to create qcontrols based on SituacionAmbiental's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctSituacionAmbiental->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctSituacionAmbiental->lstIdFolioObject_Create();
        if (in_array('chkSinProblemas',$strControlsArray)) 
            $this->objControlsArray['chkSinProblemas'] = $this->mctSituacionAmbiental->chkSinProblemas_Create();
        if (in_array('chkReservaElectroducto',$strControlsArray)) 
            $this->objControlsArray['chkReservaElectroducto'] = $this->mctSituacionAmbiental->chkReservaElectroducto_Create();
        if (in_array('chkInundable',$strControlsArray)) 
            $this->objControlsArray['chkInundable'] = $this->mctSituacionAmbiental->chkInundable_Create();
        if (in_array('chkSobreTerraplenFerroviario',$strControlsArray)) 
            $this->objControlsArray['chkSobreTerraplenFerroviario'] = $this->mctSituacionAmbiental->chkSobreTerraplenFerroviario_Create();
        if (in_array('chkSobreCaminoSirga',$strControlsArray)) 
            $this->objControlsArray['chkSobreCaminoSirga'] = $this->mctSituacionAmbiental->chkSobreCaminoSirga_Create();
        if (in_array('chkExpuestoContaminacionIndustrial',$strControlsArray)) 
            $this->objControlsArray['chkExpuestoContaminacionIndustrial'] = $this->mctSituacionAmbiental->chkExpuestoContaminacionIndustrial_Create();
        if (in_array('chkSobreSueloDegradado',$strControlsArray)) 
            $this->objControlsArray['chkSobreSueloDegradado'] = $this->mctSituacionAmbiental->chkSobreSueloDegradado_Create();
        if (in_array('txtOtro',$strControlsArray)) 
            $this->objControlsArray['txtOtro'] = $this->mctSituacionAmbiental->txtOtro_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctSituacionAmbiental->objSituacionAmbiental->__Restored)
            $this->objParentControl->objParentControl->lstSituacionAmbientalAsId->objParent->AddSituacionAmbientalAsId($this->mctSituacionAmbiental->objSituacionAmbiental);
        $this->mctSituacionAmbiental->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctSituacionAmbiental->objSituacionAmbiental);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctSituacionAmbiental = null;
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
