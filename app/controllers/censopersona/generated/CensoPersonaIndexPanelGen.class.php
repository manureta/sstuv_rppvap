<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de CensoPersonas
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class CensoPersonaIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar CensoPersonas
    public $dtgCensoPersonas;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditCensoPersona;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : CensoPersona::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? CensoPersonaDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(CensoPersonaEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgCensoPersona_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditCensoPersona)) {
            $this->Form->RemoveControl($this->pnlEditCensoPersona->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', CensoPersona::GenderMale() ? '':'a', CensoPersona::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgCensoPersona_Create() {            
        $this->dtgCensoPersonas = new CensoPersonaDataGrid($this, $this->strColumnsArray);
        $this->dtgCensoPersonas->RowClickMethod = 'dtgRow_Click';
        return $this->dtgCensoPersonas;
    }

    public function CensoPersonaEditPanel_Create($intCensoPersonaId = null) {
        if (isset($this->pnlEditCensoPersona))
            $this->Form->RemoveControl($this->pnlEditCensoPersona->ControlId);
        return $this->pnlEditCensoPersona = new CensoPersonaEditPanel($this, $this->strControlsArray, $intCensoPersonaId);
    }
    
    public function dtgRow_Click(CensoPersona $objCensoPersona) {
        $this->CensoPersonaEditPanel_Create($objCensoPersona->CensoPersonaId);
        $this->dtgCensoPersonas->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->CensoPersonaEditPanel_Create();
        $this->dtgCensoPersonas->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgCensoPersonas;
            case 'EditPanel': return $this->pnlEditCensoPersona;
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
