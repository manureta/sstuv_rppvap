
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
    </head>

    <body>
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

            <!--TODO: COMENTAR -->
            <script type="text/javascript" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/mqcubed/assets/js/_core/qcodo.js"></script>
            <script type="text/javascript" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/mqcubed/assets/js/_core/logger.js"></script>
            <script type="text/javascript" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/mqcubed/assets/js/_core/event.js"></script>
            <script type="text/javascript" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/mqcubed/assets/js/_core/post.js"></script>
            <script type="text/javascript" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/mqcubed/assets/js/_core/control.js"></script>
            <script type="text/javascript" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/mqcubed/assets/js/_core/integer.js"></script>
            <!--TODO: FIN COMENTAR -->
            <script type="text/javascript" >
            var SERVER_INSTANCE = "dev";
            PROJECT_NAME = "cenpe";
            </script>
            <style type="text/css" media="all" src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/css/bloques.css"></style>
            <div id="c1_ctl" style="display:block;">
            </div>        
            <div id="body">
                <nav id="navbar" class="navbar navbar-default" role="navigation">
                    <div class="pull-left">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__; ?>/images/logo_cenpe.png">
                    </div>
                    <div><span class="nombre-usuario">Bienvenido,<p><?php $_CONTROL->renderUserName(); ?></p></span></div>
                    <div class="pull-right">
                        <div id="menu-usuario" class="pull-right">
                            <div id="c2_ctl" style="display:block;">
                                <div id="c2" >
                            <div id="c2_ctl" style="display:block;">
                                <div id="c2">
                                    <?php $_CONTROL->renderUserMenu(); ?>
                                </div>
                            </div>
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

    <div class="row">
        <div class="col-sm-12">
            <div id="accordion" class="accordion-style1 panel-group">
<div class="page-header position-relative"><h1>Cédula Censal<small><i class="icon-double-angle-right"></i></small></h1></div>
                <div class="panel panel-default">
                    <div class="panel-collapse in" id="moduloA">
                        <table class="nav nav-tabs nav-stacked" width="100%">
                            <tr><th>P&aacute;gina</th><th>Descripci&oacute;n</th><th>Estado</th></tr>
                            <?php foreach ($_CONTROL->arrPaginas as $data) { ?>
                            <tr>
                                <td width="5%"><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/cedula/'.$data["Pagina"]; ?>"><?php echo $data["Pagina"]; ?></a></td>
                                <td width="65%"><a href="<?php echo __VIRTUAL_DIRECTORY__ . '/cedula/'.$data["Pagina"]; ?>"><?php echo $data["Nombre"]; ?></a></td>
                                <td width="30%"><?php echo $data["Estado"]; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
            <div>
                <p>Se analizará la información cargada, por favor vuelva a ingresar en unos días para ver el estado de cada ítem.</p>
            </div>
        </div>
    <!-- FIN DE LA PAGINA -->
                                        </div>
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
<script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/bootbox.min.js"></script>
<script type="text/javascript">
    $.gritter.options.time = 100;
</script>
<script src="<?php echo __VIRTUAL_DIRECTORY__; ?>/assets/js/myace.js"></script>
         
</body>
</html>


