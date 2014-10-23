<?php
/**
 * The abstract OrganismosDeIntervencionGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the OrganismosDeIntervencion subclass which
 * extends this OrganismosDeIntervencionGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the OrganismosDeIntervencion class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property boolean $Nacional the value for blnNacional 
	 * @property boolean $Provincial the value for blnProvincial 
	 * @property boolean $Municipal the value for blnMunicipal 
	 * @property QDateTime $FechaIntervencion the value for dttFechaIntervencion 
	 * @property string $Programas the value for strProgramas 
	 * @property string $Observaciones the value for strObservaciones 
	 * @property Antecedentes $IdFolioObject the value for the Antecedentes object referenced by intIdFolio 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class OrganismosDeIntervencionGen extends QBaseClass {

    public static function Noun() {
        return 'OrganismosDeIntervencion';
    }
    public static function NounPlural() {
        return 'OrganismosDeIntervenciones';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column organismos_de_intervencion.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'organismos_de_intervencion_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.nacional
     * @var boolean blnNacional
     */
    protected $blnNacional;
    const NacionalDefault = null;


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.provincial
     * @var boolean blnProvincial
     */
    protected $blnProvincial;
    const ProvincialDefault = null;


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.municipal
     * @var boolean blnMunicipal
     */
    protected $blnMunicipal;
    const MunicipalDefault = null;


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.fecha_intervencion
     * @var QDateTime dttFechaIntervencion
     */
    protected $dttFechaIntervencion;
    const FechaIntervencionDefault = null;


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.programas
     * @var string strProgramas
     */
    protected $strProgramas;
    const ProgramasDefault = null;


    /**
     * Protected member variable that maps to the database column organismos_de_intervencion.observaciones
     * @var string strObservaciones
     */
    protected $strObservaciones;
    const ObservacionesMaxLength = 45;
    const ObservacionesDefault = null;


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
		 * in the database column organismos_de_intervencion.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this Antecedentes object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Antecedentes objIdFolioObject
		 */
		protected $objIdFolioObject;



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
                protected static $_objOrganismosDeIntervencionArray = array();


		/**
		 * Load a OrganismosDeIntervencion from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return OrganismosDeIntervencion
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  OrganismosDeIntervencion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OrganismosDeIntervencion()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objOrganismosDeIntervencionArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpOrganismosDeIntervencion = OrganismosDeIntervencion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OrganismosDeIntervencion()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objOrganismosDeIntervencionArray["$intId"] = $objTmpOrganismosDeIntervencion;
            }
                        }
                        return isset(self::$_objOrganismosDeIntervencionArray["$intId"])?self::$_objOrganismosDeIntervencionArray["$intId"]:null;
		}

		/**
		 * Load all OrganismosDeIntervenciones
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrganismosDeIntervencion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OrganismosDeIntervencion::QueryArray to perform the LoadAll query
			try {
				return OrganismosDeIntervencion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OrganismosDeIntervenciones
		 * @return int
		 */
		public static function CountAll() {
			// Call OrganismosDeIntervencion::QueryCount to perform the CountAll query
			return OrganismosDeIntervencion::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (OrganismosDeIntervencion::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::OrganismosDeIntervencion()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::OrganismosDeIntervencion()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase OrganismosDeIntervencion no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = OrganismosDeIntervencion::GetDatabase();

			// Create/Build out the QueryBuilder object with OrganismosDeIntervencion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'organismos_de_intervencion');
			OrganismosDeIntervencion::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('organismos_de_intervencion');

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
		 * Static Qcubed Query method to query for a single OrganismosDeIntervencion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OrganismosDeIntervencion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OrganismosDeIntervencion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new OrganismosDeIntervencion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of OrganismosDeIntervencion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OrganismosDeIntervencion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OrganismosDeIntervencion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OrganismosDeIntervencion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of OrganismosDeIntervencion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OrganismosDeIntervencion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OrganismosDeIntervencion::GetDatabase();

			$strQuery = OrganismosDeIntervencion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/organismosdeintervencion', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OrganismosDeIntervencion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OrganismosDeIntervencion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'organismos_de_intervencion';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'nacional', $strAliasPrefix . 'nacional');
			$objBuilder->AddSelectItem($strTableName, 'provincial', $strAliasPrefix . 'provincial');
			$objBuilder->AddSelectItem($strTableName, 'municipal', $strAliasPrefix . 'municipal');
			$objBuilder->AddSelectItem($strTableName, 'fecha_intervencion', $strAliasPrefix . 'fecha_intervencion');
			$objBuilder->AddSelectItem($strTableName, 'programas', $strAliasPrefix . 'programas');
			$objBuilder->AddSelectItem($strTableName, 'observaciones', $strAliasPrefix . 'observaciones');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a OrganismosDeIntervencion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OrganismosDeIntervencion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return OrganismosDeIntervencion
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the OrganismosDeIntervencion object
			$objToReturn = new OrganismosDeIntervencion();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'nacional', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nacional'] : $strAliasPrefix . 'nacional';
			$objToReturn->blnNacional = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'provincial', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'provincial'] : $strAliasPrefix . 'provincial';
			$objToReturn->blnProvincial = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'municipal', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'municipal'] : $strAliasPrefix . 'municipal';
			$objToReturn->blnMunicipal = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_intervencion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_intervencion'] : $strAliasPrefix . 'fecha_intervencion';
			$objToReturn->dttFechaIntervencion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'programas', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'programas'] : $strAliasPrefix . 'programas';
			$objToReturn->strProgramas = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'observaciones', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'observaciones'] : $strAliasPrefix . 'observaciones';
			$objToReturn->strObservaciones = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'organismos_de_intervencion__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Antecedentes::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of OrganismosDeIntervenciones from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return OrganismosDeIntervencion[]
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
					$objItem = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single OrganismosDeIntervencion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrganismosDeIntervencion
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return OrganismosDeIntervencion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OrganismosDeIntervencion()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of OrganismosDeIntervencion objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrganismosDeIntervencion[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call OrganismosDeIntervencion::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return OrganismosDeIntervencion::QueryArray(
					QQ::Equal(QQN::OrganismosDeIntervencion()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OrganismosDeIntervenciones
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call OrganismosDeIntervencion::QueryCount to perform the CountByIdFolio query
			return OrganismosDeIntervencion::QueryCount(
				QQ::Equal(QQN::OrganismosDeIntervencion()->IdFolio, $intIdFolio)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this OrganismosDeIntervencion
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = OrganismosDeIntervencion::GetDatabase();

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

                    if ($this->intId && ($this->intId > QDatabaseNumberFieldMax::Integer || $this->intId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intId', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdFolio && ($this->intIdFolio > QDatabaseNumberFieldMax::Integer || $this->intIdFolio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdFolio', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "organismos_de_intervencion" (
                            "id_folio",
                            "nacional",
                            "provincial",
                            "municipal",
                            "fecha_intervencion",
                            "programas",
                            "observaciones"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnNacional) . ',
                            ' . $objDatabase->SqlVariable($this->blnProvincial) . ',
                            ' . $objDatabase->SqlVariable($this->blnMunicipal) . ',
                            ' . $objDatabase->SqlVariable($this->dttFechaIntervencion) . ',
                            ' . $objDatabase->SqlVariable($this->strProgramas) . ',
                            ' . $objDatabase->SqlVariable($this->strObservaciones) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('organismos_de_intervencion', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "organismos_de_intervencion"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "nacional" = ' . $objDatabase->SqlVariable($this->blnNacional) . ',
                            "provincial" = ' . $objDatabase->SqlVariable($this->blnProvincial) . ',
                            "municipal" = ' . $objDatabase->SqlVariable($this->blnMunicipal) . ',
                            "fecha_intervencion" = ' . $objDatabase->SqlVariable($this->dttFechaIntervencion) . ',
                            "programas" = ' . $objDatabase->SqlVariable($this->strProgramas) . ',
                            "observaciones" = ' . $objDatabase->SqlVariable($this->strObservaciones) . '
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
		 * Delete this OrganismosDeIntervencion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OrganismosDeIntervencion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OrganismosDeIntervencion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"organismos_de_intervencion"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all OrganismosDeIntervenciones
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OrganismosDeIntervencion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"organismos_de_intervencion"');
		}

		/**
		 * Truncate organismos_de_intervencion table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = OrganismosDeIntervencion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "organismos_de_intervencion" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this OrganismosDeIntervencion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OrganismosDeIntervencion object.');

			// Reload the Object
			$objReloaded = OrganismosDeIntervencion::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->blnNacional = $objReloaded->blnNacional;
			$this->blnProvincial = $objReloaded->blnProvincial;
			$this->blnMunicipal = $objReloaded->blnMunicipal;
			$this->dttFechaIntervencion = $objReloaded->dttFechaIntervencion;
			$this->strProgramas = $objReloaded->strProgramas;
			$this->strObservaciones = $objReloaded->strObservaciones;
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

            case 'Nacional':
                /**
                 * Gets the value for blnNacional 
                 * @return boolean
                 */
                return $this->blnNacional;

            case 'Provincial':
                /**
                 * Gets the value for blnProvincial 
                 * @return boolean
                 */
                return $this->blnProvincial;

            case 'Municipal':
                /**
                 * Gets the value for blnMunicipal 
                 * @return boolean
                 */
                return $this->blnMunicipal;

            case 'FechaIntervencion':
                /**
                 * Gets the value for dttFechaIntervencion 
                 * @return QDateTime
                 */
                return $this->dttFechaIntervencion;

            case 'Programas':
                /**
                 * Gets the value for strProgramas 
                 * @return string
                 */
                return $this->strProgramas;

            case 'Observaciones':
                /**
                 * Gets the value for strObservaciones 
                 * @return string
                 */
                return $this->strObservaciones;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Antecedentes object referenced by intIdFolio 
                 * @return Antecedentes
                 */
                try {
                    if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                        $this->objIdFolioObject = Antecedentes::Load($this->intIdFolio);
                    return $this->objIdFolioObject;
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

				case 'Nacional':
					/**
					 * Sets the value for blnNacional 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnNacional = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnNacional = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Provincial':
					/**
					 * Sets the value for blnProvincial 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnProvincial = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnProvincial = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Municipal':
					/**
					 * Sets the value for blnMunicipal 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnMunicipal = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnMunicipal = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaIntervencion':
					/**
					 * Sets the value for dttFechaIntervencion 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttFechaIntervencion = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttFechaIntervencion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Programas':
					/**
					 * Sets the value for strProgramas 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strProgramas = QType::Cast($mixValue, QType::String));
                                                return ($this->strProgramas = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observaciones':
					/**
					 * Sets the value for strObservaciones 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strObservaciones = QType::Cast($mixValue, QType::String));
                                                return ($this->strObservaciones = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Antecedentes object referenced by intIdFolio 
					 * @param Antecedentes $mixValue
					 * @return Antecedentes
					 */
					if (is_null($mixValue)) {
						$this->intIdFolio = null;
						$this->objIdFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Antecedentes object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Antecedentes');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Antecedentes object
						//if (is_null($mixValue->IdFolio))
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this OrganismosDeIntervencion');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->IdFolio;

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
			$strToReturn = '<complexType name="OrganismosDeIntervencion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Antecedentes"/>';
			$strToReturn .= '<element name="Nacional" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Provincial" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Municipal" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FechaIntervencion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Programas" type="xsd:string"/>';
			$strToReturn .= '<element name="Observaciones" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OrganismosDeIntervencion', $strComplexTypeArray)) {
				$strComplexTypeArray['OrganismosDeIntervencion'] = OrganismosDeIntervencion::GetSoapComplexTypeXml();
				$strComplexTypeArray = Antecedentes::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OrganismosDeIntervencion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OrganismosDeIntervencion();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Antecedentes::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'Nacional')) {
				$objToReturn->blnNacional = $objSoapObject->Nacional;
            }
			if (property_exists($objSoapObject, 'Provincial')) {
				$objToReturn->blnProvincial = $objSoapObject->Provincial;
            }
			if (property_exists($objSoapObject, 'Municipal')) {
				$objToReturn->blnMunicipal = $objSoapObject->Municipal;
            }
			if (property_exists($objSoapObject, 'FechaIntervencion')) {
				$objToReturn->dttFechaIntervencion = new QDateTime($objSoapObject->FechaIntervencion);
            }
			if (property_exists($objSoapObject, 'Programas')) {
				$objToReturn->strProgramas = $objSoapObject->Programas;
            }
			if (property_exists($objSoapObject, 'Observaciones')) {
				$objToReturn->strObservaciones = $objSoapObject->Observaciones;
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
				array_push($objArrayToReturn, OrganismosDeIntervencion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = Antecedentes::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->dttFechaIntervencion)
				$objObject->dttFechaIntervencion = $objObject->dttFechaIntervencion->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>