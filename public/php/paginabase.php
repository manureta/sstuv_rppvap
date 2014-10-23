<?php

require('../../app/Bootstrap.php');
Bootstrap::Initialize();
define("STATUS_OK",1);
define("STATUS_ERROR_ON_SAVE",2);

if (!Session::GetUsuario()) {
    Session::End();
    die('<script>alert("La sesion caduco, vuelva a ingresar");location.href="'.__VIRTUAL_DIRECTORY__.'/";</script>');
}

abstract class PaginaBase {
    
    /*
     * ATTRIBUTES
     */
    public $intNroPagina;
    protected $strJavascriptsArray = array();
    protected $strCSSArray = array();
    protected $mixDatoArray = array();
    protected $strBreadCrumbsArray = array();
    protected $objPersonal;
    protected $arrErrors = array();

    
    /*
     * PROTECTED METHODS
     */
    
    //Esta funcion permite traer datos de varias paginas, por defecto siempre se usa la misma pagina.
    protected function LoadData(&$intNroPagina) {
        if(!isset($this->mixDatoArray[$intNroPagina])){
            $objDatoArray = array();
            $objDatoPersonalBloque = DatoPersonalBloque::LoadByIdPersonalIdBloque($this->objPersonal->IdPersonal, $intNroPagina);
            $objDatoPersonalBloque &&
                //$objDatoPersonalBloque->Dato && 
                    $objDatoArray = (array)unserialize(base64_decode($objDatoPersonalBloque->Dato));
            $this->mixDatoArray[$intNroPagina] = $objDatoArray;
        }
    }
    
    protected function checkCrossScripting($mixValue) {
        if (is_array($mixValue)) {
            foreach ($mixValue as $k => $v) {
                $mixValue[$k] = $this->checkCrossScripting($v);
            }
        } elseif (is_string($mixValue) || is_numeric($mixValue) || is_bool($mixValue)) {
            $strText = strtolower($mixValue);
            if ((strpos($strText, '<script') !== false) ||
                (strpos($strText, '<applet') !== false) ||
                (strpos($strText, '<embed') !== false) ||
                (strpos($strText, '<style') !== false) ||
                (strpos($strText, '<link') !== false) ||
                (strpos($strText, '<body') !== false) ||
                (strpos($strText, '<iframe') !== false) ||
                (strpos($strText, 'javascript:') !== false) ||
                (strpos($strText, ' onfocus=') !== false) ||
                (strpos($strText, ' onblur=') !== false) ||
                (strpos($strText, ' onkeydown=') !== false) ||
                (strpos($strText, ' onkeyup=') !== false) ||
                (strpos($strText, ' onkeypress=') !== false) ||
                (strpos($strText, ' onmousedown=') !== false) ||
                (strpos($strText, ' onmouseup=') !== false) ||
                (strpos($strText, ' onmouseover=') !== false) ||
                (strpos($strText, ' onmouseout=') !== false) ||
                (strpos($strText, ' onmousemove=') !== false) ||
                (strpos($strText, ' onclick=') !== false) ||
                (strpos($strText, '<object') !== false) ||
                (strpos($strText, 'background:url') !== false)) {
                throw new QCrossScriptingException($this->strControlId);
            }
        }
        $mixValue = str_replace("\0", "", $mixValue);
        return $mixValue;
    }
    
    protected function filterData($strPostValuesArray){
        foreach ($strPostValuesArray as $strName => $mixValue) {
            switch (true) {
                case (strpos($strName,'b'.$this->intNroPagina.'_global') !== false) :
                    //$strFilterValuesArray[$strName]=$this->checkCrossScripting($mixValue);
                break;
                default: // otros tipos de datos?
                    unset($strPostValuesArray[$strName]);
                break;
            }
        }

        return $strPostValuesArray;
    }

