<?php
/**
 * The abstract CondicionesSocioUrbanisticasGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the CondicionesSocioUrbanisticas subclass which
 * extends this CondicionesSocioUrbanisticasGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the CondicionesSocioUrbanisticas class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio (PK)
	 * @property boolean $EspacioLibreComun the value for blnEspacioLibreComun 
	 * @property string $PresenciaOrgSociales the value for strPresenciaOrgSociales 
	 * @property string $NombreRefernte the value for strNombreRefernte 
	 * @property string $TelefonoReferente the value for strTelefonoReferente 
	 * @property Folio $IdFolioObject the value for the Folio object referenced by intIdFolio (PK)
	 * @property-read Equipamiento $EquipamientoAsIdFolio the value for the private _objEquipamientoAsIdFolio (Read-Only) if set due to an expansion on the equipamiento.id_folio reverse relationship
	 * @property-read Equipamiento[] $EquipamientoAsIdFolioArray the value for the private _objEquipamientoAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the equipamiento.id_folio reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsIdFolio the value for the private _objInfraestructuraAsIdFolio (Read-Only) if set due to an expansion on the infraestructura.id_folio reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsIdFolioArray the value for the private _objInfraestructuraAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.id_folio reverse relationship
	 * @property-read SituacionAmbiental $SituacionAmbientalAsIdFolio the value for the private _objSituacionAmbientalAsIdFolio (Read-Only) if set due to an expansion on the situacion_ambiental.id_folio reverse relationship
	 * @property-read SituacionAmbiental[] $SituacionAmbientalAsIdFolioArray the value for the private _objSituacionAmbientalAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the situacion_ambiental.id_folio reverse relationship
	 * @property-read Transporte $TransporteAsIdFolio the value for the private _objTransporteAsIdFolio (Read-Only) if set due to an expansion on the transporte.id_folio reverse relationship
	 * @property-read Transporte[] $TransporteAsIdFolioArray the value for the private _objTransporteAsIdFolioArray (Read-Only) if set due to an ExpandAsArray on the transporte.id_folio reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class CondicionesSocioUrbanisticasGen extends QBaseClass {

    public static function Noun() {
        return 'CondicionesSocioUrbanisticas';
    }
    public static function NounPlural() {
        return 'CondicionesSocioUrbanisticases';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column condiciones_socio_urbanisticas.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'condiciones_socio_urbanisticas_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database PK column condiciones_socio_urbanisticas.id_folio
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
     * Protected member variable that maps to the database column condiciones_socio_urbanisticas.espacio_libre_comun
     * @var boolean blnEspacioLibreComun
     */
    protected $blnEspacioLibreComun;
    const EspacioLibreComunDefault = null;


    /**
     * Protected member variable that maps to the database column condiciones_socio_urbanisticas.presencia_org_sociales
     * @var string strPresenciaOrgSociales
     */
    protected $strPresenciaOrgSociales;
    const PresenciaOrgSocialesMaxLength = 255;
    const PresenciaOrgSocialesDefault = null;


    /**
     * Protected member variable that maps to the database column condiciones_socio_urbanisticas.nombre_refernte
     * @var string strNombreRefernte
     */
    protected $strNombreRefernte;
    const NombreRefernteMaxLength = 100;
    const NombreRefernteDefault = null;


    /**
     * Protected member variable that maps to the database column condiciones_socio_urbanisticas.telefono_referente
     * @var string strTelefonoReferente
     */
    protected $strTelefonoReferente;
    const TelefonoReferenteMaxLength = 45;
    const TelefonoReferenteDefault = null;


    /**
     * Private member variable that stores a reference to a single EquipamientoAsIdFolio object
     * (of type Equipamiento), if this CondicionesSocioUrbanisticas object was restored with
     * an expansion on the equipamiento association table.
     * @var Equipamiento _objEquipamientoAsIdFolio;
     */
    protected $objEquipamientoAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of EquipamientoAsIdFolio objects
     * (of type Equipamiento[]), if this CondicionesSocioUrbanisticas object was restored with
     * an ExpandAsArray on the equipamiento association table.
     * @var Equipamiento[] _objEquipamientoAsIdFolioArray;
     */
    protected $objEquipamientoAsIdFolioArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsIdFolio object
     * (of type Infraestructura), if this CondicionesSocioUrbanisticas object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsIdFolio;
     */
    protected $objInfraestructuraAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsIdFolio objects
     * (of type Infraestructura[]), if this CondicionesSocioUrbanisticas object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsIdFolioArray;
     */
    protected $objInfraestructuraAsIdFolioArray;

    /**
     * Private member variable that stores a reference to a single SituacionAmbientalAsIdFolio object
     * (of type SituacionAmbiental), if this CondicionesSocioUrbanisticas object was restored with
     * an expansion on the situacion_ambiental association table.
     * @var SituacionAmbiental _objSituacionAmbientalAsIdFolio;
     */
    protected $objSituacionAmbientalAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of SituacionAmbientalAsIdFolio objects
     * (of type SituacionAmbiental[]), if this CondicionesSocioUrbanisticas object was restored with
     * an ExpandAsArray on the situacion_ambiental association table.
     * @var SituacionAmbiental[] _objSituacionAmbientalAsIdFolioArray;
     */
    protected $objSituacionAmbientalAsIdFolioArray;

    /**
     * Private member variable that stores a reference to a single TransporteAsIdFolio object
     * (of type Transporte), if this CondicionesSocioUrbanisticas object was restored with
     * an expansion on the transporte association table.
     * @var Transporte _objTransporteAsIdFolio;
     */
    protected $objTransporteAsIdFolio;

    /**
     * Private member variable that stores a reference to an array of TransporteAsIdFolio objects
     * (of type Transporte[]), if this CondicionesSocioUrbanisticas object was restored with
     * an ExpandAsArray on the transporte association table.
     * @var Transporte[] _objTransporteAsIdFolioArray;
     */
    protected $objTransporteAsIdFolioArray;

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
		 * in the database column condiciones_socio_urbanisticas.id_folio.
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
                protected static $_objCondicionesSocioUrbanisticasArray = array();


		/**
		 * Load a CondicionesSocioUrbanisticas from PK Info
		 * @param integer $intId
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return CondicionesSocioUrbanisticas
		 */
		public static function Load($intId, $intIdFolio, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  CondicionesSocioUrbanisticas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->Id, $intId),
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio, $intIdFolio)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId, $intIdFolio",self::$_objCondicionesSocioUrbanisticasArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpCondicionesSocioUrbanisticas = CondicionesSocioUrbanisticas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->Id, $intId),
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio, $intIdFolio)
				),
				$objOptionalClauses
			))) {
			    self::$_objCondicionesSocioUrbanisticasArray["$intId, $intIdFolio"] = $objTmpCondicionesSocioUrbanisticas;
            }
                        }
                        return isset(self::$_objCondicionesSocioUrbanisticasArray["$intId, $intIdFolio"])?self::$_objCondicionesSocioUrbanisticasArray["$intId, $intIdFolio"]:null;
		}

		/**
		 * Load all CondicionesSocioUrbanisticases
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CondicionesSocioUrbanisticas[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call CondicionesSocioUrbanisticas::QueryArray to perform the LoadAll query
			try {
				return CondicionesSocioUrbanisticas::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CondicionesSocioUrbanisticases
		 * @return int
		 */
		public static function CountAll() {
			// Call CondicionesSocioUrbanisticas::QueryCount to perform the CountAll query
			return CondicionesSocioUrbanisticas::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (CondicionesSocioUrbanisticas::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::CondicionesSocioUrbanisticas()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::CondicionesSocioUrbanisticas()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase CondicionesSocioUrbanisticas no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Create/Build out the QueryBuilder object with CondicionesSocioUrbanisticas-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'condiciones_socio_urbanisticas');
			CondicionesSocioUrbanisticas::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('condiciones_socio_urbanisticas');

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
		 * Static Qcubed Query method to query for a single CondicionesSocioUrbanisticas object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CondicionesSocioUrbanisticas the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CondicionesSocioUrbanisticas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new CondicionesSocioUrbanisticas object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of CondicionesSocioUrbanisticas objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CondicionesSocioUrbanisticas[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CondicionesSocioUrbanisticas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CondicionesSocioUrbanisticas::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of CondicionesSocioUrbanisticas objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CondicionesSocioUrbanisticas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			$strQuery = CondicionesSocioUrbanisticas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/condicionessociourbanisticas', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = CondicionesSocioUrbanisticas::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CondicionesSocioUrbanisticas
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'condiciones_socio_urbanisticas';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'espacio_libre_comun', $strAliasPrefix . 'espacio_libre_comun');
			$objBuilder->AddSelectItem($strTableName, 'presencia_org_sociales', $strAliasPrefix . 'presencia_org_sociales');
			$objBuilder->AddSelectItem($strTableName, 'nombre_refernte', $strAliasPrefix . 'nombre_refernte');
			$objBuilder->AddSelectItem($strTableName, 'telefono_referente', $strAliasPrefix . 'telefono_referente');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CondicionesSocioUrbanisticas from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CondicionesSocioUrbanisticas::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CondicionesSocioUrbanisticas
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the CondicionesSocioUrbanisticas object
			$objToReturn = new CondicionesSocioUrbanisticas();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'espacio_libre_comun', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'espacio_libre_comun'] : $strAliasPrefix . 'espacio_libre_comun';
			$objToReturn->blnEspacioLibreComun = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'presencia_org_sociales', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'presencia_org_sociales'] : $strAliasPrefix . 'presencia_org_sociales';
			$objToReturn->strPresenciaOrgSociales = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nombre_refernte', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nombre_refernte'] : $strAliasPrefix . 'nombre_refernte';
			$objToReturn->strNombreRefernte = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'telefono_referente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'telefono_referente'] : $strAliasPrefix . 'telefono_referente';
			$objToReturn->strTelefonoReferente = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsIdFolioArray, $objToReturn->objEquipamientoAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsIdFolioArray, $objToReturn->objInfraestructuraAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objSituacionAmbientalAsIdFolioArray, $objToReturn->objSituacionAmbientalAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objTransporteAsIdFolioArray, $objToReturn->objTransporteAsIdFolioArray) != null) {
						continue;
					}
					if ($objToReturn->IdFolio != $objPreviousItem->IdFolio) {
						continue;
					}
					if (array_diff($objPreviousItem->objEquipamientoAsIdFolioArray, $objToReturn->objEquipamientoAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsIdFolioArray, $objToReturn->objInfraestructuraAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objSituacionAmbientalAsIdFolioArray, $objToReturn->objSituacionAmbientalAsIdFolioArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objTransporteAsIdFolioArray, $objToReturn->objTransporteAsIdFolioArray) != null) {
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
				$strAliasPrefix = 'condiciones_socio_urbanisticas__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Folio::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for EquipamientoAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'equipamientoasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objEquipamientoAsIdFolioArray[] = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objEquipamientoAsIdFolio = Equipamiento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'equipamientoasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsIdFolioArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsIdFolio = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SituacionAmbientalAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'situacionambientalasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objSituacionAmbientalAsIdFolioArray[] = SituacionAmbiental::InstantiateDbRow($objDbRow, $strAliasPrefix . 'situacionambientalasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objSituacionAmbientalAsIdFolio = SituacionAmbiental::InstantiateDbRow($objDbRow, $strAliasPrefix . 'situacionambientalasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TransporteAsIdFolio Virtual Binding
			$strAlias = $strAliasPrefix . 'transporteasidfolio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objTransporteAsIdFolioArray[] = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objTransporteAsIdFolio = Transporte::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transporteasidfolio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of CondicionesSocioUrbanisticases from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CondicionesSocioUrbanisticas[]
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
					$objItem = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CondicionesSocioUrbanisticas object,
		 * by Id, IdFolio Index(es)
		 * @param integer $intId
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CondicionesSocioUrbanisticas
		*/
		public static function LoadByIdIdFolio($intId, $intIdFolio, $objOptionalClauses = null) {
			return CondicionesSocioUrbanisticas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->Id, $intId),
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio, $intIdFolio)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single CondicionesSocioUrbanisticas object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CondicionesSocioUrbanisticas
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return CondicionesSocioUrbanisticas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single CondicionesSocioUrbanisticas object,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CondicionesSocioUrbanisticas
		*/
		public static function LoadByIdFolio($intIdFolio, $objOptionalClauses = null) {
			return CondicionesSocioUrbanisticas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CondicionesSocioUrbanisticas()->IdFolio, $intIdFolio)
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
         * Save this CondicionesSocioUrbanisticas
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

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
                        INSERT INTO "condiciones_socio_urbanisticas" (
                            "id_folio",
                            "espacio_libre_comun",
                            "presencia_org_sociales",
                            "nombre_refernte",
                            "telefono_referente"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnEspacioLibreComun) . ',
                            ' . $objDatabase->SqlVariable($this->strPresenciaOrgSociales) . ',
                            ' . $objDatabase->SqlVariable($this->strNombreRefernte) . ',
                            ' . $objDatabase->SqlVariable($this->strTelefonoReferente) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('condiciones_socio_urbanisticas', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "condiciones_socio_urbanisticas"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "espacio_libre_comun" = ' . $objDatabase->SqlVariable($this->blnEspacioLibreComun) . ',
                            "presencia_org_sociales" = ' . $objDatabase->SqlVariable($this->strPresenciaOrgSociales) . ',
                            "nombre_refernte" = ' . $objDatabase->SqlVariable($this->strNombreRefernte) . ',
                            "telefono_referente" = ' . $objDatabase->SqlVariable($this->strTelefonoReferente) . '
                        WHERE
                            "id" = ' . $objDatabase->SqlVariable($this->intId) . ' AND
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
                    // Update Identity column and return its value
                    $mixToReturn = $this->intId;
            // Return
            return $mixToReturn;
        }


    /**
		 * Delete this CondicionesSocioUrbanisticas
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CondicionesSocioUrbanisticas with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"condiciones_socio_urbanisticas"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . '');
		}

		/**
		 * Delete all CondicionesSocioUrbanisticases
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"condiciones_socio_urbanisticas"');
		}

		/**
		 * Truncate condiciones_socio_urbanisticas table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "condiciones_socio_urbanisticas" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this CondicionesSocioUrbanisticas from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CondicionesSocioUrbanisticas object.');

			// Reload the Object
			$objReloaded = CondicionesSocioUrbanisticas::Load($this->intId, $this->intIdFolio, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->__intIdFolio = $this->intIdFolio;
			$this->blnEspacioLibreComun = $objReloaded->blnEspacioLibreComun;
			$this->strPresenciaOrgSociales = $objReloaded->strPresenciaOrgSociales;
			$this->strNombreRefernte = $objReloaded->strNombreRefernte;
			$this->strTelefonoReferente = $objReloaded->strTelefonoReferente;
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
                 * Gets the value for intIdFolio (PK)
                 * @return integer
                 */
                return $this->intIdFolio;

            case 'EspacioLibreComun':
                /**
                 * Gets the value for blnEspacioLibreComun 
                 * @return boolean
                 */
                return $this->blnEspacioLibreComun;

            case 'PresenciaOrgSociales':
                /**
                 * Gets the value for strPresenciaOrgSociales 
                 * @return string
                 */
                return $this->strPresenciaOrgSociales;

            case 'NombreRefernte':
                /**
                 * Gets the value for strNombreRefernte 
                 * @return string
                 */
                return $this->strNombreRefernte;

            case 'TelefonoReferente':
                /**
                 * Gets the value for strTelefonoReferente 
                 * @return string
                 */
                return $this->strTelefonoReferente;


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

            case 'EquipamientoAsIdFolio':
                /**
                 * Gets the value for the private _objEquipamientoAsIdFolio (Read-Only)
                 * if set due to an expansion on the equipamiento.id_folio reverse relationship
                 * @return Equipamiento
                 */
                return $this->objEquipamientoAsIdFolio;

            case 'EquipamientoAsIdFolioArray':
                /**
                 * Gets the value for the private _objEquipamientoAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the equipamiento.id_folio reverse relationship
                 * @return Equipamiento[]
                 */
                if(is_null($this->objEquipamientoAsIdFolioArray))
                    $this->objEquipamientoAsIdFolioArray = $this->GetEquipamientoAsIdFolioArray();
                return (array) $this->objEquipamientoAsIdFolioArray;

            case 'InfraestructuraAsIdFolio':
                /**
                 * Gets the value for the private _objInfraestructuraAsIdFolio (Read-Only)
                 * if set due to an expansion on the infraestructura.id_folio reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsIdFolio;

            case 'InfraestructuraAsIdFolioArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.id_folio reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsIdFolioArray))
                    $this->objInfraestructuraAsIdFolioArray = $this->GetInfraestructuraAsIdFolioArray();
                return (array) $this->objInfraestructuraAsIdFolioArray;

            case 'SituacionAmbientalAsIdFolio':
                /**
                 * Gets the value for the private _objSituacionAmbientalAsIdFolio (Read-Only)
                 * if set due to an expansion on the situacion_ambiental.id_folio reverse relationship
                 * @return SituacionAmbiental
                 */
                return $this->objSituacionAmbientalAsIdFolio;

            case 'SituacionAmbientalAsIdFolioArray':
                /**
                 * Gets the value for the private _objSituacionAmbientalAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the situacion_ambiental.id_folio reverse relationship
                 * @return SituacionAmbiental[]
                 */
                if(is_null($this->objSituacionAmbientalAsIdFolioArray))
                    $this->objSituacionAmbientalAsIdFolioArray = $this->GetSituacionAmbientalAsIdFolioArray();
                return (array) $this->objSituacionAmbientalAsIdFolioArray;

            case 'TransporteAsIdFolio':
                /**
                 * Gets the value for the private _objTransporteAsIdFolio (Read-Only)
                 * if set due to an expansion on the transporte.id_folio reverse relationship
                 * @return Transporte
                 */
                return $this->objTransporteAsIdFolio;

            case 'TransporteAsIdFolioArray':
                /**
                 * Gets the value for the private _objTransporteAsIdFolioArray (Read-Only)
                 * if set due to an ExpandAsArray on the transporte.id_folio reverse relationship
                 * @return Transporte[]
                 */
                if(is_null($this->objTransporteAsIdFolioArray))
                    $this->objTransporteAsIdFolioArray = $this->GetTransporteAsIdFolioArray();
                return (array) $this->objTransporteAsIdFolioArray;


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

				case 'EspacioLibreComun':
					/**
					 * Sets the value for blnEspacioLibreComun 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnEspacioLibreComun = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnEspacioLibreComun = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PresenciaOrgSociales':
					/**
					 * Sets the value for strPresenciaOrgSociales 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPresenciaOrgSociales = QType::Cast($mixValue, QType::String));
                                                return ($this->strPresenciaOrgSociales = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreRefernte':
					/**
					 * Sets the value for strNombreRefernte 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNombreRefernte = QType::Cast($mixValue, QType::String));
                                                return ($this->strNombreRefernte = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoReferente':
					/**
					 * Sets the value for strTelefonoReferente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTelefonoReferente = QType::Cast($mixValue, QType::String));
                                                return ($this->strTelefonoReferente = $mixValue);
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
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this CondicionesSocioUrbanisticas');

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
        
			
		
		// Related Objects' Methods for EquipamientoAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _EquipamientoAsIdFolioArray
                /**
                * Add a Item to the _EquipamientoAsIdFolioArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function AddEquipamientoAsIdFolio(Equipamiento $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objEquipamientoAsIdFolioArray = $this->EquipamientoAsIdFolioArray;
                    $this->objEquipamientoAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateEquipamientoAsIdFolio($objItem);

                    return $this->EquipamientoAsIdFolioArray;
                }

                /**
                * Remove a Item to the _EquipamientoAsIdFolioArray
                * @param Equipamiento $objItem
                * @return Equipamiento[]
                */
                public function RemoveEquipamientoAsIdFolio(Equipamiento $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objEquipamientoAsIdFolioArray;
                    $this->objEquipamientoAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objEquipamientoAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedEquipamientoAsIdFolio($objItem);
                        }

                    return $this->objEquipamientoAsIdFolioArray;
                }

		/**
		 * Gets all associated EquipamientosAsIdFolio as an array of Equipamiento objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Equipamiento[]
		*/ 
		public function GetEquipamientoAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return array();

			try {
				return Equipamiento::LoadArrayByIdFolio($this->intId, $this->intIdFolio, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EquipamientosAsIdFolio
		 * @return int
		*/ 
		public function CountEquipamientosAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return 0;

			return Equipamiento::CountByIdFolio($this->intId, $this->intIdFolio);
		}

		/**
		 * Associates a EquipamientoAsIdFolio
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function AssociateEquipamientoAsIdFolio(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEquipamientoAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . '
			');
		}

		/**
		 * Unassociates a EquipamientoAsIdFolio
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function UnassociateEquipamientoAsIdFolio(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EquipamientosAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllEquipamientosAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"equipamiento"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EquipamientoAsIdFolio
		 * @param Equipamiento $objEquipamiento
		 * @return void
		*/ 
		public function DeleteAssociatedEquipamientoAsIdFolio(Equipamiento $objEquipamiento) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objEquipamiento->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Equipamiento.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objEquipamiento->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EquipamientosAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllEquipamientosAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEquipamientoAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"equipamiento"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsIdFolioArray
                /**
                * Add a Item to the _InfraestructuraAsIdFolioArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsIdFolio(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objInfraestructuraAsIdFolioArray = $this->InfraestructuraAsIdFolioArray;
                    $this->objInfraestructuraAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsIdFolio($objItem);

                    return $this->InfraestructuraAsIdFolioArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsIdFolioArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsIdFolio(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsIdFolioArray;
                    $this->objInfraestructuraAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsIdFolio($objItem);
                        }

                    return $this->objInfraestructuraAsIdFolioArray;
                }

		/**
		 * Gets all associated InfraestructurasAsIdFolio as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return array();

			try {
				return Infraestructura::LoadArrayByIdFolio($this->intId, $this->intIdFolio, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsIdFolio
		 * @return int
		*/ 
		public function CountInfraestructurasAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return 0;

			return Infraestructura::CountByIdFolio($this->intId, $this->intIdFolio);
		}

		/**
		 * Associates a InfraestructuraAsIdFolio
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsIdFolio(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsIdFolio
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsIdFolio(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsIdFolio
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsIdFolio(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for SituacionAmbientalAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _SituacionAmbientalAsIdFolioArray
                /**
                * Add a Item to the _SituacionAmbientalAsIdFolioArray
                * @param SituacionAmbiental $objItem
                * @return SituacionAmbiental[]
                */
                public function AddSituacionAmbientalAsIdFolio(SituacionAmbiental $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objSituacionAmbientalAsIdFolioArray = $this->SituacionAmbientalAsIdFolioArray;
                    $this->objSituacionAmbientalAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateSituacionAmbientalAsIdFolio($objItem);

                    return $this->SituacionAmbientalAsIdFolioArray;
                }

                /**
                * Remove a Item to the _SituacionAmbientalAsIdFolioArray
                * @param SituacionAmbiental $objItem
                * @return SituacionAmbiental[]
                */
                public function RemoveSituacionAmbientalAsIdFolio(SituacionAmbiental $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objSituacionAmbientalAsIdFolioArray;
                    $this->objSituacionAmbientalAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objSituacionAmbientalAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedSituacionAmbientalAsIdFolio($objItem);
                        }

                    return $this->objSituacionAmbientalAsIdFolioArray;
                }

		/**
		 * Gets all associated SituacionAmbientalesAsIdFolio as an array of SituacionAmbiental objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SituacionAmbiental[]
		*/ 
		public function GetSituacionAmbientalAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return array();

			try {
				return SituacionAmbiental::LoadArrayByIdFolio($this->intId, $this->intIdFolio, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SituacionAmbientalesAsIdFolio
		 * @return int
		*/ 
		public function CountSituacionAmbientalesAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return 0;

			return SituacionAmbiental::CountByIdFolio($this->intId, $this->intIdFolio);
		}

		/**
		 * Associates a SituacionAmbientalAsIdFolio
		 * @param SituacionAmbiental $objSituacionAmbiental
		 * @return void
		*/ 
		public function AssociateSituacionAmbientalAsIdFolio(SituacionAmbiental $objSituacionAmbiental) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSituacionAmbientalAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objSituacionAmbiental->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSituacionAmbientalAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved SituacionAmbiental.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"situacion_ambiental"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objSituacionAmbiental->Id) . '
			');
		}

		/**
		 * Unassociates a SituacionAmbientalAsIdFolio
		 * @param SituacionAmbiental $objSituacionAmbiental
		 * @return void
		*/ 
		public function UnassociateSituacionAmbientalAsIdFolio(SituacionAmbiental $objSituacionAmbiental) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSituacionAmbientalAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objSituacionAmbiental->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSituacionAmbientalAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved SituacionAmbiental.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"situacion_ambiental"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objSituacionAmbiental->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all SituacionAmbientalesAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllSituacionAmbientalesAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSituacionAmbientalAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"situacion_ambiental"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SituacionAmbientalAsIdFolio
		 * @param SituacionAmbiental $objSituacionAmbiental
		 * @return void
		*/ 
		public function DeleteAssociatedSituacionAmbientalAsIdFolio(SituacionAmbiental $objSituacionAmbiental) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSituacionAmbientalAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objSituacionAmbiental->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSituacionAmbientalAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved SituacionAmbiental.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"situacion_ambiental"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objSituacionAmbiental->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated SituacionAmbientalesAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllSituacionAmbientalesAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSituacionAmbientalAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"situacion_ambiental"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TransporteAsIdFolio
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _TransporteAsIdFolioArray
                /**
                * Add a Item to the _TransporteAsIdFolioArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function AddTransporteAsIdFolio(Transporte $objItem){
                   //add to the collection and add me as a parent
                    $objItem->IdFolioObject = $this;
                    $this->objTransporteAsIdFolioArray = $this->TransporteAsIdFolioArray;
                    $this->objTransporteAsIdFolioArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateTransporteAsIdFolio($objItem);

                    return $this->TransporteAsIdFolioArray;
                }

                /**
                * Remove a Item to the _TransporteAsIdFolioArray
                * @param Transporte $objItem
                * @return Transporte[]
                */
                public function RemoveTransporteAsIdFolio(Transporte $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objTransporteAsIdFolioArray;
                    $this->objTransporteAsIdFolioArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objTransporteAsIdFolioArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->IdFolioObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedTransporteAsIdFolio($objItem);
                        }

                    return $this->objTransporteAsIdFolioArray;
                }

		/**
		 * Gets all associated TransportesAsIdFolio as an array of Transporte objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transporte[]
		*/ 
		public function GetTransporteAsIdFolioArray($objOptionalClauses = null) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return array();

			try {
				return Transporte::LoadArrayByIdFolio($this->intId, $this->intIdFolio, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TransportesAsIdFolio
		 * @return int
		*/ 
		public function CountTransportesAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				return 0;

			return Transporte::CountByIdFolio($this->intId, $this->intIdFolio);
		}

		/**
		 * Associates a TransporteAsIdFolio
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function AssociateTransporteAsIdFolio(Transporte $objTransporte) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransporteAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . '
			');
		}

		/**
		 * Unassociates a TransporteAsIdFolio
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function UnassociateTransporteAsIdFolio(Transporte $objTransporte) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"id_folio" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TransportesAsIdFolio
		 * @return void
		*/ 
		public function UnassociateAllTransportesAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"transporte"
				SET
					"id_folio" = null
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TransporteAsIdFolio
		 * @param Transporte $objTransporte
		 * @return void
		*/ 
		public function DeleteAssociatedTransporteAsIdFolio(Transporte $objTransporte) {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');
			if ((is_null($objTransporte->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsIdFolio on this CondicionesSocioUrbanisticas with an unsaved Transporte.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objTransporte->Id) . ' AND
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TransportesAsIdFolio
		 * @return void
		*/ 
		public function DeleteAllTransportesAsIdFolio() {
			if ((is_null($this->intId)) || (is_null($this->intIdFolio)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransporteAsIdFolio on this unsaved CondicionesSocioUrbanisticas.');

			// Get the Database Object for this Class
			$objDatabase = CondicionesSocioUrbanisticas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"transporte"
				WHERE
					"id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CondicionesSocioUrbanisticas"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Folio"/>';
			$strToReturn .= '<element name="EspacioLibreComun" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PresenciaOrgSociales" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreRefernte" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoReferente" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CondicionesSocioUrbanisticas', $strComplexTypeArray)) {
				$strComplexTypeArray['CondicionesSocioUrbanisticas'] = CondicionesSocioUrbanisticas::GetSoapComplexTypeXml();
				$strComplexTypeArray = Folio::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CondicionesSocioUrbanisticas::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CondicionesSocioUrbanisticas();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Folio::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'EspacioLibreComun')) {
				$objToReturn->blnEspacioLibreComun = $objSoapObject->EspacioLibreComun;
            }
			if (property_exists($objSoapObject, 'PresenciaOrgSociales')) {
				$objToReturn->strPresenciaOrgSociales = $objSoapObject->PresenciaOrgSociales;
            }
			if (property_exists($objSoapObject, 'NombreRefernte')) {
				$objToReturn->strNombreRefernte = $objSoapObject->NombreRefernte;
            }
			if (property_exists($objSoapObject, 'TelefonoReferente')) {
				$objToReturn->strTelefonoReferente = $objSoapObject->TelefonoReferente;
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
				array_push($objArrayToReturn, CondicionesSocioUrbanisticas::GetSoapObjectFromObject($objObject, true));

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