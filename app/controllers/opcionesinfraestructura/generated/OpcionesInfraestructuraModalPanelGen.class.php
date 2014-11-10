<?php
class OpcionesInfraestructuraModalPanelGen extends EditPanelBase {

    public $mctOpcionesInfraestructura;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
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
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objOpcionesInfraestructura = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OpcionesInfraestructuraModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objOpcionesInfraestructura)
            $objOpcionesInfraestructura = new OpcionesInfraestructura();
        
        $this->intId = $objOpcionesInfraestructura->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(OpcionesInfraestructura::Noun());
        $this->metaControl_Create($strControlsArray, $objOpcionesInfraestructura);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objOpcionesInfraestructura){

        $this->mctOpcionesInfraestructura = new OpcionesInfraestructuraMetaControl($this, $objOpcionesInfraestructura);

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
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctOpcionesInfraestructura->objOpcionesInfraestructura->__Restored)
            $this->objParentControl->objParentControl->lstOpcionesInfraestructuraAsId->objParent->AddOpcionesInfraestructuraAsId($this->mctOpcionesInfraestructura->objOpcionesInfraestructura);
        $this->mctOpcionesInfraestructura->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctOpcionesInfraestructura->objOpcionesInfraestructura);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctOpcionesInfraestructura = null;
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
