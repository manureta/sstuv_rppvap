<?php
require(__DATAGEN_CLASSES__ . '/LocalidadGen.class.php');

class Localidad extends LocalidadGen {
    protected $strNoun = 'Localidad';
    protected $strNounPlural = 'Localidades';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Localidad %s',  $this->intId);
    }

}
?>