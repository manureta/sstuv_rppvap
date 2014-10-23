<?php
/**
 * Description of MigracionBase
 *
 * @author paeza
 */
    
class MigracionBase {

    /**
     * Toma por parametro un objeto cuadro, y de acuerdo a su DatosCuadro devuelve
     * la oferta dictada correspondiente.
     * @param CuadroBase $objCuadro
     * @return OLTPOfertaDictada
     */
    public static function GetOfertaDictadaByCuadro(CuadroBase $objCuadro) {
        return self::GetOfertaDictada($objCuadro->Localizacion->IdLocalizacion, 
                $objCuadro->GetCOfertaAgregada(), 
                $objCuadro->GetCModalidad1());
    }

    /**
     * GetOfertaDictada busca en la base de datos por la clave de negocio
     * y si no existe crea un nuevo objeto y lo devuelve.
     * @param integer $intIdLocalizacion
     * @param integer $intCOfertaAgregada
     * @param integer $intCModalidad1
     * @return OLTPOfertaDictada
     */
    public static function GetOfertaDictada($intIdLocalizacion, $intCOfertaAgregada, $intCModalidad1) {

        $objOfertaDictada = OLTPOfertaDictada::LoadByIdLocalizacionCOfertaAgregadaCModalidad1(
                        $intIdLocalizacion, $intCOfertaAgregada, $intCModalidad1);

        // si no existe creo una nueva con las propiedades pasadas y la devuelvo
        if (!$objOfertaDictada) {
            $objOfertaDictada = new OLTPOfertaDictada();
            $objOfertaDictada->CModalidad1 = $intCModalidad1;
            $objOfertaDictada->COfertaAgregada = $intCOfertaAgregada;
            $objOfertaDictada->IdLocalizacion = $intIdLocalizacion;
            $objOfertaDictada->Save();
        }

        return $objOfertaDictada;
    }

    /**
     *
     * @param Fila $objFila
     * @return OLTPFormacionTipo
     */
    public static function GetFormacionTipo(Fila $objFila) {
        // para el común de los cuadros, la fila identifica la OFERTA AGREGADA
        // para los cuadros de superior, la fila identifica la FORMACION
        // Entonces: IDENTIFICO LA FILA/S CUADROS HAGO UN SWITCH POR IdFila

        switch ($objFila->IdFila) {
            // PONER LAS FILAS DE LOS VERDES
            case 440:
            case 441:
            case 442:
                $objFormacionTipo = OLTPFormacionTipo::Load($objFila->CodigoRelacional);
        }

        return (isset($objFormacionTipo)) ? $objFormacionTipo : OLTPFormacionTipo::Load(-1);
    }

