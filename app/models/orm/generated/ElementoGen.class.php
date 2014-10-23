<?php
/**
 * The abstract ElementoGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Elemento subclass which
 * extends this ElementoGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Elemento class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdElemento the value for intIdElemento (Read-Only PK)
	 * @property string $Nombre the value for strNombre 
	 * @property integer $IdPerfil the value for intIdPerfil 
	 * @property string $Undato the value for strUndato 
	 * @property string $Otrodato the value for strOtrodato 
	 * @property Perfil $IdPerfilObject the value for the Perfil object referenced by intIdPerfil 
	 * @property-read ElementoHijo $ElementoHijoAsId the value for the private _objElementoHijoAsId (Read-Only) if set due to an expansion on the elemento_hijo.id_elemento reverse relationship
	 * @property-read ElementoHijo[] $ElementoHijoAsIdArray the value for the private _objElementoHijoAsIdArray (Read-Only) if set due to an ExpandAsArray on the elemento_hijo.id_elemento reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class ElementoGen extends QBaseClass {

    public static function Noun() {
        return 'Elemento';
    }
    public static function NounPlural() {
        return 'Elementos';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column elemento.id_elemento
     * @var integer intIdElemento
     */
    protected $intIdElemento;
    const IdElementoDefault = 'nextval(\'elemento_id_elemento_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column elemento.nombre
     * @var string strNombre
     */
    protected $strNombre;
    const NombreDefault = null;


    /**
     * Protected member variable that maps to the database column elemento.id_perfil
     * @var integer intIdPerfil
     */
    protected $intIdPerfil;
    const IdPerfilDefault = null;


    /**
     * Protected member variable that maps to the database column elemento.undato
     * @var string strUndato
     */
    protected $strUndato;
    const UndatoDefault = null;


    /**
     * Protected member variable that maps to the database column elemento.otrodato
     * @var string strOtrodato
     */
    protected $strOtrodato;
    const OtrodatoDefault = null;


    /**
     * Private member variable that stores a reference to a single ElementoHijoAsId object
     * (of type ElementoHijo), if this Elemento object was restored with
     * an expansion on the elemento_hijo association table.
     * @var ElementoHijo _objElementoHijoAsId;
     */
    protected $objElementoHijoAsId;

    /**
     * Private member variable that stores a reference to an array of ElementoHijoAsId objects
     * (of type ElementoHijo[]), if this Elemento object was restored with
     * an ExpandAsArray on the elemento_hijo association table.
     * @var ElementoHijo[] _objElementoHijoAsIdArray;
     */
    protected $objElementoHijoAsIdArray;

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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column elemento.id_perfil.
		 *
		 * NOTE: Always use the IdPerfilObject property getter to correctly retrieve this Perfil object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Perfil objIdPerfilObject
		 */
		protected $objIdPerfilObject;



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
                protected static $_objElementoArray = array();


		/**
		 * Load a Elemento from PK Info
		 * @param integer $intIdElemento
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Elemento
		 */
		public static function Load($intIdElemento, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Elemento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Elemento()->IdElemento, $intIdElemento)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intIdElemento",self::$_objElementoArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpElemento = Elemento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Elemento()->IdElemento, $intIdElemento)
				),
				$objOptionalClauses
			))) {
			    self::$_objElementoArray["$intIdElemento"] = $objTmpElemento;
            }
                        }
                        return isset(self::$_objElementoArray["$intIdElemento"])?self::$_objElementoArray["$intIdElemento"]:null;
		}

		/**
		 * Load all Elementos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Elemento[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Elemento::QueryArray to perform the LoadAll query
			try {
				return Elemento::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Elementos
		 * @return int
		 */
		public static function CountAll() {
			// Call Elemento::QueryCount to perform the CountAll query
			return Elemento::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Elemento::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Elemento()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Elemento()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Elemento no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Elemento::GetDatabase();

			// Create/Build out the QueryBuilder object with Elemento-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'elemento');
			Elemento::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('elemento');

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
		 * Static Qcubed Query method to query for a single Elemento object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Elemento the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Elemento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Elemento object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Elemento::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Elemento::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Elemento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Elemento[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Elemento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Elemento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Elemento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Elemento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Elemento::GetDatabase();

			$strQuery = Elemento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/elemento', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Elemento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Elemento
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'elemento';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id_elemento', $strAliasPrefix . 'id_elemento');
			$objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			$objBuilder->AddSelectItem($strTableName, 'id_perfil', $strAliasPrefix . 'id_perfil');
			$objBuilder->AddSelectItem($strTableName, 'undato', $strAliasPrefix . 'undato');
			$objBuilder->AddSelectItem($strTableName, 'otrodato', $strAliasPrefix . 'otrodato');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Elemento from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Elemento::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Elemento
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id_elemento';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intIdElemento == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'elemento__';


						// Expanding reverse references: ElementoHijoAsId
						$strAlias = $strAliasPrefix . 'elementohijoasid__id_elemento_hijo';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objElementoHijoAsIdArray)) {
								$objPreviousChildItems = $objPreviousItem->objElementoHijoAsIdArray;
								$objChildItem = ElementoHijo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'elementohijoasid__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objElementoHijoAsIdArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objElementoHijoAsIdArray[] = ElementoHijo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'elementohijoasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'elemento__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Elemento object
			$objToReturn = new Elemento();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id_elemento', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_elemento'] : $strAliasPrefix . 'id_elemento';
			$objToReturn->intIdElemento = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre'] : $strAliasPrefix . 'nombre';
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_perfil', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_perfil'] : $strAliasPrefix . 'id_perfil';
			$objToReturn->intIdPerfil = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'undato', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'undato'] : $strAliasPrefix . 'undato';
			$objToReturn->strUndato = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'otrodato', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'otrodato'] : $strAliasPrefix . 'otrodato';
			$objToReturn->strOtrodato = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdElemento != $objPreviousItem->IdElemento) {
						continue;
					}
					if (array_diff($objPreviousItem->objElementoHijoAsIdArray, $objToReturn->objElementoHijoAsIdArray) != null) {
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
				$strAliasPrefix = 'elemento__';

			// Check for IdPerfilObject Early Binding
			$strAlias = $strAliasPrefix . 'id_perfil__id_perfil';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdPerfilObject = Perfil::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_perfil__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ElementoHijoAsId Virtual Binding
			$strAlias = $strAliasPrefix . 'elementohijoasid__id_elemento_hijo';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objElementoHijoAsIdArray[] = ElementoHijo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'elementohijoasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objElementoHijoAsId = ElementoHijo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'elementohijoasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Elementos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Elemento[]
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
					$objItem = Elemento::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Elemento::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Elemento object,
		 * by IdElemento Index(es)
		 * @param integer $intIdElemento
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Elemento
		*/
		public static function LoadByIdElemento($intIdElemento, $objOptionalClauses = null) {
			return Elemento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Elemento()->IdElemento, $intIdElemento)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Elemento objects,
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Elemento[]
		*/
		public static function LoadArrayByIdPerfil($intIdPerfil, $objOptionalClauses = null) {
			// Call Elemento::QueryArray to perform the LoadArrayByIdPerfil query
			try {
				return Elemento::QueryArray(
					QQ::Equal(QQN::Elemento()->IdPerfil, $intIdPerfil),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Elementos
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @return int
		*/
		public static function CountByIdPerfil($intIdPerfil) {
			// Call Elemento::QueryCount to perform the CountByIdPerfil query
			return Elemento::QueryCount(
				QQ::Equal(QQN::Elemento()->IdPerfil, $intIdPerfil)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Elemento
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Elemento::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.
            // ver si objIdPerfilObject esta Guardado
            if(is_null($this->intIdPerfil)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdPerfilObject))
                try{
                    if(!is_null($this->IdPerfilObject->IdPerfil))
                        $this->intIdPerfil = $this->IdPerfilObject->IdPerfil;
                    else
                        $this->intIdPerfil = $this->IdPerfilObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }

                    if ($this->intIdElemento && ($this->intIdElemento > QDatabaseNumberFieldMax::Integer || $this->intIdElemento < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdElemento', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdPerfil && ($this->intIdPerfil > QDatabaseNumberFieldMax::Integer || $this->intIdPerfil < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdPerfil', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "elemento" (
                            "nombre",
                            "id_perfil",
                            "undato",
                            "otrodato"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            ' . $objDatabase->SqlVariable($this->intIdPerfil) . ',
                            ' . $objDatabase->SqlVariable($this->strUndato) . ',
                            ' . $objDatabase->SqlVariable($this->strOtrodato) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intIdElemento = $objDatabase->InsertId('elemento', 'id_elemento');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "elemento"
                        SET
                            "nombre" = ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            "id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . ',
                            "undato" = ' . $objDatabase->SqlVariable($this->strUndato) . ',
                            "otrodato" = ' . $objDatabase->SqlVariable($this->strOtrodato) . '
                        WHERE
                            "id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '
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
                    $mixToReturn = $this->intIdElemento;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this Elemento
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdElemento)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Elemento with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"elemento"
				WHERE
					"id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '');
		}

		/**
		 * Delete all Elementos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"elemento"');
		}

		/**
		 * Truncate elemento table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "elemento" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Elemento from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Elemento object.');

			// Reload the Object
			$objReloaded = Elemento::Load($this->intIdElemento, null, true);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->IdPerfil = $objReloaded->IdPerfil;
			$this->strUndato = $objReloaded->strUndato;
			$this->strOtrodato = $objReloaded->strOtrodato;
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
            case 'IdElemento':
                /**
                 * Gets the value for intIdElemento (Read-Only PK)
                 * @return integer
                 */
                return $this->intIdElemento;

            case 'Nombre':
                /**
                 * Gets the value for strNombre 
                 * @return string
                 */
                return $this->strNombre;

            case 'IdPerfil':
                /**
                 * Gets the value for intIdPerfil 
                 * @return integer
                 */
                return $this->intIdPerfil;

            case 'Undato':
                /**
                 * Gets the value for strUndato 
                 * @return string
                 */
                return $this->strUndato;

            case 'Otrodato':
                /**
                 * Gets the value for strOtrodato 
                 * @return string
                 */
                return $this->strOtrodato;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdPerfilObject':
                /**
                 * Gets the value for the Perfil object referenced by intIdPerfil 
                 * @return Perfil
                 */
                try {
                    if ((!$this->objIdPerfilObject) && (!is_null($this->intIdPerfil)))
                        $this->objIdPerfilObject = Perfil::Load($this->intIdPerfil);
                    return $this->objIdPerfilObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }


            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'ElementoHijoAsId':
                /**
                 * Gets the value for the private _objElementoHijoAsId (Read-Only)
                 * if set due to an expansion on the elemento_hijo.id_elemento reverse relationship
                 * @return ElementoHijo
                 */
                return $this->objElementoHijoAsId;

            case 'ElementoHijoAsIdArray':
                /**
                 * Gets the value for the private _objElementoHijoAsIdArray (Read-Only)
                 * if set due to an ExpandAsArray on the elemento_hijo.id_elemento reverse relationship
                 * @return ElementoHijo[]
                 */
                if(is_null($this->objElementoHijoAsIdArray))
                    $this->objElementoHijoAsIdArray = $this->GetElementoHijoAsIdArray();
                return (array) $this->objElementoHijoAsIdArray;


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
					 * Sets the value for strNombre 
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

				case 'IdPerfil':
					/**
					 * Sets the value for intIdPerfil 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdPerfilObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdPerfil = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdPerfil = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Undato':
					/**
					 * Sets the value for strUndato 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strUndato = QType::Cast($mixValue, QType::String));
                                                return ($this->strUndato = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Otrodato':
					/**
					 * Sets the value for strOtrodato 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOtrodato = QType::Cast($mixValue, QType::String));
                                                return ($this->strOtrodato = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdPerfilObject':
					/**
					 * Sets the value for the Perfil object referenced by intIdPerfil 
					 * @param Perfil $mixValue
					 * @return Perfil
					 */
					if (is_null($mixValue)) {
						$this->intIdPerfil = null;
						$this->objIdPerfilObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Perfil object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Perfil');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Perfil object
						//if (is_null($mixValue->IdPerfil))
						//	throw new QCallerException('Unable to set an unsaved IdPerfilObject for this Elemento');

						// Update Local Member Variables
						$this->objIdPerfilObject = $mixValue;
						$this->intIdPerfil = $mixValue->IdPerfil;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
        
			
		
		// Related Objects' Methods for ElementoHijoAsId
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _ElementoHijoAsIdArray
                /**
                * Add a Item to the _ElementoHijoAsIdArray
                * @param ElementoHijo $objItem
                * @return ElementoHijo[]
                */
                public function AddElementoHijoAsId(ElementoHijo $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdElementoObject = $this;
                    $this->objElementoHijoAsIdArray = $this->ElementoHijoAsIdArray;
                    $this->objElementoHijoAsIdArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateElementoHijoAsId($objItem);

                    return $this->ElementoHijoAsIdArray;
                }

                /**
                * Remove a Item to the _ElementoHijoAsIdArray
                * @param ElementoHijo $objItem
                * @return ElementoHijo[]
                */
                public function RemoveElementoHijoAsId(ElementoHijo $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objElementoHijoAsIdArray;
                    $this->objElementoHijoAsIdArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objElementoHijoAsIdArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->IdElementoHijo))
                        try{
                            $objItem->IdElementoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedElementoHijoAsId($objItem);
                        }

                    return $this->objElementoHijoAsIdArray;
                }

		/**
		 * Gets all associated ElementoHijosAsId as an array of ElementoHijo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ElementoHijo[]
		*/ 
		public function GetElementoHijoAsIdArray($objOptionalClauses = null) {
			if ((is_null($this->intIdElemento)))
				return array();

			try {
				return ElementoHijo::LoadArrayByIdElemento($this->intIdElemento, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ElementoHijosAsId
		 * @return int
		*/ 
		public function CountElementoHijosAsId() {
			if ((is_null($this->intIdElemento)))
				return 0;

			return ElementoHijo::CountByIdElemento($this->intIdElemento);
		}

		/**
		 * Associates a ElementoHijoAsId
		 * @param ElementoHijo $objElementoHijo
		 * @return void
		*/ 
		public function AssociateElementoHijoAsId(ElementoHijo $objElementoHijo) {
			if ((is_null($this->intIdElemento)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateElementoHijoAsId on this unsaved Elemento.');
			if ((is_null($objElementoHijo->IdElementoHijo)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateElementoHijoAsId on this Elemento with an unsaved ElementoHijo.');

			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"elemento_hijo"
				SET
					"id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '
				WHERE
					"id_elemento_hijo" = ' . $objDatabase->SqlVariable($objElementoHijo->IdElementoHijo) . '
			');
		}

		/**
		 * Unassociates a ElementoHijoAsId
		 * @param ElementoHijo $objElementoHijo
		 * @return void
		*/ 
		public function UnassociateElementoHijoAsId(ElementoHijo $objElementoHijo) {
			if ((is_null($this->intIdElemento)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateElementoHijoAsId on this unsaved Elemento.');
			if ((is_null($objElementoHijo->IdElementoHijo)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateElementoHijoAsId on this Elemento with an unsaved ElementoHijo.');

			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"elemento_hijo"
				SET
					"id_elemento" = null
				WHERE
					"id_elemento_hijo" = ' . $objDatabase->SqlVariable($objElementoHijo->IdElementoHijo) . ' AND
					"id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '
			');
		}

		/**
		 * Unassociates all ElementoHijosAsId
		 * @return void
		*/ 
		public function UnassociateAllElementoHijosAsId() {
			if ((is_null($this->intIdElemento)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateElementoHijoAsId on this unsaved Elemento.');

			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"elemento_hijo"
				SET
					"id_elemento" = null
				WHERE
					"id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '
			');
		}

		/**
		 * Deletes an associated ElementoHijoAsId
		 * @param ElementoHijo $objElementoHijo
		 * @return void
		*/ 
		public function DeleteAssociatedElementoHijoAsId(ElementoHijo $objElementoHijo) {
			if ((is_null($this->intIdElemento)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateElementoHijoAsId on this unsaved Elemento.');
			if ((is_null($objElementoHijo->IdElementoHijo)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateElementoHijoAsId on this Elemento with an unsaved ElementoHijo.');

			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"elemento_hijo"
				WHERE
					"id_elemento_hijo" = ' . $objDatabase->SqlVariable($objElementoHijo->IdElementoHijo) . ' AND
					"id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '
			');
		}

		/**
		 * Deletes all associated ElementoHijosAsId
		 * @return void
		*/ 
		public function DeleteAllElementoHijosAsId() {
			if ((is_null($this->intIdElemento)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateElementoHijoAsId on this unsaved Elemento.');

			// Get the Database Object for this Class
			$objDatabase = Elemento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"elemento_hijo"
				WHERE
					"id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Elemento"><sequence>';
			$strToReturn .= '<element name="IdElemento" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="IdPerfilObject" type="xsd1:Perfil"/>';
			$strToReturn .= '<element name="Undato" type="xsd:string"/>';
			$strToReturn .= '<element name="Otrodato" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Elemento', $strComplexTypeArray)) {
				$strComplexTypeArray['Elemento'] = Elemento::GetSoapComplexTypeXml();
				$strComplexTypeArray = Perfil::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Elemento::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Elemento();
			if (property_exists($objSoapObject, 'IdElemento')) {
				$objToReturn->intIdElemento = $objSoapObject->IdElemento;
            }
			if (property_exists($objSoapObject, 'Nombre')) {
				$objToReturn->strNombre = $objSoapObject->Nombre;
            }
			if ((property_exists($objSoapObject, 'IdPerfilObject')) &&
				($objSoapObject->IdPerfilObject))
				$objToReturn->IdPerfilObject = Perfil::GetObjectFromSoapObject($objSoapObject->IdPerfilObject);
			if (property_exists($objSoapObject, 'Undato')) {
				$objToReturn->strUndato = $objSoapObject->Undato;
            }
			if (property_exists($objSoapObject, 'Otrodato')) {
				$objToReturn->strOtrodato = $objSoapObject->Otrodato;
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
				array_push($objArrayToReturn, Elemento::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdPerfilObject)
				$objObject->objIdPerfilObject = Perfil::GetSoapObjectFromObject($objObject->objIdPerfilObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdPerfil = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>