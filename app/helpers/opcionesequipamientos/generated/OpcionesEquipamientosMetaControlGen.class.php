<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the OpcionesEquipamientos class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single OpcionesEquipamientos object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a OpcionesEquipamientosMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read OpcionesEquipamientos $OpcionesEquipamientos the actual OpcionesEquipamientos data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $OpcionControl
     * property-read QLabel $OpcionLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class OpcionesEquipamientosMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var OpcionesEquipamientos
                */
        public $objOpcionesEquipamientos;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of OpcionesEquipamientos's individual data fields
        protected $lblId;
        protected $txtOpcion;

        // Controls that allow the viewing of OpcionesEquipamientos's individual data fields
        protected $lblOpcion;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * OpcionesEquipamientosMetaControl to edit a single OpcionesEquipamientos object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single OpcionesEquipamientos object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEquipamientosMetaControl
         * @param OpcionesEquipamientos $objOpcionesEquipamientos new or existing OpcionesEquipamientos object
         */
         public function __construct($objParentObject, OpcionesEquipamientos $objOpcionesEquipamientos) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this OpcionesEquipamientosMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked OpcionesEquipamientos object
            $this->objOpcionesEquipamientos = $objOpcionesEquipamientos;

            // Figure out if we're Editing or Creating New
            if ($this->objOpcionesEquipamientos->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEquipamientosMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesEquipamientos object creation - defaults to CreateOrEdit
          * @return OpcionesEquipamientosMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objOpcionesEquipamientos = OpcionesEquipamientos::Load($intId);

                // OpcionesEquipamientos was found -- return it!
                if ($objOpcionesEquipamientos)
                    return new OpcionesEquipamientosMetaControl($objParentObject, $objOpcionesEquipamientos);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a OpcionesEquipamientos object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new OpcionesEquipamientosMetaControl($objParentObject, new OpcionesEquipamientos());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEquipamientosMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesEquipamientos object creation - defaults to CreateOrEdit
         * @return OpcionesEquipamientosMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return OpcionesEquipamientosMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEquipamientosMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesEquipamientos object creation - defaults to CreateOrEdit
         * @return OpcionesEquipamientosMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return OpcionesEquipamientosMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objOpcionesEquipamientos->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtOpcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOpcion_Create($strControlId = null) {
            $this->txtOpcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOpcion->Name = QApplication::Translate('Opcion');
            $this->txtOpcion->Text = $this->objOpcionesEquipamientos->Opcion;
            $this->txtOpcion->Required = true;
            $this->txtOpcion->MaxLength = OpcionesEquipamientos::OpcionMaxLength;
            
            return $this->txtOpcion;
        }

        /**
         * Create and setup QLabel lblOpcion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOpcion_Create($strControlId = null) {
            $this->lblOpcion = new QLabel($this->objParentObject, $strControlId);
            $this->lblOpcion->Name = QApplication::Translate('Opcion');
            $this->lblOpcion->Text = $this->objOpcionesEquipamientos->Opcion;
            $this->lblOpcion->Required = true;
            return $this->lblOpcion;
        }



    public $lstEquipamientoAsUnidadSanitaria;
    /**
     * Gets all associated EquipamientosAsUnidadSanitaria as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsUnidadSanitaria_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsUnidadSanitariaArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'UnidadSanitaria';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsUnidadSanitaria';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsUnidadSanitaria';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsUnidadSanitaria = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsUnidadSanitaria->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsUnidadSanitaria->SetNewMethod($this, "lstEquipamientoAsUnidadSanitaria_New");
        $this->lstEquipamientoAsUnidadSanitaria->SetEditMethod($this, "lstEquipamientoAsUnidadSanitaria_Edit");
        return $this->lstEquipamientoAsUnidadSanitaria;
    }

    public function lstEquipamientoAsUnidadSanitaria_New() {
        EquipamientoModalPanel::$strControlsArray['lstUnidadSanitariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsUnidadSanitaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsUnidadSanitaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsUnidadSanitaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsUnidadSanitaria_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstUnidadSanitariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsUnidadSanitariaArray[$intKey];
        $this->lstEquipamientoAsUnidadSanitaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsUnidadSanitaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsUnidadSanitaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstEquipamientoAsJardinInfantes;
    /**
     * Gets all associated EquipamientosAsJardinInfantes as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsJardinInfantes_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsJardinInfantesArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'JardinInfantes';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsJardinInfantes';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsJardinInfantes';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsJardinInfantes = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsJardinInfantes->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsJardinInfantes->SetNewMethod($this, "lstEquipamientoAsJardinInfantes_New");
        $this->lstEquipamientoAsJardinInfantes->SetEditMethod($this, "lstEquipamientoAsJardinInfantes_Edit");
        return $this->lstEquipamientoAsJardinInfantes;
    }

    public function lstEquipamientoAsJardinInfantes_New() {
        EquipamientoModalPanel::$strControlsArray['lstJardinInfantesObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsJardinInfantes->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsJardinInfantes->ModalPanel->objCallerControl = $this->lstEquipamientoAsJardinInfantes;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsJardinInfantes_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstJardinInfantesObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsJardinInfantesArray[$intKey];
        $this->lstEquipamientoAsJardinInfantes->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsJardinInfantes->ModalPanel->objCallerControl = $this->lstEquipamientoAsJardinInfantes;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstEquipamientoAsEscuelaPrimaria;
    /**
     * Gets all associated EquipamientosAsEscuelaPrimaria as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsEscuelaPrimaria_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsEscuelaPrimariaArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'EscuelaPrimaria';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsEscuelaPrimaria';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsEscuelaPrimaria';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsEscuelaPrimaria = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsEscuelaPrimaria->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsEscuelaPrimaria->SetNewMethod($this, "lstEquipamientoAsEscuelaPrimaria_New");
        $this->lstEquipamientoAsEscuelaPrimaria->SetEditMethod($this, "lstEquipamientoAsEscuelaPrimaria_Edit");
        return $this->lstEquipamientoAsEscuelaPrimaria;
    }

    public function lstEquipamientoAsEscuelaPrimaria_New() {
        EquipamientoModalPanel::$strControlsArray['lstEscuelaPrimariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsEscuelaPrimaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsEscuelaPrimaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsEscuelaPrimaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsEscuelaPrimaria_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstEscuelaPrimariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsEscuelaPrimariaArray[$intKey];
        $this->lstEquipamientoAsEscuelaPrimaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsEscuelaPrimaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsEscuelaPrimaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstEquipamientoAsEscuelaSecundaria;
    /**
     * Gets all associated EquipamientosAsEscuelaSecundaria as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsEscuelaSecundaria_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsEscuelaSecundariaArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'EscuelaSecundaria';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsEscuelaSecundaria';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsEscuelaSecundaria';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsEscuelaSecundaria = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsEscuelaSecundaria->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsEscuelaSecundaria->SetNewMethod($this, "lstEquipamientoAsEscuelaSecundaria_New");
        $this->lstEquipamientoAsEscuelaSecundaria->SetEditMethod($this, "lstEquipamientoAsEscuelaSecundaria_Edit");
        return $this->lstEquipamientoAsEscuelaSecundaria;
    }

    public function lstEquipamientoAsEscuelaSecundaria_New() {
        EquipamientoModalPanel::$strControlsArray['lstEscuelaSecundariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsEscuelaSecundaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsEscuelaSecundaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsEscuelaSecundaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsEscuelaSecundaria_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstEscuelaSecundariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsEscuelaSecundariaArray[$intKey];
        $this->lstEquipamientoAsEscuelaSecundaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsEscuelaSecundaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsEscuelaSecundaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstEquipamientoAsComedor;
    /**
     * Gets all associated EquipamientosAsComedor as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsComedor_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsComedorArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'Comedor';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsComedor';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsComedor';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsComedor = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsComedor->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsComedor->SetNewMethod($this, "lstEquipamientoAsComedor_New");
        $this->lstEquipamientoAsComedor->SetEditMethod($this, "lstEquipamientoAsComedor_Edit");
        return $this->lstEquipamientoAsComedor;
    }

    public function lstEquipamientoAsComedor_New() {
        EquipamientoModalPanel::$strControlsArray['lstComedorObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsComedor->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsComedor->ModalPanel->objCallerControl = $this->lstEquipamientoAsComedor;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsComedor_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstComedorObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsComedorArray[$intKey];
        $this->lstEquipamientoAsComedor->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsComedor->ModalPanel->objCallerControl = $this->lstEquipamientoAsComedor;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstEquipamientoAsSalonUsosMultiples;
    /**
     * Gets all associated EquipamientosAsSalonUsosMultiples as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsSalonUsosMultiples_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsSalonUsosMultiplesArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'SalonUsosMultiples';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsSalonUsosMultiples';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsSalonUsosMultiples';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['CentroIntegracionComunitariaObject'] = QApplication::Translate('CentroIntegracionComunitariaObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsSalonUsosMultiples = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsSalonUsosMultiples->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsSalonUsosMultiples->SetNewMethod($this, "lstEquipamientoAsSalonUsosMultiples_New");
        $this->lstEquipamientoAsSalonUsosMultiples->SetEditMethod($this, "lstEquipamientoAsSalonUsosMultiples_Edit");
        return $this->lstEquipamientoAsSalonUsosMultiples;
    }

    public function lstEquipamientoAsSalonUsosMultiples_New() {
        EquipamientoModalPanel::$strControlsArray['lstSalonUsosMultiplesObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsSalonUsosMultiples->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsSalonUsosMultiples->ModalPanel->objCallerControl = $this->lstEquipamientoAsSalonUsosMultiples;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsSalonUsosMultiples_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstSalonUsosMultiplesObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsSalonUsosMultiplesArray[$intKey];
        $this->lstEquipamientoAsSalonUsosMultiples->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsSalonUsosMultiples->ModalPanel->objCallerControl = $this->lstEquipamientoAsSalonUsosMultiples;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstEquipamientoAsCentroIntegracionComunitaria;
    /**
     * Gets all associated EquipamientosAsCentroIntegracionComunitaria as an array of Equipamiento objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Equipamiento[]
    */ 
    public function lstEquipamientoAsCentroIntegracionComunitaria_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Equipamiento';
        $strConfigArray['strRefreshMethod'] = 'EquipamientoAsCentroIntegracionComunitariaArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'CentroIntegracionComunitaria';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEquipamientoAsCentroIntegracionComunitaria';
        $strConfigArray['strRemoveMethod'] = 'RemoveEquipamientoAsCentroIntegracionComunitaria';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['UnidadSanitariaObject'] = QApplication::Translate('UnidadSanitariaObject');
        $strConfigArray['Columns']['JardinInfantesObject'] = QApplication::Translate('JardinInfantesObject');
        $strConfigArray['Columns']['EscuelaPrimariaObject'] = QApplication::Translate('EscuelaPrimariaObject');
        $strConfigArray['Columns']['EscuelaSecundariaObject'] = QApplication::Translate('EscuelaSecundariaObject');
        $strConfigArray['Columns']['ComedorObject'] = QApplication::Translate('ComedorObject');
        $strConfigArray['Columns']['SalonUsosMultiplesObject'] = QApplication::Translate('SalonUsosMultiplesObject');
        $strConfigArray['Columns']['Otro'] = QApplication::Translate('Otro');

        $this->lstEquipamientoAsCentroIntegracionComunitaria = new QListPanel($this->objParentObject, $this->objOpcionesEquipamientos, $strConfigArray, $strControlId);
        $this->lstEquipamientoAsCentroIntegracionComunitaria->Name = Equipamiento::Noun();
        $this->lstEquipamientoAsCentroIntegracionComunitaria->SetNewMethod($this, "lstEquipamientoAsCentroIntegracionComunitaria_New");
        $this->lstEquipamientoAsCentroIntegracionComunitaria->SetEditMethod($this, "lstEquipamientoAsCentroIntegracionComunitaria_Edit");
        return $this->lstEquipamientoAsCentroIntegracionComunitaria;
    }

    public function lstEquipamientoAsCentroIntegracionComunitaria_New() {
        EquipamientoModalPanel::$strControlsArray['lstCentroIntegracionComunitariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $this->lstEquipamientoAsCentroIntegracionComunitaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEquipamientoAsCentroIntegracionComunitaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsCentroIntegracionComunitaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEquipamientoAsCentroIntegracionComunitaria_Edit($intKey) {
        EquipamientoModalPanel::$strControlsArray['lstCentroIntegracionComunitariaObject'] = false;
        $strControlsArray = array_keys(EquipamientoModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEquipamientos->EquipamientoAsCentroIntegracionComunitariaArray[$intKey];
        $this->lstEquipamientoAsCentroIntegracionComunitaria->ModalPanel = new EquipamientoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEquipamientoAsCentroIntegracionComunitaria->ModalPanel->objCallerControl = $this->lstEquipamientoAsCentroIntegracionComunitaria;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local OpcionesEquipamientos object.
         * @param boolean $blnReload reload OpcionesEquipamientos from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objOpcionesEquipamientos->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOpcionesEquipamientos->Id;

            if ($this->txtOpcion) $this->txtOpcion->Text = $this->objOpcionesEquipamientos->Opcion;
            if ($this->lblOpcion) $this->lblOpcion->Text = $this->objOpcionesEquipamientos->Opcion;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC OPCIONESEQUIPAMIENTOS OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtOpcion) $this->objOpcionesEquipamientos->Opcion = $this->txtOpcion->Text;


        }

        public function SaveOpcionesEquipamientos() {
            return $this->Save();
        }
        /**
         * This will save this object's OpcionesEquipamientos instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the OpcionesEquipamientos object
                $idReturn = $this->objOpcionesEquipamientos->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's OpcionesEquipamientos instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteOpcionesEquipamientos() {
            $this->objOpcionesEquipamientos->Delete();
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
                case 'OpcionesEquipamientos': return $this->objOpcionesEquipamientos;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to OpcionesEquipamientos fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'OpcionControl':
                    if (!$this->txtOpcion) return $this->txtOpcion_Create();
                    return $this->txtOpcion;
                case 'OpcionLabel':
                    if (!$this->lblOpcion) return $this->lblOpcion_Create();
                    return $this->lblOpcion;
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
                    // Controls that point to OpcionesEquipamientos fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'OpcionControl':
                        return ($this->txtOpcion = QType::Cast($mixValue, 'QControl'));
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
