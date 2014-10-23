<?php
class DatosCapituloModalPanelGen extends EditPanelBase {

    public $mctDatosCapitulo;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intIdDatosCapitulo;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdDatosCapitulo' => false,
        'lstIdDefinicionCapituloObject' => true,
        'txtCEstado' => true,
        'lstIdDatosCuadernilloObject' => true,
        'lstDatosCuadroAsId' => false,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objDatosCapitulo = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(DatosCapituloModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objDatosCapitulo)
            $objDatosCapitulo = new DatosCapitulo();
        
        $this->intIdDatosCapitulo = $objDatosCapitulo->IdDatosCapitulo;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(DatosCapitulo::Noun());
        $this->metaControl_Create($strControlsArray, $objDatosCapitulo);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objDatosCapitulo){

        $this->mctDatosCapitulo = new DatosCapituloMetaControl($this, $objDatosCapitulo);

        // Call MetaControl's methods to create qcontrols based on DatosCapitulo's data fields
        if (in_array('lblIdDatosCapitulo',$strControlsArray)) 
            $this->objControlsArray['lblIdDatosCapitulo'] = $this->mctDatosCapitulo->lblIdDatosCapitulo_Create();
        if (in_array('lstIdDefinicionCapituloObject',$strControlsArray)) 
            $this->objControlsArray['lstIdDefinicionCapituloObject'] = $this->mctDatosCapitulo->lstIdDefinicionCapituloObject_Create();
        if (in_array('txtCEstado',$strControlsArray)) 
            $this->objControlsArray['txtCEstado'] = $this->mctDatosCapitulo->txtCEstado_Create();
        if (in_array('lstIdDatosCuadernilloObject',$strControlsArray)) 
            $this->objControlsArray['lstIdDatosCuadernilloObject'] = $this->mctDatosCapitulo->lstIdDatosCuadernilloObject_Create();
        if (in_array('lstDatosCuadroAsId',$strControlsArray))
            $this->objControlsArray['lstDatosCuadroAsId'] = $this->mctDatosCapitulo->lstDatosCuadroAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctDatosCapitulo->objDatosCapitulo->__Restored)
            $this->objParentControl->objParentControl->lstDatosCapituloAsId->objParent->AddDatosCapituloAsId($this->mctDatosCapitulo->objDatosCapitulo);
        $this->mctDatosCapitulo->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctDatosCapitulo->objDatosCapitulo);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctDatosCapitulo = null;
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
