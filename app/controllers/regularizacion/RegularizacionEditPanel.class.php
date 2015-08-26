    <?php
class RegularizacionEditPanel extends RegularizacionEditPanelGen {

    public $mctRegularizacion;
    public $objFolio;
    //id variables for meta_create
    protected $intId;
    public $pnlEncuadre;
    public $pnlAntecedentes;
    public $pnlOrganismos;

    protected $objEncuadre;
    protected $objAntecedentes;
    protected $objOrganismos;
    //Me pidieron que mueva variables de uso interno a hoja 4
    public $pnlUsoInterno;
    protected $objUsoInterno;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkProcesoIniciado' => true,
        'lstAntecedentesAsIdFolio' => false,
        'lstEncuadreLegalAsIdFolio' => false,
        'lstRegistracionAsIdFolio' => false,
        'txtObservaciones' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(RegularizacionEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray,$intId,$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;

        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;
        $this->lstIdFolioObject->Visible = false;
        
        // Si proceso iniciado esta tildado hay que mostrar encuadre legal
        $checked=($this->chkProcesoIniciado->Checked==1)? true: false;
        if($checked)QApplication::ExecuteJavascript("mostrarEncuadre(true)");
        $this->chkProcesoIniciado->AddAction(new QClickEvent(), new QConfirmAction(sprintf("Al cambiar el estado de 'Proceso Iniciado'\\r\\n se inicializan o borran todas las opciones de 'Encuadre Legal' de acuerdo al caso.\\r\\n ¿Está seguro?")));        
        $this->chkProcesoIniciado->AddAction(new QClickEvent(), new QAjaxControlAction($this,"ProcesoIniciado_chk"));
        

        $this->objEncuadre=EncuadreLegal::QuerySingle(QQ::Equal(QQN::EncuadreLegal()->IdFolio,QApplication::QueryString("id")));                        
        $this->pnlEncuadre = new EncuadreLegalEditPanel($this,EncuadreLegalEditPanel::$strControlsArray,$this->objEncuadre->Id);
        $this->pnlEncuadre->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEncuadre->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEncuadre->lstIdFolioObject->Enabled = false;
        $this->pnlEncuadre->lstIdFolioObject->Visible = false;

        //$this->pnlEncuadre->chkTieneExpropiacion->AddAction(new QClickEvent(),new QAjaxControlAction($this,"TieneExpropiacion_chk"));           
        //$this->TieneExpropiacion_chk(true);
        $this->pnlEncuadre->chkTieneExpropiacion->AddAction(new QClickEvent(), new QConfirmAction(sprintf("Al tildar 'Expropiación' se habilitarán nuevas variables asociadas. \\En cambio, al destildar 'Expropiación' se BORRARÁN estas nuevas variables \\n ¿Está seguro?")));        
        $this->pnlEncuadre->chkTieneExpropiacion->AddAction(new QClickEvent(),new QAjaxControlAction($this,"TieneExpropiacion_chk")); 
        $this->InicializarExpropiacion();

        $this->objAntecedentes=Antecedentes::QuerySingle(QQ::Equal(QQN::Antecedentes()->IdFolio,QApplication::QueryString("id")));                                
        $this->pnlAntecedentes = new AntecedentesEditPanel($this,AntecedentesEditPanel::$strControlsArray,$this->objAntecedentes->Id);
        $this->pnlAntecedentes->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlAntecedentes->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlAntecedentes->lstIdFolioObject->Enabled = false;
        $this->pnlAntecedentes->lstIdFolioObject->Visible = false;        

        // Si se tilda sin intervencion hay que ocultar org de intervencion
        $sinintervencion=($this->pnlAntecedentes->chkSinIntervencion->Checked==1)? true: false;        
        if($sinintervencion)QApplication::ExecuteJavascript("SinIntervencion(true)");
        
        $this->pnlAntecedentes->chkSinIntervencion->AddAction(new QClickEvent(),new QConfirmAction(sprintf("Al tildar 'Sin Intervención' se anulan las demas opciones \\r\\n y se deshabilitan las opciones de 'Organismos de intervención'.\\r\\n ¿Está seguro?")));
        $this->pnlAntecedentes->chkSinIntervencion->AddAction(new QClickEvent(),new QAjaxControlAction($this,"sinintervencion_chk"));
        $this->pnlAntecedentes->chkObrasInfraestructura->AddAction(new QClickEvent(),new QAjaxControlAction($this,"deshabilitar_sinintervencion"));
        $this->pnlAntecedentes->chkEquipamientos->AddAction(new QClickEvent(),new QAjaxControlAction($this,"deshabilitar_sinintervencion"));
        $this->pnlAntecedentes->chkIntervencionesEnViviendas->AddAction(new QClickEvent(),new QAjaxControlAction($this,"deshabilitar_sinintervencion"));
        


        $this->objOrganismos=OrganismosDeIntervencion::QuerySingle(QQ::Equal(QQN::OrganismosDeIntervencion()->IdFolio,QApplication::QueryString("id")));                        
        $this->pnlOrganismos = new OrganismosDeIntervencionEditPanel($this,OrganismosDeIntervencionEditPanel::$strControlsArray,$this->objOrganismos->Id);
        $this->pnlOrganismos->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlOrganismos->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlOrganismos->lstIdFolioObject->Enabled = false;
        $this->pnlOrganismos->lstIdFolioObject->Visible = false;                
        
        // PANELES DE INFORME URBANISTICO Y REGULARIZACION
        // QUE ORIGINALMENTE SON DE USO INTERNO
        // LOS EVENTOS SIGUEN ESTANDO EN EL CONTROLLER DE USO INTERNO
       
        $this->objUsoInterno=UsoInterno::QuerySingle(QQ::Equal(QQN::UsoInterno()->IdFolio,QApplication::QueryString("id")));  
        
        $this->pnlUsoInterno = new UsoInternoEditPanel($this,UsoInternoEditPanel::$strControlsArray,$this->objUsoInterno->IdFolio);
        $this->pnlUsoInterno->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlUsoInterno->lstIdFolioObject->Text = $this->objFolio->__toString();
        //Escondo todas las variables de uso interno para habilitar solo las que necesito
        foreach ($this->pnlUsoInterno->objControlsArray as $objControl) {
            $objControl->Enabled=false;
            $objControl->Visible=false;
        }
        //informe urbanistico
        $this->pnlUsoInterno->Template=null;
        $this->pnlUsoInterno->Form->RemoveControl($this->pnlUsoInterno->pnlTabs->ControlId, true);
        
        $puedeEditar_InformeUrbanistico=(Permission::PuedeEditar1A4($this->objFolio)||Permission::EsUsoInterno(array("uso_interno_tecnico")));
        $PuedeEditar_Regularizacion=(Permission::PuedeEditar1A4($this->objFolio)||Permission::EsUsoInterno(array("uso_interno_tecnico","uso_interno_social")));

        $this->pnlUsoInterno->lstInformeUrbanistico->Enabled = $puedeEditar_InformeUrbanistico;
        $this->pnlUsoInterno->lstInformeUrbanistico->Visible = true;

        $this->pnlUsoInterno->txtFechaInformeUrbanistico->Visible = true;
        $this->pnlUsoInterno->txtFechaInformeUrbanistico->Enabled = $puedeEditar_InformeUrbanistico;
        //regularizacion
        $this->pnlUsoInterno->lstRegularizacionTienePlano->Visible = true;
        $this->pnlUsoInterno->lstRegularizacionTienePlano->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->txtRegularizacionFechaInicio->Visible = true;
        $this->pnlUsoInterno->txtRegularizacionFechaInicio->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->chkRegularizacionCircular10Catastro->Visible = true;
        $this->pnlUsoInterno->chkRegularizacionCircular10Catastro->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->txtGeodesiaPartido->Visible = true;
        $this->pnlUsoInterno->txtGeodesiaPartido->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->txtGeodesiaNum->Visible = true;
        $this->pnlUsoInterno->txtGeodesiaNum->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->txtGeodesiaAnio->Visible = true;
        $this->pnlUsoInterno->txtGeodesiaAnio->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->txtRegistracionLegajo->Visible = true;
        $this->pnlUsoInterno->txtRegistracionLegajo->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->txtRegistracionFolio->Visible = true;
        $this->pnlUsoInterno->txtRegistracionFolio->Enabled = $PuedeEditar_Regularizacion;


        $this->pnlUsoInterno->txtRegistracionFecha->Visible = true;
        $this->pnlUsoInterno->txtRegistracionFecha->Enabled = $PuedeEditar_Regularizacion;

         $this->pnlUsoInterno->lstTieneCenso->Visible = true;
        $this->pnlUsoInterno->lstTieneCenso->Enabled = $PuedeEditar_Regularizacion;

         $this->pnlUsoInterno->txtFechaCenso->Visible = true;
        $this->pnlUsoInterno->txtFechaCenso->Enabled = $PuedeEditar_Regularizacion;

        $this->pnlUsoInterno->lstRegularizacionEstadoProcesoObject->Visible = true;
        $this->pnlUsoInterno->lstRegularizacionEstadoProcesoObject->Enabled = $PuedeEditar_Regularizacion;
        //OCULTO BOTONES
        $this->pnlUsoInterno->btnSave->Enabled=false;
        $this->pnlUsoInterno->btnSave->Visible=false;
        $this->pnlUsoInterno->btnCancel->Enabled=false;
        $this->pnlUsoInterno->btnCancel->Visible=false;
        $this->pnlUsoInterno->btnEvolucion->Visible=false;

        // FIN DE PANELES QUE ERAN DE USO INTERNO

        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);

