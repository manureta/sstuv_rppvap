<?php

class Consistencia6 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque, $blnEjecutarJs = false) {
        self::Ejecutar6_1($objBloque, $blnEjecutarJs);
        self::Ejecutar6_2($objBloque, $blnEjecutarJs);
        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
            self::EjecutarJavascript();
        }

    }

    static public function Ejecutar6_1(BloqueBase $objBloque, $blnEjecutarJs = false) {
        $arrNoGuardar = array('b6_d261_o_1', 'b6_d262_o_1', "b6_d263_o_1", "b6_d264_o_1", "b6_d265_o_1", "b6_d266_c_1", "b6_d267_n_1", "b6_d268_o_1"); 
        if (!$objBloque->ExistsDato('b6_d26_o_1') || !($objBloque->GetDato('b6_d26_o_1') == 1)) {
            foreach ($arrNoGuardar as $mixIdDato) {
                $objBloque->SetDato($mixIdDato, 'NoGuardar', true);
            }
        }

    }

    static public function Ejecutar6_2(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDato('b5_d25_o_1') || !($objBloque->GetDato('b5_d25_o_1') > 1)) {
            $objBloque->SetDato('b5_d241_o_1', 'NoGuardar', true);
        }

        if ( !$objBloque->ExistsDato('b5_d25_o_1') || !($objBloque->GetDato('b5_d25_o_1') == 2)) {
            $objBloque->SetDato('b5_d252_o_1', 'NoGuardar', true);
        }
   
    }

    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia6_1");';
        $strJs .= 'cc.register_consistencia_event("consistencia6_1_event");';
        $strJs .= 'cc.register_consistencia("consistencia6_2");';
        $strJs .= 'cc.register_consistencia_event("consistencia6_2_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia6_1();';
        $strJs .= 'cc.consistencia6_2();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
