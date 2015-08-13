<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de SituacionAmbientales
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class SituacionAmbientalIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar SituacionAmbientales
    public $dtgSituacionAmbientales;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditSituacionAmbiental;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : SituacionAmbiental::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? SituacionAmbientalDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(SituacionAmbientalEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgSituacionAmbiental_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditSituacionAmbiental)) {
            $this->Form->RemoveControl($this->pnlEditSituacionAmbiental->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', SituacionAmbiental::GenderMale() ? '':'a', SituacionAmbiental::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgSituacionAmbiental_Create() {            
        $this->dtgSituacionAmbientales = new SituacionAmbientalDataGrid($this, $this->strColumnsArray);
        $this->dtgSituacionAmbientales->RowClickMethod = 'dtgRow_Click';
        return $this->dtgSituacionAmbientales;
    }

    public function SituacionAmbientalEditPanel_Create($intId = null) {
        if (isset($this->pnlEditSituacionAmbiental))
            $this->Form->RemoveControl($this->pnlEditSituacionAmbiental->ControlId);
        return $this->pnlEditSituacionAmbiental = new SituacionAmbientalEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(SituacionAmbiental $objSituacionAmbiental) {
        $this->SituacionAmbientalEditPanel_Create($objSituacionAmbiental->Id);
        $this->dtgSituacionAmbientales->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->SituacionAmbientalEditPanel_Create();
        $this->dtgSituacionAmbientales->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgSituacionAmbientales;
            case 'EditPanel': return $this->pnlEditSituacionAmbiental;
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
