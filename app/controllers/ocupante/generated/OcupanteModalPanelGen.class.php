<?php
class OcupanteModalPanelGen extends EditPanelBase {

    public $mctOcupante;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
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
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objOcupante = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OcupanteModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objOcupante)
            $objOcupante = new Ocupante();
        
        $this->intId = $objOcupante->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Ocupante::Noun());
        $this->metaControl_Create($strControlsArray, $objOcupante);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objOcupante){

        $this->mctOcupante = new OcupanteMetaControl($this, $objOcupante);

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
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctOcupante->objOcupante->__Restored)
            $this->objParentControl->objParentControl->lstOcupanteAsId->objParent->AddOcupanteAsId($this->mctOcupante->objOcupante);
        $this->mctOcupante->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctOcupante->objOcupante);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctOcupante = null;
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
