<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Elementos
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class ElementoIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Elementos
    public $dtgElementos;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditElemento;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Elemento::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? ElementoDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(ElementoEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgElemento_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditElemento)) {
            $this->Form->RemoveControl($this->pnlEditElemento->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Elemento::GenderMale() ? '':'a', Elemento::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgElemento_Create() {            
        $this->dtgElementos = new ElementoDataGrid($this, $this->strColumnsArray);
        $this->dtgElementos->RowClickMethod = 'dtgRow_Click';
        return $this->dtgElementos;
    }

    public function ElementoEditPanel_Create($intIdElemento = null) {
        if (isset($this->pnlEditElemento))
            $this->Form->RemoveControl($this->pnlEditElemento->ControlId);
        return $this->pnlEditElemento = new ElementoEditPanel($this, $this->strControlsArray, $intIdElemento);
    }
    
    public function dtgRow_Click(Elemento $objElemento) {
        $this->ElementoEditPanel_Create($objElemento->IdElemento);
        $this->dtgElementos->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->ElementoEditPanel_Create();
        $this->dtgElementos->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgElementos;
            case 'EditPanel': return $this->pnlEditElemento;
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
