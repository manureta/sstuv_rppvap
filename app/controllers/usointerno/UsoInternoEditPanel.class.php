<?php
class UsoInternoEditPanel extends UsoInternoEditPanelGen {

     public $mctUsoInterno;
     protected $strTemplate;

    //id variables for meta_create
    protected $intIdFolio;
    protected $objFolio;
    
    public $lstInformeUrbanistico;
    public $lstRegularizacionTienePlano;
    public $lstLey14449;
    public $lstTieneCenso;

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
        'txtRegularizacionTienePlano' => true,
        'chkRegularizacionCircular10Catastro' => true,
        'lstRegularizacionEstadoProcesoObject' => true,
        'txtNumExpediente' => true,
        'txtRegistracionLegajo' => true,
        'txtRegistracionFecha' => true,
        'txtRegistracionFolio' => true,
        'txtGeodesiaNum' => true,
        'txtGeodesiaAnio' => true,
        'txtLey14449' => true,
        'txtTieneCenso' => true,
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
        $this->lstInformeUrbanistico->Name="Cuenta con informe urbanístico";    
        $this->lstInformeUrbanistico->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstInforme_Change'));
        $this->txtInformeUrbanisticoFecha->Visible=false;


        // TIENE PLANO
        $this->lstRegularizacionTienePlano=new QListBox($this);
        switch ($this->txtRegularizacionTienePlano->Text) {                
                case 'si':
                    $this->lstRegularizacionTienePlano->AddItem(' Si ', 'si');
                    $this->lstRegularizacionTienePlano->AddItem(' No ', 'no');
                    $this->lstRegularizacionTienePlano->AddItem(' Sin Dato ', 'sin_dato');                
                    break;
                case 'no':    
                    $this->lstRegularizacionTienePlano->AddItem(' No ', 'no');
                    $this->lstRegularizacionTienePlano->AddItem(' Sin Dato ', 'sin_dato');                
                    $this->lstRegularizacionTienePlano->AddItem(' Si ', 'si');
                    break;
                default:
                    $this->lstRegularizacionTienePlano->AddItem(' Sin Dato ', 'sin_dato');
                    $this->lstRegularizacionTienePlano->AddItem(' Si ', 'si');
                    $this->lstRegularizacionTienePlano->AddItem(' No ', 'no'); 
                    $this->txtRegularizacionTienePlano->Text='sin_dato'; // para inicializarlo           
                    break;                    
            }

        $this->lstRegularizacionTienePlano->Name="Plano en trámite";    
        $this->lstRegularizacionTienePlano->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstRegularizacionTienePlano_Change'));
        $this->txtRegularizacionTienePlano->Visible=false;

        // TIENE CENSO

        $this->lstTieneCenso=new QListBox($this);
        switch ($this->txtTieneCenso->Text) {                
                case 'si':
                    $this->lstTieneCenso->AddItem(' Si ', 'si');
                    $this->lstTieneCenso->AddItem(' No ', 'no');
                    $this->lstTieneCenso->AddItem(' Sin Dato ', 'sin_dato');                
                    break;
                case 'no':    
                    $this->lstTieneCenso->AddItem(' No ', 'no');
                    $this->lstTieneCenso->AddItem(' Sin Dato ', 'sin_dato');                
                    $this->lstTieneCenso->AddItem(' Si ', 'si');
                    break;
                default:
                    $this->lstTieneCenso->AddItem(' Sin Dato ', 'sin_dato');
                    $this->lstTieneCenso->AddItem(' Si ', 'si');
                    $this->lstTieneCenso->AddItem(' No ', 'no'); 
                    $this->txtTieneCenso->Text='sin_dato'; // para inicializarlo           
                    break;                    
            }

        $this->lstTieneCenso->Name="Tiene censo de la SSTUV";
        $this->lstTieneCenso->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstTieneCenso_Change'));
        $this->txtTieneCenso->Visible=false;


        // LEY 14449

        $this->lstLey14449=new QListBox($this);
        switch ($this->txtLey14449->Text) {                
                case 'si':
                    $this->lstLey14449->AddItem(' Si ', 'si');
                    $this->lstLey14449->AddItem(' No ', 'no');
                    $this->lstLey14449->AddItem(' Sin Dato ', 'sin_dato');                
                    break;
                case 'no':    
                    $this->lstLey14449->AddItem(' No ', 'no');
                    $this->lstLey14449->AddItem(' Sin Dato ', 'sin_dato');                
                    $this->lstLey14449->AddItem(' Si ', 'si');
                    break;
                default:
                    $this->lstLey14449->AddItem(' Sin Dato ', 'sin_dato');
                    $this->lstLey14449->AddItem(' Si ', 'si');
                    $this->lstLey14449->AddItem(' No ', 'no'); 
                    $this->txtLey14449->Text='sin_dato'; // para inicializarlo           
                    break;                    
            }

