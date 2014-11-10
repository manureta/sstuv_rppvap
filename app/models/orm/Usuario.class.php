<?php
require(__DATAGEN_CLASSES__ . '/UsuarioGen.class.php');

class Usuario extends UsuarioGen {
    protected $strNoun = 'Usuario';
    protected $strNounPlural = 'Usuarios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Usuario %s',  $this->intIdUsuario);
    }

}
?>