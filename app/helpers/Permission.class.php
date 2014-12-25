<?php
abstract class Permission extends PermissionBase {
/*
    public static function GetCueanexos() {
        if (!Authentication::EstaConectado())
            return array(QControllerActionType::AllAction);
        $arrCueanexoReturn = array();
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        foreach ($arrUsuarioInfo['Entidades']['Localizacion']['cueanexo'] as $strAction => $arrCueanexo) {
            foreach ($arrCueanexo as $strCueanexo)
                array_push ($arrCueanexoReturn, (string)$strCueanexo);
        }
        return $arrCueanexoReturn;
    }
    public static function EsSupervisor() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return array_key_exists('Perfiles', $arrUsuarioInfo) && is_array( $arrUsuarioInfo['Perfiles'] ) && in_array('Supervisor', $arrUsuarioInfo['Perfiles']);
    }

    public static function EsSupervisorDeLocalizacion($intIdLocalizacion) {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return (isset($arrUsuarioInfo['PerfilesLocalizaciones'][$intIdLocalizacion]) && in_array('Supervisor', $arrUsuarioInfo['PerfilesLocalizaciones'][$intIdLocalizacion]));
    }
    public static function EsOperador() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return array_key_exists('Perfiles', $arrUsuarioInfo) && is_array( $arrUsuarioInfo['Perfiles'] ) && in_array('Operador', $arrUsuarioInfo['Perfiles']);
    }
    public static function EsPersonal() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return array_key_exists('Perfiles', $arrUsuarioInfo) && is_array( $arrUsuarioInfo['Perfiles'] ) && in_array('Personal', $arrUsuarioInfo['Perfiles']);
    }

    public static function EsDirectorEstablecimiento($intIdEstablcimiento) {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return (isset($arrUsuarioInfo['PerfilesEstablecimiento'][$intIdEstablcimiento]) && in_array('Director', $arrUsuarioInfo['PerfilesEstablecimiento'][$intIdEstablcimiento]));
    }






*/
    public static function LoadPerfilUsuario() {
        $arrUsuarioInfo = array();
//        $arrUsuarioInfo['IdPersonal'] = Authentication::$objUsuarioLocal->IdPersonal;
//        $objPersonal = Authentication::$objUsuarioLocal->IdPersonalObject;
        $arrUsuarioInfo["Nombre"] = sprintf('%s %s', $objPersonal->Nombre, $objPersonal->Apellido);
        $arrUsuarioInfo['Perfiles'][] = Authentication::$objUsuarioLocal->IdPerfilObject->Nombre;
        if (Authentication::$objUsuarioLocal->SuperAdmin) {
            $arrUsuarioInfo["Perfiles"] = array("Administrador");
        }
        $arrUsuarioInfo["Email"] = Authentication::$objUsuarioLocal->Email;
        //$arrUsuarioInfo["IdPersonal"] = Authentication::$objUsuarioLocal->IdPersonal;
        $arrUsuarioInfo["IdUsuario"] = Authentication::$objUsuarioLocal->IdUsuario;
        $arrUsuarioInfo["Cuit"] = $objPersonal->Cuit;
        $arrUsuarioInfo["NombreUsuario"] = Authentication::$objUsuarioLocal->Nombre;
        self::$arrUsuarioInfo = $arrUsuarioInfo;
        Session::setObjUsuario(Authentication::$objUsuarioLocal);
        Session::SetUsuario(self::$arrUsuarioInfo);
        return true;
    }

    public static function UpdatePerfilUsuario() {
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        $objUsuario = Usuario::Load($arrUsuarioInfo['IdUsuario']);
        $arrUsuarioInfo['Perfiles'][] = $objUsuario->IdPerfilObject->Nombre;
        if ($objUsuario->SuperAdmin) {
            $arrUsuarioInfo["Perfiles"][] = "Administrador";
        }
        self::$arrUsuarioInfo = $arrUsuarioInfo;
        Session::SetUsuario(self::$arrUsuarioInfo);
        return true;
    }

    public static function EsAdministrador() {
        // @TODO Quitar este hardocodeo
//        return Authentication::$objUsuarioLocal->SuperAdmin;
        //return (self::EsDirector() || parent::EsAdministrador());
        return parent::EsAdministrador();
    }

