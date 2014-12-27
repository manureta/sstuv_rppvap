<?php
require(__DATAGEN_CLASSES__ . '/EvolucionFolioGen.class.php');

class EvolucionFolio extends EvolucionFolioGen {
    protected $strNoun = 'EvolucionFolio';
    protected $strNounPlural = 'EvolucionFolios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('EvolucionFolio %s',  $this->intId);
    }

}
?>