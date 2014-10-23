<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();
$strJavaScript = sprintf('var __APP_URI__ = "http%s://%s%s%s";',
        (isset($_SERVER["HTTPS"])) ? 's' : '',
        $_SERVER['SERVER_NAME'],
        ($_SERVER['SERVER_PORT'] != '80') ? ':' . $_SERVER['SERVER_PORT'] : '',
        __VIRTUAL_DIRECTORY__);
QApplication::ExecuteJavaScript($strJavaScript)
?>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <link href="/ra2013/css/estilos_qcodo.css" type="text/css" rel="stylesheet">
    <link href="/ra2013/css/ra.css" type="text/css" rel="stylesheet">
</head>
<style>
    body{
        background: none;
    }
    .ac_results {
    background-color: white;
    border: 1px solid black;
    overflow: hidden;
    padding: 0;
    z-index: 99999;
}
.ac_results ul {
    list-style: none outside none;
    margin: 0;
    padding: 0;
    width: 100%;
}
.ac_results li {
    cursor: default;
    display: block;
    font: menu;
    font-size: 12px;
    line-height: 16px;
    margin: 0;
    overflow: hidden;
    padding: 2px 5px;
}
.ac_loading {
    background: url("indicator.gif") no-repeat scroll right center white;
}
.ac_odd {
    background-color: #EEEEEE;
}
.ac_over {
    background-color: #0A246A;
    color: white;
}

</style>
<br>
<script src="<?= __ASSETS_URI__ ?>/js//_core/qcodo.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/logger.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/event.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/post.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/control.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/number.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/listbox.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/jquery_autocomplete/jquery.bgiframe.js" type="text/javascript"></script>
<script src="<?= __ASSETS_URI__ ?>/js//_core/jquery_autocomplete/jquery.autocomplete.js" type="text/javascript"></script> 
<script src="<?= __VIRTUAL_DIRECTORY__ ?>/js/cuadros.js" type="text/javascript"></script>
<?php QApplication::ExecuteJavaScript("_PRUEBA_AUTOCOMPLETE_ = true;");?>

<form action="?" method="get">
CUADERNILLO: <select id="cuadernillo" onchange="window.location = '?cuadernillo='+this.selectedIndex;">
    <option value="0" >Seleccione un cuadernillo</option>
    <option value="1" <?php if(isset($_GET['cuadernillo']) && $_GET['cuadernillo']==1) echo "selected=selected";?>>CELESTE</option>
    <option value="2" <?php if(isset($_GET['cuadernillo']) && $_GET['cuadernillo']==2) echo "selected=selected";?>>VERDE</option>
    <option value="3" <?php if(isset($_GET['cuadernillo']) && $_GET['cuadernillo']==3) echo "selected=selected";?>>NARANJA</option>
    <option value="4" <?php if(isset($_GET['cuadernillo']) && $_GET['cuadernillo']==4) echo "selected=selected";?>>VIOLETA</option>
    <option value="5" <?php if(isset($_GET['cuadernillo']) && $_GET['cuadernillo']==5) echo "selected=selected";?>>ROSA</option>
    <option value="6" <?php if(isset($_GET['cuadernillo']) && $_GET['cuadernillo']==6) echo "selected=selected";?>>MARRON</option>
