<?php
class RegularizacionModalPanelGen extends EditPanelBase {

    public $mctRegularizacion;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkProcesoIniciado' => true,
        'calFechaInicio' => true,
        'chkTienePlano' => true,
        'chkCircular10Catastro' => true,
        'lstAprobacionGeodesiaObject' => true,
        'txtRegistracion' => true,
        'lstEstadoProcesoObject' => true,
        'lstAntecedentesAsIdFolio' => true,
        'lstEncuadreLegalAsIdFolio' => false,
        'lstRegistracionAsIdFolio' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objRegularizacion = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(RegularizacionModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objRegularizacion)
            $objRegularizacion = new Regularizacion();
        
        $this->intId = $objRegularizacion->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Regularizacion::Noun());
        $this->metaControl_Create($strControlsArray, $objRegularizacion);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objRegularizacion){

        $this->mctRegularizacion = new RegularizacionMetaControl($this, $objRegularizacion);

        // Call MetaControl's methods to create qcontrols based on Regularizacion's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctRegularizacion->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctRegularizacion->lstIdFolioObject_Create();
        if (in_array('chkProcesoIniciado',$strControlsArray)) 
            $this->objControlsArray['chkProcesoIniciado'] = $this->mctRegularizacion->chkProcesoIniciado_Create();
        if (in_array('calFechaInicio',$strControlsArray)) 
            $this->objControlsArray['calFechaInicio'] = $this->mctRegularizacion->calFechaInicio_Create();
        if (in_array('chkTienePlano',$strControlsArray)) 
            $this->objControlsArray['chkTienePlano'] = $this->mctRegularizacion->chkTienePlano_Create();
        if (in_array('chkCircular10Catastro',$strControlsArray)) 
            $this->objControlsArray['chkCircular10Catastro'] = $this->mctRegularizacion->chkCircular10Catastro_Create();
        if (in_array('lstAprobacionGeodesiaObject',$strControlsArray)) 
            $this->objControlsArray['lstAprobacionGeodesiaObject'] = $this->mctRegularizacion->lstAprobacionGeodesiaObject_Create();
        if (in_array('txtRegistracion',$strControlsArray)) 
            $this->objControlsArray['txtRegistracion'] = $this->mctRegularizacion->txtRegistracion_Create();
        if (in_array('lstEstadoProcesoObject',$strControlsArray)) 
            $this->objControlsArray['lstEstadoProcesoObject'] = $this->mctRegularizacion->lstEstadoProcesoObject_Create();
        if (in_array('lstAntecedentesAsIdFolio',$strControlsArray)) 
            $this->objControlsArray['lstAntecedentesAsIdFolio'] = $this->mctRegularizacion->lstAntecedentesAsIdFolio_Create();
        if (in_array('lstEncuadreLegalAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstEncuadreLegalAsIdFolio'] = $this->mctRegularizacion->lstEncuadreLegalAsIdFolio_Create();
        if (in_array('lstRegistracionAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstRegistracionAsIdFolio'] = $this->mctRegularizacion->lstRegistracionAsIdFolio_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctRegularizacion->objRegularizacion->__Restored)
            $this->objParentControl->objParentControl->lstRegularizacionAsId->objParent->AddRegularizacionAsId($this->mctRegularizacion->objRegularizacion);
        $this->mctRegularizacion->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctRegularizacion->objRegularizacion);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctRegularizacion = null;
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
