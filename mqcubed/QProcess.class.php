<?php

// This class is intended to be subclassed and use to run long server-side
// running processes by defining the Work() method

abstract class QProcess extends QBaseClass {

    ///////////////////////////
    // Private Member Variables
    ///////////////////////////

    protected $objQProcessState;

    //////////
    // Methods
    //////////

    public function GetUri() {
        $strSerialized = $this->Serialize();
        $strHost = defined('__QPROCESS_URI__') ? __QPROCESS_URI__ : 'http://127.0.0.1';
        $strPath = sprintf('%s%s_core/process.php?x=%s', $strHost, __VIRTUAL_DIRECTORY__ . __PHP_ASSETS__, $strSerialized);
        LogHelper::Log($strPath);
        return $strPath;
    }

    /*
     * Genera el string de serializacion de $this 
     */

    public function Serialize() {
        $objProc = clone($this);
        $objProc->objQProcessState = null;
        $strData = serialize($objProc);
        if (function_exists('gzcompress'))
            $strData = base64_encode(gzcompress($strData, 9));
        else
            $strData = base64_encode($strData);

        $strData = str_replace('+', '-', $strData);
        $strData = str_replace('/', '_', $strData);

        return $strData;
    }

    /*
     * Hace el ""fork()"" pasando a process.php por GET, $this serializado y
     * haciendo el GET ocn un timeout de manera que se cierra el socket. 
     */

    public function Run() {
        $oldopts = stream_context_get_options(stream_context_get_default()); // save defaults
        $opts = array('http' => array('timeout' => 0.01));
        stream_context_get_default($opts);
        // el timeout es intencional y tira un error, lo capturo porque es esperable
        $e = set_error_handler(array($this, 'NoHacerNadaConElTimeout'));
        LogHelper::Debug('Lanzando QProcess: '.$this->GetUri());
        get_headers($this->GetUri());
        set_error_handler($e);
        stream_context_get_default($oldopts); // restore defaults
    }

    public function NoHacerNadaConElTimeout() {}
    
    /*
     * Funcion estatica que levanta del get el objeto QProcess y ejecuta el
     * metodo Work()
     */

    public static function RunWork() {
        $strData = QApplication::QueryString('x');
        $strData = str_replace('-', '+', $strData);
        $strData = str_replace('_', '/', $strData);

        $strData = base64_decode($strData);

        if (function_exists('gzcompress'))
            $strData = gzuncompress($strData);

        $objProc = unserialize($strData);
        try {
            $objProc->Work();
        } catch (Exception $exc) {
            LogHelper::Error(sprintf("Error ejecutando QProcess %s \r\n %s ",$exc->getMessage(),$exc->getTraceAsString()));
        }


    }

