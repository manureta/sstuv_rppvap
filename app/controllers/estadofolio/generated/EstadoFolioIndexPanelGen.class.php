<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de EstadoFolios
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class EstadoFolioIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar EstadoFolios
    public $dtgEstadoFolios;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditEstadoFolio;

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
    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
            $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : EstadoFolio::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? EstadoFolioDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(EstadoFolioEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgEstadoFolio_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditEstadoFolio)) {
            $this->Form->RemoveControl($this->pnlEditEstadoFolio->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', EstadoFolio::GenderMale() ? '':'a', EstadoFolio::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgEstadoFolio_Create() {            
        $this->dtgEstadoFolios = new EstadoFolioDataGrid($this, $this->strColumnsArray);
        $this->dtgEstadoFolios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgEstadoFolios;
    }

    public function EstadoFolioEditPanel_Create($intId = null) {
        if (isset($this->pnlEditEstadoFolio))
            $this->Form->RemoveControl($this->pnlEditEstadoFolio->ControlId);
        return $this->pnlEditEstadoFolio = new EstadoFolioEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(EstadoFolio $objEstadoFolio) {
        $this->EstadoFolioEditPanel_Create($objEstadoFolio->Id);
        $this->dtgEstadoFolios->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->EstadoFolioEditPanel_Create();
        $this->dtgEstadoFolios->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgEstadoFolios;
            case 'EditPanel': return $this->pnlEditEstadoFolio;
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
