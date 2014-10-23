<?php

function QProcessMigracionOltpWorkerHandleError($__exc_errno, $__exc_errstr, $__exc_errfile, $__exc_errline, $__exc_errcontext) {
    if ($__exc_errno == E_STRICT) return true;
    LogHelper::Error(sprintf('Error Migrando: %s | file: %s line: %s context: %s', 
            $__exc_errstr, $__exc_errfile, $__exc_errline, QVarDumper::dump($__exc_errcontext,3)));
    return true;
}

class QProcessMigracionOltpWorker extends QProcess {
    
    protected static $arrDependenciaCuadros = array(
        // dependen del 2.A del violeta (por el nro de orden)
        158 => array(157,159), //el cuadro 158 depende del 157
        167 => array(157),
        168 => array(157),
        226 => array(157,159),
        611 => array(157),
        616 => array(157),
        // dependen del 2.A del violeta (por el nro de orden)
        432 => array(430,436),
        449 => array(430),
        458 => array(430),
        525 => array(430,436),
        612 => array(430),
        617 => array(430),
        629 => array(430),
       
        // dependen del 1 del verde
        287 => array(257),
        317 => array(257),
        291 => array(257),
        293 => array(257),
       
        // dependencia de los cuadros de matricula sobre secciones multiples 
         // celeste Buenos Aires y SIN EGB
        104 => array(105),
        127 => array(128),   // celeste con EGB
        214 => array(105),
        215 => array(216),
        297 => array(374),// dependencia del 1.1 con 1.2 del violeta  
        626 => array(216),
        // El 2 del Amarillo depende del 1 
        289 => array(256),

    ); 
    
    public static $arrDatosCuadrosMigrados = array();
    
    public $intIdProceso;
    public $blnSoloConfirmados;

    public function __construct($index, $intIdLocalizacionArray, $blnSoloConfirmados) {
        LogHelper::Debug("Entro al constructor del proceso ".$index);
        $this->intIdProceso = $index;
        $this->objQProcessState = QProcessMigracionOltpWorkerState::Get($this->intIdProceso);
        $this->objQProcessState->intIdLocalizacionArray = $intIdLocalizacionArray;
        $this->objQProcessState->SoloConfirmados = $blnSoloConfirmados;
        $this->objQProcessState->Save();
        LogHelper::Debug("Salvo el estado del proceso ".$index);
        $n = count($intIdLocalizacionArray);
        LogHelper::Debug("Proceso {$this->intIdProceso} construido, con $n localizaciones para migrar");        
    }

