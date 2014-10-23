<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();
if (!(Session::Get('IdPersonal'))) {
    header('Location:../error');
    exit;
}
$objPersonal = Personal::Load(Session::Get('IdPersonal'));
if (!$objPersonal) {
    header('Location:../error');
    exit;
}

/****************Check si hay usuario con el mismo Nombre de usuario***********************/
$strNombreUsuario= $objPersonal->Dni;
$blnUsuarioRepetido = false;
$intIntentos = 1;
while($objUsuario = Usuario::LoadByNombre($strNombreUsuario)){
    $strNombreUsuario= "{$objPersonal->Dni}-$intIntentos";
    $blnUsuarioRepetido = true;
    $intIntentos++;
}
if($intIntentos == 1){
    $strTitleUsuario = "";
}else{
    $strTitleUsuario = "Existe al menos un usuario con su mismo DNI.";
}

$blnTieneDirector = true;
$blnActividad = true;
$blnNoWay = $blnError = false;
$blnUsuarioRegistrado = false;
$strError = "";


if($objPersonal->UsuarioAsId){
    $blnNoWay = true;
    $blnUsuarioRegistrado = true;
}

if(!$objPersonal->TieneDirector()) {//check que en almenos una unidad_servicio/establecimiento tenga un director
    $blnNoWay = true;
    $blnTieneDirector = false;
} elseif(!$objPersonal->EstaEnActividad()){ //check que el personal no esté de licencia.
    $blnNoWay = true;
    $blnActividad = false;
    $arrUnidadServicio = UnidadServicio::QueryArray(
                                QQ::AndCondition(
                                    QQ::Equal(QQN::UnidadServicio()->PersonalEstablecimientoUnidadServicioAsId->IdPersonalEstablecimientoObject->IdPersonal, $objPersonal->IdPersonal)
                                )
                            );    
}
if(isset($_POST['password']) && $_POST['password'] != '' && isset($_POST['password2']) && $_POST['password2'] != '' && isset($_POST['codigo']) && $_POST['codigo'] != '' && isset($_POST['cuil']) && isset($_POST['email']) && isset($_POST['email2']) && isset($_POST['pregunta1']) && isset($_POST['respuesta1']) && isset($_POST['pregunta2']) && isset($_POST['respuesta2'])){    
    if($_POST['password'] != $_POST['password2']){
        $blnError = true;
        $strError .= "Debe repetir la misma contraseña. ";
    }
    if($_POST['email'] != $_POST['email2']){
        $blnError = true;
        $strError .= "Debe repetir el mismo Email. ";
    }
    if($_POST['codigo'] != $_SESSION['__CAPTCHA_codigo__'] && SERVER_INSTANCE!='dev'){
        $blnError = true;
        $strError .= "Código de Seguridad incorrecto. ";
    }
    if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $blnError = true;
        $strError .= "Email incorrecto. ";
    }
    if(!$blnError){
        //TODO: Crear usuario, etc
        //Checkeo por multiples <S-F5>
        if(!$blnUsuarioRegistrado){
        $objUsuario = new Usuario();
        $objUsuario->Nombre = $strNombreUsuario; 
        $objUsuario->Password = md5($_POST['password']);
        $objUsuario->Email = $_POST['email']; 
        $objUsuario->SuperAdmin = false; 
        $objUsuario->FechaActivacion = QDateTime::Now(); 
        $objUsuario->IdPerfil = Perfil::PERSONAL; 
        $objUsuario->RespuestaA = $_POST['respuesta1']; 
        $objUsuario->RespuestaB = $_POST['respuesta2']; 
        $objUsuario->PreguntaSecretaA = $_POST['pregunta1']; 
        $objUsuario->PreguntaSecretaB = $_POST['pregunta2'];
        $objUsuario->IdPersonal = $objPersonal->IdPersonal;
        $objUsuario->Save();
        $blnLogged = Authentication::LoguearUsuario($objUsuario->Nombre, $_POST['password']);
        }else{
        $strNombreUsuario = $objPersonal->UsuarioAsId->Nombre;
        }
        QApplication::ExecuteJavascript(
            'bootbox.dialog({
                message: "TOME NOTA: para ingresar en otro momento al sistema deberá hacerlo con el Usuario:  <b>' . $strNombreUsuario . '</b> y la Contraseña que especificó",
                title: "Registro exitoso!",
                closeButton: false,
                buttons: {
                  success: {
                    label: "Aceptar",
                    className: "btn-success",
                    callback: function() {
                      window.location="' . __VIRTUAL_DIRECTORY__ . '/cedula";
                    }
                  }
                }
              });'
            );
        
    }
}

        
    // seteo parametros para crear captcha
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['Length'] = 5;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['ImageHeight'] = 75;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['ForeColor'] = array(0, 0, 0);
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['SignColor'] = array(225, 225, 225);
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['BackgroundColor'] = array(255, 255, 255);
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['AllowUpperCaseLetter'] = 0;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['AllowLowerCaseLetter'] = 0;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['AllowNumbers'] = true;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['CaseSensitive'] = false;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['AddSign'] = true;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['AddNoise'] = false;
    $_SESSION['__CAPTCHA_codigo_PARAMS__']['AddBlur'] = true;
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
                    <div id="page-content" class="page-content">
                        <div style="display:block">
                            <h2>Registración de personal en el sistema</h2>
                            <hr>
