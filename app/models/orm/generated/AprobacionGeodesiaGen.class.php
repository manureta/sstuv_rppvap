<?php
/**
 * The abstract AprobacionGeodesiaGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the AprobacionGeodesia subclass which
 * extends this AprobacionGeodesiaGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the AprobacionGeodesia class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdPartido the value for intIdPartido 
	 * @property integer $Num the value for intNum 
	 * @property string $Anio the value for strAnio 
	 * @property Partido $IdPartidoObject the value for the Partido object referenced by intIdPartido 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class AprobacionGeodesiaGen extends QBaseClass {

    public static function Noun() {
        return 'AprobacionGeodesia';
    }
    public static function NounPlural() {
        return 'AprobacionGeodesias';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column aprobacion_geodesia.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'aprobacion_geodesia_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column aprobacion_geodesia.id_partido
     * @var integer intIdPartido
     */
    protected $intIdPartido;
    const IdPartidoDefault = null;


    /**
     * Protected member variable that maps to the database column aprobacion_geodesia.num
     * @var integer intNum
     */
    protected $intNum;
    const NumDefault = null;


    /**
     * Protected member variable that maps to the database column aprobacion_geodesia.anio
     * @var string strAnio
     */
    protected $strAnio;
    const AnioMaxLength = 4;
    const AnioDefault = null;


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
		 * in the database column aprobacion_geodesia.id_partido.
		 *
		 * NOTE: Always use the IdPartidoObject property getter to correctly retrieve this Partido object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Partido objIdPartidoObject
		 */
		protected $objIdPartidoObject;



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
                protected static $_objAprobacionGeodesiaArray = array();


		/**
		 * Load a AprobacionGeodesia from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return AprobacionGeodesia
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  AprobacionGeodesia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AprobacionGeodesia()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objAprobacionGeodesiaArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpAprobacionGeodesia = AprobacionGeodesia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AprobacionGeodesia()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objAprobacionGeodesiaArray["$intId"] = $objTmpAprobacionGeodesia;
            }
                        }
                        return isset(self::$_objAprobacionGeodesiaArray["$intId"])?self::$_objAprobacionGeodesiaArray["$intId"]:null;
		}

		/**
		 * Load all AprobacionGeodesias
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AprobacionGeodesia[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call AprobacionGeodesia::QueryArray to perform the LoadAll query
			try {
				return AprobacionGeodesia::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AprobacionGeodesias
		 * @return int
		 */
		public static function CountAll() {
			// Call AprobacionGeodesia::QueryCount to perform the CountAll query
			return AprobacionGeodesia::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (AprobacionGeodesia::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::AprobacionGeodesia()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::AprobacionGeodesia()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase AprobacionGeodesia no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = AprobacionGeodesia::GetDatabase();

			// Create/Build out the QueryBuilder object with AprobacionGeodesia-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'aprobacion_geodesia');
			AprobacionGeodesia::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('aprobacion_geodesia');

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
		 * Static Qcubed Query method to query for a single AprobacionGeodesia object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AprobacionGeodesia the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AprobacionGeodesia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new AprobacionGeodesia object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AprobacionGeodesia::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = AprobacionGeodesia::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of AprobacionGeodesia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AprobacionGeodesia[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AprobacionGeodesia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AprobacionGeodesia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of AprobacionGeodesia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AprobacionGeodesia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AprobacionGeodesia::GetDatabase();

			$strQuery = AprobacionGeodesia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/aprobaciongeodesia', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = AprobacionGeodesia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AprobacionGeodesia
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'aprobacion_geodesia';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_partido', $strAliasPrefix . 'id_partido');
			$objBuilder->AddSelectItem($strTableName, 'num', $strAliasPrefix . 'num');
			$objBuilder->AddSelectItem($strTableName, 'anio', $strAliasPrefix . 'anio');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AprobacionGeodesia from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AprobacionGeodesia::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AprobacionGeodesia
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the AprobacionGeodesia object
			$objToReturn = new AprobacionGeodesia();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_partido'] : $strAliasPrefix . 'id_partido';
			$objToReturn->intIdPartido = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'num', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'num'] : $strAliasPrefix . 'num';
			$objToReturn->intNum = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'anio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'anio'] : $strAliasPrefix . 'anio';
			$objToReturn->strAnio = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'aprobacion_geodesia__';

			// Check for IdPartidoObject Early Binding
			$strAlias = $strAliasPrefix . 'id_partido__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdPartidoObject = Partido::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_partido__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of AprobacionGeodesias from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AprobacionGeodesia[]
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
					$objItem = AprobacionGeodesia::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AprobacionGeodesia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AprobacionGeodesia object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AprobacionGeodesia
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return AprobacionGeodesia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AprobacionGeodesia()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AprobacionGeodesia objects,
		 * by IdPartido Index(es)
		 * @param integer $intIdPartido
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AprobacionGeodesia[]
		*/
		public static function LoadArrayByIdPartido($intIdPartido, $objOptionalClauses = null) {
			// Call AprobacionGeodesia::QueryArray to perform the LoadArrayByIdPartido query
			try {
				return AprobacionGeodesia::QueryArray(
					QQ::Equal(QQN::AprobacionGeodesia()->IdPartido, $intIdPartido),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AprobacionGeodesias
		 * by IdPartido Index(es)
		 * @param integer $intIdPartido
		 * @return int
		*/
		public static function CountByIdPartido($intIdPartido) {
			// Call AprobacionGeodesia::QueryCount to perform the CountByIdPartido query
			return AprobacionGeodesia::QueryCount(
				QQ::Equal(QQN::AprobacionGeodesia()->IdPartido, $intIdPartido)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this AprobacionGeodesia
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = AprobacionGeodesia::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.
            // ver si objIdPartidoObject esta Guardado
            if(is_null($this->intIdPartido)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdPartidoObject))
                try{
                    if(!is_null($this->IdPartidoObject->IdPartido))
                        $this->intIdPartido = $this->IdPartidoObject->IdPartido;
                    else
                        $this->intIdPartido = $this->IdPartidoObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }

                    if ($this->intId && ($this->intId > QDatabaseNumberFieldMax::Integer || $this->intId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intId', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdPartido && ($this->intIdPartido > QDatabaseNumberFieldMax::Integer || $this->intIdPartido < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdPartido', QDatabaseFieldType::Integer);
                    }
                    if ($this->intNum && ($this->intNum > QDatabaseNumberFieldMax::Integer || $this->intNum < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intNum', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "aprobacion_geodesia" (
                            "id_partido",
                            "num",
                            "anio"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdPartido) . ',
                            ' . $objDatabase->SqlVariable($this->intNum) . ',
                            ' . $objDatabase->SqlVariable($this->strAnio) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('aprobacion_geodesia', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "aprobacion_geodesia"
                        SET
                            "id_partido" = ' . $objDatabase->SqlVariable($this->intIdPartido) . ',
                            "num" = ' . $objDatabase->SqlVariable($this->intNum) . ',
                            "anio" = ' . $objDatabase->SqlVariable($this->strAnio) . '
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
		 * Delete this AprobacionGeodesia
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AprobacionGeodesia with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AprobacionGeodesia::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"aprobacion_geodesia"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all AprobacionGeodesias
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AprobacionGeodesia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"aprobacion_geodesia"');
		}

		/**
		 * Truncate aprobacion_geodesia table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = AprobacionGeodesia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "aprobacion_geodesia" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this AprobacionGeodesia from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AprobacionGeodesia object.');

			// Reload the Object
			$objReloaded = AprobacionGeodesia::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdPartido = $objReloaded->IdPartido;
			$this->intNum = $objReloaded->intNum;
			$this->strAnio = $objReloaded->strAnio;
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

            case 'IdPartido':
                /**
                 * Gets the value for intIdPartido 
                 * @return integer
                 */
                return $this->intIdPartido;

            case 'Num':
                /**
                 * Gets the value for intNum 
                 * @return integer
                 */
                return $this->intNum;

            case 'Anio':
                /**
                 * Gets the value for strAnio 
                 * @return string
                 */
                return $this->strAnio;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdPartidoObject':
                /**
                 * Gets the value for the Partido object referenced by intIdPartido 
                 * @return Partido
                 */
                try {
                    if ((!$this->objIdPartidoObject) && (!is_null($this->intIdPartido)))
                        $this->objIdPartidoObject = Partido::Load($this->intIdPartido);
                    return $this->objIdPartidoObject;
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
				case 'IdPartido':
					/**
					 * Sets the value for intIdPartido 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdPartidoObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdPartido = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdPartido = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Num':
					/**
					 * Sets the value for intNum 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intNum = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intNum = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Anio':
					/**
					 * Sets the value for strAnio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strAnio = QType::Cast($mixValue, QType::String));
                                                return ($this->strAnio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdPartidoObject':
					/**
					 * Sets the value for the Partido object referenced by intIdPartido 
					 * @param Partido $mixValue
					 * @return Partido
					 */
					if (is_null($mixValue)) {
						$this->intIdPartido = null;
						$this->objIdPartidoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Partido object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Partido');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Partido object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved IdPartidoObject for this AprobacionGeodesia');

						// Update Local Member Variables
						$this->objIdPartidoObject = $mixValue;
						$this->intIdPartido = $mixValue->Id;

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
			$strToReturn = '<complexType name="AprobacionGeodesia"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdPartidoObject" type="xsd1:Partido"/>';
			$strToReturn .= '<element name="Num" type="xsd:int"/>';
			$strToReturn .= '<element name="Anio" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AprobacionGeodesia', $strComplexTypeArray)) {
				$strComplexTypeArray['AprobacionGeodesia'] = AprobacionGeodesia::GetSoapComplexTypeXml();
				$strComplexTypeArray = Partido::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AprobacionGeodesia::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AprobacionGeodesia();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdPartidoObject')) &&
				($objSoapObject->IdPartidoObject))
				$objToReturn->IdPartidoObject = Partido::GetObjectFromSoapObject($objSoapObject->IdPartidoObject);
			if (property_exists($objSoapObject, 'Num')) {
				$objToReturn->intNum = $objSoapObject->Num;
            }
			if (property_exists($objSoapObject, 'Anio')) {
				$objToReturn->strAnio = $objSoapObject->Anio;
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
				array_push($objArrayToReturn, AprobacionGeodesia::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdPartidoObject)
				$objObject->objIdPartidoObject = Partido::GetSoapObjectFromObject($objObject->objIdPartidoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdPartido = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>