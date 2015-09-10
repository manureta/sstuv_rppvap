<?php
class FolioEditPanel extends FolioEditPanelGen {

    public $strTitulo = 'Datos Generales';
    public $strSubtitulo = '';
    public $strTemplate = "";
    public $mctFolio;
    public $lstJudicializado;
    public $folioExistente;
    //id variables for meta_create
    protected $intId;
    public $boolPuedeAdjuntar;

    public $objPartido;
    public $txtCodFolioOriginal;

    //para anio de origen
    public $lstAnioOrigen;

    //para ver si cambio geom
    public $geom_original;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtCodFolio' => true,
        'lstIdPartidoObject' => true,
        'txtMatricula' => true,
        'calFecha' => true,
        'txtNombreBarrioOficial' => true,
        'txtNombreBarrioAlternativo1' => true,
        'txtNombreBarrioAlternativo2' => true,
        'txtAnioOrigen' => true,
        'txtSuperficie' => true,
        'txtCantidadFamilias' => true,
        'lstTipoBarrioObject' => true,
        'txtObservacionCasoDudoso' => true,
        'txtDireccion' => true,
        'txtGeom' => true,
        'txtJudicializado' => true,
        'txtLocalidad' => true,
        'lstCondicionesSocioUrbanisticasAsId' => false,
        'lstRegularizacionAsId' => false,
        'lstUsoInterno' => false,
        'lstNomenclaturaAsId' => false,
        'lstCreadorObject' => true,
        'txtEncargado' => true,
        'txtReparticion' => true,
        'txtFolioOriginal' => true,
    );


    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(FolioEditPanel::$strControlsArray, true) : $strControlsArray;
        $this->strTemplate=__VIEW_DIR__."/folio/FolioEditPanel.tpl.php";


        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray, $intId, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->intId = $intId;
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);


        $this->objControlsArray['txtCodFolio']->Visible = null;
        // SI SE ELIJE PARTIDO QUE SE PONGA LA MATRICULA AUTOMATICAMENTE
        $this->lstIdPartidoObject->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstPartido_Change'));

        // Anio origen
        $this->lstAnioOrigen=new QListBox($this);
        $this->lstAnioOrigen->Name="Año de origen";
        $this->lstAnioOrigen->Required=true;
        $this->CrearListadoDeAnios($this->txtAnioOrigen->Text);
        //escondo el txt de anio de origen
        $this->txtAnioOrigen->Visible=false;

        $this->folioExistente=($this->mctFolio->Folio->CodFolio)? true: false;
        $partido_usuario="";

        // SI ES UN FOLIO NUEVO

        if(!$this->folioExistente){
            $partido_usuario=Session::GetObjUsuario()->CodPartido;
            $objPartido=Partido::QuerySingle(QQ::Equal(QQN::Partido()->CodPartido,$partido_usuario));
            $this->lstCreadorObject->Value=Session::GetObjUsuario()->IdUsuario;

            if($objPartido){
                //seteo partido
                $this->lstIdPartidoObject->Value = $objPartido->Id;
                $this->lstIdPartidoObject->Text = $objPartido->__toString();
                $this->lstIdPartidoObject->Enabled = false;

                $this->setearValorMatricula($partido_usuario);

            }else{
                //Cargo todos los partidos

            }
            // Judicializado
            $this->lstJudicializado=new QListBox($this);
            $this->lstJudicializado->AddItem(' Sin Dato ', 'sin_dato');
            $this->lstJudicializado->AddItem(' Si ', 'si');
            $this->lstJudicializado->AddItem(' No ', 'no');
            $this->lstJudicializado->Name="Judicializado";
            // inicializo en sin dato
            $this->txtJudicializado->Text='sin_dato';

            //Fecha
            $this->calFecha->DateTime=QDateTime::Now();
            // encargado y reparticion
            $this->txtEncargado->Text=Usuario::load($this->lstCreadorObject->Value)->NombreCompleto;
            $this->txtReparticion->Text=Usuario::load($this->lstCreadorObject->Value)->Reparticion;
            // Mapa
            QApplication::ExecuteJavascript("mostrarMapa('$partido_usuario',false)");
        }else{
            $this->geom_original=$this->txtGeom->Text;
            $partido_usuario=$this->mctFolio->Folio->IdPartidoObject->CodPartido;

            $this->lstIdPartidoObject->Enabled = false;
            $this->txtMatricula->Enabled = false;
            $this->objControlsArray['txtCodFolio']->ActionParameter=$this->mctFolio->Folio->Id;

            //Judicializado
            $this->lstJudicializado=new QListBox($this);
            $this->lstJudicializado->Name="Judicializado";

            switch ($this->txtJudicializado->Text) {
                case 'sin_dato':
                    $this->lstJudicializado->AddItem(' Sin Dato ', 'sin_dato');
                    $this->lstJudicializado->AddItem(' Si ', 'si');
                    $this->lstJudicializado->AddItem(' No ', 'no');
                    break;
                case 'si':
                    $this->lstJudicializado->AddItem(' Si ', 'si');
                    $this->lstJudicializado->AddItem(' No ', 'no');
                    $this->lstJudicializado->AddItem(' Sin Dato ', 'sin_dato');
                    break;
                case 'no':
                    $this->lstJudicializado->AddItem(' No ', 'no');
                    $this->lstJudicializado->AddItem(' Sin Dato ', 'sin_dato');
                    $this->lstJudicializado->AddItem(' Si ', 'si');
                    break;
            }
            if(Permission::EsDuplicado($this->mctFolio->Folio->Id)){
                $this->txtMatricula->Visible = false;
                error_log("mostrando ".$this->txtFolioOriginal->Text);
                $this->txtCodFolioOriginal=Folio::load((int)$this->txtFolioOriginal->Text)->CodFolio;
            }

        }
        $this->txtFolioOriginal->Enabled=false;
        $this->txtFolioOriginal->Visible=false;

        $this->objControlsArray["Judicializado"] = $this->lstJudicializado;
        $this->objControlsArray['AnioOrigen']=$this->lstAnioOrigen;

        $btnUpdateGeom = new QButton($this);
        $btnUpdateGeom->Icon = 'edit';
        $btnUpdateGeom->AddCssClass('btn-info');


        $this->lstJudicializado->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstJudicializado_Change'));
        // escondo el judicializado original
        $this->txtJudicializado->Visible=false;

        // Escondo el creador del folio
        $this->lstCreadorObject->Enabled=false;
        $this->lstCreadorObject->Visible=false;


        //Escondo fecha
        $this->calFecha->Enabled=false;
        //Escondo geometria
        $this->txtGeom->Enabled=false;

        //Evento de cambio de anio de origen
        $this->lstAnioOrigen->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstAnioOrigen_Change'));

        //seteo upload manager
        $url_upload_manager=__VIRTUAL_DIRECTORY__."/upload.php?idfolio=".$this->mctFolio->Folio->Id."&tipo=general";
        if(($this->mctFolio->Folio->Id) && Permission::PuedeAdjuntarHoja1($this->mctFolio->Folio)) {
            $this->boolPuedeAdjuntar=true;
            QApplication::ExecuteJavascript("uploadManager('$url_upload_manager','#fileupload','#files')");
        }else{
            if(Permission::PuedeVerAdjuntados($this->mctFolio->Folio)){
                QApplication::ExecuteJavascript("verAdjuntados('$url_upload_manager','#files')");
            }
        }

        // agrego clase para cuando se edita la geometria
        $this->btnSave->AddCssClass("boton_guardar");


        if(!Permission::PuedeEditar1A4($this->mctFolio->Folio) ){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
            $btnUpdateGeom->Text = 'Ver Geometría';
            $btnUpdateGeom->AddAction(new QClickEvent(),  new QJavascriptAction("mostrarMapa('$partido_usuario','solover');"));
        }else{
            $btnUpdateGeom->Text = 'Actualizar Geometría';
            $btnUpdateGeom->AddAction(new QClickEvent(),  new QJavascriptAction("mostrarMapa('$partido_usuario',true);"));
        }

    }



    protected function metaControl_Create($strControlsArray){
        // Construct the FolioMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctFolio = FolioMetaControl::Create($this, $this->intId);
        // Call MetaControl's methods to create qcontrols based on Folio's data fields
        if (in_array('lblId',$strControlsArray))
            $this->objControlsArray['lblId'] = $this->mctFolio->lblId_Create();
        if (in_array('txtCodFolio',$strControlsArray))
            $this->objControlsArray['txtCodFolio'] = $this->mctFolio->txtCodFolio_Create();
        if (in_array('lstIdPartidoObject',$strControlsArray))
            $this->objControlsArray['lstIdPartidoObject'] = $this->mctFolio->lstIdPartidoObject_Create();
            $this->objControlsArray['lstIdPartidoObject']->AddCssClass("partido");
        if (in_array('txtLocalidad',$strControlsArray))
            $this->objControlsArray['txtLocalidad'] = $this->mctFolio->txtLocalidad_Create();
        if (in_array('txtMatricula',$strControlsArray))
            $this->objControlsArray['txtMatricula'] = $this->mctFolio->txtMatricula_Create();
        if (in_array('calFecha',$strControlsArray))
            $this->objControlsArray['calFecha'] = $this->mctFolio->calFecha_Create();
            $this->objControlsArray['calFecha']->Name="Fecha de carga <span class='add-on'><i class='icon-calendar'></i></span>";
        if (in_array('txtNombreBarrioOficial',$strControlsArray))
            $this->objControlsArray['txtNombreBarrioOficial'] = $this->mctFolio->txtNombreBarrioOficial_Create();
            $this->objControlsArray['txtNombreBarrioOficial']->Name="Nombre oficial del barrio";
        if (in_array('txtNombreBarrioAlternativo1',$strControlsArray))
            $this->objControlsArray['txtNombreBarrioAlternativo1'] = $this->mctFolio->txtNombreBarrioAlternativo1_Create();
            $this->objControlsArray['txtNombreBarrioAlternativo1']->Name="Nombre alternativo 1";
        if (in_array('txtNombreBarrioAlternativo2',$strControlsArray))
            $this->objControlsArray['txtNombreBarrioAlternativo2'] = $this->mctFolio->txtNombreBarrioAlternativo2_Create();
            $this->objControlsArray['txtNombreBarrioAlternativo2']->Name="Nombre alternativo 2";
        if (in_array('txtAnioOrigen',$strControlsArray))
            $this->objControlsArray['txtAnioOrigen'] = $this->mctFolio->txtAnioOrigen_Create();
            $this->objControlsArray['txtAnioOrigen']->Name="Año de origen";
        if (in_array('txtSuperficie',$strControlsArray))
            $this->objControlsArray['txtSuperficie'] = $this->mctFolio->txtSuperficie_Create();
            $this->objControlsArray['txtSuperficie']->Name="Superficie (hectáreas)";
            $this->objControlsArray['txtSuperficie']->AddCssClass("superficie_barrio");
        if (in_array('txtCantidadFamilias',$strControlsArray))
            $this->objControlsArray['txtCantidadFamilias'] = $this->mctFolio->txtCantidadFamilias_Create();
            $this->objControlsArray['txtCantidadFamilias']->Name="Cantidad de familias";
            $this->objControlsArray['txtCantidadFamilias']->Required=true;
        if (in_array('lstTipoBarrioObject',$strControlsArray))
            $this->objControlsArray['lstTipoBarrioObject'] = $this->mctFolio->lstTipoBarrioObject_Create();
            $this->objControlsArray['lstTipoBarrioObject']->Name="Tipo de barrio";
        if (in_array('txtObservacionCasoDudoso',$strControlsArray))
            $this->objControlsArray['txtObservacionCasoDudoso'] = $this->mctFolio->txtObservacionCasoDudoso_Create();
            $this->objControlsArray['txtObservacionCasoDudoso']->Name="Observación de otro caso";
        if (in_array('lstCreadorObject',$strControlsArray))
            $this->objControlsArray['lstCreadorObject'] = $this->mctFolio->lstCreadorObject_Create();
        if (in_array('txtJudicializado',$strControlsArray))
            $this->objControlsArray['txtJudicializado'] = $this->mctFolio->txtJudicializado_Create();
        if (in_array('txtDireccion',$strControlsArray))
            $this->objControlsArray['txtDireccion'] = $this->mctFolio->txtDireccion_Create();
            $this->objControlsArray['txtDireccion']->Name="Dirección";
            $this->objControlsArray['txtDireccion']->Required=true;
        if (in_array('txtGeom',$strControlsArray))
            $this->objControlsArray['txtGeom'] = $this->mctFolio->txtGeom_Create();
            $this->objControlsArray['txtGeom']->Name="";
            $this->objControlsArray['txtGeom']->AddCssClass("geometria_barrio");

        if (in_array('lstCondicionesSocioUrbanisticasAsId',$strControlsArray))
            $this->objControlsArray['lstCondicionesSocioUrbanisticasAsId'] = $this->mctFolio->lstCondicionesSocioUrbanisticasAsId_Create();
        if (in_array('lstRegularizacionAsId',$strControlsArray))
            $this->objControlsArray['lstRegularizacionAsId'] = $this->mctFolio->lstRegularizacionAsId_Create();
        if (in_array('lstUsoInterno',$strControlsArray))
            $this->objControlsArray['lstUsoInterno'] = $this->mctFolio->lstUsoInterno_Create();
        if (in_array('lstNomenclaturaAsId',$strControlsArray))
            $this->objControlsArray['lstNomenclaturaAsId'] = $this->mctFolio->lstNomenclaturaAsId_Create();

        if (in_array('txtEncargado',$strControlsArray))
            $this->objControlsArray['txtEncargado'] = $this->mctFolio->txtEncargado_Create();
        if (in_array('txtReparticion',$strControlsArray))
            $this->objControlsArray['txtReparticion'] = $this->mctFolio->txtReparticion_Create();
            $this->objControlsArray['txtReparticion']->Name="Repartición";
        if (in_array('txtFolioOriginal',$strControlsArray))
            $this->objControlsArray['txtFolioOriginal'] = $this->mctFolio->txtFolioOriginal_Create();
        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }


    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        if($this->txtSuperficie->Text=='')$this->txtSuperficie->Text=0;
        if($this->GeometriaValida()){
            Permission::Log("Guardando FOLIO ".$this->mctFolio->Folio->Id);
            parent::btnSave_Click($strFormId, $strControlId, $strParameter);
            // Delegate "Save" processing to the FolioMetaControl
            $this->mctFolio->Save();
            foreach ($this->objModifiedChildsArray as $obj) {
                $obj->Save();
            }
            $this->objModifiedChildsArray = array();
            QApplication::DisplayNotification('Los datos se guardaron correctamente');

            if(!$this->folioExistente){
                // Creo UsoInterno y pongo el folio en CARGA
                $ui = new UsoInterno();
                $ui->IdFolio = $this->mctFolio->Folio->Id;
                // Hay perfiles de uso interno que pueden crear folios pero no deben estar publicos
                if(!Permission::EsAdministrador() && Permission::EsUsoInterno(array('uso_interno_legal','uso_interno_tecnico','uso_interno_social'))){
                	$ui->EstadoFolio=EstadoFolio::NECESITA_AUTORIZACION;
                }else{
                	$ui->EstadoFolio=EstadoFolio::CARGA;
                }

                $ui->MapeoPreliminar=true;
                $ui->save();
                //Calculo las nomenclaturas
                $this->mctFolio->Folio->calcular_nomenclaturas();
                QApplication::DisplayNotification("<p>Se calcularon automáticamente las Nomenclaturas y las puede ver en la pestaña 'Nomenclatura Catastral y Dominio'</p><p>Ya puede adjuntar archivos en la pestaña de 'Datos Generales del Barrio'</p>");
            }else{

                //$this->actualizarEstadoNomenclaturas();
                if($this->geom_original!==$this->txtGeom->Text) {
                    $this->mctFolio->Folio->calcular_nomenclaturas();
                }
            }
            QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/view/". $this->mctFolio->Folio->Id);
        }else{
            // LA GEOM NO ES VALIDA
            QApplication::DisplayAlert("</p>La geometría del barrio no es válida o es inexistente.</p><p>Para crear o editar geometría seleccione el botón de <b>'Actualizar Geometría'</b></p>");
        }

    }

    protected function buttons_Create($blnDelete = false) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Folio::GenderMale() ? 'e' : 'a'), Folio::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctFolio->EditMode;
        }
    }
    public function btnCancel_Click() {
     QApplication::ExecuteJavascript("javascript:history.back()");
     //QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/");
    }

     // Handle the changing of the listbox
    public function lstJudicializado_Change($strFormId, $strControlId, $strParameter) {
        $this->txtJudicializado->Text=$this->lstJudicializado->SelectedValue;

    }

    public function lstAnioOrigen_Change($strFormId, $strControlId, $strParameter) {
        $this->txtAnioOrigen->Text=$this->lstAnioOrigen->SelectedValue;

    }


    protected function CrearListadoDeAnios($strValor){
        $this->lstAnioOrigen->AddItem('Seleccione año o década',null);
        for ($i=1901; $i < 2020 ; $i++) {
            if(in_array($i, array(1910,1920,1930,1940,1950,1960,1970,1980,1990,2000,2010))){
                $texto="Década de ".strval($i);
                $valor="decada_".strval($i);
                $seleccionado=($strValor==$valor)?true:false;
                $this->lstAnioOrigen->AddItem($texto,$valor,$seleccionado);
            }
            $texto=strval($i);
            $valor=strval($i);
            $seleccionado=($strValor==$valor)?true:false;
            $this->lstAnioOrigen->AddItem($texto,$valor,$seleccionado);
        }
        $this->lstAnioOrigen->AddItem("Década del 90 o anterior ","90_o_anterior",($strValor=="90_o_anterior"));
    }





