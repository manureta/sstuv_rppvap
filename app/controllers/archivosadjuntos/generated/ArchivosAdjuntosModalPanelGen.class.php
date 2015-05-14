<?php
class ArchivosAdjuntosModalPanelGen extends EditPanelBase {

    public $mctArchivosAdjuntos;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'txtTipo' => true,
        'txtPathFile' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objArchivosAdjuntos = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(ArchivosAdjuntosModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objArchivosAdjuntos)
            $objArchivosAdjuntos = new ArchivosAdjuntos();
        
        $this->intId = $objArchivosAdjuntos->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(ArchivosAdjuntos::Noun());
        $this->metaControl_Create($strControlsArray, $objArchivosAdjuntos);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objArchivosAdjuntos){

        $this->mctArchivosAdjuntos = new ArchivosAdjuntosMetaControl($this, $objArchivosAdjuntos);

        // Call MetaControl's methods to create qcontrols based on ArchivosAdjuntos's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctArchivosAdjuntos->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctArchivosAdjuntos->lstIdFolioObject_Create();
        if (in_array('txtTipo',$strControlsArray)) 
            $this->objControlsArray['txtTipo'] = $this->mctArchivosAdjuntos->txtTipo_Create();
        if (in_array('txtPathFile',$strControlsArray)) 
            $this->objControlsArray['txtPathFile'] = $this->mctArchivosAdjuntos->txtPathFile_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctArchivosAdjuntos->objArchivosAdjuntos->__Restored)
            $this->objParentControl->objParentControl->lstArchivosAdjuntosAsId->objParent->AddArchivosAdjuntosAsId($this->mctArchivosAdjuntos->objArchivosAdjuntos);
        $this->mctArchivosAdjuntos->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctArchivosAdjuntos->objArchivosAdjuntos);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctArchivosAdjuntos = null;
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
