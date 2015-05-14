<?php
/**
 * The abstract EncuadreLegalGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the EncuadreLegal subclass which
 * extends this EncuadreLegalGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the EncuadreLegal class.
 * 
 * @package Relevamiento Anual
 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IdFolio the value for intIdFolio 
	 * @property boolean $Decreto222595 the value for blnDecreto222595 
	 * @property boolean $Ley24374 the value for blnLey24374 
	 * @property boolean $Decreto81588 the value for blnDecreto81588 
	 * @property boolean $Ley23073 the value for blnLey23073 
	 * @property boolean $Decreto468696 the value for blnDecreto468696 
	 * @property string $Expropiacion the value for strExpropiacion 
	 * @property boolean $Ley14449 the value for blnLey14449 
	 * @property boolean $TieneExpropiacion the value for blnTieneExpropiacion 
	 * @property string $Otros the value for strOtros 
	 * @property string $FechaSancion the value for strFechaSancion 
	 * @property string $FechaVencimiento the value for strFechaVencimiento 
	 * @property string $NomenclaturaTextoLey the value for strNomenclaturaTextoLey 
	 * @property string $TasacionAdministrativa the value for strTasacionAdministrativa 
	 * @property string $PrecioPagado the value for strPrecioPagado 
	 * @property string $Juzgado the value for strJuzgado 
	 * @property integer $EstadoProcesoExpropiacion the value for intEstadoProcesoExpropiacion 
	 * @property string $MemoriaDescriptiva the value for strMemoriaDescriptiva 
	 * @property Regularizacion $IdFolioObject the value for the Regularizacion object referenced by intIdFolio 
	 * @property OpcionesEstadoExpropiacion $EstadoProcesoExpropiacionObject the value for the OpcionesEstadoExpropiacion object referenced by intEstadoProcesoExpropiacion 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class EncuadreLegalGen extends QBaseClass {

    public static function Noun() {
        return 'EncuadreLegal';
    }
    public static function NounPlural() {
        return 'EncuadreLegales';
    }
    public static function GenderMale() {
        return true;
    }
    
//protected_member_variables    
///////////////////////////////////////////////////////////////////////
// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column encuadre_legal.id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = 'nextval(\'encuadre_legal_id_seq\'::regclass)';


    /**
     * Protected member variable that maps to the database column encuadre_legal.id_folio
     * @var integer intIdFolio
     */
    protected $intIdFolio;
    const IdFolioDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.decreto_2225_95
     * @var boolean blnDecreto222595
     */
    protected $blnDecreto222595;
    const Decreto222595Default = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.ley_24374
     * @var boolean blnLey24374
     */
    protected $blnLey24374;
    const Ley24374Default = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.decreto_815_88
     * @var boolean blnDecreto81588
     */
    protected $blnDecreto81588;
    const Decreto81588Default = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.ley_23073
     * @var boolean blnLey23073
     */
    protected $blnLey23073;
    const Ley23073Default = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.decreto_4686_96
     * @var boolean blnDecreto468696
     */
    protected $blnDecreto468696;
    const Decreto468696Default = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.expropiacion
     * @var string strExpropiacion
     */
    protected $strExpropiacion;
    const ExpropiacionMaxLength = 45;
    const ExpropiacionDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.ley_14449
     * @var boolean blnLey14449
     */
    protected $blnLey14449;
    const Ley14449Default = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.tiene_expropiacion
     * @var boolean blnTieneExpropiacion
     */
    protected $blnTieneExpropiacion;
    const TieneExpropiacionDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.otros
     * @var string strOtros
     */
    protected $strOtros;
    const OtrosDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.fecha_sancion
     * @var string strFechaSancion
     */
    protected $strFechaSancion;
    const FechaSancionMaxLength = 150;
    const FechaSancionDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.fecha_vencimiento
     * @var string strFechaVencimiento
     */
    protected $strFechaVencimiento;
    const FechaVencimientoMaxLength = 150;
    const FechaVencimientoDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.nomenclatura_texto_ley
     * @var string strNomenclaturaTextoLey
     */
    protected $strNomenclaturaTextoLey;
    const NomenclaturaTextoLeyMaxLength = 150;
    const NomenclaturaTextoLeyDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.tasacion_administrativa
     * @var string strTasacionAdministrativa
     */
    protected $strTasacionAdministrativa;
    const TasacionAdministrativaMaxLength = 150;
    const TasacionAdministrativaDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.precio_pagado
     * @var string strPrecioPagado
     */
    protected $strPrecioPagado;
    const PrecioPagadoMaxLength = 150;
    const PrecioPagadoDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.juzgado
     * @var string strJuzgado
     */
    protected $strJuzgado;
    const JuzgadoMaxLength = 150;
    const JuzgadoDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.estado_proceso_expropiacion
     * @var integer intEstadoProcesoExpropiacion
     */
    protected $intEstadoProcesoExpropiacion;
    const EstadoProcesoExpropiacionDefault = null;


    /**
     * Protected member variable that maps to the database column encuadre_legal.memoria_descriptiva
     * @var string strMemoriaDescriptiva
     */
    protected $strMemoriaDescriptiva;
    const MemoriaDescriptivaDefault = null;


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
		 * in the database column encuadre_legal.id_folio.
		 *
		 * NOTE: Always use the IdFolioObject property getter to correctly retrieve this Regularizacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Regularizacion objIdFolioObject
		 */
		protected $objIdFolioObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column encuadre_legal.estado_proceso_expropiacion.
		 *
		 * NOTE: Always use the EstadoProcesoExpropiacionObject property getter to correctly retrieve this OpcionesEstadoExpropiacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OpcionesEstadoExpropiacion objEstadoProcesoExpropiacionObject
		 */
		protected $objEstadoProcesoExpropiacionObject;



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
                protected static $_objEncuadreLegalArray = array();


		/**
		 * Load a EncuadreLegal from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param bool $blnNoCache indica que no se use el cache
		 * @return EncuadreLegal
		 */
		public static function Load($intId, $objOptionalClauses = null, $blnNoCache = false) {
                        if(isset($GLOBALS['__DISABLE_CACHE__']) && $GLOBALS['__DISABLE_CACHE__']) {

			// Use QuerySingle to Perform the Query
			return  EncuadreLegal::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EncuadreLegal()->Id, $intId)
				),
				$objOptionalClauses
			);
                        } elseif($blnNoCache || !array_key_exists("$intId",self::$_objEncuadreLegalArray)){
                            

			// Use QuerySingle to Perform the Query
            if (!is_null($objTmpEncuadreLegal = EncuadreLegal::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EncuadreLegal()->Id, $intId)
				),
				$objOptionalClauses
			))) {
			    self::$_objEncuadreLegalArray["$intId"] = $objTmpEncuadreLegal;
            }
                        }
                        return isset(self::$_objEncuadreLegalArray["$intId"])?self::$_objEncuadreLegalArray["$intId"]:null;
		}

		/**
		 * Load all EncuadreLegales
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EncuadreLegal[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call EncuadreLegal::QueryArray to perform the LoadAll query
			try {
				return EncuadreLegal::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EncuadreLegales
		 * @return int
		 */
		public static function CountAll() {
			// Call EncuadreLegal::QueryCount to perform the CountAll query
			return EncuadreLegal::QueryCount(QQ::All());
		}


