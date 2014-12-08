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

        $this->btnAnalizar = new QLinkButton($this);
        $this->btnAnalizar->Text = 'Analizar Nomenclaturas';               
        $this->btnAnalizar->AddAction(new QClickEvent(), new QAjaxControlAction($this,'analizar_nomenclatura'));

        $this->btnMapa = new QLinkButton($this);
        $this->btnMapa->Text = 'Mostrar Mapa';               
        $this->btnMapa->AddAction(new QClickEvent(), new QAjaxControlAction($this,'mostrar_mapa'));


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
        QApplication::DisplayAlert("<p>analizando las nomanclaturas ...</p><p>Aca tendria que informar si hay parcelas que no estan dentro del dibujo o si faltan parcelas</p>");
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
            error_log($mapa);
            QApplication::DisplayAlert("<iframe src='$mapa' width='100%' height='400'></iframe>");
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Hubo un error al calcular el encuadre geográfico del mapa.</p> Revisar geometría en 'Datos Generales'");
        }
    }

}
?>