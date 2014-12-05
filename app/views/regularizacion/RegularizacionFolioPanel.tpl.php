<?php $folio=QApplication::QueryString("id"); ?>	
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>" id="wizard-t-0">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span> Datos Generales
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>" id="wizard-t-1">                    
                    <span class="number">2.</span> Nomenclatura Catastral
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>" id="wizard-t-2">
                    <span class="number">3.</span>Condiciones Socio-Urbanisticas
                </a>
            </li>
            <li role="tab" class="current" aria-selected="true">
                <a aria-controls="wizard-p-3" href="#" id="wizard-t-3">
                    <span class="number">4.</span> Regularización
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/interno/folio/<?=$folio;?>">
                    <span class="number">-</span> Uso Interno
                </a>
            </li>
        </ul>
    </div>
    
    <div class="titulos"><i class="icon-chevron-right"> Regularización</i></div>  
    <div>
                
            <div class="well bs-component">           				        
                        <?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->chkProcesoIniciado->RenderWithName(); ?>

                <div class="panel_encuadre_legal" style="display:none">
        		<br>
        		<div class="titulos"><i class="icon-tag"> Encuadre Legal</i></div> 
		        <br>
		        	<div class="well bs-component">
		                                         
                        <?php $_CONTROL->pnlEncuadre->lstIdFolioObject->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto222595->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey24374->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto81588->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkLey23073->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->chkDecreto468696->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtExpropiacion->RenderWithName(); ?>
                        <?php $_CONTROL->pnlEncuadre->txtOtros->RenderWithName(); ?>
		                    
		        	</div>    
    			</div>        
                        
            </div>        
    </div>

    
 
    <div class="titulos"><i class="icon-chevron-right">Antecedentes</i></div>    
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
                            <div class="titulos"><i class="icon-tag"> Organismos de intervención</i></div>    
					        <br>
					        <div class="well bs-component">                                                    
					                <?php $_CONTROL->pnlOrganismos->lstIdFolioObject->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->chkNacional->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->chkProvincial->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->chkMunicipal->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->calFechaIntervencion->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->txtProgramas->RenderWithName(); ?>
					                <?php $_CONTROL->pnlOrganismos->txtObservaciones->RenderWithName(); ?>		
					        </div>            
					    </div>  
                </div>
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
        console.log("entro");
        if(checked){
            $(".panel_organismos").fadeOut();
        }else{
            $(".panel_organismos").toggle();
        }
    }
</script>