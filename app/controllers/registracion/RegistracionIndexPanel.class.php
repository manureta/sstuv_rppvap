<?php

class RegistracionIndexPanel extends QPanel {
    public function __construct($objParentObject, $strClosePanelMethod = null, $strControlId = null, $a = null, $intCuit = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strClosePanelMethod, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $blnEnBuenosAires = false;
        
        if (!$blnEnBuenosAires) {
            if (defined('FECHA_FIN_ETAPA_UNO') && FECHA_FIN_ETAPA_UNO > date('Y-m-d')) {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/registracion/personal');
            } else {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/registracion/director');
            }
        } else {
            if (defined('FECHA_FIN_ETAPA_UNO_BSAS') && FECHA_FIN_ETAPA_UNO_BSAS > date('Y-m-d')) {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/registracion/personal');
            } else {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/registracion/director');
            }

        }
    }
}

?>
