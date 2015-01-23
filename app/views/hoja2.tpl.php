
<page size="A4">
<div class="encabezado">
			<img src="assets/images/header.png" width="100%">
</div>
<div class="cont cond">
	<h2>Nomenclatura/partida/dominio</h2>
	<div class="nomenclaturas">
	<ol>
				<?php $page=0;?>
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
						<input value="<?php echo $this->limpiar_ceros($i,'mza'); ?>"></br>
					</div>
					<div>
						<small>Parc</small></br>
						<input value="<?php echo $this->limpiar_ceros($i,'parc'); ?>"></br>
					</div>
				</li>
				<div class="pie_li">
					<small style="margin-left:3px">Partida Inmobiliaria</small>
					<small style="margin-left:90px">Titular de dominio</small></br>
					<input style="width:130px;margin-left:3px;"value="<?=$this->arrNom[$i]->PartidaInmobiliaria;?>">
					<input style="width:530px;margin-left:35px;" value="<?=$this->arrNom[$i]->TitularDominio;?>"></br>
					<input type="checkbox" <?php echo (($this->arrNom[$i]->DatoVerificadoRegPropiedad)?'checked':'');?>>
					<small>Dato verificado RPBA</small>
					<small style="margin-left:58px">Inscripción de dominio</small>
					<input style="width:530px;float:right; margin-right:31px;" value="<?=$this->arrNom[$i]->InscripcionDominio;?>"></br>
				
				</br>
				</div>
				<?php $page++; ?>
					<?php if($page%7==0): ?>
					</br></br></br></br>
					</ol>
					</div>
					</div>		
					</page>
				
					<page size="A4">
						<div class="encabezado">
						<img src="assets/images/header.png" width="100%">
					</div>
					<div class="cont cond">
					<div class="nomenclaturas">
					<ol start="<?=$page+1;?>">		
				<?php endif; ?>
				<?php endfor; ?>
				</br></br></br></br>
			</ol>
		</div>
</div>		
</page>