        //$this->blnAutoRenderChildrenWithName = true;
        if(!Permission::PuedeEditar1A4($this->objFolio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }

        if(Permission::EsUsoInterno(array("uso_interno_legal","uso_interno_tecnico","uso_interno_social"))){

            $this->chkProcesoIniciado->Enabled=true;

            $this->pnlEncuadre->chkDecreto222595->Enabled = true;
            $this->pnlEncuadre->chkLey24374->Enabled = true;
            $this->pnlEncuadre->chkDecreto81588->Enabled = true;
            $this->pnlEncuadre->chkLey23073->Enabled = true;
            $this->pnlEncuadre->chkDecreto468696->Enabled = true;
            $this->pnlEncuadre->chkLey14449->Enabled = true;
            $this->pnlEncuadre->txtExpropiacion->Enabled = true;
            $this->pnlEncuadre->txtOtros->Enabled = true;
            $this->pnlEncuadre->chkTieneExpropiacion->Enabled = true;

            $this->pnlAntecedentes->chkSinIntervencion->Enabled=true;
            $this->pnlAntecedentes->chkObrasInfraestructura->Enabled=true;
            $this->pnlAntecedentes->chkEquipamientos->Enabled=true;
            $this->pnlAntecedentes->chkIntervencionesEnViviendas->Enabled=true;
            $this->pnlAntecedentes->txtOtros->Enabled=true;

            $this->pnlOrganismos->chkNacional->Enabled=true;
            $this->pnlOrganismos->chkProvincial->Enabled=true;
            $this->pnlOrganismos->chkMunicipal->Enabled=true;
            $this->pnlOrganismos->txtFechaIntervencion->Enabled = true;
            $this->pnlOrganismos->txtProgramas->Enabled=true;

            $this->txtObservaciones->Enabled=true;
        }
        
        if(Permission::EsUsoInterno(array("uso_interno_tecnico"))){

        }


        //ADJUNTOS DE INFORME URBANISTICO
        $url_upload_informe=__VIRTUAL_DIRECTORY__."/upload.php?idfolio=".$this->objFolio->Id."&tipo=informe";
		if(Permission::PuedeAdjuntar($this->objFolio)){
			$this->pnlUsoInterno->boolPuedeAdjuntar=true;
            QApplication::ExecuteJavascript("uploadManager('$url_upload_informe','#fileupload3','#files_informe')");                
        }else{
            if(Permission::PuedeVerAdjuntados($this->objFolio)){                
                if(Permission::SoloAdjuntaInformeUrbanistico()){
                	$this->pnlUsoInterno->boolPuedeAdjuntar=true;
                    QApplication::ExecuteJavascript("uploadManager('$url_upload_informe','#fileupload3','#files_informe')");
                }else{
                    if(Permission::PuedeVerAdjuntosInformeUrbanistico()){
                        QApplication::ExecuteJavascript("verAdjuntados('$url_upload_informe','#files_informe')");    
                    }
                    
                }
                  
            }
        }

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
            $this->objControlsArray['chkProcesoIniciado']->Name="¿Se inició un proceso de regularización?"; 
        if (in_array('lstAntecedentesAsIdFolio',$strControlsArray)) 
            $this->objControlsArray['lstAntecedentesAsIdFolio'] = $this->mctRegularizacion->lstAntecedentesAsIdFolio_Create();
        if (in_array('lstEncuadreLegalAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstEncuadreLegalAsIdFolio'] = $this->mctRegularizacion->lstEncuadreLegalAsIdFolio_Create();
        if (in_array('lstRegistracionAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstRegistracionAsIdFolio'] = $this->mctRegularizacion->lstRegistracionAsIdFolio_Create();
        if (in_array('txtObservaciones',$strControlsArray)) 
            $this->objControlsArray['txtObservaciones'] = $this->mctRegularizacion->txtObservaciones_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
     public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the RegularizacionMetaControl
        $this->mctRegularizacion->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->pnlEncuadre->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlAntecedentes->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlOrganismos->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlUsoInterno->btnSave_Click($strFormId, $strControlId, $strParameter);
        
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter){
        QApplication::ExecuteJavascript("window.history.back();");
    }


    public function sinintervencion_chk($strFormId, $strControlId, $strParameter){
        if($this->pnlAntecedentes->chkSinIntervencion->Checked){
            $this->pnlAntecedentes->chkObrasInfraestructura->Checked=false;
            $this->pnlAntecedentes->chkEquipamientos->Checked=false;
            $this->pnlAntecedentes->chkIntervencionesEnViviendas->Checked=false;
            $this->pnlAntecedentes->txtOtros->Text="";    
            
            // reseteo organismos
            $this->pnlOrganismos->chkNacional->Checked=false;
            $this->pnlOrganismos->chkProvincial->Checked=false;
            $this->pnlOrganismos->chkMunicipal->Checked=false;
            //$this->pnlOrganismos->calFechaIntervencion' => true,
            $this->pnlOrganismos->txtProgramas->Text="";
            QApplication::ExecuteJavascript("SinIntervencion(true)");
        }else{
            QApplication::ExecuteJavascript("SinIntervencion(false)");
        }
                
    }

    public function ProcesoIniciado_chk($strFormId, $strControlId, $strParameter){
        if(!$this->chkProcesoIniciado->Checked){            
          $this->ResetearEncuadreLegal();           
        }
        QApplication::ExecuteJavascript("mostrarEncuadre()");
                
    }

    public function ResetearEncuadreLegal(){
        $this->pnlEncuadre->chkDecreto222595->Checked=false;
        $this->pnlEncuadre->chkLey24374->Checked=false;
        $this->pnlEncuadre->chkDecreto81588->Checked=false;
        $this->pnlEncuadre->chkLey23073->Checked=false;
        $this->pnlEncuadre->chkDecreto468696->Checked=false;
        $this->pnlEncuadre->chkLey14449->Checked=false;        
        $this->pnlEncuadre->txtOtros->Text='';
        //reseteo expropiaciones
        $this->pnlEncuadre->chkTieneExpropiacion->Checked=false;
        $this->ResetearExpropiacion();
    }


    public function deshabilitar_sinintervencion(){
        $this->pnlAntecedentes->chkSinIntervencion->Checked=false;
        QApplication::ExecuteJavascript("SinIntervencion(false)");
    }

      protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Regularizacion::GenderMale() ? 'e' : 'a'), Regularizacion::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctRegularizacion->EditMode;
        }
    }

    public function ResetearExpropiacion($mensaje){

            $this->pnlEncuadre->txtExpropiacion->Text='';
            $this->pnlEncuadre->txtExpropiacion->Visible=false;
            $this->pnlEncuadre->txtExpropiacion->Enabled=false;

            $this->pnlEncuadre->txtFechaSancion->Text='';
            $this->pnlEncuadre->txtFechaSancion->Enabled=false;
            $this->pnlEncuadre->txtFechaSancion->Visible=false;
        
            $this->pnlEncuadre->txtFechaVencimiento->Text=''; 
            $this->pnlEncuadre->txtFechaVencimiento->Enabled=false;
            $this->pnlEncuadre->txtFechaVencimiento->Visible=false;
            
            $this->pnlEncuadre->txtNomenclaturaTextoLey->Text='';
            $this->pnlEncuadre->txtNomenclaturaTextoLey->Enabled=false;
            $this->pnlEncuadre->txtNomenclaturaTextoLey->Visible=false;

            $this->pnlEncuadre->txtTasacionAdministrativa->Text='';
            $this->pnlEncuadre->txtTasacionAdministrativa->Enabled=false;
            $this->pnlEncuadre->txtTasacionAdministrativa->Visible=false;
            
            $this->pnlEncuadre->txtPrecioPagado->Text='';
            $this->pnlEncuadre->txtPrecioPagado->Enabled=false;
            $this->pnlEncuadre->txtPrecioPagado->Visible=false;
            
            $this->pnlEncuadre->txtJuzgado->Text='';
            $this->pnlEncuadre->txtJuzgado->Enabled=false;
            $this->pnlEncuadre->txtJuzgado->Visible=false;
            
            $this->pnlEncuadre->lstEstadoProcesoExpropiacionObject->Value=null;
            $this->pnlEncuadre->lstEstadoProcesoExpropiacionObject->Text=null;
            $this->pnlEncuadre->lstEstadoProcesoExpropiacionObject->Enabled=false;
            $this->pnlEncuadre->lstEstadoProcesoExpropiacionObject->Visible=false;
            
            $this->pnlEncuadre->txtMemoriaDescriptiva->Text='';
            $this->pnlEncuadre->txtMemoriaDescriptiva->Enabled=false;
            $this->pnlEncuadre->txtMemoriaDescriptiva->Visible=false;

            if($mensaje=="warning")QApplication::DisplayAlert("Advertencia: Usted acaba de destildar 'Expropiación' por lo tanto se borraron sus variables asociadas, si no esta seguro presione el botón <b>Cancelar</b> al pie de la página.");
    }

    public function InicializarExpropiacion(){

            $mostrar=($this->pnlEncuadre->chkTieneExpropiacion->Checked);
            $puede_editar=Permission::PuedeEditarExpropiaciones($this->objFolio);

            // Si se puede ver
            $this->pnlEncuadre->txtExpropiacion->Visible=$mostrar;
            $this->pnlEncuadre->txtFechaSancion->Visible=$mostrar;        
            $this->pnlEncuadre->txtFechaVencimiento->Visible=$mostrar;            
            $this->pnlEncuadre->txtNomenclaturaTextoLey->Visible=$mostrar;
            $this->pnlEncuadre->txtTasacionAdministrativa->Visible=$mostrar;            
            $this->pnlEncuadre->txtPrecioPagado->Visible=$mostrar;            
            $this->pnlEncuadre->txtJuzgado->Visible=$mostrar;            
            $this->pnlEncuadre->lstEstadoProcesoExpropiacionObject->Visible=$mostrar;            
            $this->pnlEncuadre->txtMemoriaDescriptiva->Visible=$mostrar;
            
            //si se puede editar                        
            $this->pnlEncuadre->txtExpropiacion->Enabled=$puede_editar;
            $this->pnlEncuadre->txtFechaSancion->Enabled=$puede_editar;        
            $this->pnlEncuadre->txtFechaVencimiento->Enabled=$puede_editar;            
            $this->pnlEncuadre->txtNomenclaturaTextoLey->Enabled=$puede_editar;
            $this->pnlEncuadre->txtTasacionAdministrativa->Enabled=$puede_editar;            
            $this->pnlEncuadre->txtPrecioPagado->Enabled=$puede_editar;            
            $this->pnlEncuadre->txtJuzgado->Enabled=$puede_editar;            
            $this->pnlEncuadre->lstEstadoProcesoExpropiacionObject->Enabled=$puede_editar;            
            $this->pnlEncuadre->txtMemoriaDescriptiva->Enabled=$puede_editar;

    }

    public function TieneExpropiacion_chk($inicializar=false){
        
        if($this->pnlEncuadre->chkTieneExpropiacion->Checked){
            
            $this->InicializarExpropiacion();
            

        }else{
            $mensaje="warning";
            if($inicializar===true){
                $mensaje="inicio";
            }
            $this->ResetearExpropiacion($mensaje);
             
        }
    }

}
?>
