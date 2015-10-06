<?php $folio=QApplication::QueryString("id"); ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>" id="wizard-t-0">
                    <span class="number">1.</span> Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>" id="wizard-t-1">
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
            <li role="tab" class="current" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="#">
                    <span class="number">5.</span> Comentarios
                </a>
            </li>
<?php if(Permission::PuedeVerHoja5()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/interno/folio/<?=$folio;?>">
                    <span class="number">6.</span> Uso Interno
                </a>
            </li>
<?php } ?>
        </ul>
    </div>

    <?php if(Permission::EsDuplicado($folio)){ ?>
    <div class="alert alert-danger" role="alert">
       <span class="icon-exclamation-sign" aria-hidden="true"></span>
        Este Folio es un duplicado de <?=$_CONTROL->txtCodFolioOriginal;?>
    </div>
    <?php } ?>


    <div class="index_nomenclaturas">

        <div class="well bs-component">
        <?php $_CONTROL->dtgComentarioses->Render(); ?>


				<?php
					if ($_CONTROL->pnlEditComentarios) {
						$_CONTROL->pnlEditComentarios->Render();
						}
				?>

				</div>          
            <?php $_CONTROL->btnCreateNew->Render('CssClass="btn btn-yellow btn-create-indexpanel"'); ?>

    </div>



</div>
