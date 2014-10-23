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
    
        <!-- FORMULARIO GLOBAL -->

    <h4 class="header red lighter smaller">
        <i class="icon-group-alt smaller-90"></i>
        Estudios de grado en el nivel superior
    </h4>

    <h5>
        <small>
            <i class="icon-double-angle-right"></i>
            Ud. deberá completar para cada una de las titulaciones que sean completadas, incompletas o en curso.
        </small>
    </h5>
    <div id="page_globals_input_vars">
        <div class="pregunta">
                <label for="b6_d26_o_1">26. ¿Ud. cursa o curs&oacute; estudios de nivel superior?</label>
                <input  type="radio" name="b6_d26_o_1" id="b6_d26_o_1" value="1"> Si
                <input  type="radio" name="b6_d26_o_1" id="b6_d26_o_1" value="2"> No
        </div>
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

    <div id="estudio-panel-master_row"  class="row">
        <div class="col-sm-12">
            <div id="estudio-central-master" style="display: none"> 
                <h4 class="header red lighter smaller">
                    <i class="icon-group-alt smaller-90"></i>
                    <span id="estudio-master_NOMBRE">Estudios consignados</span>
                </h4>   
                <div class="accordion-style1 panel-group" id="accordion_2">
                    <div class="panel panel-default"> <!-- PANEL ESTUDIO-->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#accordion_estudio_master" data-parent="#accordion_2" data-toggle="collapse" class="accordion-toggle">
                                    <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="bigger-110 icon-angle-down"></i>
                                    &nbsp; Estudios de grado en el nivel superior
                                </a>
                            </h4>
                        </div>
                        <div id="accordion_estudio_master" class="panel-collapse in" style="height: auto;">
                            <div class="panel-body">
                                <div class="accordion-style1 panel-group accordion-style2" id="accordion_estudio__rows">  <!-- 2DO Acordeon-->
                                    <!-- LINEAS DE ESTUDIO / ACTIVIDAD -->
                                </div> <!-- Fin 2DO Acordeon-->
                                <br>
                                <input type="button" id="estudio_button_add" value="Agregar estudio">
                            </div>
                        </div>
                    </div>  <!-- FIN PANEL ESTUDIO-->
                </div>
            </div>
        </div>
    </div>
    <br>


</div>  <!-- FIN SECTOR GLOBAL -->


<div class="panel panel-default" id="linea_estudio" style="display: none" > 
    <div class="panel-heading">  
        <h4 class="panel-title">  
            <a   href="#accordion_estudio_" data-parent="#accordion_estudio__rows" data-toggle="collapse" class="accordion-toggle collapsed">  
                <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="icon-angle-right bigger-110"></i>  
                &nbsp;<span id="accordion_estudio_row__name">Nuevo estudio de grado en el nivel superior</span> 
            </a>  
        </h4>  
    </div>  

    <div id="accordion_estudio_" class="panel-collapse collapse">  
        <div class="panel-body">  
            <div id="panel">  
                
                <div class="pregunta">
                    <label for="b6_d261_a_1">26.1 Consigne el t&iacute;tulo obtenido o a obtener</label>
                    <input type="text" name="b6_d261_a_1_text" id="b6_d261_a_1_text" value="" class="danger-textbox">
                    <input type="hidden" name="b6_d261_a_1" id="b6_d261_a_1" value="" >
                </div>

                <div class="pregunta">
                    <p><label for="b6_d262_o_1">26.2 ¿Qu&eacute; tipo de formaci&oacuten caracteriiza al t&iacute;tulo?</label></p>
                    <p><input type="radio" name="b6_d262_o_1" id="b6_d262_o_1" value="1"> Docente </p>
                    <p><input type="radio" name="b6_d262_o_1" id="b6_d262_o_1" value="2"> T&eacute;cnico Profesional </p>
                </div>

                <div class="pregunta">
                    <label for="b6_d263_o_1">26.3 ¿En qu&eacute; jurisdicci&oacute;n curs&oacute;/cursa esta carrera?</label>
                    <select name="b6_d263_o_1" id="b6_d263_o_1"></select> 
                </div>

                <div class="pregunta">
                    <p><label for="b6_d264_o_1">26.4 ¿A qu&eacute; tipo de instituci&oacuten/asisti&oacute;/asiste....</label></p>
                    <p><input type="radio" name="b6_d264_o_1" id="b6_d264_o_1" value="1"> Superior (ex superior no universitario/terciario)</p>
                    <p><input type="radio" name="b6_d264_o_1" id="b6_d264_o_1" value="2"> Universidad </p>
                </div>

                <div class="pregunta">
                    <p><label for="b6_d265_o_1">26.5 De sector</label> </p>
                    <p> <input type="radio" name="b6_d265_o_1" id="b6_d265_o_1" value="1"> Estatal</p>
                    <p> <input type="radio" name="b6_d265_o_1" id="b6_d265_o_1" value="2"> Privado</p>
                </div>

                <div class="pregunta">
                    <p><label for="b6_d266_c_1">26.6 ¿Ud., complet&oacute estos estudios?</label></p>
                    <p> <input type="radio" name="b6_d266_c_1" id="b6_d266_c_1" value="1"> Si</p>
                    <p> <input type="radio" name="b6_d266_c_1" id="b6_d266_c_1" value="2"> No, actualmente estoy asistiendo</p>
                    <p> <input type="radio" name="b6_d266_c_1" id="b6_d266_c_1" value="3"> Asisti&oacute pero no complet&eacute; los estudios (no egres&eacute;)</p>
                </div>

                <div class="pregunta">
                    <label for="b6_d267_n_1">26.7 Año de egreso</label>
                    <input type="text" name="b6_d267_n_1" id="b6_d267_n_1" value=""  >
                </div>

                <div class="pregunta">
                    <label for="b6_d268_o_1">26.8 ¿Recibi&oacute beca?</label>
                    <input type="radio" name="b6_d268_o_1" id="b6_d268_o_1" value="1"> Si
                    <input type="radio" name="b6_d268_o_1" id="b6_d268_o_1" value="2"> No
                </div>

            </div>  
        </div>  
    </div>  
</div> <!-- FIN LINEA DE ESTUDIO--> 


<script>
bloqueCtrl();
</script>
