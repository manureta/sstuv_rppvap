 <?php 
    if($_CONTROL->txtCodFolio->ActionParameter){
        
        $folio=$_CONTROL->txtCodFolio->ActionParameter;
        $link_nomenclatura="/registro/nomenclatura/folio/$folio";
        $link_condiciones="/registro/condiciones/folio/$folio";
        $link_regularizacion="/registro/regularizacion/folio/$folio";
        $clase="done";
    }else{
        
        $link_nomenclatura="#";
        $link_condiciones="#";
        $link_regularizacion="#";
        $clase="disabled";
    }; 

 ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-0" href="#">
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="<?=$clase;?>" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?=$link_nomenclatura;?>">                    
                    <span class="number">2.</span> Nomenclatura
                </a>
            </li>
            <li role="tab" class="<?=$clase;?>" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="<?=$link_condiciones;?>">
                    <span class="number">3.</span>Cond. Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="<?=$clase;?>" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?=$link_regularizacion;?>">
                    <span class="number">4.</span> Regularización
                </a>
            </li>
        </ul>
    </div>

    <div>                
        <div class="well bs-component">
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
			
        </div>

    </div>
</div>

  
	



