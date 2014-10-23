<?php

require_once (__QCODO_CORE__ . '/framework/QAutoloadBase.class.php');

class QAutoload extends QAutoloadBase {
    /*
     * This is called by the PHP5 Autoloader.  This method overrides the
     * one in ApplicationBase.
     *
     * @return void
     */

    public static function Autoload($strClassName) {

        $strClassNameAux = strtolower($strClassName);
        $strClassPath = explode(" ",strtolower(preg_replace('/(?<=[a-z])(?=[A-Z])/',' ',$strClassName)));

        if (file_exists($strFilePath = sprintf('%s%s.class.php', __CONTROLLER_DIR__ . '/', $strClassPath[0] . '/' . $strClassName))) {
            require($strFilePath);
        } else if (array_key_exists($strClassNameAux, QApplication::$ClassFile)) {
            require QApplication::$ClassFile[$strClassNameAux];
            return true;
        } else if (!parent::Autoload($strClassName)) {

            if (file_exists($strFilePath = sprintf('%s%s.class.php', __HELPER_DIR__ . '/qform/', $strClassName))) {
                require($strFilePath);
                return true;
            } elseif (file_exists($strFilePath = sprintf('%s%s.class.php', __HELPER_DIR__ . '/qform/actions/', $strClassName))) {
                require($strFilePath);
                return true;
                //autoload custom helpers
            } else if (file_exists($strFilePath = sprintf('%s%s.class.php', __HELPER_DIR__ . '/', $strClassName))) {
                require($strFilePath);
                return true;
                //Luego de buscar en los QControls del proyecto busco en el _core
            } elseif (file_exists($strFilePath = sprintf('%s%s.class.php', __QCODO_CORE__ . '/qform/', $strClassName))) {
                require($strFilePath);
                return true;
            } elseif (file_exists($strFilePath = sprintf('%s%s.class.php', __QCODO_CORE__ . '/qform/actions/', $strClassName))) {
                require($strFilePath);
                return true;
            }
            //autoload codegen
            else if (file_exists($strFilePath = sprintf('%s%s.class.php', __PROJECT_DIR__ . '/_devtools/codegen/', $strClassName))) {
                require($strFilePath);
                return true;
            }
            //autoload exceptions
            else if (file_exists($strFilePath = sprintf('%s/%s.class.php', __EXCEPTIONS_DIR__, $strClassName))) {
                require($strFilePath);
                return true;
            }
        }
        return false;
    }

    public static function RegisterAutoload() {
        //    parent::RegisterAutoload();

        spl_autoload_register(array('QAutoload', 'Autoload'));
        if (file_exists(__MODEL_DIR__ . '/autoload/_class_paths.inc.php')) {
            require(__MODEL_DIR__ . '/autoload/_class_paths.inc.php');
            require(__MODEL_DIR__ . '/autoload/_type_class_paths.inc.php');
            require(__MODEL_DIR__ . '/autoload/_cuadros_paths.inc.php');
        }
    }

}

?>