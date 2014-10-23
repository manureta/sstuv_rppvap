<?php
/**
 * Este es un panel índice que hereda de EstadoProcesoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class EstadoProcesoIndexPanel extends EstadoProcesoIndexPanelGen {

    public $strTitulo = 'EstadoProceso';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'EstadoProceso'
            );
    }

}
?>