<?php

class PGSessionHandler implements SessionHandlerInterface {

    protected $pdo_pgsql_session_handle;

    public function __construct() {
        $this->pgsql_session_handle = null;
        session_set_save_handler(
                array($this, "open"), array($this, "close"), array($this, "read"), array($this, "write"), array($this, "destroy"), array($this, "gc")
        );
        // estas configuraciones generan un hash de 27 bytes
        ini_set('session.hash_function',1); //seteo sha1 que da más combinaciones posibles
        ini_set('session.hash_bits_per_character',6); //utilizo un alfabeto más completo que optimiza el largo del string
        /* Variables Internas */
        define("PGSH_SESSION_ID_MAX_LENGTH", 27); /* Campo PGSH_TABLE_FIELD_ID en la base de datos */
        
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Initialize session
     * @link http://php.net/manual/en/sessionhandler.open.php
     * @param string $save_path <p>
     * The path where to store/retrieve the session.
     * </p>
     * @param string $session_id <p>
     * The session id.
     * </p>
     * @return bool The return value (usually <b>TRUE</b> on success, <b>FALSE</b> on failure). Note this value is returned internally to PHP for processing.
     */
    public function open($save_path, $session_id) {
        /* See: http://www.php.net/manual/function.pg-pconnect.php */


        try {
            /* Nueva Conexion */
            if (!PGSessionHandlerConectionProvider::$ACTIVE_CONNECTION) {
                $this->pdo_pgsql_session_handle = new PDO(
                        PGSessionHandlerConectionProvider::GetDSN(), PGSessionHandlerConectionProvider::$USER, PGSessionHandlerConectionProvider::$PASSWORD);
                if (PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
                    $this->pdo_pgsql_session_handle->setAttribute(
                            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                    );
                }
            } else {
                $this->pdo_pgsql_session_handle = PGSessionHandlerConectionProvider::$ACTIVE_CONNECTION;
            }
            $this->pdo_pgsql_session_handle->exec('SET synchronous_commit TO OFF;');
            if (is_null($this->pdo_pgsql_session_handle) && !is_a($this->pdo_pgsql_session_handle, "PDO")) {
                $strLibErrCode = 'PGSH0004';
                $strLibErrMsg = 'PGSessionHandler->open failed: pdo_pgsql_session_handle is NULL or NOT PDO Connection';
                pg_session_failure($strLibErrCode, $strLibErrMsg);
            }
        } catch (PDOException $objException) {
            $strLibErrCode = 'PGSH0005';
            $strLibErrMsg = 'PGSessionHandler->open failed';
            pg_session_failure($strLibErrCode, $strLibErrMsg, $objException);
            return FALSE;
        } catch (Exception $objException) {
            $strLibErrCode = 'PGSH0006';
            $strLibErrMsg = 'PGSessionHandler->open failed';
            pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
            return FALSE;
        }

        return TRUE;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Close the session
     * @link http://php.net/manual/en/sessionhandler.close.php
     * @return bool The return value (usually <b>TRUE</b> on success, <b>FALSE</b> on failure). Note this value is returned internally to PHP for processing.
     */
    public function close() {
        if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
            $this->pdo_pgsql_session_handle = null;
            if (!is_null($this->pdo_pgsql_session_handle)) {
                $strLibErrCode = 'PGSH0007';
                $strLibErrMsg = 'PGSessionHandler->close failed: pdo_pgsql_session_handle != null';
                pg_session_failure($strLibErrCode, $strLibErrMsg);
                return FALSE;
            }
        } else {
            try {
                $this->pdo_pgsql_session_handle = null;
            } catch (PDOException $objException) {
                $strLibErrCode = 'PGSH0008';
                $strLibErrMsg = 'PGSessionHandler->close failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            } catch (Exception $objException) {
                $strLibErrCode = 'PGSH0009';
                $strLibErrMsg = 'PGSessionHandler->close failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Read session data
     * @link http://php.net/manual/en/sessionhandler.read.php
     * @param string $session_id <p>
     * The session id to read data for.
     * </p>
     * @return string an encoded string of the read data. If nothing was read, it must return an empty string. Note this value is returned internally to PHP for processing.
     */
    function read($session_id) {
        $key = $session_id;
        $now = time();
        /*
         * Se trata de obtener una fila de una session existente.
         *
         * Empezamos con una nueva transaccion. Todas las operaciones
         * relacionadas con la sesion se efectuarán en esta transaccion.
         * La transaccion sera comiteada en session_write o session_destroy
         * dependiendo de cual fue llamado.
         * 
         * Marcamos la sentencias SELECT .. FOR UPDATE porque es probable 
         * que la fila sea actualizada mediante session_write. Esto efectua
         * un Exclusive Lock de esta fila durante la vida de la transaccion.
         */
        $stmt = null;
        $query = sprintf("SELECT "
                . PGSH_TABLE_FIELD_DATA
                . " FROM %s"
                . " WHERE " . PGSH_TABLE_FIELD_ID . " = :_session_id FOR UPDATE", PGSessionHandlerConectionProvider::$TABLE);
        if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
            $this->pdo_pgsql_session_handle->beginTransaction();
            $stmt = $this->pdo_pgsql_session_handle->prepare($query);
            $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
            if (!$stmt->execute()) {
                $strLibErrCode = 'PGSH0010';
                $strLibErrMsg = 'PGSessionHandler->read failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        } else {
            try {
                $this->pdo_pgsql_session_handle->beginTransaction();
                $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                $stmt->execute();
            } catch (PDOException $objException) {
                $strLibErrCode = 'PGSH0012';
                $strLibErrMsg = 'PGSessionHandler->read failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            } catch (Exception $objException) {
                $strLibErrCode = 'PGSH0013';
                $strLibErrMsg = 'PGSessionHandler->read failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        }

        if (($stmt === false) || $stmt->rowCount() != 1) {
            /*
             * Si no conseguirmos la fila con la informacion de sesion, 
             * insertamos una nueva. Asegurando que el UPDATE en session_write
             * sea exitoso.
             */
            $query = sprintf("INSERT INTO %s
                (" . PGSH_TABLE_FIELD_ID . ", " . PGSH_TABLE_FIELD_LAST_ACTIVE . ", " . PGSH_TABLE_FIELD_DATA . ")
              VALUES 
                (
                :_session_id, 
                :_last_active, 
                :_data 
                );", PGSessionHandlerConectionProvider::$TABLE);
            if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
                $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                $stmt->bindParam(':_last_active', $now, PDO::PARAM_INT);
                $var3 = PGSH_EMPTY_STRING;
                $stmt->bindParam(':_data', $var3, PDO::PARAM_LOB);
                if (!$stmt->execute()) {
                    $strLibErrCode = 'PGSH0014';
                    $strLibErrMsg = 'PGSessionHandler->read failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
            } else {
                try {
                    $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                    $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                    $stmt->bindParam(':_last_active', $now, PDO::PARAM_INT);
                    $var3 = PGSH_EMPTY_STRING;
                    $stmt->bindParam(':_data', $var3, PDO::PARAM_LOB);
                    if (!$stmt->execute()) {
                        $strLibErrCode = 'PGSH0015';
                        $strLibErrMsg = 'PGSessionHandler->read failed';
                        pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                        return FALSE;
                    }
                } catch (PDOException $objException) {
                    $strLibErrCode = 'PGSH0016';
                    $strLibErrMsg = 'PGSessionHandler->read failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                } catch (Exception $objException) {
                    $strLibErrCode = 'PGSH0017';
                    $strLibErrMsg = 'PGSessionHandler->read failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
            }

            /* Si hay insercion, devolvermos un string vacio */
            if (($stmt !== false) && ($stmt->rowCount() == 1)) {
                $stmt = null;
                return PGSH_EMPTY_STRING; /* Para PHP procesor */
            }

            /*
             * Si la insercion falla, puede ser por Race Condition que existe
             * entre multiples instancias del session handler en caso que una 
             * nueva sesion sea creada por multiple instancias del script al 
             * mismo tiempo.
             * 
             * En este caso, tratamos de hacer un nuevo SELECT que va a 
             * conseguir el dato de sesion competitivo.
             *
             */

            $query = sprintf("SELECT "
                    . PGSH_TABLE_FIELD_DATA . " "
                    . "FROM %s "
                    . "WHERE " . PGSH_TABLE_FIELD_ID . " = :_session_id FOR UPDATE", PGSessionHandlerConectionProvider::$TABLE);
            if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
                $this->pdo_pgsql_session_handle->rollBack();
                $this->pdo_pgsql_session_handle->beginTransaction();
                $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                if (!$stmt->execute()) {
                    $strLibErrCode = 'PGSH0018';
                    $strLibErrMsg = 'PGSessionHandler->read failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
            } else {
                try {
                    $this->pdo_pgsql_session_handle->beginTransaction();
                    $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                    $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                    if (!$stmt->execute()) {
                        $strLibErrCode = 'PGSH0019';
                        $strLibErrMsg = 'PGSessionHandler->read failed';
                        pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                        return FALSE;
                    }
                } catch (PDOException $objException) {
                    $strLibErrCode = 'PGSH0020';
                    $strLibErrMsg = 'PGSessionHandler->read failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                } catch (Exception $objException) {
                    $strLibErrCode = 'PGSH0021';
                    $strLibErrMsg = 'PGSessionHandler->read failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
            }


            if (($stmt === false) || $stmt->rowCount() != 1) {
                $stmt = null;
                return PGSH_EMPTY_STRING;
            }
        }
        /* Extraemos el valor 'data' del resultado obtenido */
        $data = PGSH_EMPTY_STRING;
        $stmt->bindColumn(PGSH_TABLE_FIELD_DATA, $data);
        $stmt->fetch(PDO::FETCH_NUM);
        $stmt = null;

        if (PGSessionHandlerConectionProvider::$PGSH_USE_BASE_64_DATA)
            $data = base64_decode($data);

        return $data;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Write session data
     * @link http://php.net/manual/en/sessionhandler.write.php
     * @param string $session_id <p>
     * The session id.
     * </p>
     * @param string $session_data <p>
     * The encoded session data. This data is the result of the PHP internally encoding the $_SESSION superglobal to a serialized
     * string and passing it as this parameter. Please note sessions use an alternative serialization method.
     * </p>
     * @return bool The return value (usually <b>TRUE</b> on success, <b>FALSE</b> on failure). Note this value is returned internally to PHP for processing.
     */
    public function write($session_id, $session_data) {
        $key = $session_id;
        $val = (PGSessionHandlerConectionProvider::$PGSH_USE_BASE_64_DATA ? base64_encode($session_data) : $session_data);
        $now = time();

        $query = sprintf("UPDATE %s "
                . "SET " . PGSH_TABLE_FIELD_LAST_ACTIVE . " = :_last_active, "
                . PGSH_TABLE_FIELD_DATA . " = :_data "
                . "WHERE " . PGSH_TABLE_FIELD_ID . " = :_session_id ", PGSessionHandlerConectionProvider::$TABLE);
        $success = true;
        /* Query Update */
        if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
            $stmt = $this->pdo_pgsql_session_handle->prepare($query);
            $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
            $stmt->bindParam(':_last_active', $now, PDO::PARAM_INT);
            $stmt->bindParam(':_data', $val, PDO::PARAM_LOB);
            if (!($success = $stmt->execute())) {
                $this->pdo_pgsql_session_handle->rollBack();
                $strLibErrCode = 'PGSH0022';
                $strLibErrMsg = 'PGSessionHandler->write failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
            $this->pdo_pgsql_session_handle->commit();
        } else {
            try {
                $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                $stmt->bindParam(':_last_active', $now, PDO::PARAM_INT);
                $stmt->bindParam(':_data', $val, PDO::PARAM_LOB);

                if (!($success = $stmt->execute())) {
                    $this->pdo_pgsql_session_handle->rollBack();
                    $strLibErrCode = 'PGSH0023';
                    $strLibErrMsg = 'PGSessionHandler->write failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
                $this->pdo_pgsql_session_handle->commit();
            } catch (PDOException $objException) {
                $strLibErrCode = 'PGSH0024';
                $strLibErrMsg = 'PGSessionHandler->write failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            } catch (Exception $objException) {
                $strLibErrCode = 'PGSH0025';
                $strLibErrMsg = 'PGSessionHandler->write failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        }
        return $success;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Destroy a session
     * @link http://php.net/manual/en/sessionhandler.destroy.php
     * @param string $session_id <p>
     * The session ID being destroyed.
     * </p>
     * @return bool The return value (usually <b>TRUE</b> on success, <b>FALSE</b> on failure). Note this value is returned internally to PHP for processing.
     */
    public function destroy($session_id) {
        $key = addslashes($session_id);
        /* Query Delete */
        $query = sprintf("DELETE "
                . "FROM %s "
                . "WHERE " . PGSH_TABLE_FIELD_ID . " = :_session_id", PGSessionHandlerConectionProvider::$TABLE);

        if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
            $stmt = $this->pdo_pgsql_session_handle->prepare($query);
            $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
            $success = true;
            if (!($success = $stmt->execute())) {
                $this->pdo_pgsql_session_handle->rollBack();
                $strLibErrCode = 'PGSH0026';
                $strLibErrMsg = 'PGSessionHandler->destroy failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
            $this->pdo_pgsql_session_handle->commit();
        } else {
            try {
                $stmt = $this->pdo_pgsql_session_handle->prepare($query);
                $stmt->bindParam(':_session_id', $key, PDO::PARAM_STR, PGSH_SESSION_ID_MAX_LENGTH);
                $success = true;
                if (!($success = $stmt->execute())) {
                    $this->pdo_pgsql_session_handle->rollBack();
                    $strLibErrCode = 'PGSH0027';
                    $strLibErrMsg = 'PGSessionHandler->destroy failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
                $this->pdo_pgsql_session_handle->commit();
            } catch (PDOException $objException) {
                $strLibErrCode = 'PGSH0028';
                $strLibErrMsg = 'PGSessionHandler->destroy failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            } catch (Exception $objException) {
                $strLibErrCode = 'PGSH0029';
                $strLibErrMsg = 'PGSessionHandler->destroy failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        }
        return $success;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Cleanup old sessions
     * @link http://php.net/manual/en/sessionhandler.gc.php
     * @param int $maxlifetime <p>
     * Sessions that have not updated for the last <i>maxlifetime</i> seconds will be removed.
     * </p>
     * @return bool The return value (usually <b>TRUE</b> on success, <b>FALSE</b> on failure). Note this value is returned internally to PHP for processing.
     */
    public function gc($maxlifetime) {

        $expiry = time() - $maxlifetime;

        $query = sprintf("DELETE "
                . "FROM %s "
                . "WHERE " . PGSH_TABLE_FIELD_LAST_ACTIVE . " < :_last_active", PGSessionHandlerConectionProvider::$TABLE);
        $success = true;
        LogHelper::Error("Garbage collector PGSessionHandler ".$query);

        $stmt = $this->pdo_pgsql_session_handle->prepare($query);
        if (!PGSessionHandlerConectionProvider::$PGSH_ACTIVATE_PDO_EXCEPTIONS) {
            $stmt->bindParam(':_last_active', $expiry, PDO::PARAM_INT);
            if (!($success = $stmt->execute())) {
                $strLibErrCode = 'PGSH0030';
                $strLibErrMsg = 'PGSessionHandler->gc failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        } else {
            try {
                $stmt->bindParam(':_last_active', $expiry, PDO::PARAM_INT);
                if (!($success = $stmt->execute())) {
                    $strLibErrCode = 'PGSH0031';
                    $strLibErrMsg = 'PGSessionHandler->gc failed';
                    pg_session_failure($strLibErrCode, $strLibErrMsg, NULL, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                    return FALSE;
                }
            } catch (PDOException $objException) {
                $strLibErrCode = 'PGSH0032';
                $strLibErrMsg = 'PGSessionHandler->destroy failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            } catch (Exception $objException) {
                $strLibErrCode = 'PGSH0033';
                $strLibErrMsg = 'PGSessionHandler->destroy failed';
                pg_session_failure($strLibErrCode, $strLibErrMsg, $objException, $this->pdo_pgsql_session_handle->errorCode(), $this->pdo_pgsql_session_handle->errorInfo());
                return FALSE;
            }
        }

        return $success;
    }

}

/**
 * Clase de configuración
 */
class PGSessionHandlerConectionProvider {
    /*Base de Datos*/
    public static $ACTIVE_CONNECTION=null;
    public static $isInitialized=false;
    public static $USER="";
    public static $PASSWORD="";
    public static $DBNAME="";
    public static $HOST="localhost";
    public static $TABLE="php_session";
    public static $PORT=5432;
    public static $SCHEMA="";
    /*Aplicacion*/
    public static $PGSH_DEBUG_MODE_ON=true;
    public static $PGSH_REDEFINE_INI_VARS=false;
    public static $session_save_handler="";
    public static $session_save_path="";
    public static $session_save_database="";
    public static $session_save_table="";
    public static $PGSH_ACTIVATE_PDO_EXCEPTIONS=false;
    public static $PGSH_USE_BASE_64_DATA=false;
    
    
    public static function GetDSN() {
        $dsn = sprintf("pgsql:host=%s;port=%s;dbname=%s;", self::$HOST, self::$PORT, self::$DBNAME, self::$USER, self::$PASSWORD);
        return $dsn;
    }
    
    public static function PgshRedefineIniVarsData($mixValue){
        if(!is_array($mixValue)){
            throw new Exception ("PGSessionHandlerConectionProvider.__set(".$strName.") Tipo Incorrecto.");
        }
        self::$session_save_handler=
            isset($mixValue["save_handler"])&&$mixValue["save_handler"]!=""?$mixValue["save_handler"]:null;
        self::$session_save_path=
                isset($mixValue["save_path"])&$mixValue["save_path"]!=""?$mixValue["save_path"]:null;
        self::$session_save_database=
                isset($mixValue["save_database"])&$mixValue["save_database"]!=""?$mixValue["save_database"]:null;
        self::$session_save_table=
                isset($mixValue["save_table"])&$mixValue["save_table"]!=""?$mixValue["save_table"]:null;
        
    }
    
}



PGSessionHandlerConectionProvider::$ACTIVE_CONNECTION = QApplication::$Database[__DB_INDEX_PROC__]->PDO;
$x = PGSessionHandlerConectionProvider::$ACTIVE_CONNECTION;
/*Aplicacion*/
PGSessionHandlerConectionProvider::$PGSH_DEBUG_MODE_ON = defined('__DEBUG__')?__DEBUG__:false;
/**
 *      <Adapter>PostgreSqlPdo</Adapter>
        <Server></Server>
        <Port></Port>
        <Database>cenpe_proc</Database>
        <Username></Username>
        <Password></Password>
        <Profiling>false</Profiling>
        <Inicializada>1</Inicializada>
        <schema></schema>
 */
$datos_sesion = unserialize(constant('DB_CONNECTION_'.__DB_INDEX_PROC__));

PGSessionHandlerConectionProvider::$DBNAME = (string) $datos_sesion["database"];
if (@$datos_sesion["server"])
    PGSessionHandlerConectionProvider::$HOST = (string) $datos_sesion["server"];
if (@$datos_sesion["port"])
    PGSessionHandlerConectionProvider::$PORT = (int) $datos_sesion["port"];
if (@$datos_sesion["username"])
    PGSessionHandlerConectionProvider::$USER = (string) $datos_sesion["username"];
if (@$datos_sesion["password"])
    PGSessionHandlerConectionProvider::$PASSWORD = (string) $datos_sesion["password"];

function pg_session_debug_parse_error($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr) {
    $arrayPGSHError=Array();
    $arrayPGSHError["LIB_ErrCode"]=$strLibErrCode;
    $arrayPGSHError["LIB_ErrMsg"]=$strLibErrMsg;
    if($objException){
        $arrayPGSHError["LIB_ErrCode"]=$objException->getCode();
        $arrayPGSHError["LIB_ErrMsg"]=$objException->getMessage();
    }
    if($arrayPdoErr)
        $arrayPGSHError["PDO_Err"]=$arrayPdoErr;

    $strErrorMsg = "[pg_session_handler]\n".QVarDumper::dump($arrayPGSHError, 8);
    return $strErrorMsg;
}

function pg_session_debug_off_failure($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr) {
    LogHelper::Error(pg_session_debug_parse_error($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr));
}

function pg_session_debug_on_failure($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr) {
    $strErrorMsg=pg_session_debug_parse_error($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr);
    LogHelper::Error($strErrorMsg);
    trigger_error($strErrorMsg, E_USER_ERROR);
}

function pg_session_failure($strLibErrCode, $strLibErrMsg, $objException = NULL, $strPdoErrCode = NULL, $arrayPdoErr = NULL) {
    if (PGSessionHandlerConectionProvider::$PGSH_DEBUG_MODE_ON) {
        pg_session_debug_on_failure($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr);
    } else {
        pg_session_debug_off_failure($strLibErrCode, $strLibErrMsg, $objException, $strPdoErrCode, $arrayPdoErr);
    }
}

/*
 * Administracion del nombre de los campos de la tabla
 */
define("PGSH_TABLE_FIELD_ID", "session_id");
define("PGSH_TABLE_FIELD_LAST_ACTIVE", "last_active");
define("PGSH_TABLE_FIELD_DATA", "data");

define('PGSH_EMPTY_STRING', '');

/*     * *************************************************************************** */
/*                 FIN DE CONFIGURACIONES DEL MODULOS                         */
/*     * *************************************************************************** */

ini_set("session.save_handler", 'user');
ini_set("session.save_path", 'config');


/**
 * Desde PHP 5.4 es posible registrar el siguiente prototipo:
 * bool session_set_save_handler 
 * ( SessionHandlerInterface $sessionhandler [, bool $register_shutdown = true ] )
 * session_set_save_handler() establece las funciones de almacenamiento de 
 * sesiones a nivel de usuario que se usan para almacenar y recuperar información 
 * asociada con una sesión. Es más útil cuando se prefiere un método de 
 * almacenamiento distinto de aquellos proporcionados por las sesiones de PHP. 
 * Esto es, almacenar la información de sesión en una base de datos local.
 */

$handler = new PGSessionHandler();

if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
    if (session_set_save_handler($handler, true) == false) {
        $strMsg = 'session_set_save_handler failed: ';
        pg_session_failure('PGSH0034', $strMsg);
    }
}
