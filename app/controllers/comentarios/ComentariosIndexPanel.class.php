<?php
/**
 * Este es un panel índice que hereda de ComentariosIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class ComentariosIndexPanel extends ComentariosIndexPanelGen {

    public $strTitulo = 'Comentarios';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Comentarios'
            );
    }

}
?>