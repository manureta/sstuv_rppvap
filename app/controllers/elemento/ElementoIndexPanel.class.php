<?php
/**
 * Este es un panel índice que hereda de ElementoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class ElementoIndexPanel extends ElementoIndexPanelGen {

    public $strTitulo = 'Elemento';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Elemento'
            );
    }

}
?>