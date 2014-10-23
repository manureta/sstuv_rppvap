<?php

abstract class QApplication extends QApplicationBase {

    
    public static function initializeErrorHandling() {
    ///////////////////////
    // Setup Error Handling
    ///////////////////////
        /*
         * Set Error/Exception Handling to the default
         * QCubed HandleError and HandlException functions
         * (Only in non CLI mode)
         *
         * Feel free to change, if needed, to your own
         * custom error handling script(s).
         */
        if (array_key_exists('SERVER_PROTOCOL', $_SERVER)) {
            set_error_handler('QcodoHandleError', (SERVER_INSTANCE == 'prod')) ? E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR : E_ALL;
            set_exception_handler('QcodoHandleException');
        }
        
    }

    public static function initializeLanguage() {
    // Initialize I18n if QApplication::$LanguageCode is set
        if (self::$LanguageCode)
            QI18n::Initialize();
        else {
            self::$CountryCode = 'ar';
            self::$LanguageCode = 'es';
            QI18n::Initialize();
        }
    }
    public static function initializeCache() {
    //cache management
    //QForm::$FormStateHandler = 'QFileFormStateHandler';
        QCache::$CachePath = __CACHE_DIR__;
        QFileFormStateHandler::$StatePath = __CACHE_DIR__;
    }

    public static function initializeQEMailServer(){
        ////////////////////////////////////////////////
        // EMAIL SMTP Server
        ////////////////////////////////////////////////
        if(defined('__EMAIL_SMTP_SERVER__'))
            QEmailServer::$SmtpServer = __EMAIL_SMTP_SERVER__;
        if(defined('__SMTP_USERNAME__'))
            QEmailServer::$SmtpUsername = __SMTP_USERNAME__;
        if(defined('__SMTP_USERPASSWORD__'))
            QEmailServer::$SmtpPassword = __SMTP_USERPASSWORD__;
        if(defined('__SMTP_PORT__'))
            QEmailServer::$SmtpPort = __SMTP_PORT__;
        if(defined('__SMTP_AUTHLOGIN__'))
            QEmailServer::$AuthLogin = __SMTP_AUTHLOGIN__;
        if(defined('__SMTP_AUTHPLAIN__'))
            QEmailServer::$AuthPlain = __SMTP_AUTHPLAIN__;
        QEmailServer::InitializePhpMailer();
    }

    public static function getUltimaArticulacion(){
        $xmlConfiguracion = simplexml_load_file(__CONFIG_DIR__.'/configuracion.xml');
        return (string) $xmlConfiguracion->FechaUltimaArticulacion;
    }

    public static function setUltimaArticulacion(){
        $xmlConfiguracion = simplexml_load_file(__CONFIG_DIR__.'/configuracion.xml');
        $xmlConfiguracion->FechaUltimaArticulacion = QDateTime::Now()->qFormat('YYYY-MM-DD hhhh:mm:ss');
        file_put_contents(__CONFIG_DIR__.'/configuracion.xml', $xmlConfiguracion->asXML());
    }
}
?>
