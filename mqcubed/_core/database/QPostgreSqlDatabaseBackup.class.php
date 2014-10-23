<?php

class QPostgreSqlDatabaseBackup extends QDatabaseBackup {
    //DEPRECATED
    //const WIN_PG_DUMP_PATH = 'c:\\Program Files\\PostgreSQL\\8.4\\bin\\pg_dump.exe';
    const LINUX_PG_DUMP_PATH = '/usr/bin/pg_dump';

    const WIN_PG_RESTORE_PATH = '\Archivos de Programa\PostgreSQL\8.3\bin\pg_restore.exe';
    const LINUX_PG_RESTORE_PATH = '/usr/bin/pg_restore';

    const LINUX_CREATEDB_PATH = "/usr/bin/createdb";
    const LINUX_DROPDB_PATH = "/usr/bin/dropdb";

    /**
     * Makes a postgresql database backup
     * Please make sure that you have a .pgpass file with
     * the correct credentials to connect to your database
     * @param type $blnFormatPlain
     * @param boolean $blnOnlyData
     * @param boolean $blnDisableTriggers
     * @param boolean $blnInsertCommands
     * @param array $arraTablas
     * @return type
     * @throws Exception
     */
    public function Backup($blnFormatPlain=false,$blnOnlyData=false,$blnDisableTriggers=false,$blnInsertCommands=false,$arraTablas=array()) {
        // si no es plano va binario sin el resto de las opciones.
        if(!$blnFormatPlain){
            $blnOnlyData=false;
            $blnDisableTriggers=false;
            $blnInsertCommands=false;
            $arraTablas=array();
        }
        //aca armo la lista de tablas.
        $strTablesCommand = '';
        foreach($arraTablas as $strtablename){
            $strTablesCommand .= ' --table "'.$strtablename.'"';
        }
        LogHelper::Debug("Backupeando base de datos: ".$this->Database);

        if (substr(PHP_OS,0,3) == 'WIN') {
            if (!file_exists(__WIN_PG_DUMP_PATH__)) {
                throw new Exception('No se encuentra la ruta al archivo pg_dump.exe');
            }
            $strPreComand = sprintf('set PGPASSWORD=%s',$this->Password);
            LogHelper::Debug("ejecutando PreCommand".$strPreComand);
            //passthru($strPreComand);

            //                  "%s" %s --port %s %s %s --data-only --disable-triggers --column-inserts --file "%s" --table 'public.tablename' %s
            $comando = sprintf('"%s" %s --port %s %s %s %s %s %s --file "%s" %s %s',
                __WIN_PG_DUMP_PATH__, ($this->Server)?' --host '.$this->Server:'', $this->Port, ($this->Username)?'--username '.$this->Username:'', ($blnFormatPlain)?'--format plain':'',($blnOnlyData)?'--data-only':'',($blnDisableTriggers)?'--disable-triggers':'',($blnInsertCommands)?'--column-inserts':'', $this->BackupFile, $strTablesCommand, $this->Database);
//            $comando = sprintf('"%s" -i %s --port %s %s -Fc --file "%s" %s',
//                __WIN_PG_DUMP_PATH__, ($this->Server)?' --host '.$this->Server:'', $this->Port, ($this->Username)?'--username '.$this->Username:'',  $this->BackupFile, $this->Database);
            SistemaOperativoBase::ExecuteCommands(array($strPreComand,$comando));
        }//
        else {
            if (!file_exists(self::LINUX_PG_DUMP_PATH)) {
                throw new Exception('No se encuentra la ruta al comando pg_dump');
            }
            //                  PGPASSWORD=%s %s %s --port %s %s --format plain --data-only --disable-triggers --column-inserts --file "%s" %s
            $comando = sprintf('PGPASSWORD=%s "%s" %s --port %s %s %s %s %s %s --file "%s" %s %s',
                    $this->Password, self::LINUX_PG_DUMP_PATH, ($this->Server)?' --host '.$this->Server:'', $this->Port, ($this->Username)?'--username '.$this->Username:'', ($blnFormatPlain)?'--format plain':'',($blnOnlyData)?'--data-only':'',($blnDisableTriggers)?'--disable-triggers':'',($blnInsertCommands)?'--column-inserts':'', $this->BackupFile, $strTablesCommand, $this->Database);
            //$comando = sprintf('PGPASSWORD=%s %s -i %s --port %s %s --format custom --blobs --file "%s" %s', $this->Password, self::LINUX_PG_DUMP_PATH, ($this->Server)?' --host '.$this->Server:'', $this->Port, ($this->Username)?'--username '.$this->Username:'',  $this->BackupFile, $this->Database);
            passthru($comando);
        }
        if (!is_file($this->BackupFile) || filesize($this->BackupFile)<20) throw new Exception("No se generó correctamente el backup de la base de datos ".$this->BackupFile);
        
        return $comando;
    }





     public function DropDB() {
        if (substr(PHP_OS,0,3) == 'WIN') {
            throw new Exception("Revisar esto o comentarlo");
            $comando = sprintf('set PGPASSWORD=%s; %s --host%s --port %s --username %s %s',
                $this->Password, self::WIN_DROPDB_PATH, $this->Server, $this->Port, $this->Username,   $this->Database);
        }
        else {
            $comando = sprintf('PGPASSWORD=%s %s --host %s --port %s --username %s %s', $this->Password, self::LINUX_DROPDB_PATH, $this->Server, $this->Port, $this->Username, $this->Database);
        }
        LogHelper::Debug("drop base de datos por generación de código: $comando");
        //passthru($comando);
        return $comando;
    }

     public function CREATEDB() {
        if (substr(PHP_OS,0,3) == 'WIN') {
            throw new Exception("Revisar esto o comentarlo");
            $comando = sprintf('set PGPASSWORD=%s; %s --host%s --port %s --username %s %s',
             $this->Password, self::WIN_CREATEDB_PATH, $this->Server, $this->Port, $this->Username,$this->Database);
        }
        else {
            $comando = sprintf('PGPASSWORD=%s %s --host %s --port %s --username %s %s', $this->Password, self::LINUX_CREATEDB_PATH, $this->Server, $this->Port, $this->Username, $this->Database);
        }
        LogHelper::Debug("create base de datos por generación de código: $comando");
        //passthru($comando);
        return $comando;
    }

    public function __get($strName) {
            switch ($strName) {
                    case 'Port':
                            if(!$this->objConfigArray[strtolower($strName)])
                                    return 5432;
                            return $this->objConfigArray[strtolower($strName)];
                    default:
                            try {
                                    return parent::__get($strName);
                            } catch (QCallerException $objExc) {
                                    $objExc->IncrementOffset();
                                    throw $objExc;
                            }
            }
    }

}
?>
