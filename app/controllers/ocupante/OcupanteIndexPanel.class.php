<?php
/**
 * Este es un panel índice que hereda de OcupanteIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class OcupanteIndexPanel extends OcupanteIndexPanelGen {

    public $strTitulo = 'Ocupante';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Ocupante'
            );
    }

}
?>