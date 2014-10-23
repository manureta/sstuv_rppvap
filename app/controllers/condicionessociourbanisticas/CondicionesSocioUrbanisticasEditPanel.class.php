<?php
class CondicionesSocioUrbanisticasEditPanel extends CondicionesSocioUrbanisticasEditPanelGen {

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $intIdFolio = null, $strControlId = null) {
      
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $intIdFolio , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }


}
?>