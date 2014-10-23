<?php
/**
 * CuadroBase es la superclase de todos los cuadros.
 * Implementa la estructura y las funciones comunes a todos los cuadros.
 *
 * @author
 */
abstract class CuadroBase {

    protected $blnModificado = false;
    protected $blnDeshabilitarCeldas = true;
    protected $blnHasError = false;
    protected $blnHasInconsistencia = false;
    protected $intIdDefinicionCuadro;
    protected $objLocalizacion;
    protected $strNombre;
    protected $strNumero;
    protected $blnObligatorio;
    protected $blnConflicto;
    protected $arrColumnas;
    protected $arrColumnasOrdenadas;
    protected $arrFilas;
    protected $arrCeldas;
    protected $intEstado;
    protected $intCriterioCompletitud;
    protected $blnSinInformacion=false;
    //Configuracion de Validaciones Basicas
    protected $blnNonEmpty =false;
    protected $blnComplete =false;
    protected $arrInconsistenciaHijos;
    protected $strEndScript;
    protected $intCOfertaAgregada;
    protected $objOfertaLocalArray;

        //// FUNCIONES MÁGICAS

    public function __toString() {
        return sprintf("%s - %s",$this->strNumero,$this->strNombre);
    }
    
    public function  __get($strName) {
        switch ($strName) {
            case 'EndScript':
                return $this->strEndScript;
            case 'CriterioCompletitud':
                return $this->intCriterioCompletitud;
            case 'InconsistenciaHijos':
                return $this->arrInconsistenciaHijos;
            case 'DeshabilitarCeldas':
                return $this->blnDeshabilitarCeldas;
            case 'Modificado':
                return $this->blnModificado;
            case 'HasError':
                return $this->blnHasError;
            case 'HasInconsistencia':
                return $this->blnHasInconsistencia;
            case 'Titulo':
                return $this->strTitulo;
            case 'IdCuadro':
            case 'IdDefinicionCuadro':
                return $this->intIdDefinicionCuadro;
            case 'Localizacion':
            case 'objLocalizacion':
                return $this->objLocalizacion;
            case 'Numero':
                return $this->strNumero;
            case 'Nombre':
                return $this->strNombre;
            case 'Obligatorio':
                return $this->blnObligatorio;
            case 'Conflicto':
                return $this->blnConflicto;
            case 'SinInformacion':
                return $this->blnSinInformacion;
        }       
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case 'CriterioCompletitud':
                return $this->intCriterioCompletitud = $mixValue;
//            case 'InconsistenciaHijos':
//                return $this->arrInconsistenciaHijos = $mixValue;
            case 'HasError':
                return $this->blnHasError = $mixValue;
            case 'HasInconsistencia':
                return $this->blnHasInconsistencia = $mixValue;
            case 'Modificado':
                return $this->blnModificado = $mixValue;
            case 'objLocalizacion':
            case 'Localizacion':
                $this->objLocalizacion = $mixValue;
                $this->DeshabilitarCeldas();
                return $this->objLocalizacion;
            case 'IdCuadro':
            case 'IdDefinicionCuadro':
                return $this->intIdDefinicionCuadro = QType::Cast($mixValue, QType::Integer);
            case 'SinInformacion':
                return $this->blnSinInformacion = (bool) $mixValue;
            case 'Conflicto':
                return $this->blnConflicto = (bool) $mixValue;
        }
    }

    //// MANEJO DE COLECCIONES

    public function AddInconsistenciaHijo(CuadroBase $objCuadro, $intConsistenciaCodigo) {
        $strError = sprintf('Cuadro %s, presenta Error %s', $objCuadro->Numero, $intConsistenciaCodigo);
        $this->arrInconsistenciaHijos[$objCuadro->IdDefinicionCuadro.'_'.$intConsistenciaCodigo] = $strError;
        //array_push($this->arrInconsistenciaHijos, $strError);
    }

    public function GetInconsistenciaHijosArray() {
        if (isset($this->arrInconsistenciaHijos) && count($this->arrInconsistenciaHijos))
            return $this->arrInconsistenciaHijos;
        else
            return array();
    }


    ////// Columnas

    /**
     * Agrega una Columna al array interno de Columnas.
     * @param Columna $objColumna
     */
    protected function AddColumna(Columna $objColumna) {
        $this->arrColumnas[$objColumna->IdColumna] = $objColumna;
        $this->arrColumnasOrdenadas[$objColumna->Orden] = $objColumna;
    }

    /**
     * Devuelve el array de Columnas
     * @return Columna[]
     */
    public function GetColumnas() {
        if (!$this->arrColumnas && !$this->arrColumnasOrdenadas)
            throw new QCallerException(sprintf('ERROR: No existen columnas para el cuadro %s', $this->intIdDefinicionCuadro));
        if ($this->CountColumnas() == count ($this->arrColumnasOrdenadas))
            return $this->arrColumnasOrdenadas;
        return $this->arrColumnas;
    }

    /**
     * Devuelve el array de  ids de Columnas
     * @return integer[]
     */
    public function GetColumnasIds() {
        $arrIdsColumnas = array();
        foreach($this->GetColumnas() as $objColumna) { $arrIdsColumnas[] = $objColumna->IdColumna; }
        return $arrIdsColumnas;
    }

    /**
     *
     *  /**
     * Devuelve el array de  ids de Filas
     * @return integer[]
     */
    public function GetFilasIds() {
        $arrIdsFilas = array();
        foreach($this->GetFilas() as $objFila) { $arrIdsFilas[] = $objFila->IdFila; }
        return $arrIdsFilas;
    }

    /**

     *
     * Devuelve la cantidad de columnas del cuadro
     * @return integer
     */
    public function CountColumnas() {
        return count($this->arrColumnas);
    }

    /**
     * Devuelvo el array de Columnas ordenado por el campo Orden
     * @return array
     */
    public function GetColumnasOrdenadas() {
        //$arrColumnasOrdenadas;//WTF???
        return $this->arrColumnasOrdenadas;
    }

    /**
     *
     * @param <type> $intIndex
     * @return <type>
     */
    public function GetColumna($intIdColumna) {
        if (array_key_exists($intIdColumna, $this->arrColumnas))
            return $this->arrColumnas[$intIdColumna];
        else
            throw new QCallerException(sprintf('ERROR: La columna de indice %d no existe para el cuadro %s', $intIdColumna, $this->intIdDefinicionCuadro));
    }

    ////// Filas

    /**
     * agrega una Fila al array interno de Filas.
     * @param Fila $objFila
     */
    protected function AddFila(Fila $objFila) {
        $this->arrFilas[$objFila->IdFila] = $objFila;
    }

    public function CountFilas() {
        return count($this->arrFilas);
    }

    /**
     * Devuelve el array de filas
     * @return array
     */
    public function GetFilas() {
        if(!$this->arrFilas) {
            $this->CrearFilas();
        }
        if (!count($this->arrFilas)) {
            throw new QCallerException(sprintf('ERROR: No existen filas para el cuadro %d', $this->IdCuadro));
        }
        return $this->arrFilas;
    }

    /**
     * Devuelve las celdas de una columna
     * @return array
     */
    public function GetCeldasByColumna(Columna $objColumna) {
        $arrReturn = array();
        foreach ($this->GetFilas() as $objFila) {
            $objCelda = $objFila->GetCeldaByIdColumna($objColumna->IdColumna);
            array_push($arrReturn, $objCelda);
        }
        return $arrReturn;
    }

    /**
     * Devuelve el objeto fila de acuerdo al IdDefinicionFila
     * @param int $intIdDefinicionFila
     * @return Fila
     */
    public function GetFila($intIdFila) {
        if(!$this->arrFilas) {
            $this->CrearFilas();
        }
        if (array_key_exists($intIdFila, $this->arrFilas))
            return $this->arrFilas[$intIdFila];
        else
            throw new QCallerException (sprintf('No existe la fila con Id %s para el cuadro %s', $intIdFila, $this->intIdDefinicionCuadro));
    }

    ////// Celdas

    /**
     * Devuelve la celda correspondiente a los objeto fila y columna que se pasan
     * @param Fila $objFila
     * @param Columna $objColumna
     * @return Celda
     */
    public function GetCelda(Fila $objFila, Columna $objColumna) {
        return $this->arrFilas[$objFila->IdFila]->GetCelda($objColumna);
    }

    /**
     * Devuelve las celdas de una determinada fila
     * @param Fila $objFila
     * @return Celda
     */
    public function GetCeldasByFila(Fila $objFila) {
        return $this->arrFilas[$objFila->IdFila]->GetCeldas();
    }

    protected abstract function CrearColumnas();
    protected abstract function CrearFilas();
    protected abstract function Verificar();


    /**
     * Devuelve true si el cuadro no tiene datos
     *
     * @param boolean $blnTomarCeroComoVacio
     * @return boolean
     */
    public function IsEmpty($blnTomarCeroComoVacio = false) {
        foreach ($this->GetFilas() as $objFila) {
            foreach ($objFila->GetCeldas() as $objCelda) {
                $value = $objCelda->Valor;
                if($value !== '' && $value !== null)
                    if (!$blnTomarCeroComoVacio || $value !== '0')
                        return false;
            }
        }
        return true;
    }

    /**
     * checkea si el cuadro es vacio y agrega un Inconsistencia en ese caso
     * @return boolean 
     */
    public function CheckEmpty() {
        if($this->IsEmpty()) {
            $objFilas = $this->GetFilas();
            $objFila = array_shift($objFilas);
            $objCeldasArray = $objFila->GetCeldas();
            $objCelda = array_shift($objCeldasArray);
            $objCelda->AddInconsistencia(new InconsistenciaFaltante('El cuadro se encuentra vacío, y es obligatorio', 0, true));
            return true;
        }
        return false;
    }

    protected function CheckNumbers() {
        foreach ($this->GetColumnas() as $objColumna) {
            $intMaxInt = 0;
            $intMinInt = 0;
            switch ($objColumna->TipoDato) {
                case TipoDatoType::SMALLINT:
                    $intMaxInt = QDatabaseNumberFieldMax::Smallint;
                    $intMinInt = QDatabaseNumberFieldMin::Smallint;
                break;
                case TipoDatoType::INTEGER:
                case TipoDatoType::INTEGER_DISABLED:
                    $intMaxInt = QDatabaseNumberFieldMax::Integer;
                    $intMinInt = QDatabaseNumberFieldMin::Integer;
                break;
                default:
                    continue 2;
                break;
            }
            foreach ($this->GetCeldasByColumna($objColumna) as $objCelda) {
                if ($objCelda->Valor == '') continue;
                if ((string)((int) $objCelda->Valor) !== (string) $objCelda->Valor){
                    $objCelda->AddInconsistencia(new InconsistenciaError(sprintf('El valor ingresado (%s) no es numérico',$objCelda->Valor),503,false));
                    continue; // no es numerico, entonces no tiene sentido verificar que este en dentro de un rango de valores
                }
                if ($objCelda->Valor > $intMaxInt || $objCelda->Valor < $intMinInt) {
                    //$objCelda->HasError = true;
                    $objCelda->AddInconsistencia(new InconsistenciaError(sprintf('El valor ingresado (%d)  supera el máximo permitido (%d)',$objCelda->Valor,$intMaxInt),502,false));
                }
                if ($objCelda->Valor < $intMinInt) {
                    $objCelda->AddInconsistencia(new InconsistenciaError(sprintf('El valor ingresado (%d)no   supera el mínimo permitido (%d)',$objCelda->Valor,$intMinInt),502,false));
                }
            }
        }
    }

    public function IsIncomplete() {
        $arrTipoCheckbox = array(TipoDatoType::BOOLEAN,
                                    TipoDatoType::RADIOCHECK_HORIZONTAL,
                                    TipoDatoType::RADIOCHECK_UNICO,
                                    TipoDatoType::RADIOCHECK_VERTICAL);
        switch ($this->intCriterioCompletitud) {
            case CriterioCompletitudType::Algundato:
                $objCelda = null;
                foreach ($this->arrFilas as $objFila) {
                    foreach ($objFila->GetCeldas() as $objCelda) {
                        $value = $objCelda->Valor;
                        if(!$objCelda->Disabled && ($value !== '' && $value !== null)) {
                            return false;
                        }
                    }
                }
                return $objCelda;
            case CriterioCompletitudType::Todafilacondatosestecompleta:
                if($this->IsEmpty())return true;
                foreach ($this->arrFilas as $objFila) {
                    $blnFilaHasData = false;
                    $blnFilaHasEmpty = false;
                    $blnFilaHasCheckbox = false;
                    $blnFilaHasCheckboxChecked = false;

                    foreach ($objFila->GetCeldas() as $objCelda) {
                        if ($objCelda->Disabled) continue;
                        if (in_array($objCelda->Columna->TipoDato,$arrTipoCheckbox)) {
                            $blnFilaHasCheckbox = true;
                            if ($objCelda->Valor) {
                                $blnFilaHasData = true;
                                $blnFilaHasCheckboxChecked = true;
                            }
                            continue;
                        }
                        if ($objCelda->Valor === '' || $objCelda->Valor === null) {
                            if ($blnFilaHasData) return $objCelda;
                            $blnFilaHasEmpty = true;
                        } else {
                            if($blnFilaHasEmpty) return $objCelda;
                            $blnFilaHasData = true;
                        }
                    }
                    if ($blnFilaHasData && ($blnFilaHasEmpty || ($blnFilaHasCheckbox && !$blnFilaHasCheckboxChecked))) 
                        return $objCelda;
                    //else return false;
                }
                return false;
            case CriterioCompletitudType::Todaslasceldascompletas:
                foreach ($this->arrFilas as $objFila) {
                    foreach ($objFila->GetCeldas() as $objCelda) {
                        if($objCelda->Disabled || in_array($objCelda->Columna->TipoDato,$arrTipoCheckbox)) continue;
                        if($objCelda->Valor === '' || $objCelda->Valor === null) {
                            return $objCelda;
                        }
                    }
                }
                return false;
        }
    }

    private function CheckIncomplete() {
        if($objCelda = $this->IsIncomplete()) {
            $str = ($this->intCriterioCompletitud == CriterioCompletitudType::Todaslasceldascompletas) ? 
                'No pueden quedar celdas vacías en este cuadro' : 'No pueden quedar filas incompletas en este cuadro';
            $objCelda->AddInconsistencia(new InconsistenciaError($str,501,true));
            return true;
        }
        return false;
    }

    public function Validate($blnSoloPropias = false) {
        //$this->ResetCuadrosControls();
        //parent::Validate();
        foreach($this->GetFilas() as $objFila) {
            foreach($objFila->GetCeldas() as $objCelda)
                $objCelda->ResetErrores();
        }
        if($this->blnNonEmpty)
            $this->CheckEmpty();
        if(!$this->IsEmpty()) {
            $this->CheckIncomplete();
            $this->CheckNumbers();
        }
        $this->arrInconsistenciaHijos = array();
        $this->Verificar($blnSoloPropias);
        if ($this->blnSinInformacion && $this->HasError) {
            $this->blnSinInformacion = false;
        }
//        //validar cada Control Hijo
//                $this->setValidationError($objControl->ValidationError,$objCelda);
//        }
//        return $this->ValidationResult();
    }

    protected function ValidationResult() {
        
    }

    protected function setValidationError($blnResult){
        if($this->intEstado)
            $this->intEstado = $blnResult;
        return $blnResult;
    }


    protected function ResetCuadrosControls() {
        foreach($this->GetFilas() as $objFila) {
            foreach($objFila->GetCeldas() as $objCelda)
                $objCelda->ResetErrores();
        }
    }

    public function SetEndScript($strJs) {
        $this->strEndScript .= ' '.$strJs;
    }

    public function GetEndScript() {
        return $this->strEndScript;
    }

    public function ResetEndScript() {
        $this->strEndScript = '';
    }

    protected function DeshabilitarCeldas() {
        if (!$this->DeshabilitarCeldas || !$this->Localizacion) return;
        $flag_filas = false;
        $flag_columnas = false;
        if (in_array($this->intIdDefinicionCuadro, ConsistenciaHelper::$arrCuadrosAniosAnteriores)) {
            $objCondition = QQ::OrCondition(QQ::NotEqual(QQN::OLTPOfertaLocal()->CEstado,OLTPEstadoTipo::Baja),
                                            QQ::GreaterThan(QQN::OLTPOfertaLocal()->FechaBaja, '2012-04-30'));
        }
        else {
            $objCondition = QQ::Equal(QQN::OLTPOfertaLocal()->CEstado,OLTPEstadoTipo::Activo);
        }
        foreach ($this->GetFilas() as $objFila){
            if ($objFila->TablaTipo == 'oferta_agregada_tipo') {
                $flag_filas = true;
                $arrOfertasLocales = $this->Localizacion->GetOfertaLocalAsIdArray($objFila->CodigoRelacional, 
                            $this->GetCModalidad1(),
                            $objCondition);
                if (count($arrOfertasLocales) == 0) {
                    foreach ($objFila->GetCeldas() as $objCelda) {
                        if ($objCelda->Valor === '' || is_null($objCelda->Valor)) {
                            $objCelda->Disabled = true;
                        }
                    }                    
                }
            }
            elseif (!$flag_filas) {
                foreach ($this->GetColumnas() as $objColumna) {
                    if ($objColumna->TablaTipo == 'oferta_agregada_tipo') {
                        $flag_columnas = true;
                        $arrOfertasLocales = $this->Localizacion->GetOfertaLocalAsIdArray($objColumna->CodigoRelacional, 
                                    $this->GetCModalidad1(),
                                    $objCondition);
                        if (count($arrOfertasLocales) == 0) {
                            $objCelda = $objFila->GetCeldaByIdColumna($objColumna->IdColumna);
                            if ($objCelda->Valor === '' || is_null($objCelda->Valor)) {
                                $objCelda->Disabled = true;
                            }

                        }
                    }
                }
                if (!$flag_filas && !$flag_columnas) return; // si no hay filas ni columnas de niveles salgo
            }
        }
    }

    /************************************************************************
     * Metodos de Migración
     *
    ************************************************************************/

    /**
     * A partir de su DatosCuadro, devuelve el COfertaAgregada
     * @return integer COfertaAgregada
     */
    public function GetCOfertaAgregada() {
        if (!isset($this->intCOfertaAgregada)) {
            try {
                $objDatosCuadro = DatosCuadro::LoadSingleByIdDefinicionCuadroIdLocalizacion($this->IdCuadro, $this->Localizacion->IdLocalizacion);
            } catch (Exception $e) {
                throw new QCallerException($e->getMessage());
            }
            $this->intCOfertaAgregada = ($objDatosCuadro) ? $objDatosCuadro->IdDatosCapituloObject->IdDefinicionCapituloObject->COfertaAgregada : false;
        }
        return $this->intCOfertaAgregada ? $this->intCOfertaAgregada : null;
    }

    /**
     * A partir de su DatosCuadro, devuelve la colección de Ofertas Locales del establecimiento
     * @param $extraCond QQCondition extra o array de QQConditions extra, a partir del QQN::OLTPOfertaLocal
     * @return OLTPOfertaLocal[]
     */
    public function GetOfertaLocalAsIdArray($extraCond = array()) {
        if (!isset($this->objOfertaLocalArray)) {      
            try {
                $objDatosCuadro = DatosCuadro::LoadSingleByIdDefinicionCuadroIdLocalizacion($this->IdCuadro, $this->Localizacion->IdLocalizacion);
            } catch (Exception $e) {
                throw new QCallerException($e->getMessage());
            }
            if ($objDatosCuadro) {
                $intCOfertaAgregada = $objDatosCuadro->IdDatosCapituloObject->IdDefinicionCapituloObject->COfertaAgregada;
                $arrOfertasLocales = OLTPOfertaLocal::QueryArray(QQ::AndCondition(QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->COfertaBaseObject->OLTPOfertaAgregadaTipoAsOfertaAgregadaBase->COfertaAgregada, $intCOfertaAgregada),
                     QQ::Equal(QQN::OLTPOfertaLocal()->IdLocalizacion, $this->Localizacion->IdLocalizacion),
                     QQ::Equal(QQN::OLTPOfertaLocal()->COfertaObject->CModalidad1, $this->GetCModalidad1()),
                     $extraCond));
                $this->objOfertaLocalArray = $arrOfertasLocales;
            }
        }
        return $this->objOfertaLocalArray;
    }

    /**
     *
     * @return integer CModalidad1
     */
    public function GetCModalidad1() {
        try {
            $objDatosCuadro = DatosCuadro::LoadSingleByIdDefinicionCuadroIdLocalizacion($this->IdCuadro,
                    $this->Localizacion->IdLocalizacion);
        } catch (Exception $e) {
            throw new QCallerException($e->getMessage());
        }
        if ($objDatosCuadro) {
            $objDefinicionCapitulo = $objDatosCuadro->IdDatosCapituloObject->IdDefinicionCapituloObject;
            if(is_null($objDefinicionCapitulo->IdDefinicionCuadernilloObject->CModalidad1))
                LogHelper::Error("Falta modalidad1 para cuadro (con cuadro) ".$this->IdCuadro, 'modalidad1_faltantes.log');
            return $objDefinicionCapitulo->IdDefinicionCuadernilloObject->CModalidad1;
        }
        else {
            LogHelper::Error("Falta modalidad1 para cuadro (sin cuadro) ".$this->IdCuadro . " IdDefinicionCuadro ". $this->IdDefinicionCuadro . " Localizacion " . $this->Localizacion->IdLocalizacion, 'modalidad1_faltantes.log');
            LogHelper::Error(QVarDumper::dump(debug_backtrace(),2));
            return null;
        }

    }



}
?>
