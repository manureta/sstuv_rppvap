 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-0" href="#wizard-h-0" id="wizard-t-0">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="disabled" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-1" href="#wizard-h-1" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura
                </a>
            </li>
            <li role="tab" class="disabled" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="#wizard-h-2" id="wizard-t-2">
                    <span class="number">3.</span>Cond. Socio-Urbanisticas
                </a>
            </li>
            <li role="tab" class="disabled last" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="#wizard-h-3" id="wizard-t-3">
                    <span class="number">4.</span> Regulacion
                </a>
            </li>
        </ul>
    </div>

    <div class="content clearfix">
                <h2 id="wizard-h-0" tabindex="-1" class="title current">First Step</h2>
                <section id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="true" style="left: -1479px; display: block;">
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
                <section id="wizard-p-1" role="tabpanel" aria-labelledby="wizard-h-1" class="body" style="display: none; left: 0px;" aria-hidden="true">
                    <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque. 
                        In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum 
                        dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur. 
                        In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam. 
                        Donec non pulvinar urna. Aliquam id velit lacus.</p>
                </section>

                <h2 id="wizard-h-2" tabindex="-1" class="title">Third Step</h2>
                <section id="wizard-p-2" role="tabpanel" aria-labelledby="wizard-h-2" class="body" style="display: none;" aria-hidden="true">
                    <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                        pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat. 
                        Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                        venenatis.</p>
                </section>

                <h2 id="wizard-h-3" tabindex="-1" class="title">Forth Step</h2>
                <section id="wizard-p-3" role="tabpanel" aria-labelledby="wizard-h-3" class="body" style="display: none;" aria-hidden="true">
                    <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                        Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                        Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                </section>
            </div>
    </div>


     
		

<div id="botones" class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>



