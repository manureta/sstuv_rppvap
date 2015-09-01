<?php	
class FolioDataGrid extends FolioDataGridGen {
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strColumnsArray, $strControlId);
        
        if(Permission::EsCarga() && !Permission::EsAdministrador())
            $this->AddCondition(
                QQ::OrCondition(
                    QQ::Equal(QQN::Folio()->Creador,Session::GetObjUsuario()->IdUsuario),
                    QQ::Equal(QQN::Folio()->IdPartidoObject->CodPartido,Session::GetObjUsuario()->CodPartido)
                )
            );

        if(Permission::EsVisualizadorFiltrado())
            $this->AddCondition(QQ::Equal(QQN::Folio()->IdPartidoObject->CodPartido,Session::GetObjUsuario()->CodPartido));

        if(!Permission::EsUsoInterno(array('uso_interno_legal','uso_interno_tecnico','uso_interno_social'))){
            $this->AddCondition(QQ::NotEqual(QQN::Folio()->UsoInterno->EstadoFolio,EstadoFolio::NECESITA_AUTORIZACION));   
        }
    } 
   public $mdlPanel;
   

   protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        if (FolioDataGrid::$strColumnsArray['CodFolio']) $this->MetaAddColumn('CodFolio')->Title = QApplication::Translate('Folio');
        if (FolioDataGrid::$strColumnsArray['IdPartidoObject']) $this->MetaAddColumn(QQN::Folio()->IdPartidoObject)->Title = QApplication::Translate('IdPartidoObject');
        if (FolioDataGrid::$strColumnsArray['NombreBarrioOficial']) $this->MetaAddColumn('NombreBarrioOficial')->Title ='Nombre Oficial Barrio';
        if (FolioDataGrid::$strColumnsArray['TipoBarrioObject']) $this->MetaAddColumn(QQN::Folio()->TipoBarrioObject)->Title = "Tipo";
        $objSituacionRegistral = new QFilteredDataGridColumn("Situación Registral",'<?= $_CONTROL->CalcularSitRegistral($_ITEM);?>');
        $this->AddColumn($objSituacionRegistral); 
        $this->MetaAddColumn(QQN::Folio()->UsoInterno->EstadoFolioObject->Nombre)->Title = "Estado";
        $this->MetaAddColumn(QQN::Folio()->Reparticion)->Title = "Reparticion";
        $objColumnAcciones = new QFilteredDataGridColumn("Acciones", '<?= $_CONTROL->GetEditButton($_ITEM)->Render(false) . $_CONTROL->GetDuplicarButton($_ITEM)->Render(false)  . $_CONTROL->GetEnviarButton($_ITEM)->Render(false) .  $_CONTROL->GetConfirmarButton($_ITEM)->Render(false) . $_CONTROL->GetCancelarButton($_ITEM)->Render(false) . $_CONTROL->GetObjetarButton($_ITEM)->Render(false) . $_CONTROL->GetResolucionButton($_ITEM)->Render(false) . $_CONTROL->Get14449Button($_ITEM)->Render(false) . $_CONTROL->GetCaratulaButton($_ITEM)->Render(false) . $_CONTROL->GetFolioCompletoButton($_ITEM)->Render(false) . $_CONTROL->GetDeleteButton($_ITEM)->Render(false). $_CONTROL->GetMapaButton($_ITEM)->Render(false) ;?>', 'Width=35%', 'HorizontalAlign=left', 'HtmlEntities=false');
        
        $this->AddColumn($objColumnAcciones);

    }

    public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/edit/".$strParameter);
                          
    }

    


    public function GetEditButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn btn-xs btn-info');
        if(Permission::EsVisualizador() || !Permission::PuedeEditar1A4($obj)){
            $objButton->Icon = 'search';
            $objButton->Text = 'Ver';
            $objButton->ToolTip = 'Ver Folio';
        }            
        else{
            $objButton->Icon = 'edit';
            $objButton->Text = 'Editar';
            $objButton->ToolTip = 'Editar Folio';
        }
            
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnEdit_Click"));
        $objButton->Enabled = true;
        return $objButton;
    }

    public function GetCaratulaButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-yellow btn-xs');
        $objButton->Text = (Permission::EsAdministrador())?'C' :'Carátula';
        $objButton->Icon = 'print';
        $objButton->Enabled = true;
        $objButton->ToolTip = "Ver carátula";
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "Caratula_Click"));
        return $objButton;
    }

    public function GetDeleteButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-danger');
        $objButton->Icon = 'trash';
        $objButton->Text = 'Borrar';
        $objButton->ToolTip = 'Borrar Folio';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que quiere BORRAR este FOLIO?\\r\\nEsta acción no se puede deshacer")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnDelete_Click"));
        $objButton->Enabled = (Permission::PuedeBorrarFolio($obj));
        $objButton->Visible = (Permission::PuedeBorrarFolio($obj));
        return $objButton;
    }                 
       
     public function GetConfirmarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-success');
        $objButton->Icon = 'ok';
        $objButton->Text = 'Confirmar';
        $objButton->ToolTip = 'Confirmar Folio';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que quiere CONFIRMAR este FOLIO?\\r\\nEsta acción no se puede deshacer")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnConfirmar_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = ($obj->UsoInterno->EstadoFolio == EstadoFolio::NOTIFICACION && Permission::PuedeConfirmarFolio($obj));
        return $objButton;
    }                 
    public function GetCancelarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-warning');
        $objButton->Icon = 'remove';
        $objButton->Text = 'Actualizar';
        $objButton->ToolTip = 'El Folio necesita correcciones';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que este FOLIO necesita correcciones?")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnCancelar_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = ($obj->UsoInterno->EstadoFolio == EstadoFolio::NOTIFICACION && Permission::PuedeConfirmarFolio($obj));
        return $objButton;
    }
    public function GetObjetarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-danger');
        $objButton->Icon = 'lock';
        $objButton->Text = 'Objetar';
        $objButton->ToolTip = 'Desea objetar este Folio';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnObjetar_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = ($obj->UsoInterno->EstadoFolio == EstadoFolio::NOTIFICACION && Permission::PuedeObjetarFolio($obj));
        
        return $objButton;
    }                 
     public function GetEnviarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-success');
        $objButton->Icon = 'circle-arrow-right';
        $objButton->Text = 'Enviar';
        $objButton->ToolTip = 'Enviar Folio a la SSTUV';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que quiere ENVIAR este FOLIO?\\r\\n El Folio cambiará de estado y dejará de ser editable por usted hasta nuevo aviso")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnEnviar_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = ($obj->UsoInterno->EstadoFolio == EstadoFolio::CARGA && Permission::PuedeEnviarFolio($obj));
        return $objButton;
    }
    public function GetResolucionButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-yellow');
        $objButton->Icon = 'file';
        $objButton->Text = (Permission::EsAdministrador())?'R' : 'Resolución';
        $objButton->ToolTip = 'Descargar resolución';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnResolucion_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = Permission::PuedeDescargarResolucion($obj);
        return $objButton;
    }
    public function Get14449Button(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-yellow');
        $objButton->Text = (Permission::EsAdministrador())?'L' :'Ley 14.449';
        $objButton->Icon = 'file';
        $objButton->ToolTip = 'Ver documentación de intervención en el marco de la ley 14.449';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnLey_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = Permission::PuedeDescargarLey14449($obj);
        return $objButton;
    }

    public function GetFolioCompletoButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-yellow');
        $objButton->Text = (Permission::EsAdministrador())?'F' :'Folio';
        $objButton->Icon = 'print';
        $objButton->ToolTip = 'Imprimir el folio completo';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnFolioCompleto_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = Permission::PuedeDescargarFolioCompleto($obj);
        return $objButton;
    }

    public function GetMapaButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-yellow');
        $objButton->Text = (Permission::EsAdministrador())?'M' :'Mapa';
        $objButton->Icon = 'map-marker';
        $objButton->ToolTip = 'Ver Folio en el Mapa';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnVerMapa_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = true;
        return $objButton;
    }

    public function GetDuplicarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-warning');
        $objButton->Text = (Permission::EsAdministrador())?'D' :'Duplicar';
        $objButton->Icon = 'paste';
        $objButton->ToolTip = 'Duplicar este Folio';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnDuplicar_Click"));
        $objButton->Enabled = (Permission::PuedeDuplicar() && $obj->UsoInterno->EstadoFolio!=EstadoFolio::FOLIO_DUPLICADO);
        $objButton->Visible = (Permission::PuedeDuplicar() && $obj->UsoInterno->EstadoFolio!=EstadoFolio::FOLIO_DUPLICADO);
        return $objButton;
    }

    public function btnConfirmar_Click($strFormId, $strControlId, $strParameter){
        $objFolio=Folio::Load($strParameter);
        $objUsoInterno = $objFolio->UsoInterno;
        $objUsoInterno->EstadoFolio = EstadoFolio::CONFIRMACION;
        $objUsoInterno->Save();
        $this->MarkAsModified();
        Folio::CambioEstadoFolio($objFolio);
    }
    public function btnCancelar_Click($strFormId, $strControlId, $strParameter){
        $objFolio=Folio::Load($strParameter);
        $objUsoInterno = $objFolio->UsoInterno;
        $objUsoInterno->EstadoFolio = EstadoFolio::CARGA;
        $objUsoInterno->Save();
        $this->MarkAsModified();
        Folio::CambioEstadoFolio($objFolio);
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/edit/".$strParameter);
    }
    public function btnObjetar_Click($strFormId, $strControlId, $strParameter){
        
        $_SESSION['folio_a_objetar']=$strParameter;
        QApplication::ExecuteJavascript("$('#FolioObjetado').modal();");
    }
    
     public function btnEnviar_Click($strFormId, $strControlId, $strParameter){
        $objFolio=Folio::Load($strParameter);
        $objUsoInterno = $objFolio->UsoInterno;
        $objUsoInterno->EstadoFolio = EstadoFolio::ENVIADO_ESPERA;
        $objUsoInterno->Save();
        $this->MarkAsModified();
        Folio::CambioEstadoFolio($objFolio);
    }
   
   public function Caratula_Click($strFormId, $strControlId, $strParameter) {
        $url=__VIRTUAL_DIRECTORY__."/caratula.php?idfolio=$strParameter";        

        //QApplication::DisplayAlert("<iframe id='printf' name='printf' src='$url' width='100%' height='500'></iframe>");
        QApplication::ExecuteJavascript("window.open('$url');");

    }

    public function btnDelete_Click($strFormId,$strControlId,$strParameter){
        $obj = Folio::Load($strParameter);
        $obj->Delete();
        $this->MarkAsModified();

    }

    public function btnResolucion_Click($strFormId,$strControlId,$strParameter){    	    
        $upload_handler = new UploadHandler($strParameter,'resolucion');            
        $json=$upload_handler->get();        
        $links="";
        foreach ($json['files'] as $key => $file) {
            $link ="<p><a href=".$file->url." title=".$file->name." download=".$file->name.">".$file->name."</a></p>";
            $links=$links.$link;
        }
        if($links!==""){
            QApplication::DisplayAlert("<div id='files'>".$links."</div>");    
        }else{
            QApplication::DisplayAlert("No hay archivos disponibles");
        }
    }

    public function btnLey_Click($strFormId,$strControlId,$strParameter){        
        $upload_handler = new UploadHandler($strParameter,'habitat');            
        $json=$upload_handler->get();
        $links="";
        foreach ($json['files'] as $key => $file) {
            $link ="<p><a href=".$file->url." title=".$file->name." download=".$file->name.">".$file->name."</a></p>";
            $links=$links.$link;
        }
        if($links!==""){
            QApplication::DisplayAlert("<div id='files'>".$links."</div>");    
        }else{
            QApplication::DisplayAlert("No hay archivos disponibles");
        }
        
    }

    public function btnFolioCompleto_Click($strFormId, $strControlId, $strParameter) {
        $url=__VIRTUAL_DIRECTORY__."/caratula.php?idfolio=$strParameter&foliocompleto";        

        //QApplication::DisplayAlert("<iframe id='printf' name='printf' src='$url' width='100%' height='500'></iframe>");
        QApplication::ExecuteJavascript("window.open('$url');");

    }

    public function btnVerMapa_Click($strFormId, $strControlId, $strParameter){
        $objFolio=Folio::Load($strParameter);
        $xy=$objFolio->getParametrosMapa();
        $x=$xy["x"];
        $y=$xy["y"];

        $url="http://190.188.234.6/mapa/?map_x=$x&map_y=$y&map_zoom=16&map_opacity_Open%20Street%20Map=1";        
        QApplication::ExecuteJavascript("window.open('$url');");

    }

    public function btnDuplicar_Click($strFormId, $strControlId, $strParameter){
        $objFolio=Folio::Load($strParameter);
        $nuevoFolio=new Folio();
        $nuevoFolio=$objFolio;       
        $nuevoFolio->FolioOriginal=$objFolio->Id;
        $nuevoFolio->Matricula=$this->getNuevaMatricula($objFolio->IdPartido);
        $nuevoFolio->Save(true);

        //Uso interno
        $ui = new UsoInterno();
        $viejoUi=UsoInterno::Load($strParameter);
        $ui=$viejoUi;
        $ui->IdFolio = $nuevoFolio->Id;
        $ui->EstadoFolio=EstadoFolio::FOLIO_DUPLICADO;
        $ui->Save(true);

        //Nomenclaturas
        Permission::Log("Duplicando las nomenclaturas del FOLIO ".$strParameter);
        try {
            $arrNomenclasOriginales=Nomenclatura::QueryArray(QQ::Equal(QQN::Nomenclatura()->IdFolio,$strParameter));
            foreach ($arrNomenclasOriginales as $nomenclaOriginal) {               
                $nom = new Nomenclatura();
                $nom=$nomenclaOriginal;
                $nom->IdFolio=$nuevoFolio->Id;
                $nom->Save(true);                
            }                     
        } catch (Exception $e) {           
            Permission::Log($e->getMessage());
        }

        //Hoja 3
        try {

            $objCondiciones=new CondicionesSocioUrbanisticas();                        
            $objCondiciones = CondicionesSocioUrbanisticas::QuerySingle(QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio,$strParameter));
            $objCondiciones->IdFolio = $nuevoFolio->Id;
            $objCondiciones->Save(true);

            $objEquipamiento=new Equipamiento();                        
            $objEquipamiento = Equipamiento::QuerySingle(QQ::Equal(QQN::Equipamiento()->IdFolio,$strParameter));
            $objEquipamiento->IdFolio = $nuevoFolio->Id;
            $objEquipamiento->Save(true);

            $objTransporte=new Transporte();                        
            $objTransporte = Transporte::QuerySingle(QQ::Equal(QQN::Transporte()->IdFolio,$strParameter));
            $objTransporte->IdFolio = $nuevoFolio->Id;
            $objTransporte->Save(true);

            $objInfraestructura=new Infraestructura();                        
            $objInfraestructura = Infraestructura::QuerySingle(QQ::Equal(QQN::Infraestructura()->IdFolio,$strParameter));
            $objInfraestructura->IdFolio = $nuevoFolio->Id;
            $objInfraestructura->Save(true);

            $objAmbiental=new SituacionAmbiental();                        
            $objAmbiental = SituacionAmbiental::QuerySingle(QQ::Equal(QQN::SituacionAmbiental()->IdFolio,$strParameter));
            $objAmbiental->IdFolio = $nuevoFolio->Id;
            $objAmbiental->Save(true);

        } catch (Exception $e) {
         Permission::Log($e->getMessage());   
        }


        //Hoja 4
        try {

            $objRegularizacion=new Regularizacion();                        
            $objRegularizacion = Regularizacion::QuerySingle(QQ::Equal(QQN::Regularizacion()->IdFolio,$strParameter));
            $objRegularizacion->IdFolio = $nuevoFolio->Id;
            $objRegularizacion->Save(true);

            $objEncuadreLegal=new EncuadreLegal();                        
            $objEncuadreLegal = EncuadreLegal::QuerySingle(QQ::Equal(QQN::EncuadreLegal()->IdFolio,$strParameter));
            $objEncuadreLegal->IdFolio = $nuevoFolio->Id;
            $objEncuadreLegal->Save(true);

            $objAntecedentes=new Antecedentes();                        
            $objAntecedentes = Antecedentes::QuerySingle(QQ::Equal(QQN::Antecedentes()->IdFolio,$strParameter));
            $objAntecedentes->IdFolio = $nuevoFolio->Id;
            $objAntecedentes->Save(true);

            $objOrganismosDeIntervencion=new OrganismosDeIntervencion();                        
            $objOrganismosDeIntervencion = OrganismosDeIntervencion::QuerySingle(QQ::Equal(QQN::OrganismosDeIntervencion()->IdFolio,$strParameter));
            $objOrganismosDeIntervencion->IdFolio = $nuevoFolio->Id;
            $objOrganismosDeIntervencion->Save(true);

        } catch (Exception $e) {
         Permission::Log($e->getMessage());   
        }

        QApplication::DisplayAlert("se duplico el folio ".$objFolio->CodFolio. "a ".$nuevoFolio->Id  );

    }

    
    public function CalcularSitRegistral(Folio $obj){
        $mapeo=$obj->UsoInterno->MapeoPreliminar;
        $no_corresponde=$obj->UsoInterno->NoCorrespondeInscripcion;
        $prov=$obj->UsoInterno->ResolucionInscripcionProvisoria;
        $def=$obj->UsoInterno->ResolucionInscripcionDefinitiva;

        if($no_corresponde) return 'No Corresponde';
        if($def!='')return 'Inscripción Definitiva';
        if($prov!='')return 'Inscripción Provisoria';
        if($mapeo)return 'Mapeo Preliminar';
        return ''; 
    }

    public function getNuevaMatricula($IdPartido){
        error_log("buscando un nuevo valor de matricula para el folio");
        if($IdPartido){
            //calculo Matricula
            $arrFoliosPartido=Folio::QueryArray(QQ::Equal(QQN::Folio()->IdPartidoObject->Id,$IdPartido));
            $arrMatriculas = array();
            foreach ($arrFoliosPartido as $folio) {
                array_push($arrMatriculas,intval($folio->Matricula));
            }
            $ultimo=max($arrMatriculas);            
            $nueva_matricula=str_pad($ultimo+1, 4, '0', STR_PAD_LEFT);
            return $nueva_matricula;
        }
        
            
     }



}
?>
