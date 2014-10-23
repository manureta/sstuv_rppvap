
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Censo Nacional del Personal de los Establecimientos Educativos</title>

        <meta name="description" content="CENPE Censo Nacional del Personal de los Establecimientos Educativos" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/images/favicon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/images/favicon.ico" />

        <!-- basic styles -->

        <link href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <!-- fonts -->

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/ace-fonts.css" />   

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/jquery.gritter.css" />

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/chosen.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/ace.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/datepicker.css" />

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/estilos.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/ace-ie.min.css" />
        <![endif]-->
        <style type="text/css" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/bloques.css"></style>

        <!-- inline styles related to this page -->

        <!-- ace settings handler ->

        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/uncompressed/ace-extra.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/html5shiv.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>
        <!--[if IE]>
        <script type="text/javascript">
        window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/jquery.gritter.min.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/date-time/locales/bootstrap-datepicker.es.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/jquery.serializejson.min.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/uncompressed/jquery.numericinput.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/jquery-ui.js"></script>
    </head>

    <body>
        <form method="post" id="page_form" action="#">
            <!--JS -->
            <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/bootbox.min.js"></script>
            <!--FIN JS-->
            <script type="text/javascript" >
            var SERVER_INSTANCE = "dev";
            PROJECT_NAME = "cenpe";
            </script>
            <div id="c1" class="QLoadingPanel"  style="padding:230px 0 0 0;text-align:center;vertical-align:middle;left:0;top:0;width:100%;height:100%;position:fixed;z-index:2147483647;cursor:wait;background-color: transparent;"><img src="<?php echo __VIRTUAL_DIRECTORY__; ?>/images/cargando.gif" alt="Cargando..." title="Cargando..."/></div>
            <div id="body">
                <nav id="navbar" class="navbar navbar-default" role="navigation">
                    <div class="pull-left">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__; ?>/images/logo_cenpe.png">
                    </div>
                    <div><span class="nombre-usuario">Bienvenido,<p><?php $_CONTROL->renderUserName(); ?></p></span></div>
                    <div class="pull-right">
                        <div id="menu-usuario" class="pull-right">
                            <div id="c2_ctl" style="display:block;">
                                <div id="c2">
                                    <?php $_CONTROL->renderUserMenu(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>


                    <div class="main-container top-line" id="main-container">
                        <div class="main-container-inner">
                            <div class="breadcrumbs" id="breadcrumbs"> <!-- INICIO BREADCRUMBS -->
                                <ul class="breadcrumb">
                                    <?php $_CONTROL->renderBreadCrumbsOptions(); ?>
                                </ul>
                            </div>    <!-- FIN BREADCRUMBS -->
                            <div id="help-button"></div>
                        </div>
                        <div id="page-content" class="page-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div  class="panel-group">
                                        <div class="panel-body">

    <!-- COMIENZO DE LA PAGINA -->
    <?php require 'pagina' . NRO_PAGINA . '.tpl.php'; ?>
    <!-- FIN DE LA PAGINA -->
                                        </div>
                                        <span style="display:inline; float: right;">
                                            <?php if ($_CONTROL->intNroPagina > 1) { ?>
                                            <button type="button" class=" btn btn-default" name="c17" id="c17" onclick="guardar_pagina('<?= __VIRTUAL_DIRECTORY__ ?>/cedula/<?php echo ($_CONTROL->intNroPagina - 1);?>');">
                                                <i class="icon-undo"></i>Anterior
                                            </button>
                                            <?php } ?>
                                            <button type="button" class=" btn btn-success" onclick="guardar_pagina()" >
                                                <i class="icon-save"></i>Guardar
                                            </button>
                                            <?php if ($_CONTROL->intNroPagina < 10) { ?>
                                            <button type="button" class=" btn btn-primary" name="c14" id="c14" onclick="guardar_pagina('<?= __VIRTUAL_DIRECTORY__ ?>/cedula/<?php echo ($_CONTROL->intNroPagina + 1);?>');">
                                                <i class="icon-arrow-right"></i>Siguiente
                                            </button>
                                            <?php } ?>
                                            <?php if ($_CONTROL->intNroPagina == 10) { ?>
                                            <button type="button" class=" btn btn-primary" name="c14" id="c14" onclick="guardar_pagina('<?= __VIRTUAL_DIRECTORY__ ?>/cedula');">
                                                <i class="icon-arrow-right"></i>Finalizar
                                            </button>
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                                       
            <hr class="footrow" />
            <nav id="navbar" class="navbar navbar-default" role="navigation">
                <div class="row">
                    <div class="center col-md-6">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/images/logo_me_trans.png">
                    </div>
                    <div class="center col-md-6">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__; ?>/images/logo_argentina.png">
                    </div>
                </div>
            </nav>
        </div>
<script type="text/javascript">
    $.gritter.options.time = 300;
</script>
<script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/myace.js"></script>
</form>
         
</body>
</html>
