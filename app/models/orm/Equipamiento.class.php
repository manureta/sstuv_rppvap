<?php
require(__DATAGEN_CLASSES__ . '/EquipamientoGen.class.php');

class Equipamiento extends EquipamientoGen {
    protected $strNoun = 'Equipamiento';
    protected $strNounPlural = 'Equipamientos';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Equipamiento %s',  $this->intId);
    }

}
?>