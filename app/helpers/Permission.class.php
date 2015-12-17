<?php
abstract class Permission extends PermissionBase {

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
        $arrUsuarioInfo["SuperAdmin"] = Authentication::$objUsuarioLocal->SuperAdmin;
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

    public static function EsSuperAdministrador(){
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        $objUsuario = Usuario::Load($arrUsuarioInfo['IdUsuario']);
        return (parent::EsAdministrador() && $objUsuario->SuperAdmin);
    }

    public static function EsAdministrador() {

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

    public static function EsUsoInterno($arrTipos) {

        if (!Authentication::EstaConectado())
            return false;
        if(self::EsAdministrador()) return true;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();

        if(array_key_exists('Perfiles', $arrUsuarioInfo)&&is_array( $arrUsuarioInfo['Perfiles'] )) {
            foreach ($arrTipos as $t) {
                if(in_array($t, $arrUsuarioInfo['Perfiles'])) {
                    return true;
                }
            }

        }  else{
            return false;
        }
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
    public static function EsVisualizadorIntermedio() {
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return in_array('SoloLectura', $arrUsuarioInfo['Perfiles']) || in_array('visualizador_intermedio', $arrUsuarioInfo['Perfiles']);
    }
    public static function EsVisualizador(){
        return self::EsVisualizadorBasico() || self::EsVisualizadorGeneral() || self::EsVisualizadorIntermedio();
    }

    public static function EsVisualizadorFiltrado(){
        return (self::EsVisualizador() && (Session::GetObjUsuario()->CodPartido!==""));
    }
    /*Originalmente eran solo 4 pestañas por eso el nombre,
    pero este es el metodo principal para controlar quien puede editar
    */
    public static function PuedeEditar1A4(Folio $objFolio){
        if(self::EsAdministrador()) return true;
        if(self::EsUsoInterno(array("uso_interno_legal","uso_interno_tecnico","uso_interno_social"))){
            //Puede ser uno de los folios creados por estos perfiles
            if(
                in_array($objFolio->UsoInterno->EstadoFolio, array(EstadoFolio::NECESITA_AUTORIZACION,NULL)) &&
               (
                self::EsCreador($objFolio) || !isset($objFolio->Creador)
               )
            )return true;
        }
        if(self::EsCargaExterna()) return self::EsCreador($objFolio);
        return !(self::EsVisualizador() ||
            self::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social","uso_interno_conflictos"))||
            (self::EsCarga() && !in_array($objFolio->UsoInterno->EstadoFolio, array(EstadoFolio::CARGA,NULL))));
    }

    public static function PuedeAdjuntar(Folio $objFolio){
        if(self::EsCargaExterna()) return self::EsCreador($objFolio);
        return (self::EsUsoInterno(array("uso_interno_expediente")) || (self::EsCarga() && $objFolio->UsoInterno->EstadoFolio == EstadoFolio::CARGA));
    }
    public static function SoloAdjuntaInformeUrbanistico(){
        return self::EsUsoInterno(array("uso_interno_tecnico"));
    }
    public static function PuedeAdjuntarHoja1(Folio $objFolio){
        return (self::EsAdministrador() || (self::EsCarga() && $objFolio->UsoInterno->EstadoFolio == EstadoFolio::CARGA)
            || self::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla"))
            || (self::EsCreador($objFolio) && in_array($objFolio->UsoInterno->EstadoFolio, array(EstadoFolio::NECESITA_AUTORIZACION,NULL)) && self::EsUsoInterno(array("uso_interno_legal","uso_interno_social","uso_interno_tecnico")))
            || (self::EsCargaExterna() && self::EsCreador($objFolio))
            );
    }
    public static function PuedeVerAdjuntados(Folio $objFolio){
        return !(self::EsVisualizadorBasico());
    }

    public static function PuedeBorrarFolio(Folio $objFolio){
        //error_log(count($objFolio->EvolucionFolio));
        if(self::EsSuperAdministrador())return true;
        // si tiene registros de evolucion ya no se puede borrar
         $cantEvolucion = EvolucionFolio::QueryCount(
            QQ::Equal(QQN::EvolucionFolio()->IdFolio, $objFolio->Id)
        );
        return (self::EsCarga() && $objFolio->UsoInterno->EstadoFolio == EstadoFolio::CARGA && $cantEvolucion==0);
    }
    public static function PuedeConfirmarFolio(Folio $objFolio){
        //quick fix
        if(Permission::EsAdministrador()&&!Permission::EsSuperAdministrador()) return false;
        return (self::EsCarga());
    }
    public static function PuedeEnviarFolio(Folio $objFolio){
        return ((self::EsAdministrador() || self::EsCarga()) && self::InscripcionProvisoria($objFolio));
    }
    public static function PuedeObjetarFolio(Folio $objFolio){
        //error_log($objFolio->CreadorObject->IdPerfilObject->IdPerfil);
        return ((self::EsAdministrador() || (self::EsCarga() && ($objFolio->CreadorObject->IdPerfilObject->IdPerfil==1) ) ));
    }
    public static function PuedeVerHoja5(){
        return Permission::EsAdministrador();
    }

    public static function PuedeVerPanelAdministracion(){
        //es el unico perfil que puede ver la solapa 5 que necesita este filtro
        return (!Permission::EsVisualizadorIntermedio());
    }

    public static function PuedeVerAdjuntadosHabitat(){
        return (!self::EsUsoInterno(array("uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social","uso_interno_conflictos")) && !self::EsVisualizadorIntermedio());
    }

    public static function PuedeVerAdjuntosInformeUrbanistico(){
        return (!self::EsCarga());
    }

    public static function PuedeVerNoCorrespondeInscripcion(){
        return (self::EsAdministrador() || self::EsVisualizadorGeneral() || self::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social","uso_interno_conflictos")));
    }


    public static function EsCargaExterna(){
        // se refere al perfin carga externa no municipal... que son los que duplican folios
        if (!Authentication::EstaConectado())
            return false;
        $arrUsuarioInfo = Permission::GetPermisosUsuario();
        return in_array('SoloLectura', $arrUsuarioInfo['Perfiles']) || in_array('carga_externa', $arrUsuarioInfo['Perfiles']);
    }

    public static function PuedeDuplicar(){
        return (self::EsAdministrador() || self::EsCargaExterna());
    }

    public static function EsDuplicado($strIdFolio){
    	return (Folio::load($strIdFolio)->UsoInterno->EstadoFolio==EstadoFolio::FOLIO_DUPLICADO);
    }

    public static function PuedeEditarExpropiaciones($objFolio){
        return (self::EsAdministrador() || self::EsSuperAdministrador() || self::EsUsoInterno(array("uso_interno_legal")) || self::PuedeEditar1A4($objFolio));

    }

    public static function EsCreador($objFolio){
        // metodo para saber si el usuario actual es el dueño/creador del folio
        return (in_array($objFolio->Creador, array(Session::GetObjUsuario()->IdUsuario,NULL)) );
    }

    public static function EsAutorComentario($objComentario){
        // metodo para saber si el usuario actual es el autor del coemntario
        return (in_array($objComentario->lstIdUsuarioObject->Value, array(Session::GetObjUsuario()->IdUsuario,NULL)) );
    }

    public static function PuedeVerComentarios(){
        return !(self::EsVisualizadorBasico());
    }

    public static function PuedeEditarCenso(){
      //EsUsoInterno tambien devuelve true si es admin
      return (self::EsUsoInterno(array("uso_interno_social")) );
    }

    public static function PuedeVerCenso(){
      //EsUsoInterno tambien devuelve true si es admin
      return (self::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social","uso_interno_conflictos")) );
    }

    public static function PuedeVerConflictos(){
      //EsUsoInterno tambien devuelve true si es admin
      return (self::EsUsoInterno(array("uso_interno_expediente","uso_interno_nomencla","uso_interno_legal","uso_interno_tecnico","uso_interno_social","uso_interno_conflictos")) );
    }

    public static function PuedeImprimirCertificado(){
      //EsUsoInterno tambien devuelve true si es admin
      return (self::PuedeVerCenso());
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
            $strQuery = "select distinct(f.id) from folio f
join infraestructura i on f.id=i.id_folio
join equipamiento e on f.id=e.id_folio
join regularizacion r on f.id=r.id_folio
join encuadre_legal l on f.id=l.id_folio
join situacion_ambiental s on f.id=s.id_folio
join antecedentes a on f.id=a.id_folio
join nomenclatura n on f.id=n.id_folio
join uso_interno u on f.id=u.id_folio
where f.tipo_barrio > 0 and f.creador > 0 and f.id_partido > 0 and f.matricula <> ''
and f.nombre_barrio_oficial <> '' and f.anio_origen <> '' and f.superficie <> 0
and f.cantidad_familias > 0
and i.energia_electrica_medidor_individual < 4 and
  i.agua_corriente < 5 and
  i.red_cloacal <5 and
  i.red_gas <5 and
  i.pavimento <5
and (n.partido <> '' and n.titular_dominio <> '')
and e.unidad_sanitaria < 6 and
  e.jardin_infantes < 6 and
  e.escuela_primaria < 6 and
  e.escuela_secundaria < 6
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

    public static function PuedeDescargarResolucion(Folio $objFolio){
        return (self::EsAdministrador() || $objFolio->UsoInterno->EstadoFolio == EstadoFolio::INSCRIPCION);

    }

    public static function PuedeDescargarLey14449(Folio $objFolio){
        return self::EsAdministrador();
    }

    public static function PuedeDescargarFolioCompleto(Folio $objFolio){
        return true; // todos pueden
    }

    public static function PuedeConsultarTripartito(){
        return true;
    }


    public static function Log($strMensaje){
        error_log($strMensaje);
    }



    public static function GetPerfilesUsuario(Usuario $objUsuario) {
        $arrUsuarioInfo = null;
        return array($objUsuario->IdPerfil => $objUsuario->IdPerfilObject->Nombre);
    }



    public static function TienePermisoControllerAction($strController, $strAction) {

    }

    public static function GetRecursosUsuarioRa($strUsuario) {

    }

    public static function GetEntidadesUsuario(Usuario $objUsuario) {

    }

    public static function GetEntidadesUsuarioRa($strUsuario) {

    }


    public static function TienePermisoControllerActionColumna($strController, $strAction, $strColumna) {

    }



    public static function GetAccionColumnas($strEntidad, $strAccion) {

    }
}
?>
