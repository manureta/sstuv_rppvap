<?php
class ConflictoHabitacionalModalPanelGen extends EditPanelBase {

    public $mctConflictoHabitacional;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkIntervinoArea' => true,
        'txtFueroInterviniente' => true,
        'txtJuzgadoInterviniente' => true,
        'txtCaratulaExpediente' => true,
        'chkMinisterioDesarrollo' => true,
        'txtMinisterioDesarrolloReferente' => true,
        'chkDefensorPueblo' => true,
        'txtDefensorPuebloReferente' => true,
        'chkSecretariaNacional' => true,
        'txtSecretariaNacionalReferente' => true,
        'chkMunicipalidad' => true,
        'txtMunicipalidadReferente' => true,
        'chkOrganizacionBarrial' => true,
        'txtOrganizacionBarrialReferente' => true,
        'txtOtrosOrganismos' => true,
        'chkOrdenDesalojo' => true,
        'txtFechaEjecucion' => true,
        'chkSuspensionHecho' => true,
        'chkSolicitudSuspension' => true,
        'txtFechaSuspension' => true,
        'txtDuracionSuspension' => true,
        'chkMesaGestion' => true,
        'txtObservaciones' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objConflictoHabitacional = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(ConflictoHabitacionalModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objConflictoHabitacional)
            $objConflictoHabitacional = new ConflictoHabitacional();
        
        $this->intId = $objConflictoHabitacional->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(ConflictoHabitacional::Noun());
        $this->metaControl_Create($strControlsArray, $objConflictoHabitacional);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objConflictoHabitacional){

        $this->mctConflictoHabitacional = new ConflictoHabitacionalMetaControl($this, $objConflictoHabitacional);

        // Call MetaControl's methods to create qcontrols based on ConflictoHabitacional's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctConflictoHabitacional->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctConflictoHabitacional->lstIdFolioObject_Create();
        if (in_array('chkIntervinoArea',$strControlsArray)) 
            $this->objControlsArray['chkIntervinoArea'] = $this->mctConflictoHabitacional->chkIntervinoArea_Create();
        if (in_array('txtFueroInterviniente',$strControlsArray)) 
            $this->objControlsArray['txtFueroInterviniente'] = $this->mctConflictoHabitacional->txtFueroInterviniente_Create();
        if (in_array('txtJuzgadoInterviniente',$strControlsArray)) 
            $this->objControlsArray['txtJuzgadoInterviniente'] = $this->mctConflictoHabitacional->txtJuzgadoInterviniente_Create();
        if (in_array('txtCaratulaExpediente',$strControlsArray)) 
            $this->objControlsArray['txtCaratulaExpediente'] = $this->mctConflictoHabitacional->txtCaratulaExpediente_Create();
        if (in_array('chkMinisterioDesarrollo',$strControlsArray)) 
            $this->objControlsArray['chkMinisterioDesarrollo'] = $this->mctConflictoHabitacional->chkMinisterioDesarrollo_Create();
        if (in_array('txtMinisterioDesarrolloReferente',$strControlsArray)) 
            $this->objControlsArray['txtMinisterioDesarrolloReferente'] = $this->mctConflictoHabitacional->txtMinisterioDesarrolloReferente_Create();
        if (in_array('chkDefensorPueblo',$strControlsArray)) 
            $this->objControlsArray['chkDefensorPueblo'] = $this->mctConflictoHabitacional->chkDefensorPueblo_Create();
        if (in_array('txtDefensorPuebloReferente',$strControlsArray)) 
            $this->objControlsArray['txtDefensorPuebloReferente'] = $this->mctConflictoHabitacional->txtDefensorPuebloReferente_Create();
        if (in_array('chkSecretariaNacional',$strControlsArray)) 
            $this->objControlsArray['chkSecretariaNacional'] = $this->mctConflictoHabitacional->chkSecretariaNacional_Create();
        if (in_array('txtSecretariaNacionalReferente',$strControlsArray)) 
            $this->objControlsArray['txtSecretariaNacionalReferente'] = $this->mctConflictoHabitacional->txtSecretariaNacionalReferente_Create();
        if (in_array('chkMunicipalidad',$strControlsArray)) 
            $this->objControlsArray['chkMunicipalidad'] = $this->mctConflictoHabitacional->chkMunicipalidad_Create();
        if (in_array('txtMunicipalidadReferente',$strControlsArray)) 
            $this->objControlsArray['txtMunicipalidadReferente'] = $this->mctConflictoHabitacional->txtMunicipalidadReferente_Create();
        if (in_array('chkOrganizacionBarrial',$strControlsArray)) 
            $this->objControlsArray['chkOrganizacionBarrial'] = $this->mctConflictoHabitacional->chkOrganizacionBarrial_Create();
        if (in_array('txtOrganizacionBarrialReferente',$strControlsArray)) 
            $this->objControlsArray['txtOrganizacionBarrialReferente'] = $this->mctConflictoHabitacional->txtOrganizacionBarrialReferente_Create();
        if (in_array('txtOtrosOrganismos',$strControlsArray)) 
            $this->objControlsArray['txtOtrosOrganismos'] = $this->mctConflictoHabitacional->txtOtrosOrganismos_Create();
        if (in_array('chkOrdenDesalojo',$strControlsArray)) 
            $this->objControlsArray['chkOrdenDesalojo'] = $this->mctConflictoHabitacional->chkOrdenDesalojo_Create();
        if (in_array('txtFechaEjecucion',$strControlsArray)) 
            $this->objControlsArray['txtFechaEjecucion'] = $this->mctConflictoHabitacional->txtFechaEjecucion_Create();
        if (in_array('chkSuspensionHecho',$strControlsArray)) 
            $this->objControlsArray['chkSuspensionHecho'] = $this->mctConflictoHabitacional->chkSuspensionHecho_Create();
        if (in_array('chkSolicitudSuspension',$strControlsArray)) 
            $this->objControlsArray['chkSolicitudSuspension'] = $this->mctConflictoHabitacional->chkSolicitudSuspension_Create();
        if (in_array('txtFechaSuspension',$strControlsArray)) 
            $this->objControlsArray['txtFechaSuspension'] = $this->mctConflictoHabitacional->txtFechaSuspension_Create();
        if (in_array('txtDuracionSuspension',$strControlsArray)) 
            $this->objControlsArray['txtDuracionSuspension'] = $this->mctConflictoHabitacional->txtDuracionSuspension_Create();
        if (in_array('chkMesaGestion',$strControlsArray)) 
            $this->objControlsArray['chkMesaGestion'] = $this->mctConflictoHabitacional->chkMesaGestion_Create();
        if (in_array('txtObservaciones',$strControlsArray)) 
            $this->objControlsArray['txtObservaciones'] = $this->mctConflictoHabitacional->txtObservaciones_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctConflictoHabitacional->objConflictoHabitacional->__Restored)
            $this->objParentControl->objParentControl->lstConflictoHabitacionalAsId->objParent->AddConflictoHabitacionalAsId($this->mctConflictoHabitacional->objConflictoHabitacional);
        $this->mctConflictoHabitacional->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctConflictoHabitacional->objConflictoHabitacional);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctConflictoHabitacional = null;
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
