<?php

function QProcessValidacionHandleError($__exc_errno, $__exc_errstr, $__exc_errfile, $__exc_errline, $__exc_errcontext) {
    if ($__exc_errno == E_STRICT) return true;
    LogHelper::Error(sprintf('Error Validando: %s | file: %s line: %s context: %s', $__exc_errstr, $__exc_errfile, $__exc_errline, QVarDumper::dump($__exc_errcontext,2)));
    return true;
}

class QProcessValidacion extends QProcess {

    public $intIdLocalizacionArray;
    public $intIdProceso;

    public function __construct($index, $intIdLocalizacionArray) {
        //$this->intIdLocalizacionArray = $intIdLocalizacionArray;
        $this->intIdProceso = $index;
        $this->objQProcessState = QProcessValidacionState::Get($this->intIdProceso);
        $this->objQProcessState->intIdLocalizacionArray = $intIdLocalizacionArray;
        $this->objQProcessState->Save();
        $n = count($intIdLocalizacionArray);
        LogHelper::Debug("Proceso {$this->intIdProceso} construido, con $n localizaciones para validar");
    }

    public static function HandleError($__exc_errno, $__exc_errstr, $__exc_errfile, $__exc_errline, $__exc_errcontext) {
        LogHelper::Log($__exc_errstr, 'validacion.log');
        return true;
    }

