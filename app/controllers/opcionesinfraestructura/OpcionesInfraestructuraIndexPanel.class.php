<?php
/**
 * Este es un panel índice que hereda de OpcionesInfraestructuraIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class OpcionesInfraestructuraIndexPanel extends OpcionesInfraestructuraIndexPanelGen {

    public $strTitulo = 'OpcionesInfraestructura';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'OpcionesInfraestructura'
            );
    }

}
?>