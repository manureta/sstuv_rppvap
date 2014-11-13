<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de EncuadreLegales
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class EncuadreLegalIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar EncuadreLegales
    public $dtgEncuadreLegales;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditEncuadreLegal;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : EncuadreLegal::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? EncuadreLegalDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(EncuadreLegalEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgEncuadreLegal_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditEncuadreLegal)) {
            $this->Form->RemoveControl($this->pnlEditEncuadreLegal->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', EncuadreLegal::GenderMale() ? '':'a', EncuadreLegal::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgEncuadreLegal_Create() {            
        $this->dtgEncuadreLegales = new EncuadreLegalDataGrid($this, $this->strColumnsArray);
        $this->dtgEncuadreLegales->RowClickMethod = 'dtgRow_Click';
        return $this->dtgEncuadreLegales;
    }

    public function EncuadreLegalEditPanel_Create($intId = null) {
        if (isset($this->pnlEditEncuadreLegal))
            $this->Form->RemoveControl($this->pnlEditEncuadreLegal->ControlId);
        return $this->pnlEditEncuadreLegal = new EncuadreLegalEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(EncuadreLegal $objEncuadreLegal) {
        $this->EncuadreLegalEditPanel_Create($objEncuadreLegal->Id);
        $this->dtgEncuadreLegales->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->EncuadreLegalEditPanel_Create();
        $this->dtgEncuadreLegales->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgEncuadreLegales;
            case 'EditPanel': return $this->pnlEditEncuadreLegal;
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
