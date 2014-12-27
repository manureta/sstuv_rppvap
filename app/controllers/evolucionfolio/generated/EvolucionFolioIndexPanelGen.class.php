<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de EvolucionFolios
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class EvolucionFolioIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar EvolucionFolios
    public $dtgEvolucionFolios;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditEvolucionFolio;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : EvolucionFolio::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? EvolucionFolioDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(EvolucionFolioEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgEvolucionFolio_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditEvolucionFolio)) {
            $this->Form->RemoveControl($this->pnlEditEvolucionFolio->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', EvolucionFolio::GenderMale() ? '':'a', EvolucionFolio::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgEvolucionFolio_Create() {            
        $this->dtgEvolucionFolios = new EvolucionFolioDataGrid($this, $this->strColumnsArray);
        $this->dtgEvolucionFolios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgEvolucionFolios;
    }

    public function EvolucionFolioEditPanel_Create($intId = null) {
        if (isset($this->pnlEditEvolucionFolio))
            $this->Form->RemoveControl($this->pnlEditEvolucionFolio->ControlId);
        return $this->pnlEditEvolucionFolio = new EvolucionFolioEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(EvolucionFolio $objEvolucionFolio) {
        $this->EvolucionFolioEditPanel_Create($objEvolucionFolio->Id);
        $this->dtgEvolucionFolios->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->EvolucionFolioEditPanel_Create();
        $this->dtgEvolucionFolios->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgEvolucionFolios;
            case 'EditPanel': return $this->pnlEditEvolucionFolio;
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
