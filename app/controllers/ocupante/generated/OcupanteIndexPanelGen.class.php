<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Ocupantes
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class OcupanteIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Ocupantes
    public $dtgOcupantes;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditOcupante;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Ocupante::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? OcupanteDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(OcupanteEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgOcupante_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditOcupante)) {
            $this->Form->RemoveControl($this->pnlEditOcupante->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Ocupante::GenderMale() ? '':'a', Ocupante::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgOcupante_Create() {            
        $this->dtgOcupantes = new OcupanteDataGrid($this, $this->strColumnsArray);
        $this->dtgOcupantes->RowClickMethod = 'dtgRow_Click';
        return $this->dtgOcupantes;
    }

    public function OcupanteEditPanel_Create($intId = null) {
        if (isset($this->pnlEditOcupante))
            $this->Form->RemoveControl($this->pnlEditOcupante->ControlId);
        return $this->pnlEditOcupante = new OcupanteEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Ocupante $objOcupante) {
        $this->OcupanteEditPanel_Create($objOcupante->Id);
        $this->dtgOcupantes->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->OcupanteEditPanel_Create();
        $this->dtgOcupantes->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgOcupantes;
            case 'EditPanel': return $this->pnlEditOcupante;
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
