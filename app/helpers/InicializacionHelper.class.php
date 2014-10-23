<?php

abstract class InicializacionHelper {

    const INICIALIZADA = "Inicializada";
    const NO_INICIALIZADA = "No inicializada";
    const ERR_INICIALIZADA = "Inicializada con error";
    const SINTABLAS_INICIALIZADA = "Creada sin tablas";
    const INICIALIZANDO = "Inicializando";
    public static $arrConn;

    public function CheckConstrains() {

    }
    
    public static function DbInicializada() {
        $objDb = new QPostgreSqlDatabase(1,self::$arrConn);
        try {
            $rscTables = $objDb->Query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
            $arrTablas = $rscTables->GetRows();
            $objDb->Close();
            if (count($arrTablas) == 0) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function InicializarDb($dump_prefix, $blnMatchFile = false) {
        $strVersionNumber = file_get_contents(__CONFIG_DIR__."/VERSION");
        if (preg_match('/([0-9]+).([0-9]+).([0-9]+)/', $strVersionNumber, $strRegs)) {
            $strVersionNumber = $strRegs[1].".".$strRegs[2];
        }
        if ($blnMatchFile) {
            $arrFilesMatching = glob(__PROJECT_DIR__.'/db/postgresql/'.$dump_prefix.'*');
            if (file_exists($arrFilesMatching[0])) {
                $strFileVersion = $arrFilesMatching[0];
            } else {
                throw new QCallerException("No existe el archivo de la base de datos $dump_prefix");
            }
        } else {
            $strFileVersion = __PROJECT_DIR__."/db/postgresql/$dump_prefix-".trim($strVersionNumber).".sql";
        }
        $strQueryVersion = file_get_contents($strFileVersion);
        $objDb = new QPostgreSqlDatabase(1,self::$arrConn);
        $objDb->Query($strQueryVersion);
        //$objDb->NonQuery("SELECT create_constraints_provincia('".$strCodProv."');");
        return true;
    }

    public static function SetDbConnSettings($arrConn) {
        self::$arrConn = $arrConn;
    }

    public static function TienePermisos() {
        // @TODO chequear permisos del usuario en la db
        return true;
    }

    public static function HayConexion() {
        try {
            $objDb = new QPostgreSqlDatabase(1,self::$arrConn);
            @$objDb->Connect();
            @$objDb->Close();
            return true;
        } catch (QPostgreSqlDatabaseException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }


}

?>
