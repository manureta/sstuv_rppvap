<?php
require(__DATAGEN_CLASSES__ . '/CensoGrupoFamiliarGen.class.php');

class CensoGrupoFamiliar extends CensoGrupoFamiliarGen {
    protected $strNoun = 'CensoGrupoFamiliar';
    protected $strNounPlural = 'CensoGrupoFamiliares';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('CensoGrupoFamiliar %s',  $this->intId);
    }

}
?>