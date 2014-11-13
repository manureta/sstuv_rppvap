<?php
class UsuarioModalPanelGen extends EditPanelBase {

    public $mctUsuario;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
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
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objUsuario = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(UsuarioModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objUsuario)
            $objUsuario = new Usuario();
        
        $this->intIdUsuario = $objUsuario->IdUsuario;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Usuario::Noun());
        $this->metaControl_Create($strControlsArray, $objUsuario);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objUsuario){

        $this->mctUsuario = new UsuarioMetaControl($this, $objUsuario);

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
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctUsuario->objUsuario->__Restored)
            $this->objParentControl->objParentControl->lstUsuarioAsId->objParent->AddUsuarioAsId($this->mctUsuario->objUsuario);
        $this->mctUsuario->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctUsuario->objUsuario);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctUsuario = null;
        $this->blnChangesMade = false;
        $this->objParentControl->HideDialogBox();
    }
    
    // Close Myself and Call ClosePanelMethod Callback
    public function Close() {
        $objParentControl = $this->objParentControl;
        if (!$objParentControl)
            throw new QCallerException('Error llamando al metodo Close de un ModalPanel huerfano');
        while (!$objParentControl instanceof EditPanelBase) {
            if (is_null($objParentControl) ||
                $objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }
        QApplication::ExecuteJavaScript(sprintf('qcodo.EditPanel.ModalClose("%s", "%s", %d);', 
                $this->objCallerControl->ControlId, $objParentControl->ControlId, ($this->blnChangesMade ? 1 : 0)));
    }

    // getter y setter mágicos para los controles
    public function __get($strName) {
        if (is_array($this->objControlsArray) &&
                array_key_exists($strName, $this->objControlsArray)) {
            return $this->objControlsArray[$strName];
        }
        switch ($strName) {
            case 'Tabs': return $this->pnlTabs;
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
    
     public function GetEndScript() {
        return parent::GetEndScript() . sprintf('$("#%s").attr("onclick","%s");', $this->objParentControl->btnClose->ControlId, sprintf("$('#%s').click();", $this->btnCancel->ControlId));
    }

}
?>
