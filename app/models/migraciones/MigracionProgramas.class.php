<?php

/* Migra el cuadro Programas y proyectos  por nivel en los que las unidades educativas está incluida */

abstract class MigracionProgramas extends MigracionBase {

    public static function Ejecutar(CuadroBase $objCuadro) {
        $objOfertaDictada = self::GetOfertaDictadabyCuadro($objCuadro);
       //para cuadro Naranja Formacion Profesional 1 sola columna
        if ($objCuadro->IdDefinicionCuadro==621 or $objCuadro->IdDefinicionCuadro==677 or $objCuadro->IdDefinicionCuadro==678) {
            foreach ($objCuadro->GetFilas() as $objFila) {
                $objCelProgramas = $objFila->GetCeldaByIdColumna(418);
                 if ($objCelProgramas->Valor !='') {
                $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion,
                $objCuadro->GetCOfertaAgregada(), $objCuadro->GetCModalidad1());
                $objProgramasproy = self::GetProgramas($objOfertaDictada->IdOfertaDictada, $objCelProgramas->Valor);
                $objProgramasproy->Save();
               }
            }
            return;
        }
      
        //para cuadro de superior (que tiene organismo financiador)
        if ($objCuadro->IdDefinicionCuadro == 391) {
            foreach ($objCuadro->GetFilas() as $objFila) {

                $objCelProgramas = $objFila->GetCeldaByIdColumna(436);
                if ($objCelProgramas->Valor !='') {
                $objCelOrganismoFinanciador = $objFila->GetCeldaByIdColumna(437);
                $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion,
                        $objCuadro->GetCOfertaAgregada(), $objCuadro->GetCModalidad1());
                $objProgramasproy = self::GetProgramas($objOfertaDictada->IdOfertaDictada, $objCelProgramas->Valor);
                $objProgramasproy->OrganismoFinanciador = $objCelOrganismoFinanciador->Valor;
                $objProgramasproy->Save();
                 }
                }
            return;
        }

        //para cuadros con columnas de oferta agregada
        foreach ($objCuadro->GetFilas() as $objFila) {
            $objCelProgramas = $objFila->GetCeldaByIdColumna(249);
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != 'oferta_agregada_tipo') continue;
                //$intCOfertaAgregada = ($objColumna->TablaTipo == 'oferta_agregada_tipo') ? $objColumna->CodigoRelacional : $objCuadro->GetCOfertaAgregada();
                $objCelOfertaAgregada = $objFila->GetCelda($objColumna);
                if ($objCelOfertaAgregada->Valor == 'on') {
                    $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $objColumna->CodigoRelacional, $objCuadro->GetCModalidad1());
                    $strProgramas = $objCelProgramas->Valor;
                    $objProgramasproy = self::GetProgramas($objOfertaDictada->IdOfertaDictada, $strProgramas);
                    $objProgramasproy->Save();
                }
            }
        }
    }

    //}

    public static function GetProgramas($intIdOfertaDictada, $strPrograma) {
        //$objProgramasproy= self::GetProgramas($objOfertaDictada->IdOfertaDictada, $strPrograma);
        $objProgramasproy = OLTPProgramas::LoadByIdOfertaDictadaPrograma($intIdOfertaDictada, $strPrograma);
        if (!$objProgramasproy) {
            $objProgramasproy = new OLTPProgramas();
            $objProgramasproy->IdOfertaDictada = $intIdOfertaDictada;
            $objProgramasproy->Programa = $strPrograma;
        }
        return $objProgramasproy;
    }
}
?>
