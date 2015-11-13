<?php
/**
 * Este es un panel índice que hereda de CensoPersonaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class CensoPersonaIndexPanel extends CensoPersonaIndexPanelGen {

    public $strTitulo = 'CensoPersona';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'CensoPersona'
            );
    }

}
?>