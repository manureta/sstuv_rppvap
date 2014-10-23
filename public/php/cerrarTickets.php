<?php

require(dirname(dirname(dirname(__FILE__))).'/app/Bootstrap.php');
Bootstrap::Initialize();
 
$datNow = QDateTime::Now()->AddHours(3)->format("Y-m-d\TH:i:s\Z");//esto es Now con el timeZone 0. se puede optimizar.
$FechaUltimaActualizacion = QDateTime::Now()->AddMinutes(160)->format("Y-m-d\TH:i:s\Z"); //se trae una ventana de 20 minutos

/*
// para correr a mano
$datNow = QDateTime::Now()->setDate('2014','10','01')->format("Y-m-d\TH:i:s\Z");//esto es Now con el timeZone 0. se puede optimizar.
$FechaUltimaActualizacion = QDateTime::Now()->setDate('2010','01','01')->format("Y-m-d\TH:i:s\Z"); //se trae una ventana de 20 minutos
*/

$intTotalCount = 0;
$strURL = "https://sync:Jspewlm71@cenpetk.educacion.gob.ar/issues.xml?author_id=5&limit=100&status_id=closed&updated_on=".urlencode("><$FechaUltimaActualizacion|$datNow");
LogHelper::Debug("intentando conectarse a $strURL ");
$objXmlIssues = simplexml_load_file($strURL);
if(!$objXmlIssues) {
    LogHelper::Error("No se pudo conectar con cenpetk: $strURL");
    die("Error al conectar");
}
$arrAttributesIssues = $objXmlIssues->attributes();
$intCountIssues = $arrAttributesIssues["total_count"];
LogHelper::Log("chequeando $intCountIssues actualizaciones de estado", 'incidentes.log');
$intTotalCerrados =0;
$arrTickets = array();
while($intTotalCount < $intCountIssues){
    //$objXmlIssues = simplexml_load_file("https://sync:Jspewlm71@cenpetk.educacion.gob.ar/issues.xml?updated_on=%3E%3C$FechaUltimaActualizacion|$datNow&offset=$intTotalCount&limit=100");
    foreach($objXmlIssues->issue as $objIssue){
        $arrAttrib = $objIssue->status->attributes();
        $arrTickets[(int)$objIssue->id] = EstadoIncidenteType::getEstadoIncidente($arrAttrib['id']);
        LogHelper::Debug("$intTotalCount: issue {$objIssue->id} tiene estado {$arrAttrib["name"]}");
        $intTotalCount++;
    }
    LogHelper::Debug("intentando conectarse a $strURL&offset=$intTotalCount");
    $objXmlIssues = simplexml_load_file("$strURL&offset=$intTotalCount");
}

$arrIncidentes = Incidente::QueryArray(QQ::AndCondition(QQ::In(QQN::Incidente()->IdTicket,array_keys($arrTickets)),QQ::In(QQN::Incidente()->CEstadoIncidente, array(1,2))));
if (empty($arrIncidentes)) {
    $s="No se encontraron incidentes para actualizar";
    LogHelper::Log($s, "incidentes.log");
    die($s);
}

LogHelper::Log("Se van a actualizar ".count($arrIncidentes)." incidentes", "incidentes.log");

foreach ($arrIncidentes as $objIncidente) {
    $objIncidente->SetEstado($arrTickets[$objIncidente->IdTicket]);
    LogHelper::Log("Se actualizó el estado de IdTicket {$objIncidente->IdTicket} a " .EstadoIncidenteType::$NameArray[$objIncidente->CEstadoIncidente], "incidentes.log");
    $intTotalCerrados++;
}

LogHelper::Log("Se terminó de actualizar el estado de $intTotalCerrados Incidentes", "incidentes.log");
