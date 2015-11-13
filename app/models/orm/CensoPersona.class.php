<?php
require(__DATAGEN_CLASSES__ . '/CensoPersonaGen.class.php');

class CensoPersona extends CensoPersonaGen {
    protected $strNoun = 'CensoPersona';
    protected $strNounPlural = 'CensoPersonas';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('CensoPersona %s',  $this->intId);
    }

}
?>