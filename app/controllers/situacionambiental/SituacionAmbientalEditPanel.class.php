<?php
class SituacionAmbientalEditPanel extends SituacionAmbientalEditPanelGen {

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
        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(SituacionAmbiental::Noun());
        $this->metaControl_Create($strControlsArray);
        //$this->buttons_Create();
        $this->blnAutoRenderChildrenWithName = true;
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the SituacionAmbientalMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctSituacionAmbiental = SituacionAmbientalMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on SituacionAmbiental's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctSituacionAmbiental->lblId_Create();
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

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>