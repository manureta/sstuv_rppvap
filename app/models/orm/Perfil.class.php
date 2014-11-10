<?php
require(__DATAGEN_CLASSES__ . '/PerfilGen.class.php');

class Perfil extends PerfilGen {
    protected $strNoun = 'Perfil';
    protected $strNounPlural = 'Perfiles';
    protected $blnGenderMale = true;

    public function __toString() {
        return $this->strDescripcion;
        return sprintf('Perfil %s',  $this->intIdPerfil);
    }

}
?>