<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Localidades
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class LocalidadIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Localidades
    public $dtgLocalidades;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditLocalidad;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Localidad::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? LocalidadDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(LocalidadEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgLocalidad_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditLocalidad)) {
            $this->Form->RemoveControl($this->pnlEditLocalidad->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Localidad::GenderMale() ? '':'a', Localidad::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgLocalidad_Create() {            
        $this->dtgLocalidades = new LocalidadDataGrid($this, $this->strColumnsArray);
        $this->dtgLocalidades->RowClickMethod = 'dtgRow_Click';
        return $this->dtgLocalidades;
    }

    public function LocalidadEditPanel_Create($intId = null) {
        if (isset($this->pnlEditLocalidad))
            $this->Form->RemoveControl($this->pnlEditLocalidad->ControlId);
        return $this->pnlEditLocalidad = new LocalidadEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Localidad $objLocalidad) {
        $this->LocalidadEditPanel_Create($objLocalidad->Id);
        $this->dtgLocalidades->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->LocalidadEditPanel_Create();
        $this->dtgLocalidades->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgLocalidades;
            case 'EditPanel': return $this->pnlEditLocalidad;
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
