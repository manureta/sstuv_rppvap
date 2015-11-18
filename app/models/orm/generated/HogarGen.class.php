<?php
/**
 * The abstract HogarGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Hogar subclass which
 * extends this HogarGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Hogar class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio (Not Null)
	 * @property QDateTime $FechaAlta the value for dttFechaAlta (Not Null)
	 * @property string $Circ the value for strCirc (Not Null)
	 * @property string $Secc the value for strSecc (Not Null)
	 * @property string $Mz the value for strMz (Not Null)
	 * @property string $Pc the value for strPc (Not Null)
	 * @property string $Telefono the value for strTelefono 
	 * @property string $Direccion the value for strDireccion 
	 * @property boolean $DeclaracionNoOcupacion the value for blnDeclaracionNoOcupacion 
	 * @property string $DocTerreno the value for strDocTerreno 
	 * @property string $TipoBeneficio the value for strTipoBeneficio 
	 * @property string $FormaOcupacion the value for strFormaOcupacion 
	 * @property string $FechaIngreso the value for strFechaIngreso 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (Not Null)
	 * @property-read Ocupante $OcupanteAsId the value for the private _objOcupanteAsId (Read-Only) if set due to an expansion on the ocupante.id_hogar reverse relationship
	 * @property-read Ocupante[] $OcupanteAsIdArray the value for the private _objOcupanteAsIdArray (Read-Only) if set due to an ExpandAsArray on the ocupante.id_hogar reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class HogarGen extends QBaseClass {

    public static function Noun() {
        return 'Hogar';
    }
    public static function NounPlural() {
        return 'Hogares';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column hogar.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'hogar_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column hogar.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.fecha_alta
     * @var QDateTime dttFechaAlta
     */
    protected $dttFechaAlta;
    const FechaAltaDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.circ
     * @var string strCirc
     */
    protected $strCirc;
    const CircMaxLength = 2;
    const CircDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.secc
     * @var string strSecc
     */
    protected $strSecc;
    const SeccMaxLength = 2;
    const SeccDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.mz
     * @var string strMz
     */
    protected $strMz;
    const MzMaxLength = 7;
    const MzDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.pc
     * @var string strPc
     */
    protected $strPc;
    const PcMaxLength = 7;
    const PcDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.telefono
     * @var string strTelefono
     */
    protected $strTelefono;
    const TelefonoMaxLength = 20;
    const TelefonoDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.direccion
     * @var string strDireccion
     */
    protected $strDireccion;
    const DireccionMaxLength = 255;
    const DireccionDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.declaracion_no_ocupacion
     * @var boolean blnDeclaracionNoOcupacion
     */
    protected $blnDeclaracionNoOcupacion;
    const DeclaracionNoOcupacionDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.doc_terreno
     * @var string strDocTerreno
     */
    protected $strDocTerreno;
    const DocTerrenoMaxLength = 255;
    const DocTerrenoDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.tipo_beneficio
     * @var string strTipoBeneficio
     */
    protected $strTipoBeneficio;
    const TipoBeneficioMaxLength = 255;
    const TipoBeneficioDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.forma_ocupacion
     * @var string strFormaOcupacion
     */
    protected $strFormaOcupacion;
    const FormaOcupacionMaxLength = 255;
    const FormaOcupacionDefault = null;


    /**
     * Protected member variable that maps to the database column hogar.fecha_ingreso
     * @var string strFechaIngreso
     */
    protected $strFechaIngreso;
    const FechaIngresoMaxLength = 50;
    const FechaIngresoDefault = null;


    /**
     * Private member variable that stores a reference to a single OcupanteAsId object
     * (of type Ocupante), if this Hogar object was restored with
     * an expansion on the ocupante association table.
     * @var Ocupante _objOcupanteAsId;
     */
    protected $objOcupanteAsId;

    /**
     * Private member variable that stores a reference to an array of OcupanteAsId objects
     * (of type Ocupante[]), if this Hogar object was restored with
     * an ExpandAsArray on the ocupante association table.
     * @var Ocupante[] _objOcupanteAsIdArray;
     */
    protected $objOcupanteAsIdArray;

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
		 * in the database column hogar.id_folio.
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
                protected static $_objHogarArray = array();


		/**
		 * Load a Hogar from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Hogar
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Hogar::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Hogar()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objHogarArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpHogar = Hogar::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Hogar()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objHogarArray["$intId"] = $objTmpHogar;
            }
                        }
                        return isset(self::$_objHogarArray["$intId"])?self::$_objHogarArray["$intId"]:null;
		}

		/**
		 * Load all Hogares
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Hogar[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Hogar::QueryArray to perform the LoadAll query
			try {
				return Hogar::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Hogares
		 * @return int
		 */
		public static function CountAll() {
			// Call Hogar::QueryCount to perform the CountAll query
			return Hogar::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Hogar::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Hogar()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Hogar()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Hogar no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Hogar::GetDatabase();

			// Create/Build out the QueryBuilder object with Hogar-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'hogar');
			Hogar::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('hogar');

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
		 * Static Qcubed Query method to query for a single Hogar object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Hogar the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Hogar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Hogar object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Hogar::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Hogar::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Hogar objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Hogar[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Hogar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Hogar::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Hogar objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Hogar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Hogar::GetDatabase();

			$strQuery = Hogar::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/hogar', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Hogar::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Hogar
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'hogar';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'fecha_alta', $strAliasPrefix . 'fecha_alta');
			$objBuilder->AddSelectItem($strTableName, 'circ', $strAliasPrefix . 'circ');
			$objBuilder->AddSelectItem($strTableName, 'secc', $strAliasPrefix . 'secc');
			$objBuilder->AddSelectItem($strTableName, 'mz', $strAliasPrefix . 'mz');
			$objBuilder->AddSelectItem($strTableName, 'pc', $strAliasPrefix . 'pc');
			$objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			$objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			$objBuilder->AddSelectItem($strTableName, 'declaracion_no_ocupacion', $strAliasPrefix . 'declaracion_no_ocupacion');
			$objBuilder->AddSelectItem($strTableName, 'doc_terreno', $strAliasPrefix . 'doc_terreno');
			$objBuilder->AddSelectItem($strTableName, 'tipo_beneficio', $strAliasPrefix . 'tipo_beneficio');
			$objBuilder->AddSelectItem($strTableName, 'forma_ocupacion', $strAliasPrefix . 'forma_ocupacion');
			$objBuilder->AddSelectItem($strTableName, 'fecha_ingreso', $strAliasPrefix . 'fecha_ingreso');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Hogar from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Hogar::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Hogar
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
							$strAliasPrefix = 'hogar__';


						// Expanding reverse references: OcupanteAsId
						$strAlias = $strAliasPrefix . 'ocupanteasid__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objOcupanteAsIdArray)) {
								$objPreviousChildItems = $objPreviousItem->objOcupanteAsIdArray;
								$objChildItem = Ocupante::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ocupanteasid__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objOcupanteAsIdArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objOcupanteAsIdArray[] = Ocupante::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ocupanteasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'hogar__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Hogar object
			$objToReturn = new Hogar();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_alta', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_alta'] : $strAliasPrefix . 'fecha_alta';
			$objToReturn->dttFechaAlta = $objDbRow->GetColumn($strAliasName, 'Date');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'direccion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'direccion'] : $strAliasPrefix . 'direccion';
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'declaracion_no_ocupacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'declaracion_no_ocupacion'] : $strAliasPrefix . 'declaracion_no_ocupacion';
			$objToReturn->blnDeclaracionNoOcupacion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'doc_terreno', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'doc_terreno'] : $strAliasPrefix . 'doc_terreno';
			$objToReturn->strDocTerreno = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'tipo_beneficio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tipo_beneficio'] : $strAliasPrefix . 'tipo_beneficio';
			$objToReturn->strTipoBeneficio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'forma_ocupacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'forma_ocupacion'] : $strAliasPrefix . 'forma_ocupacion';
			$objToReturn->strFormaOcupacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_ingreso', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_ingreso'] : $strAliasPrefix . 'fecha_ingreso';
			$objToReturn->strFechaIngreso = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objOcupanteAsIdArray, $objToReturn->objOcupanteAsIdArray) != null) {
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
				$strAliasPrefix = 'hogar__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for OcupanteAsId Virtual Binding
			$strAlias = $strAliasPrefix . 'ocupanteasid__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objOcupanteAsIdArray[] = Ocupante::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ocupanteasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objOcupanteAsId = Ocupante::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ocupanteasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Hogares from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Hogar[]
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
					$objItem = Hogar::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Hogar::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Hogar object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Hogar
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Hogar::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Hogar()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Hogar objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Hogar[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call Hogar::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return Hogar::QueryArray(
					QQ::Equal(QQN::Hogar()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Hogares
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call Hogar::QueryCount to perform the CountByIdFolio query
			return Hogar::QueryCount(
				QQ::Equal(QQN::Hogar()->IdFolio, $intIdFolio)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Hogar
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Hogar::GetDatabase();

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
                        INSERT INTO "hogar" (
                            "id_folio",
                            "fecha_alta",
                            "circ",
                            "secc",
                            "mz",
                            "pc",
                            "telefono",
                            "direccion",
                            "declaracion_no_ocupacion",
                            "doc_terreno",
                            "tipo_beneficio",
                            "forma_ocupacion",
                            "fecha_ingreso"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->dttFechaAlta) . ',
                            ' . $objDatabase->SqlVariable($this->strCirc) . ',
                            ' . $objDatabase->SqlVariable($this->strSecc) . ',
                            ' . $objDatabase->SqlVariable($this->strMz) . ',
                            ' . $objDatabase->SqlVariable($this->strPc) . ',
                            ' . $objDatabase->SqlVariable($this->strTelefono) . ',
                            ' . $objDatabase->SqlVariable($this->strDireccion) . ',
                            ' . $objDatabase->SqlVariable($this->blnDeclaracionNoOcupacion) . ',
                            ' . $objDatabase->SqlVariable($this->strDocTerreno) . ',
                            ' . $objDatabase->SqlVariable($this->strTipoBeneficio) . ',
                            ' . $objDatabase->SqlVariable($this->strFormaOcupacion) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaIngreso) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('hogar', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "hogar"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "fecha_alta" = ' . $objDatabase->SqlVariable($this->dttFechaAlta) . ',
                            "circ" = ' . $objDatabase->SqlVariable($this->strCirc) . ',
                            "secc" = ' . $objDatabase->SqlVariable($this->strSecc) . ',
                            "mz" = ' . $objDatabase->SqlVariable($this->strMz) . ',
                            "pc" = ' . $objDatabase->SqlVariable($this->strPc) . ',
                            "telefono" = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
                            "direccion" = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
                            "declaracion_no_ocupacion" = ' . $objDatabase->SqlVariable($this->blnDeclaracionNoOcupacion) . ',
                            "doc_terreno" = ' . $objDatabase->SqlVariable($this->strDocTerreno) . ',
                            "tipo_beneficio" = ' . $objDatabase->SqlVariable($this->strTipoBeneficio) . ',
                            "forma_ocupacion" = ' . $objDatabase->SqlVariable($this->strFormaOcupacion) . ',
                            "fecha_ingreso" = ' . $objDatabase->SqlVariable($this->strFechaIngreso) . '
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
		 * Delete this Hogar
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Hogar with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"hogar"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Hogares
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"hogar"');
		}

		/**
		 * Truncate hogar table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "hogar" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Hogar from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Hogar object.');

			// Reload the Object
			$objReloaded = Hogar::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->dttFechaAlta = $objReloaded->dttFechaAlta;
			$this->strCirc = $objReloaded->strCirc;
			$this->strSecc = $objReloaded->strSecc;
			$this->strMz = $objReloaded->strMz;
			$this->strPc = $objReloaded->strPc;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->blnDeclaracionNoOcupacion = $objReloaded->blnDeclaracionNoOcupacion;
			$this->strDocTerreno = $objReloaded->strDocTerreno;
			$this->strTipoBeneficio = $objReloaded->strTipoBeneficio;
			$this->strFormaOcupacion = $objReloaded->strFormaOcupacion;
			$this->strFechaIngreso = $objReloaded->strFechaIngreso;
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
                 * Gets the value for intIdFolio (Not Null)
                 * @return integer
                 */
                return $this->intIdFolio;

            case 'FechaAlta':
                /**
                 * Gets the value for dttFechaAlta (Not Null)
                 * @return QDateTime
                 */
                return $this->dttFechaAlta;

            case 'Circ':
                /**
                 * Gets the value for strCirc (Not Null)
                 * @return string
                 */
                return $this->strCirc;

            case 'Secc':
                /**
                 * Gets the value for strSecc (Not Null)
                 * @return string
                 */
                return $this->strSecc;

            case 'Mz':
                /**
                 * Gets the value for strMz (Not Null)
                 * @return string
                 */
                return $this->strMz;

            case 'Pc':
                /**
                 * Gets the value for strPc (Not Null)
                 * @return string
                 */
                return $this->strPc;

            case 'Telefono':
                /**
                 * Gets the value for strTelefono 
                 * @return string
                 */
                return $this->strTelefono;

            case 'Direccion':
                /**
                 * Gets the value for strDireccion 
                 * @return string
                 */
                return $this->strDireccion;

            case 'DeclaracionNoOcupacion':
                /**
                 * Gets the value for blnDeclaracionNoOcupacion 
                 * @return boolean
                 */
                return $this->blnDeclaracionNoOcupacion;

            case 'DocTerreno':
                /**
                 * Gets the value for strDocTerreno 
                 * @return string
                 */
                return $this->strDocTerreno;

            case 'TipoBeneficio':
                /**
                 * Gets the value for strTipoBeneficio 
                 * @return string
                 */
                return $this->strTipoBeneficio;

            case 'FormaOcupacion':
                /**
                 * Gets the value for strFormaOcupacion 
                 * @return string
                 */
                return $this->strFormaOcupacion;

            case 'FechaIngreso':
                /**
                 * Gets the value for strFechaIngreso 
                 * @return string
                 */
                return $this->strFechaIngreso;


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

            case 'OcupanteAsId':
                /**
                 * Gets the value for the private _objOcupanteAsId (Read-Only)
                 * if set due to an expansion on the ocupante.id_hogar reverse relationship
                 * @return Ocupante
                 */
                return $this->objOcupanteAsId;

            case 'OcupanteAsIdArray':
                /**
                 * Gets the value for the private _objOcupanteAsIdArray (Read-Only)
                 * if set due to an ExpandAsArray on the ocupante.id_hogar reverse relationship
                 * @return Ocupante[]
                 */
                if(is_null($this->objOcupanteAsIdArray))
                    $this->objOcupanteAsIdArray = $this->GetOcupanteAsIdArray();
                return (array) $this->objOcupanteAsIdArray;


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
					 * Sets the value for dttFechaAlta (Not Null)
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
					 * Sets the value for strCirc (Not Null)
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
					 * Sets the value for strSecc (Not Null)
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
					 * Sets the value for strMz (Not Null)
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
					 * Sets the value for strPc (Not Null)
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

				case 'Direccion':
					/**
					 * Sets the value for strDireccion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDireccion = QType::Cast($mixValue, QType::String));
                                                return ($this->strDireccion = $mixValue);
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

				case 'DocTerreno':
					/**
					 * Sets the value for strDocTerreno 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDocTerreno = QType::Cast($mixValue, QType::String));
                                                return ($this->strDocTerreno = $mixValue);
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

				case 'FormaOcupacion':
					/**
					 * Sets the value for strFormaOcupacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFormaOcupacion = QType::Cast($mixValue, QType::String));
                                                return ($this->strFormaOcupacion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaIngreso':
					/**
					 * Sets the value for strFechaIngreso 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFechaIngreso = QType::Cast($mixValue, QType::String));
                                                return ($this->strFechaIngreso = $mixValue);
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Hogar');

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
        
			
		
		// Related Objects' Methods for OcupanteAsId
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _OcupanteAsIdArray
                /**
                * Add a Item to the _OcupanteAsIdArray
                * @param Ocupante $objItem
                * @return Ocupante[]
                */
                public function AddOcupanteAsId(Ocupante $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdHogarObject = $this;
                    $this->objOcupanteAsIdArray = $this->OcupanteAsIdArray;
                    $this->objOcupanteAsIdArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateOcupanteAsId($objItem);

                    return $this->OcupanteAsIdArray;
                }

                /**
                * Remove a Item to the _OcupanteAsIdArray
                * @param Ocupante $objItem
                * @return Ocupante[]
                */
                public function RemoveOcupanteAsId(Ocupante $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objOcupanteAsIdArray;
                    $this->objOcupanteAsIdArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objOcupanteAsIdArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdHogarObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedOcupanteAsId($objItem);
                        }

                    return $this->objOcupanteAsIdArray;
                }

		/**
		 * Gets all associated OcupantesAsId as an array of Ocupante objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ocupante[]
		*/ 
		public function GetOcupanteAsIdArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Ocupante::LoadArrayByIdHogar($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OcupantesAsId
		 * @return int
		*/ 
		public function CountOcupantesAsId() {
			if ((is_null($this->intId)))
				return 0;

			return Ocupante::CountByIdHogar($this->intId);
		}

		/**
		 * Associates a OcupanteAsId
		 * @param Ocupante $objOcupante
		 * @return void
		*/ 
		public function AssociateOcupanteAsId(Ocupante $objOcupante) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOcupanteAsId on this unsaved Hogar.');
			if ((is_null($objOcupante->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOcupanteAsId on this Hogar with an unsaved Ocupante.');

			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"ocupante"
				SET
					"id_hogar" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objOcupante->Id) . '
			');
		}

		/**
		 * Unassociates a OcupanteAsId
		 * @param Ocupante $objOcupante
		 * @return void
		*/ 
		public function UnassociateOcupanteAsId(Ocupante $objOcupante) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOcupanteAsId on this unsaved Hogar.');
			if ((is_null($objOcupante->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOcupanteAsId on this Hogar with an unsaved Ocupante.');

			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"ocupante"
				SET
					"id_hogar" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objOcupante->Id) . ' AND
					"id_hogar" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all OcupantesAsId
		 * @return void
		*/ 
		public function UnassociateAllOcupantesAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOcupanteAsId on this unsaved Hogar.');

			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"ocupante"
				SET
					"id_hogar" = null
				WHERE
					"id_hogar" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated OcupanteAsId
		 * @param Ocupante $objOcupante
		 * @return void
		*/ 
		public function DeleteAssociatedOcupanteAsId(Ocupante $objOcupante) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOcupanteAsId on this unsaved Hogar.');
			if ((is_null($objOcupante->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOcupanteAsId on this Hogar with an unsaved Ocupante.');

			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"ocupante"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objOcupante->Id) . ' AND
					"id_hogar" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated OcupantesAsId
		 * @return void
		*/ 
		public function DeleteAllOcupantesAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOcupanteAsId on this unsaved Hogar.');

			// Get the Database Object for this Class
			$objDatabase = Hogar::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"ocupante"
				WHERE
					"id_hogar" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Hogar"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="FechaAlta" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Circ" type="xsd:string"/>';
			$strToReturn .= '<element name="Secc" type="xsd:string"/>';
			$strToReturn .= '<element name="Mz" type="xsd:string"/>';
			$strToReturn .= '<element name="Pc" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="DeclaracionNoOcupacion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DocTerreno" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoBeneficio" type="xsd:string"/>';
			$strToReturn .= '<element name="FormaOcupacion" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaIngreso" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Hogar', $strComplexTypeArray)) {
				$strComplexTypeArray['Hogar'] = Hogar::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Hogar::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Hogar();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
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
			if (property_exists($objSoapObject, 'Direccion')) {
				$objToReturn->strDireccion = $objSoapObject->Direccion;
            }
			if (property_exists($objSoapObject, 'DeclaracionNoOcupacion')) {
				$objToReturn->blnDeclaracionNoOcupacion = $objSoapObject->DeclaracionNoOcupacion;
            }
			if (property_exists($objSoapObject, 'DocTerreno')) {
				$objToReturn->strDocTerreno = $objSoapObject->DocTerreno;
            }
			if (property_exists($objSoapObject, 'TipoBeneficio')) {
				$objToReturn->strTipoBeneficio = $objSoapObject->TipoBeneficio;
            }
			if (property_exists($objSoapObject, 'FormaOcupacion')) {
				$objToReturn->strFormaOcupacion = $objSoapObject->FormaOcupacion;
            }
			if (property_exists($objSoapObject, 'FechaIngreso')) {
				$objToReturn->strFechaIngreso = $objSoapObject->FechaIngreso;
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
				array_push($objArrayToReturn, Hogar::GetSoapObjectFromObject($objObject, true));

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