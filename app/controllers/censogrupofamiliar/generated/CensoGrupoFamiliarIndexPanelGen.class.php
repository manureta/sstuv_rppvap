<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de CensoGrupoFamiliares
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class CensoGrupoFamiliarIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar CensoGrupoFamiliares
    public $dtgCensoGrupoFamiliares;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditCensoGrupoFamiliar;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : CensoGrupoFamiliar::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? CensoGrupoFamiliarDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(CensoGrupoFamiliarEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgCensoGrupoFamiliar_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditCensoGrupoFamiliar)) {
            $this->Form->RemoveControl($this->pnlEditCensoGrupoFamiliar->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', CensoGrupoFamiliar::GenderMale() ? '':'a', CensoGrupoFamiliar::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgCensoGrupoFamiliar_Create() {            
        $this->dtgCensoGrupoFamiliares = new CensoGrupoFamiliarDataGrid($this, $this->strColumnsArray);
        $this->dtgCensoGrupoFamiliares->RowClickMethod = 'dtgRow_Click';
        return $this->dtgCensoGrupoFamiliares;
    }

    public function CensoGrupoFamiliarEditPanel_Create($intCensoGrupoFamiliarId = null) {
        if (isset($this->pnlEditCensoGrupoFamiliar))
            $this->Form->RemoveControl($this->pnlEditCensoGrupoFamiliar->ControlId);
        return $this->pnlEditCensoGrupoFamiliar = new CensoGrupoFamiliarEditPanel($this, $this->strControlsArray, $intCensoGrupoFamiliarId);
    }
    
    public function dtgRow_Click(CensoGrupoFamiliar $objCensoGrupoFamiliar) {
        $this->CensoGrupoFamiliarEditPanel_Create($objCensoGrupoFamiliar->CensoGrupoFamiliarId);
        $this->dtgCensoGrupoFamiliares->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->CensoGrupoFamiliarEditPanel_Create();
        $this->dtgCensoGrupoFamiliares->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgCensoGrupoFamiliares;
            case 'EditPanel': return $this->pnlEditCensoGrupoFamiliar;
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
