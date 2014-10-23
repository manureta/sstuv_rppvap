<?php
/**
 * MigracionMatriculaBase
 * Funciones comunes a las distintas clases de migración de matrícula
 */
abstract class MigracionMatriculaBase extends MigracionBase {

    public static function GetEdad($IdPlanDictado, $IdSeccion, $CGradoOferta, $CEdad) {
        $objEdad = OLTPAlumnosEdad::LoadByIdPlanDictadoIdSeccionCGradoOfertaCEdad($IdPlanDictado, $IdSeccion, $CGradoOferta, $CEdad);
        if (!$objEdad) {
            $objEdad = new OLTPAlumnosEdad();
            $objEdad->IdPlanDictado = $IdPlanDictado;
            $objEdad->IdSeccion = $IdSeccion;
            $objEdad->CGradoOferta = $CGradoOferta;
            $objEdad->CEdad = $CEdad;
        }
        return $objEdad;
    }

    public static function GetPlanDictado(Fila $objFila, $blnSoloActivo = false) {
        $intIdColumnaGrado = array_pop_unref(array_intersect($objFila->Cuadro->GetColumnasIds(), array(1, 89, 166, 391, 398)));
        $intIdLocalizacion = $objFila->Cuadro->Localizacion->IdLocalizacion;
        try {
            switch ($objFila->Cuadro->IdDefinicionCuadro) {
                case 518: // 1 Violeta
                    return self::GetPlanDictadoByIdLocalizacionCOfertaAgregadaCModalidad1CGrado($intIdLocalizacion, 1000, $objFila->Cuadro->GetCModalidad1(), null, $blnSoloActivo);
                // Inicial - no especial
                case 104: // c y s/egb
                case 214: // bsas
                    $intCOfertaAgregada = MigracionMatricula::GetOfertaAgregadaTipoInicial($objFila->GetCeldaByIdColumna(1)->Valor);
                    return self::GetPlanDictadoByIdLocalizacionCOfertaAgregadaCModalidad1CGrado($intIdLocalizacion, $intCOfertaAgregada, $objFila->Cuadro->GetCModalidad1(), null, $blnSoloActivo);
                //
                // Cuadros con código relacional en las filas
                //
            case 504://inicial especial
                case 506:
                case 508:
                case 531://talleres de nivel de especial
                case 532:
                case 533:
                case 534:
                    return self::GetPlanDictadoByIdLocalizacionCOfertaAgregadaCModalidad1CGrado($intIdLocalizacion, $objFila->CodigoRelacional, $objFila->Cuadro->GetCModalidad1(), null, $blnSoloActivo);
                // Cuadros que dependen del GRADO
                // Primaria
                // Matricula
                case 127: // c/egb
                case 626: // s/egb
                case 215: // bsas
                case 297: // violeta Adultos 
                // Trayectoria
                case 221: // c y s/egb
                case 628: // bsas
                case 513: //
                case 514: // especial
                    $intCOfertaAgregada = (in_array(55, $objFila->Cuadro->GetColumnasIds())) ? // si tiene columna Nivel
                            CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(55)->Valor) :
                            $objFila->Cuadro->GetCOfertaAgregada(); //toda primaria

                    $intCGrado = ($objFila->TablaTipo == 'grado_tipo') ? $objFila->CodigoRelacional :
                            ($intIdColumnaGrado ? CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna($intIdColumnaGrado)->Valor) : -1);
                    // Hack para el caso de organización modular en especial
                    if ($intCGrado == -1 && $objFila->IdFila == 548)
                        $intCGrado = 20;
                    return self::GetPlanDictadoByIdLocalizacionCOfertaAgregadaCModalidad1CGrado($intIdLocalizacion, $intCOfertaAgregada, $objFila->Cuadro->GetCModalidad1(), $intCGrado, $blnSoloActivo);
                // 
                // cuadros con plan de estudio
                // Secundaria
                // Matricula
                case 158: // c y s/egb
                case 226: // bsas
                // Trayectoria
                case 167: // 3.10 todos
                // Egresados
                case 168: // 3.11/3.12 todos
                case 616: // 3.11/3.12.B todos
                case 525: //2.1 violeta
                case 432: //2.1 violeta bsas
                case 449: //2.8 violeta
                case 629: //2.8.B Violeta
                case 458: //2.9/2.10 violeta
                case 617: //2.9/2.10.B violeta
                    $intNroOrden = $objFila->GetCeldaByIdColumna(165)->Valor;
                    if ($intNroOrden == '0') {
                        $objPlanDictado = self::GetPlanDictadoCicloBasico($objFila, $blnSoloActivo);
                    } else {
                        LogHelper::Debug("Buscando plandictado orden {$intNroOrden}");
                        $intIdCuadroPlanes = ($objFila->Cuadro->GetCModalidad1() == 1) ? 157 : 430;
                        $objPlanDictado = MigracionPlanes::GetPlanDictadoByIdDefinicionCuadroIdLocalizacionNroOrden($intIdCuadroPlanes, $intIdLocalizacion, $intNroOrden);
                    }
                    if (!$objPlanDictado)
                        throw new MigrationException("No se pudo encontrar el Plan para el número de orden $intNroOrden", $objFila->Cuadro);
                    LogHelper::Debug("Encontrado plandictado orden {$intNroOrden}, id {$objPlanDictado->IdPlanDictado}");
                    return $objPlanDictado;

                // cuadros con columna nivel
                case 287: // Verde 2 
                case 317: // Verde 12
                    //throw new MigrationException('Migración todavía no implementada');
                    $intIdCuadroPlanes = 257;
                    $strNroOrden = MigracionPlanes::GetClave($objFila);
                    $objPlanDictado = MigracionPlanes::GetPlanDictadoByIdDefinicionCuadroIdLocalizacionNroOrden($intIdCuadroPlanes, $intIdLocalizacion, $strNroOrden);
                    if (!$objPlanDictado)
                        throw new MigrationException("No se pudo encontrar el Plan para la Fila " . $objFila->IdFila, $objFila->Cuadro);
                    return $objPlanDictado;

                case 522:
                case 523:
                    $intCOfertaAgregada = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(55)->Valor);
                    return self::GetPlanDictadoByIdLocalizacionCOfertaAgregadaCModalidad1CGrado($intIdLocalizacion, $intCOfertaAgregada, $objFila->Cuadro->GetCModalidad1(), null, $blnSoloActivo);
                case 256: // 1 Amarillo
                case 289: // 2 Amarillo
                case 258: // 1.1 Marrón
                case 259: // 1.2 Marrón
                case 262: // 1.3 Marrón
                case 264: // 1.5 Marrón
                case 265: // 1.5 Marrón
                case 298: // 1.1 Naranja
                case 316: // 1.8 Naranja
                case 331: // 12.A Verde
                case 332: // 12.B Verde
                case 539: // 26 Rosa
                    return self::GetPlanDictadoPorTitulo($objFila);
                default:
                    throw new MigrationException('No se puede definir la estrategia para determinar el PlanDictado', $objFila->Cuadro);
            }
        } catch (Exception $e) {
            throw new MigrationException('Se produjo un error no esperado: '.$e->getMessage(), $objFila->Cuadro);
        }
    }

    public static function GetOLTPTitulo(Fila $objFila) {

        // 1.1 Amarillo : Caso especial en 2011 vamos a concatenar la especialidad en el nombre de la actividad
        if (in_array($objFila->Cuadro->IdDefinicionCuadro, array( 256, 289)))
                return self::GetOLTPTituloAmarillo($objFila);

        $blnSacarCodigoInicial = !in_array($objFila->Cuadro->IdDefinicionCuadro, array(331, 332, 256 ,289));

        $arrIdColumnas = array_intersect($objFila->Cuadro->GetColumnasIds(), array(294,390,400,402,412,416,495,579));
        
        // Los cuadros de egresados de Artística y FP tienen la columna Especialidad y la de Título. 
        // La que vamos a usar es la de título
        if (count($arrIdColumnas) > 1) {
            $intIdColumnaNombre = array_pop_unref(array_intersect($arrIdColumnas, array(390,402)));
        }
        else $intIdColumnaNombre = array_pop($arrIdColumnas);
        
        $arrTipoDato = TipoDatoType::$ExtraColumnValuesArray[$objFila->Cuadro->GetColumna($intIdColumnaNombre)->TipoDato];
        $intCNivelTitulo = $arrTipoDato['CNivelTitulo'];
        
        //Los cursos de capacitación tienen el título del curso en una columna tipo STRING, por eso indicamos el cniveltitulo
        if (in_array($objFila->Cuadro->IdDefinicionCuadro, array(331, 332))) $intCNivelTitulo = 10;
        
        // Cursos de Capacitación de Superior, Actividades de Servicios Complementarios y Talleres de Especial son tablas abiertas
        $blnCrearTitulo = ($arrTipoDato['TablaAbierta'] ||
                in_array($objFila->Cuadro->GetColumna($intIdColumnaNombre)->TipoDato, array(TipoDatoType::STRING, TipoDatoType::STRING_LONG)));

        $strDescripcion = $objFila->GetCeldaByIdColumna($intIdColumnaNombre)->Valor;
        if ($blnSacarCodigoInicial && preg_match('/([0-9]+)\s([\w\s]+)/', $strDescripcion, $arrMatches)) {
            $strDescripcion = substr($strDescripcion, strlen($arrMatches[1])+1, strlen($strDescripcion));
        }
        $strDescripcion = trim($strDescripcion);

        $objOLTPTitulo = OLTPTitulo::QuerySingle(QQ::AndCondition(
                            QQ::Equal(QQN::OLTPTitulo()->Descripcion,$strDescripcion), 
                            QQ::Equal(QQN::OLTPTitulo()->CNivelTitulo,$intCNivelTitulo)));
        
        if ($objOLTPTitulo) return $objOLTPTitulo;
        if (!$blnCrearTitulo)
            throw new MigrationException("No se encontró el titulo '{$strDescripcion}' y no se crean titulos para este cuadro",$objFila->Cuadro);
            
        //Creo el titulo
        $objOLTPTitulo = new OLTPTitulo();
        $objOLTPTitulo->CNivelTitulo = $intCNivelTitulo;
        $objOLTPTitulo->Descripcion = $strDescripcion;
        $objOLTPTitulo->DescripcionAmpliada = "";
        $objOLTPTitulo->CTitulo = null;
        $objOLTPTitulo->CCarrera = -1;
        LogHelper::Debug(sprintf('Guardando Titulo :: Descripcion: %s | CNivelTitulo: %d | CCarrera: %d', $objOLTPTitulo->Descripcion, $objOLTPTitulo->CNivelTitulo, $objOLTPTitulo->CCarrera));
        $objOLTPTitulo->Save();
        // ¿?¿? para obtener el id?
        $objOLTPTitulo = OLTPTitulo::QuerySingle(QQ::AndCondition(
                            QQ::Equal(QQN::OLTPTitulo()->Descripcion, $strDescripcion), 
                            QQ::Equal(QQN::OLTPTitulo()->CNivelTitulo, $intCNivelTitulo)));
        //Creo el titulo_oferta
        $objOLTPTituloOferta = new OLTPTituloOferta();
        $objOLTPTituloOferta->IdTituloObject = $objOLTPTitulo;
        switch ($objFila->Cuadro->IdDefinicionCuadro) {
            case 256:// 1 Amarillo
                $intCOferta = 116;
                break;
            case 331:
            case 332:
                $intCOferta = 117; // Común - Cursos de Capacitación SNU
                break;
            case 539: //Talleres Especial
                $intCOferta = 135;
                break;
            default:
                throw new MigrationException("Error definiendo la oferta en el momento de crear el título: Cuadro no contemplado",$objFila->Cuadro);
        }
        $objOLTPTituloOferta->COferta = $intCOferta;
        $objOLTPTituloOferta->CTituloOferta = null;
        LogHelper::Debug(sprintf('Guardando TituloOferta :: IdTitulo: %d | COferta: %d', $objOLTPTituloOferta->IdTitulo, $objOLTPTituloOferta->COferta));
        $objOLTPTituloOferta->Save();

        return $objOLTPTitulo;
    }

    public static function GetOLTPTituloAmarillo($objFila) {
        // hack para el cuadro 1 del cuadernillo amarillo        
        $intIdColumnaGrupoEspecialidad = -1;
        $intCNivelTitulo = 9;
        $intIdColumnaNombre = 580;
        $intIdColumnaGrupoEspecialidad = 579;
        $intCOferta = 116; // Común - Servicios Complementarios
        $blnSacarCodigoInicial = false;
        $blnCrearCarrera = true;
        $strDescripcion = $objFila->GetCeldaByIdColumna($intIdColumnaNombre)->Valor;
        $objCarrera = null;

        $objOLTPTituloDeCarrera = OLTPTitulo::QuerySingle(QQ::AndCondition(
                                                QQ::Equal(QQN::OLTPTitulo()->Descripcion,trim($objFila->GetCeldaByIdColumna($intIdColumnaGrupoEspecialidad)->Valor)),
                                                QQ::Equal(QQN::OLTPTitulo()->CNivelTitulo,$intCNivelTitulo)
                                                )
                                );
//        $objCarrera = OLTPCarreraTipo::QuerySingle(QQ::Equal(QQN::OLTPCarreraTipo()->Descripcion,$objFila->GetCeldaByIdColumna($intIdColumnaGrupoEspecialidad)->Valor));

        if($objOLTPTituloDeCarrera){
            $intCCarrera = $objOLTPTituloDeCarrera->CCarrera;
        }else{
            throw new MigrationException("no se puede insertar una actividad sin un grupo/especialidad definido", $objFila->Cuadro);
        }
        $objOLTPTitulo = OLTPTitulo::QuerySingle(QQ::AndCondition(
                                                QQ::Equal(QQN::OLTPTitulo()->Descripcion,$strDescripcion),
                                                QQ::Equal(QQN::OLTPTitulo()->CNivelTitulo,$intCNivelTitulo),
                                                QQ::Equal(QQN::OLTPTitulo()->CCarrera, $intCCarrera)
                                                )
                                );
        //GetDatabase()->Query("SELECT COUNT(*) FROM titulo WHERE descripcion LIKE '".$strDescripcion."'");
        if (!$objOLTPTitulo) {
            $objOLTPTitulo = new OLTPTitulo();
            $objOLTPTitulo->CNivelTitulo = $intCNivelTitulo;
            $objOLTPTitulo->Descripcion = $strDescripcion;
            $objOLTPTitulo->DescripcionAmpliada = "";
            $objOLTPTitulo->CTitulo = null;
            $objOLTPTitulo->CCarrera = $intCCarrera;
            LogHelper::Debug(sprintf('Guardando Titulo :: Descripcion: %s | CNivelTitulo: %d | CCarrera: %d',
                $objOLTPTitulo->Descripcion,
                $objOLTPTitulo->CNivelTitulo,
                $objOLTPTitulo->CCarrera));
            $objOLTPTitulo->Save();
    
   
            $objOLTPTitulo = OLTPTitulo::QuerySingle(QQ::AndCondition(
                                                QQ::Equal(QQN::OLTPTitulo()->Descripcion,$strDescripcion),
                                                QQ::Equal(QQN::OLTPTitulo()->CNivelTitulo,$intCNivelTitulo),
                                                QQ::Equal(QQN::OLTPTitulo()->CCarrera, $intCCarrera)
                                                )
                                );
    
            //$objOLTPTitulo->Reload(); no funcionan porque no tiene el IdTitulo para reloadear

            $objOLTPTituloOferta = new OLTPTituloOferta();
            $objOLTPTituloOferta->IdTituloObject = $objOLTPTitulo;
            $objOLTPTituloOferta->COferta = $intCOferta;
            $objOLTPTituloOferta->CTituloOferta = null;
            LogHelper::Debug(sprintf('Guardando TituloOferta :: IdTitulo: %d | COferta: %d',
                $objOLTPTituloOferta->IdTitulo,
                $objOLTPTituloOferta->COferta));
            $objOLTPTituloOferta->Save();
        }
        return $objOLTPTitulo;
    }

    protected static function GetPlanDictadoByIdLocalizacionCOfertaAgregadaCModalidad1CGrado($intIdLocalizacion, $intCOfertaAgregada, $intCModalidad1, $intCGrado = null, $blnSoloActivo = false) {

        $arrConditions = array(
            QQ::Equal(QQN::OLTPOfertaLocal()->IdLocalizacion, $intIdLocalizacion),
            QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->COfertaBaseObject->OLTPOfertaAgregadaTipoAsOfertaAgregadaBase->COfertaAgregada, $intCOfertaAgregada),
            QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->CModalidad1, $intCModalidad1));
        if (!is_null($intCGrado))
            array_push($arrConditions, QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->GradoOfertaTipoAsCOferta->CGrado, $intCGrado));
        if ($blnSoloActivo)
            array_push($arrConditions, QQ::Equal(QQN::OLTPOfertaLocal()->CEstado, OLTPEstadoTipo::Activo));

        //HACK para que las ofertas de domiciliaria hospitalaria no rompan las otras migraciones (el blanco se migra ad-hoc)
        array_push($arrConditions, QQ::NotIn(QQN::OLTPOfertaLocal()->COferta, array(152,153,154,155,156,157,158,159)));

        $arrOfertasLocales = OLTPOfertaLocal::QueryArray(QQ::AndCondition($arrConditions));

        if (count($arrOfertasLocales) != 1 &&
                (!(count($arrOfertasLocales) > 1 && $intCGrado == 20))/* excepcion para organizacion modular */) {
            $objOfertaAgregada = OLTPOfertaAgregadaTipo::Load($intCOfertaAgregada);
            $str = count($arrOfertasLocales) ?
                    sprintf("Se encontró más de una Oferta Local%s de %s de %s en la Localización %s", ($blnSoloActivo) ? ' ACTIVA' : '', $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($intCModalidad1), $intIdLocalizacion) :
                    sprintf("No se encuentra una Oferta Local%s de %s de %s en la Localización %s", ($blnSoloActivo) ? ' ACTIVA' : '', $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($intCModalidad1), $intIdLocalizacion);
            throw new MigrationException($str);
        }

        if ($intCOfertaAgregada == 2400) {
            $arrPlanDictado = OLTPPlanDictado::QueryArray(
                            QQ::AndCondition(
                                QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocal,$arrOfertasLocales[0]->IdOfertaLocal),
                                QQ::Equal(QQN::OLTPPlanDictado()->IdTituloOfertaObject->CTituloOferta,25)
                            )
            );
        } else {
            $arrPlanDictado = OLTPPlanDictado::LoadArrayByIdOfertaLocal($arrOfertasLocales[0]->IdOfertaLocal);
        }

        if (count($arrPlanDictado) > 1) {
            $objOfertaAgregada = OLTPOfertaAgregadaTipo::Load($intCOfertaAgregada);
            throw new MigrationException(sprintf("Se encontró más de un Plan Dictado para la Oferta %s de %s", $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($intCModalidad1)));
        }

        //Para talleres de educación integral, especificamos el titulo ya que se pregunta agregado y desagregado
        $objTituloOferta = ($intCOfertaAgregada == 2400) ? OLTPTituloOferta::Load(25) : null;

        return count($arrPlanDictado) ? $arrPlanDictado[0] : self::CrearPlanDictado($arrOfertasLocales[0], $objTituloOferta);
    }

    /**
     * CrearPlanDictado es un método para crear un plan dictado de las ofertas que tienen título ficticio.
     * Es el caso de niveltitulo 3, las ofertas como inicial, jardín, primaria, etc. que no se guardan por título
     * 
     * @param OLTPOfertaLocal $objOfertaLocal
     * @param OLTPTituloOferta $objTituloOferta
     * @return OLTPPlanDictado 
     */
    public static function CrearPlanDictado(OLTPOfertaLocal $objOfertaLocal, OLTPTituloOferta $objTituloOferta = null, $intCNorma = null, $strNormaNro = null, $strNormaAnio = null, $intCDuracionEn = null, $intDuracion = null, $intCTema = null, $intCCaracterActividad = -1, $intCCiclo = -1) {
        $objPlanDictado = new OLTPPlanDictado();
        $objPlanDictado->IdOfertaLocalObject = $objOfertaLocal;
        if (!$objTituloOferta) {
            $objTituloOferta = array_shift_unref(OLTPTituloOferta::LoadArrayByCOferta($objOfertaLocal->COferta));
        }
        $objPlanDictado->IdTituloOferta = $objTituloOferta->IdTituloOferta;
        $objPlanDictado->Duracion = $intDuracion ? $intDuracion : 0;
        $objPlanDictado->CRequisito = -1;
        $objPlanDictado->CDuracionEn = $intCDuracionEn ? $intCDuracionEn : 1;
        $objPlanDictado->CCondicion = -1;
        $objPlanDictado->CNorma = $intCNorma ? $intCNorma : -2;
        $objPlanDictado->NormaNro = $strNormaNro ? $strNormaNro : 'ficticio generado';
        $objPlanDictado->NormaAnio = $strNormaAnio ? $strNormaAnio : null;
        $objPlanDictado->CDictado = -1;
        $objPlanDictado->CTema = $intCTema ? $intCTema : -1;
        $objPlanDictado->CCaracterActividad = ($intCCaracterActividad)?$intCCaracterActividad:-1;
        $objPlanDictado->CCiclo = $intCCiclo ? $intCCiclo : -1;
        $objPlanDictado->FechaActualizacion = QDateTime::Now();
        $objPlanDictado->FechaCreacion = QDateTime::Now();
        LogHelper::Debug(sprintf('Guardando PlanDictado :: IdTituloOferta: %d | Duracion: %d | CDuracionEn: %d | CRequisito: %d | CCondicion: %d | CNorma: %d | NormaNro: %d | NormaAnio: %d | CDictado: %d | CTema: %d', 
                $objPlanDictado->IdTituloOferta, $objPlanDictado->Duracion, $objPlanDictado->CDuracionEn, $objPlanDictado->CRequisito, $objPlanDictado->CCondicion, $objPlanDictado->CNorma, $objPlanDictado->NormaNro, $objPlanDictado->NormaAnio, $objPlanDictado->CDictado, $objPlanDictado->CTema));
        $objPlanDictado->Save();
        return $objPlanDictado;
    }

    protected static $objPlanDictadoCicloBasicoArray = array();

    /**
     * Devuelve un PlanDictado para la fila buscandolo por titulo
     * @param Fila $objFila
     * @return OLTPPlanDictado 
     */
    protected static function GetPlanDictadoPorTitulo(Fila $objFila) {
        $intCCiclo = -1;
        if(in_array(295, $objFila->Cuadro->GetColumnasIds())) $intCCiclo = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(295)->Valor);

        $objOLTPTitulo = self::GetOLTPTitulo($objFila);
        $objPlanDictado = OLTPPlanDictado::QuerySingle(QQ::AndCondition(
            QQ::Equal(QQN::OLTPPlanDictado()->IdTituloOfertaObject->IdTituloObject,$objOLTPTitulo->IdTitulo),
            QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->COfertaObject->COfertaBaseObject->OLTPOfertaAgregadaTipoAsOfertaAgregadaBase->COfertaAgregada, $objFila->Cuadro->GetCOfertaAgregada()),
            QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->COfertaObject->CModalidad1,$objFila->Cuadro->GetCModalidad1()),
            QQ::Equal(QQN::OLTPPlanDictado()->CCiclo,$intCCiclo), //Solo es <> de -1 para marron 1.1
            QQ::Equal(QQN::OLTPPlanDictado()->IdOfertaLocalObject->IdLocalizacion,$objFila->Cuadro->Localizacion->IdLocalizacion)
                        ));

        if (!$objPlanDictado) {
            $objOfertaLocalArray = self::GetOfertaLocalByIdLocalizacionCModalidad1COfertaAgregada($objFila->Cuadro->Localizacion->IdLocalizacion, $objFila->Cuadro->GetCModalidad1(), $objFila->Cuadro->GetCOfertaAgregada());
            $objOfertaLocal = array_pop($objOfertaLocalArray);
            if (!$objOfertaLocal) {
                $objOfertaAgregada = OLTPOfertaAgregadaTipo::Load($objFila->Cuadro->GetCOfertaAgregada());
                throw new MigrationException("No se encuentra una Oferta Local de ".$objOfertaAgregada->Descripcion, $objFila->Cuadro);
            }
            $objOLTPTituloOferta = OLTPTituloOferta::QuerySingle(QQ::AndCondition(
                        QQ::Equal(QQN::OLTPTituloOferta()->IdTitulo, $objOLTPTitulo->IdTitulo),
                        QQ::Equal(QQN::OLTPTituloOferta()->COferta, $objOfertaLocal->COferta)
                            ));

            $intCNorma = null;
            if(in_array(195, $objFila->Cuadro->GetColumnasIds())) $intCNorma = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(195)->Valor);
            $strNormaNro = null;
            if(in_array(226, $objFila->Cuadro->GetColumnasIds())) $strNormaNro = $objFila->GetCeldaByIdColumna(226)->Valor;
            $strNormaAnio = null;
            if(in_array(227, $objFila->Cuadro->GetColumnasIds())) $strNormaAnio = $objFila->GetCeldaByIdColumna(227)->Valor;
            $intCDuracionEn = null;
            if(in_array(646, $objFila->Cuadro->GetColumnasIds()) || in_array(401, $objFila->Cuadro->GetColumnasIds())) $intCDuracionEn = OLTPDuracionEnTipo::HorasCatedra;
            $intDuracion = null;
            if(in_array(401, $objFila->Cuadro->GetColumnasIds())) $intDuracion = $objFila->GetCeldaByIdColumna(401)->Valor;
            if(in_array(646, $objFila->Cuadro->GetColumnasIds())) $intDuracion = $objFila->GetCeldaByIdColumna(646)->Valor;
            $intCTema = null;
            if(in_array(413, $objFila->Cuadro->GetColumnasIds())) $intCTema = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(413)->Valor);
            $intCCaracterActividad = null;
            if(in_array(316, $objFila->Cuadro->GetColumnasIds())) $intCCaracterActividad = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(316)->Valor);

            $objPlanDictado = self::CrearPlanDictado($objOfertaLocal, $objOLTPTituloOferta, $intCNorma, $strNormaNro, $strNormaAnio, $intCDuracionEn, $intDuracion, $intCTema, $intCCaracterActividad, $intCCiclo);
        }
        return $objPlanDictado;
    }

    /**
     * Para los cuadros de secundaria con nro de orden 0
     * @param Fila $objFila
     * @return OLTPPlanDictado 
     */
    protected static function GetPlanDictadoCicloBasico(Fila $objFila) {

        $intIdLocalizacion = $objFila->Cuadro->Localizacion->IdLocalizacion;
        $intIdDefinicionCuadro = $objFila->Cuadro->IdCuadro;
        $intCOrientacion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(175)->Valor);
        $intCOfertaAgregada = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(55)->Valor);

        if (array_key_exists($intIdLocalizacion, self::$objPlanDictadoCicloBasicoArray)) {
            if (array_key_exists($intIdDefinicionCuadro, self::$objPlanDictadoCicloBasicoArray[$intIdLocalizacion])) {
                if (array_key_exists($intCOrientacion, self::$objPlanDictadoCicloBasicoArray[$intIdLocalizacion][$intIdDefinicionCuadro])) {
                    return self::$objPlanDictadoCicloBasicoArray[$intIdLocalizacion][$intIdDefinicionCuadro][$intCOrientacion];
                }
            }
            else {
                // inicializo el array de ciclos básicos de este cuadro para esta localización (puede haber uno por cada orientación)
                self::$objPlanDictadoCicloBasicoArray[$intIdLocalizacion][$intIdDefinicionCuadro] = array();
            }
        }
        else {
            // piso el array con uno nuevo para no acumular los planes de otra localización (siempre se migra de a una localización por vez)
            self::$objPlanDictadoCicloBasicoArray = array($intIdLocalizacion => array($intIdDefinicionCuadro => array()));
        }

        LogHelper::Debug("No hay plan dictado para la orientación de ciclo básico {$intCOrientacion}, entonces se crea");
        $blnSoloActivas = in_array($objFila->Cuadro->IdDefinicionCuadro, array(226,158,525,432 ));

        $arrOfertasLocales = self::GetOfertaLocalSecundariaByIdLocalizacionCModalidad1COfertaAgregadaCRequisito(
                        $intIdLocalizacion, $objFila->Cuadro->GetCModalidad1(), $intCOfertaAgregada, null, $blnSoloActivas);


        if (count($arrOfertasLocales) != 1) {
            $objOfertaAgregada = OLTPOfertaAgregadaTipo::Load($intCOfertaAgregada);
            if (empty($arrOfertasLocales)) {
                $str = sprintf("No se encuentra una Oferta Local de %s de %s creando el Plan de Ciclo Básico", $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($objFila->Cuadro->GetCModalidad1()));
                throw new MigrationException($str,$objFila->Cuadro);
            }
            // Si tengo más de una priorizo 1º activa, 2º inactiva
            $objOfertaLocalActivas = array();
            $objOfertaLocalInactivas = array();
            foreach ($arrOfertasLocales as $objUnaOferta) {
                if ($objUnaOferta->CEstado == OLTPEstadoTipo::Activo)
                    $objOfertaLocalActivas[] = $objUnaOferta;
                if ($objUnaOferta->CEstado == OLTPEstadoTipo::Inactivo)
                    $objOfertaLocalInactivas[] = $objUnaOferta;
            }
            if (count($objOfertaLocalActivas) == 1)
                $arrOfertasLocales = $objOfertaLocalActivas;
            elseif (count($objOfertaLocalActivas) == 0 && count($objOfertaLocalInactivas) == 1)
                $arrOfertasLocales = $objOfertaLocalInactivas;
            else {
                $str = sprintf("Se encontró más de una Oferta Local de %s de %s creando el Plan de Ciclo Básico", $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($objFila->Cuadro->GetCModalidad1()));
                throw new MigrationException($str,$objFila->Cuadro);
            }
        }
        // Saco la Oferta (luego del filtrado anterior debería ser solo una)
        $objOfertaLocal = array_pop($arrOfertasLocales);

        // FIXME no hay forma que no sea hardcodeando esto?
        //1080  "Plan remanente de egb3"
        //12665 "Ciclo básico ruralizado"
        $arrCOrientacion2CTitulo = array(
            2  => 1079, //1079  "Ciclo básico/ educación secundaria básica"
            8  => 3751, //3751  "Ciclo basico técnico"
            60 => 2647, //2647  "Ciclo básico de arte"
            70 => 2646, //2646  "Ciclo básico agrario"
        );
        $objTituloOferta = OLTPTituloOferta::LoadByCOfertaIdTitulo($objOfertaLocal->COferta, $arrCOrientacion2CTitulo[$intCOrientacion]);
        if (!$objTituloOferta) {
            throw new MigrationException(sprintf("La orientación %d no corresponde a la Oferta %s (Fila %d)", $intCOrientacion, $objOfertaLocal->COfertaObject->Descripcion, $objFila->IdFila),$objFila->Cuadro);
        }

        LogHelper::Debug(sprintf('Creando plan_dictado de ciclo básico IdTitulo: %d|CModalidad1: %d|IdLocalización %d',
                $objTituloOferta->IdTituloOferta,$objFila->Cuadro->GetCModalidad1(), $intIdLocalizacion));

        $objPlanDictado = new OLTPPlanDictado();
        $objPlanDictado->IdOfertaLocalObject = $objOfertaLocal;
        $objPlanDictado->IdTituloOfertaObject = $objTituloOferta;
        $objPlanDictado->CRequisito = -1;
        $objPlanDictado->CNorma = -2;
        $objPlanDictado->CDuracionEn = OLTPDuracionEnTipo::Anios;
        $objPlanDictado->Duracion = -1;
        $objPlanDictado->CCondicion = -1;
        $objPlanDictado->CDictado = -1;
        $objPlanDictado->CTema = -1;
        $objPlanDictado->CCaracterActividad = -1;
        $objPlanDictado->CCiclo = -1;
        $objPlanDictado->FechaActualizacion = QDateTime::Now();
        $objPlanDictado->FechaCreacion = QDateTime::Now();
        $objPlanDictado->Save();

        LogHelper::Debug('PlanDictado de ciclo básico creado correctamente');

        self::$objPlanDictadoCicloBasicoArray[$intIdLocalizacion][$intIdDefinicionCuadro][$intCOrientacion] = $objPlanDictado;

        return $objPlanDictado;
    }

    
}
?>
