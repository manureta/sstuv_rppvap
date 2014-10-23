<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de OrganismosDeIntervenciones
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class OrganismosDeIntervencionIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar OrganismosDeIntervenciones
    public $dtgOrganismosDeIntervenciones;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditOrganismosDeIntervencion;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : OrganismosDeIntervencion::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? OrganismosDeIntervencionDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(OrganismosDeIntervencionEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgOrganismosDeIntervencion_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditOrganismosDeIntervencion)) {
            $this->Form->RemoveControl($this->pnlEditOrganismosDeIntervencion->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', OrganismosDeIntervencion::GenderMale() ? '':'a', OrganismosDeIntervencion::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgOrganismosDeIntervencion_Create() {            
        $this->dtgOrganismosDeIntervenciones = new OrganismosDeIntervencionDataGrid($this, $this->strColumnsArray);
        $this->dtgOrganismosDeIntervenciones->RowClickMethod = 'dtgRow_Click';
        return $this->dtgOrganismosDeIntervenciones;
    }

    public function OrganismosDeIntervencionEditPanel_Create($intId = null) {
        if (isset($this->pnlEditOrganismosDeIntervencion))
            $this->Form->RemoveControl($this->pnlEditOrganismosDeIntervencion->ControlId);
        return $this->pnlEditOrganismosDeIntervencion = new OrganismosDeIntervencionEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(OrganismosDeIntervencion $objOrganismosDeIntervencion) {
        $this->OrganismosDeIntervencionEditPanel_Create($objOrganismosDeIntervencion->Id);
        $this->dtgOrganismosDeIntervenciones->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->OrganismosDeIntervencionEditPanel_Create();
        $this->dtgOrganismosDeIntervenciones->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgOrganismosDeIntervenciones;
            case 'EditPanel': return $this->pnlEditOrganismosDeIntervencion;
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
