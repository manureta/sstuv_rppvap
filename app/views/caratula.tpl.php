<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="LATIN1" />
		<title>Carátula</title>
		<!-- CSS -->
		<link href="assets/css/print.css" rel="stylesheet">
	</head>
	
	<body onload="hide()">
		<?php $this->RenderBegin(false); ?>
		<div class="cont">
			<h1>Ley 14.449/carátula folio</h1>
			<h2>Datos de carga</h2>
			
			<small style="margin-left:105px">Cod. partido</small>
			<small style="margin-left:25px">Cod. matrícula</small></br>
			
			<h3>&#9658; Folio</h3>
			<input style="width:90px" value='<?=$this->objFolio->IdPartidoObject->CodPartido;?>' >
			<input style="width:118px" value='<?=$this->objFolio->Matricula;?>' >
			
			<h3>Fecha de carga del folio</h3>
			<input style="width:50px" value=<?=$this->objFolio->Fecha->format('d');?>>
			<input style="width:50px" value=<?=$this->objFolio->Fecha->format('m');?>>
			<input style="width:50px" value=<?=$this->objFolio->Fecha->format('y');?>>
			
			<h3>&#9658; Partido</h3>
			<input style="width:204px" value='<?=$this->objFolio->IdPartidoObject->Nombre;?>'>
			
			<h3>Localidad</h3>
			<input style="width:303px" value='<?=$this->objFolio->Localidad;?>'>

			<div class="left">
				<h3>&#9658; Nombre del barrio oficial</h3></br>
				<small>(Según denominación en el encuadre normativo de regularización)</small></br>
				<input style="width:303px" value='<?=$this->objFolio->NombreBarrioOficial;?>'></br>
				<h3>Superficie (En hectareas)</h3></br>
				<input style="width:303px" value='<?=$this->objFolio->Superficie?>'>				
			</div>
			
			<div class="right" style="margin-top: 19px;">
				<h3>Año de origen del barrio</h3></br>
				<input style="width:303px" value='<?=$this->objFolio->AnioOrigen;?>'></br>
				<h3>Cantidad de familias/hogares</h3></br>
				<input style="width:303px" value='<?=$this->objFolio->CantidadFamilias;?>'>		
			</div>
			</br>
			
			<h3 style="display:block;clear:both">&#9658; Tipo de barrio</h3>
			<form id="tipo_barrio">
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==1)?'checked':'');?>>
				<span>Villa</span>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==2)?'checked':'');?>>
				<span>Asentamiento precario</span>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==3)?'checked':'');?>>
				<span>Caso dudoso</span>
			</form>
			
			<h3>&#9658; Dirección</h3>
			<small>(Detallar calles que circundan(Calle 1, Calle 2, Calle 3, Calle 4, etc.)</small></br>
			<input style="margin-left: 25px;width: 730px;" value='<?=$this->objFolio->Direccion;?>'>
			
			<h3>&#9658; Nomenclatura catastral/dominio</h3>
			<ol>
				<?php for ($i=0;$i<count($this->arrNom);$i++): ?>
				  
				
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
					
					<small style="margin-left:230px">Titular de dominio</small>
					<input style="width:482px;margin-left:230px;" value="<?=$this->arrNom[$i]->TitularDominio;?>">
				</li>
				<?php endfor; ?>
			</ol>
			
			<h3>&#9658; Infraestructura y servicios urbanos</h3>
			<small>(Tildar la opción que corresponda)</small>
			<table>
				<tr class="infra">
					<th></th>
					<th>Inexistente</th>
					<th>Cobertura parcial</th>
					<th>Cobertura total</th>
				</tr>
				<tr class="infra">
					<td>Luz eléctrica</td>
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
					<td>Alumbrado público</td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->AlumbradoPublico==1)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->AlumbradoPublico==2)?'checked':'');?> ></td>
					<td><input type="checkbox"<?php echo (($this->objInfraestructura->AlumbradoPublico==3)?'checked':'');?> ></td>
				</tr>
			</table>
			<div id="uso_int">
				</br>
				<h3>Uso interno</h3>
				<div>
					<span>Situación Registral</span></br>
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
								<small>N° Expediente</small>
							</td>
							<td>
								<input value="<?=$this->objUsoInterno->NumExpediente;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->ResolucionInscripcionProvisoria)>0)?'checked':'');?>>
								<small>Inscripción provisoria</small></br>
							</td>
							<td>
								<small>N° de Resolución</small>
								<input value="<?=$this->objUsoInterno->ResolucionInscripcionProvisoria;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->ResolucionInscripcionDefinitiva)>0)?'checked':'');?>>
								<small>Inscripción definitiva</small></br>
							</td>
							<td>
								<small>N° de Resolución</small>
								<input value="<?=$this->objUsoInterno->ResolucionInscripcionDefinitiva;?>">
							</td>
						</tr>
						
					</table>
				</div>
			</div>
		</div>
	    <script type="text/javascript">
	      function hide(){
	      	var elems = document.getElementsByTagName('input');
			var len = elems.length;

			for (var i = 0; i < len; i++) {
			    elems[i].disabled = true;
			}
	      }
	    </script>
		<?php $this->RenderEnd(false); ?>
	</body>

</html>

