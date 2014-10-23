<?php
if (!extension_loaded("soap")) dl("php_soap.".PHP_SHLIB_SUFFIX);
ini_set('soap.wsdl_cache_enabled', '0'); 
ini_set('soap.wsdl_cache_ttl', '0');
/*
class IdDesconocidoSoapFault extends SoapFault {
    public function __construct() {
        parent::__construct('sender', 'Id Desconocido');
    }
}


class VersionIncorrectaSoapFault extends SoapFault {
    public function __construct() {
        parent::__construct('VersionMismatch', 'La Version del sistema se encuentra desactualizada');
    }
}


class MD5SoapFault extends SoapFault {
    public function __construct() {
        parent::__construct('DataEncodingUnknown', 'Error de MD5');
    }
}
*/
class DinieceAppWebServiceClient {
    protected $objSoapClient;
    public $strToken= array();
    protected static $blnUseProxy = true;

    public function GetWsdlUri() {
        return sprintf('%s?wsdl', __WEBSERVICE_MANAGER_SOAP_URI__);
    }

    public function GetClassMap() {
        return array();
    }

    public static function UsarProxy($blnUsarProxy = true) {
        self::$blnUseProxy = $blnUsarProxy;
    }

    /**
     * Se conecta y si no anda
     */
    public function __construct(){
        if (defined('DISABLE_WS') && DISABLE_WS === true) {
            LogHelper::Log('El servicio de WebService se encuentra deshabilitado');
            throw new QCallerException('El servicio de WebService se encuentra deshabilitado');
        }
        //if (!TestingHelper::TestWebService())
        //    return false;
        $strWsdlUrl = $this->GetWsdlUri();
        $strTnsUrl = str_replace(array('http://', '?wsdl'), '', $strWsdlUrl);
        if (stripos($strTnsUrl, 'localhost') !== false) {
            //seteamos el blnUseProxy en false, ya que estamos en localhost
            //LogHelper::Debug('Seteamos UsarProxy en false, ya que el wsdl es de localhost');
            self::UsarProxy(false);
        }
        LogHelper::Debug(sprintf("Intentado conectar a %s",$strWsdlUrl));
        try{
            //QApplication::SetErrorHandler(array("DinieceAppWebServiceClient","ws_error_handler"));
            $old = error_reporting(0);
            $OpcionesArray = array(
//                "encoding"   => 'utf8',
                "trace"      => 1,
                "exceptions" => 1,
//                "compression" => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
                "connection_timeout"=>10);
            $classmap = $this->GetClassMap();
            $blnUseCurl = false;
            if(!empty($classmap)) $OpcionesArray['classmap'] = $classmap;

            if (self::$blnUseProxy) {
                LogHelper::Debug('UseProxy seteado en true');
                if(defined('__HTTP_PROXY_URI__') && __HTTP_PROXY_URI__){
                    LogHelper::Debug(sprintf("Usando proxy %s",__HTTP_PROXY_URI__));
                    if(__HTTP_PROXY_URI__)$OpcionesArray['proxy_host'] = __HTTP_PROXY_URI__;
                    if(__HTTP_PROXY_PORT__)$OpcionesArray['proxy_port'] = __HTTP_PROXY_PORT__;
                    if(__HTTP_PROXY_USER__)$OpcionesArray['proxy_login'] = __HTTP_PROXY_USER__;
                    if(__HTTP_PROXY_PASS__)$OpcionesArray['proxy_password'] = __HTTP_PROXY_PASS__;
                    LogHelper::Debug('Hay proxy, se usa cURL');
                    $blnUseCurl = true;
                }
            } else {
                if (defined('__HTTP_PROXY_URI__') && __HTTP_PROXY_URI__) {
                    LogHelper::Debug('UseProxy seteado en false y __HTTP_PROXY_URI__ = '.__HTTP_PROXY_URI__);
                } else {
                    LogHelper::Debug('UseProxy seteado en false');
                }
            }
            if($blnUseCurl) 
                $this->objSoapClient = new CurlSoapClient($strWsdlUrl, $OpcionesArray);
            else
                $this->objSoapClient = new SoapClient($strWsdlUrl, $OpcionesArray);
    
            //QApplication::RestoreErrorHandler();
            $old = error_reporting($old);
        }catch(Exception $e){
            //LogHelper::Log($e->getMessage(),'sincronizador.log');
            LogHelper::Debug('Exception en '.__FUNCTION__.' de '.__CLASS__.': '. $e->getMessage());
            throw new Exception("El servicio $strWsdlUrl No se Encuentra Disponible:" .$e->getMessage());
        }
        if(!$this->objSoapClient){
            LogHelper::Debug('No !$this->objClient en '.__FUNCTION__.' de '.__CLASS__);
            throw new Exception("El servicio $strWsdlUrl No se Encuentra Disponible");
        }
        try {
            $this->strToken = self::GetEncryptedToken();
            $this->CheckInstanciaActual();
        } catch(Exception $e) {
            LogHelper::Log($e->getMessage(),'sincronizador.log');
            LogHelper::Debug('No se pudo encriptar y crear el Token en '.__FUNCTION__.' de '.__CLASS__);
            throw $e;
        }
        ini_set('default_socket_timeout',600);
        LogHelper::Debug(sprintf("Conexión establecida a %s",$strWsdlUrl));
    }

