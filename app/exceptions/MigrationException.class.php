<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MigrationException extends QCallerException {
    // TODO MENSAJE DE ERROR
    public function __construct($strMensaje, CuadroBase $objCuadro = null) {
        // Si no hay cuadro muestro el mensaje como viene
        if(!$objCuadro)
            return parent::__construct($strMensaje);
        
        // Si hay cuadro pongo la info adicional
        $objDatosCuadro = DatosCuadro::LoadSingleByIdDefinicionCuadroIdLocalizacion($objCuadro->IdDefinicionCuadro, $objCuadro->Localizacion->IdLocalizacion);
        $strCuadernillo = $objDatosCuadro->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernilloObject->Nombre;
        $strCueanexo = $objCuadro->Localizacion->Cueanexo;
        $strCuadroNumero = $objCuadro->Numero;
        $strLocalizacion = $objCuadro->Localizacion->IdLocalizacion;
        $str = sprintf('%s | Localización: %s CUE-Anexo: %s Cuadernillo: %s Cuadro: %s',$strMensaje,$strLocalizacion,$strCueanexo,$strCuadernillo,$strCuadroNumero);
        parent::__construct($str);
    }
}

?>
