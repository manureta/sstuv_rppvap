<?php
class HogarEditPanel extends HogarEditPanelGen {
  public $objFolio;
  public static $strControlsArray = array(
      'lblId' => false,
      'lstIdFolioObject' => true,
      'calFechaAlta' => true,
      'txtCirc' => true,
      'txtSecc' => true,
      'txtMz' => true,
      'txtPc' => true,
      'txtTelefono' => true,
      'chkDeclaracionNoOcupacion' => true,
      'txtTipoDocAdj' => true,
      'txtDocTerreno' => true,
      'txtTipoBeneficio' => true,
      'txtFormaOcupacion' => true,
      'txtFechaIngreso' => true,
      'lstOcupanteAsId' => true,
  );
    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->Template=__VIEW_DIR__."/censo/CensoEditPanel.tpl.php";
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        //$this->objFolio=Folio::load(QApplication::QueryString("id"));


       if(!Permission::PuedeEditarCenso()){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
            $this->btnCreateNew->Enabled = false;
        }

        $this->txtSecc->AddAction(new QKeyPressEvent(), new QAjaxControlAction($this,'txtSecc_Change'));

    }

    public function txtSecc_Change($strFormId, $strControlId, $strParameter) {
        error_log($this->txtSecc->Text);
        if(preg_match('/[0-9]/', $this->txtSecc->Text)){
            QApplication::DisplayAlert("El campo Sección no debe contener valores numéricos");
        }

    }

    protected function metaControl_Create($strControlsArray){
        // Construct the HogarMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctHogar = HogarMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Hogar's data fields
        if (in_array('lblId',$strControlsArray))
            $this->objControlsArray['lblId'] = $this->mctHogar->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray))
            $this->objControlsArray['lstIdFolioObject'] = $this->mctHogar->lstIdFolioObject_Create();
        if (in_array('calFechaAlta',$strControlsArray))
            $this->objControlsArray['calFechaAlta'] = $this->mctHogar->calFechaAlta_Create();
            $this->objControlsArray['calFechaAlta']->Name="Fecha de Alta";
        if (in_array('txtCirc',$strControlsArray))
            $this->objControlsArray['txtCirc'] = $this->mctHogar->txtCirc_Create();
        if (in_array('txtSecc',$strControlsArray))
            $this->objControlsArray['txtSecc'] = $this->mctHogar->txtSecc_Create();
        if (in_array('txtMz',$strControlsArray))
            $this->objControlsArray['txtMz'] = $this->mctHogar->txtMz_Create();
        if (in_array('txtPc',$strControlsArray))
            $this->objControlsArray['txtPc'] = $this->mctHogar->txtPc_Create();
        if (in_array('txtTelefono',$strControlsArray))
            $this->objControlsArray['txtTelefono'] = $this->mctHogar->txtTelefono_Create();
        if (in_array('chkDeclaracionNoOcupacion',$strControlsArray))
            $this->objControlsArray['chkDeclaracionNoOcupacion'] = $this->mctHogar->chkDeclaracionNoOcupacion_Create();
            $this->objControlsArray['chkDeclaracionNoOcupacion']->Name="Los ocupantes declaran que no son titulares de otro inmueble";
        if (in_array('txtTipoDocAdj',$strControlsArray))
            $this->objControlsArray['txtTipoDocAdj'] = $this->mctHogar->txtTipoDocAdj_Create();
            $this->objControlsArray['txtTipoDocAdj']->Name="Tipo de documentación";
        if (in_array('txtDocTerreno',$strControlsArray))
            $this->objControlsArray['txtDocTerreno'] = $this->mctHogar->txtDocTerreno_Create();
            $this->objControlsArray['txtDocTerreno']->Name="Documentación del terreno";
        if (in_array('txtTipoBeneficio',$strControlsArray))
            $this->objControlsArray['txtTipoBeneficio'] = $this->mctHogar->txtTipoBeneficio_Create();
            $this->objControlsArray['txtTipoBeneficio']->Name="Tipo de beneficio";
        if (in_array('txtFormaOcupacion',$strControlsArray))
            $this->objControlsArray['txtFormaOcupacion'] = $this->mctHogar->txtFormaOcupacion_Create();
            $this->objControlsArray['txtFormaOcupacion']->Name="Forma de ocupación";
        if (in_array('txtFechaIngreso',$strControlsArray))
            $this->objControlsArray['txtFechaIngreso'] = $this->mctHogar->txtFechaIngreso_Create();
            $this->objControlsArray['txtFechaIngreso']->Name="Fecha de ingreso";
        if (in_array('lstOcupanteAsId',$strControlsArray))
            $this->objControlsArray['lstOcupanteAsId'] = $this->mctHogar->lstOcupanteAsId_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter){

        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/censo/folio/".QApplication::QueryString("id")) ;
    }


}
?>
