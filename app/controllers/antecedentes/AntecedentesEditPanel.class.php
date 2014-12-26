<?php
class AntecedentesEditPanel extends AntecedentesEditPanelGen {

    // Local instance of the AntecedentesMetaControl
    public $mctAntecedentes;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkSinIntervencion' => true,
        'chkObrasInfraestructura' => true,
        'chkEquipamientos' => true,
        'chkIntervencionesEnViviendas' => true,
        'txtOtros' => true,
        'lstOrganismosDeIntervencionAsIdFolio' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(AntecedentesEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray,$intId,$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(Antecedentes::Noun());
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        if(!Permission::PuedeEditar1A4($objParentObject->objFolio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }

    }
    protected function buttons_Create(){}

    protected function metaControl_Create($strControlsArray){
        // Construct the AntecedentesMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctAntecedentes = AntecedentesMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Antecedentes's data fields
       // if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctAntecedentes->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctAntecedentes->lstIdFolioObject_Create();
        if (in_array('chkSinIntervencion',$strControlsArray)) 
            $this->objControlsArray['chkSinIntervencion'] = $this->mctAntecedentes->chkSinIntervencion_Create();
            $this->objControlsArray['chkSinIntervencion']->Name="Sin intervención";
        if (in_array('chkObrasInfraestructura',$strControlsArray)) {
            $this->objControlsArray['chkObrasInfraestructura'] = $this->mctAntecedentes->chkObrasInfraestructura_Create();
            $this->objControlsArray['chkObrasInfraestructura']->Name="Obras de infraestructuras";
            }
        if (in_array('chkEquipamientos',$strControlsArray)) 
            $this->objControlsArray['chkEquipamientos'] = $this->mctAntecedentes->chkEquipamientos_Create();
        if (in_array('chkIntervencionesEnViviendas',$strControlsArray)){ 
            $this->objControlsArray['chkIntervencionesEnViviendas'] = $this->mctAntecedentes->chkIntervencionesEnViviendas_Create();
            $this->objControlsArray['chkIntervencionesEnViviendas']->Name="Intervención en viviendas";
            }
        if (in_array('txtOtros',$strControlsArray)) 
            $this->objControlsArray['txtOtros'] = $this->mctAntecedentes->txtOtros_Create();
        //if (in_array('lstOrganismosDeIntervencionAsIdFolio',$strControlsArray))
          //  $this->objControlsArray['lstOrganismosDeIntervencionAsIdFolio'] = $this->mctAntecedentes->lstOrganismosDeIntervencionAsIdFolio_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    


}
?>