    public function CheckInstanciaActual() {
        // redefinir en proyecto que se necesite
        return true;
    }

    public static function GetEncryptedToken() {
        if (defined('__COD_PROV__')) {
            $strCodProv = __COD_PROV__;
        } else {
            $strCodProv = 'No esta definido __COD_PROV__';
        }
        if (function_exists('pg_version')) {
            if (defined('__CONF_INI_OK__') && __CONF_INI_OK__) {
                $objDb = QApplication::$Database[1];
                try{
                    $strPgVersion = $objDb->Version();
                }catch(Exception $e){
                    $strPgVersion = "desconocida";
                }
            } else {
                $strPgVersion = 'La constante __CONF_INI_OK__ es false, por lo que es imposible obtener la version de Postgres';
            }
        } else {
            $strPgVersion = 'No existe la funcion pg_version';
        }
        if (defined('PHP_VERSION')) {
            $strPhpVersion = PHP_VERSION;
        } elseif (function_exists('phpversion')) {
            $strPhpVersion = phpversion();
        } else {
            $strPhpVersion = 'No esta definida PHP_VERSION y no existe la funcion phpversion().';
        }
        if (defined('__SISTEMA_VERSION__')) {
            $strSistemaVersion = __SISTEMA_VERSION__;
        } else {
            $strSistemaVersion = 'No esta definida __SISTEMA_VERSION__';
        }
        if (defined('DB_CONNECTION_1')) {
            $arrConn = unserialize(DB_CONNECTION_1);
        } else {
            $arrConn = array('database' => '', 'server' => '', 'port' => '');
        }

        $arrIdentificacion = array(
            "path"              =>  __PROJECT_DIR__,
            "uri"               =>  __VIRTUAL_DIRECTORY__,
            "db_name"           =>  $arrConn['database'],
            "db_host"           =>  $arrConn['server'],
            "db_port"           =>  $arrConn['port']
        );

        $strAct = '';
        if (file_exists(__PROJECT_DIR__.'/config/ACTUALIZACION')) {
            $strAct = trim(file_get_contents(__PROJECT_DIR__.'/config/ACTUALIZACION'));
        }

        $arr = array(
            "sistema"               =>  __APP_SHORT_NAME__, 
            "version"               =>  $strSistemaVersion,
            "actualizacion"         =>  $strAct,
            "version_patch"         =>  "",
            "c_provincia"           =>  $strCodProv,
            "httpd_server_version"  =>  $_SERVER['SERVER_SOFTWARE'],
            "postgres_version"      =>  $strPgVersion,
            "php_version"           =>  $strPhpVersion,
            "os"                    =>  PHP_OS,
            "hash_identificacion"   =>  serialize($arrIdentificacion)
        );
        
        $strData = serialize($arr);
        $objEncripter = new QCryptography();
        $strToken = $objEncripter->Encrypt($strData);
        return $strToken;
    }

