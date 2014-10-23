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
        Servicios del hogar y características de la vivienda
    </h4>

    <div id="page_globals_input_vars">
        
        <div class="pregunta">
            <label>15. ¿Con cu&aacute;les de los siguientes elementos cuenta en su hogar? Indique todos los que corresponda</label>
            <p><input type="checkbox" name="b3_d151_c_1" id="b3_d151_c_1" value="1">Tel&eacute;fono de l&iacute;nea /celular</p>
            <p><input type="checkbox" name="b3_d152_c_1" id="b3_d152_c_1" value="1">Internet</p>
            <p><input type="checkbox" name="b3_d153_c_1" id="b3_d153_c_1" value="1">Tablet</p>
            <p><input type="checkbox" name="b3_d154_c_1" id="b3_d154_c_1" value="1">Computadoras en el hogar</p>
        </div>

        <div class="bloque" id="tienecomputadora" style="display:none;" >
            <div class="pregunta">
                <label for="b3_d151_o_1">15.1 ¿Cu&aacute;ntas?</label>
                <select id="b3_d151_o_1" name="b3_d151_o_1"></select>
            </div>

            <div class="pregunta">
                <label for="b3_d152_o_1">15.2 ¿Cu&aacute;ntas de esas computadoras fueron otorgadas por el gobierno nacional?</label>
                <select id="b3_d152_o_1" name="b3_d152_o_1"></select> 
            </div>

            <div class="pregunta">
                <label for="b3_d153_o_1">15.3 ¿Cu&aacute;ntas de esas computadoras fueron otorgadas por el gobierno provincial?</label>
                <select id="b3_d153_o_1" name="b3_d153_o_1"></select> <!-- Cantidad del 0 al 9 -->
            </div>
        </div>

        <div class="pregunta">

            <label for="b3_d16_o_1">16. Su vivienda es...  </label> 
            <select id="b3_d16_o_1" name="b3_d16_o_1"></select>
        </div>


        <div class="pregunta">
            <label for="b3_d17_o_1">17. ¿Est&aacute pagando un pr&eacute;stamo hipotecario/bancario o plan de vivienda?</label>
            <input type="radio" name="b3_d17_o_1" id="b3_d17_o_1" value="1"> Si
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="b3_d17_o_1" id="b3_d17_o_1" value="2"> No
        </div>

        <div class="pregunta">
            <label for="b3_d18_o_1">18. ¿De qu&eacute tipo es su vivienda?</label> 
            <select name="b3_d18_o_1" id="b3_d18_o_1" ></select>
        </div>


        <div class="pregunta">
            <label for="b3_d19_o_1">19. ¿Qu&eacute cantidad de habitaciones/ambientes destinadas a dormir tiene su vivienda?</label>
            <!-- Cantidad del 0 al 9 -->
            <select id="b3_d19_o_1" name="b3_d19_o_1"></select>
        </div>
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<script>
    bloqueCtrl();
</script>
