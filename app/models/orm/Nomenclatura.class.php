<?php
require(__DATAGEN_CLASSES__ . '/NomenclaturaGen.class.php');

class Nomenclatura extends NomenclaturaGen {
    protected $strNoun = 'Nomenclatura';
    protected $strNounPlural = 'Nomenclaturas';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Nomenclatura %s',  $this->intId);
    }

}
?>