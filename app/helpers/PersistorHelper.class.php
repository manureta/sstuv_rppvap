<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersistorHelperclass
 *
 * @author alvaro
 */

define("__PERSIST_PATH__",__TMP_DIR__.'/cuadros');

class PersistorHelper {
    public static function Save($objCuadro) {
        $file = fopen(__PERSIST_PATH__."/".get_class($objCuadro).$objCuadro->intIdLocalizacion,"w");
        fwrite($file,serialize($objCuadro));
        fclose($file);
    }
    public static function LoadByIdLocalizacion($strCuadroClass,$intIdLocalizacion) {
        $file = __PERSIST_PATH__."/".$strCuadroClass.$intIdLocalizacion;
        if (!is_file($file)) return null;
        return unserialize(file_get_contents($file));
    }
}
?>
