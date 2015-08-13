<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Usuarios
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class UsuarioIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Usuarios
    public $dtgUsuarios;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditUsuario;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Usuario::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? UsuarioDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(UsuarioEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgUsuario_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditUsuario)) {
            $this->Form->RemoveControl($this->pnlEditUsuario->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Usuario::GenderMale() ? '':'a', Usuario::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgUsuario_Create() {            
        $this->dtgUsuarios = new UsuarioDataGrid($this, $this->strColumnsArray);
        $this->dtgUsuarios->RowClickMethod = 'dtgRow_Click';
        return $this->dtgUsuarios;
    }

    public function UsuarioEditPanel_Create($intIdUsuario = null) {
        if (isset($this->pnlEditUsuario))
            $this->Form->RemoveControl($this->pnlEditUsuario->ControlId);
        return $this->pnlEditUsuario = new UsuarioEditPanel($this, $this->strControlsArray, $intIdUsuario);
    }
    
    public function dtgRow_Click(Usuario $objUsuario) {
        $this->UsuarioEditPanel_Create($objUsuario->IdUsuario);
        $this->dtgUsuarios->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->UsuarioEditPanel_Create();
        $this->dtgUsuarios->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgUsuarios;
            case 'EditPanel': return $this->pnlEditUsuario;
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
