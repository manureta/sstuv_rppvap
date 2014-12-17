<?php
/**
 * The abstract NomenclaturaGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Nomenclatura subclass which
 * extends this NomenclaturaGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Nomenclatura class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property string $PartidaInmobiliaria the value for strPartidaInmobiliaria 
	 * @property string $TitularDominio the value for strTitularDominio 
	 * @property string $Circ the value for strCirc 
	 * @property string $Secc the value for strSecc 
	 * @property string $ChacQuinta the value for strChacQuinta 
	 * @property string $Frac the value for strFrac 
	 * @property string $Mza the value for strMza 
	 * @property string $Parc the value for strParc 
	 * @property string $InscripcionDominio the value for strInscripcionDominio 
	 * @property string $Partido the value for strPartido 
	 * @property boolean $DatoVerificadoRegPropiedad the value for blnDatoVerificadoRegPropiedad 
	 * @property string $EstadoGeografico the value for strEstadoGeografico 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class NomenclaturaGen extends QBaseClass {

    public static function Noun() {
        return 'Nomenclatura';
    }
    public static function NounPlural() {
        return 'Nomenclaturas';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column nomenclatura.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'nomenclatura_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column nomenclatura.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.partida_inmobiliaria
     * @var string strPartidaInmobiliaria
     */
    protected $strPartidaInmobiliaria;
    const PartidaInmobiliariaMaxLength = 45;
    const PartidaInmobiliariaDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.titular_dominio
     * @var string strTitularDominio
     */
    protected $strTitularDominio;
    const TitularDominioMaxLength = 45;
    const TitularDominioDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.circ
     * @var string strCirc
     */
    protected $strCirc;
    const CircMaxLength = 2;
    const CircDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.secc
     * @var string strSecc
     */
    protected $strSecc;
    const SeccMaxLength = 2;
    const SeccDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.chac_quinta
     * @var string strChacQuinta
     */
    protected $strChacQuinta;
    const ChacQuintaMaxLength = 14;
    const ChacQuintaDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.frac
     * @var string strFrac
     */
    protected $strFrac;
    const FracMaxLength = 7;
    const FracDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.mza
     * @var string strMza
     */
    protected $strMza;
    const MzaMaxLength = 7;
    const MzaDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.parc
     * @var string strParc
     */
    protected $strParc;
    const ParcMaxLength = 7;
    const ParcDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura._inscripcion_dominio
     * @var string strInscripcionDominio
     */
    protected $strInscripcionDominio;
    const InscripcionDominioMaxLength = 128;
    const InscripcionDominioDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.partido
     * @var string strPartido
     */
    protected $strPartido;
    const PartidoMaxLength = 3;
    const PartidoDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura._dato_verificado_reg_propiedad
     * @var boolean blnDatoVerificadoRegPropiedad
     */
    protected $blnDatoVerificadoRegPropiedad;
    const DatoVerificadoRegPropiedadDefault = null;


    /**
     * Protected member variable that maps to the database column nomenclatura.estado_geografico
     * @var string strEstadoGeografico
     */
    protected $strEstadoGeografico;
    const EstadoGeograficoMaxLength = 8;
    const EstadoGeograficoDefault = null;


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
		 * in the database column nomenclatura.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this Folio object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Folio objIdFolioObject
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
                protected static $_objNomenclaturaArray = array();


		/**
		 * Load a Nomenclatura from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Nomenclatura
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Nomenclatura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Nomenclatura()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objNomenclaturaArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpNomenclatura = Nomenclatura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Nomenclatura()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objNomenclaturaArray["$intId"] = $objTmpNomenclatura;
            }
                        }
                        return isset(self::$_objNomenclaturaArray["$intId"])?self::$_objNomenclaturaArray["$intId"]:null;
		}

		/**
		 * Load all Nomenclaturas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Nomenclatura[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Nomenclatura::QueryArray to perform the LoadAll query
			try {
				return Nomenclatura::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Nomenclaturas
		 * @return int
		 */
		public static function CountAll() {
			// Call Nomenclatura::QueryCount to perform the CountAll query
			return Nomenclatura::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Nomenclatura::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Nomenclatura()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Nomenclatura()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Nomenclatura no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Nomenclatura::GetDatabase();

			// Create/Build out the QueryBuilder object with Nomenclatura-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'nomenclatura');
			Nomenclatura::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('nomenclatura');

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
		 * Static Qcubed Query method to query for a single Nomenclatura object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Nomenclatura the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Nomenclatura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Nomenclatura object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Nomenclatura::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Nomenclatura::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Nomenclatura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Nomenclatura[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Nomenclatura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Nomenclatura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Nomenclatura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Nomenclatura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Nomenclatura::GetDatabase();

			$strQuery = Nomenclatura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/nomenclatura', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Nomenclatura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Nomenclatura
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'nomenclatura';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'partida_inmobiliaria', $strAliasPrefix . 'partida_inmobiliaria');
			$objBuilder->AddSelectItem($strTableName, 'titular_dominio', $strAliasPrefix . 'titular_dominio');
			$objBuilder->AddSelectItem($strTableName, 'circ', $strAliasPrefix . 'circ');
			$objBuilder->AddSelectItem($strTableName, 'secc', $strAliasPrefix . 'secc');
			$objBuilder->AddSelectItem($strTableName, 'chac_quinta', $strAliasPrefix . 'chac_quinta');
			$objBuilder->AddSelectItem($strTableName, 'frac', $strAliasPrefix . 'frac');
			$objBuilder->AddSelectItem($strTableName, 'mza', $strAliasPrefix . 'mza');
			$objBuilder->AddSelectItem($strTableName, 'parc', $strAliasPrefix . 'parc');
			$objBuilder->AddSelectItem($strTableName, '_inscripcion_dominio', $strAliasPrefix . '_inscripcion_dominio');
			$objBuilder->AddSelectItem($strTableName, 'partido', $strAliasPrefix . 'partido');
			$objBuilder->AddSelectItem($strTableName, '_dato_verificado_reg_propiedad', $strAliasPrefix . '_dato_verificado_reg_propiedad');
			$objBuilder->AddSelectItem($strTableName, 'estado_geografico', $strAliasPrefix . 'estado_geografico');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Nomenclatura from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Nomenclatura::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Nomenclatura
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Nomenclatura object
			$objToReturn = new Nomenclatura();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'partida_inmobiliaria', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'partida_inmobiliaria'] : $strAliasPrefix . 'partida_inmobiliaria';
			$objToReturn->strPartidaInmobiliaria = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'titular_dominio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'titular_dominio'] : $strAliasPrefix . 'titular_dominio';
			$objToReturn->strTitularDominio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'circ', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'circ'] : $strAliasPrefix . 'circ';
			$objToReturn->strCirc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'secc', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'secc'] : $strAliasPrefix . 'secc';
			$objToReturn->strSecc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'chac_quinta', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'chac_quinta'] : $strAliasPrefix . 'chac_quinta';
			$objToReturn->strChacQuinta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'frac', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'frac'] : $strAliasPrefix . 'frac';
			$objToReturn->strFrac = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'mza', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'mza'] : $strAliasPrefix . 'mza';
			$objToReturn->strMza = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'parc', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parc'] : $strAliasPrefix . 'parc';
			$objToReturn->strParc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . '_inscripcion_dominio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . '_inscripcion_dominio'] : $strAliasPrefix . '_inscripcion_dominio';
			$objToReturn->strInscripcionDominio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'partido'] : $strAliasPrefix . 'partido';
			$objToReturn->strPartido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . '_dato_verificado_reg_propiedad', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . '_dato_verificado_reg_propiedad'] : $strAliasPrefix . '_dato_verificado_reg_propiedad';
			$objToReturn->blnDatoVerificadoRegPropiedad = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'estado_geografico', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'estado_geografico'] : $strAliasPrefix . 'estado_geografico';
			$objToReturn->strEstadoGeografico = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'nomenclatura__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Nomenclaturas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Nomenclatura[]
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
					$objItem = Nomenclatura::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Nomenclatura::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Nomenclatura object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Nomenclatura
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Nomenclatura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Nomenclatura()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Nomenclatura objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Nomenclatura[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call Nomenclatura::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return Nomenclatura::QueryArray(
					QQ::Equal(QQN::Nomenclatura()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Nomenclaturas
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call Nomenclatura::QueryCount to perform the CountByIdFolio query
			return Nomenclatura::QueryCount(
				QQ::Equal(QQN::Nomenclatura()->IdFolio, $intIdFolio)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Nomenclatura
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Nomenclatura::GetDatabase();

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
                        INSERT INTO "nomenclatura" (
                            "id_folio",
                            "partida_inmobiliaria",
                            "titular_dominio",
                            "circ",
                            "secc",
                            "chac_quinta",
                            "frac",
                            "mza",
                            "parc",
                            "_inscripcion_dominio",
                            "partido",
                            "_dato_verificado_reg_propiedad",
                            "estado_geografico"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->strPartidaInmobiliaria) . ',
                            ' . $objDatabase->SqlVariable($this->strTitularDominio) . ',
                            ' . $objDatabase->SqlVariable($this->strCirc) . ',
                            ' . $objDatabase->SqlVariable($this->strSecc) . ',
                            ' . $objDatabase->SqlVariable($this->strChacQuinta) . ',
                            ' . $objDatabase->SqlVariable($this->strFrac) . ',
                            ' . $objDatabase->SqlVariable($this->strMza) . ',
                            ' . $objDatabase->SqlVariable($this->strParc) . ',
                            ' . $objDatabase->SqlVariable($this->strInscripcionDominio) . ',
                            ' . $objDatabase->SqlVariable($this->strPartido) . ',
                            ' . $objDatabase->SqlVariable($this->blnDatoVerificadoRegPropiedad) . ',
                            ' . $objDatabase->SqlVariable($this->strEstadoGeografico) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('nomenclatura', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "nomenclatura"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "partida_inmobiliaria" = ' . $objDatabase->SqlVariable($this->strPartidaInmobiliaria) . ',
                            "titular_dominio" = ' . $objDatabase->SqlVariable($this->strTitularDominio) . ',
                            "circ" = ' . $objDatabase->SqlVariable($this->strCirc) . ',
                            "secc" = ' . $objDatabase->SqlVariable($this->strSecc) . ',
                            "chac_quinta" = ' . $objDatabase->SqlVariable($this->strChacQuinta) . ',
                            "frac" = ' . $objDatabase->SqlVariable($this->strFrac) . ',
                            "mza" = ' . $objDatabase->SqlVariable($this->strMza) . ',
                            "parc" = ' . $objDatabase->SqlVariable($this->strParc) . ',
                            "_inscripcion_dominio" = ' . $objDatabase->SqlVariable($this->strInscripcionDominio) . ',
                            "partido" = ' . $objDatabase->SqlVariable($this->strPartido) . ',
                            "_dato_verificado_reg_propiedad" = ' . $objDatabase->SqlVariable($this->blnDatoVerificadoRegPropiedad) . ',
                            "estado_geografico" = ' . $objDatabase->SqlVariable($this->strEstadoGeografico) . '
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
		 * Delete this Nomenclatura
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Nomenclatura with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Nomenclatura::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"nomenclatura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Nomenclaturas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Nomenclatura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"nomenclatura"');
		}

		/**
		 * Truncate nomenclatura table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Nomenclatura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "nomenclatura" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Nomenclatura from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Nomenclatura object.');

			// Reload the Object
			$objReloaded = Nomenclatura::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->strPartidaInmobiliaria = $objReloaded->strPartidaInmobiliaria;
			$this->strTitularDominio = $objReloaded->strTitularDominio;
			$this->strCirc = $objReloaded->strCirc;
			$this->strSecc = $objReloaded->strSecc;
			$this->strChacQuinta = $objReloaded->strChacQuinta;
			$this->strFrac = $objReloaded->strFrac;
			$this->strMza = $objReloaded->strMza;
			$this->strParc = $objReloaded->strParc;
			$this->strInscripcionDominio = $objReloaded->strInscripcionDominio;
			$this->strPartido = $objReloaded->strPartido;
			$this->blnDatoVerificadoRegPropiedad = $objReloaded->blnDatoVerificadoRegPropiedad;
			$this->strEstadoGeografico = $objReloaded->strEstadoGeografico;
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

            case 'PartidaInmobiliaria':
                /**
                 * Gets the value for strPartidaInmobiliaria 
                 * @return string
                 */
                return $this->strPartidaInmobiliaria;

            case 'TitularDominio':
                /**
                 * Gets the value for strTitularDominio 
                 * @return string
                 */
                return $this->strTitularDominio;

            case 'Circ':
                /**
                 * Gets the value for strCirc 
                 * @return string
                 */
                return $this->strCirc;

            case 'Secc':
                /**
                 * Gets the value for strSecc 
                 * @return string
                 */
                return $this->strSecc;

            case 'ChacQuinta':
                /**
                 * Gets the value for strChacQuinta 
                 * @return string
                 */
                return $this->strChacQuinta;

            case 'Frac':
                /**
                 * Gets the value for strFrac 
                 * @return string
                 */
                return $this->strFrac;

            case 'Mza':
                /**
                 * Gets the value for strMza 
                 * @return string
                 */
                return $this->strMza;

            case 'Parc':
                /**
                 * Gets the value for strParc 
                 * @return string
                 */
                return $this->strParc;

            case 'InscripcionDominio':
                /**
                 * Gets the value for strInscripcionDominio 
                 * @return string
                 */
                return $this->strInscripcionDominio;

            case 'Partido':
                /**
                 * Gets the value for strPartido 
                 * @return string
                 */
                return $this->strPartido;

            case 'DatoVerificadoRegPropiedad':
                /**
                 * Gets the value for blnDatoVerificadoRegPropiedad 
                 * @return boolean
                 */
                return $this->blnDatoVerificadoRegPropiedad;

            case 'EstadoGeografico':
                /**
                 * Gets the value for strEstadoGeografico 
                 * @return string
                 */
                return $this->strEstadoGeografico;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Folio object referenced by intIdFolio 
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

				case 'PartidaInmobiliaria':
					/**
					 * Sets the value for strPartidaInmobiliaria 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPartidaInmobiliaria = QType::Cast($mixValue, QType::String));
                                                return ($this->strPartidaInmobiliaria = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TitularDominio':
					/**
					 * Sets the value for strTitularDominio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTitularDominio = QType::Cast($mixValue, QType::String));
                                                return ($this->strTitularDominio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Circ':
					/**
					 * Sets the value for strCirc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strCirc = QType::Cast($mixValue, QType::String));
                                                return ($this->strCirc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Secc':
					/**
					 * Sets the value for strSecc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strSecc = QType::Cast($mixValue, QType::String));
                                                return ($this->strSecc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ChacQuinta':
					/**
					 * Sets the value for strChacQuinta 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strChacQuinta = QType::Cast($mixValue, QType::String));
                                                return ($this->strChacQuinta = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Frac':
					/**
					 * Sets the value for strFrac 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFrac = QType::Cast($mixValue, QType::String));
                                                return ($this->strFrac = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Mza':
					/**
					 * Sets the value for strMza 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strMza = QType::Cast($mixValue, QType::String));
                                                return ($this->strMza = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Parc':
					/**
					 * Sets the value for strParc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strParc = QType::Cast($mixValue, QType::String));
                                                return ($this->strParc = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InscripcionDominio':
					/**
					 * Sets the value for strInscripcionDominio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strInscripcionDominio = QType::Cast($mixValue, QType::String));
                                                return ($this->strInscripcionDominio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Partido':
					/**
					 * Sets the value for strPartido 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPartido = QType::Cast($mixValue, QType::String));
                                                return ($this->strPartido = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DatoVerificadoRegPropiedad':
					/**
					 * Sets the value for blnDatoVerificadoRegPropiedad 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnDatoVerificadoRegPropiedad = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnDatoVerificadoRegPropiedad = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoGeografico':
					/**
					 * Sets the value for strEstadoGeografico 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strEstadoGeografico = QType::Cast($mixValue, QType::String));
                                                return ($this->strEstadoGeografico = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Folio object referenced by intIdFolio 
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Nomenclatura');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->Id;

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
			$strToReturn = '<complexType name="Nomenclatura"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="PartidaInmobiliaria" type="xsd:string"/>';
			$strToReturn .= '<element name="TitularDominio" type="xsd:string"/>';
			$strToReturn .= '<element name="Circ" type="xsd:string"/>';
			$strToReturn .= '<element name="Secc" type="xsd:string"/>';
			$strToReturn .= '<element name="ChacQuinta" type="xsd:string"/>';
			$strToReturn .= '<element name="Frac" type="xsd:string"/>';
			$strToReturn .= '<element name="Mza" type="xsd:string"/>';
			$strToReturn .= '<element name="Parc" type="xsd:string"/>';
			$strToReturn .= '<element name="InscripcionDominio" type="xsd:string"/>';
			$strToReturn .= '<element name="Partido" type="xsd:string"/>';
			$strToReturn .= '<element name="DatoVerificadoRegPropiedad" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EstadoGeografico" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Nomenclatura', $strComplexTypeArray)) {
				$strComplexTypeArray['Nomenclatura'] = Nomenclatura::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Nomenclatura::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Nomenclatura();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Folio::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'PartidaInmobiliaria')) {
				$objToReturn->strPartidaInmobiliaria = $objSoapObject->PartidaInmobiliaria;
            }
			if (property_exists($objSoapObject, 'TitularDominio')) {
				$objToReturn->strTitularDominio = $objSoapObject->TitularDominio;
            }
			if (property_exists($objSoapObject, 'Circ')) {
				$objToReturn->strCirc = $objSoapObject->Circ;
            }
			if (property_exists($objSoapObject, 'Secc')) {
				$objToReturn->strSecc = $objSoapObject->Secc;
            }
			if (property_exists($objSoapObject, 'ChacQuinta')) {
				$objToReturn->strChacQuinta = $objSoapObject->ChacQuinta;
            }
			if (property_exists($objSoapObject, 'Frac')) {
				$objToReturn->strFrac = $objSoapObject->Frac;
            }
			if (property_exists($objSoapObject, 'Mza')) {
				$objToReturn->strMza = $objSoapObject->Mza;
            }
			if (property_exists($objSoapObject, 'Parc')) {
				$objToReturn->strParc = $objSoapObject->Parc;
            }
			if (property_exists($objSoapObject, 'InscripcionDominio')) {
				$objToReturn->strInscripcionDominio = $objSoapObject->InscripcionDominio;
            }
			if (property_exists($objSoapObject, 'Partido')) {
				$objToReturn->strPartido = $objSoapObject->Partido;
            }
			if (property_exists($objSoapObject, 'DatoVerificadoRegPropiedad')) {
				$objToReturn->blnDatoVerificadoRegPropiedad = $objSoapObject->DatoVerificadoRegPropiedad;
            }
			if (property_exists($objSoapObject, 'EstadoGeografico')) {
				$objToReturn->strEstadoGeografico = $objSoapObject->EstadoGeografico;
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
				array_push($objArrayToReturn, Nomenclatura::GetSoapObjectFromObject($objObject, true));

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