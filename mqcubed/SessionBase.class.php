<?php

/**
 * Clase que abstrae el manejo de la session.
 * Contiene una manera facil y segura de iniciar la session solo cuando se necesita
 * ademas de todos los geters y setters que hacen falta para almacenar y recuperar
 * los elementos y objetos de la session
 *
 * @author jose
 */
abstract class SessionBase {
    /**
     * constantes
     */
    const USERMENU = 'UserMenu';
    const USERMENURENDER = 'UserMenuRender';
    const USUARIO_LOGUEADO = "UsuarioLogueado";

    protected static $blnStarted;

    public static function Start() {
        if (!self::$blnStarted) {
            self::$blnStarted = true;
            session_start();
            if (!array_key_exists(__APP_SHORT_NAME__, $_SESSION))
                $_SESSION[__APP_SHORT_NAME__] = array();
        }
    }

    public static function End() {
        if (self::$blnStarted) {
            self::$blnStarted = false;
            $_SESSION[__APP_SHORT_NAME__] = array();
            @session_destroy();
        }
    }

    public static function DestroySession() {
        if (self::$blnStarted) {
            self::$blnStarted = false;
            $_SESSION[__APP_SHORT_NAME__] = array();
            @session_destroy();
        }
    }

    public static function getUserMenu() {
        $return = null;
        self::Start();
        if (self::GetSessionVar(self::USERMENU))
            $return = unserialize(self::GetSessionVar(self::USERMENU));
        #self::End();
        return $return;
    }

    public static function setUserMenu(UserMenu $UserMenu = null) {
        self::Start();
        self::SetSessionVar(self::USERMENU, serialize($UserMenu));
        #self::End();
    }

    public static function getUserMenuRender() {
        $return = null;
        self::Start();
        if ((sel::GetSessionVar(self::USERMENURENDER)))
            $return = self::GetSessionVar(self::USERMENURENDER);
        #self::End();
        return $return;
    }

    public static function setUserMenuRender($strUserMenu = null) {
        self::Start();
        self::SetSessionVar(self::USERMENURENDER, $strUserMenu);
        #self::End();
    }

    public static $_objUsuario;

    public static function GetUsuario() {
        self::Start();
        return self::GetInfoUsuarioLogueado();
    }

    public static function GetInfoUsuarioLogueado() {
        if ($arrUsuarioInfo = self::GetSessionVar(self::USUARIO_LOGUEADO)) {
            return unserialize($arrUsuarioInfo);
        }
        LogHelper::Debug('No se encontro el usuario logueado en el sistema '.__FUNCTION__);
        return false;
    }

    public static function GetNombreUsuarioLogueado() {
        if (isset($_SESSION[self::USUARIO_LOGUEADO])) {
            return $_SESSION[self::USUARIO_LOGUEADO];
        }
        LogHelper::Debug('No se encontro el usuario logueado en el sistema '.__FUNCTION__);
        return false;
    }

    /**
     * deprecada
     */
    public static function GetUsuarioSistema($strSistema) {
        if (isset($_SESSION[$strSistema]) && isset($_SESSION[$strSistema][self::USUARIO_LOGUEADO])) {
            return unserialize($_SESSION[$strSistema][self::USUARIO_LOGUEADO]);
        }
        LogHelper::Debug('No se encontro el usuario logueado en el sistema '.$strSistema);
        return false;
    }

    public static function SetUsuario($arrUsuarioInfo) {
        self::Start();
        $arrUsuarioTmp = Session::GetSessionVar(self::USUARIO_LOGUEADO);
        self::UnsetUsuario();
        //$arrUsuarioTmp[__APP_SHORT_NAME__] = serialize($arrUsuarioInfo);
        self::$_objUsuario[__APP_SHORT_NAME__] = $arrUsuarioInfo;
        LogHelper::Debug('Guardando el usuario '.$arrUsuarioInfo['Nombre'].' en Session');
        $_SESSION[self::USUARIO_LOGUEADO] = $arrUsuarioInfo["Nombre"];
        self::SetSessionVar(self::USUARIO_LOGUEADO, serialize($arrUsuarioInfo));
        #self::End();
    }

    public static function UnsetUsuario() {
        self::Start();
        self::UnsetSessionVar(self::USUARIO_LOGUEADO);
        #self::End();
    }

    public static function SetSessionVar($strName, $mixValue) {
        self::Start();
        $_SESSION[__APP_SHORT_NAME__][$strName] = $mixValue;
        #self::End();
    }

    public static function AddSessionVar($strName, $mixValue) {
        self::Start();
        $_SESSION[__APP_SHORT_NAME__][$strName] = $mixValue;
        #self::End();
    }

    public static function GetSessionVar($strName) {
        self::Start();
        if (isset($_SESSION[__APP_SHORT_NAME__][$strName])) {
            return $_SESSION[__APP_SHORT_NAME__][$strName];
        }
        #self::End();
        return false;
    }

    public static function UnsetSessionVar($strName) {
        self::Start();
        if (isset($_SESSION[__APP_SHORT_NAME__][$strName])) {
            unset($_SESSION[__APP_SHORT_NAME__][$strName]);
        }
        #self::End();
    }

}
?>
