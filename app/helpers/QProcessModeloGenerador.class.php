<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Equiparador
 *
 * @author jose
 */
class QProcessModeloGenerador extends QProcess{
    public static $SaveStatePeriod = 2.000; // seconds with microseconds

    protected $DB2;
    public function  __construct() {
        $this->objQProcessState = QProcessModeloGeneradorState::Get("Generar");
    }
    public function TraerLocalizaciones($intOffset){
        return OLTPLocalizacion::LoadAll(QQ::Clause(QQ::OrderBy(QQN::OLTPLocalizacion()->IdLocalizacion), QQ::LimitInfo(200, $intOffset)));
        /*$DBResult = $this->DB2->Query("select id_localizacion,l.nombre,'1' as c_estado, cue||anexo as cueanexo  from localizacion l inner join establecimiento using (id_establecimiento)where id_localizacion in
(select distinct id_localizacion from oferta_local where c_oferta <> 999);");
        return Localizacion::InstantiateDbResult($DBResult);*/
    }

    public function ContarLocalizaciones(){
        return OLTPLocalizacion::CountAll();
    }
    public function TraerOfertasLocales(){
        $DBResult = $this->DB2->Query("select * from oferta_local where c_oferta <> 999;");
        return OfertaLocal::InstantiateDbResult($DBResult);
    }
    public function TraerEstablecimientos(){
        $DBResult = $this->DB2->Query("select * from establecimiento;");
        return Establecimiento::InstantiateDbResult($DBResult);
    }
    public function TraerPlanEstudioLocales(){
        $DBResult = $this->DB2->Query("select * from plan_estudio_local;");
        return PlanEstudioLocal::InstantiateDbResult($DBResult);
    }

    public function InsertarOfertas(){
        $result = $this->TraerOfertasLocales();
        self::InsertObjectArray($result);
    }
    public function InsertarEstablecimientos(){
        $result = $this->TraerEstablecimientos();
        self::InsertObjectArray($result);
    }
    public function InsertarPlanEstudioLocales(){
        $result = $this->TraerPlanEstudioLocales();
        self::InsertObjectArray($result);
    }
    private static function InsertObjectArray($objArray = array()){
        foreach ($objArray as $key => $value) {
            $value->Save(true);
            $result[$key]=null;

        }
    }

