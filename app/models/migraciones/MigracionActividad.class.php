<?php

/**
 * Actividad
 * Migra el cuadro Personal en actividad con designación docente
 */
abstract class MigracionActividad extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {
        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCActividadDocente = $objFila->CodigoRelacional;
            if (!$intCActividadDocente) {
                LogHelper::Error('No se encuentra el código relacional de actividad docente en la fila '.$objFila->IdFila);
                continue;
            }
            $objCelTotal = $objFila->GetCelda($objCuadro->GetColumna(5));
            $objCelVarones = $objFila->GetCelda($objCuadro->GetColumna(7));
            if ($objCelTotal->Valor) {
                $objActividad = self::GetActividad($objOfertaDictada->IdOfertaDictada, $intCActividadDocente);
                $objActividad->Total = $objCelTotal->Valor;
                $objActividad->Varones = $objCelVarones->Valor;
                LogHelper::Debug(sprintf('Guardando Alumnos :: Oferta: %s | Actividad: %s | Total: %d | Varones: %d', 
                    $objOfertaDictada->COfertaAgregadaObject->Descripcion,
                    $intCActividadDocente, $objCelTotal->Valor, $objCelVarones->Valor));
                $objActividad->Save();
            }
        }
        return true;
    }

    public static function GetActividad($intIdOfertaDictada, $intCActividadDocente) {
        $objActividad = OLTPActividad::LoadByIdOfertaDictadaCActividadDocente($intIdOfertaDictada, $intCActividadDocente);
        if (!$objActividad) {
            $objActividad = new OLTPActividad();
            $objActividad->IdOfertaDictada = $intIdOfertaDictada;
            $objActividad->CActividadDocente = $intCActividadDocente;
        }
        return $objActividad;
    }

}

?>
