<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CuadroFijoControl extends CuadroControl {
    
    public $lblTituloFilas;

    public function __construct($objParent, CuadroDao $objCuadroDao, $strControlId = null, $blnReadOnly = false) {
        try {
            parent::__construct($objParent, $objCuadroDao, $strControlId, $blnReadOnly);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!$this->strTemplate)
            $this->strTemplate = __VIEW_DIR__.'/cuadros/CuadroFijoPanel.tpl.php';

    }

}


?>
