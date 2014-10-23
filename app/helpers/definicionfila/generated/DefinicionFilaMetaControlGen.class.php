<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the DefinicionFila class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single DefinicionFila object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a DefinicionFilaMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read DefinicionFila $DefinicionFila the actual DefinicionFila data class being edited
     * property QIntegerTextBox $IdDefinicionFilaControl
     * property-read QLabel $IdDefinicionFilaLabel
     * property QTextBox $NombreCortoControl
     * property-read QLabel $NombreCortoLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QTextBox $TablaTipoControl
     * property-read QLabel $TablaTipoLabel
     * property QIntegerTextBox $CodigoRelacionalControl
     * property-read QLabel $CodigoRelacionalLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class DefinicionFilaMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var DefinicionFila
                */
        public $objDefinicionFila;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of DefinicionFila's individual data fields
        protected $txtIdDefinicionFila;
        protected $txtNombreCorto;
        protected $txtNombre;
        protected $txtTablaTipo;
        protected $txtCodigoRelacional;

        // Controls that allow the viewing of DefinicionFila's individual data fields
        protected $lblIdDefinicionFila;
        protected $lblNombreCorto;
        protected $lblNombre;
        protected $lblTablaTipo;
        protected $lblCodigoRelacional;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * DefinicionFilaMetaControl to edit a single DefinicionFila object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single DefinicionFila object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionFilaMetaControl
         * @param DefinicionFila $objDefinicionFila new or existing DefinicionFila object
         */
         public function __construct($objParentObject, DefinicionFila $objDefinicionFila) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this DefinicionFilaMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked DefinicionFila object
            $this->objDefinicionFila = $objDefinicionFila;

            // Figure out if we're Editing or Creating New
            if ($this->objDefinicionFila->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionFilaMetaControl
         * @param integer $intIdDefinicionFila primary key value
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionFila object creation - defaults to CreateOrEdit
          * @return DefinicionFilaMetaControl
         */
        public static function Create($objParentObject, $intIdDefinicionFila = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdDefinicionFila)) {
                $objDefinicionFila = DefinicionFila::Load($intIdDefinicionFila);

                // DefinicionFila was found -- return it!
                if ($objDefinicionFila)
                    return new DefinicionFilaMetaControl($objParentObject, $objDefinicionFila);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a DefinicionFila object with PK arguments: ' . $intIdDefinicionFila);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new DefinicionFilaMetaControl($objParentObject, new DefinicionFila());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionFilaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionFila object creation - defaults to CreateOrEdit
         * @return DefinicionFilaMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionFila = QApplication::PathInfo(0);
            return DefinicionFilaMetaControl::Create($objParentObject, $intIdDefinicionFila, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionFilaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionFila object creation - defaults to CreateOrEdit
         * @return DefinicionFilaMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionFila = QApplication::QueryString('id');
            return DefinicionFilaMetaControl::Create($objParentObject, $intIdDefinicionFila, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QIntegerTextBox txtIdDefinicionFila
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtIdDefinicionFila_Create($strControlId = null) {
            $this->txtIdDefinicionFila = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionFila->Name = QApplication::Translate('IdDefinicionFila');
            $this->txtIdDefinicionFila->Text = $this->objDefinicionFila->IdDefinicionFila;
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
            $this->lblIdDefinicionFila->Text = $this->objDefinicionFila->IdDefinicionFila;
            $this->lblIdDefinicionFila->Required = true;
            $this->lblIdDefinicionFila->Format = $strFormat;
            return $this->lblIdDefinicionFila;
        }

        /**
         * Create and setup QTextBox txtNombreCorto
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombreCorto_Create($strControlId = null) {
            $this->txtNombreCorto = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombreCorto->Name = QApplication::Translate('NombreCorto');
            $this->txtNombreCorto->Text = $this->objDefinicionFila->NombreCorto;
            $this->txtNombreCorto->Required = true;
            
            return $this->txtNombreCorto;
        }

        /**
         * Create and setup QLabel lblNombreCorto
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombreCorto_Create($strControlId = null) {
            $this->lblNombreCorto = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombreCorto->Name = QApplication::Translate('NombreCorto');
            $this->lblNombreCorto->Text = $this->objDefinicionFila->NombreCorto;
            $this->lblNombreCorto->Required = true;
            return $this->lblNombreCorto;
        }

        /**
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('Nombre');
            $this->txtNombre->Text = $this->objDefinicionFila->Nombre;
            
            return $this->txtNombre;
        }

        /**
         * Create and setup QLabel lblNombre
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombre_Create($strControlId = null) {
            $this->lblNombre = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombre->Name = QApplication::Translate('Nombre');
            $this->lblNombre->Text = $this->objDefinicionFila->Nombre;
            return $this->lblNombre;
        }

        /**
         * Create and setup QTextBox txtTablaTipo
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTablaTipo_Create($strControlId = null) {
            $this->txtTablaTipo = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTablaTipo->Name = QApplication::Translate('TablaTipo');
            $this->txtTablaTipo->Text = $this->objDefinicionFila->TablaTipo;
            
            return $this->txtTablaTipo;
        }

        /**
         * Create and setup QLabel lblTablaTipo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTablaTipo_Create($strControlId = null) {
            $this->lblTablaTipo = new QLabel($this->objParentObject, $strControlId);
            $this->lblTablaTipo->Name = QApplication::Translate('TablaTipo');
            $this->lblTablaTipo->Text = $this->objDefinicionFila->TablaTipo;
            return $this->lblTablaTipo;
        }

        /**
         * Create and setup QIntegerTextBox txtCodigoRelacional
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtCodigoRelacional_Create($strControlId = null) {
            $this->txtCodigoRelacional = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtCodigoRelacional->Name = QApplication::Translate('CodigoRelacional');
            $this->txtCodigoRelacional->Text = $this->objDefinicionFila->CodigoRelacional;
                        $this->txtCodigoRelacional->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtCodigoRelacional->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtCodigoRelacional;
        }

        /**
         * Create and setup QLabel lblCodigoRelacional
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblCodigoRelacional_Create($strControlId = null, $strFormat = null) {
            $this->lblCodigoRelacional = new QLabel($this->objParentObject, $strControlId);
            $this->lblCodigoRelacional->Name = QApplication::Translate('CodigoRelacional');
            $this->lblCodigoRelacional->Text = $this->objDefinicionFila->CodigoRelacional;
            $this->lblCodigoRelacional->Format = $strFormat;
            return $this->lblCodigoRelacional;
        }



    public $lstDefcuadroDeffilaAsId;
    /**
     * Gets all associated DefcuadroDeffilasAsId as an array of DefcuadroDeffila objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefcuadroDeffila[]
    */ 
    public function lstDefcuadroDeffilaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefcuadroDeffila';
        $strConfigArray['strRefreshMethod'] = 'DefcuadroDeffilaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionFila';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefinicionFila';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDeffilaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDeffilaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Orden'] = QApplication::Translate('Orden');

        $this->lstDefcuadroDeffilaAsId = new QListPanel($this->objParentObject, $this->objDefinicionFila, $strConfigArray, $strControlId);
        $this->lstDefcuadroDeffilaAsId->Name = DefcuadroDeffila::Noun();
        $this->lstDefcuadroDeffilaAsId->SetNewMethod($this, "lstDefcuadroDeffilaAsId_New");
        $this->lstDefcuadroDeffilaAsId->SetEditMethod($this, "lstDefcuadroDeffilaAsId_Edit");
        return $this->lstDefcuadroDeffilaAsId;
    }

    public function lstDefcuadroDeffilaAsId_New() {
        DefcuadroDeffilaModalPanel::$strControlsArray['lstIdDefinicionFilaObject'] = false;
        $strControlsArray = array_keys(DefcuadroDeffilaModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDeffilaAsId->ModalPanel = new DefcuadroDeffilaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDeffilaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDeffilaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDeffilaAsId_Edit($intKey) {
        DefcuadroDeffilaModalPanel::$strControlsArray['lstIdDefinicionFilaObject'] = false;
        $strControlsArray = array_keys(DefcuadroDeffilaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionFila->DefcuadroDeffilaAsIdArray[$intKey];
        $this->lstDefcuadroDeffilaAsId->ModalPanel = new DefcuadroDeffilaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDeffilaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDeffilaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local DefinicionFila object.
         * @param boolean $blnReload reload DefinicionFila from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objDefinicionFila->Reload();

            if ($this->txtIdDefinicionFila) $this->txtIdDefinicionFila->Text = $this->objDefinicionFila->IdDefinicionFila;
            if ($this->lblIdDefinicionFila) $this->lblIdDefinicionFila->Text = $this->objDefinicionFila->IdDefinicionFila;

            if ($this->txtNombreCorto) $this->txtNombreCorto->Text = $this->objDefinicionFila->NombreCorto;
            if ($this->lblNombreCorto) $this->lblNombreCorto->Text = $this->objDefinicionFila->NombreCorto;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objDefinicionFila->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objDefinicionFila->Nombre;

            if ($this->txtTablaTipo) $this->txtTablaTipo->Text = $this->objDefinicionFila->TablaTipo;
            if ($this->lblTablaTipo) $this->lblTablaTipo->Text = $this->objDefinicionFila->TablaTipo;

            if ($this->txtCodigoRelacional) $this->txtCodigoRelacional->Text = $this->objDefinicionFila->CodigoRelacional;
            if ($this->lblCodigoRelacional) $this->lblCodigoRelacional->Text = $this->objDefinicionFila->CodigoRelacional;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC DEFINICIONFILA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtIdDefinicionFila) $this->objDefinicionFila->IdDefinicionFila = $this->txtIdDefinicionFila->Text;
                if ($this->txtNombreCorto) $this->objDefinicionFila->NombreCorto = $this->txtNombreCorto->Text;
                if ($this->txtNombre) $this->objDefinicionFila->Nombre = $this->txtNombre->Text;
                if ($this->txtTablaTipo) $this->objDefinicionFila->TablaTipo = $this->txtTablaTipo->Text;
                if ($this->txtCodigoRelacional) $this->objDefinicionFila->CodigoRelacional = $this->txtCodigoRelacional->Text;


        }

        public function SaveDefinicionFila() {
            return $this->Save();
        }
        /**
         * This will save this object's DefinicionFila instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the DefinicionFila object
                $idReturn = $this->objDefinicionFila->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's DefinicionFila instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteDefinicionFila() {
            $this->objDefinicionFila->Delete();
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
                case 'DefinicionFila': return $this->objDefinicionFila;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to DefinicionFila fields -- will be created dynamically if not yet created
                case 'IdDefinicionFilaControl':
                    if (!$this->txtIdDefinicionFila) return $this->txtIdDefinicionFila_Create();
                    return $this->txtIdDefinicionFila;
                case 'IdDefinicionFilaLabel':
                    if (!$this->lblIdDefinicionFila) return $this->lblIdDefinicionFila_Create();
                    return $this->lblIdDefinicionFila;
                case 'NombreCortoControl':
                    if (!$this->txtNombreCorto) return $this->txtNombreCorto_Create();
                    return $this->txtNombreCorto;
                case 'NombreCortoLabel':
                    if (!$this->lblNombreCorto) return $this->lblNombreCorto_Create();
                    return $this->lblNombreCorto;
                case 'NombreControl':
                    if (!$this->txtNombre) return $this->txtNombre_Create();
                    return $this->txtNombre;
                case 'NombreLabel':
                    if (!$this->lblNombre) return $this->lblNombre_Create();
                    return $this->lblNombre;
                case 'TablaTipoControl':
                    if (!$this->txtTablaTipo) return $this->txtTablaTipo_Create();
                    return $this->txtTablaTipo;
                case 'TablaTipoLabel':
                    if (!$this->lblTablaTipo) return $this->lblTablaTipo_Create();
                    return $this->lblTablaTipo;
                case 'CodigoRelacionalControl':
                    if (!$this->txtCodigoRelacional) return $this->txtCodigoRelacional_Create();
                    return $this->txtCodigoRelacional;
                case 'CodigoRelacionalLabel':
                    if (!$this->lblCodigoRelacional) return $this->lblCodigoRelacional_Create();
                    return $this->lblCodigoRelacional;
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
                    // Controls that point to DefinicionFila fields
                    case 'IdDefinicionFilaControl':
                        return ($this->txtIdDefinicionFila = QType::Cast($mixValue, 'QControl'));
                    case 'NombreCortoControl':
                        return ($this->txtNombreCorto = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
                    case 'TablaTipoControl':
                        return ($this->txtTablaTipo = QType::Cast($mixValue, 'QControl'));
                    case 'CodigoRelacionalControl':
                        return ($this->txtCodigoRelacional = QType::Cast($mixValue, 'QControl'));
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
