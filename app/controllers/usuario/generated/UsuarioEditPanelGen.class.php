<?php
class UsuarioEditPanelGen extends EditPanelBase {
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
        $this->pnlTabs->AddTab(Usuario::Noun());
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

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Usuario::GenderMale() ? 'e' : 'a'), Usuario::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctUsuario->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the UsuarioMetaControl
        $this->mctUsuario->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the UsuarioMetaControl
        $this->mctUsuario->DeleteUsuario();
        $this->btnCancel_Click();
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
            case 'Modal': 
                if (!isset($this->mdlPanel)) $this->mdlPanel_Create();
                return $this->mdlPanel;
            default: 
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function __set($strName, $mixValue) {
        $this->blnModified = true;
        if (is_array($this->objControlsArray) &&
                $mixValue instanceof QControl) { //solo dejo agregar controles
            return $this->objControlsArray[$strName] = $mixValue;
        }
        try {
            parent::__set($strName, $mixValue);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

}
?>
