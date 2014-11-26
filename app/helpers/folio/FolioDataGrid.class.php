<?php	
class FolioDataGrid extends FolioDataGridGen {
 public $mdlPanel;
   protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Columns (note that you can use strings for folio's properties, or you
        // can traverse down QQN::folio() to display fields that are down the hierarchy)
        //if (FolioDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (FolioDataGrid::$strColumnsArray['CodFolio']) $this->MetaAddColumn('CodFolio')->Title = QApplication::Translate('CodFolio');
        if (FolioDataGrid::$strColumnsArray['IdPartidoObject']) $this->MetaAddColumn(QQN::Folio()->IdPartidoObject)->Title = QApplication::Translate('IdPartidoObject');
        if (FolioDataGrid::$strColumnsArray['IdLocalidadObject']) $this->MetaAddColumn(QQN::Folio()->IdLocalidadObject)->Title = QApplication::Translate('IdLocalidadObject');
        //if (FolioDataGrid::$strColumnsArray['Matricula']) $this->MetaAddColumn('Matricula')->Title = QApplication::Translate('Matricula');
        //if (FolioDataGrid::$strColumnsArray['Fecha']) $this->MetaAddColumn('Fecha')->Title = QApplication::Translate('Fecha');
        if (FolioDataGrid::$strColumnsArray['Encargado']) $this->MetaAddColumn('Encargado')->Title = QApplication::Translate('Encargado');
        if (FolioDataGrid::$strColumnsArray['NombreBarrioOficial']) $this->MetaAddColumn('NombreBarrioOficial')->Title ='Nombre Oficial Barrio';
        //if (FolioDataGrid::$strColumnsArray['NombreBarrioAlternativo1']) $this->MetaAddColumn('NombreBarrioAlternativo1')->Title = QApplication::Translate('NombreBarrioAlternativo1');
        //if (FolioDataGrid::$strColumnsArray['NombreBarrioAlternativo2']) $this->MetaAddColumn('NombreBarrioAlternativo2')->Title = QApplication::Translate('NombreBarrioAlternativo2');
        //if (FolioDataGrid::$strColumnsArray['AnioOrigen']) $this->MetaAddColumn('AnioOrigen')->Title = QApplication::Translate('AnioOrigen');
        //if (FolioDataGrid::$strColumnsArray['Superficie']) $this->MetaAddColumn('Superficie')->Title = QApplication::Translate('Superficie');
        //if (FolioDataGrid::$strColumnsArray['CantidadFamilias']) $this->MetaAddColumn('CantidadFamilias')->Title = QApplication::Translate('CantidadFamilias');
        if (FolioDataGrid::$strColumnsArray['TipoBarrioObject']) $this->MetaAddColumn(QQN::Folio()->TipoBarrioObject)->Title = "Tipo";
        //if (FolioDataGrid::$strColumnsArray['ObservacionCasoDudoso']) $this->MetaAddColumn('ObservacionCasoDudoso')->Title = QApplication::Translate('ObservacionCasoDudoso');
        //if (FolioDataGrid::$strColumnsArray['Judicializado']) $this->MetaAddColumn('Judicializado')->Title = QApplication::Translate('Judicializado');
        //if (FolioDataGrid::$strColumnsArray['Direccion']) $this->MetaAddColumn('Direccion')->Title = QApplication::Translate('Direccion');
        //if (FolioDataGrid::$strColumnsArray['NumExpedientes']) $this->MetaAddColumn('NumExpedientes')->Title = QApplication::Translate('NumExpedientes');
        //if (FolioDataGrid::$strColumnsArray['CondicionesSocioUrbanisticasAsId']) $this->MetaAddColumn(QQN::Folio()->CondicionesSocioUrbanisticasAsId)->Title = QApplication::Translate('CondicionesSocioUrbanisticasAsId');
        //if (FolioDataGrid::$strColumnsArray['RegularizacionAsId']) $this->MetaAddColumn(QQN::Folio()->RegularizacionAsId)->Title = QApplication::Translate('RegularizacionAsId');
        //if (FolioDataGrid::$strColumnsArray['UsoInterno']) $this->MetaAddColumn(QQN::Folio()->UsoInterno)->Title = QApplication::Translate('UsoInterno');
        $objColumnAcciones = new QFilteredDataGridColumn("Acciones", '<?= $_CONTROL->GetEditButton($_ITEM)->Render(false) . $_CONTROL->GetPrintButton($_ITEM)->Render(false) . $_CONTROL->GetDeleteButton($_ITEM)->Render(false); ?>', 'Width=9%', 'HorizontalAlign=center', 'HtmlEntities=false');
        $this->AddColumn($objColumnAcciones);
    }

    public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof FolioIndexPanelGen){
                             $this->ParentControl->pnlEditFolio = new FolioEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditFolio->Visible=true;
                             $this->ParentControl->dtgFolios->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/edit/".$strParameter);
                          }
                 }

    


    public function GetEditButton(Folio $obj) {
        $objButton = new QButton($this);
        $objButton->AddCssClass('btn btn-xs btn-info');
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
        $objButton->AddAction(new QClickEvent(), new QConfirmAction(sprintf("¿Está seguro que quiere BORRAR esta persona de este FOLIO?\\r\\nEsta acción no se puede deshacer")));
        $objButton->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnDelete_Click"));
        $objButton->Enabled = true;
        return $objButton;
    }                 
       
      
   
   public function PrintClick($strFormId, $strControlId, $strParameter) {
        $url=__VIRTUAL_DIRECTORY__."/caratula.php?idfolio=$strParameter";
        error_log($url);
        QApplication::DisplayAlert("<iframe src='$url' width='100%' height='400'></iframe>");

    }


 

}
?>