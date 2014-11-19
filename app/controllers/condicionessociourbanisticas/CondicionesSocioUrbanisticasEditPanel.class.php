<?php
class CondicionesSocioUrbanisticasEditPanel extends CondicionesSocioUrbanisticasEditPanelGen {

    // Local instance of the CondicionesSocioUrbanisticasMetaControl
    public $mctCondicionesSocioUrbanisticas;

    //id variables for meta_create
  	protected $intId;
    protected $intIdFolio;
    
    protected $objFolio;
    protected $objEquipamiento;
    protected $objInfraestructura;
    protected $objAmbiental;


    public $pnlCondiciones;
    public $pnlEquipamiento;
    public $pnlInfraestructura;
    public $pnlAmbiental; 

    public $strTemplate;

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
            $this->objFolio = Folio::Load(QApplication::QueryString("id"));
              $this->strTemplate=__VIEW_DIR__."/condicionessociourbanisticas/CondicionesSocioUrbanisticasFolioPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->intIdFolio = $this->objFolio->Id;

        $this->metaControl_Create($strControlsArray);
        //$this->objFolio = Folio::Load(QApplication::QueryString("id"));
        
        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;        

        $this->objEquipamiento=Equipamiento::QuerySingle(QQ::Equal(QQN::Equipamiento()->IdFolio,QApplication::QueryString("id")));                        
        $this->pnlEquipamiento = new EquipamientoEditPanel($this,EquipamientoEditPanel::$strControlsArray,$this->objEquipamiento->Id);
        $this->pnlEquipamiento->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEquipamiento->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEquipamiento->lstIdFolioObject->Enabled = false;
        
        
        $this->objInfraestructura=Infraestructura::QuerySingle(QQ::Equal(QQN::Infraestructura()->IdFolio,QApplication::QueryString("id")));
        $this->pnlInfraestructura = new InfraestructuraEditPanel($this,InfraestructuraEditPanel::$strControlsArray,$this->objInfraestructura->Id);
        $this->pnlInfraestructura->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlInfraestructura->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlInfraestructura->lstIdFolioObject->Enabled = false;        
        
        
        $this->objAmbiental=SituacionAmbiental::QuerySingle(QQ::Equal(QQN::SituacionAmbiental()->IdFolio,QApplication::QueryString("id")));
        $this->pnlAmbiental = new SituacionAmbientalEditPanel($this,SituacionAmbientalEditPanel::$strControlsArray,$this->objAmbiental->Id);
        $this->pnlAmbiental->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlAmbiental->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlAmbiental->lstIdFolioObject->Enabled = false;                
        
       $this->buttons_Create();
       $this->blnAutoRenderChildrenWithName = false;
       
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

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
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
        
        $this->pnlInfraestructura->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlAmbiental->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlEquipamiento->btnSave_Click($strFormId, $strControlId, $strParameter);
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