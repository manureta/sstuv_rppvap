<?php

class Consistencia9 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque, $blnEjecutarJs = false) {
        self::Ejecutar9_1($objBloque, $blnEjecutarJs);
        self::Ejecutar9_2($objBloque, $blnEjecutarJs);
        self::Ejecutar9_3($objBloque, $blnEjecutarJs);
        self::Ejecutar9_4($objBloque, $blnEjecutarJs);
        self::Ejecutar9_5($objBloque, $blnEjecutarJs);
        self::Ejecutar9_6($objBloque, $blnEjecutarJs);
        if ($blnEjecutarJs && PHP_SAPI != 'cli') {
            self::EjecutarJavascript();
        }

    }

    static public function Ejecutar9_1(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if ($objBloque->GetDato('b9_d30_n_1','')=='') {
            return;
        }
        
        $intAniosTotalesTrabajados = 0;
        if (!is_int(($intAniosTotalesTrabajados=(int)$objBloque->GetDato('b9_d30_n_1')))) {
            $objBloque->SetDato('b9_d30_n_1', 'ErrorCode', '9.1.1');
            $objBloque->SetDato('b9_d30_n_1', 'ErrorMessage', 'El valor no es un número válido.');
            return;
        }
        
        $objBloqueDato = BloqueBase::GetBloqueDatoArray($objBloque->IdPersona, "1","b1_d5_d_1");
        if (! ( $objBloqueDato!="" && $objBloqueDato!=null ) ) {
            $objBloque->SetDato('b9_d30_n_1', 'ErrorCode', '9.1.2');
            $objBloque->SetDato('b9_d30_n_1', 'ErrorMessage', 'Debe completar la Página 1 Item 5. Fecha de nacimiento ');
            return;
        }
        
        $strDatoFNac = $objBloqueDato; //5. Fecha de nacimiento
        $intEdad = self::CalcularAnios($strDatoFNac);
        $intRestYears = $intEdad - $intAniosTotalesTrabajados;
        if ( $intRestYears < 15 ) {
            $objBloque->SetDato('b9_d30_n_1', 'ErrorCode', '9.1.3');
            $objBloque->SetDato('b9_d30_n_1', 'ErrorMessage', 'La diferencia entre su edad ('.$intEdad.' años) (Declarado en: Página 1 Item 5. Fecha de nacimiento) y los años totales de trabajo no puede ser menor a 15.');
        }
    }
    
    static public function Ejecutar9_2(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDatos('b9_d301_n_1|b9_d30_n_1')) {
            return;
        }
        
        $intAniosTotalesTrabajados = 0;
        if ((int)$objBloque->GetDato('b9_d301_n_1') >= (int)$objBloque->GetDato('b9_d30_n_1') ) {
            $objBloque->SetDato('b9_d301_n_1', 'ErrorCode', '9.2.1');
            $objBloque->SetDato('b9_d301_n_1', 'ErrorMessage', 'El valor ingresado debe ser un número menor a la pregunta 30.');
            return;
        }
    }
    
    static public function Ejecutar9_3(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDatos('b9_d302_n_1|b9_d30_n_1')) {
            return;
        }
        
        $intAniosTotalesTrabajados = 0;
        if ((int)$objBloque->GetDato('b9_d302_n_1') >= (int)$objBloque->GetDato('b9_d30_n_1') ) {
            $objBloque->SetDato('b9_d302_n_1', 'ErrorCode', '9.2.1');
            $objBloque->SetDato('b9_d302_n_1', 'ErrorMessage', 'El valor ingresado debe ser un número menor a la pregunta 30.');
            return;
        }
    }
    
    static public function Ejecutar9_4(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDatos('b9_d302_n_1|b9_d30_n_1')) {
            return;
        }
        
        $intAniosTotalesTrabajados = 0;
        if ((int)$objBloque->GetDato('b9_d302_n_1') >= (int)$objBloque->GetDato('b9_d30_n_1') ) {
            $objBloque->SetDato('b9_d302_n_1', 'ErrorCode', '9.2.1');
            $objBloque->SetDato('b9_d302_n_1', 'ErrorMessage', 'El valor ingresado debe ser un número menor a la pregunta 30.');
            return;
        }
    }
    
    static public function Ejecutar9_5(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDatos('b9_d31_o_1')) {
            return;
        }
        if ($objBloque->GetDato('b9_d31_o_1') == 2) {
            $objBloque->SetDato('b9_d32_n_1', 'NoGuardar', true);
        }
    }
    
    static public function Ejecutar9_6(BloqueBase $objBloque, $blnEjecutarJs = false) {
        if (!$objBloque->ExistsDatos('b9_d36_n_1')) {
            return;
        }
        if ((int)$objBloque->GetDato('b9_d36_n_1') < 1) {
            $objBloque->SetDato('b9_d36_n_1', 'Value', 0);
        }
    }
    
    static public function RegisterConsistenciaJavascript($blnReturn = false) {
        $strJs = 'cc.register_consistencia("consistencia9_5");';
        $strJs .= 'cc.register_consistencia_event("consistencia9_5_event");';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

    static public function EjecutarJavascript($blnReturn = false) {
        $strJs = 'cc.consistencia9_5();';
        if ($blnReturn) {
            return $strJs;
        } else {
            QApplication::ExecuteJavascript($strJs);
        }
    }

}
