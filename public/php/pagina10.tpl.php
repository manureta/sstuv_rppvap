<script>
   var strFormValues = Array();
   <?php $_CONTROL->renderStrFormValues(); ?>
   var objJson = <?php $_CONTROL->renderJsonData(); ?>;
   var carga_designacioncentral = <?php $_CONTROL->renderCustomPermission('designacioncentral'); ?>;
   var carga_designacion = <?php $_CONTROL->renderCustomPermission('designacion'); ?>;
   var carga_funcion = <?php $_CONTROL->renderCustomPermission('funcion'); ?>;
   var nro_pagina = <?php $_CONTROL->renderNroPagina(); ?>;
</script>


<?php $_CONTROL->renderJavascriptFiles(); ?>
<?php $_CONTROL->renderCSSFiles(); ?>


<div id="page_globals" style="display: none"></div>

<div id="global-panel-master_row"> <!-- SECTOR GLOBAL -->
    <div id="page_globals_hidden_vars" style="display: none"></div>    
    

    <div id="designacioncentral-panel-master_row"  class="row">
        <div class="col-sm-12">
            <div id="designacion-central-master" style="display: none"> <!---->
                <h4 class="header red lighter smaller">
                    <i class="icon-group-alt smaller-90"></i>
                    <span id="designacion-central-master_NOMBRE">Designaciones en el Nivel Central</span>
                </h4>   
                <div class="accordion-style1 panel-group" id="accordion_2">
                    <div class="panel panel-default"> <!-- PANEL DESIGNACION CENTRAL-->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#accordion_designacioncentral_master" data-parent="#accordion_2" data-toggle="collapse" class="accordion-toggle">
                                    <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="bigger-110 icon-angle-down"></i>
                                    &nbsp; Designaciones en el Nivel Central
                                </a>
                            </h4>
                        </div>
                        <div id="accordion_designacioncentral_master" class="panel-collapse in" style="height: auto;">
                            <div class="panel-body">
                                <div class="accordion-style1 panel-group accordion-style2" id="accordion_designacioncentral__rows">  <!-- 2DO Acordeon-->
                                    <!-- LINEAS DE DESIGNACION CENTRAL -->
                                </div> <!-- Fin 2DO Acordeon-->
                                <br>
                                <input type="button" id="designacioncentral_button_add" value="Agregar Designaci&oacute;n en el nivel central">
                            </div>
                        </div>
                    </div>  <!-- FIN PANEL DESIGNACION CENTRAL-->
                </div>
            </div>
        </div>
    </div>
    <br>
    <div  class="row">
        <div class="col-sm-12">
                <h4 class="header green lighter smaller">
                        Designaciones y funciones en  establecimientos
                </h4>   
        </div>
    </div>
    
    <br>
    <h6><small><i class="icon-double-angle-right"></i>Haga clic en el CUE para completar la información.</small></h6>
    <!-- PANTALLA VACIA -->
    <div style="display: block">
        <div class="row">
            <div class="col-xs-8">
                <div class="table-responsive">
                    <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                        <table aria-describedby="sample-table-2_info" id="establecimiento-table-master" class="table table-striped table-bordered table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th style="width: 50px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" >CUE</th>
                                    <th style="width: 187px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" >Nombre de Establecimiento</th>
                                    <th style="width: 204px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="hidden-480">Domicilio</th>
                                    <th style="width: 50px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="hidden-480">Designación</th>
                                    <th style="width: 50px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="hidden-480">Función</th>
                                    <th style="width: 50px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="hidden-480">Confirma?</th>
                                </tr>
                            </thead>
                            <tbody aria-relevant="all" aria-live="polite" role="alert">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>  <!-- FIN SECTOR GLOBAL -->

<!-- SECTOR NO GLOBAL -->
<div id="_dinamic_form_" style="display: none">
    <div id="_cue-panel-master_row_" class="row">
    </div>
</div>
<!-- FIN SECTOR NO GLOBAL -->

<!-- TEMPLATES -->

