<?php
/**
 * Este es un panel índice que hereda de EquipamientoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class EquipamientoIndexPanel extends EquipamientoIndexPanelGen {

    public $strTitulo = 'Equipamiento';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Equipamiento'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
     // Redirecciono para ocultar controlador
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
    }

}
?>
