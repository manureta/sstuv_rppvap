<?php
/**
 * The abstract FolioGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Folio subclass which
 * extends this FolioGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Folio class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $CodFolio the value for strCodFolio (Unique)
	 * @property integer $IdPartido the value for intIdPartido (Not Null)
	 * @property integer $IdLocalidad the value for intIdLocalidad 
	 * @property string $Matricula the value for strMatricula (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha 
	 * @property string $Encargado the value for strEncargado 
	 * @property string $NombreBarrioOficial the value for strNombreBarrioOficial 
	 * @property string $NombreBarrioAlternativo1 the value for strNombreBarrioAlternativo1 
	 * @property string $NombreBarrioAlternativo2 the value for strNombreBarrioAlternativo2 
	 * @property string $AnioOrigen the value for strAnioOrigen 
	 * @property string $Superficie the value for strSuperficie 
	 * @property integer $CantidadFamilias the value for intCantidadFamilias 
	 * @property integer $TipoBarrio the value for intTipoBarrio 
	 * @property string $ObservacionCasoDudoso the value for strObservacionCasoDudoso 
	 * @property string $Direccion the value for strDireccion 
	 * @property string $NumExpedientes the value for strNumExpedientes 
	 * @property string $Geom the value for strGeom 
	 * @property string $Judicializado the value for strJudicializado 
	 * @property Partido $IdPartidoObject the value for the Partido object referenced by intIdPartido (Not Null)
	 * @property Localidad $IdLocalidadObject the value for the Localidad object referenced by intIdLocalidad 
	 * @property TipoBarrio $TipoBarrioObject the value for the TipoBarrio object referenced by intTipoBarrio 
	 * @property CondicionesSocioUrbanisticas $CondicionesSocioUrbanisticasAsId the value for the CondicionesSocioUrbanisticas object that uniquely references this Folio
	 * @property Regularizacion $RegularizacionAsId the value for the Regularizacion object that uniquely references this Folio
	 * @property UsoInterno $UsoInterno the value for the UsoInterno object that uniquely references this Folio
	 * @property-read Nomenclatura $NomenclaturaAsId the value for the private _objNomenclaturaAsId (Read-Only) if set due to an expansion on the nomenclatura.id_folio reverse relationship
	 * @property-read Nomenclatura[] $NomenclaturaAsIdArray the value for the private _objNomenclaturaAsIdArray (Read-Only) if set due to an ExpandAsArray on the nomenclatura.id_folio reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class FolioGen extends QBaseClass {

    public static function Noun() {
        return 'Folio';
    }
    public static function NounPlural() {
        return 'Folios';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column folio.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'folio_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column folio.cod_folio
     * @var string strCodFolio
     */
    protected $strCodFolio;
    const CodFolioMaxLength = 7;
    const CodFolioDefault = null;


    /**
     * Protected member variable that maps to the database column folio.id_partido
     * @var integer intIdPartido
     */
    protected $intIdPartido;
    const IdPartidoDefault = null;


    /**
     * Protected member variable that maps to the database column folio.id_localidad
     * @var integer intIdLocalidad
     */
    protected $intIdLocalidad;
    const IdLocalidadDefault = null;


    /**
     * Protected member variable that maps to the database column folio.matricula
     * @var string strMatricula
     */
    protected $strMatricula;
    const MatriculaMaxLength = 4;
    const MatriculaDefault = null;


    /**
     * Protected member variable that maps to the database column folio.fecha
     * @var QDateTime dttFecha
     */
    protected $dttFecha;
    const FechaDefault = null;


    /**
     * Protected member variable that maps to the database column folio.encargado
     * @var string strEncargado
     */
    protected $strEncargado;
    const EncargadoMaxLength = 45;
    const EncargadoDefault = null;


    /**
     * Protected member variable that maps to the database column folio.nombre_barrio_oficial
     * @var string strNombreBarrioOficial
     */
    protected $strNombreBarrioOficial;
    const NombreBarrioOficialMaxLength = 45;
    const NombreBarrioOficialDefault = null;


    /**
     * Protected member variable that maps to the database column folio.nombre_barrio_alternativo_1
     * @var string strNombreBarrioAlternativo1
     */
    protected $strNombreBarrioAlternativo1;
    const NombreBarrioAlternativo1MaxLength = 45;
    const NombreBarrioAlternativo1Default = null;


    /**
     * Protected member variable that maps to the database column folio.nombre_barrio_alternativo_2
     * @var string strNombreBarrioAlternativo2
     */
    protected $strNombreBarrioAlternativo2;
    const NombreBarrioAlternativo2MaxLength = 45;
    const NombreBarrioAlternativo2Default = null;


    /**
     * Protected member variable that maps to the database column folio.anio_origen
     * @var string strAnioOrigen
     */
    protected $strAnioOrigen;
    const AnioOrigenMaxLength = 45;
    const AnioOrigenDefault = null;


    /**
     * Protected member variable that maps to the database column folio.superficie
     * @var string strSuperficie
     */
    protected $strSuperficie;
    const SuperficieMaxLength = 45;
    const SuperficieDefault = null;


    /**
     * Protected member variable that maps to the database column folio.cantidad_familias
     * @var integer intCantidadFamilias
     */
    protected $intCantidadFamilias;
    const CantidadFamiliasDefault = null;


    /**
     * Protected member variable that maps to the database column folio.tipo_barrio
     * @var integer intTipoBarrio
     */
    protected $intTipoBarrio;
    const TipoBarrioDefault = null;


    /**
     * Protected member variable that maps to the database column folio.observacion_caso_dudoso
     * @var string strObservacionCasoDudoso
     */
    protected $strObservacionCasoDudoso;
    const ObservacionCasoDudosoMaxLength = 255;
    const ObservacionCasoDudosoDefault = null;


    /**
     * Protected member variable that maps to the database column folio.direccion
     * @var string strDireccion
     */
    protected $strDireccion;
    const DireccionMaxLength = 45;
    const DireccionDefault = null;


    /**
     * Protected member variable that maps to the database column folio.num_expedientes
     * @var string strNumExpedientes
     */
    protected $strNumExpedientes;
    const NumExpedientesMaxLength = 45;
    const NumExpedientesDefault = null;


    /**
     * Protected member variable that maps to the database column folio.geom
     * @var string strGeom
     */
    protected $strGeom;
    const GeomDefault = null;


    /**
     * Protected member variable that maps to the database column folio.judicializado
     * @var string strJudicializado
     */
    protected $strJudicializado;
    const JudicializadoDefault = null;


    /**
     * Private member variable that stores a reference to a single NomenclaturaAsId object
     * (of type Nomenclatura), if this Folio object was restored with
     * an expansion on the nomenclatura association table.
     * @var Nomenclatura _objNomenclaturaAsId;
     */
    protected $objNomenclaturaAsId;

    /**
     * Private member variable that stores a reference to an array of NomenclaturaAsId objects
     * (of type Nomenclatura[]), if this Folio object was restored with
     * an ExpandAsArray on the nomenclatura association table.
     * @var Nomenclatura[] _objNomenclaturaAsIdArray;
     */
    protected $objNomenclaturaAsIdArray;

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
		 * in the database column folio.id_partido.
		 *
		 * NOTE: Always use the IdPartidoObject property getter to correctly retrieve this Partido object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Partido objIdPartidoObject
		 */
		protected $objIdPartidoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column folio.id_localidad.
		 *
		 * NOTE: Always use the IdLocalidadObject property getter to correctly retrieve this Localidad object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Localidad objIdLocalidadObject
		 */
		protected $objIdLocalidadObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column folio.tipo_barrio.
		 *
		 * NOTE: Always use the TipoBarrioObject property getter to correctly retrieve this TipoBarrio object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TipoBarrio objTipoBarrioObject
		 */
		protected $objTipoBarrioObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column condiciones_socio_urbanisticas.id_folio.
		 *
		 * NOTE: Always use the CondicionesSocioUrbanisticasAsId property getter to correctly retrieve this CondicionesSocioUrbanisticas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CondicionesSocioUrbanisticas objCondicionesSocioUrbanisticasAsId
		 */
		protected $objCondicionesSocioUrbanisticasAsId;
		
		/**
		 * Used internally to manage whether the adjoined CondicionesSocioUrbanisticasAsId object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyCondicionesSocioUrbanisticasAsId;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column regularizacion.id_folio.
		 *
		 * NOTE: Always use the RegularizacionAsId property getter to correctly retrieve this Regularizacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Regularizacion objRegularizacionAsId
		 */
		protected $objRegularizacionAsId;
		
		/**
		 * Used internally to manage whether the adjoined RegularizacionAsId object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyRegularizacionAsId;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column uso_interno.id_folio.
		 *
		 * NOTE: Always use the UsoInterno property getter to correctly retrieve this UsoInterno object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UsoInterno objUsoInterno
		 */
		protected $objUsoInterno;
		
		/**
		 * Used internally to manage whether the adjoined UsoInterno object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyUsoInterno;



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
                protected static $_objFolioArray = array();


		/**
		 * Load a Folio from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Folio
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Folio::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Folio()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objFolioArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpFolio = Folio::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Folio()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objFolioArray["$intId"] = $objTmpFolio;
            }
                        }
                        return isset(self::$_objFolioArray["$intId"])?self::$_objFolioArray["$intId"]:null;
		}

		/**
		 * Load all Folios
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Folio::QueryArray to perform the LoadAll query
			try {
				return Folio::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Folios
		 * @return int
		 */
		public static function CountAll() {
			// Call Folio::QueryCount to perform the CountAll query
			return Folio::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
        array("name"=>"CodFolio","type"=>"string"),
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Folio::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Folio()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Folio()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Folio no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Folio::GetDatabase();

			// Create/Build out the QueryBuilder object with Folio-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'folio');
			Folio::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('folio');

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
		 * Static Qcubed Query method to query for a single Folio object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Folio the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Folio::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Folio object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Folio::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Folio::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Folio objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Folio[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Folio::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Folio::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Folio objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Folio::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Folio::GetDatabase();

			$strQuery = Folio::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/folio', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Folio::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Folio
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'folio';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'cod_folio', $strAliasPrefix . 'cod_folio');
			$objBuilder->AddSelectItem($strTableName, 'id_partido', $strAliasPrefix . 'id_partido');
			$objBuilder->AddSelectItem($strTableName, 'id_localidad', $strAliasPrefix . 'id_localidad');
			$objBuilder->AddSelectItem($strTableName, 'matricula', $strAliasPrefix . 'matricula');
			$objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			$objBuilder->AddSelectItem($strTableName, 'encargado', $strAliasPrefix . 'encargado');
			$objBuilder->AddSelectItem($strTableName, 'nombre_barrio_oficial', $strAliasPrefix . 'nombre_barrio_oficial');
			$objBuilder->AddSelectItem($strTableName, 'nombre_barrio_alternativo_1', $strAliasPrefix . 'nombre_barrio_alternativo_1');
			$objBuilder->AddSelectItem($strTableName, 'nombre_barrio_alternativo_2', $strAliasPrefix . 'nombre_barrio_alternativo_2');
			$objBuilder->AddSelectItem($strTableName, 'anio_origen', $strAliasPrefix . 'anio_origen');
			$objBuilder->AddSelectItem($strTableName, 'superficie', $strAliasPrefix . 'superficie');
			$objBuilder->AddSelectItem($strTableName, 'cantidad_familias', $strAliasPrefix . 'cantidad_familias');
			$objBuilder->AddSelectItem($strTableName, 'tipo_barrio', $strAliasPrefix . 'tipo_barrio');
			$objBuilder->AddSelectItem($strTableName, 'observacion_caso_dudoso', $strAliasPrefix . 'observacion_caso_dudoso');
			$objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			$objBuilder->AddSelectItem($strTableName, 'num_expedientes', $strAliasPrefix . 'num_expedientes');
			$objBuilder->AddSelectItem($strTableName, 'geom', $strAliasPrefix . 'geom');
			$objBuilder->AddSelectItem($strTableName, 'judicializado', $strAliasPrefix . 'judicializado');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Folio from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Folio::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Folio
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'folio__';


						// Expanding reverse references: NomenclaturaAsId
						$strAlias = $strAliasPrefix . 'nomenclaturaasid__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objNomenclaturaAsIdArray)) {
								$objPreviousChildItems = $objPreviousItem->objNomenclaturaAsIdArray;
								$objChildItem = Nomenclatura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nomenclaturaasid__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objNomenclaturaAsIdArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objNomenclaturaAsIdArray[] = Nomenclatura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nomenclaturaasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'folio__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Folio object
			$objToReturn = new Folio();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'cod_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cod_folio'] : $strAliasPrefix . 'cod_folio';
			$objToReturn->strCodFolio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_partido', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_partido'] : $strAliasPrefix . 'id_partido';
			$objToReturn->intIdPartido = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_localidad', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_localidad'] : $strAliasPrefix . 'id_localidad';
			$objToReturn->intIdLocalidad = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'matricula', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'matricula'] : $strAliasPrefix . 'matricula';
			$objToReturn->strMatricula = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha'] : $strAliasPrefix . 'fecha';
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'encargado', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'encargado'] : $strAliasPrefix . 'encargado';
			$objToReturn->strEncargado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre_barrio_oficial', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre_barrio_oficial'] : $strAliasPrefix . 'nombre_barrio_oficial';
			$objToReturn->strNombreBarrioOficial = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre_barrio_alternativo_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre_barrio_alternativo_1'] : $strAliasPrefix . 'nombre_barrio_alternativo_1';
			$objToReturn->strNombreBarrioAlternativo1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre_barrio_alternativo_2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre_barrio_alternativo_2'] : $strAliasPrefix . 'nombre_barrio_alternativo_2';
			$objToReturn->strNombreBarrioAlternativo2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'anio_origen', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'anio_origen'] : $strAliasPrefix . 'anio_origen';
			$objToReturn->strAnioOrigen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'superficie', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'superficie'] : $strAliasPrefix . 'superficie';
			$objToReturn->strSuperficie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'cantidad_familias', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cantidad_familias'] : $strAliasPrefix . 'cantidad_familias';
			$objToReturn->intCantidadFamilias = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'tipo_barrio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tipo_barrio'] : $strAliasPrefix . 'tipo_barrio';
			$objToReturn->intTipoBarrio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'observacion_caso_dudoso', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'observacion_caso_dudoso'] : $strAliasPrefix . 'observacion_caso_dudoso';
			$objToReturn->strObservacionCasoDudoso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'direccion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'direccion'] : $strAliasPrefix . 'direccion';
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'num_expedientes', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'num_expedientes'] : $strAliasPrefix . 'num_expedientes';
			$objToReturn->strNumExpedientes = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'geom', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'geom'] : $strAliasPrefix . 'geom';
			$objToReturn->strGeom = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'judicializado', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'judicializado'] : $strAliasPrefix . 'judicializado';
			$objToReturn->strJudicializado = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objCondicionesSocioUrbanisticasAsIdArray, $objToReturn->objCondicionesSocioUrbanisticasAsIdArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objNomenclaturaAsIdArray, $objToReturn->objNomenclaturaAsIdArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objRegularizacionAsIdArray, $objToReturn->objRegularizacionAsIdArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objUsoInternoArray, $objToReturn->objUsoInternoArray) != null) {
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
				$strAliasPrefix = 'folio__';

			// Check for IdPartidoObject Early Binding
			$strAlias = $strAliasPrefix . 'id_partido__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdPartidoObject = Partido::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_partido__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IdLocalidadObject Early Binding
			$strAlias = $strAliasPrefix . 'id_localidad__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdLocalidadObject = Localidad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_localidad__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for TipoBarrioObject Early Binding
			$strAlias = $strAliasPrefix . 'tipo_barrio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTipoBarrioObject = TipoBarrio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tipo_barrio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for CondicionesSocioUrbanisticasAsId Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'condicionessociourbanisticasasid__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objCondicionesSocioUrbanisticasAsId = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'condicionessociourbanisticasasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objCondicionesSocioUrbanisticasAsId = false;
			}

			// Check for RegularizacionAsId Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'regularizacionasid__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objRegularizacionAsId = Regularizacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'regularizacionasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objRegularizacionAsId = false;
			}

			// Check for UsoInterno Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'usointerno__id_folio';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objUsoInterno = UsoInterno::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usointerno__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objUsoInterno = false;
			}



			// Check for NomenclaturaAsId Virtual Binding
			$strAlias = $strAliasPrefix . 'nomenclaturaasid__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objNomenclaturaAsIdArray[] = Nomenclatura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nomenclaturaasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objNomenclaturaAsId = Nomenclatura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nomenclaturaasid__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Folios from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Folio[]
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
					$objItem = Folio::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Folio::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Folio object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Folio::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Folio()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Folio object,
		 * by CodFolio Index(es)
		 * @param string $strCodFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio
		*/
		public static function LoadByCodFolio($strCodFolio, $objOptionalClauses = null) {
			return Folio::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Folio()->CodFolio, $strCodFolio)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Folio objects,
		 * by IdLocalidad Index(es)
		 * @param integer $intIdLocalidad
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio[]
		*/
		public static function LoadArrayByIdLocalidad($intIdLocalidad, $objOptionalClauses = null) {
			// Call Folio::QueryArray to perform the LoadArrayByIdLocalidad query
			try {
				return Folio::QueryArray(
					QQ::Equal(QQN::Folio()->IdLocalidad, $intIdLocalidad),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Folios
		 * by IdLocalidad Index(es)
		 * @param integer $intIdLocalidad
		 * @return int
		*/
		public static function CountByIdLocalidad($intIdLocalidad) {
			// Call Folio::QueryCount to perform the CountByIdLocalidad query
			return Folio::QueryCount(
				QQ::Equal(QQN::Folio()->IdLocalidad, $intIdLocalidad)
			);
		}
			
		/**
		 * Load an array of Folio objects,
		 * by IdPartido Index(es)
		 * @param integer $intIdPartido
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio[]
		*/
		public static function LoadArrayByIdPartido($intIdPartido, $objOptionalClauses = null) {
			// Call Folio::QueryArray to perform the LoadArrayByIdPartido query
			try {
				return Folio::QueryArray(
					QQ::Equal(QQN::Folio()->IdPartido, $intIdPartido),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Folios
		 * by IdPartido Index(es)
		 * @param integer $intIdPartido
		 * @return int
		*/
		public static function CountByIdPartido($intIdPartido) {
			// Call Folio::QueryCount to perform the CountByIdPartido query
			return Folio::QueryCount(
				QQ::Equal(QQN::Folio()->IdPartido, $intIdPartido)
			);
		}
			
		/**
		 * Load an array of Folio objects,
		 * by TipoBarrio Index(es)
		 * @param integer $intTipoBarrio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Folio[]
		*/
		public static function LoadArrayByTipoBarrio($intTipoBarrio, $objOptionalClauses = null) {
			// Call Folio::QueryArray to perform the LoadArrayByTipoBarrio query
			try {
				return Folio::QueryArray(
					QQ::Equal(QQN::Folio()->TipoBarrio, $intTipoBarrio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Folios
		 * by TipoBarrio Index(es)
		 * @param integer $intTipoBarrio
		 * @return int
		*/
		public static function CountByTipoBarrio($intTipoBarrio) {
			// Call Folio::QueryCount to perform the CountByTipoBarrio query
			return Folio::QueryCount(
				QQ::Equal(QQN::Folio()->TipoBarrio, $intTipoBarrio)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Folio
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Folio::GetDatabase();

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
            // ver si objIdLocalidadObject esta Guardado
            if(is_null($this->intIdLocalidad)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->IdLocalidadObject))
                try{
                    if(!is_null($this->IdLocalidadObject->IdLocalidad))
                        $this->intIdLocalidad = $this->IdLocalidadObject->IdLocalidad;
                    else
                        $this->intIdLocalidad = $this->IdLocalidadObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objTipoBarrioObject esta Guardado
            if(is_null($this->intTipoBarrio)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->TipoBarrioObject))
                try{
                    if(!is_null($this->TipoBarrioObject->TipoBarrio))
                        $this->intTipoBarrio = $this->TipoBarrioObject->TipoBarrio;
                    else
                        $this->intTipoBarrio = $this->TipoBarrioObject->Save();
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
                    if ($this->intIdLocalidad && ($this->intIdLocalidad > QDatabaseNumberFieldMax::Integer || $this->intIdLocalidad < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intIdLocalidad', QDatabaseFieldType::Integer);
                    }
                    if ($this->intCantidadFamilias && ($this->intCantidadFamilias > QDatabaseNumberFieldMax::Integer || $this->intCantidadFamilias < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intCantidadFamilias', QDatabaseFieldType::Integer);
                    }
                    if ($this->intTipoBarrio && ($this->intTipoBarrio > QDatabaseNumberFieldMax::Integer || $this->intTipoBarrio < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intTipoBarrio', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "folio" (
                            "cod_folio",
                            "id_partido",
                            "id_localidad",
                            "matricula",
                            "fecha",
                            "encargado",
                            "nombre_barrio_oficial",
                            "nombre_barrio_alternativo_1",
                            "nombre_barrio_alternativo_2",
                            "anio_origen",
                            "superficie",
                            "cantidad_familias",
                            "tipo_barrio",
                            "observacion_caso_dudoso",
                            "direccion",
                            "num_expedientes",
                            "geom",
                            "judicializado"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strCodFolio) . ',
                            ' . $objDatabase->SqlVariable($this->intIdPartido) . ',
                            ' . $objDatabase->SqlVariable($this->intIdLocalidad) . ',
                            ' . $objDatabase->SqlVariable($this->strMatricula) . ',
                            ' . $objDatabase->SqlVariable($this->dttFecha) . ',
                            ' . $objDatabase->SqlVariable($this->strEncargado) . ',
                            ' . $objDatabase->SqlVariable($this->strNombreBarrioOficial) . ',
                            ' . $objDatabase->SqlVariable($this->strNombreBarrioAlternativo1) . ',
                            ' . $objDatabase->SqlVariable($this->strNombreBarrioAlternativo2) . ',
                            ' . $objDatabase->SqlVariable($this->strAnioOrigen) . ',
                            ' . $objDatabase->SqlVariable($this->strSuperficie) . ',
                            ' . $objDatabase->SqlVariable($this->intCantidadFamilias) . ',
                            ' . $objDatabase->SqlVariable($this->intTipoBarrio) . ',
                            ' . $objDatabase->SqlVariable($this->strObservacionCasoDudoso) . ',
                            ' . $objDatabase->SqlVariable($this->strDireccion) . ',
                            ' . $objDatabase->SqlVariable($this->strNumExpedientes) . ',
                            ' . $objDatabase->SqlVariable($this->strGeom) . ',
                            ' . $objDatabase->SqlVariable($this->strJudicializado) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('folio', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "folio"
                        SET
                            "cod_folio" = ' . $objDatabase->SqlVariable($this->strCodFolio) . ',
                            "id_partido" = ' . $objDatabase->SqlVariable($this->intIdPartido) . ',
                            "id_localidad" = ' . $objDatabase->SqlVariable($this->intIdLocalidad) . ',
                            "matricula" = ' . $objDatabase->SqlVariable($this->strMatricula) . ',
                            "fecha" = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
                            "encargado" = ' . $objDatabase->SqlVariable($this->strEncargado) . ',
                            "nombre_barrio_oficial" = ' . $objDatabase->SqlVariable($this->strNombreBarrioOficial) . ',
                            "nombre_barrio_alternativo_1" = ' . $objDatabase->SqlVariable($this->strNombreBarrioAlternativo1) . ',
                            "nombre_barrio_alternativo_2" = ' . $objDatabase->SqlVariable($this->strNombreBarrioAlternativo2) . ',
                            "anio_origen" = ' . $objDatabase->SqlVariable($this->strAnioOrigen) . ',
                            "superficie" = ' . $objDatabase->SqlVariable($this->strSuperficie) . ',
                            "cantidad_familias" = ' . $objDatabase->SqlVariable($this->intCantidadFamilias) . ',
                            "tipo_barrio" = ' . $objDatabase->SqlVariable($this->intTipoBarrio) . ',
                            "observacion_caso_dudoso" = ' . $objDatabase->SqlVariable($this->strObservacionCasoDudoso) . ',
                            "direccion" = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
                            "num_expedientes" = ' . $objDatabase->SqlVariable($this->strNumExpedientes) . ',
                            "geom" = ' . $objDatabase->SqlVariable($this->strGeom) . ',
                            "judicializado" = ' . $objDatabase->SqlVariable($this->strJudicializado) . '
                        WHERE
                            "id" = ' . $objDatabase->SqlVariable($this->intId) . '
                    ');
                }

        
        
                // Update the adjoined CondicionesSocioUrbanisticasAsId object (if applicable)
                // TODO: Make this into hard-coded SQL queries
                if ($this->blnDirtyCondicionesSocioUrbanisticasAsId) {
                    // Unassociate the old one (if applicable)
                    if ($objAssociated = CondicionesSocioUrbanisticas::LoadByIdFolio($this->intId)) {
                        $objAssociated->IdFolio = null;
                        $objAssociated->Save();
                    }

                    // Associate the new one (if applicable)
                    if ($this->objCondicionesSocioUrbanisticasAsId) {
                        $this->objCondicionesSocioUrbanisticasAsId->IdFolio = $this->intId;
                        $this->objCondicionesSocioUrbanisticasAsId->Save();
                    }

                    // Reset the "Dirty" flag
                    $this->blnDirtyCondicionesSocioUrbanisticasAsId = false;
                }
        
        
                // Update the adjoined RegularizacionAsId object (if applicable)
                // TODO: Make this into hard-coded SQL queries
                if ($this->blnDirtyRegularizacionAsId) {
                    // Unassociate the old one (if applicable)
                    if ($objAssociated = Regularizacion::LoadByIdFolio($this->intId)) {
                        $objAssociated->IdFolio = null;
                        $objAssociated->Save();
                    }

                    // Associate the new one (if applicable)
                    if ($this->objRegularizacionAsId) {
                        $this->objRegularizacionAsId->IdFolio = $this->intId;
                        $this->objRegularizacionAsId->Save();
                    }

                    // Reset the "Dirty" flag
                    $this->blnDirtyRegularizacionAsId = false;
                }
        
        
                // Update the adjoined UsoInterno object (if applicable)
                // TODO: Make this into hard-coded SQL queries
                if ($this->blnDirtyUsoInterno) {
                    // Unassociate the old one (if applicable)
                    if ($objAssociated = UsoInterno::LoadByIdFolio($this->intId)) {
                        $objAssociated->IdFolio = null;
                        $objAssociated->Save();
                    }

                    // Associate the new one (if applicable)
                    if ($this->objUsoInterno) {
                        $this->objUsoInterno->IdFolio = $this->intId;
                        $this->objUsoInterno->Save();
                    }

                    // Reset the "Dirty" flag
                    $this->blnDirtyUsoInterno = false;
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
		 * Delete this Folio
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Folio with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			
			
			// Update the adjoined CondicionesSocioUrbanisticasAsId object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = CondicionesSocioUrbanisticas::LoadByIdFolio($this->intId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined RegularizacionAsId object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Regularizacion::LoadByIdFolio($this->intId)) {
				$objAssociated->IdFolio = null;
				$objAssociated->Save();
			}
			
			
			// Update the adjoined UsoInterno object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = UsoInterno::LoadByIdFolio($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"folio"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Folios
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"folio"');
		}

		/**
		 * Truncate folio table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "folio" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Folio from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Folio object.');

			// Reload the Object
			$objReloaded = Folio::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->strCodFolio = $objReloaded->strCodFolio;
			$this->IdPartido = $objReloaded->IdPartido;
			$this->IdLocalidad = $objReloaded->IdLocalidad;
			$this->strMatricula = $objReloaded->strMatricula;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strEncargado = $objReloaded->strEncargado;
			$this->strNombreBarrioOficial = $objReloaded->strNombreBarrioOficial;
			$this->strNombreBarrioAlternativo1 = $objReloaded->strNombreBarrioAlternativo1;
			$this->strNombreBarrioAlternativo2 = $objReloaded->strNombreBarrioAlternativo2;
			$this->strAnioOrigen = $objReloaded->strAnioOrigen;
			$this->strSuperficie = $objReloaded->strSuperficie;
			$this->intCantidadFamilias = $objReloaded->intCantidadFamilias;
			$this->TipoBarrio = $objReloaded->TipoBarrio;
			$this->strObservacionCasoDudoso = $objReloaded->strObservacionCasoDudoso;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strNumExpedientes = $objReloaded->strNumExpedientes;
			$this->strGeom = $objReloaded->strGeom;
			$this->strJudicializado = $objReloaded->strJudicializado;
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

            case 'CodFolio':
                /**
                 * Gets the value for strCodFolio (Unique)
                 * @return string
                 */
                return $this->strCodFolio;

            case 'IdPartido':
                /**
                 * Gets the value for intIdPartido (Not Null)
                 * @return integer
                 */
                return $this->intIdPartido;

            case 'IdLocalidad':
                /**
                 * Gets the value for intIdLocalidad 
                 * @return integer
                 */
                return $this->intIdLocalidad;

            case 'Matricula':
                /**
                 * Gets the value for strMatricula (Not Null)
                 * @return string
                 */
                return $this->strMatricula;

            case 'Fecha':
                /**
                 * Gets the value for dttFecha 
                 * @return QDateTime
                 */
                return $this->dttFecha;

            case 'Encargado':
                /**
                 * Gets the value for strEncargado 
                 * @return string
                 */
                return $this->strEncargado;

            case 'NombreBarrioOficial':
                /**
                 * Gets the value for strNombreBarrioOficial 
                 * @return string
                 */
                return $this->strNombreBarrioOficial;

            case 'NombreBarrioAlternativo1':
                /**
                 * Gets the value for strNombreBarrioAlternativo1 
                 * @return string
                 */
                return $this->strNombreBarrioAlternativo1;

            case 'NombreBarrioAlternativo2':
                /**
                 * Gets the value for strNombreBarrioAlternativo2 
                 * @return string
                 */
                return $this->strNombreBarrioAlternativo2;

            case 'AnioOrigen':
                /**
                 * Gets the value for strAnioOrigen 
                 * @return string
                 */
                return $this->strAnioOrigen;

            case 'Superficie':
                /**
                 * Gets the value for strSuperficie 
                 * @return string
                 */
                return $this->strSuperficie;

            case 'CantidadFamilias':
                /**
                 * Gets the value for intCantidadFamilias 
                 * @return integer
                 */
                return $this->intCantidadFamilias;

            case 'TipoBarrio':
                /**
                 * Gets the value for intTipoBarrio 
                 * @return integer
                 */
                return $this->intTipoBarrio;

            case 'ObservacionCasoDudoso':
                /**
                 * Gets the value for strObservacionCasoDudoso 
                 * @return string
                 */
                return $this->strObservacionCasoDudoso;

            case 'Direccion':
                /**
                 * Gets the value for strDireccion 
                 * @return string
                 */
                return $this->strDireccion;

            case 'NumExpedientes':
                /**
                 * Gets the value for strNumExpedientes 
                 * @return string
                 */
                return $this->strNumExpedientes;

            case 'Geom':
                /**
                 * Gets the value for strGeom 
                 * @return string
                 */
                return $this->strGeom;

            case 'Judicializado':
                /**
                 * Gets the value for strJudicializado 
                 * @return string
                 */
                return $this->strJudicializado;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdPartidoObject':
                /**
                 * Gets the value for the Partido object referenced by intIdPartido (Not Null)
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

            case 'IdLocalidadObject':
                /**
                 * Gets the value for the Localidad object referenced by intIdLocalidad 
                 * @return Localidad
                 */
                try {
                    if ((!$this->objIdLocalidadObject) && (!is_null($this->intIdLocalidad)))
                        $this->objIdLocalidadObject = Localidad::Load($this->intIdLocalidad);
                    return $this->objIdLocalidadObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'TipoBarrioObject':
                /**
                 * Gets the value for the TipoBarrio object referenced by intTipoBarrio 
                 * @return TipoBarrio
                 */
                try {
                    if ((!$this->objTipoBarrioObject) && (!is_null($this->intTipoBarrio)))
                        $this->objTipoBarrioObject = TipoBarrio::Load($this->intTipoBarrio);
                    return $this->objTipoBarrioObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

    
    
            case 'CondicionesSocioUrbanisticasAsId':
                /**
                 * Gets the value for the CondicionesSocioUrbanisticas object that uniquely references this Folio
                 * by objCondicionesSocioUrbanisticasAsId (Unique)
                 * @return CondicionesSocioUrbanisticas
                 */
                try {
                    if ($this->objCondicionesSocioUrbanisticasAsId === false)
                        // We've attempted early binding -- and the reverse reference object does not exist
                        return null;
                    if (!$this->objCondicionesSocioUrbanisticasAsId)
                        $this->objCondicionesSocioUrbanisticasAsId = CondicionesSocioUrbanisticas::LoadByIdFolio($this->intId);
                    return $this->objCondicionesSocioUrbanisticasAsId;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

    
    
            case 'RegularizacionAsId':
                /**
                 * Gets the value for the Regularizacion object that uniquely references this Folio
                 * by objRegularizacionAsId (Unique)
                 * @return Regularizacion
                 */
                try {
                    if ($this->objRegularizacionAsId === false)
                        // We've attempted early binding -- and the reverse reference object does not exist
                        return null;
                    if (!$this->objRegularizacionAsId)
                        $this->objRegularizacionAsId = Regularizacion::LoadByIdFolio($this->intId);
                    return $this->objRegularizacionAsId;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

    
    
            case 'UsoInterno':
                /**
                 * Gets the value for the UsoInterno object that uniquely references this Folio
                 * by objUsoInterno (Unique)
                 * @return UsoInterno
                 */
                try {
                    if ($this->objUsoInterno === false)
                        // We've attempted early binding -- and the reverse reference object does not exist
                        return null;
                    if (!$this->objUsoInterno)
                        $this->objUsoInterno = UsoInterno::LoadByIdFolio($this->intId);
                    return $this->objUsoInterno;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }


            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'NomenclaturaAsId':
                /**
                 * Gets the value for the private _objNomenclaturaAsId (Read-Only)
                 * if set due to an expansion on the nomenclatura.id_folio reverse relationship
                 * @return Nomenclatura
                 */
                return $this->objNomenclaturaAsId;

            case 'NomenclaturaAsIdArray':
                /**
                 * Gets the value for the private _objNomenclaturaAsIdArray (Read-Only)
                 * if set due to an ExpandAsArray on the nomenclatura.id_folio reverse relationship
                 * @return Nomenclatura[]
                 */
                if(is_null($this->objNomenclaturaAsIdArray))
                    $this->objNomenclaturaAsIdArray = $this->GetNomenclaturaAsIdArray();
                return (array) $this->objNomenclaturaAsIdArray;


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
				case 'CodFolio':
					/**
					 * Sets the value for strCodFolio (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strCodFolio = QType::Cast($mixValue, QType::String));
                                                return ($this->strCodFolio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdPartido':
					/**
					 * Sets the value for intIdPartido (Not Null)
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

				case 'IdLocalidad':
					/**
					 * Sets the value for intIdLocalidad 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdLocalidadObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intIdLocalidad = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intIdLocalidad = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Matricula':
					/**
					 * Sets the value for strMatricula (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strMatricula = QType::Cast($mixValue, QType::String));
                                                return ($this->strMatricula = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
                                                return ($this->dttFecha = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Encargado':
					/**
					 * Sets the value for strEncargado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strEncargado = QType::Cast($mixValue, QType::String));
                                                return ($this->strEncargado = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreBarrioOficial':
					/**
					 * Sets the value for strNombreBarrioOficial 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombreBarrioOficial = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombreBarrioOficial = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreBarrioAlternativo1':
					/**
					 * Sets the value for strNombreBarrioAlternativo1 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombreBarrioAlternativo1 = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombreBarrioAlternativo1 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreBarrioAlternativo2':
					/**
					 * Sets the value for strNombreBarrioAlternativo2 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombreBarrioAlternativo2 = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombreBarrioAlternativo2 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AnioOrigen':
					/**
					 * Sets the value for strAnioOrigen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strAnioOrigen = QType::Cast($mixValue, QType::String));
                                                return ($this->strAnioOrigen = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Superficie':
					/**
					 * Sets the value for strSuperficie 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strSuperficie = QType::Cast($mixValue, QType::String));
                                                return ($this->strSuperficie = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantidadFamilias':
					/**
					 * Sets the value for intCantidadFamilias 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intCantidadFamilias = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intCantidadFamilias = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoBarrio':
					/**
					 * Sets the value for intTipoBarrio 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTipoBarrioObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intTipoBarrio = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intTipoBarrio = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ObservacionCasoDudoso':
					/**
					 * Sets the value for strObservacionCasoDudoso 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strObservacionCasoDudoso = QType::Cast($mixValue, QType::String));
                                                return ($this->strObservacionCasoDudoso = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Direccion':
					/**
					 * Sets the value for strDireccion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strDireccion = QType::Cast($mixValue, QType::String));
                                                return ($this->strDireccion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumExpedientes':
					/**
					 * Sets the value for strNumExpedientes 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNumExpedientes = QType::Cast($mixValue, QType::String));
                                                return ($this->strNumExpedientes = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Geom':
					/**
					 * Sets the value for strGeom 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strGeom = QType::Cast($mixValue, QType::String));
                                                return ($this->strGeom = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Judicializado':
					/**
					 * Sets the value for strJudicializado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strJudicializado = QType::Cast($mixValue, QType::String));
                                                return ($this->strJudicializado = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdPartidoObject':
					/**
					 * Sets the value for the Partido object referenced by intIdPartido (Not Null)
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
						//	throw new QCallerException('Unable to set an unsaved IdPartidoObject for this Folio');

						// Update Local Member Variables
						$this->objIdPartidoObject = $mixValue;
						$this->intIdPartido = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'IdLocalidadObject':
					/**
					 * Sets the value for the Localidad object referenced by intIdLocalidad 
					 * @param Localidad $mixValue
					 * @return Localidad
					 */
					if (is_null($mixValue)) {
						$this->intIdLocalidad = null;
						$this->objIdLocalidadObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Localidad object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Localidad');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Localidad object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved IdLocalidadObject for this Folio');

						// Update Local Member Variables
						$this->objIdLocalidadObject = $mixValue;
						$this->intIdLocalidad = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TipoBarrioObject':
					/**
					 * Sets the value for the TipoBarrio object referenced by intTipoBarrio 
					 * @param TipoBarrio $mixValue
					 * @return TipoBarrio
					 */
					if (is_null($mixValue)) {
						$this->intTipoBarrio = null;
						$this->objTipoBarrioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TipoBarrio object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'TipoBarrio');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED TipoBarrio object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved TipoBarrioObject for this Folio');

						// Update Local Member Variables
						$this->objTipoBarrioObject = $mixValue;
						$this->intTipoBarrio = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CondicionesSocioUrbanisticasAsId':
					/**
					 * Sets the value for the CondicionesSocioUrbanisticas object referenced by objCondicionesSocioUrbanisticasAsId (Unique)
					 * @param CondicionesSocioUrbanisticas $mixValue
					 * @return CondicionesSocioUrbanisticas
					 */
					if (is_null($mixValue)) {
						$this->objCondicionesSocioUrbanisticasAsId = null;

						// Make sure we update the adjoined CondicionesSocioUrbanisticas object the next time we call Save()
						$this->blnDirtyCondicionesSocioUrbanisticasAsId = true;

						return null;
					} else {
						// Make sure $mixValue actually is a CondicionesSocioUrbanisticas object
						try {
							$mixValue = QType::Cast($mixValue, 'CondicionesSocioUrbanisticas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objCondicionesSocioUrbanisticasAsId to a DIFFERENT $mixValue?
						if ((!$this->CondicionesSocioUrbanisticasAsId) || ($this->CondicionesSocioUrbanisticasAsId->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined CondicionesSocioUrbanisticas object the next time we call Save()
							$this->blnDirtyCondicionesSocioUrbanisticasAsId = true;

							// Update Local Member Variable
							$this->objCondicionesSocioUrbanisticasAsId = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RegularizacionAsId':
					/**
					 * Sets the value for the Regularizacion object referenced by objRegularizacionAsId (Unique)
					 * @param Regularizacion $mixValue
					 * @return Regularizacion
					 */
					if (is_null($mixValue)) {
						$this->objRegularizacionAsId = null;

						// Make sure we update the adjoined Regularizacion object the next time we call Save()
						$this->blnDirtyRegularizacionAsId = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Regularizacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Regularizacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objRegularizacionAsId to a DIFFERENT $mixValue?
						if ((!$this->RegularizacionAsId) || ($this->RegularizacionAsId->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Regularizacion object the next time we call Save()
							$this->blnDirtyRegularizacionAsId = true;

							// Update Local Member Variable
							$this->objRegularizacionAsId = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UsoInterno':
					/**
					 * Sets the value for the UsoInterno object referenced by objUsoInterno (Unique)
					 * @param UsoInterno $mixValue
					 * @return UsoInterno
					 */
					if (is_null($mixValue)) {
						$this->objUsoInterno = null;

						// Make sure we update the adjoined UsoInterno object the next time we call Save()
						$this->blnDirtyUsoInterno = true;

						return null;
					} else {
						// Make sure $mixValue actually is a UsoInterno object
						try {
							$mixValue = QType::Cast($mixValue, 'UsoInterno');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objUsoInterno to a DIFFERENT $mixValue?
						if ((!$this->UsoInterno) || ($this->UsoInterno->IdFolio != $mixValue->IdFolio)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined UsoInterno object the next time we call Save()
							$this->blnDirtyUsoInterno = true;

							// Update Local Member Variable
							$this->objUsoInterno = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
        
			
		
		// Related Objects' Methods for NomenclaturaAsId
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _NomenclaturaAsIdArray
                /**
                * Add a Item to the _NomenclaturaAsIdArray
                * @param Nomenclatura $objItem
                * @return Nomenclatura[]
                */
                public function AddNomenclaturaAsId(Nomenclatura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objNomenclaturaAsIdArray = $this->NomenclaturaAsIdArray;
                    $this->objNomenclaturaAsIdArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateNomenclaturaAsId($objItem);

                    return $this->NomenclaturaAsIdArray;
                }

                /**
                * Remove a Item to the _NomenclaturaAsIdArray
                * @param Nomenclatura $objItem
                * @return Nomenclatura[]
                */
                public function RemoveNomenclaturaAsId(Nomenclatura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objNomenclaturaAsIdArray;
                    $this->objNomenclaturaAsIdArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objNomenclaturaAsIdArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedNomenclaturaAsId($objItem);
                        }

                    return $this->objNomenclaturaAsIdArray;
                }

		/**
		 * Gets all associated NomenclaturasAsId as an array of Nomenclatura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Nomenclatura[]
		*/ 
		public function GetNomenclaturaAsIdArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Nomenclatura::LoadArrayByIdFolio($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NomenclaturasAsId
		 * @return int
		*/ 
		public function CountNomenclaturasAsId() {
			if ((is_null($this->intId)))
				return 0;

			return Nomenclatura::CountByIdFolio($this->intId);
		}

		/**
		 * Associates a NomenclaturaAsId
		 * @param Nomenclatura $objNomenclatura
		 * @return void
		*/ 
		public function AssociateNomenclaturaAsId(Nomenclatura $objNomenclatura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNomenclaturaAsId on this unsaved Folio.');
			if ((is_null($objNomenclatura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNomenclaturaAsId on this Folio with an unsaved Nomenclatura.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"nomenclatura"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objNomenclatura->Id) . '
			');
		}

		/**
		 * Unassociates a NomenclaturaAsId
		 * @param Nomenclatura $objNomenclatura
		 * @return void
		*/ 
		public function UnassociateNomenclaturaAsId(Nomenclatura $objNomenclatura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNomenclaturaAsId on this unsaved Folio.');
			if ((is_null($objNomenclatura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNomenclaturaAsId on this Folio with an unsaved Nomenclatura.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"nomenclatura"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objNomenclatura->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NomenclaturasAsId
		 * @return void
		*/ 
		public function UnassociateAllNomenclaturasAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNomenclaturaAsId on this unsaved Folio.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"nomenclatura"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NomenclaturaAsId
		 * @param Nomenclatura $objNomenclatura
		 * @return void
		*/ 
		public function DeleteAssociatedNomenclaturaAsId(Nomenclatura $objNomenclatura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNomenclaturaAsId on this unsaved Folio.');
			if ((is_null($objNomenclatura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNomenclaturaAsId on this Folio with an unsaved Nomenclatura.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"nomenclatura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objNomenclatura->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NomenclaturasAsId
		 * @return void
		*/ 
		public function DeleteAllNomenclaturasAsId() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNomenclaturaAsId on this unsaved Folio.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"nomenclatura"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Folio"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CodFolio" type="xsd:string"/>';
			$strToReturn .= '<element name="IdPartidoObject" type="xsd1:Partido"/>';
			$strToReturn .= '<element name="IdLocalidadObject" type="xsd1:Localidad"/>';
			$strToReturn .= '<element name="Matricula" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Encargado" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreBarrioOficial" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreBarrioAlternativo1" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreBarrioAlternativo2" type="xsd:string"/>';
			$strToReturn .= '<element name="AnioOrigen" type="xsd:string"/>';
			$strToReturn .= '<element name="Superficie" type="xsd:string"/>';
			$strToReturn .= '<element name="CantidadFamilias" type="xsd:int"/>';
			$strToReturn .= '<element name="TipoBarrioObject" type="xsd1:TipoBarrio"/>';
			$strToReturn .= '<element name="ObservacionCasoDudoso" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="NumExpedientes" type="xsd:string"/>';
			$strToReturn .= '<element name="Geom" type="xsd:string"/>';
			$strToReturn .= '<element name="Judicializado" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Folio', $strComplexTypeArray)) {
				$strComplexTypeArray['Folio'] = Folio::GetSoapComplexTypeXml();
				$strComplexTypeArray = Partido::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = Localidad::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = TipoBarrio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Folio::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Folio();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if (property_exists($objSoapObject, 'CodFolio')) {
				$objToReturn->strCodFolio = $objSoapObject->CodFolio;
            }
			if ((property_exists($objSoapObject, 'IdPartidoObject')) &&
				($objSoapObject->IdPartidoObject))
				$objToReturn->IdPartidoObject = Partido::GetObjectFromSoapObject($objSoapObject->IdPartidoObject);
			if ((property_exists($objSoapObject, 'IdLocalidadObject')) &&
				($objSoapObject->IdLocalidadObject))
				$objToReturn->IdLocalidadObject = Localidad::GetObjectFromSoapObject($objSoapObject->IdLocalidadObject);
			if (property_exists($objSoapObject, 'Matricula')) {
				$objToReturn->strMatricula = $objSoapObject->Matricula;
            }
			if (property_exists($objSoapObject, 'Fecha')) {
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
            }
			if (property_exists($objSoapObject, 'Encargado')) {
				$objToReturn->strEncargado = $objSoapObject->Encargado;
            }
			if (property_exists($objSoapObject, 'NombreBarrioOficial')) {
				$objToReturn->strNombreBarrioOficial = $objSoapObject->NombreBarrioOficial;
            }
			if (property_exists($objSoapObject, 'NombreBarrioAlternativo1')) {
				$objToReturn->strNombreBarrioAlternativo1 = $objSoapObject->NombreBarrioAlternativo1;
            }
			if (property_exists($objSoapObject, 'NombreBarrioAlternativo2')) {
				$objToReturn->strNombreBarrioAlternativo2 = $objSoapObject->NombreBarrioAlternativo2;
            }
			if (property_exists($objSoapObject, 'AnioOrigen')) {
				$objToReturn->strAnioOrigen = $objSoapObject->AnioOrigen;
            }
			if (property_exists($objSoapObject, 'Superficie')) {
				$objToReturn->strSuperficie = $objSoapObject->Superficie;
            }
			if (property_exists($objSoapObject, 'CantidadFamilias')) {
				$objToReturn->intCantidadFamilias = $objSoapObject->CantidadFamilias;
            }
			if ((property_exists($objSoapObject, 'TipoBarrioObject')) &&
				($objSoapObject->TipoBarrioObject))
				$objToReturn->TipoBarrioObject = TipoBarrio::GetObjectFromSoapObject($objSoapObject->TipoBarrioObject);
			if (property_exists($objSoapObject, 'ObservacionCasoDudoso')) {
				$objToReturn->strObservacionCasoDudoso = $objSoapObject->ObservacionCasoDudoso;
            }
			if (property_exists($objSoapObject, 'Direccion')) {
				$objToReturn->strDireccion = $objSoapObject->Direccion;
            }
			if (property_exists($objSoapObject, 'NumExpedientes')) {
				$objToReturn->strNumExpedientes = $objSoapObject->NumExpedientes;
            }
			if (property_exists($objSoapObject, 'Geom')) {
				$objToReturn->strGeom = $objSoapObject->Geom;
            }
			if (property_exists($objSoapObject, 'Judicializado')) {
				$objToReturn->strJudicializado = $objSoapObject->Judicializado;
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
				array_push($objArrayToReturn, Folio::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdPartidoObject)
				$objObject->objIdPartidoObject = Partido::GetSoapObjectFromObject($objObject->objIdPartidoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdPartido = null;
			if ($objObject->objIdLocalidadObject)
				$objObject->objIdLocalidadObject = Localidad::GetSoapObjectFromObject($objObject->objIdLocalidadObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdLocalidad = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->__toString(QDateTime::FormatSoap);
			if ($objObject->objTipoBarrioObject)
				$objObject->objTipoBarrioObject = TipoBarrio::GetSoapObjectFromObject($objObject->objTipoBarrioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTipoBarrio = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>