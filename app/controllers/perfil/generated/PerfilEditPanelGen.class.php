<?php
class PerfilEditPanelGen extends EditPanelBase {
    // Local instance of the PerfilMetaControl
    public $mctPerfil;

    //id variables for meta_create
    protected $intIdPerfil;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdPerfil' => false,
        'txtNombre' => true,
        'txtDescripcion' => true,
        'lstUsuarioAsId' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intIdPerfil = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(PerfilEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intIdPerfil = $intIdPerfil;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Perfil::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the PerfilMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctPerfil = PerfilMetaControl::Create($this, $this->intIdPerfil);

        // Call MetaControl's methods to create qcontrols based on Perfil's data fields
        if (in_array('lblIdPerfil',$strControlsArray)) 
            $this->objControlsArray['lblIdPerfil'] = $this->mctPerfil->lblIdPerfil_Create();
        if (in_array('txtNombre',$strControlsArray)) 
            $this->objControlsArray['txtNombre'] = $this->mctPerfil->txtNombre_Create();
        if (in_array('txtDescripcion',$strControlsArray)) 
            $this->objControlsArray['txtDescripcion'] = $this->mctPerfil->txtDescripcion_Create();
        if (in_array('lstUsuarioAsId',$strControlsArray))
            $this->objControlsArray['lstUsuarioAsId'] = $this->mctPerfil->lstUsuarioAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Perfil::GenderMale() ? 'e' : 'a'), Perfil::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctPerfil->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the PerfilMetaControl
        $this->mctPerfil->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the PerfilMetaControl
        $this->mctPerfil->DeletePerfil();
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
