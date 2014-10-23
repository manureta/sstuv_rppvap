<?php
require(__DATAGEN_CLASSES__ . '/TransporteGen.class.php');

class Transporte extends TransporteGen {
    protected $strNoun = 'Transporte';
    protected $strNounPlural = 'Transportes';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Transporte %s',  $this->intId);
    }

}
?>