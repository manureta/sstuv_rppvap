<?php
require(__DATAGEN_CLASSES__ . '/ElementoGen.class.php');

class Elemento extends ElementoGen {
    protected $strNoun = 'Elemento';
    protected $strNounPlural = 'Elementos';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Elemento %s',  $this->intIdElemento);
    }

}
?>