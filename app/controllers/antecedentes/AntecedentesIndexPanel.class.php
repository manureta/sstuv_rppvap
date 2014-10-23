<?php
/**
 * Este es un panel índice que hereda de AntecedentesIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class AntecedentesIndexPanel extends AntecedentesIndexPanelGen {

    public $strTitulo = 'Antecedentes';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Antecedentes'
            );
    }

}
?>