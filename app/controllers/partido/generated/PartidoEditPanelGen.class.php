<?php
class PartidoEditPanelGen extends EditPanelBase {
    // Local instance of the PartidoMetaControl
    public $mctPartido;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtNombre' => true,
        'txtCodPartido' => true,
        'lstAprobacionGeodesiaAsId' => false,
        'lstFolioAsId' => false,
        'lstLocalidadAsId' => false,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(PartidoEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(Partido::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the PartidoMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctPartido = PartidoMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Partido's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctPartido->lblId_Create();
        if (in_array('txtNombre',$strControlsArray)) 
            $this->objControlsArray['txtNombre'] = $this->mctPartido->txtNombre_Create();
        if (in_array('txtCodPartido',$strControlsArray)) 
            $this->objControlsArray['txtCodPartido'] = $this->mctPartido->txtCodPartido_Create();
        if (in_array('lstAprobacionGeodesiaAsId',$strControlsArray))
            $this->objControlsArray['lstAprobacionGeodesiaAsId'] = $this->mctPartido->lstAprobacionGeodesiaAsId_Create();
        if (in_array('lstFolioAsId',$strControlsArray))
            $this->objControlsArray['lstFolioAsId'] = $this->mctPartido->lstFolioAsId_Create();
        if (in_array('lstLocalidadAsId',$strControlsArray))
            $this->objControlsArray['lstLocalidadAsId'] = $this->mctPartido->lstLocalidadAsId_Create();

        $this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Partido::GenderMale() ? 'e' : 'a'), Partido::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctPartido->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the PartidoMetaControl
        $this->mctPartido->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the PartidoMetaControl
        $this->mctPartido->DeletePartido();
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
