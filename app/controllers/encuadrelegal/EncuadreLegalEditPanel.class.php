<?php
class EncuadreLegalEditPanel extends EncuadreLegalEditPanelGen {

    // Local instance of the EncuadreLegalMetaControl
    public $mctEncuadreLegal;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkDecreto222595' => true,
        'chkLey24374' => true,
        'chkDecreto81588' => true,
        'chkLey23073' => true,
        'chkDecreto468696' => true,
        'chkLey14449' => true,
        'txtExpropiacion' => true,
        'txtOtros' => true,
        'chkTieneExpropiacion' => true
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(EncuadreLegalEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(EncuadreLegal::Noun());
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
    }

    protected function buttons_Create(){}

 
    protected function metaControl_Create($strControlsArray){
        // Construct the EncuadreLegalMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctEncuadreLegal = EncuadreLegalMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on EncuadreLegal's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctEncuadreLegal->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEncuadreLegal->lstIdFolioObject_Create();
        if (in_array('chkDecreto222595',$strControlsArray)) 
            $this->objControlsArray['chkDecreto222595'] = $this->mctEncuadreLegal->chkDecreto222595_Create();
            $this->objControlsArray['chkDecreto222595']->Name="Decreto 2225/95";
        if (in_array('chkLey24374',$strControlsArray)) 
            $this->objControlsArray['chkLey24374'] = $this->mctEncuadreLegal->chkLey24374_Create();
            $this->objControlsArray['chkLey24374']->Name="Ley 24374";
        if (in_array('chkDecreto81588',$strControlsArray)) 
            $this->objControlsArray['chkDecreto81588'] = $this->mctEncuadreLegal->chkDecreto81588_Create();
            $this->objControlsArray['chkDecreto81588']->Name="Decreto 81588";
        if (in_array('chkLey23073',$strControlsArray)) 
            $this->objControlsArray['chkLey23073'] = $this->mctEncuadreLegal->chkLey23073_Create();
            $this->objControlsArray['chkLey23073']->Name="Ley 23073";
        if (in_array('chkDecreto468696',$strControlsArray)) 
            $this->objControlsArray['chkDecreto468696'] = $this->mctEncuadreLegal->chkDecreto468696_Create();
            $this->objControlsArray['chkDecreto468696']->Name="Decreto 4686/96";
        if (in_array('chkLey14449',$strControlsArray)) 
            $this->objControlsArray['chkLey14449']= $this->mctEncuadreLegal->chkLey14449_Create();    
            $this->objControlsArray['chkLey14449']->Name="Ley 14119";
        if (in_array('chkTieneExpropiacion',$strControlsArray)) 
            $this->objControlsArray['chkTieneExpropiacion'] = $this->mctEncuadreLegal->chkTieneExpropiacion_Create();
        if (in_array('txtExpropiacion',$strControlsArray)) 
            $this->objControlsArray['txtExpropiacion'] = $this->mctEncuadreLegal->txtExpropiacion_Create();
            $this->objControlsArray['txtExpropiacion']->Name="Expropiación";
        if (in_array('txtOtros',$strControlsArray)) 
            $this->objControlsArray['txtOtros'] = $this->mctEncuadreLegal->txtOtros_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>
