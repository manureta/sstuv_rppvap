<?php
class CondicionesSocioUrbanisticasEditPanel extends CondicionesSocioUrbanisticasEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strIdFolio = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strIdFolio , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>