<div class="panel panel-default" id="linea_designacioncentral" style="display: none" > <!-- LINEA DE DESIGNACION CENTRAL  -->  
    <div class="panel-heading">  
        <h4 class="panel-title">  
            <a   href="#accordion_designacioncentral_" data-parent="#accordion_designacioncentral__rows" data-toggle="collapse" class="accordion-toggle collapsed">  
                <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="icon-angle-right bigger-110"></i>  
                &nbsp;<span id="accordion_designacioncentral_row__name">Nueva Designaci&oacute;n Central</span> 
            </a>  
        </h4>  
    </div>  

    <div id="accordion_designacioncentral_" class="panel-collapse collapse">  
        <div class="panel-body">  
            <div id="panel">  
                <div class="pregunta">  
                    <label for="b10_d44_a_1">Nombre de la Designación</label>  
                    <input type="text" name="b10_d44_a_1_text" id="b10_d44_a_1_text" value="" class="danger-textbox">
                    <input type="hidden" name="b10_d44_a_1" id="b10_d44_a_1" value="" >
                </div>  
                <div class="pregunta">  
                    <label for="b10_d29_o_1">Relación Laboral</label>  
                    <select name="b10_d29_o_1" id="b10_d29_o_1"></select>  
                </div>  
                <div class="pregunta">  
                    <label for="b10_d30_o_1">Nombre del Programa/Plan</label>  
                    <select name="b10_d30_o_1" id="b10_d30_o_1"></select>  
                </div>  
                <div class="pregunta">  
                    <label for="b10_d31_o_1">Tipo de Designación</label>  
                    <select name="b10_d31_o_1" id="b10_d31_o_1"></select>  
                </div>  
                <div class="pregunta">            
                    <label for="b10_d32_n_1">Cantidad de horas semanales (1 a 60)</label>
                    <input type="text" name="b10_d32_n_1" id="b10_d32_n_1" value="">
                </div>
                <div class="pregunta">            
                    <label for="b10_d33_n_1">Desde que año está designado en este cargo</label>
                    <input type="text" name="b10_d33_n_1" id="b10_d33_n_1" value="">
                </div>
                <div class="pregunta">
                    <label for="b10_d34_o_1">Situación de revista</label>
                    <select id="b10_d34_o_1" name="b10_d34_o_1"></select>
                </div>
                <div class="pregunta">
                    <label for="b10_d35_o_1">Condición de Actividad</label>
                    <select id="b10_d35_o_1" name="b10_d35_o_1"></select>
                </div>
                <div id="b10_d35_o_1_eq_1" style="display: none">
                    <div class="pregunta" >
                        <label for="b10_d36_o_1">¿Está ejerciendo la función de esta designación?</label>
                        <input type="radio" name="b10_d36_o_1" id="b10_d36_o_1" value="1"> Si
                        <input type="radio" name="b10_d36_o_1" id="b10_d36_o_1" value="2"> No
                    </div>
                </div>
                <div id="b10_d35_o_1_neq_1" style="display: none">
                    <div class="pregunta" >
                        <label for="b10_d37_d_1">Desde cuándo se encuentra en esta situación</label>
                        <input type="text" name="b10_d37_d_1" id="b10_d37_d_1" value=""    class="date" data-provide="datepicker" data-date-format="dd/mm/yyyy" onblur="ValidateDate(this, 1900, 2020);" onkeyup="MaskDate(this, 1900, 2020);">
                    </div>
                    <div class="pregunta">
                        <label for="b10_d38_d_1">Fin de la situación</label>
                        <input type="text" name="b10_d38_d_1" id="b10_d38_d_1" value=""    class="date" data-provide="datepicker" data-date-format="dd/mm/yyyy" onblur="ValidateDate(this, 1900, 2020);" onkeyup="MaskDate(this, 1900, 2020);">
                    </div>
                    <div id="b10_d34_o_1_eq_2" style="display: none">
                        <div class="pregunta">
                            <label  for="b10_d39_o_1">Motivo de la licencia</label>
                            <select name="b10_d39_o_1" id="b10_d39_o_1"></select>
                        </div>
                    </div>
                </div>
                <div class="pregunta">  
                    <label>Que establecimientos atiende con esta designaci&oacute;n</label>  
                    <table id="tabla_designacioncentral_1" border="1">  
                        <tr>  
                            <th>Cue/Anexo</th>  
                            <th>Nombre Establecimiento</th>  
                            <th>Domicilio</th>
                            <th>Oferta</th>
                            <th>&iquest;Confirma?</th>
                        </tr>  
                    </table>  
                    <div style="alignment-adjust: central">  
                        <!-- <input type="button" id="tabla_designacioncentral_button_1" value="Agregar">  -->
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</div> <!-- FIN LINEA DE DESIGNACION CENTRAL--> 

