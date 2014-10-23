<?php
/**
* Cursos
* Migracion de cuadros de Cursos
*/
abstract class MigracionCursos extends MigracionTrayectoria {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro) {
        foreach($objCuadro->GetFilas() as $objFila) {
            if($objFila->IsEmpty()) continue;
            $objPlanDictado = self::GetPlanDictado($objFila);
            $objSeccion = self::GetSeccion($objCuadro->Localizacion->IdLocalizacion, $objCuadro->GetCModalidad1(), -1, -1, "", -1);
            $objGradoOferta = OLTPGradoOfertaTipo::LoadByCGradoCOferta(-1, $objPlanDictado->IdOfertaLocalObject->COferta);
            if (!$objGradoOferta) 
                throw new MigrationException (sprintf('La Oferta %s no tiene el Grado %s (Fila %d)', 
                    $objPlanDictado->IdOfertaLocalObject->COfertaObject->Descripcion, 'No corresponde', $objFila->IdFila),
                $objCuadro);
                            
            // Alumnos
            switch ($objCuadro->IdCuadro) {
                case 316: //Formación Profesional
                    // Los alumnos de cursos de formación profesional se preguntan al año anterior, así que se cargan en trayectoria
                    $objTrayectoriaTipo = OLTPTrayectoriaTipo::Load(15); // Matrícula del año anterior
                    $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOferta, $objTrayectoriaTipo);
                    $objTrayectoria->Total = $objFila->GetCeldaByIdColumna(5)->Valor;
                    $objTrayectoria->Varones = $objFila->GetCeldaByIdColumna(7)->Valor;
                    LogHelper::Debug(sprintf('Guardando Trayectoria de Formación Profesional (año anterior) :: Titulo: %s | Grado: %s | Total: %d | Varones: %d', $objPlanDictado->IdTituloOfertaObject->IdTituloObject->Descripcion, $objGradoOferta->CGradoObject->Descripcion, $objTrayectoria->Total, $objTrayectoria->Varones));
                    $objTrayectoria->Save();
                    break;
                default:
                    // Los alumnos de Cursos de SNU se cargan en alumnos
                    $objAlumnos = self::GetAlumnos($objPlanDictado->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta);
                    $objAlumnos->Total = $objFila->GetCeldaByIdColumna(5)->Valor;
                    $objAlumnos->Varones = $objFila->GetCeldaByIdColumna(7)->Valor;
                    LogHelper::Debug(sprintf('Guardando Alumnos Cursos :: Titulo: %s | IdSeccion: %s | Grado: %s | Total: %d | Varones: %d', $objPlanDictado->IdTituloOfertaObject->IdTituloObject->Descripcion, $objSeccion->IdSeccion, $objGradoOferta->CGradoObject->Descripcion, $objAlumnos->Total, $objAlumnos->Varones));
                    $objAlumnos->Save();
            }

            $objTrayectoriaTipo = OLTPTrayectoriaTipo::Load(12); // Egresados
            $objTrayectoria = self::GetTrayectoria($objPlanDictado, $objGradoOferta, $objTrayectoriaTipo);
            $objTrayectoria->Total = $objFila->GetCeldaByIdColumna(309)->Valor;
            $objTrayectoria->Varones = $objFila->GetCeldaByIdColumna(310)->Valor;
            LogHelper::Debug(sprintf('Guardando Trayectoria Egresados :: Titulo: %s | Grado: %s | Total: %d | Varones: %d', $objPlanDictado->IdTituloOfertaObject->IdTituloObject->Descripcion, $objGradoOferta->CGradoObject->Descripcion, $objTrayectoria->Total, $objTrayectoria->Varones));
            $objTrayectoria->Save();
        }
    }

}
?>
