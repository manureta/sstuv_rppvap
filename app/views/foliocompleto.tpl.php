<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<title>Folio Completo</title>
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/print.css" />
		
		
	</head>
	
<body onload="imprimir()">
<?php $this->RenderBegin(false); ?>
<?php 

	include "hoja1.tpl.php"; 
	include "hoja2.tpl.php";
	include "hoja3.tpl.php";
	include "hoja4.tpl.php";
	
?>

<?php $this->RenderEnd(false); ?>
	<script type="text/javascript">
		function imprimir(){
			window.print();
			//window.close();
			setTimeout({window.close();},1000);
		}
	</script>
</body>
</html>
