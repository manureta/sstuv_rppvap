<?php
/**
 * Este es un panel índice que hereda de SituacionAmbientalIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class SituacionAmbientalIndexPanel extends SituacionAmbientalIndexPanelGen {

    public $strTitulo = 'SituacionAmbiental';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'SituacionAmbiental'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
