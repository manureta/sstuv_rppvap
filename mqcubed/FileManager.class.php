<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileManagerclass
 *
 * @author www-data
 */
class FileManager {

    //protected static $ProvinciaPathArray = ar

    public static function SaveIncomingFile($intNroEnvio, $path,$strArchivo){
            if(file_exists($path) && $intNroEnvio==0)
                unlink($path);
            $ArchivoContent = base64_decode($strArchivo);
            $reso = fopen($path, 'ab');
            fwrite($reso,$ArchivoContent);
            fclose($reso);
            return true;
    }

    public static function CheckMD5($path,$md5){
        if(md5_file($path)===$md5)
            return true;
        return false;
    }

    /**
     * el nombre de un backup tiene que ser, c_provincia, fecha. backup
     * @param string $CProvincia
     * @return string 
     */
    public static function GetFilePath($CProvincia, $strName){
        $strDirName = sprintf('%s/%s/',__BACKUP_DIR__,$CProvincia);
        if(!is_dir($strDirName))
            mkdir($strDirName,0777,true);
        $strNombre =  sprintf("%s_%s.sql",$CProvincia, $strName);
        $path = $strDirName .$strNombre;
        
        return $path;
    }


    public static function GetFilePathByFileName($CProvincia, $strFileName){
        $strDirName = sprintf('%s/%s/',__BACKUP_DIR__,$CProvincia);
        if(!is_dir($strDirName))
            mkdir($strDirName,0777,true);
        $path = $strDirName .$strFileName;
        
        return $path;
 
    }


    public static function getSqlFilesFromDir($dir){
        $dh = opendir($dir);
        $arrArchivos = array();
        

        while (($file = readdir($dh)) !== false) {
            $arrExtencion = pathinfo($dir.$file);
            $extencion = $arrExtencion['extension'];
            if($extencion=="sql"){
                $arrArchivos[] = $file;
            }
        }
        closedir($dh);
        sort($arrArchivos);
        return $arrArchivos;

    }
}
?>
