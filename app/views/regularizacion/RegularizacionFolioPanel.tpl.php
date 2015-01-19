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
<?php if(Permission::EsUsoInterno()){ ?>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/interno/folio/<?=$folio;?>">
                    <span class="number">5.</span> Uso Interno
                </a>
            </li>
<?php } ?>
        </ul>
    </div>
    
    <div class="titulos"><i class="icon-chevron-right"> </i>Regularización Dominial</div>  
    <div>
                
            <div class="well bs-component">           				        
                        <?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkProcesoIniciado->RenderWithName(); ?>

                <div class="panel_encuadre_legal" style="display:none">
        		<br>
        		<div class="titulos"><i class="icon-tag"></i> Encuadre Legal</div> 
		        <br>
		        	<div class="well bs-component">
		                                         
                        <?php $_CONTROL->pnlEncuadre->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto222595->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey24374->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto81588->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey23073->RenderWithName(); ?>                        
                        <?php $_CONTROL->pnlEncuadre->chkDecreto468696->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey14449->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkTieneExpropiacion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtExpropiacion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtOtros->RenderWithName(); ?>
                       
		                    
		        	</div>    
    			</div>        
                        
            </div>        
    </div>

    
 
    <div class="titulos"><i class="icon-chevron-right"></i>Antecedentes de intervención en materia habitacional</div>    
    <div> 
                <div class="well bs-component">     
                        
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
					        <div class="well bs-component">                                                    
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
    <div class="well bs-component">     
        <?php $_CONTROL->txtObservaciones->RenderWithName(); ?>
    </div>
</div>

<div class="botones-form"></div>

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
