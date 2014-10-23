<?php
/* Migra el cuadro Integracion por Edad 28 (541),,30(543) */
abstract class MigracionIntegracionEdad extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {

        //Pasantia Común
        //Formacion Prof Adultos

        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->IsEmpty()) continue;
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();

            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada,  self::GetModalidad($objFila));

           // $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());

            $objIntegracion = self::GetIntegracion( $objOfertaDictada->IdOfertaDictada,
                    self::GetIntegTipo($objCuadro));
             $objCelTotal = $objFila->GetCeldaByIdColumna(5);
            $objCelVarones = $objFila->GetCeldaByIdColumna(7);
            $objIntegracion->Total = $objCelTotal->Valor;
            $objIntegracion->Varones = $objCelVarones->Valor;
            $objIntegracion->Save();
            //Integrados





            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != 'edad_tipo')
                    continue;
                $objCelEdad = $objFila->GetCelda($objColumna);
                if ($objCelEdad->Valor) {
                    //  integracion simultanea = 1
                    $objEdad = self::GetEdad( $objOfertaDictada->IdOfertaDictada ,
                            self::GetIntegTipo($objCuadro),
                            $objColumna->CodigoRelacional);
                    $objEdad->Total = $objCelEdad->Valor;
                    LogHelper::Debug(sprintf('Guardando Edad :: | Edad: %s | Valor: %d',
                            $objColumna->CodigoRelacional, $objCelEdad->Valor));
                    $objEdad->Save();
                    //Integrados X Edad

                }
            }
        }
    }

    public static function GetIntegracion($intIdOfertaDictada, $intCIntegracion) {
        $objIntegracion = OLTPIntegrados::LoadByIdOfertaDictadaCIntegracion($intIdOfertaDictada, $intCIntegracion);
        if (!$objIntegracion) {
            $objIntegracion = new OLTPIntegrados();
            $objIntegracion->IdOfertaDictada = $intIdOfertaDictada;
            $objIntegracion->CIntegracion =  $intCIntegracion ;
        }
        return $objIntegracion;
    }

    public static function GetEdad($intIdOfertaDictada, $intCIntegracion, $intCEdad) {
        $objIntegEdad = OLTPIntegradosEdad::LoadByIdOfertaDictadaCIntegracionCEdad($intIdOfertaDictada, $intCIntegracion, $intCEdad);
        if (!$objIntegEdad) {
            $objIntegEdad = new OLTPIntegradosEdad();
            $objIntegEdad->IdOfertaDictada = $intIdOfertaDictada;
            $objIntegEdad->CIntegracion = $intCIntegracion;
            $objIntegEdad->CEdad = $intCEdad;

        }
        return $objIntegEdad;
    }

    public static function GetIntegTipo($objCuadro) {
        /*
              cuadro integracion Simultanea = 1
              integracion Apoyo = 2
        */

        switch ($objCuadro->IdCuadro) {

            case 541:     // 28
                return 1; //

            case 543:     // 30
                return 2; //
        }
    }



    public static function GetModalidad($objFila) {
        /*
          educacion comun= 1
          educacion adultos = 3
        */

        switch ($objFila->IdFila) {
            case 208: // Inicial
            case 379: // Primario
            case 509: // EGB 1/2
            case 275: // EGB 3
            case 313: // Secundario / Medio
            case 314: // Polimodal
            case 554: // Superior
                return 1;
            case 555: // Primario EGB/ Adultos
            case 556: // Medio Polimodal / Adultos
            case 557: // Residencia Laboral /Pasantías /artística
            case 558: // Formación Profesional
                return 3;
        }
    }

}

?>

