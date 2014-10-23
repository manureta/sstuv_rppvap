<?php

class Consistencia2 extends ConsistenciaBase {
    static public function Ejecutar($mixDatos, $jsonResponse) {
        $jsonResponse = self::Ejecutar2_1($mixDatos, $jsonResponse);
//        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
//            self::EjecutarJavascript();
//        }
        return $jsonResponse;
    }

    static public function Ejecutar2_1($mixDatoArray, $jsonResponse) {
        if (!isset($mixDatoArray->b2_d13_o_1) || !isset($mixDatoArray->b2_d131_o_1)) {
            return $jsonResponse;
        }
        $objDatoViveSolo = $mixDatoArray->b2_d13_o_1;
        $objDatoViveConyuge = $mixDatoArray->b2_d131_o_1;

        $noGuardar = array();
        $errors = array();
        if ($objDatoViveSolo == 1) {
            $noGuardar[] = 'b2_d131_o_1';
            $noGuardar[] = 'b2_d1321_n_1';
            $noGuardar[] = 'b2_d1322_n_1';
            $noGuardar[] = 'b2_d1323_n_1';
            $noGuardar[] = 'b2_d1324_n_1';
        }

        if ($objDatoViveSolo == 2 && $objDatoViveConyuge == 1) {
            $intSuma = (int)$mixDatoArray->b2_d1321_n_1 + 
                (int)$mixDatoArray->b2_d1322_n_1 +
                (int)$mixDatoArray->b2_d1323_n_1 +
                (int)$mixDatoArray->b2_d1324_n_1;
            if ($intSuma < 1) {
                $errors[] = array('id'=>'b2_d1324_n_1', 'ErrorCode' =>'2.1', 'ErrorMessage' => 'La suma de personas del cuadro 13.2 debe ser mayor a 0');
            }
        }
        $jsonResponse['error_controls'] = $errors;
        return $jsonResponse; 
    }

    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia2_1");';
        $strJs .= 'cc.register_consistencia_event("consistencia2_1_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia2_1();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
