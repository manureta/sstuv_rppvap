<?php $folio=QApplication::QueryString("id"); ?>	
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="/registro/folio/<?=$folio;?>">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true" aria-selected="false">
                <a aria-controls="wizard-p-1" href="/registro/nomenclatura/folio/<?=$folio;?>">                    
                    <span class="number">2.</span> Nomenclatura Catastral
                </a>
            </li>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-2" href="#">
                    <span class="number">3.</span>Cond. Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="/registro/regularizacion/folio/<?=$folio;?>">
                    <span class="number">4.</span> Regularización
                </a>
            </li>
        </ul>
    </div>
    <div class="content clearfix">
                <h2 id="wizard-h-0" tabindex="-1" class="title current">First Step</h2>
                <section id="tab-1" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="true" style="display: block;">               
				
                        <p>Condiciones</p>
                        <?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkEspacioLibreComun->RenderWithName(); ?>
                        <?php $_CONTROL->txtPresenciaOrgSociales->RenderWithName(); ?>
                        <?php $_CONTROL->txtNombreRefernte->RenderWithName(); ?>
                        <?php $_CONTROL->txtTelefonoReferente->RenderWithName(); ?>
                        
                        <p>Equipamiento</p>

                        <?php $_CONTROL->pnlEquipamiento->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstUnidadSanitariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstJardinInfantesObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstEscuelaPrimariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstEscuelaSecundariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstComedorObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstSalonUsosMultiplesObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->lstCentroIntegracionComunitariaObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEquipamiento->txtOtro->RenderWithName(); ?>

                        <p>Infraestructura</p>

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

                        <p>Situacion Ambiental</p>

                        <?php $_CONTROL->pnlAmbiental->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSinProblemas->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkReservaElectroducto->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkInundable->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSobreTerraplenFerroviario->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSobreCaminoSirga->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkExpuestoContaminacionIndustrial->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->chkSobreSueloDegradado->RenderWithName(); ?>
                        <?php $_CONTROL->pnlAmbiental->txtOtro->RenderWithName(); ?>


				</section>

                
    </div>
</div>

<div class="botones-form">

</div>