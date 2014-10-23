<?php
class ElementoHijoEditPanel extends ElementoHijoEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intIdElementoHijo = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intIdElementoHijo , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>