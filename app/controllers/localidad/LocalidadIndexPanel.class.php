<?php
/**
 * Este es un panel índice que hereda de LocalidadIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class LocalidadIndexPanel extends LocalidadIndexPanelGen {

    public $strTitulo = 'Localidad';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Localidad'
            );
    }

}
?>