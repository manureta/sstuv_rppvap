<?php
/**
 * Este es un panel índice que hereda de LocalidadIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class LocalidadIndexPanel extends LocalidadIndexPanelGen {

    public $strTitulo = 'Localidad';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Localidad'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
