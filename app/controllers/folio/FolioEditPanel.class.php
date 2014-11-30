<?php
class FolioEditPanel extends FolioEditPanelGen {

    public $strTitulo = 'Datos Generales';
    public $strSubtitulo = '';
    public $strTemplate = "";
    public $mctFolio;
    //id variables for meta_create
    protected $intId;
    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'txtCodFolio' => true,
        'lstIdPartidoObject' => true,
        'lstIdLocalidadObject' => true,
        'txtObservacionLocalidad' => true,
        'txtMatricula' => true,
        'calFecha' => false,
        'txtEncargado' => true,
        'txtNombreBarrioOficial' => true,
        'txtNombreBarrioAlternativo1' => true,
        'txtNombreBarrioAlternativo2' => true,
        'txtAnioOrigen' => true,
        'txtSuperficie' => true,
        'txtCantidadFamilias' => true,
        'lstTipoBarrioObject' => true,
        'txtObservacionCasoDudoso' => true,
        'txtJudicializado' => true,
        'txtDireccion' => true,
        'txtGeom'=>true,
        'lstCondicionesSocioUrbanisticasAsId' => false,
        'lstRegularizacionAsId' => false,
        'lstUsoInterno' => false,
        'lstNomenclaturaAsId' => false,
    );

    
    public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {

        $strControlsArray = empty($strControlsArray) ? array_keys(FolioEditPanel::$strControlsArray, true) : $strControlsArray;
        $this->strTemplate=__VIEW_DIR__."/folio/FolioEditPanel.tpl.php";

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        $this->intId = $intId;
        
        
        $this->metaControl_Create($strControlsArray);
        $this->buttons_Create();
        $this->objControlsArray['txtCodFolio']->Visible = null;

        $existeFolio=$this->mctFolio->Folio->CodFolio;
        
        if(!$existeFolio){
            $partido_usuario=Session::GetObjUsuario()->CodPartido;
            $objPartido=Partido::QuerySingle(QQ::Equal(QQN::Partido()->CodPartido,$partido_usuario));
            if($objPartido){
                //seteo partido
                $this->lstIdPartidoObject->Value = $objPartido->Id;
                $this->lstIdPartidoObject->Text = $objPartido->__toString();
                $this->lstIdPartidoObject->Enabled = false;            
                
                //calculo Matricula
                $arrFoliosPartido=Folio::QueryArray(QQ::Equal(QQN::Folio()->IdPartidoObject->CodPartido,$partido_usuario));
                $arrMatriculas = array();
                foreach ($arrFoliosPartido as $folio) {
                    array_push($arrMatriculas,intval($folio->Matricula));
                }
                $ultimo=max($arrMatriculas);
                $nueva_matricula=str_pad($ultimo+1, 4, '0', STR_PAD_LEFT);
                // seteo matricula
                $this->txtMatricula->Text=$nueva_matricula;
                
            }
            QApplication::ExecuteJavascript("mostrarMapa('$partido_usuario')");
        }else{
            $this->lstIdPartidoObject->Enabled = false; 
            $this->txtMatricula->Enabled = false; 
            $this->objControlsArray['txtCodFolio']->ActionParameter=$this->mctFolio->Folio->Id;
            
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
        if (in_array('lstIdLocalidadObject',$strControlsArray)) 
            $this->objControlsArray['lstIdLocalidadObject'] = $this->mctFolio->lstIdLocalidadObject_Create();
        if (in_array('txtObservacionLocalidad',$strControlsArray)) 
            $this->objControlsArray['txtObservacionLocalidad'] = $this->mctFolio->txtObservacionLocalidad_Create();
            $this->objControlsArray['txtObservacionLocalidad']->Name="Observación sobre localidad";
        if (in_array('txtMatricula',$strControlsArray)) 
            $this->objControlsArray['txtMatricula'] = $this->mctFolio->txtMatricula_Create();
        if (in_array('calFecha',$strControlsArray)) 
            $this->objControlsArray['calFecha'] = $this->mctFolio->calFecha_Create();
        if (in_array('txtEncargado',$strControlsArray)) 
            $this->objControlsArray['txtEncargado'] = $this->mctFolio->txtEncargado_Create();
        if (in_array('txtNombreBarrioOficial',$strControlsArray)) 
            $this->objControlsArray['txtNombreBarrioOficial'] = $this->mctFolio->txtNombreBarrioOficial_Create();    
            $this->objControlsArray['txtNombreBarrioOficial']->Name="Nombre oficial";        
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
            $this->objControlsArray['txtSuperficie']->Name="Superficie (ha)";
        if (in_array('txtCantidadFamilias',$strControlsArray)) 
            $this->objControlsArray['txtCantidadFamilias'] = $this->mctFolio->txtCantidadFamilias_Create();
            $this->objControlsArray['txtCantidadFamilias']->Name="Cantidad de familias";
        if (in_array('lstTipoBarrioObject',$strControlsArray)) 
            $this->objControlsArray['lstTipoBarrioObject'] = $this->mctFolio->lstTipoBarrioObject_Create();
            $this->objControlsArray['lstTipoBarrioObject']->Name="Tipo de barrio";
        if (in_array('txtObservacionCasoDudoso',$strControlsArray)) 
            $this->objControlsArray['txtObservacionCasoDudoso'] = $this->mctFolio->txtObservacionCasoDudoso_Create();
            $this->objControlsArray['txtObservacionCasoDudoso']->Name="Observación de caso dudoso";
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
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/". $this->mctFolio->Folio->Id) ; 
    }

    protected function buttons_Create($blnDelete = true) {
        parent::buttons_Create($blnDelete);
        if ($blnDelete) {
            $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere BORRAR est%s %s?', (Folio::GenderMale() ? 'e' : 'a'), Folio::Noun())));
            $this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
            $this->btnDelete->Visible = $this->mctFolio->EditMode;
        }
    }


}
?>