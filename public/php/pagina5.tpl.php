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
        Estudios de nivel primario y secundario
    </h4>
    <h6><small><i class="icon-double-angle-right"></i>Ud. deber&aacute; completar para cada uno de los niveles la siguiente informaci&oacute;n…</small></h6>

    <div id="page_globals_input_vars">
        
        <div class="pregunta">
            <label for="b5_d24_o_1">24. Ud.,al nivel primario</label>
            <select id="b5_d24_o_1" name="b5_d24_o_1"></select>
        </div>

        <div class="bloque" id="primarioasiste" style="display:none;" >
            <div class="pregunta">
                <label for="b5_d241_o_1">24.1 El establecimiento al que asistió/ asiste pertenece al sector </label>
                <input type="radio" name="b5_d241_o_1" id="b5_d241_o_1" value="1"> Estatal
                <input type="radio" name="b5_d241_o_1" id="b5_d241_o_1" value="2"> Privado
            </div>
            <div class="bloque" id="primarioasistio" style="display:none;" >
                <div class="pregunta">
                    <label for="b5_d242_o_1">24.2 Complet&oacute; este nivel</label>
                    <input type="radio" name="b5_d242_o_1" id="b5_d242_o_1" value="1"> Si
                    <input type="radio" name="b5_d242_o_1" id="b5_d242_o_1" value="2"> No
                </div>
            </div>
        </div>

        <div class="pregunta">
            <label for="b5_d25_o_1">25. Ud., al nivel secundario...</label>
            <select id="b5_d25_o_1" name="b5_d25_o_1"></select>
        </div>
        <div class="bloque" id="secundarioasiste" style="display:none;" >
            <div class="pregunta">
                <label for="b5_d251_o_1">25.1 El establecimiento al que asisti&oacute;/ asiste pertenece al sector</label>
                <input type="radio" name="b5_d251_o_1" id="b5_d251_o_1" value="1"> Estatal
                <input type="radio" name="b5_d251_o_1" id="b5_d251_o_1" value="2"> Privado
            </div>

            <div class="bloque" id="secundarioasistio" style="display:none;" >
                <div class="pregunta">
                    <label for="b5_d252_o_1">25.2 Complet&oacute; este nivel</label>
                    <input type="radio" name="b5_d252_o_1" id="b5_d252_o_1" value="1"> Si
                    <input type="radio" name="b5_d252_o_1" id="b5_d252_o_1" value="2"> No
                </div>
            </div>
        </div>

        <div class="pregunta">
            <label for="b5_d253_o_1">25.3 ¿Cu&aacute;l es la orientaci&oacute;n del nivel secundario/polimodal que curs&oacute;/a est&aacute; cursando?</label>
            <select id="b5_d253_o_1" name="b5_d253_o_1"></select>
        </div>

        <div class="pregunta">
            <label for="b5_d254_n_1">25.4 ¿En qu&eacute; año egres&oacute;?</label>
            <input type="text" name="b5_d254_n_1" id="b5_d254_n_1" value="">
        </div>
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<script>
    bloqueCtrl();
</script>
