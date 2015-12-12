<?php
class PageTripartitoPanel extends QPanel {

	public $contenido="";

	public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
		// Call the Parent
		 try {
            $this->contenido="";
            if(Permission::PuedeConsultarTripartito()){             
               
               if(isset($_POST) && count($_POST)>1){
                $this->Buscar($_POST);
               }
                //parent::Run('Tripartito','../app/views/page/tripartito.tpl.php');
            	parent::__construct($objParentObject, $strControlId);   
            }

        }
	
			
		catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}

		$this->Template = __VIEW_DIR__.'/page/tripartito.tpl.php';
	}


 public function Buscar($params){


    $partido = $params["partido"];
    $partida = $params["partida"];
 

    if ($partido AND $partida){
        //$params=array($partido,$partida);
        $where = " (t.partido = '$partido') AND (t.partida = '$partida') ";
    }else{
	    $partido="'%".$params["partidoN"]."%'";
	    $circunscripcion="'%".$params["circunscripcionN"]."%'";
	    $seccion="'%".$params["seccionN"]."%'";
	    $chacraNN="'%".$params["chacraNN"]."%'";
	    $chacraTN="'%".$params["chacraTN"]."%'";
	    $quintaNN="'%".$params["quintaNN"]."%'";
	    $quintaTN="'%".$params["quintaTN"]."%'";
	    $fraccionNN="'%".$params["fraccionNN"]."%'";
	    $fraccionTN="'%".$params["fraccionTN"]."%'";
	    $manzanaNN="'%".$params["manzanaNN"]."%'";
	    $manzanaTN="'%".$params["manzanaTN"]."%'";
	    $parcelaNN="'%".$params["parcelaNN"]."%'";
	    $parcelaTN="'%".$params["parcelaTN"]."%'";
	    $subparcelaN="'%".$params["subparcelaN"]."%'";




       if (
	    $partido OR
	    $circunscripcion OR
	    $seccion OR 
	    $chacraNN OR 
	    $chacraTN OR 
	    $quintaNN OR
	    $quintaTN OR
	    $fraccionNN OR 
	    $fraccionTN OR 
	    $manzanaNN OR
	    $manzanaTN OR
	    $parcelaNN OR
	    $parcelaTN OR
	    $subparcelaN){
    	
    	$where = " (t.partido like $partido) AND (t.circ like $circunscripcion) AND (t.seccion like $seccion) AND (t.chacra_numero like $chacraNN) AND (t.chacra_letra like $chacraTN) 
    	AND (t.quinta_numero like $quintaNN) AND (t.quinta_letra like $quintaTN) AND (t.fraccion_numero like $fraccionNN) AND (t.fraccion_letra like $fraccionTN) AND (t.manzana_numero like $manzanaNN) AND (t.manzana_letra like $manzanaTN) AND (t.parcela_numero like $parcelaNN) AND (t.parcela_letra like $parcelaTN) AND (t.subparcela like $subparcelaN) ";
      }

    }

    $sql_count = "SELECT count(*) ";
    $sql_count .= "FROM tripartito.tripartito_completo_27_10_15 t"; // JOIN carto_base.parce_nomencla p ON pa.catstro = p.partido ";
    $sql_count .= " WHERE ".$where;


    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($sql_count);
    $result = $objDbResult->FetchAll();

    $cant_resultados=(isset($result[0]))? $result[0]['count']: -1;

    
    if ($cant_resultados==1){
	    //HACER CONSULTAi
	     $campos_consultados='partido "Partido",partida "Partida", digito_verificador "Digito",circ "Circ.",seccion "Sec.",
	    chacra_numero || chacra_letra "Ch.",quinta_numero || quinta_letra "Qta.",fraccion_numero || fraccion_letra "Fr.",manzana_numero || manzana_letra "Mz.",parcela_numero || parcela_letra "Parc.",subparcela "Sp.",

	    codigo_titular "Titularidad",superficie_tierra "Sup.",substr(valuacion_fiscal_vigente,0,10) "Val. Fiscal",

	    destinatario "Apellido y Nombre",barrio "Barrio",calle "Calle",numero "Nro",piso "Piso",depto "Depto.",localidad "Localidad",cpostal || cpa "Código Postal",

	    apellido_responsable "Apellido y Nombre",cuit_responsable "CUIT",
	    titular_del_dominio "Apellido y Nombre / Razón Social",
	        substr(nro_descrip_domi,1,3) "Partido_2",
	    substr(nro_descrip_domi,10,1) "Tipo",
	    substr(nro_descrip_domi,4,6) "Nro._2",
	    substr(nro_descrip_domi,11,6) "U.F.",
	    substr(nro_descrip_domi,17,4) "Año",
	    substr(nro_descrip_domi,21,1) "Serie"
	    ';
	    
	    $sql=str_replace("count(*)",$campos_consultados,$sql_count);
	    //  echo "<br>".$sql."<br>";
	    $objDatabase = QApplication::$Database[1];
	    $objDbResult = $objDatabase->Query($sql);
	   
	    $arr=$objDbResult->FetchAll();
	    echo($params["type"]);
	    if($params["type"]=="html"){ 
	        $this->contenido.="<div id=consulta>"; 
	        $this->contenido.="<div class='banner'><div id=logo width=50% bgcolor=#f58030><img src='http://190.188.234.6/registro/assets/images/logo_izquierda.png' height=50px width=145px></img></div><div id=titulo><h3>Consulta Sistema Tripartito</h3><p alt='Agencia de Recaudación de la provincia de Buenos Aires (2015)'> 
	            Fuente: ARBA (2015)</p></div></div>";
	        $this->contenido.="<div class='container'>";
	        $this->contenido.="<h2>DATOS CATASTRALES</h2><br />";
	        foreach($arr[0] as $key => $value){
	                    if ($key=="Titularidad") $this->contenido.="<h2>SUPERFICIE Y VALUACION</h2><br />";
	                    if ($key=="Apellido y Nombre") $this->contenido.="<h2>DATOS DEL DESTINATARIO IMPOSITIVO</h2><br />";
	                    $this->contenido.="<div class='dato'><div class='header'>".str_replace("_2","",$key).": </div><div>  ".$value."</div></div>"; 
	                        if ($key=="Código Postal") $this->contenido.="<br /><h2>TITULAR E INSCRIPCION DE DOMINIO</h2>";
	            
	         }
	                    $this->contenido.="</div>";
	        }else{
	            echo '{"total":"' . $rows . '","data":' . json_encode($arr) . '}';
	        }
    }else{
        if($params["type"]=="html"){ 
            if($cant_resultados==-1){
                $this->contenido="Ocurrió un error inesperado";
            }
            if ($cant_resultados>1){
                $this->contenido="SE ENCONTRARON ** ".$cant_resultados." ** RESULTADOS, SE REQUIEREN PARÁMETROS DE BÚSQUEDA MÁS ESPECÍFICOS. Recuerde que las chacras, quintas, fracciones, manzanas y parcelas no sólo se componen de números sino también de letras";
            }
            if($cant_resultados==0) echo "NO SE ENCONTRARON RESULTADOS"; 
            }
        else{
           echo '{"total":"' . $cant_resultados . '"}';
        }

    }
            

    
 }

}
?>