<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();

$intTipoBloqueo = null;
try {
    @$intTipoBloqueo = trim(file_get_contents(__CONFIG_DIR__.'/PROYECTOBLOQUEADO'));
} catch (Exception $e) {}
switch ($intTipoBloqueo) {
    case QBlockedCauseType::Upgrade:
        $strCause = "El sistema se encuentra bloqueado debido a que se est&aacute; realizando una actualizaci&oacute;n sobre el mismo.";
    break;
    case QBlockedCauseType::Backup:
        $strCause = "El sistema se encuentra bloqueado debido a que se est&aacute; realizando una copia de seguridad sobre el mismo.";
    break;
    case QBlockedCauseType::ErrorUnrecoverable:
        $strCause = "El sistema se encuentra bloqueado debido a un error irrecuperable. Cont&aacute;ctese con Sistemas de DiNIECE.";
    break;
    case QBlockedCauseType::ExternalErrorUnrecoverable:
        $strCause = "El sistema se encuentra bloqueado debido a un error externo irrecuperable. Cont&aacute;ctese con Sistemas de DiNIECE.";
    break;
    case QBlockedCauseType::WrongDatabaseVersion:
        $strCause = "El sistema se encuentra bloqueado debido a que la versi&oacute;n del sistema no concuerda con la versi&oacute;n de la Base de Datos.";
    break;
    default:
        $strCause = $intTipoBloqueo;
    break;
}
die($strCause);
