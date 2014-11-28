<?php
/**
 * Este es un panel índice que hereda de NomenclaturaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class NomenclaturaIndexPanel extends NomenclaturaIndexPanelGen {

    public $strTitulo = 'Nomenclatura';
    public $strSubtitulo = '';
    public $strTemplate='';
    public $btnParcelas;

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
    	$this->strTemplate=__VIEW_DIR__."/nomenclatura/NomenclaturaFolioPanel.tpl.php";
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
            $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Nomenclatura::Noun();
        //$this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? NomenclaturaDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(NomenclaturaEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgNomenclatura_Create();

        //Botón de creación
        $this->btnCreateNew_Create();

        // boton para calcular parcelas
        $this->btnParcelas_Create();

        $this->blnAutoRenderChildren = false;
        
        if (isset($this->pnlEditNomenclatura)) {
            $this->Form->RemoveControl($this->pnlEditNomenclatura->ControlId);
        }

    }

    public function GetBreadCrumb() {
        return array(
                'Nomenclatura'
            );
    }

      protected function btnParcelas_Create() {
        $this->btnParcelas = new QButton($this);
        $this->btnParcelas->Text = "Calcular Parcelas";
        $this->btnParcelas->AddCssClass('btn-red btn-create-indexpanel');
        $this->btnParcelas->Icon = 'plus';
        $this->btnParcelas->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnParcelas_Click'));

        return $this->btnCreateNew;            
    }

     public function btnParcelas_Click($strFormId, $strControlId, $strParameter) {
        QApplication::ExecuteJavascript("alert('calculando')");
        $this->Refresh();
    }

}
?>