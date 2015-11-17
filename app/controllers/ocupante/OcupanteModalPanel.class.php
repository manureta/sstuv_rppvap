<?php
class OcupanteModalPanel extends OcupanteModalPanelGen {

  public $lstTipoDocumento;
  public $lstEstadoCivil;
  public $lstOcupacion;

  public $mctOcupante;
  public $objCallerControl;
  protected $blnChangesMade = false;

  //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdHogarObject' => true,
        'txtApellido' => true,
        'txtNombres' => true,
        'calFechaNacimiento' => true,
        'txtEdad' => true,
        'txtEstadoCivil' => true,
        'txtDeOConQuien' => true,
        'txtOcupacion' => true,
        'txtIngreso' => true,
        'txtTipoDoc' => true,
        'txtDoc' => true,
        'txtNacionalidad' => true,
        'txtNyaMadre' => true,
        'txtNyaPadre' => true,
        'txtRelacionParentescoJefeHogar' => true,
        'chkReferente' => true,
    );

  public function __construct(QDialogBox $objParentObject, $strControlsArray = array(), $objOcupante = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(OcupanteModalPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Template=__VIEW_DIR__."/censo/OcupanteEditPanel.tpl.php";


        if (!$objOcupante)
            $objOcupante = new Ocupante();

        $this->intId = $objOcupante->Id;

        //$this->pnlTabs = new QTabPanel($this);
        //$this->pnlTabs->AddTab(Ocupante::Noun());
        $this->metaControl_Create($strControlsArray, $objOcupante);
        $this->buttons_Create(false);
        $objParentObject->CloseMethod = array($this, 'Close');
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);


        $this->lstOcupacion=new QListBox($this);
        $this->lstOcupacion->AddItem($this->objControlsArray['txtOcupacion']->Text,$this->objControlsArray['txtOcupacion']->Text);
        $this->lstOcupacion->AddItem('Empleado','empleado');
        $this->lstOcupacion->AddItem('Plan','plan');
        $this->lstOcupacion->AddItem('Jornal','jornal');
        $this->lstOcupacion->AddItem('Ama de casa','ama_de_casa');
        $this->lstOcupacion->AddItem('Desocupado','desocupado');
        $this->lstOcupacion->AddItem('Cuentapropista','cuentapropista');
        $this->lstOcupacion->AddItem('Jubilado','jubilado');
        $this->lstOcupacion->AddItem('Pensionado','pensionado');
        $this->lstOcupacion->Name="Ocupación";
        $this->lstOcupacion->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstOcupacion_Change'));


        $this->lstTipoDocumento=new QListBox($this);
        $this->lstTipoDocumento->AddItem($this->objControlsArray['txtTipoDoc']->Text,$this->objControlsArray['txtTipoDoc']->Text);
        $this->lstTipoDocumento->AddItem(' DNI ', 'dni');
        $this->lstTipoDocumento->AddItem(' LE ', 'le');
        $this->lstTipoDocumento->AddItem(' LC ', 'lc');
        $this->lstTipoDocumento->AddItem(' CF ', 'cf');
        $this->lstTipoDocumento->Name="Tipo de documento";
        $this->lstTipoDocumento->Required=true;
        $this->lstTipoDocumento->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstTipoDocumento_Change'));

        $this->lstEstadoCivil=new QListBox($this);
        $this->lstEstadoCivil->AddItem($this->objControlsArray['txtEstadoCivil']->Text,$this->objControlsArray['txtEstadoCivil']->Text);
        $this->lstEstadoCivil->AddItem('Soltero','soltero');
        $this->lstEstadoCivil->AddItem('Casado','casado');
        $this->lstEstadoCivil->AddItem('Viudo','viudo');
        $this->lstEstadoCivil->AddItem('Divorciado','divorciado');
        $this->lstEstadoCivil->AddItem('Separado','separado');
        $this->lstEstadoCivil->AddItem('Unión de hecho','union_hecho');
        $this->lstEstadoCivil->AddItem('Emancipado','emancipado');
        $this->lstEstadoCivil->Name="Estado civil";
        $this->lstEstadoCivil->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstEstadoCivil_Change'));

        $this->blnAutoRenderChildren = false;

    }




  protected function metaControl_Create($strControlsArray, $objOcupante){

      $this->mctOcupante = new OcupanteMetaControl($this, $objOcupante);

      // Call MetaControl's methods to create qcontrols based on Ocupante's data fields
      if (in_array('lblId',$strControlsArray))
          $this->objControlsArray['lblId'] = $this->mctOcupante->lblId_Create();
      if (in_array('lstIdHogarObject',$strControlsArray))
          $this->objControlsArray['lstIdHogarObject'] = $this->mctOcupante->lstIdHogarObject_Create();
      if (in_array('txtApellido',$strControlsArray))
          $this->objControlsArray['txtApellido'] = $this->mctOcupante->txtApellido_Create();
      if (in_array('txtNombres',$strControlsArray))
          $this->objControlsArray['txtNombres'] = $this->mctOcupante->txtNombres_Create();
      if (in_array('calFechaNacimiento',$strControlsArray))
          $this->objControlsArray['calFechaNacimiento'] = $this->mctOcupante->calFechaNacimiento_Create();
          $this->objControlsArray['calFechaNacimiento']->Name="Fecha nacimiento";
      if (in_array('txtEdad',$strControlsArray))
          $this->objControlsArray['txtEdad'] = $this->mctOcupante->txtEdad_Create();
      if (in_array('txtEstadoCivil',$strControlsArray))
          $this->objControlsArray['txtEstadoCivil'] = $this->mctOcupante->txtEstadoCivil_Create();
          $this->objControlsArray['txtEstadoCivil']->Name="Estado civil";
      if (in_array('txtDeOConQuien',$strControlsArray))
          $this->objControlsArray['txtDeOConQuien'] = $this->mctOcupante->txtDeOConQuien_Create();
          $this->objControlsArray['txtDeOConQuien']->PlaceHolder="Con quién o de quién";

      if (in_array('txtOcupacion',$strControlsArray))
          $this->objControlsArray['txtOcupacion'] = $this->mctOcupante->txtOcupacion_Create();
          $this->objControlsArray['txtOcupacion']->Visible=false;

      if (in_array('txtIngreso',$strControlsArray))
          $this->objControlsArray['txtIngreso'] = $this->mctOcupante->txtIngreso_Create();
          $this->objControlsArray['txtIngreso']->PlaceHolder="Ingreso";
      if (in_array('txtTipoDoc',$strControlsArray))
          $this->objControlsArray['txtTipoDoc'] = $this->mctOcupante->txtTipoDoc_Create();

      if (in_array('txtDoc',$strControlsArray))
          $this->objControlsArray['txtDoc'] = $this->mctOcupante->txtDoc_Create();
          $this->objControlsArray['txtDoc']->Name="Número de documento";
      if (in_array('txtNacionalidad',$strControlsArray))
          $this->objControlsArray['txtNacionalidad'] = $this->mctOcupante->txtNacionalidad_Create();
      if (in_array('txtNyaMadre',$strControlsArray))
          $this->objControlsArray['txtNyaMadre'] = $this->mctOcupante->txtNyaMadre_Create();
          $this->objControlsArray['txtNyaMadre']->Name="Nombre y apellido de la madre";
      if (in_array('txtNyaPadre',$strControlsArray))
          $this->objControlsArray['txtNyaPadre'] = $this->mctOcupante->txtNyaPadre_Create();
          $this->objControlsArray['txtNyaPadre']->Name="Nombre y apellido del padre";
      if (in_array('txtRelacionParentescoJefeHogar',$strControlsArray))
          $this->objControlsArray['txtRelacionParentescoJefeHogar'] = $this->mctOcupante->txtRelacionParentescoJefeHogar_Create();
          $this->objControlsArray['txtRelacionParentescoJefeHogar']->Name="Relación de parentesco con el/la referente";
      if (in_array('chkReferente',$strControlsArray))
          $this->objControlsArray['chkReferente'] = $this->mctOcupante->chkReferente_Create();

      //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
  }



  public function lstOcupacion_Change($strFormId, $strControlId, $strParameter) {
      $this->txtOcupacion->Text=$this->lstOcupacion->SelectedValue;
  }

  public function lstTipoDocumento_Change($strFormId, $strControlId, $strParameter) {
      $this->txtTipoDoc->Text=$this->lstTipoDocumento->SelectedValue;
  }

  public function lstEstadoCivil_Change($strFormId, $strControlId, $strParameter) {
      $this->txtEstadoCivil->Text=$this->lstEstadoCivil->SelectedValue;
  }

}
