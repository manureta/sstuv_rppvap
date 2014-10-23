<?php


class VersionIncorrectaSoapFault extends SoapFault{public function __construct(){parent::__construct('VersionMismatch', 'La Version del sistema se encuentra desactualizada');}}

class IdDesconocidoSoapFault extends SoapFault{public function __construct(){parent::__construct('sender', 'Id Desconocido');}}

class MD5SoapFault extends SoapFault{public function __construct(){parent::__construct('DataEncodingUnknown', 'Error de MD5');}}

abstract class DinieceAppWebService extends QSoapService {
    protected $arrayServiceState = array();
    protected $objEncripter;
    protected $strSistemaNombre; // a definir en la subclase
    protected $objLastFault;

    public static $mixOldErrorLevel;

    /**
     * Devuelve la lista de versiones
     * @param string $arrayServiceState
     * @return string 
     */
    public function DameVersiones($arrayServiceState){
        try{
            if($this->CheckId($arrayServiceState)){
                
                $objSistemaVersionActual = SistemaVersion::GetInstanceByNombreVersion($this->strSistemaNombre, $this->Version, $this->VersionPatch ,$this->CProvincia);

                if(!$objSistemaVersionActual)
                    return serialize(array());
                $arrVersiones = $objSistemaVersionActual->GetArrayNuevasVersiones($this->VersionPatch,$this->CProvincia);
                LogHelper::Debug(print_r($arrVersiones,true));
                return serialize($arrVersiones);
            } else {
                return $this->objLastFault;
            }
        }catch(Exception $e){
            LogHelper::Debug("entro en un catch ".$e->getMessage());
            throw $e;
            return '';
        }
    }


		protected function CheckId($arrayServiceState, $boolCheckVersion = false){
            $this->objEncripter = new QCryptography();
            $strData = $this->objEncripter->Decrypt($arrayServiceState);
            LogHelper::Debug('En '.__CLASS__.' desencriptando el token');
            $this->arrayServiceState = unserialize($strData);
            LogHelper::Debug("Ingreso: ".serialize($this->arrayServiceState));
            if (is_array($this->arrayServiceState)) {
                LogHelper::Debug('arrayServiceState: '.var_export($this->arrayServiceState, true));
                if(!$this->Version||!$this->CProvincia){
                    $this->objLastFault = new IdDesconocidoSoapFault();
                    return false;
                }
                if($boolCheckVersion && $this->Version != __SISTEMA_VERSION__ ) {
                    $this->objLastFault = new VersionIncorrectaSoapFault();
                    return false;
                }
                return true;
            } else {
                $this->objLastFault = new IdDesconocidoSoapFault();
                return false;
            }
		}

        /**
         * Envio archivos partidos en pedacitos.
         * @param string $arrayServiceState
         * @param integer $intNroEnvio
         * @param integer $intTotalEnvios
         * @param string $content_encoded
         * @param string $tablename
         * @param string $md5
         * @return boolean
         */
        public function EnviarPartesDelArchivo($arrayServiceState, $intNroEnvio,$intTotalEnvios,$content_encoded, $tablename,$md5){
            if($this->CheckId($arrayServiceState, true)){

                if(md5($content_encoded)==$md5){
                    LogHelper::Debug("Provincia {$this->CProvincia} tabla $tablename parte $intNroEnvio de $intTotalEnvios");
                    $strPath = FileManager::GetFilePath($this->CProvincia,$tablename);
                    $file_ok = FileManager::SaveIncomingFile($intNroEnvio, $strPath, $content_encoded);
   
                }else{
                    LogHelper::Log("falló md5: ".md5($content_encoded)." != ".$md5);
                    return new MD5SoapFault();
                }
                return true;
            } else {
                return $this->objLastFault;
            }
            //error_log("Paso por EnviarPartesDelArchivo: ".print_r($this->arrayServiceState,true));
            return false;
        }

        /**
         * finaliza en archivo y lo ssincroniza.
         * @param string $arrayServiceState
         * @param string $md5
         * @param string $strTableName
         * @return boolean
         */
        public function TerminoEnvio($arrayServiceState,$md5,$strTableName){
            if($this->CheckId($arrayServiceState, true)){
                $strPath = FileManager::GetFilePath($this->CProvincia,$strTableName);
                if(!FileManager::CheckMD5($strPath,$md5)){
                    return new MD5SoapFault();
                }
                return true;
            } else {
                return $this->objLastFault;
            }

            return false;
        }

        public function __get($strName){
            switch($strName){
                case 'Version':
                    return $this->arrayServiceState['version'];
                case 'VersionPatch':
                    return (!empty($this->arrayServiceState['version_patch']))?$this->arrayServiceState['version'].'.'.$this->arrayServiceState['version_patch']:$this->arrayServiceState['version'];
                case 'CProvincia':
                    return $this->arrayServiceState['c_provincia'];
                case 'HttpdServerVersion':
                    return $this->arrayServiceState['httpd_server_version'];
                case 'PostgresVersion':
                    return $this->arrayServiceState['postgres_version'];
                case 'Os':
                    return $this->arrayServiceState['os'];
                case 'PhpVersion':
                    return $this->arrayServiceState['php_version'];
            }

        }

}

?>
