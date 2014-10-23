<?php
/**
 * Este es un panel índice que hereda de AprobacionGeodesiaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class AprobacionGeodesiaIndexPanel extends AprobacionGeodesiaIndexPanelGen {

    public $strTitulo = 'AprobacionGeodesia';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'AprobacionGeodesia'
            );
    }

}
?>