<?php
/**
 * Este es un panel índice que hereda de EvolucionFolioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class EvolucionFolioIndexPanel extends EvolucionFolioIndexPanelGen {

    public $strTitulo = 'EvolucionFolio';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'EvolucionFolio'
            );
    }

}
?>