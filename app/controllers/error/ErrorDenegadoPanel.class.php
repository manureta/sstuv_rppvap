<?php
class ErrorDenegadoPanel extends QPanel {



    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
        // Call the Parent

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        QApplication::DisplayAlert("ERROR: El acceso a esta pagina se encuentra denegado.");
        $this->Template = __VIEW_DIR__.'/error/errorDenegado.tpl.php';
    }



}
?>