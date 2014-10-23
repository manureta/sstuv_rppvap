<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Antecedenteses
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class AntecedentesIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Antecedenteses
    public $dtgAntecedenteses;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditAntecedentes;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Antecedentes::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? AntecedentesDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(AntecedentesEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgAntecedentes_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditAntecedentes)) {
            $this->Form->RemoveControl($this->pnlEditAntecedentes->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Antecedentes::GenderMale() ? '':'a', Antecedentes::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgAntecedentes_Create() {            
        $this->dtgAntecedenteses = new AntecedentesDataGrid($this, $this->strColumnsArray);
        $this->dtgAntecedenteses->RowClickMethod = 'dtgRow_Click';
        return $this->dtgAntecedenteses;
    }

    public function AntecedentesEditPanel_Create($intId = null) {
        if (isset($this->pnlEditAntecedentes))
            $this->Form->RemoveControl($this->pnlEditAntecedentes->ControlId);
        return $this->pnlEditAntecedentes = new AntecedentesEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Antecedentes $objAntecedentes) {
        $this->AntecedentesEditPanel_Create($objAntecedentes->Id);
        $this->dtgAntecedenteses->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->AntecedentesEditPanel_Create();
        $this->dtgAntecedenteses->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgAntecedenteses;
            case 'EditPanel': return $this->pnlEditAntecedentes;
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
