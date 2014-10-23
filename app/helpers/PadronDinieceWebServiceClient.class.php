<?php
if (!defined('__FECHA_CORTE__')) define('__FECHA_CORTE__','2014-09-22');

class PadronDinieceWebServiceClient extends DinieceAppWebServiceClient {

    public function GetWsdlUri() {
        return sprintf('%s?wsdl', __WEBSERVICE_PADRON_SOAP_URI__);
    }

    public function GetClassMap() {
        return array();//array("OfertaLocal" => "OLTPOFertaLocal", "Localizacion" => "OLTPLocalizacion", "Establecimiento" => "OLTPEstablecimiento");
    }

    public function TraerOfertasLocales() {
        set_time_limit(0);
        try {
            $arr2ret = $this->objSoapClient->TraerOfertasLocales($this->strToken, 5);
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerLocalizacion($intIdLocalizacion) {
        set_time_limit(0);
        ini_set('default_socket_timeout',5400);
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $ret = $this->objSoapClient->TraerLocalizacion($this->strToken, $intIdLocalizacion, __FECHA_CORTE__);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__." trajo $intIdLocalizacion? ".($ret?'si':'no'));
            if(!$ret) return null;
            $obj2ret = OLTPLocalizacion::GetObjectFromSoapObject($ret);
            $obj2ret->IdEstablecimientoObject->__blnSoapObject = true;
            $obj2ret->__blnSoapObject = true;
            return $obj2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerOfertasLocalesByIdLocalizacion($intIdLocalizacion) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerOfertasLocalesByIdLocalizacion($this->strToken, $intIdLocalizacion, __FECHA_CORTE__);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdLocalizacion trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPOfertaLocal::GetArrayFromSoapArray($tmp);
            foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerLocalizacionesDomicilioByIdLocalizacion($intIdLocalizacion) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerLocalizacionesDomicilioByIdLocalizacion($this->strToken, $intIdLocalizacion);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdLocalizacion trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPLocalizacionDomicilio::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerPlanEstudioLocalByIdOfertaLocal($intIdOfertaLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerPlanEstudioLocalByIdOfertaLocal($this->strToken, $intIdOfertaLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdOfertaLocal trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPPlanEstudioLocal::GetArrayFromSoapArray($tmp);
            foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerModalidad2TipoAsModalidad2ArrayByIdLocalizacion($intIdLocalizacion) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerModalidad2TipoAsModalidad2ArrayByIdLocalizacion($this->strToken, $intIdLocalizacion);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdLocalizacion trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPModalidad2Tipo::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerModalidad2TipoAsOlocModalidad2ArrayByIdOfertaLocal($intIdOfertaLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerModalidad2TipoAsOlocModalidad2ArrayByIdOfertaLocal($this->strToken, $intIdOfertaLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdOfertaLocal trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPModalidad2Tipo::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerModalidad2TipoAsModalidad2ArrayByIdPlanEstudioLocal($intIdPlanEstudioLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerModalidad2TipoAsModalidad2ArrayByIdPlanEstudioLocal($this->strToken, $intIdPlanEstudioLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdPlanEstudioLocal trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPModalidad2Tipo::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerOlocCampoProvValorByIdOfertaLocal($intIdOfertaLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerOlocCampoProvValorByIdOfertaLocal($this->strToken, $intIdOfertaLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdOfertaLocal trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPOlocCampoProvValor::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerLocCampoProvValorByIdLocalizacion($intIdLocalizacion) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerLocCampoProvValorByIdLocalizacion($this->strToken, $intIdLocalizacion);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdLocalizacion trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPLocCampoProvValor::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerEstCampoProvValorByIdEstablecimiento($intIdEstablecimiento) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerEstCampoProvValorByIdEstablecimiento($this->strToken, $intIdEstablecimiento);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdEstablecimiento trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPEstCampoProvValor::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }
    public function TraerEstCampoProvCodigoByIdEstablecimiento($intIdEstablecimiento) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerEstCampoProvCodigoByIdEstablecimiento($this->strToken, $intIdEstablecimiento);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdEstablecimiento trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPCampoProvCodigo::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerLocCampoProvCodigoByIdLocalizacion($intIdLocalizacion) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerLocCampoProvCodigoByIdLocalizacion($this->strToken, $intIdLocalizacion);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdLocalizacion trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPCampoProvCodigo::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerOlocCampoProvCodigoByIdOfertaLocal($intIdOfertaLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $tmp = $this->objSoapClient->TraerOlocCampoProvCodigoByIdOfertaLocal($this->strToken, $intIdOfertaLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            if(!$tmp) $tmp = array();
            LogHelper::Debug(__FUNCTION__." para $intIdOfertaLocal trajo: ". count($tmp));
            if(empty($tmp)) return $tmp;
            $arr2ret = OLTPCampoProvCodigo::GetArrayFromSoapArray($tmp);
            //foreach($arr2ret as $obj2ret) $obj2ret->__blnSoapObject = true;
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($e->getMessage(). $lastResponse);
        }
        return false;
    }


    public function TraerPlanEstudioLocalSecundariaByIdPlanEstudioLocal($intIdPlanEstudioLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $ret = $this->objSoapClient->TraerPlanEstudioLocalSecundariaByIdPlanEstudioLocal($this->strToken, $intIdPlanEstudioLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__." trajo $intIdPlanEstudioLocal? ".($ret?'si':'no'));
            if(!$ret) return null;
            $obj2ret = OLTPPlanEstudioLocalSecundaria::GetObjectFromSoapObject($ret);
            //$obj2ret->__blnSoapObject = true;
            return $obj2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerPlanEstudioLocalSuperiorByIdPlanEstudioLocal($intIdPlanEstudioLocal) {
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $ret = $this->objSoapClient->TraerPlanEstudioLocalSuperiorByIdPlanEstudioLocal($this->strToken, $intIdPlanEstudioLocal);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__." trajo $intIdPlanEstudioLocal? ".($ret?'si':'no'));
            if(!$ret) return null;
            $obj2ret = OLTPPlanEstudioLocalSuperior::GetObjectFromSoapObject($ret);
            //$obj2ret->__blnSoapObject = true;
            return $obj2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function ContarLocalizaciones() {
        set_time_limit(0);
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $ret = $this->objSoapClient->ContarLocalizaciones($this->strToken, __FECHA_CORTE__);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__.' trajo '.$ret);
            return $ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse . $e);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerLocalizaciones($intOffset) {
        set_time_limit(0);
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__.'offset: '.$intOffset);
            $ret = $this->objSoapClient->TraerLocalizaciones($this->strToken, __FECHA_CORTE__, $intOffset);
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__.' trajo '.count($ret));
            if(empty($ret)) return $ret;
            $arr2ret = OLTPLocalizacion::GetArrayFromSoapArray($ret);
            LogHelper::Debug(__FUNCTION__.' se instanciaron '.count($arr2ret));
            foreach($arr2ret as $obj2ret) { 
                $obj2ret->IdEstablecimientoObject->__blnSoapObject = true;
                $obj2ret->__blnSoapObject = true;
            }
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Debug('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse . $e);
            throw new QCallerException($lastResponse);
        }
        return false;
    }

    public function TraerLocalizacionesModificadas($offset = null) {
        set_time_limit(0);
        ini_set('default_socket_timeout',600);
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            if (is_null($offset)) {
                $ret = $this->objSoapClient->TraerLocalizacionesModificadas($this->strToken, __FECHA_CORTE__, QApplication::getUltimaArticulacion());
            } else {
                $ret = $this->objSoapClient->TraerLocalizacionesModificadasOffset($this->strToken, __FECHA_CORTE__, QApplication::getUltimaArticulacion(), $offset);
            }
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__.' trajo '.count($ret));
            if(empty($ret)) return $ret;
            $arr2ret = OLTPLocalizacion::GetArrayFromSoapArray($ret);
            LogHelper::Debug(__FUNCTION__.' se instanciaron '.count($arr2ret));
            foreach($arr2ret as $obj2ret) { 
                $obj2ret->IdEstablecimientoObject->__blnSoapObject = true;
                $obj2ret->__blnSoapObject = true;
            }
            return $arr2ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Error('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse . print_r($e,true));
            throw new QCallerException($lastResponse.print_r($e,true));
        }
        return false;
    }
    
    public function CountLocalizacionesModificadas() {
        set_time_limit(0);
        ini_set('default_socket_timeout',600);
        try {
            LogHelper::Debug('inicio pedido '.__FUNCTION__);
            $ret = $this->objSoapClient->CountLocalizacionesModificadas($this->strToken, __FECHA_CORTE__, QApplication::getUltimaArticulacion());
            LogHelper::Debug('fin pedido '.__FUNCTION__);
            LogHelper::Debug(__FUNCTION__.' devolvió '.$ret);
            return $ret;
        } catch (SoapFault $e) {
            $lastResponse = $this->objSoapClient->__getLastResponse();
            LogHelper::Error('SoapFault en '.__FUNCTION__.' de '.__CLASS__.': '. $lastResponse . print_r($e,true));
            throw new QCallerException($lastResponse.print_r($e,true));
        }
        return false;
    }

    
}
?>
