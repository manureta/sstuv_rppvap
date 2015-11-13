<?php
/**
 * Este es un panel índice que hereda de CensoGrupoFamiliarIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class CensoGrupoFamiliarIndexPanel extends CensoGrupoFamiliarIndexPanelGen {

    public $strTitulo = 'CensoGrupoFamiliar';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'CensoGrupoFamiliar'
            );
    }

}
?>