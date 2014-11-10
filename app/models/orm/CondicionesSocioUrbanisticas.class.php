<?php
require(__DATAGEN_CLASSES__ . '/CondicionesSocioUrbanisticasGen.class.php');

class CondicionesSocioUrbanisticas extends CondicionesSocioUrbanisticasGen {
    protected $strNoun = 'CondicionesSocioUrbanisticas';
    protected $strNounPlural = 'CondicionesSocioUrbanisticases';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('CondicionesSocioUrbanisticas %s - %s',  $this->intId,  $this->strIdFolio);
    }

}
?>