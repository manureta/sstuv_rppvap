<?php

if (defined("__PGSH_ENABLED__") && __PGSH_ENABLED__ ) {
    require_once __QCODO_CORE__.'/../PGSessionHandler.class.php';
}

abstract class Session {

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
            session_destroy();
        }
    }

    public static function DestroySession() {
        if (self::$blnStarted) {
            self::$blnStarted = false;
            $_SESSION[__APP_SHORT_NAME__] = array();
            session_destroy();
        }
    }

    public static function Set($strName, $mixValue) {
        self::Start();
        $_SESSION[__APP_SHORT_NAME__][$strName] = $mixValue;
    }


    public static function Get($strName) {
        self::Start();
        if (isset($_SESSION[__APP_SHORT_NAME__][$strName])) {
            return $_SESSION[__APP_SHORT_NAME__][$strName];
        }
        return null;
    }

    public static function Delete($strName) {
        self::Start();
        if (isset($_SESSION[__APP_SHORT_NAME__][$strName])) {
            unset($_SESSION[__APP_SHORT_NAME__][$strName]);
        }
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
    
    /*
     * Session Getters
     */
    
    /**
     * @abstract Unidad de Servicio Seleccionado por el usuario luego de iniciar
     * session. Esta variable puede estar vacia o no contener dato en caso que el
     * usuario halla optado por un perfil cuyo acceso no sea por unidad de servicio.
     * 
     * @return UnidadServicio
     */
    public static function getObjUnidadDeServicio(){
         return Session::Get('objUnidadServicio');
    }
    
    /**
     * @abstract Perfil Activo seleccionado por el usuario luego de iniciar
     * session.
     * 
     * @return Perfil
     */
    public static function getObjPerfilActivo(){
        return Session::Get('objPerfilActivo');
    }
    
    /**
     * @abstract Institucion del objeto Unidad de Servicio Seleccionado por el 
     * usuario luego de iniciar Session.
     * El nombre BySessionUnidadDeServicio es para indicar que la institucion
     * es obtenida de aquellas sesiones de acceso por unidad de servicio.
     * 
     * @return Institucion
     */
    public static function getObjInstitucionBySessionUnidadDeServicio(){
        return Session::getObjUnidadDeServicio()->IdInstitucionObject;
    }
    
    /**
     * @abstract IdUnidadServicio del objeto Unidad de Servicio Seleccionado por el 
     * usuario luego de iniciar Session.
     * El nombre BySessionUnidadDeServicio es para indicar que la institucion
     * es obtenida de aquellas sesiones de acceso por unidad de servicio.
     * 
     * @return Integer
     */
    public static function getIdUnidadServicioBySessionUnidadDeServicio(){
        return Session::getObjUnidadDeServicio()->IdUnidadServicio;
    }
    
    /**
     * @abstract IdInstitucion del objeto Unidad de Servicio Seleccionado por el 
     * usuario luego de iniciar Session.
     * El nombre BySessionUnidadDeServicio es para indicar que la institucion
     * es obtenida de aquellas sesiones de acceso por unidad de servicio.
     * 
     * @return Integer
     */
    public static function getIdInstitucionBySessionUnidadDeServicio(){
        return Session::getObjUnidadDeServicio()->IdInstitucion;
    }
    
    
    /*
     * Session Setters
     */
    
    /**
     * @abstract Establece la variable de sesión objUsuario
     * @return Boolean
     */
    
    public static function setObjUsuario($objUsuario){
        return Session::Set('objUsuario', $objUsuario);
    }
    
    /**
     * @abstract Establece la variable de sesión objUnidadServicio
     * @return Boolean
     */
    public static function setObjUnidadDeServicio($objUnidadServicio){
        Session::Set('objUnidadServicio', $objUnidadServicio);
    }
    
    /**
     * @abstract Establece la variable de sesión objPerfilActivo
     * @return Boolean
     */
    public static function setObjPerfilActivo($objPerfil){
        Session::Set('objPerfilActivo', $objPerfil);
    }
    
    
    
    
    /*Aun no utilizado*/
    public static function getUserMenu() {
        $return = null;
        self::Start();
        if (self::GetSessionVar(self::USERMENU))
            $return = unserialize(self::GetSessionVar(self::USERMENU));
        #self::End();
        return $return;
    }

    /*Aun no utilizado*/
    public static function setUserMenu(UserMenu $UserMenu = null) {
        self::Start();
        self::SetSessionVar(self::USERMENU, serialize($UserMenu));
        #self::End();
    }

    /*Aun no utilizado*/
    public static function getUserMenuRender() {
        $return = null;
        self::Start();
        if ((sel::GetSessionVar(self::USERMENURENDER)))
            $return = self::GetSessionVar(self::USERMENURENDER);
        #self::End();
        return $return;
    }
    
    /*Aun no utilizado*/
    public static function setUserMenuRender($strUserMenu = null) {
        self::Start();
        self::SetSessionVar(self::USERMENURENDER, $strUserMenu);
        #self::End();
    }

    /*Aun no utilizado*/
    public static $_objUsuario;

    /*Aun no utilizado*/
    public static function GetUsuario() {
        self::Start();
        return self::GetInfoUsuarioLogueado();
    }
    
    /*Aun no utilizado*/
    public static function GetInfoUsuarioLogueado() {
        if ($arrUsuarioInfo = self::GetSessionVar(self::USUARIO_LOGUEADO)) {
            //LogHelper::Debug('Se encontro el usuario logueado en el sistema '.__FUNCTION__);
            return unserialize($arrUsuarioInfo);
        }
        LogHelper::Debug('No se encontro el usuario logueado en el sistema '.__FUNCTION__);
        return false;
    }

    /*Aun no utilizado*/
    public static function GetNombreUsuarioLogueado() {
        if (isset($_SESSION[self::USUARIO_LOGUEADO])) {
            //LogHelper::Debug('Se encontro el usuario logueado en el sistema '.__FUNCTION__);
            return $_SESSION[self::USUARIO_LOGUEADO];
        }
        LogHelper::Debug('No se encontro el usuario logueado en el sistema '.__FUNCTION__);
        return false;
    }

    /**
     * deprecada
     */
    /*Aun no utilizado*/
    public static function GetUsuarioSistema($strSistema) {
        if (isset($_SESSION[$strSistema]) && isset($_SESSION[$strSistema][self::USUARIO_LOGUEADO])) {
            //LogHelper::Debug('Se encontro el usuario logueado en el sistema '.$strSistema);
            return unserialize($_SESSION[$strSistema][self::USUARIO_LOGUEADO]);
        }
        LogHelper::Debug('No se encontro el usuario logueado en el sistema '.$strSistema);
        return false;
    }

    /*Aun no utilizado*/
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

    /*Aun no utilizado*/
    public static function UnsetUsuario() {
        self::Start();
        self::UnsetSessionVar(self::USUARIO_LOGUEADO);
        #self::End();
    }


    const LOCALIZACION = 'LocalizacionActual';
    const NAV_CUADRO = 'NavegacionCuadroActual';
    const NAV_PAGINA = 'NavegacionPaginaActual';
    public static $_objLocalizacion = null;
    public static $arrNavegacionCuadro = array();
    public static $arrNavegacionPagina = array();
    private static $_objQCodoUsuario = null;
    
    public static function GetObjUsuario(){
        return self::Get('objUsuario');
        if(!self::$_objQCodoUsuario){
            $arrUsuario = Session::GetUsuario();
            self::$_objQCodoUsuario = Usuario::LoadByCuit($arrUsuario['Cuit']);
        }
        return self::$_objQCodoUsuario;
    }
    
    /**
     * devuelve la Localizacion cargada en session
     * @return Localizacion
     */
    public static function getLocalizacion(){
        if(!self::$_objLocalizacion ){
            self::Start();
            if(self::GetSessionVar(self::LOCALIZACION))
                self::$_objLocalizacion = unserialize(self::GetSessionVar(self::LOCALIZACION));
            //self::End();
        }
        if(!self::$arrNavegacionCuadro || empty(self::$arrNavegacionCuadro))
            self::$arrNavegacionCuadro = unserialize(self::GetSessionVar(self::NAV_CUADRO));
					
        if(!self::$arrNavegacionPagina || empty(self::$arrNavegacionPagina))
            self::$arrNavegacionPagina = unserialize(self::GetSessionVar(self::NAV_PAGINA));
        //TODO: Quitar Hardcode de desarrollo
        //if(!self::$_objLocalizacion)
        //    self::$_objLocalizacion = Localizacion::Load(99);
        
        return self::$_objLocalizacion;
    }

    public static function GetOltpLocalizacion() {
        if ($objLocalizacion = self::getLocalizacion()) {
            return OLTPLocalizacion::LoadByIdLocalizacion($objLocalizacion->IdLocalizacion);
        }
    }

    public static function unsetLocalizacion(){
        self::Start();
        self::UnsetSessionVar(self::LOCALIZACION);
    }

    public static function setLocalizacion(Localizacion $objLocalizacion = null){

        self::Start();
        self::SetSessionVar(self::LOCALIZACION, serialize($objLocalizacion));
//        $_SESSION[self::LOCALIZACION] = serialize($objLocalizacion);
        //TODO: Hacer lindo como asi
         /*   var_dump( DatosCuadro::QueryArray(
                    QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion, $objLocalizacion->IdLocalizacion ),
                    // Let's expand on the Project, itself
                    QQ::Clause(
                    QQ::Expand(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject)
                    )));*/
        //$arrDatosCuadros = DatosCuadro::QueryArray(
        //    QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion, $objLocalizacion->IdLocalizacion),
        //    QQ::Clause(QQ::Distinct(QQN::DatosCuadro()->IdDefinicionCuadro),
        //    QQ::OrderBy(/*QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->NombreCorto,
        //                QQN::DatosCuadro()->IdDatosCapituloObject->IdDefinicionCapituloObject->Orden,*/
        //                QQN::DatosCuadro()->IdDefinicionCuadroObject->Orden),
        //    QQ::Expand(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject),
        //    QQ::Expand(QQN::DatosCuadro()->IdDatosCapituloObject->IdDefinicionCapituloObject),
        //    QQ::Expand(QQN::DatosCuadro()->IdDefinicionCuadroObject)
        //    ));
        //foreach($arrDatosCuadros as $objDatosCuadro) {
        //    echo $objDatosCuadro->IdDefinicionCuadro.
        //         $objDatosCuadro->IdDatosCapituloObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto.
        //         $objDatosCuadro->IdDatosCapituloObject->IdDefinicionCapitulo.
        //         $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->NombreCorto.$objDatosCuadro->IdDefinicionCuadroObject->Numero.'<br/>';
        //}
        self::$arrNavegacionCuadro = array();
        $result = QApplication::$Database[1]->Query("
        SELECT nombre_corto, datos_cuadro.id_definicion_cuadro 
            FROM datos_cuadro 
            JOIN datos_capitulo using(id_datos_capitulo)
            JOIN datos_cuadernillo using(id_datos_cuadernillo)            
            JOIN definicion_pagina using(id_definicion_capitulo)
            JOIN defcuadro_defpagina ON defcuadro_defpagina.id_definicion_cuadro = datos_cuadro.id_definicion_cuadro and defcuadro_defpagina.id_definicion_pagina = definicion_pagina.id_definicion_pagina
            JOIN definicion_cuadernillo using(id_definicion_cuadernillo)
        WHERE id_localizacion = ".$objLocalizacion->IdLocalizacion."
        GROUP BY nombre_corto, datos_cuadro.id_definicion_cuadro, datos_cuadernillo.id_definicion_cuadernillo, definicion_pagina.numero, defcuadro_defpagina.orden
        ORDER BY nombre_corto,definicion_pagina.numero, defcuadro_defpagina.orden;");
        foreach($result->FetchAll() as $row) {
            if(!array_key_exists($row["nombre_corto"],self::$arrNavegacionCuadro)) {
              self::$arrNavegacionCuadro[$row["nombre_corto"]] = array(); 
            }
            self::$arrNavegacionCuadro[$row["nombre_corto"]] []= $row["id_definicion_cuadro"];
        }
        self::SetSessionVar(self::NAV_CUADRO, serialize(self::$arrNavegacionCuadro));

        $arrDefinicionPaginas = DefinicionPagina::QueryArray(
                QQ::Equal(QQN::DefinicionPagina()->DefcuadroDefpaginaAsId->IdDefinicionCuadroObject->DatosCuadroAsId->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion, $objLocalizacion->IdLocalizacion ),
                QQ::Clause(QQ::Distinct(), // solo uno por QQN::DefinicionPagina()->IdDefinicionPagina
                           QQ::OrderBy(QQN::DefinicionPagina()->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto, QQN::DefinicionPagina()->Numero),
                           QQ::Expand(QQN::DefinicionPagina()->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject))
                );
        self::$arrNavegacionPagina = array();
        foreach($arrDefinicionPaginas as $objDefinicionPagina) {
            $strNombreCorto = $objDefinicionPagina->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto;
            if(!array_key_exists($strNombreCorto,self::$arrNavegacionPagina)) {
              self::$arrNavegacionPagina[$strNombreCorto] = array(); 
            }
            self::$arrNavegacionPagina[$strNombreCorto] []= $objDefinicionPagina->IdDefinicionPagina;
        }
        //var_dump(self::$arrNavegacionPagina);
        //var_dump(self::$arrNavegacionCuadro);
        //TODO: Hacer muuucho mas lindo
        ////self::$arrNavegacionPagina = array();
        ////$result = QApplication::$Database[1]->Query("
        ////SELECT nombre_corto, definicion_pagina.id_definicion_pagina from datos_cuadro
        ////LEFT JOIN definicion_cuadro using(id_definicion_cuadro)
        ////LEFT JOIN defcuadro_defpagina using(id_definicion_cuadro)
        ////LEFT JOIN definicion_pagina using(id_definicion_pagina)
        ////LEFT JOIN definicion_capitulo using(id_definicion_capitulo)
        ////LEFT JOIN definicion_cuadernillo using(id_definicion_cuadernillo) -- nombre_corto
        ////LEFT JOIN datos_cuadernillo using(id_definicion_cuadernillo)      -- id_localizacion
        ////WHERE id_localizacion = ".$objLocalizacion->IdLocalizacion."
        ////GROUP BY nombre_corto, definicion_pagina.id_definicion_pagina, definicion_pagina.numero
        ////ORDER BY nombre_corto, definicion_pagina.numero;");
        ////foreach($foo = $result->FetchAll() as $row) {
        ////    if(!array_key_exists($row["nombre_corto"],self::$arrNavegacionPagina)) {
        ////      self::$arrNavegacionPagina[$row["nombre_corto"]] = array(); 
        ////    }
        ////    self::$arrNavegacionPagina[$row["nombre_corto"]] []= $row["id_definicion_pagina"];
        ////}
				////var_dump(self::$arrNavegacionPagina['celeste']);
        self::SetSessionVar(self::NAV_PAGINA, serialize(self::$arrNavegacionPagina));

    }



}

?>