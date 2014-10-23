<?php

abstract class AuthenticationBase {

    protected static $objSoapInstance;
    protected static $blnConnected;
    public static $objUsuarioLocal;

    public static function EstaConectado() {
        return (self::$blnConnected = is_array(Session::GetUsuario()));
    }

    public static function GetSoapInstance($strWsdlUri, $arrOptions = array()) {
        try {
            if (!self::$objSoapInstance) {
                self::$objSoapInstance = new SoapClient($strWsdlUri, $arrOptions);
            }
            if (!(self::$objSoapInstance instanceof SoapClient)) {
                throw new QCallerException("ERROR: No se pudo conectar al servicio web AuthMe.");
            }
            return self::$objSoapInstance;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function Login($strUsuario, $strPassword = '') {
        try {
            if (!self::GetSoapInstance(AUTH_SOAP_URI)->ChequearUsuario($strUsuario)) {
                throw new QCallerException("ERROR: El usuario no existe en el sistema AuthMe.");
            }
            return (self::$blnConnected = self::GetSoapInstance(AUTH_SOAP_URI)->Login($strUsuario, $strPassword));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function LoguearUsuario($strUsuario, $strPassword) {
        try {
            if (Authentication::Login($strUsuario, $strPassword)) {
                self::$objUsuarioLocal = Usuario::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::Usuario()->Nombre, $strUsuario), QQ::Equal(QQN::Usuario()->Activo, true)));
                if (!self::$objUsuarioLocal) {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            LogHelper::Log("ERROR: ".$e->getMessage());
            return false;
        }
        Permission::LoadPerfilUsuario();
        return true;
    }


    public static function UseAuth() {
        return (defined("USE_AUTHME") && USE_AUTHME === true);
    }

    public static function UsuarioLogueado() {
        if (!($arrUsuarioInfo = Permission::GetPermisosUsuario())) {
            if (defined('__CONF_INI_OK__') && __CONF_INI_OK__) {
                $strNombreUsuario = Session::GetNombreUsuarioLogueado();
                if ($strNombreUsuario && self::$objUsuarioLocal = Usuario::LoadByNombre($strNombreUsuario)) {
                    //LogHelper::Debug('Se encontro el usuario logueado en algun sistema '.__FUNCTION__);
                    Permission::LoadPerfilUsuario();
                } else {
                    //LogHelper::Debug('No se encontro el usuario logueado en algun sistema '.__FUNCTION__);
                    return false;
                }
            } else {
                //LogHelper::Debug('El sistema no esta configurado para la authenticacion '.__FUNCTION__);
                return false;
            }
        } else {
            //LogHelper::Debug('Permission::GetPermisosUsuario() devolvio ok');
        }
        /*else {
            Session::SetUsuario($arrUsuarioInfo);
        }*/
        if (is_array(Permission::GetPermisosUsuario())) {
            return true;
        } else {
            return false;
        }
    }

/*    public static function UsuarioLogueado() {
        return self::EstaConectado();
    }*/

    public static function LogoutUsuario() {
        Session::UnsetUsuario();
        Session::DestroySession();
    }

    public static function ExisteUsuarioAuthme($strUsuario) {
        try {
            return self::GetSoapInstance(AUTH_SOAP_URI)->ChequearUsuario($strUsuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function ChequearUsuarioPasswordAuthme($strUsuario, $strPassword) {
        try {
            return self::GetSoapInstance(AUTH_SOAP_URI)->ChequearUsuarioPassword($strUsuario, $strPassword);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function RegistrarUsuario($strUsuario, $strPassword, $arrDatos = array(), $strSistema = __APP_SHORT_NAME__) {
        try {
            self::GetSoapInstance(AUTH_SOAP_URI)->RegistrarUsuario($strUsuario, $strPassword, $arrDatos, $strSistema);
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