    public function Work() {
        set_error_handler('QProcessValidacionHandleError');
        try {
            $arrCuadernillosCambiados = array();
            $arrLocalizacionesConflicto = array();
            $arrCuadrosCambiados = array();
            $arrCuadrosError = array();
            set_time_limit(0);
            ini_set('memory_limit', '3000M');
            $GLOBALS['__DISABLE_CACHE__'] = true;
            $this->intIdLocalizacionArray = $this->objQProcessState->intIdLocalizacionArray;
            $this->objQProcessState->Estado = 'run';
            $this->objQProcessState->Descripcion = 'Validando';
            // limpio el array una vez levantado para evitar que genere carga cada vez que chequeo el estado
            $this->objQProcessState->intIdLocalizacionArray = array();
            $this->objQProcessState->Total = count($this->intIdLocalizacionArray);
            $this->objQProcessState->Validados = 0;
            $this->objQProcessState->Error = 0;
            $this->objQProcessState->TotalDone = 0;
            $this->objQProcessState->Save();

            // Corre consistencias para todos los cuadros de todas las localizaciones 
            $total = $this->objQProcessState->Total;
            $done_cuadros = 0;
            $done_localizaciones = 0;
            $validados_cuadros = 0;
            LogHelper::Log(sprintf("Inicio de validacion de cuadros, %s localizaciones a validar", $total));
            foreach ($this->intIdLocalizacionArray as $intLocalizacion) {
                $objLocalizacion = Localizacion::Load($intLocalizacion);
                // Actualizo MapaCuadros para ver si se escapó algún cuadro o sobra algún otro...
                if ($objLocalizacion->ActualizarAMapaCuadro()) {
                    $arrLocalizacionesConflicto[$objLocalizacion->IdLocalizacion] = (string) $objLocalizacion;
                }
                foreach ($objLocalizacion->DatosCuadernilloAsIdArray as $objDatosCuadernillo) {
                    LogHelper::Debug(sprintf("Validando Cuadernillo %s de la Localización %s", $objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto, $objLocalizacion));

                    // descomentar para ejecutar solo sobre algún cuadernillo
//                    if ($objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto != 'blanco') continue;

                    $intCuadernilloEstadoInicial = $objDatosCuadernillo->CEstado;

                    // Si el cuadernillo no tiene datos evito validar, ya que pueden saltar errores de faltante (precisamente).
                    if (in_array($intCuadernilloEstadoInicial, array(EstadoType::Faltante,EstadoType::Vacio,EstadoType::Recibido))) continue;
                    
                    $blnVerificado = $objDatosCuadernillo->CEstado == EstadoType::Verificado;
                    $blnConfirmado = $objDatosCuadernillo->Desconfirmar();
                    foreach($objDatosCuadernillo->DatosCapituloAsIdArray as $objDatosCapitulo){
                        $objDatosCapitulo->CEstado = EstadoType::Modificado;
                        $objDatosCapitulo->Save();
                    }
                    foreach (DatosCuadro::LoadArrayByIdLocalizacionIdCuadernillo($objLocalizacion->IdLocalizacion, $objDatosCuadernillo->IdDefinicionCuadernillo) as $objDatosCuadro) {

                        if ($done_cuadros && $done_cuadros % 10 == 0) {
                            $this->objQProcessState->Validados = $validados_cuadros;
                            $this->objQProcessState->Save();
                        }
                        $done_cuadros++;
                        // descomentar para ejecutar solo sobre algunos cuadros
//                        if (!in_array($objDatosCuadro->IdDefinicionCuadro, array(374, 436))) continue;

                        try {
                            if ($objDatosCuadro->CEstado == EstadoType::Vacio) {
                                LogHelper::Debug("No validamos Cuadro {$objDatosCuadro->IdDefinicionCuadro} ({$objDatosCuadro->IdDatosCuadro}) con estado " . EstadoType::$NameArray[$objDatosCuadro->CEstado]);
                                continue;
                            }
                            LogHelper::Debug('Por validar Cuadro ' . $objDatosCuadro->IdDefinicionCuadro . ' (' . $objDatosCuadro->IdDatosCuadro . ')');
                            LogHelper::Debug('Validando ' . $objDatosCuadro->IdDefinicionCuadro . ' para ' . $objLocalizacion->Cueanexo);
                            $objCuadroDao = new CuadroDAO($objDatosCuadro);
                            $objCuadro = $objCuadroDao->Cuadro;
                            $intCuadroEstadoInicial = $objCuadroDao->DatosCuadro->CEstado;

                            $objCuadro->Validate(true); // solo corre las propias del cuadro
                            
                            try {
                                $objCuadroDao->SaveCuadro(true);                            
                            }
                            catch (ImposibleModificarCuadernilloConfirmadoException $e) {
                                $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->Desconfirmar();
                                $objCuadroDao->SaveCuadro(true);
                            }
                            
                            $intCuadroEstadoFinal = $objCuadroDao->DatosCuadro->CEstado;
                            
                            if (in_array($intCuadroEstadoInicial, array(EstadoType::Modificado, EstadoType::Vacio, EstadoType::Encarga, EstadoType::Completo))
                                    and in_array($intCuadroEstadoFinal, array(EstadoType::Completoconerrores, EstadoType::Completoconinconsistencias, EstadoType::Encargaconerrores, EstadoType::Encargaconinconsistencias))) {
                                LogHelper::Log('Estado inicial Sin errores, estado final Con errores en Cuadro ' . $objDatosCuadro->IdDefinicionCuadroObject->Nombre);
                                $key = $objLocalizacion->Cueanexo . ($objLocalizacion->CodigoJurisdiccional ? ' - ' . $objLocalizacion->CodigoJurisdiccional : '');
                                if (!array_key_exists($key, $arrCuadrosCambiados)) {
                                    $arrCuadrosCambiados[$key] = array();
                                }
                                //array_push($arrCuadrosCambiados[$key], $objDatosCuadro);
                                array_push($arrCuadrosCambiados[$key], array(
                                    'IdLocalizacion' => $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion,
                                    'Numero' => $objDatosCuadro->IdDefinicionCuadroObject->Numero,
                                    'IdDefinicionCuadro' => $objDatosCuadro->IdDefinicionCuadro,
                                    'Nombre' => $objDatosCuadro->IdDefinicionCuadroObject->Nombre,
                                    'CuadernilloNombreCorto' => $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->NombreCorto,
                                    'CuadernilloNombreNumero' => $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->Nombre . ' - '
                                    . $objDatosCuadro->IdDefinicionCuadroObject->Numero));
                            }
                            $validados_cuadros++;
                        } catch (Exception $e) {
                            $msj = sprintf("Excepción validando Cuadro %d de Cuadernillo %s cue %s: %s\n%s", $objCuadro->IdDefinicionCuadro, $objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto, $objLocalizacion->Cueanexo, $e->getMessage(), $e->getTraceAsString());
                            LogHelper::Log($msj, 'validacion.log');
                            LogHelper::Error($msj);
                            $this->objQProcessState->Error++;
                            if (SERVER_INSTANCE == 'dev')
                                throw $e;
                            continue;
                        }
                    }
                    LogHelper::Debug('Terminamos de validar cuadros de Cuadernillo ' . $objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto . ' (' . $objDatosCuadernillo->IdDatosCuadernillo . ')');

                    $objDatosCuadernillo->ActualizarEstado();
                    LogHelper::Debug('Terminamos de ActualizarEstado a Cuadernillo ' . $objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto . ' (' . $objDatosCuadernillo->IdDatosCuadernillo . ')');
                    if (($blnConfirmado || $blnVerificado) && in_array($objDatosCuadernillo->CEstado, array(EstadoType::Completo, EstadoType::Completoconinconsistencias))) {
                        if ($blnConfirmado) {
                            LogHelper::Debug('Cambiamos estado a confirmado a Cuadernillo ' . $objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto . ' (' . $objDatosCuadernillo->IdDatosCuadernillo . ')');
                            $objDatosCuadernillo->CEstado = EstadoType::Confirmado;
                        } elseif ($blnVerificado) {
                            LogHelper::Debug('Cambiamos estado a Verificado a Cuadernillo ' . $objDatosCuadernillo->IdDefinicionCuadernilloObject->NombreCorto . ' (' . $objDatosCuadernillo->IdDatosCuadernillo . ')');
                            $objDatosCuadernillo->CEstado = EstadoType::Verificado;
                        }
                    }
                    $objDatosCuadernillo->Save();

                    $intCuadernilloEstadoFinal = $objDatosCuadernillo->CEstado;
                    LogHelper::Debug('Estado final ' . $intCuadernilloEstadoFinal . ', estado inicial ' . $intCuadernilloEstadoInicial . ' IdDatosCuadernillo ' . $objDatosCuadernillo->IdDatosCuadernillo);
                    if (in_array($intCuadernilloEstadoInicial, array(EstadoType::Confirmado, EstadoType::Verificado))
                            && !in_array($intCuadernilloEstadoFinal, array(EstadoType::Completo, EstadoType::Completoconinconsistencias, EstadoType::Confirmado, EstadoType::Verificado))) {
                        $key = $objLocalizacion->Cueanexo . ($objLocalizacion->CodigoJurisdiccional ? ' - ' . $objLocalizacion->CodigoJurisdiccional : '');
                        LogHelper::Log('Estado inicial Confirmado/Verificado, estado final Completoconerrores en cuadernillo ' . $objDatosCuadernillo->IdDefinicionCuadernilloObject->Descripcion);
                        if (!array_key_exists($key, $arrCuadernillosCambiados)) {
                            $arrCuadernillosCambiados[$key] = array();
                        }
                        array_push($arrCuadernillosCambiados[$key], $objDatosCuadernillo->IdDefinicionCuadernilloObject->Descripcion);
                    }

                    LogHelper::Debug('Actualizamos el estado de la Localizacion');
                    $objLocalizacion->ActualizarEstado();
                }
                $done_localizaciones++;
                $this->objQProcessState->TotalDone = $done_localizaciones;
                $this->objQProcessState->Save();
            }
            $this->objQProcessState->TotalDone = $done_cuadros;
            $this->objQProcessState->Validados = $validados_cuadros;
            $this->objQProcessState->arrCuadrosCambiados = $arrCuadrosCambiados;
            $this->objQProcessState->arrCuadernillosCambiados = $arrCuadernillosCambiados;
            $this->objQProcessState->arrLocalizacionesConflicto = $arrLocalizacionesConflicto;
            $this->objQProcessState->arrCuadrosError = $arrCuadrosError;                    
            $this->objQProcessState->Estado = 'fin';
            $this->objQProcessState->Save();
            LogHelper::Log("Fin de validacion de cuadros en el proceso ".$this->intIdProceso);
        } catch (Exception $e) {
            $this->objQProcessState->Estado = 'err';
            $this->objQProcessState->Descripcion = $e->getMessage();
            error_log($e->getMessage());
        }
        restore_error_handler();
    }

    public function __wakeup() {
        $this->objQProcessState = QProcessValidacionState::Get($this->intIdProceso);
    }

}

class QProcessValidacionState extends QProcessStatePersistFile {

    public $Estado;
    public $Descripcion;
    public $Total;
    public $TotalDone;
    public $Validados;
    public $Error;
    public $Start;
    public $IdProceso;
    public $intIdLocalizacionArray;
    public $arrCuadrosCambiados;
    public $arrCuadernillosCambiados;
    public $arrLocalizacionesConflicto;
    public $arrCuadrosError;
    
    

    public function __construct($strProcessid) {
        try {
            parent::__construct($strProcessid);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    public static function Get($intIdProcesoValidacion) {
        $objRet = self::Load("validacion" . $intIdProcesoValidacion);
        if (!$objRet) {
            $objRet = new self("validacion" . $intIdProcesoValidacion);
            $objRet->Save();
        }

        return $objRet;

    }

}

?>
