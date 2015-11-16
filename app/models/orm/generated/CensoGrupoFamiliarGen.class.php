<?php
/**
 * The abstract CensoGrupoFamiliarGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the CensoGrupoFamiliar subclass which
 * extends this CensoGrupoFamiliarGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the CensoGrupoFamiliar class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $CensoGrupoFamiliarId the value for intCensoGrupoFamiliarId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio (Not Null)
	 * @property QDateTime $FechaAlta the value for dttFechaAlta 
	 * @property string $Circ the value for strCirc 
	 * @property string $Secc the value for strSecc 
	 * @property string $Mz the value for strMz 
	 * @property string $Pc the value for strPc 
	 * @property string $Telefono the value for strTelefono 
	 * @property boolean $DeclaracionNoOcupacion the value for blnDeclaracionNoOcupacion 
	 * @property string $TipoDocAdj the value for strTipoDocAdj 
	 * @property string $TipoBeneficio the value for strTipoBeneficio 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (Not Null)
	 * @property-read CensoPersona $CensoPersona the value for the private _objCensoPersona (Read-Only) if set due to an expansion on the censo_persona.censo_grupo_familiar_id reverse relationship
	 * @property-read CensoPersona[] $CensoPersonaArray the value for the private _objCensoPersonaArray (Read-Only) if set due to an ExpandAsArray on the censo_persona.censo_grupo_familiar_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class CensoGrupoFamiliarGen extends QBaseClass {

    public static function Noun() {
        return 'CensoGrupoFamiliar';
    }
    public static function NounPlural() {
        return 'CensoGrupoFamiliares';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column censo_grupo_familiar.censo_grupo_familiar_id
     * @var integer intCensoGrupoFamiliarId
     */
    protected $intCensoGrupoFamiliarId;
    const CensoGrupoFamiliarIdDefault = 'nextval(\'censo_grupo_familiar_censo_grupo_familiar_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.fecha_alta
     * @var QDateTime dttFechaAlta
     */
    protected $dttFechaAlta;
    const FechaAltaDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.circ
     * @var string strCirc
     */
    protected $strCirc;
    const CircMaxLength = 2;
    const CircDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.secc
     * @var string strSecc
     */
    protected $strSecc;
    const SeccMaxLength = 2;
    const SeccDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.mz
     * @var string strMz
     */
    protected $strMz;
    const MzMaxLength = 7;
    const MzDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.pc
     * @var string strPc
     */
    protected $strPc;
    const PcMaxLength = 7;
    const PcDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.telefono
     * @var string strTelefono
     */
    protected $strTelefono;
    const TelefonoMaxLength = 20;
    const TelefonoDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.declaracion_no_ocupacion
     * @var boolean blnDeclaracionNoOcupacion
     */
    protected $blnDeclaracionNoOcupacion;
    const DeclaracionNoOcupacionDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.tipo_doc_adj
     * @var string strTipoDocAdj
     */
    protected $strTipoDocAdj;
    const TipoDocAdjDefault = null;


    /**
     * Protected member variable that maps to the database column censo_grupo_familiar.tipo_beneficio
     * @var string strTipoBeneficio
     */
    protected $strTipoBeneficio;
    const TipoBeneficioDefault = null;


    /**
     * Private member variable that stores a reference to a single CensoPersona object
     * (of type CensoPersona), if this CensoGrupoFamiliar object was restored with
     * an expansion on the censo_persona association table.
     * @var CensoPersona _objCensoPersona;
     */
    protected $objCensoPersona;

    /**
     * Private member variable that stores a reference to an array of CensoPersona objects
     * (of type CensoPersona[]), if this CensoGrupoFamiliar object was restored with
     * an ExpandAsArray on the censo_persona association table.
     * @var CensoPersona[] _objCensoPersonaArray;
     */
    protected $objCensoPersonaArray;

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
		 * in the database column censo_grupo_familiar.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this Folio object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Folio objIdFolioObject
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
                protected static $_objCensoGrupoFamiliarArray = array();


		/**
		 * Load a CensoGrupoFamiliar from PK Info
		 * @param integer $intCensoGrupoFamiliarId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return CensoGrupoFamiliar
		 */
		public static function Load($intCensoGrupoFamiliarId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  CensoGrupoFamiliar::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CensoGrupoFamiliar()->CensoGrupoFamiliarId, $intCensoGrupoFamiliarId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intCensoGrupoFamiliarId",self::$_objCensoGrupoFamiliarArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpCensoGrupoFamiliar = CensoGrupoFamiliar::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CensoGrupoFamiliar()->CensoGrupoFamiliarId, $intCensoGrupoFamiliarId)
				),
				$objOptionalClauses
			))) {
			    self::$_objCensoGrupoFamiliarArray["$intCensoGrupoFamiliarId"] = $objTmpCensoGrupoFamiliar;
            }
                        }
                        return isset(self::$_objCensoGrupoFamiliarArray["$intCensoGrupoFamiliarId"])?self::$_objCensoGrupoFamiliarArray["$intCensoGrupoFamiliarId"]:null;
		}

		/**
		 * Load all CensoGrupoFamiliares
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CensoGrupoFamiliar[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call CensoGrupoFamiliar::QueryArray to perform the LoadAll query
			try {
				return CensoGrupoFamiliar::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CensoGrupoFamiliares
		 * @return int
		 */
		public static function CountAll() {
			// Call CensoGrupoFamiliar::QueryCount to perform the CountAll query
			return CensoGrupoFamiliar::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (CensoGrupoFamiliar::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::CensoGrupoFamiliar()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::CensoGrupoFamiliar()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase CensoGrupoFamiliar no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Create/Build out the QueryBuilder object with CensoGrupoFamiliar-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'censo_grupo_familiar');
			CensoGrupoFamiliar::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('censo_grupo_familiar');

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
		 * Static Qcubed Query method to query for a single CensoGrupoFamiliar object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CensoGrupoFamiliar the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CensoGrupoFamiliar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new CensoGrupoFamiliar object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CensoGrupoFamiliar::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = CensoGrupoFamiliar::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of CensoGrupoFamiliar objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CensoGrupoFamiliar[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CensoGrupoFamiliar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CensoGrupoFamiliar::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of CensoGrupoFamiliar objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CensoGrupoFamiliar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			$strQuery = CensoGrupoFamiliar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/censogrupofamiliar', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = CensoGrupoFamiliar::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CensoGrupoFamiliar
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'censo_grupo_familiar';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'censo_grupo_familiar_id', $strAliasPrefix . 'censo_grupo_familiar_id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'fecha_alta', $strAliasPrefix . 'fecha_alta');
			$objBuilder->AddSelectItem($strTableName, 'circ', $strAliasPrefix . 'circ');
			$objBuilder->AddSelectItem($strTableName, 'secc', $strAliasPrefix . 'secc');
			$objBuilder->AddSelectItem($strTableName, 'mz', $strAliasPrefix . 'mz');
			$objBuilder->AddSelectItem($strTableName, 'pc', $strAliasPrefix . 'pc');
			$objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			$objBuilder->AddSelectItem($strTableName, 'declaracion_no_ocupacion', $strAliasPrefix . 'declaracion_no_ocupacion');
			$objBuilder->AddSelectItem($strTableName, 'tipo_doc_adj', $strAliasPrefix . 'tipo_doc_adj');
			$objBuilder->AddSelectItem($strTableName, 'tipo_beneficio', $strAliasPrefix . 'tipo_beneficio');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CensoGrupoFamiliar from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CensoGrupoFamiliar::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CensoGrupoFamiliar
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'censo_grupo_familiar_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intCensoGrupoFamiliarId == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'censo_grupo_familiar__';


						// Expanding reverse references: CensoPersona
						$strAlias = $strAliasPrefix . 'censopersona__censo_persona_id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objCensoPersonaArray)) {
								$objPreviousChildItems = $objPreviousItem->objCensoPersonaArray;
								$objChildItem = CensoPersona::InstantiateDbRow($objDbRow, $strAliasPrefix . 'censopersona__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objCensoPersonaArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objCensoPersonaArray[] = CensoPersona::InstantiateDbRow($objDbRow, $strAliasPrefix . 'censopersona__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'censo_grupo_familiar__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the CensoGrupoFamiliar object
			$objToReturn = new CensoGrupoFamiliar();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'censo_grupo_familiar_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'censo_grupo_familiar_id'] : $strAliasPrefix . 'censo_grupo_familiar_id';
			$objToReturn->intCensoGrupoFamiliarId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_alta', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_alta'] : $strAliasPrefix . 'fecha_alta';
			$objToReturn->dttFechaAlta = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'circ', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'circ'] : $strAliasPrefix . 'circ';
			$objToReturn->strCirc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'secc', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'secc'] : $strAliasPrefix . 'secc';
			$objToReturn->strSecc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'mz', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'mz'] : $strAliasPrefix . 'mz';
			$objToReturn->strMz = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'pc', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'pc'] : $strAliasPrefix . 'pc';
			$objToReturn->strPc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'telefono', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'telefono'] : $strAliasPrefix . 'telefono';
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'declaracion_no_ocupacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'declaracion_no_ocupacion'] : $strAliasPrefix . 'declaracion_no_ocupacion';
			$objToReturn->blnDeclaracionNoOcupacion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'tipo_doc_adj', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tipo_doc_adj'] : $strAliasPrefix . 'tipo_doc_adj';
			$objToReturn->strTipoDocAdj = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'tipo_beneficio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tipo_beneficio'] : $strAliasPrefix . 'tipo_beneficio';
			$objToReturn->strTipoBeneficio = $objDbRow->GetColumn($strAliasName, 'Blob');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->CensoGrupoFamiliarId != $objPreviousItem->CensoGrupoFamiliarId) {
						continue;
					}
					if (array_diff($objPreviousItem->objCensoPersonaArray, $objToReturn->objCensoPersonaArray) != null) {
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
				$strAliasPrefix = 'censo_grupo_familiar__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for CensoPersona Virtual Binding
			$strAlias = $strAliasPrefix . 'censopersona__censo_persona_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objCensoPersonaArray[] = CensoPersona::InstantiateDbRow($objDbRow, $strAliasPrefix . 'censopersona__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objCensoPersona = CensoPersona::InstantiateDbRow($objDbRow, $strAliasPrefix . 'censopersona__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of CensoGrupoFamiliares from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CensoGrupoFamiliar[]
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
					$objItem = CensoGrupoFamiliar::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CensoGrupoFamiliar::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CensoGrupoFamiliar object,
		 * by CensoGrupoFamiliarId Index(es)
		 * @param integer $intCensoGrupoFamiliarId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CensoGrupoFamiliar
		*/
		public static function LoadByCensoGrupoFamiliarId($intCensoGrupoFamiliarId, $objOptionalClauses = null) {
			return CensoGrupoFamiliar::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CensoGrupoFamiliar()->CensoGrupoFamiliarId, $intCensoGrupoFamiliarId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of CensoGrupoFamiliar objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CensoGrupoFamiliar[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call CensoGrupoFamiliar::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return CensoGrupoFamiliar::QueryArray(
					QQ::Equal(QQN::CensoGrupoFamiliar()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CensoGrupoFamiliares
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call CensoGrupoFamiliar::QueryCount to perform the CountByIdFolio query
			return CensoGrupoFamiliar::QueryCount(
				QQ::Equal(QQN::CensoGrupoFamiliar()->IdFolio, $intIdFolio)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this CensoGrupoFamiliar
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = CensoGrupoFamiliar::GetDatabase();

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

                    if ($this->intCensoGrupoFamiliarId && ($this->intCensoGrupoFamiliarId > QDatabaseNumberFieldMax::Integer || $this->intCensoGrupoFamiliarId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intCensoGrupoFamiliarId', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdFolio && ($this->intIdFolio > QDatabaseNumberFieldMax::Integer || $this->intIdFolio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdFolio', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "censo_grupo_familiar" (
                            "id_folio",
                            "fecha_alta",
                            "circ",
                            "secc",
                            "mz",
                            "pc",
                            "telefono",
                            "declaracion_no_ocupacion",
                            "tipo_doc_adj",
                            "tipo_beneficio"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->dttFechaAlta) . ',
                            ' . $objDatabase->SqlVariable($this->strCirc) . ',
                            ' . $objDatabase->SqlVariable($this->strSecc) . ',
                            ' . $objDatabase->SqlVariable($this->strMz) . ',
                            ' . $objDatabase->SqlVariable($this->strPc) . ',
                            ' . $objDatabase->SqlVariable($this->strTelefono) . ',
                            ' . $objDatabase->SqlVariable($this->blnDeclaracionNoOcupacion) . ',
                            ' . $objDatabase->SqlVariable($this->strTipoDocAdj) . ',
                            ' . $objDatabase->SqlVariable($this->strTipoBeneficio) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intCensoGrupoFamiliarId = $objDatabase->InsertId('censo_grupo_familiar', 'censo_grupo_familiar_id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "censo_grupo_familiar"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "fecha_alta" = ' . $objDatabase->SqlVariable($this->dttFechaAlta) . ',
                            "circ" = ' . $objDatabase->SqlVariable($this->strCirc) . ',
                            "secc" = ' . $objDatabase->SqlVariable($this->strSecc) . ',
                            "mz" = ' . $objDatabase->SqlVariable($this->strMz) . ',
                            "pc" = ' . $objDatabase->SqlVariable($this->strPc) . ',
                            "telefono" = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
                            "declaracion_no_ocupacion" = ' . $objDatabase->SqlVariable($this->blnDeclaracionNoOcupacion) . ',
                            "tipo_doc_adj" = ' . $objDatabase->SqlVariable($this->strTipoDocAdj) . ',
                            "tipo_beneficio" = ' . $objDatabase->SqlVariable($this->strTipoBeneficio) . '
                        WHERE
                            "censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '
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
                    $mixToReturn = $this->intCensoGrupoFamiliarId;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this CensoGrupoFamiliar
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CensoGrupoFamiliar with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"censo_grupo_familiar"
				WHERE
					"censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '');
		}

		/**
		 * Delete all CensoGrupoFamiliares
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"censo_grupo_familiar"');
		}

		/**
		 * Truncate censo_grupo_familiar table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "censo_grupo_familiar" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this CensoGrupoFamiliar from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CensoGrupoFamiliar object.');

			// Reload the Object
			$objReloaded = CensoGrupoFamiliar::Load($this->intCensoGrupoFamiliarId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->dttFechaAlta = $objReloaded->dttFechaAlta;
			$this->strCirc = $objReloaded->strCirc;
			$this->strSecc = $objReloaded->strSecc;
			$this->strMz = $objReloaded->strMz;
			$this->strPc = $objReloaded->strPc;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->blnDeclaracionNoOcupacion = $objReloaded->blnDeclaracionNoOcupacion;
			$this->strTipoDocAdj = $objReloaded->strTipoDocAdj;
			$this->strTipoBeneficio = $objReloaded->strTipoBeneficio;
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
            case 'CensoGrupoFamiliarId':
                /**
                 * Gets the value for intCensoGrupoFamiliarId (Read-Only PK)
                 * @return integer
                 */
                return $this->intCensoGrupoFamiliarId;

            case 'IdFolio':
                /**
                 * Gets the value for intIdFolio (Not Null)
                 * @return integer
                 */
                return $this->intIdFolio;

            case 'FechaAlta':
                /**
                 * Gets the value for dttFechaAlta 
                 * @return QDateTime
                 */
                return $this->dttFechaAlta;

            case 'Circ':
                /**
                 * Gets the value for strCirc 
                 * @return string
                 */
                return $this->strCirc;

            case 'Secc':
                /**
                 * Gets the value for strSecc 
                 * @return string
                 */
                return $this->strSecc;

            case 'Mz':
                /**
                 * Gets the value for strMz 
                 * @return string
                 */
                return $this->strMz;

            case 'Pc':
                /**
                 * Gets the value for strPc 
                 * @return string
                 */
                return $this->strPc;

            case 'Telefono':
                /**
                 * Gets the value for strTelefono 
                 * @return string
                 */
                return $this->strTelefono;

            case 'DeclaracionNoOcupacion':
                /**
                 * Gets the value for blnDeclaracionNoOcupacion 
                 * @return boolean
                 */
                return $this->blnDeclaracionNoOcupacion;

            case 'TipoDocAdj':
                /**
                 * Gets the value for strTipoDocAdj 
                 * @return string
                 */
                return $this->strTipoDocAdj;

            case 'TipoBeneficio':
                /**
                 * Gets the value for strTipoBeneficio 
                 * @return string
                 */
                return $this->strTipoBeneficio;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Folio object referenced by intIdFolio (Not Null)
                 * @return Folio
                 */
                try {
                    if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                        $this->objIdFolioObject = Folio::Load($this->intIdFolio);
                    return $this->objIdFolioObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }


            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'CensoPersona':
                /**
                 * Gets the value for the private _objCensoPersona (Read-Only)
                 * if set due to an expansion on the censo_persona.censo_grupo_familiar_id reverse relationship
                 * @return CensoPersona
                 */
                return $this->objCensoPersona;

            case 'CensoPersonaArray':
                /**
                 * Gets the value for the private _objCensoPersonaArray (Read-Only)
                 * if set due to an ExpandAsArray on the censo_persona.censo_grupo_familiar_id reverse relationship
                 * @return CensoPersona[]
                 */
                if(is_null($this->objCensoPersonaArray))
                    $this->objCensoPersonaArray = $this->GetCensoPersonaArray();
                return (array) $this->objCensoPersonaArray;


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
					 * Sets the value for intIdFolio (Not Null)
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

				case 'FechaAlta':
					/**
					 * Sets the value for dttFechaAlta 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttFechaAlta = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttFechaAlta = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Circ':
					/**
					 * Sets the value for strCirc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strCirc = QType::Cast($mixValue, QType::String));
                                                return ($this->strCirc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Secc':
					/**
					 * Sets the value for strSecc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strSecc = QType::Cast($mixValue, QType::String));
                                                return ($this->strSecc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Mz':
					/**
					 * Sets the value for strMz 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strMz = QType::Cast($mixValue, QType::String));
                                                return ($this->strMz = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pc':
					/**
					 * Sets the value for strPc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPc = QType::Cast($mixValue, QType::String));
                                                return ($this->strPc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefono':
					/**
					 * Sets the value for strTelefono 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTelefono = QType::Cast($mixValue, QType::String));
                                                return ($this->strTelefono = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeclaracionNoOcupacion':
					/**
					 * Sets the value for blnDeclaracionNoOcupacion 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnDeclaracionNoOcupacion = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnDeclaracionNoOcupacion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoDocAdj':
					/**
					 * Sets the value for strTipoDocAdj 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTipoDocAdj = QType::Cast($mixValue, QType::String));
                                                return ($this->strTipoDocAdj = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoBeneficio':
					/**
					 * Sets the value for strTipoBeneficio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTipoBeneficio = QType::Cast($mixValue, QType::String));
                                                return ($this->strTipoBeneficio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Folio object referenced by intIdFolio (Not Null)
					 * @param Folio $mixValue
					 * @return Folio
					 */
					if (is_null($mixValue)) {
						$this->intIdFolio = null;
						$this->objIdFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Folio object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Folio');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Folio object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this CensoGrupoFamiliar');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->Id;

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
        
			
		
		// Related Objects' Methods for CensoPersona
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _CensoPersonaArray
                /**
                * Add a Item to the _CensoPersonaArray
                * @param CensoPersona $objItem
                * @return CensoPersona[]
                */
                public function AddCensoPersona(CensoPersona $objItem){
                   //add to the collection and add me as a parent
                    $objItem->CensoGrupoFamiliarIdObject = $this;
                    $this->objCensoPersonaArray = $this->CensoPersonaArray;
                    $this->objCensoPersonaArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateCensoPersona($objItem);

                    return $this->CensoPersonaArray;
                }

                /**
                * Remove a Item to the _CensoPersonaArray
                * @param CensoPersona $objItem
                * @return CensoPersona[]
                */
                public function RemoveCensoPersona(CensoPersona $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objCensoPersonaArray;
                    $this->objCensoPersonaArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objCensoPersonaArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->CensoPersonaId))
                        try{
                            $objItem->CensoGrupoFamiliarIdObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedCensoPersona($objItem);
                        }

                    return $this->objCensoPersonaArray;
                }

		/**
		 * Gets all associated CensoPersonas as an array of CensoPersona objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CensoPersona[]
		*/ 
		public function GetCensoPersonaArray($objOptionalClauses = null) {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				return array();

			try {
				return CensoPersona::LoadArrayByCensoGrupoFamiliarId($this->intCensoGrupoFamiliarId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CensoPersonas
		 * @return int
		*/ 
		public function CountCensoPersonas() {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				return 0;

			return CensoPersona::CountByCensoGrupoFamiliarId($this->intCensoGrupoFamiliarId);
		}

		/**
		 * Associates a CensoPersona
		 * @param CensoPersona $objCensoPersona
		 * @return void
		*/ 
		public function AssociateCensoPersona(CensoPersona $objCensoPersona) {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCensoPersona on this unsaved CensoGrupoFamiliar.');
			if ((is_null($objCensoPersona->CensoPersonaId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCensoPersona on this CensoGrupoFamiliar with an unsaved CensoPersona.');

			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"censo_persona"
				SET
					"censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '
				WHERE
					"censo_persona_id" = ' . $objDatabase->SqlVariable($objCensoPersona->CensoPersonaId) . '
			');
		}

		/**
		 * Unassociates a CensoPersona
		 * @param CensoPersona $objCensoPersona
		 * @return void
		*/ 
		public function UnassociateCensoPersona(CensoPersona $objCensoPersona) {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCensoPersona on this unsaved CensoGrupoFamiliar.');
			if ((is_null($objCensoPersona->CensoPersonaId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCensoPersona on this CensoGrupoFamiliar with an unsaved CensoPersona.');

			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"censo_persona"
				SET
					"censo_grupo_familiar_id" = null
				WHERE
					"censo_persona_id" = ' . $objDatabase->SqlVariable($objCensoPersona->CensoPersonaId) . ' AND
					"censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '
			');
		}

		/**
		 * Unassociates all CensoPersonas
		 * @return void
		*/ 
		public function UnassociateAllCensoPersonas() {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCensoPersona on this unsaved CensoGrupoFamiliar.');

			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"censo_persona"
				SET
					"censo_grupo_familiar_id" = null
				WHERE
					"censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '
			');
		}

		/**
		 * Deletes an associated CensoPersona
		 * @param CensoPersona $objCensoPersona
		 * @return void
		*/ 
		public function DeleteAssociatedCensoPersona(CensoPersona $objCensoPersona) {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCensoPersona on this unsaved CensoGrupoFamiliar.');
			if ((is_null($objCensoPersona->CensoPersonaId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCensoPersona on this CensoGrupoFamiliar with an unsaved CensoPersona.');

			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"censo_persona"
				WHERE
					"censo_persona_id" = ' . $objDatabase->SqlVariable($objCensoPersona->CensoPersonaId) . ' AND
					"censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '
			');
		}

		/**
		 * Deletes all associated CensoPersonas
		 * @return void
		*/ 
		public function DeleteAllCensoPersonas() {
			if ((is_null($this->intCensoGrupoFamiliarId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCensoPersona on this unsaved CensoGrupoFamiliar.');

			// Get the Database Object for this Class
			$objDatabase = CensoGrupoFamiliar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"censo_persona"
				WHERE
					"censo_grupo_familiar_id" = ' . $objDatabase->SqlVariable($this->intCensoGrupoFamiliarId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CensoGrupoFamiliar"><sequence>';
			$strToReturn .= '<element name="CensoGrupoFamiliarId" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="FechaAlta" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Circ" type="xsd:string"/>';
			$strToReturn .= '<element name="Secc" type="xsd:string"/>';
			$strToReturn .= '<element name="Mz" type="xsd:string"/>';
			$strToReturn .= '<element name="Pc" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="DeclaracionNoOcupacion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="TipoDocAdj" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoBeneficio" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CensoGrupoFamiliar', $strComplexTypeArray)) {
				$strComplexTypeArray['CensoGrupoFamiliar'] = CensoGrupoFamiliar::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CensoGrupoFamiliar::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CensoGrupoFamiliar();
			if (property_exists($objSoapObject, 'CensoGrupoFamiliarId')) {
				$objToReturn->intCensoGrupoFamiliarId = $objSoapObject->CensoGrupoFamiliarId;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Folio::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'FechaAlta')) {
				$objToReturn->dttFechaAlta = new QDateTime($objSoapObject->FechaAlta);
            }
			if (property_exists($objSoapObject, 'Circ')) {
				$objToReturn->strCirc = $objSoapObject->Circ;
            }
			if (property_exists($objSoapObject, 'Secc')) {
				$objToReturn->strSecc = $objSoapObject->Secc;
            }
			if (property_exists($objSoapObject, 'Mz')) {
				$objToReturn->strMz = $objSoapObject->Mz;
            }
			if (property_exists($objSoapObject, 'Pc')) {
				$objToReturn->strPc = $objSoapObject->Pc;
            }
			if (property_exists($objSoapObject, 'Telefono')) {
				$objToReturn->strTelefono = $objSoapObject->Telefono;
            }
			if (property_exists($objSoapObject, 'DeclaracionNoOcupacion')) {
				$objToReturn->blnDeclaracionNoOcupacion = $objSoapObject->DeclaracionNoOcupacion;
            }
			if (property_exists($objSoapObject, 'TipoDocAdj')) {
				$objToReturn->strTipoDocAdj = $objSoapObject->TipoDocAdj;
            }
			if (property_exists($objSoapObject, 'TipoBeneficio')) {
				$objToReturn->strTipoBeneficio = $objSoapObject->TipoBeneficio;
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
				array_push($objArrayToReturn, CensoGrupoFamiliar::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = Folio::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->dttFechaAlta)
				$objObject->dttFechaAlta = $objObject->dttFechaAlta->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>