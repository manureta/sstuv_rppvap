<?php
/**
 * Este es un panel índice que hereda de OpcionesTransporteIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class OpcionesTransporteIndexPanel extends OpcionesTransporteIndexPanelGen {

    public $strTitulo = 'OpcionesTransporte';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'OpcionesTransporte'
            );
    }

}
?>