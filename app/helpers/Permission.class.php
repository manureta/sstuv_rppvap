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
        $arrUsuarioInfo["Nombre"] = sprintf('%s', Authentication::$objUsuarioLocal->NombreCompleto);
        $arrUsuarioInfo['Perfiles'][] = Authentication::$objUsuarioLocal->IdPerfilObject->Nombre;
        if (Authentication::$objUsuarioLocal->SuperAdmin) {
            $arrUsuarioInfo["Perfiles"] = array("Administrador");
        }
        $arrUsuarioInfo["Email"] = Authentication::$objUsuarioLocal->Email;
        //$arrUsuarioInfo["IdPersonal"] = Authentication::$objUsuarioLocal->IdPersonal;
        $arrUsuarioInfo["IdUsuario"] = Authentication::$objUsuarioLocal->IdUsuario;
        //$arrUsuarioInfo["Cuit"] = $objPersonal->Cuit;
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
            $strQuery = "select distinct(f.id) from folio f 
                        join infraestructura i on f.id=i.id_folio
                        join nomenclatura n on f.id=n.id_folio 
                        where f.tipo_barrio > 0 and f.creador > 0 and f.id_partido > 0 and f.matricula <> ''
                        and f.nombre_barrio_oficial <> '' and f.anio_origen <> '' and f.superficie >0
                        and f.cantidad_familias > 0
                        and i.energia_electrica_medidor_individual < 5 and
                          i.agua_corriente < 5 and
                          i.red_cloacal <5 and
                          i.red_gas <5 and
                          i.pavimento <5
                          and ((n.partido <> '' and n.circ <> '' and n.parc <> '') or
                        (n.partido <> '' and n.circ <> '' and n.secc <> '') or
                        (n.partido <> '' and n.circ <> '' and n.secc <> ''  and n.chac_quinta <> '') or
                        (n.partido <> '' and n.circ <> '' and n.secc <> '' and n.frac <> ''))
                          
                        and f.id=$id;";
            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $row = $objDbResult->FetchArray();            
            return (count($row)>0 && $row['id']==$id);          
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Error al determinar si el Folio esta habilitado para enviarse</p>");
            // mandar mail
            error_log($e);
        }
                                    
    }

    public static function InscripcionDefinitiva(Folio $objFolio){
          try {
            $id=$objFolio->Id;
            $strQuery = "select f.id from folio f 
            join infraestructura i on f.id=i.id_folio
            join equipamiento e on f.id=e.id_folio 
            join regularizacion r on f.id=r.id_folio 
            join encuadre_legal l on f.id=l.id_folio
            join situacion_ambiental s on f.id=s.id_folio  
            join antecedentes a on f.id=a.id_folio
            join nomenclatura n on f.id=n.id_folio
            join uso_interno u on f.id=u.id_folio
            where f.tipo_barrio > 0 and f.creador > 0 and f.id_partido > 0 and f.matricula <> ''
            and f.nombre_barrio_oficial <> '' and f.anio_origen <> '' and f.superficie > 0
            and f.cantidad_familias > 0  and f.tipo_barrio > 0
            and i.energia_electrica_medidor_individual < 4 and
              i.agua_corriente < 4 and
              i.red_cloacal <4 and
              i.red_gas <4 and
              i.pavimento <4
            and ((n.partido <> '' and n.circ <> '' and n.parc <> '') or
            (n.partido <> '' and n.circ <> '' and n.secc <> '') or
            (n.partido <> '' and n.circ <> '' and n.secc <> ''  and n.chac_quinta <> '') or
            (n.partido <> '' and n.circ <> '' and n.secc <> '' and n.frac <> ''))
            and e.unidad_sanitaria < 5 and
              e.jardin_infantes < 5 and
              e.escuela_primaria < 5 and   
              e.escuela_secundaria < 5  
            and r.proceso_iniciado=true and
             (l.decreto_2225_95=true or
             l.ley_24374=true or
             l.decreto_815_88=true or
             l.ley_23073=true or
             l.expropiacion <> '' or
             l.otros <> '' or
             l.ley_14449=true)
            and (s.sin_problemas = TRUE or
             s.reserva_electroducto = TRUE or
             s.inundable = TRUE OR
             s.sobre_terraplen_ferroviario = TRUE OR
             s.sobre_camino_sirga = TRUE or
             s.expuesto_contaminacion_industrial = TRUE OR
             s.sobre_suelo_degradado = TRUE OR
             s.otro <> '')
            and (a.sin_intervencion = TRUE or
             a.obras_infraestructura = TRUE or
             a.equipamientos = TRUE OR
             a.intervenciones_en_viviendas = TRUE OR
             a.otros <> '')
            and u.estado_folio=6
             and f.id=$id";
            $objDatabase = QApplication::$Database[1];
            $objDbResult = $objDatabase->Query($strQuery);
            $row = $objDbResult->FetchArray();            
            return (count($row)>0 && $row['id']==$id);          
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Error al determinar si el Folio esta habilitado para inscripcion definitiba</p>");
            // mandar mail
            error_log($e);
        }
                                    
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
        /*
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
        */
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

    


    
    
    
}
?>
