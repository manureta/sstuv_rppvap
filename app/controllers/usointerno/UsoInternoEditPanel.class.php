<?php
class UsoInternoEditPanel extends UsoInternoEditPanelGen {

     public $mctUsoInterno;
     protected $strTemplate;

    //id variables for meta_create
    protected $intIdFolio;
    protected $objFolio;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lstIdFolioObject' => true,
        'txtInformeUrbanisticoFecha' => true,
        'chkMapeoPreliminar' => true,
        'chkNoCorrespondeInscripcion' => true,
        'txtResolucionInscripcionProvisoria' => true,
        'txtResolucionInscripcionDefinitiva' => true,
        'calRegularizacionFechaInicio' => true,
        'chkRegularizacionTienePlano' => true,
        'chkRegularizacionCircular10Catastro' => true,
        'txtRegularizacionAprobacionGeodesia' => true,
        'txtRegularizacionRegistracion' => true,
        'txtRegularizacionEstadoProceso' => true,
        'txtNumExpediente' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intIdFolio = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(UsoInternoEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
            $this->objFolio = Folio::Load(QApplication::QueryString("id"));
            $this->strTemplate=__VIEW_DIR__."/usointerno/UsoInternoFolioPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intIdFolio = $intIdFolio;

         

        $this->metaControl_Create($strControlsArray);
        
        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;

        $this->buttons_Create();
        $this->blnAutoRenderChildrenWithName = false;
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the UsoInternoMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctUsoInterno = UsoInternoMetaControl::Create($this, $this->intIdFolio);

        // Call MetaControl's methods to create qcontrols based on UsoInterno's data fields
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctUsoInterno->lstIdFolioObject_Create();
        if (in_array('txtInformeUrbanisticoFecha',$strControlsArray)) 
            $this->objControlsArray['txtInformeUrbanisticoFecha'] = $this->mctUsoInterno->txtInformeUrbanisticoFecha_Create();
        if (in_array('chkMapeoPreliminar',$strControlsArray)) 
            $this->objControlsArray['chkMapeoPreliminar'] = $this->mctUsoInterno->chkMapeoPreliminar_Create();
        if (in_array('chkNoCorrespondeInscripcion',$strControlsArray)) 
            $this->objControlsArray['chkNoCorrespondeInscripcion'] = $this->mctUsoInterno->chkNoCorrespondeInscripcion_Create();
        if (in_array('txtResolucionInscripcionProvisoria',$strControlsArray)) 
            $this->objControlsArray['txtResolucionInscripcionProvisoria'] = $this->mctUsoInterno->txtResolucionInscripcionProvisoria_Create();
        if (in_array('txtResolucionInscripcionDefinitiva',$strControlsArray)) 
            $this->objControlsArray['txtResolucionInscripcionDefinitiva'] = $this->mctUsoInterno->txtResolucionInscripcionDefinitiva_Create();
        if (in_array('calRegularizacionFechaInicio',$strControlsArray)) 
            $this->objControlsArray['calRegularizacionFechaInicio'] = $this->mctUsoInterno->calRegularizacionFechaInicio_Create();
        if (in_array('chkRegularizacionTienePlano',$strControlsArray)) 
            $this->objControlsArray['chkRegularizacionTienePlano'] = $this->mctUsoInterno->chkRegularizacionTienePlano_Create();
        if (in_array('chkRegularizacionCircular10Catastro',$strControlsArray)) 
            $this->objControlsArray['chkRegularizacionCircular10Catastro'] = $this->mctUsoInterno->chkRegularizacionCircular10Catastro_Create();
        if (in_array('txtRegularizacionAprobacionGeodesia',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionAprobacionGeodesia'] = $this->mctUsoInterno->txtRegularizacionAprobacionGeodesia_Create();
        if (in_array('txtRegularizacionRegistracion',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionRegistracion'] = $this->mctUsoInterno->txtRegularizacionRegistracion_Create();
        if (in_array('txtRegularizacionEstadoProceso',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionEstadoProceso'] = $this->mctUsoInterno->txtRegularizacionEstadoProceso_Create();
        if (in_array('txtNumExpediente',$strControlsArray)) 
            $this->objControlsArray['txtNumExpediente'] = $this->mctUsoInterno->txtNumExpediente_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>