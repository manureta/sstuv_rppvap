<?php
require(__DATAGEN_CLASSES__ . '/EncuadreLegalGen.class.php');

class EncuadreLegal extends EncuadreLegalGen {
    protected $strNoun = 'EncuadreLegal';
    protected $strNounPlural = 'EncuadreLegales';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('EncuadreLegal %s',  $this->intId);
    }

}
?>