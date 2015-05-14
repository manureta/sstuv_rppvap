<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de OpcionesEstadoExpropiaciones
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class OpcionesEstadoExpropiacionIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar OpcionesEstadoExpropiaciones
    public $dtgOpcionesEstadoExpropiaciones;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditOpcionesEstadoExpropiacion;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : OpcionesEstadoExpropiacion::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? OpcionesEstadoExpropiacionDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(OpcionesEstadoExpropiacionEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgOpcionesEstadoExpropiacion_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditOpcionesEstadoExpropiacion)) {
            $this->Form->RemoveControl($this->pnlEditOpcionesEstadoExpropiacion->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', OpcionesEstadoExpropiacion::GenderMale() ? '':'a', OpcionesEstadoExpropiacion::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgOpcionesEstadoExpropiacion_Create() {            
        $this->dtgOpcionesEstadoExpropiaciones = new OpcionesEstadoExpropiacionDataGrid($this, $this->strColumnsArray);
        $this->dtgOpcionesEstadoExpropiaciones->RowClickMethod = 'dtgRow_Click';
        return $this->dtgOpcionesEstadoExpropiaciones;
    }

    public function OpcionesEstadoExpropiacionEditPanel_Create($intId = null) {
        if (isset($this->pnlEditOpcionesEstadoExpropiacion))
            $this->Form->RemoveControl($this->pnlEditOpcionesEstadoExpropiacion->ControlId);
        return $this->pnlEditOpcionesEstadoExpropiacion = new OpcionesEstadoExpropiacionEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(OpcionesEstadoExpropiacion $objOpcionesEstadoExpropiacion) {
        $this->OpcionesEstadoExpropiacionEditPanel_Create($objOpcionesEstadoExpropiacion->Id);
        $this->dtgOpcionesEstadoExpropiaciones->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->OpcionesEstadoExpropiacionEditPanel_Create();
        $this->dtgOpcionesEstadoExpropiaciones->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgOpcionesEstadoExpropiaciones;
            case 'EditPanel': return $this->pnlEditOpcionesEstadoExpropiacion;
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
