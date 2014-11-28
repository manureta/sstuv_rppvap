<?php
class InfraestructuraEditPanel extends InfraestructuraEditPanelGen {

     // Local instance of the InfraestructuraMetaControl
    public $mctInfraestructura;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'lstEnergiaElectricaMedidorIndividualObject' => true,
        'lstEnergiaElectricaMedidorColectivoObject' => true,
        'lstAlumbradoPublicoObject' => true,
        'lstAguaCorrienteObject' => true,
        'lstAguaPotableObject' => true,
        'lstRedCloacalObject' => true,
        'lstSistAlternativoEliminacionExcretasObject' => true,
        'lstRedGasObject' => true,
        'lstPavimentoObject' => true,
        'lstCordonCunetaObject' => true,
        'lstDesaguesPluvialesObject' => true,
        'lstRecoleccionResiduosObject' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(InfraestructuraEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(Infraestructura::Noun());
        $this->metaControl_Create($strControlsArray);
        //$this->buttons_Create();
        $this->blnAutoRenderChildrenWithName = true;
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the InfraestructuraMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctInfraestructura = InfraestructuraMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Infraestructura's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctInfraestructura->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctInfraestructura->lstIdFolioObject_Create();
        if (in_array('lstEnergiaElectricaMedidorIndividualObject',$strControlsArray)) 
            $this->objControlsArray['lstEnergiaElectricaMedidorIndividualObject'] = $this->mctInfraestructura->lstEnergiaElectricaMedidorIndividualObject_Create();
            $this->objControlsArray['lstEnergiaElectricaMedidorIndividualObject']->Name="Energía eléctrica medidor individual";
        if (in_array('lstEnergiaElectricaMedidorColectivoObject',$strControlsArray)) 
            $this->objControlsArray['lstEnergiaElectricaMedidorColectivoObject'] = $this->mctInfraestructura->lstEnergiaElectricaMedidorColectivoObject_Create();
            $this->objControlsArray['lstEnergiaElectricaMedidorColectivoObject']->Name="Energía eléctrica medidor colectivo";
        if (in_array('lstAlumbradoPublicoObject',$strControlsArray)) 
            $this->objControlsArray['lstAlumbradoPublicoObject'] = $this->mctInfraestructura->lstAlumbradoPublicoObject_Create();
            $this->objControlsArray['lstAlumbradoPublicoObject']->Name="Alumbrado público";
        if (in_array('lstAguaCorrienteObject',$strControlsArray)) 
            $this->objControlsArray['lstAguaCorrienteObject'] = $this->mctInfraestructura->lstAguaCorrienteObject_Create();
            $this->objControlsArray['lstAguaCorrienteObject']->Name="Agua corriente";
        if (in_array('lstAguaPotableObject',$strControlsArray)) 
            $this->objControlsArray['lstAguaPotableObject'] = $this->mctInfraestructura->lstAguaPotableObject_Create();
            $this->objControlsArray['lstAguaPotableObject']->Name="Agua potable (no de red)";
        if (in_array('lstRedCloacalObject',$strControlsArray)) 
            $this->objControlsArray['lstRedCloacalObject'] = $this->mctInfraestructura->lstRedCloacalObject_Create();
            $this->objControlsArray['lstRedCloacalObject']->Name="Red cloacal";
        if (in_array('lstSistAlternativoEliminacionExcretasObject',$strControlsArray)) 
            $this->objControlsArray['lstSistAlternativoEliminacionExcretasObject'] = $this->mctInfraestructura->lstSistAlternativoEliminacionExcretasObject_Create();
            $this->objControlsArray['lstSistAlternativoEliminacionExcretasObject']->Name="Sistema alternativo de eliminación de excretas";
        if (in_array('lstRedGasObject',$strControlsArray)) 
            $this->objControlsArray['lstRedGasObject'] = $this->mctInfraestructura->lstRedGasObject_Create();
            $this->objControlsArray['lstRedGasObject']->Name="Red de gas";
        if (in_array('lstPavimentoObject',$strControlsArray)) 
            $this->objControlsArray['lstPavimentoObject'] = $this->mctInfraestructura->lstPavimentoObject_Create();
            $this->objControlsArray['lstPavimentoObject']->Name="Pavimento";
        if (in_array('lstCordonCunetaObject',$strControlsArray)) 
            $this->objControlsArray['lstCordonCunetaObject'] = $this->mctInfraestructura->lstCordonCunetaObject_Create();
            $this->objControlsArray['lstCordonCunetaObject']->Name="Cordón cuneta";
        if (in_array('lstDesaguesPluvialesObject',$strControlsArray)) 
            $this->objControlsArray['lstDesaguesPluvialesObject'] = $this->mctInfraestructura->lstDesaguesPluvialesObject_Create();
            $this->objControlsArray['lstDesaguesPluvialesObject']->Name="Desagues pluviales";
        if (in_array('lstRecoleccionResiduosObject',$strControlsArray)) 
            $this->objControlsArray['lstRecoleccionResiduosObject'] = $this->mctInfraestructura->lstRecoleccionResiduosObject_Create();
            $this->objControlsArray['lstRecoleccionResiduosObject']->Name="Recolección de residuos";

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    


}
?>