<?php
/**
 * Este es un panel índice que hereda de UsoInternoIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class UsoInternoIndexPanel extends UsoInternoIndexPanelGen {

    public $strTitulo = 'UsoInterno';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'UsoInterno'
            );
    }


     public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
      // Redirecciono para ocultar controlador  
       QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
     }

}
?>
