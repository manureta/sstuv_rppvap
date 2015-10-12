<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de CondicionesSocioUrbanisticases
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen
 *
 */
class CondicionesSocioUrbanisticasIndexPanel extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar CondicionesSocioUrbanisticases
    public $dtgCondicionesSocioUrbanisticases;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditCondicionesSocioUrbanisticas;

    // Redefinicion de visibilidad de columnas y controles
    protected $strColumnsArray;
    protected $strControlsArray;
    public $strTemplate='';

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

      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");

/*
        try {
            parent::__construct($objParentObject, $strControlId);
            //$this->strTemplate=__VIEW_DIR__."/condicionessociourbanisticas/CondicionesSocioUrbanisticasIndexPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
            //$this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : CondicionesSocioUrbanisticas::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';

        $this->strColumnsArray = is_null($strColumnsArray) ? CondicionesSocioUrbanisticasDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(CondicionesSocioUrbanisticasEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgCondicionesSocioUrbanisticas_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        $this->blnAutoRenderChildren = true;

        if (isset($this->pnlEditCondicionesSocioUrbanisticas)) {
            $this->Form->RemoveControl($this->pnlEditCondicionesSocioUrbanisticas->ControlId);
        }
*/
    }

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', CondicionesSocioUrbanisticas::GenderMale() ? '':'a', CondicionesSocioUrbanisticas::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;
    }

    protected function dtgCondicionesSocioUrbanisticas_Create() {
        $this->dtgCondicionesSocioUrbanisticases = new CondicionesSocioUrbanisticasDataGrid($this, $this->strColumnsArray);
        $this->dtgCondicionesSocioUrbanisticases->RowClickMethod = 'dtgRow_Click';
        return $this->dtgCondicionesSocioUrbanisticases;
    }

    public function CondicionesSocioUrbanisticasEditPanel_Create($intIdintIdFolio = null) {
        if (isset($this->pnlEditCondicionesSocioUrbanisticas))
            $this->Form->RemoveControl($this->pnlEditCondicionesSocioUrbanisticas->ControlId);
        return $this->pnlEditCondicionesSocioUrbanisticas = new CondicionesSocioUrbanisticasEditPanel($this, $this->strControlsArray, $intIdintIdFolio);
    }

    public function dtgRow_Click(CondicionesSocioUrbanisticas $objCondicionesSocioUrbanisticas) {
        $this->CondicionesSocioUrbanisticasEditPanel_Create($objCondicionesSocioUrbanisticas->IdIdFolio);
        $this->dtgCondicionesSocioUrbanisticases->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->CondicionesSocioUrbanisticasEditPanel_Create();
        $this->dtgCondicionesSocioUrbanisticases->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgCondicionesSocioUrbanisticases;
            case 'EditPanel': return $this->pnlEditCondicionesSocioUrbanisticas;
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
