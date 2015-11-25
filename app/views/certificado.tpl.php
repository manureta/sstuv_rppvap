<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<title></title>
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/print_certificado.css" />


	</head>

<body onload="imprimir()">
<?php $this->RenderBegin(false); ?>
<?php

	include $this->template;

  if($this->notificacion){
    include "notificacion.tpl.php";
  }


?>

<?php $this->RenderEnd(false); ?>
<script type="text/javascript">
  function imprimir(){
    window.print();
    setTimeout("window.close()",100);
  }
</script>
</body>
</html>
