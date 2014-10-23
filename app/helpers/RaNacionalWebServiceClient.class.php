<?php
/**
 * Description of RaNacionalWebServiceClientclass
 *
 * @author jose
 */
class RaNacionalWebServiceClient extends DinieceAppWebServiceClient {


    public function CambiarClave($strUsuario,$strPassword, $strNewPassword){
        try{
            return $this->objSoapClient->CambiarPassword($strUsuario,$strPassword, $strNewPassword);
        }catch(Exception $e){
            QApplication::DisplayAlert($this->objSoapClient->__getLastResponse());
        }
        return false;
    }


}
?>
