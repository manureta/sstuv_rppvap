<?php
class CondicionesSocioUrbanisticasModalPanelGen extends EditPanelBase {

    public $mctCondicionesSocioUrbanisticas;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;
    protected $intIdFolio;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkEspacioLibreComun' => true,
        'txtPresenciaOrgSociales' => true,
        'txtNombreRefernte' => true,
        'txtTelefonoReferente' => true,
        'txtInformeUrbanisticoFecha' => true,
        'lstEquipamientoAsIdFolio' => false,
        'lstInfraestructuraAsIdFolio' => false,
        'lstSituacionAmbientalAsIdFolio' => false,
        'lstTransporteAsIdFolio' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objCondicionesSocioUrbanisticas = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CondicionesSocioUrbanisticasModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objCondicionesSocioUrbanisticas)
            $objCondicionesSocioUrbanisticas = new CondicionesSocioUrbanisticas();
        
        $this->intId = $objCondicionesSocioUrbanisticas->Id;
        $this->intIdFolio = $objCondicionesSocioUrbanisticas->IdFolio;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(CondicionesSocioUrbanisticas::Noun());
        $this->metaControl_Create($strControlsArray, $objCondicionesSocioUrbanisticas);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objCondicionesSocioUrbanisticas){

        $this->mctCondicionesSocioUrbanisticas = new CondicionesSocioUrbanisticasMetaControl($this, $objCondicionesSocioUrbanisticas);

        // Call MetaControl's methods to create qcontrols based on CondicionesSocioUrbanisticas's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctCondicionesSocioUrbanisticas->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctCondicionesSocioUrbanisticas->lstIdFolioObject_Create();
        if (in_array('chkEspacioLibreComun',$strControlsArray)) 
            $this->objControlsArray['chkEspacioLibreComun'] = $this->mctCondicionesSocioUrbanisticas->chkEspacioLibreComun_Create();
        if (in_array('txtPresenciaOrgSociales',$strControlsArray)) 
            $this->objControlsArray['txtPresenciaOrgSociales'] = $this->mctCondicionesSocioUrbanisticas->txtPresenciaOrgSociales_Create();
        if (in_array('txtNombreRefernte',$strControlsArray)) 
            $this->objControlsArray['txtNombreRefernte'] = $this->mctCondicionesSocioUrbanisticas->txtNombreRefernte_Create();
        if (in_array('txtTelefonoReferente',$strControlsArray)) 
            $this->objControlsArray['txtTelefonoReferente'] = $this->mctCondicionesSocioUrbanisticas->txtTelefonoReferente_Create();
        if (in_array('txtInformeUrbanisticoFecha',$strControlsArray)) 
            $this->objControlsArray['txtInformeUrbanisticoFecha'] = $this->mctCondicionesSocioUrbanisticas->txtInformeUrbanisticoFecha_Create();
        if (in_array('lstEquipamientoAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsIdFolio'] = $this->mctCondicionesSocioUrbanisticas->lstEquipamientoAsIdFolio_Create();
        if (in_array('lstInfraestructuraAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsIdFolio'] = $this->mctCondicionesSocioUrbanisticas->lstInfraestructuraAsIdFolio_Create();
        if (in_array('lstSituacionAmbientalAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstSituacionAmbientalAsIdFolio'] = $this->mctCondicionesSocioUrbanisticas->lstSituacionAmbientalAsIdFolio_Create();
        if (in_array('lstTransporteAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstTransporteAsIdFolio'] = $this->mctCondicionesSocioUrbanisticas->lstTransporteAsIdFolio_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctCondicionesSocioUrbanisticas->objCondicionesSocioUrbanisticas->__Restored)
            $this->objParentControl->objParentControl->lstCondicionesSocioUrbanisticasAsId->objParent->AddCondicionesSocioUrbanisticasAsId($this->mctCondicionesSocioUrbanisticas->objCondicionesSocioUrbanisticas);
        $this->mctCondicionesSocioUrbanisticas->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctCondicionesSocioUrbanisticas->objCondicionesSocioUrbanisticas);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctCondicionesSocioUrbanisticas = null;
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
