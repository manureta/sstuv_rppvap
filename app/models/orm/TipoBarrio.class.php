<?php
require(__DATAGEN_CLASSES__ . '/TipoBarrioGen.class.php');

class TipoBarrio extends TipoBarrioGen {
    protected $strNoun = 'TipoBarrio';
    protected $strNounPlural = 'TipoBarrios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('TipoBarrio %s',  $this->intId);
    }

}
?>