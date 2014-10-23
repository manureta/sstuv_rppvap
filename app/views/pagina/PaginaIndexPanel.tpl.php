<?php if ($_CONTROL->blnEstaDeLicenciaEnTodosLosCargos) { ?>
    <div class="warning">Usted se encuentra de Licencia en todos los cargos declarados, por lo cual no se encuentra en condiciones de cargar el Censo</div>
<?php } else { ?>
    <div class="row">
        <div class="col-sm-12">
            <div id="accordion" class="accordion-style1 panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#moduloA"><i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i><span id="c13_ctl" style="display:inline;"><div class="page-header position-relative"><h4>A - Ingresar datos personales, caracter&iacute;sticas y servicios del hogar, caracter&iacute;sticas de la vivienda y consumos culturales<small><i class="icon-double-angle-right"></i></small></h4></div></span></a></h4></div>
                    <div class="panel-collapse collapse" id="moduloA">
                        <ul class="nav nav-tabs nav-stacked">

                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/1'; ?>">1 - Datos Personales </a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/2'; ?>">2 - Caracter&iacute;sticas del hogar</a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/3'; ?>">3 - Sevicios del hogar y caracter&iacute;sticas de la vivienda</a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/4'; ?>">4 - Consumos culturales y actividades generales</a></li>
                        </ul>
                    </div></div>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#moduloB"><i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i><span id="c13_ctl" style="display:inline;"><div class="page-header position-relative"><h4>B - Ingresar estudios cursados o en curso<small><i class="icon-double-angle-right"></i></small></h4></div></span></a></h4></div>
                    <div class="panel-collapse collapse" id="moduloB">
                        <ul class="nav nav-tabs nav-stacked">
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/5'; ?>">5 - Escolaridad en el nivel primario/EGB</a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/5'; ?>">5 - Escolaridad en el nivel secundario/polimodal</a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/6'; ?>">6 - Estudios de grado en el nivel superior</a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/7'; ?>">7 - Estudios de posgrado/postitulo en el nivel superior y universitario</a></li>
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/8'; ?>">8 - Cursos de capacitacion /otras actividades de desarrollo profesional</a></li>
                        </ul>                                        

                    </div></div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#moduloC"><i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i><span id="c13_ctl" style="display:inline;"><div class="page-header position-relative"><h4>C - Ingresar trayectoria ocupacional<small><i class="icon-double-angle-right"></i></small></h4></div></span></a></h4></div>
                    <div class="panel-collapse collapse" id="moduloC">
                        <ul class="nav nav-tabs nav-stacked">
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/9'; ?>">9 - Trayectoria ocupacional</a></li>
                        </ul>   
                    </div></div>   

                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#moduloD"><i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i><span id="c13_ctl" style="display:inline;"><div class="page-header position-relative"><h4>D - Designaciones y funciones<small><i class="icon-double-angle-right"></i></small></h4></div></span></a></h4></div>
                    <div class="panel-collapse collapse" id="moduloD">

                        <ul class="nav nav-tabs nav-stacked">
                            <li><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/pagina/10'; ?>">10 - Designaciones/Puestos de Trabajo/Nombramientos/Cargos</a></li>
                        </ul>   
                    </div></div> 



            </div></div></div>

<?php } ?>
