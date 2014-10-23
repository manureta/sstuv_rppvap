<?php
class TipoDatoValorEditPanelGen extends EditPanelBase {
    // Local instance of the TipoDatoValorMetaControl
    public $mctTipoDatoValor;

    //id variables for meta_create
    protected $intIdTipoDatoValor;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdTipoDatoValor' => false,
        'txtDescripcion' => true,
        'txtCodigo' => true,
        'txtCTipoDato' => true,
        'txtOrden' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intIdTipoDatoValor = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(TipoDatoValorEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intIdTipoDatoValor = $intIdTipoDatoValor;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(TipoDatoValor::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the TipoDatoValorMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctTipoDatoValor = TipoDatoValorMetaControl::Create($this, $this->intIdTipoDatoValor);

        // Call MetaControl's methods to create qcontrols based on TipoDatoValor's data fields
        if (in_array('lblIdTipoDatoValor',$strControlsArray)) 
            $this->objControlsArray['lblIdTipoDatoValor'] = $this->mctTipoDatoValor->lblIdTipoDatoValor_Create();
        if (in_array('txtDescripcion',$strControlsArray)) 
            $this->objControlsArray['txtDescripcion'] = $this->mctTipoDatoValor->txtDescripcion_Create();
        if (in_array('txtCodigo',$strControlsArray)) 
            $this->objControlsArray['txtCodigo'] = $this->mctTipoDatoValor->txtCodigo_Create();
        if (in_array('txtCTipoDato',$strControlsArray)) 
            $this->objControlsArray['txtCTipoDato'] = $this->mctTipoDatoValor->txtCTipoDato_Create();
        if (in_array('txtOrden',$strControlsArray)) 
            $this->objControlsArray['txtOrden'] = $this->mctTipoDatoValor->txtOrden_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (TipoDatoValor::GenderMale() ? 'e' : 'a'), TipoDatoValor::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctTipoDatoValor->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the TipoDatoValorMetaControl
        $this->mctTipoDatoValor->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the TipoDatoValorMetaControl
        $this->mctTipoDatoValor->DeleteTipoDatoValor();
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
