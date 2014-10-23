<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the CondicionesSocioUrbanisticas class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single CondicionesSocioUrbanisticas object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a CondicionesSocioUrbanisticasMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read CondicionesSocioUrbanisticas $CondicionesSocioUrbanisticas the actual CondicionesSocioUrbanisticas data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $EspacioLibreComunControl
     * property-read QLabel $EspacioLibreComunLabel
     * property QTextBox $PresenciaOrgSocialesControl
     * property-read QLabel $PresenciaOrgSocialesLabel
     * property QTextBox $NombreRefernteControl
     * property-read QLabel $NombreRefernteLabel
     * property QTextBox $TelefonoReferenteControl
     * property-read QLabel $TelefonoReferenteLabel
     * property QTextBox $InformeUrbanisticoFechaControl
     * property-read QLabel $InformeUrbanisticoFechaLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class CondicionesSocioUrbanisticasMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var CondicionesSocioUrbanisticas
                */
        public $objCondicionesSocioUrbanisticas;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of CondicionesSocioUrbanisticas's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkEspacioLibreComun;
        protected $txtPresenciaOrgSociales;
        protected $txtNombreRefernte;
        protected $txtTelefonoReferente;
        protected $txtInformeUrbanisticoFecha;

        // Controls that allow the viewing of CondicionesSocioUrbanisticas's individual data fields
        protected $lblIdFolio;
        protected $lblEspacioLibreComun;
        protected $lblPresenciaOrgSociales;
        protected $lblNombreRefernte;
        protected $lblTelefonoReferente;
        protected $lblInformeUrbanisticoFecha;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * CondicionesSocioUrbanisticasMetaControl to edit a single CondicionesSocioUrbanisticas object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single CondicionesSocioUrbanisticas object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CondicionesSocioUrbanisticasMetaControl
         * @param CondicionesSocioUrbanisticas $objCondicionesSocioUrbanisticas new or existing CondicionesSocioUrbanisticas object
         */
         public function __construct($objParentObject, CondicionesSocioUrbanisticas $objCondicionesSocioUrbanisticas) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this CondicionesSocioUrbanisticasMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked CondicionesSocioUrbanisticas object
            $this->objCondicionesSocioUrbanisticas = $objCondicionesSocioUrbanisticas;

            // Figure out if we're Editing or Creating New
            if ($this->objCondicionesSocioUrbanisticas->__Restored) {
                $this->strTitleVerb = 'Editar';
                $this->blnEditMode = true;
            } else {
                $this->strTitleVerb = 'Crear';
                $this->blnEditMode = false;
            }
         }

        /**
         * Static Helper Method to Create using PK arguments
         * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
         * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
         * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
         * edit, or if we are also allowed to create a new one, etc.
         * 
         * @param mixed $objParentObject QForm or QPanel which will be using this CondicionesSocioUrbanisticasMetaControl
         * @param integer $intId primary key value
         * @param integer $intIdFolio primary key value
         * @param QMetaControlCreateType $intCreateType rules governing CondicionesSocioUrbanisticas object creation - defaults to CreateOrEdit
          * @return CondicionesSocioUrbanisticasMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intIdFolio = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId) && strlen($intIdFolio)) {
                $objCondicionesSocioUrbanisticas = CondicionesSocioUrbanisticas::Load($intId, $intIdFolio);

                // CondicionesSocioUrbanisticas was found -- return it!
                if ($objCondicionesSocioUrbanisticas)
                    return new CondicionesSocioUrbanisticasMetaControl($objParentObject, $objCondicionesSocioUrbanisticas);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a CondicionesSocioUrbanisticas object with PK arguments: ' . $intId . ', ' . $intIdFolio);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new CondicionesSocioUrbanisticasMetaControl($objParentObject, new CondicionesSocioUrbanisticas());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CondicionesSocioUrbanisticasMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing CondicionesSocioUrbanisticas object creation - defaults to CreateOrEdit
         * @return CondicionesSocioUrbanisticasMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            $intIdFolio = QApplication::PathInfo(1);
            return CondicionesSocioUrbanisticasMetaControl::Create($objParentObject, $intId, $intIdFolio, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CondicionesSocioUrbanisticasMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing CondicionesSocioUrbanisticas object creation - defaults to CreateOrEdit
         * @return CondicionesSocioUrbanisticasMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            $intIdFolio = QApplication::QueryString('id');
            return CondicionesSocioUrbanisticasMetaControl::Create($objParentObject, $intId, $intIdFolio, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblId
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblId_Create($strControlId = null) {
            $this->lblId = new QLabel($this->objParentObject, $strControlId);
            $this->lblId->Name = QApplication::Translate('Id');
            if ($this->blnEditMode)
                $this->lblId->Text = $this->objCondicionesSocioUrbanisticas->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdFolioObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdFolioObject_Create($strControlId = null) {
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Folio', 'Id' , $strControlId);
            if($this->objCondicionesSocioUrbanisticas->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objCondicionesSocioUrbanisticas->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objCondicionesSocioUrbanisticas->IdFolioObject->Id;
            }
            $this->lstIdFolioObject->Name = QApplication::Translate('IdFolioObject');
            $this->lstIdFolioObject->Required = true;
            return $this->lstIdFolioObject;
        }

        /**
         * Create and setup QLabel lblIdFolio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdFolio_Create($strControlId = null) {
            $this->lblIdFolio = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdFolio->Name = QApplication::Translate('IdFolioObject');
            $this->lblIdFolio->Text = ($this->objCondicionesSocioUrbanisticas->IdFolioObject) ? $this->objCondicionesSocioUrbanisticas->IdFolioObject->__toString() : null;
            $this->lblIdFolio->Required = true;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkEspacioLibreComun
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkEspacioLibreComun_Create($strControlId = null) {
            $this->chkEspacioLibreComun = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkEspacioLibreComun->Name = QApplication::Translate('EspacioLibreComun');
            $this->chkEspacioLibreComun->Checked = $this->objCondicionesSocioUrbanisticas->EspacioLibreComun;
                        return $this->chkEspacioLibreComun;
        }

        /**
         * Create and setup QLabel lblEspacioLibreComun
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEspacioLibreComun_Create($strControlId = null) {
            $this->lblEspacioLibreComun = new QLabel($this->objParentObject, $strControlId);
            $this->lblEspacioLibreComun->Name = QApplication::Translate('EspacioLibreComun');
            $this->lblEspacioLibreComun->Text = ($this->objCondicionesSocioUrbanisticas->EspacioLibreComun) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblEspacioLibreComun;
        }

        /**
         * Create and setup QTextBox txtPresenciaOrgSociales
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtPresenciaOrgSociales_Create($strControlId = null) {
            $this->txtPresenciaOrgSociales = new QTextBox($this->objParentObject, $strControlId);
            $this->txtPresenciaOrgSociales->Name = QApplication::Translate('PresenciaOrgSociales');
            $this->txtPresenciaOrgSociales->Text = $this->objCondicionesSocioUrbanisticas->PresenciaOrgSociales;
            $this->txtPresenciaOrgSociales->MaxLength = CondicionesSocioUrbanisticas::PresenciaOrgSocialesMaxLength;
            
            return $this->txtPresenciaOrgSociales;
        }

        /**
         * Create and setup QLabel lblPresenciaOrgSociales
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblPresenciaOrgSociales_Create($strControlId = null) {
            $this->lblPresenciaOrgSociales = new QLabel($this->objParentObject, $strControlId);
            $this->lblPresenciaOrgSociales->Name = QApplication::Translate('PresenciaOrgSociales');
            $this->lblPresenciaOrgSociales->Text = $this->objCondicionesSocioUrbanisticas->PresenciaOrgSociales;
            return $this->lblPresenciaOrgSociales;
        }

        /**
         * Create and setup QTextBox txtNombreRefernte
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombreRefernte_Create($strControlId = null) {
            $this->txtNombreRefernte = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombreRefernte->Name = QApplication::Translate('NombreRefernte');
            $this->txtNombreRefernte->Text = $this->objCondicionesSocioUrbanisticas->NombreRefernte;
            $this->txtNombreRefernte->MaxLength = CondicionesSocioUrbanisticas::NombreRefernteMaxLength;
            
            return $this->txtNombreRefernte;
        }

        /**
         * Create and setup QLabel lblNombreRefernte
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombreRefernte_Create($strControlId = null) {
            $this->lblNombreRefernte = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombreRefernte->Name = QApplication::Translate('NombreRefernte');
            $this->lblNombreRefernte->Text = $this->objCondicionesSocioUrbanisticas->NombreRefernte;
            return $this->lblNombreRefernte;
        }

        /**
         * Create and setup QTextBox txtTelefonoReferente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTelefonoReferente_Create($strControlId = null) {
            $this->txtTelefonoReferente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTelefonoReferente->Name = QApplication::Translate('TelefonoReferente');
            $this->txtTelefonoReferente->Text = $this->objCondicionesSocioUrbanisticas->TelefonoReferente;
            $this->txtTelefonoReferente->MaxLength = CondicionesSocioUrbanisticas::TelefonoReferenteMaxLength;
            
            return $this->txtTelefonoReferente;
        }

        /**
         * Create and setup QLabel lblTelefonoReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTelefonoReferente_Create($strControlId = null) {
            $this->lblTelefonoReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblTelefonoReferente->Name = QApplication::Translate('TelefonoReferente');
            $this->lblTelefonoReferente->Text = $this->objCondicionesSocioUrbanisticas->TelefonoReferente;
            return $this->lblTelefonoReferente;
        }

        /**
         * Create and setup QTextBox txtInformeUrbanisticoFecha
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtInformeUrbanisticoFecha_Create($strControlId = null) {
            $this->txtInformeUrbanisticoFecha = new QTextBox($this->objParentObject, $strControlId);
            $this->txtInformeUrbanisticoFecha->Name = QApplication::Translate('InformeUrbanisticoFecha');
            $this->txtInformeUrbanisticoFecha->Text = $this->objCondicionesSocioUrbanisticas->InformeUrbanisticoFecha;
            $this->txtInformeUrbanisticoFecha->MaxLength = CondicionesSocioUrbanisticas::InformeUrbanisticoFechaMaxLength;
            
            return $this->txtInformeUrbanisticoFecha;
        }

        /**
         * Create and setup QLabel lblInformeUrbanisticoFecha
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblInformeUrbanisticoFecha_Create($strControlId = null) {
            $this->lblInformeUrbanisticoFecha = new QLabel($this->objParentObject, $strControlId);
            $this->lblInformeUrbanisticoFecha->Name = QApplication::Translate('InformeUrbanisticoFecha');
            $this->lblInformeUrbanisticoFecha->Text = $this->objCondicionesSocioUrbanisticas->InformeUrbanisticoFecha;
            return $this->lblInformeUrbanisticoFecha;
        }



    public $lstEquipamientoAsIdFolio;
    /**
     * Gets all associated EquipamientosAsIdFolio as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsIdFolio = new QListPanel($this->objParentObject, $this->objCondicionesSocioUrbanisticas, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsIdFolio->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsIdFolio->SetNewMethod($this, "lstEquipamientoAsIdFolio_New");
        $this->lstEquipamientoAsIdFolio->SetEditMethod($this, "lstEquipamientoAsIdFolio_Edit");
        return $this->lstEquipamientoAsIdFolio;
    }

    public function lstEquipamientoAsIdFolio_New() {
        EquipamientoModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsIdFolio->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsIdFolio->ModalPanel->objCallerControl = $this->lstEquipamientoAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsIdFolio_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objCondicionesSocioUrbanisticas->EquipamientoAsIdFolioArray[$intKey];
        $this->lstEquipamientoAsIdFolio->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsIdFolio->ModalPanel->objCallerControl = $this->lstEquipamientoAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsIdFolio;
    /**
     * Gets all associated InfraestructurasAsIdFolio as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsIdFolio = new QListPanel($this->objParentObject, $this->objCondicionesSocioUrbanisticas, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsIdFolio->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsIdFolio->SetNewMethod($this, "lstInfraestructuraAsIdFolio_New");
        $this->lstInfraestructuraAsIdFolio->SetEditMethod($this, "lstInfraestructuraAsIdFolio_Edit");
        return $this->lstInfraestructuraAsIdFolio;
    }

    public function lstInfraestructuraAsIdFolio_New() {
        InfraestructuraModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsIdFolio->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsIdFolio->ModalPanel->objCallerControl = $this->lstInfraestructuraAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsIdFolio_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objCondicionesSocioUrbanisticas->InfraestructuraAsIdFolioArray[$intKey];
        $this->lstInfraestructuraAsIdFolio->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsIdFolio->ModalPanel->objCallerControl = $this->lstInfraestructuraAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstSituacionAmbientalAsIdFolio;
    /**
     * Gets all associated SituacionAmbientalesAsIdFolio as an array of SituacionAmbiental objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return SituacionAmbiental[]
    */ 
    public function lstSituacionAmbientalAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'SituacionAmbiental';
        $strConfigArray['strRefreshMethod'] = 'SituacionAmbientalAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddSituacionAmbientalAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveSituacionAmbientalAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['SinProblemas'] = QApplication::Translate('SinProblemas');
        $strConfigArray['Columns']['ReservaElectroducto'] = QApplication::Translate('ReservaElectroducto');
        $strConfigArray['Columns']['Inundable'] = QApplication::Translate('Inundable');
        $strConfigArray['Columns']['SobreTerraplenFerroviario'] = QApplication::Translate('SobreTerraplenFerroviario');
        $strConfigArray['Columns']['SobreCaminoSirga'] = QApplication::Translate('SobreCaminoSirga');
        $strConfigArray['Columns']['ExpuestoContaminacionIndustrial'] = QApplication::Translate('ExpuestoContaminacionIndustrial');
        $strConfigArray['Columns']['SobreSueloDegradado'] = QApplication::Translate('SobreSueloDegradado');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstSituacionAmbientalAsIdFolio = new QListPanel($this->objParentObject, $this->objCondicionesSocioUrbanisticas, $strConfigArray, $strControlId);
        $this->lstSituacionAmbientalAsIdFolio->Name = SituacionAmbiental::Noun();
        $this->lstSituacionAmbientalAsIdFolio->SetNewMethod($this, "lstSituacionAmbientalAsIdFolio_New");
        $this->lstSituacionAmbientalAsIdFolio->SetEditMethod($this, "lstSituacionAmbientalAsIdFolio_Edit");
        return $this->lstSituacionAmbientalAsIdFolio;
    }

    public function lstSituacionAmbientalAsIdFolio_New() {
        SituacionAmbientalModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(SituacionAmbientalModalPanel::$strControlsArray, true);
        $this->lstSituacionAmbientalAsIdFolio->ModalPanel = new SituacionAmbientalModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstSituacionAmbientalAsIdFolio->ModalPanel->objCallerControl = $this->lstSituacionAmbientalAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstSituacionAmbientalAsIdFolio_Edit($intKey) {
        SituacionAmbientalModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(SituacionAmbientalModalPanel::$strControlsArray, true);
        $obj = $this->objCondicionesSocioUrbanisticas->SituacionAmbientalAsIdFolioArray[$intKey];
        $this->lstSituacionAmbientalAsIdFolio->ModalPanel = new SituacionAmbientalModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstSituacionAmbientalAsIdFolio->ModalPanel->objCallerControl = $this->lstSituacionAmbientalAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstTransporteAsIdFolio;
    /**
     * Gets all associated TransportesAsIdFolio as an array of Transporte objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Transporte[]
    */ 
    public function lstTransporteAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Transporte';
        $strConfigArray['strRefreshMethod'] = 'TransporteAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddTransporteAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveTransporteAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['ColectivosObject'] = QApplication::Translate('ColectivosObject');
        $strConfigArray['Columns']['FerrocarrilObject'] = QApplication::Translate('FerrocarrilObject');
        $strConfigArray['Columns']['RemisCombisObject'] = QApplication::Translate('RemisCombisObject');

        $this->lstTransporteAsIdFolio = new QListPanel($this->objParentObject, $this->objCondicionesSocioUrbanisticas, $strConfigArray, $strControlId);
        $this->lstTransporteAsIdFolio->Name = Transporte::Noun();
        $this->lstTransporteAsIdFolio->SetNewMethod($this, "lstTransporteAsIdFolio_New");
        $this->lstTransporteAsIdFolio->SetEditMethod($this, "lstTransporteAsIdFolio_Edit");
        return $this->lstTransporteAsIdFolio;
    }

    public function lstTransporteAsIdFolio_New() {
        TransporteModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $this->lstTransporteAsIdFolio->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstTransporteAsIdFolio->ModalPanel->objCallerControl = $this->lstTransporteAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstTransporteAsIdFolio_Edit($intKey) {
        TransporteModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $obj = $this->objCondicionesSocioUrbanisticas->TransporteAsIdFolioArray[$intKey];
        $this->lstTransporteAsIdFolio->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstTransporteAsIdFolio->ModalPanel->objCallerControl = $this->lstTransporteAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local CondicionesSocioUrbanisticas object.
         * @param boolean $blnReload reload CondicionesSocioUrbanisticas from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objCondicionesSocioUrbanisticas->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCondicionesSocioUrbanisticas->Id;

            if ($this->lstIdFolioObject) {
                if($this->objCondicionesSocioUrbanisticas->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objCondicionesSocioUrbanisticas->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objCondicionesSocioUrbanisticas->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objCondicionesSocioUrbanisticas->IdFolioObject) ? $this->objCondicionesSocioUrbanisticas->IdFolioObject->__toString() : null;

            if ($this->chkEspacioLibreComun) $this->chkEspacioLibreComun->Checked = $this->objCondicionesSocioUrbanisticas->EspacioLibreComun;
            if ($this->lblEspacioLibreComun) $this->lblEspacioLibreComun->Text = ($this->objCondicionesSocioUrbanisticas->EspacioLibreComun) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtPresenciaOrgSociales) $this->txtPresenciaOrgSociales->Text = $this->objCondicionesSocioUrbanisticas->PresenciaOrgSociales;
            if ($this->lblPresenciaOrgSociales) $this->lblPresenciaOrgSociales->Text = $this->objCondicionesSocioUrbanisticas->PresenciaOrgSociales;

            if ($this->txtNombreRefernte) $this->txtNombreRefernte->Text = $this->objCondicionesSocioUrbanisticas->NombreRefernte;
            if ($this->lblNombreRefernte) $this->lblNombreRefernte->Text = $this->objCondicionesSocioUrbanisticas->NombreRefernte;

            if ($this->txtTelefonoReferente) $this->txtTelefonoReferente->Text = $this->objCondicionesSocioUrbanisticas->TelefonoReferente;
            if ($this->lblTelefonoReferente) $this->lblTelefonoReferente->Text = $this->objCondicionesSocioUrbanisticas->TelefonoReferente;

            if ($this->txtInformeUrbanisticoFecha) $this->txtInformeUrbanisticoFecha->Text = $this->objCondicionesSocioUrbanisticas->InformeUrbanisticoFecha;
            if ($this->lblInformeUrbanisticoFecha) $this->lblInformeUrbanisticoFecha->Text = $this->objCondicionesSocioUrbanisticas->InformeUrbanisticoFecha;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC CONDICIONESSOCIOURBANISTICAS OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objCondicionesSocioUrbanisticas->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkEspacioLibreComun) $this->objCondicionesSocioUrbanisticas->EspacioLibreComun = $this->chkEspacioLibreComun->Checked;
                if ($this->txtPresenciaOrgSociales) $this->objCondicionesSocioUrbanisticas->PresenciaOrgSociales = $this->txtPresenciaOrgSociales->Text;
                if ($this->txtNombreRefernte) $this->objCondicionesSocioUrbanisticas->NombreRefernte = $this->txtNombreRefernte->Text;
                if ($this->txtTelefonoReferente) $this->objCondicionesSocioUrbanisticas->TelefonoReferente = $this->txtTelefonoReferente->Text;
                if ($this->txtInformeUrbanisticoFecha) $this->objCondicionesSocioUrbanisticas->InformeUrbanisticoFecha = $this->txtInformeUrbanisticoFecha->Text;


        }

        public function SaveCondicionesSocioUrbanisticas() {
            return $this->Save();
        }
        /**
         * This will save this object's CondicionesSocioUrbanisticas instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the CondicionesSocioUrbanisticas object
                $idReturn = $this->objCondicionesSocioUrbanisticas->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's CondicionesSocioUrbanisticas instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteCondicionesSocioUrbanisticas() {
            $this->objCondicionesSocioUrbanisticas->Delete();
        }        



        ///////////////////////////////////////////////
        // PUBLIC GETTERS and SETTERS
        ///////////////////////////////////////////////

        /**
         * Override method to perform a property "Get"
         * This will get the value of $strName
         *
         * @param string $strName Name of the property to get
         * @return mixed
         */
        public function __get($strName) {
            switch ($strName) {
                // General MetaControlVariables
                case 'CondicionesSocioUrbanisticas': return $this->objCondicionesSocioUrbanisticas;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to CondicionesSocioUrbanisticas fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdFolioControl':
                    if (!$this->lstIdFolioObject) return $this->lstIdFolioObject_Create();
                    return $this->lstIdFolioObject;
                case 'IdFolioLabel':
                    if (!$this->lblIdFolio) return $this->lblIdFolio_Create();
                    return $this->lblIdFolio;
                case 'EspacioLibreComunControl':
                    if (!$this->chkEspacioLibreComun) return $this->chkEspacioLibreComun_Create();
                    return $this->chkEspacioLibreComun;
                case 'EspacioLibreComunLabel':
                    if (!$this->lblEspacioLibreComun) return $this->lblEspacioLibreComun_Create();
                    return $this->lblEspacioLibreComun;
                case 'PresenciaOrgSocialesControl':
                    if (!$this->txtPresenciaOrgSociales) return $this->txtPresenciaOrgSociales_Create();
                    return $this->txtPresenciaOrgSociales;
                case 'PresenciaOrgSocialesLabel':
                    if (!$this->lblPresenciaOrgSociales) return $this->lblPresenciaOrgSociales_Create();
                    return $this->lblPresenciaOrgSociales;
                case 'NombreRefernteControl':
                    if (!$this->txtNombreRefernte) return $this->txtNombreRefernte_Create();
                    return $this->txtNombreRefernte;
                case 'NombreRefernteLabel':
                    if (!$this->lblNombreRefernte) return $this->lblNombreRefernte_Create();
                    return $this->lblNombreRefernte;
                case 'TelefonoReferenteControl':
                    if (!$this->txtTelefonoReferente) return $this->txtTelefonoReferente_Create();
                    return $this->txtTelefonoReferente;
                case 'TelefonoReferenteLabel':
                    if (!$this->lblTelefonoReferente) return $this->lblTelefonoReferente_Create();
                    return $this->lblTelefonoReferente;
                case 'InformeUrbanisticoFechaControl':
                    if (!$this->txtInformeUrbanisticoFecha) return $this->txtInformeUrbanisticoFecha_Create();
                    return $this->txtInformeUrbanisticoFecha;
                case 'InformeUrbanisticoFechaLabel':
                    if (!$this->lblInformeUrbanisticoFecha) return $this->lblInformeUrbanisticoFecha_Create();
                    return $this->lblInformeUrbanisticoFecha;
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
            try {
                switch ($strName) {
                    // Controls that point to CondicionesSocioUrbanisticas fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'EspacioLibreComunControl':
                        return ($this->chkEspacioLibreComun = QType::Cast($mixValue, 'QControl'));
                    case 'PresenciaOrgSocialesControl':
                        return ($this->txtPresenciaOrgSociales = QType::Cast($mixValue, 'QControl'));
                    case 'NombreRefernteControl':
                        return ($this->txtNombreRefernte = QType::Cast($mixValue, 'QControl'));
                    case 'TelefonoReferenteControl':
                        return ($this->txtTelefonoReferente = QType::Cast($mixValue, 'QControl'));
                    case 'InformeUrbanisticoFechaControl':
                        return ($this->txtInformeUrbanisticoFecha = QType::Cast($mixValue, 'QControl'));
                    default:
                        return parent::__set($strName, $mixValue);
                }
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
        }
    }
?>
