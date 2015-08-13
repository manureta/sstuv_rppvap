<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Perfiles
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class PerfilIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Perfiles
    public $dtgPerfiles;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditPerfil;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Perfil::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? PerfilDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(PerfilEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgPerfil_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditPerfil)) {
            $this->Form->RemoveControl($this->pnlEditPerfil->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Perfil::GenderMale() ? '':'a', Perfil::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgPerfil_Create() {            
        $this->dtgPerfiles = new PerfilDataGrid($this, $this->strColumnsArray);
        $this->dtgPerfiles->RowClickMethod = 'dtgRow_Click';
        return $this->dtgPerfiles;
    }

    public function PerfilEditPanel_Create($intIdPerfil = null) {
        if (isset($this->pnlEditPerfil))
            $this->Form->RemoveControl($this->pnlEditPerfil->ControlId);
        return $this->pnlEditPerfil = new PerfilEditPanel($this, $this->strControlsArray, $intIdPerfil);
    }
    
    public function dtgRow_Click(Perfil $objPerfil) {
        $this->PerfilEditPanel_Create($objPerfil->IdPerfil);
        $this->dtgPerfiles->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->PerfilEditPanel_Create();
        $this->dtgPerfiles->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgPerfiles;
            case 'EditPanel': return $this->pnlEditPerfil;
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