<div class="panel panel-default" id="linea_designacion" style="display: none"> <!-- LINEA DE DESIGNACION -->
    <div class="panel-heading">  
        <h4 class="panel-title">  
            <a   href="#accordion_designacion_" data-parent="#accordion_designacion__rows" data-toggle="collapse" class="accordion-toggle collapsed">  
                <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="icon-angle-right bigger-110"></i>  
                &nbsp;<span id="accordion_designacion_row__name">Nueva Designaci&oacute;n</span> 
            </a>  
        </h4>  
    </div>  

    <div id="accordion_designacion_" class="panel-collapse collapse">  
        <div class="panel-body">  
            <div id="panel">  
                <div class="pregunta">  
                    <label for="b10_d1_o_1">Cue Anexo</label>
                    <select id="b10_d1_o_1" name="b10_d1_o_1"></select>  
                </div>  
                <div class="pregunta">  
                    <label for="b10_d2_o_1">Oferta</label>  
                    <select id="b10_d2_o_1" name="b10_d2_o_1"></select>  
                </div>  
                <div class="pregunta">  
                    <label for="b10_d3_a_1">Nombre de Designación</label>  
                    <input type="text" name="b10_d3_a_1_text" id="b10_d3_a_1_text" value="" class="danger-textbox">
                    <input type="hidden" name="b10_d3_a_1" id="b10_d3_a_1" value="" >
                    </div>  
                <div id="completa_cuadro_designacion_1">
                    <div class="pregunta">  
                        <label>Si es profesor de espacios curriculares</label>  
                        <table id="tabla_designacion_1" border="1" style="width:80%">  
                            <tr>  
                                <th>Plan de estudio</th>  
                                <th>Espacio Curricular</th>  
                                <th>Año de estudio</th>  
                                <th>Cantidad de secciones divisiones</th>  
                                <th></th>
                            </tr>  
                        </table>  
                        <div style="alignment-adjust: central">  
                            <input data-sector="designacion" type="button" id="tabla_designacion_button_1" value="Agregar">  
                        </div>  
                    </div> 
                </div>
                <div id="completa_cuadro_designacion_2">
                    <div class="pregunta">  
                        Si es maestro de grado/ciclo/sala  
                        <table id="tabla_designacion_2" border="1">  
                            <tr>  
                                <th>Año de Estudio</th>  
                                <th>Cantidad de secciones divisiones</th>  
                                <th></th>
                            </tr>  

                        </table>  
                        <div style="alignment-adjust: central">  
                            <input data-sector="designacion"  type="button" id="tabla_designacion_button_2" value="Agregar">  
                        </div>  
                    </div> 
                </div>
                <div class="pregunta">
                    <label for="b10_d4_o_1">Tipo de designación</label>
                    <select name="b10_d4_o_1" id="b10_d4_o_1"></select>
                </div>
                <div class="pregunta">            
                    <label for="b10_d5_n_1">Cantidad de horas semanales (1 a 60)</label>
                    <input type="text" name="b10_d5_n_1" id="b10_d5_n_1" value="">
                </div>
                <div class="pregunta">            
                    <label for="b10_d6_n_1">Desde que año está designado en este cargo</label>
                    <input type="text" name="b10_d6_n_1" id="b10_d6_n_1" value="">
                </div>
                <div class="pregunta">
                    <label for="b10_d7_o_1">Situación de revista</label>
                    <select id="b10_d7_o_1" name="b10_d7_o_1"></select>
                </div>
                <div class="pregunta">
                    <label for="b10_d25_o_1">Condición de Actividad</label>
                    <select id="b10_d25_o_1" name="b10_d25_o_1"></select>
                </div>
                <div id="b10_d25_o_1_eq_1" style="display: none">
                    <div class="pregunta">            
                        <label for="b10_d8_o_1">¿Está ejerciendo la función de esta designación?</label>
                        <input type="radio" name="b10_d8_o_1" id="b10_d8_o_1" value="1"> Si
                        <input type="radio" name="b10_d8_o_1" id="b10_d8_o_1" value="2"> No
                    </div>
                </div>
                <div id="b10_d25_o_1_neq_1" style="display: none">
                    <div class="pregunta">
                        <label for="b10_d9_d_1">Desde cuándo se encuentra en esta situación</label>
                        <input type="text" name="b10_d9_d_1" id="b10_d9_d_1" value="" class="date" data-provide="datepicker" data-date-format="dd/mm/yyyy" onblur="ValidateDate(this, 1900, 2020);" onkeyup="MaskDate(this, 1900, 2020);">
                    </div>
                    <div class="pregunta">
                        <label for="b10_d10_d_1">Fin de la situación</label>
                        <input type="text" name="b10_d10_d_1" id="b10_d10_d_1" value="" class="date" data-provide="datepicker" data-date-format="dd/mm/yyyy" onblur="ValidateDate(this, 1900, 2020);" onkeyup="MaskDate(this, 1900, 2020);">
                    </div>
                    <div id="b10_d7_o_1_eq_2" style="display: none">
                        <div class="pregunta">
                            <label for="b10_d11_o_1">Motivo de la licencia</label>
                            <select name="b10_d11_o_1" id="b10_d11_o_1"></select>
                        </div>
                    </div>
                </div>
            </div>  
        </div>  
    </div>  
