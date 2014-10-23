<?php
if (!defined('__LOG_PATH__')) define('__LOG_PATH__',__TMP_DIR__."/log");
if (!is_dir(__LOG_PATH__)) mkdir(__LOG_PATH__, 0777, true);
if (!defined('__LOG_ROTATE__')) define('__LOG_ROTATE__', false);
if (!defined('__MAX_LOG_FILE_SIZE__')) define('__MAX_LOG_FILE_SIZE__',20000000);

class QLogger {

    static public function Debug($str){
        if (!defined('__DEBUG__') || !__DEBUG__) return false;
        self::Log("DEBUG: ".$str,'debug.log');
    }

    static public function Log($str, $file = 'common.log') {
        if (__LOG_ROTATE__ && @filesize(__LOG_PATH__."/$file") > __MAX_LOG_FILE_SIZE__) self::Rotate($file);
        if (@file_put_contents(__LOG_PATH__."/$file",date('Y-m-d H:i:s')." $str\n",FILE_APPEND) === false)
            error_log(sprintf('Error logueando en %s/%s - %s %s\n',__LOG_PATH__,$file, __APP_SHORT_NAME__, date('Y-m-d H:i:s'),$str));
    }

    static public function Error($str, $file = 'error.log', $notify = true) {
        error_log(sprintf("Error en %s: %s", __APP_SHORT_NAME__, $str));
        self::Log($str, $file);
        if (SERVER_INSTANCE == 'prod' && $notify) {
            try {
                @DinieceAppWebServiceClient::ReportarError($str);
            } catch (Exception $e) {
                if (defined(__ALLOW_EMAILS__)) {
                    $objMessage = new QEmailMessage();
                    $objMessage->From = _EMAIL_FROM_;
                    $objMessage->To = (strpos(_EMAIL_TO_LIST_,'soporte@cenpe.gob.ar' === false) ? 'soporte@cenpe.gob.ar, ' : '')._EMAIL_TO_LIST_;
                    $objMessage->HtmlBody = "Notificando Error: ".$str;
                    QEmailServer::Send($objMessage);
                }
            }
        }
    }

    static public function GetLog($file = 'common.log') {
        if(!file_exists(__LOG_PATH__."/$file"))
            return "";
        return file_get_contents(__LOG_PATH__."/$file");
    }

    static public function ResetLog($file = 'common.log') {
        return file_put_contents(__LOG_PATH__."/$file",'');
    }

    static public function Tail($file = 'common.log', $lines = 50) {
        $filePath = file_exists($file)?$file:__LOG_PATH__."/$file";

        if(!file_exists($filePath))
            return "";
        $handle = fopen($filePath, "r");
        $linecounter = $lines;
        $pos = -2;
        $beginning = false;
        $text = array();
        while ($linecounter > 0) {
            $t = " ";
            while ($t != "\n") {
                if(fseek($handle, $pos, SEEK_END) == -1) {
                    $beginning = true;
                    break;
                }
                $t = fgetc($handle);
                $pos --;
            }
            $linecounter --;
            if ($beginning) {
                rewind($handle);
            }
            $text[$lines-$linecounter-1] = fgets($handle);
            if ($beginning) break;
        }
        fclose ($handle);
        return implode("\n", array_reverse($text));
    }

    static public function Rotate($file = 'common.log') {
        $newfile = __LOG_PATH__."/$file"."-".date('YmdHis').".log";
        rename(__LOG_PATH__."/$file",$newfile);
    }

}
?>