//class_query_method
    protected static $arrQueryTextFields = array(
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (EncuadreLegal::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::EncuadreLegal()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::EncuadreLegal()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase EncuadreLegal no tiene definidos campos para la búsqueda de Autocomplete');
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
			$objDatabase = EncuadreLegal::GetDatabase();

			// Create/Build out the QueryBuilder object with EncuadreLegal-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'encuadre_legal');
			EncuadreLegal::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('encuadre_legal');

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
		 * Static Qcubed Query method to query for a single EncuadreLegal object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EncuadreLegal the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EncuadreLegal::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new EncuadreLegal object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EncuadreLegal::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = EncuadreLegal::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of EncuadreLegal objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EncuadreLegal[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EncuadreLegal::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EncuadreLegal::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of EncuadreLegal objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EncuadreLegal::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EncuadreLegal::GetDatabase();

			$strQuery = EncuadreLegal::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/encuadrelegal', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = EncuadreLegal::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EncuadreLegal
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'encuadre_legal';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'id_folio', $strAliasPrefix . 'id_folio');
			$objBuilder->AddSelectItem($strTableName, 'decreto_2225_95', $strAliasPrefix . 'decreto_2225_95');
			$objBuilder->AddSelectItem($strTableName, 'ley_24374', $strAliasPrefix . 'ley_24374');
			$objBuilder->AddSelectItem($strTableName, 'decreto_815_88', $strAliasPrefix . 'decreto_815_88');
			$objBuilder->AddSelectItem($strTableName, 'ley_23073', $strAliasPrefix . 'ley_23073');
			$objBuilder->AddSelectItem($strTableName, 'decreto_4686_96', $strAliasPrefix . 'decreto_4686_96');
			$objBuilder->AddSelectItem($strTableName, 'expropiacion', $strAliasPrefix . 'expropiacion');
			$objBuilder->AddSelectItem($strTableName, 'ley_14449', $strAliasPrefix . 'ley_14449');
			$objBuilder->AddSelectItem($strTableName, 'tiene_expropiacion', $strAliasPrefix . 'tiene_expropiacion');
			$objBuilder->AddSelectItem($strTableName, 'otros', $strAliasPrefix . 'otros');
			$objBuilder->AddSelectItem($strTableName, 'fecha_sancion', $strAliasPrefix . 'fecha_sancion');
			$objBuilder->AddSelectItem($strTableName, 'fecha_vencimiento', $strAliasPrefix . 'fecha_vencimiento');
			$objBuilder->AddSelectItem($strTableName, 'nomenclatura_texto_ley', $strAliasPrefix . 'nomenclatura_texto_ley');
			$objBuilder->AddSelectItem($strTableName, 'tasacion_administrativa', $strAliasPrefix . 'tasacion_administrativa');
			$objBuilder->AddSelectItem($strTableName, 'precio_pagado', $strAliasPrefix . 'precio_pagado');
			$objBuilder->AddSelectItem($strTableName, 'juzgado', $strAliasPrefix . 'juzgado');
			$objBuilder->AddSelectItem($strTableName, 'estado_proceso_expropiacion', $strAliasPrefix . 'estado_proceso_expropiacion');
			$objBuilder->AddSelectItem($strTableName, 'memoria_descriptiva', $strAliasPrefix . 'memoria_descriptiva');
		}

//instantiation_methods
///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a EncuadreLegal from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EncuadreLegal::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return EncuadreLegal
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the EncuadreLegal object
			$objToReturn = new EncuadreLegal();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'id_folio', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id_folio'] : $strAliasPrefix . 'id_folio';
			$objToReturn->intIdFolio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'decreto_2225_95', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'decreto_2225_95'] : $strAliasPrefix . 'decreto_2225_95';
			$objToReturn->blnDecreto222595 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'ley_24374', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ley_24374'] : $strAliasPrefix . 'ley_24374';
			$objToReturn->blnLey24374 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'decreto_815_88', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'decreto_815_88'] : $strAliasPrefix . 'decreto_815_88';
			$objToReturn->blnDecreto81588 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'ley_23073', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ley_23073'] : $strAliasPrefix . 'ley_23073';
			$objToReturn->blnLey23073 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'decreto_4686_96', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'decreto_4686_96'] : $strAliasPrefix . 'decreto_4686_96';
			$objToReturn->blnDecreto468696 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'expropiacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'expropiacion'] : $strAliasPrefix . 'expropiacion';
			$objToReturn->strExpropiacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ley_14449', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ley_14449'] : $strAliasPrefix . 'ley_14449';
			$objToReturn->blnLey14449 = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'tiene_expropiacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tiene_expropiacion'] : $strAliasPrefix . 'tiene_expropiacion';
			$objToReturn->blnTieneExpropiacion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'otros', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'otros'] : $strAliasPrefix . 'otros';
			$objToReturn->strOtros = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_sancion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_sancion'] : $strAliasPrefix . 'fecha_sancion';
			$objToReturn->strFechaSancion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fecha_vencimiento', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fecha_vencimiento'] : $strAliasPrefix . 'fecha_vencimiento';
			$objToReturn->strFechaVencimiento = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nomenclatura_texto_ley', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nomenclatura_texto_ley'] : $strAliasPrefix . 'nomenclatura_texto_ley';
			$objToReturn->strNomenclaturaTextoLey = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'tasacion_administrativa', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tasacion_administrativa'] : $strAliasPrefix . 'tasacion_administrativa';
			$objToReturn->strTasacionAdministrativa = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'precio_pagado', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'precio_pagado'] : $strAliasPrefix . 'precio_pagado';
			$objToReturn->strPrecioPagado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'juzgado', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'juzgado'] : $strAliasPrefix . 'juzgado';
			$objToReturn->strJuzgado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'estado_proceso_expropiacion', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'estado_proceso_expropiacion'] : $strAliasPrefix . 'estado_proceso_expropiacion';
			$objToReturn->intEstadoProcesoExpropiacion = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'memoria_descriptiva', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'memoria_descriptiva'] : $strAliasPrefix . 'memoria_descriptiva';
			$objToReturn->strMemoriaDescriptiva = $objDbRow->GetColumn($strAliasName, 'Blob');

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
				$strAliasPrefix = 'encuadre_legal__';

			// Check for IdFolioObject Early Binding
			$strAlias = $strAliasPrefix . 'id_folio__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdFolioObject = Regularizacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id_folio__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for EstadoProcesoExpropiacionObject Early Binding
			$strAlias = $strAliasPrefix . 'estado_proceso_expropiacion__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEstadoProcesoExpropiacionObject = OpcionesEstadoExpropiacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estado_proceso_expropiacion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of EncuadreLegales from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return EncuadreLegal[]
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
					$objItem = EncuadreLegal::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EncuadreLegal::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

