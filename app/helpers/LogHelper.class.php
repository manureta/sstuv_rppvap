<?php
if (!defined('__PERSIST_ON_DATABASE__'))//si no esta definido en otro lado no informa nada.
      define('__PERSIST_ON_DATABASE__', 0);
 
// para compatibilidad hacia atras
class LogHelper extends QLogger {

    static public function Error($str, $file = 'error.log', $notify = true) {
        parent::Error($str, $file, $notify);
        if (__PERSIST_ON_DATABASE__ && SERVER_INSTANCE == 'prod' && $notify) {
            try {
                $objCenpeProcDB = QApplication::$Database[3];
                $objCenpeProcDB->NonQuery("insert into logs (c_tipo_error, mensaje) values (1,".$objCenpeProcDB->SqlVariable($str).")");
            } catch (Exception $e) {
               //throw $e;  si falla por ahora no hago nada porque ya parent::error ya fue lanzado correctamente.
            }
        }
    }





}
?>
