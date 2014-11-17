<?php
class FolioEditPanel extends FolioEditPanelGen {

    public $strTitulo = 'Datos Generales';
    public $strSubtitulo = '';
    public $strTemplate = "";
    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtCodFolio' => true,
        'lstIdPartidoObject' => true,
        'lstIdLocalidadObject' => true,
        'txtMatricula' => true,
        'calFecha' => false,
        'txtEncargado' => true,
        'txtNombreBarrioOficial' => true,
        'txtNombreBarrioAlternativo1' => true,
        'txtNombreBarrioAlternativo2' => true,
        'txtAnioOrigen' => true,
        'txtSuperficie' => true,
        'txtCantidadFamilias' => true,
        'lstTipoBarrioObject' => true,
        'txtObservacionCasoDudoso' => true,
        'txtJudicializado' => true,
        'txtDireccion' => true,
        'txtNumExpedientes' => true,
        'lstCondicionesSocioUrbanisticasAsId' => false,
        'lstRegularizacionAsId' => false,
        'lstUsoInterno' => false,
        'lstNomenclaturaAsId' => false,
    );

    
    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(FolioEditPanel::$strControlsArray, true) : $strControlsArray;
        $this->strTemplate=__VIEW_DIR__."/folio/FolioEditPanel.tpl.php";

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        $this->intId = $intId;
        
        
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
        $this->objControlsArray['txtCodFolio']->Visible = null;
        $existeFolio=$this->mctFolio->Folio->CodFolio;
        
        if(!$existeFolio){
            QApplication::ExecuteJavascript("mostrarMapa()");
        }else{
            $this->objControlsArray['txtCodFolio']->ActionParameter=$this->mctFolio->Folio->Id;
            
        }

    }


    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the FolioMetaControl
        $this->mctFolio->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/". $this->mctFolio->Folio->Id) ; 
    }

    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Folio::GenderMale() ? 'e' : 'a'), Folio::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctFolio->EditMode;
        }
    }


}
?>