//index_load_methods
///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single EncuadreLegal object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EncuadreLegal
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return EncuadreLegal::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EncuadreLegal()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of EncuadreLegal objects,
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EncuadreLegal[]
		*/
		public static function LoadArrayByIdFolio($intIdFolio, $objOptionalClauses = null) {
			// Call EncuadreLegal::QueryArray to perform the LoadArrayByIdFolio query
			try {
				return EncuadreLegal::QueryArray(
					QQ::Equal(QQN::EncuadreLegal()->IdFolio, $intIdFolio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EncuadreLegales
		 * by IdFolio Index(es)
		 * @param integer $intIdFolio
		 * @return int
		*/
		public static function CountByIdFolio($intIdFolio) {
			// Call EncuadreLegal::QueryCount to perform the CountByIdFolio query
			return EncuadreLegal::QueryCount(
				QQ::Equal(QQN::EncuadreLegal()->IdFolio, $intIdFolio)
			);
		}
			
		/**
		 * Load an array of EncuadreLegal objects,
		 * by EstadoProcesoExpropiacion Index(es)
		 * @param integer $intEstadoProcesoExpropiacion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EncuadreLegal[]
		*/
		public static function LoadArrayByEstadoProcesoExpropiacion($intEstadoProcesoExpropiacion, $objOptionalClauses = null) {
			// Call EncuadreLegal::QueryArray to perform the LoadArrayByEstadoProcesoExpropiacion query
			try {
				return EncuadreLegal::QueryArray(
					QQ::Equal(QQN::EncuadreLegal()->EstadoProcesoExpropiacion, $intEstadoProcesoExpropiacion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EncuadreLegales
		 * by EstadoProcesoExpropiacion Index(es)
		 * @param integer $intEstadoProcesoExpropiacion
		 * @return int
		*/
		public static function CountByEstadoProcesoExpropiacion($intEstadoProcesoExpropiacion) {
			// Call EncuadreLegal::QueryCount to perform the CountByEstadoProcesoExpropiacion query
			return EncuadreLegal::QueryCount(
				QQ::Equal(QQN::EncuadreLegal()->EstadoProcesoExpropiacion, $intEstadoProcesoExpropiacion)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
         * Save this EncuadreLegal
         * @param bool $blnForceInsert
         * @param bool $blnForceUpdate
         * @return int
        */
        public function Save($blnForceInsert = false, $blnForceUpdate = false) {
            // Get the Database Object for this Class
            $objDatabase = EncuadreLegal::GetDatabase();

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
            // ver si objEstadoProcesoExpropiacionObject esta Guardado
            if(is_null($this->intEstadoProcesoExpropiacion)){
                //Si el objeto esta seteado lo grabo sino no hago NADA.
                if(!is_null($this->EstadoProcesoExpropiacionObject))
                try{
                    if(!is_null($this->EstadoProcesoExpropiacionObject->EstadoProcesoExpropiacion))
                        $this->intEstadoProcesoExpropiacion = $this->EstadoProcesoExpropiacionObject->EstadoProcesoExpropiacion;
                    else
                        $this->intEstadoProcesoExpropiacion = $this->EstadoProcesoExpropiacionObject->Save();
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
                    if ($this->intEstadoProcesoExpropiacion && ($this->intEstadoProcesoExpropiacion > QDatabaseNumberFieldMax::Integer || $this->intEstadoProcesoExpropiacion < QDatabaseNumberFieldMin::Integer)) {
                        throw new NumberOutOfRangeException('intEstadoProcesoExpropiacion', QDatabaseFieldType::Integer);
                    }

            try {
                if (((!$this->__blnRestored) && (!$blnForceUpdate)) || ($blnForceInsert)) {
                    // Perform an INSERT query
                    $objDatabase->NonQuery('
                        INSERT INTO "encuadre_legal" (
                            "id_folio",
                            "decreto_2225_95",
                            "ley_24374",
                            "decreto_815_88",
                            "ley_23073",
                            "decreto_4686_96",
                            "expropiacion",
                            "ley_14449",
                            "tiene_expropiacion",
                            "otros",
                            "fecha_sancion",
                            "fecha_vencimiento",
                            "nomenclatura_texto_ley",
                            "tasacion_administrativa",
                            "precio_pagado",
                            "juzgado",
                            "estado_proceso_expropiacion",
                            "memoria_descriptiva"
                        ) VALUES (
                            ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            ' . $objDatabase->SqlVariable($this->blnDecreto222595) . ',
                            ' . $objDatabase->SqlVariable($this->blnLey24374) . ',
                            ' . $objDatabase->SqlVariable($this->blnDecreto81588) . ',
                            ' . $objDatabase->SqlVariable($this->blnLey23073) . ',
                            ' . $objDatabase->SqlVariable($this->blnDecreto468696) . ',
                            ' . $objDatabase->SqlVariable($this->strExpropiacion) . ',
                            ' . $objDatabase->SqlVariable($this->blnLey14449) . ',
                            ' . $objDatabase->SqlVariable($this->blnTieneExpropiacion) . ',
                            ' . $objDatabase->SqlVariable($this->strOtros) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaSancion) . ',
                            ' . $objDatabase->SqlVariable($this->strFechaVencimiento) . ',
                            ' . $objDatabase->SqlVariable($this->strNomenclaturaTextoLey) . ',
                            ' . $objDatabase->SqlVariable($this->strTasacionAdministrativa) . ',
                            ' . $objDatabase->SqlVariable($this->strPrecioPagado) . ',
                            ' . $objDatabase->SqlVariable($this->strJuzgado) . ',
                            ' . $objDatabase->SqlVariable($this->intEstadoProcesoExpropiacion) . ',
                            ' . $objDatabase->SqlVariable($this->strMemoriaDescriptiva) . '
                        )
                    ');

                    // Update Identity column and return its value
                    $mixToReturn = $this->intId = $objDatabase->InsertId('encuadre_legal', 'id');
                } else {
                    // Perform an UPDATE query

                    // First checking for Optimistic Locking constraints (if applicable)

                    // Perform the UPDATE query
                    $objDatabase->NonQuery('
                        UPDATE
                            "encuadre_legal"
                        SET
                            "id_folio" = ' . $objDatabase->SqlVariable($this->intIdFolio) . ',
                            "decreto_2225_95" = ' . $objDatabase->SqlVariable($this->blnDecreto222595) . ',
                            "ley_24374" = ' . $objDatabase->SqlVariable($this->blnLey24374) . ',
                            "decreto_815_88" = ' . $objDatabase->SqlVariable($this->blnDecreto81588) . ',
                            "ley_23073" = ' . $objDatabase->SqlVariable($this->blnLey23073) . ',
                            "decreto_4686_96" = ' . $objDatabase->SqlVariable($this->blnDecreto468696) . ',
                            "expropiacion" = ' . $objDatabase->SqlVariable($this->strExpropiacion) . ',
                            "ley_14449" = ' . $objDatabase->SqlVariable($this->blnLey14449) . ',
                            "tiene_expropiacion" = ' . $objDatabase->SqlVariable($this->blnTieneExpropiacion) . ',
                            "otros" = ' . $objDatabase->SqlVariable($this->strOtros) . ',
                            "fecha_sancion" = ' . $objDatabase->SqlVariable($this->strFechaSancion) . ',
                            "fecha_vencimiento" = ' . $objDatabase->SqlVariable($this->strFechaVencimiento) . ',
                            "nomenclatura_texto_ley" = ' . $objDatabase->SqlVariable($this->strNomenclaturaTextoLey) . ',
                            "tasacion_administrativa" = ' . $objDatabase->SqlVariable($this->strTasacionAdministrativa) . ',
                            "precio_pagado" = ' . $objDatabase->SqlVariable($this->strPrecioPagado) . ',
                            "juzgado" = ' . $objDatabase->SqlVariable($this->strJuzgado) . ',
                            "estado_proceso_expropiacion" = ' . $objDatabase->SqlVariable($this->intEstadoProcesoExpropiacion) . ',
                            "memoria_descriptiva" = ' . $objDatabase->SqlVariable($this->strMemoriaDescriptiva) . '
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
		 * Delete this EncuadreLegal
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EncuadreLegal with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EncuadreLegal::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					"encuadre_legal"
				WHERE
					"id" = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all EncuadreLegales
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EncuadreLegal::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					"encuadre_legal"');
		}

		/**
		 * Truncate encuadre_legal table
		 * @return void
		 */
		public static function Truncate($blnCascade = false) {
			// Get the Database Object for this Class
			$objDatabase = EncuadreLegal::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery(sprintf('
				TRUNCATE "encuadre_legal" %s',($blnCascade)?' cascade':''));
		}

    /**
		 * Reload this EncuadreLegal from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EncuadreLegal object.');

			// Reload the Object
			$objReloaded = EncuadreLegal::Load($this->intId, null, true);

			// Update $this's local variables to match
			$this->IdFolio = $objReloaded->IdFolio;
			$this->blnDecreto222595 = $objReloaded->blnDecreto222595;
			$this->blnLey24374 = $objReloaded->blnLey24374;
			$this->blnDecreto81588 = $objReloaded->blnDecreto81588;
			$this->blnLey23073 = $objReloaded->blnLey23073;
			$this->blnDecreto468696 = $objReloaded->blnDecreto468696;
			$this->strExpropiacion = $objReloaded->strExpropiacion;
			$this->blnLey14449 = $objReloaded->blnLey14449;
			$this->blnTieneExpropiacion = $objReloaded->blnTieneExpropiacion;
			$this->strOtros = $objReloaded->strOtros;
			$this->strFechaSancion = $objReloaded->strFechaSancion;
			$this->strFechaVencimiento = $objReloaded->strFechaVencimiento;
			$this->strNomenclaturaTextoLey = $objReloaded->strNomenclaturaTextoLey;
			$this->strTasacionAdministrativa = $objReloaded->strTasacionAdministrativa;
			$this->strPrecioPagado = $objReloaded->strPrecioPagado;
			$this->strJuzgado = $objReloaded->strJuzgado;
			$this->EstadoProcesoExpropiacion = $objReloaded->EstadoProcesoExpropiacion;
			$this->strMemoriaDescriptiva = $objReloaded->strMemoriaDescriptiva;
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

            case 'Decreto222595':
                /**
                 * Gets the value for blnDecreto222595 
                 * @return boolean
                 */
                return $this->blnDecreto222595;

            case 'Ley24374':
                /**
                 * Gets the value for blnLey24374 
                 * @return boolean
                 */
                return $this->blnLey24374;

            case 'Decreto81588':
                /**
                 * Gets the value for blnDecreto81588 
                 * @return boolean
                 */
                return $this->blnDecreto81588;

            case 'Ley23073':
                /**
                 * Gets the value for blnLey23073 
                 * @return boolean
                 */
                return $this->blnLey23073;

            case 'Decreto468696':
                /**
                 * Gets the value for blnDecreto468696 
                 * @return boolean
                 */
                return $this->blnDecreto468696;

            case 'Expropiacion':
                /**
                 * Gets the value for strExpropiacion 
                 * @return string
                 */
                return $this->strExpropiacion;

            case 'Ley14449':
                /**
                 * Gets the value for blnLey14449 
                 * @return boolean
                 */
                return $this->blnLey14449;

            case 'TieneExpropiacion':
                /**
                 * Gets the value for blnTieneExpropiacion 
                 * @return boolean
                 */
                return $this->blnTieneExpropiacion;

            case 'Otros':
                /**
                 * Gets the value for strOtros 
                 * @return string
                 */
                return $this->strOtros;

            case 'FechaSancion':
                /**
                 * Gets the value for strFechaSancion 
                 * @return string
                 */
                return $this->strFechaSancion;

            case 'FechaVencimiento':
                /**
                 * Gets the value for strFechaVencimiento 
                 * @return string
                 */
                return $this->strFechaVencimiento;

            case 'NomenclaturaTextoLey':
                /**
                 * Gets the value for strNomenclaturaTextoLey 
                 * @return string
                 */
                return $this->strNomenclaturaTextoLey;

            case 'TasacionAdministrativa':
                /**
                 * Gets the value for strTasacionAdministrativa 
                 * @return string
                 */
                return $this->strTasacionAdministrativa;

            case 'PrecioPagado':
                /**
                 * Gets the value for strPrecioPagado 
                 * @return string
                 */
                return $this->strPrecioPagado;

            case 'Juzgado':
                /**
                 * Gets the value for strJuzgado 
                 * @return string
                 */
                return $this->strJuzgado;

            case 'EstadoProcesoExpropiacion':
                /**
                 * Gets the value for intEstadoProcesoExpropiacion 
                 * @return integer
                 */
                return $this->intEstadoProcesoExpropiacion;

            case 'MemoriaDescriptiva':
                /**
                 * Gets the value for strMemoriaDescriptiva 
                 * @return string
                 */
                return $this->strMemoriaDescriptiva;


            ///////////////////
            // Member Objects
            ///////////////////
            case 'IdFolioObject':
                /**
                 * Gets the value for the Regularizacion object referenced by intIdFolio 
                 * @return Regularizacion
                 */
                try {
                    if ((!$this->objIdFolioObject) && (!is_null($this->intIdFolio)))
                        $this->objIdFolioObject = Regularizacion::Load($this->intIdFolio);
                    return $this->objIdFolioObject;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'EstadoProcesoExpropiacionObject':
                /**
                 * Gets the value for the OpcionesEstadoExpropiacion object referenced by intEstadoProcesoExpropiacion 
                 * @return OpcionesEstadoExpropiacion
                 */
                try {
                    if ((!$this->objEstadoProcesoExpropiacionObject) && (!is_null($this->intEstadoProcesoExpropiacion)))
                        $this->objEstadoProcesoExpropiacionObject = OpcionesEstadoExpropiacion::Load($this->intEstadoProcesoExpropiacion);
                    return $this->objEstadoProcesoExpropiacionObject;
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

				case 'Decreto222595':
					/**
					 * Sets the value for blnDecreto222595 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnDecreto222595 = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnDecreto222595 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ley24374':
					/**
					 * Sets the value for blnLey24374 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnLey24374 = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnLey24374 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Decreto81588':
					/**
					 * Sets the value for blnDecreto81588 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnDecreto81588 = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnDecreto81588 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ley23073':
					/**
					 * Sets the value for blnLey23073 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnLey23073 = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnLey23073 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Decreto468696':
					/**
					 * Sets the value for blnDecreto468696 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnDecreto468696 = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnDecreto468696 = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Expropiacion':
					/**
					 * Sets the value for strExpropiacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strExpropiacion = QType::Cast($mixValue, QType::String));
                                                return ($this->strExpropiacion = $mixValue);
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

				case 'TieneExpropiacion':
					/**
					 * Sets the value for blnTieneExpropiacion 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->blnTieneExpropiacion = QType::Cast($mixValue, QType::Boolean));
                                                return ($this->blnTieneExpropiacion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Otros':
					/**
					 * Sets the value for strOtros 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strOtros = QType::Cast($mixValue, QType::String));
                                                return ($this->strOtros = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSancion':
					/**
					 * Sets the value for strFechaSancion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFechaSancion = QType::Cast($mixValue, QType::String));
                                                return ($this->strFechaSancion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaVencimiento':
					/**
					 * Sets the value for strFechaVencimiento 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strFechaVencimiento = QType::Cast($mixValue, QType::String));
                                                return ($this->strFechaVencimiento = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NomenclaturaTextoLey':
					/**
					 * Sets the value for strNomenclaturaTextoLey 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strNomenclaturaTextoLey = QType::Cast($mixValue, QType::String));
                                                return ($this->strNomenclaturaTextoLey = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TasacionAdministrativa':
					/**
					 * Sets the value for strTasacionAdministrativa 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strTasacionAdministrativa = QType::Cast($mixValue, QType::String));
                                                return ($this->strTasacionAdministrativa = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrecioPagado':
					/**
					 * Sets the value for strPrecioPagado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strPrecioPagado = QType::Cast($mixValue, QType::String));
                                                return ($this->strPrecioPagado = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Juzgado':
					/**
					 * Sets the value for strJuzgado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strJuzgado = QType::Cast($mixValue, QType::String));
                                                return ($this->strJuzgado = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoProcesoExpropiacion':
					/**
					 * Sets the value for intEstadoProcesoExpropiacion 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEstadoProcesoExpropiacionObject = null;
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->intEstadoProcesoExpropiacion = QType::Cast($mixValue, QType::Integer));
                                                return ($this->intEstadoProcesoExpropiacion = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MemoriaDescriptiva':
					/**
					 * Sets the value for strMemoriaDescriptiva 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						//DEPRECATED: si es necesario incluir esta linea en el metodo __set de la subclase.
                                                //return ($this->strMemoriaDescriptiva = QType::Cast($mixValue, QType::String));
                                                return ($this->strMemoriaDescriptiva = $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdFolioObject':
					/**
					 * Sets the value for the Regularizacion object referenced by intIdFolio 
					 * @param Regularizacion $mixValue
					 * @return Regularizacion
					 */
					if (is_null($mixValue)) {
						$this->intIdFolio = null;
						$this->objIdFolioObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Regularizacion object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'Regularizacion');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED Regularizacion object
						//if (is_null($mixValue->IdFolio))
						//	throw new QCallerException('Unable to set an unsaved IdFolioObject for this EncuadreLegal');

						// Update Local Member Variables
						$this->objIdFolioObject = $mixValue;
						$this->intIdFolio = $mixValue->IdFolio;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EstadoProcesoExpropiacionObject':
					/**
					 * Sets the value for the OpcionesEstadoExpropiacion object referenced by intEstadoProcesoExpropiacion 
					 * @param OpcionesEstadoExpropiacion $mixValue
					 * @return OpcionesEstadoExpropiacion
					 */
					if (is_null($mixValue)) {
						$this->intEstadoProcesoExpropiacion = null;
						$this->objEstadoProcesoExpropiacionObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a OpcionesEstadoExpropiacion object
						//try {
						//	$mixValue = QType::Cast($mixValue, 'OpcionesEstadoExpropiacion');
						//} catch (QInvalidCastException $objExc) {
						//	$objExc->IncrementOffset();
						//	throw $objExc;
						//}

						// DEPRECATED
                                                // Make sure $mixValue is a SAVED OpcionesEstadoExpropiacion object
						//if (is_null($mixValue->Id))
						//	throw new QCallerException('Unable to set an unsaved EstadoProcesoExpropiacionObject for this EncuadreLegal');

						// Update Local Member Variables
						$this->objEstadoProcesoExpropiacionObject = $mixValue;
						$this->intEstadoProcesoExpropiacion = $mixValue->Id;

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
			$strToReturn = '<complexType name="EncuadreLegal"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IdFolioObject" type="xsd1:Regularizacion"/>';
			$strToReturn .= '<element name="Decreto222595" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Ley24374" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Decreto81588" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Ley23073" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Decreto468696" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Expropiacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Ley14449" type="xsd:boolean"/>';
			$strToReturn .= '<element name="TieneExpropiacion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Otros" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaSancion" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaVencimiento" type="xsd:string"/>';
			$strToReturn .= '<element name="NomenclaturaTextoLey" type="xsd:string"/>';
			$strToReturn .= '<element name="TasacionAdministrativa" type="xsd:string"/>';
			$strToReturn .= '<element name="PrecioPagado" type="xsd:string"/>';
			$strToReturn .= '<element name="Juzgado" type="xsd:string"/>';
			$strToReturn .= '<element name="EstadoProcesoExpropiacionObject" type="xsd1:OpcionesEstadoExpropiacion"/>';
			$strToReturn .= '<element name="MemoriaDescriptiva" type="xsd:string"/>';
			//$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EncuadreLegal', $strComplexTypeArray)) {
				$strComplexTypeArray['EncuadreLegal'] = EncuadreLegal::GetSoapComplexTypeXml();
				$strComplexTypeArray = Regularizacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				$strComplexTypeArray = OpcionesEstadoExpropiacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
            return $strComplexTypeArray;
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EncuadreLegal::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EncuadreLegal();
			if (property_exists($objSoapObject, 'Id')) {
				$objToReturn->intId = $objSoapObject->Id;
            }
			if ((property_exists($objSoapObject, 'IdFolioObject')) &&
				($objSoapObject->IdFolioObject))
				$objToReturn->IdFolioObject = Regularizacion::GetObjectFromSoapObject($objSoapObject->IdFolioObject);
			if (property_exists($objSoapObject, 'Decreto222595')) {
				$objToReturn->blnDecreto222595 = $objSoapObject->Decreto222595;
            }
			if (property_exists($objSoapObject, 'Ley24374')) {
				$objToReturn->blnLey24374 = $objSoapObject->Ley24374;
            }
			if (property_exists($objSoapObject, 'Decreto81588')) {
				$objToReturn->blnDecreto81588 = $objSoapObject->Decreto81588;
            }
			if (property_exists($objSoapObject, 'Ley23073')) {
				$objToReturn->blnLey23073 = $objSoapObject->Ley23073;
            }
			if (property_exists($objSoapObject, 'Decreto468696')) {
				$objToReturn->blnDecreto468696 = $objSoapObject->Decreto468696;
            }
			if (property_exists($objSoapObject, 'Expropiacion')) {
				$objToReturn->strExpropiacion = $objSoapObject->Expropiacion;
            }
			if (property_exists($objSoapObject, 'Ley14449')) {
				$objToReturn->blnLey14449 = $objSoapObject->Ley14449;
            }
			if (property_exists($objSoapObject, 'TieneExpropiacion')) {
				$objToReturn->blnTieneExpropiacion = $objSoapObject->TieneExpropiacion;
            }
			if (property_exists($objSoapObject, 'Otros')) {
				$objToReturn->strOtros = $objSoapObject->Otros;
            }
			if (property_exists($objSoapObject, 'FechaSancion')) {
				$objToReturn->strFechaSancion = $objSoapObject->FechaSancion;
            }
			if (property_exists($objSoapObject, 'FechaVencimiento')) {
				$objToReturn->strFechaVencimiento = $objSoapObject->FechaVencimiento;
            }
			if (property_exists($objSoapObject, 'NomenclaturaTextoLey')) {
				$objToReturn->strNomenclaturaTextoLey = $objSoapObject->NomenclaturaTextoLey;
            }
			if (property_exists($objSoapObject, 'TasacionAdministrativa')) {
				$objToReturn->strTasacionAdministrativa = $objSoapObject->TasacionAdministrativa;
            }
			if (property_exists($objSoapObject, 'PrecioPagado')) {
				$objToReturn->strPrecioPagado = $objSoapObject->PrecioPagado;
            }
			if (property_exists($objSoapObject, 'Juzgado')) {
				$objToReturn->strJuzgado = $objSoapObject->Juzgado;
            }
			if ((property_exists($objSoapObject, 'EstadoProcesoExpropiacionObject')) &&
				($objSoapObject->EstadoProcesoExpropiacionObject))
				$objToReturn->EstadoProcesoExpropiacionObject = OpcionesEstadoExpropiacion::GetObjectFromSoapObject($objSoapObject->EstadoProcesoExpropiacionObject);
			if (property_exists($objSoapObject, 'MemoriaDescriptiva')) {
				$objToReturn->strMemoriaDescriptiva = $objSoapObject->MemoriaDescriptiva;
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
				array_push($objArrayToReturn, EncuadreLegal::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdFolioObject)
				$objObject->objIdFolioObject = Regularizacion::GetSoapObjectFromObject($objObject->objIdFolioObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdFolio = null;
			if ($objObject->objEstadoProcesoExpropiacionObject)
				$objObject->objEstadoProcesoExpropiacionObject = OpcionesEstadoExpropiacion::GetSoapObjectFromObject($objObject->objEstadoProcesoExpropiacionObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEstadoProcesoExpropiacion = null;
			return $objObject;
		}




}



/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

?>