<?php if(!$blnNoWay) { ?>
                            <form method="POST" action="?" onsubmit="return !ValidateForm();">
                                <div class="panel-body">
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="nombre_usuario">Usuario</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"disabled="disabled" type="text" name="nombre_usuario" id="nombre_usuario" maxlength="10" title="<?= $strTitleUsuario ?>" value="<?php echo $strNombreUsuario ?>">
                                                <span id="nombre_usuario_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
 
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="dni">DNI</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"disabled="disabled" type="text" name="dni" id="dni" maxlength="10" title="Número de documento, sin puntos." value="<?php echo $objPersonal->Dni; ?>">
                                                <span id="dni_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="cuil">CUIL/CUIT</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="cuil" id="cuil" value="<?php if(isset($_POST['cuil']) && $_POST['cuil']!='') echo $_POST['cuil']; else echo $objPersonal->Cuit; ?>">
                                                <span id="cuil_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="nombre">Nombre/s</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="nombre" id="nombre" disabled="disabled" value="<?php echo $objPersonal->Nombre; ?>">
                                                <span id="nombre_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="apellido">Apellido/s</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="apellido" id="apellido" disabled="disabled" value="<?php echo $objPersonal->Apellido; ?>">
                                                <span id="apellido_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="email" id="email" title="En esta dirección de correo electrónico recibirá las notificaciones referidas al CENPE 2014." value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="email2">Repetir Email</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="email2" id="email2" value="<?php if(isset($_POST['email2'])) echo $_POST['email2']; ?>">
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="telcodarea">Teléfono Código de Área</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="telcodarea" id="telcodarea" title="Complete el código de área telefónica incluyendo el 0 (cero) sin paréntesis,guiones ni espacios." value="<?php if(isset($_POST['telcodarea']) && $_POST['telcodarea']!='') echo $_POST['telcodarea']; else echo $objPersonal->TelCodigoArea; ?>">
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="telefono">Teléfono Número</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="telefono" value="<?php if(isset($_POST['telefono']) && $_POST['telefono']!='') echo $_POST['telefono']; else echo $objPersonal->TelNumero; ?>" id="telefono" title="Complete el número de teléfono sin guiones ni espacios. En este número de teléfono recibirá las comunicaciones referidas al CENPE 2014.Si es un celular anteponga el 15 a su número.">
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="password">Contraseña</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="password" name="password" id="password">
                                                <span id="password_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left required">
                                                <label for="password2">Repetir Contraseña</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="password" name="password2" id="password2">
                                                <span id="password2_error" style="color: red"></span>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="pregunta1">Pregunta Secreta 1</label>
                                            </div>
                                            <div class="right">
                                                <select id="pregunta1" class="listbox" size="1" name="pregunta1">
                                                    <option value="0" <?php if(isset($_POST['pregunta1']) && $_POST['pregunta1'] == 0) echo 'selected="selected"';?> >Seleccione</option>
                                                    <option value="1" <?php if(isset($_POST['pregunta1']) && $_POST['pregunta1'] == 1) echo 'selected="selected"';?>>Apellido de su abuelo materno</option>
                                                    <option value="2" <?php if(isset($_POST['pregunta1']) && $_POST['pregunta1'] == 2) echo 'selected="selected"';?>>Deporte favorito</option>
                                                    <option value="3" <?php if(isset($_POST['pregunta1']) && $_POST['pregunta1'] == 3) echo 'selected="selected"';?>>Comida preferida</option>
                                        </select>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="respuesta1">Respuesta a Pregunta Secreta 1</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="respuesta1" id="respuesta1" value="<?php if(isset($_POST['respuesta1'])) echo $_POST['respuesta1']; ?>">
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="pregunta2">Pregunta Secreta 2</label>
                                            </div>
                                            <div class="right">
                                                <select id="pregunta2" class="listbox" size="1" name="pregunta2">
                                                    <option value="0" <?php if(isset($_POST['pregunta2']) && $_POST['pregunta2'] == 0) echo 'selected="selected"';?>>Seleccione</option>
                                                    <option value="1" <?php if(isset($_POST['pregunta2']) && $_POST['pregunta2'] == 1) echo 'selected="selected"';?>>País que más desearía conocer</option>
                                                    <option value="2" <?php if(isset($_POST['pregunta2']) && $_POST['pregunta2'] == 2) echo 'selected="selected"';?>>Marca de su primer auto</option>
                                                    <option value="3" <?php if(isset($_POST['pregunta2']) && $_POST['pregunta2'] == 3) echo 'selected="selected"';?>>Canción que más le gusta</option>
                                                </select>
                                            </div>    
                                        </div>
                                    </div>
                                    <div style="display:block">
                                        <div class="renderWithName">
                                            <div class="left">
                                                <label for="respuesta2">Respuesta a Pregunta Secreta 2</label>
                                            </div>
                                            <div class="right">
                                                <input  autocomplete="off"type="text" name="respuesta2" id="respuesta2" value="<?php if(isset($_POST['respuesta2'])) echo $_POST['respuesta2']; ?>">
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="renderWithName">
                                        <div class="left required">
                                            <label for="codigo">Código de Seguridad</label>
                                        </div>
                                        <div class="right">
                                            <div class="wrapper_captcha">
                                                <img class="captcha" src="<?php echo __VIRTUAL_DIRECTORY__ ?>/php/captcha.php?cId=codigo">
                                                <input  autocomplete="off"id="codigo" class="captchatextbox" type="text" style="width:100px;" value="" name="codigo">
                                                <span id="codigo_error" style="color: red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div align="center">
                                        <button class=" btn btn-primary checkbuttonM" onclick="window.location.href='<?= __VIRTUAL_DIRECTORY__ ?>/ingreso'">
                                            <i class="icon-undo"></i>
                                            Volver
                                        </button>
                                        <button class="btn btn-success checkbuttonM" type="submit">
                                            <i class="icon-arrow-right"></i>
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
<?php } elseif($blnUsuarioRegistrado) { ?>
<p>Usted ya se encuentra registrado en el sistema. Para efectuar</p>
                                        <button class=" btn btn-primary checkbuttonM" onclick="window.location.href='<?= __VIRTUAL_DIRECTORY__ ?>/ingreso'">
                                            <i class="icon-undo"></i>
                                            Volver
                                        </button>
 
<?php } elseif(!$blnTieneDirector) { ?>
<p>No es posible continuar con su registración ya que ningún establecimiento lo ha consignado en su nómina. Contáctese con el director de su/s establecimiento/s para que lo incluya si corresponde.</p>
                                        <button class=" btn btn-primary checkbuttonM" onclick="window.location.href='<?= __VIRTUAL_DIRECTORY__ ?>/ingreso'">
                                            <i class="icon-undo"></i>
                                            Volver
                                        </button>
 
<?php } elseif(!$blnActividad) { ?>
<?php if($arrUnidadServicio) { ?>
<p>No se continúa con la registración ya que ningún establecimiento lo ha consignado como activo.</p>
<p>Los siguientes establecimientos lo han consignado en otra condición de actividad. Si considera que la información de alguno de ellos es incorrecta contáctese con el director.</p>
<table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>CUE</th>
                                        <th>Nombre Establecimiento</th>
                                        <th>Unidad de Servicio</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php foreach($arrUnidadServicio as $objUnidadServicio) { ?>
                                        <tr>
                                            <td> <?= $objUnidadServicio->IdLocalizacionObject->IdEstablecimientoObject->Cue; ?></td>
                                            <td> <?= $objUnidadServicio->IdLocalizacionObject->IdEstablecimientoObject->Nombre; ?></td>
                                            <td> <?= $objUnidadServicio->CNivelServicioObject->Descripcion ?></td>
                                        </tr>
<?php } ?>
                                </tbody></table>
<?php } else { ?>
<p>No es posible continuar con su registración ya que ningún establecimiento lo ha consignado en su nómina.<br>Contáctese con el director de su/s establecimiento/s para que lo incluya si corresponde.</p>
<?php } ?>
                                        <button class=" btn btn-primary checkbuttonM" onclick="window.location.href='<?= __VIRTUAL_DIRECTORY__ ?>/ingreso'">
                                            <i class="icon-undo"></i>
                                            Volver
                                        </button>
 
<?php } ?>
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
        <?php
            if($blnError){
                printf("<script>alert('%s'); </script>", $strError);
            }
        ?>
        <script>
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
                    case '30':
                    case '33':
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
                blnError |= CheckRequired('password');
                blnError |= CheckRequired('password2');
                blnError |= CheckRequired('codigo');
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
