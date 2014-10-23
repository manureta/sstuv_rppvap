<?php
/**
 * Este es un panel índice que hereda de ElementoHijoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class ElementoHijoIndexPanel extends ElementoHijoIndexPanelGen {

    public $strTitulo = 'ElementoHijo';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'ElementoHijo'
            );
    }

}
?>