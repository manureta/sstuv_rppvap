<?php
class EncuadreLegalEditPanelGen extends EditPanelBase {
    // Local instance of the EncuadreLegalMetaControl
    public $mctEncuadreLegal;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkDecreto222595' => true,
        'chkLey24374' => true,
        'chkDecreto81588' => true,
        'chkLey23073' => true,
        'chkDecreto468696' => true,
        'txtExpropiacion' => true,
        'chkLey14449' => true,
        'chkTieneExpropiacion' => true,
        'txtOtros' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(EncuadreLegalEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(EncuadreLegal::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the EncuadreLegalMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctEncuadreLegal = EncuadreLegalMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on EncuadreLegal's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctEncuadreLegal->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEncuadreLegal->lstIdFolioObject_Create();
        if (in_array('chkDecreto222595',$strControlsArray)) 
            $this->objControlsArray['chkDecreto222595'] = $this->mctEncuadreLegal->chkDecreto222595_Create();
        if (in_array('chkLey24374',$strControlsArray)) 
            $this->objControlsArray['chkLey24374'] = $this->mctEncuadreLegal->chkLey24374_Create();
        if (in_array('chkDecreto81588',$strControlsArray)) 
            $this->objControlsArray['chkDecreto81588'] = $this->mctEncuadreLegal->chkDecreto81588_Create();
        if (in_array('chkLey23073',$strControlsArray)) 
            $this->objControlsArray['chkLey23073'] = $this->mctEncuadreLegal->chkLey23073_Create();
        if (in_array('chkDecreto468696',$strControlsArray)) 
            $this->objControlsArray['chkDecreto468696'] = $this->mctEncuadreLegal->chkDecreto468696_Create();
        if (in_array('txtExpropiacion',$strControlsArray)) 
            $this->objControlsArray['txtExpropiacion'] = $this->mctEncuadreLegal->txtExpropiacion_Create();
        if (in_array('chkLey14449',$strControlsArray)) 
            $this->objControlsArray['chkLey14449'] = $this->mctEncuadreLegal->chkLey14449_Create();
        if (in_array('chkTieneExpropiacion',$strControlsArray)) 
            $this->objControlsArray['chkTieneExpropiacion'] = $this->mctEncuadreLegal->chkTieneExpropiacion_Create();
        if (in_array('txtOtros',$strControlsArray)) 
            $this->objControlsArray['txtOtros'] = $this->mctEncuadreLegal->txtOtros_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (EncuadreLegal::GenderMale() ? 'e' : 'a'), EncuadreLegal::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctEncuadreLegal->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the EncuadreLegalMetaControl
        $this->mctEncuadreLegal->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the EncuadreLegalMetaControl
        $this->mctEncuadreLegal->DeleteEncuadreLegal();
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
