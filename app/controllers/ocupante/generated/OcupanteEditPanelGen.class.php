<?php
class OcupanteEditPanelGen extends EditPanelBase {
    // Local instance of the OcupanteMetaControl
    public $mctOcupante;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdHogarObject' => true,
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
        'chkReferente' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OcupanteEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Ocupante::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the OcupanteMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctOcupante = OcupanteMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Ocupante's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctOcupante->lblId_Create();
        if (in_array('lstIdHogarObject',$strControlsArray)) 
            $this->objControlsArray['lstIdHogarObject'] = $this->mctOcupante->lstIdHogarObject_Create();
        if (in_array('txtApellido',$strControlsArray)) 
            $this->objControlsArray['txtApellido'] = $this->mctOcupante->txtApellido_Create();
        if (in_array('txtNombres',$strControlsArray)) 
            $this->objControlsArray['txtNombres'] = $this->mctOcupante->txtNombres_Create();
        if (in_array('calFechaNacimiento',$strControlsArray)) 
            $this->objControlsArray['calFechaNacimiento'] = $this->mctOcupante->calFechaNacimiento_Create();
        if (in_array('txtEdad',$strControlsArray)) 
            $this->objControlsArray['txtEdad'] = $this->mctOcupante->txtEdad_Create();
        if (in_array('txtEstadoCivil',$strControlsArray)) 
            $this->objControlsArray['txtEstadoCivil'] = $this->mctOcupante->txtEstadoCivil_Create();
        if (in_array('txtDeOConQuien',$strControlsArray)) 
            $this->objControlsArray['txtDeOConQuien'] = $this->mctOcupante->txtDeOConQuien_Create();
        if (in_array('txtOcupacion',$strControlsArray)) 
            $this->objControlsArray['txtOcupacion'] = $this->mctOcupante->txtOcupacion_Create();
        if (in_array('txtIngreso',$strControlsArray)) 
            $this->objControlsArray['txtIngreso'] = $this->mctOcupante->txtIngreso_Create();
        if (in_array('txtTipoDoc',$strControlsArray)) 
            $this->objControlsArray['txtTipoDoc'] = $this->mctOcupante->txtTipoDoc_Create();
        if (in_array('txtDoc',$strControlsArray)) 
            $this->objControlsArray['txtDoc'] = $this->mctOcupante->txtDoc_Create();
        if (in_array('txtNacionalidad',$strControlsArray)) 
            $this->objControlsArray['txtNacionalidad'] = $this->mctOcupante->txtNacionalidad_Create();
        if (in_array('txtNyaMadre',$strControlsArray)) 
            $this->objControlsArray['txtNyaMadre'] = $this->mctOcupante->txtNyaMadre_Create();
        if (in_array('txtNyaPadre',$strControlsArray)) 
            $this->objControlsArray['txtNyaPadre'] = $this->mctOcupante->txtNyaPadre_Create();
        if (in_array('txtRelacionParentescoJefeHogar',$strControlsArray)) 
            $this->objControlsArray['txtRelacionParentescoJefeHogar'] = $this->mctOcupante->txtRelacionParentescoJefeHogar_Create();
        if (in_array('chkReferente',$strControlsArray)) 
            $this->objControlsArray['chkReferente'] = $this->mctOcupante->chkReferente_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Ocupante::GenderMale() ? 'e' : 'a'), Ocupante::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctOcupante->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the OcupanteMetaControl
        $this->mctOcupante->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the OcupanteMetaControl
        $this->mctOcupante->DeleteOcupante();
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
