<?php
class HogarEditPanel extends HogarEditPanelGen {
  public $objFolio;
  public $lstTipoBeneficio;
  public $btnCertificado;
  public $objEncuadre;
  public $opcionesBeneficio;


  public static $strControlsArray = array(
      'lblId' => false,
      'lstIdFolioObject' => true,
      'calFechaAlta' => true,
      'txtCirc' => true,
      'txtSecc' => true,
      'txtMz' => true,
      'txtPc' => true,
      'txtTelefono' => true,
      'txtDireccion' => true,
      'chkDeclaracionNoOcupacion' => true,
      'txtDocTerreno' => true,
      'txtTipoBeneficio' => true,
      'txtFormaOcupacion' => true,
      'txtFechaIngreso' => true,
      'txtValorLote' => true,
      'txtCantidadCuotas' => true,
      'txtValorCuota' => true,
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

        $this->objEncuadre=EncuadreLegal::QuerySingle(QQ::Equal(QQN::EncuadreLegal()->IdFolio,QApplication::QueryString("id")));

        $this->opcionesBeneficio = array(
          'decreto_222595' => 'Decreto 2225/95',
          'ley_24374' =>'Ley 24374',
          'decreto_81588' =>'Decreto 815/88',
          'decreto_468696' =>'Decreto 4686/96',
          'ley_14449' => 'Ley 14.449'
         );

         if($this->objEncuadre->TieneExpropiacion){
           $this->opcionesBeneficio[$this->objEncuadre->Expropiacion]=$this->objEncuadre->Expropiacion;
         }
         //ESCONDO TEXTO Y CREO LISTADO
        $this->txtTipoBeneficio->Visible=false;
        $this->lstTipoBeneficio=new QListBox($this);
        $this->lstTipoBeneficio->Name="Tipo de beneficio";
        //inicializo en vacio si todavia no existe
        if(!isset($this->opcionesBeneficio[$this->txtTipoBeneficio->Text])){
          $this->lstTipoBeneficio->AddItem("","");
        }else{
          //seteo el valor actual como primero en el listado
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio[$this->txtTipoBeneficio->Text],$this->txtTipoBeneficio->Text);
        }



