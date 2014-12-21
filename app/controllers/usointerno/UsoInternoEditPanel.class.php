<?php
class UsoInternoEditPanel extends UsoInternoEditPanelGen {

     public $mctUsoInterno;
     protected $strTemplate;

    //id variables for meta_create
    protected $intIdFolio;
    protected $objFolio;
    public $lstInformeUrbanistico;

    //Adjuntos
    public $boolPuedeAdjuntar;

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
        'lstRegularizacionEstadoProcesoObject' => true,
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
        'lstEstadoFolioObject' => true
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intIdFolio = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(UsoInternoEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray, $intIdFolio, $strControlId);
            $this->objFolio = Folio::Load(QApplication::QueryString("id"));
            $this->strTemplate=__VIEW_DIR__."/usointerno/UsoInternoFolioPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if(!Permission::EsUsoInterno())
            QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");

        $this->intIdFolio = $intIdFolio;

         

        
        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;

         // informe urbanistico
        $this->lstInformeUrbanistico=new QListBox($this);
        switch ($this->txtInformeUrbanisticoFecha->Text) {                
                case 'si':
                    $this->lstInformeUrbanistico->AddItem(' Si ', 'si');
                    $this->lstInformeUrbanistico->AddItem(' No ', 'no');
                    $this->lstInformeUrbanistico->AddItem(' Sin Dato ', 'sin_dato');                
                    break;
                case 'no':    
                    $this->lstInformeUrbanistico->AddItem(' No ', 'no');
                    $this->lstInformeUrbanistico->AddItem(' Sin Dato ', 'sin_dato');                
                    $this->lstInformeUrbanistico->AddItem(' Si ', 'si');
                    break;
                default:
                    $this->lstInformeUrbanistico->AddItem(' Sin Dato ', 'sin_dato');
                    $this->lstInformeUrbanistico->AddItem(' Si ', 'si');
                    $this->lstInformeUrbanistico->AddItem(' No ', 'no'); 
                    $this->txtInformeUrbanisticoFecha->Text='sin_dato'; // para inicializarlo           
                    break;                    
            }
        $this->lstInformeUrbanistico->Name="¿Cuenta con informe urbanístico?";    
        $this->lstInformeUrbanistico->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstInforme_Change'));
        $this->txtInformeUrbanisticoFecha->Visible=false;

        // Partido de Geodesia
        if($this->txtGeodesiaPartido->Text=="") $this->txtGeodesiaPartido->Text=$this->objFolio->IdPartidoObject->CodPartido;
        //$this->txtGeodesiaPartido->Text=$this->objFolio->IdPartidoObject->CodPartido;

        $this->blnAutoRenderChildrenWithName = false;
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        
        $this->SetEstadoCondition();
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
        if (in_array('lstRegularizacionEstadoProcesoObject',$strControlsArray)) 
            $this->objControlsArray['lstRegularizacionEstadoProcesoObject'] = $this->mctUsoInterno->lstRegularizacionEstadoProcesoObject_Create();
            $this->objControlsArray['lstRegularizacionEstadoProcesoObject']->Name="Estado del proceso de regularización";
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
        if (in_array('lstEstadoFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstEstadoFolioObject'] = $this->mctUsoInterno->lstEstadoFolioObject_Create();
            $this->objControlsArray['lstEstadoFolioObject']->Name="Estado del Folio";
    }

    public function lstInforme_Change($strFormId, $strControlId, $strParameter) {       
        $this->txtInformeUrbanisticoFecha->Text=$this->lstInformeUrbanistico->SelectedValue;
    }

    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (UsoInterno::GenderMale() ? 'e' : 'a'), UsoInterno::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctUsoInterno->EditMode;
        }
    }

    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->SetEstadoCondition();
    }
    public function SetEstadoCondition(){
            if(Permission::EsAdministrador()) return;
            $this->lstEstadoFolioObject->MarkAsModified();
            switch($this->mctUsoInterno->UsoInterno->EstadoFolio){
                case NULL:
                    $objCondition = QQ::In(QQN::EstadoFolio()->Id, array(EstadoFolio::CARGA));
                    $this->lstEstadoFolioObject->SetCondition($objCondition);
                    break;
                case EstadoFolio::CARGA:
                    $objCondition = QQ::In(QQN::EstadoFolio()->Id, array(EstadoFolio::CARGA,EstadoFolio::ENVIADO_ESPERA));
                    $this->lstEstadoFolioObject->SetCondition($objCondition);
                    break;
                case EstadoFolio::ENVIADO_ESPERA:
                    $objCondition = QQ::In(QQN::EstadoFolio()->Id, array(EstadoFolio::VALIDACION,EstadoFolio::ENVIADO_ESPERA));
                    $this->lstEstadoFolioObject->SetCondition($objCondition);
                    break;
                case EstadoFolio::VALIDACION:
                    $objCondition = QQ::In(QQN::EstadoFolio()->Id, array(EstadoFolio::VALIDACION,EstadoFolio::NOTIFICACION));
                    $this->lstEstadoFolioObject->SetCondition($objCondition);
                    break;
                case EstadoFolio::NOTIFICACION:
                    $objCondition = QQ::In(QQN::EstadoFolio()->Id, array(EstadoFolio::CONFIRMACION,EstadoFolio::NOTIFICACION, EstadoFolio::CARGA));
                    $this->lstEstadoFolioObject->SetCondition($objCondition);
                    break;
                case EstadoFolio::CONFIRMACION:
                    $objCondition = QQ::In(QQN::EstadoFolio()->Id, array(EstadoFolio::CONFIRMACION,EstadoFolio::INSCRIPCION));
                    $this->lstEstadoFolioObject->SetCondition($objCondition);
                    break;
                    
            }
 
    }
}
?>
