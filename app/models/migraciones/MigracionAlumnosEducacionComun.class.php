<?php
/**
* AlumnosEducacionComun
* Migracion de cuadro de Alumnos matriculados en ciclo de enseñanza según su asistencia a la educación común
*/
abstract class MigracionAlumnosEducacionComun extends MigracionBase {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsIncomplete())continue;
            $intCOfertaAgregada = $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
            $objTotal = $objFila->GetCeldaByIdColumna(5);
            $objVarones = $objFila->GetCeldaByIdColumna(7);
             if (in_array($objCuadro->IdDefinicionCuadro, array(674,376))) {
                $intAsist =  self::GetAsistencia($objFila);

            } else {
                $intAsist =  $objFila->CodigoRelacional;
            }
            $objAlumnosEC = self::GetAlumnosEducacionComun($objOfertaDictada->IdOfertaDictada, $intAsist);
            $objAlumnosEC->Total = $objTotal->Valor ? $objTotal->Valor : 0;
            $objAlumnosEC->Varones = $objVarones->Valor ? $objVarones->Valor : 0;
            LogHelper::Debug(sprintf('Guardando AlumnosEducacionComun :: Localizacion: %s | IdOfertaDictada: %s | Asistencia: %s | Total: %d | Varones: %d',
                $objCuadro->Localizacion->Cueanexo,
                $objAlumnosEC->IdOfertaDictada,
                $objAlumnosEC->CAsistenciaObject->Descripcion,
                $objAlumnosEC->Total,
                $objAlumnosEC->Varones));
            $objAlumnosEC->Save();
        }
    }

    public static function GetAlumnosEducacionComun($intIdOfertaDictada, $intCAsistencia) {
        $objAlumnosEC = OLTPAlumnosEducacionComun::LoadByIdOfertaDictadaCAsistencia($intIdOfertaDictada, $intCAsistencia);
        if (!$objAlumnosEC) {
            $objAlumnosEC = new OLTPAlumnosEducacionComun();
            $objAlumnosEC->IdOfertaDictada = $intIdOfertaDictada;
            $objAlumnosEC->CAsistencia = $intCAsistencia;
        }
        return $objAlumnosEC;
    }

     public static function GetAsistencia(Fila $objFila) {
         switch($objFila->IdFila) {

        case 508: // Asisten al nivel Inicial
            return 4;
        case 274 : // Asisten a Primaria de 7 años 
            return 5;
        case 273 : // Primario de 6 /EGB 1 y 2 
            return 6;
        case 275: // Asisten a EGB3
             return 7;
        case 313: // Medio y secundario
             return 8;
        case 379 : // Primario de 7 (cuadro 588)
             return 5;
        case 314: // Polimodal
             return 9;
        case 509: // Primario de 6/EGB 1 y 2 
             return 6;
        case 555: // Primario Adultos
        case 510: // Primario Adultos
             return 10;
        case 556: // Medio Adultos
        case 511: // Medio Adultos
            return 11;
        case 491: // Otros Servicios
            return 12;
        case 679: // No asisten a otro Establecimiento Educativo
            return 13;
        }
        throw new MigrationException("No se pudo encontrar el código de Asistencia para la fila $objFila->IdDefinicionFila");
     }
   

}
?>
