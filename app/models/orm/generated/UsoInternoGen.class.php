<?php
/**
 * The abstract UsoInternoGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the UsoInterno subclass which
 * extends this UsoInternoGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the UsoInterno class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property integer $IdFolio the value for intIdFolio (PK)
	 * @property string $InformeUrbanisticoFecha the value for strInformeUrbanisticoFecha 
	 * @property boolean $MapeoPreliminar the value for blnMapeoPreliminar 
	 * @property boolean $NoCorrespondeInscripcion the value for blnNoCorrespondeInscripcion 
	 * @property string $ResolucionInscripcionProvisoria the value for strResolucionInscripcionProvisoria 
	 * @property string $ResolucionInscripcionDefinitiva the value for strResolucionInscripcionDefinitiva 
	 * @property QDateTime $RegularizacionFechaInicio the value for dttRegularizacionFechaInicio 
	 * @property boolean $RegularizacionTienePlano the value for blnRegularizacionTienePlano 
	 * @property boolean $RegularizacionCircular10Catastro the value for blnRegularizacionCircular10Catastro 
	 * @property integer $RegularizacionEstadoProceso the value for intRegularizacionEstadoProceso 
	 * @property string $NumExpediente the value for strNumExpediente 
	 * @property string $RegistracionLegajo the value for strRegistracionLegajo 
	 * @property string $RegistracionFecha the value for strRegistracionFecha 
	 * @property string $RegistracionFolio the value for strRegistracionFolio 
	 * @property string $GeodesiaNum the value for strGeodesiaNum 
	 * @property string $GeodesiaAnio the value for strGeodesiaAnio 
	 * @property boolean $Ley14449 the value for blnLey14449 
	 * @property boolean $TieneCenso the value for blnTieneCenso 
	 * @property string $FechaCenso the value for strFechaCenso 
	 * @property string $GeodesiaPartido the value for strGeodesiaPartido 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class UsoInternoGen extends QBaseClass {

    public static function Noun() {
        return 'UsoInterno';
    }
    public static function NounPlural() {
        return 'UsoInternos';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK column uso_interno.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected internal member variable that stores the original version of the PK column value (if restored)
     * Used by Save() to update a PK column during UPDATE
     * @var integer __intIdFolio;
     */
    protected $__intIdFolio;

    /**
     * Protected member variable that maps to the database column uso_interno.informe_urbanistico_fecha
     * @var string strInformeUrbanisticoFecha
     */
    protected $strInformeUrbanisticoFecha;
    const InformeUrbanisticoFechaMaxLength = 45;
    const InformeUrbanisticoFechaDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.mapeo_preliminar
     * @var boolean blnMapeoPreliminar
     */
    protected $blnMapeoPreliminar;
    const MapeoPreliminarDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.no_corresponde_inscripcion
     * @var boolean blnNoCorrespondeInscripcion
     */
    protected $blnNoCorrespondeInscripcion;
    const NoCorrespondeInscripcionDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.resolucion_inscripcion_provisoria
     * @var string strResolucionInscripcionProvisoria
     */
    protected $strResolucionInscripcionProvisoria;
    const ResolucionInscripcionProvisoriaMaxLength = 45;
    const ResolucionInscripcionProvisoriaDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.resolucion_inscripcion_definitiva
     * @var string strResolucionInscripcionDefinitiva
     */
    protected $strResolucionInscripcionDefinitiva;
    const ResolucionInscripcionDefinitivaMaxLength = 45;
    const ResolucionInscripcionDefinitivaDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_fecha_inicio
     * @var QDateTime dttRegularizacionFechaInicio
     */
    protected $dttRegularizacionFechaInicio;
    const RegularizacionFechaInicioDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_tiene_plano
     * @var boolean blnRegularizacionTienePlano
     */
    protected $blnRegularizacionTienePlano;
    const RegularizacionTienePlanoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_circular_10_catastro
     * @var boolean blnRegularizacionCircular10Catastro
     */
    protected $blnRegularizacionCircular10Catastro;
    const RegularizacionCircular10CatastroDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_estado_proceso
     * @var integer intRegularizacionEstadoProceso
     */
    protected $intRegularizacionEstadoProceso;
    const RegularizacionEstadoProcesoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.num_expediente
     * @var string strNumExpediente
     */
    protected $strNumExpediente;
    const NumExpedienteDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.registracion_legajo
     * @var string strRegistracionLegajo
     */
    protected $strRegistracionLegajo;
    const RegistracionLegajoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.registracion_fecha
     * @var string strRegistracionFecha
     */
    protected $strRegistracionFecha;
    const RegistracionFechaDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.registracion_folio
     * @var string strRegistracionFolio
     */
    protected $strRegistracionFolio;
    const RegistracionFolioDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.geodesia_num
     * @var string strGeodesiaNum
     */
    protected $strGeodesiaNum;
    const GeodesiaNumDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.geodesia_anio
     * @var string strGeodesiaAnio
     */
    protected $strGeodesiaAnio;
    const GeodesiaAnioDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.ley_14449
     * @var boolean blnLey14449
     */
    protected $blnLey14449;
    const Ley14449Default = null;


    /**
     * Protected member variable that maps to the database column uso_interno.tiene_censo
     * @var boolean blnTieneCenso
     */
    protected $blnTieneCenso;
    const TieneCensoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.fecha_censo
     * @var string strFechaCenso
     */
    protected $strFechaCenso;
    const FechaCensoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.geodesia_partido
     * @var string strGeodesiaPartido
     */
    protected $strGeodesiaPartido;
    const GeodesiaPartidoMaxLength = 3;
    const GeodesiaPartidoDefault = null;


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
		 * in the database column uso_interno.id_folio.
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
                protected static $_objUsoInternoArray = array();


		/**
		 * Load a UsoInterno from PK Info
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return UsoInterno
		 */
		public static function Load($intIdFolio, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  UsoInterno::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::UsoInterno()->IdFolio, $intIdFolio)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intIdFolio",self::$_objUsoInternoArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpUsoInterno = UsoInterno::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::UsoInterno()->IdFolio, $intIdFolio)
				),
				$objOptionalClauses
			))) {
			    self::$_objUsoInternoArray["$intIdFolio"] = $objTmpUsoInterno;
            }
                        }
                        return isset(self::$_objUsoInternoArray["$intIdFolio"])?self::$_objUsoInternoArray["$intIdFolio"]:null;
		}

		/**
		 * Load all UsoInternos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsoInterno[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call UsoInterno::QueryArray to perform the LoadAll query
			try {
				return UsoInterno::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all UsoInternos
		 * @return int
		 */
		public static function CountAll() {
			// Call UsoInterno::QueryCount to perform the CountAll query
			return UsoInterno::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (UsoInterno::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::UsoInterno()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::UsoInterno()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase UsoInterno no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = UsoInterno::GetDatabase();

			// Create/Build out the QueryBuilder object with UsoInterno-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'uso_interno');
			UsoInterno::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('uso_interno');

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
		 * Static Qcubed Query method to query for a single UsoInterno object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return UsoInterno the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UsoInterno::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new UsoInterno object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = UsoInterno::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = UsoInterno::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of UsoInterno objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return UsoInterno[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UsoInterno::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return UsoInterno::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of UsoInterno objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UsoInterno::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = UsoInterno::GetDatabase();

			$strQuery = UsoInterno::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/usointerno', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = UsoInterno::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this UsoInterno
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'uso_interno';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'informe_urbanistico_fecha', $strAliasPrefix . 'informe_urbanistico_fecha');
			$objBuilder->AddSelectItem($strTableName, 'mapeo_preliminar', $strAliasPrefix . 'mapeo_preliminar');
			$objBuilder->AddSelectItem($strTableName, 'no_corresponde_inscripcion', $strAliasPrefix . 'no_corresponde_inscripcion');
			$objBuilder->AddSelectItem($strTableName, 'resolucion_inscripcion_provisoria', $strAliasPrefix . 'resolucion_inscripcion_provisoria');
			$objBuilder->AddSelectItem($strTableName, 'resolucion_inscripcion_definitiva', $strAliasPrefix . 'resolucion_inscripcion_definitiva');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_fecha_inicio', $strAliasPrefix . 'regularizacion_fecha_inicio');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_tiene_plano', $strAliasPrefix . 'regularizacion_tiene_plano');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_circular_10_catastro', $strAliasPrefix . 'regularizacion_circular_10_catastro');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_estado_proceso', $strAliasPrefix . 'regularizacion_estado_proceso');
			$objBuilder->AddSelectItem($strTableName, 'num_expediente', $strAliasPrefix . 'num_expediente');
			$objBuilder->AddSelectItem($strTableName, 'registracion_legajo', $strAliasPrefix . 'registracion_legajo');
			$objBuilder->AddSelectItem($strTableName, 'registracion_fecha', $strAliasPrefix . 'registracion_fecha');
			$objBuilder->AddSelectItem($strTableName, 'registracion_folio', $strAliasPrefix . 'registracion_folio');
			$objBuilder->AddSelectItem($strTableName, 'geodesia_num', $strAliasPrefix . 'geodesia_num');
			$objBuilder->AddSelectItem($strTableName, 'geodesia_anio', $strAliasPrefix . 'geodesia_anio');
			$objBuilder->AddSelectItem($strTableName, 'ley_14449', $strAliasPrefix . 'ley_14449');
			$objBuilder->AddSelectItem($strTableName, 'tiene_censo', $strAliasPrefix . 'tiene_censo');
			$objBuilder->AddSelectItem($strTableName, 'fecha_censo', $strAliasPrefix . 'fecha_censo');
			$objBuilder->AddSelectItem($strTableName, 'geodesia_partido', $strAliasPrefix . 'geodesia_partido');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a UsoInterno from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this UsoInterno::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return UsoInterno
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the UsoInterno object
			$objToReturn = new UsoInterno();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'informe_urbanistico_fecha', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'informe_urbanistico_fecha'] : $strAliasPrefix . 'informe_urbanistico_fecha';
			$objToReturn->strInformeUrbanisticoFecha = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'mapeo_preliminar', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'mapeo_preliminar'] : $strAliasPrefix . 'mapeo_preliminar';
			$objToReturn->blnMapeoPreliminar = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'no_corresponde_inscripcion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'no_corresponde_inscripcion'] : $strAliasPrefix . 'no_corresponde_inscripcion';
			$objToReturn->blnNoCorrespondeInscripcion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'resolucion_inscripcion_provisoria', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resolucion_inscripcion_provisoria'] : $strAliasPrefix . 'resolucion_inscripcion_provisoria';
			$objToReturn->strResolucionInscripcionProvisoria = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'resolucion_inscripcion_definitiva', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resolucion_inscripcion_definitiva'] : $strAliasPrefix . 'resolucion_inscripcion_definitiva';
			$objToReturn->strResolucionInscripcionDefinitiva = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_fecha_inicio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_fecha_inicio'] : $strAliasPrefix . 'regularizacion_fecha_inicio';
			$objToReturn->dttRegularizacionFechaInicio = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_tiene_plano', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_tiene_plano'] : $strAliasPrefix . 'regularizacion_tiene_plano';
			$objToReturn->blnRegularizacionTienePlano = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_circular_10_catastro', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_circular_10_catastro'] : $strAliasPrefix . 'regularizacion_circular_10_catastro';
			$objToReturn->blnRegularizacionCircular10Catastro = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_estado_proceso', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_estado_proceso'] : $strAliasPrefix . 'regularizacion_estado_proceso';
			$objToReturn->intRegularizacionEstadoProceso = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'num_expediente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'num_expediente'] : $strAliasPrefix . 'num_expediente';
			$objToReturn->strNumExpediente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'registracion_legajo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'registracion_legajo'] : $strAliasPrefix . 'registracion_legajo';
			$objToReturn->strRegistracionLegajo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'registracion_fecha', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'registracion_fecha'] : $strAliasPrefix . 'registracion_fecha';
			$objToReturn->strRegistracionFecha = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'registracion_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'registracion_folio'] : $strAliasPrefix . 'registracion_folio';
			$objToReturn->strRegistracionFolio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'geodesia_num', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'geodesia_num'] : $strAliasPrefix . 'geodesia_num';
			$objToReturn->strGeodesiaNum = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'geodesia_anio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'geodesia_anio'] : $strAliasPrefix . 'geodesia_anio';
			$objToReturn->strGeodesiaAnio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ley_14449', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ley_14449'] : $strAliasPrefix . 'ley_14449';
			$objToReturn->blnLey14449 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'tiene_censo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tiene_censo'] : $strAliasPrefix . 'tiene_censo';
			$objToReturn->blnTieneCenso = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_censo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_censo'] : $strAliasPrefix . 'fecha_censo';
			$objToReturn->strFechaCenso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'geodesia_partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'geodesia_partido'] : $strAliasPrefix . 'geodesia_partido';
			$objToReturn->strGeodesiaPartido = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdFolio != $objPreviousItem->IdFolio) {
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
				$strAliasPrefix = 'uso_interno__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of UsoInternos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return UsoInterno[]
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
					$objItem = UsoInterno::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = UsoInterno::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single UsoInterno object,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsoInterno
		*/
		public static function LoadByIdFolio($intIdFolio, $objOptionalClauses = null) {
			return UsoInterno::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::UsoInterno()->IdFolio, $intIdFolio)
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
         * Save this UsoInterno
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return void
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = UsoInterno::GetDatabase();

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

                    if ($this->intIdFolio && ($this->intIdFolio > QDatabaseNumberFieldMax::Integer || $this->intIdFolio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdFolio', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRegularizacionEstadoProceso && ($this->intRegularizacionEstadoProceso > QDatabaseNumberFieldMax::Integer || $this->intRegularizacionEstadoProceso < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRegularizacionEstadoProceso', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "uso_interno" (
                            "id_folio",
                            "informe_urbanistico_fecha",
                            "mapeo_preliminar",
                            "no_corresponde_inscripcion",
                            "resolucion_inscripcion_provisoria",
                            "resolucion_inscripcion_definitiva",
                            "regularizacion_fecha_inicio",
                            "regularizacion_tiene_plano",
                            "regularizacion_circular_10_catastro",
                            "regularizacion_estado_proceso",
                            "num_expediente",
                            "registracion_legajo",
                            "registracion_fecha",
                            "registracion_folio",
                            "geodesia_num",
                            "geodesia_anio",
                            "ley_14449",
                            "tiene_censo",
                            "fecha_censo",
                            "geodesia_partido"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->strInformeUrbanisticoFecha) . ',
                            ' . $objDatabase->SqlVariable($this->blnMapeoPreliminar) . ',
                            ' . $objDatabase->SqlVariable($this->blnNoCorrespondeInscripcion) . ',
                            ' . $objDatabase->SqlVariable($this->strResolucionInscripcionProvisoria) . ',
                            ' . $objDatabase->SqlVariable($this->strResolucionInscripcionDefinitiva) . ',
                            ' . $objDatabase->SqlVariable($this->dttRegularizacionFechaInicio) . ',
                            ' . $objDatabase->SqlVariable($this->blnRegularizacionTienePlano) . ',
                            ' . $objDatabase->SqlVariable($this->blnRegularizacionCircular10Catastro) . ',
                            ' . $objDatabase->SqlVariable($this->intRegularizacionEstadoProceso) . ',
                            ' . $objDatabase->SqlVariable($this->strNumExpediente) . ',
                            ' . $objDatabase->SqlVariable($this->strRegistracionLegajo) . ',
                            ' . $objDatabase->SqlVariable($this->strRegistracionFecha) . ',
                            ' . $objDatabase->SqlVariable($this->strRegistracionFolio) . ',
                            ' . $objDatabase->SqlVariable($this->strGeodesiaNum) . ',
                            ' . $objDatabase->SqlVariable($this->strGeodesiaAnio) . ',
                            ' . $objDatabase->SqlVariable($this->blnLey14449) . ',
                            ' . $objDatabase->SqlVariable($this->blnTieneCenso) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaCenso) . ',
                            ' . $objDatabase->SqlVariable($this->strGeodesiaPartido) . '
                        )
                    ');


                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "uso_interno"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "informe_urbanistico_fecha" = ' . $objDatabase->SqlVariable($this->strInformeUrbanisticoFecha) . ',
                            "mapeo_preliminar" = ' . $objDatabase->SqlVariable($this->blnMapeoPreliminar) . ',
                            "no_corresponde_inscripcion" = ' . $objDatabase->SqlVariable($this->blnNoCorrespondeInscripcion) . ',
                            "resolucion_inscripcion_provisoria" = ' . $objDatabase->SqlVariable($this->strResolucionInscripcionProvisoria) . ',
                            "resolucion_inscripcion_definitiva" = ' . $objDatabase->SqlVariable($this->strResolucionInscripcionDefinitiva) . ',
                            "regularizacion_fecha_inicio" = ' . $objDatabase->SqlVariable($this->dttRegularizacionFechaInicio) . ',
                            "regularizacion_tiene_plano" = ' . $objDatabase->SqlVariable($this->blnRegularizacionTienePlano) . ',
                            "regularizacion_circular_10_catastro" = ' . $objDatabase->SqlVariable($this->blnRegularizacionCircular10Catastro) . ',
                            "regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intRegularizacionEstadoProceso) . ',
                            "num_expediente" = ' . $objDatabase->SqlVariable($this->strNumExpediente) . ',
                            "registracion_legajo" = ' . $objDatabase->SqlVariable($this->strRegistracionLegajo) . ',
                            "registracion_fecha" = ' . $objDatabase->SqlVariable($this->strRegistracionFecha) . ',
                            "registracion_folio" = ' . $objDatabase->SqlVariable($this->strRegistracionFolio) . ',
                            "geodesia_num" = ' . $objDatabase->SqlVariable($this->strGeodesiaNum) . ',
                            "geodesia_anio" = ' . $objDatabase->SqlVariable($this->strGeodesiaAnio) . ',
                            "ley_14449" = ' . $objDatabase->SqlVariable($this->blnLey14449) . ',
                            "tiene_censo" = ' . $objDatabase->SqlVariable($this->blnTieneCenso) . ',
                            "fecha_censo" = ' . $objDatabase->SqlVariable($this->strFechaCenso) . ',
                            "geodesia_partido" = ' . $objDatabase->SqlVariable($this->strGeodesiaPartido) . '
                        WHERE
                            "id_folio" = ' . $objDatabase->SqlVariable($this->__intIdFolio) . '
                    ');
                }

            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }

            // Update __blnRestored and any Non-Identity PK Columns (if applicable)
            $this->__blnRestored = true;
            $this->__intIdFolio = $this->intIdFolio;

            foreach ($this->objChildObjectsArray as $objChild) {
                if (!$objChild->__Restored) $objChild->Save();
            }

            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this UsoInterno
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this UsoInterno with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = UsoInterno::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"uso_interno"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . '');
		}

		/**
		 * Delete all UsoInternos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = UsoInterno::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"uso_interno"');
		}

		/**
		 * Truncate uso_interno table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = UsoInterno::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "uso_interno" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this UsoInterno from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved UsoInterno object.');

			// Reload the Object
			$objReloaded = UsoInterno::Load($this->intIdFolio, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->__intIdFolio = $this->intIdFolio;
			$this->strInformeUrbanisticoFecha = $objReloaded->strInformeUrbanisticoFecha;
			$this->blnMapeoPreliminar = $objReloaded->blnMapeoPreliminar;
			$this->blnNoCorrespondeInscripcion = $objReloaded->blnNoCorrespondeInscripcion;
			$this->strResolucionInscripcionProvisoria = $objReloaded->strResolucionInscripcionProvisoria;
			$this->strResolucionInscripcionDefinitiva = $objReloaded->strResolucionInscripcionDefinitiva;
			$this->dttRegularizacionFechaInicio = $objReloaded->dttRegularizacionFechaInicio;
			$this->blnRegularizacionTienePlano = $objReloaded->blnRegularizacionTienePlano;
			$this->blnRegularizacionCircular10Catastro = $objReloaded->blnRegularizacionCircular10Catastro;
			$this->intRegularizacionEstadoProceso = $objReloaded->intRegularizacionEstadoProceso;
			$this->strNumExpediente = $objReloaded->strNumExpediente;
			$this->strRegistracionLegajo = $objReloaded->strRegistracionLegajo;
			$this->strRegistracionFecha = $objReloaded->strRegistracionFecha;
			$this->strRegistracionFolio = $objReloaded->strRegistracionFolio;
			$this->strGeodesiaNum = $objReloaded->strGeodesiaNum;
			$this->strGeodesiaAnio = $objReloaded->strGeodesiaAnio;
			$this->blnLey14449 = $objReloaded->blnLey14449;
			$this->blnTieneCenso = $objReloaded->blnTieneCenso;
			$this->strFechaCenso = $objReloaded->strFechaCenso;
			$this->strGeodesiaPartido = $objReloaded->strGeodesiaPartido;
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
            case 'IdFolio':
                /**
                 * Gets the value for intIdFolio (PK)
                 * @return integer
                 */
                return $this->intIdFolio;

            case 'InformeUrbanisticoFecha':
                /**
                 * Gets the value for strInformeUrbanisticoFecha 
                 * @return string
                 */
                return $this->strInformeUrbanisticoFecha;

            case 'MapeoPreliminar':
                /**
                 * Gets the value for blnMapeoPreliminar 
                 * @return boolean
                 */
                return $this->blnMapeoPreliminar;

            case 'NoCorrespondeInscripcion':
                /**
                 * Gets the value for blnNoCorrespondeInscripcion 
                 * @return boolean
                 */
                return $this->blnNoCorrespondeInscripcion;

            case 'ResolucionInscripcionProvisoria':
                /**
                 * Gets the value for strResolucionInscripcionProvisoria 
                 * @return string
                 */
                return $this->strResolucionInscripcionProvisoria;

            case 'ResolucionInscripcionDefinitiva':
                /**
                 * Gets the value for strResolucionInscripcionDefinitiva 
                 * @return string
                 */
                return $this->strResolucionInscripcionDefinitiva;

            case 'RegularizacionFechaInicio':
                /**
                 * Gets the value for dttRegularizacionFechaInicio 
                 * @return QDateTime
                 */
                return $this->dttRegularizacionFechaInicio;

            case 'RegularizacionTienePlano':
                /**
                 * Gets the value for blnRegularizacionTienePlano 
                 * @return boolean
                 */
                return $this->blnRegularizacionTienePlano;

            case 'RegularizacionCircular10Catastro':
                /**
                 * Gets the value for blnRegularizacionCircular10Catastro 
                 * @return boolean
                 */
                return $this->blnRegularizacionCircular10Catastro;

            case 'RegularizacionEstadoProceso':
                /**
                 * Gets the value for intRegularizacionEstadoProceso 
                 * @return integer
                 */
                return $this->intRegularizacionEstadoProceso;

            case 'NumExpediente':
                /**
                 * Gets the value for strNumExpediente 
                 * @return string
                 */
                return $this->strNumExpediente;

            case 'RegistracionLegajo':
                /**
                 * Gets the value for strRegistracionLegajo 
                 * @return string
                 */
                return $this->strRegistracionLegajo;

            case 'RegistracionFecha':
                /**
                 * Gets the value for strRegistracionFecha 
                 * @return string
                 */
                return $this->strRegistracionFecha;

            case 'RegistracionFolio':
                /**
                 * Gets the value for strRegistracionFolio 
                 * @return string
                 */
                return $this->strRegistracionFolio;

            case 'GeodesiaNum':
                /**
                 * Gets the value for strGeodesiaNum 
                 * @return string
                 */
                return $this->strGeodesiaNum;

            case 'GeodesiaAnio':
                /**
                 * Gets the value for strGeodesiaAnio 
                 * @return string
                 */
                return $this->strGeodesiaAnio;

            case 'Ley14449':
                /**
                 * Gets the value for blnLey14449 
                 * @return boolean
                 */
                return $this->blnLey14449;

            case 'TieneCenso':
                /**
                 * Gets the value for blnTieneCenso 
                 * @return boolean
                 */
                return $this->blnTieneCenso;

            case 'FechaCenso':
                /**
                 * Gets the value for strFechaCenso 
                 * @return string
                 */
                return $this->strFechaCenso;

            case 'GeodesiaPartido':
                /**
                 * Gets the value for strGeodesiaPartido 
                 * @return string
                 */
                return $this->strGeodesiaPartido;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Folio object referenced by intIdFolio (PK)
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
					 * Sets the value for intIdFolio (PK)
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

				case 'InformeUrbanisticoFecha':
					/**
					 * Sets the value for strInformeUrbanisticoFecha 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strInformeUrbanisticoFecha = QType::Cast($mixValue, QType::String));
                                                return ($this->strInformeUrbanisticoFecha = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MapeoPreliminar':
					/**
					 * Sets the value for blnMapeoPreliminar 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnMapeoPreliminar = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnMapeoPreliminar = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NoCorrespondeInscripcion':
					/**
					 * Sets the value for blnNoCorrespondeInscripcion 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnNoCorrespondeInscripcion = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnNoCorrespondeInscripcion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ResolucionInscripcionProvisoria':
					/**
					 * Sets the value for strResolucionInscripcionProvisoria 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strResolucionInscripcionProvisoria = QType::Cast($mixValue, QType::String));
                                                return ($this->strResolucionInscripcionProvisoria = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ResolucionInscripcionDefinitiva':
					/**
					 * Sets the value for strResolucionInscripcionDefinitiva 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strResolucionInscripcionDefinitiva = QType::Cast($mixValue, QType::String));
                                                return ($this->strResolucionInscripcionDefinitiva = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegularizacionFechaInicio':
					/**
					 * Sets the value for dttRegularizacionFechaInicio 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttRegularizacionFechaInicio = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttRegularizacionFechaInicio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegularizacionTienePlano':
					/**
					 * Sets the value for blnRegularizacionTienePlano 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnRegularizacionTienePlano = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnRegularizacionTienePlano = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegularizacionCircular10Catastro':
					/**
					 * Sets the value for blnRegularizacionCircular10Catastro 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnRegularizacionCircular10Catastro = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnRegularizacionCircular10Catastro = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegularizacionEstadoProceso':
					/**
					 * Sets the value for intRegularizacionEstadoProceso 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRegularizacionEstadoProceso = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRegularizacionEstadoProceso = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumExpediente':
					/**
					 * Sets the value for strNumExpediente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNumExpediente = QType::Cast($mixValue, QType::String));
                                                return ($this->strNumExpediente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistracionLegajo':
					/**
					 * Sets the value for strRegistracionLegajo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strRegistracionLegajo = QType::Cast($mixValue, QType::String));
                                                return ($this->strRegistracionLegajo = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistracionFecha':
					/**
					 * Sets the value for strRegistracionFecha 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strRegistracionFecha = QType::Cast($mixValue, QType::String));
                                                return ($this->strRegistracionFecha = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistracionFolio':
					/**
					 * Sets the value for strRegistracionFolio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strRegistracionFolio = QType::Cast($mixValue, QType::String));
                                                return ($this->strRegistracionFolio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GeodesiaNum':
					/**
					 * Sets the value for strGeodesiaNum 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strGeodesiaNum = QType::Cast($mixValue, QType::String));
                                                return ($this->strGeodesiaNum = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GeodesiaAnio':
					/**
					 * Sets the value for strGeodesiaAnio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strGeodesiaAnio = QType::Cast($mixValue, QType::String));
                                                return ($this->strGeodesiaAnio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ley14449':
					/**
					 * Sets the value for blnLey14449 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnLey14449 = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnLey14449 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TieneCenso':
					/**
					 * Sets the value for blnTieneCenso 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnTieneCenso = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnTieneCenso = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaCenso':
					/**
					 * Sets the value for strFechaCenso 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFechaCenso = QType::Cast($mixValue, QType::String));
                                                return ($this->strFechaCenso = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GeodesiaPartido':
					/**
					 * Sets the value for strGeodesiaPartido 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strGeodesiaPartido = QType::Cast($mixValue, QType::String));
                                                return ($this->strGeodesiaPartido = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Folio object referenced by intIdFolio (PK)
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this UsoInterno');

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
			$strToReturn = '<complexType name="UsoInterno"><sequence>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="InformeUrbanisticoFecha" type="xsd:string"/>';
			$strToReturn .= '<element name="MapeoPreliminar" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NoCorrespondeInscripcion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ResolucionInscripcionProvisoria" type="xsd:string"/>';
			$strToReturn .= '<element name="ResolucionInscripcionDefinitiva" type="xsd:string"/>';
			$strToReturn .= '<element name="RegularizacionFechaInicio" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="RegularizacionTienePlano" type="xsd:boolean"/>';
			$strToReturn .= '<element name="RegularizacionCircular10Catastro" type="xsd:boolean"/>';
			$strToReturn .= '<element name="RegularizacionEstadoProceso" type="xsd:int"/>';
			$strToReturn .= '<element name="NumExpediente" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistracionLegajo" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistracionFecha" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistracionFolio" type="xsd:string"/>';
			$strToReturn .= '<element name="GeodesiaNum" type="xsd:string"/>';
			$strToReturn .= '<element name="GeodesiaAnio" type="xsd:string"/>';
			$strToReturn .= '<element name="Ley14449" type="xsd:boolean"/>';
			$strToReturn .= '<element name="TieneCenso" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FechaCenso" type="xsd:string"/>';
			$strToReturn .= '<element name="GeodesiaPartido" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('UsoInterno', $strComplexTypeArray)) {
				$strComplexTypeArray['UsoInterno'] = UsoInterno::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, UsoInterno::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new UsoInterno();
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Folio::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'InformeUrbanisticoFecha')) {
				$objToReturn->strInformeUrbanisticoFecha = $objSoapObject->InformeUrbanisticoFecha;
            }
			if (property_exists($objSoapObject, 'MapeoPreliminar')) {
				$objToReturn->blnMapeoPreliminar = $objSoapObject->MapeoPreliminar;
            }
			if (property_exists($objSoapObject, 'NoCorrespondeInscripcion')) {
				$objToReturn->blnNoCorrespondeInscripcion = $objSoapObject->NoCorrespondeInscripcion;
            }
			if (property_exists($objSoapObject, 'ResolucionInscripcionProvisoria')) {
				$objToReturn->strResolucionInscripcionProvisoria = $objSoapObject->ResolucionInscripcionProvisoria;
            }
			if (property_exists($objSoapObject, 'ResolucionInscripcionDefinitiva')) {
				$objToReturn->strResolucionInscripcionDefinitiva = $objSoapObject->ResolucionInscripcionDefinitiva;
            }
			if (property_exists($objSoapObject, 'RegularizacionFechaInicio')) {
				$objToReturn->dttRegularizacionFechaInicio = new QDateTime($objSoapObject->RegularizacionFechaInicio);
            }
			if (property_exists($objSoapObject, 'RegularizacionTienePlano')) {
				$objToReturn->blnRegularizacionTienePlano = $objSoapObject->RegularizacionTienePlano;
            }
			if (property_exists($objSoapObject, 'RegularizacionCircular10Catastro')) {
				$objToReturn->blnRegularizacionCircular10Catastro = $objSoapObject->RegularizacionCircular10Catastro;
            }
			if (property_exists($objSoapObject, 'RegularizacionEstadoProceso')) {
				$objToReturn->intRegularizacionEstadoProceso = $objSoapObject->RegularizacionEstadoProceso;
            }
			if (property_exists($objSoapObject, 'NumExpediente')) {
				$objToReturn->strNumExpediente = $objSoapObject->NumExpediente;
            }
			if (property_exists($objSoapObject, 'RegistracionLegajo')) {
				$objToReturn->strRegistracionLegajo = $objSoapObject->RegistracionLegajo;
            }
			if (property_exists($objSoapObject, 'RegistracionFecha')) {
				$objToReturn->strRegistracionFecha = $objSoapObject->RegistracionFecha;
            }
			if (property_exists($objSoapObject, 'RegistracionFolio')) {
				$objToReturn->strRegistracionFolio = $objSoapObject->RegistracionFolio;
            }
			if (property_exists($objSoapObject, 'GeodesiaNum')) {
				$objToReturn->strGeodesiaNum = $objSoapObject->GeodesiaNum;
            }
			if (property_exists($objSoapObject, 'GeodesiaAnio')) {
				$objToReturn->strGeodesiaAnio = $objSoapObject->GeodesiaAnio;
            }
			if (property_exists($objSoapObject, 'Ley14449')) {
				$objToReturn->blnLey14449 = $objSoapObject->Ley14449;
            }
			if (property_exists($objSoapObject, 'TieneCenso')) {
				$objToReturn->blnTieneCenso = $objSoapObject->TieneCenso;
            }
			if (property_exists($objSoapObject, 'FechaCenso')) {
				$objToReturn->strFechaCenso = $objSoapObject->FechaCenso;
            }
			if (property_exists($objSoapObject, 'GeodesiaPartido')) {
				$objToReturn->strGeodesiaPartido = $objSoapObject->GeodesiaPartido;
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
				array_push($objArrayToReturn, UsoInterno::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = Folio::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->dttRegularizacionFechaInicio)
				$objObject->dttRegularizacionFechaInicio = $objObject->dttRegularizacionFechaInicio->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>