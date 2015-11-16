<?php
class HogarModalPanelGen extends EditPanelBase {

    public $mctHogar;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'calFechaAlta' => true,
        'txtCirc' => true,
        'txtSecc' => true,
        'txtMz' => true,
        'txtPc' => true,
        'txtTelefono' => true,
        'chkDeclaracionNoOcupacion' => true,
        'txtTipoDocAdj' => true,
        'txtDocTerreno' => true,
        'txtTipoBeneficio' => true,
        'txtFormaOcupacion' => true,
        'txtFechaIngreso' => true,
        'lstOcupanteAsId' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objHogar = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(HogarModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objHogar)
            $objHogar = new Hogar();
        
        $this->intId = $objHogar->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Hogar::Noun());
        $this->metaControl_Create($strControlsArray, $objHogar);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objHogar){

        $this->mctHogar = new HogarMetaControl($this, $objHogar);

        // Call MetaControl's methods to create qcontrols based on Hogar's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctHogar->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctHogar->lstIdFolioObject_Create();
        if (in_array('calFechaAlta',$strControlsArray)) 
            $this->objControlsArray['calFechaAlta'] = $this->mctHogar->calFechaAlta_Create();
        if (in_array('txtCirc',$strControlsArray)) 
            $this->objControlsArray['txtCirc'] = $this->mctHogar->txtCirc_Create();
        if (in_array('txtSecc',$strControlsArray)) 
            $this->objControlsArray['txtSecc'] = $this->mctHogar->txtSecc_Create();
        if (in_array('txtMz',$strControlsArray)) 
            $this->objControlsArray['txtMz'] = $this->mctHogar->txtMz_Create();
        if (in_array('txtPc',$strControlsArray)) 
            $this->objControlsArray['txtPc'] = $this->mctHogar->txtPc_Create();
        if (in_array('txtTelefono',$strControlsArray)) 
            $this->objControlsArray['txtTelefono'] = $this->mctHogar->txtTelefono_Create();
        if (in_array('chkDeclaracionNoOcupacion',$strControlsArray)) 
            $this->objControlsArray['chkDeclaracionNoOcupacion'] = $this->mctHogar->chkDeclaracionNoOcupacion_Create();
        if (in_array('txtTipoDocAdj',$strControlsArray)) 
            $this->objControlsArray['txtTipoDocAdj'] = $this->mctHogar->txtTipoDocAdj_Create();
        if (in_array('txtDocTerreno',$strControlsArray)) 
            $this->objControlsArray['txtDocTerreno'] = $this->mctHogar->txtDocTerreno_Create();
        if (in_array('txtTipoBeneficio',$strControlsArray)) 
            $this->objControlsArray['txtTipoBeneficio'] = $this->mctHogar->txtTipoBeneficio_Create();
        if (in_array('txtFormaOcupacion',$strControlsArray)) 
            $this->objControlsArray['txtFormaOcupacion'] = $this->mctHogar->txtFormaOcupacion_Create();
        if (in_array('txtFechaIngreso',$strControlsArray)) 
            $this->objControlsArray['txtFechaIngreso'] = $this->mctHogar->txtFechaIngreso_Create();
        if (in_array('lstOcupanteAsId',$strControlsArray))
            $this->objControlsArray['lstOcupanteAsId'] = $this->mctHogar->lstOcupanteAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctHogar->objHogar->__Restored)
            $this->objParentControl->objParentControl->lstHogarAsId->objParent->AddHogarAsId($this->mctHogar->objHogar);
        $this->mctHogar->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctHogar->objHogar);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctHogar = null;
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
