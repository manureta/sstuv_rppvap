<?php
/**
 * Este es un panel índice que hereda de CensoGrupoFamiliarIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class CensoGrupoFamiliarIndexPanel extends CensoGrupoFamiliarIndexPanelGen {

    public $strTitulo = 'Censo';
    public $strSubtitulo = '';

     public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     	$this->strTemplate=__VIEW_DIR__."/censo/CensoFolioPanel.tpl.php";
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
            $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : CensoGrupoFamiliar::Noun();
        $this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? CensoGrupoFamiliarDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(CensoGrupoFamiliarEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgCensoGrupoFamiliar_Create();

        //Botón de creación
        $this->btnCreateNew_Create();
        $this->btnCreateNew->Text="Añadir Grupo Familiar";

        $this->blnAutoRenderChildren = false;
        
        if (isset($this->pnlEditCensoGrupoFamiliar)) {
            $this->Form->RemoveControl($this->pnlEditCensoGrupoFamiliar->ControlId);
        }

    }

    public function GetBreadCrumb() {
        return array(
                'Censo'
            );
    }

}
?>