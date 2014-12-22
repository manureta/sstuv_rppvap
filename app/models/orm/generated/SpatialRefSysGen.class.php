<?php
/**
 * The abstract SpatialRefSysGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the SpatialRefSys subclass which
 * extends this SpatialRefSysGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the SpatialRefSys class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property integer $Srid the value for intSrid (PK)
	 * @property string $AuthName the value for strAuthName 
	 * @property integer $AuthSrid the value for intAuthSrid 
	 * @property string $Srtext the value for strSrtext 
	 * @property string $Proj4text the value for strProj4text 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class SpatialRefSysGen extends QBaseClass {

    public static function Noun() {
        return 'SpatialRefSys';
    }
    public static function NounPlural() {
        return 'SpatialRefSyses';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK column spatial_ref_sys.srid
     * @var integer intSrid
     */
    protected $intSrid;
    const SridDefault = null;


    /**
     * Protected internal member variable that stores the original version of the PK column value (if restored)
     * Used by Save() to update a PK column during UPDATE
     * @var integer __intSrid;
     */
    protected $__intSrid;

    /**
     * Protected member variable that maps to the database column spatial_ref_sys.auth_name
     * @var string strAuthName
     */
    protected $strAuthName;
    const AuthNameMaxLength = 256;
    const AuthNameDefault = null;


    /**
     * Protected member variable that maps to the database column spatial_ref_sys.auth_srid
     * @var integer intAuthSrid
     */
    protected $intAuthSrid;
    const AuthSridDefault = null;


    /**
     * Protected member variable that maps to the database column spatial_ref_sys.srtext
     * @var string strSrtext
     */
    protected $strSrtext;
    const SrtextMaxLength = 2048;
    const SrtextDefault = null;


    /**
     * Protected member variable that maps to the database column spatial_ref_sys.proj4text
     * @var string strProj4text
     */
    protected $strProj4text;
    const Proj4textMaxLength = 2048;
    const Proj4textDefault = null;


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
                protected static $_objSpatialRefSysArray = array();


		/**
		 * Load a SpatialRefSys from PK Info
		 * @param integer $intSrid
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return SpatialRefSys
		 */
		public static function Load($intSrid, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  SpatialRefSys::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SpatialRefSys()->Srid, $intSrid)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intSrid",self::$_objSpatialRefSysArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpSpatialRefSys = SpatialRefSys::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SpatialRefSys()->Srid, $intSrid)
				),
				$objOptionalClauses
			))) {
			    self::$_objSpatialRefSysArray["$intSrid"] = $objTmpSpatialRefSys;
            }
                        }
                        return isset(self::$_objSpatialRefSysArray["$intSrid"])?self::$_objSpatialRefSysArray["$intSrid"]:null;
		}

		/**
		 * Load all SpatialRefSyses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SpatialRefSys[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SpatialRefSys::QueryArray to perform the LoadAll query
			try {
				return SpatialRefSys::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SpatialRefSyses
		 * @return int
		 */
		public static function CountAll() {
			// Call SpatialRefSys::QueryCount to perform the CountAll query
			return SpatialRefSys::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (SpatialRefSys::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::SpatialRefSys()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::SpatialRefSys()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase SpatialRefSys no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = SpatialRefSys::GetDatabase();

			// Create/Build out the QueryBuilder object with SpatialRefSys-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'spatial_ref_sys');
			SpatialRefSys::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('spatial_ref_sys');

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
		 * Static Qcubed Query method to query for a single SpatialRefSys object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SpatialRefSys the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SpatialRefSys::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new SpatialRefSys object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SpatialRefSys::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = SpatialRefSys::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of SpatialRefSys objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SpatialRefSys[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SpatialRefSys::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SpatialRefSys::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of SpatialRefSys objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SpatialRefSys::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SpatialRefSys::GetDatabase();

			$strQuery = SpatialRefSys::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/spatialrefsys', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SpatialRefSys::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SpatialRefSys
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'spatial_ref_sys';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'srid', $strAliasPrefix . 'srid');
			$objBuilder->AddSelectItem($strTableName, 'auth_name', $strAliasPrefix . 'auth_name');
			$objBuilder->AddSelectItem($strTableName, 'auth_srid', $strAliasPrefix . 'auth_srid');
			$objBuilder->AddSelectItem($strTableName, 'srtext', $strAliasPrefix . 'srtext');
			$objBuilder->AddSelectItem($strTableName, 'proj4text', $strAliasPrefix . 'proj4text');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SpatialRefSys from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SpatialRefSys::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SpatialRefSys
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the SpatialRefSys object
			$objToReturn = new SpatialRefSys();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'srid', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'srid'] : $strAliasPrefix . 'srid';
			$objToReturn->intSrid = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intSrid = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'auth_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'auth_name'] : $strAliasPrefix . 'auth_name';
			$objToReturn->strAuthName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'auth_srid', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'auth_srid'] : $strAliasPrefix . 'auth_srid';
			$objToReturn->intAuthSrid = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'srtext', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'srtext'] : $strAliasPrefix . 'srtext';
			$objToReturn->strSrtext = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'proj4text', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'proj4text'] : $strAliasPrefix . 'proj4text';
			$objToReturn->strProj4text = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Srid != $objPreviousItem->Srid) {
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
				$strAliasPrefix = 'spatial_ref_sys__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of SpatialRefSyses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SpatialRefSys[]
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
					$objItem = SpatialRefSys::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SpatialRefSys::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SpatialRefSys object,
		 * by Srid Index(es)
		 * @param integer $intSrid
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SpatialRefSys
		*/
		public static function LoadBySrid($intSrid, $objOptionalClauses = null) {
			return SpatialRefSys::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SpatialRefSys()->Srid, $intSrid)
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
         * Save this SpatialRefSys
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return void
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = SpatialRefSys::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.

                    if ($this->intSrid && ($this->intSrid > QDatabaseNumberFieldMax::Integer || $this->intSrid < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intSrid', QDatabaseFieldType::Integer);
                    }
                    if ($this->intAuthSrid && ($this->intAuthSrid > QDatabaseNumberFieldMax::Integer || $this->intAuthSrid < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intAuthSrid', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "spatial_ref_sys" (
                            "srid",
                            "auth_name",
                            "auth_srid",
                            "srtext",
                            "proj4text"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intSrid) . ',
                            ' . $objDatabase->SqlVariable($this->strAuthName) . ',
                            ' . $objDatabase->SqlVariable($this->intAuthSrid) . ',
                            ' . $objDatabase->SqlVariable($this->strSrtext) . ',
                            ' . $objDatabase->SqlVariable($this->strProj4text) . '
                        )
                    ');


                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "spatial_ref_sys"
                        SET
                            "srid" = ' . $objDatabase->SqlVariable($this->intSrid) . ',
                            "auth_name" = ' . $objDatabase->SqlVariable($this->strAuthName) . ',
                            "auth_srid" = ' . $objDatabase->SqlVariable($this->intAuthSrid) . ',
                            "srtext" = ' . $objDatabase->SqlVariable($this->strSrtext) . ',
                            "proj4text" = ' . $objDatabase->SqlVariable($this->strProj4text) . '
                        WHERE
                            "srid" = ' . $objDatabase->SqlVariable($this->__intSrid) . '
                    ');
                }

            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }

            // Update __blnRestored and any Non-Identity PK Columns (if applicable)
            $this->__blnRestored = true;
            $this->__intSrid = $this->intSrid;

            foreach ($this->objChildObjectsArray as $objChild) {
                if (!$objChild->__Restored) $objChild->Save();
            }

            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this SpatialRefSys
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intSrid)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SpatialRefSys with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SpatialRefSys::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"spatial_ref_sys"
				WHERE
					"srid" = ' . $objDatabase->SqlVariable($this->intSrid) . '');
		}

		/**
		 * Delete all SpatialRefSyses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SpatialRefSys::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"spatial_ref_sys"');
		}

		/**
		 * Truncate spatial_ref_sys table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = SpatialRefSys::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "spatial_ref_sys" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this SpatialRefSys from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SpatialRefSys object.');

			// Reload the Object
			$objReloaded = SpatialRefSys::Load($this->intSrid, null, true);

			// Update $this's local variables to match
			$this->intSrid = $objReloaded->intSrid;
			$this->__intSrid = $this->intSrid;
			$this->strAuthName = $objReloaded->strAuthName;
			$this->intAuthSrid = $objReloaded->intAuthSrid;
			$this->strSrtext = $objReloaded->strSrtext;
			$this->strProj4text = $objReloaded->strProj4text;
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
            case 'Srid':
                /**
                 * Gets the value for intSrid (PK)
                 * @return integer
                 */
                return $this->intSrid;

            case 'AuthName':
                /**
                 * Gets the value for strAuthName 
                 * @return string
                 */
                return $this->strAuthName;

            case 'AuthSrid':
                /**
                 * Gets the value for intAuthSrid 
                 * @return integer
                 */
                return $this->intAuthSrid;

            case 'Srtext':
                /**
                 * Gets the value for strSrtext 
                 * @return string
                 */
                return $this->strSrtext;

            case 'Proj4text':
                /**
                 * Gets the value for strProj4text 
                 * @return string
                 */
                return $this->strProj4text;


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
				case 'Srid':
					/**
					 * Sets the value for intSrid (PK)
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

				case 'AuthName':
					/**
					 * Sets the value for strAuthName 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strAuthName = QType::Cast($mixValue, QType::String));
                                                return ($this->strAuthName = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthSrid':
					/**
					 * Sets the value for intAuthSrid 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intAuthSrid = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intAuthSrid = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Srtext':
					/**
					 * Sets the value for strSrtext 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strSrtext = QType::Cast($mixValue, QType::String));
                                                return ($this->strSrtext = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Proj4text':
					/**
					 * Sets the value for strProj4text 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strProj4text = QType::Cast($mixValue, QType::String));
                                                return ($this->strProj4text = $mixValue);
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
			$strToReturn = '<complexType name="SpatialRefSys"><sequence>';
			$strToReturn .= '<element name="Srid" type="xsd:int"/>';
			$strToReturn .= '<element name="AuthName" type="xsd:string"/>';
			$strToReturn .= '<element name="AuthSrid" type="xsd:int"/>';
			$strToReturn .= '<element name="Srtext" type="xsd:string"/>';
			$strToReturn .= '<element name="Proj4text" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SpatialRefSys', $strComplexTypeArray)) {
				$strComplexTypeArray['SpatialRefSys'] = SpatialRefSys::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SpatialRefSys::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SpatialRefSys();
			if (property_exists($objSoapObject, 'Srid')) {
				$objToReturn->intSrid = $objSoapObject->Srid;
                $objToReturn->__intSrid = $objSoapObject->Srid;
            }
			if (property_exists($objSoapObject, 'AuthName')) {
				$objToReturn->strAuthName = $objSoapObject->AuthName;
            }
			if (property_exists($objSoapObject, 'AuthSrid')) {
				$objToReturn->intAuthSrid = $objSoapObject->AuthSrid;
            }
			if (property_exists($objSoapObject, 'Srtext')) {
				$objToReturn->strSrtext = $objSoapObject->Srtext;
            }
			if (property_exists($objSoapObject, 'Proj4text')) {
				$objToReturn->strProj4text = $objSoapObject->Proj4text;
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
				array_push($objArrayToReturn, SpatialRefSys::GetSoapObjectFromObject($objObject, true));

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