<?php
require(__DATAGEN_CLASSES__ . '/OpcionesInfraestructuraGen.class.php');

class OpcionesInfraestructura extends OpcionesInfraestructuraGen {
    protected $strNoun = 'OpcionesInfraestructura';
    protected $strNounPlural = 'OpcionesInfraestructuras';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('OpcionesInfraestructura %s',  $this->intId);
    }

}
?>