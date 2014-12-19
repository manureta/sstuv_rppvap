    <?php
class RegularizacionEditPanel extends RegularizacionEditPanelGen {

    public $mctRegularizacion;
    public $objFolio;
    //id variables for meta_create
    protected $intId;
    public $pnlEncuadre;
    public $pnlAntecedentes;
    public $pnlOrganismos;

    protected $objEncuadre;
    protected $objAntecedentes;
    protected $objOrganismos;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'chkProcesoIniciado' => true,
        'lstAntecedentesAsIdFolio' => false,
        'lstEncuadreLegalAsIdFolio' => false,
        'lstRegistracionAsIdFolio' => false,
        'txtObservaciones' => true,
    );

    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(RegularizacionEditPanel::$strControlsArray, true) : $strControlsArray;

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray,$intId,$strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;

        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;
        
        // Si proceso iniciado esta tildado hay que mostrar encuadre legal
        $valor=($this->chkProcesoIniciado->Checked==1)? true: false;
        if($valor)QApplication::ExecuteJavascript("mostrarEncuadre(true)");
        $this->chkProcesoIniciado->AddAction(new QClickEvent(), new QJavascriptAction ("mostrarEncuadre()"));

        $this->objEncuadre=EncuadreLegal::QuerySingle(QQ::Equal(QQN::EncuadreLegal()->IdFolio,QApplication::QueryString("id")));                        
        $this->pnlEncuadre = new EncuadreLegalEditPanel($this,EncuadreLegalEditPanel::$strControlsArray,$this->objEncuadre->Id);
        $this->pnlEncuadre->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEncuadre->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEncuadre->lstIdFolioObject->Enabled = false;
        $this->pnlEncuadre->lstIdFolioObject->Visible = false;
        
        
        $this->objAntecedentes=Antecedentes::QuerySingle(QQ::Equal(QQN::Antecedentes()->IdFolio,QApplication::QueryString("id")));                                
        $this->pnlAntecedentes = new AntecedentesEditPanel($this,AntecedentesEditPanel::$strControlsArray,$this->objAntecedentes->Id);
        $this->pnlAntecedentes->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlAntecedentes->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlAntecedentes->lstIdFolioObject->Enabled = false;
        $this->pnlAntecedentes->lstIdFolioObject->Visible = false;        

        // Si se tilda sin intervencion hay que ocultar org de intervencion
        $sinintervencion=($this->pnlAntecedentes->chkSinIntervencion->Checked==1)? true: false;        
        if($sinintervencion)QApplication::ExecuteJavascript("SinIntervencion(true)");
        
        $this->pnlAntecedentes->chkSinIntervencion->AddAction(new QClickEvent(),new QAjaxControlAction($this,"sinintervencion_chk"));
        $this->pnlAntecedentes->chkObrasInfraestructura->AddAction(new QClickEvent(),new QAjaxControlAction($this,"deshabilitar_sinintervencion"));
        $this->pnlAntecedentes->chkEquipamientos->AddAction(new QClickEvent(),new QAjaxControlAction($this,"deshabilitar_sinintervencion"));
        $this->pnlAntecedentes->chkIntervencionesEnViviendas->AddAction(new QClickEvent(),new QAjaxControlAction($this,"deshabilitar_sinintervencion"));
        


        $this->objOrganismos=OrganismosDeIntervencion::QuerySingle(QQ::Equal(QQN::OrganismosDeIntervencion()->IdFolio,QApplication::QueryString("id")));                        
        $this->pnlOrganismos = new OrganismosDeIntervencionEditPanel($this,OrganismosDeIntervencionEditPanel::$strControlsArray,$this->objOrganismos->Id);
        $this->pnlOrganismos->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlOrganismos->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlOrganismos->lstIdFolioObject->Enabled = false;
        $this->pnlOrganismos->lstIdFolioObject->Visible = false;                
        

        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);

        //$this->blnAutoRenderChildrenWithName = true;
    }

   


    protected function metaControl_Create($strControlsArray){
        // Construct the RegularizacionMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctRegularizacion = RegularizacionMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Regularizacion's data fields
        if (in_array('lblId',$strControlsArray)) 
            $this->objControlsArray['lblId'] = $this->mctRegularizacion->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray)) 
            $this->objControlsArray['lstIdFolioObject'] = $this->mctRegularizacion->lstIdFolioObject_Create();
        if (in_array('chkProcesoIniciado',$strControlsArray)) 
            $this->objControlsArray['chkProcesoIniciado'] = $this->mctRegularizacion->chkProcesoIniciado_Create();
            $this->objControlsArray['chkProcesoIniciado']->Name="Proceso iniciado"; 
        if (in_array('lstAntecedentesAsIdFolio',$strControlsArray)) 
            $this->objControlsArray['lstAntecedentesAsIdFolio'] = $this->mctRegularizacion->lstAntecedentesAsIdFolio_Create();
        if (in_array('lstEncuadreLegalAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstEncuadreLegalAsIdFolio'] = $this->mctRegularizacion->lstEncuadreLegalAsIdFolio_Create();
        if (in_array('lstRegistracionAsIdFolio',$strControlsArray))
            $this->objControlsArray['lstRegistracionAsIdFolio'] = $this->mctRegularizacion->lstRegistracionAsIdFolio_Create();
        if (in_array('txtObservaciones',$strControlsArray)) 
            $this->objControlsArray['txtObservaciones'] = $this->mctRegularizacion->txtObservaciones_Create();

        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }
    
     public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the RegularizacionMetaControl
        $this->mctRegularizacion->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->pnlEncuadre->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlAntecedentes->btnSave_Click($strFormId, $strControlId, $strParameter);
        $this->pnlOrganismos->btnSave_Click($strFormId, $strControlId, $strParameter);
        
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
    }

    public function sinintervencion_chk($strFormId, $strControlId, $strParameter){
        if($this->pnlAntecedentes->chkSinIntervencion->Checked){
            $this->pnlAntecedentes->chkObrasInfraestructura->Checked=false;
            $this->pnlAntecedentes->chkEquipamientos->Checked=false;
            $this->pnlAntecedentes->chkIntervencionesEnViviendas->Checked=false;
            $this->pnlAntecedentes->txtOtros->Text="";                
            QApplication::ExecuteJavascript("SinIntervencion(true)");
        }else{
            QApplication::ExecuteJavascript("SinIntervencion(false)");
        }
        
        
    }

    public function deshabilitar_sinintervencion(){
        $this->pnlAntecedentes->chkSinIntervencion->Checked=false;
        QApplication::ExecuteJavascript("SinIntervencion(false)");
    }

      protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Regularizacion::GenderMale() ? 'e' : 'a'), Regularizacion::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctRegularizacion->EditMode;
        }
    }

}
?>
