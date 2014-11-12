<?php
require(__DATAGEN_CLASSES__ . '/UsoInternoGen.class.php');

class UsoInterno extends UsoInternoGen {
    protected $strNoun = 'UsoInterno';
    protected $strNounPlural = 'UsoInternos';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('UsoInterno %s',  $this->strIdFolio);
    }

}
?>