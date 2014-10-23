<?php
$_GET['controller'] = 'carga';
$b= file_get_contents('paginamap.txt');
$c= substr($b,strpos($b,$_GET['cuad'].$_GET['pag']));
$pos = strpos($c,'&pagina=')+8;
$_GET['pagina'] = (int) substr($c,$pos);
include("index.php");
?>
