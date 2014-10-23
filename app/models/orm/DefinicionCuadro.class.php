<?php
	require(__DATAGEN_CLASSES__ . '/DefinicionCuadroGen.class.php');

/**
 * The DefinicionCuadro class defined here contains any
 * customized code for the DefinicionCuadro class in the
 * Object Relational Model.  It represents the "definicion_cuadro" table
 * in the database, and extends from the code generated abstract DefinicionCuadroGen
 * class, which contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * @package My Application
 * @subpackage DataObjects
 *
 */
class DefinicionCuadro extends DefinicionCuadroGen {
    //TODO Definir como hacer con este label, ya que el generador de codigo genera strTituloFilas, y el generador de codigo de cuadros no funciona de esa manera...
    public $lblTituloFilas;
    /**
     * Default "to string" handler
     * Allows pages to _p()/echo()/print() this object, and to define the default
     * way this object would be outputted.
     *
     * Can also be called directly via $objDefinicionCuadro->__toString().
     *
     * @return string a nicely formatted string representation of this object
     */
    public function __toString() {
        return sprintf('%s - %s',  $this->strNumero, $this->strNombre);
    }

    public function isFilasFijas() {
        return !($this->intCantidadFilasPrecargadas);
    }


    /**
     * trae las columnas ordenadas por orden.
     * @return DefcuadroDeffila[]
     */
    public function getDefcuadroDeffila() {
        return DefcuadroDeffila::QueryArray(QQ::Equal(QQN::DefcuadroDeffila()->IdDefinicionCuadro, $this->IdDefinicionCuadro),QQ::OrderBy(QQN::DefcuadroDeffila()->Orden));
    }
    /**
     * trae las columnas ordenadas por orden.
     * @return DefcuadroDefcolumna[]
     */
    public function getDefcuadroDefcolumna() {
        return DefcuadroDefcolumna::QueryArray(QQ::Equal(QQN::DefcuadroDefcolumna()->IdDefinicionCuadro, $this->IdDefinicionCuadro),QQ::OrderBy(QQN::DefcuadroDefcolumna()->Orden));
    }

    public function GenerarDefinicionesCeldaParaColumna(DefinicionColumna $objDefinicionColumna) {
        foreach ($this->GetDefcuadroDeffilaAsIdArray() as $objDefcuadroDefFila) {
            $objDefinicionFila = $objDefcuadroDefFila->IdDefinicionFilaObject;
            $objDefinicionCelda = new DefinicionCelda();
            $objDefinicionCelda->IdDefinicionColumnaObject = $objDefinicionColumna;
            $objDefinicionCelda->IdDefinicionCuadroObject = $this;
            $objDefinicionCelda->IdDefinicionFilaObject = $objDefinicionFila;
            $objDefinicionCelda->Save();
        }

    }

    public function GenerarDefinicionesCeldaParaFila(DefinicionFila $objDefinicionFila) {
        foreach ($this->GetDefcuadroDefcolumnaAsIdArray() as $objDefcuadroDefcolumna) {
            $objDefinicionColumna = $objDefcuadroDefcolumna-> IdDefinicionColumnaObject;
            $objDefinicionCelda = new DefinicionCelda();
            $objDefinicionCelda->IdDefinicionColumnaObject = $objDefinicionColumna;
            $objDefinicionCelda->IdDefinicionCuadroObject = $this;
            $objDefinicionCelda->IdDefinicionFilaObject = $objDefinicionFila;
            $objDefinicionCelda->Save();
        }

    }

    public static function LoadArrayByNombreCortoCuadernillo($strNombreCortoCuadernillo, $objOptionalClauses = null) {
        return DefinicionCuadro::QueryArray(
            QQ::Equal(QQN::DefinicionCuadro()->DefcuadroDefpaginaAsId->IdDefinicionPaginaObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto, $strNombreCortoCuadernillo),
            $objOptionalClauses);
    }

    public static function LoadByNombreCortoCuadernilloNumeroCuadro($strNombreCortoCuadernillo, $intNumeroCuadro, $objOptionalClauses = null) {
        return DefinicionCuadro::QuerySingle(
            QQ::AndCondition(
                QQ::Equal(QQN::DefinicionCuadro()->DefcuadroDefpaginaAsId->IdDefinicionPaginaObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto, $strNombreCortoCuadernillo),
                QQ::Equal(QQN::DefinicionCuadro()->Numero, $intNumeroCuadro)
            ),
            $objOptionalClauses);
    }

    // Override or Create New Properties and Variables
    // For performance reasons, these variables and __set and __get override methods
    // are commented out.  But if you wish to implement or override any
    // of the data generated properties, please feel free to uncomment them.

    protected $objDefinicionColumnaAsDefcuadroDefcolumnaArray=array();
    protected $objDefinicionFilaAsDefcuadroDeffilaArray=array();

    public function __get($strName) {
        switch ($strName) {
            case 'DefinicionColumnaAsDefcuadroDefcolumnaArray':
                if(empty($this->objDefinicionColumnaAsDefcuadroDefcolumnaArray)) {
                    $DefinicionCuadroDefinicionColumnaArray = $this->getDefcuadroDefcolumna();
                    foreach($DefinicionCuadroDefinicionColumnaArray as $objDefinicionCuadroDefinicionFila) {
                        $this->objDefinicionColumnaAsDefcuadroDefcolumnaArray[] = $objDefinicionCuadroDefinicionFila->IdDefinicionColumnaObject;
                    }

                }
                return $this->objDefinicionColumnaAsDefcuadroDefcolumnaArray;
            case 'DefinicionFilaAsDefcuadroDeffilaArray':
                if(empty($this->objDefinicionFilaAsDefcuadroDeffilaArray)) {
                    $DefinicionCuadroDefinicionFilaArray = $this->getDefcuadroDeffila();

                    foreach($DefinicionCuadroDefinicionFilaArray as $objDefinicionCuadroDefinicionFila) {
                        $this->objDefinicionFilaAsDefcuadroDeffilaArray[] = $objDefinicionCuadroDefinicionFila->IdDefinicionFilaObject;
                    }

                }
                return $this->objDefinicionFilaAsDefcuadroDeffilaArray;
			case 'DefcuadroDefconsistenciaAsIdArray':
				/**
				 * Gets the value for the private _objDefcuadroDefconsistenciaAsIdArray (Read-Only)
				 * if set due to an ExpandAsArray on the defcuadro_defconsistencia.id_definicion_cuadro reverse relationship
				 * @return DefcuadroDefconsistencia[]
				 */
                                       if(count($this->objDefcuadroDefconsistenciaAsIdArray)==0)
                                            $this->objDefcuadroDefconsistenciaAsIdArray = $this->GetDefcuadroDefconsistenciaAsIdArray(QQ::OrderBy(QQN::DefcuadroDefconsistencia()->IdDefinicionConsistencia));
				return (array) $this->objDefcuadroDefconsistenciaAsIdArray;

            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }



}
?>
