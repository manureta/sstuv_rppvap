<?php
require(__DATAGEN_CLASSES__ . '/ComentariosGen.class.php');

class Comentarios extends ComentariosGen {
    protected $strNoun = 'Comentarios';
    protected $strNounPlural = 'Comentarioses';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('Comentarios %s',  $this->intId);
    }

}
?>