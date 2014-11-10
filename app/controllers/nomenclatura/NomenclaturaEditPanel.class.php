<?php
class NomenclaturaEditPanel extends NomenclaturaEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }
    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the NomenclaturaMetaControl
        $this->mctNomenclatura->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/". $this->mctNomenclatura->Nomenclatura->IdFolio) ; 
    }

}
?>