<?php $folio=QApplication::QueryString("id"); ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="/registro/folio/view/<?=$folio;?>" id="wizard-t-0">                    
                    <span class="number">1.</span> Datos Generales del barrio
                </a>
            </li>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-1" href="#" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="/registro/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    <span class="number">3.</span>Condiciones Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="/registro/regularizacion/folio/<?=$folio;?>">
                    <span class="number">4.</span> Integración socio-urbana
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="/registro/interno/folio/<?=$folio;?>">
                    <span class="number">5.</span> Uso Interno
                </a>
            </li>
        </ul>
    </div>
    <div class="index_nomenclaturas">
                
                <div class="well bs-component">
				<?php $_CONTROL->dtgNomenclaturas->Render(); ?>
				

				<?php 
					if ($_CONTROL->pnlEditNomenclatura) {
						$_CONTROL->pnlEditNomenclatura->Render();
						} 
				?>

				</div>             
                <p><?php $_CONTROL->btnCreateNew->Render('CssClass="btn btn-yellow btn-create-indexpanel"'); ?>
                    <?php if(!($_CONTROL->pnlEditNomenclatura)){ ?>
                    <div class="alert alert-info msg-nomenclatura" role="alert">
                      <span class="icon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only"></span>
                     <?php $_CONTROL->btnAnalizar->Render(); ?>
                    </div>
                    
                    <div class="alert alert-info msg-nomenclatura" role="alert">
                      <span class="icon-map-marker" aria-hidden="true"></span>
                      <span class="sr-only"></span>
                     <?php $_CONTROL->btnMapa->Render(); ?>
                    </div>
                    <?php } ?>
                </p> 
                
    </div>

    
    
</div>


