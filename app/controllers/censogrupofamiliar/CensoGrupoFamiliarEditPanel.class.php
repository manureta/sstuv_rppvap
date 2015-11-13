<?php
class CensoGrupoFamiliarEditPanel extends CensoGrupoFamiliarEditPanelGen {
  	public $objFolio;
    protected $intCensoGrupoFamiliarId;
  	//array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblCensoGrupoFamiliarId' => false,
        'lstIdFolioObject' => true,
        'calFechaAlta' => true,
        'txtCirc' => true,
        'txtSecc' => true,
        'txtMz' => true,
        'txtPc' => true,
        'txtTelefono' => true,
        'chkDeclaracionNoOcupacion' => true,
        'txtTipoDocAdj' => true,
        'txtTipoBeneficio' => true,
        'lstCensoPersona' => true,
    );


    public function __construct($objParentObject, $strControlsArray = array(), $intCensoGrupoFamiliarId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(CensoGrupoFamiliarEditPanel::$strControlsArray, true) : $strControlsArray;
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intCensoGrupoFamiliarId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->Template=__VIEW_DIR__."/censo/CensoEditPanel.tpl.php";
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        $this->objFolio=Folio::load(QApplication::QueryString("id"));     
         
        //$this->blnAutoRenderChildrenWithName = true;
       if(!Permission::PuedeEditar1A4($this->objFolio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
            $this->btnCreateNew->Enabled = false;
        }



    }

    protected function metaControl_Create($strControlsArray){
        // Construct the CensoGrupoFamiliarMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctCensoGrupoFamiliar = CensoGrupoFamiliarMetaControl::Create($this, $this->intCensoGrupoFamiliarId);

        // Call MetaControl's methods to create qcontrols based on CensoGrupoFamiliar's data fields
        if (in_array('lblCensoGrupoFamiliarId',$strControlsArray))
            $this->objControlsArray['lblCensoGrupoFamiliarId'] = $this->mctCensoGrupoFamiliar->lblCensoGrupoFamiliarId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray))
            $this->objControlsArray['lstIdFolioObject'] = $this->mctCensoGrupoFamiliar->lstIdFolioObject_Create();
        if (in_array('calFechaAlta',$strControlsArray))
            $this->objControlsArray['calFechaAlta'] = $this->mctCensoGrupoFamiliar->calFechaAlta_Create();
            $this->objControlsArray['calFechaAlta']->Name="Fecha";
        if (in_array('txtCirc',$strControlsArray))
            $this->objControlsArray['txtCirc'] = $this->mctCensoGrupoFamiliar->txtCirc_Create();
        if (in_array('txtSecc',$strControlsArray))
            $this->objControlsArray['txtSecc'] = $this->mctCensoGrupoFamiliar->txtSecc_Create();
        if (in_array('txtMz',$strControlsArray))
            $this->objControlsArray['txtMz'] = $this->mctCensoGrupoFamiliar->txtMz_Create();
        if (in_array('txtPc',$strControlsArray))
            $this->objControlsArray['txtPc'] = $this->mctCensoGrupoFamiliar->txtPc_Create();
        if (in_array('txtTelefono',$strControlsArray))
            $this->objControlsArray['txtTelefono'] = $this->mctCensoGrupoFamiliar->txtTelefono_Create();
        if (in_array('chkDeclaracionNoOcupacion',$strControlsArray))
            $this->objControlsArray['chkDeclaracionNoOcupacion'] = $this->mctCensoGrupoFamiliar->chkDeclaracionNoOcupacion_Create();
            $this->objControlsArray['chkDeclaracionNoOcupacion']->Name="Declaración de no ocupación";
        if (in_array('txtTipoDocAdj',$strControlsArray))
            $this->objControlsArray['txtTipoDocAdj'] = $this->mctCensoGrupoFamiliar->txtTipoDocAdj_Create();
            $this->objControlsArray['txtTipoDocAdj']->Name="Tipo de documentación";
        if (in_array('txtTipoBeneficio',$strControlsArray))
            $this->objControlsArray['txtTipoBeneficio'] = $this->mctCensoGrupoFamiliar->txtTipoBeneficio_Create();
            $this->objControlsArray['txtTipoBeneficio']->Name="Tipo de beneficio";
        if (in_array('lstCensoPersona',$strControlsArray))
            $this->objControlsArray['lstCensoPersona'] = $this->mctCensoGrupoFamiliar->lstCensoPersona_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>
