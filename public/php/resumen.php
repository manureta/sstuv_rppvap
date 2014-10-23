<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();

class Resumen {

    public $objPersonalEstadoPaginaArray = array();
    public $strBreadCrumbsArray = array();
    public $objPersonal;
    public $arrPaginas = array(
        1 => array('Nombre' => 'Datos Personales', 'Estado' => '-', 'Pagina' => 1),
        2 => array('Nombre' => 'Caracter&iacute;sticas del hogar', 'Estado' => '-', 'Pagina' => 2),
        3 => array('Nombre' => 'Servicios del hogar y caracter&iacute;sticas de la vivienda', 'Estado' => '-', 'Pagina' => 3),
        4 => array('Nombre' => 'Consumos culturales y actividades generales', 'Estado' => '-', 'Pagina' => 4),
        5 => array('Nombre' => 'Escolaridad en el nivel primario/EGB, secundario/polimodal', 'Estado' => '-', 'Pagina' => 5),
        6 => array('Nombre' => 'Estudios de grado en el nivel superior', 'Estado' => '-', 'Pagina' => 6),
        7 => array('Nombre' => 'Estudios de posgrado/postitulo en el nivel superior y universitario', 'Estado' => '-', 'Pagina' => 7),
        8 => array('Nombre' => 'Cursos de capacitación / Otras actividades de desarrollo profesional', 'Estado' => '-', 'Pagina' => 8),
        9 => array('Nombre' => 'Trayectoria ocupacional', 'Estado' => '-', 'Pagina' => 9),
        10 => array('Nombre' => 'Designaciones/Puestos de Trabajo/Nombramientos/Cargos', 'Estado' => '-', 'Pagina' => 10),
    );

    public function __construct() {
        $arrUsuarioInfo = Session::GetUsuario();
        $this->objPersonal = Personal::Load($arrUsuarioInfo["IdPersonal"]);
        $objPersonalEstadoPaginaArray = PersonalEstadoPagina::LoadArrayByIdPersonal($this->objPersonal->IdPersonal);
        foreach ($objPersonalEstadoPaginaArray as $objPersonalEstadoPagina) {
            $this->arrPaginas[$objPersonalEstadoPagina->Nropagina]["Estado"] = EstadoPaginaType::$NameArray[$objPersonalEstadoPagina->CEstadoPagina];
        }
    }
    
    public function setBreadCrumbsOptions($strBreadCrumbsArray=array()){
        $this->strBreadCrumbsArray = $strBreadCrumbsArray;
    }
    
    public function renderBreadCrumbsOptions(){
        foreach($this->strBreadCrumbsArray as $strBreadCrumb => $strBreadCrumbUrl ){
            $strBreadCrumb = htmlentities($strBreadCrumb);
            $strOut = <<< MyTxt
                <li>
                    <a href='{$strBreadCrumbUrl}' target="_self" >{$strBreadCrumb}</a>
                </li>
MyTxt;
            echo $strOut;
        }
    }

    public function renderUserName(){
        $arrUsuario = Session::GetUsuario();
        echo htmlentities($this->objPersonal->Nombre.' '.$this->objPersonal->Apellido." (".$arrUsuario['NombreUsuario'].") ");
    }

