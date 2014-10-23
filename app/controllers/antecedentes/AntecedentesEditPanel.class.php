<?php
class AntecedentesEditPanel extends AntecedentesEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>