<?php

class QProcessImportarDatos extends QProcess {

    public static $_CANTIDAD_PROCESOS = 4;
    public $arrLocalizaciones;
    public $arrIdDefinicionCuadro;
    public $strWsClass;
    public $processId;

    public function __construct() {
        $this->objQProcessState = QProcessImportarDatosState::Get();
    }

    public function SetWsClassLocalizacionesCuadros($strWsClass, $arrLocalizaciones, $arrIdDefinicionCuadro) {
        $this->arrLocalizaciones = $arrLocalizaciones;
        $this->arrIdDefinicionCuadro = $arrIdDefinicionCuadro;
        $this->strWsClass = $strWsClass;
        $this->objQProcessState->arrLocalizaciones = $arrLocalizaciones;
        $this->objQProcessState->arrIdDefinicionCuadro = $arrIdDefinicionCuadro;
        $this->objQProcessState->strWsClass = $strWsClass;
        $this->objQProcessState->arrToProc = array();
        $this->objQProcessState->arrFinishedLocalizaciones = array();
        $this->objQProcessState->Save();
    }

    public function __wakeup() {
        $this->objQProcessState = QProcessImportarDatosState::Get();
        $this->arrLocalizaciones = $this->objQProcessState->arrLocalizaciones;
        $this->arrIdDefinicionCuadro = $this->objQProcessState->arrIdDefinicionCuadro;
        $this->strWsClass = $this->objQProcessState->strWsClass;
    }

    public function __sleep() {
        $this->arrLocalizaciones = null;
        $this->arrIdDefinicionCuadro = null;
        $this->objQProcessState = null;
        return array('processId');
    }

    public function Work() {
        set_time_limit(0);
        ini_set('memory_limit', '3000M');
        $this->objQProcessState->Estado = "run";
        $this->objQProcessState->TotalDone = 0;
        $this->objQProcessState->Save();
        //$this->objQProcessState->Tablas = $this->Tablas;
        //$this->objQProcessState->TotalTablas = count($this->Tablas);
        $intTotal = count($this->objQProcessState->arrLocalizaciones);
        $this->objQProcessState->Total = $intTotal;
        $this->objQProcessState->arrToProc = array();

        $arrLocalizacionesArray = array();
        for ($i = 0; $i < self::$_CANTIDAD_PROCESOS; $i++) {
            $arrLocalizacionesArray[$i] = array();
        }
        $i = 0;
        LogHelper::Debug('Total de localizaciones: '.$this->objQProcessState->Total);
        while ($intIdLocalizacion = array_shift($this->objQProcessState->arrLocalizaciones)) {
            $index = $i % self::$_CANTIDAD_PROCESOS;
            $arrLocalizacionesArray[$index][] = $intIdLocalizacion;
            $i++;
        }
        LogHelper::Debug('Inicializando Procesos '.self::$_CANTIDAD_PROCESOS);
        foreach ($arrLocalizacionesArray as $i => $arrLoc) {
            $this->objQProcessState->arrToProc[] = new QProcessImportarDatosLocalizacion($i, $this->objQProcessState->strWsClass, $arrLoc, $this->objQProcessState->arrIdDefinicionCuadro);
        }

        $this->objQProcessState->arrLocalizaciones = null;
        $this->objQProcessState->arrProcRunning = array();
        $this->objQProcessState->arrFinished = array();
        $this->objQProcessState->arrErrors = array();

        $this->objQProcessState->Save();
        LogHelper::Debug("ToProc" . count($this->objQProcessState->arrToProc));
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
                foreach ($this->objQProcessState->arrProcRunning as $k => $objProcMigrar) {
                    try {$objProcMigrar->UpdateState();} 
                    catch (QProcessException $e) {if ($e->getCode()==1) continue; else throw $e;}

                    if (time() - $objProcMigrar->ProcessState->lastupdate > 480) { // si no actualizó el estado en 8 min lo doy por muerto...
                        $objProcMigrar->ProcessState->Estado = 'err';
                        $objProcMigrar->ProcessState->Error = "Se terminó el tiempo de espera para determinar el estado de uno de los procesos de importación.\r\nEs probable que el proceso haya finalizado de forma imprevista.";
                        LogHelper::Error("Finalizó inesperadamente un QProcessImportarDatosLocalizacion");
                    }

                    LogHelper::Debug("estado: " . $objProcMigrar->ProcessState->Estado);
                    switch ($objProcMigrar->ProcessState->Estado) {
                        case 'err':
                            LogHelper::Debug("El proceso {$k} tiene estado err");
                            array_push($this->objQProcessState->arrErrors, $objProcMigrar->ProcessState->Error);
                            $blnError = true;
                            unset($this->objQProcessState->arrProcRunning[$k]);
                            $this->objQProcessState->Save();
                            if (count($this->objQProcessState->arrProcRunning) == 0) break 3;
                            else break;
                        // fall trough
                        case 'fin':
                            LogHelper::Debug("El proceso {$k} finalizó");
                            array_push($this->objQProcessState->arrFinished, $objProcMigrar);
                            $this->objQProcessState->arrProcRunning[$k] = null;
                            unset($this->objQProcessState->arrProcRunning[$k]);
                            $this->objQProcessState->Save();
                            if (count($this->objQProcessState->arrProcRunning) == 0) {
                                LogHelper::Debug("Finalizaron todos los procesos");
                                $this->objQProcessState->TotalDone = $this->objQProcessState->Total;
                                $this->objQProcessState->Save();
                                break 3;
                            }
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
            LogHelper::Debug("terminó la ejecución de ImportarDatos");
        }
        catch (Exception $e) {
            $this->objQProcessState->Estado = 'err';
            array_push($this->objQProcessState->arrErrors, $e->getMessage());
            $this->objQProcessState->Save();
        }
    }

}

class QProcessImportarDatosState extends QProcessStatePersistFile {

    public $arrLocalizaciones;
    public $arrIdDefinicionCuadro;
    public $strWsClass;
    public $arrRuningLocalizaciones;
    public $arrFinishedLocalizaciones;
    public $Estado;
    public $Total;
    public $TotalDone;
    public $arrToProc;
    public $arrProcRunning;
    public $arrFinished;
    public $arrErrors = array();

    public static function Get() {
        $objRet = QProcessImportarDatosState::Load("ImportarDatos" . __COD_PROV__);
        if (!$objRet) {
            LogHelper::Debug("No se pudo cargar un estado válido para el proceso QProcessImportarDatos así que se crea uno nuevo");
            $objRet = new QProcessImportarDatosState("ImportarDatos" . __COD_PROV__);
            $objRet->Save();
        }
        return $objRet;
    }

}

QProcessImportarDatos::$_CANTIDAD_PROCESOS = __ARTICULATION_PROCESS__;
