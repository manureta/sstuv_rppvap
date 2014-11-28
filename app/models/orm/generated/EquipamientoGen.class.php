<?php
/**
 * The abstract EquipamientoGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Equipamiento subclass which
 * extends this EquipamientoGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Equipamiento class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property integer $UnidadSanitaria the value for intUnidadSanitaria 
	 * @property integer $JardinInfantes the value for intJardinInfantes 
	 * @property integer $EscuelaPrimaria the value for intEscuelaPrimaria 
	 * @property integer $EscuelaSecundaria the value for intEscuelaSecundaria 
	 * @property integer $Comedor the value for intComedor 
	 * @property integer $CentroIntegracionComunitaria the value for intCentroIntegracionComunitaria 
	 * @property string $Otro the value for strOtro 
	 * @property CondicionesSocioUrbanisticas $IdFolioObject the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
	 * @property OpcionesEquipamientos $UnidadSanitariaObject the value for the OpcionesEquipamientos object referenced by intUnidadSanitaria 
	 * @property OpcionesEquipamientos $JardinInfantesObject the value for the OpcionesEquipamientos object referenced by intJardinInfantes 
	 * @property OpcionesEquipamientos $EscuelaPrimariaObject the value for the OpcionesEquipamientos object referenced by intEscuelaPrimaria 
	 * @property OpcionesEquipamientos $EscuelaSecundariaObject the value for the OpcionesEquipamientos object referenced by intEscuelaSecundaria 
	 * @property OpcionesEquipamientos $ComedorObject the value for the OpcionesEquipamientos object referenced by intComedor 
	 * @property OpcionesEquipamientos $CentroIntegracionComunitariaObject the value for the OpcionesEquipamientos object referenced by intCentroIntegracionComunitaria 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class EquipamientoGen extends QBaseClass {

    public static function Noun() {
        return 'Equipamiento';
    }
    public static function NounPlural() {
        return 'Equipamientos';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column equipamiento.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'equipamiento_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column equipamiento.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.unidad_sanitaria
     * @var integer intUnidadSanitaria
     */
    protected $intUnidadSanitaria;
    const UnidadSanitariaDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.jardin_infantes
     * @var integer intJardinInfantes
     */
    protected $intJardinInfantes;
    const JardinInfantesDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.escuela_primaria
     * @var integer intEscuelaPrimaria
     */
    protected $intEscuelaPrimaria;
    const EscuelaPrimariaDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.escuela_secundaria
     * @var integer intEscuelaSecundaria
     */
    protected $intEscuelaSecundaria;
    const EscuelaSecundariaDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.comedor
     * @var integer intComedor
     */
    protected $intComedor;
    const ComedorDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.centro_integracion_comunitaria
     * @var integer intCentroIntegracionComunitaria
     */
    protected $intCentroIntegracionComunitaria;
    const CentroIntegracionComunitariaDefault = null;


    /**
     * Protected member variable that maps to the database column equipamiento.otro
     * @var string strOtro
     */
    protected $strOtro;
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
		 * in the database column equipamiento.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this CondicionesSocioUrbanisticas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CondicionesSocioUrbanisticas objIdFolioObject
		 */
		protected $objIdFolioObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column equipamiento.unidad_sanitaria.
		 *
		 * NOTE: Always use the UnidadSanitariaObject property getter to correctly retrieve this OpcionesEquipamientos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEquipamientos objUnidadSanitariaObject
		 */
		protected $objUnidadSanitariaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column equipamiento.jardin_infantes.
		 *
		 * NOTE: Always use the JardinInfantesObject property getter to correctly retrieve this OpcionesEquipamientos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEquipamientos objJardinInfantesObject
		 */
		protected $objJardinInfantesObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column equipamiento.escuela_primaria.
		 *
		 * NOTE: Always use the EscuelaPrimariaObject property getter to correctly retrieve this OpcionesEquipamientos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEquipamientos objEscuelaPrimariaObject
		 */
		protected $objEscuelaPrimariaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column equipamiento.escuela_secundaria.
		 *
		 * NOTE: Always use the EscuelaSecundariaObject property getter to correctly retrieve this OpcionesEquipamientos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEquipamientos objEscuelaSecundariaObject
		 */
		protected $objEscuelaSecundariaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column equipamiento.comedor.
		 *
		 * NOTE: Always use the ComedorObject property getter to correctly retrieve this OpcionesEquipamientos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEquipamientos objComedorObject
		 */
		protected $objComedorObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column equipamiento.centro_integracion_comunitaria.
		 *
		 * NOTE: Always use the CentroIntegracionComunitariaObject property getter to correctly retrieve this OpcionesEquipamientos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEquipamientos objCentroIntegracionComunitariaObject
		 */
		protected $objCentroIntegracionComunitariaObject;



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
                protected static $_objEquipamientoArray = array();


		/**
		 * Load a Equipamiento from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Equipamiento
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Equipamiento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Equipamiento()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objEquipamientoArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpEquipamiento = Equipamiento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Equipamiento()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objEquipamientoArray["$intId"] = $objTmpEquipamiento;
            }
                        }
                        return isset(self::$_objEquipamientoArray["$intId"])?self::$_objEquipamientoArray["$intId"]:null;
		}

		/**
		 * Load all Equipamientos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Equipamiento::QueryArray to perform the LoadAll query
			try {
				return Equipamiento::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Equipamientos
		 * @return int
		 */
		public static function CountAll() {
			// Call Equipamiento::QueryCount to perform the CountAll query
			return Equipamiento::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Equipamiento::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Equipamiento()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Equipamiento()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Equipamiento no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Equipamiento::GetDatabase();

			// Create/Build out the QueryBuilder object with Equipamiento-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'equipamiento');
			Equipamiento::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('equipamiento');

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
		 * Static Qcubed Query method to query for a single Equipamiento object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Equipamiento the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Equipamiento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Equipamiento object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Equipamiento::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Equipamiento::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Equipamiento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Equipamiento[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Equipamiento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Equipamiento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Equipamiento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Equipamiento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Equipamiento::GetDatabase();

			$strQuery = Equipamiento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/equipamiento', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Equipamiento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Equipamiento
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'equipamiento';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'unidad_sanitaria', $strAliasPrefix . 'unidad_sanitaria');
			$objBuilder->AddSelectItem($strTableName, 'jardin_infantes', $strAliasPrefix . 'jardin_infantes');
			$objBuilder->AddSelectItem($strTableName, 'escuela_primaria', $strAliasPrefix . 'escuela_primaria');
			$objBuilder->AddSelectItem($strTableName, 'escuela_secundaria', $strAliasPrefix . 'escuela_secundaria');
			$objBuilder->AddSelectItem($strTableName, 'comedor', $strAliasPrefix . 'comedor');
			$objBuilder->AddSelectItem($strTableName, 'centro_integracion_comunitaria', $strAliasPrefix . 'centro_integracion_comunitaria');
			$objBuilder->AddSelectItem($strTableName, 'otro', $strAliasPrefix . 'otro');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Equipamiento from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Equipamiento::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Equipamiento
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Equipamiento object
			$objToReturn = new Equipamiento();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'unidad_sanitaria', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'unidad_sanitaria'] : $strAliasPrefix . 'unidad_sanitaria';
			$objToReturn->intUnidadSanitaria = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'jardin_infantes', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'jardin_infantes'] : $strAliasPrefix . 'jardin_infantes';
			$objToReturn->intJardinInfantes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'escuela_primaria', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'escuela_primaria'] : $strAliasPrefix . 'escuela_primaria';
			$objToReturn->intEscuelaPrimaria = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'escuela_secundaria', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'escuela_secundaria'] : $strAliasPrefix . 'escuela_secundaria';
			$objToReturn->intEscuelaSecundaria = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'comedor', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comedor'] : $strAliasPrefix . 'comedor';
			$objToReturn->intComedor = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'centro_integracion_comunitaria', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'centro_integracion_comunitaria'] : $strAliasPrefix . 'centro_integracion_comunitaria';
			$objToReturn->intCentroIntegracionComunitaria = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'equipamiento__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for UnidadSanitariaObject Early Binding
			$strAlias = $strAliasPrefix . 'unidad_sanitaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objUnidadSanitariaObject = OpcionesEquipamientos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'unidad_sanitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for JardinInfantesObject Early Binding
			$strAlias = $strAliasPrefix . 'jardin_infantes__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objJardinInfantesObject = OpcionesEquipamientos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'jardin_infantes__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for EscuelaPrimariaObject Early Binding
			$strAlias = $strAliasPrefix . 'escuela_primaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEscuelaPrimariaObject = OpcionesEquipamientos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'escuela_primaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for EscuelaSecundariaObject Early Binding
			$strAlias = $strAliasPrefix . 'escuela_secundaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEscuelaSecundariaObject = OpcionesEquipamientos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'escuela_secundaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ComedorObject Early Binding
			$strAlias = $strAliasPrefix . 'comedor__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objComedorObject = OpcionesEquipamientos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'comedor__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CentroIntegracionComunitariaObject Early Binding
			$strAlias = $strAliasPrefix . 'centro_integracion_comunitaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCentroIntegracionComunitariaObject = OpcionesEquipamientos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'centro_integracion_comunitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Equipamientos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Equipamiento[]
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
					$objItem = Equipamiento::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Equipamiento::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Equipamiento object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Equipamiento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Equipamiento()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by CentroIntegracionComunitaria Index(es)
		 * @param integer $intCentroIntegracionComunitaria
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByCentroIntegracionComunitaria($intCentroIntegracionComunitaria, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByCentroIntegracionComunitaria query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->CentroIntegracionComunitaria, $intCentroIntegracionComunitaria),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by CentroIntegracionComunitaria Index(es)
		 * @param integer $intCentroIntegracionComunitaria
		 * @return int
		*/
		public static function CountByCentroIntegracionComunitaria($intCentroIntegracionComunitaria) {
			// Call Equipamiento::QueryCount to perform the CountByCentroIntegracionComunitaria query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->CentroIntegracionComunitaria, $intCentroIntegracionComunitaria)
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by Comedor Index(es)
		 * @param integer $intComedor
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByComedor($intComedor, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByComedor query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->Comedor, $intComedor),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by Comedor Index(es)
		 * @param integer $intComedor
		 * @return int
		*/
		public static function CountByComedor($intComedor) {
			// Call Equipamiento::QueryCount to perform the CountByComedor query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->Comedor, $intComedor)
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by EscuelaPrimaria Index(es)
		 * @param integer $intEscuelaPrimaria
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByEscuelaPrimaria($intEscuelaPrimaria, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByEscuelaPrimaria query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->EscuelaPrimaria, $intEscuelaPrimaria),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by EscuelaPrimaria Index(es)
		 * @param integer $intEscuelaPrimaria
		 * @return int
		*/
		public static function CountByEscuelaPrimaria($intEscuelaPrimaria) {
			// Call Equipamiento::QueryCount to perform the CountByEscuelaPrimaria query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->EscuelaPrimaria, $intEscuelaPrimaria)
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by EscuelaSecundaria Index(es)
		 * @param integer $intEscuelaSecundaria
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByEscuelaSecundaria($intEscuelaSecundaria, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByEscuelaSecundaria query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->EscuelaSecundaria, $intEscuelaSecundaria),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by EscuelaSecundaria Index(es)
		 * @param integer $intEscuelaSecundaria
		 * @return int
		*/
		public static function CountByEscuelaSecundaria($intEscuelaSecundaria) {
			// Call Equipamiento::QueryCount to perform the CountByEscuelaSecundaria query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->EscuelaSecundaria, $intEscuelaSecundaria)
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call Equipamiento::QueryCount to perform the CountByIdFolio query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->IdFolio, $intIdFolio)
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by JardinInfantes Index(es)
		 * @param integer $intJardinInfantes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByJardinInfantes($intJardinInfantes, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByJardinInfantes query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->JardinInfantes, $intJardinInfantes),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by JardinInfantes Index(es)
		 * @param integer $intJardinInfantes
		 * @return int
		*/
		public static function CountByJardinInfantes($intJardinInfantes) {
			// Call Equipamiento::QueryCount to perform the CountByJardinInfantes query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->JardinInfantes, $intJardinInfantes)
			);
		}
			
		/**
		 * Load an array of Equipamiento objects,
		 * by UnidadSanitaria Index(es)
		 * @param integer $intUnidadSanitaria
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/
		public static function LoadArrayByUnidadSanitaria($intUnidadSanitaria, $objOptionalClauses = null) {
			// Call Equipamiento::QueryArray to perform the LoadArrayByUnidadSanitaria query
			try {
				return Equipamiento::QueryArray(
					QQ::Equal(QQN::Equipamiento()->UnidadSanitaria, $intUnidadSanitaria),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Equipamientos
		 * by UnidadSanitaria Index(es)
		 * @param integer $intUnidadSanitaria
		 * @return int
		*/
		public static function CountByUnidadSanitaria($intUnidadSanitaria) {
			// Call Equipamiento::QueryCount to perform the CountByUnidadSanitaria query
			return Equipamiento::QueryCount(
				QQ::Equal(QQN::Equipamiento()->UnidadSanitaria, $intUnidadSanitaria)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Equipamiento
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Equipamiento::GetDatabase();

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
            // ver si objUnidadSanitariaObject esta Guardado
            if(is_null($this->intUnidadSanitaria)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->UnidadSanitariaObject))
                try{
                    if(!is_null($this->UnidadSanitariaObject->UnidadSanitaria))
                        $this->intUnidadSanitaria = $this->UnidadSanitariaObject->UnidadSanitaria;
                    else
                        $this->intUnidadSanitaria = $this->UnidadSanitariaObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objJardinInfantesObject esta Guardado
            if(is_null($this->intJardinInfantes)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->JardinInfantesObject))
                try{
                    if(!is_null($this->JardinInfantesObject->JardinInfantes))
                        $this->intJardinInfantes = $this->JardinInfantesObject->JardinInfantes;
                    else
                        $this->intJardinInfantes = $this->JardinInfantesObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objEscuelaPrimariaObject esta Guardado
            if(is_null($this->intEscuelaPrimaria)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->EscuelaPrimariaObject))
                try{
                    if(!is_null($this->EscuelaPrimariaObject->EscuelaPrimaria))
                        $this->intEscuelaPrimaria = $this->EscuelaPrimariaObject->EscuelaPrimaria;
                    else
                        $this->intEscuelaPrimaria = $this->EscuelaPrimariaObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objEscuelaSecundariaObject esta Guardado
            if(is_null($this->intEscuelaSecundaria)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->EscuelaSecundariaObject))
                try{
                    if(!is_null($this->EscuelaSecundariaObject->EscuelaSecundaria))
                        $this->intEscuelaSecundaria = $this->EscuelaSecundariaObject->EscuelaSecundaria;
                    else
                        $this->intEscuelaSecundaria = $this->EscuelaSecundariaObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objComedorObject esta Guardado
            if(is_null($this->intComedor)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->ComedorObject))
                try{
                    if(!is_null($this->ComedorObject->Comedor))
                        $this->intComedor = $this->ComedorObject->Comedor;
                    else
                        $this->intComedor = $this->ComedorObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objCentroIntegracionComunitariaObject esta Guardado
            if(is_null($this->intCentroIntegracionComunitaria)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->CentroIntegracionComunitariaObject))
                try{
                    if(!is_null($this->CentroIntegracionComunitariaObject->CentroIntegracionComunitaria))
                        $this->intCentroIntegracionComunitaria = $this->CentroIntegracionComunitariaObject->CentroIntegracionComunitaria;
                    else
                        $this->intCentroIntegracionComunitaria = $this->CentroIntegracionComunitariaObject->Save();
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
                    if ($this->intUnidadSanitaria && ($this->intUnidadSanitaria > QDatabaseNumberFieldMax::Integer || $this->intUnidadSanitaria < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intUnidadSanitaria', QDatabaseFieldType::Integer);
                    }
                    if ($this->intJardinInfantes && ($this->intJardinInfantes > QDatabaseNumberFieldMax::Integer || $this->intJardinInfantes < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intJardinInfantes', QDatabaseFieldType::Integer);
                    }
                    if ($this->intEscuelaPrimaria && ($this->intEscuelaPrimaria > QDatabaseNumberFieldMax::Integer || $this->intEscuelaPrimaria < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEscuelaPrimaria', QDatabaseFieldType::Integer);
                    }
                    if ($this->intEscuelaSecundaria && ($this->intEscuelaSecundaria > QDatabaseNumberFieldMax::Integer || $this->intEscuelaSecundaria < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEscuelaSecundaria', QDatabaseFieldType::Integer);
                    }
                    if ($this->intComedor && ($this->intComedor > QDatabaseNumberFieldMax::Integer || $this->intComedor < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intComedor', QDatabaseFieldType::Integer);
                    }
                    if ($this->intCentroIntegracionComunitaria && ($this->intCentroIntegracionComunitaria > QDatabaseNumberFieldMax::Integer || $this->intCentroIntegracionComunitaria < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intCentroIntegracionComunitaria', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "equipamiento" (
                            "id_folio",
                            "unidad_sanitaria",
                            "jardin_infantes",
                            "escuela_primaria",
                            "escuela_secundaria",
                            "comedor",
                            "centro_integracion_comunitaria",
                            "otro"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->intUnidadSanitaria) . ',
                            ' . $objDatabase->SqlVariable($this->intJardinInfantes) . ',
                            ' . $objDatabase->SqlVariable($this->intEscuelaPrimaria) . ',
                            ' . $objDatabase->SqlVariable($this->intEscuelaSecundaria) . ',
                            ' . $objDatabase->SqlVariable($this->intComedor) . ',
                            ' . $objDatabase->SqlVariable($this->intCentroIntegracionComunitaria) . ',
                            ' . $objDatabase->SqlVariable($this->strOtro) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('equipamiento', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "equipamiento"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "unidad_sanitaria" = ' . $objDatabase->SqlVariable($this->intUnidadSanitaria) . ',
                            "jardin_infantes" = ' . $objDatabase->SqlVariable($this->intJardinInfantes) . ',
                            "escuela_primaria" = ' . $objDatabase->SqlVariable($this->intEscuelaPrimaria) . ',
                            "escuela_secundaria" = ' . $objDatabase->SqlVariable($this->intEscuelaSecundaria) . ',
                            "comedor" = ' . $objDatabase->SqlVariable($this->intComedor) . ',
                            "centro_integracion_comunitaria" = ' . $objDatabase->SqlVariable($this->intCentroIntegracionComunitaria) . ',
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
		 * Delete this Equipamiento
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Equipamiento with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Equipamiento::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Equipamientos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Equipamiento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"');
		}

		/**
		 * Truncate equipamiento table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Equipamiento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "equipamiento" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Equipamiento from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Equipamiento object.');

			// Reload the Object
			$objReloaded = Equipamiento::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->UnidadSanitaria = $objReloaded->UnidadSanitaria;
			$this->JardinInfantes = $objReloaded->JardinInfantes;
			$this->EscuelaPrimaria = $objReloaded->EscuelaPrimaria;
			$this->EscuelaSecundaria = $objReloaded->EscuelaSecundaria;
			$this->Comedor = $objReloaded->Comedor;
			$this->CentroIntegracionComunitaria = $objReloaded->CentroIntegracionComunitaria;
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

            case 'UnidadSanitaria':
                /**
                 * Gets the value for intUnidadSanitaria 
                 * @return integer
                 */
                return $this->intUnidadSanitaria;

            case 'JardinInfantes':
                /**
                 * Gets the value for intJardinInfantes 
                 * @return integer
                 */
                return $this->intJardinInfantes;

            case 'EscuelaPrimaria':
                /**
                 * Gets the value for intEscuelaPrimaria 
                 * @return integer
                 */
                return $this->intEscuelaPrimaria;

            case 'EscuelaSecundaria':
                /**
                 * Gets the value for intEscuelaSecundaria 
                 * @return integer
                 */
                return $this->intEscuelaSecundaria;

            case 'Comedor':
                /**
                 * Gets the value for intComedor 
                 * @return integer
                 */
                return $this->intComedor;

            case 'CentroIntegracionComunitaria':
                /**
                 * Gets the value for intCentroIntegracionComunitaria 
                 * @return integer
                 */
                return $this->intCentroIntegracionComunitaria;

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

            case 'UnidadSanitariaObject':
                /**
                 * Gets the value for the OpcionesEquipamientos object referenced by intUnidadSanitaria 
                 * @return OpcionesEquipamientos
                 */
                try {
                    if ((!$this->objUnidadSanitariaObject) && (!is_null($this->intUnidadSanitaria)))
                        $this->objUnidadSanitariaObject = OpcionesEquipamientos::Load($this->intUnidadSanitaria);
                    return $this->objUnidadSanitariaObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'JardinInfantesObject':
                /**
                 * Gets the value for the OpcionesEquipamientos object referenced by intJardinInfantes 
                 * @return OpcionesEquipamientos
                 */
                try {
                    if ((!$this->objJardinInfantesObject) && (!is_null($this->intJardinInfantes)))
                        $this->objJardinInfantesObject = OpcionesEquipamientos::Load($this->intJardinInfantes);
                    return $this->objJardinInfantesObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'EscuelaPrimariaObject':
                /**
                 * Gets the value for the OpcionesEquipamientos object referenced by intEscuelaPrimaria 
                 * @return OpcionesEquipamientos
                 */
                try {
                    if ((!$this->objEscuelaPrimariaObject) && (!is_null($this->intEscuelaPrimaria)))
                        $this->objEscuelaPrimariaObject = OpcionesEquipamientos::Load($this->intEscuelaPrimaria);
                    return $this->objEscuelaPrimariaObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'EscuelaSecundariaObject':
                /**
                 * Gets the value for the OpcionesEquipamientos object referenced by intEscuelaSecundaria 
                 * @return OpcionesEquipamientos
                 */
                try {
                    if ((!$this->objEscuelaSecundariaObject) && (!is_null($this->intEscuelaSecundaria)))
                        $this->objEscuelaSecundariaObject = OpcionesEquipamientos::Load($this->intEscuelaSecundaria);
                    return $this->objEscuelaSecundariaObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'ComedorObject':
                /**
                 * Gets the value for the OpcionesEquipamientos object referenced by intComedor 
                 * @return OpcionesEquipamientos
                 */
                try {
                    if ((!$this->objComedorObject) && (!is_null($this->intComedor)))
                        $this->objComedorObject = OpcionesEquipamientos::Load($this->intComedor);
                    return $this->objComedorObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'CentroIntegracionComunitariaObject':
                /**
                 * Gets the value for the OpcionesEquipamientos object referenced by intCentroIntegracionComunitaria 
                 * @return OpcionesEquipamientos
                 */
                try {
                    if ((!$this->objCentroIntegracionComunitariaObject) && (!is_null($this->intCentroIntegracionComunitaria)))
                        $this->objCentroIntegracionComunitariaObject = OpcionesEquipamientos::Load($this->intCentroIntegracionComunitaria);
                    return $this->objCentroIntegracionComunitariaObject;
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

				case 'UnidadSanitaria':
					/**
					 * Sets the value for intUnidadSanitaria 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUnidadSanitariaObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intUnidadSanitaria = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intUnidadSanitaria = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'JardinInfantes':
					/**
					 * Sets the value for intJardinInfantes 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objJardinInfantesObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intJardinInfantes = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intJardinInfantes = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EscuelaPrimaria':
					/**
					 * Sets the value for intEscuelaPrimaria 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEscuelaPrimariaObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEscuelaPrimaria = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEscuelaPrimaria = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EscuelaSecundaria':
					/**
					 * Sets the value for intEscuelaSecundaria 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEscuelaSecundariaObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEscuelaSecundaria = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEscuelaSecundaria = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Comedor':
					/**
					 * Sets the value for intComedor 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objComedorObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intComedor = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intComedor = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CentroIntegracionComunitaria':
					/**
					 * Sets the value for intCentroIntegracionComunitaria 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCentroIntegracionComunitariaObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intCentroIntegracionComunitaria = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intCentroIntegracionComunitaria = $mixValue);
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Equipamiento');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->IdFolio;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UnidadSanitariaObject':
					/**
					 * Sets the value for the OpcionesEquipamientos object referenced by intUnidadSanitaria 
					 * @param OpcionesEquipamientos $mixValue
					 * @return OpcionesEquipamientos
					 */
					if (is_null($mixValue)) {
						$this->intUnidadSanitaria = null;
						$this->objUnidadSanitariaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEquipamientos object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEquipamientos');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEquipamientos object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved UnidadSanitariaObject for this Equipamiento');

						// Update Local Member Variables
						$this->objUnidadSanitariaObject = $mixValue;
						$this->intUnidadSanitaria = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'JardinInfantesObject':
					/**
					 * Sets the value for the OpcionesEquipamientos object referenced by intJardinInfantes 
					 * @param OpcionesEquipamientos $mixValue
					 * @return OpcionesEquipamientos
					 */
					if (is_null($mixValue)) {
						$this->intJardinInfantes = null;
						$this->objJardinInfantesObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEquipamientos object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEquipamientos');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEquipamientos object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved JardinInfantesObject for this Equipamiento');

						// Update Local Member Variables
						$this->objJardinInfantesObject = $mixValue;
						$this->intJardinInfantes = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EscuelaPrimariaObject':
					/**
					 * Sets the value for the OpcionesEquipamientos object referenced by intEscuelaPrimaria 
					 * @param OpcionesEquipamientos $mixValue
					 * @return OpcionesEquipamientos
					 */
					if (is_null($mixValue)) {
						$this->intEscuelaPrimaria = null;
						$this->objEscuelaPrimariaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEquipamientos object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEquipamientos');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEquipamientos object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved EscuelaPrimariaObject for this Equipamiento');

						// Update Local Member Variables
						$this->objEscuelaPrimariaObject = $mixValue;
						$this->intEscuelaPrimaria = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EscuelaSecundariaObject':
					/**
					 * Sets the value for the OpcionesEquipamientos object referenced by intEscuelaSecundaria 
					 * @param OpcionesEquipamientos $mixValue
					 * @return OpcionesEquipamientos
					 */
					if (is_null($mixValue)) {
						$this->intEscuelaSecundaria = null;
						$this->objEscuelaSecundariaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEquipamientos object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEquipamientos');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEquipamientos object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved EscuelaSecundariaObject for this Equipamiento');

						// Update Local Member Variables
						$this->objEscuelaSecundariaObject = $mixValue;
						$this->intEscuelaSecundaria = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ComedorObject':
					/**
					 * Sets the value for the OpcionesEquipamientos object referenced by intComedor 
					 * @param OpcionesEquipamientos $mixValue
					 * @return OpcionesEquipamientos
					 */
					if (is_null($mixValue)) {
						$this->intComedor = null;
						$this->objComedorObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEquipamientos object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEquipamientos');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEquipamientos object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved ComedorObject for this Equipamiento');

						// Update Local Member Variables
						$this->objComedorObject = $mixValue;
						$this->intComedor = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CentroIntegracionComunitariaObject':
					/**
					 * Sets the value for the OpcionesEquipamientos object referenced by intCentroIntegracionComunitaria 
					 * @param OpcionesEquipamientos $mixValue
					 * @return OpcionesEquipamientos
					 */
					if (is_null($mixValue)) {
						$this->intCentroIntegracionComunitaria = null;
						$this->objCentroIntegracionComunitariaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEquipamientos object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEquipamientos');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEquipamientos object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved CentroIntegracionComunitariaObject for this Equipamiento');

						// Update Local Member Variables
						$this->objCentroIntegracionComunitariaObject = $mixValue;
						$this->intCentroIntegracionComunitaria = $mixValue->Id;

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
			$strToReturn = '<complexType name="Equipamiento"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:CondicionesSocioUrbanisticas"/>';
			$strToReturn .= '<element name="UnidadSanitariaObject" type="xsd1:OpcionesEquipamientos"/>';
			$strToReturn .= '<element name="JardinInfantesObject" type="xsd1:OpcionesEquipamientos"/>';
			$strToReturn .= '<element name="EscuelaPrimariaObject" type="xsd1:OpcionesEquipamientos"/>';
			$strToReturn .= '<element name="EscuelaSecundariaObject" type="xsd1:OpcionesEquipamientos"/>';
			$strToReturn .= '<element name="ComedorObject" type="xsd1:OpcionesEquipamientos"/>';
			$strToReturn .= '<element name="CentroIntegracionComunitariaObject" type="xsd1:OpcionesEquipamientos"/>';
			$strToReturn .= '<element name="Otro" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Equipamiento', $strComplexTypeArray)) {
				$strComplexTypeArray['Equipamiento'] = Equipamiento::GetSoapComplexTypeXml();
				$strComplexTypeArray = CondicionesSocioUrbanisticas::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEquipamientos::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEquipamientos::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEquipamientos::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEquipamientos::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEquipamientos::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEquipamientos::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Equipamiento::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Equipamiento();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = CondicionesSocioUrbanisticas::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if ((property_exists($objSoapObject, 'UnidadSanitariaObject')) &&
				($objSoapObject->UnidadSanitariaObject))
				$objToReturn->UnidadSanitariaObject = OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject->UnidadSanitariaObject);
			if ((property_exists($objSoapObject, 'JardinInfantesObject')) &&
				($objSoapObject->JardinInfantesObject))
				$objToReturn->JardinInfantesObject = OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject->JardinInfantesObject);
			if ((property_exists($objSoapObject, 'EscuelaPrimariaObject')) &&
				($objSoapObject->EscuelaPrimariaObject))
				$objToReturn->EscuelaPrimariaObject = OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject->EscuelaPrimariaObject);
			if ((property_exists($objSoapObject, 'EscuelaSecundariaObject')) &&
				($objSoapObject->EscuelaSecundariaObject))
				$objToReturn->EscuelaSecundariaObject = OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject->EscuelaSecundariaObject);
			if ((property_exists($objSoapObject, 'ComedorObject')) &&
				($objSoapObject->ComedorObject))
				$objToReturn->ComedorObject = OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject->ComedorObject);
			if ((property_exists($objSoapObject, 'CentroIntegracionComunitariaObject')) &&
				($objSoapObject->CentroIntegracionComunitariaObject))
				$objToReturn->CentroIntegracionComunitariaObject = OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject->CentroIntegracionComunitariaObject);
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
				array_push($objArrayToReturn, Equipamiento::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = CondicionesSocioUrbanisticas::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->objUnidadSanitariaObject)
				$objObject->objUnidadSanitariaObject = OpcionesEquipamientos::GetSoapObjectFromObject($objObject->objUnidadSanitariaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUnidadSanitaria = null;
			if ($objObject->objJardinInfantesObject)
				$objObject->objJardinInfantesObject = OpcionesEquipamientos::GetSoapObjectFromObject($objObject->objJardinInfantesObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intJardinInfantes = null;
			if ($objObject->objEscuelaPrimariaObject)
				$objObject->objEscuelaPrimariaObject = OpcionesEquipamientos::GetSoapObjectFromObject($objObject->objEscuelaPrimariaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEscuelaPrimaria = null;
			if ($objObject->objEscuelaSecundariaObject)
				$objObject->objEscuelaSecundariaObject = OpcionesEquipamientos::GetSoapObjectFromObject($objObject->objEscuelaSecundariaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEscuelaSecundaria = null;
			if ($objObject->objComedorObject)
				$objObject->objComedorObject = OpcionesEquipamientos::GetSoapObjectFromObject($objObject->objComedorObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intComedor = null;
			if ($objObject->objCentroIntegracionComunitariaObject)
				$objObject->objCentroIntegracionComunitariaObject = OpcionesEquipamientos::GetSoapObjectFromObject($objObject->objCentroIntegracionComunitariaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCentroIntegracionComunitaria = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>