    public static function EsEditor() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return in_array('Editor', $arrUsuarioInfo['Perfiles']);
    }
    public static function EsCarga() {
        if (!Authentication::EstaConectado())
            return false;
        if(self::EsAdministrador()) return true;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return array_key_exists('Perfiles', $arrUsuarioInfo) && is_array( $arrUsuarioInfo['Perfiles'] ) && in_array('carga', $arrUsuarioInfo['Perfiles']);
    }
 
    public static function EsUsoInterno() {
        if (!Authentication::EstaConectado())
            return false;
        if(self::EsAdministrador()) return true;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return array_key_exists('Perfiles', $arrUsuarioInfo) && is_array( $arrUsuarioInfo['Perfiles'] ) && in_array('uso_interno', $arrUsuarioInfo['Perfiles']);
    }
    public static function EsVisualizadorGeneral() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return in_array('SoloLectura', $arrUsuarioInfo['Perfiles']) || in_array('visualizador_general', $arrUsuarioInfo['Perfiles']);
    }    
    public static function EsVisualizadorBasico() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return in_array('SoloLectura', $arrUsuarioInfo['Perfiles']) || in_array('visualizador_basico', $arrUsuarioInfo['Perfiles']);
    }    
    public static function EsVisualizador(){
        return self::EsVisualizadorBasico() || self::EsVisualizadorGeneral();
    }
    public static function PuedeEditar1A4(Folio $objFolio){  
        if(self::EsAdministrador()) return true;
        return !(self::EsVisualizador() || (self::EsCarga() && !in_array($objFolio->UsoInterno->EstadoFolio, array(EstadoFolio::CARGA,NULL))));
    }

    public static function PuedeAdjuntar(Folio $objFolio){
        return (self::EsUsoInterno() || (self::EsCarga() && $objFolio->UsoInterno->EstadoFolio == EstadoFolio::CARGA));
    }
    public static function PuedeVerAdjuntados(Folio $objFolio){
        return !(self::EsVisualizadorBasico());
    }

    public static function PuedeBorrarFolio(Folio $objFolio){
        return (self::EsAdministrador() || (self::EsCarga() && $objFolio->UsoInterno->EstadoFolio == EstadoFolio::CARGA));
    }
    public static function PuedeConfirmarFolio(Folio $objFolio){
        return (self::EsCarga());
    }
    public static function PuedeEnviarFolio(Folio $objFolio){
        return ((self::EsAdministrador() || self::EsCarga()) && self::InscripcionProvisoria($objFolio));
    }
    public static function InscripcionProvisoria(Folio $objFolio){
          try {
            $id=$objFolio->Id;
            $strQuery = "select f.id from folio f 
                        join infraestructura i on f.id=i.id_folio
                        join nomenclatura n on f.id=n.id_folio 
                        where f.tipo_barrio > 0 and f.creador > 0 and f.id_partido > 0 and f.matricula <> ''
                        and f.nombre_barrio_oficial <> '' and f.anio_origen <> '' and f.superficie <> ''
                        and f.cantidad_familias > 0
                        and i.energia_electrica_medidor_individual < 4 and
                          i.agua_corriente < 4 and
                          i.red_cloacal <4 and
                          i.red_gas <4 and
                          i.pavimento <4
                          and ((n.partido <> '' and n.circ <> '' and n.parc <> '') or
                        (n.partido <> '' and n.circ <> '' and n.secc <> '') or
                        (n.partido <> '' and n.circ <> '' and n.secc <> ''  and n.chac_quinta <> '') or
                        (n.partido <> '' and n.circ <> '' and n.secc <> '' and n.frac <> ''))
                          
                        and f.id=$id";
            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $row = $objDbResult->FetchArray();            
            return (count($row)>0 && $row['id']==$id);          
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Error al determinar si el Folio esta habilitado para enviarse</p>");
            // mandar mail
            error_log($e);
        }
        $this->actualizarEstadoNomenclaturas();
                               
      
    }









    public static function GetPerfilesUsuario(Usuario $objUsuario) {
        $arrUsuarioInfo = null;
        return array($objUsuario->IdPerfil => $objUsuario->IdPerfilObject->Nombre);
    }

    public static function DirectorTieneEstablecimiento($objEstablecimiento) {
        if (!$objEstablecimiento)
            return false;
        return in_array($objEstablecimiento->Cue, Permission::GetCues());
    }

    public static function TienePermisoControllerAction($strController, $strAction) {
        if(Permission::EsSupervisor()) return true;
        switch ($strController) {
            case 'Fichaescuela':
                if(Permission::EsDirector()) return true;
                break;
            case 'Carga':
                if (Permission::EsEditor()) return true;
                if ((Permission::EsDirector() || Permission::EsInspector()) && Permission::DirectorTieneLocalizacion(Session::getLocalizacion())) return true;            
                break;
            case 'Localizacion':
                if ($strAction == 'Index') return true;
                if (Permission::EsEditor()) return true;
                if ((Permission::EsDirector() || Permission::EsInspector()) && Permission::DirectorTieneLocalizacion(Localizacion::Load(DispatchHelper::$intId))) return true;
                break;
            case 'Estadistica':
                if (!Permission::EsDirector()) return true;
                break;
            case 'Usuario':
                if ($strAction == 'Password') return true;
                break;
            case 'Lector':
                if (Permission::EsEditor()) return true;
                break;
            case 'Datoscuadernillo':
                if (($strAction == 'Verificar' || $strAction == 'Constancia' ) && (Permission::EsInspector() || Permission::EsDirector() || Permission::EsEditor())) return true;
                break;
        }
        if(Permission::EsEditor()) return true;
        // existe el perfil inspector-sololectura que si llegó hasta acá es porque entro a algún lugar que no puede ver. el perfil sololectura puede ver todo, pero solo ver
        if(Permission::EsSoloLectura() && !Permission::EsInspector()) return true;
        return false;
    }

    public static function GetRecursosUsuarioRa($strUsuario) {
        $arrControladores = null;
        $arrControladores['Definicioncuadro'][QControllerActionType::AllAction] = array();
        $arrControladores['Defcuadrodefcolumnacodvalor'][QControllerActionType::AllAction] = array();
        $arrControladores['Codigos'][QControllerActionType::AllAction] = array();
        switch ($strUsuario) {
            case 'supervisor':
                array_push($arrControladores['Defcuadrodefcolumnacodvalor'][QControllerActionType::AllAction], QControllerActionType::AllAction);
                array_push($arrControladores['Definicioncuadro'][QControllerActionType::AllAction], QControllerActionType::AllAction);
                array_push($arrControladores['Codigos'][QControllerActionType::AllAction], QControllerActionType::AllAction);
            break;
        }
        return $arrControladores;
    }

    public static function GetEntidadesUsuario(Usuario $objUsuario) {
        switch (strtolower($objUsuario->IdPerfilObject->Nombre)) {
            case 'supervisor':
            case 'sololectura':
            case 'editor':
                $arrControladores['Localizacion']['cueanexo'][QControllerActionType::AllAction] = array(QControllerActionType::AllAction);
            break;
            case 'inspector':
            case 'director':
            case 'inspectorsololectura':
                $objLocArray = $objUsuario->GetLocalizacionArray();
                $arrControladores['Localizacion']['cueanexo'][QControllerActionType::AllAction] = array();
                foreach ($objLocArray as $objLocalizacion) {
                    array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::AllAction], $objLocalizacion->Cueanexo);
                }
            break;
        }
        return $arrControladores;
    }

    public static function GetEntidadesUsuarioRa($strUsuario) {
        $arrControladores['Localizacion']['cueanexo'][QControllerActionType::ViewAction] = array();
        $arrControladores['Localizacion']['cueanexo'][QControllerActionType::EditAction] = array();
        $arrControladores['Localizacion']['cueanexo'][QControllerActionType::AllAction] = array();
        switch ($strUsuario) {
            case 'supervisor':
            case 'sololectura':
                array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::AllAction], QControllerActionType::AllAction);
            break;
            case 'usuario1':
                array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::ViewAction], 920001500);
                array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::EditAction], 920001500);
                array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::ViewAction], 910012400);
                array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::EditAction], 910012400);
            break;
            case 'usuario2':
                array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::ViewAction], QControllerActionType::AllAction);
                //array_push($arrControladores['Localizacion']['cueanexo'][QControllerActionType::EditAction], 920001500);
            break;
        }
        return $arrControladores;
    }


    public static function TienePermisoControllerActionColumna($strController, $strAction, $strColumna) {
        if (!Authentication::UsuarioLogueado() || self::EsAdministrador()) {
            return true;
        }
        $arrUsuarioInfo = Permission::GetPermisosUsuario();

        return (
        isset($arrUsuarioInfo["Recursos"]) &&
        isset($arrUsuarioInfo["Recursos"][$strController]) &&
        isset($arrUsuarioInfo["Recursos"][$strController][$strAction]) &&
        (in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Recursos"][$strController][$strAction]) ||
        in_array($strColumna, $arrUsuarioInfo["Recursos"][$strController][$strAction])
        )
        ) || (
        isset($arrUsuarioInfo["Recursos"]) &&
        isset($arrUsuarioInfo["Recursos"][QControllerActionType::AllAction]) &&
        isset($arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][QControllerActionType::AllAction]) &&
        (in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][QControllerActionType::AllAction]) ||
        in_array($strColumna, $arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][QControllerActionType::AllAction])
        )
        ) || (
        isset($arrUsuarioInfo["Recursos"]) &&
        isset($arrUsuarioInfo["Recursos"][$strController]) &&
        isset($arrUsuarioInfo["Recursos"][$strController][QControllerActionType::AllAction]) &&
        (in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Recursos"][$strController][QControllerActionType::AllAction]) ||
        in_array($strColumna, $arrUsuarioInfo["Recursos"][$strController][QControllerActionType::AllAction])
        )
        ) || (
        isset($arrUsuarioInfo["Recursos"]) &&
        isset($arrUsuarioInfo["Recursos"][QControllerActionType::AllAction]) &&
        isset($arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][$strAction]) &&
        (in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][$strAction]) ||
        in_array($strColumna, $arrUsuarioInfo["Recursos"][QControllerActionType::AllAction][$strAction])
        )
        );
    }

    public static function TieneAccesoEntidad($strController, $strColumna, $strAction, $mixValor) {
        if (!Authentication::UsuarioLogueado() || self::EsAdministrador()) {
            return true;
        }

        $arrUsuarioInfo = Permission::GetPermisosUsuario();

        return (
        isset($arrUsuarioInfo["Entidades"]) &&
        isset($arrUsuarioInfo["Entidades"][$strController]) &&
        isset($arrUsuarioInfo["Entidades"][$strController][$strColumna]) &&
        isset($arrUsuarioInfo["Entidades"][$strController][$strColumna][$strAction]) &&
        is_array($arrUsuarioInfo["Entidades"][$strController][$strColumna][$strAction]) &&
        (in_array($mixValor, $arrUsuarioInfo["Entidades"][$strController][$strColumna][$strAction]) ||
        in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Entidades"][$strController][$strColumna][$strAction])
        )
        ) || (
        isset($arrUsuarioInfo["Entidades"][QControllerActionType::AllAction]) &&
        isset($arrUsuarioInfo["Entidades"][QControllerActionType::AllAction][QControllerActionType::AllAction]) &&
        isset($arrUsuarioInfo["Entidades"][QControllerActionType::AllAction][QControllerActionType::AllAction][$strAction]) &&
        is_array($arrUsuarioInfo["Entidades"][QControllerActionType::AllAction][QControllerActionType::AllAction][$strAction]) &&
        (in_array($mixValor, $arrUsuarioInfo["Entidades"][QControllerActionType::AllAction][QControllerActionType::AllAction][$strAction]) ||
        in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Entidades"][QControllerActionType::AllAction][QControllerActionType::AllAction][$strAction])
        )
        ) || (
        isset($arrUsuarioInfo["Entidades"][$strController]) &&
        isset($arrUsuarioInfo["Entidades"][$strController][QControllerActionType::AllAction]) &&
        isset($arrUsuarioInfo["Entidades"][$strController][QControllerActionType::AllAction][$strAction]) &&
        is_array($arrUsuarioInfo["Entidades"][$strController][QControllerActionType::AllAction][$strAction]) &&
        (in_array($mixValor, $arrUsuarioInfo["Entidades"][$strController][QControllerActionType::AllAction][$strAction]) ||
        in_array(QControllerActionType::AllAction, $arrUsuarioInfo["Entidades"][$strController][QControllerActionType::AllAction][$strAction])
        )
        );
    }

    public static function GetAccionColumnas($strEntidad, $strAccion) {
        if (self::EsAdministrador())
            return array();
        $arrColumnas = array();
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        if (isset($arrUsuarioInfo["Recursos"])) {
            $arrUsuarioRecursos = $arrUsuarioInfo["Recursos"];
            if (in_array(QControllerActionType::AllAction, array_keys($arrUsuarioRecursos))) {
                return array();
            }
            if (isset($arrUsuarioRecursos[$strEntidad]) && isset($arrUsuarioRecursos[$strEntidad][$strAccion]) && is_array($arrUsuarioRecursos[$strEntidad][$strAccion])) {
                if (in_array(QControllerActionType::AllAction, $arrUsuarioRecursos[$strEntidad][$strAccion])) {
                    return array();
                }
                foreach ($arrUsuarioRecursos[$strEntidad][$strAccion] as $strColumna) {
                    array_push($arrColumnas, $strColumna);
                }
            }
        }
        return $arrColumnas;
    }
}
?>