    public function renderUserMenu() {
        $strVirtualDirectory = __VIRTUAL_DIRECTORY__;
        $str='';
        switch ($this->objPersonal->UsuarioAsId->IdPerfil) {
            case Perfil::DIRECTOR:
                $str = <<< Menu
                                    <span id="c3_ctl" style="display:inline;"><button type="button" class=" btn btn-primary" name="c3" id="c3" onclick="location.href='{$strVirtualDirectory}/'"><i class="icon-home"></i>Inicio</button></span>
                                    <span id="c4_ctl" style="display:inline;"><button type="button" class=" btn btn-success" name="c4" id="c4" onclick="location.href='{$strVirtualDirectory}/establecimiento'"><i class="icon-building"></i>Establecimientos</button></span>
                                    <span id="c5_ctl" style="display:inline;"><button type="button" class=" btn btn-warning" name="c5" id="c5" onclick="location.href='{$strVirtualDirectory}/incidente'"><i class="icon-bolt"></i>Peticiones</button></span>
                                    <span id="c6_ctl" style="display:inline;"><button type="button" class=" btn btn-purple" name="c6" id="c6" onclick="location.href='{$strVirtualDirectory}/cedula'"><i class="icon-edit"></i>Cédula</button></span>
                                    <span id="c7_ctl" style="display:inline;"><button type="button" class=" btn btn-yellow" name="c7" id="c7" onclick="location.href='{$strVirtualDirectory}/usuario/perfil'"><i class="icon-user"></i>Editar Perfil</button></span>
                                    <span id="c8_ctl" style="display:inline;"><button type="button" class=" btn btn-info" name="c8" id="c8" onclick="location.href='{$strVirtualDirectory}/logout'"><i class="icon-off"></i>Salir</button></span>

                                    
Menu;
            break;
            case Perfil::PERSONAL:
                $str = <<< Menu
                                    <span id="c8_ctl" style="display:inline;"><button type="button" class=" btn btn-info" name="c8" id="c8" onclick="location.href='{$strVirtualDirectory}/logout'"><i class="icon-off"></i>Salir</button></span>

Menu;
            break;
            case Perfil::OPERADOR:
                $str = <<< Menu
                    <span id="c3_ctl" style="display:inline;"><button type="button" class=" btn btn-primary" name="c3" id="c3" onclick="location.href='{$strVirtualDirectory}/'"><i class="icon-home"></i>Inicio</button></span><span id="c4_ctl" style="display:inline;"></span>
                    <span id="c5_ctl" style="display:inline;"><button type="button" class=" btn btn-warning" name="c5" id="c5" onclick="location.href='{$strVirtualDirectory}/incidente'"><i class="icon-bolt"></i>Peticiones</button></span>
                    <span id="c7_ctl" style="display:inline;"><button type="button" class=" btn btn-purple" name="c7" id="c7" onclick="location.href='{$strVirtualDirectory}/usuario/resetearpass'"><i class="icon-edit"></i>Resetear Passwords</button></span>
                    <span id="c8_ctl" style="display:inline;"><button type="button" class=" btn btn-warning" name="c8" id="c8" onclick="location.href='{$strVirtualDirectory}/informacionglobal'"><i class="icon-book"></i>Información Global</button></span>
                    <span id="c9_ctl" style="display:inline;"><button type="button" class=" btn btn-pink" name="c9" id="c9" onclick="location.href='{$strVirtualDirectory}/admnominas'"><i class="icon-book"></i>Adm. Nominas</button></span>
                    <span id="c10_ctl" style="display:inline;"><button type="button" class=" btn btn-yellow" name="c10" id="c10" onclick="location.href='{$strVirtualDirectory}/usuario/perfil'"><i class="icon-user"></i>Editar Perfil</button></span>
                    <span id="c11_ctl" style="display:inline;"><button type="button" class=" btn btn-info" name="c11" id="c11" onclick="location.href='{$strVirtualDirectory}/logout'"><i class="icon-off"></i>Salir</button></span>
Menu;
            break;
            case Perfil::SUPERVISOR:
                $str = <<< Menu
                    <span id="c3_ctl" style="display:inline;"><button type="button" class=" btn btn-primary" name="c3" id="c3" onclick="location.href='{$strVirtualDirectory}/'"><i class="icon-home"></i>Inicio</button></span><span id="c4_ctl" style="display:inline;"></span>
                    <span id="c5_ctl" style="display:inline;"><button type="button" class=" btn btn-warning" name="c5" id="c5" onclick="location.href='{$strVirtualDirectory}/incidente'"><i class="icon-bolt"></i>Peticiones</button></span>
                    <span id="c6_ctl" style="display:inline;"><button type="button" class=" btn btn-grey" name="c6" id="c6" onclick="location.href='{$strVirtualDirectory}/establecimiento/desvincular'"><i class="icon-minus-sign"></i>Desvinculación</button></span>
                    <span id="c7_ctl" style="display:inline;"><button type="button" class=" btn btn-purple" name="c7" id="c7" onclick="location.href='{$strVirtualDirectory}/usuario/resetearpass'"><i class="icon-edit"></i>Resetear Passwords</button></span>
                    <span id="c8_ctl" style="display:inline;"><button type="button" class=" btn btn-warning" name="c8" id="c8" onclick="location.href='{$strVirtualDirectory}/informacionglobal'"><i class="icon-book"></i>Información Global</button></span>
                    <span id="c9_ctl" style="display:inline;"><button type="button" class=" btn btn-pink" name="c9" id="c9" onclick="location.href='{$strVirtualDirectory}/admnominas'"><i class="icon-book"></i>Adm. Nominas</button></span>
                    <span id="c10_ctl" style="display:inline;"><button type="button" class=" btn btn-yellow" name="c10" id="c10" onclick="location.href='{$strVirtualDirectory}/usuario/perfil'"><i class="icon-user"></i>Editar Perfil</button></span>
                    <span id="c11_ctl" style="display:inline;"><button type="button" class=" btn btn-info" name="c11" id="c11" onclick="location.href='{$strVirtualDirectory}/logout'"><i class="icon-off"></i>Salir</button></span>
Menu;
            break;
        }
        echo $str;
    }
    
}



$_CONTROL = new Resumen();

//BreadCrumbs
$strBreadCrumbsArray=Array();
$strBreadCrumbsArray['Inicio']=__VIRTUAL_DIRECTORY__.'/page/home';
$strBreadCrumbsArray['Cédula']=__VIRTUAL_DIRECTORY__.'/cedula';
//$strBreadCrumbsArray['Resumen']='';
$_CONTROL->setBreadCrumbsOptions($strBreadCrumbsArray);
//JavaScripts

//Css

require 'resumen.tpl.php'; //Siempre

?>
