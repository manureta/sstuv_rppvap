<?php
class EquipamientoEditPanel extends EquipamientoEditPanelGen {

    public $mctEquipamiento;

    //id variables for meta_create
    protected $intId;
    protected $panel;
    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'lstUnidadSanitariaObject' => true,
        'lstJardinInfantesObject' => true,
        'lstEscuelaPrimariaObject' => true,
        'lstEscuelaSecundariaObject' => true,
        'lstComedorObject' => true,
        'lstSalonUsosMultiplesObject' => true,
        'lstCentroIntegracionComunitariaObject' => true,
        'txtOtro' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(EquipamientoEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
      
        $this->metaControl_Create($strControlsArray);

        //$this->buttons_Create();
        $this->blnAutoRenderChildrenWithName = true;
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the EquipamientoMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctEquipamiento = EquipamientoMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Equipamiento's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctEquipamiento->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEquipamiento->lstIdFolioObject_Create();
        if (in_array('lstUnidadSanitariaObject',$strControlsArray)) 
            $this->objControlsArray['lstUnidadSanitariaObject'] = $this->mctEquipamiento->lstUnidadSanitariaObject_Create();
        if (in_array('lstJardinInfantesObject',$strControlsArray)) 
            $this->objControlsArray['lstJardinInfantesObject'] = $this->mctEquipamiento->lstJardinInfantesObject_Create();
        if (in_array('lstEscuelaPrimariaObject',$strControlsArray)) 
            $this->objControlsArray['lstEscuelaPrimariaObject'] = $this->mctEquipamiento->lstEscuelaPrimariaObject_Create();
        if (in_array('lstEscuelaSecundariaObject',$strControlsArray)) 
            $this->objControlsArray['lstEscuelaSecundariaObject'] = $this->mctEquipamiento->lstEscuelaSecundariaObject_Create();
        if (in_array('lstComedorObject',$strControlsArray)) 
            $this->objControlsArray['lstComedorObject'] = $this->mctEquipamiento->lstComedorObject_Create();
        if (in_array('lstSalonUsosMultiplesObject',$strControlsArray)) 
            $this->objControlsArray['lstSalonUsosMultiplesObject'] = $this->mctEquipamiento->lstSalonUsosMultiplesObject_Create();
        if (in_array('lstCentroIntegracionComunitariaObject',$strControlsArray)) 
            $this->objControlsArray['lstCentroIntegracionComunitariaObject'] = $this->mctEquipamiento->lstCentroIntegracionComunitariaObject_Create();
        if (in_array('txtOtro',$strControlsArray)) 
            $this->objControlsArray['txtOtro'] = $this->mctEquipamiento->txtOtro_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
        //$this->AddControls($this->objControlsArray);
        //$this->Resizable->AddControls($this->objControlsArray);

    }


}
?>