<?php
class OpcionesInfraestructuraEditPanelGen extends EditPanelBase {
    // Local instance of the OpcionesInfraestructuraMetaControl
    public $mctOpcionesInfraestructura;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtOpcion' => true,
        'lstInfraestructuraAsAguaCorriente' => false,
        'lstInfraestructuraAsAguaPotable' => false,
        'lstInfraestructuraAsAlumbradoPublico' => false,
        'lstInfraestructuraAsCordonCuneta' => false,
        'lstInfraestructuraAsDesaguesPluviales' => false,
        'lstInfraestructuraAsEnergiaElectricaMedidorColectivo' => false,
        'lstInfraestructuraAsEnergiaElectricaMedidorIndividual' => false,
        'lstInfraestructuraAsPavimento' => false,
        'lstInfraestructuraAsRecoleccionResiduos' => false,
        'lstInfraestructuraAsRedCloacal' => false,
        'lstInfraestructuraAsRedGas' => false,
        'lstInfraestructuraAsSistAlternativoEliminacionExcretas' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OpcionesInfraestructuraEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(OpcionesInfraestructura::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the OpcionesInfraestructuraMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctOpcionesInfraestructura = OpcionesInfraestructuraMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on OpcionesInfraestructura's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctOpcionesInfraestructura->lblId_Create();
        if (in_array('txtOpcion',$strControlsArray)) 
            $this->objControlsArray['txtOpcion'] = $this->mctOpcionesInfraestructura->txtOpcion_Create();
        if (in_array('lstInfraestructuraAsAguaCorriente',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsAguaCorriente'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsAguaCorriente_Create();
        if (in_array('lstInfraestructuraAsAguaPotable',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsAguaPotable'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsAguaPotable_Create();
        if (in_array('lstInfraestructuraAsAlumbradoPublico',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsAlumbradoPublico'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsAlumbradoPublico_Create();
        if (in_array('lstInfraestructuraAsCordonCuneta',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsCordonCuneta'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsCordonCuneta_Create();
        if (in_array('lstInfraestructuraAsDesaguesPluviales',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsDesaguesPluviales'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsDesaguesPluviales_Create();
        if (in_array('lstInfraestructuraAsEnergiaElectricaMedidorColectivo',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsEnergiaElectricaMedidorColectivo'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsEnergiaElectricaMedidorColectivo_Create();
        if (in_array('lstInfraestructuraAsEnergiaElectricaMedidorIndividual',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsEnergiaElectricaMedidorIndividual'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsEnergiaElectricaMedidorIndividual_Create();
        if (in_array('lstInfraestructuraAsPavimento',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsPavimento'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsPavimento_Create();
        if (in_array('lstInfraestructuraAsRecoleccionResiduos',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsRecoleccionResiduos'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsRecoleccionResiduos_Create();
        if (in_array('lstInfraestructuraAsRedCloacal',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsRedCloacal'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsRedCloacal_Create();
        if (in_array('lstInfraestructuraAsRedGas',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsRedGas'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsRedGas_Create();
        if (in_array('lstInfraestructuraAsSistAlternativoEliminacionExcretas',$strControlsArray))
            $this->objControlsArray['lstInfraestructuraAsSistAlternativoEliminacionExcretas'] = $this->mctOpcionesInfraestructura->lstInfraestructuraAsSistAlternativoEliminacionExcretas_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (OpcionesInfraestructura::GenderMale() ? 'e' : 'a'), OpcionesInfraestructura::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctOpcionesInfraestructura->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the OpcionesInfraestructuraMetaControl
        $this->mctOpcionesInfraestructura->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the OpcionesInfraestructuraMetaControl
        $this->mctOpcionesInfraestructura->DeleteOpcionesInfraestructura();
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
