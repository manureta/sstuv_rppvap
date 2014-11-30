<?php
/**
 * The abstract UsuarioGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Usuario subclass which
 * extends this UsuarioGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Usuario class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdUsuario the value for intIdUsuario (Read-Only PK)
	 * @property string $Password the value for strPassword (Not Null)
	 * @property string $Email the value for strEmail (Not Null)
	 * @property boolean $SuperAdmin the value for blnSuperAdmin 
	 * @property QDateTime $FechaActivacion the value for dttFechaActivacion (Not Null)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property integer $IdPerfil the value for intIdPerfil 
	 * @property string $RespuestaA the value for strRespuestaA 
	 * @property string $RespuestaB the value for strRespuestaB 
	 * @property string $PreguntaSecretaA the value for strPreguntaSecretaA 
	 * @property string $PreguntaSecretaB the value for strPreguntaSecretaB 
	 * @property string $CodPartido the value for strCodPartido 
	 * @property Perfil $IdPerfilObject the value for the Perfil object referenced by intIdPerfil 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class UsuarioGen extends QBaseClass {

    public static function Noun() {
        return 'Usuario';
    }
    public static function NounPlural() {
        return 'Usuarios';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column usuario.id_usuario
     * @var integer intIdUsuario
     */
    protected $intIdUsuario;
    const IdUsuarioDefault = 'nextval(\'usuario_id_usuario_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column usuario.password
     * @var string strPassword
     */
    protected $strPassword;
    const PasswordDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.email
     * @var string strEmail
     */
    protected $strEmail;
    const EmailDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.super_admin
     * @var boolean blnSuperAdmin
     */
    protected $blnSuperAdmin;
    const SuperAdminDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.fecha_activacion
     * @var QDateTime dttFechaActivacion
     */
    protected $dttFechaActivacion;
    const FechaActivacionDefault = 'now()';


    /**
     * Protected member variable that maps to the database column usuario.nombre
     * @var string strNombre
     */
    protected $strNombre;
    const NombreDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.id_perfil
     * @var integer intIdPerfil
     */
    protected $intIdPerfil;
    const IdPerfilDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.respuesta_a
     * @var string strRespuestaA
     */
    protected $strRespuestaA;
    const RespuestaADefault = null;


    /**
     * Protected member variable that maps to the database column usuario.respuesta_b
     * @var string strRespuestaB
     */
    protected $strRespuestaB;
    const RespuestaBDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.pregunta_secreta_a
     * @var string strPreguntaSecretaA
     */
    protected $strPreguntaSecretaA;
    const PreguntaSecretaADefault = null;


    /**
     * Protected member variable that maps to the database column usuario.pregunta_secreta_b
     * @var string strPreguntaSecretaB
     */
    protected $strPreguntaSecretaB;
    const PreguntaSecretaBDefault = null;


    /**
     * Protected member variable that maps to the database column usuario.cod_partido
     * @var string strCodPartido
     */
    protected $strCodPartido;
    const CodPartidoMaxLength = 3;
    const CodPartidoDefault = null;


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
		 * in the database column usuario.id_perfil.
		 *
		 * NOTE: Always use the IdPerfilObject property getter to correctly retrieve this Perfil object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Perfil objIdPerfilObject
		 */
		protected $objIdPerfilObject;



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
                protected static $_objUsuarioArray = array();


		/**
		 * Load a Usuario from PK Info
		 * @param integer $intIdUsuario
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Usuario
		 */
		public static function Load($intIdUsuario, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->IdUsuario, $intIdUsuario)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intIdUsuario",self::$_objUsuarioArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpUsuario = Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->IdUsuario, $intIdUsuario)
				),
				$objOptionalClauses
			))) {
			    self::$_objUsuarioArray["$intIdUsuario"] = $objTmpUsuario;
            }
                        }
                        return isset(self::$_objUsuarioArray["$intIdUsuario"])?self::$_objUsuarioArray["$intIdUsuario"]:null;
		}

		/**
		 * Load all Usuarios
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Usuario::QueryArray to perform the LoadAll query
			try {
				return Usuario::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Usuarios
		 * @return int
		 */
		public static function CountAll() {
			// Call Usuario::QueryCount to perform the CountAll query
			return Usuario::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
        array("name"=>"Nombre","type"=>"string"),
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Usuario::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Usuario()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Usuario()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Usuario no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Usuario::GetDatabase();

			// Create/Build out the QueryBuilder object with Usuario-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'usuario');
			Usuario::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('usuario');

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
		 * Static Qcubed Query method to query for a single Usuario object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Usuario the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Usuario object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Usuario::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Usuario::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Usuario objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Usuario[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Usuario::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Usuario objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Usuario::GetDatabase();

			$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/usuario', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Usuario::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Usuario
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'usuario';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id_usuario', $strAliasPrefix . 'id_usuario');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'super_admin', $strAliasPrefix . 'super_admin');
			$objBuilder->AddSelectItem($strTableName, 'fecha_activacion', $strAliasPrefix . 'fecha_activacion');
			$objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			$objBuilder->AddSelectItem($strTableName, 'id_perfil', $strAliasPrefix . 'id_perfil');
			$objBuilder->AddSelectItem($strTableName, 'respuesta_a', $strAliasPrefix . 'respuesta_a');
			$objBuilder->AddSelectItem($strTableName, 'respuesta_b', $strAliasPrefix . 'respuesta_b');
			$objBuilder->AddSelectItem($strTableName, 'pregunta_secreta_a', $strAliasPrefix . 'pregunta_secreta_a');
			$objBuilder->AddSelectItem($strTableName, 'pregunta_secreta_b', $strAliasPrefix . 'pregunta_secreta_b');
			$objBuilder->AddSelectItem($strTableName, 'cod_partido', $strAliasPrefix . 'cod_partido');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Usuario from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Usuario::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Usuario
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Usuario object
			$objToReturn = new Usuario();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id_usuario', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_usuario'] : $strAliasPrefix . 'id_usuario';
			$objToReturn->intIdUsuario = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'super_admin', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'super_admin'] : $strAliasPrefix . 'super_admin';
			$objToReturn->blnSuperAdmin = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_activacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_activacion'] : $strAliasPrefix . 'fecha_activacion';
			$objToReturn->dttFechaActivacion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre'] : $strAliasPrefix . 'nombre';
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_perfil', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_perfil'] : $strAliasPrefix . 'id_perfil';
			$objToReturn->intIdPerfil = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'respuesta_a', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'respuesta_a'] : $strAliasPrefix . 'respuesta_a';
			$objToReturn->strRespuestaA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'respuesta_b', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'respuesta_b'] : $strAliasPrefix . 'respuesta_b';
			$objToReturn->strRespuestaB = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'pregunta_secreta_a', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'pregunta_secreta_a'] : $strAliasPrefix . 'pregunta_secreta_a';
			$objToReturn->strPreguntaSecretaA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'pregunta_secreta_b', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'pregunta_secreta_b'] : $strAliasPrefix . 'pregunta_secreta_b';
			$objToReturn->strPreguntaSecretaB = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'cod_partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cod_partido'] : $strAliasPrefix . 'cod_partido';
			$objToReturn->strCodPartido = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdUsuario != $objPreviousItem->IdUsuario) {
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
				$strAliasPrefix = 'usuario__';

			// Check for IdPerfilObject Early Binding
			$strAlias = $strAliasPrefix . 'id_perfil__id_perfil';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdPerfilObject = Perfil::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_perfil__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Usuarios from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Usuario[]
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
					$objItem = Usuario::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Usuario::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Usuario object,
		 * by IdUsuario Index(es)
		 * @param integer $intIdUsuario
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario
		*/
		public static function LoadByIdUsuario($intIdUsuario, $objOptionalClauses = null) {
			return Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->IdUsuario, $intIdUsuario)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Usuario object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->Nombre, $strNombre)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Usuario objects,
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByIdPerfil($intIdPerfil, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByIdPerfil query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->IdPerfil, $intIdPerfil),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by IdPerfil Index(es)
		 * @param integer $intIdPerfil
		 * @return int
		*/
		public static function CountByIdPerfil($intIdPerfil) {
			// Call Usuario::QueryCount to perform the CountByIdPerfil query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->IdPerfil, $intIdPerfil)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Usuario
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Usuario::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.
            // ver si objIdPerfilObject esta Guardado
            if(is_null($this->intIdPerfil)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdPerfilObject))
                try{
                    if(!is_null($this->IdPerfilObject->IdPerfil))
                        $this->intIdPerfil = $this->IdPerfilObject->IdPerfil;
                    else
                        $this->intIdPerfil = $this->IdPerfilObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }

                    if ($this->intIdUsuario && ($this->intIdUsuario > QDatabaseNumberFieldMax::Integer || $this->intIdUsuario < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdUsuario', QDatabaseFieldType::Integer);
                    }
                    if ($this->intIdPerfil && ($this->intIdPerfil > QDatabaseNumberFieldMax::Integer || $this->intIdPerfil < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdPerfil', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "usuario" (
                            "password",
                            "email",
                            "super_admin",
                            "fecha_activacion",
                            "nombre",
                            "id_perfil",
                            "respuesta_a",
                            "respuesta_b",
                            "pregunta_secreta_a",
                            "pregunta_secreta_b",
                            "cod_partido"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strPassword) . ',
                            ' . $objDatabase->SqlVariable($this->strEmail) . ',
                            ' . $objDatabase->SqlVariable($this->blnSuperAdmin) . ',
                            ' . (!is_null($this->dttFechaActivacion)?$objDatabase->SqlVariable($this->dttFechaActivacion):self::FechaActivacionDefault) . ',
                            ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            ' . $objDatabase->SqlVariable($this->intIdPerfil) . ',
                            ' . $objDatabase->SqlVariable($this->strRespuestaA) . ',
                            ' . $objDatabase->SqlVariable($this->strRespuestaB) . ',
                            ' . $objDatabase->SqlVariable($this->strPreguntaSecretaA) . ',
                            ' . $objDatabase->SqlVariable($this->strPreguntaSecretaB) . ',
                            ' . $objDatabase->SqlVariable($this->strCodPartido) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intIdUsuario = $objDatabase->InsertId('usuario', 'id_usuario');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "usuario"
                        SET
                            "password" = ' . $objDatabase->SqlVariable($this->strPassword) . ',
                            "email" = ' . $objDatabase->SqlVariable($this->strEmail) . ',
                            "super_admin" = ' . $objDatabase->SqlVariable($this->blnSuperAdmin) . ',
                            "fecha_activacion" = ' . $objDatabase->SqlVariable($this->dttFechaActivacion) . ',
                            "nombre" = ' . $objDatabase->SqlVariable($this->strNombre) . ',
                            "id_perfil" = ' . $objDatabase->SqlVariable($this->intIdPerfil) . ',
                            "respuesta_a" = ' . $objDatabase->SqlVariable($this->strRespuestaA) . ',
                            "respuesta_b" = ' . $objDatabase->SqlVariable($this->strRespuestaB) . ',
                            "pregunta_secreta_a" = ' . $objDatabase->SqlVariable($this->strPreguntaSecretaA) . ',
                            "pregunta_secreta_b" = ' . $objDatabase->SqlVariable($this->strPreguntaSecretaB) . ',
                            "cod_partido" = ' . $objDatabase->SqlVariable($this->strCodPartido) . '
                        WHERE
                            "id_usuario" = ' . $objDatabase->SqlVariable($this->intIdUsuario) . '
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
                    $mixToReturn = $this->intIdUsuario;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this Usuario
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdUsuario)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Usuario with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"usuario"
				WHERE
					"id_usuario" = ' . $objDatabase->SqlVariable($this->intIdUsuario) . '');
		}

		/**
		 * Delete all Usuarios
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"usuario"');
		}

		/**
		 * Truncate usuario table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "usuario" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Usuario from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Usuario object.');

			// Reload the Object
			$objReloaded = Usuario::Load($this->intIdUsuario, null, true);

			// Update $this's local variables to match
			$this->strPassword = $objReloaded->strPassword;
			$this->strEmail = $objReloaded->strEmail;
			$this->blnSuperAdmin = $objReloaded->blnSuperAdmin;
			$this->dttFechaActivacion = $objReloaded->dttFechaActivacion;
			$this->strNombre = $objReloaded->strNombre;
			$this->IdPerfil = $objReloaded->IdPerfil;
			$this->strRespuestaA = $objReloaded->strRespuestaA;
			$this->strRespuestaB = $objReloaded->strRespuestaB;
			$this->strPreguntaSecretaA = $objReloaded->strPreguntaSecretaA;
			$this->strPreguntaSecretaB = $objReloaded->strPreguntaSecretaB;
			$this->strCodPartido = $objReloaded->strCodPartido;
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
            case 'IdUsuario':
                /**
                 * Gets the value for intIdUsuario (Read-Only PK)
                 * @return integer
                 */
                return $this->intIdUsuario;

            case 'Password':
                /**
                 * Gets the value for strPassword (Not Null)
                 * @return string
                 */
                return $this->strPassword;

            case 'Email':
                /**
                 * Gets the value for strEmail (Not Null)
                 * @return string
                 */
                return $this->strEmail;

            case 'SuperAdmin':
                /**
                 * Gets the value for blnSuperAdmin 
                 * @return boolean
                 */
                return $this->blnSuperAdmin;

            case 'FechaActivacion':
                /**
                 * Gets the value for dttFechaActivacion (Not Null)
                 * @return QDateTime
                 */
                return $this->dttFechaActivacion;

            case 'Nombre':
                /**
                 * Gets the value for strNombre (Unique)
                 * @return string
                 */
                return $this->strNombre;

            case 'IdPerfil':
                /**
                 * Gets the value for intIdPerfil 
                 * @return integer
                 */
                return $this->intIdPerfil;

            case 'RespuestaA':
                /**
                 * Gets the value for strRespuestaA 
                 * @return string
                 */
                return $this->strRespuestaA;

            case 'RespuestaB':
                /**
                 * Gets the value for strRespuestaB 
                 * @return string
                 */
                return $this->strRespuestaB;

            case 'PreguntaSecretaA':
                /**
                 * Gets the value for strPreguntaSecretaA 
                 * @return string
                 */
                return $this->strPreguntaSecretaA;

            case 'PreguntaSecretaB':
                /**
                 * Gets the value for strPreguntaSecretaB 
                 * @return string
                 */
                return $this->strPreguntaSecretaB;

            case 'CodPartido':
                /**
                 * Gets the value for strCodPartido 
                 * @return string
                 */
                return $this->strCodPartido;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdPerfilObject':
                /**
                 * Gets the value for the Perfil object referenced by intIdPerfil 
                 * @return Perfil
                 */
                try {
                    if ((!$this->objIdPerfilObject) && (!is_null($this->intIdPerfil)))
                        $this->objIdPerfilObject = Perfil::Load($this->intIdPerfil);
                    return $this->objIdPerfilObject;
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
				case 'Password':
					/**
					 * Sets the value for strPassword (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPassword = QType::Cast($mixValue, QType::String));
                                                return ($this->strPassword = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strEmail = QType::Cast($mixValue, QType::String));
                                                return ($this->strEmail = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SuperAdmin':
					/**
					 * Sets the value for blnSuperAdmin 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSuperAdmin = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSuperAdmin = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaActivacion':
					/**
					 * Sets the value for dttFechaActivacion (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttFechaActivacion = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttFechaActivacion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'IdPerfil':
					/**
					 * Sets the value for intIdPerfil 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdPerfilObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdPerfil = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdPerfil = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RespuestaA':
					/**
					 * Sets the value for strRespuestaA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strRespuestaA = QType::Cast($mixValue, QType::String));
                                                return ($this->strRespuestaA = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RespuestaB':
					/**
					 * Sets the value for strRespuestaB 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strRespuestaB = QType::Cast($mixValue, QType::String));
                                                return ($this->strRespuestaB = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PreguntaSecretaA':
					/**
					 * Sets the value for strPreguntaSecretaA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPreguntaSecretaA = QType::Cast($mixValue, QType::String));
                                                return ($this->strPreguntaSecretaA = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PreguntaSecretaB':
					/**
					 * Sets the value for strPreguntaSecretaB 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPreguntaSecretaB = QType::Cast($mixValue, QType::String));
                                                return ($this->strPreguntaSecretaB = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodPartido':
					/**
					 * Sets the value for strCodPartido 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strCodPartido = QType::Cast($mixValue, QType::String));
                                                return ($this->strCodPartido = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdPerfilObject':
					/**
					 * Sets the value for the Perfil object referenced by intIdPerfil 
					 * @param Perfil $mixValue
					 * @return Perfil
					 */
					if (is_null($mixValue)) {
						$this->intIdPerfil = null;
						$this->objIdPerfilObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Perfil object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Perfil');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Perfil object
						//if (is_null($mixValue->IdPerfil))
						//	throw new QCallerException('Unable to set an unsaved IdPerfilObject for this Usuario');

						// Update Local Member Variables
						$this->objIdPerfilObject = $mixValue;
						$this->intIdPerfil = $mixValue->IdPerfil;

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
			$strToReturn = '<complexType name="Usuario"><sequence>';
			$strToReturn .= '<element name="IdUsuario" type="xsd:int"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="SuperAdmin" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FechaActivacion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="IdPerfilObject" type="xsd1:Perfil"/>';
			$strToReturn .= '<element name="RespuestaA" type="xsd:string"/>';
			$strToReturn .= '<element name="RespuestaB" type="xsd:string"/>';
			$strToReturn .= '<element name="PreguntaSecretaA" type="xsd:string"/>';
			$strToReturn .= '<element name="PreguntaSecretaB" type="xsd:string"/>';
			$strToReturn .= '<element name="CodPartido" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Usuario', $strComplexTypeArray)) {
				$strComplexTypeArray['Usuario'] = Usuario::GetSoapComplexTypeXml();
				$strComplexTypeArray = Perfil::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Usuario::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Usuario();
			if (property_exists($objSoapObject, 'IdUsuario')) {
				$objToReturn->intIdUsuario = $objSoapObject->IdUsuario;
            }
			if (property_exists($objSoapObject, 'Password')) {
				$objToReturn->strPassword = $objSoapObject->Password;
            }
			if (property_exists($objSoapObject, 'Email')) {
				$objToReturn->strEmail = $objSoapObject->Email;
            }
			if (property_exists($objSoapObject, 'SuperAdmin')) {
				$objToReturn->blnSuperAdmin = $objSoapObject->SuperAdmin;
            }
			if (property_exists($objSoapObject, 'FechaActivacion')) {
				$objToReturn->dttFechaActivacion = new QDateTime($objSoapObject->FechaActivacion);
            }
			if (property_exists($objSoapObject, 'Nombre')) {
				$objToReturn->strNombre = $objSoapObject->Nombre;
            }
			if ((property_exists($objSoapObject, 'IdPerfilObject')) &&
				($objSoapObject->IdPerfilObject))
				$objToReturn->IdPerfilObject = Perfil::GetObjectFromSoapObject($objSoapObject->IdPerfilObject);
			if (property_exists($objSoapObject, 'RespuestaA')) {
				$objToReturn->strRespuestaA = $objSoapObject->RespuestaA;
            }
			if (property_exists($objSoapObject, 'RespuestaB')) {
				$objToReturn->strRespuestaB = $objSoapObject->RespuestaB;
            }
			if (property_exists($objSoapObject, 'PreguntaSecretaA')) {
				$objToReturn->strPreguntaSecretaA = $objSoapObject->PreguntaSecretaA;
            }
			if (property_exists($objSoapObject, 'PreguntaSecretaB')) {
				$objToReturn->strPreguntaSecretaB = $objSoapObject->PreguntaSecretaB;
            }
			if (property_exists($objSoapObject, 'CodPartido')) {
				$objToReturn->strCodPartido = $objSoapObject->CodPartido;
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
				array_push($objArrayToReturn, Usuario::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaActivacion)
				$objObject->dttFechaActivacion = $objObject->dttFechaActivacion->__toString(QDateTime::FormatSoap);
			if ($objObject->objIdPerfilObject)
				$objObject->objIdPerfilObject = Perfil::GetSoapObjectFromObject($objObject->objIdPerfilObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdPerfil = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>