<?php
class PerfilEditPanel extends PerfilEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intIdPerfil = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intIdPerfil , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>