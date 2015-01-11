
	<page size="A4">
		<div class="cont">
			<h2>Regularización e integración soco-urbana</h2>
			</br>
			<h3>&#9658; Se ha iniciado un proceso de regularización en el barrio?</h3>
			<form id="esp_lib">
				<span>Si</span>
				<input type="checkbox" <?php echo (($this->objRegularizacion->ProcesoIniciado)?'checked':'');?>>
				<span>No</span>
				<input type="checkbox" <?php echo ((!$this->objRegularizacion->ProcesoIniciado)?'checked':'');?>>
			</form>
			
			<h3>&#9658; Encuadre legal</h3>
			<small>(Se puede seleccionar más de una opción)</small></br>
			<form id="sit_amb">
				<input type="checkbox" <?php echo (($this->objEncuadre->Decreto222595)?'checked':'');?>>
				<small>Decreto 2225/95</small>

				<input type="checkbox" <?php echo (($this->objEncuadre->Decreto81588)?'checked':'');?>>
				<small>Decreto 815/88(Pro Tierra)</small>

				<input type="checkbox" <?php echo (($this->objEncuadre->Decreto468696)?'checked':'');?>>
				<small>Decreto 4686/96</small>
			</br>
				<input type="checkbox" <?php echo (($this->objEncuadre->Ley24374)?'checked':'');?>>
				<small>Ley 24.374</small>

				<input type="checkbox" <?php echo (($this->objEncuadre->Ley23073)?'checked':'');?>>
				<small>Ley 23.073</small>

				<input type="checkbox" <?php echo (($this->objEncuadre->Ley14449)?'checked':'');?>>
				<small>Ley 14.449</small>
			</br>	

				<input type="checkbox" <?php echo (($this->objEncuadre->TieneExpropiacion)?'checked':'');?>>
				<small>Expropiación</small>
				<input value="<?=(strlen($this->objEncuadre->Expropiacion)>0)?$this->objEncuadre->Expropiacion:'Nro. de expropiación';?>" style="margin-left:1px;width:150px">
			</br>
				<input type="checkbox" <?php echo ((strlen($this->objEncuadre->Otros)>0)?'checked':'');?>>
				<small>Otros ¿Cuales?</small>
				<input style="width:300px" value="<?=(strlen($this->objEncuadre->Otros)>0)?$this->objEncuadre->Otros:'Otros ¿Cuáles?';?>" ></br>
			
				
			</form>

			
			
			<h3>&#9658; Antecedentes en intervención públicas en materia habitacional</h3></br>
			<small style="margin-left:40px">(Se puede seleccionar más de una opción)</small></br>
			<form id="sit_amb" class="antec">
				<input type="checkbox" <?php echo (($this->objAntecedentes->SinIntervencion)?'checked':'');?>>
				<small>Sin antecedentes de intervención</small>
				<input type="checkbox" <?php echo (($this->objAntecedentes->ObrasInfraestructura)?'checked':'');?>>
				<small>Obras de Infraestructura</small></br>
				<input type="checkbox" <?php echo (($this->objAntecedentes->Equipamientos)?'checked':'');?>>
				<small>Equipamientos</small>
				<input type="checkbox" <?php echo (($this->objAntecedentes->IntervencionesEnViviendas)?'checked':'');?>>
				<small>Intervención en vivienda</small></br>
				<input type="checkbox" <?php echo ((strlen($this->objAntecedentes->Otros)>0)?'checked':'');?>>
				<small>Otros ¿Cuáles?</small>
			</form>
			<input value="<?=(strlen($this->objAntecedentes->Otros)>0)?$this->objAntecedentes->Otros:'Otros ¿Cuáles?';?>" style="margin-left:56px"></br>
			
			<h3>&#9658; Organismos de intervención</h3>
			<small>(Se puede seleccionar más de una opción)</small></br>
			<form id="sit_amb">
				<input type="checkbox" <?php echo (($this->objOrg->Nacional)?'checked':'');?>>
				<small>Nacional</small></br>
				<input type="checkbox" <?php echo (($this->objOrg->Provincial)?'checked':'');?>>
				<small>Provincial</small></br>
				<input type="checkbox" <?php echo (($this->objOrg->Municipal)?'checked':'');?>>
				<small>Municipal</small>
			</form>
			
			<h3>&#9658; A travéz de que programas</h3></br>
			<textarea style="height:90px;"><?php echo $this->objOrg->Programas;?></textarea>
			
			<h3>&#9658; Fecha de intervención</h3>
			<input style="width:50px" value=<?=($this->objOrg->FechaIntervencion)?$this->objOrg->FechaIntervencion->format('d'):'';?>>
			<input style="width:50px" value=<?=($this->objOrg->FechaIntervencion)?$this->objOrg->FechaIntervencion->format('m'):'';?>>
			<input style="width:50px" value=<?=($this->objOrg->FechaIntervencion)?$this->objOrg->FechaIntervencion->format('y'):'';?>>
			
			<div id="uso_int">
				</br>
				<h3>Uso interno</h3>
				<div style="background-color:#767583">
					<span>¿Cuenta con plano en trámite en la SSTUV?</span>
					<form id="esp_lib">
						<span>Si</span>
						<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionTienePlano=='si')?'checked':'');?>>
						<span>No</span>
						<input type="checkbox"<?php echo (($this->objUsoInterno->RegularizacionTienePlano=='no')?'checked':'');?>>
					</form>
					<span>Fecha del informe</span>
					<input style="width:70px;" value="<?=($this->objUsoInterno->RegularizacionFechaInicio)?$this->objUsoInterno->RegularizacionFechaInicio->format('d-m-y'):'';?>"></br>
					
					<span>Circular 10 Catastro</span>
					<form id="esp_lib" style="margin-left:175px">
						<span>Si</span>
						<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionCircular10Catastro)?'checked':'');?>>
						<span>No</span>
						<input type="checkbox" <?php echo ((!$this->objUsoInterno->RegularizacionCircular10Catastro)?'checked':'');?>>
					</form></br>
					<span>Aprobación de Geodesia. Nro. de plano</span>			
					<small style="margin-left:30px">Partido</small>
					<input style="width:50px" value=<?=($this->objUsoInterno->GeodesiaPartido);?>>
					<small>N°</small>
					<input style="width:80px" value=<?=($this->objUsoInterno->GeodesiaNum);?>>
					<small>Año</small>
					<input style="width:50px" value=<?=($this->objUsoInterno->GeodesiaAnio);?>></br>
					<span>Registración</span>
					<small style="margin-left:30px">Legajo</small>
					<input style="width:80px" value=<?=($this->objUsoInterno->RegistracionLegajo);?>>
					<small>Folio</small>
					<input style="width:80px" value=<?=($this->objUsoInterno->RegistracionFolio);?>>
					<small>Fecha</small>
					<input style="width:80px"value=<?=($this->objUsoInterno->RegistracionFecha);?>></br>
					<span>¿Cuenta con censo de la SSTUV?</span>
					<form id="esp_lib">
						<span>Si</span>
						<input type="checkbox" <?php echo (($this->objUsoInterno->TieneCenso=='si')?'checked':'');?>>
						<span>No</span>
						<input type="checkbox" <?php echo (($this->objUsoInterno->TieneCenso=='no')?'checked':'');?>>
					</form>
					<small>Fecha</small>
					<input style="width:80px" value="<?=($this->objUsoInterno->FechaCenso);?>"></br>
					<div style="background-color:#21202E;padding:16px;margin:6px -15px">
						<span>Estado del proceso de regularización</span></br>
						<form id="sit_amb">
							<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionEstadoProceso==1)?'checked':'');?>>
							<small>Iniciado</small></br>
							<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionEstadoProceso==2)?'checked':'');?>>
							<small style="width:auto">Acta de regularización / certificado de preadjudicación / Boleto</small></br>
							<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionEstadoProceso==3)?'checked':'');?>>
							<small>Escriturado</small>
						</form>
					</div>
					
					<span>Intervencion ley 14.449</span>
						
					<form id="esp_lib">
						<span>Si</span>
						<input type="checkbox" <?php echo (($this->objUsoInterno->Ley14449=='si')?'checked':'');?>>
						<span>No</span>
						<input type="checkbox" <?php echo (($this->objUsoInterno->Ley14449=='no')?'checked':'');?>>
						
					</form>
					
					
					
				</div>
			</div>
		</div>
	

</page>
