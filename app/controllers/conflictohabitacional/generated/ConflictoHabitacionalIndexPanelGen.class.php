<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de ConflictoHabitacionales
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class ConflictoHabitacionalIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar ConflictoHabitacionales
    public $dtgConflictoHabitacionales;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditConflictoHabitacional;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : ConflictoHabitacional::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? ConflictoHabitacionalDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(ConflictoHabitacionalEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgConflictoHabitacional_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditConflictoHabitacional)) {
            $this->Form->RemoveControl($this->pnlEditConflictoHabitacional->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', ConflictoHabitacional::GenderMale() ? '':'a', ConflictoHabitacional::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgConflictoHabitacional_Create() {            
        $this->dtgConflictoHabitacionales = new ConflictoHabitacionalDataGrid($this, $this->strColumnsArray);
        $this->dtgConflictoHabitacionales->RowClickMethod = 'dtgRow_Click';
        return $this->dtgConflictoHabitacionales;
    }

    public function ConflictoHabitacionalEditPanel_Create($intId = null) {
        if (isset($this->pnlEditConflictoHabitacional))
            $this->Form->RemoveControl($this->pnlEditConflictoHabitacional->ControlId);
        return $this->pnlEditConflictoHabitacional = new ConflictoHabitacionalEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(ConflictoHabitacional $objConflictoHabitacional) {
        $this->ConflictoHabitacionalEditPanel_Create($objConflictoHabitacional->Id);
        $this->dtgConflictoHabitacionales->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->ConflictoHabitacionalEditPanel_Create();
        $this->dtgConflictoHabitacionales->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgConflictoHabitacionales;
            case 'EditPanel': return $this->pnlEditConflictoHabitacional;
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
