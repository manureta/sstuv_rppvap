<?php
require(__DATAGEN_CLASSES__ . '/OpcionesEquipamientosGen.class.php');

class OpcionesEquipamientos extends OpcionesEquipamientosGen {
    protected $strNoun = 'OpcionesEquipamientos';
    protected $strNounPlural = 'OpcionesEquipamientoses';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('OpcionesEquipamientos %s',  $this->intId);
    }

}
?>