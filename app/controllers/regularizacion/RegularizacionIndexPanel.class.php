<?php
/**
 * Este es un panel índice que hereda de RegularizacionIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class RegularizacionIndexPanel extends RegularizacionIndexPanelGen {

    public $strTitulo = 'Regularizacion';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Regularizacion'
            );
    }

}
?>