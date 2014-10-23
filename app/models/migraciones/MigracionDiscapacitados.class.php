<?php
/**Migra cuadro Alumnos matriculados por discapacidad */
abstract class MigracionDiscapacitados extends MigracionMatricula {
    public static function Ejecutar(CuadroBase $objCuadro) {
        foreach ($objCuadro->GetFilas() as $objFila) {
            if ($objFila->IsEmpty()) continue;
            $objPlanDictado = self::GetPlanDictado($objFila, true); //solo para las ofertas activas
            $intCGrado = -1;
            if (in_array($objFila->Cuadro->IdDefinicionCuadro, array(513,514))) {
                $intCGrado = $objFila->CodigoRelacional;
                if ($objFila->IdFila == 548) $intCGrado = 20; // hack Organizacion Modular
            }
            if (in_array($objFila->Cuadro->IdDefinicionCuadro, array(522,523))) {
                $objCelGrado = $objFila->GetCeldaByIdColumna(166);
                $intCGrado = CodigoValor::GetCodigoRelacional($objCelGrado->Valor);
            }
            $intTipoTaller= -1;
            // Para cuadro de alumnos matriculados por taller
            if ($objFila->Cuadro->IdDefinicionCuadro == 539) {
                $objCelTipoTaller = $objFila->GetCeldaByIdColumna(496);
                $intTipoTaller = CodigoValor::GetCodigoRelacional($objCelTipoTaller->Valor);
            }

            $objGradoOferta = OLTPGradoOfertaTipo::LoadByCGradoCOferta($intCGrado, $objPlanDictado->IdOfertaLocalObject->COferta);
            if (!$objGradoOferta) {
                $objGrado = OLTPGradoTipo::Load($intCGrado);
                throw new MigrationException (sprintf('La Oferta %s no tiene el Grado %s (Fila %d)', 
                    $objPlanDictado->IdOfertaLocalObject->COfertaObject->Descripcion, $objGrado->Descripcion, $objFila->IdFila),
                $objCuadro);
            }

            foreach ($objCuadro->GetColumnas() as $objColumna ) {
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

    /**
     *
     * @param integer $intIdPlanDictado
     * @param integer $intCDiscapacidad
     * @param integer $intCGradoOferta
     * @param integer $intCTipoTallerEducIntegral
     * @return OLTPDiscapacitados
     */
    public static function GetDiscapacitados($intIdPlanDictado, $intCDiscapacidad, $intCGradoOferta, $intCTipoTallerEducIntegral) {
        $objDiscapacitados = OLTPAlumnosDiscapacidad::LoadByIdPlanDictadoCDiscapacidadCGradoOfertaCTipoTallerEducIntegral($intIdPlanDictado, $intCDiscapacidad, $intCGradoOferta, $intCTipoTallerEducIntegral);
        if (!$objDiscapacitados) {
            $objDiscapacitados = new OLTPAlumnosDiscapacidad();
            $objDiscapacitados->IdPlanDictado = $intIdPlanDictado;
            $objDiscapacitados->CDiscapacidad = $intCDiscapacidad;
            $objDiscapacitados->CGradoOferta = $intCGradoOferta;
            $objDiscapacitados->CTipoTallerEducIntegral = $intCTipoTallerEducIntegral;
        }
        return $objDiscapacitados;
    }
}
?>
