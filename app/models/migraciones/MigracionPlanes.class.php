<?php

/**
 * Secundario
 * Migra el cuadro de Planes
 */
abstract class MigracionPlanes extends MigracionBase {

    public static $arrLocCuadroNroOrdenPlanDictado = array();

    /**
     * Este cuadro (como todos) debería migrarse una sola vez.
     * Cada registro (fila) del cuadro define un PlanDictado distinto, entonces, 
     * por cada fila se crea un nuevo PlanDictado y se busca si existe un PlanEstudioLocal
     * que se haya articulado desde el Padrón.
     * Si no existe, se le asigna el ID del PlanDictado (previamente guardado) pero en negativo.
     * En un proceso posterior, mediante una articulación el Padrón asignará los ID definitivos
     * a los PlanEstudioLocal
     * 
     */
    public static function Ejecutar(CuadroBase $objCuadro) {
        $arrNroOrdenPlanDictado = array();
        LogHelper::Debug("Migrando Planes Cuadro: ".$objCuadro->Numero);
        foreach ($objCuadro->GetFilas() as $i => $objFila) {
            $objOfertaLocal = null;
            if ((!self::GetClave($objFila)) || $objFila->IsEmpty()) continue; // sin nro de orden o vacia no se migra
            LogHelper::Debug("Plan Fila: $i | Nro Orden: ".self::GetClave($objFila));

            if (self::IsSecundaria($objCuadro)) {
                $intCOfertaAgregada = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(55)->Valor);
                $intCRequisito = ($objCuadro->IdCuadro == 157) ? CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(184)->Valor) : -1;
                $arrOfertasLocales = self::GetOfertaLocalSecundariaByIdLocalizacionCModalidad1COfertaAgregadaCRequisito(
                                $objFila->Cuadro->Localizacion->IdLocalizacion, $objFila->Cuadro->GetCModalidad1(), $intCOfertaAgregada, $intCRequisito);
            } else {
                $intCOfertaAgregada = 2300; //Superior No Universitario
                $intCRequisito = -1;
                $arrOfertasLocales = self::GetOfertaLocalByIdLocalizacionCModalidad1COfertaAgregada(
                                $objFila->Cuadro->Localizacion->IdLocalizacion, $objFila->Cuadro->GetCModalidad1(), $intCOfertaAgregada);
            }
            if (count($arrOfertasLocales) == 0) {
                $objOfertaAgregada = OLTPOfertaAgregadaTipo::Load($intCOfertaAgregada);
                $str = sprintf("No se encuentra una Oferta Local de %s de %s%s", $objOfertaAgregada->Descripcion, OLTPModalidad1Tipo::ToString($objFila->Cuadro->GetCModalidad1()),($intCRequisito)?" (cert. requerida $intCRequisito)":'');
                throw new MigrationException($str,$objCuadro);
            }

            if (count($arrOfertasLocales) > 1) {
                LogHelper::Log(sprintf("Se encontró más de una oferta local (pero migra igual) Migrando Planes para la Localización %d, oferta agregada %d, modalidad %d, requisito %d", $objFila->Cuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objFila->Cuadro->GetCModalidad1(),$intCRequisito));
                foreach ($arrOfertasLocales as $objOfertaLocalAux) {
                    if ($objOfertaLocalAux->CEstado == OLTPEstadoTipo::Activo) {
                        $objOfertaLocal = $objOfertaLocalAux;
                        break;
                    }
                }
                /*
                $str = sprintf("Se encontró más de una oferta local ACTIVA para la Localización %d, oferta agregada %d, modalidad %d, requisito %d %s", $objFila->Cuadro->Localizacion->IdLocalizacion, $intCOfertaAgregada, $objFila->Cuadro->GetCModalidad1(),$intCRequisito, $objFila->Cuadro);
                LogHelper::Log($str,'migracion_oltp.log');
                LogHelper::Log($str,'ofertas_ambiguas.log');
                 */
            }
            // HACK para poder resolver si hay más de una oferta local activa compatible
            // si era más de una y encontró una activa ya está asignada, sino tomo la primera (ya sean una o varias)
            if (!isset($objOfertaLocal)) $objOfertaLocal = array_pop($arrOfertasLocales);

