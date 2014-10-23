<?php
/**
* DiagnosticoPermanencia
* Migra el cuadro Diagnistico Permanencia de los alumnos en la modalidad 2010 del Blanco
*/
abstract class MigracionDiagnosticoPermanencia {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){
        foreach($objCuadro->GetFilas() as $objFila){
            $intCDiagnostico = $objFila->CodigoRelacional;
            foreach($objFila->GetCeldas() as $objCelda){
                if(!$objCelda->Valor)continue;
                $intCMes = $objCelda->Columna->CodigoRelacional;
                $intCEstadia = (strpos($objCelda->Columna->Nombre,"Nuevos")!==false)?2:1;
                $objOLTPDiagnosticoPermanencia = self::LoadByIdLocalizacionCDiagnosticoCMesCEstadia($objCuadro->Localizacion->IdLocalizacion,$intCDiagnostico,$intCMes,$intCEstadia);
                $objOLTPDiagnosticoPermanencia->Valor = $objCelda->Valor;
                $objOLTPDiagnosticoPermanencia->Save();
            }
        }
    }

    protected static function LoadByIdLocalizacionCDiagnosticoCMesCEstadia($intIdLocalizacion,$intCDiagnostico,$intCMes,$intCEstadia){
        $objOLTPDiagnosticoPermanencia = OLTPDiagnosticoPermanencia::LoadByIdLocalizacionCDiagnosticoCMesCEstadia($intIdLocalizacion,$intCDiagnostico,$intCMes,$intCEstadia);
        if(!$objOLTPDiagnosticoPermanencia){
            $objOLTPDiagnosticoPermanencia = new OLTPDiagnosticoPermanencia();
            $objOLTPDiagnosticoPermanencia->IdLocalizacion = $intIdLocalizacion;
            $objOLTPDiagnosticoPermanencia->CDiagnostico = $intCDiagnostico;
            $objOLTPDiagnosticoPermanencia->CMes = $intCMes;
            $objOLTPDiagnosticoPermanencia->CEstadia = $intCEstadia;
        }
        return $objOLTPDiagnosticoPermanencia;
    }

}
?>
