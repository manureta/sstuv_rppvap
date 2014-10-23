<?php

class Consistencia7 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque, $blnEjecutarJs = false) {
        self::Ejecutar7_1($objBloque, $blnEjecutarJs);
        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
            self::EjecutarJavascript();
        }

    }

    static public function Ejecutar7_1(BloqueBase $objBloque, $blnEjecutarJs = false) {
        /*
        $arrNoGuardar = array('b6_d261_o_1', 'b6_d262_o_1', "b6_d263_o_1", "b6_d264_o_1", "b6_d265_o_1", "b6_d266_c_1", "b6_d267_n_1", "b6_d268_o_1"); 
        if (!$objBloque->ExistsDato('b6_d26_o_1') || !($objBloque->GetDato('b6_d26_o_1') == 1)) {
            foreach ($arrNoGuardar as $mixIdDato) {
                $objBloque->SetDato($mixIdDato, 'NoGuardar', true);
            }
        }*/

    }


    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia7_1");';
        $strJs .= 'cc.register_consistencia_event("consistencia7_1_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia7_1();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
