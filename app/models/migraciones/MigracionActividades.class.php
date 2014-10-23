<?php
/**Migra cuadro "Solo para instituciones de Formación Docente */
abstract class MigracionActividades extends MigracionBase {
    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
           switch ($objFila->IdFila) {
                case 480:
                   //investigacion
                   $intCodigoRelacional = 3;
                   break;
                case 479:
                   $intCodigoRelacional = 2;
                   //extension
                   break;
                default:
                   $intCodigoRelacional = $objFila->CodigoRelacional;
                    break;
           }
            $objActividadTipo = OLTPActividadTipo::Load($intCodigoRelacional);
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                $objTemaTipo =  OLTPTemaTipo::Load($objColumna->CodigoRelacional);
                $objCelda = $objFila->GetCelda($objColumna);
                if ($objCelda->Valor !='') {
                    $objActividades = self::GetActividades($objCuadro->Localizacion->IdLocalizacion, $objActividadTipo->CActividad,$objTemaTipo->CTema );
                    $objActividades->Total = ($objCelda->Valor) ? $objCelda->Valor :0 ;
                    $objActividades->Save();
                }
            }
        }
    }
    public static function GetActividades($intIdLocalizacion,$intCActividad,$intCTema) {
        $objActividades = OLTPActividades::LoadByIdLocalizacionCActividadCTema($intIdLocalizacion, $intCActividad, $intCTema);
        if (!$objActividades) {
            $objActividades = new OLTPActividades();
            $objActividades->IdLocalizacion = $intIdLocalizacion;
            $objActividades->CActividad = $intCActividad;
            $objActividades->CTema = $intCTema;
            }
        return $objActividades;
    }
}

?>
