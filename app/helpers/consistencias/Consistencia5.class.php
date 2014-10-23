<?php

class Consistencia5 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque, $blnEjecutarJs = false) {
        self::Ejecutar5_1($objBloque, $blnEjecutarJs);
        self::Ejecutar5_2($objBloque, $blnEjecutarJs);
        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
            self::EjecutarJavascript();
        }

    }

    static public function Ejecutar5_1(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDato('b5_d24_o_1') || !($objBloque->GetDato('b5_d24_o_1') > 1))  {
            $objBloque->SetDato('b5_d241_o_1', 'NoGuardar', true);
        }

        if (!$objBloque->ExistsDato('b5_d24_o_1') || !($objBloque->GetDato('b5_d24_o_1') == 2))  {
            $objBloque->SetDato('b5_d242_o_1', 'NoGuardar', true);
        }
     
    }

    static public function Ejecutar5_2(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDato('b5_d25_o_1') || !($objBloque->GetDato('b5_d25_o_1') > 1)) {
            $objBloque->SetDato('b5_d241_o_1', 'NoGuardar', true);
        }

        if (!$objBloque->ExistsDato('b5_d25_o_1') || !($objBloque->GetDato('b5_d25_o_1') == 2)) {
            $objBloque->SetDato('b5_d252_o_1', 'NoGuardar', true);
        }
   
    }

    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia5_1");';
        $strJs .= 'cc.register_consistencia_event("consistencia5_1_event");';
        $strJs .= 'cc.register_consistencia("consistencia5_2");';
        $strJs .= 'cc.register_consistencia_event("consistencia5_2_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia5_1();';
        $strJs .= 'cc.consistencia5_2();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