    public function Work() {
        LogHelper::Log("Iniciando proceso de migración a OLTP ".$this->intIdProceso);
        set_time_limit(0);
        ini_set('memory_limit', '256M');
        $this->objQProcessState->Estado = 'run';
        $this->objQProcessState->Descripcion = 'Migrando';
        $intIdLocalizacionArray = $this->objQProcessState->intIdLocalizacionArray;
        $blnSoloConfirmados = $this->objQProcessState->SoloConfirmados;
        $this->objQProcessState->Total = count($intIdLocalizacionArray);
        $this->objQProcessState->Migrados = 0;
        $this->objQProcessState->Error = 0;
        $this->objQProcessState->TotalDone = 0;
        $this->objQProcessState->intIdLocalizacionArray = array();
        $this->objQProcessState->Save();
        $objDatabase = OLTPTitulo::GetDatabase();
        set_error_handler('QProcessMigracionOltpWorkerHandleError');
        try {
            $offset = 0; // localidades migradas
            foreach ($intIdLocalizacionArray as $intIdLocalizacion) {
                //HACK ORM Hago un QuerySingle en vez de un Load para que no la cachee
                $objLocalizacion = Localizacion::QuerySingle(QQ::Equal(QQN::Localizacion()->IdLocalizacion, $intIdLocalizacion));
                LogHelper::Debug(sprintf("Proceso %d: Migrando Localización %d de %d localizaciones", $this->intIdProceso, $offset, $this->objQProcessState->Total));
                $this->objQProcessState->TotalDone = $offset;
                $this->objQProcessState->Save();
                if ($objLocalizacion->Conflicto) {
                    LogHelper::Log(sprintf('Omitiendo Localización %d (%s) en Conflicto',$objLocalizacion->IdLocalizacion, $objLocalizacion->Cueanexo),'migracion_oltp.log');
                    $offset++;
                    continue;
                }
                foreach ($objLocalizacion->DatosCuadernilloAsIdArray as $objDatosCuadernillo) {
                    if (!$objDatosCuadernillo || $objDatosCuadernillo->CEstado == EstadoType::Faltante) continue; // si no se recibio el cuadernillo no se corre nada
                    if ($blnSoloConfirmados && $objDatosCuadernillo->CEstado != EstadoType::Confirmado) {
                        LogHelper::Log(sprintf('Omitiendo Cuadernillo %s de Localización %d (%s) por no estar Confirmado',$objDatosCuadernillo->IdDefinicionCuadernilloObject->Nombre,$objLocalizacion->IdLocalizacion, $objLocalizacion->Cueanexo),'migracion_oltp.log');
                        continue;
                    }
                    //if ($objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto != 'caracteristicas') continue; // solo 1 cuadernillo
                    foreach (DatosCuadro::LoadArrayByIdLocalizacionIdCuadernillo($objLocalizacion->IdLocalizacion, $objDatosCuadernillo->IdDefinicionCuadernillo) as $objDatosCuadro) {
                        if (!in_array($objDatosCuadro->CEstado,
                            array(EstadoType::Completo,EstadoType::Completoconinconsistencias))) continue;
                        if (in_array($objDatosCuadro->IdDatosCuadro, self::$arrDatosCuadrosMigrados)) continue;
                        try {                            
                            $objCuadroDao = new CuadroDAO($objDatosCuadro);
                            $objCuadro = $objCuadroDao->Cuadro;
                            if (!method_exists($objCuadro, 'Migrar')) {
//                                LogHelper::Log('No se encuentra definida la migración para el cuadro '.$objCuadro->Numero ,'migracion_oltp.log');
                                continue;
                            }

                            // Migro cuadros dependientes
                            if (array_key_exists($objDatosCuadro->IdDefinicionCuadro, self::$arrDependenciaCuadros)) {
                                foreach (self::$arrDependenciaCuadros[$objDatosCuadro->IdDefinicionCuadro] as $intDependeciaCuadro){
                                    // El cuadro puede no existir por pertenecer a otro cuadernillo (x ej: c/egb vs s/egb)
                                    if (!count(DatosCuadro::QueryArray(QQ::AndCondition(
                                            QQ::Equal(QQN::DatosCuadro()->IdDefinicionCuadro, $intDependeciaCuadro),
                                            QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion, $objLocalizacion->IdLocalizacion)))))
                                        continue;
                                    $objDAO = new CuadroDAO();
                                    $objCuadroDep = $objDAO->LoadCuadro($intDependeciaCuadro, $objLocalizacion);
                                    $objDatosCuadroDep = $objDAO->DatosCuadro;
                                    // si no se migró el cuadro dependiente
                                    if (!in_array($objDatosCuadroDep->IdDatosCuadro, self::$arrDatosCuadrosMigrados)) {
                                        //si el cuadro dependiente tiene error no se migra ni este ni el otro
                                        if (!in_array($objDatosCuadroDep->CEstado,
                                            array(EstadoType::Completo,EstadoType::Completoconinconsistencias))) {
                                            LogHelper::Log(sprintf('Omitiendo la migración del cuadro (%s) porque su dependencia (%s) no está completa. Localización %d',
                                                $objCuadro->Numero, $objCuadroDep->Numero, $objLocalizacion->IdLocalizacion),'migracion_oltp.log');
                                            continue 2;// salgo del foreach de los dependientes y del cuadro en sí
                                        }
                                        $objDatabase->TransactionBegin();
                                        $objCuadroDep->Migrar();
                                        $objDatabase->TransactionCommit();
                                        self::$arrDatosCuadrosMigrados[] = $objDatosCuadroDep->IdDatosCuadro;
                                    }
                                }
                            }

                            LogHelper::Debug('Migrando ' . $objDatosCuadro->IdDefinicionCuadro . ' de ' . $objLocalizacion->Cueanexo);

                            $this->objQProcessState->EntidadActual = sprintf('%s %s',$objLocalizacion->Cueanexo, $objCuadro->Numero);
                            if(defined('__DEBUG_PROCESS__'))$this->objQProcessState->Save();
                            $objDatabase->TransactionBegin();
                            $objCuadro->Migrar();
                            $objDatabase->TransactionCommit();
                            self::$arrDatosCuadrosMigrados[] = $objDatosCuadro->IdDatosCuadro;
                        }
                        catch (Exception $e) {
                            $msj = sprintf('Error migrando Localización %s Cuadernillo %s Cuadro %s : %s', 
                                    $objCuadro->Localizacion->IdLocalizacion, 
                                    $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->Nombre, 
                                    $objDatosCuadro->IdDefinicionCuadroObject->Numero,
                                    $e->getMessage());
                            LogHelper::Log($msj, 'migracion_oltp.log');
                            LogHelper::Error("$msj \n {$e->getTraceAsString()}");
                            LogHelper::Debug($msj . " desde proceso ".$this->intIdProceso);
                            $objDatabase->TransactionRollback();
                            $this->objQProcessState->Error++;
                            continue;
                        } catch(Exception $e){
                            $msj = sprintf('Excepción no esperada migrando Localización %s Cuadernillo %s Cuadro %s : %s', 
                                    $objCuadro->Localizacion->IdLocalizacion, 
                                    $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->Nombre, 
                                    $objDatosCuadro->IdDefinicionCuadroObject->Numero,
                                    $e->getMessage());
                            LogHelper::Log($msj,'migracion_oltp.log');
                            LogHelper::Error("$msj \n {$e->getTraceAsString()}");
                            LogHelper::Debug($msj . " desde proceso ".$this->intIdProceso);
                            $objDatabase->TransactionRollback();
                            $this->objQProcessState->Error++;
                            //$this->objQProcessState->Estado = 'err';
                            $this->objQProcessState->Descripcion = $e->getMessage();
                            $this->objQProcessState->Save();
                            restore_error_handler();
                            //return false;
                        }
                        $this->objQProcessState->Migrados++;
                        LogHelper::Debug("cuadro migrado nº " . $this->objQProcessState->Migrados . " desde proceso ". $this->intIdProceso);
                    }
                }
                $offset++;
            }
        } catch (Exception $e) {
            $msj = sprintf('Se produjo una excepción no esperada durante la migración: %s', $e->getMessage());
            LogHelper::Log($msj,'migracion_oltp.log');
            LogHelper::Error("$msj \n {$e->getTraceAsString()}");
            LogHelper::Debug($msj . " desde proceso ".$this->intIdProceso);
            $objDatabase->TransactionRollback();
            $this->objQProcessState->Error++;
            $this->objQProcessState->Estado = 'err';
            $this->objQProcessState->Descripcion = $e->getMessage();
            $this->objQProcessState->Save();
            restore_error_handler();
            return false;
        }        
        $this->objQProcessState->Estado = 'fin';
        $this->objQProcessState->TotalDone = $this->objQProcessState->Total;
        $this->objQProcessState->Save();
        $x = memory_get_peak_usage(TRUE);
        LogHelper::Debug("QProcessMigracionOltpWorker ID {$this->intIdProceso} finalizado correctamente. Llegó a consumir $x bytes de memoria");
        restore_error_handler();
    }

    public function __wakeup() {
        $this->objQProcessState = QProcessMigracionOltpWorkerState::Get($this->intIdProceso);
    }

}

class QProcessMigracionOltpWorkerState extends QProcessStatePersistFile {

    public $Estado;
    public $Descripcion;
    public $SoloConfirmados;
    public $Total;
    public $TotalDone;
    public $Migrados;
    public $Error;
    public $Start;
    public $intIdLocalizacionArray;
    public $blnSoloConfirmados;
    public $EntidadActual;

    public function __construct($strProcessid) {
        try {
            parent::__construct($strProcessid);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    public static function Get($intIdProceso) {
        $objRet = self::Load("QProcessMigracionOltpWorker" . $intIdProceso);
        if (!$objRet) {
            $objRet = new self("QProcessMigracionOltpWorker" . $intIdProceso);
            $objRet->Save();
        }
        return $objRet;
    }

}

?>
