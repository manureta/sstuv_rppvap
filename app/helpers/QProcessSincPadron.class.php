<?php
class QProcessSincPadron extends QProcess {
  public $Tablas;
  public $Columnas;

  public function __construct() {
    $this->objQProcessState = QProcessSincPadronState::Get();
    $this->Tablas = array(
        'responsable'=>"",
        'establecimiento'=>"",
        'localizacion'=>"",
        'oferta_local'=>"",
        'plan_estudio_local'=>"",
        'plan_estudio_local_secundaria'=>"",
        'plan_estudio_local_superior'=>""
    );

    $this->Columnas = array(
        'responsable'=>array("id_responsable", "nombre", "telefono", "nro_documento", "c_tipo_documento", "email", "fecha_sistema"),
        'establecimiento'=>array("id_establecimiento", "cue", "nombre", "c_sector", "c_dependencia", "fecha_creacion", "c_confesional", "c_arancelado", "c_categoria", "id_responsable", "fecha_sistema", "c_estado"),
        'localizacion'=>array("id_localizacion", "id_establecimiento", "anexo", "c_ambito", "nombre", "telefono", "telefono_cod_area", "c_alternancia", "c_per_funcionamiento", "email", "sitio_web", "c_cooperadora", "id_responsable", "sede", "c_permanencia", "sede_administrativa", "observaciones", "fecha_sistema", "c_estado"),
        'oferta_local'=>array("id_oferta_local", "id_localizacion", "c_oferta", "c_estado", "c_subvencion", "fecha_creacion", "c_jornada", "fecha_sistema"),
        'plan_estudio_local'=>array("id_plan_estudio_local", "id_oferta_local", "c_titulo_oferta", "duracion", "c_requisito", "fecha_sistema", "c_duracion_en", "c_condicion", "c_norma", "norma_nro", "norma_anio", "c_dictado"),
        'plan_estudio_local_secundaria'=>array(),
        'plan_estudio_local_superior'=>array()
    );

    //$this->objQProcessState->Estado = 'inicio';
    //$this->objQProcessState->TotalTablas = count($this->Tablas);
    //$this->objQProcessState->DoneTablas = 0;
    //$this->objQProcessState->RunningTablas = 0;
    //$this->objQProcessState->arrErrors = array();
    //$this->objQProcessState->Save();
  }

  public function FiltrarTablas(){
    throw new Exception("todavia no se usa esto, cuando se use ver la fecha de ultima modificacion de la tabla en cuestion de padron");
//    foreach($this->Tablas as $key => $strTabla){
//        $objTablaState = QProcessSincTablaPadronState::Get($key,$strTabla,true);
//        try{
//
//        }catch(Exception $e){
//
//        }
//    }
  }

  private function TruncateSchemaOLTP(){
      $objDataBase = QApplication::$Database[2];
      $objDataBase->NonQuery('truncate table ra2011.responsable cascade');

  }

