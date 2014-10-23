<?php
require('ActiveResource.php');
class Issue extends ActiveResource {
    
    const PENDIENTE = 8;
    const EN_CURSO = 2;
    const RESUELTA = 3;
    const RECHAZADA = 5;
    var $site = 'https://sync:Jspewlm71@cenpetk.educacion.gob.ar/projects/cenpe/';
    //var $site = 'https://sync:Jspewlm71@cenpetk.educacion.gob.ar/projects/pruebas-cenpe/';
    var $request_format = 'xml'; // REQUIRED!
    
    
}



