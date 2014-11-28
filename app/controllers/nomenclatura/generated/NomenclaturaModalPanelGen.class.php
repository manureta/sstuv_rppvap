<?php
class NomenclaturaModalPanelGen extends EditPanelBase {

    public $mctNomenclatura;
    public $objCallerControl;
    protected $blnChangesMade = false;
    
    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'txtPartidaInmobiliaria' => true,
        'txtTitularDominio' => true,
        'txtCirc' => true,
        'txtSecc' => true,
        'txtChacQuinta' => true,
        'txtFrac' => true,
        'txtMza' => true,
        'txtParc' => true,
        'txtInscripcionDominio' => true,
        'txtTitularRegPropiedad' => true,
        'txtDatoVerificadoRegPropiedad' => true,
    );
    
    public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objNomenclatura = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(NomenclaturaModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        if (!$objNomenclatura)
            $objNomenclatura = new Nomenclatura();
        
        $this->intId = $objNomenclatura->Id;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Nomenclatura::Noun());
        $this->metaControl_Create($strControlsArray, $objNomenclatura);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
    }

    protected function metaControl_Create($strControlsArray, $objNomenclatura){

        $this->mctNomenclatura = new NomenclaturaMetaControl($this, $objNomenclatura);

        // Call MetaControl's methods to create qcontrols based on Nomenclatura's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctNomenclatura->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctNomenclatura->lstIdFolioObject_Create();
        if (in_array('txtPartidaInmobiliaria',$strControlsArray)) 
            $this->objControlsArray['txtPartidaInmobiliaria'] = $this->mctNomenclatura->txtPartidaInmobiliaria_Create();
        if (in_array('txtTitularDominio',$strControlsArray)) 
            $this->objControlsArray['txtTitularDominio'] = $this->mctNomenclatura->txtTitularDominio_Create();
        if (in_array('txtCirc',$strControlsArray)) 
            $this->objControlsArray['txtCirc'] = $this->mctNomenclatura->txtCirc_Create();
        if (in_array('txtSecc',$strControlsArray)) 
            $this->objControlsArray['txtSecc'] = $this->mctNomenclatura->txtSecc_Create();
        if (in_array('txtChacQuinta',$strControlsArray)) 
            $this->objControlsArray['txtChacQuinta'] = $this->mctNomenclatura->txtChacQuinta_Create();
        if (in_array('txtFrac',$strControlsArray)) 
            $this->objControlsArray['txtFrac'] = $this->mctNomenclatura->txtFrac_Create();
        if (in_array('txtMza',$strControlsArray)) 
            $this->objControlsArray['txtMza'] = $this->mctNomenclatura->txtMza_Create();
        if (in_array('txtParc',$strControlsArray)) 
            $this->objControlsArray['txtParc'] = $this->mctNomenclatura->txtParc_Create();
        if (in_array('txtInscripcionDominio',$strControlsArray)) 
            $this->objControlsArray['txtInscripcionDominio'] = $this->mctNomenclatura->txtInscripcionDominio_Create();
        if (in_array('txtTitularRegPropiedad',$strControlsArray)) 
            $this->objControlsArray['txtTitularRegPropiedad'] = $this->mctNomenclatura->txtTitularRegPropiedad_Create();
        if (in_array('txtDatoVerificadoRegPropiedad',$strControlsArray)) 
            $this->objControlsArray['txtDatoVerificadoRegPropiedad'] = $this->mctNomenclatura->txtDatoVerificadoRegPropiedad_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        $this->btnSave->Text = "Aceptar";
        $this->btnSave->Icon = "ok";
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if (!$this->mctNomenclatura->objNomenclatura->__Restored)
            $this->objParentControl->objParentControl->lstNomenclaturaAsId->objParent->AddNomenclaturaAsId($this->mctNomenclatura->objNomenclatura);
        $this->mctNomenclatura->Bind();
        $this->objCallerControl->MarkAsModified();
        //Busco el EditPanel Padre
        $objParentControl = $this->objCallerControl;
        while (!$objParentControl instanceof EditPanelBase) {
            if ($objParentControl instanceof QForm) return; // Si no soy hijo de un EditPanel (que no debiera) salgo
            $objParentControl = $objParentControl->objParentControl;
        }

        $objParentControl->AddModifiedChild($this->mctNomenclatura->objNomenclatura);
        $this->blnChangesMade = true;
        $this->objParentControl->HideDialogBox();
    }

    public function btnCancel_Click() {
        $this->mctNomenclatura = null;
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
