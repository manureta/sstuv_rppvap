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
    <div id="page_globals_hidden_vars" style="display: none"></div> <!-- No se usa en esta pagina, pero se usa por compatibilidad -->
    
    <!-- FORMULARIO GLOBAL -->

    <h4 class="header red lighter smaller">
        <i class="icon-group-alt smaller-90"></i>
        Trayectoria ocupacional docente
    </h4>

    <div id="page_globals_input_vars">
        
        <div class="pregunta">
            <label for="b9_d30_n_1">30. &iquest;Cu&aacute;ntos a&ntilde;os en total ha trabajado/ trabaja hasta la fecha efectivamente en los establecimientos educativos?</label>
            <input type="text"name="b9_d30_n_1" id="b9_d30_n_1" value=""  >
        </div>

        <div class="pregunta">
             <label for="b9_d301_n_1">30.1 ¿Cu&aacute;ntos años trabaj&oacute; en el dictado de clases antes de ser Director/Supervisor? (SOLO PARA DIRECTORES Y SUPERVISORES)</label>
             <input type="text" name="b9_d301_n_1" id="b9_d301_n_1" value=""  >
         </div>

        <div class="pregunta">
            <label for="b9_d302_n_1">30.2 ¿Cu&aacute;ntos años trabaj&oacute;/a en funciones de direcci&oacute;n antes de ser Supervisor? (SOLO PARA SUPERVISORES)</label>
            <input type="text" name="b9_d302_n_1" id="b9_d302_n_1" value=""  >
        </div>

        <div class="pregunta">
            <label for="b9_d31_o_1">31. &iquest;Realiza otra actividad laboral fuera de los establecimientos educativos?</label>
            <input  type="radio" name="b9_d31_o_1" id="b9_d31_o_1" value="1"> S&iacute;
            <input  type="radio" name="b9_d31_o_1" id="b9_d31_o_1" value="2"> No
        </div>

        <div class="pregunta">
            <label for="b9_d32_n_1">32. &iquest;&iquest;Cu&aacute;ntas horas semanales dedica?</label>
            <input type="text" name="b9_d32_n_1" id="b9_d32_n_1" value=""  >
        </div>

        <div class="pregunta">
            <label for="b9_d33_o_1">33. Su primer trabajo como docente, fue en una escuela ubicada en… (SOLO PARA DOCENTES)</label>
            <p> <input type="radio" name="b9_d33_o_1" id="b9_d33_o_1"  value="1"> En zona urbana </p>
            <p> <input type="radio"  name="b9_d33_o_1" id="b9_d33_o_1" value="2"> En zona rurales </p>
        </div>

        <div class="pregunta">
            <p> <label for="b9_d34_o_1">34. La escuela de su primer trabajo como docente, pertenecía al…(SOLO PARA DOCENTES)</label></p>
            <p> <input type="radio" name="b9_d34_o_1" id="b9_d34_o_1" value="1">  Sector estatal</p>
            <p> <input type="radio" name="b9_d34_o_1" id="b9_d34_o_1" value="2">  Sector privado</p>
        </div>

        <div class="pregunta">
            <label for="b9_d35_o_1">35. &iquest;La poblaci&oacute;n que asist&iacute;a a la escuela era mayoritariamente de nivel Socio Econ&oacute;mico Bajo? (SOLO PARA DOCENTES)</label>
            <input type="radio" name="b9_d35_o_1" id="b9_d35_o_1" value="1"> Si
            <input type="radio" name="b9_d35_o_1" id="b9_d35_o_1" value="2"> No
        </div>

        <div class="pregunta">
            <label for="b9_d36_n_1">36. En general.. &iquest;Cu&aacute;ntos a&ntilde;os trabaj&oacute; en su primer trabajo? (SOLO PARA DOCENTES)</label>
            <input type="text" name="b9_d36_n_1" id="b9_d36_n_1" value="" >
        </div>

        <div class="pregunta">
            <label for="b9_d37_o_1">37. A lo largo de su trayectoria laboral, &iquest;ha dejado de trabajar temporalmente en el sistema educativo?<span style="color:#aaa;font-style:italic;"><em><br>(No tome en cuenta las licencias dentro del sistema educativo)</em></span> (SOLO PARA DOCENTES)</label>
            <input type="radio" name="b9_d37_o_1" id="b9_d37_o_1" value="1"> Si
            <input type="radio" name="b9_d37_o_1" id="b9_d37_o_1" value="2"> No
        </div>

        <div class="pregunta">
            <label for="b9_d371_n_1">37.1 &iquest;Cu&aacute;ntos años en total dej&oacute; de trabajar? (SOLO PARA DOCENTES)</label>
            <input type="text" name="b9_d371_n_1" id="b9_d371_n_1" value="" >
        </div>

        <div class="pregunta">
            <label for="b9_d372_o_1">37.2 &iquest;Cu&aacute;les fueron los motivos por los que suspendi&oacute; la docencia? (SOLO PARA DOCENTES)</label>
             <select id="b9_d372_o_1" name="b9_d372_o_1"></select>
        </div>

        <div class="pregunta">
            <label for="b9_d373_o_1">37.3 ¿Cu&aacute;les fueron los motivos por los que retom&oacute; la docencia? (SOLO PARA DOCENTES)</label>
             <select id="b9_d373_o_1" name="b9_d373_o_1"></select>
        </div>
        
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<script>
    bloqueCtrl();
</script>
