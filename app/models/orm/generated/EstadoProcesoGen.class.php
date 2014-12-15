<?php
/**
 * The abstract EstadoProcesoGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the EstadoProceso subclass which
 * extends this EstadoProcesoGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the EstadoProceso class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion 
	 * @property-read UsoInterno $UsoInternoAsRegularizacion the value for the private _objUsoInternoAsRegularizacion (Read-Only) if set due to an expansion on the uso_interno.regularizacion_estado_proceso reverse relationship
	 * @property-read UsoInterno[] $UsoInternoAsRegularizacionArray the value for the private _objUsoInternoAsRegularizacionArray (Read-Only) if set due to an ExpandAsArray on the uso_interno.regularizacion_estado_proceso reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class EstadoProcesoGen extends QBaseClass {

    public static function Noun() {
        return 'EstadoProceso';
    }
    public static function NounPlural() {
        return 'EstadoProcesos';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column estado_proceso.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'estado_proceso_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column estado_proceso.descripcion
     * @var string strDescripcion
     */
    protected $strDescripcion;
    const DescripcionMaxLength = 45;
    const DescripcionDefault = null;


    /**
     * Private member variable that stores a reference to a single UsoInternoAsRegularizacion object
     * (of type UsoInterno), if this EstadoProceso object was restored with
     * an expansion on the uso_interno association table.
     * @var UsoInterno _objUsoInternoAsRegularizacion;
     */
    protected $objUsoInternoAsRegularizacion;

    /**
     * Private member variable that stores a reference to an array of UsoInternoAsRegularizacion objects
     * (of type UsoInterno[]), if this EstadoProceso object was restored with
     * an ExpandAsArray on the uso_interno association table.
     * @var UsoInterno[] _objUsoInternoAsRegularizacionArray;
     */
    protected $objUsoInternoAsRegularizacionArray;

    /**
     * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
     * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
     * GetVirtualAttribute.
     * @var string[] $__strVirtualAttributeArray
     */
    protected $__strVirtualAttributeArray = array();

    /**
     * Protected internal member variable that specifies whether or not this object is Restored from the database.
     * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
     * @var bool __blnRestored;
     */
    protected $__blnRestored;

    
//protected_member_objects
///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////



//class_load_and_count_methods
///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}


                /**
                 * Array de cache de los Load con el Id
                 */
                protected static $_objEstadoProcesoArray = array();


		/**
		 * Load a EstadoProceso from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return EstadoProceso
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  EstadoProceso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadoProceso()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objEstadoProcesoArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpEstadoProceso = EstadoProceso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadoProceso()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objEstadoProcesoArray["$intId"] = $objTmpEstadoProceso;
            }
                        }
                        return isset(self::$_objEstadoProcesoArray["$intId"])?self::$_objEstadoProcesoArray["$intId"]:null;
		}

		/**
		 * Load all EstadoProcesos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadoProceso[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call EstadoProceso::QueryArray to perform the LoadAll query
			try {
				return EstadoProceso::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EstadoProcesos
		 * @return int
		 */
		public static function CountAll() {
			// Call EstadoProceso::QueryCount to perform the CountAll query
			return EstadoProceso::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (EstadoProceso::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::EstadoProceso()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::EstadoProceso()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase EstadoProceso no tiene definidos campos para la búsqueda de Autocomplete');
            case 1:
                return $arrCond[0];
            default:
                return QQ::OrCondition($arrCond);
        }
    }



