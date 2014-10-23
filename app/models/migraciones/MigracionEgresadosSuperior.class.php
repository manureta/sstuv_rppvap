<?php

/**
 * Trayectoria
 * Migra el cuadro de Trayectoria

 */
abstract class MigracionEgresadosSuperior extends MigracionTrayectoria {

    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsIncomplete()) continue;

            $intCGradoAnio = -1;//al ser egresado el anio no corresponde
            $objPlanDictado = self::GetPlanDictado($objFila);
            $objGradoOfertaTipo = OLTPGradoOfertaTipo::LoadByCGradoCOferta($intCGradoAnio, $objPlanDictado->IdOfertaLocalObject->COferta);

            //Trayectoria Egresados Superior total y varones
            $objTrayectoriaTipo = OLTPTrayectoriaTipo::Load(12);

            $objTrayectoria = self::GetTrayectoria($objPlanDictado,$objGradoOfertaTipo,$objTrayectoriaTipo);
            $objTrayectoria->Total = $objFila->GetCeldaByIdColumna(5)->Valor;
            $objTrayectoria->Varones = $objFila->GetCeldaByIdColumna(7)->Valor;
            $objTrayectoria->Save();

            foreach ($objCuadro->GetColumnas() as $objColumna) {
                if($objColumna->TablaTipo == 'anios_cursados_tipo') {
                    //HACK como se agregó para el 2012 una columna más con código relacional 9 (que no debería estar) se suma el valor
                    //de dicha columna con la de "antes de 2003" (#2017)
                    $intAniosCursadosTipo = ($objColumna->CodigoRelacional == 9) ? 20 : $objColumna->CodigoRelacional;
                    $objEgresados = self::GetEgresados($objPlanDictado,$intAniosCursadosTipo);
                    $objEgresados->Total += $objFila->GetCelda($objColumna)->Valor;
                    $objEgresados->Save();
                }
            }
        }
    }

    protected static function GetEgresados($objPlanDictado, $intAniosCursadosTipo) {

        $objEgresados = OLTPEgresados::LoadByIdPlanDictadoCAniosCursados($objPlanDictado->IdPlanDictado,$intAniosCursadosTipo);
        if(!$objEgresados) {
            $objEgresados = new OLTPEgresados();
            $objEgresados->IdPlanDictadoObject = $objPlanDictado;
            $objEgresados->CAniosCursados = $intAniosCursadosTipo;
        }
        return $objEgresados;
    }
}


