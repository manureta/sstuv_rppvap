<?php
require('../app/Bootstrap.php');
Bootstrap::Initialize();


class RaWebService extends DinieceAppWebService {
    protected $strSistemaNombre = "ra";

    /**
     *
     * @param string $arrayServiceState
     * @return boolean
     */
    public function LanzarInicializacionDesdePadron($arrayServiceState) {
        LogHelper::Debug('Antes de '.__FUNCTION__.' linea '.__LINE__); 
        try {
            if($this->CheckId($arrayServiceState)){
                LogHelper::Debug('Antes de QProcessInicializarDesdePadron en '.__FUNCTION__.' linea '.__LINE__); 
                $qproc = new QProcessInicializarDesdePadron();
                $qproc->Run();
                return true;
            } else {
                LogHelper::Log('ERROR: fallo el checkid: '.$this->objLastFault);
                return $this->objLastFault;
            }
        } catch (Excepcion $e) {
            LogHelper::Log('ERROR: No funciono '.__FUNCTION__.': '.$e->getMessage());
            return $this->objLastFault;
        }
        return false;
    }

    /**
     *
     * @param string $arrayServiceState
     * @return boolean
     */
    public function CheckInicializacionDesdePadron($arrayServiceState) {
        try {
            if($this->CheckId($arrayServiceState)){
                $qprocstate = QProcessInicializarDesdePadronState::Get();
                LogHelper::Debug(__FUNCTION__.' Estado: '.$qprocstate->Estado.' Done: '.$qprocstate->Done.' Total: '.$qprocstate->Total);
                if(!empty($qprocstate->Estado) && $qprocstate->Estado != 'fin')
                    return true;
                else
                    return false;
            } else {
                LogHelper::Log('ERROR: fallo el checkid: '.$this->objLastFault);
                return $this->objLastFault;
            }
        } catch (Excepcion $e) {
            LogHelper::Log('ERROR: No funciono '.__FUNCTION__.': '.$e->getMessage());
            return $this->objLastFault;
        }
        return false;
    }

    /**
     *
     * @param string $arrayServiceState
     * @return integer[]
     */
    public function TraerEstadoInicializacionDesdePadron($arrayServiceState) {
        try {
            if($this->CheckId($arrayServiceState)){
                $qprocstate = QProcessInicializarDesdePadronState::Get();
                LogHelper::Debug(__FUNCTION__.'Estado: '.$qprocstate->Estado.' Done: '.$qprocstate->Done.' Total: '.$qprocstate->Total. ' ModeloDone: '. $qprocstate->ModeloDone. ' ModeloTotal: '. $qprocstate->ModeloTotal.' PrecargaDone: '.$qprocstate->PrecargaDone.' PrecargaTotal: '.$qprocstate->PrecargaTotal);
                if($qprocstate->Estado == 'run')
                    return array(100*($qprocstate->Done/$qprocstate->Total), 100*($qprocstate->ModeloDone/$qprocstate->ModeloTotal), 100*($qprocstate->PrecargaDone/$qprocstate->PrecargaTotal));
                elseif($qprocstate->Estado == 'fin')
                    return array(100, 100, 100);
                elseif($qprocstate->Estado == 'err')
                    return array(-1, -1, -1);
            } else {
                LogHelper::Log('ERROR: fallo el checkid: '.$this->objLastFault);
                return $this->objLastFault;
            }
        } catch (Excepcion $e) {
            LogHelper::Log('ERROR: No funciono '.__FUNCTION__.': '.$e->getMessage());
            return $this->objLastFault;
        }
        return false;
    }

    /**
     *
     * @param string $arrayServiceState
     * @param integer $intIdLocalizacion
     * @param integer $intIdDefinicionCuadro
     * @return string[]
     */
    public function TraerDatosCuadro($arrayServiceState, $intIdLocalizacion, $intIdDefinicionCuadro) {
        try {
            if($this->CheckId($arrayServiceState)){
                LogHelper::Debug(__FUNCTION__.'IdLocalizacion: '.$intIdLocalizacion.' IdDefinicionCuadro: '.$intIdDefinicionCuadro);
                try {
                    $objDAO = new CuadroDAO();
                    $objCuadro = $objDAO->LoadCuadro($intIdDefinicionCuadro, Localizacion::Load($intIdLocalizacion));
                    $arrFilas = $objCuadro->GetFilas();
                    $arrColumnas = $objCuadro->GetColumnas();
                    $arrDatos = array();
                    foreach ($arrFilas as $objFila) {
                        if($objFila->IsEmpty()) continue; 
                        $strFila = "";
                        $arrValores = "";
                        foreach ($arrColumnas as $objColumna) {
                            $objCelda = $objFila->GetCelda($objColumna);
                            $arrValores []= $objCelda->Valor;
                        }
                        $arrDatos []= implode('|', $arrValores);
                    }
                } catch (Exception $e) {
                    return "ERROR: ".$e->getMessage();
                }
            } else {
                LogHelper::Log('ERROR: fallo el checkid: '.$this->objLastFault);
                return $this->objLastFault;
            }
        } catch (Excepcion $e) {
            LogHelper::Log('ERROR: No funciono '.__FUNCTION__.': '.$e->getMessage());
            return $this->objLastFault;
        }
        return $arrDatos;
    }

}

RaWebService::Run('RaWebService', __WEBSERVICE_RA_SOAP_TNS__);
?>
