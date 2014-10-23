<?php
class InfraestructuraModalPanelGen extends EditPanelBase {

    public $mctInfraestructura;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
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
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objInfraestructura = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(InfraestructuraModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objInfraestructura)
            $objInfraestructura = new Infraestructura();
        
        $this->intId = $objInfraestructura->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Infraestructura::Noun());
        $this->metaControl_Create($strControlsArray, $objInfraestructura);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objInfraestructura){

        $this->mctInfraestructura = new InfraestructuraMetaControl($this, $objInfraestructura);

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
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctInfraestructura->objInfraestructura->__Restored)
            $this->objParentControl->objParentControl->lstInfraestructuraAsId->objParent->AddInfraestructuraAsId($this->mctInfraestructura->objInfraestructura);
        $this->mctInfraestructura->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctInfraestructura->objInfraestructura);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctInfraestructura = null;
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
