<?php
class InfraestructuraEditPanelGen extends EditPanelBase {
    // Local instance of the InfraestructuraMetaControl
    public $mctInfraestructura;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'lstEnergiaElectricaMedidorIndividualObject' => true,
        'lstEnergiaElectricaMedidorColectivoObject' => true,
        'lstAlumbradoPublicoObject' => true,
        'lstAguaCorrienteObject' => true,
        'lstAguaPotableObject' => true,
        'lstRedCloacalObject' => true,
        'lstSistAlternativoEliminacionExcretasObject' => true,
        'lstRedGasObject' => true,
        'lstPavimentoObject' => true,
        'lstCordonCunetaObject' => true,
        'lstDesaguesPluvialesObject' => true,
        'lstRecoleccionResiduosObject' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(InfraestructuraEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Infraestructura::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the InfraestructuraMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctInfraestructura = InfraestructuraMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Infraestructura's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctInfraestructura->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctInfraestructura->lstIdFolioObject_Create();
        if (in_array('lstEnergiaElectricaMedidorIndividualObject',$strControlsArray)) 
            $this->objControlsArray['lstEnergiaElectricaMedidorIndividualObject'] = $this->mctInfraestructura->lstEnergiaElectricaMedidorIndividualObject_Create();
        if (in_array('lstEnergiaElectricaMedidorColectivoObject',$strControlsArray)) 
            $this->objControlsArray['lstEnergiaElectricaMedidorColectivoObject'] = $this->mctInfraestructura->lstEnergiaElectricaMedidorColectivoObject_Create();
        if (in_array('lstAlumbradoPublicoObject',$strControlsArray)) 
            $this->objControlsArray['lstAlumbradoPublicoObject'] = $this->mctInfraestructura->lstAlumbradoPublicoObject_Create();
        if (in_array('lstAguaCorrienteObject',$strControlsArray)) 
            $this->objControlsArray['lstAguaCorrienteObject'] = $this->mctInfraestructura->lstAguaCorrienteObject_Create();
        if (in_array('lstAguaPotableObject',$strControlsArray)) 
            $this->objControlsArray['lstAguaPotableObject'] = $this->mctInfraestructura->lstAguaPotableObject_Create();
        if (in_array('lstRedCloacalObject',$strControlsArray)) 
            $this->objControlsArray['lstRedCloacalObject'] = $this->mctInfraestructura->lstRedCloacalObject_Create();
        if (in_array('lstSistAlternativoEliminacionExcretasObject',$strControlsArray)) 
            $this->objControlsArray['lstSistAlternativoEliminacionExcretasObject'] = $this->mctInfraestructura->lstSistAlternativoEliminacionExcretasObject_Create();
        if (in_array('lstRedGasObject',$strControlsArray)) 
            $this->objControlsArray['lstRedGasObject'] = $this->mctInfraestructura->lstRedGasObject_Create();
        if (in_array('lstPavimentoObject',$strControlsArray)) 
            $this->objControlsArray['lstPavimentoObject'] = $this->mctInfraestructura->lstPavimentoObject_Create();
        if (in_array('lstCordonCunetaObject',$strControlsArray)) 
            $this->objControlsArray['lstCordonCunetaObject'] = $this->mctInfraestructura->lstCordonCunetaObject_Create();
        if (in_array('lstDesaguesPluvialesObject',$strControlsArray)) 
            $this->objControlsArray['lstDesaguesPluvialesObject'] = $this->mctInfraestructura->lstDesaguesPluvialesObject_Create();
        if (in_array('lstRecoleccionResiduosObject',$strControlsArray)) 
            $this->objControlsArray['lstRecoleccionResiduosObject'] = $this->mctInfraestructura->lstRecoleccionResiduosObject_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Infraestructura::GenderMale() ? 'e' : 'a'), Infraestructura::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctInfraestructura->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the InfraestructuraMetaControl
        $this->mctInfraestructura->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the InfraestructuraMetaControl
        $this->mctInfraestructura->DeleteInfraestructura();
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
