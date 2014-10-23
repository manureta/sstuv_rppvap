<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de TipoBarrios
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class TipoBarrioIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar TipoBarrios
    public $dtgTipoBarrios;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditTipoBarrio;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : TipoBarrio::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? TipoBarrioDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(TipoBarrioEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgTipoBarrio_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditTipoBarrio)) {
            $this->Form->RemoveControl($this->pnlEditTipoBarrio->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', TipoBarrio::GenderMale() ? '':'a', TipoBarrio::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgTipoBarrio_Create() {            
        $this->dtgTipoBarrios = new TipoBarrioDataGrid($this, $this->strColumnsArray);
        $this->dtgTipoBarrios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgTipoBarrios;
    }

    public function TipoBarrioEditPanel_Create($intId = null) {
        if (isset($this->pnlEditTipoBarrio))
            $this->Form->RemoveControl($this->pnlEditTipoBarrio->ControlId);
        return $this->pnlEditTipoBarrio = new TipoBarrioEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(TipoBarrio $objTipoBarrio) {
        $this->TipoBarrioEditPanel_Create($objTipoBarrio->Id);
        $this->dtgTipoBarrios->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->TipoBarrioEditPanel_Create();
        $this->dtgTipoBarrios->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgTipoBarrios;
            case 'EditPanel': return $this->pnlEditTipoBarrio;
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
