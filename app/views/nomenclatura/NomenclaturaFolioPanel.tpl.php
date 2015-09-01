<?php $folio=QApplication::QueryString("id"); ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>" id="wizard-t-0">                    
                    <span class="number">1.</span> Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-1" href="#" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    <span class="number">3.</span>Condiciones Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/regularizacion/folio/<?=$folio;?>">
                    <span class="number">4.</span> Regularización e integración socio-urbana
                </a>
            </li>
<?php if(Permission::PuedeVerHoja5()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/interno/folio/<?=$folio;?>">
                    <span class="number">5.</span> Uso Interno
                </a>
            </li>
<?php } ?>
        </ul>
    </div>

    <?php if(Permission::EsDuplicado($folio)){ ?>
    <div class="alert alert-danger" role="alert">
       <span class="icon-exclamation-sign" aria-hidden="true"></span>              
        Este Folio es un duplicado
    </div>
    <?php } ?>


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
                    
                    
                    <?php if(Permission::EsUsoInterno(array("uso_interno_nomencla"))){ ?>
                    <div class="alert alert-danger msg-nomenclatura" role="alert">
                      <span class="icon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only"></span>
                     <?php $_CONTROL->btnRecalcular->Render(); ?>
                    </div>
                     <?php } ?>
                    <?php } ?>
                </p> 
                
    </div>

    
    
</div>


