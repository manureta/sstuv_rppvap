<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<title>Informe de Expropiaciones</title>
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/print.css" />

	</head>

	<body onload="hide()">
		<?php $this->RenderBegin(false); ?>
		<page size="A4">
		<div class="encabezado">
			<img src="assets/images/header_expropiaciones.png" width="100%">
		</div>
		<div class="cont cond">

			<h2>Datos básicos del barrio</h2>

			<div class="left">
				<h3>&#9658; Folio</h3>
				<input style="width:70px; margin-left:5px" value='<?=$this->objFolio->CodFolio;?>' >
			</div>

			<div class="left">
				<h3>&#9658; Partido</h3>
				<input style="width:200px" value='<?=$this->objFolio->IdPartidoObject->Nombre;?>'>
			</div>
      <div class="left">
        <h3>&#9658; Localidad</h3>
        <input style="width:200px" value='<?=$this->objFolio->Localidad;?>'>
      </div>
    </br>

      <div class="left">
        <h3>&#9658; Nombre del barrio oficial</h3><br>
      </div>
      <div class="left">
        <input style="width:504px; margin-left:60px" value='<?=$this->objFolio->NombreBarrioOficial;?>'>
      </div>

      </br>

			<h3>&#9658; Direcci&oacute;n</h3>
	    <input style="margin-left: 140px;width: 504px;" value='<?=$this->objFolio->Direccion;?>'>
		</div>

    <div class="cont cond">
        <h2>Estado de Expropiación</h2>

        <div class="left">
  				<h3>&#9658; Fecha de sanción</h3>
  				<input style="width:150px; margin-left:5px" value='<?=$this->objEncuadre->FechaSancion;?>' >
  			</div>

        <div class="right">
  				<h3>&#9658; Fecha de vencimiento</h3>
  				<input style="width:150px; margin-left:5px" value='<?=$this->objEncuadre->FechaVencimiento;?>' >
  			</div>

      </br>  </br>  </br>
        <div class="left">
          <h3>&#9658; Juzgado</h3>
          <input style="width:150px; margin-left:52px" value='<?=$this->objEncuadre->Juzgado;?>' >
        </div>

        <div class="right">
  				<h3>&#9658; Tasación Administrativa</h3>
  				<input style="width:150px; margin-left:5px" value='<?=$this->objEncuadre->TasacionAdministrativa;?>' >
  			</div>

      </br>  </br>  </br>

        <div class="left">
  				<h3>&#9658; Precio Pagado</h3>
  				<input style="width:150px; margin-left:21px" value='<?=$this->objEncuadre->PrecioPagado;?>' >
  			</div>
        </br>  </br>  </br>
        <div class="left">
          <h3>&#9658; Nomenclatura texto de la ley</h3>
          <input style="width:560px; margin-left:5px" value='<?=$this->objEncuadre->NomenclaturaTextoLey;?>' >
        </div>

        </br>  </br>  </br>

        <div class="left">
          <h3>&#9658; Estado del proceso de expropiación</h3>
          <input style="width:300px; margin-left:5px" value='<?=$this->objEncuadre->EstadoProcesoExpropiacionObject->Descripcion;?>' >
        </div>
      </br>
      </br>
    </br>
        <div class="memoria_descriptiva">
          <h3>&#9658; Memoria descriptiva</h3>
          <textarea style="height: 397px;">"<?=$this->objEncuadre->MemoriaDescriptiva;?>"</textarea>
        </div>



    </div>
	</page>
	    <script type="text/javascript">

	      function hide(){
	      	var elems = document.getElementsByTagName('input');
    			var len = elems.length;

    			for (var i = 0; i < len; i++) {
    			    //elems[i].disabled = true;
    			}
    			window.print();
    			setTimeout("window.close()",100);
	      }
	    </script>
		<?php $this->RenderEnd(false); ?>
	</body>

</html>
