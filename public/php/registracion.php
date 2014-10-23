<?php 
    require('../../app/Bootstrap.php');
    Bootstrap::Initialize();
    $blnNotFound = false;
    if(isset($_POST['apellido']) && $_POST['apellido'] != '' && isset($_POST['nombre']) && $_POST['nombre'] != '' && isset($_POST['dni']) && $_POST['dni'] != '' && isset($_POST['cuil'])){
        $objPersonal = Personal::BuscarPersonal(strtoupper(trim($_POST['apellido'])), trim($_POST['dni']));
        if($objPersonal){
            Session::Set('IdPersonal', $objPersonal->IdPersonal);
            header(sprintf('Location: %s/ingreso/2', __VIRTUAL_DIRECTORY__));
            exit;
        }
        $blnNotFound = true;
    }
    
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        $blnLogged = Authentication::LoguearUsuario($_POST['usuario'], $_POST['clave']);
        if ($blnLogged) {
            header(sprintf('Location: %s/cedula', __VIRTUAL_DIRECTORY__));
            exit;
        }
    }
    // si estaba logueado lo saco
    Session::End();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Censo Nacional del Personal de los Establecimientos Educativos</title>

        <meta name="description" content="CENPE Censo Nacional del Personal de los Establecimientos Educativos" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/favicon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/favicon.ico" />

        <!-- basic styles -->

        <link href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/uncompressed/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <!-- fonts -->

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/jquery.gritter.css" />

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/chosen.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/ace.css" />
        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/datepicker.css" />

        <link rel="stylesheet" href="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/css/estilos.css" />
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
        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/uncompressed/jquery.gritter.js"></script>
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/bootbox.min.js"></script>
        <script type="text/javascript">
            $.gritter.options.time = 100;
        </script>
        <div id="body">
            <nav id="navbar" class="navbar navbar-default" role="navigation">
                <div class="pull-left">
                    <img src="<?php echo __VIRTUAL_DIRECTORY__;?>/images/logo_cenpe.png">
                </div>
            </nav>


            <div class="main-container top-line" id="main-container">
                <div class="main-container-inner">                    
                    <div id="page-content" class="page-content">
                        <div style="display:block">
                            <h3>Ingreso de Personal por primera vez:</h3>
                            <hr>
                            <form method="POST" action="?" onsubmit="return !ValidateForm();">
                                <div class="panel-body">
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="apellido">Apellido/s</label>
                                            </div>
                                            <div class="right">
                                                 <input autocomplete="off"type="text" name="apellido" id="apellido" value="<?php if(isset($_POST['apellido'])) echo $_POST['apellido']; ?>">
                                                <span id="apellido_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="nombre">Nombre/s</label>
                                            </div>
                                            <div class="right">
                                                 <input autocomplete="off"type="text" name="nombre" id="nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>">
                                                <span id="nombre_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="dni">DNI</label>
                                            </div>
                                            <div class="right">
                                                 <input autocomplete="off"type="text" name="dni" id="dni" maxlength="10" title="Número de documento, sin puntos." value="<?php if(isset($_POST['dni'])) echo $_POST['dni']; ?>">
                                                <span id="dni_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:none">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="cuil">CUIL/CUIT</label>
                                            </div>
                                            <div class="right">
                                                 <input autocomplete="off"type="text" name="cuil" id="cuil" value="<?php if(isset($_POST['cuil'])) echo $_POST['cuil']; ?>">
                                                <span id="cuil_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center">
                                        <button class=" btn btn-success checkbuttonM" type="submit">
                                            <i class="icon-arrow-right"></i>
                                            Comenzar Registro
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="display:block">
                            <h3>Ingreso de Usuarios ya registrados:</h3>
                            <hr>
                            <form method="POST" action="?" onsubmit="return !ValidateLoginForm()">
                                <div class="panel-body">
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="usuario">Usuario</label>
                                            </div>
                                            <div class="right">
                                                 <input autocomplete="off"type="text" name="usuario" id="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>">
                                                <span id="usuario_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="clave">Contraseña</label>
                                            </div>
                                            <div class="right">
                                                 <input autocomplete="off"type="password" name="clave" id="clave" value="<?php if(isset($_POST['clave'])) echo $_POST['clave']; ?>">
                                                <span id="clave_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center">
                                        <button class=" btn btn-success checkbuttonM" type="submit">
                                            <i class="icon-arrow-right"></i>
                                            Ingresar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div><!-- /.main-container-inner -->

            </div><!-- /.main-container -->
            <hr class="footrow" />
            <nav id="navbar" class="navbar navbar-default" role="navigation">
                <div class="row">
                    <div class="center col-md-6">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/images/logo_me_trans.png">
                    </div>
                    <div class="center col-md-6">
                        <img src="<?php echo __VIRTUAL_DIRECTORY__;?>/images/logo_argentina.png">
                    </div>
                </div>
            </nav>
        </div>
