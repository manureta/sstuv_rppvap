<?php

class Consistencia1 extends ConsistenciaBase {
    static public function Ejecutar(BloqueBase $objBloque) {
        self::Ejecutar1_1($objBloque);
        self::Ejecutar1_2($objBloque);
    }
    
    

    static public function Ejecutar1_1(BloqueBase $objBloque) {
        if (!$objBloque->GetDato('b1_d5_d_1')) {
            return;
        }
        $objDato1 = $objBloque->GetDatoObject('b1_d5_d_1');
        $intDiffYear = self::CalcularAnios($objDato1);
        if ($intDiffYear < 16 || $intDiffYear > 70) {
            $objBloque->SetDato('b1_d5_d_1', 'ErrorCode', '1.1');
            $objBloque->SetDato('b1_d5_d_1', 'ErrorMessage', 'La edad no puede ser menor a 16 o mayor a 70.');
        }

    }

    static public function Ejecutar1_2(BloqueBase $objBloque) {
        if (!$objBloque->ExistsDatos('b1_d3_n_1|b1_d4_n_1'))  {
            return;
        }
        $objDatoDni = $objBloque->GetDatoObject('b1_d3_n_1'); 
        $objDatoCuit = $objBloque->GetDatoObject('b1_d4_n_1'); 

        if ($objDatoCuit->Value && substr($objDatoCuit->Value, 2, 8) != $objDatoDni->Value) {
            $objBloque->SetDato('b1_d3_n_1', 'ErrorCode', '1.2');
            $objBloque->SetDato('b1_d3_n_1', 'ErrorMessage', 'Dni o Cuit incorrectos. Uno de los dos debe ser corregido, o dejar uno en blanco.');
        }

    }

}
