<?php
/**
 * Este es un panel índice que hereda de UsuarioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class UsuarioIndexPanel extends UsuarioIndexPanelGen {

    public $strTitulo = 'Usuario';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Usuario'
            );
    }

}
?>