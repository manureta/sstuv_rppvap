<?php
/**
 * Minima unidad de informacion de cada cuadro.
 *
 * @var objFila $Fila la fila de la celda
 *
 */
class Celda {
    
    /**
     *
     * @var CuadroBase
     */
    protected $objCuadro;
    protected $objColumna;
    protected $intIdDefinicionFila;
    protected $objFila;
    protected $intIdDefinicionCelda;
    
    protected $mixValor;
    protected $intTipoDato;
    protected $blnModificado = false;
    protected $blnHasError = false;
    protected $blnHasInconsistencia = false;
    protected $mixDefaultValor;
    protected $intIdDatosCelda;
    protected $blnDisabled;

    /**
     * Es una Pila De Errores, que se se apilan y se sacan cada vez
     * Cada Inconsistencia se pide una vez y desaparece.
     * @var Inconsistencia[]
     */
    protected $_objInconsistenciaArray = array();

    public function __construct() {
    }

    public function ResetErrores() {
        $this->_objInconsistenciaArray = array();
        $this->blnHasError = false;
        $this->blnHasInconsistencia = false;
    }

//    public function Save() {
//        if (!$this->objColumna)
//            throw new QCallerException('ERROR: No existe la Columna');
//        if (!$this->objFila)
//            throw new QCallerException('ERROR: No existe la Fila');
//        if (!$this->objColumna->Cuadro->Localizacion->IdLocalizacion)
//            throw new QCallerException('ERROR: No existe IdLocalizacion');
//        //preg_match('/([A-Za-z]+)([\d]+)/i', get_class($this->objColumna->Cuadro), $regs);
//        //$intIdCuadro = $regs[2];
//        $intIdCuadro = $this->objColumna->Cuadro->IdDefinicionCuadro;
//        if (!$intIdCuadro || !is_numeric($intIdCuadro))
//            throw new QCallerException(sprintf('ERROR: IdCuadro erroneo %s', $intIdCuadro));
//
//        if (!$this->Modificado) return;
//
//        // TODO Obtenemos el objDatabase de Cuadro base??
//        $objDatabase = CuadroBase::GetDatabase();
//        if (($objDatosRespuesta = DatosRespuesta::LoadByExtraParams(
//            $this->objColumna->Cuadro->Localizacion->IdLocalizacion,
//            $intIdCuadro,
//            $this->objColumna->IdDefinicionColumna,
//            $this->objFila->IdDefinicionFila))) {
//        // Existe la celda guardada en la base de datos
//            if ($this->Valor == $this->DefaultValor) {
//                $objDatabase->NonQuery(sprintf("DELETE FROM datos_respuesta ".
//                    " WHERE id_datos_respuesta = %d ",
//                    $objDatosRespuesta->IdDatosRespuesta
//                ));
//            }
//            else {
//                $objDatabase->NonQuery(sprintf("UPDATE datos_respuesta set ".
//                    " valor = '%s' where ".
//                    "id_datos_respuesta = %d ",
//                    $this->GetValorControl(),
//                    $objDatosRespuesta->IdDatosRespuesta
//                ));
//
//            }
//        } else {
//        // No existe la celda en la base de datos
//            $objDatabase->NonQuery(sprintf('INSERT INTO datos_respuesta ('.
//                'id_localizacion, '.
//                'id_definicion_cuadro, '.
//                'id_definicion_columna, '.
//                'id_definicion_fila, '.
//                'valor'.
//                ') values ('.
//                "'%d', '%d', '%d', '%d', '%s'".
//                ')',
//                $this->objColumna->Cuadro->Localizacion->IdLocalizacion,
//                $intIdCuadro,
//                $this->objColumna->IdDefinicionColumna,
//                $this->objFila->IdDefinicionFila,
//                $this->GetValorControl()
//            ));
//        }
//        $this->blnModificado = false;
//    }

//    public function CrearControl() {
//        $this->objInput = InputFactory::Create($this->objColumna->Cuadro, $this->intTipoDato, $this->objColumna->Ancho);
//        if($this->mixValor)
//            $this->SetValorControl();
//        switch ($this->intTipoDato) {
//            case TipoDatoType::STRING:
//            case TipoDatoType::TEXT:
//                $this->mixDefaultValor = "";
//                break;
//            case TipoDatoType::SMALLINT:
//            case TipoDatoType::INTEGER:
//                $this->mixDefaultValor = 0;
//                break;
//            case TipoDatoType::BOOLEAN:
//                $this->mixDefaultValor = false;
//                break;
//            default:
//            // TODO
//                $this->mixDefaultValor = false;
//                break;
//        }
//    }


//    protected function SetValorControl() {
//        if (!isset($this->objInput)) {
//            throw new QCallerException('Intenta setear el valor en una celda sin input');
//        }
//        switch ($this->intTipoDato) {
//            case TipoDatoType::STRING:
//            case TipoDatoType::TEXT:
//                $this->objInput->Text = $this->mixValor;
//                break;
//            case TipoDatoType::SMALLINT:
//            case TipoDatoType::INTEGER:
//                $this->objInput->Value = $this->mixValor;
//                break;
//            case TipoDatoType::BOOLEAN:
//                $this->objInput->Value = $this->mixValor;
//                break;
//            case TipoDatoType::TURNO:
//            default:
//                $this->objInput->SelectedValue = $this->mixValor;
//                // TODO
//                break;
//        }
//    }
//
//    private function GetValorControl() {
//        if (!isset($this->objInput)) {
//            throw new QCallerException('Intenta obtener el valor en una celda sin input');
//        }
//        if ($this->mixValor != $this->objInput->Value) {
//            $this->blnModificado = true;
//            $this->mixValor = $this->objInput->Value;
//        }
//        return $this->mixValor;
//    }