    /**
     * Trae las ofertas locales sin tener en cuenta el requisito, Es Para Superior.
     */
    public static function GetOfertaLocalByIdLocalizacionCModalidad1COfertaAgregada($intIdLocalizacion, $intCModalidad1, $intCOfertaAgregada, $blnSoloActivo = false){
        $arrConditions = array(
                QQ::Equal(QQN::OLTPOfertaLocal()->IdLocalizacion, $intIdLocalizacion),
                QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->COfertaBaseObject->OLTPOfertaAgregadaTipoAsOfertaAgregadaBase->COfertaAgregada, $intCOfertaAgregada),
                QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->CModalidad1, $intCModalidad1));
        if ($blnSoloActivo) array_push($arrConditions, QQ::Equal(QQN::OLTPOfertaLocal()->CEstado, OLTPEstadoTipo::Activo));

        return OLTPOfertaLocal::QueryArray(QQ::AndCondition($arrConditions));


    } 
    
    /**
     * Devuelve las ofertas locales de una localización dada la oferta agregada y la modalidad1
     * sumando el parámetro de requisito de ingreso para determinar si es una secundaria
     * con requisito de primaria de 6 años o de 7 años
     * 
     * @param integer $intIdLocalizacion
     * @param integer $intCModalidad1
     * @param integer $intCOfertaAgregada
     * @param integer $intCRequisito
     * @param boolean $blnSoloActivo
     * @return OLTPOfertaLocal[]
     */
    public static function GetOfertaLocalSecundariaByIdLocalizacionCModalidad1COfertaAgregadaCRequisito($intIdLocalizacion, $intCModalidad1, $intCOfertaAgregada, $intCRequisito = null, $blnSoloActivo = false) {
        //De acuerdo al requisito de ingreso (CRequisito) determino qué COfertas pueden ser (#1377)
        switch ($intCRequisito) {
            case 1: //req 6 años
                $arrCOfertasSecundaria = array(108,110);
                break;
            case 2: //req 7 años
                $arrCOfertasSecundaria = array(109,111);
                break;
            case 3: //req 9 años
                $arrCOfertasSecundaria = array(112,147,148);
                break;
            default:
                // adultos
                $arrCOfertasSecundaria = array(143,144,145,151);
        }

        $arrConditions = array(
                QQ::Equal(QQN::OLTPOfertaLocal()->IdLocalizacion, $intIdLocalizacion),
                QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->COfertaBaseObject->OLTPOfertaAgregadaTipoAsOfertaAgregadaBase->COfertaAgregada, $intCOfertaAgregada),
                QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->CModalidad1, $intCModalidad1));
        if (!is_null($intCRequisito)) array_push($arrConditions, QQ::In(QQN::OLTPOfertaLocal()->COferta, $arrCOfertasSecundaria));
        if ($blnSoloActivo) array_push($arrConditions, QQ::Equal(QQN::OLTPOfertaLocal()->CEstado, OLTPEstadoTipo::Activo));

        return OLTPOfertaLocal::QueryArray(QQ::AndCondition($arrConditions));

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

    /**
     *
     * @param integer $IdLocalizacion
     * @param integer $intCModalidad1
     * @param integer $intCTurno
     * @param integer $intCJornada
     * @param string $strNombre
     * @param integer $intCTipoSeccion
     * @return OLTPSeccion 
     */
    public static function GetSeccion($IdLocalizacion, $intCModalidad1, $intCTurno, $intCJornada, $strNombre, $intCTipoSeccion) {
        if (in_array($intCTipoSeccion, array(OLTPTipoSeccionTipo::Independiente, 
            OLTPTipoSeccionTipo::Independientederecuperacion,
            OLTPTipoSeccionTipo::Independientesemipresencial,
            OLTPTipoSeccionTipo::Independientepresencialysemipresencial,
            OLTPTipoSeccionTipo::Independientepresencialysemipresencialvioleta))) $blnIndependiente = true;
        else {
            $blnIndependiente = false;
            $arrSecciones = OLTPSeccion::LoadArrayByIdLocalizacionCModalidad1CTurnoCJornadaNombreCTipoSeccion(
                $IdLocalizacion, 
                $intCModalidad1,
                $intCTurno, 
                $intCJornada,
                $strNombre, 
                $intCTipoSeccion);
        }
        if ($blnIndependiente || count($arrSecciones) == 0) {
            $objSeccion = new OLTPSeccion();
            $objSeccion->IdLocalizacion = $IdLocalizacion;
            $objSeccion->CModalidad1 = $intCModalidad1;
            $objSeccion->CTurno = $intCTurno;
            $objSeccion->CJornada = $intCJornada;
            $objSeccion->Nombre = $strNombre;
            $objSeccion->CTipoSeccion = $intCTipoSeccion;
            $objSeccion->Save();
            return $objSeccion;
        }
        return array_pop($arrSecciones);
    }

    public static function GetAlumnos($IdPlanDictado, $IdSeccion, $CGradoOferta, $CAlumno = 1) {
        $objAlumnos = OLTPAlumnos::LoadByIdPlanDictadoIdSeccionCGradoOfertaCAlumno($IdPlanDictado, $IdSeccion, $CGradoOferta, $CAlumno); // 1 == CAlumno, alumno_tipo -> Alumnos
        if (!$objAlumnos) {
            $objAlumnos = new OLTPAlumnos();
            $objAlumnos->IdPlanDictado = $IdPlanDictado;
            $objAlumnos->IdSeccion = $IdSeccion;
            $objAlumnos->CGradoOferta = $CGradoOferta;
            $objAlumnos->CAlumno = $CAlumno;
        }
        return $objAlumnos;
    }



}

?>
