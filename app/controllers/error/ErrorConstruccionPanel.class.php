<?php
class ErrorConstruccionPanel extends QPanel {



    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
        // Call the Parent

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        QApplication::DisplayAlert("ERROR: Esta página se encuentra en construcción.");
        $this->Template = __VIEW_DIR__.'/error/errorConstruccion.tpl.php';
    }



}
?>
