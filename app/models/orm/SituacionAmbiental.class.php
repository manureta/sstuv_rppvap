<?php
require(__DATAGEN_CLASSES__ . '/SituacionAmbientalGen.class.php');

class SituacionAmbiental extends SituacionAmbientalGen {
    protected $strNoun = 'SituacionAmbiental';
    protected $strNounPlural = 'SituacionAmbientales';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('SituacionAmbiental %s',  $this->intId);
    }

}
?>