<?php
require(__DATAGEN_CLASSES__ . '/PartidoGen.class.php');

class Partido extends PartidoGen {
    protected $strNoun = 'Partido';
    protected $strNounPlural = 'Partidos';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Partido %s',  $this->intId);
    }

}
?>