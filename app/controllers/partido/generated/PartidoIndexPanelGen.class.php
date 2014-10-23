<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Partidos
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class PartidoIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Partidos
    public $dtgPartidos;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditPartido;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Partido::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? PartidoDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(PartidoEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgPartido_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditPartido)) {
            $this->Form->RemoveControl($this->pnlEditPartido->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Partido::GenderMale() ? '':'a', Partido::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgPartido_Create() {            
        $this->dtgPartidos = new PartidoDataGrid($this, $this->strColumnsArray);
        $this->dtgPartidos->RowClickMethod = 'dtgRow_Click';
        return $this->dtgPartidos;
    }

    public function PartidoEditPanel_Create($intId = null) {
        if (isset($this->pnlEditPartido))
            $this->Form->RemoveControl($this->pnlEditPartido->ControlId);
        return $this->pnlEditPartido = new PartidoEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Partido $objPartido) {
        $this->PartidoEditPanel_Create($objPartido->Id);
        $this->dtgPartidos->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->PartidoEditPanel_Create();
        $this->dtgPartidos->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgPartidos;
            case 'EditPanel': return $this->pnlEditPartido;
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
