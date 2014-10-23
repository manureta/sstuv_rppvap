<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de TipoDatoValores
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class TipoDatoValorIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar TipoDatoValores
    public $dtgTipoDatoValores;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditTipoDatoValor;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : TipoDatoValor::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? TipoDatoValorDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(TipoDatoValorEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgTipoDatoValor_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditTipoDatoValor)) {
            $this->Form->RemoveControl($this->pnlEditTipoDatoValor->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', TipoDatoValor::GenderMale() ? '':'a', TipoDatoValor::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgTipoDatoValor_Create() {            
        $this->dtgTipoDatoValores = new TipoDatoValorDataGrid($this, $this->strColumnsArray);
        $this->dtgTipoDatoValores->RowClickMethod = 'dtgRow_Click';
        return $this->dtgTipoDatoValores;
    }

    public function TipoDatoValorEditPanel_Create($intIdTipoDatoValor = null) {
        if (isset($this->pnlEditTipoDatoValor))
            $this->Form->RemoveControl($this->pnlEditTipoDatoValor->ControlId);
        return $this->pnlEditTipoDatoValor = new TipoDatoValorEditPanel($this, $this->strControlsArray, $intIdTipoDatoValor);
    }
    
    public function dtgRow_Click(TipoDatoValor $objTipoDatoValor) {
        $this->TipoDatoValorEditPanel_Create($objTipoDatoValor->IdTipoDatoValor);
        $this->dtgTipoDatoValores->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->TipoDatoValorEditPanel_Create();
        $this->dtgTipoDatoValores->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgTipoDatoValores;
            case 'EditPanel': return $this->pnlEditTipoDatoValor;
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
