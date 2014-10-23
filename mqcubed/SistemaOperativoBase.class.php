<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SistemaOperativoclass
 *
 * @author jose
 */
abstract class SistemaOperativoBase {

    public static function IsWindowsOS(){
        return (substr(PHP_OS,0,3) == 'WIN');
    }


    /**
     * Solo util para windows servers, si es asi se genera un archivo bat que 
     * ejecuta los comandos.
     * @param array $arrayCommands 
     */
    public static function ExecuteCommands($arrayCommands, $blnReturn = false){
        if(self::IsWindowsOS()){
            $strCommand = '';
            if (is_array($arrayCommands)) {
                foreach($arrayCommands as $strACommand){
                    $strCommand .= $strACommand . "\r\n";
                }
            } else {
                $strCommand = $arrayCommands;
            }
            if(file_exists(__PROJECT_DIR__.'/tmp/commands.bat'))
                unlink(__PROJECT_DIR__.'/tmp/commands.bat');
            file_put_contents(__PROJECT_DIR__.'/tmp/commands.bat', $strCommand);
            if (!$blnReturn)
                passthru(__PROJECT_DIR__.'/tmp/commands.bat');
            else {
                exec($strCommands, $output, $return);
                return $return;
            }
        }else{
            if (is_array($arrayCommands))
                $strCommands = implode(' ', $arrayCommands);
            else
                $strCommands = $arrayCommands;
            if (!$blnReturn) {
                passthru($strCommands);
            } else {
                exec($strCommands, $output, $return);
                return $return;
            }
        }
    }

    /**
     * Aplica un parche actualizacion a una ruta definida.
     * @param string $strPathToDiffFile
     * @param string $strPathToDestination
     * @param boolean $blnDryRun
     * @return boolean
     */
    public static function PatchDiffFile($strPathToDiffFile, $strPathToDestination, $strPathToPatchFile, $blnDryRun = false){
        $strCommand = null;
        $intRetCode = null;
        $arrPatchOutput = array();
        $strDryRun = '';
        if ($blnDryRun) {
            $strDryRun = ' --dry-run ';
        }
        if(self::IsWindowsOS()){
//            QApplication::DisplayAlert(sprintf('Aplicando Parche a un sistema Windows con el %s en el directorio: %s',$strPathToDiffFile, $strPathToDestination));
            $strCommand = sprintf('%s/resources/patch.exe -p1 -r - --directory=%s --binary %s < %s',$strPathToPatchFile,$strPathToDestination,$strDryRun,$strPathToDiffFile);

        }else{
//            QApplication::DisplayAlert(sprintf('Aplicando Parche a un sistema Linux Ubuntu con el %s en el directorio: %s',$strPathToDiffFile, $strPathToDestination));
            $strCommand = sprintf('patch -p1 -r - --directory=%s --binary %s < %s',$strPathToDestination, $strDryRun, $strPathToDiffFile);
        }
        exec($strCommand, $arrPatchOutput, $intRetCode);
        if($intRetCode != 0) {
            LogHelper::Error("Patch return code: $intRetCode Patch output: ".var_export($arrPatchOutput,true));
            throw new QCallerException("Fallo el parche de actualizacion, revise los logs para más detalles.");
        }
        return true;
    }

    public static function RecursiveCopy($src,$dst,$excludeMatch=null) {
        $dir = opendir($src);
        if (!is_dir($dst)) @mkdir($dst,true);
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
                    self::RecursiveCopy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }


    public static function RecursiveDelete($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    self::RecursiveDelete($src . '/' . $file);
                }
                else {
                    unlink($src . '/' . $file);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

}
?>
