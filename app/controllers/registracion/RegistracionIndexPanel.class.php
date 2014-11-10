<?php
/**
 * Este es un panel índice que hereda de RegistracionIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class RegistracionIndexPanel extends RegistracionIndexPanelGen {

    public $strTitulo = 'Registracion';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Registracion'
            );
    }

}
?>