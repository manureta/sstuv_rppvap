<?php
class ElementoEditPanelGen extends EditPanelBase {
    // Local instance of the ElementoMetaControl
    public $mctElemento;

    //id variables for meta_create
    protected $intIdElemento;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblIdElemento' => false,
        'txtNombre' => true,
        'lstIdPerfilObject' => true,
        'txtUndato' => true,
        'txtOtrodato' => true,
        'lstElementoHijoAsId' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intIdElemento = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(ElementoEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intIdElemento = $intIdElemento;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Elemento::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the ElementoMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctElemento = ElementoMetaControl::Create($this, $this->intIdElemento);

        // Call MetaControl's methods to create qcontrols based on Elemento's data fields
        if (in_array('lblIdElemento',$strControlsArray)) 
            $this->objControlsArray['lblIdElemento'] = $this->mctElemento->lblIdElemento_Create();
        if (in_array('txtNombre',$strControlsArray)) 
            $this->objControlsArray['txtNombre'] = $this->mctElemento->txtNombre_Create();
        if (in_array('lstIdPerfilObject',$strControlsArray)) 
            $this->objControlsArray['lstIdPerfilObject'] = $this->mctElemento->lstIdPerfilObject_Create();
        if (in_array('txtUndato',$strControlsArray)) 
            $this->objControlsArray['txtUndato'] = $this->mctElemento->txtUndato_Create();
        if (in_array('txtOtrodato',$strControlsArray)) 
            $this->objControlsArray['txtOtrodato'] = $this->mctElemento->txtOtrodato_Create();
        if (in_array('lstElementoHijoAsId',$strControlsArray))
            $this->objControlsArray['lstElementoHijoAsId'] = $this->mctElemento->lstElementoHijoAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Elemento::GenderMale() ? 'e' : 'a'), Elemento::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctElemento->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the ElementoMetaControl
        $this->mctElemento->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the ElementoMetaControl
        $this->mctElemento->DeleteElemento();
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
