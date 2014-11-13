 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-0" href="#" id="wizard-t-0">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="disabled" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-1" href="#" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura
                </a>
            </li>
            <li role="tab" class="disabled" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="#" id="wizard-t-2">
                    <span class="number">3.</span>Cond. Socio-Urbanisticas
                </a>
            </li>
            <li role="tab" class="disabled last" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="#" id="wizard-t-3">
                    <span class="number">4.</span> Regulacion
                </a>
            </li>
        </ul>
    </div>

    <div class="content clearfix">
                <h2 id="wizard-h-0" tabindex="-1" class="title current">First Step</h2>
                <section id="tab-1" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="true" style="display: block;">
                    <?php $_CONTROL->txtCodFolio->RenderWithName(); ?>
					<?php $_CONTROL->lstIdPartidoObject->RenderWithName(); ?>
					<?php $_CONTROL->lstIdLocalidadObject->RenderWithName(); ?>
					<?php $_CONTROL->txtMatricula->RenderWithName(); ?>
					
					<?php $_CONTROL->txtEncargado->RenderWithName(); ?>
					<?php $_CONTROL->txtNombreBarrioOficial->RenderWithName(); ?>
					<?php $_CONTROL->txtNombreBarrioAlternativo1->RenderWithName(); ?>
					<?php $_CONTROL->txtNombreBarrioAlternativo2->RenderWithName(); ?>
					<?php $_CONTROL->txtAnioOrigen->RenderWithName(); ?>
					<?php $_CONTROL->txtSuperficie->RenderWithName(); ?>
					<?php $_CONTROL->txtCantidadFamilias->RenderWithName(); ?>
					<?php $_CONTROL->lstTipoBarrioObject->RenderWithName(); ?>
					<?php $_CONTROL->txtObservacionCasoDudoso->RenderWithName(); ?>
					<?php $_CONTROL->txtJudicializado->RenderWithName(); ?>
					<?php $_CONTROL->txtDireccion->RenderWithName(); ?>
					<?php $_CONTROL->txtNumExpedientes->RenderWithName(); ?>
					
                </section>

                <h2 id="wizard-h-1" tabindex="-1" class="title">Second Step</h2>
                <section id="tab-2" role="tabpanel" aria-labelledby="wizard-h-1" class="body" style="display: none; left: 0px;" aria-hidden="true">
                    
                </section>

                <h2 id="wizard-h-2" tabindex="-1" class="title">Third Step</h2>
                <section id="tab-3" role="tabpanel" aria-labelledby="wizard-h-2" class="body" style="display: none;" aria-hidden="true">
                    
                </section>

                <h2 id="wizard-h-3" tabindex="-1" class="title">Forth Step</h2>
                <section id="tab-4" role="tabpanel" aria-labelledby="wizard-h-3" class="body" style="display: none;" aria-hidden="true">                    
                </section>
    </div>
</div>

  
	



