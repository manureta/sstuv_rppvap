<?php
/**
 * Horas
 * Migra el cuadro de Horas Cátedra
 */
abstract class MigracionModulos extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {

        //obtener oferta dictada
        $objOfertaDictada = self::GetOfertaDictadaByCuadro($objCuadro);

        foreach ($objCuadro->GetFilas() as $objFila) {
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != 'planta_tipo') continue;
                $objCelModulos = $objFila->GetCelda($objColumna);
                if ($objCelModulos->Valor) {
                    $objModulos = self::GetModulos($objOfertaDictada->IdOfertaDictada,
                                    $objFila->CodigoRelacional,
                                    $objColumna->CodigoRelacional);

                    $objModulos->Modulos = $objCelModulos->Valor;
                    $objModulos->Save();
                }
            }
        }
    }

    /**
     * Toma los identificadores de horas y devuelve el objeto. Si no existe lo crea.
     * @param integer $intIdOfertaDictada
     * @param integer $intCDestinoDocente
     * @param integer $intCPlanta
     * @return OLTPModulos
     */
    public static function GetModulos($intIdOfertaDictada,$intCDestinoDocente, $intCPlanta) {

         $objModulos = OLTPModulos::LoadByIdOfertaDictadaCDestinoDocenteCPlanta($intIdOfertaDictada, $intCDestinoDocente, $intCPlanta);
         if (!$objModulos) {
            $objModulos = new OLTPModulos();
            $objModulos->IdOfertaDictada = $intIdOfertaDictada;
            $objModulos->CDestinoDocente = $intCDestinoDocente;
            $objModulos->CPlanta = $intCPlanta;

           
        }
        return $objModulos;
    }



}

?>
