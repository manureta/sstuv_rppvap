<?php
class QProcessSincTablaPadron extends QProcess {
  public static $SaveStatePeriod = 2.000; // seconds with microseconds
  public $Tabla;

  
  protected $objInsertStatement;
  protected $objRowsArray;
  protected $strColumnasArray;
  protected $strSchema;


  public function __construct($strTabla, $strInsert, $strColumnasArray) {
    $this->objQProcessState = new QProcessSincTablaPadronState($strTabla);
    //throw new QCallerException(var_export($this->objQProcessState, true));
    $this->Tabla = $strTabla;
    
    $this->strSchema = $this->GetSchema();
    $this->strColumnasArray = $this->GetSqlColumnas();
    $this->objQProcessState->Insert = $this->GetSQLInsert();
    $this->objQProcessState->Estado = 'inicio';
    $this->objQProcessState->DoneRows = 0;
    $this->objQProcessState->Error = null;
    $this->objQProcessState->Save();
    
  }
  
  public function __get($strName) {
      switch($strName){
          case "objDataBaseOLTP":
              return QApplication::$Database[2];
          default:
              return parent::__get($strName);
      }
      
  }
  
  protected function GetSchema(){
    foreach ($this->objDataBaseOLTP->strSchemaArray as $strSchema) {
        if(strpos($strSchema, "ra")!==false){
                return  $strSchema;
        }
    }
    throw new QCallerException("no se encuentra el esquema ra de la Base OLTP");
  }
  
  protected function GetSqlColumnas() {
    $result = $this->objDataBaseOLTP->Query(
            "SELECT column_name as name,
            data_type as type
            FROM information_schema.COLUMNS
            WHERE table_schema='".$this->strSchema."' AND table_name = '".$this->Tabla."'");
    $resultArray = array();
    $ARRAY =  $result->FetchAll();
    foreach ($ARRAY as $array) {
        $resultArray[] = $array['name'];
    }
    return $resultArray;
  }
  
  public function GetSQLInsert(){
      $strParamsArray = array();
      
      foreach($this->strColumnasArray as $strColum){$strParamsArray[] = ":$strColum";}
      
      $strColumns = implode(",", $this->strColumnasArray);
      $strParams = implode(",", $strParamsArray );
      $strInsert = "INSERT INTO {$this->strSchema}.{$this->Tabla} ($strColumns) VALUES ($strParams)";
      LogHelper::Debug("Insert query para {$this->Tabla}:".$strInsert);
      return $strInsert;
  }

  public function PrepareStatement($strInsert){
    $this->objInsertStatement = $this->objDataBaseOLTP->PrepareStatement($this->objQProcessState->Insert);
  }


  public function InsertNextRow(){
    $result = $this->objRowsArray->GetNextRow();
    if($result){
       $ColumnNameArray = $result->GetColumnNameArray();
       

       foreach($this->strColumnasArray as $value){
           $index = ":$value";
           $bindValue = isset($ColumnNameArray[$value])?$ColumnNameArray[$value]:null;
           $this->objInsertStatement->bindValue($index,$bindValue);
       }
       $this->objDataBaseOLTP->NonQuery("", $this->objInsertStatement);
       return true;
    }
    return false;
  }

  public function Work() {
    try {
    set_time_limit(0);
    //if ($this->objQProcessState->Estado == 'fin' || $this->objQProcessState->Estado == 'error')
    LogHelper::Log(sprintf('trayendo datos de la tabla %s', $this->Tabla));

    
    $objDataBasePadron = QApplication::$Database[3];
    $objQPostgresResult = $objDataBasePadron->Query("select count(*) as cuenta from ".$this->Tabla);
    $result = $objQPostgresResult->GetNextRow();
    $intContRow = $result->GetColumn('cuenta');

    $this->objRowsArray = $objDataBasePadron->Query("select * from ".$this->Tabla);
    

    $this->objQProcessState->Estado = 'run';
    $this->objQProcessState->TotalRows = $intContRow;//$objTablaDbf->Registros;
    $this->objQProcessState->DoneRows = 0;
    $this->objQProcessState->Error = null;
    $this->objQProcessState->Save();

    /*Prepare Insert */
    $this->PrepareStatement($this->objQProcessState->Insert);
    
    //$this->Truncate();
    $continue_migrating=true;
    $error_count = 0;
    $time_start = microtime(true);
    $time_last = $time_start;
    while ($continue_migrating) {
      try {
          if($continue_migrating = $this->InsertNextRow()) {
            $this->objQProcessState->Estado = 'run';
            $this->objQProcessState->DoneRows++;
            $time_now = microtime(true);
            if ($time_now - $time_last > QProcessSincTablaPadron::$SaveStatePeriod) {
                $this->objQProcessState->Save();
                $time_last = $time_now;
            }
          }
      } catch (Exception $objExc) {
        LogHelper::Log($objExc->getMessage());
        $continue_migrating = true;
        $error_count++;
        //$this->objQProcessState->Estado = 'err';
        //$this->objQProcessState->Save();
      }
    }
    $time_end = microtime(true);

    LogHelper::Log(sprintf('migrada %s %d registros a %d/s', $this->Tabla, $this->objQProcessState->DoneRows, $this->objQProcessState->DoneRows/($time_end-$time_start)));
    if ($error_count) {
      $this->objQProcessState->Estado = 'err';
      $this->objQProcessState->Error = "$error_count ".($error_count == 1 ? "error" : "errores")." en ".$this->Tabla;
    } else {
      $this->objQProcessState->Estado = 'fin';
      $this->objQProcessState->DoneRows = $this->objQProcessState->TotalRows;
      
    }
    $this->objQProcessState->Save();
  } catch (Exception $e) {
    LogHelper::Log($e->getMessage());
    $this->objQProcessState->Estado = 'err';
    $this->objQProcessState->Error = $e->getMessage();
    $this->objQProcessState->Save();
  }
  }

  public function __wakeup() {
    $this->objQProcessState = QProcessSincTablaPadronState::Get($this->Tabla);
    
  }
}


class QProcessSincTablaPadronState extends QProcessStatePersistFile {
  public $Tabla;
  public $Insert;
  public $Estado;
  public $TotalRows;
  public $DoneRows;
  public $Error;

  public function __construct($strTabla) {
    try {
      parent::__construct("sinctablapadron".$strTabla.__COD_PROV__);
    } catch (QCallerException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
    }
    $this->Tabla = $strTabla;
    $this->strProcessid = "sinctablapadron".$strTabla.__COD_PROV__;
  }

  public static function Get($strTabla,$blnOnlyCheckOnce=false) {
    if($blnOnlyCheckOnce)
        $objRet = QProcessSincTablaPadronState::Load("sinctablapadron".$strTabla.__COD_PROV__,1);
    else
        $objRet = QProcessSincTablaPadronState::Load("sinctablapadron".$strTabla.__COD_PROV__);
    if(!$objRet) {
        //LogHelper::Log('creando sinctablapadron'.$strTabla);
        return new QProcessSincTablaPadronState($strTabla);
    }
    return $objRet;
  }
}
