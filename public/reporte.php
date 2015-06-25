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
            $strQuery='select cod_folio as "Folio", nombre_barrio_oficial as "Nombre de barrio", t.tipo as "Tipo de barrio", cantidad_familias as "Cantidad de viviendas", superficie as "Superficie en hectáreas" from folio f
        join tipo_barrio t on f.tipo_barrio=t.id join uso_interno u on f.id=u.id_folio 
        where f.id_partido = '.$intIdPartido.' and (u.estado_folio = 6 or u.estado_folio = 7) 
        order by f.nombre_barrio_oficial';

            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $result = $objDbResult->FetchAll();           

            $strQuery="select * from partido where id=$intIdPartido";
            $objDbResult = $objDatabase->Query($strQuery);
            $partido = $objDbResult->FetchAll();           
            $cod=$partido[0]['cod_partido'];
            $nombre_partido=$partido[0]['nombre'];

            $header="Barrios confirmados o inscriptos en $nombre_partido";
            DownloadExcel::DownloadArrayAsExcel($result,"confirmados_municipales_".$cod."_".date("Y-m-d"),$header);   
            
         }

         public static function MapeoMunicipales($intIdPartido){
            $strQuery='select cod_folio as "Folio", nombre_barrio_oficial as "Nombre del barrio" from folio f
        join uso_interno u on f.id=u.id_folio 
        where f.id_partido = '.$intIdPartido.' and (u.estado_folio < 4 OR u.estado_folio = 5 )   order by f.nombre_barrio_oficial';
            
            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $result = $objDbResult->FetchAll();            
            
            $strQuery="select * from partido where id=$intIdPartido";
            $objDbResult = $objDatabase->Query($strQuery);
            $partido = $objDbResult->FetchAll();           
            $cod=$partido[0]['cod_partido'];
            $nombre_partido=$partido[0]['nombre'];
            
            $header="Barrios en instancia de mapeo preliminar en $nombre_partido";
            DownloadExcel::DownloadArrayAsExcel($result,"mapeo_municipales_".$cod."_".date("Y-m-d"),$header);   
            
         }   


        public static function ConfirmadosProvincial(){
            $strQuery='select p.nombre as "Partido", b.barrios as "Cantidad de barrios", b.viviendas as "Cantidad de viviendas", b.has as "Superficie en hectáreas"
            from partido p  join (select id_partido, count(cod_folio) as barrios, sum(cantidad_familias) as viviendas, sum(superficie) as has
            from folio a
            join uso_interno u on a.id=u.id_folio 
            where u.estado_folio = 6 or u.estado_folio = 7
            group by id_partido) b
            ON p.id = b.id_partido
            order by p.nombre';

                $objDatabase = QApplication::$Database[1];
                $objDbResult = $objDatabase->Query($strQuery);
                $result = $objDbResult->FetchAll();            
                $header="Partidos según cantidad de barrios confirmados e inscriptos";
                
                DownloadExcel::DownloadArrayAsExcel($result,"confirmados_provincial_".date("Y-m-d"),$header);   
                
         }

         public static function MapeoProvincial(){
            $strQuery='select p.nombre as "Partido", b.barrios as "Cantidad de barrios"
            from partido p  join (select id_partido, count(cod_folio) as barrios
            from folio a
            join uso_interno u on a.id=u.id_folio 
            where u.estado_folio < 4 OR u.estado_folio = 5
            group by id_partido) b
            ON p.id = b.id_partido
            order by p.nombre';

                $objDatabase = QApplication::$Database[1];
                $objDbResult = $objDatabase->Query($strQuery);
                $result = $objDbResult->FetchAll();            
                $header="Partidos según cantidad de barrios en instancia de mapeo preliminar";
                
                DownloadExcel::DownloadArrayAsExcel($result,"mapeo_provincial_".date("Y-m-d"),$header);   
                
         }

}



Reporte::Run();
?>
