<?php
class UsoInternoEditPanel extends UsoInternoEditPanelGen {

     public $mctUsoInterno;
     protected $strTemplate;

    //id variables for meta_create
    protected $intIdFolio;
    protected $objFolio;

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
        'txtRegularizacionEstadoProceso' => true,
        'txtNumExpediente' => true,
        'txtRegistracionLegajo' => true,
        'txtRegistracionFecha' => true,
        'txtRegistracionFolio' => true,
        'txtGeodesiaNum' => true,
        'txtGeodesiaAnio' => true,
        'chkLey14449' => true,
        'chkTieneCenso' => true,
        'txtFechaCenso' => true,
        'txtGeodesiaPartido' => true,
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
            $this->objControlsArray['txtInformeUrbanisticoFecha']->Name="¿Cuenta con informe urbanístico?";
        if (in_array('chkMapeoPreliminar',$strControlsArray)) 
            $this->objControlsArray['chkMapeoPreliminar'] = $this->mctUsoInterno->chkMapeoPreliminar_Create();
            $this->objControlsArray['chkMapeoPreliminar']->Name="Mapeo Preliminar";
        if (in_array('chkNoCorrespondeInscripcion',$strControlsArray)) 
            $this->objControlsArray['chkNoCorrespondeInscripcion'] = $this->mctUsoInterno->chkNoCorrespondeInscripcion_Create();
            $this->objControlsArray['chkNoCorrespondeInscripcion']->Name="No Corresponde Inscripción";
        if (in_array('txtResolucionInscripcionProvisoria',$strControlsArray)) 
            $this->objControlsArray['txtResolucionInscripcionProvisoria'] = $this->mctUsoInterno->txtResolucionInscripcionProvisoria_Create();
            $this->objControlsArray['txtResolucionInscripcionProvisoria']->Name="Resolución Inscripción Provisoria";
        if (in_array('txtResolucionInscripcionDefinitiva',$strControlsArray)) 
            $this->objControlsArray['txtResolucionInscripcionDefinitiva'] = $this->mctUsoInterno->txtResolucionInscripcionDefinitiva_Create();
            $this->objControlsArray['txtResolucionInscripcionDefinitiva']->Name="Resolución Inscripción Definitiva";
        if (in_array('calRegularizacionFechaInicio',$strControlsArray)) 
            $this->objControlsArray['calRegularizacionFechaInicio'] = $this->mctUsoInterno->calRegularizacionFechaInicio_Create();
            $this->objControlsArray['calRegularizacionFechaInicio']->Name="Fecha Inicio";
        if (in_array('chkRegularizacionTienePlano',$strControlsArray)) 
            $this->objControlsArray['chkRegularizacionTienePlano'] = $this->mctUsoInterno->chkRegularizacionTienePlano_Create();
            $this->objControlsArray['chkRegularizacionTienePlano']->Name="¿Plano en trámite?";
        if (in_array('chkRegularizacionCircular10Catastro',$strControlsArray)) 
            $this->objControlsArray['chkRegularizacionCircular10Catastro'] = $this->mctUsoInterno->chkRegularizacionCircular10Catastro_Create();
            $this->objControlsArray['chkRegularizacionCircular10Catastro']->Name="Circular 10 Catastro";                
        if (in_array('txtRegularizacionEstadoProceso',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionEstadoProceso'] = $this->mctUsoInterno->txtRegularizacionEstadoProceso_Create();
            $this->objControlsArray['txtRegularizacionEstadoProceso']->Name="Estado del proceso de regularización";
        if (in_array('txtNumExpediente',$strControlsArray)) 
            $this->objControlsArray['txtNumExpediente'] = $this->mctUsoInterno->txtNumExpediente_Create();
            $this->objControlsArray['txtNumExpediente']->Name="N° Expediente";
        if (in_array('txtRegistracionLegajo',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionLegajo'] = $this->mctUsoInterno->txtRegistracionLegajo_Create();
        if (in_array('txtRegistracionFecha',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionFecha'] = $this->mctUsoInterno->txtRegistracionFecha_Create();
        if (in_array('txtRegistracionFolio',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionFolio'] = $this->mctUsoInterno->txtRegistracionFolio_Create();
        if (in_array('txtGeodesiaNum',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaNum'] = $this->mctUsoInterno->txtGeodesiaNum_Create();
        if (in_array('txtGeodesiaAnio',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaAnio'] = $this->mctUsoInterno->txtGeodesiaAnio_Create();                
        if (in_array('chkLey14449',$strControlsArray)) 
            $this->objControlsArray['chkLey14449'] = $this->mctUsoInterno->chkLey14449_Create();
            $this->objControlsArray['chkLey14449']->Name="Intervención en el marco de la ley 14.449";
        if (in_array('chkTieneCenso',$strControlsArray)) 
            $this->objControlsArray['chkTieneCenso'] = $this->mctUsoInterno->chkTieneCenso_Create();
            $this->objControlsArray['chkTieneCenso']->Name="¿Tiene censo de la SSTUV ?";
        if (in_array('txtFechaCenso',$strControlsArray)) 
            $this->objControlsArray['txtFechaCenso'] = $this->mctUsoInterno->txtFechaCenso_Create();
            $this->objControlsArray['txtFechaCenso']->Name="Fecha del último censo";
        if (in_array('txtGeodesiaPartido',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaPartido'] = $this->mctUsoInterno->txtGeodesiaPartido_Create();    
        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>