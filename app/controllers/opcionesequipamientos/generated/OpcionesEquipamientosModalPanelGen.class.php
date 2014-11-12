<?php
class OpcionesEquipamientosModalPanelGen extends EditPanelBase {

    public $mctOpcionesEquipamientos;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtOpcion' => true,
        'lstEquipamientoAsCentroIntegracionComunitaria' => false,
        'lstEquipamientoAsComedor' => false,
        'lstEquipamientoAsEscuelaPrimaria' => false,
        'lstEquipamientoAsEscuelaSecundaria' => false,
        'lstEquipamientoAsJardinInfantes' => false,
        'lstEquipamientoAsSalonUsosMultiples' => false,
        'lstEquipamientoAsUnidadSanitaria' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objOpcionesEquipamientos = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OpcionesEquipamientosModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objOpcionesEquipamientos)
            $objOpcionesEquipamientos = new OpcionesEquipamientos();
        
        $this->intId = $objOpcionesEquipamientos->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(OpcionesEquipamientos::Noun());
        $this->metaControl_Create($strControlsArray, $objOpcionesEquipamientos);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objOpcionesEquipamientos){

        $this->mctOpcionesEquipamientos = new OpcionesEquipamientosMetaControl($this, $objOpcionesEquipamientos);

        // Call MetaControl's methods to create qcontrols based on OpcionesEquipamientos's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctOpcionesEquipamientos->lblId_Create();
        if (in_array('txtOpcion',$strControlsArray)) 
            $this->objControlsArray['txtOpcion'] = $this->mctOpcionesEquipamientos->txtOpcion_Create();
        if (in_array('lstEquipamientoAsCentroIntegracionComunitaria',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsCentroIntegracionComunitaria'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsCentroIntegracionComunitaria_Create();
        if (in_array('lstEquipamientoAsComedor',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsComedor'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsComedor_Create();
        if (in_array('lstEquipamientoAsEscuelaPrimaria',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsEscuelaPrimaria'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsEscuelaPrimaria_Create();
        if (in_array('lstEquipamientoAsEscuelaSecundaria',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsEscuelaSecundaria'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsEscuelaSecundaria_Create();
        if (in_array('lstEquipamientoAsJardinInfantes',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsJardinInfantes'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsJardinInfantes_Create();
        if (in_array('lstEquipamientoAsSalonUsosMultiples',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsSalonUsosMultiples'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsSalonUsosMultiples_Create();
        if (in_array('lstEquipamientoAsUnidadSanitaria',$strControlsArray))
            $this->objControlsArray['lstEquipamientoAsUnidadSanitaria'] = $this->mctOpcionesEquipamientos->lstEquipamientoAsUnidadSanitaria_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctOpcionesEquipamientos->objOpcionesEquipamientos->__Restored)
            $this->objParentControl->objParentControl->lstOpcionesEquipamientosAsId->objParent->AddOpcionesEquipamientosAsId($this->mctOpcionesEquipamientos->objOpcionesEquipamientos);
        $this->mctOpcionesEquipamientos->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctOpcionesEquipamientos->objOpcionesEquipamientos);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctOpcionesEquipamientos = null;
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
