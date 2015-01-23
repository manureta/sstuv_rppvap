<page size="A4">
	<div class="encabezado">
			<img src="assets/images/header.png" width="100%">
		</div>
	<div class="cont cond">		
			<h1>Ley 14.449/folio</h1>
			<h2>Datos de carga</h2>
			
			<small style="margin-left:105px">Cod. partido</small>
			<small style="margin-left:25px">Cod. matr&iacute;cula</small></br>
			<div class="left">	
				<h3>&#9658; Folio</h3>
				<input style="width:118px; margin-left:5px" value='<?=$this->objFolio->Matricula;?>' >
				<input style="width:72px; margin-left:11px" value='<?=$this->objFolio->IdPartidoObject->CodPartido;?>' >
			</div>
			<div class="right">	
			<h3>Fecha de carga del folio</h3>
				<input style="width:45px" value=<?=$this->objFolio->Fecha->format('d');?>>
				<input style="width:45px"value=<?=$this->objFolio->Fecha->format('m');?>>
				<input style="width:45px" value=<?=$this->objFolio->Fecha->format('Y');?>>
			</div>
			<h3>&#9658; Encargado/a de la carga</h3>
			</br>
			<textarea><?=$this->objFolio->Encargado;?> - <?=$this->objFolio->Reparticion;?></textarea>
			<h2>Datos generales</h2></br>
			<div class="left">
				<h3>&#9658; Partido</h3>
				<input style="width:210px" value='<?=$this->objFolio->IdPartidoObject->Nombre;?>'>
			</div>
			<div class="right">	
				<h3>Localidad</h3>
				<input style="width:303px" value='<?=$this->objFolio->Localidad;?>'>
			</div>
			<h3>&#9658; Nombre del barrio oficial</h3></br>
			<textarea><?=$this->objFolio->NombreBarrioOficial;?></textarea>
			
			<small style="margin-left:25px">Nombre de barrio alternativo 1</small>
			<small style="float:right;margin-right:25%">Nombre de barrio alternativo 2</small></br>
			<div class="left" style="width:305px">
					
				<input style="width:270px" value="<?=$this->objFolio->NombreBarrioAlternativo1;?>"></br>
			</div>
			
			<div class="right">
				<input style="width:303px" value="<?=$this->objFolio->NombreBarrioAlternativo2;?>"></br>	
			</div>

			<div class="left">	
				<small>A&ntilde;o de origen del barrio</small>
				<input style="width:120px;margin-left:15px" value="<?=$this->objFolio->AnioOrigen;?>"></br>
				<small >Superficie (en hect&aacute;reas)</small>
				<input style="width:120px;margin-left:15px" value="<?=$this->objFolio->Superficie;?>"></br>
				<small >Cantidad de familias/hogares</small>
				<input style="width:120px;margin-left:15px" value="<?=$this->objFolio->CantidadFamilias;?>"></br>
			</div>
			
			</br>
			
			<h3 style="width:100%">&#9658; Tipo de barrio</h3>
			<form>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==1)?'checked':'');?>>
				<small>Villa</small>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==2)?'checked':'');?>>
				<small>Asentamiento precario</small>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==3)?'checked':'');?>>
				<small>Otro</small>
			</form>
			
			<small style="margin-left:40px">Observaciones de casos dudosos (Describir casos dudosos a efectos de considerarlos en el mapeo preliminar del registro)</small></br>
			<textarea><?=$this->objFolio->ObservacionCasoDudoso; ?></textarea>
			
			<div class="left">	
				<h3>&#9658; Judicializado</h3>
			</div>
			<div class="judic">
				<form>
					<input type="checkbox" <?php echo (($this->objFolio->Judicializado=='si')?'checked':'');?>>
					<small>SI</small>
					<input type="checkbox" <?php echo (($this->objFolio->Judicializado=='no')?'checked':'');?>>
					<small>NO</small>	
				</form>
			</div> </br>
			
			<div class="left">	
				<h3>&#9658; Direcci&oacute;n</h3>
				<textarea><?=$this->objFolio->Direccion;?></textarea>
			</div>
			<h3>&#9658; Otras referencias barriales necesarias para ubicar el barrio</h3>
			<textarea></textarea>
			
			<div id="uso_int">
				</br>
				<h3>Uso interno</h3>
				<div>
					<span>Situaci&oacute;n Registral</span></br>
					<table>
						<tr>
							<td>
								<input type="checkbox" <?php echo (($this->objUsoInterno->MapeoPreliminar)?'checked':'');?>>
								<small>Mapeo preliminar</small>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo (($this->objUsoInterno->NoCorrespondeInscripcion)?'checked':'');?>>
								<small>No corresponde inscripci&oacute;n</small>
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
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->NumExpediente)>0)?'checked':'');?>>
								<small>N&deg; Expediente</small>
							</td>
							<td>
								<input value="<?=$this->objUsoInterno->NumExpediente;?>" style="float:left; margin-left:83px">
							</td>
						</tr>
					</table>
				</div>
			</div>
	</div>		
		
</page>

