<?php
/**
 * Este es un panel índice que hereda de TransporteIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class TransporteIndexPanel extends TransporteIndexPanelGen {

    public $strTitulo = 'Transporte';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Transporte'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
