<?php $folio=QApplication::QueryString("id"); ?>	
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="/registro/folio/<?=$folio;?>" id="wizard-t-0">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true" aria-selected="false">
                <a aria-controls="wizard-p-1" href="/registro/nomenclatura/folio/<?=$folio;?>" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura Catastral
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false">
                <a aria-controls="wizard-p-2" href="/registro/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    <span class="number">3.</span>Cond. Socio-Urbanisticas
                </a>
            </li>
            <li role="tab" class="current" aria-selected="true">
                <a aria-controls="wizard-p-3" href="#" id="wizard-t-3">
                    <span class="number">4.</span> Regularización
                </a>
            </l
        </ul>
    </div>
    <div class="content clearfix">
                <h2 id="wizard-h-0" tabindex="-1" class="title current">First Step</h2>
                <section id="tab-1" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="true" style="display: block;">               
				        <?php //$_CONTROL->lblId->RenderWithName(); ?>
                        <?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkProcesoIniciado->RenderWithName(); ?>
                        <?php $_CONTROL->lstAntecedentesAsIdFolio->RenderWithName(); ?>

				</section>

                
    </div>
</div>

<div class="botones-form">

</div>