<style>
.ui-menu .ui-menu-item {
    cursor: pointer;
    list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
    margin: 0;
    min-height: 0;
    padding: 3px 1em 3px 0.4em;
    position: relative;
}
.ui-state-focus {
    color: #212121;
    text-decoration: none;
    margin: -1px;
    border: 1px solid #999999;
    background-color: #e5e9ee;
    font-weight: normal;
    color: #212121;
}
                    
</style>

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
        Datos Personales
    </h4>
    <h6><small><i class="icon-double-angle-right"></i>A. Ingrese datos personales, características del hogar, servicios del hogar, características de la vivienda y consumos culturales</small></h6>

    <div id="page_globals_input_vars">
    
        <div class="pregunta">
            <label for="b1_d1_t_1">1. Apellido/s</label>
            <label for="b1_d1_t_1"><?php $_CONTROL->renderApellido(); ?></label>
        </div>

        <div class="pregunta">
            <label for="b1_d2_t_1">2. Nombre/s</label>
            <label for="b1_d2_t_1"><?php $_CONTROL->renderNombre(); ?></label>
        </div>

        <div class="pregunta">            
            <label for="b1_d3_n_1">3. DNI</label>
            <label for="b1_d3_n_1"><?php $_CONTROL->renderDni(); ?></label>
        </div>

        <div class="pregunta">
            <label for="b1_d4_n_1">4. CUIL/CUIT</label>
            <label for="b1_d4_n_1"><?php $_CONTROL->renderCuitCuil(); ?></label>
        </div>

        <div class="pregunta">
            <label for="b1_d5_d_1">5. Fecha de nacimiento</label>
            <input type="text" name="b1_d5_d_1" id="b1_d5_d_1" class="date" data-provide="datepicker" data-date-format="dd/mm/yyyy" onblur="ValidateDate(this, 1900, 2020);" onkeyup="MaskDate(this, 1900, 2020);" value="">
        </div>
        
        
        
        <div class="pregunta">
            <label for="b1_d6_o_1">6. Sexo</label>
            <select name="b1_d6_o_1" id="b1_d6_o_1"></select>
        </div>


        <div class="pregunta">
            <label for="b1_d7_o_1">7. ¿Tiene alguna discapacidad? </label>
            <input type="radio" name="b1_d7_o_1" id="b1_d7_o_1" value="1"> Si
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="b1_d7_o_1" id="b1_d7_o_1" value="2"> No
        </div>

        <div class="pregunta">
            <label for="b1d8">8. ¿En qu&eacute; provincia reside habitualmente?</label>
            <select name="b1_d8_o_1" id="b1_d8_o_1"></select>
        </div>
        
        <div class="pregunta">
            <label for="b1_d9_a_1">9. ¿En qu&eacute; localidad reside habitualmente?</label>
            <input type="text" name="b1_d9_a_1_text" id="b1_d9_a_1_text" value="" class="danger-textbox">
            <input type="hidden" name="b1_d9_a_1" id="b1_d9_a_1" value="" >
        </div>
        
        <div class="pregunta">
            <label for="b1_d10_o_1">10. ¿Cu&aacute;l es el m&aacuteximo nivel educativo de su padre</label>
            <select name="b1_d10_o_1" id="b1_d10_o_1"></select>
        </div>

        <div class="pregunta">
            <label for="b1_d11_o_1">11. ¿Cu&aacute;l es el m&aacuteximo nivel educativo de su madre?</label>
            <select name="b1_d11_o_1" id="b1_d11_o_1"></select>
        </div>

        <div class="pregunta">
            <label for="b1_d12_t_1">12. E-mail</label>
            <label for="b1_d12_t_1"><?php $_CONTROL->renderEmail(); ?></label>
        </div>
        
    </div> 

    <!-- FIN FORMULARIO GLOBAL -->

</div>  <!-- FIN SECTOR GLOBAL -->


<script>
    bloqueCtrl();
</script>