</div> <!-- FIN LINEA DE DESIGNACION --> 

<div class="panel panel-default"id="linea_funcion" style="display: none"> <!-- LINEA DE FUNCION -->
    <div class="panel-heading">
        <h4 class="panel-title">
            <a  href="#accordion_funcion_" data-parent="#accordion_funcion__rows" data-toggle="collapse" class="accordion-toggle collapsed">
                <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="icon-angle-right bigger-110"></i>
                &nbsp;<span id="accordion_funcion_row__name" >Nueva Funci&oacute;n</span>
            </a>
        </h4>
    </div>
    <div id="accordion_funcion_" class="panel-collapse collapse">
        <div class="panel-body">
            <div id="panel">
                <div class="pregunta">  
                    <label for="b10_d40_o_1">Cue Anexo</label>
                    <select id="b10_d40_o_1" name="b10_d40_o_1"></select>  
                </div>  
                <div class="pregunta">  
                    <label for="b10_d41_o_1">Oferta</label>  
                    <select id="b10_d41_o_1" name="b10_d41_o_1"></select>  
                </div> 
                <div class="pregunta">
                    <label for="b10_d27_o_1">Cuál es su relación con el establecimiento</label>
                    <select name="b10_d27_o_1" id="b10_d27_o_1"></select>
                </div>
                <div class="pregunta">
                    <label for="b10_d28_o_1">Función que realiza</label>
                    <select name="b10_d28_o_1" id="b10_d28_o_1"></select>
                </div>
                <div id="completa_cuadro_funcion_1">
                    <br>
                    <div class="pregunta">
                        <label>Si es profesor de espacios curriculares</label>
                        <table id="tabla_funcion_1" border="1"   style="width:80%"> 
                            <tr>
                                <th>Plan de estudio</th>
                                <th>Espacio Curricular</th>  
                                <th>Año de estudio</th>
                                <th>Cantidad de secciones divisiones</th>
                                <th></th>
                            </tr>
                        </table>
                        <div style="alignment-adjust: central">
                            <input data-sector="funcion" type="button" id="tabla_funcion_button_1" value="Agregar"> 
                        </div>
                    </div>
                </div>
                <div id="completa_cuadro_funcion_2">
                    <div class="pregunta">
                        Si es maestro de grado/ciclo/sala
                        <table id="tabla_funcion_2" border="1">
                            <tr>
                                <th>Año de Estudio</th>
                                <th>Cantidad de secciones divisiones</th>
                                <th></th>
                            </tr>

                        </table>
                        <div style="alignment-adjust: central">
                            <input data-sector="funcion" type="button" id="tabla_funcion_button_2" value="Agregar">  
                        </div>
                    </div>
                </div>
                <div class="pregunta">            
                    <label for="b10_d26_n_1">Cantidad de horas semanales (1 a 60)</label>
                    <input type="text" name="b10_d26_n_1" id="b10_d26_n_1" value="">
                </div>
                <div class="pregunta">            
                    <label for="b10_d27_n_1">Desde que año realiza esta función</label>
                    <input type="text" name="b10_d27_n_1" id="b10_d27_n_1" value="">
                </div>
                <div class="pregunta">            
                    <label for="b10_d42_n_1">¿Cuántas horas semanales dedica a esta función?</label>
                    <input type="text" name="b10_d42_n_1" id="b10_d42_n_1" value="">
                </div>
                <div class="pregunta">
                    <label for="b10_d45_o_1">Tipo de horas</label>
                    <select name="b10_d45_o_1" id="b10_d45_o_1"></select>
                </div>
            </div>
        </div>
    </div>
