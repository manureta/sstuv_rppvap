<?php

abstract class QAutoloadBase extends QBaseClass{

        /**
         * This is called by the PHP5 Autoloader.  This static method can be overridden.
         *
         * @return boolean whether or not a class was found / included
         */
        public static function Autoload($strClassName) {
                if (array_key_exists(strtolower($strClassName), QApplicationBase::$ClassFile)) {
                        require(QApplicationBase::$ClassFile[strtolower($strClassName)]);
                        return true;
                }
                return false;
        }

        public static function RegisterAutoload(){
            spl_autoload_register(array('QAutoloadBase','Autoload'));
        }

}
?>
