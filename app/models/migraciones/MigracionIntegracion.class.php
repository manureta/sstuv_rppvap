<?php
/* Migra el cuadro Integracion 27 (540),,29(542) */
abstract class MigracionIntegracion extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {

        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->IsEmpty()) continue;
            $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, self::GetModalidad($objFila));
            $objIntegracion = self::GetIntegracion( $objOfertaDictada->IdOfertaDictada,
                    self::GetIntegTipo($objCuadro));
            $objCelTotal = $objFila->GetCeldaByIdColumna(5);
            $objCelVarones = $objFila->GetCeldaByIdColumna(7);
            $objIntegracion->Total = $objCelTotal->Valor;
            $objIntegracion->Varones = $objCelVarones->Valor;
            $objIntegracion->Save();
            //Integrados


            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != 'discapacidad_tipo')
                    continue;
                $objCelDiscapacidad = $objFila->GetCelda($objColumna);
                if ($objCelDiscapacidad->Valor) {
                    //  integracion simultanea = 1
                    $objDiscapacidad = self::GetDiscapacidad( $objOfertaDictada->IdOfertaDictada ,
                            self::GetIntegTipo($objCuadro),
                            $objColumna->CodigoRelacional);
                    $objDiscapacidad->Total = $objCelDiscapacidad->Valor;
                    LogHelper::Debug(sprintf('Guardando Discapcidadad :: | Discapacidad: %s | Valor: %d',
                            $objColumna->CodigoRelacional, $objCelDiscapacidad->Valor));
                    $objDiscapacidad->Save();
                    //Integrados X DISCAPACIDAD

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


    public static function GetDiscapacidad($intIdOfertaDictada, $intCIntegracion, $intCDiscapacidad) {
        $objIntegDiscap = OLTPIntegradosDiscapacidad::LoadByIdOfertaDictadaCIntegracionCDiscapacidad($intIdOfertaDictada, $intCIntegracion, $intCDiscapacidad);
        if (!$objIntegDiscap) {
            $objIntegDiscap = new OLTPIntegradosDiscapacidad();
            $objIntegDiscap->IdOfertaDictada = $intIdOfertaDictada;
            $objIntegDiscap->CIntegracion = $intCIntegracion;
            $objIntegDiscap->CDiscapacidad = $intCDiscapacidad;

        }
        return $objIntegDiscap;
    }

    public static function GetIntegTipo($objCuadro) {
        /*
              cuadro integracion Simultanea = 1
              integracion Apoyo = 2
        */

        switch ($objCuadro->IdCuadro) {
            case 540: return 1; // 27
            case 542: return 2; // 29
        }
    }



    public static function GetModalidad($objFila) {
        /*
          educacion comun= 1
          educacion adultos = 3
         */

        switch ($objFila->IdFila) {
            case 208:
            case 379:
            case 509:
            case 275:
            case 313:
            case 314:
            case 554:
                return 1;
            case 555:
            case 556:
            case 557:
            case 558:
                return 3;
        }
    }

}

?>
