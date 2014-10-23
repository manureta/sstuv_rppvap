<?php
/**
* TalleresIntegral
* Migracion de Talleres de Educación Integral
*/
abstract class MigracionTalleresIntegral extends MigracionMatriculaBase{

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){
        
        
        foreach($objCuadro->GetFilas() as $objFila){
            if($objFila->IsEmpty())continue;
            

            $objPlanDictado = self::GetPlanDictado($objFila);
            $objSeccion = self::GetSeccion($objCuadro->Localizacion->IdLocalizacion, $objCuadro->GetCModalidad1(), 
                                           -1, -1, "", -1);
            
            $objGradoOferta = OLTPGradoOfertaTipo::LoadByCGradoCOferta(-1, $objPlanDictado->IdOfertaLocalObject->COferta);
            if (!$objGradoOferta) {
                throw new MigrationException (sprintf('La Oferta %s no tiene el Grado %s (Fila %d)', 
                    $objPlanDictado->IdOfertaLocalObject->COfertaObject->Descripcion, 'No Corresponde', $objFila->IdFila),
                $objCuadro);
            }

            $intTipoTaller = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(496)->Valor);
            
            // si el tipo de taller es 1, el CAlumno debe ser 13 ('Alumnos de Taller de Educación Integral con otros objetivos '), 
            // si es 2 debe ser 17 ('Alumnos de Taller de Educación Integral con objetivo directo de inserción laboral y/o profesional')
            $intCAlumno = ($intTipoTaller == 1) ? 13 : 17;
            
            $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, $intCAlumno);
            $objAlumnos->Total = $objFila->GetCeldaByIdColumna(5)->Valor;
            $objAlumnos->Varones = $objFila->GetCeldaByIdColumna(7)->Valor;
            LogHelper::Debug(sprintf('Guardando Alumnos de Taller de Educación Integral:: Nivel: %s | Seccion: %s | Grado: %s | Total: %d | Varones: %d', $objPlanDictado->IdTituloOfertaObject->IdTituloObject->Descripcion, $objSeccion->Nombre, $objGradoOferta->CGradoObject->Descripcion, $objAlumnos->Total, $objAlumnos->Varones));
            $objAlumnos->Save();
            
            foreach($objCuadro->GetColumnas() as $objColumna){
                if ($objColumna->TablaTipo != 'discapacidad_tipo') continue;
                
                $objCelDiscapacidad = $objFila->GetCelda($objColumna);
                if ($objCelDiscapacidad->Valor != '') {
                    $objDiscapacitados = self::GetDiscapacitados($objPlanDictado->IdPlanDictado,
                            $objColumna->CodigoRelacional,
                            $objGradoOferta->CGradoOferta,
                            $intTipoTaller);
                    $objDiscapacitados->Total = $objCelDiscapacidad->Valor;
                    LogHelper::Debug(sprintf('Guardando Discapacidad :: Discapacidad: %d | GradoOferta: %d | TipoTaller: %d | Valor: %d',
                            $objColumna->CodigoRelacional,
                            $objGradoOferta->CGradoOferta,
                            $intTipoTaller,
                            $objCelDiscapacidad->Valor));
                    $objDiscapacitados->Save();
 
                }
            }

        }
    }
}
?>