    public function  __get($name) {
        switch ($name) {
            case 'HasError':
                return $this->blnHasError;
            case 'HasInconsistencia':
                return $this->blnHasInconsistencia;
            case 'IdDatosCelda':
                return $this->intIdDatosCelda;
            case 'IdDefinicionFila':
                return $this->intIdDefinicionFila;
                break;
            case 'Modificado':
                return $this->blnModificado;
                break;
            case 'DefaultValor':
                return $this->mixDefaultValor;
                break;
            case 'Valor':
                return $this->mixValor;
            case 'Columna':
                return $this->objColumna;
                break;
            case 'Fila':
                return $this->objFila;
                break;
            case 'Cuadro':
                return $this->objCuadro;
                break;
            case 'IdDefinicionCelda':
                return $this->intIdDefinicionCelda;
                break;
            case 'Disabled':
                return $this->blnDisabled;
                break;
            case 'InconsistenciaArray':
            case 'objInconsistenciaArray':
                return $this->_objInconsistenciaArray;
            default:
                throw new QUndefinedPropertyException('GET', 'Celda', $name);
        }
    }

    public function  __set($strName, $mixValue) {
        switch ($strName) {
            case 'HasError':
                return $this->blnHasError = (boolean)$mixValue;
            case 'HasInconsistencia':
                return $this->blnHasInconsistencia = (boolean)$mixValue;
            case 'IdDatosCelda':
                return $this->intIdDatosCelda = (int)$mixValue;
            case 'IdDefinicionFila':
                return $this->intIdDefinicionFila = (int)$mixValue;
                break;
            case 'Modificado':
                return $this->blnModificado = $mixValue;
                break;
            case 'Fila':
                return $this->objFila = $mixValue;
                break;
            case 'Cuadro':
                return $this->objCuadro = $mixValue;
                break;
            case 'Columna':
                $this->objColumna = $mixValue;
                $this->intTipoDato = (int)$this->objColumna->TipoDato;
                return $this->objColumna;
                break;
//            case 'Estado':
//                switch ($mixValue) {
//                    case EstadoType::Vacio:
//                    case EstadoType::Completo:
//                    case EstadoType::Completoconinconsistencia:
//                        return $this->intEstado = QType::Cast($mixValue, QType::Integer);
//                        break;
//                    default:
//                        throw new QCallerException('Intenta setear un estado incorrecto a una celda');
//                        break;
//                }
//                break;
            case 'Valor':
                $this->blnModificado = true;
                $this->mixValor = $mixValue;
                break;
            case 'IdDefinicionCelda':
                return $this->intIdDefinicionCelda = $mixValue;
                break;
            case 'Disabled':
                return $this->blnDisabled = $mixValue;
                break;
            case 'DefaultValor':
                return $this->mixDefaultValor = $mixValue;
                break;
            case 'objInconsistenciaArray':
            case 'InconsistenciaArray':
                return $this->_objInconsistenciaArray = $mixValue;
        }
    }


    public function addInconsistencia(Inconsistencia $objInconsistencia){
        switch(true){
            case $objInconsistencia instanceof InconsistenciaFaltante:
            case $objInconsistencia instanceof InconsistenciaError:
                $this->objCuadro->HasError = true;
                $this->blnHasError = true;
                break;
            default:
                $this->objCuadro->HasInconsistencia = true;
                $this->blnHasInconsistencia = true;
                break;
        }
        
        array_push($this->_objInconsistenciaArray,$objInconsistencia);
    }

    public function getInconsistencias(){
        return $this->_objInconsistenciaArray;
    }
}

?>
