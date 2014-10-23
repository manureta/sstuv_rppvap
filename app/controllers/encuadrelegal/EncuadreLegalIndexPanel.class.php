<?php
/**
 * Este es un panel índice que hereda de EncuadreLegalIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class EncuadreLegalIndexPanel extends EncuadreLegalIndexPanelGen {

    public $strTitulo = 'EncuadreLegal';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'EncuadreLegal'
            );
    }

}
?>