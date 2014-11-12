<?php
/**
 * The abstract InfraestructuraGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the Infraestructura subclass which
 * extends this InfraestructuraGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the Infraestructura class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property integer $EnergiaElectricaMedidorIndividual the value for intEnergiaElectricaMedidorIndividual 
	 * @property integer $EnergiaElectricaMedidorColectivo the value for intEnergiaElectricaMedidorColectivo 
	 * @property integer $AlumbradoPublico the value for intAlumbradoPublico 
	 * @property integer $AguaCorriente the value for intAguaCorriente 
	 * @property integer $AguaPotable the value for intAguaPotable 
	 * @property integer $RedCloacal the value for intRedCloacal 
	 * @property integer $SistAlternativoEliminacionExcretas the value for intSistAlternativoEliminacionExcretas 
	 * @property integer $RedGas the value for intRedGas 
	 * @property integer $Pavimento the value for intPavimento 
	 * @property integer $CordonCuneta the value for intCordonCuneta 
	 * @property integer $DesaguesPluviales the value for intDesaguesPluviales 
	 * @property integer $RecoleccionResiduos the value for intRecoleccionResiduos 
	 * @property CondicionesSocioUrbanisticas $IdFolioObject the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
	 * @property OpcionesInfraestructura $EnergiaElectricaMedidorIndividualObject the value for the OpcionesInfraestructura object referenced by intEnergiaElectricaMedidorIndividual 
	 * @property OpcionesInfraestructura $EnergiaElectricaMedidorColectivoObject the value for the OpcionesInfraestructura object referenced by intEnergiaElectricaMedidorColectivo 
	 * @property OpcionesInfraestructura $AlumbradoPublicoObject the value for the OpcionesInfraestructura object referenced by intAlumbradoPublico 
	 * @property OpcionesInfraestructura $AguaCorrienteObject the value for the OpcionesInfraestructura object referenced by intAguaCorriente 
	 * @property OpcionesInfraestructura $AguaPotableObject the value for the OpcionesInfraestructura object referenced by intAguaPotable 
	 * @property OpcionesInfraestructura $RedCloacalObject the value for the OpcionesInfraestructura object referenced by intRedCloacal 
	 * @property OpcionesInfraestructura $SistAlternativoEliminacionExcretasObject the value for the OpcionesInfraestructura object referenced by intSistAlternativoEliminacionExcretas 
	 * @property OpcionesInfraestructura $RedGasObject the value for the OpcionesInfraestructura object referenced by intRedGas 
	 * @property OpcionesInfraestructura $PavimentoObject the value for the OpcionesInfraestructura object referenced by intPavimento 
	 * @property OpcionesInfraestructura $CordonCunetaObject the value for the OpcionesInfraestructura object referenced by intCordonCuneta 
	 * @property OpcionesInfraestructura $DesaguesPluvialesObject the value for the OpcionesInfraestructura object referenced by intDesaguesPluviales 
	 * @property OpcionesInfraestructura $RecoleccionResiduosObject the value for the OpcionesInfraestructura object referenced by intRecoleccionResiduos 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class InfraestructuraGen extends QBaseClass {

    public static function Noun() {
        return 'Infraestructura';
    }
    public static function NounPlural() {
        return 'Infraestructuras';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column infraestructura.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'infraestructura_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column infraestructura.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.energia_electrica_medidor_individual
     * @var integer intEnergiaElectricaMedidorIndividual
     */
    protected $intEnergiaElectricaMedidorIndividual;
    const EnergiaElectricaMedidorIndividualDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.energia_electrica_medidor_colectivo
     * @var integer intEnergiaElectricaMedidorColectivo
     */
    protected $intEnergiaElectricaMedidorColectivo;
    const EnergiaElectricaMedidorColectivoDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.alumbrado_publico
     * @var integer intAlumbradoPublico
     */
    protected $intAlumbradoPublico;
    const AlumbradoPublicoDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.agua_corriente
     * @var integer intAguaCorriente
     */
    protected $intAguaCorriente;
    const AguaCorrienteDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.agua_potable
     * @var integer intAguaPotable
     */
    protected $intAguaPotable;
    const AguaPotableDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.red_cloacal
     * @var integer intRedCloacal
     */
    protected $intRedCloacal;
    const RedCloacalDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.sist_alternativo_eliminacion_excretas
     * @var integer intSistAlternativoEliminacionExcretas
     */
    protected $intSistAlternativoEliminacionExcretas;
    const SistAlternativoEliminacionExcretasDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.red_gas
     * @var integer intRedGas
     */
    protected $intRedGas;
    const RedGasDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.pavimento
     * @var integer intPavimento
     */
    protected $intPavimento;
    const PavimentoDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.cordon_cuneta
     * @var integer intCordonCuneta
     */
    protected $intCordonCuneta;
    const CordonCunetaDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.desagues_pluviales
     * @var integer intDesaguesPluviales
     */
    protected $intDesaguesPluviales;
    const DesaguesPluvialesDefault = null;


    /**
     * Protected member variable that maps to the database column infraestructura.recoleccion_residuos
     * @var integer intRecoleccionResiduos
     */
    protected $intRecoleccionResiduos;
    const RecoleccionResiduosDefault = null;


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
		 * in the database column infraestructura.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this CondicionesSocioUrbanisticas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CondicionesSocioUrbanisticas objIdFolioObject
		 */
		protected $objIdFolioObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.energia_electrica_medidor_individual.
		 *
		 * NOTE: Always use the EnergiaElectricaMedidorIndividualObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objEnergiaElectricaMedidorIndividualObject
		 */
		protected $objEnergiaElectricaMedidorIndividualObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.energia_electrica_medidor_colectivo.
		 *
		 * NOTE: Always use the EnergiaElectricaMedidorColectivoObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objEnergiaElectricaMedidorColectivoObject
		 */
		protected $objEnergiaElectricaMedidorColectivoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.alumbrado_publico.
		 *
		 * NOTE: Always use the AlumbradoPublicoObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objAlumbradoPublicoObject
		 */
		protected $objAlumbradoPublicoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.agua_corriente.
		 *
		 * NOTE: Always use the AguaCorrienteObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objAguaCorrienteObject
		 */
		protected $objAguaCorrienteObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.agua_potable.
		 *
		 * NOTE: Always use the AguaPotableObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objAguaPotableObject
		 */
		protected $objAguaPotableObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.red_cloacal.
		 *
		 * NOTE: Always use the RedCloacalObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objRedCloacalObject
		 */
		protected $objRedCloacalObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.sist_alternativo_eliminacion_excretas.
		 *
		 * NOTE: Always use the SistAlternativoEliminacionExcretasObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objSistAlternativoEliminacionExcretasObject
		 */
		protected $objSistAlternativoEliminacionExcretasObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.red_gas.
		 *
		 * NOTE: Always use the RedGasObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objRedGasObject
		 */
		protected $objRedGasObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.pavimento.
		 *
		 * NOTE: Always use the PavimentoObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objPavimentoObject
		 */
		protected $objPavimentoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.cordon_cuneta.
		 *
		 * NOTE: Always use the CordonCunetaObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objCordonCunetaObject
		 */
		protected $objCordonCunetaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.desagues_pluviales.
		 *
		 * NOTE: Always use the DesaguesPluvialesObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objDesaguesPluvialesObject
		 */
		protected $objDesaguesPluvialesObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column infraestructura.recoleccion_residuos.
		 *
		 * NOTE: Always use the RecoleccionResiduosObject property getter to correctly retrieve this OpcionesInfraestructura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesInfraestructura objRecoleccionResiduosObject
		 */
		protected $objRecoleccionResiduosObject;



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
                protected static $_objInfraestructuraArray = array();


		/**
		 * Load a Infraestructura from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return Infraestructura
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  Infraestructura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Infraestructura()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objInfraestructuraArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpInfraestructura = Infraestructura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Infraestructura()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objInfraestructuraArray["$intId"] = $objTmpInfraestructura;
            }
                        }
                        return isset(self::$_objInfraestructuraArray["$intId"])?self::$_objInfraestructuraArray["$intId"]:null;
		}

		/**
		 * Load all Infraestructuras
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Infraestructura::QueryArray to perform the LoadAll query
			try {
				return Infraestructura::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Infraestructuras
		 * @return int
		 */
		public static function CountAll() {
			// Call Infraestructura::QueryCount to perform the CountAll query
			return Infraestructura::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (Infraestructura::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::Infraestructura()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::Infraestructura()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase Infraestructura no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = Infraestructura::GetDatabase();

			// Create/Build out the QueryBuilder object with Infraestructura-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'infraestructura');
			Infraestructura::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('infraestructura');

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
		 * Static Qcubed Query method to query for a single Infraestructura object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Infraestructura the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Infraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Infraestructura object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Infraestructura::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Infraestructura::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Infraestructura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Infraestructura[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Infraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Infraestructura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Infraestructura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Infraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Infraestructura::GetDatabase();

			$strQuery = Infraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/infraestructura', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Infraestructura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Infraestructura
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'infraestructura';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'energia_electrica_medidor_individual', $strAliasPrefix . 'energia_electrica_medidor_individual');
			$objBuilder->AddSelectItem($strTableName, 'energia_electrica_medidor_colectivo', $strAliasPrefix . 'energia_electrica_medidor_colectivo');
			$objBuilder->AddSelectItem($strTableName, 'alumbrado_publico', $strAliasPrefix . 'alumbrado_publico');
			$objBuilder->AddSelectItem($strTableName, 'agua_corriente', $strAliasPrefix . 'agua_corriente');
			$objBuilder->AddSelectItem($strTableName, 'agua_potable', $strAliasPrefix . 'agua_potable');
			$objBuilder->AddSelectItem($strTableName, 'red_cloacal', $strAliasPrefix . 'red_cloacal');
			$objBuilder->AddSelectItem($strTableName, 'sist_alternativo_eliminacion_excretas', $strAliasPrefix . 'sist_alternativo_eliminacion_excretas');
			$objBuilder->AddSelectItem($strTableName, 'red_gas', $strAliasPrefix . 'red_gas');
			$objBuilder->AddSelectItem($strTableName, 'pavimento', $strAliasPrefix . 'pavimento');
			$objBuilder->AddSelectItem($strTableName, 'cordon_cuneta', $strAliasPrefix . 'cordon_cuneta');
			$objBuilder->AddSelectItem($strTableName, 'desagues_pluviales', $strAliasPrefix . 'desagues_pluviales');
			$objBuilder->AddSelectItem($strTableName, 'recoleccion_residuos', $strAliasPrefix . 'recoleccion_residuos');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Infraestructura from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Infraestructura::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Infraestructura
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Infraestructura object
			$objToReturn = new Infraestructura();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'energia_electrica_medidor_individual', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'energia_electrica_medidor_individual'] : $strAliasPrefix . 'energia_electrica_medidor_individual';
			$objToReturn->intEnergiaElectricaMedidorIndividual = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'energia_electrica_medidor_colectivo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'energia_electrica_medidor_colectivo'] : $strAliasPrefix . 'energia_electrica_medidor_colectivo';
			$objToReturn->intEnergiaElectricaMedidorColectivo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'alumbrado_publico', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'alumbrado_publico'] : $strAliasPrefix . 'alumbrado_publico';
			$objToReturn->intAlumbradoPublico = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'agua_corriente', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'agua_corriente'] : $strAliasPrefix . 'agua_corriente';
			$objToReturn->intAguaCorriente = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'agua_potable', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'agua_potable'] : $strAliasPrefix . 'agua_potable';
			$objToReturn->intAguaPotable = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'red_cloacal', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'red_cloacal'] : $strAliasPrefix . 'red_cloacal';
			$objToReturn->intRedCloacal = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'sist_alternativo_eliminacion_excretas', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sist_alternativo_eliminacion_excretas'] : $strAliasPrefix . 'sist_alternativo_eliminacion_excretas';
			$objToReturn->intSistAlternativoEliminacionExcretas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'red_gas', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'red_gas'] : $strAliasPrefix . 'red_gas';
			$objToReturn->intRedGas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'pavimento', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'pavimento'] : $strAliasPrefix . 'pavimento';
			$objToReturn->intPavimento = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'cordon_cuneta', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cordon_cuneta'] : $strAliasPrefix . 'cordon_cuneta';
			$objToReturn->intCordonCuneta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'desagues_pluviales', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'desagues_pluviales'] : $strAliasPrefix . 'desagues_pluviales';
			$objToReturn->intDesaguesPluviales = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'recoleccion_residuos', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'recoleccion_residuos'] : $strAliasPrefix . 'recoleccion_residuos';
			$objToReturn->intRecoleccionResiduos = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'infraestructura__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = CondicionesSocioUrbanisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for EnergiaElectricaMedidorIndividualObject Early Binding
			$strAlias = $strAliasPrefix . 'energia_electrica_medidor_individual__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEnergiaElectricaMedidorIndividualObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'energia_electrica_medidor_individual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for EnergiaElectricaMedidorColectivoObject Early Binding
			$strAlias = $strAliasPrefix . 'energia_electrica_medidor_colectivo__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEnergiaElectricaMedidorColectivoObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'energia_electrica_medidor_colectivo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for AlumbradoPublicoObject Early Binding
			$strAlias = $strAliasPrefix . 'alumbrado_publico__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAlumbradoPublicoObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'alumbrado_publico__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for AguaCorrienteObject Early Binding
			$strAlias = $strAliasPrefix . 'agua_corriente__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAguaCorrienteObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'agua_corriente__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for AguaPotableObject Early Binding
			$strAlias = $strAliasPrefix . 'agua_potable__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAguaPotableObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'agua_potable__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for RedCloacalObject Early Binding
			$strAlias = $strAliasPrefix . 'red_cloacal__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRedCloacalObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'red_cloacal__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for SistAlternativoEliminacionExcretasObject Early Binding
			$strAlias = $strAliasPrefix . 'sist_alternativo_eliminacion_excretas__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSistAlternativoEliminacionExcretasObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sist_alternativo_eliminacion_excretas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for RedGasObject Early Binding
			$strAlias = $strAliasPrefix . 'red_gas__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRedGasObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'red_gas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PavimentoObject Early Binding
			$strAlias = $strAliasPrefix . 'pavimento__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPavimentoObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pavimento__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CordonCunetaObject Early Binding
			$strAlias = $strAliasPrefix . 'cordon_cuneta__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCordonCunetaObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cordon_cuneta__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for DesaguesPluvialesObject Early Binding
			$strAlias = $strAliasPrefix . 'desagues_pluviales__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDesaguesPluvialesObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'desagues_pluviales__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for RecoleccionResiduosObject Early Binding
			$strAlias = $strAliasPrefix . 'recoleccion_residuos__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRecoleccionResiduosObject = OpcionesInfraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recoleccion_residuos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Infraestructuras from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Infraestructura[]
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
					$objItem = Infraestructura::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Infraestructura::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Infraestructura object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Infraestructura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Infraestructura()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by AguaCorriente Index(es)
		 * @param integer $intAguaCorriente
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByAguaCorriente($intAguaCorriente, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByAguaCorriente query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->AguaCorriente, $intAguaCorriente),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by AguaCorriente Index(es)
		 * @param integer $intAguaCorriente
		 * @return int
		*/
		public static function CountByAguaCorriente($intAguaCorriente) {
			// Call Infraestructura::QueryCount to perform the CountByAguaCorriente query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->AguaCorriente, $intAguaCorriente)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by AguaPotable Index(es)
		 * @param integer $intAguaPotable
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByAguaPotable($intAguaPotable, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByAguaPotable query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->AguaPotable, $intAguaPotable),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by AguaPotable Index(es)
		 * @param integer $intAguaPotable
		 * @return int
		*/
		public static function CountByAguaPotable($intAguaPotable) {
			// Call Infraestructura::QueryCount to perform the CountByAguaPotable query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->AguaPotable, $intAguaPotable)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by AlumbradoPublico Index(es)
		 * @param integer $intAlumbradoPublico
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByAlumbradoPublico($intAlumbradoPublico, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByAlumbradoPublico query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->AlumbradoPublico, $intAlumbradoPublico),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by AlumbradoPublico Index(es)
		 * @param integer $intAlumbradoPublico
		 * @return int
		*/
		public static function CountByAlumbradoPublico($intAlumbradoPublico) {
			// Call Infraestructura::QueryCount to perform the CountByAlumbradoPublico query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->AlumbradoPublico, $intAlumbradoPublico)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by CordonCuneta Index(es)
		 * @param integer $intCordonCuneta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByCordonCuneta($intCordonCuneta, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByCordonCuneta query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->CordonCuneta, $intCordonCuneta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by CordonCuneta Index(es)
		 * @param integer $intCordonCuneta
		 * @return int
		*/
		public static function CountByCordonCuneta($intCordonCuneta) {
			// Call Infraestructura::QueryCount to perform the CountByCordonCuneta query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->CordonCuneta, $intCordonCuneta)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by DesaguesPluviales Index(es)
		 * @param integer $intDesaguesPluviales
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByDesaguesPluviales($intDesaguesPluviales, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByDesaguesPluviales query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->DesaguesPluviales, $intDesaguesPluviales),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by DesaguesPluviales Index(es)
		 * @param integer $intDesaguesPluviales
		 * @return int
		*/
		public static function CountByDesaguesPluviales($intDesaguesPluviales) {
			// Call Infraestructura::QueryCount to perform the CountByDesaguesPluviales query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->DesaguesPluviales, $intDesaguesPluviales)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by EnergiaElectricaMedidorColectivo Index(es)
		 * @param integer $intEnergiaElectricaMedidorColectivo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByEnergiaElectricaMedidorColectivo($intEnergiaElectricaMedidorColectivo, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByEnergiaElectricaMedidorColectivo query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->EnergiaElectricaMedidorColectivo, $intEnergiaElectricaMedidorColectivo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by EnergiaElectricaMedidorColectivo Index(es)
		 * @param integer $intEnergiaElectricaMedidorColectivo
		 * @return int
		*/
		public static function CountByEnergiaElectricaMedidorColectivo($intEnergiaElectricaMedidorColectivo) {
			// Call Infraestructura::QueryCount to perform the CountByEnergiaElectricaMedidorColectivo query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->EnergiaElectricaMedidorColectivo, $intEnergiaElectricaMedidorColectivo)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by EnergiaElectricaMedidorIndividual Index(es)
		 * @param integer $intEnergiaElectricaMedidorIndividual
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByEnergiaElectricaMedidorIndividual($intEnergiaElectricaMedidorIndividual, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByEnergiaElectricaMedidorIndividual query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->EnergiaElectricaMedidorIndividual, $intEnergiaElectricaMedidorIndividual),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by EnergiaElectricaMedidorIndividual Index(es)
		 * @param integer $intEnergiaElectricaMedidorIndividual
		 * @return int
		*/
		public static function CountByEnergiaElectricaMedidorIndividual($intEnergiaElectricaMedidorIndividual) {
			// Call Infraestructura::QueryCount to perform the CountByEnergiaElectricaMedidorIndividual query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->EnergiaElectricaMedidorIndividual, $intEnergiaElectricaMedidorIndividual)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call Infraestructura::QueryCount to perform the CountByIdFolio query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->IdFolio, $intIdFolio)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by Pavimento Index(es)
		 * @param integer $intPavimento
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByPavimento($intPavimento, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByPavimento query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->Pavimento, $intPavimento),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by Pavimento Index(es)
		 * @param integer $intPavimento
		 * @return int
		*/
		public static function CountByPavimento($intPavimento) {
			// Call Infraestructura::QueryCount to perform the CountByPavimento query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->Pavimento, $intPavimento)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by RecoleccionResiduos Index(es)
		 * @param integer $intRecoleccionResiduos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByRecoleccionResiduos($intRecoleccionResiduos, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByRecoleccionResiduos query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->RecoleccionResiduos, $intRecoleccionResiduos),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by RecoleccionResiduos Index(es)
		 * @param integer $intRecoleccionResiduos
		 * @return int
		*/
		public static function CountByRecoleccionResiduos($intRecoleccionResiduos) {
			// Call Infraestructura::QueryCount to perform the CountByRecoleccionResiduos query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->RecoleccionResiduos, $intRecoleccionResiduos)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by RedCloacal Index(es)
		 * @param integer $intRedCloacal
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByRedCloacal($intRedCloacal, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByRedCloacal query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->RedCloacal, $intRedCloacal),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by RedCloacal Index(es)
		 * @param integer $intRedCloacal
		 * @return int
		*/
		public static function CountByRedCloacal($intRedCloacal) {
			// Call Infraestructura::QueryCount to perform the CountByRedCloacal query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->RedCloacal, $intRedCloacal)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by RedGas Index(es)
		 * @param integer $intRedGas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayByRedGas($intRedGas, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayByRedGas query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->RedGas, $intRedGas),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by RedGas Index(es)
		 * @param integer $intRedGas
		 * @return int
		*/
		public static function CountByRedGas($intRedGas) {
			// Call Infraestructura::QueryCount to perform the CountByRedGas query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->RedGas, $intRedGas)
			);
		}
			
		/**
		 * Load an array of Infraestructura objects,
		 * by SistAlternativoEliminacionExcretas Index(es)
		 * @param integer $intSistAlternativoEliminacionExcretas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/
		public static function LoadArrayBySistAlternativoEliminacionExcretas($intSistAlternativoEliminacionExcretas, $objOptionalClauses = null) {
			// Call Infraestructura::QueryArray to perform the LoadArrayBySistAlternativoEliminacionExcretas query
			try {
				return Infraestructura::QueryArray(
					QQ::Equal(QQN::Infraestructura()->SistAlternativoEliminacionExcretas, $intSistAlternativoEliminacionExcretas),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Infraestructuras
		 * by SistAlternativoEliminacionExcretas Index(es)
		 * @param integer $intSistAlternativoEliminacionExcretas
		 * @return int
		*/
		public static function CountBySistAlternativoEliminacionExcretas($intSistAlternativoEliminacionExcretas) {
			// Call Infraestructura::QueryCount to perform the CountBySistAlternativoEliminacionExcretas query
			return Infraestructura::QueryCount(
				QQ::Equal(QQN::Infraestructura()->SistAlternativoEliminacionExcretas, $intSistAlternativoEliminacionExcretas)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this Infraestructura
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = Infraestructura::GetDatabase();

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
            // ver si objEnergiaElectricaMedidorIndividualObject esta Guardado
            if(is_null($this->intEnergiaElectricaMedidorIndividual)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->EnergiaElectricaMedidorIndividualObject))
                try{
                    if(!is_null($this->EnergiaElectricaMedidorIndividualObject->EnergiaElectricaMedidorIndividual))
                        $this->intEnergiaElectricaMedidorIndividual = $this->EnergiaElectricaMedidorIndividualObject->EnergiaElectricaMedidorIndividual;
                    else
                        $this->intEnergiaElectricaMedidorIndividual = $this->EnergiaElectricaMedidorIndividualObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objEnergiaElectricaMedidorColectivoObject esta Guardado
            if(is_null($this->intEnergiaElectricaMedidorColectivo)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->EnergiaElectricaMedidorColectivoObject))
                try{
                    if(!is_null($this->EnergiaElectricaMedidorColectivoObject->EnergiaElectricaMedidorColectivo))
                        $this->intEnergiaElectricaMedidorColectivo = $this->EnergiaElectricaMedidorColectivoObject->EnergiaElectricaMedidorColectivo;
                    else
                        $this->intEnergiaElectricaMedidorColectivo = $this->EnergiaElectricaMedidorColectivoObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objAlumbradoPublicoObject esta Guardado
            if(is_null($this->intAlumbradoPublico)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->AlumbradoPublicoObject))
                try{
                    if(!is_null($this->AlumbradoPublicoObject->AlumbradoPublico))
                        $this->intAlumbradoPublico = $this->AlumbradoPublicoObject->AlumbradoPublico;
                    else
                        $this->intAlumbradoPublico = $this->AlumbradoPublicoObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objAguaCorrienteObject esta Guardado
            if(is_null($this->intAguaCorriente)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->AguaCorrienteObject))
                try{
                    if(!is_null($this->AguaCorrienteObject->AguaCorriente))
                        $this->intAguaCorriente = $this->AguaCorrienteObject->AguaCorriente;
                    else
                        $this->intAguaCorriente = $this->AguaCorrienteObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objAguaPotableObject esta Guardado
            if(is_null($this->intAguaPotable)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->AguaPotableObject))
                try{
                    if(!is_null($this->AguaPotableObject->AguaPotable))
                        $this->intAguaPotable = $this->AguaPotableObject->AguaPotable;
                    else
                        $this->intAguaPotable = $this->AguaPotableObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objRedCloacalObject esta Guardado
            if(is_null($this->intRedCloacal)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->RedCloacalObject))
                try{
                    if(!is_null($this->RedCloacalObject->RedCloacal))
                        $this->intRedCloacal = $this->RedCloacalObject->RedCloacal;
                    else
                        $this->intRedCloacal = $this->RedCloacalObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objSistAlternativoEliminacionExcretasObject esta Guardado
            if(is_null($this->intSistAlternativoEliminacionExcretas)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->SistAlternativoEliminacionExcretasObject))
                try{
                    if(!is_null($this->SistAlternativoEliminacionExcretasObject->SistAlternativoEliminacionExcretas))
                        $this->intSistAlternativoEliminacionExcretas = $this->SistAlternativoEliminacionExcretasObject->SistAlternativoEliminacionExcretas;
                    else
                        $this->intSistAlternativoEliminacionExcretas = $this->SistAlternativoEliminacionExcretasObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objRedGasObject esta Guardado
            if(is_null($this->intRedGas)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->RedGasObject))
                try{
                    if(!is_null($this->RedGasObject->RedGas))
                        $this->intRedGas = $this->RedGasObject->RedGas;
                    else
                        $this->intRedGas = $this->RedGasObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objPavimentoObject esta Guardado
            if(is_null($this->intPavimento)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->PavimentoObject))
                try{
                    if(!is_null($this->PavimentoObject->Pavimento))
                        $this->intPavimento = $this->PavimentoObject->Pavimento;
                    else
                        $this->intPavimento = $this->PavimentoObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objCordonCunetaObject esta Guardado
            if(is_null($this->intCordonCuneta)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->CordonCunetaObject))
                try{
                    if(!is_null($this->CordonCunetaObject->CordonCuneta))
                        $this->intCordonCuneta = $this->CordonCunetaObject->CordonCuneta;
                    else
                        $this->intCordonCuneta = $this->CordonCunetaObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objDesaguesPluvialesObject esta Guardado
            if(is_null($this->intDesaguesPluviales)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->DesaguesPluvialesObject))
                try{
                    if(!is_null($this->DesaguesPluvialesObject->DesaguesPluviales))
                        $this->intDesaguesPluviales = $this->DesaguesPluvialesObject->DesaguesPluviales;
                    else
                        $this->intDesaguesPluviales = $this->DesaguesPluvialesObject->Save();
                }catch(Exception $objExc){
                    	$objExc->IncrementOffset();
			throw $objExc;
                }
            }
            // ver si objRecoleccionResiduosObject esta Guardado
            if(is_null($this->intRecoleccionResiduos)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->RecoleccionResiduosObject))
                try{
                    if(!is_null($this->RecoleccionResiduosObject->RecoleccionResiduos))
                        $this->intRecoleccionResiduos = $this->RecoleccionResiduosObject->RecoleccionResiduos;
                    else
                        $this->intRecoleccionResiduos = $this->RecoleccionResiduosObject->Save();
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
                    if ($this->intEnergiaElectricaMedidorIndividual && ($this->intEnergiaElectricaMedidorIndividual > QDatabaseNumberFieldMax::Integer || $this->intEnergiaElectricaMedidorIndividual < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEnergiaElectricaMedidorIndividual', QDatabaseFieldType::Integer);
                    }
                    if ($this->intEnergiaElectricaMedidorColectivo && ($this->intEnergiaElectricaMedidorColectivo > QDatabaseNumberFieldMax::Integer || $this->intEnergiaElectricaMedidorColectivo < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEnergiaElectricaMedidorColectivo', QDatabaseFieldType::Integer);
                    }
                    if ($this->intAlumbradoPublico && ($this->intAlumbradoPublico > QDatabaseNumberFieldMax::Integer || $this->intAlumbradoPublico < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intAlumbradoPublico', QDatabaseFieldType::Integer);
                    }
                    if ($this->intAguaCorriente && ($this->intAguaCorriente > QDatabaseNumberFieldMax::Integer || $this->intAguaCorriente < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intAguaCorriente', QDatabaseFieldType::Integer);
                    }
                    if ($this->intAguaPotable && ($this->intAguaPotable > QDatabaseNumberFieldMax::Integer || $this->intAguaPotable < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intAguaPotable', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRedCloacal && ($this->intRedCloacal > QDatabaseNumberFieldMax::Integer || $this->intRedCloacal < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRedCloacal', QDatabaseFieldType::Integer);
                    }
                    if ($this->intSistAlternativoEliminacionExcretas && ($this->intSistAlternativoEliminacionExcretas > QDatabaseNumberFieldMax::Integer || $this->intSistAlternativoEliminacionExcretas < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intSistAlternativoEliminacionExcretas', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRedGas && ($this->intRedGas > QDatabaseNumberFieldMax::Integer || $this->intRedGas < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRedGas', QDatabaseFieldType::Integer);
                    }
                    if ($this->intPavimento && ($this->intPavimento > QDatabaseNumberFieldMax::Integer || $this->intPavimento < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intPavimento', QDatabaseFieldType::Integer);
                    }
                    if ($this->intCordonCuneta && ($this->intCordonCuneta > QDatabaseNumberFieldMax::Integer || $this->intCordonCuneta < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intCordonCuneta', QDatabaseFieldType::Integer);
                    }
                    if ($this->intDesaguesPluviales && ($this->intDesaguesPluviales > QDatabaseNumberFieldMax::Integer || $this->intDesaguesPluviales < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intDesaguesPluviales', QDatabaseFieldType::Integer);
                    }
                    if ($this->intRecoleccionResiduos && ($this->intRecoleccionResiduos > QDatabaseNumberFieldMax::Integer || $this->intRecoleccionResiduos < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intRecoleccionResiduos', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "infraestructura" (
                            "id_folio",
                            "energia_electrica_medidor_individual",
                            "energia_electrica_medidor_colectivo",
                            "alumbrado_publico",
                            "agua_corriente",
                            "agua_potable",
                            "red_cloacal",
                            "sist_alternativo_eliminacion_excretas",
                            "red_gas",
                            "pavimento",
                            "cordon_cuneta",
                            "desagues_pluviales",
                            "recoleccion_residuos"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->intEnergiaElectricaMedidorIndividual) . ',
                            ' . $objDatabase->SqlVariable($this->intEnergiaElectricaMedidorColectivo) . ',
                            ' . $objDatabase->SqlVariable($this->intAlumbradoPublico) . ',
                            ' . $objDatabase->SqlVariable($this->intAguaCorriente) . ',
                            ' . $objDatabase->SqlVariable($this->intAguaPotable) . ',
                            ' . $objDatabase->SqlVariable($this->intRedCloacal) . ',
                            ' . $objDatabase->SqlVariable($this->intSistAlternativoEliminacionExcretas) . ',
                            ' . $objDatabase->SqlVariable($this->intRedGas) . ',
                            ' . $objDatabase->SqlVariable($this->intPavimento) . ',
                            ' . $objDatabase->SqlVariable($this->intCordonCuneta) . ',
                            ' . $objDatabase->SqlVariable($this->intDesaguesPluviales) . ',
                            ' . $objDatabase->SqlVariable($this->intRecoleccionResiduos) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('infraestructura', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "infraestructura"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "energia_electrica_medidor_individual" = ' . $objDatabase->SqlVariable($this->intEnergiaElectricaMedidorIndividual) . ',
                            "energia_electrica_medidor_colectivo" = ' . $objDatabase->SqlVariable($this->intEnergiaElectricaMedidorColectivo) . ',
                            "alumbrado_publico" = ' . $objDatabase->SqlVariable($this->intAlumbradoPublico) . ',
                            "agua_corriente" = ' . $objDatabase->SqlVariable($this->intAguaCorriente) . ',
                            "agua_potable" = ' . $objDatabase->SqlVariable($this->intAguaPotable) . ',
                            "red_cloacal" = ' . $objDatabase->SqlVariable($this->intRedCloacal) . ',
                            "sist_alternativo_eliminacion_excretas" = ' . $objDatabase->SqlVariable($this->intSistAlternativoEliminacionExcretas) . ',
                            "red_gas" = ' . $objDatabase->SqlVariable($this->intRedGas) . ',
                            "pavimento" = ' . $objDatabase->SqlVariable($this->intPavimento) . ',
                            "cordon_cuneta" = ' . $objDatabase->SqlVariable($this->intCordonCuneta) . ',
                            "desagues_pluviales" = ' . $objDatabase->SqlVariable($this->intDesaguesPluviales) . ',
                            "recoleccion_residuos" = ' . $objDatabase->SqlVariable($this->intRecoleccionResiduos) . '
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
		 * Delete this Infraestructura
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Infraestructura with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Infraestructura::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Infraestructuras
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Infraestructura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"');
		}

		/**
		 * Truncate infraestructura table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = Infraestructura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "infraestructura" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this Infraestructura from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Infraestructura object.');

			// Reload the Object
			$objReloaded = Infraestructura::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->EnergiaElectricaMedidorIndividual = $objReloaded->EnergiaElectricaMedidorIndividual;
			$this->EnergiaElectricaMedidorColectivo = $objReloaded->EnergiaElectricaMedidorColectivo;
			$this->AlumbradoPublico = $objReloaded->AlumbradoPublico;
			$this->AguaCorriente = $objReloaded->AguaCorriente;
			$this->AguaPotable = $objReloaded->AguaPotable;
			$this->RedCloacal = $objReloaded->RedCloacal;
			$this->SistAlternativoEliminacionExcretas = $objReloaded->SistAlternativoEliminacionExcretas;
			$this->RedGas = $objReloaded->RedGas;
			$this->Pavimento = $objReloaded->Pavimento;
			$this->CordonCuneta = $objReloaded->CordonCuneta;
			$this->DesaguesPluviales = $objReloaded->DesaguesPluviales;
			$this->RecoleccionResiduos = $objReloaded->RecoleccionResiduos;
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

            case 'EnergiaElectricaMedidorIndividual':
                /**
                 * Gets the value for intEnergiaElectricaMedidorIndividual 
                 * @return integer
                 */
                return $this->intEnergiaElectricaMedidorIndividual;

            case 'EnergiaElectricaMedidorColectivo':
                /**
                 * Gets the value for intEnergiaElectricaMedidorColectivo 
                 * @return integer
                 */
                return $this->intEnergiaElectricaMedidorColectivo;

            case 'AlumbradoPublico':
                /**
                 * Gets the value for intAlumbradoPublico 
                 * @return integer
                 */
                return $this->intAlumbradoPublico;

            case 'AguaCorriente':
                /**
                 * Gets the value for intAguaCorriente 
                 * @return integer
                 */
                return $this->intAguaCorriente;

            case 'AguaPotable':
                /**
                 * Gets the value for intAguaPotable 
                 * @return integer
                 */
                return $this->intAguaPotable;

            case 'RedCloacal':
                /**
                 * Gets the value for intRedCloacal 
                 * @return integer
                 */
                return $this->intRedCloacal;

            case 'SistAlternativoEliminacionExcretas':
                /**
                 * Gets the value for intSistAlternativoEliminacionExcretas 
                 * @return integer
                 */
                return $this->intSistAlternativoEliminacionExcretas;

            case 'RedGas':
                /**
                 * Gets the value for intRedGas 
                 * @return integer
                 */
                return $this->intRedGas;

            case 'Pavimento':
                /**
                 * Gets the value for intPavimento 
                 * @return integer
                 */
                return $this->intPavimento;

            case 'CordonCuneta':
                /**
                 * Gets the value for intCordonCuneta 
                 * @return integer
                 */
                return $this->intCordonCuneta;

            case 'DesaguesPluviales':
                /**
                 * Gets the value for intDesaguesPluviales 
                 * @return integer
                 */
                return $this->intDesaguesPluviales;

            case 'RecoleccionResiduos':
                /**
                 * Gets the value for intRecoleccionResiduos 
                 * @return integer
                 */
                return $this->intRecoleccionResiduos;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
                 * @return CondicionesSocioUrbanisticas
                 */
                try {
                    if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                        $this->objIdFolioObject = CondicionesSocioUrbanisticas::Load($this->intIdFolio);
                    return $this->objIdFolioObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'EnergiaElectricaMedidorIndividualObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intEnergiaElectricaMedidorIndividual 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objEnergiaElectricaMedidorIndividualObject) && (!is_null($this->intEnergiaElectricaMedidorIndividual)))
                        $this->objEnergiaElectricaMedidorIndividualObject = OpcionesInfraestructura::Load($this->intEnergiaElectricaMedidorIndividual);
                    return $this->objEnergiaElectricaMedidorIndividualObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'EnergiaElectricaMedidorColectivoObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intEnergiaElectricaMedidorColectivo 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objEnergiaElectricaMedidorColectivoObject) && (!is_null($this->intEnergiaElectricaMedidorColectivo)))
                        $this->objEnergiaElectricaMedidorColectivoObject = OpcionesInfraestructura::Load($this->intEnergiaElectricaMedidorColectivo);
                    return $this->objEnergiaElectricaMedidorColectivoObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'AlumbradoPublicoObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intAlumbradoPublico 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objAlumbradoPublicoObject) && (!is_null($this->intAlumbradoPublico)))
                        $this->objAlumbradoPublicoObject = OpcionesInfraestructura::Load($this->intAlumbradoPublico);
                    return $this->objAlumbradoPublicoObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'AguaCorrienteObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intAguaCorriente 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objAguaCorrienteObject) && (!is_null($this->intAguaCorriente)))
                        $this->objAguaCorrienteObject = OpcionesInfraestructura::Load($this->intAguaCorriente);
                    return $this->objAguaCorrienteObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'AguaPotableObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intAguaPotable 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objAguaPotableObject) && (!is_null($this->intAguaPotable)))
                        $this->objAguaPotableObject = OpcionesInfraestructura::Load($this->intAguaPotable);
                    return $this->objAguaPotableObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'RedCloacalObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intRedCloacal 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objRedCloacalObject) && (!is_null($this->intRedCloacal)))
                        $this->objRedCloacalObject = OpcionesInfraestructura::Load($this->intRedCloacal);
                    return $this->objRedCloacalObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'SistAlternativoEliminacionExcretasObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intSistAlternativoEliminacionExcretas 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objSistAlternativoEliminacionExcretasObject) && (!is_null($this->intSistAlternativoEliminacionExcretas)))
                        $this->objSistAlternativoEliminacionExcretasObject = OpcionesInfraestructura::Load($this->intSistAlternativoEliminacionExcretas);
                    return $this->objSistAlternativoEliminacionExcretasObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'RedGasObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intRedGas 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objRedGasObject) && (!is_null($this->intRedGas)))
                        $this->objRedGasObject = OpcionesInfraestructura::Load($this->intRedGas);
                    return $this->objRedGasObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'PavimentoObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intPavimento 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objPavimentoObject) && (!is_null($this->intPavimento)))
                        $this->objPavimentoObject = OpcionesInfraestructura::Load($this->intPavimento);
                    return $this->objPavimentoObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'CordonCunetaObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intCordonCuneta 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objCordonCunetaObject) && (!is_null($this->intCordonCuneta)))
                        $this->objCordonCunetaObject = OpcionesInfraestructura::Load($this->intCordonCuneta);
                    return $this->objCordonCunetaObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'DesaguesPluvialesObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intDesaguesPluviales 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objDesaguesPluvialesObject) && (!is_null($this->intDesaguesPluviales)))
                        $this->objDesaguesPluvialesObject = OpcionesInfraestructura::Load($this->intDesaguesPluviales);
                    return $this->objDesaguesPluvialesObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'RecoleccionResiduosObject':
                /**
                 * Gets the value for the OpcionesInfraestructura object referenced by intRecoleccionResiduos 
                 * @return OpcionesInfraestructura
                 */
                try {
                    if ((!$this->objRecoleccionResiduosObject) && (!is_null($this->intRecoleccionResiduos)))
                        $this->objRecoleccionResiduosObject = OpcionesInfraestructura::Load($this->intRecoleccionResiduos);
                    return $this->objRecoleccionResiduosObject;
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

				case 'EnergiaElectricaMedidorIndividual':
					/**
					 * Sets the value for intEnergiaElectricaMedidorIndividual 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEnergiaElectricaMedidorIndividualObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEnergiaElectricaMedidorIndividual = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEnergiaElectricaMedidorIndividual = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EnergiaElectricaMedidorColectivo':
					/**
					 * Sets the value for intEnergiaElectricaMedidorColectivo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEnergiaElectricaMedidorColectivoObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEnergiaElectricaMedidorColectivo = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEnergiaElectricaMedidorColectivo = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AlumbradoPublico':
					/**
					 * Sets the value for intAlumbradoPublico 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAlumbradoPublicoObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intAlumbradoPublico = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intAlumbradoPublico = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AguaCorriente':
					/**
					 * Sets the value for intAguaCorriente 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAguaCorrienteObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intAguaCorriente = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intAguaCorriente = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AguaPotable':
					/**
					 * Sets the value for intAguaPotable 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAguaPotableObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intAguaPotable = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intAguaPotable = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RedCloacal':
					/**
					 * Sets the value for intRedCloacal 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRedCloacalObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRedCloacal = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRedCloacal = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SistAlternativoEliminacionExcretas':
					/**
					 * Sets the value for intSistAlternativoEliminacionExcretas 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSistAlternativoEliminacionExcretasObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intSistAlternativoEliminacionExcretas = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intSistAlternativoEliminacionExcretas = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RedGas':
					/**
					 * Sets the value for intRedGas 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRedGasObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRedGas = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRedGas = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pavimento':
					/**
					 * Sets the value for intPavimento 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPavimentoObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intPavimento = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intPavimento = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CordonCuneta':
					/**
					 * Sets the value for intCordonCuneta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCordonCunetaObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intCordonCuneta = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intCordonCuneta = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DesaguesPluviales':
					/**
					 * Sets the value for intDesaguesPluviales 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDesaguesPluvialesObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intDesaguesPluviales = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intDesaguesPluviales = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RecoleccionResiduos':
					/**
					 * Sets the value for intRecoleccionResiduos 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRecoleccionResiduosObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intRecoleccionResiduos = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intRecoleccionResiduos = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the CondicionesSocioUrbanisticas object referenced by intIdFolio 
					 * @param CondicionesSocioUrbanisticas $mixValue
					 * @return CondicionesSocioUrbanisticas
					 */
					if (is_null($mixValue)) {
						$this->intIdFolio = null;
						$this->objIdFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CondicionesSocioUrbanisticas object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'CondicionesSocioUrbanisticas');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED CondicionesSocioUrbanisticas object
						//if (is_null($mixValue->IdFolio))
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this Infraestructura');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->IdFolio;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EnergiaElectricaMedidorIndividualObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intEnergiaElectricaMedidorIndividual 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intEnergiaElectricaMedidorIndividual = null;
						$this->objEnergiaElectricaMedidorIndividualObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved EnergiaElectricaMedidorIndividualObject for this Infraestructura');

						// Update Local Member Variables
						$this->objEnergiaElectricaMedidorIndividualObject = $mixValue;
						$this->intEnergiaElectricaMedidorIndividual = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EnergiaElectricaMedidorColectivoObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intEnergiaElectricaMedidorColectivo 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intEnergiaElectricaMedidorColectivo = null;
						$this->objEnergiaElectricaMedidorColectivoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved EnergiaElectricaMedidorColectivoObject for this Infraestructura');

						// Update Local Member Variables
						$this->objEnergiaElectricaMedidorColectivoObject = $mixValue;
						$this->intEnergiaElectricaMedidorColectivo = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AlumbradoPublicoObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intAlumbradoPublico 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intAlumbradoPublico = null;
						$this->objAlumbradoPublicoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved AlumbradoPublicoObject for this Infraestructura');

						// Update Local Member Variables
						$this->objAlumbradoPublicoObject = $mixValue;
						$this->intAlumbradoPublico = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AguaCorrienteObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intAguaCorriente 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intAguaCorriente = null;
						$this->objAguaCorrienteObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved AguaCorrienteObject for this Infraestructura');

						// Update Local Member Variables
						$this->objAguaCorrienteObject = $mixValue;
						$this->intAguaCorriente = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AguaPotableObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intAguaPotable 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intAguaPotable = null;
						$this->objAguaPotableObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved AguaPotableObject for this Infraestructura');

						// Update Local Member Variables
						$this->objAguaPotableObject = $mixValue;
						$this->intAguaPotable = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RedCloacalObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intRedCloacal 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intRedCloacal = null;
						$this->objRedCloacalObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved RedCloacalObject for this Infraestructura');

						// Update Local Member Variables
						$this->objRedCloacalObject = $mixValue;
						$this->intRedCloacal = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SistAlternativoEliminacionExcretasObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intSistAlternativoEliminacionExcretas 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intSistAlternativoEliminacionExcretas = null;
						$this->objSistAlternativoEliminacionExcretasObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved SistAlternativoEliminacionExcretasObject for this Infraestructura');

						// Update Local Member Variables
						$this->objSistAlternativoEliminacionExcretasObject = $mixValue;
						$this->intSistAlternativoEliminacionExcretas = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RedGasObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intRedGas 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intRedGas = null;
						$this->objRedGasObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved RedGasObject for this Infraestructura');

						// Update Local Member Variables
						$this->objRedGasObject = $mixValue;
						$this->intRedGas = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PavimentoObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intPavimento 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intPavimento = null;
						$this->objPavimentoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved PavimentoObject for this Infraestructura');

						// Update Local Member Variables
						$this->objPavimentoObject = $mixValue;
						$this->intPavimento = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CordonCunetaObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intCordonCuneta 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intCordonCuneta = null;
						$this->objCordonCunetaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved CordonCunetaObject for this Infraestructura');

						// Update Local Member Variables
						$this->objCordonCunetaObject = $mixValue;
						$this->intCordonCuneta = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DesaguesPluvialesObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intDesaguesPluviales 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intDesaguesPluviales = null;
						$this->objDesaguesPluvialesObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved DesaguesPluvialesObject for this Infraestructura');

						// Update Local Member Variables
						$this->objDesaguesPluvialesObject = $mixValue;
						$this->intDesaguesPluviales = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RecoleccionResiduosObject':
					/**
					 * Sets the value for the OpcionesInfraestructura object referenced by intRecoleccionResiduos 
					 * @param OpcionesInfraestructura $mixValue
					 * @return OpcionesInfraestructura
					 */
					if (is_null($mixValue)) {
						$this->intRecoleccionResiduos = null;
						$this->objRecoleccionResiduosObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesInfraestructura object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesInfraestructura');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesInfraestructura object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved RecoleccionResiduosObject for this Infraestructura');

						// Update Local Member Variables
						$this->objRecoleccionResiduosObject = $mixValue;
						$this->intRecoleccionResiduos = $mixValue->Id;

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
			$strToReturn = '<complexType name="Infraestructura"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:CondicionesSocioUrbanisticas"/>';
			$strToReturn .= '<element name="EnergiaElectricaMedidorIndividualObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="EnergiaElectricaMedidorColectivoObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="AlumbradoPublicoObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="AguaCorrienteObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="AguaPotableObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="RedCloacalObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="SistAlternativoEliminacionExcretasObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="RedGasObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="PavimentoObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="CordonCunetaObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="DesaguesPluvialesObject" type="xsd1:OpcionesInfraestructura"/>';
			$strToReturn .= '<element name="RecoleccionResiduosObject" type="xsd1:OpcionesInfraestructura"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Infraestructura', $strComplexTypeArray)) {
				$strComplexTypeArray['Infraestructura'] = Infraestructura::GetSoapComplexTypeXml();
				$strComplexTypeArray = CondicionesSocioUrbanisticas::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesInfraestructura::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Infraestructura::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Infraestructura();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = CondicionesSocioUrbanisticas::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if ((property_exists($objSoapObject, 'EnergiaElectricaMedidorIndividualObject')) &&
				($objSoapObject->EnergiaElectricaMedidorIndividualObject))
				$objToReturn->EnergiaElectricaMedidorIndividualObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->EnergiaElectricaMedidorIndividualObject);
			if ((property_exists($objSoapObject, 'EnergiaElectricaMedidorColectivoObject')) &&
				($objSoapObject->EnergiaElectricaMedidorColectivoObject))
				$objToReturn->EnergiaElectricaMedidorColectivoObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->EnergiaElectricaMedidorColectivoObject);
			if ((property_exists($objSoapObject, 'AlumbradoPublicoObject')) &&
				($objSoapObject->AlumbradoPublicoObject))
				$objToReturn->AlumbradoPublicoObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->AlumbradoPublicoObject);
			if ((property_exists($objSoapObject, 'AguaCorrienteObject')) &&
				($objSoapObject->AguaCorrienteObject))
				$objToReturn->AguaCorrienteObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->AguaCorrienteObject);
			if ((property_exists($objSoapObject, 'AguaPotableObject')) &&
				($objSoapObject->AguaPotableObject))
				$objToReturn->AguaPotableObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->AguaPotableObject);
			if ((property_exists($objSoapObject, 'RedCloacalObject')) &&
				($objSoapObject->RedCloacalObject))
				$objToReturn->RedCloacalObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->RedCloacalObject);
			if ((property_exists($objSoapObject, 'SistAlternativoEliminacionExcretasObject')) &&
				($objSoapObject->SistAlternativoEliminacionExcretasObject))
				$objToReturn->SistAlternativoEliminacionExcretasObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->SistAlternativoEliminacionExcretasObject);
			if ((property_exists($objSoapObject, 'RedGasObject')) &&
				($objSoapObject->RedGasObject))
				$objToReturn->RedGasObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->RedGasObject);
			if ((property_exists($objSoapObject, 'PavimentoObject')) &&
				($objSoapObject->PavimentoObject))
				$objToReturn->PavimentoObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->PavimentoObject);
			if ((property_exists($objSoapObject, 'CordonCunetaObject')) &&
				($objSoapObject->CordonCunetaObject))
				$objToReturn->CordonCunetaObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->CordonCunetaObject);
			if ((property_exists($objSoapObject, 'DesaguesPluvialesObject')) &&
				($objSoapObject->DesaguesPluvialesObject))
				$objToReturn->DesaguesPluvialesObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->DesaguesPluvialesObject);
			if ((property_exists($objSoapObject, 'RecoleccionResiduosObject')) &&
				($objSoapObject->RecoleccionResiduosObject))
				$objToReturn->RecoleccionResiduosObject = OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject->RecoleccionResiduosObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Infraestructura::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = CondicionesSocioUrbanisticas::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->objEnergiaElectricaMedidorIndividualObject)
				$objObject->objEnergiaElectricaMedidorIndividualObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objEnergiaElectricaMedidorIndividualObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEnergiaElectricaMedidorIndividual = null;
			if ($objObject->objEnergiaElectricaMedidorColectivoObject)
				$objObject->objEnergiaElectricaMedidorColectivoObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objEnergiaElectricaMedidorColectivoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEnergiaElectricaMedidorColectivo = null;
			if ($objObject->objAlumbradoPublicoObject)
				$objObject->objAlumbradoPublicoObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objAlumbradoPublicoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAlumbradoPublico = null;
			if ($objObject->objAguaCorrienteObject)
				$objObject->objAguaCorrienteObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objAguaCorrienteObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAguaCorriente = null;
			if ($objObject->objAguaPotableObject)
				$objObject->objAguaPotableObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objAguaPotableObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAguaPotable = null;
			if ($objObject->objRedCloacalObject)
				$objObject->objRedCloacalObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objRedCloacalObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRedCloacal = null;
			if ($objObject->objSistAlternativoEliminacionExcretasObject)
				$objObject->objSistAlternativoEliminacionExcretasObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objSistAlternativoEliminacionExcretasObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSistAlternativoEliminacionExcretas = null;
			if ($objObject->objRedGasObject)
				$objObject->objRedGasObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objRedGasObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRedGas = null;
			if ($objObject->objPavimentoObject)
				$objObject->objPavimentoObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objPavimentoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPavimento = null;
			if ($objObject->objCordonCunetaObject)
				$objObject->objCordonCunetaObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objCordonCunetaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCordonCuneta = null;
			if ($objObject->objDesaguesPluvialesObject)
				$objObject->objDesaguesPluvialesObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objDesaguesPluvialesObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDesaguesPluviales = null;
			if ($objObject->objRecoleccionResiduosObject)
				$objObject->objRecoleccionResiduosObject = OpcionesInfraestructura::GetSoapObjectFromObject($objObject->objRecoleccionResiduosObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRecoleccionResiduos = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>