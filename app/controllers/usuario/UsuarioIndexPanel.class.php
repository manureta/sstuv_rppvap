<?php
/**
 * Este es un panel índice que hereda de UsuarioIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class UsuarioIndexPanel extends UsuarioIndexPanelGen {

    public $strTitulo = 'Usuario';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'Usuario'
            );
    }

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if(!Permission::EsSuperAdministrador())
            QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
        

    }

    

}
?>