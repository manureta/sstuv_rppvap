<?php $folio=QApplication::QueryString("id"); ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="/registro/folio/view/<?=$folio;?>" id="wizard-t-0">                    
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-1" href="#" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura Catastral
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="/registro/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    <span class="number">3.</span>Condiciones Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="/registro/regularizacion/folio/<?=$folio;?>">
                    <span class="number">4.</span> Regularización
                </a>
            </li>
        </ul>
    </div>
    <div>
                
                <div class="well bs-component">   
				<?php $_CONTROL->dtgNomenclaturas->Render(); ?>
				<p><?php $_CONTROL->btnCreateNew->Render('CssClass="btn btn-yellow btn-create-indexpanel"'); ?></p>
                <p><?php $_CONTROL->btnParcelas->Render('CssClass="btn btn-red btn-create-indexpanel"'); ?></p>
				<?php 
					if ($_CONTROL->pnlEditNomenclatura) {
						$_CONTROL->pnlEditNomenclatura->Render();
						} 
				?>

				</div>

                
    </div>
    <div class="botones-form"></div>
</div>

