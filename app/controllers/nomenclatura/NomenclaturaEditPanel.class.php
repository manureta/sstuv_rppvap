<?php
class NomenclaturaEditPanel extends NomenclaturaEditPanelGen {
       // Local instance of the NomenclaturaMetaControl
    public $mctNomenclatura;
    
    //id variables for meta_create
    protected $intId;

    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'txtPartidaInmobiliaria' => true,
        'txtTitularDominio' => true,
        'txtCirc' => true,
        'txtSecc' => true,
        'txtChacQuinta' => true,
        'txtFrac' => true,
        'txtMza' => true,
        'txtParc' => true,
        'txtInscripcionDominio' => true,
        'txtDatoVerificadoRegPropiedad' => true,
        'txtTitularRegPropiedad' => true,
    );

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {
        
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
         $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Nomenclatura::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();

    }

       protected function metaControl_Create($strControlsArray){
        // Construct the NomenclaturaMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctNomenclatura = NomenclaturaMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Nomenclatura's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctNomenclatura->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctNomenclatura->lstIdFolioObject_Create();
        if (in_array('txtPartidaInmobiliaria',$strControlsArray)) 
            $this->objControlsArray['txtPartidaInmobiliaria'] = $this->mctNomenclatura->txtPartidaInmobiliaria_Create();
        if (in_array('txtTitularDominio',$strControlsArray)) 
            $this->objControlsArray['txtTitularDominio'] = $this->mctNomenclatura->txtTitularDominio_Create();
        if (in_array('txtCirc',$strControlsArray)) 
            $this->objControlsArray['txtCirc'] = $this->mctNomenclatura->txtCirc_Create();
        if (in_array('txtSecc',$strControlsArray)) 
            $this->objControlsArray['txtSecc'] = $this->mctNomenclatura->txtSecc_Create();
        if (in_array('txtChacQuinta',$strControlsArray)) 
            $this->objControlsArray['txtChacQuinta'] = $this->mctNomenclatura->txtChacQuinta_Create();
        if (in_array('txtFrac',$strControlsArray)) 
            $this->objControlsArray['txtFrac'] = $this->mctNomenclatura->txtFrac_Create();
        if (in_array('txtMza',$strControlsArray)) 
            $this->objControlsArray['txtMza'] = $this->mctNomenclatura->txtMza_Create();
        if (in_array('txtParc',$strControlsArray)) 
            $this->objControlsArray['txtParc'] = $this->mctNomenclatura->txtParc_Create();
        if (in_array('txtInscripcionDominio',$strControlsArray)) 
            $this->objControlsArray['txtInscripcionDominio'] = $this->mctNomenclatura->txtInscripcionDominio_Create();
        if (in_array('txtDatoVerificadoRegPropiedad',$strControlsArray)) 
            $this->objControlsArray['txtDatoVerificadoRegPropiedad'] = $this->mctNomenclatura->txtDatoVerificadoRegPropiedad_Create();
        if (in_array('txtTitularRegPropiedad',$strControlsArray)) 
            $this->objControlsArray['txtTitularRegPropiedad'] = $this->mctNomenclatura->txtTitularRegPropiedad_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the NomenclaturaMetaControl
        $this->mctNomenclatura->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/". $this->mctNomenclatura->Nomenclatura->IdFolio) ; 
    }

}
?>