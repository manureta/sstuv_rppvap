<?php	
class FolioDataGrid extends FolioDataGridGen {
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strColumnsArray, $strControlId);
        
        if(Permission::EsCarga() && !Permission::EsAdministrador())
            $this->AddCondition(QQ::Equal(QQN::Folio()->Creador,Session::GetObjUsuario()->IdUsuario));

        if(Permission::EsVisualizadorFiltrado())
            $this->AddCondition(QQ::Equal(QQN::Folio()->IdPartidoObject->CodPartido,Session::GetObjUsuario()->CodPartido));
    } 
   public $mdlPanel;
   protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        if (FolioDataGrid::$strColumnsArray['CodFolio']) $this->MetaAddColumn('CodFolio')->Title = QApplication::Translate('CodFolio');
        if (FolioDataGrid::$strColumnsArray['IdPartidoObject']) $this->MetaAddColumn(QQN::Folio()->IdPartidoObject)->Title = QApplication::Translate('IdPartidoObject');
        if (FolioDataGrid::$strColumnsArray['NombreBarrioOficial']) $this->MetaAddColumn('NombreBarrioOficial')->Title ='Nombre Oficial Barrio';
        if (FolioDataGrid::$strColumnsArray['TipoBarrioObject']) $this->MetaAddColumn(QQN::Folio()->TipoBarrioObject)->Title = "Tipo";
        $objSituacionRegistral = new QFilteredDataGridColumn("Situación Registral",'<?= $_CONTROL->CalcularSitRegistral($_ITEM);?>');
        $this->AddColumn($objSituacionRegistral); 
        $this->MetaAddColumn(QQN::Folio()->UsoInterno->EstadoFolioObject->Nombre)->Title = "Estado";
        $this->MetaAddColumn(QQN::Folio()->CreadorObject->Reparticion)->Title = "Reparticion";
        $objColumnAcciones = new QFilteredDataGridColumn("Acciones", '<?= $_CONTROL->GetEditButton($_ITEM)->Render(false) . $_CONTROL->GetPrintButton($_ITEM)->Render(false) . $_CONTROL->GetDeleteButton($_ITEM)->Render(false) . $_CONTROL->GetConfirmarButton($_ITEM)->Render(false) . $_CONTROL->GetCancelarButton($_ITEM)->Render(false) . $_CONTROL->GetEnviarButton($_ITEM)->Render(false) . $_CONTROL->GetResolucionButton($_ITEM)->Render(false) . $_CONTROL->Get14449Button($_ITEM)->Render(false);?>', 'Width=25%', 'HorizontalAlign=center', 'HtmlEntities=false');
        $this->AddColumn($objColumnAcciones);
    }

    public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/edit/".$strParameter);
                          
    }

    


    public function GetEditButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn btn-xs btn-info');
        if(Permission::EsVisualizador())
            $objButton->Icon = 'search';
        else
            $objButton->Icon = 'edit';
        $objButton->ToolTip = 'Editar Folio';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnEdit_Click"));
        $objButton->Enabled = true;
        return $objButton;
    }

    public function GetPrintButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn btn-xs btn-print');
        $objButton->Icon = 'print';
        $objButton->Enabled = true;
        $objButton->ToolTip = "Imprimir carátula";
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "PrintClick"));
        return $objButton;
    }

    public function GetDeleteButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-danger');
        $objButton->Icon = 'trash';
        $objButton->ToolTip = 'Borrar Folio';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que quiere BORRAR de este FOLIO?\\r\\nEsta acción no se puede deshacer")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnDelete_Click"));
        $objButton->Enabled = (Permission::PuedeBorrarFolio($obj));
        return $objButton;
    }                 
       
     public function GetConfirmarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-success');
        $objButton->Icon = 'ok';
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
        $objButton->ToolTip = 'El Folio necesita correcciones';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que este FOLIO necesita correcciones?")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnCancelar_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = ($obj->UsoInterno->EstadoFolio == EstadoFolio::NOTIFICACION && Permission::PuedeConfirmarFolio($obj));
        return $objButton;
    }                 
     public function GetEnviarButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn-xs btn-success');
        $objButton->Icon = 'circle-arrow-right';
        $objButton->ToolTip = 'Enviar Folio';
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
        $objButton->Text = 'Resolución';
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
        $objButton->Text = 'Ley 14.449';
        $objButton->ToolTip = 'Ver documentación de intervención en el marco de la ley 14.449';
        $objButton->ActionParameter = $obj->Id;
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnLey_Click"));
        $objButton->Enabled = true;
        $objButton->Visible = Permission::PuedeDescargarLey14449($obj);
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
    }
     public function btnEnviar_Click($strFormId, $strControlId, $strParameter){
        $objFolio=Folio::Load($strParameter);
        $objUsoInterno = $objFolio->UsoInterno;
        $objUsoInterno->EstadoFolio = EstadoFolio::ENVIADO_ESPERA;
        $objUsoInterno->Save();
        $this->MarkAsModified();
        Folio::CambioEstadoFolio($objFolio);
    }
   
   public function PrintClick($strFormId, $strControlId, $strParameter) {
        $url=__VIRTUAL_DIRECTORY__."/caratula.php?idfolio=$strParameter";
        QApplication::DisplayAlert("<iframe src='$url' width='100%' height='400'></iframe>");

    }

    public function btnDelete_Click($strFormId,$strControlId,$strParameter){
        $obj = Folio::Load($strParameter);
        $obj->Delete();
        $this->MarkAsModified();

    }

    public function btnResolucion_Click($strFormId,$strControlId,$strParameter){
        $url=__VIRTUAL_DIRECTORY__.'/upload.php?tipo=resolucion&idfolio='.$strParameter;
        
        $response=file_get_contents("http://localhost/".$url);
        $json=json_decode($response,true);
        $links="";
        foreach ($json['files'] as $key => $file) {
            $link ="<p><a href=".$file['url']." title=".$file['name']." download=".$file['name'].">".$file['name']."</a></p>";
            $links=$links.$link;
        }
        if($links!==""){
            QApplication::DisplayAlert("<div id='files'>".$links."</div>");    
        }else{
            QApplication::DisplayAlert("No hay archivos disponibles");
        }
    }

    public function btnLey_Click($strFormId,$strControlId,$strParameter){
        $url=__VIRTUAL_DIRECTORY__.'/upload.php?tipo=habitat&idfolio='.$strParameter;
        
        $response=file_get_contents("http://localhost/".$url);
        $json=json_decode($response,true);
        $links="";
        foreach ($json['files'] as $key => $file) {
            $link ="<p><a href=".$file['url']." title=".$file['name']." download=".$file['name'].">".$file['name']."</a></p>";
            $links=$links.$link;
        }
        if($links!==""){
            QApplication::DisplayAlert("<div id='files'>".$links."</div>");    
        }else{
            QApplication::DisplayAlert("No hay archivos disponibles");
        }
        
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

}
?>
