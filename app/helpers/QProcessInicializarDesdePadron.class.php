<?php
class QProcessInicializarDesdePadron extends QProcess {
    public static $SaveStatePeriod = 2.000; // seconds with microseconds
    
    public function __construct() {
        $this->objQProcessState = new QProcessInicializarDesdePadronState();
        //throw new QCallerException(var_export($this->objQProcessState, true));
        $this->objQProcessState->Estado = 'inicio';
        $this->objQProcessState->Done = 0;
        $this->objQProcessState->Error = null;
        $this->objQProcessState->Save();
    }
  
    public function Work() {
        try {
            set_time_limit(0);
            //if ($this->objQProcessState->Estado == 'fin' || $this->objQProcessState->Estado == 'error')
            
            $arrResponsable = array();
            $arrEstablecimientos = array();
            $arrDomicilio = array();
            $arrCampoProv = array();
            OLTPCampoProv::Truncate(true);
            OLTPResponsable::Truncate(true);
            OLTPOfertaLocal::Truncate(true);
            OLTPLocalizacion::Truncate(true);
            OLTPEstablecimiento::Truncate(true);
            OLTPDomicilio::Truncate(true);
            $objWSClient = new PadronDinieceWebServiceClient();
            $intLocalizaciones = $objWSClient->ContarLocalizaciones();
            $offLocalizaciones = 0;
            $arrLocalizaciones = $objWSClient->TraerLocalizaciones($offLocalizaciones);

            $this->objQProcessState->Estado = 'run';
            $this->objQProcessState->Total = $intLocalizaciones;
            $this->objQProcessState->Done = 0;
            $this->objQProcessState->ModeloTotal = 1;
            $this->objQProcessState->ModeloDone = 0;
            $this->objQProcessState->PrecargaTotal = 1;
            $this->objQProcessState->PrecargaDone = 0;
            $this->objQProcessState->Error = null;
            $this->objQProcessState->Save();
            LogHelper::Log('Empezando inicializacion desde el padron');

            $time_start = microtime(true);
            $time_last = $time_start;
            try {
                while($intLocalizaciones > $offLocalizaciones && $arrLocalizaciones = $objWSClient->TraerLocalizaciones($offLocalizaciones)) {
                $offLocalizaciones += count($arrLocalizaciones);
                while($objOLTPLocalizacion = array_shift($arrLocalizaciones)) {
                    if($objOLTPLocalizacion->IdEstablecimientoObject->IdResponsable && $objOLTPLocalizacion->IdEstablecimientoObject->IdResponsableObject && !in_array($objOLTPLocalizacion->IdEstablecimientoObject->IdResponsable, $arrResponsable)) {
                        array_push($arrResponsable, $objOLTPLocalizacion->IdEstablecimientoObject->IdResponsable);
                        $objOLTPLocalizacion->IdEstablecimientoObject->IdResponsableObject->Save();
                    }
                    if(!in_array($objOLTPLocalizacion->IdEstablecimiento, $arrEstablecimientos)) {
                        array_push($arrEstablecimientos, $objOLTPLocalizacion->IdEstablecimiento);
                        $objOLTPLocalizacion->IdEstablecimientoObject->Save();
                        foreach($objOLTPLocalizacion->IdEstablecimientoObject->EstCampoProvValorAsIdArray as $objOLTPEstCampoProvValor) {
                            if($objOLTPEstCampoProvValor->IdCampoProv && $objOLTPEstCampoProvValor->IdCampoProvObject && !in_array($objOLTPEstCampoProvValor->IdCampoProv, $arrCampoProv)) {
                                array_push($arrCampoProv, $objOLTPEstCampoProvValor->IdCampoProv);
                                $objOLTPEstCampoProvValor->IdCampoProvObject->Save();
                            }
                            $objOLTPEstCampoProvValor->Save();
                        }
                    }
                    if($objOLTPLocalizacion->IdResponsable && $objOLTPLocalizacion->IdResponsableObject && !in_array($objOLTPLocalizacion->IdResponsable, $arrResponsable)) {
                        array_push($arrResponsable, $objOLTPLocalizacion->IdResponsable);
                        $objOLTPLocalizacion->IdResponsableObject->Save();
                    }
                    $objOLTPLocalizacion->Save();
                    // Por ahora no se migra al padron por lo que se comenta por performance
                    //foreach($objOLTPLocalizacion->OLTPModalidad2TipoAsModalidad2Array as $objOLTPModalidad2Tipo) {
                    //    $objOLTPLocalizacion->AssociateOLTPModalidad2TipoAsModalidad2($objOLTPModalidad2Tipo);
                    //} 
                    foreach($objOLTPLocalizacion->OfertaLocalAsIdArray as $objOLTPOfertaLocal) {
                        $objOLTPOfertaLocal->Save();
                        switch ($objOLTPOfertaLocal->COfertaObject->CNivelTitulo) {
                            case 1:
                            case 2:
                                foreach($objOLTPOfertaLocal->PlanEstudioLocalAsIdArray as $objOLTPPlanEstudioLocal) {
                                    $objOLTPPlanEstudioLocal->Save();
                                    // Por ahora no se migra al padron por lo que se comenta por performance
                                    //foreach($objOLTPPlanEstudioLocal->OLTPModalidad2TipoAsModalidad2Array as $objOLTPModalidad2Tipo) {
                                    //    $objOLTPPlanEstudioLocal->AssociateOLTPModalidad2TipoAsModalidad2($objOLTPModalidad2Tipo);
                                    //}
                                    if($objOLTPPlanEstudioLocalSecundaria = $objOLTPPlanEstudioLocal->PlanEstudioLocalSecundaria) $objOLTPPlanEstudioLocalSecundaria->Save();
                                    if($objOLTPPlanEstudioLocalSuperior = $objOLTPPlanEstudioLocal->PlanEstudioLocalSuperior) $objOLTPPlanEstudioLocalSuperior->Save();
                                }
                                break;
                            default :
                                continue;
                        }
                        // Por ahora no se migra al padron por lo que se comenta por performance
                        //foreach($objOLTPOfertaLocal->OLTPModalidad2TipoAsOlocModalidad2Array as $objOLTPModalidad2Tipo) {
                        //    $objOLTPOfertaLocal->AssociateOLTPModalidad2TipoAsOlocModalidad2($objOLTPModalidad2Tipo);
                        //}
                        foreach($objOLTPOfertaLocal->OlocCampoProvValorAsIdArray as $objOLTPOlocCampoProvValor) {
                            if($objOLTPOlocCampoProvValor->IdCampoProv && $objOLTPOlocCampoProvValor->IdCampoProvObject && !in_array($objOLTPOlocCampoProvValor->IdCampoProv, $arrCampoProv)) {
                                array_push($arrCampoProv, $objOLTPOlocCampoProvValor->IdCampoProv);
                                $objOLTPOlocCampoProvValor->IdCampoProvObject->Save();
                            }
                            $objOLTPOlocCampoProvValor->Save();
                        }
                    }
                    foreach($objOLTPLocalizacion->LocalizacionDomicilioAsIdArray as $objOLTPLocalizacionDomicilio) {
                        if(!in_array($objOLTPLocalizacionDomicilio->IdDomicilio, $arrDomicilio)) {
                            $objOLTPLocalizacionDomicilio->IdDomicilioObject->Save();
                            array_push($arrDomicilio, $objOLTPLocalizacionDomicilio->IdDomicilio);
                        }
                        $objOLTPLocalizacionDomicilio->Save();
                    }
                    foreach($objOLTPLocalizacion->LocCampoProvValorAsIdArray as $objOLTPLocCampoProvValor) {
                        if($objOLTPLocCampoProvValor->IdCampoProv && $objOLTPLocCampoProvValor->IdCampoProvObject && !in_array($objOLTPLocCampoProvValor->IdCampoProv, $arrCampoProv)) {
                            array_push($arrCampoProv, $objOLTPLocCampoProvValor->IdCampoProv);
                            $objOLTPLocCampoProvValor->IdCampoProvObject->Save();
                        }
                        $objOLTPLocCampoProvValor->Save();
                    }
                    $this->objQProcessState->Estado = 'run';
                    $this->objQProcessState->Done++;
                    $time_now = microtime(true);
                    if ($time_now - $time_last > QProcessInicializarDesdePadron::$SaveStatePeriod) {
                        $this->objQProcessState->Save();
                        $time_last = $time_now;
                    }
                }
                }
            } catch (Exception $objExc) {
                LogHelper::Error($objExc->getMessage());
                LogHelper::Error($objExc->getTraceAsString());
                $this->objQProcessState->Estado = 'err';
                $this->objQProcessState->Save();
                return false;
            }
            $time_end = microtime(true);

            LogHelper::Log(sprintf('fin inicializacion desde padron %d localizaciones a %2f/s %d %d', $this->objQProcessState->Done, $this->objQProcessState->Done/($time_end-$time_start), $time_end, $time_start));
            $objQProcModelo = new QProcessModeloGenerador();
            $objQProcModelo->Run();
            sleep(3); // da algo de tiempo para que el proceso spawneado arriba inicialize su estado
            $objQProcModelo->UpdateState();
            $time_start = microtime(true);
            $time_last = $time_start;
            while($objQProcModelo->ProcessState->Estado != 'fin') {
                $this->objQProcessState->ModeloTotal = $objQProcModelo->ProcessState->Total;
                $this->objQProcessState->ModeloDone = $objQProcModelo->ProcessState->Done;
                $this->objQProcessState->PrecargaTotal = $objQProcModelo->ProcessState->PrecargaTotal;
                $this->objQProcessState->PrecargaDone = $objQProcModelo->ProcessState->PrecargaDone;
                $time_now = microtime(true);
                if ($time_now - $time_last > QProcessInicializarDesdePadron::$SaveStatePeriod) {
                    $this->objQProcessState->Save();
                    $time_last = $time_now;
                }
                sleep(1);
                $objQProcModelo->UpdateState();
            }
            $this->objQProcessState->ModeloTotal = $objQProcModelo->ProcessState->Total;
            $this->objQProcessState->ModeloDone = $objQProcModelo->ProcessState->Done;
            $this->objQProcessState->PrecargaTotal = $objQProcModelo->ProcessState->PrecargaTotal;
            $this->objQProcessState->PrecargaDone = $objQProcModelo->ProcessState->PrecargaDone;
            $this->objQProcessState->Estado = 'fin';
            $this->objQProcessState->Done = $this->objQProcessState->Total;
            $this->objQProcessState->Save();
            QApplication::setUltimaArticulacion();
        } catch (Exception $e) {
            LogHelper::Log($e->getMessage());
            $this->objQProcessState->Estado = 'err';
            $this->objQProcessState->Error = $e->getMessage();
            $this->objQProcessState->Save();
        }
    }

    public function __wakeup() {
        $this->objQProcessState = QProcessInicializarDesdePadronState::Get();
    }
}


class QProcessInicializarDesdePadronState extends QProcessStatePersistFile {
  public $Estado;
  public $Total;
  public $Done;
  public $ModeloTotal;
  public $ModeloDone;
  public $PrecargaTotal;
  public $PrecargaDone;
  public $Error;

  public function __construct() {
      try {
          parent::__construct("inicializardesdepadron".__COD_PROV__);
      } catch (QCallerException $objExc) {
          $objExc->IncrementOffset();
          throw $objExc;
      }
      $this->strProcessid = "inicializardesdepadron".__COD_PROV__;
  }

  public static function Get($blnOnlyCheckOnce=false) {
      if($blnOnlyCheckOnce)
          $objRet = QProcessInicializarDesdePadronState::Load("inicializardesdepadron".__COD_PROV__,1);
      else
          $objRet = QProcessInicializarDesdePadronState::Load("inicializardesdepadron".__COD_PROV__);
      if(!$objRet) {
          //LogHelper::Log('creando sinctablapadron'.$strTabla);
          return new QProcessInicializarDesdePadronState();
      }
      return $objRet;
  }
}
