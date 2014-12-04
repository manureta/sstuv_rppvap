<?php
require(__DATAGEN_CLASSES__ . '/ArchivosAdjuntosGen.class.php');

class ArchivosAdjuntos extends ArchivosAdjuntosGen {
    protected $strNoun = 'ArchivosAdjuntos';
    protected $strNounPlural = 'ArchivosAdjuntoses';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('ArchivosAdjuntos %s',  $this->intId);
    }

}
?>