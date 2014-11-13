<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de OpcionesEquipamientoses
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class OpcionesEquipamientosIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar OpcionesEquipamientoses
    public $dtgOpcionesEquipamientoses;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditOpcionesEquipamientos;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : OpcionesEquipamientos::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? OpcionesEquipamientosDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(OpcionesEquipamientosEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgOpcionesEquipamientos_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditOpcionesEquipamientos)) {
            $this->Form->RemoveControl($this->pnlEditOpcionesEquipamientos->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', OpcionesEquipamientos::GenderMale() ? '':'a', OpcionesEquipamientos::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgOpcionesEquipamientos_Create() {            
        $this->dtgOpcionesEquipamientoses = new OpcionesEquipamientosDataGrid($this, $this->strColumnsArray);
        $this->dtgOpcionesEquipamientoses->RowClickMethod = 'dtgRow_Click';
        return $this->dtgOpcionesEquipamientoses;
    }

    public function OpcionesEquipamientosEditPanel_Create($intId = null) {
        if (isset($this->pnlEditOpcionesEquipamientos))
            $this->Form->RemoveControl($this->pnlEditOpcionesEquipamientos->ControlId);
        return $this->pnlEditOpcionesEquipamientos = new OpcionesEquipamientosEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(OpcionesEquipamientos $objOpcionesEquipamientos) {
        $this->OpcionesEquipamientosEditPanel_Create($objOpcionesEquipamientos->Id);
        $this->dtgOpcionesEquipamientoses->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->OpcionesEquipamientosEditPanel_Create();
        $this->dtgOpcionesEquipamientoses->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgOpcionesEquipamientoses;
            case 'EditPanel': return $this->pnlEditOpcionesEquipamientos;
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
