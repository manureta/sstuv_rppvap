<?php

class QProcessValidaciones extends QProcess {
    
    public static $_CANTIDAD_PROCESOS = 4;

    public function __construct() {
        $this->objQProcessState = QProcessValidacionesState::Get();
    }

    public function Work() {
        set_time_limit(0);
        ini_set('memory_limit', '3000M');
        $this->objQProcessState->Estado = 'run';
        $this->objQProcessState->Descripcion = 'Validando';
        $this->objQProcessState->Total = Localizacion::CountAll();
        $this->objQProcessState->Validados = 0;
        $this->objQProcessState->Error = 0;
        $this->objQProcessState->TotalDone = 0;
        $this->objQProcessState->Save();
        
        // Antes de empezar corrijo si existen cuadros con datos marcados como SinInformación
        LogHelper::Debug('Corrigiendo Cuadros marcados como Sin Información y que tienen datos o son obligatorios');
        $objDB = DatosCuadro::GetDatabase();
        // es feo pero productivo...
        $objDB->NonQuery('UPDATE datos_cuadro SET c_estado=99 WHERE c_estado=60 AND id_datos_cuadro IN (SELECT id_datos_cuadro FROM datos_celda);');
        $objDB->NonQuery('UPDATE datos_cuadro SET c_estado=99 WHERE c_estado=60 AND id_definicion_cuadro IN (SELECT id_definicion_cuadro FROM definicion_cuadro WHERE obligatorio);');

        $intIdLocalizacionArray = array();
        // inicializo array de arrays con datos cuadernillos
        for($i=0;$i<self::$_CANTIDAD_PROCESOS;$i++)
            $intIdLocalizacionArray[$i] = array();
        
        // Corre consistencias para todos los cuadros de todas las localizaciones 
        $total = $this->objQProcessState->Total;
        $offset = 0;
        $limit = 100;
        $i = 0;
        if (self::$_CANTIDAD_PROCESOS > $total) self::$_CANTIDAD_PROCESOS = $total;
        LogHelper::Log(sprintf("Inicio de validacion de cuadros, %s Localizaciones a validar", $total));
        // voy distribuyendo las localizaciones a verificar
        while($offset < $total) {
            $objLocalizacionArray = Localizacion::QueryArray(QQ::NotIn(QQN::Localizacion()->CEstado, array(EstadoType::Recibido, EstadoType::Vacio, EstadoType::Faltante)),
                    QQ::Clause(QQ::OrderBy(QQN::Localizacion()->IdLocalizacion), QQ::LimitInfo($limit, $offset)));

            foreach ($objLocalizacionArray as $objLocalizacion) {
                array_push($intIdLocalizacionArray[$i%self::$_CANTIDAD_PROCESOS],$objLocalizacion->IdLocalizacion);
                $i++;
            }            
            $offset+=$limit;
        }
        $this->objQProcessState->Total = $i;
        $this->objQProcessState->arrToProc = array();
        foreach ($intIdLocalizacionArray as $i => $arrLoc) {
            LogHelper::Debug('Inicializando Proceso '.$i);
            $this->objQProcessState->arrToProc[] = new QProcessValidacion($i,$arrLoc);
        }    
        LogHelper::Debug('Procesos inicializados');
        $this->objQProcessState->arrLocalizaciones = null;
        $this->objQProcessState->arrProcRunning = array();
        $this->objQProcessState->arrFinished = array();
        $this->objQProcessState->arrErrors = array();

        $this->objQProcessState->arrCuadrosCambiados = array();
        $this->objQProcessState->arrCuadernillosCambiados = array();
        $this->objQProcessState->arrLocalizacionesConflicto = array();
        $this->objQProcessState->arrCuadrosError = array();            
        $this->objQProcessState->Save();
        
                
        try {
            $arrFails = array();
            foreach ($this->objQProcessState->arrToProc as $QProc) {
                array_push($this->objQProcessState->arrProcRunning, $QProc);
                LogHelper::Debug("Ejecutando el proceso ".$QProc->ProcessState->strProcessid);
                $QProc->Run();
                $arrFails[$QProc->ProcessState->strProcessid] = 0;
                $this->objQProcessState->Save();
            }
            sleep(self::$_CANTIDAD_PROCESOS);
            $blnError = false;
            LogHelper::Debug('Corriendo '.count($this->objQProcessState->arrProcRunning).' procesos');
            while (true) {
                LogHelper::Debug("entro al while");
                $this->objQProcessState->TotalDone = 0;
                foreach ($this->objQProcessState->arrProcRunning as $k => $objProcValidacion) {
                    try {$objProcValidacion->UpdateState();} 
                    catch (QProcessException $e) {if ($e->getCode()==1) continue; else throw $e;}

                    if (time() - $objProcValidacion->ProcessState->lastupdate > 480) { // si no actualizó el estado en 8 min lo doy por muerto...
                        $objProcValidacion->ProcessState->Estado = 'err';
                        $objProcValidacion->ProcessState->Error = "Se terminó el tiempo de espera para determinar el estado de uno de los procesos de Validación.\r\nEs probable que el proceso haya finalizado de forma imprevista.";
                        LogHelper::Error("Finalizó inesperadamente un QProcessValidacion");
                    }

                    LogHelper::Debug("estado: " . $objProcValidacion->ProcessState->Estado);
                    switch ($objProcValidacion->ProcessState->Estado) {
                        case 'err':
                            LogHelper::Debug("El proceso {$k} tiene estado err");
                            array_push($this->objQProcessState->arrErrors, $objProcValidacion->ProcessState->Error);
                            $blnError = true;
                            unset($this->objQProcessState->arrProcRunning[$k]);
                            $this->objQProcessState->Descripcion = $objProcValidacion->ProcessState->Descripcion;
                            $this->objQProcessState->Save();
                            if (count($this->objQProcessState->arrProcRunning) == 0) break 3;
                            else break;
                        // fall trough
                        case 'fin':
                            LogHelper::Debug("El proceso {$k} finalizó");
                            foreach($objProcValidacion->ProcessState->arrCuadrosCambiados as $key => $obj)
                                $this->objQProcessState->arrCuadrosCambiados[$key] = $obj;
                            foreach($objProcValidacion->ProcessState->arrCuadernillosCambiados as $key => $obj)
                                $this->objQProcessState->arrCuadernillosCambiados[$key] = $obj;
                            foreach($objProcValidacion->ProcessState->arrLocalizacionesConflicto as $key => $obj)
                                $this->objQProcessState->arrLocalizacionesConflicto[$key] = $obj;
                            foreach($objProcValidacion->ProcessState->arrCuadrosError as $key => $obj)
                                $this->objQProcessState->arrCuadrosError[$key] = $obj;
                            $objProcValidacion->ProcessState->arrCuadrosCambiados = array();
                            $objProcValidacion->ProcessState->arrCuadernillosCambiados = array();
                            $objProcValidacion->ProcessState->arrLocalizacionesConflicto = array();
                            $objProcValidacion->ProcessState->arrCuadrosError = array();      
                            
                            array_push($this->objQProcessState->arrFinished, $objProcValidacion);
                            $this->objQProcessState->arrProcRunning[$k] = null;                            
                            unset($this->objQProcessState->arrProcRunning[$k]);
                            if (count($this->objQProcessState->arrProcRunning) == 0) {
                                LogHelper::Debug("Finalizaron todos los procesos");
                                $this->objQProcessState->TotalDone = $this->objQProcessState->Total;
                                $this->objQProcessState->Save();
                                break 3;
                            }
                        default:
                            $this->objQProcessState->TotalDone += $objProcValidacion->ProcessState->TotalDone;
                            $this->objQProcessState->Validados += $objProcValidacion->ProcessState->Validados;
                    }
                }
                $this->objQProcessState->TotalDone = 0;
                foreach ($this->objQProcessState->arrToProc as $objProcess) {
                    $this->objQProcessState->TotalDone += $objProcess->ProcessState->TotalDone;
                }
                LogHelper::Debug("TotalDone: ".$this->objQProcessState->TotalDone);
                $this->objQProcessState->Save();
                sleep(2);
            }            
 
            $this->objQProcessState->Estado = ($blnError) ? 'err' : 'fin';
            $this->objQProcessState->Save();
            $msj = sprintf("Finalizó la ejecución de la validación con estado %s | Versión %s",$this->objQProcessState->Estado,__SISTEMA_VERSION__);
            LogHelper::Log($msj);
            $arrInfoValidacion = array(
                'version'       => __SISTEMA_VERSION__,
                'estado'        => $this->objQProcessState->Estado,
                'fecha'         => date(DATE_ATOM),
                'cuadros_error' => count($this->objQProcessState->arrCuadrosError),
                'desconfirmados'=> count($this->objQProcessState->arrCuadernillosCambiados),
                'conflictos'    => count($this->objQProcessState->arrLocalizacionesConflicto)
            );
            DatosCapitulo::DeleteEmptys();
            DatosCuadernillo::DeleteEmptys();
            Localizacion::DeleteEmptys();
            file_put_contents(__TMP_DIR__.'/ultima_validacion', serialize($arrInfoValidacion));
        }
        catch (Exception $e) {
            $this->objQProcessState->Estado = 'err';
            array_push($this->objQProcessState->arrErrors, $e->getMessage());
            $this->objQProcessState->Save();
        }
    }

    public function __wakeup() {
        $this->objQProcessState = QProcessValidacionesState::Get();
    }

}

class QProcessValidacionesState extends QProcessStatePersistFile {

    public $arrCuadrosCambiados;
    public $arrCuadernillosCambiados;
    public $arrLocalizacionesConflicto;
    public $arrCuadrosError;
    public $arrLocalizaciones;
    public $arrRuningLocalizaciones;
    public $arrFinishedLocalizaciones;
    public $Validados;
    public $Estado;
    public $Start;
    public $Error;
    public $Descripcion;
    public $Total;
    public $TotalDone;
    public $arrToProc;
    public $arrProcRunning;
    public $arrFinished;
    public $arrErrors = array();

    public static function Get() {
        $objRet = QProcessValidacionesState::Load("Validaciones" . __COD_PROV__);
        if (!$objRet) {
            LogHelper::Debug("No se pudo cargar un estado válido para el proceso QProcessValidaciones así que se crea uno nuevo");
            $objRet = new QProcessValidacionesState("Validaciones" . __COD_PROV__);
            $objRet->Save();
        }
        return $objRet;
    }

}

QProcessValidaciones::$_CANTIDAD_PROCESOS = __ARTICULATION_PROCESS__;
?>
