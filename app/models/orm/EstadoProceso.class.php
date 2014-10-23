<?php
require(__DATAGEN_CLASSES__ . '/EstadoProcesoGen.class.php');

class EstadoProceso extends EstadoProcesoGen {
    protected $strNoun = 'EstadoProceso';
    protected $strNounPlural = 'EstadoProcesos';
    protected $blnGenderMale = true;

    public function __toString() {
        return $this->strDescripcion;
        return sprintf('EstadoProceso %s',  $this->intId);
    }

}
?>