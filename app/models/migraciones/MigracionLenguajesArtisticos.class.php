<?php

/**
 * Lenguajes Artisticos
 * Migra cuadro Lenguajes Artísticos
 */
abstract class MigracionLenguajesArtisticos extends MigracionBase {

    /**
     * @return boolean
     */
    public static function Ejecutar(CuadroBase $objCuadro) {
//        if (SERVER_INSTANCE != 'dev')
//            return;
        //idfila => c_grado_tipo


        $arrFilaGrado = array(
            644 => 3, //"Sala de 3 años"
            645 => 4, //"Sala de 4 años"
            646 => 5, //"Sala de 5 años"
            647 => 6, //"1er Año/Grado"
            648 => 7, //"2do Año/Grado"
            649 => 8, //"3er Año/Grado"
            650 => 9, //"4to Año/Grado"
            651 => 10, //"5to Año/Grado"
            652 => 11, //"6to Año/Grado"
            668 => 12, //"7mo Año/Grado"
            653 => -1, //Secundaria / Polimodal - Ciclo Básico
            654 => -1, //Secundaria / Polimodal - Ciclo Orientado

            658 => 6, //"Primaria/EGB 1 y 2 - 1"
            659 => 7, //"Primaria/EGB 1 y 2 - 2"
            660 => 8, //"Primaria/EGB 1 y 2 - 3"
            661 => 9, //"Primaria/EGB 1 y 2 - 4"
            662 => 10, //"Primaria/EGB 1 y 2 - 5"
            663 => 11, //"Primaria/EGB 1 y 2 - 6"
            664 => 12, //"Primaria/EGB 1 y 2 - 7"
            275 => -1, //"EGB 3"
            672 => -1, //"superior"

            751 => 6, //"Primario_egb_1"
            752 => 7, //"Primario_egb_2"
            753 => 8, //"Primario_egb_3"
            754 => 9, //"Primario_egb_4"
            755 => 10, //"Primario_egb_5"
            756 => 11, //"Primario_egb_6"
            757 => 12, //"Primario_egb_7"
            758 => 13, //"Primario_egb_8"
            759 => 14, //"Primario_egb_9"
            548 => -1, //"Organización Modular"
        );
        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->IsEmpty())
                continue;
            $intCOfertaAgregada = $objFila->CodigoRelacional;
            if ($intCOfertaAgregada == 3100) {
                // está como 3100 para que secundaria completa matchee con ambas filas, pero en realidad las ofertas_agregadas son estas
                switch ($objFila->IdDefinicionFila) {
                    case 653:
                        $intCOfertaAgregada = 3400;
                        break;
                    case 654:
                        $intCOfertaAgregada = 3500;
                        break;

                    default:
                        throw new MigracionException("MigracionLenguajesArtisticos se encontró una fila con ofertas_agregada 3100 no esperada", $objCuadro);
                }
            }
            $intCHoras = 0;
            $objOfertaDictada = self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objCuadro->GetCModalidad1());
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if ($objColumna->TablaTipo != "lenguaje_artistico_tipo") {
                    $objCeldaHoras = $objFila->GetCelda($objColumna);
                    $intCHoras = ($objCeldaHoras->Valor) ? $objCeldaHoras->Valor : 0;
                    continue;
                }
                $objLenguajeArtisticoTipo = OLTPLenguajeArtisticoTipo::Load($objColumna->CodigoRelacional);
                $objCelda = $objFila->GetCelda($objColumna);
                if ($objCelda->Valor) {
                    $objLenguajeArtistico = self::GetLenguajeArtistico($objOfertaDictada->IdOfertaDictada, $arrFilaGrado[$objFila->IdDefinicionFila], $objLenguajeArtisticoTipo->CLenguajeArtistico);
                    $objLenguajeArtistico->CantidadHoras = $intCHoras;
                    $objLenguajeArtistico->Save();
                }
            }
        }
    }

    public static function GetLenguajeArtistico($intIdOfertaDictada, $intCGrado, $intCLenguajeArtistico) {
        $objLenguajeArtistico = OLTPLenguajeArtistico::LoadByIdOfertaDictadaCGradoCLenguajeArtistico($intIdOfertaDictada, $intCGrado, $intCLenguajeArtistico);
        if (!$objLenguajeArtistico) {
            $objLenguajeArtistico = new OLTPLenguajeArtistico();
            $objLenguajeArtistico->IdOfertaDictada = $intIdOfertaDictada;
            $objLenguajeArtistico->CGrado = $intCGrado;
            $objLenguajeArtistico->CLenguajeArtistico = $intCLenguajeArtistico;
        }
        return $objLenguajeArtistico;
    }

}

?>