    public static function ReportarError($strError, $strSeveridad = 'error', $strSistema= __APP_SHORT_NAME__) {
        try {
            LogHelper::Debug('Antes de intentar enviar el error: '.$strError);
            $objClient = new self();
            $objClient->EnviarError($strError,$strSeveridad, $strSistema);
        } catch(SoapFault $e) {
            LogHelper::Log('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $objClient->__getLastResponse().' faultcode '.$e->faultcode);
            throw $e;
        } catch (Exception $e) {
            LogHelper::Log('Exception en '.__FUNCTION__.' de '.__CLASS__.': '. $e->getMessage());
            throw $e;
        }
    }

    public function __getLastResponse() {
        return $this->objSoapClient->__getLastResponse();
    }

    public function EnviarError($strError, $strSeveridad = 'error', $strSistema= __APP_SHORT_NAME__, $strArchivo= "") {
        try {
            $this->strToken = self::GetEncryptedToken();
            LogHelper::Debug('Reportando error en '.__FUNCTION__.' de '.__CLASS__);
            $this->objSoapClient->ReportarError($this->strToken, $strSeveridad, $strSistema, utf8_encode($strError), $strArchivo, $_SERVER);
            LogHelper::Debug('Error reportado en '.__FUNCTION__.' de '.__CLASS__);
            return true;
        } catch(SoapFault $e) {
            $intCode = $e->faultcode;
            //LogHelper::Log($e->getMessage().":".$this->objSoapClient->__getLastResponse());
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $this->objSoapClient->__getLastResponse());
            switch($intCode) {
                case "sender":
                    throw new IdDesconocidoSoapFault();
                case "SOAP-ENV:VersionMismatch":
                    throw new VersionIncorrectaSoapFault();
                case "DataEncodingUnknown":
                    throw new MD5SoapFault();
                default:
                    LogHelper::Log($this->objSoapClient->__getLastResponse(), 'error.log');
                    throw $e;
            }
        } catch (Exception $e) {
            LogHelper::Log('ERROR: No funciono el envio de error por WebService. '.$e->getMessage());
            LogHelper::Debug('Exception en '.__FUNCTION__.' de '.__CLASS__.': '. $e->getMessage());
            throw $e;
        }
        return false;
    }

