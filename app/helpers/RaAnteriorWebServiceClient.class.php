<?php
class RaAnteriorWebServiceClient extends DinieceAppWebServiceClient {

        function GetWsdlUri() {
            return (defined('__WEBSERVICE_RA_ANTERIOR_SOAP_TNS__')) ? 
                __WEBSERVICE_RA_ANTERIOR_SOAP_TNS__ :
                "http://localhost/ra2012/WebService.php?wsdl";
        }

        function TraerDatosCuadro($l, $c) {
            return $this->objSoapClient->TraerDatosCuadro($this->strToken, $l, $c);
        }

}
?>
