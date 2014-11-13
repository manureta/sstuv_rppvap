<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Transportes
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class TransporteIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Transportes
    public $dtgTransportes;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditTransporte;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Transporte::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? TransporteDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(TransporteEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgTransporte_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditTransporte)) {
            $this->Form->RemoveControl($this->pnlEditTransporte->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Transporte::GenderMale() ? '':'a', Transporte::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgTransporte_Create() {            
        $this->dtgTransportes = new TransporteDataGrid($this, $this->strColumnsArray);
        $this->dtgTransportes->RowClickMethod = 'dtgRow_Click';
        return $this->dtgTransportes;
    }

    public function TransporteEditPanel_Create($intId = null) {
        if (isset($this->pnlEditTransporte))
            $this->Form->RemoveControl($this->pnlEditTransporte->ControlId);
        return $this->pnlEditTransporte = new TransporteEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Transporte $objTransporte) {
        $this->TransporteEditPanel_Create($objTransporte->Id);
        $this->dtgTransportes->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->TransporteEditPanel_Create();
        $this->dtgTransportes->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgTransportes;
            case 'EditPanel': return $this->pnlEditTransporte;
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
