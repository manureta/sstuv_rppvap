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

            <div class="renderWithName">
                <div class="left">
                    <label>Judicializado </label>
                </div>
                <div class="right">
                 <label>
                      <span>
                      <input value="<?php echo strtoupper($_CONTROL->objFolio->Judicializado); ?>" class="form-control" disabled/>
                      </span>
                  </label>
                </div>
            </div>
    		<?php $_CONTROL->chkIntervinoArea->RenderWithName(); ?>
    		<?php $_CONTROL->txtFueroInterviniente->RenderWithName(); ?>
    		<?php $_CONTROL->txtJuzgadoInterviniente->RenderWithName(); ?>
    		<?php $_CONTROL->txtCaratulaExpediente->RenderWithName(); ?>


            <br>
            <div class="titulos"><i class="icon-tag"></i> Organismos intervinientes</div>
            <br>
                <div class="well bs-component container">
                    <div class="renderWithName">
                        <div class="left">
                            <label>Ministerio de Desarrollo </label>
                        </div>
                        <?php $_CONTROL->chkMinisterioDesarrollo->Render(); ?>
                        <?php $_CONTROL->txtMinisterioDesarrolloReferente->Render(); ?>
                    </div>

                    <div class="renderWithName">
                        <div class="left">
                            <label>Defensor del pueblo </label>
                        </div>
                        <?php $_CONTROL->chkDefensorPueblo->Render(); ?>
                        <?php $_CONTROL->txtDefensorPuebloReferente->Render(); ?>
                    </div>

                    <div class="renderWithName">
                        <div class="left">
                            <label>Secretaría Nacional de Acceso Justo al Habitat </label>
                        </div>
                        <?php $_CONTROL->chkSecretariaNacional->Render(); ?>
                        <?php $_CONTROL->txtSecretariaNacionalReferente->Render(); ?>
                    </div>

                    <div class="renderWithName">
                        <div class="left">
                            <label> Municipalidad</label>
                        </div>
                        <?php $_CONTROL->chkMunicipalidad->Render(); ?>
                        <?php $_CONTROL->txtMunicipalidadReferente->Render(); ?>
                    </div>

                    <div class="renderWithName">
                        <div class="left">
                            <label>Organización barrial </label>
                        </div>
                        <?php $_CONTROL->chkOrganizacionBarrial->Render(); ?>
                        <?php $_CONTROL->txtOrganizacionBarrialReferente->Render(); ?>
                    </div>

                    <?php $_CONTROL->txtOtrosOrganismos->RenderWithName(); ?>
                </div>

            <br>
            <div class="titulos"><i class="icon-tag"></i></div>
            <br>
                <div class="well bs-component container">

                    <?php $_CONTROL->chkOrdenDesalojo->RenderWithName(); ?>
            		<?php $_CONTROL->txtFechaEjecucion->RenderWithName(); ?>
            		<?php $_CONTROL->chkSuspensionHecho->RenderWithName(); ?>
            		<?php $_CONTROL->chkSolicitudSuspension->RenderWithName(); ?>
            		<?php $_CONTROL->txtFechaSuspension->RenderWithName(); ?>
            		<?php $_CONTROL->txtDuracionSuspension->RenderWithName(); ?>
            		<?php $_CONTROL->chkMesaGestion->RenderWithName(); ?>
            		<?php $_CONTROL->txtObservaciones->RenderWithName(); ?>
                </div>

                <?php if(Permission::PuedeAdjuntarConflictos()){ ?>
                <div class="well bs-component">
                    <div class="container">

                        <span class="btn btn-success fileinput-button">
                            <i class="icon-plus"></i>
                            <span>Adjuntar...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload_conflictos" type="file" name="files[]" multiple>
                        </span>
                        <br>
                        <br>
                        <!-- The global progress bar -->
                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <!-- The container for the uploaded files -->
                        <div id="files" class="files"></div>
                        <br>
                    </div>
                </div>
                <?php } else {?>
                <div class="titulos"><i class="icon-chevron-right"></i>Archivos Adjuntos</div>
                <div>
                    <div class="well bs-component">
                        <div id="files" class="files"></div>
                    </div>
                </div>
                <?php } ?>

  </div>
</div>

</div>
    <div class="botones-form"></div>
