<?php $folio=QApplication::QueryString("id"); ?>	
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="/registro/folio/view/<?=$folio;?>" id="wizard-t-0">
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
    <h6>Regularización</h6>
    <div class="content_small clearfix">
                
                <section>               				        
                        <?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkProcesoIniciado->RenderWithName(); ?>
                        
                </section>        
    </div>

    <h6>Encuadre Legal</h6>
    <div class="content clearfix">
                <section>                    
                        <?php $_CONTROL->pnlEncuadre->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto222595->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey24374->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto81588->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey23073->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto468696->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtExpropiacion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtOtros->RenderWithName(); ?>
                </section>
    </div>    

    <h6>Antecedentes</h6>       
    <div class="content clearfix"> 
                <section>        
                        
                        <?php $_CONTROL->pnlAntecedentes->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkSinIntervencion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkObrasInfraestructura->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkEquipamientos->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkIntervencionesEnViviendas->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->txtOtros->RenderWithName(); ?>
                </section>
    </div>
    <h6>Organismos de intervencion</h6>
    <div class="content clearfix">            
                <section>        
                        
                        <?php $_CONTROL->pnlOrganismos->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlOrganismos->chkNacional->RenderWithName(); ?>
                        <?php $_CONTROL->pnlOrganismos->chkProvincial->RenderWithName(); ?>
                        <?php $_CONTROL->pnlOrganismos->chkMunicipal->RenderWithName(); ?>
                        <?php $_CONTROL->pnlOrganismos->calFechaIntervencion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlOrganismos->txtProgramas->RenderWithName(); ?>
                        <?php $_CONTROL->pnlOrganismos->txtObservaciones->RenderWithName(); ?>
				</section>
    </div>            
                
   
</div>

<div class="botones-form">

</div>