<?php
class CondicionesSocioUrbanisticasEditPanel extends CondicionesSocioUrbanisticasEditPanelGen {

    // Local instance of the CondicionesSocioUrbanisticasMetaControl
    public $mctCondicionesSocioUrbanisticas;

    //id variables for meta_create
    protected $intId;
    protected $intIdFolio;

    protected $objFolio;
    protected $objEquipamiento;
    protected $objTransporte;
    protected $objInfraestructura;
    protected $objAmbiental;


    public $pnlCondiciones;
    public $pnlEquipamiento;
    public $pnlTransporte;
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
            parent::__construct($objParentObject, $strControlsArray,$intId,$intIdFolio,$strControlId);
            $this->objFolio = Folio::Load(QApplication::QueryString("id"));
            $this->strTemplate=__VIEW_DIR__."/condicionessociourbanisticas/CondicionesSocioUrbanisticasFolioPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->intIdFolio = $this->objFolio->Id;

        //$this->objFolio = Folio::Load(QApplication::QueryString("id"));
        //$this->metaControl_Create($strControlsArray);

        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;
        $this->lstIdFolioObject->Visible = false;

        $this->objEquipamiento=Equipamiento::QuerySingle(QQ::Equal(QQN::Equipamiento()->IdFolio,QApplication::QueryString("id")));
        $this->pnlEquipamiento = new EquipamientoEditPanel($this,EquipamientoEditPanel::$strControlsArray,$this->objEquipamiento->Id);
        $this->pnlEquipamiento->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEquipamiento->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEquipamiento->lstIdFolioObject->Enabled = false;
        $this->pnlEquipamiento->lstIdFolioObject->Visible = false;

        $this->objTransporte=Transporte::QuerySingle(QQ::Equal(QQN::Transporte()->IdFolio,QApplication::QueryString("id")));
        $this->pnlTransporte = new TransporteEditPanel($this,TransporteEditPanel::$strControlsArray,$this->objTransporte->Id);
        $this->pnlTransporte->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlTransporte->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlTransporte->lstIdFolioObject->Enabled = false;
        $this->pnlTransporte->lstIdFolioObject->Visible = false;


        $this->objInfraestructura=Infraestructura::QuerySingle(QQ::Equal(QQN::Infraestructura()->IdFolio,QApplication::QueryString("id")));
        $this->pnlInfraestructura = new InfraestructuraEditPanel($this,InfraestructuraEditPanel::$strControlsArray,$this->objInfraestructura->Id);
        $this->pnlInfraestructura->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlInfraestructura->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlInfraestructura->lstIdFolioObject->Enabled = false;
        $this->pnlInfraestructura->lstIdFolioObject->Visible = false;


        $this->objAmbiental=SituacionAmbiental::QuerySingle(QQ::Equal(QQN::SituacionAmbiental()->IdFolio,QApplication::QueryString("id")));
        $this->pnlAmbiental = new SituacionAmbientalEditPanel($this,SituacionAmbientalEditPanel::$strControlsArray,$this->objAmbiental->Id);
        $this->pnlAmbiental->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlAmbiental->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlAmbiental->lstIdFolioObject->Enabled = false;
        $this->pnlAmbiental->lstIdFolioObject->Visible = false;

        $this->pnlAmbiental->chkSinProblemas->AddAction(new QClickEvent(), new QConfirmAction(sprintf("Al seleccionar 'Sin problemas' se anularán las otras variables de 'Situación Ambiental'.\\r\\n ¿Está seguro?")));
        $this->pnlAmbiental->chkSinProblemas->AddAction(new QClickEvent(),new QAjaxControlAction($this,"SinProblemas_chk"));

        $this->blnAutoRenderChildrenWithName = false;
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);

        if(!Permission::PuedeEditar1A4($this->objFolio) || (Permission::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social")) && !Permission::EsAdministrador())) {
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }

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
            $this->objControlsArray['chkEspacioLibreComun']->Name="¿El barrio cuenta con espacio libre común?";
        if (in_array('txtPresenciaOrgSociales',$strControlsArray))
            $this->objControlsArray['txtPresenciaOrgSociales'] = $this->mctCondicionesSocioUrbanisticas->txtPresenciaOrgSociales_Create();
            $this->objControlsArray['txtPresenciaOrgSociales']->Name="Nombre de la organización social";
        if (in_array('txtNombreRefernte',$strControlsArray))
            $this->objControlsArray['txtNombreRefernte'] = $this->mctCondicionesSocioUrbanisticas->txtNombreRefernte_Create();
            $this->objControlsArray['txtNombreRefernte']->Name="Nombre del referente";
        if (in_array('txtTelefonoReferente',$strControlsArray))
            $this->objControlsArray['txtTelefonoReferente'] = $this->mctCondicionesSocioUrbanisticas->txtTelefonoReferente_Create();
            $this->objControlsArray['txtTelefonoReferente']->Name="Teléfono del referente";
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

    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (CondicionesSocioUrbanisticas::GenderMale() ? 'e' : 'a'), CondicionesSocioUrbanisticas::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctCondicionesSocioUrbanisticas->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the CondicionesSocioUrbanisticasMetaControl

	$this->mctCondicionesSocioUrbanisticas->Save();
        $this->pnlInfraestructura->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlAmbiental->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlEquipamiento->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlTransporte->btnSave_Click($strFormId, $strControlId, $strParameter);
        //$this->mctCondicionesSocioUrbanisticas->Save();
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

    public function btnCancel_Click($strFormId, $strControlId, $strParameter){
        QApplication::ExecuteJavascript("window.history.back();");
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

    public function SinProblemas_chk($strFormId, $strControlId, $strParameter){
        if($this->pnlAmbiental->chkSinProblemas->Checked){
           $this->pnlAmbiental->chkReservaElectroducto->Checked=false;
           $this->pnlAmbiental->chkInundable->Checked=false;
           $this->pnlAmbiental->chkSobreTerraplenFerroviario->Checked=false;
           $this->pnlAmbiental->chkSobreCaminoSirga->Checked=false;
           $this->pnlAmbiental->chkExpuestoContaminacionIndustrial->Checked=false;
           $this->pnlAmbiental->chkSobreSueloDegradado->Checked=false;
           $this->pnlAmbiental->txtOtro->Text='';

           // las deshabilito
           $this->pnlAmbiental->chkReservaElectroducto->Enabled=false;
           $this->pnlAmbiental->chkInundable->Enabled=false;
           $this->pnlAmbiental->chkSobreTerraplenFerroviario->Enabled=false;
           $this->pnlAmbiental->chkSobreCaminoSirga->Enabled=false;
           $this->pnlAmbiental->chkExpuestoContaminacionIndustrial->Enabled=false;
           $this->pnlAmbiental->chkSobreSueloDegradado->Enabled=false;
           $this->pnlAmbiental->txtOtro->Enabled=false;
        }else{

           $this->pnlAmbiental->chkReservaElectroducto->Enabled=true;
           $this->pnlAmbiental->chkInundable->Enabled=true;
           $this->pnlAmbiental->chkSobreTerraplenFerroviario->Enabled=true;
           $this->pnlAmbiental->chkSobreCaminoSirga->Enabled=true;
           $this->pnlAmbiental->chkExpuestoContaminacionIndustrial->Enabled=true;
           $this->pnlAmbiental->chkSobreSueloDegradado->Enabled=true;
           $this->pnlAmbiental->txtOtro->Enabled=true;

        }

    }



}
?>
