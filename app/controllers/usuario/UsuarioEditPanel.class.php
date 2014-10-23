<?php
class UsuarioEditPanel extends UsuarioEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intIdUsuario = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intIdUsuario , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>