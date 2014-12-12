<?php
/**
 * The abstract PartidoGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Partido subclass which
 * extends this PartidoGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Partido class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $CodPartido the value for strCodPartido (Unique)
	 * @property-read Folio $FolioAsId the value for the private _objFolioAsId (Read-Only) if set due to an expansion on the folio.id_partido reverse relationship
	 * @property-read Folio[] $FolioAsIdArray the value for the private _objFolioAsIdArray (Read-Only) if set due to an ExpandAsArray on the folio.id_partido reverse relationship
	 * @property-read Localidad $LocalidadAsId the value for the private _objLocalidadAsId (Read-Only) if set due to an expansion on the localidad.id_partido reverse relationship
	 * @property-read Localidad[] $LocalidadAsIdArray the value for the private _objLocalidadAsIdArray (Read-Only) if set due to an ExpandAsArray on the localidad.id_partido reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class PartidoGen extends QBaseClass {

    public static function Noun() {
        return 'Partido';
    }
    public static function NounPlural() {
        return 'Partidos';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column partido.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'partido_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column partido.nombre
     * @var string strNombre
     */
    protected $strNombre;
    const NombreMaxLength = 45;
    const NombreDefault = null;


    /**
     * Protected member variable that maps to the database column partido.cod_partido
     * @var string strCodPartido
     */
    protected $strCodPartido;
    const CodPartidoMaxLength = 3;
    const CodPartidoDefault = null;


    /**
     * Private member variable that stores a reference to a single FolioAsId object
     * (of type Folio), if this Partido object was restored with
     * an expansion on the folio association table.
     * @var Folio _objFolioAsId;
     */
    protected $objFolioAsId;

    /**
     * Private member variable that stores a reference to an array of FolioAsId objects
     * (of type Folio[]), if this Partido object was restored with
     * an ExpandAsArray on the folio association table.
     * @var Folio[] _objFolioAsIdArray;
     */
    protected $objFolioAsIdArray;

    /**
     * Private member variable that stores a reference to a single LocalidadAsId object
     * (of type Localidad), if this Partido object was restored with
     * an expansion on the localidad association table.
     * @var Localidad _objLocalidadAsId;
     */
    protected $objLocalidadAsId;

    /**
     * Private member variable that stores a reference to an array of LocalidadAsId objects
     * (of type Localidad[]), if this Partido object was restored with
     * an ExpandAsArray on the localidad association table.
     * @var Localidad[] _objLocalidadAsIdArray;
     */
    protected $objLocalidadAsIdArray;

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
                protected static $_objPartidoArray = array();


		/**
		 * Load a Partido from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Partido
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Partido::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Partido()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objPartidoArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpPartido = Partido::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Partido()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objPartidoArray["$intId"] = $objTmpPartido;
            }
                        }
                        return isset(self::$_objPartidoArray["$intId"])?self::$_objPartidoArray["$intId"]:null;
		}

		/**
		 * Load all Partidos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Partido[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Partido::QueryArray to perform the LoadAll query
			try {
				return Partido::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Partidos
		 * @return int
		 */
		public static function CountAll() {
			// Call Partido::QueryCount to perform the CountAll query
			return Partido::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
        array("name"=>"CodPartido","type"=>"string"),
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Partido::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Partido()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Partido()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Partido no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Partido::GetDatabase();

			// Create/Build out the QueryBuilder object with Partido-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'partido');
			Partido::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('partido');

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
		 * Static Qcubed Query method to query for a single Partido object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Partido the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Partido::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Partido object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Partido::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Partido::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Partido objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Partido[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Partido::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Partido::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Partido objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Partido::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Partido::GetDatabase();

			$strQuery = Partido::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/partido', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Partido::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Partido
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'partido';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			$objBuilder->AddSelectItem($strTableName, 'cod_partido', $strAliasPrefix . 'cod_partido');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Partido from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Partido::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Partido
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
							$strAliasPrefix = 'partido__';


						// Expanding reverse references: FolioAsId
						$strAlias = $strAliasPrefix . 'folioasid__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objFolioAsIdArray)) {
								$objPreviousChildItems = $objPreviousItem->objFolioAsIdArray;
								$objChildItem = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'folioasid__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objFolioAsIdArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objFolioAsIdArray[] = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'folioasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: LocalidadAsId
						$strAlias = $strAliasPrefix . 'localidadasid__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objLocalidadAsIdArray)) {
								$objPreviousChildItems = $objPreviousItem->objLocalidadAsIdArray;
								$objChildItem = Localidad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'localidadasid__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objLocalidadAsIdArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objLocalidadAsIdArray[] = Localidad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'localidadasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'partido__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Partido object
			$objToReturn = new Partido();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre'] : $strAliasPrefix . 'nombre';
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'cod_partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cod_partido'] : $strAliasPrefix . 'cod_partido';
			$objToReturn->strCodPartido = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objFolioAsIdArray, $objToReturn->objFolioAsIdArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objLocalidadAsIdArray, $objToReturn->objLocalidadAsIdArray) != null) {
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
				$strAliasPrefix = 'partido__';




			// Check for FolioAsId Virtual Binding
			$strAlias = $strAliasPrefix . 'folioasid__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objFolioAsIdArray[] = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'folioasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objFolioAsId = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'folioasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LocalidadAsId Virtual Binding
			$strAlias = $strAliasPrefix . 'localidadasid__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objLocalidadAsIdArray[] = Localidad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'localidadasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objLocalidadAsId = Localidad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'localidadasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Partidos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Partido[]
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
					$objItem = Partido::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Partido::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Partido object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Partido
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Partido::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Partido()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Partido object,
		 * by CodPartido Index(es)
		 * @param string $strCodPartido
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Partido
		*/
		public static function LoadByCodPartido($strCodPartido, $objOptionalClauses = null) {
			return Partido::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Partido()->CodPartido, $strCodPartido)
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
         * Save this Partido
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Partido::GetDatabase();

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
                        INSERT INTO "partido" (
                            "nombre",
                            "cod_partido"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            ' . $objDatabase->SqlVariable($this->strCodPartido) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('partido', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "partido"
                        SET
                            "nombre" = ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            "cod_partido" = ' . $objDatabase->SqlVariable($this->strCodPartido) . '
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
		 * Delete this Partido
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Partido with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"partido"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Partidos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"partido"');
		}

		/**
		 * Truncate partido table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "partido" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Partido from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Partido object.');

			// Reload the Object
			$objReloaded = Partido::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strCodPartido = $objReloaded->strCodPartido;
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

            case 'Nombre':
                /**
                 * Gets the value for strNombre (Not Null)
                 * @return string
                 */
                return $this->strNombre;

            case 'CodPartido':
                /**
                 * Gets the value for strCodPartido (Unique)
                 * @return string
                 */
                return $this->strCodPartido;


            ///////////////////
            // Member Objects
            ///////////////////

            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'FolioAsId':
                /**
                 * Gets the value for the private _objFolioAsId (Read-Only)
                 * if set due to an expansion on the folio.id_partido reverse relationship
                 * @return Folio
                 */
                return $this->objFolioAsId;

            case 'FolioAsIdArray':
                /**
                 * Gets the value for the private _objFolioAsIdArray (Read-Only)
                 * if set due to an ExpandAsArray on the folio.id_partido reverse relationship
                 * @return Folio[]
                 */
                if(is_null($this->objFolioAsIdArray))
                    $this->objFolioAsIdArray = $this->GetFolioAsIdArray();
                return (array) $this->objFolioAsIdArray;

            case 'LocalidadAsId':
                /**
                 * Gets the value for the private _objLocalidadAsId (Read-Only)
                 * if set due to an expansion on the localidad.id_partido reverse relationship
                 * @return Localidad
                 */
                return $this->objLocalidadAsId;

            case 'LocalidadAsIdArray':
                /**
                 * Gets the value for the private _objLocalidadAsIdArray (Read-Only)
                 * if set due to an ExpandAsArray on the localidad.id_partido reverse relationship
                 * @return Localidad[]
                 */
                if(is_null($this->objLocalidadAsIdArray))
                    $this->objLocalidadAsIdArray = $this->GetLocalidadAsIdArray();
                return (array) $this->objLocalidadAsIdArray;


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
				case 'Nombre':
					/**
					 * Sets the value for strNombre (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombre = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombre = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodPartido':
					/**
					 * Sets the value for strCodPartido (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strCodPartido = QType::Cast($mixValue, QType::String));
                                                return ($this->strCodPartido = $mixValue);
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
        
			
		
		// Related Objects' Methods for FolioAsId
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _FolioAsIdArray
                /**
                * Add a Item to the _FolioAsIdArray
                * @param Folio $objItem
                * @return Folio[]
                */
                public function AddFolioAsId(Folio $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdPartidoObject = $this;
                    $this->objFolioAsIdArray = $this->FolioAsIdArray;
                    $this->objFolioAsIdArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateFolioAsId($objItem);

                    return $this->FolioAsIdArray;
                }

                /**
                * Remove a Item to the _FolioAsIdArray
                * @param Folio $objItem
                * @return Folio[]
                */
                public function RemoveFolioAsId(Folio $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objFolioAsIdArray;
                    $this->objFolioAsIdArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objFolioAsIdArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdPartidoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedFolioAsId($objItem);
                        }

                    return $this->objFolioAsIdArray;
                }

		/**
		 * Gets all associated FoliosAsId as an array of Folio objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio[]
		*/ 
		public function GetFolioAsIdArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Folio::LoadArrayByIdPartido($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FoliosAsId
		 * @return int
		*/ 
		public function CountFoliosAsId() {
			if ((is_null($this->intId)))
				return 0;

			return Folio::CountByIdPartido($this->intId);
		}

		/**
		 * Associates a FolioAsId
		 * @param Folio $objFolio
		 * @return void
		*/ 
		public function AssociateFolioAsId(Folio $objFolio) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFolioAsId on this unsaved Partido.');
			if ((is_null($objFolio->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFolioAsId on this Partido with an unsaved Folio.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"folio"
				SET
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objFolio->Id) . '
			');
		}

		/**
		 * Unassociates a FolioAsId
		 * @param Folio $objFolio
		 * @return void
		*/ 
		public function UnassociateFolioAsId(Folio $objFolio) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFolioAsId on this unsaved Partido.');
			if ((is_null($objFolio->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFolioAsId on this Partido with an unsaved Folio.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"folio"
				SET
					"id_partido" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objFolio->Id) . ' AND
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FoliosAsId
		 * @return void
		*/ 
		public function UnassociateAllFoliosAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFolioAsId on this unsaved Partido.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"folio"
				SET
					"id_partido" = null
				WHERE
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FolioAsId
		 * @param Folio $objFolio
		 * @return void
		*/ 
		public function DeleteAssociatedFolioAsId(Folio $objFolio) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFolioAsId on this unsaved Partido.');
			if ((is_null($objFolio->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFolioAsId on this Partido with an unsaved Folio.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"folio"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objFolio->Id) . ' AND
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FoliosAsId
		 * @return void
		*/ 
		public function DeleteAllFoliosAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFolioAsId on this unsaved Partido.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"folio"
				WHERE
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LocalidadAsId
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _LocalidadAsIdArray
                /**
                * Add a Item to the _LocalidadAsIdArray
                * @param Localidad $objItem
                * @return Localidad[]
                */
                public function AddLocalidadAsId(Localidad $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdPartidoObject = $this;
                    $this->objLocalidadAsIdArray = $this->LocalidadAsIdArray;
                    $this->objLocalidadAsIdArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateLocalidadAsId($objItem);

                    return $this->LocalidadAsIdArray;
                }

                /**
                * Remove a Item to the _LocalidadAsIdArray
                * @param Localidad $objItem
                * @return Localidad[]
                */
                public function RemoveLocalidadAsId(Localidad $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objLocalidadAsIdArray;
                    $this->objLocalidadAsIdArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objLocalidadAsIdArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdPartidoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedLocalidadAsId($objItem);
                        }

                    return $this->objLocalidadAsIdArray;
                }

		/**
		 * Gets all associated LocalidadesAsId as an array of Localidad objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Localidad[]
		*/ 
		public function GetLocalidadAsIdArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Localidad::LoadArrayByIdPartido($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LocalidadesAsId
		 * @return int
		*/ 
		public function CountLocalidadesAsId() {
			if ((is_null($this->intId)))
				return 0;

			return Localidad::CountByIdPartido($this->intId);
		}

		/**
		 * Associates a LocalidadAsId
		 * @param Localidad $objLocalidad
		 * @return void
		*/ 
		public function AssociateLocalidadAsId(Localidad $objLocalidad) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLocalidadAsId on this unsaved Partido.');
			if ((is_null($objLocalidad->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLocalidadAsId on this Partido with an unsaved Localidad.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"localidad"
				SET
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objLocalidad->Id) . '
			');
		}

		/**
		 * Unassociates a LocalidadAsId
		 * @param Localidad $objLocalidad
		 * @return void
		*/ 
		public function UnassociateLocalidadAsId(Localidad $objLocalidad) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocalidadAsId on this unsaved Partido.');
			if ((is_null($objLocalidad->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocalidadAsId on this Partido with an unsaved Localidad.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"localidad"
				SET
					"id_partido" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objLocalidad->Id) . ' AND
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all LocalidadesAsId
		 * @return void
		*/ 
		public function UnassociateAllLocalidadesAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocalidadAsId on this unsaved Partido.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"localidad"
				SET
					"id_partido" = null
				WHERE
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LocalidadAsId
		 * @param Localidad $objLocalidad
		 * @return void
		*/ 
		public function DeleteAssociatedLocalidadAsId(Localidad $objLocalidad) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocalidadAsId on this unsaved Partido.');
			if ((is_null($objLocalidad->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocalidadAsId on this Partido with an unsaved Localidad.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"localidad"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objLocalidad->Id) . ' AND
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated LocalidadesAsId
		 * @return void
		*/ 
		public function DeleteAllLocalidadesAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocalidadAsId on this unsaved Partido.');

			// Get the Database Object for this Class
			$objDatabase = Partido::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"localidad"
				WHERE
					"id_partido" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Partido"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="CodPartido" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Partido', $strComplexTypeArray)) {
				$strComplexTypeArray['Partido'] = Partido::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Partido::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Partido();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if (property_exists($objSoapObject, 'Nombre')) {
				$objToReturn->strNombre = $objSoapObject->Nombre;
            }
			if (property_exists($objSoapObject, 'CodPartido')) {
				$objToReturn->strCodPartido = $objSoapObject->CodPartido;
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
				array_push($objArrayToReturn, Partido::GetSoapObjectFromObject($objObject, true));

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