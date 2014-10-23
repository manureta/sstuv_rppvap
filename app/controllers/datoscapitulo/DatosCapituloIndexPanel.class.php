<?php
/**
 * Este es un panel índice que hereda de DatosCapituloIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class DatosCapituloIndexPanel extends DatosCapituloIndexPanelGen {

    public $strTitulo = 'DatosCapitulo';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'DatosCapitulo'
            );
    }

}
?>