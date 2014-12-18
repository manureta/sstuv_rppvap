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
      

        $this->blnAutoRenderChildrenWithName = true;
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
    }
    protected function buttons_Create(){}

    protected function metaControl_Create($strControlsArray){
        // Construct the EquipamientoMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctEquipamiento = EquipamientoMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Equipamiento's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctEquipamiento->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEquipamiento->lstIdFolioObject_Create();
        if (in_array('lstUnidadSanitariaObject',$strControlsArray)) 
            $this->objControlsArray['lstUnidadSanitariaObject'] = $this->mctEquipamiento->lstUnidadSanitariaObject_Create();
            $this->objControlsArray['lstUnidadSanitariaObject']->Name="Unidad sanitaria/Hospital";
        if (in_array('lstJardinInfantesObject',$strControlsArray)) 
            $this->objControlsArray['lstJardinInfantesObject'] = $this->mctEquipamiento->lstJardinInfantesObject_Create();
            $this->objControlsArray['lstJardinInfantesObject']->Name="Jardín de infantes";
        if (in_array('lstEscuelaPrimariaObject',$strControlsArray)) 
            $this->objControlsArray['lstEscuelaPrimariaObject'] = $this->mctEquipamiento->lstEscuelaPrimariaObject_Create();
            $this->objControlsArray['lstEscuelaPrimariaObject']->Name="Escuela primaria";
        if (in_array('lstEscuelaSecundariaObject',$strControlsArray)) 
            $this->objControlsArray['lstEscuelaSecundariaObject'] = $this->mctEquipamiento->lstEscuelaSecundariaObject_Create();
            $this->objControlsArray['lstEscuelaSecundariaObject']->Name="Escuela secundaria";
        if (in_array('lstComedorObject',$strControlsArray)) 
            $this->objControlsArray['lstComedorObject'] = $this->mctEquipamiento->lstComedorObject_Create();
            $this->objControlsArray['lstComedorObject']->Name="Comedor";
        if (in_array('lstCentroIntegracionComunitariaObject',$strControlsArray)) 
            $this->objControlsArray['lstCentroIntegracionComunitariaObject'] = $this->mctEquipamiento->lstCentroIntegracionComunitariaObject_Create();
            $this->objControlsArray['lstCentroIntegracionComunitariaObject']->Name="CIC y/o SUM";
        if (in_array('txtOtro',$strControlsArray)) 
            $this->objControlsArray['txtOtro'] = $this->mctEquipamiento->txtOtro_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
        //$this->AddControls($this->objControlsArray);
        //$this->Resizable->AddControls($this->objControlsArray);

    }


}
?>
