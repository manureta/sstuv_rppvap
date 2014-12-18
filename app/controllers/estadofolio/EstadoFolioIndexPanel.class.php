<?php
/**
 * Este es un panel índice que hereda de EstadoFolioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class EstadoFolioIndexPanel extends EstadoFolioIndexPanelGen {

    public $strTitulo = 'EstadoFolio';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'EstadoFolio'
            );
    }

}
?>