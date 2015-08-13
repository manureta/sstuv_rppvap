<?php
/**
 * The abstract TransporteGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Transporte subclass which
 * extends this TransporteGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Transporte class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property integer $Colectivos the value for intColectivos 
	 * @property integer $Ferrocarril the value for intFerrocarril 
	 * @property integer $RemisCombis the value for intRemisCombis 
	 * @property CondicionesSocioUrbanisticas $IdFolioObject the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
	 * @property OpcionesTransporte $ColectivosObject the value for the OpcionesTransporte object referenced by intColectivos 
	 * @property OpcionesTransporte $FerrocarrilObject the value for the OpcionesTransporte object referenced by intFerrocarril 
	 * @property OpcionesTransporte $RemisCombisObject the value for the OpcionesTransporte object referenced by intRemisCombis 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class TransporteGen extends QBaseClass {

    public static function Noun() {
        return 'Transporte';
    }
    public static function NounPlural() {
        return 'Transportes';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column transporte.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'transporte_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column transporte.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column transporte.colectivos
     * @var integer intColectivos
     */
    protected $intColectivos;
    const ColectivosDefault = null;


    /**
     * Protected member variable that maps to the database column transporte.ferrocarril
     * @var integer intFerrocarril
     */
    protected $intFerrocarril;
    const FerrocarrilDefault = null;


    /**
     * Protected member variable that maps to the database column transporte.remis_combis
     * @var integer intRemisCombis
     */
    protected $intRemisCombis;
    const RemisCombisDefault = null;


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
		 * in the database column transporte.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this CondicionesSocioUrbanisticas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CondicionesSocioUrbanisticas objIdFolioObject
		 */
		protected $objIdFolioObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column transporte.colectivos.
		 *
		 * NOTE: Always use the ColectivosObject property getter to correctly retrieve this OpcionesTransporte object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesTransporte objColectivosObject
		 */
		protected $objColectivosObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column transporte.ferrocarril.
		 *
		 * NOTE: Always use the FerrocarrilObject property getter to correctly retrieve this OpcionesTransporte object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesTransporte objFerrocarrilObject
		 */
		protected $objFerrocarrilObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column transporte.remis_combis.
		 *
		 * NOTE: Always use the RemisCombisObject property getter to correctly retrieve this OpcionesTransporte object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesTransporte objRemisCombisObject
		 */
		protected $objRemisCombisObject;



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
                protected static $_objTransporteArray = array();


		/**
		 * Load a Transporte from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Transporte
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Transporte::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transporte()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objTransporteArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpTransporte = Transporte::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transporte()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objTransporteArray["$intId"] = $objTmpTransporte;
            }
                        }
                        return isset(self::$_objTransporteArray["$intId"])?self::$_objTransporteArray["$intId"]:null;
		}

		/**
		 * Load all Transportes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Transporte::QueryArray to perform the LoadAll query
			try {
				return Transporte::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Transportes
		 * @return int
		 */
		public static function CountAll() {
			// Call Transporte::QueryCount to perform the CountAll query
			return Transporte::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Transporte::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Transporte()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Transporte()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Transporte no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Transporte::GetDatabase();

			// Create/Build out the QueryBuilder object with Transporte-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'transporte');
			Transporte::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('transporte');

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
		 * Static Qcubed Query method to query for a single Transporte object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transporte the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Transporte object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Transporte::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Transporte::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Transporte objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transporte[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Transporte::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Transporte objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Transporte::GetDatabase();

			$strQuery = Transporte::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/transporte', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Transporte::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Transporte
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'transporte';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'colectivos', $strAliasPrefix . 'colectivos');
			$objBuilder->AddSelectItem($strTableName, 'ferrocarril', $strAliasPrefix . 'ferrocarril');
			$objBuilder->AddSelectItem($strTableName, 'remis_combis', $strAliasPrefix . 'remis_combis');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Transporte from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Transporte::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Transporte
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Transporte object
			$objToReturn = new Transporte();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'colectivos', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'colectivos'] : $strAliasPrefix . 'colectivos';
			$objToReturn->intColectivos = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'ferrocarril', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ferrocarril'] : $strAliasPrefix . 'ferrocarril';
			$objToReturn->intFerrocarril = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'remis_combis', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'remis_combis'] : $strAliasPrefix . 'remis_combis';
			$objToReturn->intRemisCombis = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
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
				$strAliasPrefix = 'transporte__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ColectivosObject Early Binding
			$strAlias = $strAliasPrefix . 'colectivos__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objColectivosObject = OpcionesTransporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'colectivos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FerrocarrilObject Early Binding
			$strAlias = $strAliasPrefix . 'ferrocarril__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFerrocarrilObject = OpcionesTransporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ferrocarril__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for RemisCombisObject Early Binding
			$strAlias = $strAliasPrefix . 'remis_combis__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRemisCombisObject = OpcionesTransporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'remis_combis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Transportes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Transporte[]
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
					$objItem = Transporte::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Transporte::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Transporte object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Transporte::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transporte()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transporte objects,
		 * by Colectivos Index(es)
		 * @param integer $intColectivos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/
		public static function LoadArrayByColectivos($intColectivos, $objOptionalClauses = null) {
			// Call Transporte::QueryArray to perform the LoadArrayByColectivos query
			try {
				return Transporte::QueryArray(
					QQ::Equal(QQN::Transporte()->Colectivos, $intColectivos),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transportes
		 * by Colectivos Index(es)
		 * @param integer $intColectivos
		 * @return int
		*/
		public static function CountByColectivos($intColectivos) {
			// Call Transporte::QueryCount to perform the CountByColectivos query
			return Transporte::QueryCount(
				QQ::Equal(QQN::Transporte()->Colectivos, $intColectivos)
			);
		}
			
		/**
		 * Load an array of Transporte objects,
		 * by Ferrocarril Index(es)
		 * @param integer $intFerrocarril
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/
		public static function LoadArrayByFerrocarril($intFerrocarril, $objOptionalClauses = null) {
			// Call Transporte::QueryArray to perform the LoadArrayByFerrocarril query
			try {
				return Transporte::QueryArray(
					QQ::Equal(QQN::Transporte()->Ferrocarril, $intFerrocarril),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transportes
		 * by Ferrocarril Index(es)
		 * @param integer $intFerrocarril
		 * @return int
		*/
		public static function CountByFerrocarril($intFerrocarril) {
			// Call Transporte::QueryCount to perform the CountByFerrocarril query
			return Transporte::QueryCount(
				QQ::Equal(QQN::Transporte()->Ferrocarril, $intFerrocarril)
			);
		}
			
		/**
		 * Load an array of Transporte objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call Transporte::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return Transporte::QueryArray(
					QQ::Equal(QQN::Transporte()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transportes
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call Transporte::QueryCount to perform the CountByIdFolio query
			return Transporte::QueryCount(
				QQ::Equal(QQN::Transporte()->IdFolio, $intIdFolio)
			);
		}
			
		/**
		 * Load an array of Transporte objects,
		 * by RemisCombis Index(es)
		 * @param integer $intRemisCombis
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/
		public static function LoadArrayByRemisCombis($intRemisCombis, $objOptionalClauses = null) {
			// Call Transporte::QueryArray to perform the LoadArrayByRemisCombis query
			try {
				return Transporte::QueryArray(
					QQ::Equal(QQN::Transporte()->RemisCombis, $intRemisCombis),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transportes
		 * by RemisCombis Index(es)
		 * @param integer $intRemisCombis
		 * @return int
		*/
		public static function CountByRemisCombis($intRemisCombis) {
			// Call Transporte::QueryCount to perform the CountByRemisCombis query
			return Transporte::QueryCount(
				QQ::Equal(QQN::Transporte()->RemisCombis, $intRemisCombis)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Transporte
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Transporte::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.
            // ver si objIdFolioObject esta Guardado
            if(is_null($this->intIdFolio)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdFolioObject))
                try{
                    if(!is_null($this->IdFolioObject->IdFolio))
                        $this->intIdFolio = $this->IdFolioObject->IdFolio;
                    else
                        $this->intIdFolio = $this->IdFolioObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objColectivosObject esta Guardado
            if(is_null($this->intColectivos)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->ColectivosObject))
                try{
                    if(!is_null($this->ColectivosObject->Colectivos))
                        $this->intColectivos = $this->ColectivosObject->Colectivos;
                    else
                        $this->intColectivos = $this->ColectivosObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objFerrocarrilObject esta Guardado
            if(is_null($this->intFerrocarril)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->FerrocarrilObject))
                try{
                    if(!is_null($this->FerrocarrilObject->Ferrocarril))
                        $this->intFerrocarril = $this->FerrocarrilObject->Ferrocarril;
                    else
                        $this->intFerrocarril = $this->FerrocarrilObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objRemisCombisObject esta Guardado
            if(is_null($this->intRemisCombis)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->RemisCombisObject))
                try{
                    if(!is_null($this->RemisCombisObject->RemisCombis))
                        $this->intRemisCombis = $this->RemisCombisObject->RemisCombis;
                    else
                        $this->intRemisCombis = $this->RemisCombisObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }

                    if ($this->intId && ($this->intId > QDatabaseNumberFieldMax::Integer || $this->intId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intId', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdFolio && ($this->intIdFolio > QDatabaseNumberFieldMax::Integer || $this->intIdFolio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdFolio', QDatabaseFieldType::Integer);
                    }
                    if ($this->intColectivos && ($this->intColectivos > QDatabaseNumberFieldMax::Integer || $this->intColectivos < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intColectivos', QDatabaseFieldType::Integer);
                    }
                    if ($this->intFerrocarril && ($this->intFerrocarril > QDatabaseNumberFieldMax::Integer || $this->intFerrocarril < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intFerrocarril', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRemisCombis && ($this->intRemisCombis > QDatabaseNumberFieldMax::Integer || $this->intRemisCombis < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRemisCombis', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "transporte" (
                            "id_folio",
                            "colectivos",
                            "ferrocarril",
                            "remis_combis"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->intColectivos) . ',
                            ' . $objDatabase->SqlVariable($this->intFerrocarril) . ',
                            ' . $objDatabase->SqlVariable($this->intRemisCombis) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('transporte', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "transporte"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "colectivos" = ' . $objDatabase->SqlVariable($this->intColectivos) . ',
                            "ferrocarril" = ' . $objDatabase->SqlVariable($this->intFerrocarril) . ',
                            "remis_combis" = ' . $objDatabase->SqlVariable($this->intRemisCombis) . '
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
		 * Delete this Transporte
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Transporte with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Transporte::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Transportes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Transporte::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"');
		}

		/**
		 * Truncate transporte table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Transporte::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "transporte" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Transporte from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Transporte object.');

			// Reload the Object
			$objReloaded = Transporte::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->Colectivos = $objReloaded->Colectivos;
			$this->Ferrocarril = $objReloaded->Ferrocarril;
			$this->RemisCombis = $objReloaded->RemisCombis;
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

            case 'IdFolio':
                /**
                 * Gets the value for intIdFolio 
                 * @return integer
                 */
                return $this->intIdFolio;

            case 'Colectivos':
                /**
                 * Gets the value for intColectivos 
                 * @return integer
                 */
                return $this->intColectivos;

            case 'Ferrocarril':
                /**
                 * Gets the value for intFerrocarril 
                 * @return integer
                 */
                return $this->intFerrocarril;

            case 'RemisCombis':
                /**
                 * Gets the value for intRemisCombis 
                 * @return integer
                 */
                return $this->intRemisCombis;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
                 * @return CondicionesSocioUrbanisticas
                 */
                try {
                    if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                        $this->objIdFolioObject = CondicionesSocioUrbanisticas::Load($this->intIdFolio);
                    return $this->objIdFolioObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'ColectivosObject':
                /**
                 * Gets the value for the OpcionesTransporte object referenced by intColectivos 
                 * @return OpcionesTransporte
                 */
                try {
                    if ((!$this->objColectivosObject) && (!is_null($this->intColectivos)))
                        $this->objColectivosObject = OpcionesTransporte::Load($this->intColectivos);
                    return $this->objColectivosObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'FerrocarrilObject':
                /**
                 * Gets the value for the OpcionesTransporte object referenced by intFerrocarril 
                 * @return OpcionesTransporte
                 */
                try {
                    if ((!$this->objFerrocarrilObject) && (!is_null($this->intFerrocarril)))
                        $this->objFerrocarrilObject = OpcionesTransporte::Load($this->intFerrocarril);
                    return $this->objFerrocarrilObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'RemisCombisObject':
                /**
                 * Gets the value for the OpcionesTransporte object referenced by intRemisCombis 
                 * @return OpcionesTransporte
                 */
                try {
                    if ((!$this->objRemisCombisObject) && (!is_null($this->intRemisCombis)))
                        $this->objRemisCombisObject = OpcionesTransporte::Load($this->intRemisCombis);
                    return $this->objRemisCombisObject;
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
				case 'IdFolio':
					/**
					 * Sets the value for intIdFolio 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdFolioObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdFolio = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdFolio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Colectivos':
					/**
					 * Sets the value for intColectivos 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objColectivosObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intColectivos = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intColectivos = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ferrocarril':
					/**
					 * Sets the value for intFerrocarril 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFerrocarrilObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intFerrocarril = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intFerrocarril = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RemisCombis':
					/**
					 * Sets the value for intRemisCombis 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRemisCombisObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRemisCombis = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRemisCombis = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
					 * @param CondicionesSocioUrbanisticas $mixValue
					 * @return CondicionesSocioUrbanisticas
					 */
					if (is_null($mixValue)) {
						$this->intIdFolio = null;
						$this->objIdFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CondicionesSocioUrbanisticas object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'CondicionesSocioUrbanisticas');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED CondicionesSocioUrbanisticas object
						//if (is_null($mixValue->IdFolio))
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Transporte');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->IdFolio;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ColectivosObject':
					/**
					 * Sets the value for the OpcionesTransporte object referenced by intColectivos 
					 * @param OpcionesTransporte $mixValue
					 * @return OpcionesTransporte
					 */
					if (is_null($mixValue)) {
						$this->intColectivos = null;
						$this->objColectivosObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesTransporte object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesTransporte');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesTransporte object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved ColectivosObject for this Transporte');

						// Update Local Member Variables
						$this->objColectivosObject = $mixValue;
						$this->intColectivos = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FerrocarrilObject':
					/**
					 * Sets the value for the OpcionesTransporte object referenced by intFerrocarril 
					 * @param OpcionesTransporte $mixValue
					 * @return OpcionesTransporte
					 */
					if (is_null($mixValue)) {
						$this->intFerrocarril = null;
						$this->objFerrocarrilObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesTransporte object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesTransporte');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesTransporte object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved FerrocarrilObject for this Transporte');

						// Update Local Member Variables
						$this->objFerrocarrilObject = $mixValue;
						$this->intFerrocarril = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RemisCombisObject':
					/**
					 * Sets the value for the OpcionesTransporte object referenced by intRemisCombis 
					 * @param OpcionesTransporte $mixValue
					 * @return OpcionesTransporte
					 */
					if (is_null($mixValue)) {
						$this->intRemisCombis = null;
						$this->objRemisCombisObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesTransporte object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesTransporte');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesTransporte object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved RemisCombisObject for this Transporte');

						// Update Local Member Variables
						$this->objRemisCombisObject = $mixValue;
						$this->intRemisCombis = $mixValue->Id;

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
			$strToReturn = '<complexType name="Transporte"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:CondicionesSocioUrbanisticas"/>';
			$strToReturn .= '<element name="ColectivosObject" type="xsd1:OpcionesTransporte"/>';
			$strToReturn .= '<element name="FerrocarrilObject" type="xsd1:OpcionesTransporte"/>';
			$strToReturn .= '<element name="RemisCombisObject" type="xsd1:OpcionesTransporte"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Transporte', $strComplexTypeArray)) {
				$strComplexTypeArray['Transporte'] = Transporte::GetSoapComplexTypeXml();
				$strComplexTypeArray = CondicionesSocioUrbanisticas::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesTransporte::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesTransporte::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesTransporte::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Transporte::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Transporte();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = CondicionesSocioUrbanisticas::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if ((property_exists($objSoapObject, 'ColectivosObject')) &&
				($objSoapObject->ColectivosObject))
				$objToReturn->ColectivosObject = OpcionesTransporte::GetObjectFromSoapObject($objSoapObject->ColectivosObject);
			if ((property_exists($objSoapObject, 'FerrocarrilObject')) &&
				($objSoapObject->FerrocarrilObject))
				$objToReturn->FerrocarrilObject = OpcionesTransporte::GetObjectFromSoapObject($objSoapObject->FerrocarrilObject);
			if ((property_exists($objSoapObject, 'RemisCombisObject')) &&
				($objSoapObject->RemisCombisObject))
				$objToReturn->RemisCombisObject = OpcionesTransporte::GetObjectFromSoapObject($objSoapObject->RemisCombisObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Transporte::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = CondicionesSocioUrbanisticas::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->objColectivosObject)
				$objObject->objColectivosObject = OpcionesTransporte::GetSoapObjectFromObject($objObject->objColectivosObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intColectivos = null;
			if ($objObject->objFerrocarrilObject)
				$objObject->objFerrocarrilObject = OpcionesTransporte::GetSoapObjectFromObject($objObject->objFerrocarrilObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFerrocarril = null;
			if ($objObject->objRemisCombisObject)
				$objObject->objRemisCombisObject = OpcionesTransporte::GetSoapObjectFromObject($objObject->objRemisCombisObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRemisCombis = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>