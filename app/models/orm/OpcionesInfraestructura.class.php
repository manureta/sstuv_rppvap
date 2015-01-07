<?php
require(__DATAGEN_CLASSES__ . '/OpcionesInfraestructuraGen.class.php');

class OpcionesInfraestructura extends OpcionesInfraestructuraGen {
    protected $strNoun = 'valor';
    protected $strNounPlural = 'OpcionesInfraestructuras';
    protected $blnGenderMale = false;

   public function __toString() {
        return sprintf('%s',  $this->strOpcion);
    }
    public static function Noun() {
        return 'valor';
    }

}
?>