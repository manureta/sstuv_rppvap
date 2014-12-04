<?php
/**
 * Este es un panel índice que hereda de ArchivosAdjuntosIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class ArchivosAdjuntosIndexPanel extends ArchivosAdjuntosIndexPanelGen {

    public $strTitulo = 'ArchivosAdjuntos';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'ArchivosAdjuntos'
            );
    }

}
?>