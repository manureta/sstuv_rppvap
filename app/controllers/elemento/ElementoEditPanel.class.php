<?php
class ElementoEditPanel extends ElementoEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intIdElemento = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intIdElemento , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>