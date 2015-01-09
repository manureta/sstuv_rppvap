
		<div class="cont">
			<h1>Ley 14.449/folio</h1>
			<h2>Datos de carga</h2>
			
			<small style="margin-left:105px">Cod. partido</small>
			<small style="margin-left:25px">Cod. matr�cula</small></br>
			
			<h3>&#9658; Folio</h3>
			<input style="width:90px" value='<?=$this->objFolio->IdPartidoObject->CodPartido;?>'>
			<input style="width:130px" value='<?=$this->objFolio->Matricula;?>'>
			
			<h3>Fecha de carga del folio</h3>
			<input style="width:45px" value=<?=$this->objFolio->Fecha->format('d');?>>
			<input style="width:45px"value=<?=$this->objFolio->Fecha->format('m');?>>
			<input style="width:45px" value=<?=$this->objFolio->Fecha->format('y');?>>
			
			<h3>&#9658; Encargado/a de la carga</h3>
			<small>(Detallar el nombre y apellido de la persona y repartici�n publica a la que pertenece)</small></br>
			<textarea><?=$this->objFolio->CreadorObject->NombreCompleto;?> - <?=$this->objFolio->CreadorObject->Reparticion;?></textarea>
			<h2>Datos generales</h2></br>
			
			<h3>&#9658; Partido</h3>
			<input style="width:204px" value='<?=$this->objFolio->IdPartidoObject->Nombre;?>'>
			
			<h3>Localidad</h3>
			<input style="width:303px" value='<?=$this->objFolio->Localidad;?>'>

			<h3>&#9658; Nombre del barrio oficial</h3>
			<small>(Seg�n denominaci�n en el encuadre normativo de regularizaci�n)</small></br>
			<textarea><?=$this->objFolio->NombreBarrioOficial;?></textarea>
			<div class="left" style="width:305px">
				<small style="height:auto;line-height:15px">Nombre de barrio alternativo 1</small></br>
				<input style="width:303px" value="<?=$this->objFolio->NombreBarrioAlternativo1;?>"></br>
				<small style="line-height:60px">A�o de origen del barrio</small>
				<input style="width:130px;" value="<?=$this->objFolio->AnioOrigen;?>"></br>
				<small style="line-height:60px">Superficie (en hect�reas)</small>
				<input style="width:130px;" value="<?=$this->objFolio->Superficie;?>"></br>
				<small style="line-height:60px">Cantidad de familias/hogares</small>
				<input style="width:130px;" value="<?=$this->objFolio->CantidadFamilias;?>"></br>
			</div>
			
			<div class="right">
				<small>Nombre de barrio alternativo 2</small></br>
				<input style="width:303px" value="<?=$this->objFolio->NombreBarrioAlternativo2;?>"></br>	
			</div>
			</br>
			
			<h3 style="width:100%">&#9658; Tipo de barrio</h3>
			<form>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==1)?'checked':'');?>>
				<span>Villa</span>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==2)?'checked':'');?>>
				<span>Asentamiento precario</span>
				<input type="checkbox" <?php echo (($this->objFolio->TipoBarrio==3)?'checked':'');?>>
				<span>Caso dudoso</span>
			</form>
			
			<small style="margin-left:40px">Observaciones de casos dudosos (Describir casos dudosos a efectos de considerarlos en el mapeo preliminar del registro)</small></br>
			<textarea><?=$this->objFolio->ObservacionCasoDudoso; ?></textarea>
			
			<h3>&#9658; Judicializado</h3>
			<div class="judic">
				<form>
					<input type="checkbox" <?php echo (($this->objFolio->Judicializado=='si')?'checked':'');?>>
					<span>Si</span>
					<input type="checkbox" <?php echo (($this->objFolio->Judicializado=='no')?'checked':'');?>>
					<span>No</span>	
				</form>
			</div> </br>
			
			<h3>&#9658; Direcci�n</h3>
			<textarea><?=$this->objFolio->Direccion;?></textarea>
			
			<h3>&#9658; Otras referencias barriales necesarias para ubicar el barrio</h3>
			<textarea></textarea>
			
			<h3>&#9658; Adjuntar foto</h3>
			<input>
			<div id="uso_int">
				</br>
				<h3>Uso interno</h3>
				<div>
					<span>Situaci�n Registral</span></br>
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
								<small>No corresponde inscripci�n</small>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->ResolucionInscripcionProvisoria)>0)?'checked':'');?>>
								<small>Inscripci�n provisoria</small></br>
							</td>
							<td>
								<small>N� de Resoluci�n</small>
								<input value="<?=$this->objUsoInterno->ResolucionInscripcionProvisoria;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->ResolucionInscripcionDefinitiva)>0)?'checked':'');?>>
								<small>Inscripci�n definitiva</small></br>
							</td>
							<td>
								<small>N� de Resoluci�n</small>
								<input value="<?=$this->objUsoInterno->ResolucionInscripcionDefinitiva;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" <?php echo ((strlen($this->objUsoInterno->NumExpediente)>0)?'checked':'');?>>
								<small>N� Expediente</small>
							</td>
							<td>
								<input value="<?=$this->objUsoInterno->NumExpediente;?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		


