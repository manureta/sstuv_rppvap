<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VerifficarHelper
 *
 * @author jose
 */
abstract class VerificarHelper {

    /**
     * recorro los DatosCapitulo del Cuadernillo y Corro las validaciones,
     * si el estado no es completo o completo con inconsistencias falla y deja 
     * el estado calculado.
     * @param DatosCuadernillo $objDatosCapitulo
     * @return boolean 
     */    
    public static function VerificarCuadernillo(DatosCuadernillo $objDatosCuadernillo){
        $blnSinError = true;
        foreach ($objDatosCuadernillo->DatosCapituloAsIdArray as $objDatosCapitulo) {
            // actualizo el estado
            self::VerificarCapitulo($objDatosCapitulo);
            $objDatosCapitulo->ActualizarEstado();

            //chequeo que es estado a ver si esta correcto
            if(!in_array($objDatosCapitulo->CEstado, array(EstadoType::Completoconinconsistencias,
                                                           EstadoType::Completo))){
                $blnSinError = false;
            }
        }
        if($blnSinError){
            $objDatosCuadernillo->CEstado = EstadoType::Verificado;
            $objDatosCuadernillo->Save();
        } else {
            $objDatosCuadernillo->ActualizarEstado();
        }
        return $blnSinError;
    }

    /**
     * Recorre los cuadro y los valida, si encuentra uno 
     * que no este ni sin informacion ni completo ni completo sin inconsistencias
     * devuelve false guardando los estados calculados de todos los cuadros
     * @param DatosCapitulo $objDatosCapitulo
     * @return boolean
     */
    public static function VerificarCapitulo(DatosCapitulo $objDatosCapitulo){
        $blnSinError = true;
        foreach ($objDatosCapitulo->GetDatosCuadroAsIdArray() as $objDatosCuadro) {
            if($objDatosCuadro->CEstado == EstadoType::SinInformacion) {
                if (count($objDatosCuadro->DatosCeldaAsIdArray) || $objDatosCuadro->IdDefinicionCuadroObject->Obligatorio) {
                    $objDatosCuadro->CEstado = EstadoType::Modificado;
                }
            }
            // valido el cuadro y guardo el estado si hay cambios... si no esta marcado como sin_info
            if($objDatosCuadro->CEstado != EstadoType::SinInformacion){
                $objCuadroDao = new CuadroDAO($objDatosCuadro);
                $objCuadro = $objCuadroDao->Cuadro;
                $objCuadro->Validate(true);
                $objCuadroDao->SaveCuadro(true);
            }
            // si el estado es con error marco el flag
            if (!in_array($objDatosCuadro->CEstado, array(EstadoType::Completo,
                                                          EstadoType::Completoconadvertencias,
                                                          EstadoType::SinInformacion)))
                $blnSinError = false;
        }
        return $blnSinError;
    }
}

?>
