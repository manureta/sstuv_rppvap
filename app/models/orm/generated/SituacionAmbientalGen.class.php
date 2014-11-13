<?php
/**
 * The abstract SituacionAmbientalGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the SituacionAmbiental subclass which
 * extends this SituacionAmbientalGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the SituacionAmbiental class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property boolean $SinProblemas the value for blnSinProblemas 
	 * @property boolean $ReservaElectroducto the value for blnReservaElectroducto 
	 * @property boolean $Inundable the value for blnInundable 
	 * @property boolean $SobreTerraplenFerroviario the value for blnSobreTerraplenFerroviario 
	 * @property boolean $SobreCaminoSirga the value for blnSobreCaminoSirga 
	 * @property boolean $ExpuestoContaminacionIndustrial the value for blnExpuestoContaminacionIndustrial 
	 * @property boolean $SobreSueloDegradado the value for blnSobreSueloDegradado 
	 * @property string $Otro the value for strOtro 
	 * @property CondicionesSocioUrbanisticas $IdFolioObject the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class SituacionAmbientalGen extends QBaseClass {

    public static function Noun() {
        return 'SituacionAmbiental';
    }
    public static function NounPlural() {
        return 'SituacionAmbientales';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column situacion_ambiental.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'situacion_ambiental_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column situacion_ambiental.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.sin_problemas
     * @var boolean blnSinProblemas
     */
    protected $blnSinProblemas;
    const SinProblemasDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.reserva_electroducto
     * @var boolean blnReservaElectroducto
     */
    protected $blnReservaElectroducto;
    const ReservaElectroductoDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.inundable
     * @var boolean blnInundable
     */
    protected $blnInundable;
    const InundableDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.sobre_terraplen_ferroviario
     * @var boolean blnSobreTerraplenFerroviario
     */
    protected $blnSobreTerraplenFerroviario;
    const SobreTerraplenFerroviarioDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.sobre_camino_sirga
     * @var boolean blnSobreCaminoSirga
     */
    protected $blnSobreCaminoSirga;
    const SobreCaminoSirgaDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.expuesto_contaminacion_industrial
     * @var boolean blnExpuestoContaminacionIndustrial
     */
    protected $blnExpuestoContaminacionIndustrial;
    const ExpuestoContaminacionIndustrialDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.sobre_suelo_degradado
     * @var boolean blnSobreSueloDegradado
     */
    protected $blnSobreSueloDegradado;
    const SobreSueloDegradadoDefault = null;


    /**
     * Protected member variable that maps to the database column situacion_ambiental.otro
     * @var string strOtro
     */
    protected $strOtro;
    const OtroMaxLength = 45;
    const OtroDefault = null;


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
		 * in the database column situacion_ambiental.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this CondicionesSocioUrbanisticas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CondicionesSocioUrbanisticas objIdFolioObject
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
                protected static $_objSituacionAmbientalArray = array();


		/**
		 * Load a SituacionAmbiental from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return SituacionAmbiental
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  SituacionAmbiental::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SituacionAmbiental()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objSituacionAmbientalArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpSituacionAmbiental = SituacionAmbiental::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SituacionAmbiental()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objSituacionAmbientalArray["$intId"] = $objTmpSituacionAmbiental;
            }
                        }
                        return isset(self::$_objSituacionAmbientalArray["$intId"])?self::$_objSituacionAmbientalArray["$intId"]:null;
		}

		/**
		 * Load all SituacionAmbientales
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SituacionAmbiental[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SituacionAmbiental::QueryArray to perform the LoadAll query
			try {
				return SituacionAmbiental::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SituacionAmbientales
		 * @return int
		 */
		public static function CountAll() {
			// Call SituacionAmbiental::QueryCount to perform the CountAll query
			return SituacionAmbiental::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (SituacionAmbiental::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::SituacionAmbiental()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::SituacionAmbiental()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase SituacionAmbiental no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = SituacionAmbiental::GetDatabase();

			// Create/Build out the QueryBuilder object with SituacionAmbiental-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'situacion_ambiental');
			SituacionAmbiental::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('situacion_ambiental');

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
		 * Static Qcubed Query method to query for a single SituacionAmbiental object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SituacionAmbiental the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SituacionAmbiental::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new SituacionAmbiental object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SituacionAmbiental::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = SituacionAmbiental::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of SituacionAmbiental objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SituacionAmbiental[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SituacionAmbiental::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SituacionAmbiental::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of SituacionAmbiental objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SituacionAmbiental::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SituacionAmbiental::GetDatabase();

			$strQuery = SituacionAmbiental::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/situacionambiental', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SituacionAmbiental::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SituacionAmbiental
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'situacion_ambiental';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'sin_problemas', $strAliasPrefix . 'sin_problemas');
			$objBuilder->AddSelectItem($strTableName, 'reserva_electroducto', $strAliasPrefix . 'reserva_electroducto');
			$objBuilder->AddSelectItem($strTableName, 'inundable', $strAliasPrefix . 'inundable');
			$objBuilder->AddSelectItem($strTableName, 'sobre_terraplen_ferroviario', $strAliasPrefix . 'sobre_terraplen_ferroviario');
			$objBuilder->AddSelectItem($strTableName, 'sobre_camino_sirga', $strAliasPrefix . 'sobre_camino_sirga');
			$objBuilder->AddSelectItem($strTableName, 'expuesto_contaminacion_industrial', $strAliasPrefix . 'expuesto_contaminacion_industrial');
			$objBuilder->AddSelectItem($strTableName, 'sobre_suelo_degradado', $strAliasPrefix . 'sobre_suelo_degradado');
			$objBuilder->AddSelectItem($strTableName, 'otro', $strAliasPrefix . 'otro');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SituacionAmbiental from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SituacionAmbiental::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SituacionAmbiental
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the SituacionAmbiental object
			$objToReturn = new SituacionAmbiental();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'sin_problemas', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sin_problemas'] : $strAliasPrefix . 'sin_problemas';
			$objToReturn->blnSinProblemas = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'reserva_electroducto', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'reserva_electroducto'] : $strAliasPrefix . 'reserva_electroducto';
			$objToReturn->blnReservaElectroducto = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'inundable', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inundable'] : $strAliasPrefix . 'inundable';
			$objToReturn->blnInundable = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'sobre_terraplen_ferroviario', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sobre_terraplen_ferroviario'] : $strAliasPrefix . 'sobre_terraplen_ferroviario';
			$objToReturn->blnSobreTerraplenFerroviario = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'sobre_camino_sirga', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sobre_camino_sirga'] : $strAliasPrefix . 'sobre_camino_sirga';
			$objToReturn->blnSobreCaminoSirga = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'expuesto_contaminacion_industrial', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'expuesto_contaminacion_industrial'] : $strAliasPrefix . 'expuesto_contaminacion_industrial';
			$objToReturn->blnExpuestoContaminacionIndustrial = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'sobre_suelo_degradado', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sobre_suelo_degradado'] : $strAliasPrefix . 'sobre_suelo_degradado';
			$objToReturn->blnSobreSueloDegradado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'otro', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'otro'] : $strAliasPrefix . 'otro';
			$objToReturn->strOtro = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'situacion_ambiental__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of SituacionAmbientales from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SituacionAmbiental[]
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
					$objItem = SituacionAmbiental::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SituacionAmbiental::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SituacionAmbiental object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SituacionAmbiental
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return SituacionAmbiental::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SituacionAmbiental()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SituacionAmbiental objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SituacionAmbiental[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call SituacionAmbiental::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return SituacionAmbiental::QueryArray(
					QQ::Equal(QQN::SituacionAmbiental()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SituacionAmbientales
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call SituacionAmbiental::QueryCount to perform the CountByIdFolio query
			return SituacionAmbiental::QueryCount(
				QQ::Equal(QQN::SituacionAmbiental()->IdFolio, $intIdFolio)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this SituacionAmbiental
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = SituacionAmbiental::GetDatabase();

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
                        INSERT INTO "situacion_ambiental" (
                            "id_folio",
                            "sin_problemas",
                            "reserva_electroducto",
                            "inundable",
                            "sobre_terraplen_ferroviario",
                            "sobre_camino_sirga",
                            "expuesto_contaminacion_industrial",
                            "sobre_suelo_degradado",
                            "otro"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnSinProblemas) . ',
                            ' . $objDatabase->SqlVariable($this->blnReservaElectroducto) . ',
                            ' . $objDatabase->SqlVariable($this->blnInundable) . ',
                            ' . $objDatabase->SqlVariable($this->blnSobreTerraplenFerroviario) . ',
                            ' . $objDatabase->SqlVariable($this->blnSobreCaminoSirga) . ',
                            ' . $objDatabase->SqlVariable($this->blnExpuestoContaminacionIndustrial) . ',
                            ' . $objDatabase->SqlVariable($this->blnSobreSueloDegradado) . ',
                            ' . $objDatabase->SqlVariable($this->strOtro) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('situacion_ambiental', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "situacion_ambiental"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "sin_problemas" = ' . $objDatabase->SqlVariable($this->blnSinProblemas) . ',
                            "reserva_electroducto" = ' . $objDatabase->SqlVariable($this->blnReservaElectroducto) . ',
                            "inundable" = ' . $objDatabase->SqlVariable($this->blnInundable) . ',
                            "sobre_terraplen_ferroviario" = ' . $objDatabase->SqlVariable($this->blnSobreTerraplenFerroviario) . ',
                            "sobre_camino_sirga" = ' . $objDatabase->SqlVariable($this->blnSobreCaminoSirga) . ',
                            "expuesto_contaminacion_industrial" = ' . $objDatabase->SqlVariable($this->blnExpuestoContaminacionIndustrial) . ',
                            "sobre_suelo_degradado" = ' . $objDatabase->SqlVariable($this->blnSobreSueloDegradado) . ',
                            "otro" = ' . $objDatabase->SqlVariable($this->strOtro) . '
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
		 * Delete this SituacionAmbiental
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SituacionAmbiental with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SituacionAmbiental::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"situacion_ambiental"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all SituacionAmbientales
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SituacionAmbiental::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"situacion_ambiental"');
		}

		/**
		 * Truncate situacion_ambiental table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = SituacionAmbiental::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "situacion_ambiental" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this SituacionAmbiental from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SituacionAmbiental object.');

			// Reload the Object
			$objReloaded = SituacionAmbiental::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->blnSinProblemas = $objReloaded->blnSinProblemas;
			$this->blnReservaElectroducto = $objReloaded->blnReservaElectroducto;
			$this->blnInundable = $objReloaded->blnInundable;
			$this->blnSobreTerraplenFerroviario = $objReloaded->blnSobreTerraplenFerroviario;
			$this->blnSobreCaminoSirga = $objReloaded->blnSobreCaminoSirga;
			$this->blnExpuestoContaminacionIndustrial = $objReloaded->blnExpuestoContaminacionIndustrial;
			$this->blnSobreSueloDegradado = $objReloaded->blnSobreSueloDegradado;
			$this->strOtro = $objReloaded->strOtro;
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

            case 'SinProblemas':
                /**
                 * Gets the value for blnSinProblemas 
                 * @return boolean
                 */
                return $this->blnSinProblemas;

            case 'ReservaElectroducto':
                /**
                 * Gets the value for blnReservaElectroducto 
                 * @return boolean
                 */
                return $this->blnReservaElectroducto;

            case 'Inundable':
                /**
                 * Gets the value for blnInundable 
                 * @return boolean
                 */
                return $this->blnInundable;

            case 'SobreTerraplenFerroviario':
                /**
                 * Gets the value for blnSobreTerraplenFerroviario 
                 * @return boolean
                 */
                return $this->blnSobreTerraplenFerroviario;

            case 'SobreCaminoSirga':
                /**
                 * Gets the value for blnSobreCaminoSirga 
                 * @return boolean
                 */
                return $this->blnSobreCaminoSirga;

            case 'ExpuestoContaminacionIndustrial':
                /**
                 * Gets the value for blnExpuestoContaminacionIndustrial 
                 * @return boolean
                 */
                return $this->blnExpuestoContaminacionIndustrial;

            case 'SobreSueloDegradado':
                /**
                 * Gets the value for blnSobreSueloDegradado 
                 * @return boolean
                 */
                return $this->blnSobreSueloDegradado;

            case 'Otro':
                /**
                 * Gets the value for strOtro 
                 * @return string
                 */
                return $this->strOtro;


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

				case 'SinProblemas':
					/**
					 * Sets the value for blnSinProblemas 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSinProblemas = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSinProblemas = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReservaElectroducto':
					/**
					 * Sets the value for blnReservaElectroducto 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnReservaElectroducto = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnReservaElectroducto = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Inundable':
					/**
					 * Sets the value for blnInundable 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnInundable = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnInundable = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SobreTerraplenFerroviario':
					/**
					 * Sets the value for blnSobreTerraplenFerroviario 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSobreTerraplenFerroviario = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSobreTerraplenFerroviario = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SobreCaminoSirga':
					/**
					 * Sets the value for blnSobreCaminoSirga 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSobreCaminoSirga = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSobreCaminoSirga = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ExpuestoContaminacionIndustrial':
					/**
					 * Sets the value for blnExpuestoContaminacionIndustrial 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnExpuestoContaminacionIndustrial = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnExpuestoContaminacionIndustrial = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SobreSueloDegradado':
					/**
					 * Sets the value for blnSobreSueloDegradado 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSobreSueloDegradado = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSobreSueloDegradado = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Otro':
					/**
					 * Sets the value for strOtro 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOtro = QType::Cast($mixValue, QType::String));
                                                return ($this->strOtro = $mixValue);
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this SituacionAmbiental');

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
			$strToReturn = '<complexType name="SituacionAmbiental"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:CondicionesSocioUrbanisticas"/>';
			$strToReturn .= '<element name="SinProblemas" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ReservaElectroducto" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Inundable" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SobreTerraplenFerroviario" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SobreCaminoSirga" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ExpuestoContaminacionIndustrial" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SobreSueloDegradado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Otro" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SituacionAmbiental', $strComplexTypeArray)) {
				$strComplexTypeArray['SituacionAmbiental'] = SituacionAmbiental::GetSoapComplexTypeXml();
				$strComplexTypeArray = CondicionesSocioUrbanisticas::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SituacionAmbiental::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SituacionAmbiental();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = CondicionesSocioUrbanisticas::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'SinProblemas')) {
				$objToReturn->blnSinProblemas = $objSoapObject->SinProblemas;
            }
			if (property_exists($objSoapObject, 'ReservaElectroducto')) {
				$objToReturn->blnReservaElectroducto = $objSoapObject->ReservaElectroducto;
            }
			if (property_exists($objSoapObject, 'Inundable')) {
				$objToReturn->blnInundable = $objSoapObject->Inundable;
            }
			if (property_exists($objSoapObject, 'SobreTerraplenFerroviario')) {
				$objToReturn->blnSobreTerraplenFerroviario = $objSoapObject->SobreTerraplenFerroviario;
            }
			if (property_exists($objSoapObject, 'SobreCaminoSirga')) {
				$objToReturn->blnSobreCaminoSirga = $objSoapObject->SobreCaminoSirga;
            }
			if (property_exists($objSoapObject, 'ExpuestoContaminacionIndustrial')) {
				$objToReturn->blnExpuestoContaminacionIndustrial = $objSoapObject->ExpuestoContaminacionIndustrial;
            }
			if (property_exists($objSoapObject, 'SobreSueloDegradado')) {
				$objToReturn->blnSobreSueloDegradado = $objSoapObject->SobreSueloDegradado;
            }
			if (property_exists($objSoapObject, 'Otro')) {
				$objToReturn->strOtro = $objSoapObject->Otro;
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
				array_push($objArrayToReturn, SituacionAmbiental::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = CondicionesSocioUrbanisticas::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>