</div> <!-- FIN LINEA DE FUNCION -->
                                    
<div id="cue-panel-master_row_template" class="row"  style="display: none">   <!--ROW POR CUE--> 
        <div id="form_globals" style="display: none"></div> 
        <div class="col-sm-12">
            <div id="cue-panel-master">
                <h4 class="header green lighter smaller">
                    <i class="icon-list-alt smaller-90"></i>
                    <span id="cue-panel-master_NOMBRE"></span>
                </h4>   
                <div class="accordion-style1 panel-group" id="accordion_">
                    
                    
                    <div class="panel panel-default"> <!-- PANEL DESIGNACION -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#accordion_designacion_master" data-parent="#accordion_" data-toggle="collapse" class="accordion-toggle">
                                    <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="bigger-110 icon-angle-down"></i>
                                    &nbsp; Designaciones en este establecimiento
                                </a>
                            </h4>
                        </div>
                        <div id="accordion_designacion_master" class="panel-collapse in" style="height: auto;">
                            <div class="panel-body">
                                <div class="accordion-style1 panel-group accordion-style2" id="accordion_designacion__rows">  <!-- 2DO Acordeon-->
                                    <!-- LINEAS DE DESIGNACION -->
                                </div> <!-- Fin 2DO Acordeon-->
                                <br>
                                <input type="button" id="designacion_button_add" value="Agregar Designaci&oacute;n">
                            </div>
                        </div>
                    </div>  <!-- FIN PANEL DESIGNACION -->

                    <div class="panel panel-default"> <!-- PANEL FUNCION -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#accordion_funcion_master" data-parent="#accordion_" data-toggle="collapse" class="accordion-toggle collapsed">
                                    <i data-icon-show="icon-angle-right" data-icon-hide="icon-angle-down" class="icon-angle-right bigger-110"></i>
                                    &nbsp;Funciones en este establecimiento
                                </a>
                            </h4>
                        </div>

                        <div id="accordion_funcion_master" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="accordion-style1 panel-group accordion-style2" id="accordion_funcion__rows">  <!-- 2DO Acordeon-->
                                    <!-- LINEAS DE FUNCION -->
                                </div> <!-- Fin 2DO Acordeon-->
                                <br>
                                <input type="button" id="funcion_button_add" value="Agregar Funci&oacute;n">
                            </div>
                        </div>
                    </div> <!-- FIN PANEL FUNCION -->
                </div>
                
            </div>
        </div>
