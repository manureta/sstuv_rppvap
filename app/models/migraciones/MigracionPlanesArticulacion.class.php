<?php

/**
 * PlanesArticulacion
 * Planes con los que articula los planes
 */
abstract class MigracionPlanesArticulacion extends MigracionPlanes {

    /**
     * @return boolean
     */
    public static function Ejecutar($objCuadro) {

        LogHelper::Debug("Migrando Planes Cuadro: " . $objCuadro->Numero);
        foreach ($objCuadro->GetFilas() as $i => $objFila) {
            $objOfertaLocal = null;
            if ((!self::GetClave($objFila)) || $objFila->IsEmpty())
                continue; // sin nro de orden o vacia no se migra
            LogHelper::Debug("Plan Fila: $i | Nro Orden: " . self::GetClave($objFila));
            $intNroOrden = self::GetClave($objFila);

            // Para el cuadro 3.B el cuadro de planes es el 3.A (Celeste). El otro es el 2.A (Violeta)
            $intIdCuadroPlanes = ($objCuadro->IdDefinicionCuadro == 611) ? 157 : 430;
            $objOLTPPlanDictadoQueArticula = self::GetPlanDictadoByIdDefinicionCuadroIdLocalizacionNroOrden($intIdCuadroPlanes, $objCuadro->Localizacion->IdLocalizacion, $intNroOrden);

            $objOLTPPlanDictadoTitulacion = self::GetOLTPPlandictadoTitulacion($objFila);

            $objOLTPPlanDictadoTitulacion->IdPlanDictadoQueArticula = $objOLTPPlanDictadoQueArticula->IdPlanDictado;
            $objOLTPPlanDictadoTitulacion->Save();

            $objSeccion = self::GetSeccion($objCuadro->Localizacion->IdLocalizacion, $objCuadro->GetCModalidad1(), -1, -1, "", -1);

            //error_log("$intGrado, {$objPlanDictado->IdOfertaLocalObject->COferta}");
            $objGradoOferta = OLTPGradoOfertaTipo::LoadByCGradoCOferta(-1, $objOLTPPlanDictadoTitulacion->IdOfertaLocalObject->COferta);

            //14;"Alumnos Titulados: Cursa Secundaria en ESTE Establecimiento"
            $intTotalEnEste = $objFila->GetCeldaByIdColumna(552)->Valor;
            $intVaronesEnEste = $objFila->GetCeldaByIdColumna(553)->Valor;
            $objAlumnos = self::GetAlumnos($objOLTPPlanDictadoTitulacion->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 14);
            $objAlumnos->Total = $intTotalEnEste;
            $objAlumnos->Varones = $intVaronesEnEste;
            $objAlumnos->Save();

            //15;"Alumnos Titulados: Cursa Secundaria en OTRO Establecimiento"
            $intTotalEnOtro = $objFila->GetCeldaByIdColumna(554)->Valor;
            $intVaronesEnOtro = $objFila->GetCeldaByIdColumna(555)->Valor;
            $objAlumnos = self::GetAlumnos($objOLTPPlanDictadoTitulacion->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 15);
            $objAlumnos->Total = $intTotalEnOtro;
            $objAlumnos->Varones = $intVaronesEnOtro;
            $objAlumnos->Save();

            //16;"Alumnos Titulados: NO Cursa Secundaria"
            $intTotalNoCursa = $objFila->GetCeldaByIdColumna(556)->Valor;
            $intVaronesNoCursa = $objFila->GetCeldaByIdColumna(557)->Valor;
            $objAlumnos = self::GetAlumnos($objOLTPPlanDictadoTitulacion->IdPlanDictado, $objSeccion->IdSeccion, $objGradoOferta->CGradoOferta, 16);
            $objAlumnos->Total = $intTotalNoCursa;
            $objAlumnos->Varones = $intVaronesNoCursa;
            $objAlumnos->Save();

            $intCGradoAnio = -1;//al ser egresado el anio no corresponde
            $objGradoOfertaTipo = OLTPGradoOfertaTipo::LoadByCGradoCOferta($intCGradoAnio, $objOLTPPlanDictadoTitulacion->IdOfertaLocalObject->COferta);

            $objTrayectoria = MigracionTrayectoria::GetTrayectoria($objOLTPPlanDictadoTitulacion, $objGradoOfertaTipo, OLTPTrayectoriaTipo::Load(12));
            $objTrayectoria->Total = (int) $objFila->GetCeldaByIdColumna(710)->Valor;
            $objTrayectoria->Varones = (int) $objFila->GetCeldaByIdColumna(711)->Valor;
            $objTrayectoria->Save();

        }
    }

