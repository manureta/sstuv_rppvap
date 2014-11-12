<?php
/**
 * Este es un panel índice que hereda de UsoInternoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class UsoInternoIndexPanel extends UsoInternoIndexPanelGen {

    public $strTitulo = 'UsoInterno';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'UsoInterno'
            );
    }

}
?>