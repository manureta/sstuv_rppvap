<?php

/**
 * Description of CuadroBase
 *
 * @author
 */
abstract class CuadroFijoBase extends CuadroBase {

    protected $strTituloFilas;

    public function __construct() {
        $this->CrearColumnas();
        $this->CrearFilas();
        $this->DeshabilitarCeldas();
    }

    public function __get($strName) {
        switch ($strName) {
            case 'TituloFilas':
                return $this->strTituloFilas;
            default:
                return parent::__get($strName);
        }
    }

}


?>