//qcodo_query_methods
///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Create/Build out the QueryBuilder object with EstadoProceso-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'estado_proceso');
			EstadoProceso::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('estado_proceso');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single EstadoProceso object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EstadoProceso the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadoProceso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new EstadoProceso object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EstadoProceso::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = EstadoProceso::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of EstadoProceso objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EstadoProceso[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadoProceso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EstadoProceso::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of EstadoProceso objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadoProceso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			$strQuery = EstadoProceso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/estadoproceso', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = EstadoProceso::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EstadoProceso
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'estado_proceso';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a EstadoProceso from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EstadoProceso::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return EstadoProceso
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'estado_proceso__';


						// Expanding reverse references: UsoInternoAsRegularizacion
						$strAlias = $strAliasPrefix . 'usointernoasregularizacion__id_folio';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objUsoInternoAsRegularizacionArray)) {
								$objPreviousChildItems = $objPreviousItem->objUsoInternoAsRegularizacionArray;
								$objChildItem = UsoInterno::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usointernoasregularizacion__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objUsoInternoAsRegularizacionArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objUsoInternoAsRegularizacionArray[] = UsoInterno::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usointernoasregularizacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'estado_proceso__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the EstadoProceso object
			$objToReturn = new EstadoProceso();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'descripcion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'descripcion'] : $strAliasPrefix . 'descripcion';
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objUsoInternoAsRegularizacionArray, $objToReturn->objUsoInternoAsRegularizacionArray) != null) {
						continue;
					}

					// complete match - all primary key columns are the same
					return null;
				}
			}

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'estado_proceso__';




			// Check for UsoInternoAsRegularizacion Virtual Binding
			$strAlias = $strAliasPrefix . 'usointernoasregularizacion__id_folio';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objUsoInternoAsRegularizacionArray[] = UsoInterno::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usointernoasregularizacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objUsoInternoAsRegularizacion = UsoInterno::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usointernoasregularizacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of EstadoProcesos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return EstadoProceso[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EstadoProceso::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EstadoProceso::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single EstadoProceso object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadoProceso
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return EstadoProceso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadoProceso()->Id, $intId)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this EstadoProceso
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = EstadoProceso::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.

                    if ($this->intId && ($this->intId > QDatabaseNumberFieldMax::Integer || $this->intId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intId', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "estado_proceso" (
                            "descripcion"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strDescripcion) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('estado_proceso', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "estado_proceso"
                        SET
                            "descripcion" = ' . $objDatabase->SqlVariable($this->strDescripcion) . '
                        WHERE
                            "id" = ' . $objDatabase->SqlVariable($this->intId) . '
                    ');
                }

            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }

            // Update __blnRestored and any Non-Identity PK Columns (if applicable)
            $this->__blnRestored = true;

            foreach ($this->objChildObjectsArray as $objChild) {
                if (!$objChild->__Restored) $objChild->Save();
            }
                    // Update Identity column and return its value
                    $mixToReturn = $this->intId;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this EstadoProceso
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EstadoProceso with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"estado_proceso"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all EstadoProcesos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"estado_proceso"');
		}

		/**
		 * Truncate estado_proceso table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "estado_proceso" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this EstadoProceso from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EstadoProceso object.');

			// Reload the Object
			$objReloaded = EstadoProceso::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
		}




    ////////////////////
    // PUBLIC OVERRIDERS
    ////////////////////

        /**
     * Override method to perform a property "Get"
     * This will get the value of $strName
     *
     * @param string $strName Name of the property to get
     * @return mixed
     */
    public function __get($strName) {
        switch ($strName) {
            ///////////////////
            // Member Variables
            ///////////////////
            case 'Id':
                /**
                 * Gets the value for intId (Read-Only PK)
                 * @return integer
                 */
                return $this->intId;

            case 'Descripcion':
                /**
                 * Gets the value for strDescripcion 
                 * @return string
                 */
                return $this->strDescripcion;


            ///////////////////
            // Member Objects
            ///////////////////

            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'UsoInternoAsRegularizacion':
                /**
                 * Gets the value for the private _objUsoInternoAsRegularizacion (Read-Only)
                 * if set due to an expansion on the uso_interno.regularizacion_estado_proceso reverse relationship
                 * @return UsoInterno
                 */
                return $this->objUsoInternoAsRegularizacion;

            case 'UsoInternoAsRegularizacionArray':
                /**
                 * Gets the value for the private _objUsoInternoAsRegularizacionArray (Read-Only)
                 * if set due to an ExpandAsArray on the uso_interno.regularizacion_estado_proceso reverse relationship
                 * @return UsoInterno[]
                 */
                if(is_null($this->objUsoInternoAsRegularizacionArray))
                    $this->objUsoInternoAsRegularizacionArray = $this->GetUsoInternoAsRegularizacionArray();
                return (array) $this->objUsoInternoAsRegularizacionArray;


            case '__Restored':
                return $this->__blnRestored;

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
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
                                                return ($this->strDescripcion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

    /**
     * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
     * @param string $strName
     * @return string
     */
    public function GetVirtualAttribute($strName) {
        if (array_key_exists($strName, $this->__strVirtualAttributeArray))
            return $this->__strVirtualAttributeArray[$strName];
        return null;
    }



            ///////////////////////////////
        // ASSOCIATED OBJECTS' METHODS
        ///////////////////////////////
        
        protected $objChildObjectsArray = array();
        
			
		
		// Related Objects' Methods for UsoInternoAsRegularizacion
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _UsoInternoAsRegularizacionArray
                /**
                * Add a Item to the _UsoInternoAsRegularizacionArray
                * @param UsoInterno $objItem
                * @return UsoInterno[]
                */
                public function AddUsoInternoAsRegularizacion(UsoInterno $objItem){
                   //add to the collection and add me as a parent
                    $objItem->RegularizacionEstadoProcesoObject = $this;
                    $this->objUsoInternoAsRegularizacionArray = $this->UsoInternoAsRegularizacionArray;
                    $this->objUsoInternoAsRegularizacionArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateUsoInternoAsRegularizacion($objItem);

                    return $this->UsoInternoAsRegularizacionArray;
                }

                /**
                * Remove a Item to the _UsoInternoAsRegularizacionArray
                * @param UsoInterno $objItem
                * @return UsoInterno[]
                */
                public function RemoveUsoInternoAsRegularizacion(UsoInterno $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objUsoInternoAsRegularizacionArray;
                    $this->objUsoInternoAsRegularizacionArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objUsoInternoAsRegularizacionArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->IdFolio))
                        try{
                            $objItem->RegularizacionEstadoProcesoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedUsoInternoAsRegularizacion($objItem);
                        }

                    return $this->objUsoInternoAsRegularizacionArray;
                }

		/**
		 * Gets all associated UsoInternosAsRegularizacion as an array of UsoInterno objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsoInterno[]
		*/ 
		public function GetUsoInternoAsRegularizacionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return UsoInterno::LoadArrayByRegularizacionEstadoProceso($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsoInternosAsRegularizacion
		 * @return int
		*/ 
		public function CountUsoInternosAsRegularizacion() {
			if ((is_null($this->intId)))
				return 0;

			return UsoInterno::CountByRegularizacionEstadoProceso($this->intId);
		}

		/**
		 * Associates a UsoInternoAsRegularizacion
		 * @param UsoInterno $objUsoInterno
		 * @return void
		*/ 
		public function AssociateUsoInternoAsRegularizacion(UsoInterno $objUsoInterno) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsoInternoAsRegularizacion on this unsaved EstadoProceso.');
			if ((is_null($objUsoInterno->IdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsoInternoAsRegularizacion on this EstadoProceso with an unsaved UsoInterno.');

			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"uso_interno"
				SET
					"regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($objUsoInterno->IdFolio) . '
			');
		}

		/**
		 * Unassociates a UsoInternoAsRegularizacion
		 * @param UsoInterno $objUsoInterno
		 * @return void
		*/ 
		public function UnassociateUsoInternoAsRegularizacion(UsoInterno $objUsoInterno) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsoInternoAsRegularizacion on this unsaved EstadoProceso.');
			if ((is_null($objUsoInterno->IdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsoInternoAsRegularizacion on this EstadoProceso with an unsaved UsoInterno.');

			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"uso_interno"
				SET
					"regularizacion_estado_proceso" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($objUsoInterno->IdFolio) . ' AND
					"regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all UsoInternosAsRegularizacion
		 * @return void
		*/ 
		public function UnassociateAllUsoInternosAsRegularizacion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsoInternoAsRegularizacion on this unsaved EstadoProceso.');

			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"uso_interno"
				SET
					"regularizacion_estado_proceso" = null
				WHERE
					"regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated UsoInternoAsRegularizacion
		 * @param UsoInterno $objUsoInterno
		 * @return void
		*/ 
		public function DeleteAssociatedUsoInternoAsRegularizacion(UsoInterno $objUsoInterno) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsoInternoAsRegularizacion on this unsaved EstadoProceso.');
			if ((is_null($objUsoInterno->IdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsoInternoAsRegularizacion on this EstadoProceso with an unsaved UsoInterno.');

			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"uso_interno"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($objUsoInterno->IdFolio) . ' AND
					"regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated UsoInternosAsRegularizacion
		 * @return void
		*/ 
		public function DeleteAllUsoInternosAsRegularizacion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsoInternoAsRegularizacion on this unsaved EstadoProceso.');

			// Get the Database Object for this Class
			$objDatabase = EstadoProceso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"uso_interno"
				WHERE
					"regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="EstadoProceso"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EstadoProceso', $strComplexTypeArray)) {
				$strComplexTypeArray['EstadoProceso'] = EstadoProceso::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EstadoProceso::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EstadoProceso();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if (property_exists($objSoapObject, 'Descripcion')) {
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
            }
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EstadoProceso::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>