<?php
require(__DATAGEN_CLASSES__ . '/ElementoHijoGen.class.php');

class ElementoHijo extends ElementoHijoGen {
    protected $strNoun = 'ElementoHijo';
    protected $strNounPlural = 'ElementoHijos';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('ElementoHijo %s',  $this->intIdElementoHijo);
    }

}
?>