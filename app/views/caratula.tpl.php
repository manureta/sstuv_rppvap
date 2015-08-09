<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<title>Car&aacute;tula</title>
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/print.css" />
		
	</head>
	
	<body onload="hide()">
		<?php $this->RenderBegin(false); ?>
		<page size="A4">
		<div class="encabezado">
			<img src="assets/images/header.png" width="100%">
		</div>
		<div class="cont cond">
			
			<h2>Datos de carga</h2>
			
			<div class="left">	
				<h3>&#9658; Folio</h3>
				<input style="width:118px; margin-left:5px" value='<?=$this->objFolio->Matricula;?>' >
				<input style="width:72px; margin-left:11px" value='<?=$this->objFolio->IdPartidoObject->CodPartido;?>' >
			</div>
			<div class="right" style="width:50%;margin-right:25px">
				<h3>Fecha de carga del folio</h3>
				<input style="width:50px" value=<?=$this->objFolio->Fecha->format('d');?>>
				<input style="width:50px" value=<?=$this->objFolio->Fecha->format('m');?>>
				<input style="width:50px" value=<?=$this->objFolio->Fecha->format('y');?>>
			</div>
			<div class="left">
				<h3>&#9658; Partido</h3>
				<input style="width:204px" value='<?=$this->objFolio->IdPartidoObject->Nombre;?>'>
			</div>
			<div class="right">
				<h3>Localidad</h3>
				<input style="width:303px" value='<?=$this->objFolio->Localidad;?>'>
			</div>	

			<div class="left">
				<h3>&#9658; Nombre del barrio oficial</h3><br>
				<input style="width:500px; margin-left:25px" value='<?=$this->objFolio->NombreBarrioOficial;?>'></br>
			</div>
			<div class="right" style="">
				<h3>A&ntilde;o de origen del barrio</h3><br>
				<input style="width:170px" value='<?=$this->objFolio->AnioOrigen;?>'></br>
			</div>	
			<div class="left">	
				<h3>Superficie (En hect&aacute;reas)</h3><br>
				<input style="width:150px; margin-left:25px" value='<?=$this->objFolio->Superficie?>'>				
			</div>
			
			
			<div class="right">
				<h3>Cantidad de familias/hogares</h3><br>
				<input style="width:170px" value='<?=$this->objFolio->CantidadFamilias;?>'>		
			</div>
			</br>
			
			<h3 style="display:block;clear:both">&#9658; Tipo de barrio</h3>
			<form id="tipo_barrio">
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==1)?'checked':'');?>>
				<span>Villa</span>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==2)?'checked':'');?>>
				<span>Asentamiento precario</span>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==3)?'checked':'');?>>
				<span>Otro</span>
			</form>
			
			<h3>&#9658; Direcci&oacute;n</h3>
			</br>
			<input style="margin-left: 25px;width: 730px;" value='<?=$this->objFolio->Direccion;?>'>
			
			<h3>&#9658; Nomenclatura catastral/dominio</h3>
			<ol>
				<?php $cant=0; ?>
				<?php for ($i=0;($i<count($this->arrNom)&&$cant<4);$i++): ?>
					<?php if( in_array($this->arrNom[$i]->EstadoGeografico, array('completo','parcial','repetido'))) : ?>			  
						<?php $cant++;?>
						<div class="li_caratula">
						<li>
							<span>Nomenclatura catastral</span>
							<div>
								<small>Circ</small></br>
								<input value="<?php echo $this->limpiar_ceros($i,'circ'); ?>">
							</div>
							<div>
								<small>Secc</small></br>
								<input value="<?php echo $this->limpiar_ceros($i,'secc'); ?>">
							</div>
							<div>
								<small>Chac</small></br>
								<input value="<?php echo $this->limpiar_ceros($i,'chac'); ?>"></br>
							</div>
							<div>
								<small>Qta</small></br>
								<input value="<?php echo $this->limpiar_ceros($i,'quinta'); ?>"></br>
							</div>
							<div>
								<small>Frac</small></br>
								<input value='<?php echo $this->limpiar_ceros($i,'frac'); ?>'></br>
							</div>
							<div>
								<small>Mza</small></br>
								<input value="<?php echo $this->limpiar_ceros($i,'mza'); ?>"</br>
							</div>
							<div>
								<small>Parc</small></br>
								<input value="<?php echo $this->limpiar_ceros($i,'parc'); ?>"></br>
							</div>
							
							<small style="margin-left:182px">Titular de dominio</small>
							<input style="width:535px;margin-left:180px;" value="<?=$this->arrNom[$i]->TitularDominio;?>">
						</li>
					</div>
					<?php endif; ?>		
				<?php endfor; ?>
			</ol>
			
			<h3>&#9658; Infraestructura y servicios urbanos</h3>
			
			<table>
				<tr class="infra">
					<th></th>
					<th>Inexistente</th>
					<th>Cobertura parcial</th>
					<th>Cobertura total</th>
				</tr>
				<tr class="infra">
					<td>Luz el&eacute;ctrica</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorIndividual==1)?'checked':'');?> ></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorIndividual==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorIndividual==3)?'checked':'');?>></td>
				</tr>
				<tr class="infra">
					<td>Agua corriente</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaCorriente==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaCorriente==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaCorriente==3)?'checked':'');?>></td>
				</tr>
				<tr class="infra">
					<td>Red cloacal</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedCloacal==1)?'checked':'');?> ></td>
					<td><input type="checkbox"><?php echo (($this->objInfraestructura->RedCloacal==2)?'checked':'');?> </td>
					<td><input type="checkbox"><?php echo (($this->objInfraestructura->RedCloacal==3)?'checked':'');?> </td>
				</tr>
				<tr class="infra">
					<td>Red de gas</td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->RedGas==1)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->RedGas==2)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->RedGas==3)?'checked':'');?> ></td>
				</tr>
				<tr class="infra">
					<td>Pavimento</td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->Pavimento==1)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->Pavimento==2)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->Pavimento==3)?'checked':'');?> ></td>
				</tr>
				<tr class="infra">
					<td>Alumbrado p&uacute;blico</td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->AlumbradoPublico==1)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->AlumbradoPublico==2)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->AlumbradoPublico==3)?'checked':'');?> ></td>
				</tr>
			</table>
			<div id="uso_int">
				<h3>Uso interno</h3>
				<div>
					<span>Situaci&oacute;n Registral</span>
					<table>
						<tr>
							<td>
								<input type="checkbox" <?php echo (($this->objUsoInterno->MapeoPreliminar)?'checked':'');?>>
								<small>Mapeo preliminar</small>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->NumExpediente)>0)?'checked':'');?>>
								<small>N&deg; Expediente</small>
							</td>
							<td>
								<input value="<?=$this->objUsoInterno->NumExpediente;?>" style="float:left; margin-left:82px">
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->ResolucionInscripcionProvisoria)>0)?'checked':'');?>>
								<small>Inscripci&oacute;n provisoria</small></br>
							</td>
							<td>
								<small>N&deg; de Resoluci&oacute;n</small>
								<input value="<?=$this->objUsoInterno->ResolucionInscripcionProvisoria;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->ResolucionInscripcionDefinitiva)>0)?'checked':'');?>>
								<small>Inscripci&oacute;n definitiva</small></br>
							</td>
							<td>
								<small>N&deg; de Resoluci&oacute;n</small>
								<input value="<?=$this->objUsoInterno->ResolucionInscripcionDefinitiva;?>">
							</td>
						</tr>
						
					</table>
				</div>
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

