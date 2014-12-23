
 <?php $folio=QApplication::QueryString("id"); ?>   
 <div id="steps-tabs-folio" role="application" class="wizard clearfix">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="done" aria-disabled="false" >
                <a aria-controls="wizard-p-0" href="<?php echo __VIRTUAL_DIRECTORY__;?>/folio/view/<?=$folio;?>">
                    <span class="number">1.</span> Datos Generales del Barrio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                <a aria-controls="wizard-p-1" href="<?php echo __VIRTUAL_DIRECTORY__;?>/nomenclatura/folio/<?=$folio;?>">                    
                    <span class="number">2.</span>Nomenclatura Catastral y Dominio
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-2" href="<?php echo __VIRTUAL_DIRECTORY__;?>/condiciones/folio/<?=$folio;?>">
                    <span class="number">3.</span>Condiciones Socio-Urbanísticas
                </a>
            </li>
            <li role="tab" class="done" aria-disabled="true">
                <a aria-controls="wizard-p-3" href="<?php echo __VIRTUAL_DIRECTORY__;?>/regularizacion/folio/<?=$folio;?>">
                    <span class="number">4.</span> Integración socio-urbana
                </a>
            </li>
            <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                <a aria-controls="wizard-p-3" href="#">
                    <span class="number">5.</span> Uso Interno
                </a>
            </li>
        </ul>
    </div>

    <div>
        <div class="titulos"><i class="icon-chevron-right"> Administración</i></div>        
        <div class="well bs-component">
            <?php $_CONTROL->lstEstadoFolioObject->RenderWithName(); ?>            
         </div>

        <div class="titulos"><i class="icon-chevron-right"> Situación Registral</i></div>        
        <div class="well bs-component">
			<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
            <?php $_CONTROL->chkMapeoPreliminar->RenderWithName(); ?>
            <?php $_CONTROL->chkNoCorrespondeInscripcion->RenderWithName(); ?>
            <?php $_CONTROL->txtNumExpediente->RenderWithName(); ?>
            <?php $_CONTROL->txtResolucionInscripcionProvisoria->RenderWithName(); ?>
            <?php $_CONTROL->txtResolucionInscripcionDefinitiva->RenderWithName(); ?>
            
            <?php if($_CONTROL->boolPuedeAdjuntar){ ?>
            <div class="well bs-component">
                <div class="container">
   
                    <span class="btn btn-success fileinput-button">
                        <i class="icon-plus"></i>
                        <span>Adjuntar Resolución</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload2" type="file" name="files[]">
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files_resolucion" class="files"></div>
                    <br>
                </div>
            </div>
            <?php } else {?>
            <div class="titulos"><i class="icon-chevron-right"> Archivos Adjuntos</i></div>  
            <div>
                <div class="well bs-component">
                    <div id="files_resolucion" class="files"></div>
                </div>
            </div>       
            <?php } ?>

         </div>    
        
        <div class="titulos"><i class="icon-chevron-right"> Informe Urbanístico</i></div> 
        <div class="well bs-component">
            
            <?php $_CONTROL->lstInformeUrbanistico->RenderWithName();?>
            
            <?php if($_CONTROL->boolPuedeAdjuntar){ ?>
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
            <div class="titulos"><i class="icon-chevron-right"> Informes Adjuntos</i></div>  
            <div>
                <div class="well bs-component">
                    <div id="files_informe" class="files"></div>
                </div>
            </div>       
            <?php } ?>
        </div>

        <div class="titulos"><i class="icon-chevron-right"> Regularización</i></div>   
        	<div class="well bs-component"> 
            <?php $_CONTROL->lstRegularizacionTienePlano->RenderWithName(); ?>
            <?php $_CONTROL->calRegularizacionFechaInicio->RenderWithName(); ?>            
            <?php $_CONTROL->chkRegularizacionCircular10Catastro->RenderWithName(); ?>
            <div class="renderWithName">
                <div class="left">
                    <label>N° plano aprobacion de Geodesia</label>
                </div>
                Partido <?php $_CONTROL->txtGeodesiaPartido->Render(); ?> N° <?php $_CONTROL->txtGeodesiaNum->Render(); ?>  Año <?php $_CONTROL->txtGeodesiaAnio->Render(); ?>
            </div>
            
            <div class="renderWithName">
                <div class="left">
                    <label>Registración</label>
                </div>
                Legajo <?php $_CONTROL->txtRegistracionLegajo->Render(); ?> Folio <?php $_CONTROL->txtRegistracionFolio->Render(); ?>  Fecha <?php $_CONTROL->txtRegistracionFecha->Render(); ?>
            </div>  
            
            <?php $_CONTROL->lstTieneCenso->RenderWithName(); ?>
            <?php $_CONTROL->txtFechaCenso->RenderWithName(); ?>
            
            
            
            <?php $_CONTROL->lstRegularizacionEstadoProcesoObject->RenderWithName(); ?>
            
       		</div>

        <div class="titulos"><i class="icon-chevron-right"> Ley de acceso justo al hábitat</i></div> 
        <div class="well bs-component">
            <?php $_CONTROL->lstLey14449->RenderWithName(); ?>
            
            <?php if($_CONTROL->boolPuedeAdjuntar){ ?>
            <div class="well bs-component">
                <div class="container">
   
                    <span class="btn btn-success fileinput-button">
                        <i class="icon-plus"></i>
                        <span>Adjuntar Archivo</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload4" type="file" name="files[]">
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files_habitat" class="files"></div>
                    <br>
                </div>
            </div>
            <?php } else {?>
            <div class="titulos"><i class="icon-chevron-right"> Archivos Adjuntos</i></div>  
            <div>
                <div class="well bs-component">
                    <div id="files_habitat" class="files"></div>
                </div>
            </div>       
            <?php } ?>
            
        </div>    

    </div>
</div>

  
	



