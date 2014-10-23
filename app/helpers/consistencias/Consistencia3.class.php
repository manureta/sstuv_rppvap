<?php

class Consistencia3 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque, $blnEjecutarJs = false) {
        self::Ejecutar3_1($objBloque, $blnEjecutarJs);
        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
            self::EjecutarJavascript();
        }

    }

    static public function Ejecutar3_1(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (($objDatoCompu=$objBloque->GetDatoObject('b3_d154_c_4'))) {

            if ($objDatoCompu->Value == 4 && $objBloque->ExistsDatos('b3_d152_o_1|b3_d153_o_1|b3_d151_o_1') ) {
                if ($objBloque->GetDato('b3_d151_o_1') < ($objBloque->GetDato('b3_d152_o_1') + $objBloque->GetDato('b3_d153_o_1'))) {
                    $objBloque->SetDato('b3_d153_o_1', 'ErrorCode', '3.1');
                    $objBloque->SetDato('b3_d153_o_1', 'ErrorMessage', 'Las Computadoras otorgadas no puede ser mayor al total de computadoras');
                }
            }
        } else {
            $objBloque->SetDato('b3_d151_o_1', 'NoGuardar', true);
            $objBloque->SetDato('b3_d152_o_1', 'NoGuardar', true);
            $objBloque->SetDato('b3_d153_o_1', 'NoGuardar', true);
        }

    }

    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia3_1");';
        $strJs .= 'cc.register_consistencia_event("consistencia3_1_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia3_1();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
