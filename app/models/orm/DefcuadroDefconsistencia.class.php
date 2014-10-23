<?php
	require(__DATAGEN_CLASSES__ . '/DefcuadroDefconsistenciaGen.class.php');

	/**
	 * The DefcuadroDefconsistencia class defined here contains any
	 * customized code for the DefcuadroDefconsistencia class in the
	 * Object Relational Model.  It represents the "defcuadro_defconsistencia" table 
	 * in the database, and extends from the code generated abstract DefcuadroDefconsistenciaGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage DataObjects
	 * 
	 */
	class DefcuadroDefconsistencia extends DefcuadroDefconsistenciaGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objDefcuadroDefconsistencia->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('DefcuadroDefconsistencia Object %s',  $this->intIdDefcuadroDefconsistencia);
		}


		// This adds the created by and creation date before saving a new user
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			//QApplication::Authenticate();
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				//$this->Createdby = QApplication::$objUser->IdUserbackend;
				//$this->Datecreated = new QDateTime(QDateTime::Now);
			}
			else {
				//$this->Modifiedby = QApplication::$objUser->IdUserbackend;
			}
			parent::Save($blnForceInsert, $blnForceUpdate);
		}

// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of DefcuadroDefconsistencia objects
			return DefcuadroDefconsistencia::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DefcuadroDefconsistencia()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DefcuadroDefconsistencia()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single DefcuadroDefconsistencia object
			return DefcuadroDefconsistencia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DefcuadroDefconsistencia()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DefcuadroDefconsistencia()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of DefcuadroDefconsistencia objects
			return DefcuadroDefconsistencia::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DefcuadroDefconsistencia()->Param1, $strParam1),
					QQ::Equal(QQN::DefcuadroDefconsistencia()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = DefcuadroDefconsistencia::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					"defcuadro_defconsistencia".*
				FROM
					"defcuadro_defconsistencia" AS "defcuadro_defconsistencia"
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return DefcuadroDefconsistencia::InstantiateDbResult($objDbResult);
		}
*/

    public static function GetCuadrosDeshabilita($intIdDefinicionCuadro){
        return DefcuadroDefconsistencia::QueryArray(QQ::AndCondition(
                QQ::Equal(QQN::DefcuadroDefconsistencia()->IdDefinicionConsistenciaObject->CTipoConsistencia,TipoConsistenciaType::DESHABILITACION),
                QQ::Equal(QQN::DefcuadroDefconsistencia()->DefcuadroDefconsistenciaDefcuadroAsId->IdDefinicionCuadro,$intIdDefinicionCuadro)
        ));
    }




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;
*/
		public function __get($strName) {
			switch ($strName) {
				case 'DefcuadroDefconsistenciaDefcuadroAsIdArray':
					/**
					 * Gets the value for the private _objDefcuadroDefconsistenciaDefcuadroAsIdArray (Read-Only)
					 * if set due to an ExpandAsArray on the defcuadro_defconsistencia_defcuadro.id_defcuadro_defconsistencia reverse relationship
					 * @return DefcuadroDefconsistenciaDefcuadro[]
					 */
                                        if(count($this->objDefcuadroDefconsistenciaDefcuadroAsIdArray)==0)
                                             $this->objDefcuadroDefconsistenciaDefcuadroAsIdArray = $this->GetDefcuadroDefconsistenciaDefcuadroAsIdArray(QQ::OrderBy(QQN::DefcuadroDefconsistenciaDefcuadro()->Orden, true));
					return (array) $this->objDefcuadroDefconsistenciaDefcuadroAsIdArray;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
/*

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>
