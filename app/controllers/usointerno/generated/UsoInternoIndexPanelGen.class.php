<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de UsoInternos
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class UsoInternoIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar UsoInternos
    public $dtgUsoInternos;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditUsoInterno;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : UsoInterno::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? UsoInternoDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(UsoInternoEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgUsoInterno_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditUsoInterno)) {
            $this->Form->RemoveControl($this->pnlEditUsoInterno->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', UsoInterno::GenderMale() ? '':'a', UsoInterno::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgUsoInterno_Create() {            
        $this->dtgUsoInternos = new UsoInternoDataGrid($this, $this->strColumnsArray);
        $this->dtgUsoInternos->RowClickMethod = 'dtgRow_Click';
        return $this->dtgUsoInternos;
    }

    public function UsoInternoEditPanel_Create($intIdFolio = null) {
        if (isset($this->pnlEditUsoInterno))
            $this->Form->RemoveControl($this->pnlEditUsoInterno->ControlId);
        return $this->pnlEditUsoInterno = new UsoInternoEditPanel($this, $this->strControlsArray, $intIdFolio);
    }
    
    public function dtgRow_Click(UsoInterno $objUsoInterno) {
        $this->UsoInternoEditPanel_Create($objUsoInterno->IdFolio);
        $this->dtgUsoInternos->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->UsoInternoEditPanel_Create();
        $this->dtgUsoInternos->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgUsoInternos;
            case 'EditPanel': return $this->pnlEditUsoInterno;
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
