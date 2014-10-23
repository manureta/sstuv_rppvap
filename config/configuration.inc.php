<?php

define('__APP_NAME__', 'Sitio generico sin descripcion');
define('__APP_SHORT_NAME__', 'registro');

#Default timezone
date_default_timezone_set('America/Argentina/Buenos_Aires');

if (file_exists(dirname(__FILE__).'/custom.inc.php')) require_once(dirname(__FILE__).'/custom.inc.php');

require_once(dirname(__FILE__).'/paths.inc.php');

if (file_exists(__CONFIG_DIR__.'/configuracion.xml')) {
    $xmlConfiguracion = simplexml_load_file(__CONFIG_DIR__.'/configuracion.xml');
    //$xmlConfiguracion = $xmlConfiguracion->asXml();
    
    define('__NOM_PROV__', (string) $xmlConfiguracion->Provincia->Nombre);
    define('__COD_PROV__', (string) $xmlConfiguracion->Provincia->Codigo);
    //define('__DBF_MAESTRO_PATH__', (string) $xmlConfiguracion->Path);
    $strDbConnschema = (string)$xmlConfiguracion->DbConnOltp->schema;
    define('DB_CONNECTION_1', serialize(array(
            'adapter' => (string) $xmlConfiguracion->DbConn->Adapter,
            'server' => (string) $xmlConfiguracion->DbConn->Server,
            'port' => (int) $xmlConfiguracion->DbConn->Port,
            'database' => (string) $xmlConfiguracion->DbConn->Database,
            'username' => (string) $xmlConfiguracion->DbConn->Username,
            'password' => (string) $xmlConfiguracion->DbConn->Password,
            'schema' => array(),
            'profiling' => $xmlConfiguracion->DbConn->Profiling == 'false' ? false : true

    )));
   define('DB_CONNECTION_2', serialize(array(
            'adapter' => (string) $xmlConfiguracion->DbConnProc->Adapter,
            'server' => (string) $xmlConfiguracion->DbConnProc->Server,
            'port' => (int) $xmlConfiguracion->DbConnProc->Port,
            'database' => (string) $xmlConfiguracion->DbConnProc->Database,
            'username' => (string) $xmlConfiguracion->DbConnProc->Username,
            'password' => (string) $xmlConfiguracion->DbConnProc->Password,
            'schema' =>  array(),
            'profiling' => $xmlConfiguracion->DbConnProc->Profiling == 'false' ? false : true
    )));
    define('__DB_INDEX_CARGA__', 1);
    define('__DB_INDEX_OLTP__', 2);
    define('__DB_INDEX_PROC__', 3);
    
    if (!defined('SERVER_INSTANCE')) define('SERVER_INSTANCE', (empty($xmlConfiguracion->ServerInstance))?'prod':(string)$xmlConfiguracion->ServerInstance);
    

    if (!defined('__QCODO_CORE__') && file_exists((string)$xmlConfiguracion->QCodoCorePath)) define('__QCODO_CORE__', (string)$xmlConfiguracion->QCodoCorePath);

    if (!defined('__WEBSERVICE_RA_SOAP_URI__')) {
        define('__WEBSERVICE_RA_SOAP_URI__', 'http://'.(string) $xmlConfiguracion->WebServiceRa->Uri);
    }

    if (!defined('__WEBSERVICE_RA_SOAP_TNS__')) {
        define('__WEBSERVICE_RA_SOAP_TNS__', (string) $xmlConfiguracion->WebServiceRa->Uri);
    }

    if (!defined('__WEBSERVICE_PADRON_SOAP_URI__')) {
        define('__WEBSERVICE_PADRON_SOAP_URI__', 'http://'.(string) $xmlConfiguracion->WebServicePadron->Uri);
    }

    if (!defined('__WEBSERVICE_PADRON_SOAP_TNS__')) {
        define('__WEBSERVICE_PADRON_SOAP_TNS__', (string) $xmlConfiguracion->WebServicePadron->Uri);
    }

    if (!defined('__WEBSERVICE_MANAGER_SOAP_URI__')) {
        define('__WEBSERVICE_MANAGER_SOAP_URI__', 'http://localhost/manager/WebService.php');
    }
    if (!defined('__WEBSERVICE_MANAGER_SOAP_TNS__')) {
        define('__WEBSERVICE_MANAGER_SOAP_TNS__', 'localhost/manager/WebService.php');
    }

    if(!defined('__WEBSERVICE_DINIECE_NACIONAL_TEST_SOAP_URI__')) define('__WEBSERVICE_DINIECE_NACIONAL_TEST_SOAP_URI__', 'https://diniece.me.gov.ar/managernacional_test/WebService.php');
    if(!defined('__WEBSERVICE_DINIECE_NACIONAL_TEST_SOAP_TNS__')) define('__WEBSERVICE_DINIECE_NACIONAL_TEST_SOAP_TNS__', 'diniece.me.gov.ar/managernacional_test/WebService.php');
     
    if(!defined('AUTH_SOAP_URI') && $xmlConfiguracion->AuthMe->AuthmeUri != "") define('AUTH_SOAP_URI', 'http://'.(string) $xmlConfiguracion->AuthMe->AuthmeUri.'?wsdl');
    if(!defined('USE_AUTHME')) define('USE_AUTHME', $xmlConfiguracion->AuthMe->UseAuthMe == 'false' ? false : true);

    define('__DB_INICIALIZADA_CARGA__', $xmlConfiguracion->DbConn->Inicializada == "false" ? false : true);
    if(!defined('__ALLOW_EMAILS__')) define('__ALLOW_EMAILS__', $xmlConfiguracion->Email->Enabled == "false" ? false : true);
    if(!defined('__EMAIL_SMTP_SERVER__')) define('__EMAIL_SMTP_SERVER__', (string) $xmlConfiguracion->Email->Smtp);
    if(!defined('__EMAIL_FROM__')) define('__EMAIL_FROM__', (string) (!empty($xmlConfiguracion->Email->From)?$xmlConfiguracion->Email->From:'sistemasdiniece@me.gov.ar' ));
    if(!defined('__EMAIL_FROM_NAME__')) define('__EMAIL_FROM_NAME__', '"Padron ' . __NOM_PROV__. '"' );
    if(!defined('__EMAIL_TO_LIST__')) define('__EMAIL_TO_LIST__', (string) $xmlConfiguracion->Email->To);
    if (!defined('__SMTP_USERNAME__'))
        define('__SMTP_USERNAME__', (string)$xmlConfiguracion->Email->UserName);
    if (!defined('__SMTP_USERPASSWORD__'))
        define('__SMTP_USERPASSWORD__', (string)$xmlConfiguracion->Email->UserPassword);
    if (!defined('__SMTP_PORT__'))
        define('__SMTP_PORT__', (int)$xmlConfiguracion->Email->Port);
    if (!defined('__SMTP_AUTHPLAIN__'))
        define('__SMTP_AUTHPLAIN__', ($xmlConfiguracion->Email->AuthPlain=='true'?true:false));
    if (!defined('__SMTP_AUTHLOGIN__'))
        define('__SMTP_AUTHLOGIN__', ($xmlConfiguracion->Email->AuthLogin=='true'?true:false));

    define('__DB_INICIALIZADA_OLTP__', $xmlConfiguracion->DbConnOltp->Inicializada == "false" ? false : true);
    define('__SUPER_ADMIN_CREADO__', $xmlConfiguracion->SuperAdmin == "false" ? false : true);

    if (__NOM_PROV__ && __COD_PROV__ && DB_CONNECTION_1 && DB_CONNECTION_2 && __DB_INICIALIZADA_CARGA__ && __DB_INICIALIZADA_OLTP__ && __SUPER_ADMIN_CREADO__)
        define('__CONF_INI_OK__', TRUE);

    if(!defined('__ARTICULATION_PROCESS__'))define('__ARTICULATION_PROCESS__',(empty($xmlConfiguracion->Process))?4:(string)$xmlConfiguracion->Process);
}

