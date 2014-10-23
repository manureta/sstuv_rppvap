<?php
require('paginabase.php');
define('NRO_PAGINA', 7);

class Pagina extends PaginaBase {
    
    //USAR EXPAND!
    public function renderJsonData(){
        //Cargamos de antemano los establecimientos permitidos.
        $objJSONArray = Array();
        echo json_encode($objJSONArray);
    }
    
    public function renderCustomPermission($strNombrePermiso){

    }
    
    
    //MANEJO DE INFORMACION
    /**
     * 
     * @param Array de Strings $strPostValuesArray $_POST
     * @param type $JsonResponce
     * $JsonResponce["error_controls"]=array(); //Id de Controles con error.
     *          Ej. $JsonResponce["error_controls"][] = Array("id":"b_10_n_1_0","El dato es incorrecto");
     * $JsonResponce["status"]=STATUS_OK;
     *          Ej. Estados posibles ver paginabase.class.php
     * 
     * La funcion, no retorna nada. Los valores son pasados por referencia.
     */
    protected function parseData($strPostValuesArray, $JsonResponce) {
     return $JsonResponce;
    }
    
    
}



$_CONTROL = new Pagina(NRO_PAGINA);


if(isset($_POST["action"])){
    if(method_exists($_CONTROL, "saveData")){
        call_user_method($_POST["action"], $_CONTROL, $_POST);
        exit(0);
    }
}

//BreadCrumbs
$strBreadCrumbsArray['Estudios de posgrado/postitulo en el nivel superior y universitario']='';
$_CONTROL->setBreadCrumbsOptions($strBreadCrumbsArray);
//JavaScripts
$_CONTROL->addJavascript("paginabasectrl.js");
$_CONTROL->addJavascript("pagina".NRO_PAGINA."check.js");
$_CONTROL->addJavascript("pagina".NRO_PAGINA."ctrl.js");
//Css

require 'paginabase.tpl.php'; //Siempre

?>
