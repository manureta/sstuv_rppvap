<?php
/**
 * The abstract AntecedentesGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Antecedentes subclass which
 * extends this AntecedentesGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Antecedentes class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio (Unique)
	 * @property boolean $SinIntervencion the value for blnSinIntervencion 
	 * @property boolean $ObrasInfraestructura the value for blnObrasInfraestructura 
	 * @property boolean $Equipamientos the value for blnEquipamientos 
	 * @property boolean $IntervencionesEnViviendas the value for blnIntervencionesEnViviendas 
	 * @property string $Otros the value for strOtros 
	 * @property Regularizacion $IdFolioObject the value for the Regularizacion object referenced by intIdFolio (Unique)
	 * @property-read OrganismosDeIntervencion $OrganismosDeIntervencionAsIdFolio the value for the private _objOrganismosDeIntervencionAsIdFolio (Read-Only) if set due to an expansion on the organismos_de_intervencion.id_folio reverse relationship
	 * @property-read OrganismosDeIntervencion[] $OrganismosDeIntervencionAsIdFolioArray the value for the private _objOrganismosDeIntervencionAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the organismos_de_intervencion.id_folio reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class AntecedentesGen extends QBaseClass {

    public static function Noun() {
        return 'Antecedentes';
    }
    public static function NounPlural() {
        return 'Antecedenteses';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column antecedentes.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'antecedentes_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column antecedentes.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column antecedentes.sin_intervencion
     * @var boolean blnSinIntervencion
     */
    protected $blnSinIntervencion;
    const SinIntervencionDefault = null;


    /**
     * Protected member variable that maps to the database column antecedentes.obras_infraestructura
     * @var boolean blnObrasInfraestructura
     */
    protected $blnObrasInfraestructura;
    const ObrasInfraestructuraDefault = null;


    /**
     * Protected member variable that maps to the database column antecedentes.equipamientos
     * @var boolean blnEquipamientos
     */
    protected $blnEquipamientos;
    const EquipamientosDefault = null;


    /**
     * Protected member variable that maps to the database column antecedentes.intervenciones_en_viviendas
     * @var boolean blnIntervencionesEnViviendas
     */
    protected $blnIntervencionesEnViviendas;
    const IntervencionesEnViviendasDefault = null;


    /**
     * Protected member variable that maps to the database column antecedentes.otros
     * @var string strOtros
     */
    protected $strOtros;
    const OtrosMaxLength = 45;
    const OtrosDefault = null;


    /**
     * Private member variable that stores a reference to a single OrganismosDeIntervencionAsIdFolio object
     * (of type OrganismosDeIntervencion), if this Antecedentes object was restored with
     * an expansion on the organismos_de_intervencion association table.
     * @var OrganismosDeIntervencion _objOrganismosDeIntervencionAsIdFolio;
     */
    protected $objOrganismosDeIntervencionAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of OrganismosDeIntervencionAsIdFolio objects
     * (of type OrganismosDeIntervencion[]), if this Antecedentes object was restored with
     * an ExpandAsArray on the organismos_de_intervencion association table.
     * @var OrganismosDeIntervencion[] _objOrganismosDeIntervencionAsIdFolioArray;
     */
    protected $objOrganismosDeIntervencionAsIdFolioArray;

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
		 * in the database column antecedentes.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this Regularizacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Regularizacion objIdFolioObject
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
                protected static $_objAntecedentesArray = array();


		/**
		 * Load a Antecedentes from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Antecedentes
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Antecedentes::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Antecedentes()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objAntecedentesArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpAntecedentes = Antecedentes::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Antecedentes()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objAntecedentesArray["$intId"] = $objTmpAntecedentes;
            }
                        }
                        return isset(self::$_objAntecedentesArray["$intId"])?self::$_objAntecedentesArray["$intId"]:null;
		}

		/**
		 * Load all Antecedenteses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Antecedentes[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Antecedentes::QueryArray to perform the LoadAll query
			try {
				return Antecedentes::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Antecedenteses
		 * @return int
		 */
		public static function CountAll() {
			// Call Antecedentes::QueryCount to perform the CountAll query
			return Antecedentes::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Antecedentes::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Antecedentes()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Antecedentes()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Antecedentes no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Antecedentes::GetDatabase();

			// Create/Build out the QueryBuilder object with Antecedentes-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'antecedentes');
			Antecedentes::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('antecedentes');

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
		 * Static Qcubed Query method to query for a single Antecedentes object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Antecedentes the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Antecedentes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Antecedentes object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Antecedentes::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Antecedentes::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Antecedentes objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Antecedentes[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Antecedentes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Antecedentes::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Antecedentes objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Antecedentes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Antecedentes::GetDatabase();

			$strQuery = Antecedentes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/antecedentes', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Antecedentes::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Antecedentes
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'antecedentes';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'sin_intervencion', $strAliasPrefix . 'sin_intervencion');
			$objBuilder->AddSelectItem($strTableName, 'obras_infraestructura', $strAliasPrefix . 'obras_infraestructura');
			$objBuilder->AddSelectItem($strTableName, 'equipamientos', $strAliasPrefix . 'equipamientos');
			$objBuilder->AddSelectItem($strTableName, 'intervenciones_en_viviendas', $strAliasPrefix . 'intervenciones_en_viviendas');
			$objBuilder->AddSelectItem($strTableName, 'otros', $strAliasPrefix . 'otros');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Antecedentes from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Antecedentes::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Antecedentes
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
							$strAliasPrefix = 'antecedentes__';


						// Expanding reverse references: OrganismosDeIntervencionAsIdFolio
						$strAlias = $strAliasPrefix . 'organismosdeintervencionasidfolio__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objOrganismosDeIntervencionAsIdFolioArray)) {
								$objPreviousChildItems = $objPreviousItem->objOrganismosDeIntervencionAsIdFolioArray;
								$objChildItem = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organismosdeintervencionasidfolio__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objOrganismosDeIntervencionAsIdFolioArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objOrganismosDeIntervencionAsIdFolioArray[] = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organismosdeintervencionasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'antecedentes__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Antecedentes object
			$objToReturn = new Antecedentes();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'sin_intervencion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sin_intervencion'] : $strAliasPrefix . 'sin_intervencion';
			$objToReturn->blnSinIntervencion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'obras_infraestructura', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'obras_infraestructura'] : $strAliasPrefix . 'obras_infraestructura';
			$objToReturn->blnObrasInfraestructura = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'equipamientos', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'equipamientos'] : $strAliasPrefix . 'equipamientos';
			$objToReturn->blnEquipamientos = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'intervenciones_en_viviendas', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'intervenciones_en_viviendas'] : $strAliasPrefix . 'intervenciones_en_viviendas';
			$objToReturn->blnIntervencionesEnViviendas = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'otros', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'otros'] : $strAliasPrefix . 'otros';
			$objToReturn->strOtros = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objOrganismosDeIntervencionAsIdFolioArray, $objToReturn->objOrganismosDeIntervencionAsIdFolioArray) != null) {
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
				$strAliasPrefix = 'antecedentes__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Regularizacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for OrganismosDeIntervencionAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'organismosdeintervencionasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objOrganismosDeIntervencionAsIdFolioArray[] = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organismosdeintervencionasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objOrganismosDeIntervencionAsIdFolio = OrganismosDeIntervencion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organismosdeintervencionasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Antecedenteses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Antecedentes[]
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
					$objItem = Antecedentes::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Antecedentes::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Antecedentes object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Antecedentes
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Antecedentes::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Antecedentes()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Antecedentes object,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Antecedentes
		*/
		public static function LoadByIdFolio($intIdFolio, $objOptionalClauses = null) {
			return Antecedentes::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Antecedentes()->IdFolio, $intIdFolio)
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
         * Save this Antecedentes
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Antecedentes::GetDatabase();

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
                        INSERT INTO "antecedentes" (
                            "id_folio",
                            "sin_intervencion",
                            "obras_infraestructura",
                            "equipamientos",
                            "intervenciones_en_viviendas",
                            "otros"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnSinIntervencion) . ',
                            ' . $objDatabase->SqlVariable($this->blnObrasInfraestructura) . ',
                            ' . $objDatabase->SqlVariable($this->blnEquipamientos) . ',
                            ' . $objDatabase->SqlVariable($this->blnIntervencionesEnViviendas) . ',
                            ' . $objDatabase->SqlVariable($this->strOtros) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('antecedentes', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "antecedentes"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "sin_intervencion" = ' . $objDatabase->SqlVariable($this->blnSinIntervencion) . ',
                            "obras_infraestructura" = ' . $objDatabase->SqlVariable($this->blnObrasInfraestructura) . ',
                            "equipamientos" = ' . $objDatabase->SqlVariable($this->blnEquipamientos) . ',
                            "intervenciones_en_viviendas" = ' . $objDatabase->SqlVariable($this->blnIntervencionesEnViviendas) . ',
                            "otros" = ' . $objDatabase->SqlVariable($this->strOtros) . '
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
		 * Delete this Antecedentes
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Antecedentes with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"antecedentes"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Antecedenteses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"antecedentes"');
		}

		/**
		 * Truncate antecedentes table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "antecedentes" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Antecedentes from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Antecedentes object.');

			// Reload the Object
			$objReloaded = Antecedentes::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->blnSinIntervencion = $objReloaded->blnSinIntervencion;
			$this->blnObrasInfraestructura = $objReloaded->blnObrasInfraestructura;
			$this->blnEquipamientos = $objReloaded->blnEquipamientos;
			$this->blnIntervencionesEnViviendas = $objReloaded->blnIntervencionesEnViviendas;
			$this->strOtros = $objReloaded->strOtros;
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

            case 'SinIntervencion':
                /**
                 * Gets the value for blnSinIntervencion 
                 * @return boolean
                 */
                return $this->blnSinIntervencion;

            case 'ObrasInfraestructura':
                /**
                 * Gets the value for blnObrasInfraestructura 
                 * @return boolean
                 */
                return $this->blnObrasInfraestructura;

            case 'Equipamientos':
                /**
                 * Gets the value for blnEquipamientos 
                 * @return boolean
                 */
                return $this->blnEquipamientos;

            case 'IntervencionesEnViviendas':
                /**
                 * Gets the value for blnIntervencionesEnViviendas 
                 * @return boolean
                 */
                return $this->blnIntervencionesEnViviendas;

            case 'Otros':
                /**
                 * Gets the value for strOtros 
                 * @return string
                 */
                return $this->strOtros;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Regularizacion object referenced by intIdFolio (Unique)
                 * @return Regularizacion
                 */
                try {
                    if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                        $this->objIdFolioObject = Regularizacion::Load($this->intIdFolio);
                    return $this->objIdFolioObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }


            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'OrganismosDeIntervencionAsIdFolio':
                /**
                 * Gets the value for the private _objOrganismosDeIntervencionAsIdFolio (Read-Only)
                 * if set due to an expansion on the organismos_de_intervencion.id_folio reverse relationship
                 * @return OrganismosDeIntervencion
                 */
                return $this->objOrganismosDeIntervencionAsIdFolio;

            case 'OrganismosDeIntervencionAsIdFolioArray':
                /**
                 * Gets the value for the private _objOrganismosDeIntervencionAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the organismos_de_intervencion.id_folio reverse relationship
                 * @return OrganismosDeIntervencion[]
                 */
                if(is_null($this->objOrganismosDeIntervencionAsIdFolioArray))
                    $this->objOrganismosDeIntervencionAsIdFolioArray = $this->GetOrganismosDeIntervencionAsIdFolioArray();
                return (array) $this->objOrganismosDeIntervencionAsIdFolioArray;


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

				case 'SinIntervencion':
					/**
					 * Sets the value for blnSinIntervencion 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSinIntervencion = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSinIntervencion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ObrasInfraestructura':
					/**
					 * Sets the value for blnObrasInfraestructura 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnObrasInfraestructura = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnObrasInfraestructura = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Equipamientos':
					/**
					 * Sets the value for blnEquipamientos 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnEquipamientos = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnEquipamientos = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IntervencionesEnViviendas':
					/**
					 * Sets the value for blnIntervencionesEnViviendas 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnIntervencionesEnViviendas = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnIntervencionesEnViviendas = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Otros':
					/**
					 * Sets the value for strOtros 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOtros = QType::Cast($mixValue, QType::String));
                                                return ($this->strOtros = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Regularizacion object referenced by intIdFolio (Unique)
					 * @param Regularizacion $mixValue
					 * @return Regularizacion
					 */
					if (is_null($mixValue)) {
						$this->intIdFolio = null;
						$this->objIdFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Regularizacion object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Regularizacion');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Regularizacion object
						//if (is_null($mixValue->IdFolio))
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Antecedentes');

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
        
			
		
		// Related Objects' Methods for OrganismosDeIntervencionAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _OrganismosDeIntervencionAsIdFolioArray
                /**
                * Add a Item to the _OrganismosDeIntervencionAsIdFolioArray
                * @param OrganismosDeIntervencion $objItem
                * @return OrganismosDeIntervencion[]
                */
                public function AddOrganismosDeIntervencionAsIdFolio(OrganismosDeIntervencion $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objOrganismosDeIntervencionAsIdFolioArray = $this->OrganismosDeIntervencionAsIdFolioArray;
                    $this->objOrganismosDeIntervencionAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateOrganismosDeIntervencionAsIdFolio($objItem);

                    return $this->OrganismosDeIntervencionAsIdFolioArray;
                }

                /**
                * Remove a Item to the _OrganismosDeIntervencionAsIdFolioArray
                * @param OrganismosDeIntervencion $objItem
                * @return OrganismosDeIntervencion[]
                */
                public function RemoveOrganismosDeIntervencionAsIdFolio(OrganismosDeIntervencion $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objOrganismosDeIntervencionAsIdFolioArray;
                    $this->objOrganismosDeIntervencionAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objOrganismosDeIntervencionAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedOrganismosDeIntervencionAsIdFolio($objItem);
                        }

                    return $this->objOrganismosDeIntervencionAsIdFolioArray;
                }

		/**
		 * Gets all associated OrganismosDeIntervencionesAsIdFolio as an array of OrganismosDeIntervencion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrganismosDeIntervencion[]
		*/ 
		public function GetOrganismosDeIntervencionAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return OrganismosDeIntervencion::LoadArrayByIdFolio($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OrganismosDeIntervencionesAsIdFolio
		 * @return int
		*/ 
		public function CountOrganismosDeIntervencionesAsIdFolio() {
			if ((is_null($this->intId)))
				return 0;

			return OrganismosDeIntervencion::CountByIdFolio($this->intId);
		}

		/**
		 * Associates a OrganismosDeIntervencionAsIdFolio
		 * @param OrganismosDeIntervencion $objOrganismosDeIntervencion
		 * @return void
		*/ 
		public function AssociateOrganismosDeIntervencionAsIdFolio(OrganismosDeIntervencion $objOrganismosDeIntervencion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrganismosDeIntervencionAsIdFolio on this unsaved Antecedentes.');
			if ((is_null($objOrganismosDeIntervencion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrganismosDeIntervencionAsIdFolio on this Antecedentes with an unsaved OrganismosDeIntervencion.');

			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"organismos_de_intervencion"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objOrganismosDeIntervencion->Id) . '
			');
		}

		/**
		 * Unassociates a OrganismosDeIntervencionAsIdFolio
		 * @param OrganismosDeIntervencion $objOrganismosDeIntervencion
		 * @return void
		*/ 
		public function UnassociateOrganismosDeIntervencionAsIdFolio(OrganismosDeIntervencion $objOrganismosDeIntervencion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganismosDeIntervencionAsIdFolio on this unsaved Antecedentes.');
			if ((is_null($objOrganismosDeIntervencion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganismosDeIntervencionAsIdFolio on this Antecedentes with an unsaved OrganismosDeIntervencion.');

			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"organismos_de_intervencion"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objOrganismosDeIntervencion->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all OrganismosDeIntervencionesAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllOrganismosDeIntervencionesAsIdFolio() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganismosDeIntervencionAsIdFolio on this unsaved Antecedentes.');

			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"organismos_de_intervencion"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated OrganismosDeIntervencionAsIdFolio
		 * @param OrganismosDeIntervencion $objOrganismosDeIntervencion
		 * @return void
		*/ 
		public function DeleteAssociatedOrganismosDeIntervencionAsIdFolio(OrganismosDeIntervencion $objOrganismosDeIntervencion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganismosDeIntervencionAsIdFolio on this unsaved Antecedentes.');
			if ((is_null($objOrganismosDeIntervencion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganismosDeIntervencionAsIdFolio on this Antecedentes with an unsaved OrganismosDeIntervencion.');

			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"organismos_de_intervencion"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objOrganismosDeIntervencion->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated OrganismosDeIntervencionesAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllOrganismosDeIntervencionesAsIdFolio() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganismosDeIntervencionAsIdFolio on this unsaved Antecedentes.');

			// Get the Database Object for this Class
			$objDatabase = Antecedentes::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"organismos_de_intervencion"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Antecedentes"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Regularizacion"/>';
			$strToReturn .= '<element name="SinIntervencion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ObrasInfraestructura" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Equipamientos" type="xsd:boolean"/>';
			$strToReturn .= '<element name="IntervencionesEnViviendas" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Otros" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Antecedentes', $strComplexTypeArray)) {
				$strComplexTypeArray['Antecedentes'] = Antecedentes::GetSoapComplexTypeXml();
				$strComplexTypeArray = Regularizacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Antecedentes::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Antecedentes();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Regularizacion::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'SinIntervencion')) {
				$objToReturn->blnSinIntervencion = $objSoapObject->SinIntervencion;
            }
			if (property_exists($objSoapObject, 'ObrasInfraestructura')) {
				$objToReturn->blnObrasInfraestructura = $objSoapObject->ObrasInfraestructura;
            }
			if (property_exists($objSoapObject, 'Equipamientos')) {
				$objToReturn->blnEquipamientos = $objSoapObject->Equipamientos;
            }
			if (property_exists($objSoapObject, 'IntervencionesEnViviendas')) {
				$objToReturn->blnIntervencionesEnViviendas = $objSoapObject->IntervencionesEnViviendas;
            }
			if (property_exists($objSoapObject, 'Otros')) {
				$objToReturn->strOtros = $objSoapObject->Otros;
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
				array_push($objArrayToReturn, Antecedentes::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = Regularizacion::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>