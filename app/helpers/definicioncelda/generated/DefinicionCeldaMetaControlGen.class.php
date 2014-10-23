<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the DefinicionCelda class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single DefinicionCelda object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a DefinicionCeldaMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read DefinicionCelda $DefinicionCelda the actual DefinicionCelda data class being edited
     * property QFloatTextBox $IdDefinicionCeldaControl
     * property-read QLabel $IdDefinicionCeldaLabel
     * property QIntegerTextBox $IdDefinicionColumnaControl
     * property-read QLabel $IdDefinicionColumnaLabel
     * property QIntegerTextBox $IdDefinicionFilaControl
     * property-read QLabel $IdDefinicionFilaLabel
     * property QIntegerTextBox $IdDefinicionCuadroControl
     * property-read QLabel $IdDefinicionCuadroLabel
     * property QCheckBox $DisabledControl
     * property-read QLabel $DisabledLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class DefinicionCeldaMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var DefinicionCelda
                */
        public $objDefinicionCelda;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of DefinicionCelda's individual data fields
        protected $txtIdDefinicionCelda;
        protected $txtIdDefinicionColumna;
        protected $txtIdDefinicionFila;
        protected $txtIdDefinicionCuadro;
        protected $chkDisabled;

        // Controls that allow the viewing of DefinicionCelda's individual data fields
        protected $lblIdDefinicionCelda;
        protected $lblIdDefinicionColumna;
        protected $lblIdDefinicionFila;
        protected $lblIdDefinicionCuadro;
        protected $lblDisabled;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * DefinicionCeldaMetaControl to edit a single DefinicionCelda object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single DefinicionCelda object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCeldaMetaControl
         * @param DefinicionCelda $objDefinicionCelda new or existing DefinicionCelda object
         */
         public function __construct($objParentObject, DefinicionCelda $objDefinicionCelda) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this DefinicionCeldaMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked DefinicionCelda object
            $this->objDefinicionCelda = $objDefinicionCelda;

            // Figure out if we're Editing or Creating New
            if ($this->objDefinicionCelda->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCeldaMetaControl
         * @param double $fltIdDefinicionCelda primary key value
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCelda object creation - defaults to CreateOrEdit
          * @return DefinicionCeldaMetaControl
         */
        public static function Create($objParentObject, $fltIdDefinicionCelda = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($fltIdDefinicionCelda)) {
                $objDefinicionCelda = DefinicionCelda::Load($fltIdDefinicionCelda);

                // DefinicionCelda was found -- return it!
                if ($objDefinicionCelda)
                    return new DefinicionCeldaMetaControl($objParentObject, $objDefinicionCelda);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a DefinicionCelda object with PK arguments: ' . $fltIdDefinicionCelda);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new DefinicionCeldaMetaControl($objParentObject, new DefinicionCelda());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCeldaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCelda object creation - defaults to CreateOrEdit
         * @return DefinicionCeldaMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $fltIdDefinicionCelda = QApplication::PathInfo(0);
            return DefinicionCeldaMetaControl::Create($objParentObject, $fltIdDefinicionCelda, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCeldaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCelda object creation - defaults to CreateOrEdit
         * @return DefinicionCeldaMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $fltIdDefinicionCelda = QApplication::QueryString('id');
            return DefinicionCeldaMetaControl::Create($objParentObject, $fltIdDefinicionCelda, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QFloatTextBox txtIdDefinicionCelda
         * @param string $strControlId optional ControlId to use
         * @return QFloatTextBox
         */
        public function txtIdDefinicionCelda_Create($strControlId = null) {
            $this->txtIdDefinicionCelda = new QFloatTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionCelda->Name = QApplication::Translate('IdDefinicionCelda');
            $this->txtIdDefinicionCelda->Text = $this->objDefinicionCelda->IdDefinicionCelda;
            $this->txtIdDefinicionCelda->Required = true;
        }

        /**
         * Create and setup QLabel lblIdDefinicionCelda
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblIdDefinicionCelda_Create($strControlId = null, $strFormat = null) {
            $this->lblIdDefinicionCelda = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionCelda->Name = QApplication::Translate('IdDefinicionCelda');
            $this->lblIdDefinicionCelda->Text = $this->objDefinicionCelda->IdDefinicionCelda;
            $this->lblIdDefinicionCelda->Required = true;
            $this->lblIdDefinicionCelda->Format = $strFormat;
            return $this->lblIdDefinicionCelda;
        }

        /**
         * Create and setup QIntegerTextBox txtIdDefinicionColumna
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtIdDefinicionColumna_Create($strControlId = null) {
            $this->txtIdDefinicionColumna = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionColumna->Name = QApplication::Translate('IdDefinicionColumna');
            $this->txtIdDefinicionColumna->Text = $this->objDefinicionCelda->IdDefinicionColumna;
            $this->txtIdDefinicionColumna->Required = true;
                        $this->txtIdDefinicionColumna->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtIdDefinicionColumna->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtIdDefinicionColumna;
        }

        /**
         * Create and setup QLabel lblIdDefinicionColumna
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblIdDefinicionColumna_Create($strControlId = null, $strFormat = null) {
            $this->lblIdDefinicionColumna = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionColumna->Name = QApplication::Translate('IdDefinicionColumna');
            $this->lblIdDefinicionColumna->Text = $this->objDefinicionCelda->IdDefinicionColumna;
            $this->lblIdDefinicionColumna->Required = true;
            $this->lblIdDefinicionColumna->Format = $strFormat;
            return $this->lblIdDefinicionColumna;
        }

        /**
         * Create and setup QIntegerTextBox txtIdDefinicionFila
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtIdDefinicionFila_Create($strControlId = null) {
            $this->txtIdDefinicionFila = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionFila->Name = QApplication::Translate('IdDefinicionFila');
            $this->txtIdDefinicionFila->Text = $this->objDefinicionCelda->IdDefinicionFila;
            $this->txtIdDefinicionFila->Required = true;
                        $this->txtIdDefinicionFila->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtIdDefinicionFila->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtIdDefinicionFila;
        }

        /**
         * Create and setup QLabel lblIdDefinicionFila
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblIdDefinicionFila_Create($strControlId = null, $strFormat = null) {
            $this->lblIdDefinicionFila = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionFila->Name = QApplication::Translate('IdDefinicionFila');
            $this->lblIdDefinicionFila->Text = $this->objDefinicionCelda->IdDefinicionFila;
            $this->lblIdDefinicionFila->Required = true;
            $this->lblIdDefinicionFila->Format = $strFormat;
            return $this->lblIdDefinicionFila;
        }

        /**
         * Create and setup QIntegerTextBox txtIdDefinicionCuadro
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtIdDefinicionCuadro_Create($strControlId = null) {
            $this->txtIdDefinicionCuadro = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionCuadro->Name = QApplication::Translate('IdDefinicionCuadro');
            $this->txtIdDefinicionCuadro->Text = $this->objDefinicionCelda->IdDefinicionCuadro;
            $this->txtIdDefinicionCuadro->Required = true;
                        $this->txtIdDefinicionCuadro->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtIdDefinicionCuadro->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtIdDefinicionCuadro;
        }

        /**
         * Create and setup QLabel lblIdDefinicionCuadro
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblIdDefinicionCuadro_Create($strControlId = null, $strFormat = null) {
            $this->lblIdDefinicionCuadro = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionCuadro->Name = QApplication::Translate('IdDefinicionCuadro');
            $this->lblIdDefinicionCuadro->Text = $this->objDefinicionCelda->IdDefinicionCuadro;
            $this->lblIdDefinicionCuadro->Required = true;
            $this->lblIdDefinicionCuadro->Format = $strFormat;
            return $this->lblIdDefinicionCuadro;
        }

        /**
         * Create and setup QCheckBox chkDisabled
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkDisabled_Create($strControlId = null) {
            $this->chkDisabled = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkDisabled->Name = QApplication::Translate('Disabled');
            $this->chkDisabled->Checked = $this->objDefinicionCelda->Disabled;
                        return $this->chkDisabled;
        }

        /**
         * Create and setup QLabel lblDisabled
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDisabled_Create($strControlId = null) {
            $this->lblDisabled = new QLabel($this->objParentObject, $strControlId);
            $this->lblDisabled->Name = QApplication::Translate('Disabled');
            $this->lblDisabled->Text = ($this->objDefinicionCelda->Disabled) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblDisabled;
        }



    public $lstDatosCeldaAsId;
    /**
     * Gets all associated DatosCeldasAsId as an array of DatosCelda objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DatosCelda[]
    */ 
    public function lstDatosCeldaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DatosCelda';
        $strConfigArray['strRefreshMethod'] = 'DatosCeldaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCelda';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDatosCelda';
        $strConfigArray['strAddMethod'] = 'AddDatosCeldaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDatosCeldaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Valor'] = QApplication::Translate('Valor');
        $strConfigArray['Columns']['IdDatosCuadroObject'] = QApplication::Translate('IdDatosCuadroObject');

        $this->lstDatosCeldaAsId = new QListPanel($this->objParentObject, $this->objDefinicionCelda, $strConfigArray, $strControlId);
        $this->lstDatosCeldaAsId->Name = DatosCelda::Noun();
        $this->lstDatosCeldaAsId->SetNewMethod($this, "lstDatosCeldaAsId_New");
        $this->lstDatosCeldaAsId->SetEditMethod($this, "lstDatosCeldaAsId_Edit");
        return $this->lstDatosCeldaAsId;
    }

    public function lstDatosCeldaAsId_New() {
        DatosCeldaModalPanel::$strControlsArray['lstIdDefinicionCeldaObject'] = false;
        $strControlsArray = array_keys(DatosCeldaModalPanel::$strControlsArray, true);
        $this->lstDatosCeldaAsId->ModalPanel = new DatosCeldaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDatosCeldaAsId->ModalPanel->objCallerControl = $this->lstDatosCeldaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDatosCeldaAsId_Edit($intKey) {
        DatosCeldaModalPanel::$strControlsArray['lstIdDefinicionCeldaObject'] = false;
        $strControlsArray = array_keys(DatosCeldaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCelda->DatosCeldaAsIdArray[$intKey];
        $this->lstDatosCeldaAsId->ModalPanel = new DatosCeldaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDatosCeldaAsId->ModalPanel->objCallerControl = $this->lstDatosCeldaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local DefinicionCelda object.
         * @param boolean $blnReload reload DefinicionCelda from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objDefinicionCelda->Reload();

            if ($this->txtIdDefinicionCelda) $this->txtIdDefinicionCelda->Text = $this->objDefinicionCelda->IdDefinicionCelda;
            if ($this->lblIdDefinicionCelda) $this->lblIdDefinicionCelda->Text = $this->objDefinicionCelda->IdDefinicionCelda;

            if ($this->txtIdDefinicionColumna) $this->txtIdDefinicionColumna->Text = $this->objDefinicionCelda->IdDefinicionColumna;
            if ($this->lblIdDefinicionColumna) $this->lblIdDefinicionColumna->Text = $this->objDefinicionCelda->IdDefinicionColumna;

            if ($this->txtIdDefinicionFila) $this->txtIdDefinicionFila->Text = $this->objDefinicionCelda->IdDefinicionFila;
            if ($this->lblIdDefinicionFila) $this->lblIdDefinicionFila->Text = $this->objDefinicionCelda->IdDefinicionFila;

            if ($this->txtIdDefinicionCuadro) $this->txtIdDefinicionCuadro->Text = $this->objDefinicionCelda->IdDefinicionCuadro;
            if ($this->lblIdDefinicionCuadro) $this->lblIdDefinicionCuadro->Text = $this->objDefinicionCelda->IdDefinicionCuadro;

            if ($this->chkDisabled) $this->chkDisabled->Checked = $this->objDefinicionCelda->Disabled;
            if ($this->lblDisabled) $this->lblDisabled->Text = ($this->objDefinicionCelda->Disabled) ? QApplication::Translate('Yes') : QApplication::Translate('No');

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC DEFINICIONCELDA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtIdDefinicionCelda) $this->objDefinicionCelda->IdDefinicionCelda = $this->txtIdDefinicionCelda->Text;
                if ($this->txtIdDefinicionColumna) $this->objDefinicionCelda->IdDefinicionColumna = $this->txtIdDefinicionColumna->Text;
                if ($this->txtIdDefinicionFila) $this->objDefinicionCelda->IdDefinicionFila = $this->txtIdDefinicionFila->Text;
                if ($this->txtIdDefinicionCuadro) $this->objDefinicionCelda->IdDefinicionCuadro = $this->txtIdDefinicionCuadro->Text;
                if ($this->chkDisabled) $this->objDefinicionCelda->Disabled = $this->chkDisabled->Checked;


        }

        public function SaveDefinicionCelda() {
            return $this->Save();
        }
        /**
         * This will save this object's DefinicionCelda instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the DefinicionCelda object
                $idReturn = $this->objDefinicionCelda->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's DefinicionCelda instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteDefinicionCelda() {
            $this->objDefinicionCelda->Delete();
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
                case 'DefinicionCelda': return $this->objDefinicionCelda;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to DefinicionCelda fields -- will be created dynamically if not yet created
                case 'IdDefinicionCeldaControl':
                    if (!$this->txtIdDefinicionCelda) return $this->txtIdDefinicionCelda_Create();
                    return $this->txtIdDefinicionCelda;
                case 'IdDefinicionCeldaLabel':
                    if (!$this->lblIdDefinicionCelda) return $this->lblIdDefinicionCelda_Create();
                    return $this->lblIdDefinicionCelda;
                case 'IdDefinicionColumnaControl':
                    if (!$this->txtIdDefinicionColumna) return $this->txtIdDefinicionColumna_Create();
                    return $this->txtIdDefinicionColumna;
                case 'IdDefinicionColumnaLabel':
                    if (!$this->lblIdDefinicionColumna) return $this->lblIdDefinicionColumna_Create();
                    return $this->lblIdDefinicionColumna;
                case 'IdDefinicionFilaControl':
                    if (!$this->txtIdDefinicionFila) return $this->txtIdDefinicionFila_Create();
                    return $this->txtIdDefinicionFila;
                case 'IdDefinicionFilaLabel':
                    if (!$this->lblIdDefinicionFila) return $this->lblIdDefinicionFila_Create();
                    return $this->lblIdDefinicionFila;
                case 'IdDefinicionCuadroControl':
                    if (!$this->txtIdDefinicionCuadro) return $this->txtIdDefinicionCuadro_Create();
                    return $this->txtIdDefinicionCuadro;
                case 'IdDefinicionCuadroLabel':
                    if (!$this->lblIdDefinicionCuadro) return $this->lblIdDefinicionCuadro_Create();
                    return $this->lblIdDefinicionCuadro;
                case 'DisabledControl':
                    if (!$this->chkDisabled) return $this->chkDisabled_Create();
                    return $this->chkDisabled;
                case 'DisabledLabel':
                    if (!$this->lblDisabled) return $this->lblDisabled_Create();
                    return $this->lblDisabled;
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
                    // Controls that point to DefinicionCelda fields
                    case 'IdDefinicionCeldaControl':
                        return ($this->txtIdDefinicionCelda = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionColumnaControl':
                        return ($this->txtIdDefinicionColumna = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionFilaControl':
                        return ($this->txtIdDefinicionFila = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionCuadroControl':
                        return ($this->txtIdDefinicionCuadro = QType::Cast($mixValue, 'QControl'));
                    case 'DisabledControl':
                        return ($this->chkDisabled = QType::Cast($mixValue, 'QControl'));
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
