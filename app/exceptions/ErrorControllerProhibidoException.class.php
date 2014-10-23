<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ErrorNoAutenticadoException
 *
 * @author hernol
 */
class ErrorControllerProhibidoException extends Exception {
    public function __construct($strEntidad){
        parent::__construct(sprintf("Prohibido acceder a %s.", $strEntidad), 1);
    }
}
?>
