<?php
class NomenclaturaEditPanel extends NomenclaturaEditPanelGen {
       // Local instance of the NomenclaturaMetaControl
    public $mctNomenclatura;
    
    //id variables for meta_create
    protected $intId;

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
        'txtPartido' => true,
        'chkDatoVerificadoRegPropiedad' => true,
        'txtEstadoGeografico' => true,
    );

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {
        
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
         $this->intId = $intId;
        
            $this->metaControl_Create($strControlsArray);
        
         $this->buttons_Create();
        $this->blnAutoRenderChildrenWithName = true;
       

    }

        protected function metaControl_Create($strControlsArray){
        // Construct the NomenclaturaMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctNomenclatura = NomenclaturaMetaControl::Create($this, $this->intId);

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
        if (in_array('txtPartido',$strControlsArray)) 
            $this->objControlsArray['txtPartido'] = $this->mctNomenclatura->txtPartido_Create();
        if (in_array('chkDatoVerificadoRegPropiedad',$strControlsArray)) 
            $this->objControlsArray['chkDatoVerificadoRegPropiedad'] = $this->mctNomenclatura->chkDatoVerificadoRegPropiedad_Create();
        if (in_array('txtEstadoGeografico',$strControlsArray)) 
            $this->objControlsArray['txtEstadoGeografico'] = $this->mctNomenclatura->txtEstadoGeografico_Create();
        
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the NomenclaturaMetaControl
        $this->mctNomenclatura->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/". $this->mctNomenclatura->Nomenclatura->IdFolio) ; 
    }

     protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Nomenclatura::GenderMale() ? 'e' : 'a'), Nomenclatura::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctNomenclatura->EditMode;
        }
    }

}
?>