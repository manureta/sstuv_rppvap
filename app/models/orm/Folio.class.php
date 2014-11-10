<?php
require(__DATAGEN_CLASSES__ . '/FolioGen.class.php');

class Folio extends FolioGen {
    protected $strNoun = 'Folio';
    protected $strNounPlural = 'Folios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('%s',  $this->strCodFolio);
    }

    public function Save($blnForceInsert = false, $blnForceUpdate = false){
    	$this->strCodFolio = sprintf("%s%s",$this->IdPartidoObject->CodPartido , $this->strMatricula);
    	parent::Save();
    }

}
?>