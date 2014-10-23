<?php
/**
 * Horas
 * Migra el cuadro de Horas Cátedra
 */
abstract class MigracionHoras extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar(CuadroBase $objCuadro) {

        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != 'planta_tipo') continue;
                $objCelHoras = $objFila->GetCelda($objColumna);
                if ($objCelHoras->Valor != '') {
                    $objHoras = self::GetHoras($objOfertaDictada->IdOfertaDictada,
                                    self::GetCDestinoDocente($objFila),
                                    $objColumna->CodigoRelacional);
                    $objHoras->Horas = $objCelHoras->Valor;
                    $objHoras->Save();
                }
            }
        }
    }

    /**
     * Toma los identificadores de horas y devuelve el objeto. Si no existe lo crea.
     * @param integer $intIdOfertaDictada
     * @param integer $intCDestinoDocente
     * @param integer $intCPlanta
     * @return OLTPHoras
     */
    public static function GetHoras($intIdOfertaDictada,$intCDestino,$intCPlanta ) {
        $objHoras = OLTPHoras::LoadByIdOfertaDictadaCDestinoDocenteCPlanta($intIdOfertaDictada, $intCDestino, $intCPlanta);
        if (!$objHoras) {
            $objHoras = new OLTPHoras();
            $objHoras->IdOfertaDictada = $intIdOfertaDictada;
            $objHoras->CDestinoDocente = $intCDestino;
            $objHoras->CPlanta = $intCPlanta;
        }
        return $objHoras;
    }

    /**
     * De acuerdo a la fila devuelve el Destino Docente
     * @param Fila $objFila
     * @return integer $intCDestinoDocente
     */
    public static function GetCDestinoDocente(Fila $objFila) {
        if ($objFila->TablaTipo == 'destino_docente_tipo') return $objFila->CodigoRelacional;
        //hack para el caso del cuadro de horas cátedra no destinadas al dictado de clases de EGB3
        if ($objFila->Cuadro->IdCuadro == 152 && $objFila->IdFila == 611) return 19;
        // Para el caso del cuadro de horas de EGB3, la fila tiene código de cargo_tipo, entonces hago un switch
        switch ($objFila->IdFila) {
            case 288: return 11;// "Séptimo año exclusivo"
            case 289: return 12;// "Octavo año exclusivo"
            case 290: return 13;// "Noveno año exclusivo"
            case 291: return 14;// "No exclusivos de un año de estudio"
        }
        throw new MigrationException ('No se encuentra el destino docente de la fila '.$objFila->IdFila, $objFila->Cuadro);
    }

}
?>
