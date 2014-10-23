<?php

abstract class PermissionBase {

    public static $arrUsuarioInfo;

    public static function GetAtributoUsuario($strName) {
        if (!Authentication::EstaConectado())
            return false;
        if (array_key_exists($strName, self::$arrUsuarioInfo)) {
            return self::$arrUsuarioInfo[$strName];
        }
        return false;
    }

    public static function GetPermisosUsuario() {
        if (!isset(self::$arrUsuarioInfo) || !is_array(self::$arrUsuarioInfo)) {
            self::$arrUsuarioInfo = Session::GetUsuario();
        }
        if (self::$arrUsuarioInfo) {
            return self::$arrUsuarioInfo;
        }
        return false;
    }

    public static function LoadPerfilUsuario() {
        $arrUsuarioInfo = null;
        $arrUsuarioInfo["Perfiles"] = Permission::GetPerfilesUsuario(Authentication::$objUsuarioLocal);
        $arrUsuarioInfo["Recursos"] = Permission::GetRecursosUsuario(Authentication::$objUsuarioLocal);
        $arrUsuarioInfo["Entidades"] = Permission::GetEntidadesUsuario(Authentication::$objUsuarioLocal);
        $arrUsuarioInfo["Nombre"] = Authentication::$objUsuarioLocal->Nombre;
        $arrUsuarioInfo["Email"] = Authentication::$objUsuarioLocal->Email;
        $arrUsuarioInfo["IdUsuario"] = Authentication::$objUsuarioLocal->IdUsuario;
        self::$arrUsuarioInfo = $arrUsuarioInfo;
        Session::SetUsuario(self::$arrUsuarioInfo);
        return true;
    }

    public static function GetPerfilesUsuario(Usuario $objUsuario) { throw new QCallerException('Metodo no implementado');}
    public static function GetEntidadesUsuario(Usuario $objUsuario) { throw new QCallerException('Metodo no implementado');}
    public static function GetRecursosUsuario(Usuario $objUsuario) { throw new QCallerException('Metodo no implementado');}
    #abstract static function GetRecursosPerfil(PerfilTipo $objPerfil);

    public static function EsAdministrador() {
        if (!Authentication::UsuarioLogueado()) {
            LogHelper::Debug('No se encontro el usuario logueado en '.__FUNCTION__);
            return false;
        }
        return (isset (self::$arrUsuarioInfo["Perfiles"]) && is_array(self::$arrUsuarioInfo["Perfiles"]) && (in_array('Administrador', array_values(self::$arrUsuarioInfo["Perfiles"])) || in_array('administrador', array_values(self::$arrUsuarioInfo["Perfiles"])) || self::$arrUsuarioInfo["Perfiles"] == 'Administrador'));
    }
    
    public static function TienePermisoControllerAction($strController, $strAction) {
        if (self::EsAdministrador() || $strAction != 'Edit') {
            return true;
        }
        if (isset(self::$arrUsuarioInfo["Recursos"][$strController][QControllerActionType::AllAction])
                || isset(self::$arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][QControllerActionType::AllAction])
                || isset(self::$arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][$strAction])
                || (isset(self::$arrUsuarioInfo["Recursos"][$strController]) && is_array(self::$arrUsuarioInfo["Recursos"][$strController][$strAction]))) {
            return true;
        }
        return false;
    }

    public static function TienePermisoControllerActionValor($strController, $strAction, $mixValue = null) {
        if (self::EsAdministrador()) {
            return true;
        }

        if (isset(self::$arrUsuarioInfo["Recursos"][$strController][QControllerActionType::AllAction])
                || isset(self::$arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][QControllerActionType::AllAction])
                || isset(self::$arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][$strAction][$mixValue])
                || isset(self::$arrUsuarioInfo["Recursos"][$strController][$strAction][$mixValue])) {
            return true;
        }
        return false;
    }

}

?>