    protected function sendJsonInformation(&$strJsonArray){
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($strJsonArray);
    }
    
    
    /*
     * PUBLIC METHODS
     */
    public function __construct($intNroPagina) {
        $this->intNroPagina = $intNroPagina;
        $arrUsuario = Session::GetUsuario();
        $this->objPersonal = Personal::Load($arrUsuario['IdPersonal']);
        if (!$this->objPersonal) {
            Session::End();
            die('<script>alert("Los datos de sesion son inconsistentes, vuelva a ingresar");location.href="'.__VIRTUAL_DIRECTORY__.'/";</script>');
        }
        $this->LoadData($intNroPagina);
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
    
    public function addJavascript($strJavascriptPath){
        $this->strJavascriptsArray[]=$strJavascriptPath;
    }

    public function addCSS($strJavascriptPath){
        $this->strJavascriptsArray[]=$strJavascriptPath;
    }
    
    public function setBreadCrumbsOptions($strBreadCrumbsArray=array()){
        $this->strBreadCrumbsArray = $strBreadCrumbsArray;
    }
    
    public function saveData($strPostValuesArray){
        $JsonResponce = array();
        $JsonResponce["error_controls"]=array();
        $JsonResponce["status"]=STATUS_OK;
        $strPostValuesArray=$this->filterData($strPostValuesArray);
        $JsonResponce=$this->parseData($strPostValuesArray, $JsonResponce);
//        foreach ($this->mixDatoArray as $mixKey => $objDato) {
//            if ($objDato->NoGuardar) {
//                unset($this->mixDatoArray[$mixKey]);
//            }
//        }
        //Persistencia
        $objDatoPersonalBloque = DatoPersonalBloque::LoadByIdPersonalIdBloque($this->objPersonal->IdPersonal, $this->intNroPagina);
        if(!$objDatoPersonalBloque){
            $objDatoPersonalBloque = new DatoPersonalBloque();
            $objDatoPersonalBloque->IdPersonalObject = $this->objPersonal;
            $objDatoPersonalBloque->IdBloque = $this->intNroPagina;
        }
        $this->setEstadoPagina($JsonResponce);
        $objDatoPersonalBloque->Dato = base64_encode(serialize($strPostValuesArray));
        $objDatoPersonalBloque->Save();
        $this->sendJsonInformation($JsonResponce);
    }
    
    protected function setEstadoPagina($jsonResponse) {
        $arrUsuarioInfo = Session::GetUsuario();
        if (!$objPersonalEstadoPagina = PersonalEstadoPagina::LoadByIdPersonalNropagina($arrUsuarioInfo["IdPersonal"], $this->intNroPagina)) {
            $objPersonalEstadoPagina = new PersonalEstadoPagina();
            $objPersonalEstadoPagina->IdPersonal = $arrUsuarioInfo["IdPersonal"];
            $objPersonalEstadoPagina->Nropagina = $this->intNroPagina;
        }
        if (isset($JsonResponce["error_controls"]) && count($JsonResponce["error_controls"])) {
            $objPersonalEstadoPagina->CEstadoPagina = EstadoPaginaType::ConErrores;
        } else {
            $objPersonalEstadoPagina->CEstadoPagina = EstadoPaginaType::Completa;
            // TODO: Sacar esto apenas funcione bien
            $objPersonalEstadoPagina->Save();
            $objPersonalEstadoPagina->Delete();
            return $jsonResponse;
        }
        $objPersonalEstadoPagina->Save();
        return $jsonResponse;
    }
    /*
     * Se encarga de extraer la informacion que se quiere obtener.
     * Debe devolver $JsonResponce
     */
    protected abstract function parseData($strPostValuesArray,$JsonResponce);
    
    /*
     * PUBLIC RENDER METHODS
     */
    public function renderNroPagina(){
        echo $this->intNroPagina;
    }
    
    public function renderJavascriptFiles(){
        foreach($this->strJavascriptsArray as $strJavascriptPath){
            echo sprintf('<script src="%s/%s"></script>',__VIRTUAL_DIRECTORY__,$strJavascriptPath);
        }
    }
    
    public function renderCSSFiles(){
        foreach($this->strCSSArray as $strCSSPath){
            echo "<script src=\"$strCSSPath\"></script>";
        }
    }
    
    public function renderStrFormValues(){
        foreach($this->mixDatoArray[$this->intNroPagina] as $mixDatoKey => $mixDatoValue){
            echo "strFormValues['".$mixDatoKey."']='".$mixDatoValue."';";
        }
    }
    
    public function renderErrors(){
        foreach($this->arrErrors as $mixDatoKey => $arrInfo){
            echo "arrErrors['".$mixDatoKey."']='".json_encode($arrInfo)."';";
        }
    }
    
    public function renderFormAction(){
        echo __VIRTUAL_DIRECTORY__.'/php/pagina'.$this->intNroPagina.'.php';
    }
    
    public function renderUserName(){
        $arrUsuario = Session::GetUsuario();
        echo htmlentities($this->objPersonal->Nombre.' '.$this->objPersonal->Apellido." (".$arrUsuario['NombreUsuario'].") ");
    }
    
    /*
     * Array[titulo]=url;
     */
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
    
}
$strBreadCrumbsArray=Array();
$strBreadCrumbsArray['Inicio']=__VIRTUAL_DIRECTORY__.'/page/home';
$strBreadCrumbsArray['Cédula']=__VIRTUAL_DIRECTORY__.'/cedula';

?>
