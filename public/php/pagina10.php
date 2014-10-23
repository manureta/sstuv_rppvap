<?php

require('paginabase.php');
define('NRO_PAGINA', 10);

class Pagina extends PaginaBase {

    //USAR EXPAND!
    //El uso de index, permite una mejora de accesibilidad en JS, accediendo a los datos directamente, sin iterar o buscar constantemente.
    public function renderJsonData() {
        //Cargamos de antemano los establecimientos permitidos.
        $objJSONArray = Array();
        //Region Global 0
        $index_0 = 0;
        $objJSONArray[0]["designacion_central_CAN"] = Array();
        //Region por CUES 1 a N
        $index = 1;
        foreach ($this->objPersonal->PersonalEstablecimientoAsIdArray as $objPersonalEstablecimiento) {
            $objEstablecimiento = $objPersonalEstablecimiento->IdEstablecimientoObject;

            //Region por CUES
            $strKey = $objEstablecimiento->IdEstablecimiento;
            $objLocalizacionArray = Array();
            $index2 = 0;
            foreach ($objEstablecimiento->LocalizacionAsIdArray as $objLocalizacion) {
                $strKey2 = $objLocalizacion->IdLocalizacion;
                $objUnidadServicioArray = Array();
                $index3 = 0;
                foreach ($objLocalizacion->UnidadServicioAsIdArray as $objUnidadServicio) {
                    $strKey3 = $objUnidadServicio->IdUnidadServicio;
                    $objPlanEstudioArray = Array();
                    $index4 = 0;
                    foreach ($objUnidadServicio->PlanEstudioAsIdArray as $objPlanEstudio) {
                        $objPlanEstudioArray[$index4++] = Array("IdPlanEstudio" => $objPlanEstudio->IdPlanEstudio, "strDescripcion" => $objPlanEstudio->Descripcion);
                    }
                     //Reglas para $objPlanEstudioArray Vacios
                    if($index4==0){
                        switch($objUnidadServicio->CNivelServicio){
                            case NivelServicioTipo::ComunSecundario:
                            case NivelServicioTipo::EspecialSecundario:
                            case NivelServicioTipo::AdultosSecundario:
                                $objPlanEstudioArray[0] = Array("IdPlanEstudio" => 1079, "strDescripcion" => 'Ciclo básico/ educación secundaria básica' );
                                $objPlanEstudioArray[1] = Array("IdPlanEstudio" => 2647, "strDescripcion" => 'Ciclo básico de arte' );
                                $objPlanEstudioArray[2] = Array("IdPlanEstudio" => 3751, "strDescripcion" => 'Ciclo básico técnico' );
                                $objPlanEstudioArray[3] = Array("IdPlanEstudio" => 2646, "strDescripcion" => 'Ciclo básico agrario' );
                                $objPlanEstudioArray[4] = Array("IdPlanEstudio" => 99999, "strDescripcion" => 'Otro' );
                                break;
                            case NivelServicioTipo::ComunSuperior:
                                $objPlanEstudioArray[0] = Array("IdPlanEstudio" => 99999, "strDescripcion" => 'Otro' );
                                break;
                        }
                    }
                    $objUnidadServicioArray[$index3++] = Array(
                        "IdUnidadServicio" => $objUnidadServicio->IdUnidadServicio,
                        "strDescripcion" => $objUnidadServicio->CNivelServicioObject->Descripcion,
                        "PlanEstudioArray" => $objPlanEstudioArray
                    );
                  }
                $objLocalizacionArray[$index2++] = Array(
                    "IdLocalizacion" => $objLocalizacion->IdLocalizacion,
                    "strCueAnexo" => $objLocalizacion->Cueanexo,
                    "strNombre" => $objLocalizacion->Nombre,
                    "strLocalidad" => $objLocalizacion->Localidad,
                    "UnidadServicioArray" => $objUnidadServicioArray
                );
            }


            $objJSONArray[$index] = Array(
                "IdEstablecimiento" => $objEstablecimiento->IdEstablecimiento,
                "strCue" => $objEstablecimiento->Cue,
                "strNombre" => $objEstablecimiento->Nombre,
                "strDomicilio" => '',
                "LocalizacionArray" => $objLocalizacionArray
            );

            //Region Global
            foreach ($objPersonalEstablecimiento->PersonalEstablecimientoUnidadServicioAsIdArray as $objPersonalEstablecimientoUnidadServicio) {
                $objJSONArray[0]["designacion_central_CAN"][$index_0]["IdPersonalEstablecimientoUnidadServicio"] = $objPersonalEstablecimientoUnidadServicio->IdPersonalEstablecimientoUnidadServicio;
                $objJSONArray[0]["designacion_central_CAN"][$index_0]["JSONIndexCueInformation"] = $index;
                $objJSONArray[0]["designacion_central_CAN"][$index_0]["strCueAnexo"] = $objPersonalEstablecimientoUnidadServicio->IdUnidadServicioObject->IdLocalizacionObject->Cueanexo;
                $objJSONArray[0]["designacion_central_CAN"][$index_0]["strOferta"] = $objPersonalEstablecimientoUnidadServicio->IdUnidadServicioObject->CNivelServicioObject->Descripcion;
                $index_0++;
            }
            $index++;
        }
        echo json_encode($objJSONArray); //Ojo, no usar metodo this->sendJson.. esto impacta cabeceras.
    }

    public function renderCustomPermission($strNombrePermiso) {
        switch ($strNombrePermiso) {
            case 'designacioncentral':
                echo ($this->objPersonal->EsNivelCentral()?"true":"false");
                break;
            case 'designacion':
                echo "true";
                break;
            case 'funcion':
                echo "true";
                break;
        }
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
        if (!isset($strPostValuesArray["b10_global"])) {
            return $JsonResponce;
        }
        $objJsonGlobalForm = json_decode($strPostValuesArray["b10_global"]);

        //Analizamos los cue que tiene asignado
        foreach ($this->objPersonal->PersonalEstablecimientoAsIdArray as $objPersonalEstablecimiento) {
            isset($strPostValuesArray["b10_global_" . $objPersonalEstablecimiento->IdEstablecimiento]) &&
                    $objJsonGlobalFormCue = json_decode($strPostValuesArray["b10_global_" . $objPersonalEstablecimiento->IdEstablecimiento]);
        }
        return $JsonResponce;
    }

}

$_CONTROL = new Pagina(NRO_PAGINA);


if (isset($_POST["action"])) {
    if (method_exists($_CONTROL, "saveData")) {
        call_user_method($_POST["action"], $_CONTROL, $_POST);
        exit(0);
    }
}

//BreadCrumbs
$strBreadCrumbsArray = Array();
$strBreadCrumbsArray['Inicio'] = __VIRTUAL_DIRECTORY__ . '/page/home';
$strBreadCrumbsArray['Cédula'] = __VIRTUAL_DIRECTORY__ . '/pagina';
$strBreadCrumbsArray['Designaciones/Puestos de Trabajo/Nombramientos/Cargos'] = '';
$_CONTROL->setBreadCrumbsOptions($strBreadCrumbsArray);
//JavaScripts
$_CONTROL->addJavascript("paginabasectrl.js");
$_CONTROL->addJavascript("pagina".NRO_PAGINA."check.js");
$_CONTROL->addJavascript("pagina".NRO_PAGINA."ctrl.js");
//Css

require 'paginabase.tpl.php'; //Siempre
?>