</div> <!--FIN ROW POR CUE--> 

<!-- Tpl data row establecimiento-table-master -->
<table id="b10_table_header_row_template" style="display: none">
    <tr class="odd" id="b10_table_header_row_CUE_template">
        <td><a href="#" onclick="">NRO_CUE</a></td>
        <td>NOMBRE_ESTABLECIMIENTO</td>
        <td>DOMICILIO_ESTABLECIMIENTO</td>
        <td></td>
        <td></td>
        <td><input type="checkbox" name="b10_d12_c_1" id="b10_d12_c_1" value="1"></td>
    </tr>
</table>

<table id="b10_table_tabla_designacion_1_row_template" style="display: none">
    <tr style="display: none">
        <td>
            <select name="b10_d13_o_1" id="b10_d13_o_1"></select>
        </td>
        <td>
            <input type="text" name="b10_d23_a_1_text" style="width:100%;" id="b10_d23_a_1_text" value="" class="danger-textbox">
            <input type="hidden" name="b10_d23_a_1" id="b10_d23_a_1" value="" >
        </td>
        <td>
            <select name="b10_d14_o_1" id="b10_d14_o_1"></select>
        </td>
        <td>
            <select name="b10_d15_o_1" id="b10_d15_o_1"></select>
        </td>  
        <td><button class="btn btn-danger btn-xs"><i class="icon-trash bigger-110 icon-only"></i></button> </td>
    </tr>
</table>

<table id="b10_table_tabla_designacion_2_row_template" style="display: none">
    <tr style="display: none">
        <td>
        <select name="b10_d16_o_1" id="b10_d16_o_1"></select>
        </td>
        <td>
        <select name="b10_d17_o_1" id="b10_d17_o_1"></select>
        </td>
        <td><button class="btn btn-danger btn-xs"><i class="icon-trash bigger-110 icon-only"></i></button> </td>
    </tr>
</table>

<table id="b10_table_tabla_funcion_1_row_template" style="display: none">
    <tr style="display: none">
        <td>
            <select name="b10_d18_o_1" id="b10_d18_o_1"> </select>
        </td>
        <td>
            <input type="text" name="b10_d24_a_1_text" style="width:100%;" id="b10_d24_a_1_text" value="" class="danger-textbox">
            <input type="hidden" name="b10_d24_a_1" id="b10_d24_a_1" value="" >
        </td>
        <td>
            <select name="b10_d19_o_1" id="b10_d19_o_1"></select>
        </td>
        <td>
            <select name="b10_d20_o_1" id="b10_d20_o_1"></select>
        </td>  
        <td><button class="btn btn-danger btn-xs"><i class="icon-trash bigger-110 icon-only"></i></button> </td>
    </tr>
</table>

<table id="b10_table_tabla_funcion_2_row_template" style="display: none">
    <tr style="display: none">
        <td>
        <select name="b10_d21_o_1" id="b10_d21_o_1"></select>
        </td>
        <td>
        <select name="b10_d22_o_1" id="b10_d22_o_1"></select>
        </td>
        <td><button class="btn btn-danger btn-xs"><i class="icon-trash bigger-110 icon-only"></i></button> </td>
    </tr>
</table>

<table id="b10_table_tabla_designacioncentral_1_row_template" style="display: none">
    <tr style="display: none">
        <td>
        <div id="b10_d43_anexo"></div>
        </td>
        <td>
        <div id="b10_d43_nombre"></div>
        </td>
        <td>
        <div id="b10_d43_domicilio"></div>
        </td>
        <td>
        <div id="b10_d43_oferta"></div>
        </td>
        <td>
        <input type="checkbox" name="b10_d43_o_1" id="b10_d43_o_1" value="1">
        </td>
    </tr>
</table>


<script>
bloqueCtrl();
//last_data_used = 45;
</script>
