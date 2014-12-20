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
        'lstArchivosAdjuntosAsId' => false,
        'lstNomenclaturaAsId' => false,
        'lstCreadorObject' => true,
    );
    public $objPartido;

    
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
            // Mapa
            QApplication::ExecuteJavascript("mostrarMapa('$partido_usuario',false)");
        }else{
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
        }
        $this->objControlsArray["Judicializado"] = $this->lstJudicializado;

        $btnUpdateGeom = new QButton($this);
        $btnUpdateGeom->Text = 'Actualizar Geometría';
        $btnUpdateGeom->Icon = 'edit';
        $btnUpdateGeom->AddCssClass('btn-info');
        $btnUpdateGeom->AddAction(new QClickEvent(),  new QJavascriptAction("mostrarMapa('$partido_usuario',true);"));


        $this->lstJudicializado->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'lstJudicializado_Change'));
        // escondo el judicializado original
        $this->txtJudicializado->Visible=false;

        // Escondo el creador del folio
        $this->lstCreadorObject->Enabled=false;
        $this->lstCreadorObject->Visible=false;

        if(!Permission::PuedeEditar1A4($this->mctFolio->Folio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
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
        if (in_array('txtCantidadFamilias',$strControlsArray)) 
            $this->objControlsArray['txtCantidadFamilias'] = $this->mctFolio->txtCantidadFamilias_Create();
            $this->objControlsArray['txtCantidadFamilias']->Name="Cantidad de familias";
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
        

        if (in_array('txtGeom',$strControlsArray)) 
            $this->objControlsArray['txtGeom'] = $this->mctFolio->txtGeom_Create();
            $this->objControlsArray['txtGeom']->Name="Geometría";  
            $this->objControlsArray['txtGeom']->AddCssClass("geometria_barrio");    
            
        if (in_array('lstCondicionesSocioUrbanisticasAsId',$strControlsArray)) 
            $this->objControlsArray['lstCondicionesSocioUrbanisticasAsId'] = $this->mctFolio->lstCondicionesSocioUrbanisticasAsId_Create();
        if (in_array('lstRegularizacionAsId',$strControlsArray)) 
            $this->objControlsArray['lstRegularizacionAsId'] = $this->mctFolio->lstRegularizacionAsId_Create();
        if (in_array('lstUsoInterno',$strControlsArray)) 
            $this->objControlsArray['lstUsoInterno'] = $this->mctFolio->lstUsoInterno_Create();
        if (in_array('lstNomenclaturaAsId',$strControlsArray))
            $this->objControlsArray['lstNomenclaturaAsId'] = $this->mctFolio->lstNomenclaturaAsId_Create();
        //$this->pnlTabs->ActiveTab->AddControls($this->objControlsArray);
    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the FolioMetaControl                
        $this->mctFolio->Save();
        foreach ($this->objModifiedChildsArray as $obj) {
            $obj->Save();
        }
        $this->objModifiedChildsArray = array();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
        //
        
        if(!$this->folioExistente){        	    	
        	$this->calcular_nomenclaturas();
        	QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/". $this->mctFolio->Folio->Id); 
        }else{
            $this->actualizarEstadoNomenclaturas();
        	QApplication::Redirect(__VIRTUAL_DIRECTORY__."/folio/view/". $this->mctFolio->Folio->Id); 
        }
        
         
    }

    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Folio::GenderMale() ? 'e' : 'a'), Folio::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctFolio->EditMode;
        }
    }

     // Handle the changing of the listbox
    public function lstJudicializado_Change($strFormId, $strControlId, $strParameter) {       
        $this->txtJudicializado->Text=$this->lstJudicializado->SelectedValue;

    }

    public function calcular_nomenclaturas(){
        
        try {
            $cod=intval($this->mctFolio->Folio->IdPartidoObject->CodPartido);
            $gid=$this->mctFolio->Folio->Id;
            $strQuery = "select gid,nomencla from parcelas where partido=$cod AND st_intersects(geom,(select the_geom from v_folios where gid=$gid))";
            
            $objDatabase = QApplication::$Database[1];

            // Perform the Query
            $objDbResult = $objDatabase->Query($strQuery);
            
            while ($row = $objDbResult->FetchArray()) {
               
                $nomencla=$row['nomencla'];
                $nom = new Nomenclatura();
                $nom->IdFolio = $this->mctFolio->Folio->Id;
                $nom->PartidaInmobiliaria = '';
                $nom->TitularDominio = '';
                $nom->Partido = substr($nomencla,0,3);
                $nom->Circ = substr($nomencla,3,2);//2
                $nom->Secc = substr($nomencla,5,2);//2
                $nom->ChacQuinta = substr($nomencla,7,14);//14
                $nom->Frac = substr($nomencla,21,7);//7
                $nom->Mza = substr($nomencla,28,7);//7;
                $nom->Parc = substr($nomencla,35,7);//7;
                $nom->InscripcionDominio = '';
                $nom->TitularRegPropiedad = '';
                $nom->EstadoGeografico='';
                $nom->DatoVerificadoRegPropiedad = false;
                $nom->Save();
                
            }                     
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Error al calcular las nomenclaturas del barrio</p>");
            // mandar mail
            error_log($e);
        }
        $this->actualizarEstadoNomenclaturas();
    	    	               
	    
	 }

     protected function actualizarEstadoNomenclaturas(){
         error_log("entro a actualizarEstadoNomenclaturas");
         $objDatabase = QApplication::$Database[1];
         $id_folio=$this->mctFolio->Folio->Id; 
         try {             
             $strQuery="select actualizar_estado_nomenclaturas($id_folio)";
             $objDatabase->NonQuery($strQuery);
         } catch (Exception $e) {
            QApplication::DisplayAlert("<p>No se pudo actualizar la columna de los estados geograficos de las nomenclaturas del Folio.</p><p>Este error generalmente indica que no existe la funcion actualizar_estado_nomenclaturas en la base de datos.</p>"); 
            error_log($e);
         }
         
     }

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

}
?>
