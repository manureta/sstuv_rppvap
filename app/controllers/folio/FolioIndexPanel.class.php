<?php
/**
 * Este es un panel índice que hereda de FolioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class FolioIndexPanel extends FolioIndexPanelGen {

    public $strTitulo = 'Folio';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Folio'
            );
    }

}
?>