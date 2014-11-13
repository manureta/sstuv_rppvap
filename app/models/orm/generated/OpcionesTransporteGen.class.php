<?php
/**
 * The abstract OpcionesTransporteGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the OpcionesTransporte subclass which
 * extends this OpcionesTransporteGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the OpcionesTransporte class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Opcion the value for strOpcion 
	 * @property-read Transporte $TransporteAsColectivos the value for the private _objTransporteAsColectivos (Read-Only) if set due to an expansion on the transporte.colectivos reverse relationship
	 * @property-read Transporte[] $TransporteAsColectivosArray the value for the private _objTransporteAsColectivosArray (Read-Only) if set due to an ExpandAsArray on the transporte.colectivos reverse relationship
	 * @property-read Transporte $TransporteAsFerrocarril the value for the private _objTransporteAsFerrocarril (Read-Only) if set due to an expansion on the transporte.ferrocarril reverse relationship
	 * @property-read Transporte[] $TransporteAsFerrocarrilArray the value for the private _objTransporteAsFerrocarrilArray (Read-Only) if set due to an ExpandAsArray on the transporte.ferrocarril reverse relationship
	 * @property-read Transporte $TransporteAsRemisCombis the value for the private _objTransporteAsRemisCombis (Read-Only) if set due to an expansion on the transporte.remis_combis reverse relationship
	 * @property-read Transporte[] $TransporteAsRemisCombisArray the value for the private _objTransporteAsRemisCombisArray (Read-Only) if set due to an ExpandAsArray on the transporte.remis_combis reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class OpcionesTransporteGen extends QBaseClass {

    public static function Noun() {
        return 'OpcionesTransporte';
    }
    public static function NounPlural() {
        return 'OpcionesTransportes';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column opciones_transporte.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'opciones_transporte_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column opciones_transporte.opcion
     * @var string strOpcion
     */
    protected $strOpcion;
    const OpcionMaxLength = 45;
    const OpcionDefault = null;


    /**
     * Private member variable that stores a reference to a single TransporteAsColectivos object
     * (of type Transporte), if this OpcionesTransporte object was restored with
     * an expansion on the transporte association table.
     * @var Transporte _objTransporteAsColectivos;
     */
    protected $objTransporteAsColectivos;

    /**
     * Private member variable that stores a reference to an array of TransporteAsColectivos objects
     * (of type Transporte[]), if this OpcionesTransporte object was restored with
     * an ExpandAsArray on the transporte association table.
     * @var Transporte[] _objTransporteAsColectivosArray;
     */
    protected $objTransporteAsColectivosArray;

    /**
     * Private member variable that stores a reference to a single TransporteAsFerrocarril object
     * (of type Transporte), if this OpcionesTransporte object was restored with
     * an expansion on the transporte association table.
     * @var Transporte _objTransporteAsFerrocarril;
     */
    protected $objTransporteAsFerrocarril;

    /**
     * Private member variable that stores a reference to an array of TransporteAsFerrocarril objects
     * (of type Transporte[]), if this OpcionesTransporte object was restored with
     * an ExpandAsArray on the transporte association table.
     * @var Transporte[] _objTransporteAsFerrocarrilArray;
     */
    protected $objTransporteAsFerrocarrilArray;

    /**
     * Private member variable that stores a reference to a single TransporteAsRemisCombis object
     * (of type Transporte), if this OpcionesTransporte object was restored with
     * an expansion on the transporte association table.
     * @var Transporte _objTransporteAsRemisCombis;
     */
    protected $objTransporteAsRemisCombis;

    /**
     * Private member variable that stores a reference to an array of TransporteAsRemisCombis objects
     * (of type Transporte[]), if this OpcionesTransporte object was restored with
     * an ExpandAsArray on the transporte association table.
     * @var Transporte[] _objTransporteAsRemisCombisArray;
     */
    protected $objTransporteAsRemisCombisArray;

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
                protected static $_objOpcionesTransporteArray = array();


		/**
		 * Load a OpcionesTransporte from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return OpcionesTransporte
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  OpcionesTransporte::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesTransporte()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objOpcionesTransporteArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpOpcionesTransporte = OpcionesTransporte::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesTransporte()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objOpcionesTransporteArray["$intId"] = $objTmpOpcionesTransporte;
            }
                        }
                        return isset(self::$_objOpcionesTransporteArray["$intId"])?self::$_objOpcionesTransporteArray["$intId"]:null;
		}

		/**
		 * Load all OpcionesTransportes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesTransporte[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OpcionesTransporte::QueryArray to perform the LoadAll query
			try {
				return OpcionesTransporte::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OpcionesTransportes
		 * @return int
		 */
		public static function CountAll() {
			// Call OpcionesTransporte::QueryCount to perform the CountAll query
			return OpcionesTransporte::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (OpcionesTransporte::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::OpcionesTransporte()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::OpcionesTransporte()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase OpcionesTransporte no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Create/Build out the QueryBuilder object with OpcionesTransporte-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'opciones_transporte');
			OpcionesTransporte::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('opciones_transporte');

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
		 * Static Qcubed Query method to query for a single OpcionesTransporte object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesTransporte the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesTransporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new OpcionesTransporte object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OpcionesTransporte::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = OpcionesTransporte::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of OpcionesTransporte objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesTransporte[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesTransporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OpcionesTransporte::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of OpcionesTransporte objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesTransporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OpcionesTransporte::GetDatabase();

			$strQuery = OpcionesTransporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/opcionestransporte', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OpcionesTransporte::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OpcionesTransporte
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'opciones_transporte';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'opcion', $strAliasPrefix . 'opcion');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a OpcionesTransporte from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OpcionesTransporte::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesTransporte
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
							$strAliasPrefix = 'opciones_transporte__';


						// Expanding reverse references: TransporteAsColectivos
						$strAlias = $strAliasPrefix . 'transporteascolectivos__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objTransporteAsColectivosArray)) {
								$objPreviousChildItems = $objPreviousItem->objTransporteAsColectivosArray;
								$objChildItem = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteascolectivos__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objTransporteAsColectivosArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objTransporteAsColectivosArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteascolectivos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: TransporteAsFerrocarril
						$strAlias = $strAliasPrefix . 'transporteasferrocarril__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objTransporteAsFerrocarrilArray)) {
								$objPreviousChildItems = $objPreviousItem->objTransporteAsFerrocarrilArray;
								$objChildItem = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasferrocarril__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objTransporteAsFerrocarrilArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objTransporteAsFerrocarrilArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasferrocarril__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: TransporteAsRemisCombis
						$strAlias = $strAliasPrefix . 'transporteasremiscombis__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objTransporteAsRemisCombisArray)) {
								$objPreviousChildItems = $objPreviousItem->objTransporteAsRemisCombisArray;
								$objChildItem = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasremiscombis__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objTransporteAsRemisCombisArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objTransporteAsRemisCombisArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasremiscombis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'opciones_transporte__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the OpcionesTransporte object
			$objToReturn = new OpcionesTransporte();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'opcion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'opcion'] : $strAliasPrefix . 'opcion';
			$objToReturn->strOpcion = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objTransporteAsColectivosArray, $objToReturn->objTransporteAsColectivosArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objTransporteAsFerrocarrilArray, $objToReturn->objTransporteAsFerrocarrilArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objTransporteAsRemisCombisArray, $objToReturn->objTransporteAsRemisCombisArray) != null) {
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
				$strAliasPrefix = 'opciones_transporte__';




			// Check for TransporteAsColectivos Virtual Binding
			$strAlias = $strAliasPrefix . 'transporteascolectivos__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objTransporteAsColectivosArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteascolectivos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objTransporteAsColectivos = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteascolectivos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TransporteAsFerrocarril Virtual Binding
			$strAlias = $strAliasPrefix . 'transporteasferrocarril__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objTransporteAsFerrocarrilArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasferrocarril__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objTransporteAsFerrocarril = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasferrocarril__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TransporteAsRemisCombis Virtual Binding
			$strAlias = $strAliasPrefix . 'transporteasremiscombis__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objTransporteAsRemisCombisArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasremiscombis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objTransporteAsRemisCombis = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasremiscombis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of OpcionesTransportes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesTransporte[]
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
					$objItem = OpcionesTransporte::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OpcionesTransporte::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single OpcionesTransporte object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesTransporte
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return OpcionesTransporte::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesTransporte()->Id, $intId)
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
         * Save this OpcionesTransporte
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = OpcionesTransporte::GetDatabase();

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
                        INSERT INTO "opciones_transporte" (
                            "opcion"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strOpcion) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('opciones_transporte', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "opciones_transporte"
                        SET
                            "opcion" = ' . $objDatabase->SqlVariable($this->strOpcion) . '
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
		 * Delete this OpcionesTransporte
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OpcionesTransporte with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_transporte"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all OpcionesTransportes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_transporte"');
		}

		/**
		 * Truncate opciones_transporte table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "opciones_transporte" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this OpcionesTransporte from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OpcionesTransporte object.');

			// Reload the Object
			$objReloaded = OpcionesTransporte::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->strOpcion = $objReloaded->strOpcion;
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

            case 'Opcion':
                /**
                 * Gets the value for strOpcion 
                 * @return string
                 */
                return $this->strOpcion;


            ///////////////////
            // Member Objects
            ///////////////////

            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'TransporteAsColectivos':
                /**
                 * Gets the value for the private _objTransporteAsColectivos (Read-Only)
                 * if set due to an expansion on the transporte.colectivos reverse relationship
                 * @return Transporte
                 */
                return $this->objTransporteAsColectivos;

            case 'TransporteAsColectivosArray':
                /**
                 * Gets the value for the private _objTransporteAsColectivosArray (Read-Only)
                 * if set due to an ExpandAsArray on the transporte.colectivos reverse relationship
                 * @return Transporte[]
                 */
                if(is_null($this->objTransporteAsColectivosArray))
                    $this->objTransporteAsColectivosArray = $this->GetTransporteAsColectivosArray();
                return (array) $this->objTransporteAsColectivosArray;

            case 'TransporteAsFerrocarril':
                /**
                 * Gets the value for the private _objTransporteAsFerrocarril (Read-Only)
                 * if set due to an expansion on the transporte.ferrocarril reverse relationship
                 * @return Transporte
                 */
                return $this->objTransporteAsFerrocarril;

            case 'TransporteAsFerrocarrilArray':
                /**
                 * Gets the value for the private _objTransporteAsFerrocarrilArray (Read-Only)
                 * if set due to an ExpandAsArray on the transporte.ferrocarril reverse relationship
                 * @return Transporte[]
                 */
                if(is_null($this->objTransporteAsFerrocarrilArray))
                    $this->objTransporteAsFerrocarrilArray = $this->GetTransporteAsFerrocarrilArray();
                return (array) $this->objTransporteAsFerrocarrilArray;

            case 'TransporteAsRemisCombis':
                /**
                 * Gets the value for the private _objTransporteAsRemisCombis (Read-Only)
                 * if set due to an expansion on the transporte.remis_combis reverse relationship
                 * @return Transporte
                 */
                return $this->objTransporteAsRemisCombis;

            case 'TransporteAsRemisCombisArray':
                /**
                 * Gets the value for the private _objTransporteAsRemisCombisArray (Read-Only)
                 * if set due to an ExpandAsArray on the transporte.remis_combis reverse relationship
                 * @return Transporte[]
                 */
                if(is_null($this->objTransporteAsRemisCombisArray))
                    $this->objTransporteAsRemisCombisArray = $this->GetTransporteAsRemisCombisArray();
                return (array) $this->objTransporteAsRemisCombisArray;


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
				case 'Opcion':
					/**
					 * Sets the value for strOpcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOpcion = QType::Cast($mixValue, QType::String));
                                                return ($this->strOpcion = $mixValue);
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
        
			
		
		// Related Objects' Methods for TransporteAsColectivos
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _TransporteAsColectivosArray
                /**
                * Add a Item to the _TransporteAsColectivosArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function AddTransporteAsColectivos(Transporte $objItem){
                   //add to the collection and add me as a parent
                    $objItem->ColectivosObject = $this;
                    $this->objTransporteAsColectivosArray = $this->TransporteAsColectivosArray;
                    $this->objTransporteAsColectivosArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateTransporteAsColectivos($objItem);

                    return $this->TransporteAsColectivosArray;
                }

                /**
                * Remove a Item to the _TransporteAsColectivosArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function RemoveTransporteAsColectivos(Transporte $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objTransporteAsColectivosArray;
                    $this->objTransporteAsColectivosArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objTransporteAsColectivosArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->ColectivosObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedTransporteAsColectivos($objItem);
                        }

                    return $this->objTransporteAsColectivosArray;
                }

		/**
		 * Gets all associated TransportesAsColectivos as an array of Transporte objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/ 
		public function GetTransporteAsColectivosArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Transporte::LoadArrayByColectivos($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TransportesAsColectivos
		 * @return int
		*/ 
		public function CountTransportesAsColectivos() {
			if ((is_null($this->intId)))
				return 0;

			return Transporte::CountByColectivos($this->intId);
		}

		/**
		 * Associates a TransporteAsColectivos
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function AssociateTransporteAsColectivos(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsColectivos on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsColectivos on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"colectivos" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . '
			');
		}

		/**
		 * Unassociates a TransporteAsColectivos
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function UnassociateTransporteAsColectivos(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsColectivos on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsColectivos on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"colectivos" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"colectivos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TransportesAsColectivos
		 * @return void
		*/ 
		public function UnassociateAllTransportesAsColectivos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsColectivos on this unsaved OpcionesTransporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"colectivos" = null
				WHERE
					"colectivos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TransporteAsColectivos
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function DeleteAssociatedTransporteAsColectivos(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsColectivos on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsColectivos on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"colectivos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TransportesAsColectivos
		 * @return void
		*/ 
		public function DeleteAllTransportesAsColectivos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsColectivos on this unsaved OpcionesTransporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"colectivos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TransporteAsFerrocarril
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _TransporteAsFerrocarrilArray
                /**
                * Add a Item to the _TransporteAsFerrocarrilArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function AddTransporteAsFerrocarril(Transporte $objItem){
                   //add to the collection and add me as a parent
                    $objItem->FerrocarrilObject = $this;
                    $this->objTransporteAsFerrocarrilArray = $this->TransporteAsFerrocarrilArray;
                    $this->objTransporteAsFerrocarrilArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateTransporteAsFerrocarril($objItem);

                    return $this->TransporteAsFerrocarrilArray;
                }

                /**
                * Remove a Item to the _TransporteAsFerrocarrilArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function RemoveTransporteAsFerrocarril(Transporte $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objTransporteAsFerrocarrilArray;
                    $this->objTransporteAsFerrocarrilArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objTransporteAsFerrocarrilArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->FerrocarrilObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedTransporteAsFerrocarril($objItem);
                        }

                    return $this->objTransporteAsFerrocarrilArray;
                }

		/**
		 * Gets all associated TransportesAsFerrocarril as an array of Transporte objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/ 
		public function GetTransporteAsFerrocarrilArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Transporte::LoadArrayByFerrocarril($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TransportesAsFerrocarril
		 * @return int
		*/ 
		public function CountTransportesAsFerrocarril() {
			if ((is_null($this->intId)))
				return 0;

			return Transporte::CountByFerrocarril($this->intId);
		}

		/**
		 * Associates a TransporteAsFerrocarril
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function AssociateTransporteAsFerrocarril(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsFerrocarril on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsFerrocarril on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"ferrocarril" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . '
			');
		}

		/**
		 * Unassociates a TransporteAsFerrocarril
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function UnassociateTransporteAsFerrocarril(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsFerrocarril on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsFerrocarril on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"ferrocarril" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"ferrocarril" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TransportesAsFerrocarril
		 * @return void
		*/ 
		public function UnassociateAllTransportesAsFerrocarril() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsFerrocarril on this unsaved OpcionesTransporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"ferrocarril" = null
				WHERE
					"ferrocarril" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TransporteAsFerrocarril
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function DeleteAssociatedTransporteAsFerrocarril(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsFerrocarril on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsFerrocarril on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"ferrocarril" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TransportesAsFerrocarril
		 * @return void
		*/ 
		public function DeleteAllTransportesAsFerrocarril() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsFerrocarril on this unsaved OpcionesTransporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"ferrocarril" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TransporteAsRemisCombis
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _TransporteAsRemisCombisArray
                /**
                * Add a Item to the _TransporteAsRemisCombisArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function AddTransporteAsRemisCombis(Transporte $objItem){
                   //add to the collection and add me as a parent
                    $objItem->RemisCombisObject = $this;
                    $this->objTransporteAsRemisCombisArray = $this->TransporteAsRemisCombisArray;
                    $this->objTransporteAsRemisCombisArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateTransporteAsRemisCombis($objItem);

                    return $this->TransporteAsRemisCombisArray;
                }

                /**
                * Remove a Item to the _TransporteAsRemisCombisArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function RemoveTransporteAsRemisCombis(Transporte $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objTransporteAsRemisCombisArray;
                    $this->objTransporteAsRemisCombisArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objTransporteAsRemisCombisArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->RemisCombisObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedTransporteAsRemisCombis($objItem);
                        }

                    return $this->objTransporteAsRemisCombisArray;
                }

		/**
		 * Gets all associated TransportesAsRemisCombis as an array of Transporte objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/ 
		public function GetTransporteAsRemisCombisArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Transporte::LoadArrayByRemisCombis($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TransportesAsRemisCombis
		 * @return int
		*/ 
		public function CountTransportesAsRemisCombis() {
			if ((is_null($this->intId)))
				return 0;

			return Transporte::CountByRemisCombis($this->intId);
		}

		/**
		 * Associates a TransporteAsRemisCombis
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function AssociateTransporteAsRemisCombis(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsRemisCombis on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsRemisCombis on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"remis_combis" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . '
			');
		}

		/**
		 * Unassociates a TransporteAsRemisCombis
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function UnassociateTransporteAsRemisCombis(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsRemisCombis on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsRemisCombis on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"remis_combis" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"remis_combis" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TransportesAsRemisCombis
		 * @return void
		*/ 
		public function UnassociateAllTransportesAsRemisCombis() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsRemisCombis on this unsaved OpcionesTransporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"remis_combis" = null
				WHERE
					"remis_combis" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TransporteAsRemisCombis
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function DeleteAssociatedTransporteAsRemisCombis(Transporte $objTransporte) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsRemisCombis on this unsaved OpcionesTransporte.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsRemisCombis on this OpcionesTransporte with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"remis_combis" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TransportesAsRemisCombis
		 * @return void
		*/ 
		public function DeleteAllTransportesAsRemisCombis() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsRemisCombis on this unsaved OpcionesTransporte.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesTransporte::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"remis_combis" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="OpcionesTransporte"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Opcion" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OpcionesTransporte', $strComplexTypeArray)) {
				$strComplexTypeArray['OpcionesTransporte'] = OpcionesTransporte::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OpcionesTransporte::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OpcionesTransporte();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if (property_exists($objSoapObject, 'Opcion')) {
				$objToReturn->strOpcion = $objSoapObject->Opcion;
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
				array_push($objArrayToReturn, OpcionesTransporte::GetSoapObjectFromObject($objObject, true));

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