<?php
require(__DATAGEN_CLASSES__ . '/RegularizacionGen.class.php');

class Regularizacion extends RegularizacionGen {
    protected $strNoun = 'Regularizacion';
    protected $strNounPlural = 'Regularizaciones';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Regularizacion %s',  $this->intId);
    }

}
?>