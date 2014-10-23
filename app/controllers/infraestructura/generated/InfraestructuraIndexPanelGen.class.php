<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Infraestructuras
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class InfraestructuraIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Infraestructuras
    public $dtgInfraestructuras;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditInfraestructura;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Infraestructura::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? InfraestructuraDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(InfraestructuraEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgInfraestructura_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditInfraestructura)) {
            $this->Form->RemoveControl($this->pnlEditInfraestructura->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Infraestructura::GenderMale() ? '':'a', Infraestructura::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgInfraestructura_Create() {            
        $this->dtgInfraestructuras = new InfraestructuraDataGrid($this, $this->strColumnsArray);
        $this->dtgInfraestructuras->RowClickMethod = 'dtgRow_Click';
        return $this->dtgInfraestructuras;
    }

    public function InfraestructuraEditPanel_Create($intId = null) {
        if (isset($this->pnlEditInfraestructura))
            $this->Form->RemoveControl($this->pnlEditInfraestructura->ControlId);
        return $this->pnlEditInfraestructura = new InfraestructuraEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Infraestructura $objInfraestructura) {
        $this->InfraestructuraEditPanel_Create($objInfraestructura->Id);
        $this->dtgInfraestructuras->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->InfraestructuraEditPanel_Create();
        $this->dtgInfraestructuras->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgInfraestructuras;
            case 'EditPanel': return $this->pnlEditInfraestructura;
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
