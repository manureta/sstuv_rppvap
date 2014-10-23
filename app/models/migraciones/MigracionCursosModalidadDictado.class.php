<?php
/**
* CursosModalidadDictado
* Migracion de cuadro de Cursos por Modalidad de Dictado
*/
abstract class MigracionCursosModalidadDictado extends MigracionBase {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            $intCOfertaAgregada = $objCuadro->GetCOfertaAgregada();
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
            $objCantidad = $objFila->GetCeldaByIdColumna(396);
            $objCursos = self::GetCursosModalidadDictado($objOfertaDictada->IdOfertaDictada, $objFila->CodigoRelacional);
            $objCursos->Total = $objCantidad->Valor ? $objCantidad->Valor : 0;
            LogHelper::Debug(sprintf('Guardando CursosModalidadDictado :: Localizacion: %s | IdOfertaDictada: %s | Dictado: %s | Total: %d',
                $objCuadro->Localizacion->Cueanexo,
                $objCursos->IdOfertaDictada,
                $objCursos->CDictadoObject->Descripcion,
                $objCursos->Total));
            $objCursos->Save();
        }
    }

    public static function GetCursosModalidadDictado($intIdOfertaDictada, $intCDictado) {
        $objCursos = OLTPCursosModalidadDictado::LoadByIdOfertaDictadaCDictado($intIdOfertaDictada, $intCDictado);
        if (!$objCursos) {
            $objCursos = new OLTPCursosModalidadDictado();
            $objCursos->IdOfertaDictada = $intIdOfertaDictada;
            $objCursos->CDictado = $intCDictado;
        }
        return $objCursos;
    }
}
?>