</select>    
<?php 
if(isset($_GET['cuadernillo'])){
?>
    
<?php
if($_GET['cuadernillo']==1){
// 3.A celeste (157)
$strJs = 'RegisterNewAutocomplete("inp_157_1_257", "191", "inp_157_1_563");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(157) 3.A - PLANES</h3>
<input type='text' id='inp_157_1_257' value='' rel='191' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id, this.id+'_id_columna_codigo');" /><input type="hidden" id="inp_157_1_257_id_columna_codigo" name="inp_157_1_257_id_columna_codigo" value="inp_157_1_563"><input type="hidden" id="inp_157_1_257_selected_text" name="inp_157_1_257_selected_text" value=""><input type="hidden" id="inp_157_1_257_selected_value" name="inp_157_1_257_selected_value" value="">

<?php
// 3.B celeste (611)
$strJs = 'RegisterNewAutocompleteCuadro611("inp_611_1_549", "inp_611_1_550", "196");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(611) 3.B - TITULACIONES DE OTRAS OFERTAS QUE ARTICULAN CON EL NIVEL SECUNDARIO/MEDIO/POLIMODAL EN ESTE ESTABLECIMIENTO.(TTP,IF,TAP, OT) Y MATRÍCULA</h3>
<select id="inp_611_1_550">
    <option selected="selected" value=""></option>
    <option value="218">TTP - Trayecto Técnico Profesional</option>
    <option value="219">IF - Intinerario Formativo</option>
    <option value="220">TAP - Trayecto Artístico Técnico</option>
    <option value="221">OT - Otras Titulaciones</option>
</select>
<input type='text' id='inp_611_1_549' value='' rel='196' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_611_1_549_selected_text" name="inp_611_1_549_selected_text" value=""><input type="hidden" id="inp_611_1_549_selected_value" name="inp_611_1_549_selected_value" value="">
<?php
}
if($_GET['cuadernillo']==2){
// 1 verde (257)
$strJs = 'RegisterNewAutocomplete("inp_257_1_289", "203", "inp_257_1_563");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(257) 1 - CARACTERÍSTICAS DE LAS CARRERAS Y TÍTULOS QUE SE OFRECEN EN EL ESTABLECIMIENTO </h3>
<input type='text' id='inp_257_1_289' value='' rel='203' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id, this.id+'_id_columna_codigo');" /><input type="hidden" id="inp_257_1_289_id_columna_codigo" name="inp_257_1_289_id_columna_codigo" value="inp_257_1_563"><input type="hidden" id="inp_257_1_289_selected_text" name="inp_257_1_289_selected_text" value=""><input type="hidden" id="inp_257_1_289_selected_value" name="inp_257_1_289_selected_value" value="">
<?php
}
if($_GET['cuadernillo']==3){
// 1.1 naranja (298)
$strJs = 'RegisterNewAutocomplete("inp_298_1_400", "206"); ';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(298) 1.1 - ALUMNOS POR ESPECIALIDAD/CURSO</h3>
<input size=60 type='text' id='inp_298_1_400' value='' rel='206' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_298_1_400_selected_text" name="inp_298_1_400_selected_text" value=""><input type="hidden" id="inp_298_1_400_selected_value" name="inp_298_1_400_selected_value" value="">
<?php
// 1.12 naranja (316)
$strJs = 'RegisterNewAutocomplete("inp_316_1_400", "206");RegisterNewAutocomplete("inp_316_1_390", "199");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(316) 1.12 - CURSOS DICTADOS EN EL AÑO 2012. ALUMNOS Y EGRESADOS POR SEXO SEGÚN ESPECIALIDAD/CURSO, TÍTULO/CERTIFICADO Y DURACIÓN DEL PLAN DE ESTUDIOS</h3>

<input size=60 type='text' id='inp_316_1_400' value='' rel='206' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_316_1_400_selected_text" name="inp_316_1_400_selected_text" value=""><input type="hidden" id="inp_316_1_400_selected_value" name="inp_316_1_400_selected_value" value="">
<input size=60 type='text' id='inp_316_1_390' value='' rel='199' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_316_1_390_selected_text" name="inp_316_1_390_selected_text" value=""><input type="hidden" id="inp_316_1_390_selected_value" name="inp_316_1_390_selected_value" value="">
<?php
}
if($_GET['cuadernillo']==4){
// 2.A violeta (430)
$strJs = 'RegisterNewAutocomplete("inp_430_1_257", "191", "inp_430_1_563");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(430) 2.A - PLANES</h3>
<input type='text' id='inp_430_1_257' value='' rel='191' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id, this.id+'_id_columna_codigo');" /><input type="hidden" id="inp_430_1_257_id_columna_codigo" name="inp_430_1_257_id_columna_codigo" value="inp_430_1_563"><input type="hidden" id="inp_430_1_257_selected_text" name="inp_430_1_257_selected_text" value=""><input type="hidden" id="inp_430_1_257_selected_value" name="inp_430_1_257_selected_value" value="">
<?php
// 2.B violeta (612)
$strJs = 'RegisterNewAutocompleteCuadro611("inp_612_1_549", "inp_612_1_550", "196"); ';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(612) 2.B - TITULACIONES DE OTRAS OFERTAS QUE ARTICULAN CON EL NIVEL SECUNDARIO/MEDIO/POLIMODAL EN ESTE ESTABLECIMIENTO.(TTP,IF,TAP, OT) Y MATRÍCULA</h3>
<select id="inp_612_1_550">
    <option selected="selected" value=""></option>
    <option value="218">TTP - Trayecto Técnico Profesional</option>
    <option value="219">IF - Intinerario Formativo</option>
    <option value="220">TAP - Trayecto Artístico Técnico</option>
    <option value="221">OT - Otras Titulaciones</option>
