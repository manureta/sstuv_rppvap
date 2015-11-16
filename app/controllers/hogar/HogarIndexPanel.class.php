<?php
/**
 * Este es un panel índice que hereda de HogarIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class HogarIndexPanel extends HogarIndexPanelGen {

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


     $this->strColumnsArray = is_null($strColumnsArray) ? HogarDataGrid::$strColumnsArray : $strColumnsArray;
     $this->strControlsArray = is_null($strControlsArray) ? array_keys(HogarEditPanel::$strControlsArray, true) : $strControlsArray;

     //Creo el datagrid
     $this->dtgHogar_Create();

     //Botón de creación
     $this->btnCreateNew_Create();
     $this->btnCreateNew->Text="Añadir Grupo Familiar";

     $this->blnAutoRenderChildren = false;

     if (isset($this->pnlEditHogar)) {
         $this->Form->RemoveControl($this->pnlEditHogar->ControlId);
     }

 }

  public function GetBreadCrumb() {
      return array(
              'Censo / Adjudicación'
          );
  }

}
?>
