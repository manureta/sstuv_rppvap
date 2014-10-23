<?php
require(__DATAGEN_CLASSES__ . '/AntecedentesGen.class.php');

class Antecedentes extends AntecedentesGen {
    protected $strNoun = 'Antecedentes';
    protected $strNounPlural = 'Antecedenteses';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Antecedentes %s',  $this->intId);
    }

}
?>