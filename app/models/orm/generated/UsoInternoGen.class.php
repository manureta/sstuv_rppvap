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
	 * @property string $InformeUrbanistico the value for strInformeUrbanistico 
	 * @property boolean $MapeoPreliminar the value for blnMapeoPreliminar 
	 * @property boolean $NoCorrespondeInscripcion the value for blnNoCorrespondeInscripcion 
	 * @property string $ResolucionInscripcionProvisoria the value for strResolucionInscripcionProvisoria 
	 * @property string $ResolucionInscripcionDefinitiva the value for strResolucionInscripcionDefinitiva 
	 * @property QDateTime $RegularizacionFechaInicio the value for dttRegularizacionFechaInicio 
	 * @property boolean $RegularizacionCircular10Catastro the value for blnRegularizacionCircular10Catastro 
	 * @property integer $RegularizacionAprobacionGeodesia the value for intRegularizacionAprobacionGeodesia 
	 * @property integer $RegularizacionRegistracion the value for intRegularizacionRegistracion 
	 * @property integer $RegularizacionEstadoProceso the value for intRegularizacionEstadoProceso 
	 * @property string $NumExpediente the value for strNumExpediente 
	 * @property string $RegistracionLegajo the value for strRegistracionLegajo 
	 * @property string $RegistracionFecha the value for strRegistracionFecha 
	 * @property string $RegistracionFolio the value for strRegistracionFolio 
	 * @property string $GeodesiaNum the value for strGeodesiaNum 
	 * @property string $GeodesiaAnio the value for strGeodesiaAnio 
	 * @property string $FechaCenso the value for strFechaCenso 
	 * @property string $GeodesiaPartido the value for strGeodesiaPartido 
	 * @property integer $EstadoFolio the value for intEstadoFolio 
	 * @property string $RegularizacionTienePlano the value for strRegularizacionTienePlano 
	 * @property string $TieneCenso the value for strTieneCenso 
	 * @property string $Ley14449 the value for strLey14449 
	 * @property QDateTime $FechaInformeUrbanistico the value for dttFechaInformeUrbanistico 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (PK)
	 * @property EstadoProceso $RegularizacionEstadoProcesoObject the value for the EstadoProceso object referenced by intRegularizacionEstadoProceso 
	 * @property EstadoFolio $EstadoFolioObject the value for the EstadoFolio object referenced by intEstadoFolio 
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
     * Protected member variable that maps to the database column uso_interno.informe_urbanistico
     * @var string strInformeUrbanistico
     */
    protected $strInformeUrbanistico;
    const InformeUrbanisticoMaxLength = 45;
    const InformeUrbanisticoDefault = null;


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
     * Protected member variable that maps to the database column uso_interno.regularizacion_circular_10_catastro
     * @var boolean blnRegularizacionCircular10Catastro
     */
    protected $blnRegularizacionCircular10Catastro;
    const RegularizacionCircular10CatastroDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_aprobacion_geodesia
     * @var integer intRegularizacionAprobacionGeodesia
     */
    protected $intRegularizacionAprobacionGeodesia;
    const RegularizacionAprobacionGeodesiaDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_registracion
     * @var integer intRegularizacionRegistracion
     */
    protected $intRegularizacionRegistracion;
    const RegularizacionRegistracionDefault = null;


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
    const GeodesiaPartidoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.estado_folio
     * @var integer intEstadoFolio
     */
    protected $intEstadoFolio;
    const EstadoFolioDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.regularizacion_tiene_plano
     * @var string strRegularizacionTienePlano
     */
    protected $strRegularizacionTienePlano;
    const RegularizacionTienePlanoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.tiene_censo
     * @var string strTieneCenso
     */
    protected $strTieneCenso;
    const TieneCensoDefault = null;


    /**
     * Protected member variable that maps to the database column uso_interno.ley_14449
     * @var string strLey14449
     */
    protected $strLey14449;
    const Ley14449Default = null;


    /**
     * Protected member variable that maps to the database column uso_interno.fecha_informe_urbanistico
     * @var QDateTime dttFechaInformeUrbanistico
     */
    protected $dttFechaInformeUrbanistico;
    const FechaInformeUrbanisticoDefault = null;


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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column uso_interno.regularizacion_estado_proceso.
		 *
		 * NOTE: Always use the RegularizacionEstadoProcesoObject property getter to correctly retrieve this EstadoProceso object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EstadoProceso objRegularizacionEstadoProcesoObject
		 */
		protected $objRegularizacionEstadoProcesoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column uso_interno.estado_folio.
		 *
		 * NOTE: Always use the EstadoFolioObject property getter to correctly retrieve this EstadoFolio object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EstadoFolio objEstadoFolioObject
		 */
		protected $objEstadoFolioObject;



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
			$objBuilder->AddSelectItem($strTableName, 'informe_urbanistico', $strAliasPrefix . 'informe_urbanistico');
			$objBuilder->AddSelectItem($strTableName, 'mapeo_preliminar', $strAliasPrefix . 'mapeo_preliminar');
			$objBuilder->AddSelectItem($strTableName, 'no_corresponde_inscripcion', $strAliasPrefix . 'no_corresponde_inscripcion');
			$objBuilder->AddSelectItem($strTableName, 'resolucion_inscripcion_provisoria', $strAliasPrefix . 'resolucion_inscripcion_provisoria');
			$objBuilder->AddSelectItem($strTableName, 'resolucion_inscripcion_definitiva', $strAliasPrefix . 'resolucion_inscripcion_definitiva');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_fecha_inicio', $strAliasPrefix . 'regularizacion_fecha_inicio');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_circular_10_catastro', $strAliasPrefix . 'regularizacion_circular_10_catastro');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_aprobacion_geodesia', $strAliasPrefix . 'regularizacion_aprobacion_geodesia');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_registracion', $strAliasPrefix . 'regularizacion_registracion');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_estado_proceso', $strAliasPrefix . 'regularizacion_estado_proceso');
			$objBuilder->AddSelectItem($strTableName, 'num_expediente', $strAliasPrefix . 'num_expediente');
			$objBuilder->AddSelectItem($strTableName, 'registracion_legajo', $strAliasPrefix . 'registracion_legajo');
			$objBuilder->AddSelectItem($strTableName, 'registracion_fecha', $strAliasPrefix . 'registracion_fecha');
			$objBuilder->AddSelectItem($strTableName, 'registracion_folio', $strAliasPrefix . 'registracion_folio');
			$objBuilder->AddSelectItem($strTableName, 'geodesia_num', $strAliasPrefix . 'geodesia_num');
			$objBuilder->AddSelectItem($strTableName, 'geodesia_anio', $strAliasPrefix . 'geodesia_anio');
			$objBuilder->AddSelectItem($strTableName, 'fecha_censo', $strAliasPrefix . 'fecha_censo');
			$objBuilder->AddSelectItem($strTableName, 'geodesia_partido', $strAliasPrefix . 'geodesia_partido');
			$objBuilder->AddSelectItem($strTableName, 'estado_folio', $strAliasPrefix . 'estado_folio');
			$objBuilder->AddSelectItem($strTableName, 'regularizacion_tiene_plano', $strAliasPrefix . 'regularizacion_tiene_plano');
			$objBuilder->AddSelectItem($strTableName, 'tiene_censo', $strAliasPrefix . 'tiene_censo');
			$objBuilder->AddSelectItem($strTableName, 'ley_14449', $strAliasPrefix . 'ley_14449');
			$objBuilder->AddSelectItem($strTableName, 'fecha_informe_urbanistico', $strAliasPrefix . 'fecha_informe_urbanistico');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'informe_urbanistico', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'informe_urbanistico'] : $strAliasPrefix . 'informe_urbanistico';
			$objToReturn->strInformeUrbanistico = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_circular_10_catastro', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_circular_10_catastro'] : $strAliasPrefix . 'regularizacion_circular_10_catastro';
			$objToReturn->blnRegularizacionCircular10Catastro = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_aprobacion_geodesia', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_aprobacion_geodesia'] : $strAliasPrefix . 'regularizacion_aprobacion_geodesia';
			$objToReturn->intRegularizacionAprobacionGeodesia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_registracion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_registracion'] : $strAliasPrefix . 'regularizacion_registracion';
			$objToReturn->intRegularizacionRegistracion = $objDbRow->GetColumn($strAliasName, 'Integer');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_censo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_censo'] : $strAliasPrefix . 'fecha_censo';
			$objToReturn->strFechaCenso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'geodesia_partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'geodesia_partido'] : $strAliasPrefix . 'geodesia_partido';
			$objToReturn->strGeodesiaPartido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'estado_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'estado_folio'] : $strAliasPrefix . 'estado_folio';
			$objToReturn->intEstadoFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'regularizacion_tiene_plano', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'regularizacion_tiene_plano'] : $strAliasPrefix . 'regularizacion_tiene_plano';
			$objToReturn->strRegularizacionTienePlano = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'tiene_censo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tiene_censo'] : $strAliasPrefix . 'tiene_censo';
			$objToReturn->strTieneCenso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ley_14449', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ley_14449'] : $strAliasPrefix . 'ley_14449';
			$objToReturn->strLey14449 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_informe_urbanistico', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_informe_urbanistico'] : $strAliasPrefix . 'fecha_informe_urbanistico';
			$objToReturn->dttFechaInformeUrbanistico = $objDbRow->GetColumn($strAliasName, 'Date');

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

			// Check for RegularizacionEstadoProcesoObject Early Binding
			$strAlias = $strAliasPrefix . 'regularizacion_estado_proceso__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRegularizacionEstadoProcesoObject = EstadoProceso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'regularizacion_estado_proceso__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for EstadoFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'estado_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEstadoFolioObject = EstadoFolio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estado_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




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
			
		/**
		 * Load an array of UsoInterno objects,
		 * by EstadoFolio Index(es)
		 * @param integer $intEstadoFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsoInterno[]
		*/
		public static function LoadArrayByEstadoFolio($intEstadoFolio, $objOptionalClauses = null) {
			// Call UsoInterno::QueryArray to perform the LoadArrayByEstadoFolio query
			try {
				return UsoInterno::QueryArray(
					QQ::Equal(QQN::UsoInterno()->EstadoFolio, $intEstadoFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UsoInternos
		 * by EstadoFolio Index(es)
		 * @param integer $intEstadoFolio
		 * @return int
		*/
		public static function CountByEstadoFolio($intEstadoFolio) {
			// Call UsoInterno::QueryCount to perform the CountByEstadoFolio query
			return UsoInterno::QueryCount(
				QQ::Equal(QQN::UsoInterno()->EstadoFolio, $intEstadoFolio)
			);
		}
			
		/**
		 * Load an array of UsoInterno objects,
		 * by RegularizacionEstadoProceso Index(es)
		 * @param integer $intRegularizacionEstadoProceso
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsoInterno[]
		*/
		public static function LoadArrayByRegularizacionEstadoProceso($intRegularizacionEstadoProceso, $objOptionalClauses = null) {
			// Call UsoInterno::QueryArray to perform the LoadArrayByRegularizacionEstadoProceso query
			try {
				return UsoInterno::QueryArray(
					QQ::Equal(QQN::UsoInterno()->RegularizacionEstadoProceso, $intRegularizacionEstadoProceso),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UsoInternos
		 * by RegularizacionEstadoProceso Index(es)
		 * @param integer $intRegularizacionEstadoProceso
		 * @return int
		*/
		public static function CountByRegularizacionEstadoProceso($intRegularizacionEstadoProceso) {
			// Call UsoInterno::QueryCount to perform the CountByRegularizacionEstadoProceso query
			return UsoInterno::QueryCount(
				QQ::Equal(QQN::UsoInterno()->RegularizacionEstadoProceso, $intRegularizacionEstadoProceso)
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
            // ver si objRegularizacionEstadoProcesoObject esta Guardado
            if(is_null($this->intRegularizacionEstadoProceso)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->RegularizacionEstadoProcesoObject))
                try{
                    if(!is_null($this->RegularizacionEstadoProcesoObject->RegularizacionEstadoProceso))
                        $this->intRegularizacionEstadoProceso = $this->RegularizacionEstadoProcesoObject->RegularizacionEstadoProceso;
                    else
                        $this->intRegularizacionEstadoProceso = $this->RegularizacionEstadoProcesoObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objEstadoFolioObject esta Guardado
            if(is_null($this->intEstadoFolio)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->EstadoFolioObject))
                try{
                    if(!is_null($this->EstadoFolioObject->EstadoFolio))
                        $this->intEstadoFolio = $this->EstadoFolioObject->EstadoFolio;
                    else
                        $this->intEstadoFolio = $this->EstadoFolioObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }

                    if ($this->intIdFolio && ($this->intIdFolio > QDatabaseNumberFieldMax::Integer || $this->intIdFolio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdFolio', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRegularizacionAprobacionGeodesia && ($this->intRegularizacionAprobacionGeodesia > QDatabaseNumberFieldMax::Integer || $this->intRegularizacionAprobacionGeodesia < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRegularizacionAprobacionGeodesia', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRegularizacionRegistracion && ($this->intRegularizacionRegistracion > QDatabaseNumberFieldMax::Integer || $this->intRegularizacionRegistracion < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRegularizacionRegistracion', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRegularizacionEstadoProceso && ($this->intRegularizacionEstadoProceso > QDatabaseNumberFieldMax::Integer || $this->intRegularizacionEstadoProceso < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRegularizacionEstadoProceso', QDatabaseFieldType::Integer);
                    }
                    if ($this->intEstadoFolio && ($this->intEstadoFolio > QDatabaseNumberFieldMax::Integer || $this->intEstadoFolio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEstadoFolio', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "uso_interno" (
                            "id_folio",
                            "informe_urbanistico",
                            "mapeo_preliminar",
                            "no_corresponde_inscripcion",
                            "resolucion_inscripcion_provisoria",
                            "resolucion_inscripcion_definitiva",
                            "regularizacion_fecha_inicio",
                            "regularizacion_circular_10_catastro",
                            "regularizacion_aprobacion_geodesia",
                            "regularizacion_registracion",
                            "regularizacion_estado_proceso",
                            "num_expediente",
                            "registracion_legajo",
                            "registracion_fecha",
                            "registracion_folio",
                            "geodesia_num",
                            "geodesia_anio",
                            "fecha_censo",
                            "geodesia_partido",
                            "estado_folio",
                            "regularizacion_tiene_plano",
                            "tiene_censo",
                            "ley_14449",
                            "fecha_informe_urbanistico"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->strInformeUrbanistico) . ',
                            ' . $objDatabase->SqlVariable($this->blnMapeoPreliminar) . ',
                            ' . $objDatabase->SqlVariable($this->blnNoCorrespondeInscripcion) . ',
                            ' . $objDatabase->SqlVariable($this->strResolucionInscripcionProvisoria) . ',
                            ' . $objDatabase->SqlVariable($this->strResolucionInscripcionDefinitiva) . ',
                            ' . $objDatabase->SqlVariable($this->dttRegularizacionFechaInicio) . ',
                            ' . $objDatabase->SqlVariable($this->blnRegularizacionCircular10Catastro) . ',
                            ' . $objDatabase->SqlVariable($this->intRegularizacionAprobacionGeodesia) . ',
                            ' . $objDatabase->SqlVariable($this->intRegularizacionRegistracion) . ',
                            ' . $objDatabase->SqlVariable($this->intRegularizacionEstadoProceso) . ',
                            ' . $objDatabase->SqlVariable($this->strNumExpediente) . ',
                            ' . $objDatabase->SqlVariable($this->strRegistracionLegajo) . ',
                            ' . $objDatabase->SqlVariable($this->strRegistracionFecha) . ',
                            ' . $objDatabase->SqlVariable($this->strRegistracionFolio) . ',
                            ' . $objDatabase->SqlVariable($this->strGeodesiaNum) . ',
                            ' . $objDatabase->SqlVariable($this->strGeodesiaAnio) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaCenso) . ',
                            ' . $objDatabase->SqlVariable($this->strGeodesiaPartido) . ',
                            ' . $objDatabase->SqlVariable($this->intEstadoFolio) . ',
                            ' . $objDatabase->SqlVariable($this->strRegularizacionTienePlano) . ',
                            ' . $objDatabase->SqlVariable($this->strTieneCenso) . ',
                            ' . $objDatabase->SqlVariable($this->strLey14449) . ',
                            ' . $objDatabase->SqlVariable($this->dttFechaInformeUrbanistico) . '
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
                            "informe_urbanistico" = ' . $objDatabase->SqlVariable($this->strInformeUrbanistico) . ',
                            "mapeo_preliminar" = ' . $objDatabase->SqlVariable($this->blnMapeoPreliminar) . ',
                            "no_corresponde_inscripcion" = ' . $objDatabase->SqlVariable($this->blnNoCorrespondeInscripcion) . ',
                            "resolucion_inscripcion_provisoria" = ' . $objDatabase->SqlVariable($this->strResolucionInscripcionProvisoria) . ',
                            "resolucion_inscripcion_definitiva" = ' . $objDatabase->SqlVariable($this->strResolucionInscripcionDefinitiva) . ',
                            "regularizacion_fecha_inicio" = ' . $objDatabase->SqlVariable($this->dttRegularizacionFechaInicio) . ',
                            "regularizacion_circular_10_catastro" = ' . $objDatabase->SqlVariable($this->blnRegularizacionCircular10Catastro) . ',
                            "regularizacion_aprobacion_geodesia" = ' . $objDatabase->SqlVariable($this->intRegularizacionAprobacionGeodesia) . ',
                            "regularizacion_registracion" = ' . $objDatabase->SqlVariable($this->intRegularizacionRegistracion) . ',
                            "regularizacion_estado_proceso" = ' . $objDatabase->SqlVariable($this->intRegularizacionEstadoProceso) . ',
                            "num_expediente" = ' . $objDatabase->SqlVariable($this->strNumExpediente) . ',
                            "registracion_legajo" = ' . $objDatabase->SqlVariable($this->strRegistracionLegajo) . ',
                            "registracion_fecha" = ' . $objDatabase->SqlVariable($this->strRegistracionFecha) . ',
                            "registracion_folio" = ' . $objDatabase->SqlVariable($this->strRegistracionFolio) . ',
                            "geodesia_num" = ' . $objDatabase->SqlVariable($this->strGeodesiaNum) . ',
                            "geodesia_anio" = ' . $objDatabase->SqlVariable($this->strGeodesiaAnio) . ',
                            "fecha_censo" = ' . $objDatabase->SqlVariable($this->strFechaCenso) . ',
                            "geodesia_partido" = ' . $objDatabase->SqlVariable($this->strGeodesiaPartido) . ',
                            "estado_folio" = ' . $objDatabase->SqlVariable($this->intEstadoFolio) . ',
                            "regularizacion_tiene_plano" = ' . $objDatabase->SqlVariable($this->strRegularizacionTienePlano) . ',
                            "tiene_censo" = ' . $objDatabase->SqlVariable($this->strTieneCenso) . ',
                            "ley_14449" = ' . $objDatabase->SqlVariable($this->strLey14449) . ',
                            "fecha_informe_urbanistico" = ' . $objDatabase->SqlVariable($this->dttFechaInformeUrbanistico) . '
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
			$this->strInformeUrbanistico = $objReloaded->strInformeUrbanistico;
			$this->blnMapeoPreliminar = $objReloaded->blnMapeoPreliminar;
			$this->blnNoCorrespondeInscripcion = $objReloaded->blnNoCorrespondeInscripcion;
			$this->strResolucionInscripcionProvisoria = $objReloaded->strResolucionInscripcionProvisoria;
			$this->strResolucionInscripcionDefinitiva = $objReloaded->strResolucionInscripcionDefinitiva;
			$this->dttRegularizacionFechaInicio = $objReloaded->dttRegularizacionFechaInicio;
			$this->blnRegularizacionCircular10Catastro = $objReloaded->blnRegularizacionCircular10Catastro;
			$this->intRegularizacionAprobacionGeodesia = $objReloaded->intRegularizacionAprobacionGeodesia;
			$this->intRegularizacionRegistracion = $objReloaded->intRegularizacionRegistracion;
			$this->RegularizacionEstadoProceso = $objReloaded->RegularizacionEstadoProceso;
			$this->strNumExpediente = $objReloaded->strNumExpediente;
			$this->strRegistracionLegajo = $objReloaded->strRegistracionLegajo;
			$this->strRegistracionFecha = $objReloaded->strRegistracionFecha;
			$this->strRegistracionFolio = $objReloaded->strRegistracionFolio;
			$this->strGeodesiaNum = $objReloaded->strGeodesiaNum;
			$this->strGeodesiaAnio = $objReloaded->strGeodesiaAnio;
			$this->strFechaCenso = $objReloaded->strFechaCenso;
			$this->strGeodesiaPartido = $objReloaded->strGeodesiaPartido;
			$this->EstadoFolio = $objReloaded->EstadoFolio;
			$this->strRegularizacionTienePlano = $objReloaded->strRegularizacionTienePlano;
			$this->strTieneCenso = $objReloaded->strTieneCenso;
			$this->strLey14449 = $objReloaded->strLey14449;
			$this->dttFechaInformeUrbanistico = $objReloaded->dttFechaInformeUrbanistico;
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

            case 'InformeUrbanistico':
                /**
                 * Gets the value for strInformeUrbanistico 
                 * @return string
                 */
                return $this->strInformeUrbanistico;

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

            case 'RegularizacionCircular10Catastro':
                /**
                 * Gets the value for blnRegularizacionCircular10Catastro 
                 * @return boolean
                 */
                return $this->blnRegularizacionCircular10Catastro;

            case 'RegularizacionAprobacionGeodesia':
                /**
                 * Gets the value for intRegularizacionAprobacionGeodesia 
                 * @return integer
                 */
                return $this->intRegularizacionAprobacionGeodesia;

            case 'RegularizacionRegistracion':
                /**
                 * Gets the value for intRegularizacionRegistracion 
                 * @return integer
                 */
                return $this->intRegularizacionRegistracion;

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

            case 'EstadoFolio':
                /**
                 * Gets the value for intEstadoFolio 
                 * @return integer
                 */
                return $this->intEstadoFolio;

            case 'RegularizacionTienePlano':
                /**
                 * Gets the value for strRegularizacionTienePlano 
                 * @return string
                 */
                return $this->strRegularizacionTienePlano;

            case 'TieneCenso':
                /**
                 * Gets the value for strTieneCenso 
                 * @return string
                 */
                return $this->strTieneCenso;

            case 'Ley14449':
                /**
                 * Gets the value for strLey14449 
                 * @return string
                 */
                return $this->strLey14449;

            case 'FechaInformeUrbanistico':
                /**
                 * Gets the value for dttFechaInformeUrbanistico 
                 * @return QDateTime
                 */
                return $this->dttFechaInformeUrbanistico;


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

            case 'RegularizacionEstadoProcesoObject':
                /**
                 * Gets the value for the EstadoProceso object referenced by intRegularizacionEstadoProceso 
                 * @return EstadoProceso
                 */
                try {
                    if ((!$this->objRegularizacionEstadoProcesoObject) && (!is_null($this->intRegularizacionEstadoProceso)))
                        $this->objRegularizacionEstadoProcesoObject = EstadoProceso::Load($this->intRegularizacionEstadoProceso);
                    return $this->objRegularizacionEstadoProcesoObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'EstadoFolioObject':
                /**
                 * Gets the value for the EstadoFolio object referenced by intEstadoFolio 
                 * @return EstadoFolio
                 */
                try {
                    if ((!$this->objEstadoFolioObject) && (!is_null($this->intEstadoFolio)))
                        $this->objEstadoFolioObject = EstadoFolio::Load($this->intEstadoFolio);
                    return $this->objEstadoFolioObject;
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

				case 'InformeUrbanistico':
					/**
					 * Sets the value for strInformeUrbanistico 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strInformeUrbanistico = QType::Cast($mixValue, QType::String));
                                                return ($this->strInformeUrbanistico = $mixValue);
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

				case 'RegularizacionAprobacionGeodesia':
					/**
					 * Sets the value for intRegularizacionAprobacionGeodesia 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRegularizacionAprobacionGeodesia = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRegularizacionAprobacionGeodesia = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegularizacionRegistracion':
					/**
					 * Sets the value for intRegularizacionRegistracion 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRegularizacionRegistracion = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRegularizacionRegistracion = $mixValue);
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
						$this->objRegularizacionEstadoProcesoObject = null;
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

				case 'EstadoFolio':
					/**
					 * Sets the value for intEstadoFolio 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEstadoFolioObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEstadoFolio = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEstadoFolio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegularizacionTienePlano':
					/**
					 * Sets the value for strRegularizacionTienePlano 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strRegularizacionTienePlano = QType::Cast($mixValue, QType::String));
                                                return ($this->strRegularizacionTienePlano = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TieneCenso':
					/**
					 * Sets the value for strTieneCenso 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTieneCenso = QType::Cast($mixValue, QType::String));
                                                return ($this->strTieneCenso = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ley14449':
					/**
					 * Sets the value for strLey14449 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strLey14449 = QType::Cast($mixValue, QType::String));
                                                return ($this->strLey14449 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaInformeUrbanistico':
					/**
					 * Sets the value for dttFechaInformeUrbanistico 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttFechaInformeUrbanistico = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttFechaInformeUrbanistico = $mixValue);
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

				case 'RegularizacionEstadoProcesoObject':
					/**
					 * Sets the value for the EstadoProceso object referenced by intRegularizacionEstadoProceso 
					 * @param EstadoProceso $mixValue
					 * @return EstadoProceso
					 */
					if (is_null($mixValue)) {
						$this->intRegularizacionEstadoProceso = null;
						$this->objRegularizacionEstadoProcesoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a EstadoProceso object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'EstadoProceso');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED EstadoProceso object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved RegularizacionEstadoProcesoObject for this UsoInterno');

						// Update Local Member Variables
						$this->objRegularizacionEstadoProcesoObject = $mixValue;
						$this->intRegularizacionEstadoProceso = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EstadoFolioObject':
					/**
					 * Sets the value for the EstadoFolio object referenced by intEstadoFolio 
					 * @param EstadoFolio $mixValue
					 * @return EstadoFolio
					 */
					if (is_null($mixValue)) {
						$this->intEstadoFolio = null;
						$this->objEstadoFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a EstadoFolio object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'EstadoFolio');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED EstadoFolio object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved EstadoFolioObject for this UsoInterno');

						// Update Local Member Variables
						$this->objEstadoFolioObject = $mixValue;
						$this->intEstadoFolio = $mixValue->Id;

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
			$strToReturn .= '<element name="InformeUrbanistico" type="xsd:string"/>';
			$strToReturn .= '<element name="MapeoPreliminar" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NoCorrespondeInscripcion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ResolucionInscripcionProvisoria" type="xsd:string"/>';
			$strToReturn .= '<element name="ResolucionInscripcionDefinitiva" type="xsd:string"/>';
			$strToReturn .= '<element name="RegularizacionFechaInicio" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="RegularizacionCircular10Catastro" type="xsd:boolean"/>';
			$strToReturn .= '<element name="RegularizacionAprobacionGeodesia" type="xsd:int"/>';
			$strToReturn .= '<element name="RegularizacionRegistracion" type="xsd:int"/>';
			$strToReturn .= '<element name="RegularizacionEstadoProcesoObject" type="xsd1:EstadoProceso"/>';
			$strToReturn .= '<element name="NumExpediente" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistracionLegajo" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistracionFecha" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistracionFolio" type="xsd:string"/>';
			$strToReturn .= '<element name="GeodesiaNum" type="xsd:string"/>';
			$strToReturn .= '<element name="GeodesiaAnio" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaCenso" type="xsd:string"/>';
			$strToReturn .= '<element name="GeodesiaPartido" type="xsd:string"/>';
			$strToReturn .= '<element name="EstadoFolioObject" type="xsd1:EstadoFolio"/>';
			$strToReturn .= '<element name="RegularizacionTienePlano" type="xsd:string"/>';
			$strToReturn .= '<element name="TieneCenso" type="xsd:string"/>';
			$strToReturn .= '<element name="Ley14449" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaInformeUrbanistico" type="xsd:dateTime"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('UsoInterno', $strComplexTypeArray)) {
				$strComplexTypeArray['UsoInterno'] = UsoInterno::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = EstadoProceso::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = EstadoFolio::AlterSoapComplexTypeArray($strComplexTypeArray);
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
			if (property_exists($objSoapObject, 'InformeUrbanistico')) {
				$objToReturn->strInformeUrbanistico = $objSoapObject->InformeUrbanistico;
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
			if (property_exists($objSoapObject, 'RegularizacionCircular10Catastro')) {
				$objToReturn->blnRegularizacionCircular10Catastro = $objSoapObject->RegularizacionCircular10Catastro;
            }
			if (property_exists($objSoapObject, 'RegularizacionAprobacionGeodesia')) {
				$objToReturn->intRegularizacionAprobacionGeodesia = $objSoapObject->RegularizacionAprobacionGeodesia;
            }
			if (property_exists($objSoapObject, 'RegularizacionRegistracion')) {
				$objToReturn->intRegularizacionRegistracion = $objSoapObject->RegularizacionRegistracion;
            }
			if ((property_exists($objSoapObject, 'RegularizacionEstadoProcesoObject')) &&
				($objSoapObject->RegularizacionEstadoProcesoObject))
				$objToReturn->RegularizacionEstadoProcesoObject = EstadoProceso::GetObjectFromSoapObject($objSoapObject->RegularizacionEstadoProcesoObject);
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
			if (property_exists($objSoapObject, 'FechaCenso')) {
				$objToReturn->strFechaCenso = $objSoapObject->FechaCenso;
            }
			if (property_exists($objSoapObject, 'GeodesiaPartido')) {
				$objToReturn->strGeodesiaPartido = $objSoapObject->GeodesiaPartido;
            }
			if ((property_exists($objSoapObject, 'EstadoFolioObject')) &&
				($objSoapObject->EstadoFolioObject))
				$objToReturn->EstadoFolioObject = EstadoFolio::GetObjectFromSoapObject($objSoapObject->EstadoFolioObject);
			if (property_exists($objSoapObject, 'RegularizacionTienePlano')) {
				$objToReturn->strRegularizacionTienePlano = $objSoapObject->RegularizacionTienePlano;
            }
			if (property_exists($objSoapObject, 'TieneCenso')) {
				$objToReturn->strTieneCenso = $objSoapObject->TieneCenso;
            }
			if (property_exists($objSoapObject, 'Ley14449')) {
				$objToReturn->strLey14449 = $objSoapObject->Ley14449;
            }
			if (property_exists($objSoapObject, 'FechaInformeUrbanistico')) {
				$objToReturn->dttFechaInformeUrbanistico = new QDateTime($objSoapObject->FechaInformeUrbanistico);
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
			if ($objObject->objRegularizacionEstadoProcesoObject)
				$objObject->objRegularizacionEstadoProcesoObject = EstadoProceso::GetSoapObjectFromObject($objObject->objRegularizacionEstadoProcesoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRegularizacionEstadoProceso = null;
			if ($objObject->objEstadoFolioObject)
				$objObject->objEstadoFolioObject = EstadoFolio::GetSoapObjectFromObject($objObject->objEstadoFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEstadoFolio = null;
			if ($objObject->dttFechaInformeUrbanistico)
				$objObject->dttFechaInformeUrbanistico = $objObject->dttFechaInformeUrbanistico->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>