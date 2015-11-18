<?php $folio=QApplication::QueryString("id"); ?>

  <div id="steps-tabs-folio" class="wizard clearfix">
    <div class="steps">


          <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>" id="wizard-t-0">
                     Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>" id="wizard-t-1">
                    Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    Condiciones Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/regularizacion/folio/<?=$folio;?>">
                    Regularización e integración socio-urbana
                </a>
            </li>
             <li role="tab" class="current" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="#">
                    Censo y Adjudicación
                </a>
            </li>
          <?php if(Permission::PuedeVerComentarios()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/comentarios/folio/<?=$folio;?>">
                   Comentarios
                </a>
            </li>
          <?php } ?>
          <?php if(Permission::PuedeVerHoja5()){ ?>
            <li role="tab" class="stepwizard-step done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/interno/folio/<?=$folio;?>">
                    Uso Interno
                </a>
            </li>
          <?php } ?>
        </ul>
    </div>
  </div>


    <?php if(Permission::EsDuplicado($folio)){ ?>
    <div class="alert alert-danger" role="alert">
       <span class="icon-exclamation-sign" aria-hidden="true"></span>
        Este Folio es un duplicado de <?=$_CONTROL->txtCodFolioOriginal;?>
    </div>
    <?php } ?>

    <div class="index_nomenclaturas">
        <div class="well bs-component">
      		<?php $_CONTROL->dtgHogares->Render(); ?>
      		<p><?php $_CONTROL->btnCreateNew->Render('CssClass="btn btn-yellow btn-create-indexpanel"'); ?></p>
      		<?php
      				if ($_CONTROL->pnlEditHogar) {
      					$_CONTROL->pnlEditHogar->Render();
      					}
      		?>
        </div
	</div>