        $this->lstLey14449->Name="Intervención en el marco de la ley 14.449";
        $this->lstLey14449->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstLey14449_Change'));
        $this->txtLey14449->Visible=false;

        

        // Partido de Geodesia
        if($this->txtGeodesiaPartido->Text=="") $this->txtGeodesiaPartido->Text=$this->objFolio->IdPartidoObject->CodPartido;
        //$this->txtGeodesiaPartido->Text=$this->objFolio->IdPartidoObject->CodPartido;

        $this->blnAutoRenderChildrenWithName = false;
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        
        $this->SetEstadoCondition();

        //Archivos adjuntos de sisteme registral
        
        $url_upload_resolucion="/registro/upload.php?idfolio=".$this->objFolio->Id."&tipo=resolucion";
        $url_upload_informe="/registro/upload.php?idfolio=".$this->objFolio->Id."&tipo=informe";
        $url_upload_habitat="/registro/upload.php?idfolio=".$this->objFolio->Id."&tipo=habitat";
        if(Permission::PuedeAdjuntar($this->objFolio)){
            $this->boolPuedeAdjuntar=true;    
            QApplication::ExecuteJavascript("uploadManager('$url_upload_resolucion','#fileupload2','#files_resolucion')");
            QApplication::ExecuteJavascript("uploadManager('$url_upload_informe','#fileupload3','#files_informe')");
            QApplication::ExecuteJavascript("uploadManager('$url_upload_habitat','#fileupload4','#files_habitat')");
        }else{
            if(Permission::PuedeVerAdjuntados($this->objFolio)){                
                QApplication::ExecuteJavascript("verAdjuntados('$url_upload_resolucion','#files_resolucion')");
                QApplication::ExecuteJavascript("verAdjuntados('$url_upload_informe','#files_informe')");
                QApplication::ExecuteJavascript("verAdjuntados('$url_upload_habitat','#files_habitat')");         
            }
        }


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
        if (in_array('txtRegularizacionTienePlano',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionTienePlano'] = $this->mctUsoInterno->txtRegularizacionTienePlano_Create();            
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
            $this->objControlsArray['txtRegistracionLegajo']->addCssClass("registracion_legajo");
        if (in_array('txtRegistracionFecha',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionFecha'] = $this->mctUsoInterno->txtRegistracionFecha_Create();
            $this->objControlsArray['txtRegistracionFecha']->addCssClass("registracion_fecha");
        if (in_array('txtRegistracionFolio',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionFolio'] = $this->mctUsoInterno->txtRegistracionFolio_Create();
            $this->objControlsArray['txtRegistracionFolio']->addCssClass("registracion_folio");
        if (in_array('txtGeodesiaNum',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaNum'] = $this->mctUsoInterno->txtGeodesiaNum_Create();
            $this->objControlsArray['txtGeodesiaNum']->addCssClass("geodesia_num");
        if (in_array('txtGeodesiaAnio',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaAnio'] = $this->mctUsoInterno->txtGeodesiaAnio_Create();                
            $this->objControlsArray['txtGeodesiaAnio']->addCssClass("geodesia_anio");
        if (in_array('txtLey14449',$strControlsArray)) 
            $this->objControlsArray['txtLey14449'] = $this->mctUsoInterno->txtLey14449_Create();
        if (in_array('txtTieneCenso',$strControlsArray)) 
            $this->objControlsArray['txtTieneCenso'] = $this->mctUsoInterno->txtTieneCenso_Create();
        if (in_array('txtFechaCenso',$strControlsArray)) 
            $this->objControlsArray['txtFechaCenso'] = $this->mctUsoInterno->txtFechaCenso_Create();
            $this->objControlsArray['txtFechaCenso']->Name="Fecha del último censo";
        if (in_array('txtGeodesiaPartido',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaPartido'] = $this->mctUsoInterno->txtGeodesiaPartido_Create();    
            $this->objControlsArray['txtGeodesiaPartido']->addCssClass("geodesia_partido");
        if (in_array('lstEstadoFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstEstadoFolioObject'] = $this->mctUsoInterno->lstEstadoFolioObject_Create();
            $this->objControlsArray['lstEstadoFolioObject']->Name="Estado del Folio";
    }

    public function lstInforme_Change($strFormId, $strControlId, $strParameter) {       
        $this->txtInformeUrbanisticoFecha->Text=$this->lstInformeUrbanistico->SelectedValue;
    }

    public function lstRegularizacionTienePlano_Change($strFormId, $strControlId, $strParameter) {       
        $this->txtRegularizacionTienePlano->Text=$this->lstRegularizacionTienePlano->SelectedValue;
    }

    public function lstTieneCenso_Change($strFormId, $strControlId, $strParameter) {       
        $this->txtTieneCenso->Text=$this->lstTieneCenso->SelectedValue;
    }

    public function lstLey14449_Change($strFormId, $strControlId, $strParameter) {       
        $this->txtLey14449->Text=$this->lstLey14449->SelectedValue;
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
