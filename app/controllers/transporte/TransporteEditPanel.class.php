<?php
class TransporteEditPanel extends TransporteEditPanelGen {

	public $mctTransporte;

    //id variables for meta_create
    protected $intId;
    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'lstColectivosObject' => true,
        'lstFerrocarrilObject' => true,
        'lstRemisCombisObject' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(TransporteEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        
        $this->metaControl_Create($strControlsArray);
       // $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the TransporteMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctTransporte = TransporteMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Transporte's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctTransporte->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctTransporte->lstIdFolioObject_Create();
        if (in_array('lstColectivosObject',$strControlsArray)) 
            $this->objControlsArray['lstColectivosObject'] = $this->mctTransporte->lstColectivosObject_Create();
        if (in_array('lstFerrocarrilObject',$strControlsArray)) 
            $this->objControlsArray['lstFerrocarrilObject'] = $this->mctTransporte->lstFerrocarrilObject_Create();
        if (in_array('lstRemisCombisObject',$strControlsArray)) 
            $this->objControlsArray['lstRemisCombisObject'] = $this->mctTransporte->lstRemisCombisObject_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>