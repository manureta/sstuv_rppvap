<?php
require(__DATAGEN_CLASSES__ . '/RegistracionGen.class.php');

class Registracion extends RegistracionGen {
    protected $strNoun = 'Registracion';
    protected $strNounPlural = 'Registraciones';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Registracion %s',  $this->intId);
    }

}
?>