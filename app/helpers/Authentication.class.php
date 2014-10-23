<?php

abstract class Authentication extends AuthenticationBase {

    public static function LoginLocal($strUsuario, $strPassword) {
        if (!$objUsuario = Usuario::LoadByNombre($strUsuario)) {
            return false;
        }
    }

    public static function Login($strUsuario, $strPassword = '') {       
        if (!(self::$objUsuarioLocal = Usuario::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::Usuario()->Nombre, $strUsuario), QQ::Equal(QQN::Usuario()->Password, md5($strPassword)))))) {
            return false;
        }
        $arrUsuarioInfo = array();
        return (self::$blnConnected = (self::$objUsuarioLocal->Password == md5($strPassword)));
    }

    public static function LoguearUsuario($strUsuario, $strPassword) {
        try {
            if (Authentication::Login($strUsuario, $strPassword)) {
                Permission::LoadPerfilUsuario();
                return true;
            }
        } catch (Exception $e) {
            LogHelper::Log($e->getMessage());
        }
        return false;
    }

    public static function LoguearCueanexo($strCueanexo) {
        try {
            if (Localizacion::CountByCueanexo($strCueanexo) > 0) {
                return true;
            }
        } catch (Exception $e) {
            LogHelper::Log($e->getMessage());
        }
        return false;
    }

    public static function GetUsuarioInfo() {
        if (!Authentication::UsuarioLogueado() || !Session::GetUsuario()) {
//            LogHelper::Debug('No se encontro usuario logueado '.__FUNCTION__);
            return false;
        }
        return Session::GetUsuario();
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
