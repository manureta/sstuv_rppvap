<?php
class DatosCapituloEditPanelGen extends EditPanelBase {
    // Local instance of the DatosCapituloMetaControl
    public $mctDatosCapitulo;

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

    public function __construct($objParentObject, $strControlsArray = array(), $intIdDatosCapitulo = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(DatosCapituloEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intIdDatosCapitulo = $intIdDatosCapitulo;
        $this->pnlTabs = new QTabPanel($this);
        $this->pnlTabs->AddTab(DatosCapitulo::Noun());
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the DatosCapituloMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctDatosCapitulo = DatosCapituloMetaControl::Create($this, $this->intIdDatosCapitulo);

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
    
    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (DatosCapitulo::GenderMale() ? 'e' : 'a'), DatosCapitulo::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctDatosCapitulo->EditMode;
        }
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the DatosCapituloMetaControl
        $this->mctDatosCapitulo->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        // Delegate "Delete" processing to the DatosCapituloMetaControl
        $this->mctDatosCapitulo->DeleteDatosCapitulo();
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
