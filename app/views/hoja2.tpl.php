
<page size="A4">
<div class="cont">
	<h2>Nomenclatura/partida/dominio</h2>
	<div class="nomenclaturas">
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
					
					<small style="margin-left:3px">Partida Inmobiliaria</small>
					<small style="margin-left:150px">Titular de dominio</small></br>
					<input style="width:130px;margin-left:3px;"value="<?=$this->arrNom[$i]->PartidaInmobiliaria;?>">
					<input style="width:482px;margin-left:20px;" value="<?=$this->arrNom[$i]->TitularDominio;?>"></br>
					<input type="checkbox" <?php echo (($this->arrNom[$i]->DatoVerificadoRegPropiedad)?'checked':'');?>>
					<small>Dato verficado en el Registro de la Propiedad</small>
				</li>
				<?php endfor; ?>
			</ol>
		</div>
</div>		
</page>