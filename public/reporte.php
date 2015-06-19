<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class Reporte extends FrontControllerBase {
public $strPartido;  
public $intTipo;

public function __construct($objParentObject, $strControlsArray = array(), $intId = null, $strControlId = null) {
    try{
        
        $this->intTipo=$_GET['tipo'];
        $this->strPartido=$_GET['partido'];
        
        $listado=Folio::QueryArray(QQ::Equal(QQN::Folio()->UsoInterno->EstadoFolio,6));
        
        
    }catch(Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
    }
}


public static function Run($strFormId = null, $strAlternateHtmlFile = null) {
        try {
            if(isset($_GET['tipo'])){
                switch ($_GET['tipo']) {
                    case 1:
                        self::ConfirmadosMunicipales($_GET['partido']);
                        break;
                    case 2:
                        self::MapeoMunicipales($_GET['partido']);
                        break;
                    case 3:
                        self::ConfirmadosProvincial();
                        break;    
                    case 4:
                        self::MapeoProvincial();
                        break;    
                    default:
                        # code...
                        break;
                }
                
            }     
        } catch (Exception $exception) {
            error_log($exception->getMessage());
            throw $exception;
        }
    }

         public static function ConfirmadosMunicipales($intIdPartido){
            $strQuery="select cod_folio as folio, nombre_barrio_oficial as nombre, tipo_barrio as tipo, cantidad_familias as viviendas, superficie as has from folio f
        join uso_interno u on f.id=u.id_folio 
        where f.id_partido = $intIdPartido and (u.estado_folio = 6 or u.estado_folio = 7) 
        order by f.nombre_barrio_oficial";

            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $result = $objDbResult->FetchAll();            
            
            
            DownloadExcel::DownloadArrayAsExcel($result,"confirmados_municipales_".date("Y-m-d"));   
            
         }

         public static function MapeoMunicipales($intIdPartido){
            $strQuery="select cod_folio as folio, nombre_barrio_oficial as nombre from folio f
        join uso_interno u on f.id=u.id_folio 
        where f.id_partido = $intIdPartido and (u.estado_folio < 4 OR u.estado_folio = 5 )   
        order by f.nombre_barrio_oficial
        ";

            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $result = $objDbResult->FetchAll();            
            
            
            DownloadExcel::DownloadArrayAsExcel($result,"mapeo_municipales_".date("Y-m-d"));   
            
         }   


        public static function ConfirmadosProvincial(){
            $strQuery="select p.nombre as partido, b.barrios, b.viviendas, b.has
            from partido p  join (select id_partido, count(cod_folio) as barrios, sum(cantidad_familias) as viviendas, sum(superficie) as has
            from folio a
            join uso_interno u on a.id=u.id_folio 
            where u.estado_folio = 6 or u.estado_folio = 7
            group by id_partido) b
            ON p.id = b.id_partido
            order by p.nombre";

                $objDatabase = QApplication::$Database[1];
                $objDbResult = $objDatabase->Query($strQuery);
                $result = $objDbResult->FetchAll();            
                
                
                DownloadExcel::DownloadArrayAsExcel($result,"confirmados_provincial_".date("Y-m-d"));   
                
         }

         public static function MapeoProvincial(){
            $strQuery="select p.nombre as partido, b.barrios
            from partido p  join (select id_partido, count(cod_folio) as barrios
            from folio a
            join uso_interno u on a.id=u.id_folio 
            where u.estado_folio < 4 OR u.estado_folio = 5
            group by id_partido) b
            ON p.id = b.id_partido
            order by p.nombre";

                $objDatabase = QApplication::$Database[1];
                $objDbResult = $objDatabase->Query($strQuery);
                $result = $objDbResult->FetchAll();            
                
                
                DownloadExcel::DownloadArrayAsExcel($result,"mapeo_provincial_".date("Y-m-d"));   
                
         }

}



Reporte::Run();
?>
