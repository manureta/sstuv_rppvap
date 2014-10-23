<script>
   var strFormValues = Array();
   <?php $_CONTROL->renderStrFormValues(); ?>
   var objJson = <?php $_CONTROL->renderJsonData(); ?>;
   var nro_pagina = <?php $_CONTROL->renderNroPagina(); ?>;

</script>


<?php $_CONTROL->renderJavascriptFiles(); ?>
<?php $_CONTROL->renderCSSFiles(); ?>


<div id="page_globals" style="display: none"></div>

<div id="global-panel-master_row"> <!-- SECTOR GLOBAL -->
    <div id="page_globals_hidden_vars" style="display: none"></div>    

    <div id="curso-panel-master_row"  class="row">
        <div class="col-sm-12">
            <div id="curso-central-master" style="display: none"> <!---->
                <h4 class="header red lighter smaller">
                    <i class="icon-group-alt smaller-90"></i>
                    <span id="curso-master_NOMBRE">Cursos / Actividades</span>
                </h4>   
                <h5>
                    <small>
                        <i class="icon-double-angle-right"></i>
                        Ud. deberá completar por cada curso que haya realizado en los últimos 3 años o actualmente esté cursando. Declare sólo aquellos cursos que entregan certificación formal.
                    </small>
                </h5>
                <div class="accordion-style1 panel-group" id="accordion_2">
                    <div class="panel panel-default"> <!-- PANEL CURSO-->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#accordion_curso_master" data-parent="#accordion_2" data-toggle="collapse" class="accordion-toggle">
                                    <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="bigger-110 icon-angle-down"></i>
                                    &nbsp; Cursos de capacitaci&oacute;n /otras actividades de desarrollo profesional
                                </a>
                            </h4>
                        </div>
                        <div id="accordion_curso_master" class="panel-collapse in" style="height: auto;">
                            <div class="panel-body">
                                <div class="accordion-style1 panel-group accordion-style2" id="accordion_curso__rows">  <!-- 2DO Acordeon-->
                                    <!-- LINEAS DE CURSO / ACTIVIDAD -->
                                </div> <!-- Fin 2DO Acordeon-->
                                <br>
                                <input type="button" id="curso_button_add" value="Agregar Curso / Actividad">
                            </div>
                        </div>
                    </div>  <!-- FIN PANEL CURSO-->
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- FORMULARIO GLOBAL -->

    <h4 class="header red lighter smaller">
        <i class="icon-group-alt smaller-90"></i>
        Cursos de capacitación / Otras actividades de desarrollo profesional
    </h4>

    <div id="page_globals_input_vars">
        <div class="pregunta">
            <label for="b8_d29_o_1">29. ¿En qu&eacute; &aacute;rea desea capacitarse? </label>  
            <?php echo InputHelper::GetSelectForTypeClass('AreaCapacitacionType', 'b8_d29_o_1', '') ; ?>
        </div> 
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<div class="panel panel-default" id="linea_curso" style="display: none" > 
    <div class="panel-heading">  
        <h4 class="panel-title">  
            <a   href="#accordion_curso_" data-parent="#accordion_curso__rows" data-toggle="collapse" class="accordion-toggle collapsed">  
                <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="icon-angle-right bigger-110"></i>  
                &nbsp;<span id="accordion_curso_row__name">Nuevo Curso de capacitaci&oacute;n / Otras actividades de desarrollo</span> 
            </a>  
        </h4>  
    </div>  

    <div id="accordion_curso_" class="panel-collapse collapse">  
        <div class="panel-body">  
            <div id="panel">  
                <div class="pregunta">
                    <label for="b8_d28_o_1">28 &Aacute;rea tem&aacute;tica de la capacitaci&oacute;n</label>  
                    <?php echo InputHelper::GetSelectForTypeClass('AreaCapacitacionType', 'b8_d28_o_1', ''); ?>
                </div>
                <div class="pregunta">
                    <label for="b8_d281_o_1">28.1 La instituci&oacute;n donde realiz&oacute;/realiza la capacitaci&oacute;n es ...</label>  
                    <select name="b8_d281_o_1" id="b8_d281_o_1">
                        <option value="0" > </option>
                        <option value="1" >Organismos oficiales</option>
                        <option value="2" >Sindicatos y gremios</option>
                        <option value="3" >Universidades</option>
                        <option value="4" >Institutos superiores</option>
                        <option value="5" >Organizaciones no gubernamentales</option>
                        <option value="6" >Organismos internacionales</option>
                        <option value="7" >Otras instituciones</option>
                    </select>  
                </div>
                <div class="pregunta">
                    <label for="b8_d282_o_1">28.2 Esta capacitaci&oacute;n... ¿Incluy&oacute;/incluye una instancia virtual?</label>  
                    <input type="radio"  name="b8_d282_o_1" id="b8_d282_o_1" value="1"> Si
                    <input type="radio"  name="b8_d282_o_1" id="b8_d282_o_1" value="2"> No
                </div>
                <div class="pregunta">
                    <label for="b8_d283_t_1">28.3 Cantidad de horas de la actividad de capacitaci&oacute;n</label>  
                    <input type="text" name="b8_d283_n_1" id="b8_d283_n_1" value="">
                </div>
                <div class="pregunta">
                    <label for="b8_d284_n_1">28.4 Año de finalizaci&oacute;n</label>  
                    <input type="text" name="b8_d284_n_1" id="b8_d284_n_1" value="">
                </div>
                <div class="pregunta">
                    <label for="b8_d285_r_1">28.5 ¿Complet&oacute; la capacitaci&oacute;n? Si/No</label>  
                    <input type="radio"  name="b8_d285_r_1" id="b8_d285_r_1" value="1"> Si
                    <input type="radio"  name="b8_d285_r_1" id="b8_d285_r_1" value="2"> No
                </div>
            </div>  
        </div>  
    </div>  
</div> <!-- FIN LINEA DE CURSO--> 



    





<script>
bloqueCtrl();
</script>
