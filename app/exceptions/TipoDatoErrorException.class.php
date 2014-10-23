<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TipoDatoErrorException extends QCallerException {
    // TODO MENSAJE DE ERROR
    public function __construct() {
        parent::__construct(sprintf("ERROR: Tipo de dato no valido."));
    }
}

?>
