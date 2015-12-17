<?php $folio=QApplication::QueryString("id"); ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">

    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>">
                    Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>">
                    Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>">
                    Condiciones Socio-Urbanísticas
                </a>
            </li>

            <?php if(Permission::PuedeVerConflictos()){ ?>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-2" href="#">
                    Conflictos y Judicialización
                </a>
            </li>
            <?php } ?>

            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/regularizacion/folio/<?=$folio;?>">
                    Regularización e integración socio-urbana
                </a>
            </li>

            <?php if(Permission::PuedeVerCenso()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/censo/folio/<?=$folio;?>">
                    Censo y Adjudicación
                </a>
            </li>
            <?php } ?>

            <?php if(Permission::PuedeVerComentarios()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/comentarios/folio/<?=$folio;?>">
                    Comentarios
                </a>
            </li>
            <?php } ?>

            <?php if(Permission::PuedeVerHoja5()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/interno/folio/<?=$folio;?>">
                    Uso Interno
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

<div class="titulos"><i class="icon-chevron-right"></i> Conflictos Habitacionales y Judicialización</div>
<div>
    <div class="well bs-component">
    		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
    		<?php $_CONTROL->chkIntervinoArea->RenderWithName(); ?>
    		<?php $_CONTROL->txtFueroInterviniente->RenderWithName(); ?>
    		<?php $_CONTROL->txtJuzgadoInterviniente->RenderWithName(); ?>
    		<?php $_CONTROL->txtCaratulaExpediente->RenderWithName(); ?>
    		<?php $_CONTROL->chkMinisterioDesarrollo->RenderWithName(); ?>
    		<?php $_CONTROL->txtMinisterioDesarrolloReferente->RenderWithName(); ?>
    		<?php $_CONTROL->chkDefensorPueblo->RenderWithName(); ?>
    		<?php $_CONTROL->txtDefensorPuebloReferente->RenderWithName(); ?>
    		<?php $_CONTROL->chkSecretariaNacional->RenderWithName(); ?>
    		<?php $_CONTROL->txtSecretariaNacionalReferente->RenderWithName(); ?>
    		<?php $_CONTROL->chkMunicipalidad->RenderWithName(); ?>
    		<?php $_CONTROL->txtMunicipalidadReferente->RenderWithName(); ?>
    		<?php $_CONTROL->chkOrganizacionBarrial->RenderWithName(); ?>
    		<?php $_CONTROL->txtOrganizacionBarrialReferente->RenderWithName(); ?>
    		<?php $_CONTROL->txtOtrosOrganismos->RenderWithName(); ?>
    		<?php $_CONTROL->chkOrdenDesalojo->RenderWithName(); ?>
    		<?php $_CONTROL->txtFechaEjecucion->RenderWithName(); ?>
    		<?php $_CONTROL->chkSuspensionHecho->RenderWithName(); ?>
    		<?php $_CONTROL->chkSolicitudSuspension->RenderWithName(); ?>
    		<?php $_CONTROL->txtFechaSuspension->RenderWithName(); ?>
    		<?php $_CONTROL->txtDuracionSuspension->RenderWithName(); ?>
    		<?php $_CONTROL->chkMesaGestion->RenderWithName(); ?>
    		<?php $_CONTROL->txtObservaciones->RenderWithName(); ?>
  </div>
</div>

</div>
    <div class="botones-form"></div>