  public function Work() {
    set_time_limit(0);
    $this->objQProcessState->Estado = 'run';
    $this->objQProcessState->Tablas = $this->Tablas;
    $this->objQProcessState->TotalTablas = count($this->Tablas);
    $this->objQProcessState->DoneTablas = 0;
    $this->objQProcessState->RunningTablas = 0;
    $this->objQProcessState->arrErrors = array();
    $this->objQProcessState->arrToProc = array();
    foreach($this->Tablas as $tabla => $insert) {
      array_push($this->objQProcessState->arrToProc, new QProcessSincTablaPadron($tabla,$insert,$this->Columnas[$tabla]));
    }
    $this->objQProcessState->arrProcRunning = array();
    $this->objQProcessState->arrFinished = array();
    $this->objQProcessState->Save();
    LogHelper::Log("Iniciando proceso de sinc padron");
    LogHelper::Log("a traer del padron: " . implode(',',array_keys ($this->Tablas)));

    $this->TruncateSchemaOLTP();

    $bailout = false;

    

    // loop que asegura que se procesen todas las tablas y/o
    // se consuman todas las que están procensandose
    while ((count($this->objQProcessState->arrToProc) > 0 && !$bailout)
           || count($this->objQProcessState->arrProcRunning) > 0) {

      // loop que alimenta la cola de procesos corriendo
      while ((!$bailout) &&
             count($this->objQProcessState->arrProcRunning) < 1 &&
             count($this->objQProcessState->arrToProc) > 0) {
        $QProc = array_shift($this->objQProcessState->arrToProc);
        array_push($this->objQProcessState->arrProcRunning, $QProc);
        $QProc->Run();
		    $this->objQProcessState->RunningTablas++;
        $this->objQProcessState->Save();
      }

      sleep(3); // da algo de tiempo para que los proceso spawneados arriba inicializen su estado

      // loop que consume los procesos corriendo cuando hayan terminado
      foreach($this->objQProcessState->arrProcRunning as $k=>$objProcMigrar) {
        $objProcMigrar->UpdateState();
        switch($objProcMigrar->ProcessState->Estado) {
          case 'err':
            array_push($this->objQProcessState->arrErrors,$objProcMigrar->ProcessState->Error);
            $bailout = true; // hubo algun error asi que necesito salir sin procesar mas tablas
            // fall trough
          case 'fin':
            $this->objQProcessState->DoneTablas++;
            $this->objQProcessState->RunningTablas--;
            array_push($this->objQProcessState->arrFinished, $objProcMigrar);
            $this->objQProcessState->arrProcRunning[$k] = null;
            unset($this->objQProcessState->arrProcRunning[$k]);
            $this->objQProcessState->Save();
            break;
          default:
            break;
        }
      }
    }

    if($bailout) { // hubo un error por lo que no se procesaron todas las tablas
      $this->objQProcessState->Estado = 'err';
      $this->objQProcessState->Save();
    } else {
      $this->objQProcessState->objQProcGenerarModelo = new QProcessModeloGenerador();
      try {
        $this->objQProcessState->Estado = 'generando modelo';
        $this->objQProcessState->Save();
        $this->objQProcessState->objQProcGenerarModelo->Run();

        do{
            sleep(3);
            $objProcessState = QProcessModeloGeneradorState::Get("Generar");
        }while($objProcessState->Estado != 'fin' && $objProcessState->Estado != 'error');

        if($objProcessState->Estado == 'error')  throw new Exception($objProcessState->Error);

        LogHelper::Log(sprintf("Fin proceso de traer datos del padron : %d/%d tablas", $this->objQProcessState->DoneTablas, $this->objQProcessState->TotalTablas));
        $this->objQProcessState->Estado = 'fin';
        $this->objQProcessState->Save();
      } catch (Exception $e) {
        $this->objQProcessState->Estado = 'err';
        array_push($this->objQProcessState->arrErrors, $this->objQProcessState->objQProcGenerarModelo->objQProcessState->Error);
        $this->objQProcessState->Save();
      }
    }
    }
    
  public function Check($strDbfPath=null, $dbConn=null) {

      //throw new Exception("No esta Implementado");
//    if($dbConn== null) {
//      $dbConn = QApplication::$Database[1];
//    }
//    if((!defined('__DBF_MAESTRO_PATH__') || __DBF_MAESTRO_PATH__ == null) && $strDbfPath == null) {
//      throw new Exception('La ruta a los DBFs no se encuentra configurada, por favor seleccionela a continuación');
//    }
//    try {
//      foreach($this->Tablas as $t) {
//        if($strDbfPath) {
//          new TablaDbf($t, $dbConn, $strDbfPath);
//        } else {
//          new TablaDbf($t, $dbConn);
//        }
//      }
//    } catch (Exception $e) {
//      LogHelper::Log("ERROR en QProcessMigrar::Check(): ".$e->getMessage());
//      throw $e;;
//    }


    //Check Provincia
//    if($strDbfPath) {
//      $objRmaes = new TablaDbf('r_maes', $dbConn, $strDbfPath);
//    } else {
//      $objRmaes = new TablaDbf('r_maes', $dbConn);
//    }
//    TestingHelper::TestDbfProvincia($objRmaes, __COD_PROV__);
  }

  public static function IsRunning() {
    $objState = QProcessSincPadronState::Load("sincpadron".__COD_PROV__);
    //LogHelper::Log(var_export($objState->Estado,true));
    if($objState && ($objState->Estado == 'run' || $objState->Estado == 'run scripts'))
      return true;
    return false;
  }

  public function __wakeup() {
    $this->objQProcessState = QProcessSincPadronState::Get();
  }
}


class QProcessSincPadronState extends QProcessStatePersistFile {
  public $Tablas;
  public $Estado;
  public $TotalTablas;
  public $DoneTablas;
  public $RunningTablas;
  public $arrToProc;
  public $arrProcRunning;
  public $arrFinished;
  public $arrErrors = array();
  public $objQProcGenerarModelo;


  public function __construct($strProcessid) {
    try {
      parent::__construct($strProcessid);
    } catch (QCallerException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
    }
    //$this->strProcessid = "sincpadron".__COD_PROV__;
  }

  public static function Get() {
      $objRet = QProcessSincPadronState::Load("sincpadron".__COD_PROV__);
    if(!$objRet) {
        $objRet = new QProcessSincPadronState("sincpadron".__COD_PROV__);
        $objRet->Save();
    }
    return $objRet;
  }
}
?>
