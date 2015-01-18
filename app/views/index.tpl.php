<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->strPageTitle; ?></title>

        <meta name="description" content="FOLIO Registro Publico Provincial de Villas y Asentamientos Precarios" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/favicon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/favicon.ico" />

        <!-- basic styles -->

        <link href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/uncompressed/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/font-awesome.min.css" />

      

        <!-- page specific plugin styles -->
        <!-- fonts 

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/ace-fonts.css" />
-->
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/jquery.gritter.css" />

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/chosen.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/ace.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/datepicker.css" />

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/estilos.css" />
          <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/sstuv.css" />
          <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/jquery.steps.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler ->

        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/ace-extra.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/html5shiv.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/jquery-2.0.3.js'>" + "<" + "/script>");
        </script>
    </head>

    <body>
        <?php $this->RenderBegin(); ?>
        <?php $this->pnlLoadingPanel->Render(); ?>
        <div id="body">
            <nav id="navbar-header" class="navbar navbar-default" role="navigation">
                <div class="pull-left">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/logo_izquierda.png" style="width:160px;heigth:40px;">
                    </div>
                <?php if (Session::Get('objUsuario')) { ?>
                <div><span class="nombre-usuario">Bienvenido , <b><?php echo Session::GetObjUsuario()->Nombre;?></b></span></div>
                <div class="pull-right">
                    
                    <div id="menu-usuario" class="pull-right">
                        <?php $this->pnlUserMenu->Render(); ?>
                    </div>
                </div>
                <?php } //si hay usuario ?>
            </nav>


            <div class="main-container top-line" id="main-container">
                <div class="main-container-inner">
<?php if (Session::Get('objUsuario')) { ?>
    <?php if (isset($this->pnlBreadCrumb)) { ?>
                        <div class="">
                            <div class="breadcrumbs" id="breadcrumbs">
                                <?php if (isset($this->pnlBreadCrumb)) $this->pnlBreadCrumb->Render(); ?>
                            </div>
                            <div id="help-button">
                                <?php if (isset($this->pnlAppController->btnAyuda)) $this->pnlAppController->btnAyuda->Render(); ?>
                            </div>
                        </div>
    <?php }//pnlBreadCrumb ?>

                        <div id="page-content" class="page-content">
                            <?php $this->pnlAppController->Render(); ?>
                        </div>
                    </div><!-- /.main-content -->
<?php } else  { //no hay usuario?>
                    <div id="page-content" class="page-content">
                    <?php $this->pnlAppController->Render(); ?>
                    </div>
<?php } //no hay usuario ?>

                </div><!-- /.main-container-inner -->

            </div><!-- /.main-container -->
            <hr class="footrow" />
            <nav id="navbar-footer" class="navbar navbar-default" role="navigation">
                <div class="row">
                    <div class="center col-md-6">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/logo_izquierda.png">
                    </div>
                    <div class="center col-md-6">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/logo_derecha.png">
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
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/jquery.watable.js"></script-->	
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/bootstrap.js"></script>
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/typeahead.js"></script-->
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/date-time/bootstrap-datepicker.js"></script-->
        <!--script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/date-time/locales/bootstrap-datepicker.es.js"></script-->
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/jquery.gritter.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/bootbox.js"></script>
        <script type="text/javascript">
            $.gritter.options.time = 100;
        </script>
        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/myace.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/mapa.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/terraformer.min.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/terraformer-wkt-parser.min.js"></script>
       

        <div id="MapaModal" class="modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Mapa</h4>
                </div>
                <div class="modal-body">
                  <div class="modal-body" id="map"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
                </div>
              </div>
            </div>
        </div>

        <div id="FolioObjetado" class="modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Objetar este Folio</h4>
                </div>
                <div class="modal-body">
                  <div class="modal-body" id="comentario-objetacion">
                        <span> Si desea objetar este folio ingrese un comentario explicando la razón:</span></br>
                        <textarea style="width:70%"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Objetar</button>
                  <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
              </div>
            </div>
        </div>

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/leaflet/leaflet.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/leaflet/leaflet.draw.css" />
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/leaflet/leaflet.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/leaflet/leaflet.draw.js"></script>  
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/leaflet/tile/Google.js"></script>      
        <script src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
        <style>
        #map {
          min-height: 500px;
        }
        </style>
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/upload/jquery.fileupload.css">

        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/upload/vendor/jquery.ui.widget.js"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        
       
        <!-- The basic File Upload plugin -->
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/upload/jquery.fileupload.js"></script>
        
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/upload_manager.js"></script>
        
        <?php $this->RenderEnd(); ?>
        <?php if (QApplication::$Database[1] && QApplication::$Database[1]->EnableProfiling) QApplication::$Database[1]->OutputProfiling(); ?>
    </body>
</html>
