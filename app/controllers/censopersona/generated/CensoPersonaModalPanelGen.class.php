<?php
class CensoPersonaModalPanelGen extends EditPanelBase {

    public $mctCensoPersona;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intCensoPersonaId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblCensoPersonaId' => false,
        'lstCensoGrupoFamiliar' => true,
        'txtApellido' => true,
        'txtNombres' => true,
        'calFechaNacimiento' => true,
        'txtEdad' => true,
        'txtEstadoCivil' => true,
        'txtDeOConQuien' => true,
        'txtOcupacion' => true,
        'txtIngreso' => true,
        'txtTipoDoc' => true,
        'txtDoc' => true,
        'txtNacionalidad' => true,
        'txtNyaMadre' => true,
        'txtNyaPadre' => true,
        'txtRelacionParentescoJefeHogar' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objCensoPersona = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CensoPersonaModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objCensoPersona)
            $objCensoPersona = new CensoPersona();
        
        $this->intCensoPersonaId = $objCensoPersona->CensoPersonaId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(CensoPersona::Noun());
        $this->metaControl_Create($strControlsArray, $objCensoPersona);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objCensoPersona){

        $this->mctCensoPersona = new CensoPersonaMetaControl($this, $objCensoPersona);

        // Call MetaControl's methods to create qcontrols based on CensoPersona's data fields
        if (in_array('lblCensoPersonaId',$strControlsArray)) 
            $this->objControlsArray['lblCensoPersonaId'] = $this->mctCensoPersona->lblCensoPersonaId_Create();
        if (in_array('lstCensoGrupoFamiliar',$strControlsArray)) 
            $this->objControlsArray['lstCensoGrupoFamiliar'] = $this->mctCensoPersona->lstCensoGrupoFamiliar_Create();
        if (in_array('txtApellido',$strControlsArray)) 
            $this->objControlsArray['txtApellido'] = $this->mctCensoPersona->txtApellido_Create();
        if (in_array('txtNombres',$strControlsArray)) 
            $this->objControlsArray['txtNombres'] = $this->mctCensoPersona->txtNombres_Create();
        if (in_array('calFechaNacimiento',$strControlsArray)) 
            $this->objControlsArray['calFechaNacimiento'] = $this->mctCensoPersona->calFechaNacimiento_Create();
        if (in_array('txtEdad',$strControlsArray)) 
            $this->objControlsArray['txtEdad'] = $this->mctCensoPersona->txtEdad_Create();
        if (in_array('txtEstadoCivil',$strControlsArray)) 
            $this->objControlsArray['txtEstadoCivil'] = $this->mctCensoPersona->txtEstadoCivil_Create();
        if (in_array('txtDeOConQuien',$strControlsArray)) 
            $this->objControlsArray['txtDeOConQuien'] = $this->mctCensoPersona->txtDeOConQuien_Create();
        if (in_array('txtOcupacion',$strControlsArray)) 
            $this->objControlsArray['txtOcupacion'] = $this->mctCensoPersona->txtOcupacion_Create();
        if (in_array('txtIngreso',$strControlsArray)) 
            $this->objControlsArray['txtIngreso'] = $this->mctCensoPersona->txtIngreso_Create();
        if (in_array('txtTipoDoc',$strControlsArray)) 
            $this->objControlsArray['txtTipoDoc'] = $this->mctCensoPersona->txtTipoDoc_Create();
        if (in_array('txtDoc',$strControlsArray)) 
            $this->objControlsArray['txtDoc'] = $this->mctCensoPersona->txtDoc_Create();
        if (in_array('txtNacionalidad',$strControlsArray)) 
            $this->objControlsArray['txtNacionalidad'] = $this->mctCensoPersona->txtNacionalidad_Create();
        if (in_array('txtNyaMadre',$strControlsArray)) 
            $this->objControlsArray['txtNyaMadre'] = $this->mctCensoPersona->txtNyaMadre_Create();
        if (in_array('txtNyaPadre',$strControlsArray)) 
            $this->objControlsArray['txtNyaPadre'] = $this->mctCensoPersona->txtNyaPadre_Create();
        if (in_array('txtRelacionParentescoJefeHogar',$strControlsArray)) 
            $this->objControlsArray['txtRelacionParentescoJefeHogar'] = $this->mctCensoPersona->txtRelacionParentescoJefeHogar_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctCensoPersona->objCensoPersona->__Restored)
            $this->objParentControl->objParentControl->lstCensoPersonaAsId->objParent->AddCensoPersonaAsId($this->mctCensoPersona->objCensoPersona);
        $this->mctCensoPersona->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctCensoPersona->objCensoPersona);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctCensoPersona = null;
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
