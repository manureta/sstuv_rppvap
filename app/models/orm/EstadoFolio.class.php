<?php
require(__DATAGEN_CLASSES__ . '/EstadoFolioGen.class.php');

class EstadoFolio extends EstadoFolioGen {
    protected $strNoun = 'EstadoFolio';
    protected $strNounPlural = 'EstadoFolios';
    protected $blnGenderMale = true;

    public function __toString() {
        return $this->strDescripcion;
        return sprintf('EstadoFolio %s',  $this->intId);
    }

}
?>