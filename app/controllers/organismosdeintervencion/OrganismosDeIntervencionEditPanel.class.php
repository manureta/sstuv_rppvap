<?php
class OrganismosDeIntervencionEditPanel extends OrganismosDeIntervencionEditPanelGen {

    // Local instance of the OrganismosDeIntervencionMetaControl
    public $mctOrganismosDeIntervencion;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkNacional' => true,
        'chkProvincial' => true,
        'chkMunicipal' => true,
        'txtFechaIntervencion' => true,
        'txtProgramas' => true
        
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OrganismosDeIntervencionEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray,$intId,$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(OrganismosDeIntervencion::Noun());
        //$this->buttons_Create();
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);

        if(!Permission::PuedeEditar1A4($objParentObject->objFolio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }

    }
    protected function buttons_Create(){}

    protected function metaControl_Create($strControlsArray){
        // Construct the OrganismosDeIntervencionMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctOrganismosDeIntervencion = OrganismosDeIntervencionMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on OrganismosDeIntervencion's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctOrganismosDeIntervencion->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctOrganismosDeIntervencion->lstIdFolioObject_Create();
        if (in_array('chkNacional',$strControlsArray)) 
            $this->objControlsArray['chkNacional'] = $this->mctOrganismosDeIntervencion->chkNacional_Create();
        if (in_array('chkProvincial',$strControlsArray)) 
            $this->objControlsArray['chkProvincial'] = $this->mctOrganismosDeIntervencion->chkProvincial_Create();
        if (in_array('chkMunicipal',$strControlsArray)) 
            $this->objControlsArray['chkMunicipal'] = $this->mctOrganismosDeIntervencion->chkMunicipal_Create();
        if (in_array('txtFechaIntervencion',$strControlsArray)) 
            $this->objControlsArray['txtFechaIntervencion'] = $this->mctOrganismosDeIntervencion->txtFechaIntervencion_Create();
            $this->objControlsArray['txtFechaIntervencion']->Name="Fecha de intervención";
        if (in_array('txtProgramas',$strControlsArray)) 
            $this->objControlsArray['txtProgramas'] = $this->mctOrganismosDeIntervencion->txtProgramas_Create();
            $this->objControlsArray['txtProgramas']->Name="A través de que programas";
        
    }
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the OrganismosDeIntervencionMetaControl
        $this->mctOrganismosDeIntervencion->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
    }


}
?>
