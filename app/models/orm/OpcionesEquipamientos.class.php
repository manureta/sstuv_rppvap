<?php
require(__DATAGEN_CLASSES__ . '/OpcionesEquipamientosGen.class.php');

class OpcionesEquipamientos extends OpcionesEquipamientosGen {
    protected $strNoun = 'opción';
    protected $strNounPlural = 'OpcionesEquipamientoses';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('%s',  $this->strOpcion);
    }

}
?>