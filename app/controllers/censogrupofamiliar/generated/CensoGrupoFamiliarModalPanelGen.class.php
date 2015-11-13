<?php
class CensoGrupoFamiliarModalPanelGen extends EditPanelBase {

    public $mctCensoGrupoFamiliar;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intCensoGrupoFamiliarId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblCensoGrupoFamiliarId' => false,
        'lstIdFolioObject' => true,
        'calFechaAlta' => true,
        'txtCirc' => true,
        'txtSecc' => true,
        'txtMz' => true,
        'txtPc' => true,
        'txtTelefono' => true,
        'chkDeclaracionNoOcupacion' => true,
        'txtTipoDocAdj' => true,
        'txtTipoBeneficio' => true,
        'lstCensoPersona' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objCensoGrupoFamiliar = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CensoGrupoFamiliarModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objCensoGrupoFamiliar)
            $objCensoGrupoFamiliar = new CensoGrupoFamiliar();
        
        $this->intCensoGrupoFamiliarId = $objCensoGrupoFamiliar->CensoGrupoFamiliarId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(CensoGrupoFamiliar::Noun());
        $this->metaControl_Create($strControlsArray, $objCensoGrupoFamiliar);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objCensoGrupoFamiliar){

        $this->mctCensoGrupoFamiliar = new CensoGrupoFamiliarMetaControl($this, $objCensoGrupoFamiliar);

        // Call MetaControl's methods to create qcontrols based on CensoGrupoFamiliar's data fields
        if (in_array('lblCensoGrupoFamiliarId',$strControlsArray)) 
            $this->objControlsArray['lblCensoGrupoFamiliarId'] = $this->mctCensoGrupoFamiliar->lblCensoGrupoFamiliarId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctCensoGrupoFamiliar->lstIdFolioObject_Create();
        if (in_array('calFechaAlta',$strControlsArray)) 
            $this->objControlsArray['calFechaAlta'] = $this->mctCensoGrupoFamiliar->calFechaAlta_Create();
        if (in_array('txtCirc',$strControlsArray)) 
            $this->objControlsArray['txtCirc'] = $this->mctCensoGrupoFamiliar->txtCirc_Create();
        if (in_array('txtSecc',$strControlsArray)) 
            $this->objControlsArray['txtSecc'] = $this->mctCensoGrupoFamiliar->txtSecc_Create();
        if (in_array('txtMz',$strControlsArray)) 
            $this->objControlsArray['txtMz'] = $this->mctCensoGrupoFamiliar->txtMz_Create();
        if (in_array('txtPc',$strControlsArray)) 
            $this->objControlsArray['txtPc'] = $this->mctCensoGrupoFamiliar->txtPc_Create();
        if (in_array('txtTelefono',$strControlsArray)) 
            $this->objControlsArray['txtTelefono'] = $this->mctCensoGrupoFamiliar->txtTelefono_Create();
        if (in_array('chkDeclaracionNoOcupacion',$strControlsArray)) 
            $this->objControlsArray['chkDeclaracionNoOcupacion'] = $this->mctCensoGrupoFamiliar->chkDeclaracionNoOcupacion_Create();
        if (in_array('txtTipoDocAdj',$strControlsArray)) 
            $this->objControlsArray['txtTipoDocAdj'] = $this->mctCensoGrupoFamiliar->txtTipoDocAdj_Create();
        if (in_array('txtTipoBeneficio',$strControlsArray)) 
            $this->objControlsArray['txtTipoBeneficio'] = $this->mctCensoGrupoFamiliar->txtTipoBeneficio_Create();
        if (in_array('lstCensoPersona',$strControlsArray))
            $this->objControlsArray['lstCensoPersona'] = $this->mctCensoGrupoFamiliar->lstCensoPersona_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctCensoGrupoFamiliar->objCensoGrupoFamiliar->__Restored)
            $this->objParentControl->objParentControl->lstCensoGrupoFamiliarAsId->objParent->AddCensoGrupoFamiliarAsId($this->mctCensoGrupoFamiliar->objCensoGrupoFamiliar);
        $this->mctCensoGrupoFamiliar->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctCensoGrupoFamiliar->objCensoGrupoFamiliar);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctCensoGrupoFamiliar = null;
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
