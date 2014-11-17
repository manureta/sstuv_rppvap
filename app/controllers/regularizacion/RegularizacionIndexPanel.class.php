<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Regularizaciones
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class RegularizacionIndexPanel extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Regularizaciones
    public $dtgRegularizaciones;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditRegularizacion;

    // Redefinicion de visibilidad de columnas y controles
    protected $strColumnsArray;
    protected $strControlsArray;
    public $strTemplate;    

    
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
            $this->strTemplate=__VIEW_DIR__."/regularizacion/RegularizacionIndexPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
          //  $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Regularizacion::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? RegularizacionDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(RegularizacionEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgRegularizacion_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;
        
        if (isset($this->pnlEditRegularizacion)) {
            $this->Form->RemoveControl($this->pnlEditRegularizacion->ControlId);
        }

    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Regularizacion::GenderMale() ? '':'a', Regularizacion::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgRegularizacion_Create() {            
        $this->dtgRegularizaciones = new RegularizacionDataGrid($this, $this->strColumnsArray);
        $this->dtgRegularizaciones->RowClickMethod = 'dtgRow_Click';
        return $this->dtgRegularizaciones;
    }

    public function RegularizacionEditPanel_Create($intId = null) {
        if (isset($this->pnlEditRegularizacion))
            $this->Form->RemoveControl($this->pnlEditRegularizacion->ControlId);
        return $this->pnlEditRegularizacion = new RegularizacionEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Regularizacion $objRegularizacion) {
        $this->RegularizacionEditPanel_Create($objRegularizacion->Id);
        $this->dtgRegularizaciones->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->RegularizacionEditPanel_Create();
        $this->dtgRegularizaciones->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgRegularizaciones;
            case 'EditPanel': return $this->pnlEditRegularizacion;
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
