<?php
/**
 * The abstract OpcionesInfraestructuraGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the OpcionesInfraestructura subclass which
 * extends this OpcionesInfraestructuraGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the OpcionesInfraestructura class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Opcion the value for strOpcion 
	 * @property-read Infraestructura $InfraestructuraAsEnergiaElectricaMedidorIndividual the value for the private _objInfraestructuraAsEnergiaElectricaMedidorIndividual (Read-Only) if set due to an expansion on the infraestructura.energia_electrica_medidor_individual reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsEnergiaElectricaMedidorIndividualArray the value for the private _objInfraestructuraAsEnergiaElectricaMedidorIndividualArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.energia_electrica_medidor_individual reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsEnergiaElectricaMedidorColectivo the value for the private _objInfraestructuraAsEnergiaElectricaMedidorColectivo (Read-Only) if set due to an expansion on the infraestructura.energia_electrica_medidor_colectivo reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsEnergiaElectricaMedidorColectivoArray the value for the private _objInfraestructuraAsEnergiaElectricaMedidorColectivoArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.energia_electrica_medidor_colectivo reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsAlumbradoPublico the value for the private _objInfraestructuraAsAlumbradoPublico (Read-Only) if set due to an expansion on the infraestructura.alumbrado_publico reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsAlumbradoPublicoArray the value for the private _objInfraestructuraAsAlumbradoPublicoArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.alumbrado_publico reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsAguaCorriente the value for the private _objInfraestructuraAsAguaCorriente (Read-Only) if set due to an expansion on the infraestructura.agua_corriente reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsAguaCorrienteArray the value for the private _objInfraestructuraAsAguaCorrienteArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.agua_corriente reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsAguaPotable the value for the private _objInfraestructuraAsAguaPotable (Read-Only) if set due to an expansion on the infraestructura.agua_potable reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsAguaPotableArray the value for the private _objInfraestructuraAsAguaPotableArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.agua_potable reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsRedCloacal the value for the private _objInfraestructuraAsRedCloacal (Read-Only) if set due to an expansion on the infraestructura.red_cloacal reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsRedCloacalArray the value for the private _objInfraestructuraAsRedCloacalArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.red_cloacal reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsSistAlternativoEliminacionExcretas the value for the private _objInfraestructuraAsSistAlternativoEliminacionExcretas (Read-Only) if set due to an expansion on the infraestructura.sist_alternativo_eliminacion_excretas reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsSistAlternativoEliminacionExcretasArray the value for the private _objInfraestructuraAsSistAlternativoEliminacionExcretasArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.sist_alternativo_eliminacion_excretas reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsRedGas the value for the private _objInfraestructuraAsRedGas (Read-Only) if set due to an expansion on the infraestructura.red_gas reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsRedGasArray the value for the private _objInfraestructuraAsRedGasArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.red_gas reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsPavimento the value for the private _objInfraestructuraAsPavimento (Read-Only) if set due to an expansion on the infraestructura.pavimento reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsPavimentoArray the value for the private _objInfraestructuraAsPavimentoArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.pavimento reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsCordonCuneta the value for the private _objInfraestructuraAsCordonCuneta (Read-Only) if set due to an expansion on the infraestructura.cordon_cuneta reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsCordonCunetaArray the value for the private _objInfraestructuraAsCordonCunetaArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.cordon_cuneta reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsDesaguesPluviales the value for the private _objInfraestructuraAsDesaguesPluviales (Read-Only) if set due to an expansion on the infraestructura.desagues_pluviales reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsDesaguesPluvialesArray the value for the private _objInfraestructuraAsDesaguesPluvialesArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.desagues_pluviales reverse relationship
	 * @property-read Infraestructura $InfraestructuraAsRecoleccionResiduos the value for the private _objInfraestructuraAsRecoleccionResiduos (Read-Only) if set due to an expansion on the infraestructura.recoleccion_residuos reverse relationship
	 * @property-read Infraestructura[] $InfraestructuraAsRecoleccionResiduosArray the value for the private _objInfraestructuraAsRecoleccionResiduosArray (Read-Only) if set due to an ExpandAsArray on the infraestructura.recoleccion_residuos reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class OpcionesInfraestructuraGen extends QBaseClass {

    public static function Noun() {
        return 'OpcionesInfraestructura';
    }
    public static function NounPlural() {
        return 'OpcionesInfraestructuras';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column opciones_infraestructura.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'opciones_infraestructura_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column opciones_infraestructura.opcion
     * @var string strOpcion
     */
    protected $strOpcion;
    const OpcionMaxLength = 45;
    const OpcionDefault = null;


    /**
     * Private member variable that stores a reference to a single InfraestructuraAsEnergiaElectricaMedidorIndividual object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsEnergiaElectricaMedidorIndividual;
     */
    protected $objInfraestructuraAsEnergiaElectricaMedidorIndividual;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsEnergiaElectricaMedidorIndividual objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsEnergiaElectricaMedidorIndividualArray;
     */
    protected $objInfraestructuraAsEnergiaElectricaMedidorIndividualArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsEnergiaElectricaMedidorColectivo object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsEnergiaElectricaMedidorColectivo;
     */
    protected $objInfraestructuraAsEnergiaElectricaMedidorColectivo;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsEnergiaElectricaMedidorColectivo objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsEnergiaElectricaMedidorColectivoArray;
     */
    protected $objInfraestructuraAsEnergiaElectricaMedidorColectivoArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsAlumbradoPublico object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsAlumbradoPublico;
     */
    protected $objInfraestructuraAsAlumbradoPublico;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsAlumbradoPublico objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsAlumbradoPublicoArray;
     */
    protected $objInfraestructuraAsAlumbradoPublicoArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsAguaCorriente object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsAguaCorriente;
     */
    protected $objInfraestructuraAsAguaCorriente;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsAguaCorriente objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsAguaCorrienteArray;
     */
    protected $objInfraestructuraAsAguaCorrienteArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsAguaPotable object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsAguaPotable;
     */
    protected $objInfraestructuraAsAguaPotable;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsAguaPotable objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsAguaPotableArray;
     */
    protected $objInfraestructuraAsAguaPotableArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsRedCloacal object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsRedCloacal;
     */
    protected $objInfraestructuraAsRedCloacal;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsRedCloacal objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsRedCloacalArray;
     */
    protected $objInfraestructuraAsRedCloacalArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsSistAlternativoEliminacionExcretas object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsSistAlternativoEliminacionExcretas;
     */
    protected $objInfraestructuraAsSistAlternativoEliminacionExcretas;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsSistAlternativoEliminacionExcretas objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsSistAlternativoEliminacionExcretasArray;
     */
    protected $objInfraestructuraAsSistAlternativoEliminacionExcretasArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsRedGas object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsRedGas;
     */
    protected $objInfraestructuraAsRedGas;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsRedGas objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsRedGasArray;
     */
    protected $objInfraestructuraAsRedGasArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsPavimento object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsPavimento;
     */
    protected $objInfraestructuraAsPavimento;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsPavimento objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsPavimentoArray;
     */
    protected $objInfraestructuraAsPavimentoArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsCordonCuneta object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsCordonCuneta;
     */
    protected $objInfraestructuraAsCordonCuneta;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsCordonCuneta objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsCordonCunetaArray;
     */
    protected $objInfraestructuraAsCordonCunetaArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsDesaguesPluviales object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsDesaguesPluviales;
     */
    protected $objInfraestructuraAsDesaguesPluviales;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsDesaguesPluviales objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsDesaguesPluvialesArray;
     */
    protected $objInfraestructuraAsDesaguesPluvialesArray;

    /**
     * Private member variable that stores a reference to a single InfraestructuraAsRecoleccionResiduos object
     * (of type Infraestructura), if this OpcionesInfraestructura object was restored with
     * an expansion on the infraestructura association table.
     * @var Infraestructura _objInfraestructuraAsRecoleccionResiduos;
     */
    protected $objInfraestructuraAsRecoleccionResiduos;

    /**
     * Private member variable that stores a reference to an array of InfraestructuraAsRecoleccionResiduos objects
     * (of type Infraestructura[]), if this OpcionesInfraestructura object was restored with
     * an ExpandAsArray on the infraestructura association table.
     * @var Infraestructura[] _objInfraestructuraAsRecoleccionResiduosArray;
     */
    protected $objInfraestructuraAsRecoleccionResiduosArray;

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
                protected static $_objOpcionesInfraestructuraArray = array();


		/**
		 * Load a OpcionesInfraestructura from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return OpcionesInfraestructura
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  OpcionesInfraestructura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesInfraestructura()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objOpcionesInfraestructuraArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpOpcionesInfraestructura = OpcionesInfraestructura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesInfraestructura()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objOpcionesInfraestructuraArray["$intId"] = $objTmpOpcionesInfraestructura;
            }
                        }
                        return isset(self::$_objOpcionesInfraestructuraArray["$intId"])?self::$_objOpcionesInfraestructuraArray["$intId"]:null;
		}

		/**
		 * Load all OpcionesInfraestructuras
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesInfraestructura[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OpcionesInfraestructura::QueryArray to perform the LoadAll query
			try {
				return OpcionesInfraestructura::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OpcionesInfraestructuras
		 * @return int
		 */
		public static function CountAll() {
			// Call OpcionesInfraestructura::QueryCount to perform the CountAll query
			return OpcionesInfraestructura::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (OpcionesInfraestructura::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::OpcionesInfraestructura()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::OpcionesInfraestructura()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase OpcionesInfraestructura no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Create/Build out the QueryBuilder object with OpcionesInfraestructura-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'opciones_infraestructura');
			OpcionesInfraestructura::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('opciones_infraestructura');

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
		 * Static Qcubed Query method to query for a single OpcionesInfraestructura object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesInfraestructura the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesInfraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new OpcionesInfraestructura object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OpcionesInfraestructura::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = OpcionesInfraestructura::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of OpcionesInfraestructura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OpcionesInfraestructura[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesInfraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OpcionesInfraestructura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of OpcionesInfraestructura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OpcionesInfraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			$strQuery = OpcionesInfraestructura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/opcionesinfraestructura', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OpcionesInfraestructura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OpcionesInfraestructura
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'opciones_infraestructura';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'opcion', $strAliasPrefix . 'opcion');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a OpcionesInfraestructura from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OpcionesInfraestructura::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesInfraestructura
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
							$strAliasPrefix = 'opciones_infraestructura__';


						// Expanding reverse references: InfraestructuraAsEnergiaElectricaMedidorIndividual
						$strAlias = $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorindividual__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorindividual__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorindividual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsEnergiaElectricaMedidorColectivo
						$strAlias = $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorcolectivo__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorcolectivo__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorcolectivo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsAlumbradoPublico
						$strAlias = $strAliasPrefix . 'infraestructuraasalumbradopublico__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsAlumbradoPublicoArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsAlumbradoPublicoArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasalumbradopublico__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsAlumbradoPublicoArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsAlumbradoPublicoArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasalumbradopublico__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsAguaCorriente
						$strAlias = $strAliasPrefix . 'infraestructuraasaguacorriente__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsAguaCorrienteArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsAguaCorrienteArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguacorriente__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsAguaCorrienteArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsAguaCorrienteArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguacorriente__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsAguaPotable
						$strAlias = $strAliasPrefix . 'infraestructuraasaguapotable__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsAguaPotableArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsAguaPotableArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguapotable__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsAguaPotableArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsAguaPotableArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguapotable__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsRedCloacal
						$strAlias = $strAliasPrefix . 'infraestructuraasredcloacal__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsRedCloacalArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsRedCloacalArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredcloacal__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsRedCloacalArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsRedCloacalArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredcloacal__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsSistAlternativoEliminacionExcretas
						$strAlias = $strAliasPrefix . 'infraestructuraassistalternativoeliminacionexcretas__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsSistAlternativoEliminacionExcretasArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsSistAlternativoEliminacionExcretasArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraassistalternativoeliminacionexcretas__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsSistAlternativoEliminacionExcretasArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsSistAlternativoEliminacionExcretasArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraassistalternativoeliminacionexcretas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsRedGas
						$strAlias = $strAliasPrefix . 'infraestructuraasredgas__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsRedGasArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsRedGasArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredgas__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsRedGasArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsRedGasArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredgas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsPavimento
						$strAlias = $strAliasPrefix . 'infraestructuraaspavimento__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsPavimentoArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsPavimentoArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraaspavimento__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsPavimentoArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsPavimentoArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraaspavimento__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsCordonCuneta
						$strAlias = $strAliasPrefix . 'infraestructuraascordoncuneta__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsCordonCunetaArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsCordonCunetaArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraascordoncuneta__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsCordonCunetaArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsCordonCunetaArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraascordoncuneta__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsDesaguesPluviales
						$strAlias = $strAliasPrefix . 'infraestructuraasdesaguespluviales__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsDesaguesPluvialesArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsDesaguesPluvialesArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasdesaguespluviales__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsDesaguesPluvialesArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsDesaguesPluvialesArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasdesaguespluviales__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: InfraestructuraAsRecoleccionResiduos
						$strAlias = $strAliasPrefix . 'infraestructuraasrecoleccionresiduos__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->objInfraestructuraAsRecoleccionResiduosArray)) {
								$objPreviousChildItems = $objPreviousItem->objInfraestructuraAsRecoleccionResiduosArray;
								$objChildItem = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasrecoleccionresiduos__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->objInfraestructuraAsRecoleccionResiduosArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->objInfraestructuraAsRecoleccionResiduosArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasrecoleccionresiduos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'opciones_infraestructura__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the OpcionesInfraestructura object
			$objToReturn = new OpcionesInfraestructura();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'opcion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'opcion'] : $strAliasPrefix . 'opcion';
			$objToReturn->strOpcion = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray, $objToReturn->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray, $objToReturn->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsAlumbradoPublicoArray, $objToReturn->objInfraestructuraAsAlumbradoPublicoArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsAguaCorrienteArray, $objToReturn->objInfraestructuraAsAguaCorrienteArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsAguaPotableArray, $objToReturn->objInfraestructuraAsAguaPotableArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsRedCloacalArray, $objToReturn->objInfraestructuraAsRedCloacalArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsSistAlternativoEliminacionExcretasArray, $objToReturn->objInfraestructuraAsSistAlternativoEliminacionExcretasArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsRedGasArray, $objToReturn->objInfraestructuraAsRedGasArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsPavimentoArray, $objToReturn->objInfraestructuraAsPavimentoArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsCordonCunetaArray, $objToReturn->objInfraestructuraAsCordonCunetaArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsDesaguesPluvialesArray, $objToReturn->objInfraestructuraAsDesaguesPluvialesArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->objInfraestructuraAsRecoleccionResiduosArray, $objToReturn->objInfraestructuraAsRecoleccionResiduosArray) != null) {
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
				$strAliasPrefix = 'opciones_infraestructura__';




			// Check for InfraestructuraAsEnergiaElectricaMedidorIndividual Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorindividual__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorindividual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsEnergiaElectricaMedidorIndividual = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorindividual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsEnergiaElectricaMedidorColectivo Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorcolectivo__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorcolectivo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsEnergiaElectricaMedidorColectivo = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasenergiaelectricamedidorcolectivo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsAlumbradoPublico Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasalumbradopublico__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsAlumbradoPublicoArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasalumbradopublico__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsAlumbradoPublico = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasalumbradopublico__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsAguaCorriente Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasaguacorriente__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsAguaCorrienteArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguacorriente__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsAguaCorriente = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguacorriente__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsAguaPotable Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasaguapotable__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsAguaPotableArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguapotable__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsAguaPotable = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasaguapotable__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsRedCloacal Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasredcloacal__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsRedCloacalArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredcloacal__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsRedCloacal = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredcloacal__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsSistAlternativoEliminacionExcretas Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraassistalternativoeliminacionexcretas__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsSistAlternativoEliminacionExcretasArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraassistalternativoeliminacionexcretas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsSistAlternativoEliminacionExcretas = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraassistalternativoeliminacionexcretas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsRedGas Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasredgas__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsRedGasArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredgas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsRedGas = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasredgas__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsPavimento Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraaspavimento__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsPavimentoArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraaspavimento__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsPavimento = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraaspavimento__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsCordonCuneta Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraascordoncuneta__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsCordonCunetaArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraascordoncuneta__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsCordonCuneta = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraascordoncuneta__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsDesaguesPluviales Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasdesaguespluviales__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsDesaguesPluvialesArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasdesaguespluviales__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsDesaguesPluviales = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasdesaguespluviales__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InfraestructuraAsRecoleccionResiduos Virtual Binding
			$strAlias = $strAliasPrefix . 'infraestructuraasrecoleccionresiduos__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->objInfraestructuraAsRecoleccionResiduosArray[] = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasrecoleccionresiduos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->objInfraestructuraAsRecoleccionResiduos = Infraestructura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'infraestructuraasrecoleccionresiduos__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of OpcionesInfraestructuras from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return OpcionesInfraestructura[]
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
					$objItem = OpcionesInfraestructura::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OpcionesInfraestructura::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single OpcionesInfraestructura object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpcionesInfraestructura
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return OpcionesInfraestructura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OpcionesInfraestructura()->Id, $intId)
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
         * Save this OpcionesInfraestructura
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = OpcionesInfraestructura::GetDatabase();

            $mixToReturn = null;
            ///////////////////////////////////
            //Ver si Los Padres estan Guardados
            ///////////////////////////////////
            //Antes de guardar me fijo que los Padres tengan ID.

                    if ($this->intId && ($this->intId > QDatabaseNumberFieldMax::Integer || $this->intId < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intId', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "opciones_infraestructura" (
                            "opcion"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->strOpcion) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('opciones_infraestructura', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "opciones_infraestructura"
                        SET
                            "opcion" = ' . $objDatabase->SqlVariable($this->strOpcion) . '
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
		 * Delete this OpcionesInfraestructura
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OpcionesInfraestructura with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all OpcionesInfraestructuras
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"opciones_infraestructura"');
		}

		/**
		 * Truncate opciones_infraestructura table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "opciones_infraestructura" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this OpcionesInfraestructura from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OpcionesInfraestructura object.');

			// Reload the Object
			$objReloaded = OpcionesInfraestructura::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->strOpcion = $objReloaded->strOpcion;
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

            case 'Opcion':
                /**
                 * Gets the value for strOpcion 
                 * @return string
                 */
                return $this->strOpcion;


            ///////////////////
            // Member Objects
            ///////////////////

            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case 'InfraestructuraAsEnergiaElectricaMedidorIndividual':
                /**
                 * Gets the value for the private _objInfraestructuraAsEnergiaElectricaMedidorIndividual (Read-Only)
                 * if set due to an expansion on the infraestructura.energia_electrica_medidor_individual reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsEnergiaElectricaMedidorIndividual;

            case 'InfraestructuraAsEnergiaElectricaMedidorIndividualArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsEnergiaElectricaMedidorIndividualArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.energia_electrica_medidor_individual reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray))
                    $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray = $this->GetInfraestructuraAsEnergiaElectricaMedidorIndividualArray();
                return (array) $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray;

            case 'InfraestructuraAsEnergiaElectricaMedidorColectivo':
                /**
                 * Gets the value for the private _objInfraestructuraAsEnergiaElectricaMedidorColectivo (Read-Only)
                 * if set due to an expansion on the infraestructura.energia_electrica_medidor_colectivo reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsEnergiaElectricaMedidorColectivo;

            case 'InfraestructuraAsEnergiaElectricaMedidorColectivoArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsEnergiaElectricaMedidorColectivoArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.energia_electrica_medidor_colectivo reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray))
                    $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray = $this->GetInfraestructuraAsEnergiaElectricaMedidorColectivoArray();
                return (array) $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray;

            case 'InfraestructuraAsAlumbradoPublico':
                /**
                 * Gets the value for the private _objInfraestructuraAsAlumbradoPublico (Read-Only)
                 * if set due to an expansion on the infraestructura.alumbrado_publico reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsAlumbradoPublico;

            case 'InfraestructuraAsAlumbradoPublicoArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsAlumbradoPublicoArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.alumbrado_publico reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsAlumbradoPublicoArray))
                    $this->objInfraestructuraAsAlumbradoPublicoArray = $this->GetInfraestructuraAsAlumbradoPublicoArray();
                return (array) $this->objInfraestructuraAsAlumbradoPublicoArray;

            case 'InfraestructuraAsAguaCorriente':
                /**
                 * Gets the value for the private _objInfraestructuraAsAguaCorriente (Read-Only)
                 * if set due to an expansion on the infraestructura.agua_corriente reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsAguaCorriente;

            case 'InfraestructuraAsAguaCorrienteArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsAguaCorrienteArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.agua_corriente reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsAguaCorrienteArray))
                    $this->objInfraestructuraAsAguaCorrienteArray = $this->GetInfraestructuraAsAguaCorrienteArray();
                return (array) $this->objInfraestructuraAsAguaCorrienteArray;

            case 'InfraestructuraAsAguaPotable':
                /**
                 * Gets the value for the private _objInfraestructuraAsAguaPotable (Read-Only)
                 * if set due to an expansion on the infraestructura.agua_potable reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsAguaPotable;

            case 'InfraestructuraAsAguaPotableArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsAguaPotableArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.agua_potable reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsAguaPotableArray))
                    $this->objInfraestructuraAsAguaPotableArray = $this->GetInfraestructuraAsAguaPotableArray();
                return (array) $this->objInfraestructuraAsAguaPotableArray;

            case 'InfraestructuraAsRedCloacal':
                /**
                 * Gets the value for the private _objInfraestructuraAsRedCloacal (Read-Only)
                 * if set due to an expansion on the infraestructura.red_cloacal reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsRedCloacal;

            case 'InfraestructuraAsRedCloacalArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsRedCloacalArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.red_cloacal reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsRedCloacalArray))
                    $this->objInfraestructuraAsRedCloacalArray = $this->GetInfraestructuraAsRedCloacalArray();
                return (array) $this->objInfraestructuraAsRedCloacalArray;

            case 'InfraestructuraAsSistAlternativoEliminacionExcretas':
                /**
                 * Gets the value for the private _objInfraestructuraAsSistAlternativoEliminacionExcretas (Read-Only)
                 * if set due to an expansion on the infraestructura.sist_alternativo_eliminacion_excretas reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsSistAlternativoEliminacionExcretas;

            case 'InfraestructuraAsSistAlternativoEliminacionExcretasArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsSistAlternativoEliminacionExcretasArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.sist_alternativo_eliminacion_excretas reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray))
                    $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray = $this->GetInfraestructuraAsSistAlternativoEliminacionExcretasArray();
                return (array) $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray;

            case 'InfraestructuraAsRedGas':
                /**
                 * Gets the value for the private _objInfraestructuraAsRedGas (Read-Only)
                 * if set due to an expansion on the infraestructura.red_gas reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsRedGas;

            case 'InfraestructuraAsRedGasArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsRedGasArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.red_gas reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsRedGasArray))
                    $this->objInfraestructuraAsRedGasArray = $this->GetInfraestructuraAsRedGasArray();
                return (array) $this->objInfraestructuraAsRedGasArray;

            case 'InfraestructuraAsPavimento':
                /**
                 * Gets the value for the private _objInfraestructuraAsPavimento (Read-Only)
                 * if set due to an expansion on the infraestructura.pavimento reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsPavimento;

            case 'InfraestructuraAsPavimentoArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsPavimentoArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.pavimento reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsPavimentoArray))
                    $this->objInfraestructuraAsPavimentoArray = $this->GetInfraestructuraAsPavimentoArray();
                return (array) $this->objInfraestructuraAsPavimentoArray;

            case 'InfraestructuraAsCordonCuneta':
                /**
                 * Gets the value for the private _objInfraestructuraAsCordonCuneta (Read-Only)
                 * if set due to an expansion on the infraestructura.cordon_cuneta reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsCordonCuneta;

            case 'InfraestructuraAsCordonCunetaArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsCordonCunetaArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.cordon_cuneta reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsCordonCunetaArray))
                    $this->objInfraestructuraAsCordonCunetaArray = $this->GetInfraestructuraAsCordonCunetaArray();
                return (array) $this->objInfraestructuraAsCordonCunetaArray;

            case 'InfraestructuraAsDesaguesPluviales':
                /**
                 * Gets the value for the private _objInfraestructuraAsDesaguesPluviales (Read-Only)
                 * if set due to an expansion on the infraestructura.desagues_pluviales reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsDesaguesPluviales;

            case 'InfraestructuraAsDesaguesPluvialesArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsDesaguesPluvialesArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.desagues_pluviales reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsDesaguesPluvialesArray))
                    $this->objInfraestructuraAsDesaguesPluvialesArray = $this->GetInfraestructuraAsDesaguesPluvialesArray();
                return (array) $this->objInfraestructuraAsDesaguesPluvialesArray;

            case 'InfraestructuraAsRecoleccionResiduos':
                /**
                 * Gets the value for the private _objInfraestructuraAsRecoleccionResiduos (Read-Only)
                 * if set due to an expansion on the infraestructura.recoleccion_residuos reverse relationship
                 * @return Infraestructura
                 */
                return $this->objInfraestructuraAsRecoleccionResiduos;

            case 'InfraestructuraAsRecoleccionResiduosArray':
                /**
                 * Gets the value for the private _objInfraestructuraAsRecoleccionResiduosArray (Read-Only)
                 * if set due to an ExpandAsArray on the infraestructura.recoleccion_residuos reverse relationship
                 * @return Infraestructura[]
                 */
                if(is_null($this->objInfraestructuraAsRecoleccionResiduosArray))
                    $this->objInfraestructuraAsRecoleccionResiduosArray = $this->GetInfraestructuraAsRecoleccionResiduosArray();
                return (array) $this->objInfraestructuraAsRecoleccionResiduosArray;


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
				case 'Opcion':
					/**
					 * Sets the value for strOpcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOpcion = QType::Cast($mixValue, QType::String));
                                                return ($this->strOpcion = $mixValue);
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
        
			
		
		// Related Objects' Methods for InfraestructuraAsEnergiaElectricaMedidorIndividual
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsEnergiaElectricaMedidorIndividualArray
                /**
                * Add a Item to the _InfraestructuraAsEnergiaElectricaMedidorIndividualArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsEnergiaElectricaMedidorIndividual(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->EnergiaElectricaMedidorIndividualObject = $this;
                    $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray = $this->InfraestructuraAsEnergiaElectricaMedidorIndividualArray;
                    $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsEnergiaElectricaMedidorIndividual($objItem);

                    return $this->InfraestructuraAsEnergiaElectricaMedidorIndividualArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsEnergiaElectricaMedidorIndividualArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsEnergiaElectricaMedidorIndividual(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray;
                    $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->EnergiaElectricaMedidorIndividualObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsEnergiaElectricaMedidorIndividual($objItem);
                        }

                    return $this->objInfraestructuraAsEnergiaElectricaMedidorIndividualArray;
                }

		/**
		 * Gets all associated InfraestructurasAsEnergiaElectricaMedidorIndividual as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsEnergiaElectricaMedidorIndividualArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByEnergiaElectricaMedidorIndividual($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsEnergiaElectricaMedidorIndividual
		 * @return int
		*/ 
		public function CountInfraestructurasAsEnergiaElectricaMedidorIndividual() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByEnergiaElectricaMedidorIndividual($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsEnergiaElectricaMedidorIndividual
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsEnergiaElectricaMedidorIndividual(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"energia_electrica_medidor_individual" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsEnergiaElectricaMedidorIndividual
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"energia_electrica_medidor_individual" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"energia_electrica_medidor_individual" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsEnergiaElectricaMedidorIndividual
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsEnergiaElectricaMedidorIndividual() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"energia_electrica_medidor_individual" = null
				WHERE
					"energia_electrica_medidor_individual" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsEnergiaElectricaMedidorIndividual
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsEnergiaElectricaMedidorIndividual(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"energia_electrica_medidor_individual" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsEnergiaElectricaMedidorIndividual
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsEnergiaElectricaMedidorIndividual() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorIndividual on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"energia_electrica_medidor_individual" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsEnergiaElectricaMedidorColectivo
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsEnergiaElectricaMedidorColectivoArray
                /**
                * Add a Item to the _InfraestructuraAsEnergiaElectricaMedidorColectivoArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsEnergiaElectricaMedidorColectivo(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->EnergiaElectricaMedidorColectivoObject = $this;
                    $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray = $this->InfraestructuraAsEnergiaElectricaMedidorColectivoArray;
                    $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsEnergiaElectricaMedidorColectivo($objItem);

                    return $this->InfraestructuraAsEnergiaElectricaMedidorColectivoArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsEnergiaElectricaMedidorColectivoArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsEnergiaElectricaMedidorColectivo(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray;
                    $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->EnergiaElectricaMedidorColectivoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsEnergiaElectricaMedidorColectivo($objItem);
                        }

                    return $this->objInfraestructuraAsEnergiaElectricaMedidorColectivoArray;
                }

		/**
		 * Gets all associated InfraestructurasAsEnergiaElectricaMedidorColectivo as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsEnergiaElectricaMedidorColectivoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByEnergiaElectricaMedidorColectivo($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsEnergiaElectricaMedidorColectivo
		 * @return int
		*/ 
		public function CountInfraestructurasAsEnergiaElectricaMedidorColectivo() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByEnergiaElectricaMedidorColectivo($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsEnergiaElectricaMedidorColectivo
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsEnergiaElectricaMedidorColectivo(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"energia_electrica_medidor_colectivo" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsEnergiaElectricaMedidorColectivo
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"energia_electrica_medidor_colectivo" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"energia_electrica_medidor_colectivo" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsEnergiaElectricaMedidorColectivo
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsEnergiaElectricaMedidorColectivo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"energia_electrica_medidor_colectivo" = null
				WHERE
					"energia_electrica_medidor_colectivo" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsEnergiaElectricaMedidorColectivo
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsEnergiaElectricaMedidorColectivo(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"energia_electrica_medidor_colectivo" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsEnergiaElectricaMedidorColectivo
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsEnergiaElectricaMedidorColectivo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsEnergiaElectricaMedidorColectivo on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"energia_electrica_medidor_colectivo" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsAlumbradoPublico
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsAlumbradoPublicoArray
                /**
                * Add a Item to the _InfraestructuraAsAlumbradoPublicoArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsAlumbradoPublico(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->AlumbradoPublicoObject = $this;
                    $this->objInfraestructuraAsAlumbradoPublicoArray = $this->InfraestructuraAsAlumbradoPublicoArray;
                    $this->objInfraestructuraAsAlumbradoPublicoArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsAlumbradoPublico($objItem);

                    return $this->InfraestructuraAsAlumbradoPublicoArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsAlumbradoPublicoArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsAlumbradoPublico(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsAlumbradoPublicoArray;
                    $this->objInfraestructuraAsAlumbradoPublicoArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsAlumbradoPublicoArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->AlumbradoPublicoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsAlumbradoPublico($objItem);
                        }

                    return $this->objInfraestructuraAsAlumbradoPublicoArray;
                }

		/**
		 * Gets all associated InfraestructurasAsAlumbradoPublico as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsAlumbradoPublicoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByAlumbradoPublico($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsAlumbradoPublico
		 * @return int
		*/ 
		public function CountInfraestructurasAsAlumbradoPublico() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByAlumbradoPublico($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsAlumbradoPublico
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsAlumbradoPublico(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsAlumbradoPublico on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsAlumbradoPublico on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"alumbrado_publico" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsAlumbradoPublico
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsAlumbradoPublico(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAlumbradoPublico on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAlumbradoPublico on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"alumbrado_publico" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"alumbrado_publico" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsAlumbradoPublico
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsAlumbradoPublico() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAlumbradoPublico on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"alumbrado_publico" = null
				WHERE
					"alumbrado_publico" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsAlumbradoPublico
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsAlumbradoPublico(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAlumbradoPublico on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAlumbradoPublico on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"alumbrado_publico" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsAlumbradoPublico
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsAlumbradoPublico() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAlumbradoPublico on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"alumbrado_publico" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsAguaCorriente
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsAguaCorrienteArray
                /**
                * Add a Item to the _InfraestructuraAsAguaCorrienteArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsAguaCorriente(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->AguaCorrienteObject = $this;
                    $this->objInfraestructuraAsAguaCorrienteArray = $this->InfraestructuraAsAguaCorrienteArray;
                    $this->objInfraestructuraAsAguaCorrienteArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsAguaCorriente($objItem);

                    return $this->InfraestructuraAsAguaCorrienteArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsAguaCorrienteArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsAguaCorriente(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsAguaCorrienteArray;
                    $this->objInfraestructuraAsAguaCorrienteArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsAguaCorrienteArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->AguaCorrienteObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsAguaCorriente($objItem);
                        }

                    return $this->objInfraestructuraAsAguaCorrienteArray;
                }

		/**
		 * Gets all associated InfraestructurasAsAguaCorriente as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsAguaCorrienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByAguaCorriente($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsAguaCorriente
		 * @return int
		*/ 
		public function CountInfraestructurasAsAguaCorriente() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByAguaCorriente($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsAguaCorriente
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsAguaCorriente(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsAguaCorriente on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsAguaCorriente on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"agua_corriente" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsAguaCorriente
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsAguaCorriente(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaCorriente on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaCorriente on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"agua_corriente" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"agua_corriente" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsAguaCorriente
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsAguaCorriente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaCorriente on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"agua_corriente" = null
				WHERE
					"agua_corriente" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsAguaCorriente
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsAguaCorriente(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaCorriente on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaCorriente on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"agua_corriente" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsAguaCorriente
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsAguaCorriente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaCorriente on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"agua_corriente" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsAguaPotable
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsAguaPotableArray
                /**
                * Add a Item to the _InfraestructuraAsAguaPotableArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsAguaPotable(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->AguaPotableObject = $this;
                    $this->objInfraestructuraAsAguaPotableArray = $this->InfraestructuraAsAguaPotableArray;
                    $this->objInfraestructuraAsAguaPotableArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsAguaPotable($objItem);

                    return $this->InfraestructuraAsAguaPotableArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsAguaPotableArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsAguaPotable(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsAguaPotableArray;
                    $this->objInfraestructuraAsAguaPotableArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsAguaPotableArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->AguaPotableObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsAguaPotable($objItem);
                        }

                    return $this->objInfraestructuraAsAguaPotableArray;
                }

		/**
		 * Gets all associated InfraestructurasAsAguaPotable as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsAguaPotableArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByAguaPotable($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsAguaPotable
		 * @return int
		*/ 
		public function CountInfraestructurasAsAguaPotable() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByAguaPotable($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsAguaPotable
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsAguaPotable(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsAguaPotable on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsAguaPotable on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"agua_potable" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsAguaPotable
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsAguaPotable(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaPotable on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaPotable on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"agua_potable" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"agua_potable" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsAguaPotable
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsAguaPotable() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaPotable on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"agua_potable" = null
				WHERE
					"agua_potable" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsAguaPotable
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsAguaPotable(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaPotable on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaPotable on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"agua_potable" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsAguaPotable
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsAguaPotable() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsAguaPotable on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"agua_potable" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsRedCloacal
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsRedCloacalArray
                /**
                * Add a Item to the _InfraestructuraAsRedCloacalArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsRedCloacal(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->RedCloacalObject = $this;
                    $this->objInfraestructuraAsRedCloacalArray = $this->InfraestructuraAsRedCloacalArray;
                    $this->objInfraestructuraAsRedCloacalArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsRedCloacal($objItem);

                    return $this->InfraestructuraAsRedCloacalArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsRedCloacalArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsRedCloacal(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsRedCloacalArray;
                    $this->objInfraestructuraAsRedCloacalArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsRedCloacalArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->RedCloacalObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsRedCloacal($objItem);
                        }

                    return $this->objInfraestructuraAsRedCloacalArray;
                }

		/**
		 * Gets all associated InfraestructurasAsRedCloacal as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsRedCloacalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByRedCloacal($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsRedCloacal
		 * @return int
		*/ 
		public function CountInfraestructurasAsRedCloacal() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByRedCloacal($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsRedCloacal
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsRedCloacal(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsRedCloacal on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsRedCloacal on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"red_cloacal" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsRedCloacal
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsRedCloacal(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedCloacal on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedCloacal on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"red_cloacal" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"red_cloacal" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsRedCloacal
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsRedCloacal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedCloacal on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"red_cloacal" = null
				WHERE
					"red_cloacal" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsRedCloacal
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsRedCloacal(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedCloacal on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedCloacal on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"red_cloacal" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsRedCloacal
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsRedCloacal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedCloacal on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"red_cloacal" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsSistAlternativoEliminacionExcretas
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsSistAlternativoEliminacionExcretasArray
                /**
                * Add a Item to the _InfraestructuraAsSistAlternativoEliminacionExcretasArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsSistAlternativoEliminacionExcretas(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->SistAlternativoEliminacionExcretasObject = $this;
                    $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray = $this->InfraestructuraAsSistAlternativoEliminacionExcretasArray;
                    $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsSistAlternativoEliminacionExcretas($objItem);

                    return $this->InfraestructuraAsSistAlternativoEliminacionExcretasArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsSistAlternativoEliminacionExcretasArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsSistAlternativoEliminacionExcretas(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray;
                    $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->SistAlternativoEliminacionExcretasObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsSistAlternativoEliminacionExcretas($objItem);
                        }

                    return $this->objInfraestructuraAsSistAlternativoEliminacionExcretasArray;
                }

		/**
		 * Gets all associated InfraestructurasAsSistAlternativoEliminacionExcretas as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsSistAlternativoEliminacionExcretasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayBySistAlternativoEliminacionExcretas($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsSistAlternativoEliminacionExcretas
		 * @return int
		*/ 
		public function CountInfraestructurasAsSistAlternativoEliminacionExcretas() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountBySistAlternativoEliminacionExcretas($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsSistAlternativoEliminacionExcretas
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsSistAlternativoEliminacionExcretas(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsSistAlternativoEliminacionExcretas on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsSistAlternativoEliminacionExcretas on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"sist_alternativo_eliminacion_excretas" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsSistAlternativoEliminacionExcretas
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"sist_alternativo_eliminacion_excretas" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"sist_alternativo_eliminacion_excretas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsSistAlternativoEliminacionExcretas
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsSistAlternativoEliminacionExcretas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"sist_alternativo_eliminacion_excretas" = null
				WHERE
					"sist_alternativo_eliminacion_excretas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsSistAlternativoEliminacionExcretas
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsSistAlternativoEliminacionExcretas(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"sist_alternativo_eliminacion_excretas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsSistAlternativoEliminacionExcretas
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsSistAlternativoEliminacionExcretas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsSistAlternativoEliminacionExcretas on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"sist_alternativo_eliminacion_excretas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsRedGas
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsRedGasArray
                /**
                * Add a Item to the _InfraestructuraAsRedGasArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsRedGas(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->RedGasObject = $this;
                    $this->objInfraestructuraAsRedGasArray = $this->InfraestructuraAsRedGasArray;
                    $this->objInfraestructuraAsRedGasArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsRedGas($objItem);

                    return $this->InfraestructuraAsRedGasArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsRedGasArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsRedGas(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsRedGasArray;
                    $this->objInfraestructuraAsRedGasArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsRedGasArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->RedGasObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsRedGas($objItem);
                        }

                    return $this->objInfraestructuraAsRedGasArray;
                }

		/**
		 * Gets all associated InfraestructurasAsRedGas as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsRedGasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByRedGas($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsRedGas
		 * @return int
		*/ 
		public function CountInfraestructurasAsRedGas() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByRedGas($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsRedGas
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsRedGas(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsRedGas on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsRedGas on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"red_gas" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsRedGas
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsRedGas(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedGas on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedGas on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"red_gas" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"red_gas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsRedGas
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsRedGas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedGas on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"red_gas" = null
				WHERE
					"red_gas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsRedGas
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsRedGas(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedGas on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedGas on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"red_gas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsRedGas
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsRedGas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRedGas on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"red_gas" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsPavimento
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsPavimentoArray
                /**
                * Add a Item to the _InfraestructuraAsPavimentoArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsPavimento(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->PavimentoObject = $this;
                    $this->objInfraestructuraAsPavimentoArray = $this->InfraestructuraAsPavimentoArray;
                    $this->objInfraestructuraAsPavimentoArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsPavimento($objItem);

                    return $this->InfraestructuraAsPavimentoArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsPavimentoArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsPavimento(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsPavimentoArray;
                    $this->objInfraestructuraAsPavimentoArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsPavimentoArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->PavimentoObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsPavimento($objItem);
                        }

                    return $this->objInfraestructuraAsPavimentoArray;
                }

		/**
		 * Gets all associated InfraestructurasAsPavimento as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsPavimentoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByPavimento($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsPavimento
		 * @return int
		*/ 
		public function CountInfraestructurasAsPavimento() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByPavimento($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsPavimento
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsPavimento(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsPavimento on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsPavimento on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"pavimento" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsPavimento
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsPavimento(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsPavimento on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsPavimento on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"pavimento" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"pavimento" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsPavimento
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsPavimento() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsPavimento on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"pavimento" = null
				WHERE
					"pavimento" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsPavimento
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsPavimento(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsPavimento on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsPavimento on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"pavimento" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsPavimento
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsPavimento() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsPavimento on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"pavimento" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsCordonCuneta
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsCordonCunetaArray
                /**
                * Add a Item to the _InfraestructuraAsCordonCunetaArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsCordonCuneta(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->CordonCunetaObject = $this;
                    $this->objInfraestructuraAsCordonCunetaArray = $this->InfraestructuraAsCordonCunetaArray;
                    $this->objInfraestructuraAsCordonCunetaArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsCordonCuneta($objItem);

                    return $this->InfraestructuraAsCordonCunetaArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsCordonCunetaArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsCordonCuneta(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsCordonCunetaArray;
                    $this->objInfraestructuraAsCordonCunetaArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsCordonCunetaArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->CordonCunetaObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsCordonCuneta($objItem);
                        }

                    return $this->objInfraestructuraAsCordonCunetaArray;
                }

		/**
		 * Gets all associated InfraestructurasAsCordonCuneta as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsCordonCunetaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByCordonCuneta($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsCordonCuneta
		 * @return int
		*/ 
		public function CountInfraestructurasAsCordonCuneta() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByCordonCuneta($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsCordonCuneta
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsCordonCuneta(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsCordonCuneta on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsCordonCuneta on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"cordon_cuneta" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsCordonCuneta
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsCordonCuneta(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsCordonCuneta on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsCordonCuneta on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"cordon_cuneta" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"cordon_cuneta" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsCordonCuneta
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsCordonCuneta() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsCordonCuneta on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"cordon_cuneta" = null
				WHERE
					"cordon_cuneta" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsCordonCuneta
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsCordonCuneta(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsCordonCuneta on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsCordonCuneta on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"cordon_cuneta" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsCordonCuneta
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsCordonCuneta() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsCordonCuneta on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"cordon_cuneta" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsDesaguesPluviales
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsDesaguesPluvialesArray
                /**
                * Add a Item to the _InfraestructuraAsDesaguesPluvialesArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsDesaguesPluviales(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->DesaguesPluvialesObject = $this;
                    $this->objInfraestructuraAsDesaguesPluvialesArray = $this->InfraestructuraAsDesaguesPluvialesArray;
                    $this->objInfraestructuraAsDesaguesPluvialesArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsDesaguesPluviales($objItem);

                    return $this->InfraestructuraAsDesaguesPluvialesArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsDesaguesPluvialesArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsDesaguesPluviales(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsDesaguesPluvialesArray;
                    $this->objInfraestructuraAsDesaguesPluvialesArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsDesaguesPluvialesArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->DesaguesPluvialesObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsDesaguesPluviales($objItem);
                        }

                    return $this->objInfraestructuraAsDesaguesPluvialesArray;
                }

		/**
		 * Gets all associated InfraestructurasAsDesaguesPluviales as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsDesaguesPluvialesArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByDesaguesPluviales($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsDesaguesPluviales
		 * @return int
		*/ 
		public function CountInfraestructurasAsDesaguesPluviales() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByDesaguesPluviales($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsDesaguesPluviales
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsDesaguesPluviales(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsDesaguesPluviales on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsDesaguesPluviales on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"desagues_pluviales" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsDesaguesPluviales
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsDesaguesPluviales(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsDesaguesPluviales on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsDesaguesPluviales on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"desagues_pluviales" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"desagues_pluviales" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsDesaguesPluviales
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsDesaguesPluviales() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsDesaguesPluviales on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"desagues_pluviales" = null
				WHERE
					"desagues_pluviales" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsDesaguesPluviales
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsDesaguesPluviales(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsDesaguesPluviales on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsDesaguesPluviales on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"desagues_pluviales" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsDesaguesPluviales
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsDesaguesPluviales() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsDesaguesPluviales on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"desagues_pluviales" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for InfraestructuraAsRecoleccionResiduos
		//-------------------------------------------------------------------

                //Public Model methods for add and remove Items from the _InfraestructuraAsRecoleccionResiduosArray
                /**
                * Add a Item to the _InfraestructuraAsRecoleccionResiduosArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function AddInfraestructuraAsRecoleccionResiduos(Infraestructura $objItem){
                   //add to the collection and add me as a parent
                    $objItem->RecoleccionResiduosObject = $this;
                    $this->objInfraestructuraAsRecoleccionResiduosArray = $this->InfraestructuraAsRecoleccionResiduosArray;
                    $this->objInfraestructuraAsRecoleccionResiduosArray[] = $objItem;

                    if (!$objItem->__Restored) array_push($this->objChildObjectsArray, $objItem);
                    
                    //automatic persistence to de DB DEPRECATED
                    //$this->AssociateInfraestructuraAsRecoleccionResiduos($objItem);

                    return $this->InfraestructuraAsRecoleccionResiduosArray;
                }

                /**
                * Remove a Item to the _InfraestructuraAsRecoleccionResiduosArray
                * @param Infraestructura $objItem
                * @return Infraestructura[]
                */
                public function RemoveInfraestructuraAsRecoleccionResiduos(Infraestructura $objItem){
                    //remove Item from the collection
                    $arrAux = $this->objInfraestructuraAsRecoleccionResiduosArray;
                    $this->objInfraestructuraAsRecoleccionResiduosArray = array();
                    foreach ($arrAux as $obj) {
                        if ($obj !== $objItem) 
                            array_push($this->objInfraestructuraAsRecoleccionResiduosArray,$obj);
                    }
                    //automatic persistence to de DB if necesary
                    if(!is_null($objItem->Id))
                        try{
                            $objItem->RecoleccionResiduosObject = null;
                            $objItem->Save();
                        }catch(Exception $e){
                            $this->DeleteAssociatedInfraestructuraAsRecoleccionResiduos($objItem);
                        }

                    return $this->objInfraestructuraAsRecoleccionResiduosArray;
                }

		/**
		 * Gets all associated InfraestructurasAsRecoleccionResiduos as an array of Infraestructura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Infraestructura[]
		*/ 
		public function GetInfraestructuraAsRecoleccionResiduosArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Infraestructura::LoadArrayByRecoleccionResiduos($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InfraestructurasAsRecoleccionResiduos
		 * @return int
		*/ 
		public function CountInfraestructurasAsRecoleccionResiduos() {
			if ((is_null($this->intId)))
				return 0;

			return Infraestructura::CountByRecoleccionResiduos($this->intId);
		}

		/**
		 * Associates a InfraestructuraAsRecoleccionResiduos
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function AssociateInfraestructuraAsRecoleccionResiduos(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsRecoleccionResiduos on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInfraestructuraAsRecoleccionResiduos on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"recoleccion_residuos" = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . '
			');
		}

		/**
		 * Unassociates a InfraestructuraAsRecoleccionResiduos
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function UnassociateInfraestructuraAsRecoleccionResiduos(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRecoleccionResiduos on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRecoleccionResiduos on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"recoleccion_residuos" = null
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"recoleccion_residuos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all InfraestructurasAsRecoleccionResiduos
		 * @return void
		*/ 
		public function UnassociateAllInfraestructurasAsRecoleccionResiduos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRecoleccionResiduos on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					"infraestructura"
				SET
					"recoleccion_residuos" = null
				WHERE
					"recoleccion_residuos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated InfraestructuraAsRecoleccionResiduos
		 * @param Infraestructura $objInfraestructura
		 * @return void
		*/ 
		public function DeleteAssociatedInfraestructuraAsRecoleccionResiduos(Infraestructura $objInfraestructura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRecoleccionResiduos on this unsaved OpcionesInfraestructura.');
			if ((is_null($objInfraestructura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRecoleccionResiduos on this OpcionesInfraestructura with an unsaved Infraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($objInfraestructura->Id) . ' AND
					"recoleccion_residuos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated InfraestructurasAsRecoleccionResiduos
		 * @return void
		*/ 
		public function DeleteAllInfraestructurasAsRecoleccionResiduos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInfraestructuraAsRecoleccionResiduos on this unsaved OpcionesInfraestructura.');

			// Get the Database Object for this Class
			$objDatabase = OpcionesInfraestructura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"infraestructura"
				WHERE
					"recoleccion_residuos" = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





    ////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="OpcionesInfraestructura"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Opcion" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OpcionesInfraestructura', $strComplexTypeArray)) {
				$strComplexTypeArray['OpcionesInfraestructura'] = OpcionesInfraestructura::GetSoapComplexTypeXml();
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OpcionesInfraestructura::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OpcionesInfraestructura();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if (property_exists($objSoapObject, 'Opcion')) {
				$objToReturn->strOpcion = $objSoapObject->Opcion;
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
				array_push($objArrayToReturn, OpcionesInfraestructura::GetSoapObjectFromObject($objObject, true));

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