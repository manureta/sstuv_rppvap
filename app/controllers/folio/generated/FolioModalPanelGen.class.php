<?php
class FolioModalPanelGen extends EditPanelBase {

    public $mctFolio;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtCodFolio' => true,
        'lstIdPartidoObject' => true,
        'lstIdLocalidadObject' => true,
        'txtMatricula' => true,
        'calFecha' => true,
        'txtEncargado' => true,
        'txtNombreBarrioOficial' => true,
        'txtNombreBarrioAlternativo1' => true,
        'txtNombreBarrioAlternativo2' => true,
        'txtAnioOrigen' => true,
        'txtSuperficie' => true,
        'txtCantidadFamilias' => true,
        'lstTipoBarrioObject' => true,
        'txtObservacionCasoDudoso' => true,
        'txtJudicializado' => true,
        'txtDireccion' => true,
        'txtNumExpedientes' => true,
        'txtGeom' => true,
        'lstCondicionesSocioUrbanisticasAsId' => true,
        'lstRegularizacionAsId' => true,
        'lstUsoInterno' => true,
        'lstNomenclaturaAsId' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objFolio = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(FolioModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objFolio)
            $objFolio = new Folio();
        
        $this->intId = $objFolio->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Folio::Noun());
        $this->metaControl_Create($strControlsArray, $objFolio);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objFolio){

        $this->mctFolio = new FolioMetaControl($this, $objFolio);

        // Call MetaControl's methods to create qcontrols based on Folio's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctFolio->lblId_Create();
        if (in_array('txtCodFolio',$strControlsArray)) 
            $this->objControlsArray['txtCodFolio'] = $this->mctFolio->txtCodFolio_Create();
        if (in_array('lstIdPartidoObject',$strControlsArray)) 
            $this->objControlsArray['lstIdPartidoObject'] = $this->mctFolio->lstIdPartidoObject_Create();
        if (in_array('lstIdLocalidadObject',$strControlsArray)) 
            $this->objControlsArray['lstIdLocalidadObject'] = $this->mctFolio->lstIdLocalidadObject_Create();
        if (in_array('txtMatricula',$strControlsArray)) 
            $this->objControlsArray['txtMatricula'] = $this->mctFolio->txtMatricula_Create();
        if (in_array('calFecha',$strControlsArray)) 
            $this->objControlsArray['calFecha'] = $this->mctFolio->calFecha_Create();
        if (in_array('txtEncargado',$strControlsArray)) 
            $this->objControlsArray['txtEncargado'] = $this->mctFolio->txtEncargado_Create();
        if (in_array('txtNombreBarrioOficial',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioOficial'] = $this->mctFolio->txtNombreBarrioOficial_Create();
        if (in_array('txtNombreBarrioAlternativo1',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioAlternativo1'] = $this->mctFolio->txtNombreBarrioAlternativo1_Create();
        if (in_array('txtNombreBarrioAlternativo2',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioAlternativo2'] = $this->mctFolio->txtNombreBarrioAlternativo2_Create();
        if (in_array('txtAnioOrigen',$strControlsArray)) 
            $this->objControlsArray['txtAnioOrigen'] = $this->mctFolio->txtAnioOrigen_Create();
        if (in_array('txtSuperficie',$strControlsArray)) 
            $this->objControlsArray['txtSuperficie'] = $this->mctFolio->txtSuperficie_Create();
        if (in_array('txtCantidadFamilias',$strControlsArray)) 
            $this->objControlsArray['txtCantidadFamilias'] = $this->mctFolio->txtCantidadFamilias_Create();
        if (in_array('lstTipoBarrioObject',$strControlsArray)) 
            $this->objControlsArray['lstTipoBarrioObject'] = $this->mctFolio->lstTipoBarrioObject_Create();
        if (in_array('txtObservacionCasoDudoso',$strControlsArray)) 
            $this->objControlsArray['txtObservacionCasoDudoso'] = $this->mctFolio->txtObservacionCasoDudoso_Create();
        if (in_array('txtJudicializado',$strControlsArray)) 
            $this->objControlsArray['txtJudicializado'] = $this->mctFolio->txtJudicializado_Create();
        if (in_array('txtDireccion',$strControlsArray)) 
            $this->objControlsArray['txtDireccion'] = $this->mctFolio->txtDireccion_Create();
        if (in_array('txtNumExpedientes',$strControlsArray)) 
            $this->objControlsArray['txtNumExpedientes'] = $this->mctFolio->txtNumExpedientes_Create();
        if (in_array('txtGeom',$strControlsArray)) 
            $this->objControlsArray['txtGeom'] = $this->mctFolio->txtGeom_Create();
        if (in_array('lstCondicionesSocioUrbanisticasAsId',$strControlsArray)) 
            $this->objControlsArray['lstCondicionesSocioUrbanisticasAsId'] = $this->mctFolio->lstCondicionesSocioUrbanisticasAsId_Create();
        if (in_array('lstRegularizacionAsId',$strControlsArray)) 
            $this->objControlsArray['lstRegularizacionAsId'] = $this->mctFolio->lstRegularizacionAsId_Create();
        if (in_array('lstUsoInterno',$strControlsArray)) 
            $this->objControlsArray['lstUsoInterno'] = $this->mctFolio->lstUsoInterno_Create();
        if (in_array('lstNomenclaturaAsId',$strControlsArray))
            $this->objControlsArray['lstNomenclaturaAsId'] = $this->mctFolio->lstNomenclaturaAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctFolio->objFolio->__Restored)
            $this->objParentControl->objParentControl->lstFolioAsId->objParent->AddFolioAsId($this->mctFolio->objFolio);
        $this->mctFolio->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctFolio->objFolio);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctFolio = null;
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
