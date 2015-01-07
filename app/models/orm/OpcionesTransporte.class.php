<?php
require(__DATAGEN_CLASSES__ . '/OpcionesTransporteGen.class.php');

class OpcionesTransporte extends OpcionesTransporteGen {
    protected $strNoun = 'OpcionesTransporte';
    protected $strNounPlural = 'OpcionesTransportes';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('%s',  $this->strOpcion);
    }

    public static function Noun() {
        return 'valor';
    }

}
?>