    public static function GetOLTPPlandictadoTitulacion($objFila) {
        $strDescripcion = $objFila->GetCeldaByIdColumna(549)->Valor;
        if (preg_match('/([0-9]+)\s([\w\s]+)/', $strDescripcion, $arrMatches)) {
            $strDescripcion = substr($strDescripcion, strlen($arrMatches[1]) + 1, strlen($strDescripcion));
            $strDescripcion = trim($strDescripcion);
        }

        $intCNivelTitulo = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(550)->Valor);
        $intDuracion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(183)->Valor);
        $intTipoNorma = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(195)->Valor);
        $intNroNorma = $objFila->GetCeldaByIdColumna(226)->Valor;
        $intAnioNorma = $objFila->GetCeldaByIdColumna(227)->Valor;

        /**
         * En la columna de tipo de titulación tengo el código relacional de CNivelTitulo (para el autocomplete)
         * para la migración necesito determinar el COferta
         * 218,'Trayecto Técnico Profesional'
         * 219,'Intinerario Formativo'
         * 220,'Trayecto Artístico Profesional'
         * 221,'Otras Titulaciones'
         */
        $arrCodigoValor2COferta = array(
            218 => 113,
            219 => 114,
            220 => 118,
            221 => 120
        );
        $intCOferta = $arrCodigoValor2COferta[$objFila->GetCeldaByIdColumna(550)->Valor];

        $objTituloOferta = OLTPTituloOferta::QuerySingle(
                        QQ::AndCondition(
                                QQ::Equal(QQN::OLTPTituloOferta()->IdTituloObject->CTituloObject->CNivelTitulo, $intCNivelTitulo), 
                                QQ::Equal(QQN::OLTPTituloOferta()->IdTituloObject->CTituloObject->Descripcion, $strDescripcion), 
                                QQ::Equal(QQN::OLTPTituloOferta()->COferta, $intCOferta)
                        )
        );
        if (!$objTituloOferta)
            throw new MigrationException("No se encuentra el titulo_oferta con Nivel $intCNivelTitulo y Descripción $strDescripcion",$objFila->Cuadro);

        $objOfertaLocal = OLTPOfertaLocal::QuerySingle(
                        QQ::AndCondition(
                                QQ::Equal(QQN::OLTPOfertalocal()->IdLocalizacion, $objFila->Cuadro->Localizacion->IdLocalizacion), 
                                QQ::Equal(QQN::OLTPOfertalocal()->COferta, $intCOferta)
                        )
        );
        if (!$objOfertaLocal)
            throw new MigrationException("No se encuentra la Oferta_Local para el título {$objTituloOferta->IdTituloObject->CTituloObject->Descripcion}", $objFila->Cuadro);
        
        $objOLTPPlanDictadoTitulacion = OLTPPlanDictado::QuerySingle(QQ::AndCondition(
                QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocal, $objOfertaLocal->IdOfertaLocal),
                QQ::Equal(QQN::OLTPPlanDictado()->IdTituloOferta, $objTituloOferta->IdTituloOferta),
                QQ::Equal(QQN::OLTPPlanDictado()->CNorma, $intNroNorma),
                QQ::Equal(QQN::OLTPPlanDictado()->NormaNro, $intNroNorma),
                QQ::Equal(QQN::OLTPPlanDictado()->NormaAnio, $intAnioNorma),
                QQ::Equal(QQN::OLTPPlanDictado()->CDuracionEn, OLTPDuracionEnTipo::Anios),
                QQ::Equal(QQN::OLTPPlanDictado()->Duracion, $intDuracion)
                        ));
        
        if (!$objOLTPPlanDictadoTitulacion)
            $objOLTPPlanDictadoTitulacion = MigracionMatriculaBase::CrearPlanDictado($objOfertaLocal, $objTituloOferta, $intTipoNorma, $intNroNorma, $intAnioNorma, OLTPDuracionEnTipo::Anios, $intDuracion);

        return $objOLTPPlanDictadoTitulacion;
    }

}

?>
