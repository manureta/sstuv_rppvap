<?php
/**Migra cuadro "Permanencia de los alumnos en la modalidad 2011 (cuadro 3 Blanco)*/
abstract class MigracionPermanenciaHospitalaria extends MigracionBase {
    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {

            $objLugarTipo = OLTPLugarAtencionTipo::Load($objFila->CodigoRelacional);
            foreach ($objCuadro->GetColumnas() as $objColumna) {
                $objAsistenciaTipo =  OLTPAsistenciaTiempoTipo::Load($objColumna->CodigoRelacional);
                $objCelda = $objFila->GetCelda($objColumna);
                if ($objCelda->Valor !='') {
                    $objPermanenciaHospitalaria = self::GetPermanenciaHospitalaria($objCuadro->Localizacion->IdLocalizacion,  $objLugarTipo->CLugarAtencion, $objAsistenciaTipo->CAsistenciaTiempo );
                    $objPermanenciaHospitalaria->Total = ($objCelda->Valor) ? $objCelda->Valor :0 ;
                    $objPermanenciaHospitalaria->Save();
                }
            }
        }
    }
    public static function GetPermanenciaHospitalaria($intIdLocalizacion,$intCLugarAtencion,$intCAsistencia) {
        $objPermanenciaHospitalaria =OLTPPermanenciaHospitalaria::LoadByIdLocalizacionCLugarAtencionCAsistenciaTiempo($intIdLocalizacion, $intCLugarAtencion, $intCAsistencia);
        if (!$objPermanenciaHospitalaria) {
            $objPermanenciaHospitalaria = new OLTPPermanenciaHospitalaria();
            $objPermanenciaHospitalaria->IdLocalizacion = $intIdLocalizacion;
            $objPermanenciaHospitalaria->CLugarAtencion = $intCLugarAtencion;
            $objPermanenciaHospitalaria->CAsistenciaTiempo = $intCAsistencia;
        }
        return $objPermanenciaHospitalaria;
    }
}

?>
