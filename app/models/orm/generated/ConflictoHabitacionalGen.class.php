<?php
/**
 * The abstract ConflictoHabitacionalGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the ConflictoHabitacional subclass which
 * extends this ConflictoHabitacionalGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the ConflictoHabitacional class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio (Unique)
	 * @property boolean $IntervinoArea the value for blnIntervinoArea 
	 * @property string $FueroInterviniente the value for strFueroInterviniente 
	 * @property string $JuzgadoInterviniente the value for strJuzgadoInterviniente 
	 * @property string $CaratulaExpediente the value for strCaratulaExpediente 
	 * @property boolean $MinisterioDesarrollo the value for blnMinisterioDesarrollo 
	 * @property string $MinisterioDesarrolloReferente the value for strMinisterioDesarrolloReferente 
	 * @property boolean $DefensorPueblo the value for blnDefensorPueblo 
	 * @property string $DefensorPuebloReferente the value for strDefensorPuebloReferente 
	 * @property boolean $SecretariaNacional the value for blnSecretariaNacional 
	 * @property string $SecretariaNacionalReferente the value for strSecretariaNacionalReferente 
	 * @property boolean $Municipalidad the value for blnMunicipalidad 
	 * @property string $MunicipalidadReferente the value for strMunicipalidadReferente 
	 * @property boolean $OrganizacionBarrial the value for blnOrganizacionBarrial 
	 * @property string $OrganizacionBarrialReferente the value for strOrganizacionBarrialReferente 
	 * @property string $OtrosOrganismos the value for strOtrosOrganismos 
	 * @property boolean $OrdenDesalojo the value for blnOrdenDesalojo 
	 * @property string $FechaEjecucion the value for strFechaEjecucion 
	 * @property boolean $SuspensionHecho the value for blnSuspensionHecho 
	 * @property boolean $SolicitudSuspension the value for blnSolicitudSuspension 
	 * @property string $FechaSuspension the value for strFechaSuspension 
	 * @property string $DuracionSuspension the value for strDuracionSuspension 
	 * @property boolean $MesaGestion the value for blnMesaGestion 
	 * @property string $Observaciones the value for strObservaciones 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (Unique)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class ConflictoHabitacionalGen extends QBaseClass {

    public static function Noun() {
        return 'ConflictoHabitacional';
    }
    public static function NounPlural() {
        return 'ConflictoHabitacionales';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column conflicto_habitacional.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'conflicto_habitacional_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.intervino_area
     * @var boolean blnIntervinoArea
     */
    protected $blnIntervinoArea;
    const IntervinoAreaDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.fuero_interviniente
     * @var string strFueroInterviniente
     */
    protected $strFueroInterviniente;
    const FueroIntervinienteMaxLength = 255;
    const FueroIntervinienteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.juzgado_interviniente
     * @var string strJuzgadoInterviniente
     */
    protected $strJuzgadoInterviniente;
    const JuzgadoIntervinienteMaxLength = 255;
    const JuzgadoIntervinienteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.caratula_expediente
     * @var string strCaratulaExpediente
     */
    protected $strCaratulaExpediente;
    const CaratulaExpedienteMaxLength = 255;
    const CaratulaExpedienteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.ministerio_desarrollo
     * @var boolean blnMinisterioDesarrollo
     */
    protected $blnMinisterioDesarrollo;
    const MinisterioDesarrolloDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.ministerio_desarrollo_referente
     * @var string strMinisterioDesarrolloReferente
     */
    protected $strMinisterioDesarrolloReferente;
    const MinisterioDesarrolloReferenteMaxLength = 255;
    const MinisterioDesarrolloReferenteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.defensor_pueblo
     * @var boolean blnDefensorPueblo
     */
    protected $blnDefensorPueblo;
    const DefensorPuebloDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.defensor_pueblo_referente
     * @var string strDefensorPuebloReferente
     */
    protected $strDefensorPuebloReferente;
    const DefensorPuebloReferenteMaxLength = 255;
    const DefensorPuebloReferenteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.secretaria_nacional
     * @var boolean blnSecretariaNacional
     */
    protected $blnSecretariaNacional;
    const SecretariaNacionalDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.secretaria_nacional_referente
     * @var string strSecretariaNacionalReferente
     */
    protected $strSecretariaNacionalReferente;
    const SecretariaNacionalReferenteMaxLength = 255;
    const SecretariaNacionalReferenteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.municipalidad
     * @var boolean blnMunicipalidad
     */
    protected $blnMunicipalidad;
    const MunicipalidadDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.municipalidad_referente
     * @var string strMunicipalidadReferente
     */
    protected $strMunicipalidadReferente;
    const MunicipalidadReferenteMaxLength = 255;
    const MunicipalidadReferenteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.organizacion_barrial
     * @var boolean blnOrganizacionBarrial
     */
    protected $blnOrganizacionBarrial;
    const OrganizacionBarrialDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.organizacion_barrial_referente
     * @var string strOrganizacionBarrialReferente
     */
    protected $strOrganizacionBarrialReferente;
    const OrganizacionBarrialReferenteMaxLength = 255;
    const OrganizacionBarrialReferenteDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.otros_organismos
     * @var string strOtrosOrganismos
     */
    protected $strOtrosOrganismos;
    const OtrosOrganismosDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.orden_desalojo
     * @var boolean blnOrdenDesalojo
     */
    protected $blnOrdenDesalojo;
    const OrdenDesalojoDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.fecha_ejecucion
     * @var string strFechaEjecucion
     */
    protected $strFechaEjecucion;
    const FechaEjecucionMaxLength = 255;
    const FechaEjecucionDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.suspension_hecho
     * @var boolean blnSuspensionHecho
     */
    protected $blnSuspensionHecho;
    const SuspensionHechoDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.solicitud_suspension
     * @var boolean blnSolicitudSuspension
     */
    protected $blnSolicitudSuspension;
    const SolicitudSuspensionDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.fecha_suspension
     * @var string strFechaSuspension
     */
    protected $strFechaSuspension;
    const FechaSuspensionMaxLength = 255;
    const FechaSuspensionDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.duracion_suspension
     * @var string strDuracionSuspension
     */
    protected $strDuracionSuspension;
    const DuracionSuspensionMaxLength = 255;
    const DuracionSuspensionDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.mesa_gestion
     * @var boolean blnMesaGestion
     */
    protected $blnMesaGestion;
    const MesaGestionDefault = null;


    /**
     * Protected member variable that maps to the database column conflicto_habitacional.observaciones
     * @var string strObservaciones
     */
    protected $strObservaciones;
    const ObservacionesDefault = null;


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
		 * in the database column conflicto_habitacional.id_folio.
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
                protected static $_objConflictoHabitacionalArray = array();


		/**
		 * Load a ConflictoHabitacional from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return ConflictoHabitacional
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  ConflictoHabitacional::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ConflictoHabitacional()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objConflictoHabitacionalArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpConflictoHabitacional = ConflictoHabitacional::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ConflictoHabitacional()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objConflictoHabitacionalArray["$intId"] = $objTmpConflictoHabitacional;
            }
                        }
                        return isset(self::$_objConflictoHabitacionalArray["$intId"])?self::$_objConflictoHabitacionalArray["$intId"]:null;
		}

		/**
		 * Load all ConflictoHabitacionales
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConflictoHabitacional[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ConflictoHabitacional::QueryArray to perform the LoadAll query
			try {
				return ConflictoHabitacional::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ConflictoHabitacionales
		 * @return int
		 */
		public static function CountAll() {
			// Call ConflictoHabitacional::QueryCount to perform the CountAll query
			return ConflictoHabitacional::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (ConflictoHabitacional::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::ConflictoHabitacional()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::ConflictoHabitacional()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase ConflictoHabitacional no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = ConflictoHabitacional::GetDatabase();

			// Create/Build out the QueryBuilder object with ConflictoHabitacional-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'conflicto_habitacional');
			ConflictoHabitacional::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('conflicto_habitacional');

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
		 * Static Qcubed Query method to query for a single ConflictoHabitacional object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ConflictoHabitacional the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ConflictoHabitacional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new ConflictoHabitacional object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ConflictoHabitacional::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = ConflictoHabitacional::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of ConflictoHabitacional objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ConflictoHabitacional[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ConflictoHabitacional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ConflictoHabitacional::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of ConflictoHabitacional objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ConflictoHabitacional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ConflictoHabitacional::GetDatabase();

			$strQuery = ConflictoHabitacional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/conflictohabitacional', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ConflictoHabitacional::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ConflictoHabitacional
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'conflicto_habitacional';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'intervino_area', $strAliasPrefix . 'intervino_area');
			$objBuilder->AddSelectItem($strTableName, 'fuero_interviniente', $strAliasPrefix . 'fuero_interviniente');
			$objBuilder->AddSelectItem($strTableName, 'juzgado_interviniente', $strAliasPrefix . 'juzgado_interviniente');
			$objBuilder->AddSelectItem($strTableName, 'caratula_expediente', $strAliasPrefix . 'caratula_expediente');
			$objBuilder->AddSelectItem($strTableName, 'ministerio_desarrollo', $strAliasPrefix . 'ministerio_desarrollo');
			$objBuilder->AddSelectItem($strTableName, 'ministerio_desarrollo_referente', $strAliasPrefix . 'ministerio_desarrollo_referente');
			$objBuilder->AddSelectItem($strTableName, 'defensor_pueblo', $strAliasPrefix . 'defensor_pueblo');
			$objBuilder->AddSelectItem($strTableName, 'defensor_pueblo_referente', $strAliasPrefix . 'defensor_pueblo_referente');
			$objBuilder->AddSelectItem($strTableName, 'secretaria_nacional', $strAliasPrefix . 'secretaria_nacional');
			$objBuilder->AddSelectItem($strTableName, 'secretaria_nacional_referente', $strAliasPrefix . 'secretaria_nacional_referente');
			$objBuilder->AddSelectItem($strTableName, 'municipalidad', $strAliasPrefix . 'municipalidad');
			$objBuilder->AddSelectItem($strTableName, 'municipalidad_referente', $strAliasPrefix . 'municipalidad_referente');
			$objBuilder->AddSelectItem($strTableName, 'organizacion_barrial', $strAliasPrefix . 'organizacion_barrial');
			$objBuilder->AddSelectItem($strTableName, 'organizacion_barrial_referente', $strAliasPrefix . 'organizacion_barrial_referente');
			$objBuilder->AddSelectItem($strTableName, 'otros_organismos', $strAliasPrefix . 'otros_organismos');
			$objBuilder->AddSelectItem($strTableName, 'orden_desalojo', $strAliasPrefix . 'orden_desalojo');
			$objBuilder->AddSelectItem($strTableName, 'fecha_ejecucion', $strAliasPrefix . 'fecha_ejecucion');
			$objBuilder->AddSelectItem($strTableName, 'suspension_hecho', $strAliasPrefix . 'suspension_hecho');
			$objBuilder->AddSelectItem($strTableName, 'solicitud_suspension', $strAliasPrefix . 'solicitud_suspension');
			$objBuilder->AddSelectItem($strTableName, 'fecha_suspension', $strAliasPrefix . 'fecha_suspension');
			$objBuilder->AddSelectItem($strTableName, 'duracion_suspension', $strAliasPrefix . 'duracion_suspension');
			$objBuilder->AddSelectItem($strTableName, 'mesa_gestion', $strAliasPrefix . 'mesa_gestion');
			$objBuilder->AddSelectItem($strTableName, 'observaciones', $strAliasPrefix . 'observaciones');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ConflictoHabitacional from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ConflictoHabitacional::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ConflictoHabitacional
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the ConflictoHabitacional object
			$objToReturn = new ConflictoHabitacional();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'intervino_area', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'intervino_area'] : $strAliasPrefix . 'intervino_area';
			$objToReturn->blnIntervinoArea = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'fuero_interviniente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fuero_interviniente'] : $strAliasPrefix . 'fuero_interviniente';
			$objToReturn->strFueroInterviniente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'juzgado_interviniente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'juzgado_interviniente'] : $strAliasPrefix . 'juzgado_interviniente';
			$objToReturn->strJuzgadoInterviniente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'caratula_expediente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'caratula_expediente'] : $strAliasPrefix . 'caratula_expediente';
			$objToReturn->strCaratulaExpediente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ministerio_desarrollo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ministerio_desarrollo'] : $strAliasPrefix . 'ministerio_desarrollo';
			$objToReturn->blnMinisterioDesarrollo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'ministerio_desarrollo_referente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ministerio_desarrollo_referente'] : $strAliasPrefix . 'ministerio_desarrollo_referente';
			$objToReturn->strMinisterioDesarrolloReferente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'defensor_pueblo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'defensor_pueblo'] : $strAliasPrefix . 'defensor_pueblo';
			$objToReturn->blnDefensorPueblo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'defensor_pueblo_referente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'defensor_pueblo_referente'] : $strAliasPrefix . 'defensor_pueblo_referente';
			$objToReturn->strDefensorPuebloReferente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'secretaria_nacional', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'secretaria_nacional'] : $strAliasPrefix . 'secretaria_nacional';
			$objToReturn->blnSecretariaNacional = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'secretaria_nacional_referente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'secretaria_nacional_referente'] : $strAliasPrefix . 'secretaria_nacional_referente';
			$objToReturn->strSecretariaNacionalReferente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'municipalidad', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'municipalidad'] : $strAliasPrefix . 'municipalidad';
			$objToReturn->blnMunicipalidad = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'municipalidad_referente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'municipalidad_referente'] : $strAliasPrefix . 'municipalidad_referente';
			$objToReturn->strMunicipalidadReferente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'organizacion_barrial', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'organizacion_barrial'] : $strAliasPrefix . 'organizacion_barrial';
			$objToReturn->blnOrganizacionBarrial = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'organizacion_barrial_referente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'organizacion_barrial_referente'] : $strAliasPrefix . 'organizacion_barrial_referente';
			$objToReturn->strOrganizacionBarrialReferente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'otros_organismos', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'otros_organismos'] : $strAliasPrefix . 'otros_organismos';
			$objToReturn->strOtrosOrganismos = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'orden_desalojo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'orden_desalojo'] : $strAliasPrefix . 'orden_desalojo';
			$objToReturn->blnOrdenDesalojo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_ejecucion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_ejecucion'] : $strAliasPrefix . 'fecha_ejecucion';
			$objToReturn->strFechaEjecucion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'suspension_hecho', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'suspension_hecho'] : $strAliasPrefix . 'suspension_hecho';
			$objToReturn->blnSuspensionHecho = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'solicitud_suspension', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'solicitud_suspension'] : $strAliasPrefix . 'solicitud_suspension';
			$objToReturn->blnSolicitudSuspension = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_suspension', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_suspension'] : $strAliasPrefix . 'fecha_suspension';
			$objToReturn->strFechaSuspension = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'duracion_suspension', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'duracion_suspension'] : $strAliasPrefix . 'duracion_suspension';
			$objToReturn->strDuracionSuspension = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'mesa_gestion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'mesa_gestion'] : $strAliasPrefix . 'mesa_gestion';
			$objToReturn->blnMesaGestion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'observaciones', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'observaciones'] : $strAliasPrefix . 'observaciones';
			$objToReturn->strObservaciones = $objDbRow->GetColumn($strAliasName, 'Blob');

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
				$strAliasPrefix = 'conflicto_habitacional__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ConflictoHabitacionales from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ConflictoHabitacional[]
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
					$objItem = ConflictoHabitacional::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ConflictoHabitacional::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ConflictoHabitacional object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConflictoHabitacional
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ConflictoHabitacional::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ConflictoHabitacional()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single ConflictoHabitacional object,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConflictoHabitacional
		*/
		public static function LoadByIdFolio($intIdFolio, $objOptionalClauses = null) {
			return ConflictoHabitacional::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ConflictoHabitacional()->IdFolio, $intIdFolio)
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
         * Save this ConflictoHabitacional
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = ConflictoHabitacional::GetDatabase();

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
                        INSERT INTO "conflicto_habitacional" (
                            "id_folio",
                            "intervino_area",
                            "fuero_interviniente",
                            "juzgado_interviniente",
                            "caratula_expediente",
                            "ministerio_desarrollo",
                            "ministerio_desarrollo_referente",
                            "defensor_pueblo",
                            "defensor_pueblo_referente",
                            "secretaria_nacional",
                            "secretaria_nacional_referente",
                            "municipalidad",
                            "municipalidad_referente",
                            "organizacion_barrial",
                            "organizacion_barrial_referente",
                            "otros_organismos",
                            "orden_desalojo",
                            "fecha_ejecucion",
                            "suspension_hecho",
                            "solicitud_suspension",
                            "fecha_suspension",
                            "duracion_suspension",
                            "mesa_gestion",
                            "observaciones"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnIntervinoArea) . ',
                            ' . $objDatabase->SqlVariable($this->strFueroInterviniente) . ',
                            ' . $objDatabase->SqlVariable($this->strJuzgadoInterviniente) . ',
                            ' . $objDatabase->SqlVariable($this->strCaratulaExpediente) . ',
                            ' . $objDatabase->SqlVariable($this->blnMinisterioDesarrollo) . ',
                            ' . $objDatabase->SqlVariable($this->strMinisterioDesarrolloReferente) . ',
                            ' . $objDatabase->SqlVariable($this->blnDefensorPueblo) . ',
                            ' . $objDatabase->SqlVariable($this->strDefensorPuebloReferente) . ',
                            ' . $objDatabase->SqlVariable($this->blnSecretariaNacional) . ',
                            ' . $objDatabase->SqlVariable($this->strSecretariaNacionalReferente) . ',
                            ' . $objDatabase->SqlVariable($this->blnMunicipalidad) . ',
                            ' . $objDatabase->SqlVariable($this->strMunicipalidadReferente) . ',
                            ' . $objDatabase->SqlVariable($this->blnOrganizacionBarrial) . ',
                            ' . $objDatabase->SqlVariable($this->strOrganizacionBarrialReferente) . ',
                            ' . $objDatabase->SqlVariable($this->strOtrosOrganismos) . ',
                            ' . $objDatabase->SqlVariable($this->blnOrdenDesalojo) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaEjecucion) . ',
                            ' . $objDatabase->SqlVariable($this->blnSuspensionHecho) . ',
                            ' . $objDatabase->SqlVariable($this->blnSolicitudSuspension) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaSuspension) . ',
                            ' . $objDatabase->SqlVariable($this->strDuracionSuspension) . ',
                            ' . $objDatabase->SqlVariable($this->blnMesaGestion) . ',
                            ' . $objDatabase->SqlVariable($this->strObservaciones) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('conflicto_habitacional', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "conflicto_habitacional"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "intervino_area" = ' . $objDatabase->SqlVariable($this->blnIntervinoArea) . ',
                            "fuero_interviniente" = ' . $objDatabase->SqlVariable($this->strFueroInterviniente) . ',
                            "juzgado_interviniente" = ' . $objDatabase->SqlVariable($this->strJuzgadoInterviniente) . ',
                            "caratula_expediente" = ' . $objDatabase->SqlVariable($this->strCaratulaExpediente) . ',
                            "ministerio_desarrollo" = ' . $objDatabase->SqlVariable($this->blnMinisterioDesarrollo) . ',
                            "ministerio_desarrollo_referente" = ' . $objDatabase->SqlVariable($this->strMinisterioDesarrolloReferente) . ',
                            "defensor_pueblo" = ' . $objDatabase->SqlVariable($this->blnDefensorPueblo) . ',
                            "defensor_pueblo_referente" = ' . $objDatabase->SqlVariable($this->strDefensorPuebloReferente) . ',
                            "secretaria_nacional" = ' . $objDatabase->SqlVariable($this->blnSecretariaNacional) . ',
                            "secretaria_nacional_referente" = ' . $objDatabase->SqlVariable($this->strSecretariaNacionalReferente) . ',
                            "municipalidad" = ' . $objDatabase->SqlVariable($this->blnMunicipalidad) . ',
                            "municipalidad_referente" = ' . $objDatabase->SqlVariable($this->strMunicipalidadReferente) . ',
                            "organizacion_barrial" = ' . $objDatabase->SqlVariable($this->blnOrganizacionBarrial) . ',
                            "organizacion_barrial_referente" = ' . $objDatabase->SqlVariable($this->strOrganizacionBarrialReferente) . ',
                            "otros_organismos" = ' . $objDatabase->SqlVariable($this->strOtrosOrganismos) . ',
                            "orden_desalojo" = ' . $objDatabase->SqlVariable($this->blnOrdenDesalojo) . ',
                            "fecha_ejecucion" = ' . $objDatabase->SqlVariable($this->strFechaEjecucion) . ',
                            "suspension_hecho" = ' . $objDatabase->SqlVariable($this->blnSuspensionHecho) . ',
                            "solicitud_suspension" = ' . $objDatabase->SqlVariable($this->blnSolicitudSuspension) . ',
                            "fecha_suspension" = ' . $objDatabase->SqlVariable($this->strFechaSuspension) . ',
                            "duracion_suspension" = ' . $objDatabase->SqlVariable($this->strDuracionSuspension) . ',
                            "mesa_gestion" = ' . $objDatabase->SqlVariable($this->blnMesaGestion) . ',
                            "observaciones" = ' . $objDatabase->SqlVariable($this->strObservaciones) . '
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
		 * Delete this ConflictoHabitacional
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ConflictoHabitacional with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ConflictoHabitacional::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"conflicto_habitacional"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all ConflictoHabitacionales
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ConflictoHabitacional::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"conflicto_habitacional"');
		}

		/**
		 * Truncate conflicto_habitacional table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = ConflictoHabitacional::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "conflicto_habitacional" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this ConflictoHabitacional from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ConflictoHabitacional object.');

			// Reload the Object
			$objReloaded = ConflictoHabitacional::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->blnIntervinoArea = $objReloaded->blnIntervinoArea;
			$this->strFueroInterviniente = $objReloaded->strFueroInterviniente;
			$this->strJuzgadoInterviniente = $objReloaded->strJuzgadoInterviniente;
			$this->strCaratulaExpediente = $objReloaded->strCaratulaExpediente;
			$this->blnMinisterioDesarrollo = $objReloaded->blnMinisterioDesarrollo;
			$this->strMinisterioDesarrolloReferente = $objReloaded->strMinisterioDesarrolloReferente;
			$this->blnDefensorPueblo = $objReloaded->blnDefensorPueblo;
			$this->strDefensorPuebloReferente = $objReloaded->strDefensorPuebloReferente;
			$this->blnSecretariaNacional = $objReloaded->blnSecretariaNacional;
			$this->strSecretariaNacionalReferente = $objReloaded->strSecretariaNacionalReferente;
			$this->blnMunicipalidad = $objReloaded->blnMunicipalidad;
			$this->strMunicipalidadReferente = $objReloaded->strMunicipalidadReferente;
			$this->blnOrganizacionBarrial = $objReloaded->blnOrganizacionBarrial;
			$this->strOrganizacionBarrialReferente = $objReloaded->strOrganizacionBarrialReferente;
			$this->strOtrosOrganismos = $objReloaded->strOtrosOrganismos;
			$this->blnOrdenDesalojo = $objReloaded->blnOrdenDesalojo;
			$this->strFechaEjecucion = $objReloaded->strFechaEjecucion;
			$this->blnSuspensionHecho = $objReloaded->blnSuspensionHecho;
			$this->blnSolicitudSuspension = $objReloaded->blnSolicitudSuspension;
			$this->strFechaSuspension = $objReloaded->strFechaSuspension;
			$this->strDuracionSuspension = $objReloaded->strDuracionSuspension;
			$this->blnMesaGestion = $objReloaded->blnMesaGestion;
			$this->strObservaciones = $objReloaded->strObservaciones;
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

            case 'IntervinoArea':
                /**
                 * Gets the value for blnIntervinoArea 
                 * @return boolean
                 */
                return $this->blnIntervinoArea;

            case 'FueroInterviniente':
                /**
                 * Gets the value for strFueroInterviniente 
                 * @return string
                 */
                return $this->strFueroInterviniente;

            case 'JuzgadoInterviniente':
                /**
                 * Gets the value for strJuzgadoInterviniente 
                 * @return string
                 */
                return $this->strJuzgadoInterviniente;

            case 'CaratulaExpediente':
                /**
                 * Gets the value for strCaratulaExpediente 
                 * @return string
                 */
                return $this->strCaratulaExpediente;

            case 'MinisterioDesarrollo':
                /**
                 * Gets the value for blnMinisterioDesarrollo 
                 * @return boolean
                 */
                return $this->blnMinisterioDesarrollo;

            case 'MinisterioDesarrolloReferente':
                /**
                 * Gets the value for strMinisterioDesarrolloReferente 
                 * @return string
                 */
                return $this->strMinisterioDesarrolloReferente;

            case 'DefensorPueblo':
                /**
                 * Gets the value for blnDefensorPueblo 
                 * @return boolean
                 */
                return $this->blnDefensorPueblo;

            case 'DefensorPuebloReferente':
                /**
                 * Gets the value for strDefensorPuebloReferente 
                 * @return string
                 */
                return $this->strDefensorPuebloReferente;

            case 'SecretariaNacional':
                /**
                 * Gets the value for blnSecretariaNacional 
                 * @return boolean
                 */
                return $this->blnSecretariaNacional;

            case 'SecretariaNacionalReferente':
                /**
                 * Gets the value for strSecretariaNacionalReferente 
                 * @return string
                 */
                return $this->strSecretariaNacionalReferente;

            case 'Municipalidad':
                /**
                 * Gets the value for blnMunicipalidad 
                 * @return boolean
                 */
                return $this->blnMunicipalidad;

            case 'MunicipalidadReferente':
                /**
                 * Gets the value for strMunicipalidadReferente 
                 * @return string
                 */
                return $this->strMunicipalidadReferente;

            case 'OrganizacionBarrial':
                /**
                 * Gets the value for blnOrganizacionBarrial 
                 * @return boolean
                 */
                return $this->blnOrganizacionBarrial;

            case 'OrganizacionBarrialReferente':
                /**
                 * Gets the value for strOrganizacionBarrialReferente 
                 * @return string
                 */
                return $this->strOrganizacionBarrialReferente;

            case 'OtrosOrganismos':
                /**
                 * Gets the value for strOtrosOrganismos 
                 * @return string
                 */
                return $this->strOtrosOrganismos;

            case 'OrdenDesalojo':
                /**
                 * Gets the value for blnOrdenDesalojo 
                 * @return boolean
                 */
                return $this->blnOrdenDesalojo;

            case 'FechaEjecucion':
                /**
                 * Gets the value for strFechaEjecucion 
                 * @return string
                 */
                return $this->strFechaEjecucion;

            case 'SuspensionHecho':
                /**
                 * Gets the value for blnSuspensionHecho 
                 * @return boolean
                 */
                return $this->blnSuspensionHecho;

            case 'SolicitudSuspension':
                /**
                 * Gets the value for blnSolicitudSuspension 
                 * @return boolean
                 */
                return $this->blnSolicitudSuspension;

            case 'FechaSuspension':
                /**
                 * Gets the value for strFechaSuspension 
                 * @return string
                 */
                return $this->strFechaSuspension;

            case 'DuracionSuspension':
                /**
                 * Gets the value for strDuracionSuspension 
                 * @return string
                 */
                return $this->strDuracionSuspension;

            case 'MesaGestion':
                /**
                 * Gets the value for blnMesaGestion 
                 * @return boolean
                 */
                return $this->blnMesaGestion;

            case 'Observaciones':
                /**
                 * Gets the value for strObservaciones 
                 * @return string
                 */
                return $this->strObservaciones;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Folio object referenced by intIdFolio (Unique)
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

				case 'IntervinoArea':
					/**
					 * Sets the value for blnIntervinoArea 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnIntervinoArea = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnIntervinoArea = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FueroInterviniente':
					/**
					 * Sets the value for strFueroInterviniente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFueroInterviniente = QType::Cast($mixValue, QType::String));
                                                return ($this->strFueroInterviniente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'JuzgadoInterviniente':
					/**
					 * Sets the value for strJuzgadoInterviniente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strJuzgadoInterviniente = QType::Cast($mixValue, QType::String));
                                                return ($this->strJuzgadoInterviniente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CaratulaExpediente':
					/**
					 * Sets the value for strCaratulaExpediente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strCaratulaExpediente = QType::Cast($mixValue, QType::String));
                                                return ($this->strCaratulaExpediente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinisterioDesarrollo':
					/**
					 * Sets the value for blnMinisterioDesarrollo 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnMinisterioDesarrollo = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnMinisterioDesarrollo = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinisterioDesarrolloReferente':
					/**
					 * Sets the value for strMinisterioDesarrolloReferente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strMinisterioDesarrolloReferente = QType::Cast($mixValue, QType::String));
                                                return ($this->strMinisterioDesarrolloReferente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DefensorPueblo':
					/**
					 * Sets the value for blnDefensorPueblo 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnDefensorPueblo = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnDefensorPueblo = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DefensorPuebloReferente':
					/**
					 * Sets the value for strDefensorPuebloReferente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDefensorPuebloReferente = QType::Cast($mixValue, QType::String));
                                                return ($this->strDefensorPuebloReferente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SecretariaNacional':
					/**
					 * Sets the value for blnSecretariaNacional 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSecretariaNacional = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSecretariaNacional = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SecretariaNacionalReferente':
					/**
					 * Sets the value for strSecretariaNacionalReferente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strSecretariaNacionalReferente = QType::Cast($mixValue, QType::String));
                                                return ($this->strSecretariaNacionalReferente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Municipalidad':
					/**
					 * Sets the value for blnMunicipalidad 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnMunicipalidad = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnMunicipalidad = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MunicipalidadReferente':
					/**
					 * Sets the value for strMunicipalidadReferente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strMunicipalidadReferente = QType::Cast($mixValue, QType::String));
                                                return ($this->strMunicipalidadReferente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrganizacionBarrial':
					/**
					 * Sets the value for blnOrganizacionBarrial 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnOrganizacionBarrial = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnOrganizacionBarrial = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrganizacionBarrialReferente':
					/**
					 * Sets the value for strOrganizacionBarrialReferente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOrganizacionBarrialReferente = QType::Cast($mixValue, QType::String));
                                                return ($this->strOrganizacionBarrialReferente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OtrosOrganismos':
					/**
					 * Sets the value for strOtrosOrganismos 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOtrosOrganismos = QType::Cast($mixValue, QType::String));
                                                return ($this->strOtrosOrganismos = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrdenDesalojo':
					/**
					 * Sets the value for blnOrdenDesalojo 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnOrdenDesalojo = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnOrdenDesalojo = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEjecucion':
					/**
					 * Sets the value for strFechaEjecucion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFechaEjecucion = QType::Cast($mixValue, QType::String));
                                                return ($this->strFechaEjecucion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SuspensionHecho':
					/**
					 * Sets the value for blnSuspensionHecho 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSuspensionHecho = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSuspensionHecho = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SolicitudSuspension':
					/**
					 * Sets the value for blnSolicitudSuspension 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnSolicitudSuspension = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnSolicitudSuspension = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSuspension':
					/**
					 * Sets the value for strFechaSuspension 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFechaSuspension = QType::Cast($mixValue, QType::String));
                                                return ($this->strFechaSuspension = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DuracionSuspension':
					/**
					 * Sets the value for strDuracionSuspension 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDuracionSuspension = QType::Cast($mixValue, QType::String));
                                                return ($this->strDuracionSuspension = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MesaGestion':
					/**
					 * Sets the value for blnMesaGestion 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnMesaGestion = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnMesaGestion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observaciones':
					/**
					 * Sets the value for strObservaciones 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strObservaciones = QType::Cast($mixValue, QType::String));
                                                return ($this->strObservaciones = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Folio object referenced by intIdFolio (Unique)
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this ConflictoHabitacional');

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
			$strToReturn = '<complexType name="ConflictoHabitacional"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="IntervinoArea" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FueroInterviniente" type="xsd:string"/>';
			$strToReturn .= '<element name="JuzgadoInterviniente" type="xsd:string"/>';
			$strToReturn .= '<element name="CaratulaExpediente" type="xsd:string"/>';
			$strToReturn .= '<element name="MinisterioDesarrollo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="MinisterioDesarrolloReferente" type="xsd:string"/>';
			$strToReturn .= '<element name="DefensorPueblo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DefensorPuebloReferente" type="xsd:string"/>';
			$strToReturn .= '<element name="SecretariaNacional" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SecretariaNacionalReferente" type="xsd:string"/>';
			$strToReturn .= '<element name="Municipalidad" type="xsd:boolean"/>';
			$strToReturn .= '<element name="MunicipalidadReferente" type="xsd:string"/>';
			$strToReturn .= '<element name="OrganizacionBarrial" type="xsd:boolean"/>';
			$strToReturn .= '<element name="OrganizacionBarrialReferente" type="xsd:string"/>';
			$strToReturn .= '<element name="OtrosOrganismos" type="xsd:string"/>';
			$strToReturn .= '<element name="OrdenDesalojo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FechaEjecucion" type="xsd:string"/>';
			$strToReturn .= '<element name="SuspensionHecho" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SolicitudSuspension" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FechaSuspension" type="xsd:string"/>';
			$strToReturn .= '<element name="DuracionSuspension" type="xsd:string"/>';
			$strToReturn .= '<element name="MesaGestion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Observaciones" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ConflictoHabitacional', $strComplexTypeArray)) {
				$strComplexTypeArray['ConflictoHabitacional'] = ConflictoHabitacional::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ConflictoHabitacional::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ConflictoHabitacional();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Folio::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'IntervinoArea')) {
				$objToReturn->blnIntervinoArea = $objSoapObject->IntervinoArea;
            }
			if (property_exists($objSoapObject, 'FueroInterviniente')) {
				$objToReturn->strFueroInterviniente = $objSoapObject->FueroInterviniente;
            }
			if (property_exists($objSoapObject, 'JuzgadoInterviniente')) {
				$objToReturn->strJuzgadoInterviniente = $objSoapObject->JuzgadoInterviniente;
            }
			if (property_exists($objSoapObject, 'CaratulaExpediente')) {
				$objToReturn->strCaratulaExpediente = $objSoapObject->CaratulaExpediente;
            }
			if (property_exists($objSoapObject, 'MinisterioDesarrollo')) {
				$objToReturn->blnMinisterioDesarrollo = $objSoapObject->MinisterioDesarrollo;
            }
			if (property_exists($objSoapObject, 'MinisterioDesarrolloReferente')) {
				$objToReturn->strMinisterioDesarrolloReferente = $objSoapObject->MinisterioDesarrolloReferente;
            }
			if (property_exists($objSoapObject, 'DefensorPueblo')) {
				$objToReturn->blnDefensorPueblo = $objSoapObject->DefensorPueblo;
            }
			if (property_exists($objSoapObject, 'DefensorPuebloReferente')) {
				$objToReturn->strDefensorPuebloReferente = $objSoapObject->DefensorPuebloReferente;
            }
			if (property_exists($objSoapObject, 'SecretariaNacional')) {
				$objToReturn->blnSecretariaNacional = $objSoapObject->SecretariaNacional;
            }
			if (property_exists($objSoapObject, 'SecretariaNacionalReferente')) {
				$objToReturn->strSecretariaNacionalReferente = $objSoapObject->SecretariaNacionalReferente;
            }
			if (property_exists($objSoapObject, 'Municipalidad')) {
				$objToReturn->blnMunicipalidad = $objSoapObject->Municipalidad;
            }
			if (property_exists($objSoapObject, 'MunicipalidadReferente')) {
				$objToReturn->strMunicipalidadReferente = $objSoapObject->MunicipalidadReferente;
            }
			if (property_exists($objSoapObject, 'OrganizacionBarrial')) {
				$objToReturn->blnOrganizacionBarrial = $objSoapObject->OrganizacionBarrial;
            }
			if (property_exists($objSoapObject, 'OrganizacionBarrialReferente')) {
				$objToReturn->strOrganizacionBarrialReferente = $objSoapObject->OrganizacionBarrialReferente;
            }
			if (property_exists($objSoapObject, 'OtrosOrganismos')) {
				$objToReturn->strOtrosOrganismos = $objSoapObject->OtrosOrganismos;
            }
			if (property_exists($objSoapObject, 'OrdenDesalojo')) {
				$objToReturn->blnOrdenDesalojo = $objSoapObject->OrdenDesalojo;
            }
			if (property_exists($objSoapObject, 'FechaEjecucion')) {
				$objToReturn->strFechaEjecucion = $objSoapObject->FechaEjecucion;
            }
			if (property_exists($objSoapObject, 'SuspensionHecho')) {
				$objToReturn->blnSuspensionHecho = $objSoapObject->SuspensionHecho;
            }
			if (property_exists($objSoapObject, 'SolicitudSuspension')) {
				$objToReturn->blnSolicitudSuspension = $objSoapObject->SolicitudSuspension;
            }
			if (property_exists($objSoapObject, 'FechaSuspension')) {
				$objToReturn->strFechaSuspension = $objSoapObject->FechaSuspension;
            }
			if (property_exists($objSoapObject, 'DuracionSuspension')) {
				$objToReturn->strDuracionSuspension = $objSoapObject->DuracionSuspension;
            }
			if (property_exists($objSoapObject, 'MesaGestion')) {
				$objToReturn->blnMesaGestion = $objSoapObject->MesaGestion;
            }
			if (property_exists($objSoapObject, 'Observaciones')) {
				$objToReturn->strObservaciones = $objSoapObject->Observaciones;
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
				array_push($objArrayToReturn, ConflictoHabitacional::GetSoapObjectFromObject($objObject, true));

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