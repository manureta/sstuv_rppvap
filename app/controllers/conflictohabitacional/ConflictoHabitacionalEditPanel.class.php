<?php
class ConflictoHabitacionalEditPanel extends ConflictoHabitacionalEditPanelGen {

  protected $intId;
  protected $intIdFolio;
  protected $objFolio;

    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
            $this->objFolio = Folio::Load(QApplication::QueryString("id"));
            $this->strTemplate=__VIEW_DIR__."/conflictos/ConflictosFolioPanel.tpl.php";
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->intId = $intId;
        $this->intIdFolio = $this->objFolio->Id;

        $this->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->lstIdFolioObject->Enabled = false;
        $this->lstIdFolioObject->Visible = false;

        $this->blnAutoRenderChildrenWithName = false;
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);




        if(!Permission::PuedeEditar1A4($this->objFolio) || (Permission::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social")) && !Permission::EsAdministrador())) {
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }


    }

    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (ConflictoHabitacional::GenderMale() ? 'e' : 'a'), ConflictoHabitacional::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctConflictoHabitacional->EditMode;
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter){
        QApplication::ExecuteJavascript("window.history.back();");
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the ConflictoHabitacionalMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctConflictoHabitacional = ConflictoHabitacionalMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on ConflictoHabitacional's data fields
        if (in_array('lblId',$strControlsArray))
            $this->objControlsArray['lblId'] = $this->mctConflictoHabitacional->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray))
            $this->objControlsArray['lstIdFolioObject'] = $this->mctConflictoHabitacional->lstIdFolioObject_Create();
        if (in_array('chkIntervinoArea',$strControlsArray))
            $this->objControlsArray['chkIntervinoArea'] = $this->mctConflictoHabitacional->chkIntervinoArea_Create();
            $this->objControlsArray['chkIntervinoArea']->Name="¿Intervino el Área de Coordinación de Conflictos Habitacionales?";
        if (in_array('txtFueroInterviniente',$strControlsArray))
            $this->objControlsArray['txtFueroInterviniente'] = $this->mctConflictoHabitacional->txtFueroInterviniente_Create();
            $this->objControlsArray['txtFueroInterviniente']->Name="Fuero interviniente";
        if (in_array('txtJuzgadoInterviniente',$strControlsArray))
            $this->objControlsArray['txtJuzgadoInterviniente'] = $this->mctConflictoHabitacional->txtJuzgadoInterviniente_Create();
            $this->objControlsArray['txtJuzgadoInterviniente']->Name="Juzgado interviniente";
        if (in_array('txtCaratulaExpediente',$strControlsArray))
            $this->objControlsArray['txtCaratulaExpediente'] = $this->mctConflictoHabitacional->txtCaratulaExpediente_Create();
            $this->objControlsArray['txtCaratulaExpediente']->Name="Caratula del expediente judicial";
        
        if (in_array('chkMinisterioDesarrollo',$strControlsArray))
            $this->objControlsArray['chkMinisterioDesarrollo'] = $this->mctConflictoHabitacional->chkMinisterioDesarrollo_Create();            
        if (in_array('txtMinisterioDesarrolloReferente',$strControlsArray))
            $this->objControlsArray['txtMinisterioDesarrolloReferente'] = $this->mctConflictoHabitacional->txtMinisterioDesarrolloReferente_Create();
            $this->objControlsArray['txtMinisterioDesarrolloReferente']->SetCustomAttribute("placeholder", "Referente");
        if (in_array('chkDefensorPueblo',$strControlsArray))
            $this->objControlsArray['chkDefensorPueblo'] = $this->mctConflictoHabitacional->chkDefensorPueblo_Create();
            $this->objControlsArray['chkDefensorPueblo']->Name="Defensor del pueblo";
        if (in_array('txtDefensorPuebloReferente',$strControlsArray))
            $this->objControlsArray['txtDefensorPuebloReferente'] = $this->mctConflictoHabitacional->txtDefensorPuebloReferente_Create();
            $this->objControlsArray['txtDefensorPuebloReferente']->SetCustomAttribute("placeholder", "Referente");
        if (in_array('chkSecretariaNacional',$strControlsArray))
            $this->objControlsArray['chkSecretariaNacional'] = $this->mctConflictoHabitacional->chkSecretariaNacional_Create();
            $this->objControlsArray['chkSecretariaNacional']->Name="Secretaría Nacional de Acceso Justo al Habitat";
        if (in_array('txtSecretariaNacionalReferente',$strControlsArray))
            $this->objControlsArray['txtSecretariaNacionalReferente'] = $this->mctConflictoHabitacional->txtSecretariaNacionalReferente_Create();
            $this->objControlsArray['txtSecretariaNacionalReferente']->SetCustomAttribute("placeholder", "Referente");
        if (in_array('chkMunicipalidad',$strControlsArray))
            $this->objControlsArray['chkMunicipalidad'] = $this->mctConflictoHabitacional->chkMunicipalidad_Create();
            $this->objControlsArray['chkMunicipalidad']->Name="Municipalidad";
        if (in_array('txtMunicipalidadReferente',$strControlsArray))
            $this->objControlsArray['txtMunicipalidadReferente'] = $this->mctConflictoHabitacional->txtMunicipalidadReferente_Create();
            $this->objControlsArray['txtMunicipalidadReferente']->SetCustomAttribute("placeholder", "Referente");
        if (in_array('chkOrganizacionBarrial',$strControlsArray))
            $this->objControlsArray['chkOrganizacionBarrial'] = $this->mctConflictoHabitacional->chkOrganizacionBarrial_Create();
            $this->objControlsArray['chkOrganizacionBarrial']->Name="Organización barrial";
        if (in_array('txtOrganizacionBarrialReferente',$strControlsArray))
            $this->objControlsArray['txtOrganizacionBarrialReferente'] = $this->mctConflictoHabitacional->txtOrganizacionBarrialReferente_Create();
            $this->objControlsArray['txtOrganizacionBarrialReferente']->SetCustomAttribute("placeholder", "Referente");
        if (in_array('txtOtrosOrganismos',$strControlsArray))
            $this->objControlsArray['txtOtrosOrganismos'] = $this->mctConflictoHabitacional->txtOtrosOrganismos_Create();
            $this->objControlsArray['txtOtrosOrganismos']->Name="Otros organismos intervinientes";
        if (in_array('chkOrdenDesalojo',$strControlsArray))
            $this->objControlsArray['chkOrdenDesalojo'] = $this->mctConflictoHabitacional->chkOrdenDesalojo_Create();
            $this->objControlsArray['chkOrdenDesalojo']->Name="Orden de desalojo";
        if (in_array('txtFechaEjecucion',$strControlsArray))
            $this->objControlsArray['txtFechaEjecucion'] = $this->mctConflictoHabitacional->txtFechaEjecucion_Create();
            $this->objControlsArray['txtFechaEjecucion']->Name="Fecha de ejecución";
        if (in_array('chkSuspensionHecho',$strControlsArray))
            $this->objControlsArray['chkSuspensionHecho'] = $this->mctConflictoHabitacional->chkSuspensionHecho_Create();
            $this->objControlsArray['chkSuspensionHecho']->Name="Suspensión de hecho";
        if (in_array('chkSolicitudSuspension',$strControlsArray))
            $this->objControlsArray['chkSolicitudSuspension'] = $this->mctConflictoHabitacional->chkSolicitudSuspension_Create();
            $this->objControlsArray['chkSolicitudSuspension']->Name="Solicitud de suspensión";
        if (in_array('txtFechaSuspension',$strControlsArray))
            $this->objControlsArray['txtFechaSuspension'] = $this->mctConflictoHabitacional->txtFechaSuspension_Create();
            $this->objControlsArray['txtFechaSuspension']->Name="Fecha de suspensión";
        if (in_array('txtDuracionSuspension',$strControlsArray))
            $this->objControlsArray['txtDuracionSuspension'] = $this->mctConflictoHabitacional->txtDuracionSuspension_Create();
            $this->objControlsArray['txtDuracionSuspension']->Name="Duración de la suspensión";
        if (in_array('chkMesaGestion',$strControlsArray))
            $this->objControlsArray['chkMesaGestion'] = $this->mctConflictoHabitacional->chkMesaGestion_Create();
            $this->objControlsArray['chkMesaGestion']->Name="Mesa de Gestión";
        if (in_array('txtObservaciones',$strControlsArray))
            $this->objControlsArray['txtObservaciones'] = $this->mctConflictoHabitacional->txtObservaciones_Create();


        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


}
?>
