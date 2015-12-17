 <?php
    if($_CONTROL->txtCodFolio->ActionParameter){

        $folio=$_CONTROL->txtCodFolio->ActionParameter;
        $link_nomenclatura=__VIRTUAL_DIRECTORY__."/nomenclatura/folio/$folio";
        $link_condiciones=__VIRTUAL_DIRECTORY__."/condiciones/folio/$folio";
        $link_regularizacion=__VIRTUAL_DIRECTORY__."/regularizacion/folio/$folio";
        $link_interno=__VIRTUAL_DIRECTORY__."/interno/folio/$folio";
        $link_conflictos=__VIRTUAL_DIRECTORY__."/conflictos/folio/$folio";
        $link_censo=__VIRTUAL_DIRECTORY__."/censo/folio/$folio";
        $clase="done";
    }else{

        $link_nomenclatura="#";
        $link_condiciones="#";
        $link_regularizacion="#";
        $link_interno="#";
        $clase="disabled";
    };

 ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-0" href="#">
                    Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="<?=$clase;?>" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?=$link_nomenclatura;?>">
                    Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="<?=$clase;?>" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="<?=$link_condiciones;?>">
                    Condiciones Socio-Urbanísticas
                </a>
            </li>

            <?php if(Permission::PuedeVerConflictos()){ ?>
            <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-2" href="<?=$link_conflictos;?>">
                    Conflictos y Judicialización
                </a>
            </li>
            <?php } ?>

            <li role="tab" class="<?=$clase;?>" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?=$link_regularizacion;?>">
                    Regularización e integración socio-urbana
                </a>
            </li>

            <?php if(Permission::PuedeVerCenso()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo $link_censo;?>">
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
            <li role="tab" class="<?=$clase;?>" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?=$link_interno;?>">
                    Uso Interno
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>

<?php if(Permission::EsDuplicado($folio)){ ?>
    <div class="alert alert-danger" role="alert">
       <span class="icon-exclamation-sign" aria-hidden="true"></span>
        Este Folio es un duplicado de <?=$_CONTROL->txtCodFolioOriginal; ?>
    </div>
<?php } ?>

    <div class="titulos"><i class="icon-chevron-right"> </i>Datos de carga</div>
        <div>
            <div class="well bs-component">
                <?php $_CONTROL->calFecha->RenderWithName(); ?>
                <?php $_CONTROL->txtEncargado->RenderWithName(); ?>
                <?php $_CONTROL->txtReparticion->RenderWithName(); ?>

             </div>
        </div>

    <div class="titulos"><i class="icon-chevron-right"> </i>Datos generales del barrio</div>
        <div>
            <div class="well bs-component">
            <?php $_CONTROL->txtCodFolio->RenderWithName(); ?>
            <?php $_CONTROL->lstIdPartidoObject->RenderWithName(); ?>

            <?php $_CONTROL->txtLocalidad->RenderWithName(); ?>

			<?php $_CONTROL->txtMatricula->RenderWithName(); ?>


            <?php $_CONTROL->txtNombreBarrioOficial->RenderWithName(); ?>

			<?php $_CONTROL->txtNombreBarrioAlternativo1->RenderWithName(); ?>
			<?php $_CONTROL->txtNombreBarrioAlternativo2->RenderWithName(); ?>

            <?php $_CONTROL->lstTipoBarrioObject->RenderWithName(); ?>

            <?php $_CONTROL->txtObservacionCasoDudoso->RenderWithName(); ?>

			<?php $_CONTROL->txtAnioOrigen->RenderWithName(); ?>

            <?php $_CONTROL->lstAnioOrigen->RenderWithName(); ?>
            <?php $_CONTROL->txtSuperficie->RenderWithName(); ?>


			<?php $_CONTROL->txtCantidadFamilias->RenderWithName(); ?>

			<?php $_CONTROL->txtJudicializado->RenderWithName(); ?>
            <?php $_CONTROL->lstJudicializado->RenderWithName(); ?>


			<?php $_CONTROL->txtDireccion->RenderWithName(); ?>

            <?php $_CONTROL->txtGeom->RenderWithName(); ?>


            <?php if($_CONTROL->boolPuedeAdjuntar){ ?>
            <div class="well bs-component">
                <div class="container">

                    <span class="btn btn-success fileinput-button">
                        <i class="icon-plus"></i>
                        <span>Adjuntar...</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]" multiple>
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
