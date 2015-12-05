<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<title></title>
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/print_certificado.css" />
    <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/jquery-1.10.2.min.js"></script>

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
    if($(".compraventa")){

      $(".compraventa").each(function(){
        var div=$(this);
        var w=div.find('.fin').offset().left - div.find('.inicio').offset().left;
        div.find(".fin").css("width",w);
        div.find(".fin").html("-----------------------------------------------------------------------------------------------------------------------------------------------------");

      });

    }
    window.print();
    setTimeout("window.close()",100);
  }
</script>
</body>
</html>
