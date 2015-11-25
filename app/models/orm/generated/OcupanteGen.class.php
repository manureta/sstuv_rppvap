<?php
/**
 * The abstract OcupanteGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Ocupante subclass which
 * extends this OcupanteGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Ocupante class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdHogar the value for intIdHogar 
	 * @property string $Apellido the value for strApellido (Not Null)
	 * @property string $Nombres the value for strNombres (Not Null)
	 * @property QDateTime $FechaNacimiento the value for dttFechaNacimiento (Not Null)
	 * @property integer $Edad the value for intEdad 
	 * @property string $EstadoCivil the value for strEstadoCivil 
	 * @property string $DeOConQuien the value for strDeOConQuien 
	 * @property string $Ocupacion the value for strOcupacion 
	 * @property string $Ingreso the value for strIngreso 
	 * @property string $TipoDoc the value for strTipoDoc (Not Null)
	 * @property integer $Doc the value for intDoc (Unique)
	 * @property string $Nacionalidad the value for strNacionalidad 
	 * @property string $NyaMadre the value for strNyaMadre 
	 * @property string $NyaPadre the value for strNyaPadre 
	 * @property boolean $Activo the value for blnActivo 
	 * @property Hogar $IdHogarObject the value for the Hogar object referenced by intIdHogar 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class OcupanteGen extends QBaseClass {

    public static function Noun() {
        return 'Ocupante';
    }
    public static function NounPlural() {
        return 'Ocupantes';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column ocupante.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'ocupante_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column ocupante.id_hogar
     * @var integer intIdHogar
     */
    protected $intIdHogar;
    const IdHogarDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.apellido
     * @var string strApellido
     */
    protected $strApellido;
    const ApellidoMaxLength = 255;
    const ApellidoDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.nombres
     * @var string strNombres
     */
    protected $strNombres;
    const NombresMaxLength = 255;
    const NombresDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.fecha_nacimiento
     * @var QDateTime dttFechaNacimiento
     */
    protected $dttFechaNacimiento;
    const FechaNacimientoDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.edad
     * @var integer intEdad
     */
    protected $intEdad;
    const EdadDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.estado_civil
     * @var string strEstadoCivil
     */
    protected $strEstadoCivil;
    const EstadoCivilMaxLength = 255;
    const EstadoCivilDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.de_o_con_quien
     * @var string strDeOConQuien
     */
    protected $strDeOConQuien;
    const DeOConQuienMaxLength = 255;
    const DeOConQuienDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.ocupacion
     * @var string strOcupacion
     */
    protected $strOcupacion;
    const OcupacionMaxLength = 255;
    const OcupacionDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.ingreso
     * @var string strIngreso
     */
    protected $strIngreso;
    const IngresoMaxLength = 10;
    const IngresoDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.tipo_doc
     * @var string strTipoDoc
     */
    protected $strTipoDoc;
    const TipoDocMaxLength = 255;
    const TipoDocDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.doc
     * @var integer intDoc
     */
    protected $intDoc;
    const DocDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.nacionalidad
     * @var string strNacionalidad
     */
    protected $strNacionalidad;
    const NacionalidadMaxLength = 255;
    const NacionalidadDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.nya_madre
     * @var string strNyaMadre
     */
    protected $strNyaMadre;
    const NyaMadreMaxLength = 255;
    const NyaMadreDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.nya_padre
     * @var string strNyaPadre
     */
    protected $strNyaPadre;
    const NyaPadreMaxLength = 255;
    const NyaPadreDefault = null;


    /**
     * Protected member variable that maps to the database column ocupante.activo
     * @var boolean blnActivo
     */
    protected $blnActivo;
    const ActivoDefault = null;


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
		 * in the database column ocupante.id_hogar.
		 *
		 * NOTE: Always use the IdHogarObject property getter to correctly retrieve this Hogar object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Hogar objIdHogarObject
		 */
		protected $objIdHogarObject;



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
                protected static $_objOcupanteArray = array();


		/**
		 * Load a Ocupante from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Ocupante
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Ocupante::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Ocupante()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objOcupanteArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpOcupante = Ocupante::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Ocupante()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objOcupanteArray["$intId"] = $objTmpOcupante;
            }
                        }
                        return isset(self::$_objOcupanteArray["$intId"])?self::$_objOcupanteArray["$intId"]:null;
		}

		/**
		 * Load all Ocupantes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ocupante[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Ocupante::QueryArray to perform the LoadAll query
			try {
				return Ocupante::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Ocupantes
		 * @return int
		 */
		public static function CountAll() {
			// Call Ocupante::QueryCount to perform the CountAll query
			return Ocupante::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
        array("name"=>"Doc","type"=>"integer"),
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Ocupante::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Ocupante()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Ocupante()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Ocupante no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Ocupante::GetDatabase();

			// Create/Build out the QueryBuilder object with Ocupante-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'ocupante');
			Ocupante::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('ocupante');

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
		 * Static Qcubed Query method to query for a single Ocupante object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ocupante the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ocupante::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Ocupante object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Ocupante::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Ocupante::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Ocupante objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ocupante[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ocupante::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Ocupante::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Ocupante objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ocupante::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Ocupante::GetDatabase();

			$strQuery = Ocupante::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/ocupante', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Ocupante::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Ocupante
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'ocupante';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_hogar', $strAliasPrefix . 'id_hogar');
			$objBuilder->AddSelectItem($strTableName, 'apellido', $strAliasPrefix . 'apellido');
			$objBuilder->AddSelectItem($strTableName, 'nombres', $strAliasPrefix . 'nombres');
			$objBuilder->AddSelectItem($strTableName, 'fecha_nacimiento', $strAliasPrefix . 'fecha_nacimiento');
			$objBuilder->AddSelectItem($strTableName, 'edad', $strAliasPrefix . 'edad');
			$objBuilder->AddSelectItem($strTableName, 'estado_civil', $strAliasPrefix . 'estado_civil');
			$objBuilder->AddSelectItem($strTableName, 'de_o_con_quien', $strAliasPrefix . 'de_o_con_quien');
			$objBuilder->AddSelectItem($strTableName, 'ocupacion', $strAliasPrefix . 'ocupacion');
			$objBuilder->AddSelectItem($strTableName, 'ingreso', $strAliasPrefix . 'ingreso');
			$objBuilder->AddSelectItem($strTableName, 'tipo_doc', $strAliasPrefix . 'tipo_doc');
			$objBuilder->AddSelectItem($strTableName, 'doc', $strAliasPrefix . 'doc');
			$objBuilder->AddSelectItem($strTableName, 'nacionalidad', $strAliasPrefix . 'nacionalidad');
			$objBuilder->AddSelectItem($strTableName, 'nya_madre', $strAliasPrefix . 'nya_madre');
			$objBuilder->AddSelectItem($strTableName, 'nya_padre', $strAliasPrefix . 'nya_padre');
			$objBuilder->AddSelectItem($strTableName, 'activo', $strAliasPrefix . 'activo');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Ocupante from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Ocupante::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Ocupante
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Ocupante object
			$objToReturn = new Ocupante();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_hogar', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_hogar'] : $strAliasPrefix . 'id_hogar';
			$objToReturn->intIdHogar = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'apellido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'apellido'] : $strAliasPrefix . 'apellido';
			$objToReturn->strApellido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombres', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombres'] : $strAliasPrefix . 'nombres';
			$objToReturn->strNombres = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_nacimiento', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_nacimiento'] : $strAliasPrefix . 'fecha_nacimiento';
			$objToReturn->dttFechaNacimiento = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'edad', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'edad'] : $strAliasPrefix . 'edad';
			$objToReturn->intEdad = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'estado_civil', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'estado_civil'] : $strAliasPrefix . 'estado_civil';
			$objToReturn->strEstadoCivil = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'de_o_con_quien', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'de_o_con_quien'] : $strAliasPrefix . 'de_o_con_quien';
			$objToReturn->strDeOConQuien = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ocupacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ocupacion'] : $strAliasPrefix . 'ocupacion';
			$objToReturn->strOcupacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ingreso', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ingreso'] : $strAliasPrefix . 'ingreso';
			$objToReturn->strIngreso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'tipo_doc', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tipo_doc'] : $strAliasPrefix . 'tipo_doc';
			$objToReturn->strTipoDoc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'doc', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'doc'] : $strAliasPrefix . 'doc';
			$objToReturn->intDoc = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'nacionalidad', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nacionalidad'] : $strAliasPrefix . 'nacionalidad';
			$objToReturn->strNacionalidad = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nya_madre', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nya_madre'] : $strAliasPrefix . 'nya_madre';
			$objToReturn->strNyaMadre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nya_padre', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nya_padre'] : $strAliasPrefix . 'nya_padre';
			$objToReturn->strNyaPadre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'activo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'activo'] : $strAliasPrefix . 'activo';
			$objToReturn->blnActivo = $objDbRow->GetColumn($strAliasName, 'Bit');

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
				$strAliasPrefix = 'ocupante__';

			// Check for IdHogarObject Early Binding
			$strAlias = $strAliasPrefix . 'id_hogar__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdHogarObject = Hogar::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_hogar__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Ocupantes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Ocupante[]
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
					$objItem = Ocupante::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Ocupante::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Ocupante object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ocupante
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Ocupante::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Ocupante()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Ocupante object,
		 * by Doc Index(es)
		 * @param integer $intDoc
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ocupante
		*/
		public static function LoadByDoc($intDoc, $objOptionalClauses = null) {
			return Ocupante::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Ocupante()->Doc, $intDoc)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Ocupante objects,
		 * by IdHogar Index(es)
		 * @param integer $intIdHogar
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ocupante[]
		*/
		public static function LoadArrayByIdHogar($intIdHogar, $objOptionalClauses = null) {
			// Call Ocupante::QueryArray to perform the LoadArrayByIdHogar query
			try {
				return Ocupante::QueryArray(
					QQ::Equal(QQN::Ocupante()->IdHogar, $intIdHogar),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ocupantes
		 * by IdHogar Index(es)
		 * @param integer $intIdHogar
		 * @return int
		*/
		public static function CountByIdHogar($intIdHogar) {
			// Call Ocupante::QueryCount to perform the CountByIdHogar query
			return Ocupante::QueryCount(
				QQ::Equal(QQN::Ocupante()->IdHogar, $intIdHogar)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Ocupante
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Ocupante::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.
            // ver si objIdHogarObject esta Guardado
            if(is_null($this->intIdHogar)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdHogarObject))
                try{
                    if(!is_null($this->IdHogarObject->IdHogar))
                        $this->intIdHogar = $this->IdHogarObject->IdHogar;
                    else
                        $this->intIdHogar = $this->IdHogarObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }

                    if ($this->intId && ($this->intId > QDatabaseNumberFieldMax::Integer || $this->intId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intId', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdHogar && ($this->intIdHogar > QDatabaseNumberFieldMax::Integer || $this->intIdHogar < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdHogar', QDatabaseFieldType::Integer);
                    }
                    if ($this->intEdad && ($this->intEdad > QDatabaseNumberFieldMax::Integer || $this->intEdad < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEdad', QDatabaseFieldType::Integer);
                    }
                    if ($this->intDoc && ($this->intDoc > QDatabaseNumberFieldMax::Integer || $this->intDoc < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intDoc', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "ocupante" (
                            "id_hogar",
                            "apellido",
                            "nombres",
                            "fecha_nacimiento",
                            "edad",
                            "estado_civil",
                            "de_o_con_quien",
                            "ocupacion",
                            "ingreso",
                            "tipo_doc",
                            "doc",
                            "nacionalidad",
                            "nya_madre",
                            "nya_padre",
                            "activo"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdHogar) . ',
                            ' . $objDatabase->SqlVariable($this->strApellido) . ',
                            ' . $objDatabase->SqlVariable($this->strNombres) . ',
                            ' . $objDatabase->SqlVariable($this->dttFechaNacimiento) . ',
                            ' . $objDatabase->SqlVariable($this->intEdad) . ',
                            ' . $objDatabase->SqlVariable($this->strEstadoCivil) . ',
                            ' . $objDatabase->SqlVariable($this->strDeOConQuien) . ',
                            ' . $objDatabase->SqlVariable($this->strOcupacion) . ',
                            ' . $objDatabase->SqlVariable($this->strIngreso) . ',
                            ' . $objDatabase->SqlVariable($this->strTipoDoc) . ',
                            ' . $objDatabase->SqlVariable($this->intDoc) . ',
                            ' . $objDatabase->SqlVariable($this->strNacionalidad) . ',
                            ' . $objDatabase->SqlVariable($this->strNyaMadre) . ',
                            ' . $objDatabase->SqlVariable($this->strNyaPadre) . ',
                            ' . $objDatabase->SqlVariable($this->blnActivo) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('ocupante', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "ocupante"
                        SET
                            "id_hogar" = ' . $objDatabase->SqlVariable($this->intIdHogar) . ',
                            "apellido" = ' . $objDatabase->SqlVariable($this->strApellido) . ',
                            "nombres" = ' . $objDatabase->SqlVariable($this->strNombres) . ',
                            "fecha_nacimiento" = ' . $objDatabase->SqlVariable($this->dttFechaNacimiento) . ',
                            "edad" = ' . $objDatabase->SqlVariable($this->intEdad) . ',
                            "estado_civil" = ' . $objDatabase->SqlVariable($this->strEstadoCivil) . ',
                            "de_o_con_quien" = ' . $objDatabase->SqlVariable($this->strDeOConQuien) . ',
                            "ocupacion" = ' . $objDatabase->SqlVariable($this->strOcupacion) . ',
                            "ingreso" = ' . $objDatabase->SqlVariable($this->strIngreso) . ',
                            "tipo_doc" = ' . $objDatabase->SqlVariable($this->strTipoDoc) . ',
                            "doc" = ' . $objDatabase->SqlVariable($this->intDoc) . ',
                            "nacionalidad" = ' . $objDatabase->SqlVariable($this->strNacionalidad) . ',
                            "nya_madre" = ' . $objDatabase->SqlVariable($this->strNyaMadre) . ',
                            "nya_padre" = ' . $objDatabase->SqlVariable($this->strNyaPadre) . ',
                            "activo" = ' . $objDatabase->SqlVariable($this->blnActivo) . '
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
		 * Delete this Ocupante
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Ocupante with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Ocupante::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"ocupante"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Ocupantes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Ocupante::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"ocupante"');
		}

		/**
		 * Truncate ocupante table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Ocupante::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "ocupante" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Ocupante from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Ocupante object.');

			// Reload the Object
			$objReloaded = Ocupante::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdHogar = $objReloaded->IdHogar;
			$this->strApellido = $objReloaded->strApellido;
			$this->strNombres = $objReloaded->strNombres;
			$this->dttFechaNacimiento = $objReloaded->dttFechaNacimiento;
			$this->intEdad = $objReloaded->intEdad;
			$this->strEstadoCivil = $objReloaded->strEstadoCivil;
			$this->strDeOConQuien = $objReloaded->strDeOConQuien;
			$this->strOcupacion = $objReloaded->strOcupacion;
			$this->strIngreso = $objReloaded->strIngreso;
			$this->strTipoDoc = $objReloaded->strTipoDoc;
			$this->intDoc = $objReloaded->intDoc;
			$this->strNacionalidad = $objReloaded->strNacionalidad;
			$this->strNyaMadre = $objReloaded->strNyaMadre;
			$this->strNyaPadre = $objReloaded->strNyaPadre;
			$this->blnActivo = $objReloaded->blnActivo;
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

            case 'IdHogar':
                /**
                 * Gets the value for intIdHogar 
                 * @return integer
                 */
                return $this->intIdHogar;

            case 'Apellido':
                /**
                 * Gets the value for strApellido (Not Null)
                 * @return string
                 */
                return $this->strApellido;

            case 'Nombres':
                /**
                 * Gets the value for strNombres (Not Null)
                 * @return string
                 */
                return $this->strNombres;

            case 'FechaNacimiento':
                /**
                 * Gets the value for dttFechaNacimiento (Not Null)
                 * @return QDateTime
                 */
                return $this->dttFechaNacimiento;

            case 'Edad':
                /**
                 * Gets the value for intEdad 
                 * @return integer
                 */
                return $this->intEdad;

            case 'EstadoCivil':
                /**
                 * Gets the value for strEstadoCivil 
                 * @return string
                 */
                return $this->strEstadoCivil;

            case 'DeOConQuien':
                /**
                 * Gets the value for strDeOConQuien 
                 * @return string
                 */
                return $this->strDeOConQuien;

            case 'Ocupacion':
                /**
                 * Gets the value for strOcupacion 
                 * @return string
                 */
                return $this->strOcupacion;

            case 'Ingreso':
                /**
                 * Gets the value for strIngreso 
                 * @return string
                 */
                return $this->strIngreso;

            case 'TipoDoc':
                /**
                 * Gets the value for strTipoDoc (Not Null)
                 * @return string
                 */
                return $this->strTipoDoc;

            case 'Doc':
                /**
                 * Gets the value for intDoc (Unique)
                 * @return integer
                 */
                return $this->intDoc;

            case 'Nacionalidad':
                /**
                 * Gets the value for strNacionalidad 
                 * @return string
                 */
                return $this->strNacionalidad;

            case 'NyaMadre':
                /**
                 * Gets the value for strNyaMadre 
                 * @return string
                 */
                return $this->strNyaMadre;

            case 'NyaPadre':
                /**
                 * Gets the value for strNyaPadre 
                 * @return string
                 */
                return $this->strNyaPadre;

            case 'Activo':
                /**
                 * Gets the value for blnActivo 
                 * @return boolean
                 */
                return $this->blnActivo;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdHogarObject':
                /**
                 * Gets the value for the Hogar object referenced by intIdHogar 
                 * @return Hogar
                 */
                try {
                    if ((!$this->objIdHogarObject) && (!is_null($this->intIdHogar)))
                        $this->objIdHogarObject = Hogar::Load($this->intIdHogar);
                    return $this->objIdHogarObject;
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
				case 'IdHogar':
					/**
					 * Sets the value for intIdHogar 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdHogarObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdHogar = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdHogar = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Apellido':
					/**
					 * Sets the value for strApellido (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strApellido = QType::Cast($mixValue, QType::String));
                                                return ($this->strApellido = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nombres':
					/**
					 * Sets the value for strNombres (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombres = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombres = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNacimiento':
					/**
					 * Sets the value for dttFechaNacimiento (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttFechaNacimiento = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttFechaNacimiento = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Edad':
					/**
					 * Sets the value for intEdad 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEdad = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEdad = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoCivil':
					/**
					 * Sets the value for strEstadoCivil 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strEstadoCivil = QType::Cast($mixValue, QType::String));
                                                return ($this->strEstadoCivil = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeOConQuien':
					/**
					 * Sets the value for strDeOConQuien 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDeOConQuien = QType::Cast($mixValue, QType::String));
                                                return ($this->strDeOConQuien = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ocupacion':
					/**
					 * Sets the value for strOcupacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOcupacion = QType::Cast($mixValue, QType::String));
                                                return ($this->strOcupacion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ingreso':
					/**
					 * Sets the value for strIngreso 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strIngreso = QType::Cast($mixValue, QType::String));
                                                return ($this->strIngreso = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoDoc':
					/**
					 * Sets the value for strTipoDoc (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTipoDoc = QType::Cast($mixValue, QType::String));
                                                return ($this->strTipoDoc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Doc':
					/**
					 * Sets the value for intDoc (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intDoc = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intDoc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nacionalidad':
					/**
					 * Sets the value for strNacionalidad 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNacionalidad = QType::Cast($mixValue, QType::String));
                                                return ($this->strNacionalidad = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NyaMadre':
					/**
					 * Sets the value for strNyaMadre 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNyaMadre = QType::Cast($mixValue, QType::String));
                                                return ($this->strNyaMadre = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NyaPadre':
					/**
					 * Sets the value for strNyaPadre 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNyaPadre = QType::Cast($mixValue, QType::String));
                                                return ($this->strNyaPadre = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Activo':
					/**
					 * Sets the value for blnActivo 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnActivo = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnActivo = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdHogarObject':
					/**
					 * Sets the value for the Hogar object referenced by intIdHogar 
					 * @param Hogar $mixValue
					 * @return Hogar
					 */
					if (is_null($mixValue)) {
						$this->intIdHogar = null;
						$this->objIdHogarObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Hogar object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Hogar');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Hogar object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved IdHogarObject for this Ocupante');

						// Update Local Member Variables
						$this->objIdHogarObject = $mixValue;
						$this->intIdHogar = $mixValue->Id;

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
			$strToReturn = '<complexType name="Ocupante"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdHogarObject" type="xsd1:Hogar"/>';
			$strToReturn .= '<element name="Apellido" type="xsd:string"/>';
			$strToReturn .= '<element name="Nombres" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNacimiento" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Edad" type="xsd:int"/>';
			$strToReturn .= '<element name="EstadoCivil" type="xsd:string"/>';
			$strToReturn .= '<element name="DeOConQuien" type="xsd:string"/>';
			$strToReturn .= '<element name="Ocupacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Ingreso" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoDoc" type="xsd:string"/>';
			$strToReturn .= '<element name="Doc" type="xsd:int"/>';
			$strToReturn .= '<element name="Nacionalidad" type="xsd:string"/>';
			$strToReturn .= '<element name="NyaMadre" type="xsd:string"/>';
			$strToReturn .= '<element name="NyaPadre" type="xsd:string"/>';
			$strToReturn .= '<element name="Activo" type="xsd:boolean"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Ocupante', $strComplexTypeArray)) {
				$strComplexTypeArray['Ocupante'] = Ocupante::GetSoapComplexTypeXml();
				$strComplexTypeArray = Hogar::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Ocupante::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Ocupante();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdHogarObject')) &&
				($objSoapObject->IdHogarObject))
				$objToReturn->IdHogarObject = Hogar::GetObjectFromSoapObject($objSoapObject->IdHogarObject);
			if (property_exists($objSoapObject, 'Apellido')) {
				$objToReturn->strApellido = $objSoapObject->Apellido;
            }
			if (property_exists($objSoapObject, 'Nombres')) {
				$objToReturn->strNombres = $objSoapObject->Nombres;
            }
			if (property_exists($objSoapObject, 'FechaNacimiento')) {
				$objToReturn->dttFechaNacimiento = new QDateTime($objSoapObject->FechaNacimiento);
            }
			if (property_exists($objSoapObject, 'Edad')) {
				$objToReturn->intEdad = $objSoapObject->Edad;
            }
			if (property_exists($objSoapObject, 'EstadoCivil')) {
				$objToReturn->strEstadoCivil = $objSoapObject->EstadoCivil;
            }
			if (property_exists($objSoapObject, 'DeOConQuien')) {
				$objToReturn->strDeOConQuien = $objSoapObject->DeOConQuien;
            }
			if (property_exists($objSoapObject, 'Ocupacion')) {
				$objToReturn->strOcupacion = $objSoapObject->Ocupacion;
            }
			if (property_exists($objSoapObject, 'Ingreso')) {
				$objToReturn->strIngreso = $objSoapObject->Ingreso;
            }
			if (property_exists($objSoapObject, 'TipoDoc')) {
				$objToReturn->strTipoDoc = $objSoapObject->TipoDoc;
            }
			if (property_exists($objSoapObject, 'Doc')) {
				$objToReturn->intDoc = $objSoapObject->Doc;
            }
			if (property_exists($objSoapObject, 'Nacionalidad')) {
				$objToReturn->strNacionalidad = $objSoapObject->Nacionalidad;
            }
			if (property_exists($objSoapObject, 'NyaMadre')) {
				$objToReturn->strNyaMadre = $objSoapObject->NyaMadre;
            }
			if (property_exists($objSoapObject, 'NyaPadre')) {
				$objToReturn->strNyaPadre = $objSoapObject->NyaPadre;
            }
			if (property_exists($objSoapObject, 'Activo')) {
				$objToReturn->blnActivo = $objSoapObject->Activo;
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
				array_push($objArrayToReturn, Ocupante::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdHogarObject)
				$objObject->objIdHogarObject = Hogar::GetSoapObjectFromObject($objObject->objIdHogarObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdHogar = null;
			if ($objObject->dttFechaNacimiento)
				$objObject->dttFechaNacimiento = $objObject->dttFechaNacimiento->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>