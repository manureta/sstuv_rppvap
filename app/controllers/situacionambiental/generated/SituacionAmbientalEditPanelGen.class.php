<?php
class SituacionAmbientalEditPanelGen extends EditPanelBase {
    // Local instance of the SituacionAmbientalMetaControl
    public $mctSituacionAmbiental;

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

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(SituacionAmbientalEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(SituacionAmbiental::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the SituacionAmbientalMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctSituacionAmbiental = SituacionAmbientalMetaControl::Create($this, $this->intId);

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
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (SituacionAmbiental::GenderMale() ? 'e' : 'a'), SituacionAmbiental::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctSituacionAmbiental->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the SituacionAmbientalMetaControl
        $this->mctSituacionAmbiental->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the SituacionAmbientalMetaControl
        $this->mctSituacionAmbiental->DeleteSituacionAmbiental();
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
