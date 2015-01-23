
	<page size="A4">
		<div class="encabezado">
			<img src="assets/images/header.png" width="100%">
		</div>
		<div class="cont cond">
			<h2>Regularizaci&oacute;n e integraci&oacute;n soco-urbana</h2>
			</br>
			<h3>&#9658; Se ha iniciado un proceso de regularizaci&oacute;n en el barrio?</h3>
			<form id="esp_lib">
				<span>Si</span>
				<input type="checkbox" <?php echo (($this->objRegularizacion->ProcesoIniciado)?'checked':'');?>>
				<span>No</span>
				<input type="checkbox" <?php echo ((!$this->objRegularizacion->ProcesoIniciado)?'checked':'');?>>
			</form>
			</br>
			<h3>&#9658; Encuadre legal</h3>
			</br>
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
				<small>Expropiaci&oacute;n</small>
				<input value="<?=(strlen($this->objEncuadre->Expropiacion)>0)?$this->objEncuadre->Expropiacion:'Nro. de expropiaci&oacute;n';?>" style="margin-left:1px;width:150px">
			</br>
				<input type="checkbox" <?php echo ((strlen($this->objEncuadre->Otros)>0)?'checked':'');?>>
				<small>Otros &iquest;Cuales?</small>
				<input style="width:300px" value="<?=(strlen($this->objEncuadre->Otros)>0)?$this->objEncuadre->Otros:'Otros &iquest;Cu&aacute;les?';?>" ></br>
			
				
			</form>

			</br>
			
			<h3>&#9658; Antecedentes en intervenci&oacute;n p&uacute;blicas en materia habitacional</h3></br>
			</br>
			<form id="sit_amb" class="antec">
				<input type="checkbox" <?php echo (($this->objAntecedentes->SinIntervencion)?'checked':'');?>>
				<small>Sin antecedentes de intervenci&oacute;n</small>
				<input type="checkbox" <?php echo (($this->objAntecedentes->ObrasInfraestructura)?'checked':'');?>>
				<small>Obras de Infraestructura</small></br>
				<input type="checkbox" <?php echo (($this->objAntecedentes->Equipamientos)?'checked':'');?>>
				<small>Equipamientos</small>
				<input type="checkbox" <?php echo (($this->objAntecedentes->IntervencionesEnViviendas)?'checked':'');?>>
				<small>Intervenci&oacute;n en vivienda</small></br>
				<input type="checkbox" <?php echo ((strlen($this->objAntecedentes->Otros)>0)?'checked':'');?>>
				<small>Otros &iquest;Cu&aacute;les?</small>
			</form>
			<input value="<?=(strlen($this->objAntecedentes->Otros)>0)?$this->objAntecedentes->Otros:'Otros &iquest;Cu&aacute;les?';?>" style="margin-left:56px"></br>
			</br>
			<h3>&#9658; Organismos de intervenci&oacute;n</h3>
			</br>
			<form id="sit_amb">
				<input type="checkbox" <?php echo (($this->objOrg->Nacional)?'checked':'');?>>
				<small>Nacional</small></br>
				<input type="checkbox" <?php echo (($this->objOrg->Provincial)?'checked':'');?>>
				<small>Provincial</small></br>
				<input type="checkbox" <?php echo (($this->objOrg->Municipal)?'checked':'');?>>
				<small>Municipal</small>
			</form>
			
			<h3>&#9658; A trav&eacute;s de que programas</h3></br>
			<textarea style="height:90px;"><?php echo $this->objOrg->Programas;?></textarea>
			
			<h3>&#9658; Fecha de intervenci&oacute;n</h3>
			<input style="width:130px" value=<?=($this->objOrg->FechaIntervencion)?$this->objOrg->FechaIntervencion:'';?>>
			
			<div id="uso_int">
				</br>
				<h3>Uso interno</h3>
				<div>
					<small>&iquest;Cuenta con plano en tr&aacute;mite en la SSTUV?</small>
					<form id="esp_lib" style="margin-left:15px;">
						<small>Si</small>
						<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionTienePlano=='si')?'checked':'');?>>
						<small>No</small>
						<input type="checkbox"<?php echo (($this->objUsoInterno->RegularizacionTienePlano=='no')?'checked':'');?>>
					</form>
					
					<div class="right">
						<small>Fecha del informe</small>
						<input style="width:70px;" value="<?=($this->objUsoInterno->RegularizacionFechaInicio)?$this->objUsoInterno->RegularizacionFechaInicio->format('d-m-Y'):'';?>"></br>
					</div>
					</br>
					</br>
					<small>Circular 10 Catastro</small>
					<form id="esp_lib" style="margin-left:132px">
						<small>Si</small>
						<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionCircular10Catastro)?'checked':'');?>>
						<small>No</small>
						<input type="checkbox" <?php echo ((!$this->objUsoInterno->RegularizacionCircular10Catastro)?'checked':'');?>>
					</form>
					</br></br>
					
					<small>Aprobaci&oacute;n de Geodesia. Nro. de plano</small>			
					<small style="margin-left:30px">Partido</small>
					<input style="width:50px" value=<?=($this->objUsoInterno->GeodesiaPartido);?>>
					<small>N&deg;</small>
					<input style="width:80px" value=<?=($this->objUsoInterno->GeodesiaNum);?>>
					<small>A&ntilde;o</small>
					<input style="width:50px" value=<?=($this->objUsoInterno->GeodesiaAnio);?>>
					</br></br>
					
					<small>Registraci&oacute;n</small>
					<small style="margin-left:158px">Legajo</small>
					<input style="width:80px" value=<?=($this->objUsoInterno->RegistracionLegajo);?>>
					<small>Folio</small>
					<input style="width:80px" value=<?=($this->objUsoInterno->RegistracionFolio);?>>
					<small>Fecha</small>
					<input style="width:80px"value=<?=($this->objUsoInterno->RegistracionFecha);?>>
					</br></br>

					<small>&iquest;Cuenta con censo de la SSTUV?</small>
					<form id="esp_lib" style="margin-left:59px">
						<small>Si</small>
						<input type="checkbox" <?php echo (($this->objUsoInterno->TieneCenso=='si')?'checked':'');?>>
						<small>No</small>
						<input type="checkbox" <?php echo (($this->objUsoInterno->TieneCenso=='no')?'checked':'');?>>
					</form>
					<small>Fecha</small>
					<input style="margin-left:20px" style="width:80px" value="<?=($this->objUsoInterno->FechaCenso);?>">
					</br></br>
					
					<div style="background-color:#21202E;padding:16px;margin:6px -15px">
						<small>Estado del proceso de regularizaci&oacute;n</small></br>
						<form id="sit_amb">
							<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionEstadoProceso==1)?'checked':'');?>>
							<small>Iniciado</small></br>
							<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionEstadoProceso==2)?'checked':'');?>>
							<small style="width:auto">Acta de regularizaci&oacute;n / certificado de preadjudicaci&oacute;n / Boleto</small></br>
							<input type="checkbox" <?php echo (($this->objUsoInterno->RegularizacionEstadoProceso==3)?'checked':'');?>>
							<small>Escriturado</small>
						</form>
					</div>
					
					<small>Intervencion ley 14.449</small>
						
					<form id="esp_lib" style="margin-left:120px">
						<small>Si</small>
						<input type="checkbox" <?php echo (($this->objUsoInterno->Ley14449=='si')?'checked':'');?>>
						<small>No</small>
						<input type="checkbox" <?php echo (($this->objUsoInterno->Ley14449=='no')?'checked':'');?>>
						
					</form>
					
					
					
				</div>
			</div>
		</div>
	

</page>
