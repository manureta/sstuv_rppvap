<?php
require(__DATAGEN_CLASSES__ . '/OcupanteGen.class.php');

class Ocupante extends OcupanteGen {
    protected $strNoun = 'Ocupante';
    protected $strNounPlural = 'Ocupantes';
    protected $blnGenderMale = true;
  

    public function __toString() {
        return sprintf('Ocupante %s',  $this->intId);
    }

}
?>
