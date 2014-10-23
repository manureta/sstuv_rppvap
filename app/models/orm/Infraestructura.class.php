<?php
require(__DATAGEN_CLASSES__ . '/InfraestructuraGen.class.php');

class Infraestructura extends InfraestructuraGen {
    protected $strNoun = 'Infraestructura';
    protected $strNounPlural = 'Infraestructuras';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Infraestructura %s',  $this->intId);
    }

}
?>