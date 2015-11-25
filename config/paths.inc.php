<?php

define('__CONFIG_DIR__', preg_replace("/[a-zA-Z]:\\\|\\\/", '/',dirname(__FILE__)));

define('__PROJECT_DIR__', dirname(__CONFIG_DIR__));
define('__WWW_ROOT__', dirname(__PROJECT_DIR__));

define('__CONFIG_FILE__', __CONFIG_DIR__.'/configuracion.xml');

if (!defined('__VIRTUAL_DIRECTORY__')) define('__VIRTUAL_DIRECTORY__', '/'.__APP_SHORT_NAME__);
if (!defined('__SUBDIRECTORY__')) define ('__SUBDIRECTORY__', '');

//CONSTANTE GENERAL relativa
if (!defined('__LIBRARY_DIR__')) define('__LIBRARY_DIR__',__PROJECT_DIR__.'/mqcubed');
define ('__DOCROOT__', __PROJECT_DIR__.'/public');

define('__MIGRADOR_DIR__',__PROJECT_DIR__.'/migrador');
//Application Custom paths
define ('__APPLICATION_DIR__', __PROJECT_DIR__ . '/app');
define ('__CODEGEN_DIR__', __PROJECT_DIR__ . '/_devtools/codegen');
define ('__CACHE_DIR__', __PROJECT_DIR__ . '/cache');
define ('__TESTS_DIR__', __PROJECT_DIR__ . '/tests');
if (!defined('__TMP_DIR__')) define ('__TMP_DIR__', __PROJECT_DIR__ . '/tmp');
define ('__RESOURCES_DIR__',__LIBRARY_DIR__.'/resources');
define ('__CONTROLLER_DIR__', __APPLICATION_DIR__ . '/controllers');
define ('__HELPER_DIR__', __APPLICATION_DIR__ . '/helpers');
define ('__MODEL_DIR__',__APPLICATION_DIR__.'/models');
define ('__VIEW_DIR__', __APPLICATION_DIR__ . '/views');
define ('__EXCEPTIONS_DIR__', __APPLICATION_DIR__ . '/exceptions');

define ('__BACKUP_DIR__',__TMP_DIR__.'/backup');
define ('__UPDATES_DIR__',__TMP_DIR__.'/update');

define('__MAPPER_RESOURCE__', __RESOURCES_DIR__.'/mappers');
define('__MAPPER_TMP_PATH__', __TMP_DIR__);

define('__WIN_PG_DUMP_PATH__',__RESOURCES_DIR__.'/8.4/pg_dump.exe');

define ('__URL_REWRITE__', 'apache');
// Destination for Code Generated class files

define ('__DATA_CLASSES__', __MODEL_DIR__ . '/orm');
define ('__DATAGEN_CLASSES__', __MODEL_DIR__ . '/orm/generated');

define ('__OLTP_DATA_CLASSES__', __DATA_CLASSES__ . '/oltp');
define ('__OLTP_DATAGEN_CLASSES__', __OLTP_DATA_CLASSES__ . '/generated');

define ('__DATA_META_CONTROLS__', __HELPER_DIR__);
define ('__DATAGEN_META_CONTROLS__', __HELPER_DIR__);

// Destination for generated form drafts and panel drafts
define ('__FORM_DRAFTS__',  __APPLICATION_DIR__.'/drafts');
define ('__PANEL_DRAFTS__', __APPLICATION_DIR__.'/drafts/dashboard');
define ('__PANEL_DRAFTS_CONTROLLERS__', __APPLICATION_DIR__.'/controllers');
define ('__PANEL_DRAFTS_VIEWS__', __APPLICATION_DIR__.'/views');

//Application relative
define ('__DEVTOOLS__', '/codegen');
// Location of Qcodo-specific Web Assets (JavaScripts, CSS, Images, and PHP Pages/Popups)

if (!defined('__MANAGER_URI__') && file_exists(__WWW_ROOT__.'/manager')) {
    define('__MANAGER_URI__', '/manager');
}

if (!defined('__QCODO_CORE__')) {
    define('__QCODO_CORE__',__PROJECT_DIR__.'/mqcubed/_core');
}
if (!defined('__ASSETS_URI__')) {
	define('__ASSETS_URI__',__VIRTUAL_DIRECTORY__.'/mqcubed/assets');
}

define ('__JS_ASSETS__', __ASSETS_URI__.'/js/');
define ('__CSS_ASSETS__', __ASSETS_URI__.'/css/');
define ('__IMAGE_ASSETS__', __ASSETS_URI__.'/images/');
define ('__PHP_ASSETS__', '/php/');


define ('__QCODO__', __APPLICATION_DIR__ );
define ('__INCLUDES__', __APPLICATION_DIR__);
define ('__CONSISTENCIAS_DIR__', __MODEL_DIR__.'/consistencias');
define ('__MIGRACIONES_DIR__', __MODEL_DIR__.'/migraciones');
define ('__CUADROS_DIR__',__MODEL_DIR__.'/cuadros');
if (!defined('__RESOURCES_DIR__')) define('__RESOURCES_DIR__',__PROJECT_DIR__.'/resources');

include "variables_censo_impresion.inc.php";

?>
