<?php
class UsoInternoEditPanel extends UsoInternoEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $strIdFolio = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $strIdFolio , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>