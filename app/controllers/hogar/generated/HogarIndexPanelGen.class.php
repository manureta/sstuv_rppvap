<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Hogares
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class HogarIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Hogares
    public $dtgHogares;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditHogar;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Hogar::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? HogarDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(HogarEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgHogar_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditHogar)) {
            $this->Form->RemoveControl($this->pnlEditHogar->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Hogar::GenderMale() ? '':'a', Hogar::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgHogar_Create() {            
        $this->dtgHogares = new HogarDataGrid($this, $this->strColumnsArray);
        $this->dtgHogares->RowClickMethod = 'dtgRow_Click';
        return $this->dtgHogares;
    }

    public function HogarEditPanel_Create($intId = null) {
        if (isset($this->pnlEditHogar))
            $this->Form->RemoveControl($this->pnlEditHogar->ControlId);
        return $this->pnlEditHogar = new HogarEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Hogar $objHogar) {
        $this->HogarEditPanel_Create($objHogar->Id);
        $this->dtgHogares->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->HogarEditPanel_Create();
        $this->dtgHogares->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgHogares;
            case 'EditPanel': return $this->pnlEditHogar;
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
