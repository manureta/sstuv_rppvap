<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de DatosCapitulos
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class DatosCapituloIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar DatosCapitulos
    public $dtgDatosCapitulos;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditDatosCapitulo;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : DatosCapitulo::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? DatosCapituloDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(DatosCapituloEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgDatosCapitulo_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditDatosCapitulo)) {
            $this->Form->RemoveControl($this->pnlEditDatosCapitulo->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', DatosCapitulo::GenderMale() ? '':'a', DatosCapitulo::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgDatosCapitulo_Create() {            
        $this->dtgDatosCapitulos = new DatosCapituloDataGrid($this, $this->strColumnsArray);
        $this->dtgDatosCapitulos->RowClickMethod = 'dtgRow_Click';
        return $this->dtgDatosCapitulos;
    }

    public function DatosCapituloEditPanel_Create($intIdDatosCapitulo = null) {
        if (isset($this->pnlEditDatosCapitulo))
            $this->Form->RemoveControl($this->pnlEditDatosCapitulo->ControlId);
        return $this->pnlEditDatosCapitulo = new DatosCapituloEditPanel($this, $this->strControlsArray, $intIdDatosCapitulo);
    }
    
    public function dtgRow_Click(DatosCapitulo $objDatosCapitulo) {
        $this->DatosCapituloEditPanel_Create($objDatosCapitulo->IdDatosCapitulo);
        $this->dtgDatosCapitulos->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->DatosCapituloEditPanel_Create();
        $this->dtgDatosCapitulos->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgDatosCapitulos;
            case 'EditPanel': return $this->pnlEditDatosCapitulo;
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
