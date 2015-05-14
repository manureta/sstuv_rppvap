<?php
/**
 * The abstract OpcionesEstadoExpropiacionGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the OpcionesEstadoExpropiacion subclass which
 * extends this OpcionesEstadoExpropiacionGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the OpcionesEstadoExpropiacion class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion 
	 * @property-read EncuadreLegal $EncuadreLegalAsEstadoProcesoExpropiacion the value for the private _objEncuadreLegalAsEstadoProcesoExpropiacion (Read-Only) if set due to an expansion on the encuadre_legal.estado_proceso_expropiacion reverse relationship
	 * @property-read EncuadreLegal[] $EncuadreLegalAsEstadoProcesoExpropiacionArray the value for the private _objEncuadreLegalAsEstadoProcesoExpropiacionArray (Read-Only) if set due to an ExpandAsArray on the encuadre_legal.estado_proceso_expropiacion reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class OpcionesEstadoExpropiacionGen extends QBaseClass {

    public static function Noun() {
        return 'OpcionesEstadoExpropiacion';
    }
    public static function NounPlural() {
        return 'OpcionesEstadoExpropiaciones';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column opciones_estado_expropiacion.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'opciones_estado_expropiacion_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column opciones_estado_expropiacion.descripcion
     * @var string strDescripcion
     */
    protected $strDescripcion;
    const DescripcionDefault = null;


    /**
     * Private member variable that stores a reference to a single EncuadreLegalAsEstadoProcesoExpropiacion object
     * (of type EncuadreLegal), if this OpcionesEstadoExpropiacion object was restored with
     * an expansion on the encuadre_legal association table.
     * @var EncuadreLegal _objEncuadreLegalAsEstadoProcesoExpropiacion;
     */
    protected $objEncuadreLegalAsEstadoProcesoExpropiacion;

    /**
     * Private member variable that stores a reference to an array of EncuadreLegalAsEstadoProcesoExpropiacion objects
     * (of type EncuadreLegal[]), if this OpcionesEstadoExpropiacion object was restored with
     * an ExpandAsArray on the encuadre_legal association table.
     * @var EncuadreLegal[] _objEncuadreLegalAsEstadoProcesoExpropiacionArray;
     */
    protected $objEncuadreLegalAsEstadoProcesoExpropiacionArray;

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
                protected static $_objOpcionesEstadoExpropiacionArray = array();


		/**
		 * Load a OpcionesEstadoExpropiacion from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return OpcionesEstadoExpropiacion
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  OpcionesEstadoExpropiacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesEstadoExpropiacion()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objOpcionesEstadoExpropiacionArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpOpcionesEstadoExpropiacion = OpcionesEstadoExpropiacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesEstadoExpropiacion()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objOpcionesEstadoExpropiacionArray["$intId"] = $objTmpOpcionesEstadoExpropiacion;
            }
                        }
                        return isset(self::$_objOpcionesEstadoExpropiacionArray["$intId"])?self::$_objOpcionesEstadoExpropiacionArray["$intId"]:null;
		}

		/**
		 * Load all OpcionesEstadoExpropiaciones
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesEstadoExpropiacion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OpcionesEstadoExpropiacion::QueryArray to perform the LoadAll query
			try {
				return OpcionesEstadoExpropiacion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OpcionesEstadoExpropiaciones
		 * @return int
		 */
		public static function CountAll() {
			// Call OpcionesEstadoExpropiacion::QueryCount to perform the CountAll query
			return OpcionesEstadoExpropiacion::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (OpcionesEstadoExpropiacion::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::OpcionesEstadoExpropiacion()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::OpcionesEstadoExpropiacion()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase OpcionesEstadoExpropiacion no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Create/Build out the QueryBuilder object with OpcionesEstadoExpropiacion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'opciones_estado_expropiacion');
			OpcionesEstadoExpropiacion::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('opciones_estado_expropiacion');

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
		 * Static Qcubed Query method to query for a single OpcionesEstadoExpropiacion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesEstadoExpropiacion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesEstadoExpropiacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new OpcionesEstadoExpropiacion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OpcionesEstadoExpropiacion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = OpcionesEstadoExpropiacion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of OpcionesEstadoExpropiacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesEstadoExpropiacion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesEstadoExpropiacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OpcionesEstadoExpropiacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of OpcionesEstadoExpropiacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesEstadoExpropiacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			$strQuery = OpcionesEstadoExpropiacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/opcionesestadoexpropiacion', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OpcionesEstadoExpropiacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OpcionesEstadoExpropiacion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'opciones_estado_expropiacion';
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
		 * Instantiate a OpcionesEstadoExpropiacion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OpcionesEstadoExpropiacion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesEstadoExpropiacion
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
							$strAliasPrefix = 'opciones_estado_expropiacion__';


						// Expanding reverse references: EncuadreLegalAsEstadoProcesoExpropiacion
						$strAlias = $strAliasPrefix . 'encuadrelegalasestadoprocesoexpropiacion__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEncuadreLegalAsEstadoProcesoExpropiacionArray)) {
								$objPreviousChildItems = $objPreviousItem->objEncuadreLegalAsEstadoProcesoExpropiacionArray;
								$objChildItem = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasestadoprocesoexpropiacion__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEncuadreLegalAsEstadoProcesoExpropiacionArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEncuadreLegalAsEstadoProcesoExpropiacionArray[] = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasestadoprocesoexpropiacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'opciones_estado_expropiacion__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the OpcionesEstadoExpropiacion object
			$objToReturn = new OpcionesEstadoExpropiacion();
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
					if (array_diff($objPreviousItem->objEncuadreLegalAsEstadoProcesoExpropiacionArray, $objToReturn->objEncuadreLegalAsEstadoProcesoExpropiacionArray) != null) {
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
				$strAliasPrefix = 'opciones_estado_expropiacion__';




			// Check for EncuadreLegalAsEstadoProcesoExpropiacion Virtual Binding
			$strAlias = $strAliasPrefix . 'encuadrelegalasestadoprocesoexpropiacion__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEncuadreLegalAsEstadoProcesoExpropiacionArray[] = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasestadoprocesoexpropiacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEncuadreLegalAsEstadoProcesoExpropiacion = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasestadoprocesoexpropiacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of OpcionesEstadoExpropiaciones from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesEstadoExpropiacion[]
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
					$objItem = OpcionesEstadoExpropiacion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OpcionesEstadoExpropiacion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single OpcionesEstadoExpropiacion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesEstadoExpropiacion
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return OpcionesEstadoExpropiacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesEstadoExpropiacion()->Id, $intId)
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
         * Save this OpcionesEstadoExpropiacion
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

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
                        INSERT INTO "opciones_estado_expropiacion" (
                            "descripcion"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strDescripcion) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('opciones_estado_expropiacion', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "opciones_estado_expropiacion"
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
		 * Delete this OpcionesEstadoExpropiacion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OpcionesEstadoExpropiacion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_estado_expropiacion"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all OpcionesEstadoExpropiaciones
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_estado_expropiacion"');
		}

		/**
		 * Truncate opciones_estado_expropiacion table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "opciones_estado_expropiacion" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this OpcionesEstadoExpropiacion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OpcionesEstadoExpropiacion object.');

			// Reload the Object
			$objReloaded = OpcionesEstadoExpropiacion::Load($this->intId, null, true);

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

            case 'EncuadreLegalAsEstadoProcesoExpropiacion':
                /**
                 * Gets the value for the private _objEncuadreLegalAsEstadoProcesoExpropiacion (Read-Only)
                 * if set due to an expansion on the encuadre_legal.estado_proceso_expropiacion reverse relationship
                 * @return EncuadreLegal
                 */
                return $this->objEncuadreLegalAsEstadoProcesoExpropiacion;

            case 'EncuadreLegalAsEstadoProcesoExpropiacionArray':
                /**
                 * Gets the value for the private _objEncuadreLegalAsEstadoProcesoExpropiacionArray (Read-Only)
                 * if set due to an ExpandAsArray on the encuadre_legal.estado_proceso_expropiacion reverse relationship
                 * @return EncuadreLegal[]
                 */
                if(is_null($this->objEncuadreLegalAsEstadoProcesoExpropiacionArray))
                    $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray = $this->GetEncuadreLegalAsEstadoProcesoExpropiacionArray();
                return (array) $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray;


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
        
			
		
		// Related Objects' Methods for EncuadreLegalAsEstadoProcesoExpropiacion
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EncuadreLegalAsEstadoProcesoExpropiacionArray
                /**
                * Add a Item to the _EncuadreLegalAsEstadoProcesoExpropiacionArray
                * @param EncuadreLegal $objItem
                * @return EncuadreLegal[]
                */
                public function AddEncuadreLegalAsEstadoProcesoExpropiacion(EncuadreLegal $objItem){
                   //add to the collection and add me as a parent
                    $objItem->EstadoProcesoExpropiacionObject = $this;
                    $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray = $this->EncuadreLegalAsEstadoProcesoExpropiacionArray;
                    $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEncuadreLegalAsEstadoProcesoExpropiacion($objItem);

                    return $this->EncuadreLegalAsEstadoProcesoExpropiacionArray;
                }

                /**
                * Remove a Item to the _EncuadreLegalAsEstadoProcesoExpropiacionArray
                * @param EncuadreLegal $objItem
                * @return EncuadreLegal[]
                */
                public function RemoveEncuadreLegalAsEstadoProcesoExpropiacion(EncuadreLegal $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray;
                    $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEncuadreLegalAsEstadoProcesoExpropiacionArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->EstadoProcesoExpropiacionObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEncuadreLegalAsEstadoProcesoExpropiacion($objItem);
                        }

                    return $this->objEncuadreLegalAsEstadoProcesoExpropiacionArray;
                }

		/**
		 * Gets all associated EncuadreLegalesAsEstadoProcesoExpropiacion as an array of EncuadreLegal objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EncuadreLegal[]
		*/ 
		public function GetEncuadreLegalAsEstadoProcesoExpropiacionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return EncuadreLegal::LoadArrayByEstadoProcesoExpropiacion($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EncuadreLegalesAsEstadoProcesoExpropiacion
		 * @return int
		*/ 
		public function CountEncuadreLegalesAsEstadoProcesoExpropiacion() {
			if ((is_null($this->intId)))
				return 0;

			return EncuadreLegal::CountByEstadoProcesoExpropiacion($this->intId);
		}

		/**
		 * Associates a EncuadreLegalAsEstadoProcesoExpropiacion
		 * @param EncuadreLegal $objEncuadreLegal
		 * @return void
		*/ 
		public function AssociateEncuadreLegalAsEstadoProcesoExpropiacion(EncuadreLegal $objEncuadreLegal) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEncuadreLegalAsEstadoProcesoExpropiacion on this unsaved OpcionesEstadoExpropiacion.');
			if ((is_null($objEncuadreLegal->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEncuadreLegalAsEstadoProcesoExpropiacion on this OpcionesEstadoExpropiacion with an unsaved EncuadreLegal.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"encuadre_legal"
				SET
					"estado_proceso_expropiacion" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEncuadreLegal->Id) . '
			');
		}

		/**
		 * Unassociates a EncuadreLegalAsEstadoProcesoExpropiacion
		 * @param EncuadreLegal $objEncuadreLegal
		 * @return void
		*/ 
		public function UnassociateEncuadreLegalAsEstadoProcesoExpropiacion(EncuadreLegal $objEncuadreLegal) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsEstadoProcesoExpropiacion on this unsaved OpcionesEstadoExpropiacion.');
			if ((is_null($objEncuadreLegal->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsEstadoProcesoExpropiacion on this OpcionesEstadoExpropiacion with an unsaved EncuadreLegal.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"encuadre_legal"
				SET
					"estado_proceso_expropiacion" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEncuadreLegal->Id) . ' AND
					"estado_proceso_expropiacion" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EncuadreLegalesAsEstadoProcesoExpropiacion
		 * @return void
		*/ 
		public function UnassociateAllEncuadreLegalesAsEstadoProcesoExpropiacion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsEstadoProcesoExpropiacion on this unsaved OpcionesEstadoExpropiacion.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"encuadre_legal"
				SET
					"estado_proceso_expropiacion" = null
				WHERE
					"estado_proceso_expropiacion" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EncuadreLegalAsEstadoProcesoExpropiacion
		 * @param EncuadreLegal $objEncuadreLegal
		 * @return void
		*/ 
		public function DeleteAssociatedEncuadreLegalAsEstadoProcesoExpropiacion(EncuadreLegal $objEncuadreLegal) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsEstadoProcesoExpropiacion on this unsaved OpcionesEstadoExpropiacion.');
			if ((is_null($objEncuadreLegal->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsEstadoProcesoExpropiacion on this OpcionesEstadoExpropiacion with an unsaved EncuadreLegal.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"encuadre_legal"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEncuadreLegal->Id) . ' AND
					"estado_proceso_expropiacion" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EncuadreLegalesAsEstadoProcesoExpropiacion
		 * @return void
		*/ 
		public function DeleteAllEncuadreLegalesAsEstadoProcesoExpropiacion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsEstadoProcesoExpropiacion on this unsaved OpcionesEstadoExpropiacion.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEstadoExpropiacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"encuadre_legal"
				WHERE
					"estado_proceso_expropiacion" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="OpcionesEstadoExpropiacion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OpcionesEstadoExpropiacion', $strComplexTypeArray)) {
				$strComplexTypeArray['OpcionesEstadoExpropiacion'] = OpcionesEstadoExpropiacion::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OpcionesEstadoExpropiacion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OpcionesEstadoExpropiacion();
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
				array_push($objArrayToReturn, OpcionesEstadoExpropiacion::GetSoapObjectFromObject($objObject, true));

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