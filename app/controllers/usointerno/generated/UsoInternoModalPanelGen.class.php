<?php
class UsoInternoModalPanelGen extends EditPanelBase {

    public $mctUsoInterno;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intIdFolio;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lstIdFolioObject' => true,
        'txtInformeUrbanistico' => true,
        'chkMapeoPreliminar' => true,
        'chkNoCorrespondeInscripcion' => true,
        'txtResolucionInscripcionProvisoria' => true,
        'txtResolucionInscripcionDefinitiva' => true,
        'chkRegularizacionCircular10Catastro' => true,
        'lstRegularizacionEstadoProcesoObject' => true,
        'txtNumExpediente' => true,
        'txtRegistracionLegajo' => true,
        'txtRegistracionFecha' => true,
        'txtRegistracionFolio' => true,
        'txtGeodesiaNum' => true,
        'txtGeodesiaAnio' => true,
        'txtFechaCenso' => true,
        'txtGeodesiaPartido' => true,
        'lstEstadoFolioObject' => true,
        'txtRegularizacionTienePlano' => true,
        'txtTieneCenso' => true,
        'txtLey14449' => true,
        'chkObjetado' => true,
        'txtComentarioObjetacion' => true,
        'txtRegularizacionFechaInicio' => true,
        'txtFechaInformeUrbanistico' => true,
        'txtComentarios' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objUsoInterno = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(UsoInternoModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objUsoInterno)
            $objUsoInterno = new UsoInterno();
        
        $this->intIdFolio = $objUsoInterno->IdFolio;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(UsoInterno::Noun());
        $this->metaControl_Create($strControlsArray, $objUsoInterno);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objUsoInterno){

        $this->mctUsoInterno = new UsoInternoMetaControl($this, $objUsoInterno);

        // Call MetaControl's methods to create qcontrols based on UsoInterno's data fields
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctUsoInterno->lstIdFolioObject_Create();
        if (in_array('txtInformeUrbanistico',$strControlsArray)) 
            $this->objControlsArray['txtInformeUrbanistico'] = $this->mctUsoInterno->txtInformeUrbanistico_Create();
        if (in_array('chkMapeoPreliminar',$strControlsArray)) 
            $this->objControlsArray['chkMapeoPreliminar'] = $this->mctUsoInterno->chkMapeoPreliminar_Create();
        if (in_array('chkNoCorrespondeInscripcion',$strControlsArray)) 
            $this->objControlsArray['chkNoCorrespondeInscripcion'] = $this->mctUsoInterno->chkNoCorrespondeInscripcion_Create();
        if (in_array('txtResolucionInscripcionProvisoria',$strControlsArray)) 
            $this->objControlsArray['txtResolucionInscripcionProvisoria'] = $this->mctUsoInterno->txtResolucionInscripcionProvisoria_Create();
        if (in_array('txtResolucionInscripcionDefinitiva',$strControlsArray)) 
            $this->objControlsArray['txtResolucionInscripcionDefinitiva'] = $this->mctUsoInterno->txtResolucionInscripcionDefinitiva_Create();
        if (in_array('chkRegularizacionCircular10Catastro',$strControlsArray)) 
            $this->objControlsArray['chkRegularizacionCircular10Catastro'] = $this->mctUsoInterno->chkRegularizacionCircular10Catastro_Create();
        if (in_array('lstRegularizacionEstadoProcesoObject',$strControlsArray)) 
            $this->objControlsArray['lstRegularizacionEstadoProcesoObject'] = $this->mctUsoInterno->lstRegularizacionEstadoProcesoObject_Create();
        if (in_array('txtNumExpediente',$strControlsArray)) 
            $this->objControlsArray['txtNumExpediente'] = $this->mctUsoInterno->txtNumExpediente_Create();
        if (in_array('txtRegistracionLegajo',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionLegajo'] = $this->mctUsoInterno->txtRegistracionLegajo_Create();
        if (in_array('txtRegistracionFecha',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionFecha'] = $this->mctUsoInterno->txtRegistracionFecha_Create();
        if (in_array('txtRegistracionFolio',$strControlsArray)) 
            $this->objControlsArray['txtRegistracionFolio'] = $this->mctUsoInterno->txtRegistracionFolio_Create();
        if (in_array('txtGeodesiaNum',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaNum'] = $this->mctUsoInterno->txtGeodesiaNum_Create();
        if (in_array('txtGeodesiaAnio',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaAnio'] = $this->mctUsoInterno->txtGeodesiaAnio_Create();
        if (in_array('txtFechaCenso',$strControlsArray)) 
            $this->objControlsArray['txtFechaCenso'] = $this->mctUsoInterno->txtFechaCenso_Create();
        if (in_array('txtGeodesiaPartido',$strControlsArray)) 
            $this->objControlsArray['txtGeodesiaPartido'] = $this->mctUsoInterno->txtGeodesiaPartido_Create();
        if (in_array('lstEstadoFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstEstadoFolioObject'] = $this->mctUsoInterno->lstEstadoFolioObject_Create();
        if (in_array('txtRegularizacionTienePlano',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionTienePlano'] = $this->mctUsoInterno->txtRegularizacionTienePlano_Create();
        if (in_array('txtTieneCenso',$strControlsArray)) 
            $this->objControlsArray['txtTieneCenso'] = $this->mctUsoInterno->txtTieneCenso_Create();
        if (in_array('txtLey14449',$strControlsArray)) 
            $this->objControlsArray['txtLey14449'] = $this->mctUsoInterno->txtLey14449_Create();
        if (in_array('chkObjetado',$strControlsArray)) 
            $this->objControlsArray['chkObjetado'] = $this->mctUsoInterno->chkObjetado_Create();
        if (in_array('txtComentarioObjetacion',$strControlsArray)) 
            $this->objControlsArray['txtComentarioObjetacion'] = $this->mctUsoInterno->txtComentarioObjetacion_Create();
        if (in_array('txtRegularizacionFechaInicio',$strControlsArray)) 
            $this->objControlsArray['txtRegularizacionFechaInicio'] = $this->mctUsoInterno->txtRegularizacionFechaInicio_Create();
        if (in_array('txtFechaInformeUrbanistico',$strControlsArray)) 
            $this->objControlsArray['txtFechaInformeUrbanistico'] = $this->mctUsoInterno->txtFechaInformeUrbanistico_Create();
        if (in_array('txtComentarios',$strControlsArray)) 
            $this->objControlsArray['txtComentarios'] = $this->mctUsoInterno->txtComentarios_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctUsoInterno->objUsoInterno->__Restored)
            $this->objParentControl->objParentControl->lstUsoInternoAsId->objParent->AddUsoInternoAsId($this->mctUsoInterno->objUsoInterno);
        $this->mctUsoInterno->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctUsoInterno->objUsoInterno);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctUsoInterno = null;
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
