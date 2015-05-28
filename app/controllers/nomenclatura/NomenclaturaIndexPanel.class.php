<?php
/**
 * Este es un panel índice que hereda de NomenclaturaIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class NomenclaturaIndexPanel extends NomenclaturaIndexPanelGen {

    public $strTitulo = 'Nomenclatura';
    public $strSubtitulo = '';
    public $strTemplate='';
    public $btnAnalizar;
    public $btnMapa;
    public $btnRecalcular;

    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {
    	$this->strTemplate=__VIEW_DIR__."/nomenclatura/NomenclaturaFolioPanel.tpl.php";
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        if (!isset($this->lblTitulo)) { //En PivotePanel ya está creado...
            $this->lblTitulo = new QTitulo($this);
        }
        $this->lblTitulo->Titulo = isset($this->strTitulo) ? $this->strTitulo : Nomenclatura::Noun();
        //$this->lblTitulo->Subtitulo = isset($this->strSubtitulo) ? $this->strSubtitulo : '';
        
        $this->strColumnsArray = is_null($strColumnsArray) ? NomenclaturaDataGrid::$strColumnsArray : $strColumnsArray;
        $this->strControlsArray = is_null($strControlsArray) ? array_keys(NomenclaturaEditPanel::$strControlsArray, true) : $strControlsArray;

        //Creo el datagrid
        $this->dtgNomenclatura_Create();


        
        //Botón de creación
        $this->btnCreateNew_Create();
        $this->btnCreateNew->Text="Añadir Nomenclatura";

        $this->btnAnalizar = new QLinkButton($this);
        $this->btnAnalizar->Text = 'Analizar Nomenclaturas';               
        $this->btnAnalizar->AddAction(new QClickEvent(), new QAjaxControlAction($this,'analizar_nomenclatura'));

        /*
        $this->btnMapa = new QLinkButton($this);
        $this->btnMapa->Text = 'Mostrar Perímetro Barrio';               
        $this->btnMapa->AddAction(new QClickEvent(), new QAjaxControlAction($this,'mostrar_mapa'));
        */
        if(Permission::EsAdministrador()){
         $this->btnRecalcular = new QLinkButton($this);
         $this->btnRecalcular->Text = 'Actualizar Nomenclatura y Dominio';  
         $this->btnRecalcular->AddAction(new QClickEvent(), new QConfirmAction(sprintf('¿Está seguro que quiere recalcular las nomenclaturas y dominios de este folio?')));             
         $this->btnRecalcular->AddAction(new QClickEvent(), new QAjaxControlAction($this,'recalcular'));
            
        } 
        
        
        $this->blnAutoRenderChildren = false;
        
        if (isset($this->pnlEditNomenclatura)) {
            $this->Form->RemoveControl($this->pnlEditNomenclatura->ControlId);
        }

        
    }

    public function GetBreadCrumb() {
        return array(
                'Nomenclatura'
            );
    }

    public function analizar_nomenclatura(){
        $msj['completo']="nomenclaturas que están completamente dentro del barrio dibujado.";
        $msj['parcial']="nomenclaturas que no están completamente dentro del barrio dibujado";
        $msj['exterior']="nomenclaturas que están completamente fuera del dibujo del barrio";
        $msj['error']="nomenclaturas que generan error en el cálculo de su ubicación";
        $msj['vacio']="valores indeterminados";

        $class['completo']="alert-success";
        $class['parcial']="alert-info";
        $class['exterior']="alert-danger";
        $class['vacio']="alert-danger";
        $class['error']="alert-danger";

        $intIdFolio=QApplication::QueryString("id");
        $strQuery="select distinct(estado_geografico) as estado, count(*) as cantidad from nomenclatura where id_folio=$intIdFolio group by estado_geografico;";
        try {
                
                $objDatabase = QApplication::$Database[1];
                $objDbResult = $objDatabase->Query($strQuery);
                $text="";
                if($objDbResult->CountRows()==0)return false;                    
                while ($row = $objDbResult->FetchArray()) {                                                                
                    if($row['estado']=='')$row['estado']='vacio';
                    $clase=$class[$row['estado']];  
                    $text=$text."<div class=$clase><p class='text-center'>Hay <strong>".$row['cantidad']."</strong> ".$msj[$row['estado']]."</p></div>";
                }    
                
                QApplication::DisplayAlert($text);
                } catch (Exception $e) {
                    QApplication::DisplayAlert("<div class='alert-danger'>Hubo un error al intentar analizar las parcelas del barrio.<div>");
                }        
    }

    public function mostrar_mapa(){
        $intIdFolio=QApplication::QueryString("id");
        $strQuery = "select st_xmin(the_geom),st_ymin(the_geom),st_xmax(the_geom),st_ymax(the_geom) from v_folios where gid=$intIdFolio;";
        try {
            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $row = $objDbResult->FetchArray();
            $encuadre= array($row[0],$row[1],$row[2],$row[3]); //quick fix
            $bbox=implode(',',$encuadre);
            $mapa="http://190.188.234.6/geoserver/registro/wms?service=WMS&version=1.1.0&request=GetMap&layers=registro:folios,registro:parcelas_nomenclas&styles=&bbox=$bbox&width=512&height=465&srs=EPSG:4326&format=application/openlayers";
            
            QApplication::DisplayAlert("<iframe src='$mapa' width='100%' height='400'></iframe>");
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Hubo un error al calcular el encuadre geográfico del mapa.</p> Revisar geometría en 'Datos Generales'");
        }
    }
    
    protected function buscarTitularDominio($nomencla,$partido){
        if(isset($partido) && isset($nomencla)){
            $objDatabase = QApplication::$Database[1];
            $strQuery="select titular_dominio from parcelas where partido='$partido' and nomencla='$nomencla'";
            $objDbResult = $objDatabase->Query($strQuery);
            $row = $objDbResult->FetchArray();
            return $row['titular_dominio'];
        }else{
            //error_log("error: ".$nomencla."-".$partido);
            return '';
        }
        
    }

    protected function actualizarDominio(){
        Permission::Log("Actualizando los dominios");
        //actualiza titular de dominio de las nomenclaturas
        $arrTitularesNulos=Nomenclatura::QueryArray(
            QQ::AndCondition(
             QQ::OrCondition(
                QQ::Equal(QQN::Nomenclatura()->TitularDominio,NULL),
                QQ::Equal(QQN::Nomenclatura()->TitularDominio,'')
             ),            
             QQ::Equal(QQN::Nomenclatura()->IdFolio,QApplication::QueryString("id"))
            )
        );
        
        foreach ($arrTitularesNulos as $reg) {   
            $nomencla=$reg->Partido.$reg->Circ.$reg->Secc.$reg->ChacQuinta.$reg->Frac.$reg->Mza.$reg->Parc;
            if(!is_null($nomencla) && strlen($nomencla)==42){
              $nuevoTitular=$this->buscarTitularDominio($nomencla,$reg->Partido);	
              $reg->TitularDominio=($nuevoTitular=='')?$reg->TitularDominio:$nuevoTitular;
              $reg->Save();    
            }
            
        }
        
     }

    
    
    public function recalcular(){
        // Funcion para actualizar nomenclaturas y dominios
        Permission::Log("Actualizando dominio y nomenclaturas de FOLIO ".QApplication::QueryString("id"));
        Folio::load(QApplication::QueryString("id"))->calcular_nomenclaturas();
        $this->actualizarDominio();        
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/nomenclatura/folio/".QApplication::QueryString("id"));
    }

}
?>
