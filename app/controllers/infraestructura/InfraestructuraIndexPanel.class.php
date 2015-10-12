<?php
/**
 * Este es un panel índice que hereda de InfraestructuraIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class InfraestructuraIndexPanel extends InfraestructuraIndexPanelGen {

    public $strTitulo = 'Infraestructura';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Infraestructura'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
