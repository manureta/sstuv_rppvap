<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Registraciones
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class RegistracionIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Registraciones
    public $dtgRegistraciones;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditRegistracion;

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
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Registracion::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? RegistracionDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(RegistracionEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgRegistracion_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditRegistracion)) {
            $this->Form->RemoveControl($this->pnlEditRegistracion->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Registracion::GenderMale() ? '':'a', Registracion::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgRegistracion_Create() {            
        $this->dtgRegistraciones = new RegistracionDataGrid($this, $this->strColumnsArray);
        $this->dtgRegistraciones->RowClickMethod = 'dtgRow_Click';
        return $this->dtgRegistraciones;
    }

    public function RegistracionEditPanel_Create($intId = null) {
        if (isset($this->pnlEditRegistracion))
            $this->Form->RemoveControl($this->pnlEditRegistracion->ControlId);
        return $this->pnlEditRegistracion = new RegistracionEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Registracion $objRegistracion) {
        $this->RegistracionEditPanel_Create($objRegistracion->Id);
        $this->dtgRegistraciones->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->RegistracionEditPanel_Create();
        $this->dtgRegistraciones->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgRegistraciones;
            case 'EditPanel': return $this->pnlEditRegistracion;
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