define('__SISTEMA_VERSION__',trim(file_get_contents(dirname(__FILE__).'/VERSION')));
if (!defined('__MAX_POST_SIZE__')) define('__MAX_POST_SIZE__',1048576);

if (defined('SERVER_INSTANCE') && SERVER_INSTANCE == 'dev') {
    define('ALLOW_REMOTE_ADMIN', true);
    define('ERROR_PAGE_PATH', __PHP_ASSETS__ . '/_core/error_page.php');
    if (!defined('__ALLOW_EMAILS__')) define('__ALLOW_EMAILS__',false);
    define('__DEVTOOLS_CLI__', __QCODO_CORE__.'/_devtools_cli');
    define('__ADMIN_DIR__', __VIRTUAL_DIRECTORY__. '/admin');

} else {
    ini_set('display_errors',FALSE);

    define('ALLOW_REMOTE_ADMIN', false);
    define('ERROR_PAGE_PATH', __PHP_ASSETS__ . '/_core/error_page.php');
    //define('ERROR_PAGE_PATH', __PHP_ASSETS__ . '/_core/error_page.php');
    define('ERROR_LOG_PATH', __CACHE_DIR__ . '/error_log');
    // To Log ALL errors that have occurred, set flag to true
    define('ERROR_LOG_FLAG', true);

    define('ERROR_FRIENDLY_PAGE_PATH', __PHP_ASSETS__ . '/friendly_error_page.php');
    define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Ha ocurrido un error y fue notificado.\r\n\r\nIntentaremos resolverlo a la brevedad.');

}
define('__EXAMPLES__', null);

if (!defined("__IDS_COD_JUR__") && (string) $xmlConfiguracion->IdsCodigoJurisdiccional != '') {
    define("__IDS_COD_JUR__", (string) $xmlConfiguracion->IdsCodigoJurisdiccional);
}

if (!defined("AUTH_SOAP_URI")) {
    define("AUTH_SOAP_URI", 'http://localhost/manager/WebService.php?wsdl');
}
if (!defined('__SHOW_HOME__')) define('__SHOW_HOME__',false);

if (!defined('__FORM_STATE_HANDLER__')) define('__FORM_STATE_HANDLER__','QSessionFormStateHandler');

if (!defined('__CARGA_EN_ESCUELA__')) define('__CARGA_EN_ESCUELA__',true);

if (!defined('__BASE_CERRADA__') && file_exists(__CONFIG_DIR__.'/BASE_CERRADA')) define('__BASE_CERRADA__',true);
