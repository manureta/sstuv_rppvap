<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de ElementoHijos
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class ElementoHijoIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar ElementoHijos
    public $dtgElementoHijos;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditElementoHijo;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : ElementoHijo::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? ElementoHijoDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(ElementoHijoEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgElementoHijo_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditElementoHijo)) {
            $this->Form->RemoveControl($this->pnlEditElementoHijo->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', ElementoHijo::GenderMale() ? '':'a', ElementoHijo::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgElementoHijo_Create() {            
        $this->dtgElementoHijos = new ElementoHijoDataGrid($this, $this->strColumnsArray);
        $this->dtgElementoHijos->RowClickMethod = 'dtgRow_Click';
        return $this->dtgElementoHijos;
    }

    public function ElementoHijoEditPanel_Create($intIdElementoHijo = null) {
        if (isset($this->pnlEditElementoHijo))
            $this->Form->RemoveControl($this->pnlEditElementoHijo->ControlId);
        return $this->pnlEditElementoHijo = new ElementoHijoEditPanel($this, $this->strControlsArray, $intIdElementoHijo);
    }
    
    public function dtgRow_Click(ElementoHijo $objElementoHijo) {
        $this->ElementoHijoEditPanel_Create($objElementoHijo->IdElementoHijo);
        $this->dtgElementoHijos->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->ElementoHijoEditPanel_Create();
        $this->dtgElementoHijos->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgElementoHijos;
            case 'EditPanel': return $this->pnlEditElementoHijo;
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