        if($this->objEncuadre->Decreto222595){
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio['decreto_222595'],'decreto_222595');
        }
        if($this->objEncuadre->Ley24374){
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio['ley_24374'],'ley_24374');
        }
        if($this->objEncuadre->Decreto81588){
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio['decreto_81588'],'decreto_81588');
        }
        if($this->objEncuadre->Decreto468696){
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio['decreto_468696'],'decreto_468696');
        }
        if($this->objEncuadre->Ley14449){
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio['ley_14449'],'ley_14449');
        }
        if($this->objEncuadre->TieneExpropiacion){
          $this->lstTipoBeneficio->AddItem($this->opcionesBeneficio[$this->objEncuadre->Expropiacion],$this->objEncuadre->Expropiacion);
        }

       $this->lstTipoBeneficio->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstTipoBeneficio_Change'));

       $this->btnCertificado = new QButton($this);
       $this->btnCertificado->AddCssClass('btn-yellow btn ');
       $this->btnCertificado->Text = $this->textoBtnCertificado();
       $this->btnCertificado->Icon = 'print';
       $this->btnCertificado->Enabled = true;
       $this->btnCertificado->ToolTip = "imprimir boleta";
       $this->btnCertificado->ActionParameter = $this->intId;
       $this->btnCertificado->AddAction(new QClickEvent(), new QAjaxControlAction($this, "Certificado_Click"));

       //seteo upload manager
       $url_upload_manager=__VIRTUAL_DIRECTORY__."/upload.php?idfolio=".QApplication::QueryString("id")."&tipo=censo&hogar=".$this->intId;

       if(!Permission::PuedeEditarCenso()){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
            $this->btnCreateNew->Enabled = false;
            if($this->intId)QApplication::ExecuteJavascript("verAdjuntados('$url_upload_manager','#files_censo')");
        }else{
          if($this->intId){
            QApplication::ExecuteJavascript("uploadManager('$url_upload_manager','#fileupload_censo','#files_censo')");
          }else{
            QApplication::ExecuteJavascript("$('.fileinput-button').attr('disabled','disabled')");
          }
        }


    }

    public function textoBtnCertificado(){
      switch ($this->txtTipoBeneficio->Text) {
        case 'decreto_81588':
          return 'Boleta Compraventa';
          break;
        case 'decreto_222595':
          return 'Certificado de adjudicación';
          break;
        default:
          if(isset($this->opcionesBeneficio[$this->objEncuadre->Expropiacion]) && $this->opcionesBeneficio[$this->objEncuadre->Expropiacion]==$this->txtTipoBeneficio->Text){
            return 'Certificado de adjudicación';
          }else{
              return 'No disponible';
          }
          break;
      }
    }

    public function Certificado_Click($strFormId, $strControlId, $strParameter) {
         $url=__VIRTUAL_DIRECTORY__."/certificado.php?id=$strParameter";
         QApplication::ExecuteJavascript("window.open('$url');");

     }

    public function lstTipoBeneficio_Change($strFormId, $strControlId, $strParameter) {
        $this->txtTipoBeneficio->Text=$this->lstTipoBeneficio->SelectedValue;
        $this->btnCertificado->Text=$this->textoBtnCertificado();
    }
    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {

        if($this->validar_campos()){
          $this->mctHogar->Save();
          //$('.fileinput-button').removeAttr("disabled");
          foreach ($this->objModifiedChildsArray as $obj) {
              $obj->Save();
          }
          $this->objModifiedChildsArray = array();
          QApplication::DisplayNotification('Los datos se guardaron correctamente');
          $this->txtCirc->RemoveCssClass("has-error");

          $this->lstOcupanteAsId->Refresh();
        }

    }

    public function validar_campos() {
        $blnReturn=true;

        if(preg_match('/[0-9]/', $this->txtSecc->Text)){
            $this->txtSecc->AddCssClass("has-error");
            QApplication::DisplayNotification('No se aceptan valores numéricos en Sección','W');
            $blnReturn=false;
        }else {
          $this->txtSecc->RemoveCssClass("has-error");
        }

        if(preg_match('/[a-z]/', $this->txtCirc->Text)){
            $this->txtCirc->AddCssClass("has-error");
            QApplication::DisplayNotification('Solo se aceptan valores numéricos en Circ','W');
            $blnReturn=false;
        }else{
          $this->txtCirc->RemoveCssClass("has-error");
        }
        return $blnReturn;

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
            $this->objControlsArray['txtTelefono']->Name="Teléfono";
        if (in_array('chkDeclaracionNoOcupacion',$strControlsArray))
            $this->objControlsArray['chkDeclaracionNoOcupacion'] = $this->mctHogar->chkDeclaracionNoOcupacion_Create();
            $this->objControlsArray['chkDeclaracionNoOcupacion']->Name="Control de titularidad";
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
        if (in_array('txtDireccion',$strControlsArray))
            $this->objControlsArray['txtDireccion'] = $this->mctHogar->txtDireccion_Create();
            $this->objControlsArray['txtDireccion']->Name="Dirección";
        if (in_array('txtValorLote',$strControlsArray))
            $this->objControlsArray['txtValorLote'] = $this->mctHogar->txtValorLote_Create();
            $this->objControlsArray['txtValorLote']->Name="Valor del lote";
        if (in_array('txtCantidadCuotas',$strControlsArray))
            $this->objControlsArray['txtCantidadCuotas'] = $this->mctHogar->txtCantidadCuotas_Create();
            $this->objControlsArray['txtCantidadCuotas']->Name="Cantidad de cuotas";
        if (in_array('txtValorCuota',$strControlsArray))
            $this->objControlsArray['txtValorCuota'] = $this->mctHogar->txtValorCuota_Create();
            $this->objControlsArray['txtValorCuota']->Name="Valor de la cuota";
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter){

        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/censo/folio/".QApplication::QueryString("id")) ;
    }


}
?>
