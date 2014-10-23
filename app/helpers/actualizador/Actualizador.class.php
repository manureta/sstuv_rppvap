<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actualizador
 * Ademas de comunicarse con Nación, esta clase se encarga de correr el update.php
 * que es el que realmente realiza la actualización.
 * Por otra parte tambien tma un SnapShot del sistema antes de correr la actualización
 * así si es necesario, se puede volver a una versión anterior, igual a la que estaba
 * funcionando antes en el mismo servidor.
 *
 * @author jose
 */
class Actualizador{

    protected static $arrFolders = array(
        "app",
        "config",
        "db",
        "public",
        "resources"
    );

    protected static $arrArchives = array(
        "change_log.txt",
//        "sincronizador.php"
    );
    protected $strPathToZipFile;
    protected $strPathToUnZipedContent;
    protected $objWebServiceClient;




    public function  __construct() {
        $this->objWebServiceClient = new RaNacionalWebServiceClient();

    }

    public function BackupSistemaActual(){
        //Backup de la base de datos.
        if(!is_dir(__BACKUP_DIR__))
             mkdir(__BACKUP_DIR__, 0777, true);
        $file = __BACKUP_DIR__.'/ra-carga'.__SISTEMA_VERSION__.'.backup';
        $arrConnection = unserialize(DB_CONNECTION_1);
        $arrConnection['backupfile'] = $file;
        //si el archivo ya esta lo borro para evitar problemas.
        if(file_exists($file))
            unlink($file);
        $objPostgresDataBaseBackup = new QPostgreSqlDatabaseBackup(1,$arrConnection);
        $objPostgresDataBaseBackup->Backup();
        $file = __BACKUP_DIR__.'/ra-anual'.__SISTEMA_VERSION__.'.backup';
        $arrConnection = unserialize(DB_CONNECTION_2);
        $arrConnection['backupfile'] = $file;
        //si el archivo ya esta lo borro para evitar problemas.
        if(file_exists($file))
            unlink($file);
        $objPostgresDataBaseBackup = new QPostgreSqlDatabaseBackup(2,$arrConnection);
        $objPostgresDataBaseBackup->Backup();

        if(is_dir(__BACKUP_DIR__."/copiadeseguridad/"))
            $this->RecursiveDelete(__BACKUP_DIR__."/copiadeseguridad/");
        if(!is_dir(__BACKUP_DIR__."/copiadeseguridad/")) mkdir(__BACKUP_DIR__."/copiadeseguridad/");
        foreach(self::$arrFolders as $strFolderName){
            $this->RecursiveCopy(__PROJECT_DIR__."/$strFolderName", __BACKUP_DIR__."/copiadeseguridad/$strFolderName",array("/ra\/tmp/", "/\.svn/"));
        }
        foreach(self::$arrArchives as $strArchiveName){
            copy(__PROJECT_DIR__."/$strArchiveName",__BACKUP_DIR__."/copiadeseguridad/$strArchiveName");
        }

    }


    public function RestoreSistemaActual(){

       foreach(self::$arrFolders as $strFolderName){
            $this->RecursiveDelete(__PROJECT_DIR__."/$strFolderName");
            $this->RecursiveCopy(__BACKUP_DIR__."/copiadeseguridad/$strFolderName", __PROJECT_DIR__."/$strFolderName");
        }
        $dir = opendir(__BACKUP_DIR__."/copiadeseguridad/");

        while(false !== ( $file = readdir($dir)) ) {
            if(!is_dir(__PROJECT_DIR__."/$file")){
                unlink(__PROJECT_DIR__."/$file");
            }
        }
        foreach(self::$arrArchives as $strArchiveName){
            copy(__BACKUP_DIR__."/copiadeseguridad/$strArchiveName",__PROJECT_DIR__."/$strArchiveName");
        }
    }

    private function TraeArchivoDeNacion($strTokenNuevaVersion){
        $this->strPathToZipFile = $this->objWebServiceClient->TraeArchivoDeNacion($strTokenNuevaVersion);
        return true;
    }

    private function UnZip(){
        //Seteo el Destino del proceso: si existe anteriormente lo borro para no crear inconsistencias
        $this->strPathToUnZipedContent = __UPDATES_DIR__ .'/'.basename($this->strPathToZipFile, ".zip");
        //UnZipeo y si no puedo Tiro Excepcion
        $zip = new MyZipArchive;
        if ($zip->open($this->strPathToZipFile) === TRUE) {
            $zip->extractTo($this->strPathToUnZipedContent);
            $zip->close();
        } else {
            throw new Exception('No se puede abrir el archivo de la actualización');
        }
    }

    public function Update(){
        require($this->strPathToUnZipedContent.'/update.php');
        //TODO: algo mas?
    }

    public function SetVersion($strTokenNuevaVersion){

    }

    /**
     * informa sobre Nuevas Versiones Del Sistema.
     * @return string[]
     */
    public function DameNuevasVersiones(){
        $arrVersiones = $this->objWebServiceClient->DameNuevasVersiones();
        return $arrVersiones;
    }

    public function Actualizar($strTokenNuevaVersion){
        //por las dudas guardamos todo como antes del update.
        $this->BackupSistemaActual();
        self::CatchErrors();
        try{
        if($this->TraeArchivoDeNacion($strTokenNuevaVersion)){
            $this->UnZip();
            $this->Update();
            $this->SetVersion($strTokenNuevaVersion);
            return true;
        }
        }catch(Exception $e){
			LogHelper::Log("Error: {$e->getMessage()}");
            $this->RestoreSistemaActual();
            self::RestoreErrorHandler();
            throw $e;
        }
        self::RestoreErrorHandler();
    }

    public function RecursiveCopy($src,$dst,$excludeMatch=null) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (is_array($excludeMatch)) {
                $skip=false;
                foreach ($excludeMatch as $regex) {
                    if(preg_match($regex,$src . '/' . $file))
                            $skip=true;
                }
                if($skip)
                    continue;
            }
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->RecursiveCopy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }


        public function RecursiveDelete($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->RecursiveDelete($src . '/' . $file);
                }
                else {
                    unlink($src . '/' . $file);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

    /**
     * Encapsulates set_error_handler()
     */
    public static function CatchErrors()
    {
            set_error_handler(array("Actualizador", "HandleError"));
    }

    /**
     * Encapsulates restore_error_handler()
     */
    public static function RestoreErrorHandler()
    {
            restore_error_handler();
    }

    /**
     * Handles PHP Errors
     */
    public static function HandleError($errno, $errstr, $errfile, $errline, $errcontext)
    {
            throw new QPostgreSqlDatabaseException($errstr, $errno,$errfile);
    }

    public function __wakeup(){
        $this->objWebServiceClient = new RaNacionalWebServiceClient();
    }
}
?>