    public function work(){
        try{

        $this->objQProcessState->Total = 1;
        $this->objQProcessState->Done = 0;
        $this->objQProcessState->PrecargaTotal = 1;
        $this->objQProcessState->PrecargaDone = 0;
        $this->objQProcessState->Estado = "Borrando Modelo";
        LogHelper::Debug($this->objQProcessState->Estado);
        $this->objQProcessState->Save();

        $this->DB2 = QApplication::$Database[2];
        //$this->DB2->NonQuery("set search_path to ra2011;");
        Localizacion::Truncate(true);

        //$this->objQProcessState->Estado = "Registrando Establecimientos";
        //LogHelper::Log($this->objQProcessState->Estado);
        //$this->objQProcessState->Save();
        //$this->InsertarEstablecimientos();

        //$this->objQProcessState->Estado = "Registrando Localizaciones";
        //LogHelper::Debug($this->objQProcessState->Estado);
        //$this->objQProcessState->Save();
        //$objLocalizacionArray = $this->TraerLocalizaciones();
        //foreach ($objLocalizacionArray as $objLocalizacion) {
        //    Localizacion::InsertPreparedFromOLTP($objLocalizacion);
        //}

        //$this->objQProcessState->Estado = "Registrando Ofertas";
        //LogHelper::Log($this->objQProcessState->Estado);
        //$this->objQProcessState->Save();
        //$this->InsertarOfertas();

        //$this->objQProcessState->Estado = "Registrando Titulos";
        //LogHelper::Log($this->objQProcessState->Estado);
        //$this->objQProcessState->Save();
        //$this->InsertarPlanEstudioLocales();

        $this->objQProcessState->Estado = "Creando Cuadernillos";
        LogHelper::Debug($this->objQProcessState->Estado);
        $intTotalLocalizaciones = $this->ContarLocalizaciones();
        $this->objQProcessState->Total = $intTotalLocalizaciones;
        $this->objQProcessState->Save();
        $offLocalizaciones = 0;
        $time_start = microtime(true);
        $time_last = $time_start;
        while($intTotalLocalizaciones > $offLocalizaciones && $arrLocalizaciones = $this->TraerLocalizaciones($offLocalizaciones)) {
            $offLocalizaciones += count($arrLocalizaciones);
            foreach($arrLocalizaciones as $objLocalizacion) {
                if($objLocalizacion->CEstado == OLTPEstadoTipo::Baja){
                    LogHelper::Debug("Salteando {$objLocalizacion->Cueanexo} de baja");
                    $this->objQProcessState->Done++;
                    continue;
                    
                }
                LogHelper::Debug("Creando para ".$objLocalizacion->Cueanexo);
                MapaCuadros::GenerarDatosCuadro($objLocalizacion);
                $this->objQProcessState->Estado = 'run';
                $this->objQProcessState->Done++;
                $time_now = microtime(true);
                if ($time_now - $time_last > QProcessModeloGenerador::$SaveStatePeriod) {
                    $this->objQProcessState->Save();
                    $time_last = $time_now;
                }
            }
        }
        /*

        La precarga de cuadros no se efectúa más en la inicialización

        $this->objQProcessState->Estado = "Precargando Cuadro 3";
        LogHelper::Debug($this->objQProcessState->Estado);
        $intTotalLocalizaciones = Localizacion::QueryCount(QQ::Equal(QQN::Localizacion()->DatosCuadernilloAsId->DatosCapituloAsId->DatosCuadroAsId->IdDefinicionCuadro, 157));
        $this->objQProcessState->PrecargaTotal = $intTotalLocalizaciones;
        $this->objQProcessState->Save();
        $time_start = microtime(true);
        $time_last = $time_start;
        $offLocalizaciones = 0;
        while($intTotalLocalizaciones > $offLocalizaciones && $arrLocalizaciones = Localizacion::QueryArray(QQ::Equal(QQN::Localizacion()->DatosCuadernilloAsId->DatosCapituloAsId->DatosCuadroAsId->IdDefinicionCuadro, 157), QQ::Clause(QQ::OrderBy(QQN::Localizacion()->IdLocalizacion), QQ::LimitInfo(200, $offLocalizaciones)))) {
            $offLocalizaciones += count($arrLocalizaciones);
            foreach($arrLocalizaciones as $objLocalizacion) {
                PrecargaCuadroHelper::PrecargarCuadro3($objLocalizacion);
                $this->objQProcessState->PrecargaDone++;
                $time_now = microtime(true);
                if ($time_now - $time_last > QProcessModeloGenerador::$SaveStatePeriod) {
                    $this->objQProcessState->Save();
                    $time_last = $time_now;
                }
            }
        }
        */
        $this->objQProcessState->Estado = "fin";
        LogHelper::Debug($this->objQProcessState->Estado);
        $this->objQProcessState->Save();
        }catch(Exception $e){
            LogHelper::Log($e->getMessage());
            $this->objQProcessState->Error = $e->getMessage();
            $this->objQProcessState->Estado = "error";
            LogHelper::Debug($this->objQProcessState->Estado);
            $this->objQProcessState->Save();
        }

        $this->DB2 = null;
    }
    
    public function Run(){
        LogHelper::Debug($this->GetUri());
        parent::Run();
    }

  public function __wakeup() {
    $this->objQProcessState = QProcessModeloGeneradorState::Get("Generar");
  }
}


class QProcessModeloGeneradorState extends QProcessStatePersistFile {

 public $Done;
 public $Total;
 public $PrecargaDone;
 public $PrecargaTotal;
 public $Estado;
 public $Error;
    
  public function  __construct($strProcessid) {
        try {
          parent::__construct("sincpadronModelo".$strProcessid.__COD_PROV__);
        } catch (QCallerException $objExc) {
          $objExc->IncrementOffset();
          throw $objExc;
        }
    }
    
  public static function Get($strid,$blnOnlyCheckOnce=false) {
    if($blnOnlyCheckOnce)
        $objRet = self::Load("sincpadronModelo".$strid.__COD_PROV__,1);
    else
        $objRet = self::Load("sincpadronModelo".$strid.__COD_PROV__);
    if(!$objRet) {
        //LogHelper::Log('creando sinctablapadron'.$strTabla);
        return new QProcessModeloGeneradorState($strid);
    }
    return $objRet;
  }
}
?>
