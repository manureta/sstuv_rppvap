<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ErrorNoautenticadoPanelclass
 *
 * @author hernol
 */
class ErrorNoautenticadoPanel extends QPanel {
    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
    // Call the Parent

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            //throw $objExc;
        }
        $this->Template = __VIEW_DIR__.'/error/ErrorNoAutenticado.tpl.php';
    }
}
?>
