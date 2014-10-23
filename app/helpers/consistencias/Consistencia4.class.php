<?php

class Consistencia4 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque, $blnEjecutarJs = false) {
        self::Ejecutar4_1($objBloque, $blnEjecutarJs);
        self::Ejecutar4_2($objBloque, $blnEjecutarJs);
        self::Ejecutar4_3($objBloque, $blnEjecutarJs);
        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
            self::EjecutarJavascript();
        }

    }

    static public function Ejecutar4_1(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDato('b4_d20_o_1') || $objBloque->GetDato('b4_d20_o_1') == 2)  {
            $objBloque->SetDato('b4_d2011_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2012_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2013_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2014_c_1', 'NoGuardar', true);
        }
    
    }

    static public function Ejecutar4_2(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDato('b4_d21_o_1') || $objBloque->GetDato('b4_d21_o_1') == 2)  {
            $objBloque->SetDato('b4_d2111_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2112_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2113_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2114_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2115_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2116_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2117_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2118_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2119_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d21110_c_1', 'NoGuardar', true);
        }
    
    }
    
    static public function Ejecutar4_3(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDato('b4_d23_o_1') || $objBloque->GetDato('b4_d23_o_1') == 2)  {
            $objBloque->SetDato('b4_d2321_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d2322_c_1', 'NoGuardar', true);
            $objBloque->SetDato('b4_d231_o_1', 'NoGuardar', true);
        }
    }

    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia4_1");';
        $strJs .= 'cc.register_consistencia_event("consistencia4_1_event");';
        $strJs .= 'cc.register_consistencia("consistencia4_2");';
        $strJs .= 'cc.register_consistencia_event("consistencia4_2_event");';
        $strJs .= 'cc.register_consistencia("consistencia4_3");';
        $strJs .= 'cc.register_consistencia_event("consistencia4_3_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia4_1(); cc.consistencia4_2();cc.consistencia4_3();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