</select>
<input type='text' id='inp_612_1_549' value='' rel='196' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_612_1_549_selected_text" name="inp_612_1_549_selected_text" value=""><input type="hidden" id="inp_612_1_549_selected_value" name="inp_612_1_549_selected_value" value="">
<?php
}
if($_GET['cuadernillo']==5){
// 29 rosa (539)
$strJs = 'RegisterNewAutocomplete("inp_539_1_495", "201"); ';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(539) 29 - ALUMNOS MATRICULADOS POR TALLER</h3>
<input size=60 type='text' id='inp_539_1_495' value='' rel='201' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_539_1_495_selected_text" name="inp_539_1_495_selected_text" value=""><input type="hidden" id="inp_539_1_495_selected_value" name="inp_539_1_495_selected_value" value="">
<?php
}
if($_GET['cuadernillo']==6){
// 1.1 marron (258)
$strJs = 'RegisterNewAutocomplete("inp_258_1_294", "200");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(258) 1.1 - ALUMNOS MATRICULADOS EN CICLOS DE ENSEÑANZA</h3>
<input size=60 type='text' id='inp_258_1_294' value='' rel='200' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_258_1_294_selected_text" name="inp_258_1_294_selected_text" value=""><input type="hidden" id="inp_258_1_294_selected_value" name="inp_258_1_294_selected_value" value="">
<?php
// 1.2 marron (259)
$strJs = 'RegisterNewAutocomplete("inp_259_1_294", "200");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(259) 1.2 - ALUMNOS MATRICULADOS EN TRAYECTO ARTISTICO PROFESIONAL</h3>
<input size=60 type='text' id='inp_259_1_294' value='' rel='200' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_259_1_294_selected_text" name="inp_259_1_294_selected_text" value=""><input type="hidden" id="inp_259_1_294_selected_value" name="inp_259_1_294_selected_value" value="">
<?php
// 1.3 marron (262)
$strJs = 'RegisterNewAutocomplete("inp_262_1_294", "200"); ';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(262) 1.3 - ALUMNOS MATRICULADOS EN CURSOS Y/O TALLERES DE EDUCACIÓN ARTÍSTICA POR ESPECIALIDAD</h3>
<input size=60 type='text' id='inp_262_1_294' value='' rel='200' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_262_1_294_selected_text" name="inp_262_1_294_selected_text" value=""><input type="hidden" id="inp_262_1_294_selected_value" name="inp_262_1_294_selected_value" value="">
<?php
// 1.5 marron (264)
$strJs = 'RegisterNewAutocomplete("inp_264_1_294", "200");RegisterNewAutocomplete("inp_264_1_402", "205");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(264) 1.5 - ALUMNOS EGRESADOS DEL ÚLTIMO CICLO DE FORMACIÓN ARTÍSTICA 2012</h3>
<input size=60 type='text' id='inp_264_1_294' value='' rel='200' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_264_1_294_selected_text" name="inp_264_1_294_selected_text" value=""><input type="hidden" id="inp_264_1_294_selected_value" name="inp_264_1_294_selected_value" value="">
<input size=60 type='text' id='inp_264_1_402' value='' rel='205' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_264_1_402_selected_text" name="inp_264_1_402_selected_text" value=""><input type="hidden" id="inp_264_1_402_selected_value" name="inp_264_1_402_selected_value" value="">
<?php
// 1.6 marron (265)
$strJs = 'RegisterNewAutocomplete("inp_265_1_294", "200");RegisterNewAutocomplete("inp_265_1_402", "205");';
QApplication::ExecuteJavaScript($strJs);
?>
<h3>(265) 1.6 - ALUMNOS CERTIFICADOS DE LA FORMACIÓN ARTÍSTICA VOCACIONAL. 2012</h3>
<input size=60 type='text' id='inp_265_1_294' value='' rel='200' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_265_1_294_selected_text" name="inp_264_1_294_selected_text" value=""><input type="hidden" id="inp_264_1_295_selected_value" name="inp_264_1_294_selected_value" value="">
<input size=60 type='text' id='inp_265_1_402' value='' rel='205' class='Autocomplete string_long' style='' onkeyup="AutocompleteOnKeyUp(this.id);" /><input type="hidden" id="inp_265_1_402_selected_text" name="inp_264_1_402_selected_text" value=""><input type="hidden" id="inp_265_1_402_selected_value" name="inp_264_1_402_selected_value" value="">

<?php
}
}
?>
</form>
<br><br><br><br><br><br>
    
