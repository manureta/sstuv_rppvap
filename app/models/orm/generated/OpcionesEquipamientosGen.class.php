<?php
/**
 * The abstract OpcionesEquipamientosGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the OpcionesEquipamientos subclass which
 * extends this OpcionesEquipamientosGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the OpcionesEquipamientos class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Opcion the value for strOpcion (Not Null)
	 * @property-read Equipamiento $EquipamientoAsCentroIntegracionComunitaria the value for the private _objEquipamientoAsCentroIntegracionComunitaria (Read-Only) if set due to an expansion on the equipamiento.centro_integracion_comunitaria reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsCentroIntegracionComunitariaArray the value for the private _objEquipamientoAsCentroIntegracionComunitariaArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.centro_integracion_comunitaria reverse relationship
	 * @property-read Equipamiento $EquipamientoAsComedor the value for the private _objEquipamientoAsComedor (Read-Only) if set due to an expansion on the equipamiento.comedor reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsComedorArray the value for the private _objEquipamientoAsComedorArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.comedor reverse relationship
	 * @property-read Equipamiento $EquipamientoAsEscuelaPrimaria the value for the private _objEquipamientoAsEscuelaPrimaria (Read-Only) if set due to an expansion on the equipamiento.escuela_primaria reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsEscuelaPrimariaArray the value for the private _objEquipamientoAsEscuelaPrimariaArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.escuela_primaria reverse relationship
	 * @property-read Equipamiento $EquipamientoAsEscuelaSecundaria the value for the private _objEquipamientoAsEscuelaSecundaria (Read-Only) if set due to an expansion on the equipamiento.escuela_secundaria reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsEscuelaSecundariaArray the value for the private _objEquipamientoAsEscuelaSecundariaArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.escuela_secundaria reverse relationship
	 * @property-read Equipamiento $EquipamientoAsJardinInfantes the value for the private _objEquipamientoAsJardinInfantes (Read-Only) if set due to an expansion on the equipamiento.jardin_infantes reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsJardinInfantesArray the value for the private _objEquipamientoAsJardinInfantesArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.jardin_infantes reverse relationship
	 * @property-read Equipamiento $EquipamientoAsSalonUsosMultiples the value for the private _objEquipamientoAsSalonUsosMultiples (Read-Only) if set due to an expansion on the equipamiento.salon_usos_multiples reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsSalonUsosMultiplesArray the value for the private _objEquipamientoAsSalonUsosMultiplesArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.salon_usos_multiples reverse relationship
	 * @property-read Equipamiento $EquipamientoAsUnidadSanitaria the value for the private _objEquipamientoAsUnidadSanitaria (Read-Only) if set due to an expansion on the equipamiento.unidad_sanitaria reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsUnidadSanitariaArray the value for the private _objEquipamientoAsUnidadSanitariaArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.unidad_sanitaria reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class OpcionesEquipamientosGen extends QBaseClass {

    public static function Noun() {
        return 'OpcionesEquipamientos';
    }
    public static function NounPlural() {
        return 'OpcionesEquipamientoses';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column opciones_equipamientos.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'opciones_equipamientos_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column opciones_equipamientos.opcion
     * @var string strOpcion
     */
    protected $strOpcion;
    const OpcionMaxLength = 45;
    const OpcionDefault = null;


    /**
     * Private member variable that stores a reference to a single EquipamientoAsCentroIntegracionComunitaria object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsCentroIntegracionComunitaria;
     */
    protected $objEquipamientoAsCentroIntegracionComunitaria;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsCentroIntegracionComunitaria objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsCentroIntegracionComunitariaArray;
     */
    protected $objEquipamientoAsCentroIntegracionComunitariaArray;

    /**
     * Private member variable that stores a reference to a single EquipamientoAsComedor object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsComedor;
     */
    protected $objEquipamientoAsComedor;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsComedor objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsComedorArray;
     */
    protected $objEquipamientoAsComedorArray;

    /**
     * Private member variable that stores a reference to a single EquipamientoAsEscuelaPrimaria object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsEscuelaPrimaria;
     */
    protected $objEquipamientoAsEscuelaPrimaria;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsEscuelaPrimaria objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsEscuelaPrimariaArray;
     */
    protected $objEquipamientoAsEscuelaPrimariaArray;

    /**
     * Private member variable that stores a reference to a single EquipamientoAsEscuelaSecundaria object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsEscuelaSecundaria;
     */
    protected $objEquipamientoAsEscuelaSecundaria;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsEscuelaSecundaria objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsEscuelaSecundariaArray;
     */
    protected $objEquipamientoAsEscuelaSecundariaArray;

    /**
     * Private member variable that stores a reference to a single EquipamientoAsJardinInfantes object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsJardinInfantes;
     */
    protected $objEquipamientoAsJardinInfantes;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsJardinInfantes objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsJardinInfantesArray;
     */
    protected $objEquipamientoAsJardinInfantesArray;

    /**
     * Private member variable that stores a reference to a single EquipamientoAsSalonUsosMultiples object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsSalonUsosMultiples;
     */
    protected $objEquipamientoAsSalonUsosMultiples;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsSalonUsosMultiples objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsSalonUsosMultiplesArray;
     */
    protected $objEquipamientoAsSalonUsosMultiplesArray;

    /**
     * Private member variable that stores a reference to a single EquipamientoAsUnidadSanitaria object
     * (of type Equipamiento), if this OpcionesEquipamientos object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsUnidadSanitaria;
     */
    protected $objEquipamientoAsUnidadSanitaria;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsUnidadSanitaria objects
     * (of type Equipamiento[]), if this OpcionesEquipamientos object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsUnidadSanitariaArray;
     */
    protected $objEquipamientoAsUnidadSanitariaArray;

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
                protected static $_objOpcionesEquipamientosArray = array();


		/**
		 * Load a OpcionesEquipamientos from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return OpcionesEquipamientos
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  OpcionesEquipamientos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesEquipamientos()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objOpcionesEquipamientosArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpOpcionesEquipamientos = OpcionesEquipamientos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesEquipamientos()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objOpcionesEquipamientosArray["$intId"] = $objTmpOpcionesEquipamientos;
            }
                        }
                        return isset(self::$_objOpcionesEquipamientosArray["$intId"])?self::$_objOpcionesEquipamientosArray["$intId"]:null;
		}

		/**
		 * Load all OpcionesEquipamientoses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesEquipamientos[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OpcionesEquipamientos::QueryArray to perform the LoadAll query
			try {
				return OpcionesEquipamientos::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OpcionesEquipamientoses
		 * @return int
		 */
		public static function CountAll() {
			// Call OpcionesEquipamientos::QueryCount to perform the CountAll query
			return OpcionesEquipamientos::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (OpcionesEquipamientos::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::OpcionesEquipamientos()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::OpcionesEquipamientos()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase OpcionesEquipamientos no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Create/Build out the QueryBuilder object with OpcionesEquipamientos-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'opciones_equipamientos');
			OpcionesEquipamientos::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('opciones_equipamientos');

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
		 * Static Qcubed Query method to query for a single OpcionesEquipamientos object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesEquipamientos the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesEquipamientos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new OpcionesEquipamientos object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OpcionesEquipamientos::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = OpcionesEquipamientos::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of OpcionesEquipamientos objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesEquipamientos[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesEquipamientos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OpcionesEquipamientos::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of OpcionesEquipamientos objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesEquipamientos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			$strQuery = OpcionesEquipamientos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/opcionesequipamientos', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OpcionesEquipamientos::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OpcionesEquipamientos
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'opciones_equipamientos';
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
		 * Instantiate a OpcionesEquipamientos from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OpcionesEquipamientos::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesEquipamientos
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
							$strAliasPrefix = 'opciones_equipamientos__';


						// Expanding reverse references: EquipamientoAsCentroIntegracionComunitaria
						$strAlias = $strAliasPrefix . 'equipamientoascentrointegracioncomunitaria__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsCentroIntegracionComunitariaArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsCentroIntegracionComunitariaArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascentrointegracioncomunitaria__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsCentroIntegracionComunitariaArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsCentroIntegracionComunitariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascentrointegracioncomunitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: EquipamientoAsComedor
						$strAlias = $strAliasPrefix . 'equipamientoascomedor__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsComedorArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsComedorArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascomedor__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsComedorArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsComedorArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascomedor__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: EquipamientoAsEscuelaPrimaria
						$strAlias = $strAliasPrefix . 'equipamientoasescuelaprimaria__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsEscuelaPrimariaArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsEscuelaPrimariaArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelaprimaria__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsEscuelaPrimariaArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsEscuelaPrimariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelaprimaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: EquipamientoAsEscuelaSecundaria
						$strAlias = $strAliasPrefix . 'equipamientoasescuelasecundaria__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsEscuelaSecundariaArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsEscuelaSecundariaArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelasecundaria__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsEscuelaSecundariaArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsEscuelaSecundariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelasecundaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: EquipamientoAsJardinInfantes
						$strAlias = $strAliasPrefix . 'equipamientoasjardininfantes__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsJardinInfantesArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsJardinInfantesArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasjardininfantes__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsJardinInfantesArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsJardinInfantesArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasjardininfantes__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: EquipamientoAsSalonUsosMultiples
						$strAlias = $strAliasPrefix . 'equipamientoassalonusosmultiples__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsSalonUsosMultiplesArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsSalonUsosMultiplesArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoassalonusosmultiples__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsSalonUsosMultiplesArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsSalonUsosMultiplesArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoassalonusosmultiples__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: EquipamientoAsUnidadSanitaria
						$strAlias = $strAliasPrefix . 'equipamientoasunidadsanitaria__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEquipamientoAsUnidadSanitariaArray)) {
								$objPreviousChildItems = $objPreviousItem->objEquipamientoAsUnidadSanitariaArray;
								$objChildItem = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasunidadsanitaria__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEquipamientoAsUnidadSanitariaArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEquipamientoAsUnidadSanitariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasunidadsanitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'opciones_equipamientos__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the OpcionesEquipamientos object
			$objToReturn = new OpcionesEquipamientos();
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
					if (array_diff($objPreviousItem->objEquipamientoAsCentroIntegracionComunitariaArray, $objToReturn->objEquipamientoAsCentroIntegracionComunitariaArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsComedorArray, $objToReturn->objEquipamientoAsComedorArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsEscuelaPrimariaArray, $objToReturn->objEquipamientoAsEscuelaPrimariaArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsEscuelaSecundariaArray, $objToReturn->objEquipamientoAsEscuelaSecundariaArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsJardinInfantesArray, $objToReturn->objEquipamientoAsJardinInfantesArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsSalonUsosMultiplesArray, $objToReturn->objEquipamientoAsSalonUsosMultiplesArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsUnidadSanitariaArray, $objToReturn->objEquipamientoAsUnidadSanitariaArray) != null) {
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
				$strAliasPrefix = 'opciones_equipamientos__';




			// Check for EquipamientoAsCentroIntegracionComunitaria Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoascentrointegracioncomunitaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsCentroIntegracionComunitariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascentrointegracioncomunitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsCentroIntegracionComunitaria = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascentrointegracioncomunitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EquipamientoAsComedor Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoascomedor__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsComedorArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascomedor__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsComedor = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoascomedor__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EquipamientoAsEscuelaPrimaria Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoasescuelaprimaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsEscuelaPrimariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelaprimaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsEscuelaPrimaria = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelaprimaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EquipamientoAsEscuelaSecundaria Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoasescuelasecundaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsEscuelaSecundariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelasecundaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsEscuelaSecundaria = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasescuelasecundaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EquipamientoAsJardinInfantes Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoasjardininfantes__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsJardinInfantesArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasjardininfantes__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsJardinInfantes = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasjardininfantes__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EquipamientoAsSalonUsosMultiples Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoassalonusosmultiples__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsSalonUsosMultiplesArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoassalonusosmultiples__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsSalonUsosMultiples = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoassalonusosmultiples__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EquipamientoAsUnidadSanitaria Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoasunidadsanitaria__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsUnidadSanitariaArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasunidadsanitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsUnidadSanitaria = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasunidadsanitaria__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of OpcionesEquipamientoses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesEquipamientos[]
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
					$objItem = OpcionesEquipamientos::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OpcionesEquipamientos::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single OpcionesEquipamientos object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesEquipamientos
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return OpcionesEquipamientos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesEquipamientos()->Id, $intId)
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
         * Save this OpcionesEquipamientos
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = OpcionesEquipamientos::GetDatabase();

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
                        INSERT INTO "opciones_equipamientos" (
                            "opcion"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strOpcion) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('opciones_equipamientos', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "opciones_equipamientos"
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
		 * Delete this OpcionesEquipamientos
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OpcionesEquipamientos with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_equipamientos"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all OpcionesEquipamientoses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_equipamientos"');
		}

		/**
		 * Truncate opciones_equipamientos table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "opciones_equipamientos" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this OpcionesEquipamientos from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OpcionesEquipamientos object.');

			// Reload the Object
			$objReloaded = OpcionesEquipamientos::Load($this->intId, null, true);

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
                 * Gets the value for strOpcion (Not Null)
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

            case 'EquipamientoAsCentroIntegracionComunitaria':
                /**
                 * Gets the value for the private _objEquipamientoAsCentroIntegracionComunitaria (Read-Only)
                 * if set due to an expansion on the equipamiento.centro_integracion_comunitaria reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsCentroIntegracionComunitaria;

            case 'EquipamientoAsCentroIntegracionComunitariaArray':
                /**
                 * Gets the value for the private _objEquipamientoAsCentroIntegracionComunitariaArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.centro_integracion_comunitaria reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsCentroIntegracionComunitariaArray))
                    $this->objEquipamientoAsCentroIntegracionComunitariaArray = $this->GetEquipamientoAsCentroIntegracionComunitariaArray();
                return (array) $this->objEquipamientoAsCentroIntegracionComunitariaArray;

            case 'EquipamientoAsComedor':
                /**
                 * Gets the value for the private _objEquipamientoAsComedor (Read-Only)
                 * if set due to an expansion on the equipamiento.comedor reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsComedor;

            case 'EquipamientoAsComedorArray':
                /**
                 * Gets the value for the private _objEquipamientoAsComedorArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.comedor reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsComedorArray))
                    $this->objEquipamientoAsComedorArray = $this->GetEquipamientoAsComedorArray();
                return (array) $this->objEquipamientoAsComedorArray;

            case 'EquipamientoAsEscuelaPrimaria':
                /**
                 * Gets the value for the private _objEquipamientoAsEscuelaPrimaria (Read-Only)
                 * if set due to an expansion on the equipamiento.escuela_primaria reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsEscuelaPrimaria;

            case 'EquipamientoAsEscuelaPrimariaArray':
                /**
                 * Gets the value for the private _objEquipamientoAsEscuelaPrimariaArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.escuela_primaria reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsEscuelaPrimariaArray))
                    $this->objEquipamientoAsEscuelaPrimariaArray = $this->GetEquipamientoAsEscuelaPrimariaArray();
                return (array) $this->objEquipamientoAsEscuelaPrimariaArray;

            case 'EquipamientoAsEscuelaSecundaria':
                /**
                 * Gets the value for the private _objEquipamientoAsEscuelaSecundaria (Read-Only)
                 * if set due to an expansion on the equipamiento.escuela_secundaria reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsEscuelaSecundaria;

            case 'EquipamientoAsEscuelaSecundariaArray':
                /**
                 * Gets the value for the private _objEquipamientoAsEscuelaSecundariaArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.escuela_secundaria reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsEscuelaSecundariaArray))
                    $this->objEquipamientoAsEscuelaSecundariaArray = $this->GetEquipamientoAsEscuelaSecundariaArray();
                return (array) $this->objEquipamientoAsEscuelaSecundariaArray;

            case 'EquipamientoAsJardinInfantes':
                /**
                 * Gets the value for the private _objEquipamientoAsJardinInfantes (Read-Only)
                 * if set due to an expansion on the equipamiento.jardin_infantes reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsJardinInfantes;

            case 'EquipamientoAsJardinInfantesArray':
                /**
                 * Gets the value for the private _objEquipamientoAsJardinInfantesArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.jardin_infantes reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsJardinInfantesArray))
                    $this->objEquipamientoAsJardinInfantesArray = $this->GetEquipamientoAsJardinInfantesArray();
                return (array) $this->objEquipamientoAsJardinInfantesArray;

            case 'EquipamientoAsSalonUsosMultiples':
                /**
                 * Gets the value for the private _objEquipamientoAsSalonUsosMultiples (Read-Only)
                 * if set due to an expansion on the equipamiento.salon_usos_multiples reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsSalonUsosMultiples;

            case 'EquipamientoAsSalonUsosMultiplesArray':
                /**
                 * Gets the value for the private _objEquipamientoAsSalonUsosMultiplesArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.salon_usos_multiples reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsSalonUsosMultiplesArray))
                    $this->objEquipamientoAsSalonUsosMultiplesArray = $this->GetEquipamientoAsSalonUsosMultiplesArray();
                return (array) $this->objEquipamientoAsSalonUsosMultiplesArray;

            case 'EquipamientoAsUnidadSanitaria':
                /**
                 * Gets the value for the private _objEquipamientoAsUnidadSanitaria (Read-Only)
                 * if set due to an expansion on the equipamiento.unidad_sanitaria reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsUnidadSanitaria;

            case 'EquipamientoAsUnidadSanitariaArray':
                /**
                 * Gets the value for the private _objEquipamientoAsUnidadSanitariaArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.unidad_sanitaria reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsUnidadSanitariaArray))
                    $this->objEquipamientoAsUnidadSanitariaArray = $this->GetEquipamientoAsUnidadSanitariaArray();
                return (array) $this->objEquipamientoAsUnidadSanitariaArray;


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
					 * Sets the value for strOpcion (Not Null)
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
        
			
		
		// Related Objects' Methods for EquipamientoAsCentroIntegracionComunitaria
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsCentroIntegracionComunitariaArray
                /**
                * Add a Item to the _EquipamientoAsCentroIntegracionComunitariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsCentroIntegracionComunitaria(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->CentroIntegracionComunitariaObject = $this;
                    $this->objEquipamientoAsCentroIntegracionComunitariaArray = $this->EquipamientoAsCentroIntegracionComunitariaArray;
                    $this->objEquipamientoAsCentroIntegracionComunitariaArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsCentroIntegracionComunitaria($objItem);

                    return $this->EquipamientoAsCentroIntegracionComunitariaArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsCentroIntegracionComunitariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsCentroIntegracionComunitaria(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsCentroIntegracionComunitariaArray;
                    $this->objEquipamientoAsCentroIntegracionComunitariaArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsCentroIntegracionComunitariaArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->CentroIntegracionComunitariaObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsCentroIntegracionComunitaria($objItem);
                        }

                    return $this->objEquipamientoAsCentroIntegracionComunitariaArray;
                }

		/**
		 * Gets all associated EquipamientosAsCentroIntegracionComunitaria as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsCentroIntegracionComunitariaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayByCentroIntegracionComunitaria($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsCentroIntegracionComunitaria
		 * @return int
		*/ 
		public function CountEquipamientosAsCentroIntegracionComunitaria() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountByCentroIntegracionComunitaria($this->intId);
		}

		/**
		 * Associates a EquipamientoAsCentroIntegracionComunitaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsCentroIntegracionComunitaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsCentroIntegracionComunitaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsCentroIntegracionComunitaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"centro_integracion_comunitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsCentroIntegracionComunitaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsCentroIntegracionComunitaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsCentroIntegracionComunitaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsCentroIntegracionComunitaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"centro_integracion_comunitaria" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"centro_integracion_comunitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsCentroIntegracionComunitaria
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsCentroIntegracionComunitaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsCentroIntegracionComunitaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"centro_integracion_comunitaria" = null
				WHERE
					"centro_integracion_comunitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsCentroIntegracionComunitaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsCentroIntegracionComunitaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsCentroIntegracionComunitaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsCentroIntegracionComunitaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"centro_integracion_comunitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsCentroIntegracionComunitaria
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsCentroIntegracionComunitaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsCentroIntegracionComunitaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"centro_integracion_comunitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EquipamientoAsComedor
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsComedorArray
                /**
                * Add a Item to the _EquipamientoAsComedorArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsComedor(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->ComedorObject = $this;
                    $this->objEquipamientoAsComedorArray = $this->EquipamientoAsComedorArray;
                    $this->objEquipamientoAsComedorArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsComedor($objItem);

                    return $this->EquipamientoAsComedorArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsComedorArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsComedor(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsComedorArray;
                    $this->objEquipamientoAsComedorArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsComedorArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->ComedorObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsComedor($objItem);
                        }

                    return $this->objEquipamientoAsComedorArray;
                }

		/**
		 * Gets all associated EquipamientosAsComedor as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsComedorArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayByComedor($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsComedor
		 * @return int
		*/ 
		public function CountEquipamientosAsComedor() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountByComedor($this->intId);
		}

		/**
		 * Associates a EquipamientoAsComedor
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsComedor(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsComedor on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsComedor on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"comedor" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsComedor
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsComedor(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsComedor on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsComedor on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"comedor" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"comedor" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsComedor
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsComedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsComedor on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"comedor" = null
				WHERE
					"comedor" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsComedor
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsComedor(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsComedor on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsComedor on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"comedor" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsComedor
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsComedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsComedor on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"comedor" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EquipamientoAsEscuelaPrimaria
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsEscuelaPrimariaArray
                /**
                * Add a Item to the _EquipamientoAsEscuelaPrimariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsEscuelaPrimaria(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->EscuelaPrimariaObject = $this;
                    $this->objEquipamientoAsEscuelaPrimariaArray = $this->EquipamientoAsEscuelaPrimariaArray;
                    $this->objEquipamientoAsEscuelaPrimariaArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsEscuelaPrimaria($objItem);

                    return $this->EquipamientoAsEscuelaPrimariaArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsEscuelaPrimariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsEscuelaPrimaria(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsEscuelaPrimariaArray;
                    $this->objEquipamientoAsEscuelaPrimariaArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsEscuelaPrimariaArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->EscuelaPrimariaObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsEscuelaPrimaria($objItem);
                        }

                    return $this->objEquipamientoAsEscuelaPrimariaArray;
                }

		/**
		 * Gets all associated EquipamientosAsEscuelaPrimaria as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsEscuelaPrimariaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayByEscuelaPrimaria($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsEscuelaPrimaria
		 * @return int
		*/ 
		public function CountEquipamientosAsEscuelaPrimaria() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountByEscuelaPrimaria($this->intId);
		}

		/**
		 * Associates a EquipamientoAsEscuelaPrimaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsEscuelaPrimaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsEscuelaPrimaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsEscuelaPrimaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"escuela_primaria" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsEscuelaPrimaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsEscuelaPrimaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaPrimaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaPrimaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"escuela_primaria" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"escuela_primaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsEscuelaPrimaria
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsEscuelaPrimaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaPrimaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"escuela_primaria" = null
				WHERE
					"escuela_primaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsEscuelaPrimaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsEscuelaPrimaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaPrimaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaPrimaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"escuela_primaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsEscuelaPrimaria
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsEscuelaPrimaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaPrimaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"escuela_primaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EquipamientoAsEscuelaSecundaria
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsEscuelaSecundariaArray
                /**
                * Add a Item to the _EquipamientoAsEscuelaSecundariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsEscuelaSecundaria(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->EscuelaSecundariaObject = $this;
                    $this->objEquipamientoAsEscuelaSecundariaArray = $this->EquipamientoAsEscuelaSecundariaArray;
                    $this->objEquipamientoAsEscuelaSecundariaArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsEscuelaSecundaria($objItem);

                    return $this->EquipamientoAsEscuelaSecundariaArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsEscuelaSecundariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsEscuelaSecundaria(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsEscuelaSecundariaArray;
                    $this->objEquipamientoAsEscuelaSecundariaArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsEscuelaSecundariaArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->EscuelaSecundariaObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsEscuelaSecundaria($objItem);
                        }

                    return $this->objEquipamientoAsEscuelaSecundariaArray;
                }

		/**
		 * Gets all associated EquipamientosAsEscuelaSecundaria as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsEscuelaSecundariaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayByEscuelaSecundaria($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsEscuelaSecundaria
		 * @return int
		*/ 
		public function CountEquipamientosAsEscuelaSecundaria() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountByEscuelaSecundaria($this->intId);
		}

		/**
		 * Associates a EquipamientoAsEscuelaSecundaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsEscuelaSecundaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsEscuelaSecundaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsEscuelaSecundaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"escuela_secundaria" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsEscuelaSecundaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsEscuelaSecundaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaSecundaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaSecundaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"escuela_secundaria" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"escuela_secundaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsEscuelaSecundaria
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsEscuelaSecundaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaSecundaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"escuela_secundaria" = null
				WHERE
					"escuela_secundaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsEscuelaSecundaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsEscuelaSecundaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaSecundaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaSecundaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"escuela_secundaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsEscuelaSecundaria
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsEscuelaSecundaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsEscuelaSecundaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"escuela_secundaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EquipamientoAsJardinInfantes
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsJardinInfantesArray
                /**
                * Add a Item to the _EquipamientoAsJardinInfantesArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsJardinInfantes(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->JardinInfantesObject = $this;
                    $this->objEquipamientoAsJardinInfantesArray = $this->EquipamientoAsJardinInfantesArray;
                    $this->objEquipamientoAsJardinInfantesArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsJardinInfantes($objItem);

                    return $this->EquipamientoAsJardinInfantesArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsJardinInfantesArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsJardinInfantes(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsJardinInfantesArray;
                    $this->objEquipamientoAsJardinInfantesArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsJardinInfantesArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->JardinInfantesObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsJardinInfantes($objItem);
                        }

                    return $this->objEquipamientoAsJardinInfantesArray;
                }

		/**
		 * Gets all associated EquipamientosAsJardinInfantes as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsJardinInfantesArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayByJardinInfantes($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsJardinInfantes
		 * @return int
		*/ 
		public function CountEquipamientosAsJardinInfantes() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountByJardinInfantes($this->intId);
		}

		/**
		 * Associates a EquipamientoAsJardinInfantes
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsJardinInfantes(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsJardinInfantes on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsJardinInfantes on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"jardin_infantes" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsJardinInfantes
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsJardinInfantes(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsJardinInfantes on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsJardinInfantes on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"jardin_infantes" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"jardin_infantes" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsJardinInfantes
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsJardinInfantes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsJardinInfantes on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"jardin_infantes" = null
				WHERE
					"jardin_infantes" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsJardinInfantes
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsJardinInfantes(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsJardinInfantes on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsJardinInfantes on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"jardin_infantes" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsJardinInfantes
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsJardinInfantes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsJardinInfantes on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"jardin_infantes" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EquipamientoAsSalonUsosMultiples
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsSalonUsosMultiplesArray
                /**
                * Add a Item to the _EquipamientoAsSalonUsosMultiplesArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsSalonUsosMultiples(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->SalonUsosMultiplesObject = $this;
                    $this->objEquipamientoAsSalonUsosMultiplesArray = $this->EquipamientoAsSalonUsosMultiplesArray;
                    $this->objEquipamientoAsSalonUsosMultiplesArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsSalonUsosMultiples($objItem);

                    return $this->EquipamientoAsSalonUsosMultiplesArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsSalonUsosMultiplesArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsSalonUsosMultiples(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsSalonUsosMultiplesArray;
                    $this->objEquipamientoAsSalonUsosMultiplesArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsSalonUsosMultiplesArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->SalonUsosMultiplesObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsSalonUsosMultiples($objItem);
                        }

                    return $this->objEquipamientoAsSalonUsosMultiplesArray;
                }

		/**
		 * Gets all associated EquipamientosAsSalonUsosMultiples as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsSalonUsosMultiplesArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayBySalonUsosMultiples($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsSalonUsosMultiples
		 * @return int
		*/ 
		public function CountEquipamientosAsSalonUsosMultiples() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountBySalonUsosMultiples($this->intId);
		}

		/**
		 * Associates a EquipamientoAsSalonUsosMultiples
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsSalonUsosMultiples(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsSalonUsosMultiples on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsSalonUsosMultiples on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"salon_usos_multiples" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsSalonUsosMultiples
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsSalonUsosMultiples(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsSalonUsosMultiples on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsSalonUsosMultiples on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"salon_usos_multiples" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"salon_usos_multiples" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsSalonUsosMultiples
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsSalonUsosMultiples() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsSalonUsosMultiples on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"salon_usos_multiples" = null
				WHERE
					"salon_usos_multiples" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsSalonUsosMultiples
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsSalonUsosMultiples(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsSalonUsosMultiples on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsSalonUsosMultiples on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"salon_usos_multiples" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsSalonUsosMultiples
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsSalonUsosMultiples() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsSalonUsosMultiples on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"salon_usos_multiples" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EquipamientoAsUnidadSanitaria
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsUnidadSanitariaArray
                /**
                * Add a Item to the _EquipamientoAsUnidadSanitariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsUnidadSanitaria(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->UnidadSanitariaObject = $this;
                    $this->objEquipamientoAsUnidadSanitariaArray = $this->EquipamientoAsUnidadSanitariaArray;
                    $this->objEquipamientoAsUnidadSanitariaArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsUnidadSanitaria($objItem);

                    return $this->EquipamientoAsUnidadSanitariaArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsUnidadSanitariaArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsUnidadSanitaria(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsUnidadSanitariaArray;
                    $this->objEquipamientoAsUnidadSanitariaArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsUnidadSanitariaArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->UnidadSanitariaObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsUnidadSanitaria($objItem);
                        }

                    return $this->objEquipamientoAsUnidadSanitariaArray;
                }

		/**
		 * Gets all associated EquipamientosAsUnidadSanitaria as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsUnidadSanitariaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Equipamiento::LoadArrayByUnidadSanitaria($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsUnidadSanitaria
		 * @return int
		*/ 
		public function CountEquipamientosAsUnidadSanitaria() {
			if ((is_null($this->intId)))
				return 0;

			return Equipamiento::CountByUnidadSanitaria($this->intId);
		}

		/**
		 * Associates a EquipamientoAsUnidadSanitaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsUnidadSanitaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsUnidadSanitaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsUnidadSanitaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"unidad_sanitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsUnidadSanitaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsUnidadSanitaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsUnidadSanitaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsUnidadSanitaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"unidad_sanitaria" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"unidad_sanitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsUnidadSanitaria
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsUnidadSanitaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsUnidadSanitaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"unidad_sanitaria" = null
				WHERE
					"unidad_sanitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsUnidadSanitaria
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsUnidadSanitaria(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsUnidadSanitaria on this unsaved OpcionesEquipamientos.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsUnidadSanitaria on this OpcionesEquipamientos with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"unidad_sanitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsUnidadSanitaria
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsUnidadSanitaria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsUnidadSanitaria on this unsaved OpcionesEquipamientos.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesEquipamientos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"unidad_sanitaria" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="OpcionesEquipamientos"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Opcion" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OpcionesEquipamientos', $strComplexTypeArray)) {
				$strComplexTypeArray['OpcionesEquipamientos'] = OpcionesEquipamientos::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OpcionesEquipamientos::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OpcionesEquipamientos();
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
				array_push($objArrayToReturn, OpcionesEquipamientos::GetSoapObjectFromObject($objObject, true));

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