/*
     protected function borrar_nomenclaturas(){
         $objDatabase = QApplication::$Database[1];
         $id_folio=$this->mctFolio->Folio->Id;
         try {
             $strQuery="delete from nomenclatura where id_folio=$id_folio ;";
             $objDatabase->NonQuery($strQuery);
         } catch (Exception $e) {
            QApplication::DisplayAlert("<p>No se pudieron borrar las nomenclaturas viejas.</p><p>Este error indica que puede haber errores en la solapa de nomenclaturas.</p>");
            error_log($e);
         }

     }
*/
     protected function setearValorMatricula($strCodPartido){
        if($strCodPartido){
            //calculo Matricula
            $arrFoliosPartido=Folio::QueryArray(QQ::Equal(QQN::Folio()->IdPartidoObject->CodPartido,$strCodPartido));
            $arrMatriculas = array();
            foreach ($arrFoliosPartido as $folio) {
                array_push($arrMatriculas,intval($folio->Matricula));
            }
            $ultimo=max($arrMatriculas);
            error_log($ultimo);
            $nueva_matricula=str_pad($ultimo+1, 4, '0', STR_PAD_LEFT);
            // seteo matricula
            $this->txtMatricula->Text=$nueva_matricula;
        }


     }

       // Handle the changing of the listbox
    public function lstPartido_Change($strFormId, $strControlId, $strParameter) {
        $idPartido=$this->lstIdPartidoObject->Value;
        $this->objPartido=Partido::Load($idPartido);
        $strCodPartido=$this->objPartido->CodPartido;
        $this->setearValorMatricula($strCodPartido);

    }

    protected function GeometriaValida(){
        return ($this->txtGeom->Text!=='' && $this->txtGeom->Text!=='GEOMETRYCOLLECTION EMPTY' && $this->txtGeom->Text!=='MULTIPOLYGON EMPTY');
        // tambien habria que chequear que el geom este en el partido seleccionado
    }


}
?>
