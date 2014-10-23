<?php
/**
 * Este es un panel índice que hereda de PerfilIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class PerfilIndexPanel extends PerfilIndexPanelGen {

    public $strTitulo = 'Perfil';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Perfil'
            );
    }

}
?>