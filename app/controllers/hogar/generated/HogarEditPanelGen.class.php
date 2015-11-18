<?php
class HogarEditPanelGen extends EditPanelBase {
    // Local instance of the HogarMetaControl
    public $mctHogar;

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
        'txtDireccion' => true,
        'chkDeclaracionNoOcupacion' => true,
        'txtDocTerreno' => true,
        'txtTipoBeneficio' => true,
        'txtFormaOcupacion' => true,
        'txtFechaIngreso' => true,
        'lstOcupanteAsId' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(HogarEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Hogar::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the HogarMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctHogar = HogarMetaControl::Create($this, $this->intId);

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
        if (in_array('txtDireccion',$strControlsArray)) 
            $this->objControlsArray['txtDireccion'] = $this->mctHogar->txtDireccion_Create();
        if (in_array('chkDeclaracionNoOcupacion',$strControlsArray)) 
            $this->objControlsArray['chkDeclaracionNoOcupacion'] = $this->mctHogar->chkDeclaracionNoOcupacion_Create();
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
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Hogar::GenderMale() ? 'e' : 'a'), Hogar::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctHogar->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the HogarMetaControl
        $this->mctHogar->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the HogarMetaControl
        $this->mctHogar->DeleteHogar();
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
