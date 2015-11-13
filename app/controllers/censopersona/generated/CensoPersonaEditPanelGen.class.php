<?php
class CensoPersonaEditPanelGen extends EditPanelBase {
    // Local instance of the CensoPersonaMetaControl
    public $mctCensoPersona;

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

    public function __construct($objParentObject, $strControlsArray = array(), $intCensoPersonaId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CensoPersonaEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intCensoPersonaId = $intCensoPersonaId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(CensoPersona::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the CensoPersonaMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctCensoPersona = CensoPersonaMetaControl::Create($this, $this->intCensoPersonaId);

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
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (CensoPersona::GenderMale() ? 'e' : 'a'), CensoPersona::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctCensoPersona->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the CensoPersonaMetaControl
        $this->mctCensoPersona->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the CensoPersonaMetaControl
        $this->mctCensoPersona->DeleteCensoPersona();
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
