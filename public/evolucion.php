<?php

session_start();

$path=$_GET['file'];
$folio=$_GET['cod'];

$fecha=date("y-m-d_H-i");
header('Content-type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=evolucion_folio_".$folio."_".$fecha.".csv");
header("Pragma: no-cache");
header("Expires: 0");

//$f = fopen ('tmp/'.$path, 'w+');
readfile($path);


?>