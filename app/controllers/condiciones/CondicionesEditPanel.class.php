<?php
class CondicionesEditPanel extends EditPanelBase {
    // Local instance of the CondicionesSocioUrbanisticasMetaControl
   
    //id variables for meta_create
    protected $intId;
    protected $intIdFolio;

    public $pnlCondiciones;
    public $pnlEquipamiento;
    public $pnlInfraestructura;
    public $pnlAmbiental; 
    

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $intIdFolio = null, $strControlId = null) {
        error_log("creando clase");
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->pnlTabs = new QTabPanel($this);
        //error_log("creando primer tab");
        //$this->pnlCondiciones = new CondicionesSocioUrbanisticasEditPanel($this);
        //$tabCond =$this->pnlTabs->AddTab("Condiciones");
        //$tabCond->AddControls(array($this->pnlCondiciones));

        error_log("creando segundo tab");
        $this->pnlEquipamiento = new EquipamientoEditPanel($this);
        $tabEquip =$this->pnlTabs->AddTab("Equipamiento");
        $tabEquip->AddControls(array($this->pnlEquipamiento));

        error_log("creando tercer tab");
        $this->pnlInfraestructura = new InfraestructuraEditPanel($this);
        $tabInf =$this->pnlTabs->AddTab("Infraestructura");
        $tabInf->AddControls(array($this->pnlInfraestructura));

        error_log("creando cuarto tab");
        $this->pnlAmbiental = new SituacionAmbientalEditPanel($this);
        $tabAmb =$this->pnlTabs->AddTab("Situacion Ambiental");
        $tabAmb->AddControls(array($this->pnlAmbiental));

        error_log("listo");
        //$this->blnAutoRenderChildren = true;
        /*
        $this->intId = $intId;
        $this->intIdFolio = $intIdFolio;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab("Condiciones");
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
        */
    }

    

}
?>
