<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Folios
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class FolioIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Folios
    public $dtgFolios;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditFolio;

    // Redefinicion de visibilidad de columnas y controles
    protected $strColumnsArray;
    protected $strControlsArray;    

    
    /**
     * Constructor del panel índice generado
     * 
     * @param <Panel> $objParentObject
     * @param <array> $strColumnsArray
     * @param <array> $strControlsArray
     * @param <string> $strControlId
     *
     */


    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Folio::GenderMale() ? '':'a', Folio::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgFolio_Create() {            
        $this->dtgFolios = new FolioDataGrid($this, $this->strColumnsArray);
        $this->dtgFolios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgFolios;
    }

    public function FolioEditPanel_Create($intId = null) {
        if (isset($this->pnlEditFolio))
            $this->Form->RemoveControl($this->pnlEditFolio->ControlId);
        return $this->pnlEditFolio = new FolioEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Folio $objFolio) {
        $this->FolioEditPanel_Create($objFolio->Id);
        $this->dtgFolios->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->FolioEditPanel_Create();
        $this->dtgFolios->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgFolios;
            case 'EditPanel': return $this->pnlEditFolio;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }
    
}
