</br>
</br>
		<div class="cont">
			<h2>Condiciones socio-urban�sticas</h2>
			</br>
			<h3>&#9658; �El barrio cuenta con espacio libre com�n?</h3>
			<form id="esp_lib">
				<span>Si</span>
				<input type="checkbox" <?php echo (($this->objCond->EspacioLibreComun)?'checked':'');?>>
				<span>No</span>
				<input type="checkbox" <?php echo ((!$this->objCond->EspacioLibreComun)?'checked':'');?>>
				<span>No consigna</span>
				<input type="checkbox">
			</form>
			
			<h3>&#9658; Equipamientos p�blicos comunitarios</h3>
			<small>(Tildar la opci�n que corresponda)</small></br>
			<table>
				<tr>
					<th></th>
					<th>Inexistente</th>
					<th>Dentro del barrio</th>
					<th>Pr�ximo al barrio</th>
					<th>Distante > 1km</th>
				</tr>
				<tr>
					<td>Unidad sanitaria/Hospital</td>
					<td><input type="checkbox" <?php echo (($this->objEquip->UnidadSanitaria==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->UnidadSanitaria==1)?'checked':'');?> ></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->UnidadSanitaria==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->UnidadSanitaria==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Jardin de infantes</td>
					<td><input type="checkbox" <?php echo (($this->objEquip->JardinInfantes==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->JardinInfantes==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->JardinInfantes==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->JardinInfantes==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Escuela primaria</td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaPrimaria==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaPrimaria==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaPrimaria==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaPrimaria==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Esc. secundaria</td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaSecundaria==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaSecundaria==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaSecundaria==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->EscuelaSecundaria==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Comedor</td>
					<td><input type="checkbox" <?php echo (($this->objEquip->Comedor==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->Comedor==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->Comedor==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->Comedor==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Sal�n de usos m�ltiples y/o Centro de Integraci�n comunitaria</td>
					<td><input type="checkbox" <?php echo (($this->objEquip->CentroIntegracionComunitaria==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->CentroIntegracionComunitaria==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->CentroIntegracionComunitaria==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objEquip->CentroIntegracionComunitaria==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Otro</td>
				</tr>
			</table>
			<input value="<?=$this->objEquip->Otro;?>" style="margin-left:40px;"></br>
			
			<h3>&#9658; Transporte p�blico</h3>
			<small>(Tildar la opci�n que corresponda)</small></br>
			<table>
				<tr>
					<th></th>
					<th>Inexistente</th>
					<th>Dentro del barrio</th>
					<th>Pr�ximo al barrio</th>
					<th>Distante > 1km</th>
				</tr>
				<tr>
					<td>Colectivos</td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Colectivos==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Colectivos==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Colectivos==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Colectivos==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Ferrocarril</td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Ferrocarril==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Ferrocarril==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Ferrocarril==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->Ferrocarril==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Remis/Combis</td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->RemisCombis==4)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->RemisCombis==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->RemisCombis==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objTransporte->RemisCombis==3)?'checked':'');?>></td>
				</tr>
			</table>
			
			<h3>&#9658; Infraestructura y servicios urbanos</h3>
			<small>(Tildar la opci�n que corresponda)</small></br>
			<table>
				<tr>
					<th></th>
					<th>Inexistente</th>
					<th>Dentro del barrio</th>
					<th>Pr�ximo al barrio</th>
				</tr>
				<tr>
					<td>Energ�a el�ctrica medidor individual</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorIndividual==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorIndividual==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorIndividual==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Energ�a el�ctrica medidor colectivo</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorColectivo==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorColectivo==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->EnergiaElectricaMedidorColectivo==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Alumbrado p�blico</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AlumbradoPublico==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AlumbradoPublico==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AlumbradoPublico==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Agua corriente</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaCorriente==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaCorriente==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaCorriente==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Agua potable (no de red)</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaPotable==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaPotable==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->AguaPotable==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Red cloacal</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedCloacal==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedCloacal==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedCloacal==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Sistema alternativo de eliminaci�n de excretas</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->SistAlternativoEliminacionExcretas==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->SistAlternativoEliminacionExcretas==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->SistAlternativoEliminacionExcretas==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Red de gas</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedGas==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedGas==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RedGas==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Pavimento</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->Pavimento==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->Pavimento==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->Pavimento==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Cord�n cuneta</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->CordonCuneta==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->CordonCuneta==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->CordonCuneta==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Desag�es pluviales</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->DesaguesPluviales==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->DesaguesPluviales==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->DesaguesPluviales==3)?'checked':'');?>></td>
				</tr>
				<tr>
					<td>Recoleci�n de residuos</td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RecoleccionResiduos==1)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RecoleccionResiduos==2)?'checked':'');?>></td>
					<td><input type="checkbox" <?php echo (($this->objInfraestructura->RecoleccionResiduos==3)?'checked':'');?>></td>
				</tr>
			</table>
			
			<h3>&#9658; Presencia de organizaciones sociales, barriales, pol�tica, religiosa u otra</h3></br>
			<small style="margin-left:40px">(Aclarar nombre de la/s organizaciones que participan, tipo de acci�n, etc.)</small>
			<textarea><?=$this->objCond->PresenciaOrgSociales; ?></textarea>
			
			<h3>&#9658; Contacto del referente</h3>
			<small>(Indicar nombre y tel�fono)</small>
			<textarea><?=$this->objCond->NombreRefernte; ?> / <?=$this->objCond->TelefonoReferente; ?></textarea>
			
			
			<h3>&#9658; Situaci�n ambiental del barrio</h3>
			<small>(Puede marcarse m�s de una opci�n)</small></br>
			<form id="sit_amb">
				<input type="checkbox" <?php echo (($this->objAmbiental->SinProblemas)?'checked':'');?>>
				<small>Sin problemas ambientales</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->Inundable)?'checked':'');?>>
				<small>Inundable</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->SobreCaminoSirga)?'checked':'');?>>
				<small>Sobre camino de Sirga</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->SobreSueloDegradado)?'checked':'');?>>
				<small>Sobre suelo degradado</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->ReservaElectroducto)?'checked':'');?>>
				<small>Reserva electroducto</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->SobreTerraplenFerroviario)?'checked':'');?>>
				<small>Sobre terraplen ferroviario</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->ExpuestoContaminacionIndustrial)?'checked':'');?>>
				<small>Expuesto a contaminaci�n industrial</small>
				<input type="checkbox" <?php echo (($this->objAmbiental->Otro)?'checked':'');?>>
				<small>Otra situaci�n, cu�l?</small>
			</form>
			<small style="margin-left:40px;">Observaciones de otra situaci�n, cu�l?</small>
			<textarea></textarea>
			
			<div id="uso_int">
				</br>
				<h3>Uso interno</h3>
				<div>
					<span>�Cuenta con informe urban�stico de la SSTUV?</span>
					<form id="esp_lib">
						<span>Si</span>
						<input type="checkbox">
						<span>No</span>
						<input type="checkbox">
					</form>
					<span>Fecha del informe</span>
					<input style="width:50px;">
					
					<input>
					<span>Adjuntar Archivo</span>
					
				</div>
			</div>
		</div>
	

