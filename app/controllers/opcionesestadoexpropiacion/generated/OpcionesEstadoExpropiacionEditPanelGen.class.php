<?php
class OpcionesEstadoExpropiacionEditPanelGen extends EditPanelBase {
    // Local instance of the OpcionesEstadoExpropiacionMetaControl
    public $mctOpcionesEstadoExpropiacion;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtDescripcion' => true,
        'lstEncuadreLegalAsEstadoProcesoExpropiacion' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OpcionesEstadoExpropiacionEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(OpcionesEstadoExpropiacion::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the OpcionesEstadoExpropiacionMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctOpcionesEstadoExpropiacion = OpcionesEstadoExpropiacionMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on OpcionesEstadoExpropiacion's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctOpcionesEstadoExpropiacion->lblId_Create();
        if (in_array('txtDescripcion',$strControlsArray)) 
            $this->objControlsArray['txtDescripcion'] = $this->mctOpcionesEstadoExpropiacion->txtDescripcion_Create();
        if (in_array('lstEncuadreLegalAsEstadoProcesoExpropiacion',$strControlsArray))
            $this->objControlsArray['lstEncuadreLegalAsEstadoProcesoExpropiacion'] = $this->mctOpcionesEstadoExpropiacion->lstEncuadreLegalAsEstadoProcesoExpropiacion_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (OpcionesEstadoExpropiacion::GenderMale() ? 'e' : 'a'), OpcionesEstadoExpropiacion::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctOpcionesEstadoExpropiacion->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the OpcionesEstadoExpropiacionMetaControl
        $this->mctOpcionesEstadoExpropiacion->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the OpcionesEstadoExpropiacionMetaControl
        $this->mctOpcionesEstadoExpropiacion->DeleteOpcionesEstadoExpropiacion();
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
