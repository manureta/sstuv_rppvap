<?php
/**
 * Este es un panel índice que hereda de PartidoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class PartidoIndexPanel extends PartidoIndexPanelGen {

    public $strTitulo = 'Partido';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Partido'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
