    <?php
class RegularizacionEditPanel extends RegularizacionEditPanelGen {

    public $mctRegularizacion;
    public $objFolio;
    //id variables for meta_create
    protected $intId;
    public $pnlEncuadre;
    public $pnlAntecedentes;
    public $pnlOrganismos;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkProcesoIniciado' => true,
        'lstAntecedentesAsIdFolio' => true,
        'lstEncuadreLegalAsIdFolio' => false,
        'lstRegistracionAsIdFolio' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(RegularizacionEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();

        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;


                    
        $this->pnlEncuadre = new EncuadreLegalEditPanel($this);
        $this->pnlEncuadre->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEncuadre->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEncuadre->lstIdFolioObject->Enabled = false;
        
        
        $this->pnlAntecedentes = new AntecedentesEditPanel($this);
        $this->pnlAntecedentes->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlAntecedentes->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlAntecedentes->lstIdFolioObject->Enabled = false;        
        
        
        $this->pnlOrganismos = new OrganismosDeIntervencionEditPanel($this);
        $this->pnlOrganismos->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlOrganismos->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlOrganismos->lstIdFolioObject->Enabled = false;                
        


        $this->blnAutoRenderChildrenWithName = true;
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the RegularizacionMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctRegularizacion = RegularizacionMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Regularizacion's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctRegularizacion->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctRegularizacion->lstIdFolioObject_Create();
        if (in_array('chkProcesoIniciado',$strControlsArray)) 
            $this->objControlsArray['chkProcesoIniciado'] = $this->mctRegularizacion->chkProcesoIniciado_Create();
        if (in_array('lstAntecedentesAsIdFolio',$strControlsArray)) 
            $this->objControlsArray['lstAntecedentesAsIdFolio'] = $this->mctRegularizacion->lstAntecedentesAsIdFolio_Create();
        if (in_array('lstEncuadreLegalAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstEncuadreLegalAsIdFolio'] = $this->mctRegularizacion->lstEncuadreLegalAsIdFolio_Create();
        if (in_array('lstRegistracionAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstRegistracionAsIdFolio'] = $this->mctRegularizacion->lstRegistracionAsIdFolio_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
  


}
?>