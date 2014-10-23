<?php
require(__DATAGEN_CLASSES__ . '/ConsumoCulturalGen.class.php');

class ConsumoCultural extends ConsumoCulturalGen {
    protected $strNoun = 'ConsumoCultural';
    protected $strNounPlural = 'ConsumoCulturales';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('ConsumoCultural %s',  $this->intIdConsumoCultural);
    }

}
?>