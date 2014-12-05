
 <?php $folio=QApplication::QueryString("id"); ?>   
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" >
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>">
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>">                    
                    <span class="number">2.</span> Nomenclatura
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>">
                    <span class="number">3.</span>Condiciones Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/regularizacion/folio/<?=$folio;?>">
                    <span class="number">4.</span> Regularización
                </a>
            </li>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-3" href="#">
                    <span class="number">-</span> Uso Interno
                </a>
            </li>
        </ul>
    </div>

    <div>     
        <div class="titulos"><i class="icon-chevron-right"> Situación Registral</i></div>        
        <div class="well bs-component">
			<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
            <?php $_CONTROL->chkNoCorrespondeInscripcion->RenderWithName(); ?>
            <?php $_CONTROL->txtResolucionInscripcionProvisoria->RenderWithName(); ?>
            <?php $_CONTROL->txtResolucionInscripcionDefinitiva->RenderWithName(); ?>
            <?php $_CONTROL->chkMapeoPreliminar->RenderWithName(); ?>
         </div>    
        
        <div class="titulos"><i class="icon-chevron-right"> Condiciones Socio-Urbanísticas</i></div> 
        <div class="well bs-component">
            <?php $_CONTROL->txtInformeUrbanisticoFecha->RenderWithName(); ?>
        </div>

        <div class="titulos"><i class="icon-chevron-right"> Regularización</i></div>   
        	<div class="well bs-component"> 
            <?php $_CONTROL->calRegularizacionFechaInicio->RenderWithName(); ?>
            <?php $_CONTROL->chkRegularizacionTienePlano->RenderWithName(); ?>
            <?php $_CONTROL->chkRegularizacionCircular10Catastro->RenderWithName(); ?>
            <?php $_CONTROL->txtRegularizacionAprobacionGeodesia->RenderWithName(); ?>
            <?php $_CONTROL->txtRegularizacionRegistracion->RenderWithName(); ?>
            <?php $_CONTROL->txtRegularizacionEstadoProceso->RenderWithName(); ?>
            <?php $_CONTROL->txtNumExpediente->RenderWithName(); ?>
       		</div>

    </div>
</div>

  
	



