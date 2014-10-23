<?php
require(__DATAGEN_CLASSES__ . '/AprobacionGeodesiaGen.class.php');

class AprobacionGeodesia extends AprobacionGeodesiaGen {
    protected $strNoun = 'AprobacionGeodesia';
    protected $strNounPlural = 'AprobacionGeodesias';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('AprobacionGeodesia %s',  $this->intId);
    }

}
?>