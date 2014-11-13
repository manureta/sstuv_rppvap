<?php
/**
 * The abstract PerfilGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Perfil subclass which
 * extends this PerfilGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Perfil class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdPerfil the value for intIdPerfil (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property string $Descripcion the value for strDescripcion 
	 * @property-read Usuario $UsuarioAsId the value for the private _objUsuarioAsId (Read-Only) if set due to an expansion on the usuario.id_perfil reverse relationship
	 * @property-read Usuario[] $UsuarioAsIdArray the value for the private _objUsuarioAsIdArray (Read-Only) if set due to an ExpandAsArray on the usuario.id_perfil reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class PerfilGen extends QBaseClass {

    public static function Noun() {
        return 'Perfil';
    }
    public static function NounPlural() {
        return 'Perfiles';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column perfil.id_perfil
     * @var integer intIdPerfil
     */
    protected $intIdPerfil;
    const IdPerfilDefault = 'nextval(\'perfil_id_perfil_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column perfil.nombre
     * @var string strNombre
     */
    protected $strNombre;
    const NombreDefault = null;


    /**
     * Protected member variable that maps to the database column perfil.descripcion
     * @var string strDescripcion
     */
    protected $strDescripcion;
    const DescripcionDefault = null;


    /**
     * Private member variable that stores a reference to a single UsuarioAsId object
     * (of type Usuario), if this Perfil object was restored with
     * an expansion on the usuario association table.
     * @var Usuario _objUsuarioAsId;
     */
    protected $objUsuarioAsId;

    /**
     * Private member variable that stores a reference to an array of UsuarioAsId objects
     * (of type Usuario[]), if this Perfil object was restored with
     * an ExpandAsArray on the usuario association table.
     * @var Usuario[] _objUsuarioAsIdArray;
     */
    protected $objUsuarioAsIdArray;

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
                protected static $_objPerfilArray = array();


		/**
		 * Load a Perfil from PK Info
		 * @param integer $intIdPerfil
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Perfil
		 */
		public static function Load($intIdPerfil, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Perfil::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Perfil()->IdPerfil, $intIdPerfil)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intIdPerfil",self::$_objPerfilArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpPerfil = Perfil::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Perfil()->IdPerfil, $intIdPerfil)
				),
				$objOptionalClauses
			))) {
			    self::$_objPerfilArray["$intIdPerfil"] = $objTmpPerfil;
            }
                        }
                        return isset(self::$_objPerfilArray["$intIdPerfil"])?self::$_objPerfilArray["$intIdPerfil"]:null;
		}

		/**
		 * Load all Perfiles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Perfil[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Perfil::QueryArray to perform the LoadAll query
			try {
				return Perfil::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Perfiles
		 * @return int
		 */
		public static function CountAll() {
			// Call Perfil::QueryCount to perform the CountAll query
			return Perfil::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
        array("name"=>"Nombre","type"=>"string"),
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Perfil::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Perfil()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Perfil()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Perfil no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Perfil::GetDatabase();

			// Create/Build out the QueryBuilder object with Perfil-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'perfil');
			Perfil::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('perfil');

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
		 * Static Qcubed Query method to query for a single Perfil object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Perfil the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Perfil::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Perfil object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Perfil::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Perfil::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Perfil objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Perfil[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Perfil::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Perfil::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Perfil objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Perfil::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Perfil::GetDatabase();

			$strQuery = Perfil::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/perfil', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Perfil::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Perfil
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'perfil';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id_perfil', $strAliasPrefix . 'id_perfil');
			$objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			$objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Perfil from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Perfil::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Perfil
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id_perfil';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intIdPerfil == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'perfil__';


						// Expanding reverse references: UsuarioAsId
						$strAlias = $strAliasPrefix . 'usuarioasid__id_usuario';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objUsuarioAsIdArray)) {
								$objPreviousChildItems = $objPreviousItem->objUsuarioAsIdArray;
								$objChildItem = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioasid__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objUsuarioAsIdArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objUsuarioAsIdArray[] = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'perfil__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Perfil object
			$objToReturn = new Perfil();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id_perfil', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_perfil'] : $strAliasPrefix . 'id_perfil';
			$objToReturn->intIdPerfil = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre'] : $strAliasPrefix . 'nombre';
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'descripcion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'descripcion'] : $strAliasPrefix . 'descripcion';
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdPerfil != $objPreviousItem->IdPerfil) {
						continue;
					}
					if (array_diff($objPreviousItem->objUsuarioAsIdArray, $objToReturn->objUsuarioAsIdArray) != null) {
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
				$strAliasPrefix = 'perfil__';




			// Check for UsuarioAsId Virtual Binding
			$strAlias = $strAliasPrefix . 'usuarioasid__id_usuario';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objUsuarioAsIdArray[] = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objUsuarioAsId = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Perfiles from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Perfil[]
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
					$objItem = Perfil::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Perfil::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Perfil object,
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Perfil
		*/
		public static function LoadByIdPerfil($intIdPerfil, $objOptionalClauses = null) {
			return Perfil::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Perfil()->IdPerfil, $intIdPerfil)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Perfil object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Perfil
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return Perfil::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Perfil()->Nombre, $strNombre)
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
         * Save this Perfil
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Perfil::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.

                    if ($this->intIdPerfil && ($this->intIdPerfil > QDatabaseNumberFieldMax::Integer || $this->intIdPerfil < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdPerfil', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "perfil" (
                            "nombre",
                            "descripcion"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            ' . $objDatabase->SqlVariable($this->strDescripcion) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intIdPerfil = $objDatabase->InsertId('perfil', 'id_perfil');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "perfil"
                        SET
                            "nombre" = ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            "descripcion" = ' . $objDatabase->SqlVariable($this->strDescripcion) . '
                        WHERE
                            "id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '
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
                    $mixToReturn = $this->intIdPerfil;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this Perfil
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdPerfil)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Perfil with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"perfil"
				WHERE
					"id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '');
		}

		/**
		 * Delete all Perfiles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"perfil"');
		}

		/**
		 * Truncate perfil table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "perfil" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Perfil from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Perfil object.');

			// Reload the Object
			$objReloaded = Perfil::Load($this->intIdPerfil, null, true);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strDescripcion = $objReloaded->strDescripcion;
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
            case 'IdPerfil':
                /**
                 * Gets the value for intIdPerfil (Read-Only PK)
                 * @return integer
                 */
                return $this->intIdPerfil;

            case 'Nombre':
                /**
                 * Gets the value for strNombre (Unique)
                 * @return string
                 */
                return $this->strNombre;

            case 'Descripcion':
                /**
                 * Gets the value for strDescripcion 
                 * @return string
                 */
                return $this->strDescripcion;


            ///////////////////
            // Member Objects
            ///////////////////

            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'UsuarioAsId':
                /**
                 * Gets the value for the private _objUsuarioAsId (Read-Only)
                 * if set due to an expansion on the usuario.id_perfil reverse relationship
                 * @return Usuario
                 */
                return $this->objUsuarioAsId;

            case 'UsuarioAsIdArray':
                /**
                 * Gets the value for the private _objUsuarioAsIdArray (Read-Only)
                 * if set due to an ExpandAsArray on the usuario.id_perfil reverse relationship
                 * @return Usuario[]
                 */
                if(is_null($this->objUsuarioAsIdArray))
                    $this->objUsuarioAsIdArray = $this->GetUsuarioAsIdArray();
                return (array) $this->objUsuarioAsIdArray;


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
				case 'Nombre':
					/**
					 * Sets the value for strNombre (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombre = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombre = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
                                                return ($this->strDescripcion = $mixValue);
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
        
			
		
		// Related Objects' Methods for UsuarioAsId
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _UsuarioAsIdArray
                /**
                * Add a Item to the _UsuarioAsIdArray
                * @param Usuario $objItem
                * @return Usuario[]
                */
                public function AddUsuarioAsId(Usuario $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdPerfilObject = $this;
                    $this->objUsuarioAsIdArray = $this->UsuarioAsIdArray;
                    $this->objUsuarioAsIdArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateUsuarioAsId($objItem);

                    return $this->UsuarioAsIdArray;
                }

                /**
                * Remove a Item to the _UsuarioAsIdArray
                * @param Usuario $objItem
                * @return Usuario[]
                */
                public function RemoveUsuarioAsId(Usuario $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objUsuarioAsIdArray;
                    $this->objUsuarioAsIdArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objUsuarioAsIdArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->IdUsuario))
                        try{
                            $objItem->IdPerfilObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedUsuarioAsId($objItem);
                        }

                    return $this->objUsuarioAsIdArray;
                }

		/**
		 * Gets all associated UsuariosAsId as an array of Usuario objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/ 
		public function GetUsuarioAsIdArray($objOptionalClauses = null) {
			if ((is_null($this->intIdPerfil)))
				return array();

			try {
				return Usuario::LoadArrayByIdPerfil($this->intIdPerfil, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsuariosAsId
		 * @return int
		*/ 
		public function CountUsuariosAsId() {
			if ((is_null($this->intIdPerfil)))
				return 0;

			return Usuario::CountByIdPerfil($this->intIdPerfil);
		}

		/**
		 * Associates a UsuarioAsId
		 * @param Usuario $objUsuario
		 * @return void
		*/ 
		public function AssociateUsuarioAsId(Usuario $objUsuario) {
			if ((is_null($this->intIdPerfil)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsId on this unsaved Perfil.');
			if ((is_null($objUsuario->IdUsuario)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsId on this Perfil with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"usuario"
				SET
					"id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '
				WHERE
					"id_usuario" = ' . $objDatabase->SqlVariable($objUsuario->IdUsuario) . '
			');
		}

		/**
		 * Unassociates a UsuarioAsId
		 * @param Usuario $objUsuario
		 * @return void
		*/ 
		public function UnassociateUsuarioAsId(Usuario $objUsuario) {
			if ((is_null($this->intIdPerfil)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsId on this unsaved Perfil.');
			if ((is_null($objUsuario->IdUsuario)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsId on this Perfil with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"usuario"
				SET
					"id_perfil" = null
				WHERE
					"id_usuario" = ' . $objDatabase->SqlVariable($objUsuario->IdUsuario) . ' AND
					"id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '
			');
		}

		/**
		 * Unassociates all UsuariosAsId
		 * @return void
		*/ 
		public function UnassociateAllUsuariosAsId() {
			if ((is_null($this->intIdPerfil)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsId on this unsaved Perfil.');

			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"usuario"
				SET
					"id_perfil" = null
				WHERE
					"id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '
			');
		}

		/**
		 * Deletes an associated UsuarioAsId
		 * @param Usuario $objUsuario
		 * @return void
		*/ 
		public function DeleteAssociatedUsuarioAsId(Usuario $objUsuario) {
			if ((is_null($this->intIdPerfil)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsId on this unsaved Perfil.');
			if ((is_null($objUsuario->IdUsuario)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsId on this Perfil with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"usuario"
				WHERE
					"id_usuario" = ' . $objDatabase->SqlVariable($objUsuario->IdUsuario) . ' AND
					"id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '
			');
		}

		/**
		 * Deletes all associated UsuariosAsId
		 * @return void
		*/ 
		public function DeleteAllUsuariosAsId() {
			if ((is_null($this->intIdPerfil)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsId on this unsaved Perfil.');

			// Get the Database Object for this Class
			$objDatabase = Perfil::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"usuario"
				WHERE
					"id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Perfil"><sequence>';
			$strToReturn .= '<element name="IdPerfil" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Perfil', $strComplexTypeArray)) {
				$strComplexTypeArray['Perfil'] = Perfil::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Perfil::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Perfil();
			if (property_exists($objSoapObject, 'IdPerfil')) {
				$objToReturn->intIdPerfil = $objSoapObject->IdPerfil;
            }
			if (property_exists($objSoapObject, 'Nombre')) {
				$objToReturn->strNombre = $objSoapObject->Nombre;
            }
			if (property_exists($objSoapObject, 'Descripcion')) {
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
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
				array_push($objArrayToReturn, Perfil::GetSoapObjectFromObject($objObject, true));

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