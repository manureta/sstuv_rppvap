<?php
/**
 * Este es un panel índice que hereda de ConflictoHabitacionalIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class ConflictoHabitacionalIndexPanel extends ConflictoHabitacionalIndexPanelGen {

    public $strTitulo = 'ConflictoHabitacional';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'ConflictoHabitacional'
            );
    }

}
?>