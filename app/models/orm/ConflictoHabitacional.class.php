<?php
require(__DATAGEN_CLASSES__ . '/ConflictoHabitacionalGen.class.php');

class ConflictoHabitacional extends ConflictoHabitacionalGen {
    protected $strNoun = 'ConflictoHabitacional';
    protected $strNounPlural = 'ConflictoHabitacionales';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('ConflictoHabitacional %s',  $this->intId);
    }

}
?>