    public function EnviarBackup($strTableName, $strFilePath, $strFileName) {
        set_time_limit(0);
        if (!is_file($strFilePath)) throw new Exception("El archivo $strFilePath no existe");
        $intLength = filesize($strFilePath);
        $md5_file = md5_file($strFilePath);
        $postSize = __MAX_POST_SIZE__;
        $arrayPartes = array();

        if($intLength>$postSize) {
            while($intLength>$postSize) {
                $intLength = $intLength - $postSize;
                $arrayPartes[] = array('size'=>$postSize, 'listo'=>false);
            }
        }
        if($intLength)
            $arrayPartes[] = array('size'=>$intLength, 'listo'=>false);
        $cantPartes = count($arrayPartes);
        $r = fopen($strFilePath,'rb');
        try {
            foreach($arrayPartes as $intNroEnvio => $InfoEnvio) {
                $intSize = $InfoEnvio['size'];
                $content = fread($r,$intSize);
                $content_encoded = base64_encode($content);
                $md5 = md5($content_encoded);
                LogHelper::Debug('Conectandose a EnviarPartesDelArchivo envio '.$intNroEnvio.' de '.$cantPartes.' en '.__FUNCTION__.' de '.__CLASS__.': ');
                LogHelper::Log("conectandose a EnviarPartesDelArchivo envio $intNroEnvio de $cantPartes",'sincronizador.log');
                $intentos = 20;
                $blnEnvio = false;
                while(!$blnEnvio && $intentos > 0){
                    try{
                        $blnEnvio = @$this->objSoapClient->EnviarPartesDelArchivo($this->strToken, $intNroEnvio,$cantPartes,$content_encoded,$strTableName,$md5);
                        if($blnEnvio!==true) throw new Exception("Falló el envío");
                        //$blnEnvio = true;
                    }catch(Exception $e){
                        $intentos--;
                        LogHelper::Log("Falló la conexion al servidor en el ". (20 - $intentos) . " intento");
                        if($intentos < 1) throw $e;
                    }
                    
                }
                
            }
            fclose($r);
            LogHelper::Log("Enviando Fin de archivo",'sincronizador.log');
            $strResponse = $this->objSoapClient->TerminoEnvio($this->strToken, $md5_file, $strTableName);
            LogHelper::Log("Terminó envio",'sincronizador.log');
        }catch(SoapFault $e) {
            $intCode = $e->faultcode;
            LogHelper::Log($e->getMessage().":".$this->objSoapClient->__getLastResponse(),'sincronizador.log');
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $this->objSoapClient->__getLastResponse());
            switch($intCode) {
                case "sender":
                    throw new IdDesconocidoSoapFault();
                case "SOAP-ENV:VersionMismatch":
                    throw new VersionIncorrectaSoapFault();
                case "DataEncodingUnknown":
                    throw new MD5SoapFault();
                default:
                    print $this->objSoapClient->__getLastResponse();
                    throw $e;
            }
        } catch (Exception $e) {
            LogHelper::Debug('Exception en '.__FUNCTION__.' de '.__CLASS__.': '. $e->getMessage());
            throw $e;
        }
    }


    public function SincronizarDatos(){
        LogHelper::Log("Enviando Fin de archivo",'sincronizador.log');
        try {
            $strResponse = $this->objSoapClient->SincronizarDatos($this->strToken);
        } catch(SoapFault $e) {
            $intCode = $e->faultcode;
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $this->objSoapClient->__getLastResponse());
            LogHelper::Log($e->getMessage().":".$this->objSoapClient->__getLastResponse(),'sincronizador.log');
            switch($intCode) {
                case "sender":
                    throw new IdDesconocidoSoapFault();
                case "SOAP-ENV:VersionMismatch":
                    throw new VersionIncorrectaSoapFault();
                case "DataEncodingUnknown":
                    throw new MD5SoapFault();
                default:
                    print $this->objSoapClient->__getLastResponse();
                    throw $e;
            }
        }
        LogHelper::Log("envió A sincronizar Datos",'sincronizador.log');
    }

    public function DameNuevasVersiones() {
        try {
            $strResponse = $this->objSoapClient->DameVersiones($this->strToken);
            return unserialize($strResponse);
        }catch(Exception $e) {
            LogHelper::Log($this->objSoapClient->__getLastResponse(),'sincronizador.log');
            LogHelper::Debug('Exception en '.__FUNCTION__.' de '.__CLASS__.': '. $e->getMessage());
            throw $e;
        }
        return array();

    }

    public function TraeArchivoDeNacion($strTokenNuevaVersion) {
        try {
            $strContent = $this->objSoapClient->TraeArchivoDeNacion($this->strToken, $strTokenNuevaVersion);
        }catch(Exception $e) {
            $str = $this->objSoapClient->__getLastResponse();
            LogHelper::Log($str,'sincronizador.log');
            throw $e;
        }
        if(!$strContent) {
            throw new Exception('No se pudo Traer el archivo');
        }
        $strpath = sprintf("%s/%s.zip",__UPDATES_DIR__,$strTokenNuevaVersion);
        if(file_exists($strpath))
            unlink($strpath);
        if(!is_dir(__UPDATES_DIR__)) {
            mkdir(__UPDATES_DIR__,0777,true);
        }
        $ArchivoContent = base64_decode($strContent);
        file_put_contents($strpath, $ArchivoContent);

        return $strpath;
    }

    public function InformarVersion($strVersion, $strDesc, $strVersionAnt) {
        try{
            return $this->objSoapClient->NuevaVersion($strVersion, $strDesc, $strVersionAnt);
        }catch (Exception $e){
            LogHelper::Debug('Exception en '.__FUNCTION__.' de '.__CLASS__.': '. $e->getMessage());
            LogHelper::Log($this->objSoapClient->__getLastResponse());
            throw $e;
        }
    }
    
    public static function ws_error_handler($__exc_errno, $__exc_errstr, $__exc_errfile, $__exc_errline, $__exc_errcontext){
        //throw new Exception($__exc_errstr);
        throw new QCallerException($errstr, $errno);

    }

}


?>
