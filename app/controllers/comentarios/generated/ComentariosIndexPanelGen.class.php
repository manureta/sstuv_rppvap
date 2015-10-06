<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Comentarioses
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class ComentariosIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Comentarioses
    public $dtgComentarioses;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditComentarios;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Comentarios::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? ComentariosDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(ComentariosEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgComentarios_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditComentarios)) {
            $this->Form->RemoveControl($this->pnlEditComentarios->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Comentarios::GenderMale() ? '':'a', Comentarios::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgComentarios_Create() {            
        $this->dtgComentarioses = new ComentariosDataGrid($this, $this->strColumnsArray);
        $this->dtgComentarioses->RowClickMethod = 'dtgRow_Click';
        return $this->dtgComentarioses;
    }

    public function ComentariosEditPanel_Create($intId = null) {
        if (isset($this->pnlEditComentarios))
            $this->Form->RemoveControl($this->pnlEditComentarios->ControlId);
        return $this->pnlEditComentarios = new ComentariosEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Comentarios $objComentarios) {
        $this->ComentariosEditPanel_Create($objComentarios->Id);
        $this->dtgComentarioses->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->ComentariosEditPanel_Create();
        $this->dtgComentarioses->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgComentarioses;
            case 'EditPanel': return $this->pnlEditComentarios;
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
