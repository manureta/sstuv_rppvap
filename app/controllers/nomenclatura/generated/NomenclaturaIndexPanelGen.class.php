<?php
/**
 * Controlador Índice.
 * Contiene un datagrid para el listado de Nomenclaturas
 * y un panel meta-control para la edición.
 *
 * @package Padrón establecimientos
 * @subpackage Controladores-Generado
 * @author Codegen     
 *
 */
class NomenclaturaIndexPanelGen extends QPanel {

    public $lblTitulo;

    // Instancia local de un DataGrid para listar Nomenclaturas
    public $dtgNomenclaturas;

    // Controles
    public $btnCreateNew;

    // Paneles
    public $pnlEditNomenclatura;

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
   

    protected function btnCreateNew_Create() {
        $this->btnCreateNew = new QButton($this);
        $this->btnCreateNew->Text = sprintf('Crear un%s %s', Nomenclatura::GenderMale() ? '':'a', Nomenclatura::Noun());
        $this->btnCreateNew->AddCssClass('btn-yellow btn-create-indexpanel');
        $this->btnCreateNew->Icon = 'plus';
        $this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));

        return $this->btnCreateNew;            
    }

    protected function dtgNomenclatura_Create() {            
        $this->dtgNomenclaturas = new NomenclaturaDataGrid($this, $this->strColumnsArray);
        $this->dtgNomenclaturas->RowClickMethod = 'dtgRow_Click';
        return $this->dtgNomenclaturas;
    }

    public function NomenclaturaEditPanel_Create($intId = null) {
        if (isset($this->pnlEditNomenclatura))
            $this->Form->RemoveControl($this->pnlEditNomenclatura->ControlId);
        return $this->pnlEditNomenclatura = new NomenclaturaEditPanel($this, $this->strControlsArray, $intId);
    }
    
    public function dtgRow_Click(Nomenclatura $objNomenclatura) {
        $this->NomenclaturaEditPanel_Create($objNomenclatura->Id);
        $this->dtgNomenclaturas->Visible=false;
        if ($this->btnCreateNew) $this->btnCreateNew->Visible=false;
        // si tengo un pivote padre
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->Refresh();
    }

    public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
        $this->NomenclaturaEditPanel_Create();
        $this->dtgNomenclaturas->Visible=false;
        if (isset($this->btnVolver)) $this->btnVolver->Visible = false;
        $this->btnCreateNew->Visible=false;
        $this->Refresh();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'DataGrid': return $this->dtgNomenclaturas;
            case 'EditPanel': return $this->pnlEditNomenclatura;
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
