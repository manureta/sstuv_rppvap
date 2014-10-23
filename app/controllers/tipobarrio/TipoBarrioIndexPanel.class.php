<?php
/**
 * Este es un panel índice que hereda de TipoBarrioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class TipoBarrioIndexPanel extends TipoBarrioIndexPanelGen {

    public $strTitulo = 'TipoBarrio';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'TipoBarrio'
            );
    }

}
?>