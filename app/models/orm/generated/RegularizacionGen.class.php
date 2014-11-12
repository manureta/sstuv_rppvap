<?php
/**
 * The abstract RegularizacionGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Regularizacion subclass which
 * extends this RegularizacionGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Regularizacion class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio (Unique)
	 * @property boolean $ProcesoIniciado the value for blnProcesoIniciado 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (Unique)
	 * @property Antecedentes $AntecedentesAsIdFolio the value for the Antecedentes object that uniquely references this Regularizacion
	 * @property-read EncuadreLegal $EncuadreLegalAsIdFolio the value for the private _objEncuadreLegalAsIdFolio (Read-Only) if set due to an expansion on the encuadre_legal.id_folio reverse relationship
	 * @property-read EncuadreLegal[] $EncuadreLegalAsIdFolioArray the value for the private _objEncuadreLegalAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the encuadre_legal.id_folio reverse relationship
	 * @property-read Registracion $RegistracionAsIdFolio the value for the private _objRegistracionAsIdFolio (Read-Only) if set due to an expansion on the registracion.id_folio reverse relationship
	 * @property-read Registracion[] $RegistracionAsIdFolioArray the value for the private _objRegistracionAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the registracion.id_folio reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class RegularizacionGen extends QBaseClass {

    public static function Noun() {
        return 'Regularizacion';
    }
    public static function NounPlural() {
        return 'Regularizaciones';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column regularizacion.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'regularizacion_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column regularizacion.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column regularizacion.proceso_iniciado
     * @var boolean blnProcesoIniciado
     */
    protected $blnProcesoIniciado;
    const ProcesoIniciadoDefault = null;


    /**
     * Private member variable that stores a reference to a single EncuadreLegalAsIdFolio object
     * (of type EncuadreLegal), if this Regularizacion object was restored with
     * an expansion on the encuadre_legal association table.
     * @var EncuadreLegal _objEncuadreLegalAsIdFolio;
     */
    protected $objEncuadreLegalAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of EncuadreLegalAsIdFolio objects
     * (of type EncuadreLegal[]), if this Regularizacion object was restored with
     * an ExpandAsArray on the encuadre_legal association table.
     * @var EncuadreLegal[] _objEncuadreLegalAsIdFolioArray;
     */
    protected $objEncuadreLegalAsIdFolioArray;

    /**
     * Private member variable that stores a reference to a single RegistracionAsIdFolio object
     * (of type Registracion), if this Regularizacion object was restored with
     * an expansion on the registracion association table.
     * @var Registracion _objRegistracionAsIdFolio;
     */
    protected $objRegistracionAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of RegistracionAsIdFolio objects
     * (of type Registracion[]), if this Regularizacion object was restored with
     * an ExpandAsArray on the registracion association table.
     * @var Registracion[] _objRegistracionAsIdFolioArray;
     */
    protected $objRegistracionAsIdFolioArray;

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
		 * in the database column regularizacion.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this Folio object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Folio objIdFolioObject
		 */
		protected $objIdFolioObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column antecedentes.id_folio.
		 *
		 * NOTE: Always use the AntecedentesAsIdFolio property getter to correctly retrieve this Antecedentes object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Antecedentes objAntecedentesAsIdFolio
		 */
		protected $objAntecedentesAsIdFolio;
		
		/**
		 * Used internally to manage whether the adjoined AntecedentesAsIdFolio object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyAntecedentesAsIdFolio;



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
                protected static $_objRegularizacionArray = array();


		/**
		 * Load a Regularizacion from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Regularizacion
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Regularizacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Regularizacion()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objRegularizacionArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpRegularizacion = Regularizacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Regularizacion()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objRegularizacionArray["$intId"] = $objTmpRegularizacion;
            }
                        }
                        return isset(self::$_objRegularizacionArray["$intId"])?self::$_objRegularizacionArray["$intId"]:null;
		}

		/**
		 * Load all Regularizaciones
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Regularizacion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Regularizacion::QueryArray to perform the LoadAll query
			try {
				return Regularizacion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Regularizaciones
		 * @return int
		 */
		public static function CountAll() {
			// Call Regularizacion::QueryCount to perform the CountAll query
			return Regularizacion::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Regularizacion::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Regularizacion()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Regularizacion()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Regularizacion no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Regularizacion::GetDatabase();

			// Create/Build out the QueryBuilder object with Regularizacion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'regularizacion');
			Regularizacion::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('regularizacion');

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
		 * Static Qcubed Query method to query for a single Regularizacion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Regularizacion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Regularizacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Regularizacion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Regularizacion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Regularizacion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Regularizacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Regularizacion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Regularizacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Regularizacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Regularizacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Regularizacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Regularizacion::GetDatabase();

			$strQuery = Regularizacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/regularizacion', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Regularizacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Regularizacion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'regularizacion';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'proceso_iniciado', $strAliasPrefix . 'proceso_iniciado');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Regularizacion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Regularizacion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Regularizacion
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
							$strAliasPrefix = 'regularizacion__';


						// Expanding reverse references: EncuadreLegalAsIdFolio
						$strAlias = $strAliasPrefix . 'encuadrelegalasidfolio__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objEncuadreLegalAsIdFolioArray)) {
								$objPreviousChildItems = $objPreviousItem->objEncuadreLegalAsIdFolioArray;
								$objChildItem = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasidfolio__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objEncuadreLegalAsIdFolioArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objEncuadreLegalAsIdFolioArray[] = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: RegistracionAsIdFolio
						$strAlias = $strAliasPrefix . 'registracionasidfolio__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objRegistracionAsIdFolioArray)) {
								$objPreviousChildItems = $objPreviousItem->objRegistracionAsIdFolioArray;
								$objChildItem = Registracion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registracionasidfolio__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objRegistracionAsIdFolioArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objRegistracionAsIdFolioArray[] = Registracion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registracionasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'regularizacion__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Regularizacion object
			$objToReturn = new Regularizacion();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'proceso_iniciado', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'proceso_iniciado'] : $strAliasPrefix . 'proceso_iniciado';
			$objToReturn->blnProcesoIniciado = $objDbRow->GetColumn($strAliasName, 'Bit');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objAntecedentesAsIdFolioArray, $objToReturn->objAntecedentesAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objEncuadreLegalAsIdFolioArray, $objToReturn->objEncuadreLegalAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objRegistracionAsIdFolioArray, $objToReturn->objRegistracionAsIdFolioArray) != null) {
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
				$strAliasPrefix = 'regularizacion__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for AntecedentesAsIdFolio Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'antecedentesasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objAntecedentesAsIdFolio = Antecedentes::InstantiateDbRow($objDbRow, $strAliasPrefix . 'antecedentesasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objAntecedentesAsIdFolio = false;
			}



			// Check for EncuadreLegalAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'encuadrelegalasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEncuadreLegalAsIdFolioArray[] = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEncuadreLegalAsIdFolio = EncuadreLegal::InstantiateDbRow($objDbRow, $strAliasPrefix . 'encuadrelegalasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RegistracionAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'registracionasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objRegistracionAsIdFolioArray[] = Registracion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registracionasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objRegistracionAsIdFolio = Registracion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registracionasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Regularizaciones from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Regularizacion[]
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
					$objItem = Regularizacion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Regularizacion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Regularizacion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Regularizacion
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Regularizacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Regularizacion()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Regularizacion object,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Regularizacion
		*/
		public static function LoadByIdFolio($intIdFolio, $objOptionalClauses = null) {
			return Regularizacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Regularizacion()->IdFolio, $intIdFolio)
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
         * Save this Regularizacion
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Regularizacion::GetDatabase();

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
                        INSERT INTO "regularizacion" (
                            "id_folio",
                            "proceso_iniciado"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnProcesoIniciado) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('regularizacion', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "regularizacion"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "proceso_iniciado" = ' . $objDatabase->SqlVariable($this->blnProcesoIniciado) . '
                        WHERE
                            "id" = ' . $objDatabase->SqlVariable($this->intId) . '
                    ');
                }

        
        
                // Update the adjoined AntecedentesAsIdFolio object (if applicable)
                // TODO: Make this into hard-coded SQL queries
                if ($this->blnDirtyAntecedentesAsIdFolio) {
                    // Unassociate the old one (if applicable)
                    if ($objAssociated = Antecedentes::LoadByIdFolio($this->intId)) {
                        $objAssociated->IdFolio = null;
                        $objAssociated->Save();
                    }

                    // Associate the new one (if applicable)
                    if ($this->objAntecedentesAsIdFolio) {
                        $this->objAntecedentesAsIdFolio->IdFolio = $this->intId;
                        $this->objAntecedentesAsIdFolio->Save();
                    }

                    // Reset the "Dirty" flag
                    $this->blnDirtyAntecedentesAsIdFolio = false;
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
		 * Delete this Regularizacion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Regularizacion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			
			
			// Update the adjoined AntecedentesAsIdFolio object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Antecedentes::LoadByIdFolio($this->intId)) {
				$objAssociated->IdFolio = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"regularizacion"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Regularizaciones
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"regularizacion"');
		}

		/**
		 * Truncate regularizacion table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "regularizacion" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Regularizacion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Regularizacion object.');

			// Reload the Object
			$objReloaded = Regularizacion::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->blnProcesoIniciado = $objReloaded->blnProcesoIniciado;
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
                 * Gets the value for intIdFolio (Unique)
                 * @return integer
                 */
                return $this->intIdFolio;

            case 'ProcesoIniciado':
                /**
                 * Gets the value for blnProcesoIniciado 
                 * @return boolean
                 */
                return $this->blnProcesoIniciado;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Folio object referenced by intIdFolio (Unique)
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

    
    
            case 'AntecedentesAsIdFolio':
                /**
                 * Gets the value for the Antecedentes object that uniquely references this Regularizacion
                 * by objAntecedentesAsIdFolio (Unique)
                 * @return Antecedentes
                 */
                try {
                    if ($this->objAntecedentesAsIdFolio === false)
                        // We've attempted early binding -- and the reverse reference object does not exist
                        return null;
                    if (!$this->objAntecedentesAsIdFolio)
                        $this->objAntecedentesAsIdFolio = Antecedentes::LoadByIdFolio($this->intId);
                    return $this->objAntecedentesAsIdFolio;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }


            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'EncuadreLegalAsIdFolio':
                /**
                 * Gets the value for the private _objEncuadreLegalAsIdFolio (Read-Only)
                 * if set due to an expansion on the encuadre_legal.id_folio reverse relationship
                 * @return EncuadreLegal
                 */
                return $this->objEncuadreLegalAsIdFolio;

            case 'EncuadreLegalAsIdFolioArray':
                /**
                 * Gets the value for the private _objEncuadreLegalAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the encuadre_legal.id_folio reverse relationship
                 * @return EncuadreLegal[]
                 */
                if(is_null($this->objEncuadreLegalAsIdFolioArray))
                    $this->objEncuadreLegalAsIdFolioArray = $this->GetEncuadreLegalAsIdFolioArray();
                return (array) $this->objEncuadreLegalAsIdFolioArray;

            case 'RegistracionAsIdFolio':
                /**
                 * Gets the value for the private _objRegistracionAsIdFolio (Read-Only)
                 * if set due to an expansion on the registracion.id_folio reverse relationship
                 * @return Registracion
                 */
                return $this->objRegistracionAsIdFolio;

            case 'RegistracionAsIdFolioArray':
                /**
                 * Gets the value for the private _objRegistracionAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the registracion.id_folio reverse relationship
                 * @return Registracion[]
                 */
                if(is_null($this->objRegistracionAsIdFolioArray))
                    $this->objRegistracionAsIdFolioArray = $this->GetRegistracionAsIdFolioArray();
                return (array) $this->objRegistracionAsIdFolioArray;


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
					 * Sets the value for intIdFolio (Unique)
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

				case 'ProcesoIniciado':
					/**
					 * Sets the value for blnProcesoIniciado 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnProcesoIniciado = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnProcesoIniciado = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Folio object referenced by intIdFolio (Unique)
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Regularizacion');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AntecedentesAsIdFolio':
					/**
					 * Sets the value for the Antecedentes object referenced by objAntecedentesAsIdFolio (Unique)
					 * @param Antecedentes $mixValue
					 * @return Antecedentes
					 */
					if (is_null($mixValue)) {
						$this->objAntecedentesAsIdFolio = null;

						// Make sure we update the adjoined Antecedentes object the next time we call Save()
						$this->blnDirtyAntecedentesAsIdFolio = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Antecedentes object
						try {
							$mixValue = QType::Cast($mixValue, 'Antecedentes');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objAntecedentesAsIdFolio to a DIFFERENT $mixValue?
						if ((!$this->AntecedentesAsIdFolio) || ($this->AntecedentesAsIdFolio->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Antecedentes object the next time we call Save()
							$this->blnDirtyAntecedentesAsIdFolio = true;

							// Update Local Member Variable
							$this->objAntecedentesAsIdFolio = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
        
			
		
		// Related Objects' Methods for EncuadreLegalAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EncuadreLegalAsIdFolioArray
                /**
                * Add a Item to the _EncuadreLegalAsIdFolioArray
                * @param EncuadreLegal $objItem
                * @return EncuadreLegal[]
                */
                public function AddEncuadreLegalAsIdFolio(EncuadreLegal $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objEncuadreLegalAsIdFolioArray = $this->EncuadreLegalAsIdFolioArray;
                    $this->objEncuadreLegalAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEncuadreLegalAsIdFolio($objItem);

                    return $this->EncuadreLegalAsIdFolioArray;
                }

                /**
                * Remove a Item to the _EncuadreLegalAsIdFolioArray
                * @param EncuadreLegal $objItem
                * @return EncuadreLegal[]
                */
                public function RemoveEncuadreLegalAsIdFolio(EncuadreLegal $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEncuadreLegalAsIdFolioArray;
                    $this->objEncuadreLegalAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEncuadreLegalAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEncuadreLegalAsIdFolio($objItem);
                        }

                    return $this->objEncuadreLegalAsIdFolioArray;
                }

		/**
		 * Gets all associated EncuadreLegalesAsIdFolio as an array of EncuadreLegal objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EncuadreLegal[]
		*/ 
		public function GetEncuadreLegalAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return EncuadreLegal::LoadArrayByIdFolio($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EncuadreLegalesAsIdFolio
		 * @return int
		*/ 
		public function CountEncuadreLegalesAsIdFolio() {
			if ((is_null($this->intId)))
				return 0;

			return EncuadreLegal::CountByIdFolio($this->intId);
		}

		/**
		 * Associates a EncuadreLegalAsIdFolio
		 * @param EncuadreLegal $objEncuadreLegal
		 * @return void
		*/ 
		public function AssociateEncuadreLegalAsIdFolio(EncuadreLegal $objEncuadreLegal) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEncuadreLegalAsIdFolio on this unsaved Regularizacion.');
			if ((is_null($objEncuadreLegal->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEncuadreLegalAsIdFolio on this Regularizacion with an unsaved EncuadreLegal.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"encuadre_legal"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEncuadreLegal->Id) . '
			');
		}

		/**
		 * Unassociates a EncuadreLegalAsIdFolio
		 * @param EncuadreLegal $objEncuadreLegal
		 * @return void
		*/ 
		public function UnassociateEncuadreLegalAsIdFolio(EncuadreLegal $objEncuadreLegal) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsIdFolio on this unsaved Regularizacion.');
			if ((is_null($objEncuadreLegal->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsIdFolio on this Regularizacion with an unsaved EncuadreLegal.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"encuadre_legal"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEncuadreLegal->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EncuadreLegalesAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllEncuadreLegalesAsIdFolio() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsIdFolio on this unsaved Regularizacion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"encuadre_legal"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EncuadreLegalAsIdFolio
		 * @param EncuadreLegal $objEncuadreLegal
		 * @return void
		*/ 
		public function DeleteAssociatedEncuadreLegalAsIdFolio(EncuadreLegal $objEncuadreLegal) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsIdFolio on this unsaved Regularizacion.');
			if ((is_null($objEncuadreLegal->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsIdFolio on this Regularizacion with an unsaved EncuadreLegal.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"encuadre_legal"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEncuadreLegal->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EncuadreLegalesAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllEncuadreLegalesAsIdFolio() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEncuadreLegalAsIdFolio on this unsaved Regularizacion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"encuadre_legal"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for RegistracionAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _RegistracionAsIdFolioArray
                /**
                * Add a Item to the _RegistracionAsIdFolioArray
                * @param Registracion $objItem
                * @return Registracion[]
                */
                public function AddRegistracionAsIdFolio(Registracion $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objRegistracionAsIdFolioArray = $this->RegistracionAsIdFolioArray;
                    $this->objRegistracionAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateRegistracionAsIdFolio($objItem);

                    return $this->RegistracionAsIdFolioArray;
                }

                /**
                * Remove a Item to the _RegistracionAsIdFolioArray
                * @param Registracion $objItem
                * @return Registracion[]
                */
                public function RemoveRegistracionAsIdFolio(Registracion $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objRegistracionAsIdFolioArray;
                    $this->objRegistracionAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objRegistracionAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedRegistracionAsIdFolio($objItem);
                        }

                    return $this->objRegistracionAsIdFolioArray;
                }

		/**
		 * Gets all associated RegistracionesAsIdFolio as an array of Registracion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Registracion[]
		*/ 
		public function GetRegistracionAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Registracion::LoadArrayByIdFolio($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RegistracionesAsIdFolio
		 * @return int
		*/ 
		public function CountRegistracionesAsIdFolio() {
			if ((is_null($this->intId)))
				return 0;

			return Registracion::CountByIdFolio($this->intId);
		}

		/**
		 * Associates a RegistracionAsIdFolio
		 * @param Registracion $objRegistracion
		 * @return void
		*/ 
		public function AssociateRegistracionAsIdFolio(Registracion $objRegistracion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistracionAsIdFolio on this unsaved Regularizacion.');
			if ((is_null($objRegistracion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistracionAsIdFolio on this Regularizacion with an unsaved Registracion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"registracion"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objRegistracion->Id) . '
			');
		}

		/**
		 * Unassociates a RegistracionAsIdFolio
		 * @param Registracion $objRegistracion
		 * @return void
		*/ 
		public function UnassociateRegistracionAsIdFolio(Registracion $objRegistracion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistracionAsIdFolio on this unsaved Regularizacion.');
			if ((is_null($objRegistracion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistracionAsIdFolio on this Regularizacion with an unsaved Registracion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"registracion"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objRegistracion->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all RegistracionesAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllRegistracionesAsIdFolio() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistracionAsIdFolio on this unsaved Regularizacion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"registracion"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RegistracionAsIdFolio
		 * @param Registracion $objRegistracion
		 * @return void
		*/ 
		public function DeleteAssociatedRegistracionAsIdFolio(Registracion $objRegistracion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistracionAsIdFolio on this unsaved Regularizacion.');
			if ((is_null($objRegistracion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistracionAsIdFolio on this Regularizacion with an unsaved Registracion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"registracion"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objRegistracion->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated RegistracionesAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllRegistracionesAsIdFolio() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistracionAsIdFolio on this unsaved Regularizacion.');

			// Get the Database Object for this Class
			$objDatabase = Regularizacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"registracion"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Regularizacion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="ProcesoIniciado" type="xsd:boolean"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Regularizacion', $strComplexTypeArray)) {
				$strComplexTypeArray['Regularizacion'] = Regularizacion::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Regularizacion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Regularizacion();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Folio::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'ProcesoIniciado')) {
				$objToReturn->blnProcesoIniciado = $objSoapObject->ProcesoIniciado;
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
				array_push($objArrayToReturn, Regularizacion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = Folio::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>