<?php
if(isset($blnLogged) && !$blnLogged){
    echo "<script>alert('Usuario/Contraseña incorrectos'); </script>";
}
if(isset($blnNotFound) && $blnNotFound){
    echo "<script>bootbox.alert('No es posible continuar con su registración ya que ningún establecimiento lo ha consignado en su nómina.<br>Contáctese con el director de su/s establecimiento/s para que lo incluya si corresponde'); </script>";
}
?>
        <script>
            // cuit sin "-"
            function ValidateCuit(obj){
                if(!obj.value.length)
                    return true;
                if(obj.value != obj.value.replace(/[^0-9]+/,""))
                    return false;
                if (obj.value.length != 11){
                    return false;
                }
                switch(obj.value.substr(0,2)){
                    case '20':
                    case '23':
                    case '24':
                    case '27':
                        var aMult = '5432765432';
                        var aMult = aMult.split('');            
                        aCUIT = obj.value.split('');
                        var iResult = 0;
                        for(i = 0; i <= 9; i++){                            
                            iResult += parseInt(aCUIT[i]) * parseInt(aMult[i]);                        
                        }
                        iResult = (iResult % 11);
                        iResult = 11 - iResult;

                        if (iResult == 11) iResult = 0;
                        if (iResult == 10) iResult = 9;

                        if (iResult == parseInt(aCUIT[10]))                    
                            return true;
                        return false;
                        break;                    
                    default:
                        return false;
                }
                return false;
            }
            
            function CheckRequired(id){
                if(!document.getElementById(id).value.trim().length){
                    var blnError = true;
                    var msg = 'Este campo no puede quedar vacío.';
                }
                else{
                    var blnError = false;
                    var msg = '';
                }
                var span = $('#'+id).parent().find('#'+id+'_error')[0];
                span.innerHTML = msg;
                return blnError
            }
            
            function ValidateForm(){
                var blnError = false;
                blnError |= CheckRequired('apellido');
                blnError |= CheckRequired('nombre');
                blnError |= CheckRequired('dni');
                blnErrorCuit = !ValidateCuit(document.getElementById('cuil'));
                if(blnErrorCuit){
                    var msg = 'CUIL/CUIT inválido';
                    blnError = true;
                }
                else{
                    var msg = '';
                }
                var span = $('#cuil_error')[0];
                span.innerHTML = msg;
                return blnError;
            }

            function ValidateLoginForm(){
                var blnError = false;
                blnError |= CheckRequired('usuario');
                blnError |= CheckRequired('clave');
                return blnError;
            }
            
        </script>           

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="<?php echo __VIRTUAL_DIRECTORY__;?>/assets/js/myace.js"></script>

        <?php if (QApplication::$Database[1] && QApplication::$Database[1]->EnableProfiling) QApplication::$Database[1]->OutputProfiling(); ?>
    </body>
</html>
