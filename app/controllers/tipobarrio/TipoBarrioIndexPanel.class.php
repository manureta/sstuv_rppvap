<?php
/**
 * Este es un panel índice que hereda de TipoBarrioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class TipoBarrioIndexPanel extends TipoBarrioIndexPanelGen {

    public $strTitulo = 'TipoBarrio';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'TipoBarrio'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
