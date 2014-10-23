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
        Consumos culturales y actividades generales
    </h4>

    <div id="page_globals_input_vars">
        
    <div class="pregunta">
        <label for="b4_d20_o_1">20. ¿Escucha radio habitualmente?</label>
        <input type="radio" name="b4_d20_o_1" id="b4_d20_o_1" value="1"> Si
        <input type="radio" name="b4_d20_o_1" id="b4_d20_o_1" value="2"> No
    </div>

    <div class="bloque" id="escucharadio" style="display:none;" >
        <div class="pregunta">
            <p> <label for="b4_d201_c_1">20.1 ¿Qu&eacute; tipo de programas/audiciones escucha con mayor frecuencia?</label></p>
            <p><input type="checkbox" name="b4_d201_c_1" id="b4_d201_c_1" value="1"> M&uacute;sica</p>
            <p><input type="checkbox" name="b4_d202_c_1" id="b4_d202_c_1" value="1"> Noticias</p>
            <p><input type="checkbox" name="b4_d203_c_1" id="b4_d203_c_1" value="1"> Deportes</p>
            <p><input type="checkbox" name="b4_d204_c_1" id="b4_d204_c_1" value="1"> Inter&eacute;s General</p>
        </div>
    </div>

    <div class="pregunta">

        <label for="b4d21">21. ¿Mira televisi&oacute;n habitualmente?</label>
        <input type="radio" name="b4_d21_o_1" id="b4_d21_o_1_1" value="1" > Si
        <input type="radio" name="b4_d21_o_1" id="b4_d21_o_1_2" value="2" > No

    </div>
    <div class="bloque" id="miratv" style="display:none;" >
        <div class="pregunta">
            <p><label for="b4_d2111_c_1">21.1 ¿Qu&eacute tipo de programas/audiciones mira con mayor frecuencia?</label></P>
            <p><input type="checkbox" name="b4_d2111_c_1" id="b4_d2111_c_1" value="1"> Infantiles </p>
            <p><input type="checkbox" name="b4_d2112_c_1" id="b4_d2112_c_1" value="1"> Noticias </p>
            <p><input type="checkbox" name="b4_d2113_c_1" id="b4_d2113_c_1" value="1"> Documentales </p>
            <p><input type="checkbox" name="b4_d2114_c_1" id="b4_d2114_c_1" value="1"> Deportes </p>
            <p><input type="checkbox" name="b4_d2115_c_1" id="b4_d2115_c_1" value="1"> Inter&eacute;es Educativo </p>
            <p><input type="checkbox" name="b4_d2116_c_1" id="b4_d2116_c_1" value="1"> Inter&eacute;s General </p>
            <p><input type="checkbox" name="b4_d2117_c_1" id="b4_d2117_c_1" value="1"> Ciencia y T&eacute;cnica </p>
            <p><input type="checkbox" name="b4_d2118_c_1" id="b4_d2118_c_1" value="1"> Ficci&oacute;n (Series, telenovelas,pel&iacute;culas) </p>
            <p><input type="checkbox" name="b4_d2119_c_1" id="b4_d2119_c_1" value="1"> M&uacute;sica </p>
            <p><input type="checkbox" name="b4_d21110_c_1" id="b4_d21110_c_1" value="1"> Entretenimiento </p>
        </div>
    </div>
    <div class="pregunta">
        <label for="b4_d22_o_1">22. ¿Ha asistido a alg&uacuten evento cultural(teatro,cine,recital,exposici&oacuten,etc) en los &uacute;ltimos 3 meses?</label>
        <input type="radio" name="b4_d22_o_1" id="b4_d22_o_1" value="1"> Si
        <input type="radio" name="b4_d22_o_1" id="b4_d22_o_1" value="2"> No
    </div>

    <div class="pregunta">
        <label for="b4_d23_o_1">23. ¿Lee habitualmente el diario?</label>
        <input type="radio" name="b4_d23_o_1" id="b4_d23_o_1" value="1"> Si
        <input type="radio" name="b4_d23_o_1" id="b4_d23_o_1" value="2"> No
    </div>

    <div class="bloque" id="leediario" style="display:none;" >
        <div class="pregunta">
            <label for="b4_d231_o_1">23.1 ¿Cu&aacutentos d&iacute;as  a la semana lee el diario?</label>
            <select id="b4_d231_o_1" name="b4_d231_o_1" ></select>
        </div>

        <div class="pregunta">
            <label for="b4_d2321_c_1">23.2  Lo lee en </label>
            <input type="checkbox" name="b4_d2321_c_1" id="b4_d2321_c_1" value="1"> Papel
            <input type="checkbox" name="b4_d2322_c_1" id="b4_d2321_c_1" value="1"> Internet
        </div>
    </div>
        
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<script>
    bloqueCtrl();
</script>
