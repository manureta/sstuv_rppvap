<?php
class AntecedentesEditPanelGen extends EditPanelBase {
    // Local instance of the AntecedentesMetaControl
    public $mctAntecedentes;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkSinIntervencion' => true,
        'chkObrasInfraestructura' => true,
        'chkEquipamientos' => true,
        'chkIntervencionesEnViviendas' => true,
        'txtOtros' => true,
        'lstOrganismosDeIntervencionAsIdFolio' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(AntecedentesEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Antecedentes::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the AntecedentesMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctAntecedentes = AntecedentesMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Antecedentes's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctAntecedentes->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctAntecedentes->lstIdFolioObject_Create();
        if (in_array('chkSinIntervencion',$strControlsArray)) 
            $this->objControlsArray['chkSinIntervencion'] = $this->mctAntecedentes->chkSinIntervencion_Create();
        if (in_array('chkObrasInfraestructura',$strControlsArray)) 
            $this->objControlsArray['chkObrasInfraestructura'] = $this->mctAntecedentes->chkObrasInfraestructura_Create();
        if (in_array('chkEquipamientos',$strControlsArray)) 
            $this->objControlsArray['chkEquipamientos'] = $this->mctAntecedentes->chkEquipamientos_Create();
        if (in_array('chkIntervencionesEnViviendas',$strControlsArray)) 
            $this->objControlsArray['chkIntervencionesEnViviendas'] = $this->mctAntecedentes->chkIntervencionesEnViviendas_Create();
        if (in_array('txtOtros',$strControlsArray)) 
            $this->objControlsArray['txtOtros'] = $this->mctAntecedentes->txtOtros_Create();
        if (in_array('lstOrganismosDeIntervencionAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstOrganismosDeIntervencionAsIdFolio'] = $this->mctAntecedentes->lstOrganismosDeIntervencionAsIdFolio_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Antecedentes::GenderMale() ? 'e' : 'a'), Antecedentes::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctAntecedentes->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the AntecedentesMetaControl
        $this->mctAntecedentes->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the AntecedentesMetaControl
        $this->mctAntecedentes->DeleteAntecedentes();
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
