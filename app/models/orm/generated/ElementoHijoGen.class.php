<?php
/**
 * The abstract ElementoHijoGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the ElementoHijo subclass which
 * extends this ElementoHijoGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the ElementoHijo class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdElementoHijo the value for intIdElementoHijo (Read-Only PK)
	 * @property integer $IdElemento the value for intIdElemento (Not Null)
	 * @property string $Nombre the value for strNombre 
	 * @property integer $IdPerfil the value for intIdPerfil 
	 * @property string $Undato the value for strUndato 
	 * @property string $Otrodato the value for strOtrodato 
	 * @property Elemento $IdElementoObject the value for the Elemento object referenced by intIdElemento (Not Null)
	 * @property Perfil $IdPerfilObject the value for the Perfil object referenced by intIdPerfil 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class ElementoHijoGen extends QBaseClass {

    public static function Noun() {
        return 'ElementoHijo';
    }
    public static function NounPlural() {
        return 'ElementoHijos';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column elemento_hijo.id_elemento_hijo
     * @var integer intIdElementoHijo
     */
    protected $intIdElementoHijo;
    const IdElementoHijoDefault = 'nextval(\'elemento_hijo_id_elemento_hijo_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column elemento_hijo.id_elemento
     * @var integer intIdElemento
     */
    protected $intIdElemento;
    const IdElementoDefault = null;


    /**
     * Protected member variable that maps to the database column elemento_hijo.nombre
     * @var string strNombre
     */
    protected $strNombre;
    const NombreDefault = null;


    /**
     * Protected member variable that maps to the database column elemento_hijo.id_perfil
     * @var integer intIdPerfil
     */
    protected $intIdPerfil;
    const IdPerfilDefault = null;


    /**
     * Protected member variable that maps to the database column elemento_hijo.undato
     * @var string strUndato
     */
    protected $strUndato;
    const UndatoDefault = null;


    /**
     * Protected member variable that maps to the database column elemento_hijo.otrodato
     * @var string strOtrodato
     */
    protected $strOtrodato;
    const OtrodatoDefault = null;


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
		 * in the database column elemento_hijo.id_elemento.
		 *
		 * NOTE: Always use the IdElementoObject property getter to correctly retrieve this Elemento object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Elemento objIdElementoObject
		 */
		protected $objIdElementoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column elemento_hijo.id_perfil.
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
                protected static $_objElementoHijoArray = array();


		/**
		 * Load a ElementoHijo from PK Info
		 * @param integer $intIdElementoHijo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return ElementoHijo
		 */
		public static function Load($intIdElementoHijo, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  ElementoHijo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ElementoHijo()->IdElementoHijo, $intIdElementoHijo)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intIdElementoHijo",self::$_objElementoHijoArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpElementoHijo = ElementoHijo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ElementoHijo()->IdElementoHijo, $intIdElementoHijo)
				),
				$objOptionalClauses
			))) {
			    self::$_objElementoHijoArray["$intIdElementoHijo"] = $objTmpElementoHijo;
            }
                        }
                        return isset(self::$_objElementoHijoArray["$intIdElementoHijo"])?self::$_objElementoHijoArray["$intIdElementoHijo"]:null;
		}

		/**
		 * Load all ElementoHijos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ElementoHijo[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ElementoHijo::QueryArray to perform the LoadAll query
			try {
				return ElementoHijo::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ElementoHijos
		 * @return int
		 */
		public static function CountAll() {
			// Call ElementoHijo::QueryCount to perform the CountAll query
			return ElementoHijo::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (ElementoHijo::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::ElementoHijo()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::ElementoHijo()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase ElementoHijo no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = ElementoHijo::GetDatabase();

			// Create/Build out the QueryBuilder object with ElementoHijo-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'elemento_hijo');
			ElementoHijo::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('elemento_hijo');

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
		 * Static Qcubed Query method to query for a single ElementoHijo object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ElementoHijo the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ElementoHijo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new ElementoHijo object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ElementoHijo::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = ElementoHijo::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of ElementoHijo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ElementoHijo[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ElementoHijo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ElementoHijo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of ElementoHijo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ElementoHijo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ElementoHijo::GetDatabase();

			$strQuery = ElementoHijo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/elementohijo', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ElementoHijo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ElementoHijo
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'elemento_hijo';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id_elemento_hijo', $strAliasPrefix . 'id_elemento_hijo');
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
		 * Instantiate a ElementoHijo from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ElementoHijo::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ElementoHijo
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the ElementoHijo object
			$objToReturn = new ElementoHijo();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id_elemento_hijo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_elemento_hijo'] : $strAliasPrefix . 'id_elemento_hijo';
			$objToReturn->intIdElementoHijo = $objDbRow->GetColumn($strAliasName, 'Integer');
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
					if ($objToReturn->IdElementoHijo != $objPreviousItem->IdElementoHijo) {
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
				$strAliasPrefix = 'elemento_hijo__';

			// Check for IdElementoObject Early Binding
			$strAlias = $strAliasPrefix . 'id_elemento__id_elemento';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdElementoObject = Elemento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_elemento__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IdPerfilObject Early Binding
			$strAlias = $strAliasPrefix . 'id_perfil__id_perfil';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdPerfilObject = Perfil::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_perfil__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ElementoHijos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ElementoHijo[]
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
					$objItem = ElementoHijo::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ElementoHijo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ElementoHijo object,
		 * by IdElementoHijo Index(es)
		 * @param integer $intIdElementoHijo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ElementoHijo
		*/
		public static function LoadByIdElementoHijo($intIdElementoHijo, $objOptionalClauses = null) {
			return ElementoHijo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ElementoHijo()->IdElementoHijo, $intIdElementoHijo)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ElementoHijo objects,
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ElementoHijo[]
		*/
		public static function LoadArrayByIdPerfil($intIdPerfil, $objOptionalClauses = null) {
			// Call ElementoHijo::QueryArray to perform the LoadArrayByIdPerfil query
			try {
				return ElementoHijo::QueryArray(
					QQ::Equal(QQN::ElementoHijo()->IdPerfil, $intIdPerfil),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ElementoHijos
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @return int
		*/
		public static function CountByIdPerfil($intIdPerfil) {
			// Call ElementoHijo::QueryCount to perform the CountByIdPerfil query
			return ElementoHijo::QueryCount(
				QQ::Equal(QQN::ElementoHijo()->IdPerfil, $intIdPerfil)
			);
		}
			
		/**
		 * Load an array of ElementoHijo objects,
		 * by IdElemento Index(es)
		 * @param integer $intIdElemento
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ElementoHijo[]
		*/
		public static function LoadArrayByIdElemento($intIdElemento, $objOptionalClauses = null) {
			// Call ElementoHijo::QueryArray to perform the LoadArrayByIdElemento query
			try {
				return ElementoHijo::QueryArray(
					QQ::Equal(QQN::ElementoHijo()->IdElemento, $intIdElemento),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ElementoHijos
		 * by IdElemento Index(es)
		 * @param integer $intIdElemento
		 * @return int
		*/
		public static function CountByIdElemento($intIdElemento) {
			// Call ElementoHijo::QueryCount to perform the CountByIdElemento query
			return ElementoHijo::QueryCount(
				QQ::Equal(QQN::ElementoHijo()->IdElemento, $intIdElemento)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this ElementoHijo
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = ElementoHijo::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.
            // ver si objIdElementoObject esta Guardado
            if(is_null($this->intIdElemento)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdElementoObject))
                try{
                    if(!is_null($this->IdElementoObject->IdElemento))
                        $this->intIdElemento = $this->IdElementoObject->IdElemento;
                    else
                        $this->intIdElemento = $this->IdElementoObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
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

                    if ($this->intIdElementoHijo && ($this->intIdElementoHijo > QDatabaseNumberFieldMax::Integer || $this->intIdElementoHijo < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdElementoHijo', QDatabaseFieldType::Integer);
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
                        INSERT INTO "elemento_hijo" (
                            "id_elemento",
                            "nombre",
                            "id_perfil",
                            "undato",
                            "otrodato"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdElemento) . ',
                            ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            ' . $objDatabase->SqlVariable($this->intIdPerfil) . ',
                            ' . $objDatabase->SqlVariable($this->strUndato) . ',
                            ' . $objDatabase->SqlVariable($this->strOtrodato) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intIdElementoHijo = $objDatabase->InsertId('elemento_hijo', 'id_elemento_hijo');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "elemento_hijo"
                        SET
                            "id_elemento" = ' . $objDatabase->SqlVariable($this->intIdElemento) . ',
                            "nombre" = ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            "id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . ',
                            "undato" = ' . $objDatabase->SqlVariable($this->strUndato) . ',
                            "otrodato" = ' . $objDatabase->SqlVariable($this->strOtrodato) . '
                        WHERE
                            "id_elemento_hijo" = ' . $objDatabase->SqlVariable($this->intIdElementoHijo) . '
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
                    $mixToReturn = $this->intIdElementoHijo;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this ElementoHijo
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdElementoHijo)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ElementoHijo with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ElementoHijo::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"elemento_hijo"
				WHERE
					"id_elemento_hijo" = ' . $objDatabase->SqlVariable($this->intIdElementoHijo) . '');
		}

		/**
		 * Delete all ElementoHijos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ElementoHijo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"elemento_hijo"');
		}

		/**
		 * Truncate elemento_hijo table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = ElementoHijo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "elemento_hijo" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this ElementoHijo from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ElementoHijo object.');

			// Reload the Object
			$objReloaded = ElementoHijo::Load($this->intIdElementoHijo, null, true);

			// Update $this's local variables to match
			$this->IdElemento = $objReloaded->IdElemento;
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
            case 'IdElementoHijo':
                /**
                 * Gets the value for intIdElementoHijo (Read-Only PK)
                 * @return integer
                 */
                return $this->intIdElementoHijo;

            case 'IdElemento':
                /**
                 * Gets the value for intIdElemento (Not Null)
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
            case 'IdElementoObject':
                /**
                 * Gets the value for the Elemento object referenced by intIdElemento (Not Null)
                 * @return Elemento
                 */
                try {
                    if ((!$this->objIdElementoObject) && (!is_null($this->intIdElemento)))
                        $this->objIdElementoObject = Elemento::Load($this->intIdElemento);
                    return $this->objIdElementoObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

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
				case 'IdElemento':
					/**
					 * Sets the value for intIdElemento (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdElementoObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdElemento = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdElemento = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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
				case 'IdElementoObject':
					/**
					 * Sets the value for the Elemento object referenced by intIdElemento (Not Null)
					 * @param Elemento $mixValue
					 * @return Elemento
					 */
					if (is_null($mixValue)) {
						$this->intIdElemento = null;
						$this->objIdElementoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Elemento object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Elemento');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Elemento object
						//if (is_null($mixValue->IdElemento))
						//	throw new QCallerException('Unable to set an unsaved IdElementoObject for this ElementoHijo');

						// Update Local Member Variables
						$this->objIdElementoObject = $mixValue;
						$this->intIdElemento = $mixValue->IdElemento;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
						//	throw new QCallerException('Unable to set an unsaved IdPerfilObject for this ElementoHijo');

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
        




    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ElementoHijo"><sequence>';
			$strToReturn .= '<element name="IdElementoHijo" type="xsd:int"/>';
			$strToReturn .= '<element name="IdElementoObject" type="xsd1:Elemento"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="IdPerfilObject" type="xsd1:Perfil"/>';
			$strToReturn .= '<element name="Undato" type="xsd:string"/>';
			$strToReturn .= '<element name="Otrodato" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ElementoHijo', $strComplexTypeArray)) {
				$strComplexTypeArray['ElementoHijo'] = ElementoHijo::GetSoapComplexTypeXml();
				$strComplexTypeArray = Elemento::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = Perfil::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ElementoHijo::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ElementoHijo();
			if (property_exists($objSoapObject, 'IdElementoHijo')) {
				$objToReturn->intIdElementoHijo = $objSoapObject->IdElementoHijo;
            }
			if ((property_exists($objSoapObject, 'IdElementoObject')) &&
				($objSoapObject->IdElementoObject))
				$objToReturn->IdElementoObject = Elemento::GetObjectFromSoapObject($objSoapObject->IdElementoObject);
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
				array_push($objArrayToReturn, ElementoHijo::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdElementoObject)
				$objObject->objIdElementoObject = Elemento::GetSoapObjectFromObject($objObject->objIdElementoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdElemento = null;
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