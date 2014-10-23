<script>
    var strFormValues = Array();
<?php $_CONTROL->renderStrFormValues(); ?>
    var arrErrors = Array();
<?php $_CONTROL->renderErrors(); ?>
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
        Características del Hogar
    </h4>

    <div id="page_globals_input_vars">
        <div class="pregunta">
            <label for="b2_d13_o_1">13. Ud, ¿vive solo/a?</label>
            <input type="radio" name="b2_d13_o_1" id="b2_d13_o_1" value="1"> Si
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="b2_d13_o_1" id="b2_d13_o_1" value="2"> No
        </div>
        
        <div class="bloque" id="novivesolo" style="display:none;" >
            <h5>
                <small>
                    <i class="icon-double-angle-right"></i>
                   ¿Con qui&eacute;n vive en su hogar?
                </small>
            </h5>
            <div class="pregunta">
                <label for="b2_d131_o_1">13.1 C&oacute;nyuge/conviviente</label>
                <input type="radio" name="b2_d131_o_1" id="b2_d131_o_1" value="1"  > Si
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="b2_d131_o_1" id="b2_d131_o_1" value="2"  > No
            </div>
            <label for="b2d132">¿Cu&aacute;ntas personas?</label>
            <div class="pregunta">
                <label  for="b2_d1321_o_1">Hijos menores de 18 a&ntilde;os de edad</label>
                <select name="b2_d1321_o_1" id="b2_d1321_o_1"></select>  
            </div>
            <div class="pregunta">
                <label for="b2_d1322_o_1" >Hijos de 18 a&ntilde;os de edad o m&aacute;s</label>
                <select name="b2_d1322_o_1" id="b2_d1322_o_1"></select>  
            </div>

            <div class="pregunta">
                <label for="b2_d1323_o_1">Padre y/o madre</label>
                <select name="b2_d1323_o_1" id="b2_d1323_o_1"></select>  
            </div>

            <div class="pregunta">
                <label for="b2_d1324_o_1">Otras personas familiares y no familiares</label>
                <select name="b2_d1324_o_1" id="b2_d1324_o_1"></select>  
            </div>
        </div>
        <div class="pregunta">
            <label for="b2_d14_o_1">14. ¿Su sueldo por su trabajo en la escuela es la principal fuente de ingresos del hogar?</label>
            <input type="radio" name="b2_d14_o_1" id="b2_d14_o_1_1" value="1" > Si
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="b2_d14_o_1" id="b2_d14_o_1_2" value="2" > No
        </div>
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<script>
    bloqueCtrl();
</script>
