<?php
require(__DATAGEN_CLASSES__ . '/OpcionesEstadoExpropiacionGen.class.php');

class OpcionesEstadoExpropiacion extends OpcionesEstadoExpropiacionGen {
    protected $strNoun = 'OpcionesEstadoExpropiacion';
    protected $strNounPlural = 'OpcionesEstadoExpropiaciones';
    protected $blnGenderMale = true;

    public function __toString() {
        return $this->strDescripcion;
        return sprintf('OpcionesEstadoExpropiacion %s',  $this->intId);
    }

    public static function Noun() {
        return 'valor';
    }

}
?>