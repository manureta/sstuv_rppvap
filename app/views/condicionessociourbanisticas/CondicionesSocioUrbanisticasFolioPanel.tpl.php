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
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-2" href="#">
                    Condiciones Socio-Urbanísticas
                </a>
            </li>

            <?php if(Permission::PuedeVerConflictos()){ ?>
            <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/conflictos/folio/<?=$folio;?>">
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



    <div class="titulos"><i class="icon-chevron-right"></i> Espacios públicos y equipamientos comunitarios</div>
    <div>
                    <div class="well bs-component">
                        <?php $_CONTROL->pnlEquipamiento->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkEspacioLibreComun->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstUnidadSanitariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstJardinInfantesObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstEscuelaPrimariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstEscuelaSecundariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstComedorObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstCentroIntegracionComunitariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->txtOtro->RenderWithName(); ?>
                    </div>
    </div>


    <div class="titulos"><i class="icon-chevron-right"></i>Transporte</div>
    <div>
                    <div class="well bs-component">

                    <?php $_CONTROL->pnlTransporte->lstIdFolioObject->RenderWithName(); ?>
                    <?php $_CONTROL->pnlTransporte->lstColectivosObject->RenderWithName(); ?>
                    <?php $_CONTROL->pnlTransporte->lstFerrocarrilObject->RenderWithName(); ?>
                    <?php $_CONTROL->pnlTransporte->lstRemisCombisObject->RenderWithName(); ?>
                    </div>
    </div>

    <div class="titulos"><i class="icon-chevron-right"></i> Infraestructura</div>
    <div>
                    <div class="well bs-component">

                        <?php $_CONTROL->pnlInfraestructura->lstIdFolioObject->RenderWithName(); ?>

                        <?php $_CONTROL->pnlInfraestructura->lstEnergiaElectricaMedidorIndividualObject->RenderWithName(); ?>

                        <?php $_CONTROL->pnlInfraestructura->lstEnergiaElectricaMedidorColectivoObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstAlumbradoPublicoObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstAguaCorrienteObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstAguaPotableObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstRedCloacalObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstSistAlternativoEliminacionExcretasObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstRedGasObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstPavimentoObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstCordonCunetaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstDesaguesPluvialesObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlInfraestructura->lstRecoleccionResiduosObject->RenderWithName(); ?>
                    </div>
    </div>


    <div class="titulos"><i class="icon-chevron-right"></i> Situación Ambiental</div>
    <div>
                   <div class="well bs-component">

                        <?php $_CONTROL->pnlAmbiental->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSinProblemas->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkReservaElectroducto->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkInundable->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSobreTerraplenFerroviario->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSobreCaminoSirga->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkExpuestoContaminacionIndustrial->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSobreSueloDegradado->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->txtOtro->RenderWithName(); ?>


				</div>
    </div>
    <div class="titulos"><i class="icon-chevron-right"></i> Organizaciones Sociales</div>
    <div>
                <div class="well bs-component">
                        <?php //$_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->txtPresenciaOrgSociales->RenderWithName(); ?>
                        <?php $_CONTROL->txtNombreRefernte->RenderWithName(); ?>
                        <?php $_CONTROL->txtTelefonoReferente->RenderWithName(); ?>
                </div>
    </div>
</div>

<div class="botones-form">

</div>
