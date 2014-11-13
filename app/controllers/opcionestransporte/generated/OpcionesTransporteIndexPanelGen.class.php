<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de OpcionesTransportes
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class OpcionesTransporteIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar OpcionesTransportes
    public $dtgOpcionesTransportes;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditOpcionesTransporte;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : OpcionesTransporte::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? OpcionesTransporteDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(OpcionesTransporteEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgOpcionesTransporte_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditOpcionesTransporte)) {
            $this->Form->RemoveControl($this->pnlEditOpcionesTransporte->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', OpcionesTransporte::GenderMale() ? '':'a', OpcionesTransporte::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgOpcionesTransporte_Create() {            
        $this->dtgOpcionesTransportes = new OpcionesTransporteDataGrid($this, $this->strColumnsArray);
        $this->dtgOpcionesTransportes->RowClickMethod = 'dtgRow_Click';
        return $this->dtgOpcionesTransportes;
    }

    public function OpcionesTransporteEditPanel_Create($intId = null) {
        if (isset($this->pnlEditOpcionesTransporte))
            $this->Form->RemoveControl($this->pnlEditOpcionesTransporte->ControlId);
        return $this->pnlEditOpcionesTransporte = new OpcionesTransporteEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(OpcionesTransporte $objOpcionesTransporte) {
        $this->OpcionesTransporteEditPanel_Create($objOpcionesTransporte->Id);
        $this->dtgOpcionesTransportes->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->OpcionesTransporteEditPanel_Create();
        $this->dtgOpcionesTransportes->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgOpcionesTransportes;
            case 'EditPanel': return $this->pnlEditOpcionesTransporte;
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
