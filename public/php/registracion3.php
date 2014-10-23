<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();

?>
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

        <link href="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/uncompressed/bootstrap.css" rel="stylesheet" />
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

        <!-- inline styles related to this page -->

        <!-- ace settings handler ->

        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/uncompressed/ace-extra.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/html5shiv.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/uncompressed/jquery-2.0.3.js'>" + "<" + "/script>");
        </script>        
    </head>

    <body>
        <div id="body">
            <nav id="navbar" class="navbar navbar-default" role="navigation">
                <div class="pull-left">
                    <img src="<?php echo __VIRTUAL_DIRECTORY__; ?>/images/logo_cenpe.png">
                </div>
                <?php if (Session::Get('objUsuario')) { ?>
                    <div><span class="nombre-usuario">Bienvenido,<p><?php echo Session::GetObjUsuario() ?></p></span></div>
                    <div class="pull-right">
                        <div id="menu-usuario" class="pull-right">

                        </div>
                    </div>
                <?php } //si hay usuario ?>
            </nav>


            <div class="main-container top-line" id="main-container">
                <div class="main-container-inner">                    
                    <div id="page-content" class="-content">
                        <div style="display:block">
                            <h2>Registración de personal en el sistema</h2>
                            <hr>

<center>
<h3>Ya puede ingresar al sistema con el Usuario:<b><?= Session::GetobjUsuario()->Nombre ?></b> y la Contraseña que especificó</h3>

                                        <button class=" btn btn-success checkbuttonM" onclick="window.location.href='<?= __VIRTUAL_DIRECTORY__?>'">
                                            <i class="icon-arrow-right"></i>
                                            Ingresar
                                        </button>
</center>




                        </div>
                    </div>                    
                </div><!-- /.main-container-inner -->

            </div><!-- /.main-container -->
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
window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/jquery.watable.js"></script-->	
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/bootstrap.min.js"></script>
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/uncompressed/typeahead.js"></script-->
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/date-time/bootstrap-datepicker.js"></script-->
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/date-time/locales/bootstrap-datepicker.es.js"></script-->
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/uncompressed/jquery.gritter.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/bootbox.min.js"></script>
        <script type="text/javascript">
            $.gritter.options.time = 100;
        </script>
        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/myace.js"></script>

        <?php if (QApplication::$Database[1] && QApplication::$Database[1]->EnableProfiling) QApplication::$Database[1]->OutputProfiling(); ?>
    </body>
</html>
