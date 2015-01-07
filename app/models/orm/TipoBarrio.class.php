<?php
require(__DATAGEN_CLASSES__ . '/TipoBarrioGen.class.php');

class TipoBarrio extends TipoBarrioGen {
    protected $strNoun = 'TipoBarrio';
    protected $strNounPlural = 'TipoBarrios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('%s',  $this->strTipo);
    }

    public static function Noun() {
        return 'tipo de barrio';
    }
    public static function NounPlural() {
        return 'tipos de barrios';
    }
    public static function GenderMale() {
        return true;
    }

}
?>