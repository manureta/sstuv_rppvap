<?php
class EncuadreLegalEditPanel extends EncuadreLegalEditPanelGen {

    // Local instance of the EncuadreLegalMetaControl
    public $mctEncuadreLegal;

    //id variables for meta_create
    protected $intId;
    //boton para imprimir expropiaciones
    public $btnImprimirExpropiaciones;

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
        'txtFechaSancion' => true,
        'txtFechaVencimiento' => true,
        'txtNomenclaturaTextoLey' => true,
        'txtTasacionAdministrativa' => true,
        'txtPrecioPagado' => true,
        'txtJuzgado' => true,
        'lstEstadoProcesoExpropiacionObject' => true,
        'txtMemoriaDescriptiva' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(EncuadreLegalEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray,$intId,$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(EncuadreLegal::Noun());
        $this->btnImprimirExpropiaciones = new QButton($this);
        $this->btnImprimirExpropiaciones->AddCssClass('btn btn-info');
        $this->btnImprimirExpropiaciones->Icon = 'print';
        $this->btnImprimirExpropiaciones->Text = 'Informe Expropiaciones';
        $this->btnImprimirExpropiaciones->ToolTip = 'Imprimir Informe Expropiaciones';
        $this->btnImprimirExpropiaciones->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnImprimir_Click"));
        $this->btnImprimirExpropiaciones->ActionParameter = QApplication::QueryString("id");


        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        if(!Permission::PuedeEditar1A4($objParentObject->objFolio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }

    }

    public function btnImprimir_Click($strFormId, $strControlId, $strParameter){
      $url=__VIRTUAL_DIRECTORY__."/informe_expropiaciones.php?idfolio=$strParameter";
      QApplication::ExecuteJavascript("window.open('$url');");
    }

    protected function buttons_Create(){}


    protected function metaControl_Create($strControlsArray){
        // Construct the EncuadreLegalMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctEncuadreLegal = EncuadreLegalMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on EncuadreLegal's data fields
        //if (in_array('lblId',$strControlsArray)) $this->objControlsArray['lblId'] = $this->mctEncuadreLegal->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray))
            $this->objControlsArray['lstIdFolioObject'] = $this->mctEncuadreLegal->lstIdFolioObject_Create();
        if (in_array('chkDecreto222595',$strControlsArray))
            $this->objControlsArray['chkDecreto222595'] = $this->mctEncuadreLegal->chkDecreto222595_Create();
            $this->objControlsArray['chkDecreto222595']->Name="Decreto 2225/95";
        if (in_array('chkLey24374',$strControlsArray))
            $this->objControlsArray['chkLey24374'] = $this->mctEncuadreLegal->chkLey24374_Create();
            $this->objControlsArray['chkLey24374']->Name="Ley 24374";
        if (in_array('chkDecreto81588',$strControlsArray))
            $this->objControlsArray['chkDecreto81588'] = $this->mctEncuadreLegal->chkDecreto81588_Create();
            $this->objControlsArray['chkDecreto81588']->Name="Decreto 815/88";
        if (in_array('chkLey23073',$strControlsArray))
            $this->objControlsArray['chkLey23073'] = $this->mctEncuadreLegal->chkLey23073_Create();
            $this->objControlsArray['chkLey23073']->Name="Ley 23073";
        if (in_array('chkDecreto468696',$strControlsArray))
            $this->objControlsArray['chkDecreto468696'] = $this->mctEncuadreLegal->chkDecreto468696_Create();
            $this->objControlsArray['chkDecreto468696']->Name="Decreto 4686/96";
        if (in_array('chkLey14449',$strControlsArray))
            $this->objControlsArray['chkLey14449']= $this->mctEncuadreLegal->chkLey14449_Create();
            $this->objControlsArray['chkLey14449']->Name="Ley 14449";
        if (in_array('chkTieneExpropiacion',$strControlsArray))
            $this->objControlsArray['chkTieneExpropiacion'] = $this->mctEncuadreLegal->chkTieneExpropiacion_Create();
            $this->objControlsArray['chkTieneExpropiacion']->Name="Expropiación";
        if (in_array('txtExpropiacion',$strControlsArray))
            $this->objControlsArray['txtExpropiacion'] = $this->mctEncuadreLegal->txtExpropiacion_Create();
            $this->objControlsArray['txtExpropiacion']->Name="Nro Ley Expropiación";
        if (in_array('txtOtros',$strControlsArray))
            $this->objControlsArray['txtOtros'] = $this->mctEncuadreLegal->txtOtros_Create();
        if (in_array('txtFechaSancion',$strControlsArray))
            $this->objControlsArray['txtFechaSancion'] = $this->mctEncuadreLegal->txtFechaSancion_Create();
            $this->objControlsArray['txtFechaSancion']->Name="Fecha Sanción";
        if (in_array('txtFechaVencimiento',$strControlsArray))
            $this->objControlsArray['txtFechaVencimiento'] = $this->mctEncuadreLegal->txtFechaVencimiento_Create();
            $this->objControlsArray['txtFechaVencimiento']->Name="Fecha Vencimiento";
        if (in_array('txtNomenclaturaTextoLey',$strControlsArray))
            $this->objControlsArray['txtNomenclaturaTextoLey'] = $this->mctEncuadreLegal->txtNomenclaturaTextoLey_Create();
            $this->objControlsArray['txtNomenclaturaTextoLey']->Name="Nomenclatura texto Ley";
        if (in_array('txtTasacionAdministrativa',$strControlsArray))
            $this->objControlsArray['txtTasacionAdministrativa'] = $this->mctEncuadreLegal->txtTasacionAdministrativa_Create();
            $this->objControlsArray['txtTasacionAdministrativa']->Name="Tasación administrativa";
        if (in_array('txtPrecioPagado',$strControlsArray))
            $this->objControlsArray['txtPrecioPagado'] = $this->mctEncuadreLegal->txtPrecioPagado_Create();
            $this->objControlsArray['txtPrecioPagado']->Name="Precio Pagado";
        if (in_array('txtJuzgado',$strControlsArray))
            $this->objControlsArray['txtJuzgado'] = $this->mctEncuadreLegal->txtJuzgado_Create();
        if (in_array('lstEstadoProcesoExpropiacionObject',$strControlsArray))
            $this->objControlsArray['lstEstadoProcesoExpropiacionObject'] = $this->mctEncuadreLegal->lstEstadoProcesoExpropiacionObject_Create();
            $this->objControlsArray['lstEstadoProcesoExpropiacionObject']->Name="Estado del proceso de expropiación";
        if (in_array('txtMemoriaDescriptiva',$strControlsArray))
            $this->objControlsArray['txtMemoriaDescriptiva'] = $this->mctEncuadreLegal->txtMemoriaDescriptiva_Create();
            $this->objControlsArray['txtMemoriaDescriptiva']->Name="Memoria Descriptiva del seguimiento";

    }
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the EncuadreLegalMetaControl
        $this->mctEncuadreLegal->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
    }


}
?>
