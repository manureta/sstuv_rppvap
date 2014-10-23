<?php
	require(__DATAGEN_CLASSES__ . '/DefinicionColumnaGen.class.php');

	/**
	 * The DefinicionColumna class defined here contains any
	 * customized code for the DefinicionColumna class in the
	 * Object Relational Model.  It represents the "definicion_columna" table 
	 * in the database, and extends from the code generated abstract DefinicionColumnaGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class DefinicionColumna extends DefinicionColumnaGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objDefinicionColumna->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strNombre);
		}

                public function SetIdDefinicionColumna($intIdDefinicionColumna){
                    $this->__blnRestored = true;
                    $this->intIdDefinicionColumna = $intIdDefinicionColumna;
                }

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
                            case 'CodigoValorAsDefcolumnaCodvalorArray':
                                /**
                                 * Gets the value for the private _objCodigoValorAsDefcolumnaCodvalorArray (Read-Only)
                                 * if set due to an ExpandAsArray on the defcolumna_codvalor_assn association table
                                 * @return CodigoValor[]
                                 */
//                                if(count($this->objCodigoValorAsDefcolumnaCodvalorArray)==0){
//                                     $this->objCodigoValorAsDefcolumnaCodvalorArray = $this->GetCodigoValorAsDefcolumnaCodvalorArray();
//                                     if(count($this->objCodigoValorAsDefcolumnaCodvalorArray)==0){
//                                         $this->objCodigoValorAsDefcolumnaCodvalorArray = CodigoValor::LoadArrayByCTipoDato($this->CTipoDato);
//                                     }
//                                }
                                return CodigoValor::LoadArrayByCTipoDato($this->CTipoDato,
                                           QQ::OrderBy(QQN::CodigoValor()->Orden, QQN::CodigoValor()->IdCodigoValor)
                                       );//(array) $this->objCodigoValorAsDefcolumnaCodvalorArray;
                             default:
                                try {
                                        return parent::__get($strName);
                                } catch (QCallerException $objExc) {
                                        $objExc->IncrementOffset();
                                        throw $objExc;
                                }
                        }
                }

                /**
                 * Deprecated
                 * La relacion es de CodValor con DefColumna solamente.
                **/
                public function getPosiblesValoresByCuadro($intIdDefinicionCuadro){
                    return DefcuadroDefcolumnaCodvalor::QueryArray(
                                QQ::AndCondition(
                                        QQ::Equal(QQN::DefcuadroDefcolumnaCodvalor()->IdDefinicionColumna, $this->IdDefinicionColumna),
                                        QQ::Equal(QQN::DefcuadroDefcolumnaCodvalor()->IdDefinicionCuadro, $intIdDefinicionCuadro)
                                    ),
                                QQ::OrderBy(QQN::DefcuadroDefcolumnaCodvalor()->Orden, QQN::DefcuadroDefcolumnaCodvalor()->IdDefinicionColumna)
                            );

                }
	}
?>
