<?php

/**
 * Poblacion
 * Migra el cuadro Jornada
 */
abstract class MigracionJornada extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar(CuadroBase $objCuadro) {

        foreach ($objCuadro->GetFilas() as $objFila) {
             $intCOfertaAgregada = ($objFila->TablaTipo == 'oferta_agregada_tipo') ? $objFila->CodigoRelacional : $objCuadro->GetCOfertaAgregada();

            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());

            $objCeldaHorasExtendida = $objFila->GetCeldaByIdColumna(134);
            $objCeldaAlumExtendida = $objFila->GetCeldaByIdColumna(28);
            $objCeldaHorasCompleta = $objFila->GetCeldaByIdColumna(29);
            $objCeldaAlumCompleta = $objFila->GetCeldaByIdColumna(135);


            if ($objCeldaHorasExtendida->Valor) {
                $objJornadaExtendida = self::GetJornada($objOfertaDictada->IdOfertaDictada, 4);
                $objJornadaExtendida->Horas = $objCeldaHorasExtendida->Valor;
                $objJornadaExtendida->Alumnos = $objCeldaAlumExtendida->Valor;
                $objJornadaExtendida->Save();
            }
            if ($objCeldaHorasCompleta->Valor) {
                $objJornadaCompleta = self::GetJornada($objOfertaDictada->IdOfertaDictada, 2);
                $objJornadaCompleta->Alumnos = $objCeldaAlumCompleta->Valor;
                $objJornadaCompleta->Horas = $objCeldaHorasCompleta->Valor;
                $objJornadaCompleta->Save();
            }
        }
    }

    public static function GetJornada($intIdOfertaDictada, $intCJornada) {
        $objJornada = OLTPJornada::LoadByIdOfertaDictadaCJornada($intIdOfertaDictada, $intCJornada);
        if (!$objJornada) {
            $objJornada = new OLTPjornada();
            $objJornada->IdOfertaDictada = $intIdOfertaDictada;
            $objJornada->CJornada = $intCJornada;
        }
        return $objJornada;
    }

}

?>
