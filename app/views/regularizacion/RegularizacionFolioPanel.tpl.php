<?php $folio=QApplication::QueryString("id"); ?>
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>" id="wizard-t-0">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span> Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>" id="wizard-t-1">
                    <span class="number">2.</span> Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    <span class="number">3.</span>Condiciones Socio-Urbanisticas
                </a>
            </li>
            <li role="tab" class="current" aria-selected="true">
                <a aria-controls="wizard-p-3" href="#" id="wizard-t-3">
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
    <div class="container alert alert-danger" role="alert">
       <span class="icon-exclamation-sign" aria-hidden="true"></span>
        Este Folio es un duplicado de <?=$_CONTROL->txtCodFolioOriginal;?>
    </div>
<?php } ?>


    <div class="container titulos"><i class="icon-chevron-right"> </i>Regularización Dominial</div>
    <div>

            <div class="well bs-component container">
                        <?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkProcesoIniciado->RenderWithName(); ?>

                <div class="panel_encuadre_legal" style="display:none">
        		<br>
        		<div class="titulos"><i class="icon-tag"></i> Encuadre Legal</div>
		        <br>
		        	<div class="well bs-component container">

                        <?php $_CONTROL->pnlEncuadre->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto222595->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey24374->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto81588->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey23073->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto468696->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey14449->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtOtros->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkTieneExpropiacion->RenderWithName(); ?>


                        <?php $_CONTROL->pnlEncuadre->txtExpropiacion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtFechaSancion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtFechaVencimiento->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtNomenclaturaTextoLey->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtTasacionAdministrativa->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtPrecioPagado->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtJuzgado->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->lstEstadoProcesoExpropiacionObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtMemoriaDescriptiva->RenderWithName(); ?>
                        <br>


		        	</div>

              <div class="well bs-component container">
                <?php $_CONTROL->pnlEncuadre->btnImprimirExpropiaciones->RenderWithName(); ?>
              </div>

    			</div>

            </div>
    </div>



    <div class="container titulos"><i class="icon-chevron-right"></i>Antecedentes de intervención en materia habitacional</div>
    <div>
                <div class="well bs-component container">

                        <?php $_CONTROL->pnlAntecedentes->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkSinIntervencion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkObrasInfraestructura->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkEquipamientos->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->chkIntervencionesEnViviendas->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAntecedentes->txtOtros->RenderWithName(); ?>

                        <div class="panel_organismos">
					        <br>
                            <div class="titulos"><i class="icon-tag"></i> Organismos de intervención</div>
					        <br>
					        <div class="well bs-component container">
					                <?php $_CONTROL->pnlOrganismos->lstIdFolioObject->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->chkNacional->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->chkProvincial->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->chkMunicipal->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->txtFechaIntervencion->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->txtProgramas->RenderWithName(); ?>

					        </div>
					    </div>
                </div>
    </div>

    <!-- Traidos de uso interno -->

        <div class="titulos container"><i class="icon-chevron-right"> </i>Informe Urbanístico</div>
        <div class="well bs-component container">

            <?php $_CONTROL->pnlUsoInterno->lstInformeUrbanistico->RenderWithName();?>
            <?php $_CONTROL->pnlUsoInterno->txtFechaInformeUrbanistico->RenderWithName();?>

            <?php if($_CONTROL->pnlUsoInterno->boolPuedeAdjuntar || Permission::SoloAdjuntaInformeUrbanistico()){ ?>
            <div class="well bs-component">
                <div class="container">

                    <span class="btn btn-success fileinput-button">
                        <i class="icon-plus"></i>
                        <span>Adjuntar Informe</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload3" type="file" name="files[]">
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files_informe" class="files"></div>
                    <br>
                </div>
            </div>
            <?php } else {?>
            <div class="titulos"><i class="icon-chevron-right"> </i>Informes Adjuntos</div>
            <div>
                <div class="well bs-component">
                    <div id="files_informe" class="files"></div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="titulos container"><i class="icon-chevron-right"></i> Regularización</div>
            <div class="well bs-component container">
            <?php $_CONTROL->pnlUsoInterno->lstRegularizacionTienePlano->RenderWithName(); ?>
            <?php $_CONTROL->pnlUsoInterno->txtRegularizacionFechaInicio->RenderWithName(); ?>
            <?php $_CONTROL->pnlUsoInterno->chkRegularizacionCircular10Catastro->RenderWithName(); ?>
            <div class="renderWithName">
                <div class="left">
                    <label>N° plano aprobacion de Geodesia </label>
                </div>

                 <?php $_CONTROL->pnlUsoInterno->txtGeodesiaPartido->Render(); ?>
                 <?php $_CONTROL->pnlUsoInterno->txtGeodesiaNum->Render(); ?>
                 <?php $_CONTROL->pnlUsoInterno->txtGeodesiaAnio->Render(); ?>

            </div>

            <div class="renderWithName">
                <div class="left">
                    <label>Registración</label>
                </div>
                <?php $_CONTROL->pnlUsoInterno->txtRegistracionLegajo->Render(); ?>
                <?php $_CONTROL->pnlUsoInterno->txtRegistracionFolio->Render(); ?>
                <?php $_CONTROL->pnlUsoInterno->txtRegistracionFecha->Render(); ?>
            </div>

            <?php $_CONTROL->pnlUsoInterno->lstTieneCenso->RenderWithName(); ?>
            <?php $_CONTROL->pnlUsoInterno->txtFechaCenso->RenderWithName(); ?>



            <?php $_CONTROL->pnlUsoInterno->lstRegularizacionEstadoProcesoObject->RenderWithName(); ?>

            </div>


     <!--   fin   -->
    <div class="well bs-component container">
        <?php $_CONTROL->txtObservaciones->RenderWithName(); ?>
    </div>

</div>

<div class="botones-form"></div>
<script type="text/javascript">
    $(".geodesia_partido").attr("placeholder","Partido");
    $(".geodesia_num").attr("placeholder","N° ");
    $(".geodesia_anio").attr("placeholder","Año");

    $(".registracion_folio").attr("placeholder","Folio");
    $(".registracion_legajo").attr("placeholder","Legajo");
    $(".registracion_fecha").attr("placeholder","Fecha");

</script>
<script type="text/javascript">
    function mostrarEncuadre(checked){

        if(checked){
            $(".panel_encuadre_legal").fadeIn();
        }else{
            $(".panel_encuadre_legal").toggle();
        }
    }

    function SinIntervencion(checked){

        if(checked){
            $(".panel_organismos").fadeOut();
        }else{
            $(".panel_organismos").fadeIn();
        }
    }
</script>
