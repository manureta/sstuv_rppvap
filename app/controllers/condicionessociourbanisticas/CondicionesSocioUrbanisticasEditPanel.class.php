<?php
class CondicionesSocioUrbanisticasEditPanel extends CondicionesSocioUrbanisticasEditPanelGen {

    // Local instance of the CondicionesSocioUrbanisticasMetaControl
    public $mctCondicionesSocioUrbanisticas;

    //id variables for meta_create
  	protected $intId;
    protected $intIdFolio;

    public $pnlCondiciones;
    public $pnlEquipamiento;
    public $pnlInfraestructura;
    public $pnlAmbiental; 

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkEspacioLibreComun' => true,
        'txtPresenciaOrgSociales' => true,
        'txtNombreRefernte' => true,
        'txtTelefonoReferente' => true,
        'lstEquipamientoAsIdFolio' => false,
        'lstInfraestructuraAsIdFolio' => false,
        'lstSituacionAmbientalAsIdFolio' => false,
        'lstTransporteAsIdFolio' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $intIdFolio = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CondicionesSocioUrbanisticasEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->intIdFolio = $intIdFolio;
		$this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab("Condiciones");
        $this->metaControl_Create($strControlsArray);


        error_log("creando segundo tab");
        $this->pnlEquipamiento = new EquipamientoEditPanel($this);
        $tabEquip =$this->pnlTabs->AddTab("Equipamiento");
        $tabEquip->AddControls(array($this->pnlEquipamiento));

        error_log("creando tercer tab");
        $this->pnlInfraestructura = new InfraestructuraEditPanel($this);
        $tabInf =$this->pnlTabs->AddTab("Infraestructura");
        $tabInf->AddControls(array($this->pnlInfraestructura));

        error_log("creando cuarto tab");
        $this->pnlAmbiental = new SituacionAmbientalEditPanel($this);
        $tabAmb =$this->pnlTabs->AddTab("Situacion Ambiental");
        $tabAmb->AddControls(array($this->pnlAmbiental));

        error_log("listo");
        //$this->blnAutoRenderChildren = true;
       
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the CondicionesSocioUrbanisticasMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctCondicionesSocioUrbanisticas = CondicionesSocioUrbanisticasMetaControl::Create($this, $this->intId, $this->intIdFolio);

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
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (CondicionesSocioUrbanisticas::GenderMale() ? 'e' : 'a'), CondicionesSocioUrbanisticas::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctCondicionesSocioUrbanisticas->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the CondicionesSocioUrbanisticasMetaControl
        $this->mctCondicionesSocioUrbanisticas->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the CondicionesSocioUrbanisticasMetaControl
        $this->mctCondicionesSocioUrbanisticas->DeleteCondicionesSocioUrbanisticas();
        $this->btnCancel_Click();
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
            case 'Modal': 
                if (!isset($this->mdlPanel)) $this->mdlPanel_Create();
                return $this->mdlPanel;
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



}
?>