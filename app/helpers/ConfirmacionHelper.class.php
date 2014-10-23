<?php


abstract class ConfirmacionHelper{

    public static function Confirmar($arrDatosCuadernillo){

        $blnOmitidos = false;
        foreach($arrDatosCuadernillo as $objDatosCuadernillo){
            //if(!in_array($objDatosCuadernillo->CEstado, array(EstadoType::Verificado, EstadoType::Completo))) {
                if (!VerificarHelper::VerificarCuadernillo($objDatosCuadernillo)) {
                    $blnOmitidos = true;
                    continue;
                }
            //}
            $objDatosCuadernillo->CEstado = EstadoType::Confirmado;
            $objDatosCuadernillo->Save();
            $objDatosCuadernillo->IdLocalizacionObject->ActualizarEstado();
        }

        // Devuelvo true si se confirmaron todos, y false si hubo algún cuadernillo que no se pudo confirmar
        return !$blnOmitidos;
    }


    public static function Desconfirmar($arrDatosCuadernillo){
        foreach($arrDatosCuadernillo as $objDatosCuadernillo){
            $objDatosCuadernillo->Desconfirmar();
        }
    }
}
?>
