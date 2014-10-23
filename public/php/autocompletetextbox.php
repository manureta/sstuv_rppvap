<?php
/*
 * Mauro: Para toda pagina. Ver nueva implementacion. ej. Pagina 1: pagina1ctrl.js GetAutoCompleteDataFor_b1_d9_a_1
 */
require('../../app/Bootstrap.php');
Bootstrap::Initialize();

$strTerm = QApplication::QueryString("term");
$strCategory = QApplication::QueryString("cat");
$objDataArray=array();
switch($strCategory){
    case "titulo_posgrado":
        die(json_encode(loadTituloPosgrado($strTerm)));
    case "titulo_grado":
        die(json_encode(loadTituloGrado($strTerm)));
    case "designacion_cargo":
        die(json_encode(loadDesignacionCargo($strTerm)));
    case "localidad":
        die(json_encode(loadLocalidad($strTerm,QApplication::QueryString("provincia"))));
    case "espaciocurricular":
        die(json_encode(loadEspacioCurricular($strTerm)));
    default :
        die(json_encode(array('Error')));
}

/**
 * Resuelve que sea un numero entero valido que pueda ser un Id.
 */
//function esId($str){
//    return $str!=null && $str!="" && intval($str)>0;
//}

function loadTituloGrado($strTerm){
    $objDataArray = array();
    $objArray = TituloTipo::QueryArray(
        QQ::AndCondition(
            QQ::Like(QQN::TituloTipo()->Nombre, "%$strTerm%"),
            QQ::Equal(QQN::TituloTipo()->CTipoTitulo,1)   
        )
    );

    foreach($objArray as $obj){
        $jsObject = new stdClass();
        $jsObject->label = sprintf("%s", $obj->Nombre);
        $jsObject->value = sprintf("%s", $obj->Nombre);
        $jsObject->id = $obj->CTitulo;
        $objDataArray[$obj->CTitulo] = $jsObject;
    }
    return $objDataArray;
}

function loadTituloPosgrado($strTerm){
    $objDataArray = array();
    $objArray = TituloTipo::QueryArray(
        QQ::AndCondition(
            QQ::Like(QQN::TituloTipo()->Nombre, "%$strTerm%"),
            QQ::Equal(QQN::TituloTipo()->CTipoTitulo,2)   
        )
    );

    foreach($objArray as $obj){
        $jsObject = new stdClass();
        $jsObject->label = sprintf("%s", $obj->Nombre);
        $jsObject->value = sprintf("%s", $obj->Nombre);
        $jsObject->id = $obj->CTitulo;
        $objDataArray[$obj->CTitulo] = $jsObject;
    }
    return $objDataArray;
}

function loadDesignacionCargo($strTerm){
    $objDataArray = array();
    $objArray = DesignacionCargoTipo::QueryArray(
        QQ::AndCondition(
            QQ::Like(QQN::DesignacionCargoTipo()->Descripcion, "%$strTerm%")
        )
    );

    foreach($objArray as $obj){
        $jsObject = new stdClass();
        $jsObject->label = sprintf("%s", $obj->Descripcion);
        $jsObject->value = sprintf("%s", $obj->Descripcion);
        $jsObject->id = $obj->CDesignacionCargoTipo;
        $objDataArray[$obj->CDesignacionCargoTipo] = $jsObject;
    }
    return $objDataArray;
}

//Funciones desarrolladas
function loadEspacioCurricular($strTerm){
    $objDataArray = array();
    $objArray = EspacioCurricularTipo::QueryArray(
        QQ::AndCondition(
            QQ::Like(QQN::EspacioCurricularTipo()->Descripcion, "%$strTerm%")
        )
    );

    foreach($objArray as $obj){
        $jsObject = new stdClass();
        $jsObject->label = sprintf("%s", $obj->Descripcion);
        $jsObject->value = sprintf("%s", $obj->Descripcion);
        $jsObject->id = $obj->CEspacioCurricularTipo;
        $objDataArray[$obj->CEspacioCurricularTipo] = $jsObject;
    }
    return $objDataArray;
}

function loadLocalidad($strTerm, $strProvincia){
    $objDataArray = array();
    //Validacion de Parametros
    if(!in_array($strProvincia, array('02','06','10','14','18','22','26','30','34','38',
        '42','46','50','54','58','62','66','70','74','78','82','86','90','94'))) return $objDataArray;
    //Fin Validacion de Parametros
    
    $objLocalidadTipoArray = LocalidadTipo::QueryArray(
        QQ::AndCondition(
            QQ::OrCondition(
                        QQ::Like(QQN::LocalidadTipo()->NombreLocalidad, "%$strTerm%"),
                        QQ::Like(QQN::LocalidadTipo()->NombreDepartamento, "%$strTerm%")
          ),QQ::Equal(QQN::LocalidadTipo()->CProvincia,$strProvincia)
        )
    );
    $objDataArray=array();
    foreach($objLocalidadTipoArray as $objLocalidadTipo){
        $jsObject = new stdClass();
        $jsObject->label = sprintf("%s, %s", $objLocalidadTipo->NombreLocalidad, $objLocalidadTipo->NombreDepartamento);
        $jsObject->value = sprintf("%s, %s", $objLocalidadTipo->NombreLocalidad, $objLocalidadTipo->NombreDepartamento);
        $jsObject->id = $objLocalidadTipo->CLocalidad;
        $objDataArray[$objLocalidadTipo->CLocalidad] = $jsObject;
    }
    return $objDataArray;
}

