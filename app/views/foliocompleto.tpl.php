<?php $this->RenderBegin(false); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="LATIN1" />
		<title>Folio Completo</title>
		<!-- CSS -->
		<style>
		<?=file_get_contents("http://localhost/registro/assets/css/print.css");?>
		</style>
		
	</head>
<?php 
	include "hoja1.tpl.php"; 
	include "hoja2.tpl.php";
	include "hoja3.tpl.php";
	include "hoja4.tpl.php";
?>
<?php $this->RenderEnd(false); ?>