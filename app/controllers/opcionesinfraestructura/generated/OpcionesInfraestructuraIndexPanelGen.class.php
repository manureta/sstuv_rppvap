<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de OpcionesInfraestructuras
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class OpcionesInfraestructuraIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar OpcionesInfraestructuras
    public $dtgOpcionesInfraestructuras;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditOpcionesInfraestructura;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : OpcionesInfraestructura::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? OpcionesInfraestructuraDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(OpcionesInfraestructuraEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgOpcionesInfraestructura_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditOpcionesInfraestructura)) {
            $this->Form->RemoveControl($this->pnlEditOpcionesInfraestructura->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', OpcionesInfraestructura::GenderMale() ? '':'a', OpcionesInfraestructura::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgOpcionesInfraestructura_Create() {            
        $this->dtgOpcionesInfraestructuras = new OpcionesInfraestructuraDataGrid($this, $this->strColumnsArray);
        $this->dtgOpcionesInfraestructuras->RowClickMethod = 'dtgRow_Click';
        return $this->dtgOpcionesInfraestructuras;
    }

    public function OpcionesInfraestructuraEditPanel_Create($intId = null) {
        if (isset($this->pnlEditOpcionesInfraestructura))
            $this->Form->RemoveControl($this->pnlEditOpcionesInfraestructura->ControlId);
        return $this->pnlEditOpcionesInfraestructura = new OpcionesInfraestructuraEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(OpcionesInfraestructura $objOpcionesInfraestructura) {
        $this->OpcionesInfraestructuraEditPanel_Create($objOpcionesInfraestructura->Id);
        $this->dtgOpcionesInfraestructuras->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->OpcionesInfraestructuraEditPanel_Create();
        $this->dtgOpcionesInfraestructuras->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgOpcionesInfraestructuras;
            case 'EditPanel': return $this->pnlEditOpcionesInfraestructura;
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
