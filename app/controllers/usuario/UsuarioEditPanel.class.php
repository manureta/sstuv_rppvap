<?php
class UsuarioEditPanel extends UsuarioEditPanelGen {

    // Local instance of the UsuarioMetaControl
    public $mctUsuario;

    //id variables for meta_create
    protected $intIdUsuario;


    public function __construct($objParentObject, $strControlsArray = array(), $intIdUsuario = null, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId,$intIdUsuario,$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        if(!Permission::EsAdministrador())
            QApplication::Redirect(__VIRTUAL_DIRECTORY__."/error/forbidden");
        
    }

}
?>
