<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Equipamientos
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class EquipamientoIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Equipamientos
    public $dtgEquipamientos;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditEquipamiento;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Equipamiento::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? EquipamientoDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(EquipamientoEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgEquipamiento_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditEquipamiento)) {
            $this->Form->RemoveControl($this->pnlEditEquipamiento->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Equipamiento::GenderMale() ? '':'a', Equipamiento::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgEquipamiento_Create() {            
        $this->dtgEquipamientos = new EquipamientoDataGrid($this, $this->strColumnsArray);
        $this->dtgEquipamientos->RowClickMethod = 'dtgRow_Click';
        return $this->dtgEquipamientos;
    }

    public function EquipamientoEditPanel_Create($intId = null) {
        if (isset($this->pnlEditEquipamiento))
            $this->Form->RemoveControl($this->pnlEditEquipamiento->ControlId);
        return $this->pnlEditEquipamiento = new EquipamientoEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Equipamiento $objEquipamiento) {
        $this->EquipamientoEditPanel_Create($objEquipamiento->Id);
        $this->dtgEquipamientos->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->EquipamientoEditPanel_Create();
        $this->dtgEquipamientos->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgEquipamientos;
            case 'EditPanel': return $this->pnlEditEquipamiento;
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