    public function UpdateState() {
        $objNewQProcessState = $this->objQProcessState->Load($this->objQProcessState->strProcessid);
        if (!$objNewQProcessState) {
            $msj = 'No se pudo cargar el estado de '.$this->objQProcessState->strProcessid;
            LogHelper::Log($msj);
            throw new QProcessException($msj,1);
        }
        $this->objQProcessState = $objNewQProcessState;
    }

/*    
    public function IsAlive() {
        if($this->objQProcessState && $this->objQProcessState->Estado == 'run') {
            $$this->objQProcessState = new QProcessArticularLocalizacionesState();
            $this->objQProcessState->Estado = 'refresh';
            $this->processArticularLocalizaciones->objQProcessState->Save();
            for ($i=0;$i<20;$i++){
                try {$this->processArticularLocalizaciones->UpdateState();} catch (QProcessException $e) {};
                if ($this->processArticularLocalizaciones->objQProcessState->Estado != 'refresh') {
                    QApplication::DisplayAlert("Una articulación se encuentra corriendo actualmente");
                    $this->processArticularLocalizaciones->arrLocalizaciones = $this->processArticularLocalizaciones->ProcessState->arrLocalizaciones;
                    $this->MostrarProgress();
                    return;
                }
                else sleep(2);
            }
            //si el qprocess no actualizó en un tiempo prudencial, deduzco que murió...
            $this->processArticularLocalizaciones->objQProcessState->Estado = '';
            $this->processArticularLocalizaciones->objQProcessState->Save();
        }
    }
 
 */
    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            case 'ProcessState':
                return $this->objQProcessState;

            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////
    public function __set($strName, $mixValue) {

        switch ($strName) {
            case 'ProcessState':
                $this->objQProcessState = $mixValue;
                break;

            default:
                try {
                    parent::__set($strName, $mixValue);
                    break;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

}

abstract class QProcessState extends QBaseClass {

    public $strProcessid;
    public $lastupdate;

    public function Save(){}
    public static function Load($strProcessid,$intTries=null){throw new QProcessException('Se debe reimplementar este método');}

}

class QProcessStatePersistFile extends QProcessState {

    public $objCache;

    public function __construct($strProcessid) {
        $this->objCache = new QCache("qprocesspersistfile", $strProcessid);
        $this->strProcessid = $strProcessid;
    }

    public function Save() {
        $objSer = clone($this);
        $objSer->objCache = null;
        $objSer->lastupdate = time();
        $this->objCache->SaveData(serialize($objSer));
    }

    public static function Load($strProcessid, $intTries=100) {
        $objCache = new QCache("qprocesspersistfile", $strProcessid);
        if (file_exists($objCache->GetFilePath())) {
            LogHelper::Debug("Cargando el QProcess $strProcessid");
            do {
                $strData = $objCache->GetData();
                if ($strData) {
                    $objQPState = @unserialize($strData);
                    if ($objQPState) {
                        $objQPState->objCache = $objCache;
                        return $objQPState;
                    }
                }
                LogHelper::Debug("load $strProcessid probando intento $intTries");
                usleep(100000); // por default el total de espera del while es 1 segundo con 10 intentos cada 0.1 segundo
            } while (--$intTries);
        }
        LogHelper::Debug("No se pudo cargar un estado válido para el proceso $strProcessid");
        return false;
    }

}

class QProcessStatePersistDB extends QProcessState {

    public static function GetDatabase() {
        return QApplication::$Database[__DB_INDEX_PROC__];
    }

    public static function GetTable() {
        return 'qprocess_state';
    }

    public function __construct($strProcessid) {
        $this->strProcessid = $strProcessid;
    }

    public function Save() {
        $objSer = clone($this);
        $objSer->lastupdate = time();
        $objDb = QProcessStatePersistDB::GetDatabase();
        $objDbResult = $objDb->Query('SELECT count(*) FROM "' . self::GetTable() . '" WHERE "qprocessid" = ' . $objDb->SqlVariable($this->strProcessid));
        $arrDbCount = $objDbResult->FetchRow();
        $intCount = $arrDbCount[0];
        if ($intCount) // record exists in db update it
            $strQuery = 'UPDATE "' . self::GetTable() . '" 
                     SET
                       "data" = ' . $objDb->SqlVariable(base64_encode(serialize($objSer))) . '
                     WHERE 
                       "qprocessid" = ' . $objDb->SqlVariable($this->strProcessid) . '
                    ;';
        else // record does not exists in db insert it
            $strQuery = 'INSERT INTO "' . self::GetTable() . '" (
                     "qprocessid", 
                     "data"
                    ) VALUES (
                     ' . $objDb->SqlVariable($this->strProcessid) . ',
                     ' . $objDb->SqlVariable(base64_encode(serialize($objSer))) . '
                    );';
        $objDb->NonQuery($strQuery);
    }

    public static function Load($strProcessid, $intTries=null) {
        $objDb = QProcessStatePersistDB::GetDatabase();
        $objDbResult = $objDb->Query('SELECT count(*) FROM "' . self::GetTable() . '" WHERE "qprocessid" = ' . $objDb->SqlVariable($strProcessid));
        $arrDbCount = $objDbResult->FetchRow();
        $intCount = $arrDbCount[0];
        $strQuery = 'SELECT "data" FROM "' . self::GetTable() . '" 
                   WHERE 
                     "qprocessid" = ' . $objDb->SqlVariable($strProcessid) . '
                  ;';
        $objDbResult = $objDb->Query($strQuery);
        $arrResult = $objDbResult->FetchRow();
        $strData = $arrResult[0];
        if ($strData) {
            $objQPState = unserialize(base64_decode($strData));
            if ($objQPState) {
                return $objQPState;
            }
        }
        return false;
    }

}

class QProcessException extends Exception {}

?>
