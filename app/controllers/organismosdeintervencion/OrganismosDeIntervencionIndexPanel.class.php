<?php
/**
 * Este es un panel índice que hereda de OrganismosDeIntervencionIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class OrganismosDeIntervencionIndexPanel extends OrganismosDeIntervencionIndexPanelGen {

    public $strTitulo = 'OrganismosDeIntervencion';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'OrganismosDeIntervencion'
            );
    }
    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
