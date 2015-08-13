<?php
class EquipamientoEditPanelGen extends EditPanelBase {
    // Local instance of the EquipamientoMetaControl
    public $mctEquipamiento;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'lstUnidadSanitariaObject' => true,
        'lstJardinInfantesObject' => true,
        'lstEscuelaPrimariaObject' => true,
        'lstEscuelaSecundariaObject' => true,
        'lstComedorObject' => true,
        'lstCentroIntegracionComunitariaObject' => true,
        'txtOtro' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(EquipamientoEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Equipamiento::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the EquipamientoMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctEquipamiento = EquipamientoMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Equipamiento's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctEquipamiento->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEquipamiento->lstIdFolioObject_Create();
        if (in_array('lstUnidadSanitariaObject',$strControlsArray)) 
            $this->objControlsArray['lstUnidadSanitariaObject'] = $this->mctEquipamiento->lstUnidadSanitariaObject_Create();
        if (in_array('lstJardinInfantesObject',$strControlsArray)) 
            $this->objControlsArray['lstJardinInfantesObject'] = $this->mctEquipamiento->lstJardinInfantesObject_Create();
        if (in_array('lstEscuelaPrimariaObject',$strControlsArray)) 
            $this->objControlsArray['lstEscuelaPrimariaObject'] = $this->mctEquipamiento->lstEscuelaPrimariaObject_Create();
        if (in_array('lstEscuelaSecundariaObject',$strControlsArray)) 
            $this->objControlsArray['lstEscuelaSecundariaObject'] = $this->mctEquipamiento->lstEscuelaSecundariaObject_Create();
        if (in_array('lstComedorObject',$strControlsArray)) 
            $this->objControlsArray['lstComedorObject'] = $this->mctEquipamiento->lstComedorObject_Create();
        if (in_array('lstCentroIntegracionComunitariaObject',$strControlsArray)) 
            $this->objControlsArray['lstCentroIntegracionComunitariaObject'] = $this->mctEquipamiento->lstCentroIntegracionComunitariaObject_Create();
        if (in_array('txtOtro',$strControlsArray)) 
            $this->objControlsArray['txtOtro'] = $this->mctEquipamiento->txtOtro_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Equipamiento::GenderMale() ? 'e' : 'a'), Equipamiento::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctEquipamiento->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the EquipamientoMetaControl
        $this->mctEquipamiento->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the EquipamientoMetaControl
        $this->mctEquipamiento->DeleteEquipamiento();
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
