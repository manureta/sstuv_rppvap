<?php
/**
 * The abstract GeometryColumnsGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the GeometryColumns subclass which
 * extends this GeometryColumnsGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the GeometryColumns class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property string $FTableCatalog the value for strFTableCatalog (PK)
	 * @property string $FTableSchema the value for strFTableSchema (PK)
	 * @property string $FTableName the value for strFTableName (PK)
	 * @property string $FGeometryColumn the value for strFGeometryColumn (PK)
	 * @property integer $CoordDimension the value for intCoordDimension (Not Null)
	 * @property integer $Srid the value for intSrid (Not Null)
	 * @property string $Type the value for strType (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class GeometryColumnsGen extends QBaseClass {

    public static function Noun() {
        return 'GeometryColumns';
    }
    public static function NounPlural() {
        return 'GeometryColumnses';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK column geometry_columns.f_table_catalog
     * @var string strFTableCatalog
     */
    protected $strFTableCatalog;
    const FTableCatalogMaxLength = 256;
    const FTableCatalogDefault = null;


    /**
     * Protected internal member variable that stores the original version of the PK column value (if restored)
     * Used by Save() to update a PK column during UPDATE
     * @var string __strFTableCatalog;
     */
    protected $__strFTableCatalog;

    /**
     * Protected member variable that maps to the database PK column geometry_columns.f_table_schema
     * @var string strFTableSchema
     */
    protected $strFTableSchema;
    const FTableSchemaMaxLength = 256;
    const FTableSchemaDefault = null;


    /**
     * Protected internal member variable that stores the original version of the PK column value (if restored)
     * Used by Save() to update a PK column during UPDATE
     * @var string __strFTableSchema;
     */
    protected $__strFTableSchema;

    /**
     * Protected member variable that maps to the database PK column geometry_columns.f_table_name
     * @var string strFTableName
     */
    protected $strFTableName;
    const FTableNameMaxLength = 256;
    const FTableNameDefault = null;


    /**
     * Protected internal member variable that stores the original version of the PK column value (if restored)
     * Used by Save() to update a PK column during UPDATE
     * @var string __strFTableName;
     */
    protected $__strFTableName;

    /**
     * Protected member variable that maps to the database PK column geometry_columns.f_geometry_column
     * @var string strFGeometryColumn
     */
    protected $strFGeometryColumn;
    const FGeometryColumnMaxLength = 256;
    const FGeometryColumnDefault = null;


    /**
     * Protected internal member variable that stores the original version of the PK column value (if restored)
     * Used by Save() to update a PK column during UPDATE
     * @var string __strFGeometryColumn;
     */
    protected $__strFGeometryColumn;

    /**
     * Protected member variable that maps to the database column geometry_columns.coord_dimension
     * @var integer intCoordDimension
     */
    protected $intCoordDimension;
    const CoordDimensionDefault = null;


    /**
     * Protected member variable that maps to the database column geometry_columns.srid
     * @var integer intSrid
     */
    protected $intSrid;
    const SridDefault = null;


    /**
     * Protected member variable that maps to the database column geometry_columns.type
     * @var string strType
     */
    protected $strType;
    const TypeMaxLength = 30;
    const TypeDefault = null;


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
                protected static $_objGeometryColumnsArray = array();


		/**
		 * Load a GeometryColumns from PK Info
		 * @param string $strFTableCatalog
		 * @param string $strFTableSchema
		 * @param string $strFTableName
		 * @param string $strFGeometryColumn
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return GeometryColumns
		 */
		public static function Load($strFTableCatalog, $strFTableSchema, $strFTableName, $strFGeometryColumn, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  GeometryColumns::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GeometryColumns()->FTableCatalog, $strFTableCatalog),
					QQ::Equal(QQN::GeometryColumns()->FTableSchema, $strFTableSchema),
					QQ::Equal(QQN::GeometryColumns()->FTableName, $strFTableName),
					QQ::Equal(QQN::GeometryColumns()->FGeometryColumn, $strFGeometryColumn)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$strFTableCatalog, $strFTableSchema, $strFTableName, $strFGeometryColumn",self::$_objGeometryColumnsArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpGeometryColumns = GeometryColumns::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GeometryColumns()->FTableCatalog, $strFTableCatalog),
					QQ::Equal(QQN::GeometryColumns()->FTableSchema, $strFTableSchema),
					QQ::Equal(QQN::GeometryColumns()->FTableName, $strFTableName),
					QQ::Equal(QQN::GeometryColumns()->FGeometryColumn, $strFGeometryColumn)
				),
				$objOptionalClauses
			))) {
			    self::$_objGeometryColumnsArray["$strFTableCatalog, $strFTableSchema, $strFTableName, $strFGeometryColumn"] = $objTmpGeometryColumns;
            }
                        }
                        return isset(self::$_objGeometryColumnsArray["$strFTableCatalog, $strFTableSchema, $strFTableName, $strFGeometryColumn"])?self::$_objGeometryColumnsArray["$strFTableCatalog, $strFTableSchema, $strFTableName, $strFGeometryColumn"]:null;
		}

		/**
		 * Load all GeometryColumnses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GeometryColumns[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GeometryColumns::QueryArray to perform the LoadAll query
			try {
				return GeometryColumns::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GeometryColumnses
		 * @return int
		 */
		public static function CountAll() {
			// Call GeometryColumns::QueryCount to perform the CountAll query
			return GeometryColumns::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (GeometryColumns::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::GeometryColumns()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::GeometryColumns()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase GeometryColumns no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = GeometryColumns::GetDatabase();

			// Create/Build out the QueryBuilder object with GeometryColumns-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'geometry_columns');
			GeometryColumns::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('geometry_columns');

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
		 * Static Qcubed Query method to query for a single GeometryColumns object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GeometryColumns the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GeometryColumns::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new GeometryColumns object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GeometryColumns::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = GeometryColumns::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of GeometryColumns objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GeometryColumns[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GeometryColumns::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GeometryColumns::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of GeometryColumns objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GeometryColumns::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GeometryColumns::GetDatabase();

			$strQuery = GeometryColumns::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/geometrycolumns', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GeometryColumns::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GeometryColumns
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'geometry_columns';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'f_table_catalog', $strAliasPrefix . 'f_table_catalog');
			$objBuilder->AddSelectItem($strTableName, 'f_table_schema', $strAliasPrefix . 'f_table_schema');
			$objBuilder->AddSelectItem($strTableName, 'f_table_name', $strAliasPrefix . 'f_table_name');
			$objBuilder->AddSelectItem($strTableName, 'f_geometry_column', $strAliasPrefix . 'f_geometry_column');
			$objBuilder->AddSelectItem($strTableName, 'coord_dimension', $strAliasPrefix . 'coord_dimension');
			$objBuilder->AddSelectItem($strTableName, 'srid', $strAliasPrefix . 'srid');
			$objBuilder->AddSelectItem($strTableName, 'type', $strAliasPrefix . 'type');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a GeometryColumns from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GeometryColumns::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return GeometryColumns
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the GeometryColumns object
			$objToReturn = new GeometryColumns();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'f_table_catalog', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'f_table_catalog'] : $strAliasPrefix . 'f_table_catalog';
			$objToReturn->strFTableCatalog = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strFTableCatalog = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'f_table_schema', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'f_table_schema'] : $strAliasPrefix . 'f_table_schema';
			$objToReturn->strFTableSchema = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strFTableSchema = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'f_table_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'f_table_name'] : $strAliasPrefix . 'f_table_name';
			$objToReturn->strFTableName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strFTableName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'f_geometry_column', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'f_geometry_column'] : $strAliasPrefix . 'f_geometry_column';
			$objToReturn->strFGeometryColumn = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strFGeometryColumn = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'coord_dimension', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'coord_dimension'] : $strAliasPrefix . 'coord_dimension';
			$objToReturn->intCoordDimension = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'srid', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'srid'] : $strAliasPrefix . 'srid';
			$objToReturn->intSrid = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'type'] : $strAliasPrefix . 'type';
			$objToReturn->strType = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->FTableCatalog != $objPreviousItem->FTableCatalog) {
						continue;
					}
					if ($objToReturn->FTableSchema != $objPreviousItem->FTableSchema) {
						continue;
					}
					if ($objToReturn->FTableName != $objPreviousItem->FTableName) {
						continue;
					}
					if ($objToReturn->FGeometryColumn != $objPreviousItem->FGeometryColumn) {
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
				$strAliasPrefix = 'geometry_columns__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of GeometryColumnses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return GeometryColumns[]
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
					$objItem = GeometryColumns::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GeometryColumns::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single GeometryColumns object,
		 * by FTableCatalog, FTableSchema, FTableName, FGeometryColumn Index(es)
		 * @param string $strFTableCatalog
		 * @param string $strFTableSchema
		 * @param string $strFTableName
		 * @param string $strFGeometryColumn
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GeometryColumns
		*/
		public static function LoadByFTableCatalogFTableSchemaFTableNameFGeometryColumn($strFTableCatalog, $strFTableSchema, $strFTableName, $strFGeometryColumn, $objOptionalClauses = null) {
			return GeometryColumns::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GeometryColumns()->FTableCatalog, $strFTableCatalog),
					QQ::Equal(QQN::GeometryColumns()->FTableSchema, $strFTableSchema),
					QQ::Equal(QQN::GeometryColumns()->FTableName, $strFTableName),
					QQ::Equal(QQN::GeometryColumns()->FGeometryColumn, $strFGeometryColumn)
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
         * Save this GeometryColumns
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return void
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = GeometryColumns::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.

                    if ($this->intCoordDimension && ($this->intCoordDimension > QDatabaseNumberFieldMax::Integer || $this->intCoordDimension < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intCoordDimension', QDatabaseFieldType::Integer);
                    }
                    if ($this->intSrid && ($this->intSrid > QDatabaseNumberFieldMax::Integer || $this->intSrid < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intSrid', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "geometry_columns" (
                            "f_table_catalog",
                            "f_table_schema",
                            "f_table_name",
                            "f_geometry_column",
                            "coord_dimension",
                            "srid",
                            "type"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strFTableCatalog) . ',
                            ' . $objDatabase->SqlVariable($this->strFTableSchema) . ',
                            ' . $objDatabase->SqlVariable($this->strFTableName) . ',
                            ' . $objDatabase->SqlVariable($this->strFGeometryColumn) . ',
                            ' . $objDatabase->SqlVariable($this->intCoordDimension) . ',
                            ' . $objDatabase->SqlVariable($this->intSrid) . ',
                            ' . $objDatabase->SqlVariable($this->strType) . '
                        )
                    ');


                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "geometry_columns"
                        SET
                            "f_table_catalog" = ' . $objDatabase->SqlVariable($this->strFTableCatalog) . ',
                            "f_table_schema" = ' . $objDatabase->SqlVariable($this->strFTableSchema) . ',
                            "f_table_name" = ' . $objDatabase->SqlVariable($this->strFTableName) . ',
                            "f_geometry_column" = ' . $objDatabase->SqlVariable($this->strFGeometryColumn) . ',
                            "coord_dimension" = ' . $objDatabase->SqlVariable($this->intCoordDimension) . ',
                            "srid" = ' . $objDatabase->SqlVariable($this->intSrid) . ',
                            "type" = ' . $objDatabase->SqlVariable($this->strType) . '
                        WHERE
                            "f_table_catalog" = ' . $objDatabase->SqlVariable($this->__strFTableCatalog) . ' AND
                            "f_table_schema" = ' . $objDatabase->SqlVariable($this->__strFTableSchema) . ' AND
                            "f_table_name" = ' . $objDatabase->SqlVariable($this->__strFTableName) . ' AND
                            "f_geometry_column" = ' . $objDatabase->SqlVariable($this->__strFGeometryColumn) . '
                    ');
                }

            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }

            // Update __blnRestored and any Non-Identity PK Columns (if applicable)
            $this->__blnRestored = true;
            $this->__strFTableCatalog = $this->strFTableCatalog;
            $this->__strFTableSchema = $this->strFTableSchema;
            $this->__strFTableName = $this->strFTableName;
            $this->__strFGeometryColumn = $this->strFGeometryColumn;

            foreach ($this->objChildObjectsArray as $objChild) {
                if (!$objChild->__Restored) $objChild->Save();
            }

            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this GeometryColumns
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strFTableCatalog)) || (is_null($this->strFTableSchema)) || (is_null($this->strFTableName)) || (is_null($this->strFGeometryColumn)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GeometryColumns with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GeometryColumns::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"geometry_columns"
				WHERE
					"f_table_catalog" = ' . $objDatabase->SqlVariable($this->strFTableCatalog) . ' AND
					"f_table_schema" = ' . $objDatabase->SqlVariable($this->strFTableSchema) . ' AND
					"f_table_name" = ' . $objDatabase->SqlVariable($this->strFTableName) . ' AND
					"f_geometry_column" = ' . $objDatabase->SqlVariable($this->strFGeometryColumn) . '');
		}

		/**
		 * Delete all GeometryColumnses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GeometryColumns::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"geometry_columns"');
		}

		/**
		 * Truncate geometry_columns table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = GeometryColumns::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "geometry_columns" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this GeometryColumns from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GeometryColumns object.');

			// Reload the Object
			$objReloaded = GeometryColumns::Load($this->strFTableCatalog, $this->strFTableSchema, $this->strFTableName, $this->strFGeometryColumn, null, true);

			// Update $this's local variables to match
			$this->strFTableCatalog = $objReloaded->strFTableCatalog;
			$this->__strFTableCatalog = $this->strFTableCatalog;
			$this->strFTableSchema = $objReloaded->strFTableSchema;
			$this->__strFTableSchema = $this->strFTableSchema;
			$this->strFTableName = $objReloaded->strFTableName;
			$this->__strFTableName = $this->strFTableName;
			$this->strFGeometryColumn = $objReloaded->strFGeometryColumn;
			$this->__strFGeometryColumn = $this->strFGeometryColumn;
			$this->intCoordDimension = $objReloaded->intCoordDimension;
			$this->intSrid = $objReloaded->intSrid;
			$this->strType = $objReloaded->strType;
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
            case 'FTableCatalog':
                /**
                 * Gets the value for strFTableCatalog (PK)
                 * @return string
                 */
                return $this->strFTableCatalog;

            case 'FTableSchema':
                /**
                 * Gets the value for strFTableSchema (PK)
                 * @return string
                 */
                return $this->strFTableSchema;

            case 'FTableName':
                /**
                 * Gets the value for strFTableName (PK)
                 * @return string
                 */
                return $this->strFTableName;

            case 'FGeometryColumn':
                /**
                 * Gets the value for strFGeometryColumn (PK)
                 * @return string
                 */
                return $this->strFGeometryColumn;

            case 'CoordDimension':
                /**
                 * Gets the value for intCoordDimension (Not Null)
                 * @return integer
                 */
                return $this->intCoordDimension;

            case 'Srid':
                /**
                 * Gets the value for intSrid (Not Null)
                 * @return integer
                 */
                return $this->intSrid;

            case 'Type':
                /**
                 * Gets the value for strType (Not Null)
                 * @return string
                 */
                return $this->strType;


            ///////////////////
            // Member Objects
            ///////////////////

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
				case 'FTableCatalog':
					/**
					 * Sets the value for strFTableCatalog (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFTableCatalog = QType::Cast($mixValue, QType::String));
                                                return ($this->strFTableCatalog = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FTableSchema':
					/**
					 * Sets the value for strFTableSchema (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFTableSchema = QType::Cast($mixValue, QType::String));
                                                return ($this->strFTableSchema = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FTableName':
					/**
					 * Sets the value for strFTableName (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFTableName = QType::Cast($mixValue, QType::String));
                                                return ($this->strFTableName = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FGeometryColumn':
					/**
					 * Sets the value for strFGeometryColumn (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFGeometryColumn = QType::Cast($mixValue, QType::String));
                                                return ($this->strFGeometryColumn = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CoordDimension':
					/**
					 * Sets the value for intCoordDimension (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intCoordDimension = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intCoordDimension = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Srid':
					/**
					 * Sets the value for intSrid (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intSrid = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intSrid = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Type':
					/**
					 * Sets the value for strType (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strType = QType::Cast($mixValue, QType::String));
                                                return ($this->strType = $mixValue);
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
        




    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GeometryColumns"><sequence>';
			$strToReturn .= '<element name="FTableCatalog" type="xsd:string"/>';
			$strToReturn .= '<element name="FTableSchema" type="xsd:string"/>';
			$strToReturn .= '<element name="FTableName" type="xsd:string"/>';
			$strToReturn .= '<element name="FGeometryColumn" type="xsd:string"/>';
			$strToReturn .= '<element name="CoordDimension" type="xsd:int"/>';
			$strToReturn .= '<element name="Srid" type="xsd:int"/>';
			$strToReturn .= '<element name="Type" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GeometryColumns', $strComplexTypeArray)) {
				$strComplexTypeArray['GeometryColumns'] = GeometryColumns::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GeometryColumns::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GeometryColumns();
			if (property_exists($objSoapObject, 'FTableCatalog')) {
				$objToReturn->strFTableCatalog = $objSoapObject->FTableCatalog;
                $objToReturn->__strFTableCatalog = $objSoapObject->FTableCatalog;
            }
			if (property_exists($objSoapObject, 'FTableSchema')) {
				$objToReturn->strFTableSchema = $objSoapObject->FTableSchema;
                $objToReturn->__strFTableSchema = $objSoapObject->FTableSchema;
            }
			if (property_exists($objSoapObject, 'FTableName')) {
				$objToReturn->strFTableName = $objSoapObject->FTableName;
                $objToReturn->__strFTableName = $objSoapObject->FTableName;
            }
			if (property_exists($objSoapObject, 'FGeometryColumn')) {
				$objToReturn->strFGeometryColumn = $objSoapObject->FGeometryColumn;
                $objToReturn->__strFGeometryColumn = $objSoapObject->FGeometryColumn;
            }
			if (property_exists($objSoapObject, 'CoordDimension')) {
				$objToReturn->intCoordDimension = $objSoapObject->CoordDimension;
            }
			if (property_exists($objSoapObject, 'Srid')) {
				$objToReturn->intSrid = $objSoapObject->Srid;
            }
			if (property_exists($objSoapObject, 'Type')) {
				$objToReturn->strType = $objSoapObject->Type;
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
				array_push($objArrayToReturn, GeometryColumns::GetSoapObjectFromObject($objObject, true));

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