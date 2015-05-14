<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de ArchivosAdjuntoses
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class ArchivosAdjuntosIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar ArchivosAdjuntoses
    public $dtgArchivosAdjuntoses;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditArchivosAdjuntos;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : ArchivosAdjuntos::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? ArchivosAdjuntosDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(ArchivosAdjuntosEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgArchivosAdjuntos_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditArchivosAdjuntos)) {
            $this->Form->RemoveControl($this->pnlEditArchivosAdjuntos->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', ArchivosAdjuntos::GenderMale() ? '':'a', ArchivosAdjuntos::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgArchivosAdjuntos_Create() {            
        $this->dtgArchivosAdjuntoses = new ArchivosAdjuntosDataGrid($this, $this->strColumnsArray);
        $this->dtgArchivosAdjuntoses->RowClickMethod = 'dtgRow_Click';
        return $this->dtgArchivosAdjuntoses;
    }

    public function ArchivosAdjuntosEditPanel_Create($intId = null) {
        if (isset($this->pnlEditArchivosAdjuntos))
            $this->Form->RemoveControl($this->pnlEditArchivosAdjuntos->ControlId);
        return $this->pnlEditArchivosAdjuntos = new ArchivosAdjuntosEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(ArchivosAdjuntos $objArchivosAdjuntos) {
        $this->ArchivosAdjuntosEditPanel_Create($objArchivosAdjuntos->Id);
        $this->dtgArchivosAdjuntoses->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->ArchivosAdjuntosEditPanel_Create();
        $this->dtgArchivosAdjuntoses->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgArchivosAdjuntoses;
            case 'EditPanel': return $this->pnlEditArchivosAdjuntos;
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
