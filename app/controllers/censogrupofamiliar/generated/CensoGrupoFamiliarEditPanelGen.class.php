<?php
class CensoGrupoFamiliarEditPanelGen extends EditPanelBase {
    // Local instance of the CensoGrupoFamiliarMetaControl
    public $mctCensoGrupoFamiliar;

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
        'lstCensoPersona' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intCensoGrupoFamiliarId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CensoGrupoFamiliarEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intCensoGrupoFamiliarId = $intCensoGrupoFamiliarId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(CensoGrupoFamiliar::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the CensoGrupoFamiliarMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctCensoGrupoFamiliar = CensoGrupoFamiliarMetaControl::Create($this, $this->intCensoGrupoFamiliarId);

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

    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (CensoGrupoFamiliar::GenderMale() ? 'e' : 'a'), CensoGrupoFamiliar::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctCensoGrupoFamiliar->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the CensoGrupoFamiliarMetaControl
        $this->mctCensoGrupoFamiliar->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the CensoGrupoFamiliarMetaControl
        $this->mctCensoGrupoFamiliar->DeleteCensoGrupoFamiliar();
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
