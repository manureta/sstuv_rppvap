<?php
require(__DATAGEN_CLASSES__ . '/OrganismosDeIntervencionGen.class.php');

class OrganismosDeIntervencion extends OrganismosDeIntervencionGen {
    protected $strNoun = 'OrganismosDeIntervencion';
    protected $strNounPlural = 'OrganismosDeIntervenciones';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('OrganismosDeIntervencion %s',  $this->intId);
    }

}
?>