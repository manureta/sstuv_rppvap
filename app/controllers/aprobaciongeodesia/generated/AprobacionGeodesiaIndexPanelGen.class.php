<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de AprobacionGeodesias
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class AprobacionGeodesiaIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar AprobacionGeodesias
    public $dtgAprobacionGeodesias;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditAprobacionGeodesia;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : AprobacionGeodesia::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? AprobacionGeodesiaDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(AprobacionGeodesiaEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgAprobacionGeodesia_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditAprobacionGeodesia)) {
            $this->Form->RemoveControl($this->pnlEditAprobacionGeodesia->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', AprobacionGeodesia::GenderMale() ? '':'a', AprobacionGeodesia::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgAprobacionGeodesia_Create() {            
        $this->dtgAprobacionGeodesias = new AprobacionGeodesiaDataGrid($this, $this->strColumnsArray);
        $this->dtgAprobacionGeodesias->RowClickMethod = 'dtgRow_Click';
        return $this->dtgAprobacionGeodesias;
    }

    public function AprobacionGeodesiaEditPanel_Create($intId = null) {
        if (isset($this->pnlEditAprobacionGeodesia))
            $this->Form->RemoveControl($this->pnlEditAprobacionGeodesia->ControlId);
        return $this->pnlEditAprobacionGeodesia = new AprobacionGeodesiaEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(AprobacionGeodesia $objAprobacionGeodesia) {
        $this->AprobacionGeodesiaEditPanel_Create($objAprobacionGeodesia->Id);
        $this->dtgAprobacionGeodesias->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->AprobacionGeodesiaEditPanel_Create();
        $this->dtgAprobacionGeodesias->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgAprobacionGeodesias;
            case 'EditPanel': return $this->pnlEditAprobacionGeodesia;
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