            $intCTitulo = $objFila->GetCeldaByIdColumna(563)->Valor;
            $objTituloOferta = OLTPTituloOferta::LoadByCOfertaIdTitulo($objOfertaLocal->COferta, $intCTitulo);
            if (!$objTituloOferta)
                throw new MigrationException("No se encuentra un titulo_oferta para: COferta={$objOfertaLocal->COferta} | CTitulo={$intCTitulo} | FILA={$objFila->IdFila}",$objCuadro);

            $objPlanDictado = new OLTPPlanDictado();
            $objPlanDictado->IdOfertaLocalObject = $objOfertaLocal;
            $objPlanDictado->IdTituloOfertaObject = $objTituloOferta;
            $objPlanDictado->CRequisito = $intCRequisito;
            $objPlanDictado->CDictado = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(188)->Valor);
            $objPlanDictado->CNorma = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(195)->Valor);
            $objPlanDictado->NormaNro = trim($objFila->GetCeldaByIdColumna(226)->Valor);
            $objPlanDictado->NormaAnio = $objFila->GetCeldaByIdColumna(227)->Valor;
            $objPlanDictado->FechaActualizacion = QDateTime::Now();
            $objPlanDictado->FechaCreacion = QDateTime::Now();

            if (self::IsSecundaria($objCuadro)) {
                $objPlanDictado->Duracion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(183)->Valor);
                $objPlanDictado->CDuracionEn = OLTPDuracionEnTipo::Anios;
                //Para Secundaria CCondicion se utiliza para Examen de Ingreso SI/NO, y puede tomar códigos 3 ó 5 exclusivamente
                $objPlanDictado->CCondicion = $objFila->GetCeldaByIdColumna(185)->Valor == 122 ? 3 : 5;
            } elseif (self::IsSuperior($objCuadro)) {
                $objPlanDictado->Duracion = $objFila->GetCeldaByIdColumna(318)->Valor;
                $objPlanDictado->CDuracionEn = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(323)->Valor); //OLTPDuracionEnTipo::Anios;
                $objPlanDictado->CCondicion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(313)->Valor); //$objFila->GetCeldaByIdColumna(185)->Valor == 122 ? 3 : 5;
            }else
                throw new MigrationException("Cuadro  no contemplado en la migracion de Planes",$objCuadro);
            $objPlanDictado->Save();


            $arrPlanEstudioLocal = self::GetPlanEstudioLocal($objFila, $objOfertaLocal, $objTituloOferta, $objPlanDictado);
            switch (count($arrPlanEstudioLocal)) {
                case 0:
                    $objPlanEstudioLocal = new OLTPPlanEstudioLocal();
                    $objPlanEstudioLocal->IdPlanEstudioLocal = $objPlanDictado->IdPlanDictado * -1; //HACK para identificar los planes creados por RA
                    $objPlanEstudioLocal->IdOfertaLocalObject = $objOfertaLocal;
                    $objPlanEstudioLocal->CTituloOfertaObject = $objPlanDictado->IdTituloOfertaObject; //HACK porque los IdTituloOferta son identicos a CTituloOferta, por ahora
                    break;
                case 1:
                    $objPlanEstudioLocal = array_pop($arrPlanEstudioLocal);
                    break;
                default:
                    $str = sprintf("Migrando planes: Se encontró más de un plan de estudio local con el CTituloOferta %d y misma norma para la oferta local %d| Localización %d", 
                                    $objPlanDictado->IdTituloOferta,$objOfertaLocal->IdOfertaLocal,$objFila->Cuadro->Localizacion->IdLocalizacion);
                    LogHelper::Log($str,'migracion_oltp.log');
                    LogHelper::Log($str,'planes_ambiguos.log');
                    $objPlanEstudioLocal = array_pop($arrPlanEstudioLocal);
            }
            //Seteo/actualizo los atributos
            $objPlanEstudioLocal->CRequisito = $objPlanDictado->CRequisito;
            $objPlanEstudioLocal->Duracion = $objPlanDictado->Duracion;
            $objPlanEstudioLocal->CDuracionEn = $objPlanDictado->CDuracionEn;
            $objPlanEstudioLocal->CCondicion = $objPlanDictado->CCondicion;
            $objPlanEstudioLocal->CDictado = $objPlanDictado->CDictado;
            $objPlanEstudioLocal->CNorma = $objPlanDictado->CNorma;
            $objPlanEstudioLocal->NormaNro = $objPlanDictado->NormaNro;
            $objPlanEstudioLocal->NormaAnio = $objPlanDictado->NormaAnio;
            $objPlanEstudioLocal->Save();

            if (self::IsSecundaria($objCuadro)) {
                $objPlanEstudioLocalSecundaria = OLTPPlanEstudioLocalSecundaria::LoadByIdPlanEstudioLocal($objPlanEstudioLocal->IdPlanEstudioLocal);
                if (!$objPlanEstudioLocalSecundaria) {
                    $objPlanEstudioLocalSecundaria = new OLTPPlanEstudioLocalSecundaria();
                    $objPlanEstudioLocalSecundaria->IdPlanEstudioLocal = $objPlanEstudioLocal->IdPlanEstudioLocal;
                }
                $objPlanEstudioLocalSecundaria->CArticulacionTtp = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(187)->Valor);
                $objPlanEstudioLocalSecundaria->COrientacion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(175)->Valor);
                $objPlanEstudioLocalSecundaria->EdadMinima = $objFila->GetCeldaByIdColumna(186)->Valor;
                $objPlanEstudioLocalSecundaria->Save();
            } elseif (self::IsSuperior($objCuadro)) {
                $objPlanEstudioLocalSuperior = OLTPPlanEstudioLocalSuperior::LoadByIdPlanEstudioLocal($objPlanEstudioLocal->IdPlanEstudioLocal);
                if (!$objPlanEstudioLocalSuperior) {
                    $objPlanEstudioLocalSuperior = new OLTPPlanEstudioLocalSuperior();
                    $objPlanEstudioLocalSuperior->IdPlanEstudioLocal = $objPlanEstudioLocal->IdPlanEstudioLocal;
                }
                $objPlanEstudioLocalSuperior->CTipoCarrera = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(291)->Valor);
                $objPlanEstudioLocalSuperior->CTipoFormacion = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(292)->Valor);
                $objPlanEstudioLocalSuperior->CATermino = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(293)->Valor);
                $objPlanEstudioLocalSuperior->ResolucionAnio = $objFila->GetCeldaByIdColumna(564)->Valor;
                $objPlanEstudioLocalSuperior->ResolucionNro = $objFila->GetCeldaByIdColumna(315)->Valor;
                $objPlanEstudioLocalSuperior->Cuatrimestres = $objFila->GetCeldaByIdColumna(317)->Valor;
                $objPlanEstudioLocalSuperior->CTipoTitulo = CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(328)->Valor);
                $objPlanEstudioLocalSuperior->AnioImplementa = $objFila->GetCeldaByIdColumna(329)->Valor;
                $objPlanEstudioLocalSuperior->FechaActualizacion = $objPlanDictado->FechaActualizacion;
                $objPlanEstudioLocalSuperior->Save();
            }

            //Finalmente le seteo el plan de estudio al plan dictado
            $objPlanDictado->IdPlanEstudioLocalObject = $objPlanEstudioLocal;
            $objPlanDictado->Save();

            $arrNroOrdenPlanDictado[self::GetClave($objFila)] = $objPlanDictado;
        }
        // Borro los caches de otras localizaciones ya que siempre se migra la Localización entera
        if (!array_key_exists($objCuadro->Localizacion->IdLocalizacion, self::$arrLocCuadroNroOrdenPlanDictado))
            self::$arrLocCuadroNroOrdenPlanDictado = array($objCuadro->Localizacion->IdLocalizacion => array());
        
        self::$arrLocCuadroNroOrdenPlanDictado[$objCuadro->Localizacion->IdLocalizacion][$objCuadro->IdDefinicionCuadro] = $arrNroOrdenPlanDictado;
    }

    /**
     *
     * @param integer $intIdDefinicionCuadro
     * @param integer $intIdLocalizacion
     * @param integer $intNroOrden
     * @return OLTPPlanDictado 
     */
    public static function GetPlanDictadoByIdDefinicionCuadroIdLocalizacionNroOrden($intIdDefinicionCuadro, $intIdLocalizacion, $intNroOrden) {
        if (!(array_key_exists($intIdLocalizacion, self::$arrLocCuadroNroOrdenPlanDictado)
                && array_key_exists($intIdDefinicionCuadro, self::$arrLocCuadroNroOrdenPlanDictado[$intIdLocalizacion])
                && array_key_exists($intNroOrden, self::$arrLocCuadroNroOrdenPlanDictado[$intIdLocalizacion][$intIdDefinicionCuadro]))) {
            // si no encuentro el plan en static intento migrarlo solamente si estoy en dev
            if (SERVER_INSTANCE == 'dev') {
                $DAO = new CuadroDAO();
                self::Ejecutar($DAO->LoadCuadro($intIdDefinicionCuadro, Localizacion::Load($intIdLocalizacion)));
            }
            else
                return null;
        }
        return self::$arrLocCuadroNroOrdenPlanDictado[$intIdLocalizacion][$intIdDefinicionCuadro][$intNroOrden];
    }

    public static function GetClave(Fila $objFila) {
        //if (self::IsSecundaria($objFila->Cuadro))
            return $objFila->GetCeldaByIdColumna(165)->Valor;
        //return sprintf("%s-%s-%s-%s-%s", $objFila->GetCeldaByIdColumna(563)->Valor, $objFila->GetCeldaByIdColumna(291)->Valor, $objFila->GetCeldaByIdColumna(292)->Valor, $objFila->GetCeldaByIdColumna(188)->Valor, $objFila->GetCeldaByIdColumna(293)->Valor);
    }

    private static function IsSecundaria(CuadroBase $objCuadro) {
        return $objCuadro->IdDefinicionCuadro == 157 || $objCuadro->IdDefinicionCuadro == 430 || $objCuadro->IdDefinicionCuadro == 611 || $objCuadro->IdDefinicionCuadro == 612;
    }

    private static function IsSuperior(CuadroBase $objCuadro) {
        return $objCuadro->IdDefinicionCuadro == 257;
    }

    protected static function GetPlanEstudioLocal(Fila $objFila, OLTPOfertaLocal $objOfertaLocal, OLTPTituloOferta $objTituloOferta, OLTPPlanDictado $objPlanDictado) {
        if (self::IsSecundaria($objFila->Cuadro))
            return OLTPPlanEstudioLocal::QueryArray(QQ::AndCondition(
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->IdOfertaLocal, $objOfertaLocal->IdOfertaLocal),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->CTituloOferta, $objTituloOferta->IdTituloOferta),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->CNorma, $objPlanDictado->CNorma),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->NormaNro, $objPlanDictado->NormaNro),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->NormaAnio, $objPlanDictado->NormaAnio)
                            ));
        elseif (self::IsSuperior($objFila->Cuadro)) {
            return OLTPPlanEstudioLocal::QueryArray(QQ::AndCondition(
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->IdOfertaLocal, $objOfertaLocal->IdOfertaLocal),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->CTituloOferta, $objTituloOferta->IdTituloOferta),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->CNorma, $objPlanDictado->CNorma),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->NormaNro, $objPlanDictado->NormaNro),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->NormaAnio, $objPlanDictado->NormaAnio),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->Duracion, $objFila->GetCeldaByIdColumna(318)->Valor),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->CDuracionEn,CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(323)->Valor)),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->OLTPPlanEstudioLocalSuperior->Cuatrimestres,$objFila->GetCeldaByIdColumna(317)->Valor),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->OLTPPlanEstudioLocalSuperior->CTipoTitulo, CodigoValor::GetCodigoRelacional($objFila->GetCeldaByIdColumna(328)->Valor)),
                QQ::Equal(QQN::OLTPPlanEstudioLocal()->OLTPPlanEstudioLocalSuperior->AnioImplementa,$objFila->GetCeldaByIdColumna(329)->Valor)
                            ));
        }
    }

}

?>
