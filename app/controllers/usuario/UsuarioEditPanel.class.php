<?php
class UsuarioEditPanel extends UsuarioEditPanelGen {

    // Local instance of the UsuarioMetaControl
    public $mctUsuario;

    //id variables for meta_create
    protected $intIdUsuario;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdUsuario' => false,
        'txtPassword' => true,
        'txtEmail' => true,
        'chkSuperAdmin' => true,
        'calFechaActivacion' => true,
        'txtNombre' => true,
        'lstIdPerfilObject' => true,
        'txtRespuestaA' => true,
        'txtRespuestaB' => true,
        'txtPreguntaSecretaA' => true,
        'txtPreguntaSecretaB' => true,
        'txtCodPartido' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intIdUsuario = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(UsuarioEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intIdUsuario = $intIdUsuario;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab("Usuarios");
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the UsuarioMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctUsuario = UsuarioMetaControl::Create($this, $this->intIdUsuario);

        // Call MetaControl's methods to create qcontrols based on Usuario's data fields
        if (in_array('lblIdUsuario',$strControlsArray)) 
            $this->objControlsArray['lblIdUsuario'] = $this->mctUsuario->lblIdUsuario_Create();
        if (in_array('txtPassword',$strControlsArray)) 
            $this->objControlsArray['txtPassword'] = $this->mctUsuario->txtPassword_Create();
        if (in_array('txtEmail',$strControlsArray)) 
            $this->objControlsArray['txtEmail'] = $this->mctUsuario->txtEmail_Create();
        if (in_array('chkSuperAdmin',$strControlsArray)) 
            $this->objControlsArray['chkSuperAdmin'] = $this->mctUsuario->chkSuperAdmin_Create();
        if (in_array('calFechaActivacion',$strControlsArray)) 
            $this->objControlsArray['calFechaActivacion'] = $this->mctUsuario->calFechaActivacion_Create();
        if (in_array('txtNombre',$strControlsArray)) 
            $this->objControlsArray['txtNombre'] = $this->mctUsuario->txtNombre_Create();
        if (in_array('lstIdPerfilObject',$strControlsArray)) 
            $this->objControlsArray['lstIdPerfilObject'] = $this->mctUsuario->lstIdPerfilObject_Create();
        if (in_array('txtRespuestaA',$strControlsArray)) 
            $this->objControlsArray['txtRespuestaA'] = $this->mctUsuario->txtRespuestaA_Create();
        if (in_array('txtRespuestaB',$strControlsArray)) 
            $this->objControlsArray['txtRespuestaB'] = $this->mctUsuario->txtRespuestaB_Create();
        if (in_array('txtPreguntaSecretaA',$strControlsArray)) 
            $this->objControlsArray['txtPreguntaSecretaA'] = $this->mctUsuario->txtPreguntaSecretaA_Create();
        if (in_array('txtPreguntaSecretaB',$strControlsArray)) 
            $this->objControlsArray['txtPreguntaSecretaB'] = $this->mctUsuario->txtPreguntaSecretaB_Create();
        if (in_array('txtCodPartido',$strControlsArray)) 
            $this->objControlsArray['txtCodPartido'] = $this->mctUsuario->txtCodPartido_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
        
    }


}
?>