<?php
/**
 * Este es un panel índice que hereda de OpcionesEstadoExpropiacionIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class OpcionesEstadoExpropiacionIndexPanel extends OpcionesEstadoExpropiacionIndexPanelGen {

    public $strTitulo = 'OpcionesEstadoExpropiacion';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'OpcionesEstadoExpropiacion'
            );
    }

}
?>