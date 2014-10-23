<?php
require(__DATAGEN_CLASSES__ . '/FolioGen.class.php');

class Folio extends FolioGen {
    protected $strNoun = 'Folio';
    protected $strNounPlural = 'Folios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Folio %s',  $this->intId);
    }

}
?>