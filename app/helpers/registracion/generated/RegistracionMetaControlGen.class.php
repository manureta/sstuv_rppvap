<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Registracion class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Registracion object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a RegistracionMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Registracion $Registracion the actual Registracion data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QTextBox $LegajoControl
     * property-read QLabel $LegajoLabel
     * property QTextBox $FolioControl
     * property-read QLabel $FolioLabel
     * property QDateTimePicker $FechaControl
     * property-read QLabel $FechaLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class RegistracionMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Registracion
                */
        public $objRegistracion;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Registracion's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $txtLegajo;
        protected $txtFolio;
        protected $calFecha;

        // Controls that allow the viewing of Registracion's individual data fields
        protected $lblIdFolio;
        protected $lblLegajo;
        protected $lblFolio;
        protected $lblFecha;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * RegistracionMetaControl to edit a single Registracion object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Registracion object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this RegistracionMetaControl
         * @param Registracion $objRegistracion new or existing Registracion object
         */
         public function __construct($objParentObject, Registracion $objRegistracion) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this RegistracionMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Registracion object
            $this->objRegistracion = $objRegistracion;

            // Figure out if we're Editing or Creating New
            if ($this->objRegistracion->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this RegistracionMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Registracion object creation - defaults to CreateOrEdit
          * @return RegistracionMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objRegistracion = Registracion::Load($intId);

                // Registracion was found -- return it!
                if ($objRegistracion)
                    return new RegistracionMetaControl($objParentObject, $objRegistracion);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Registracion object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new RegistracionMetaControl($objParentObject, new Registracion());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this RegistracionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Registracion object creation - defaults to CreateOrEdit
         * @return RegistracionMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return RegistracionMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this RegistracionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Registracion object creation - defaults to CreateOrEdit
         * @return RegistracionMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return RegistracionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objRegistracion->Id;
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
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Regularizacion', 'Id' , $strControlId);
            if($this->objRegistracion->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objRegistracion->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objRegistracion->IdFolioObject->Id;
            }
            $this->lstIdFolioObject->Name = QApplication::Translate('IdFolioObject');
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
            $this->lblIdFolio->Text = ($this->objRegistracion->IdFolioObject) ? $this->objRegistracion->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QTextBox txtLegajo
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtLegajo_Create($strControlId = null) {
            $this->txtLegajo = new QTextBox($this->objParentObject, $strControlId);
            $this->txtLegajo->Name = QApplication::Translate('Legajo');
            $this->txtLegajo->Text = $this->objRegistracion->Legajo;
            $this->txtLegajo->MaxLength = Registracion::LegajoMaxLength;
            
            return $this->txtLegajo;
        }

        /**
         * Create and setup QLabel lblLegajo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblLegajo_Create($strControlId = null) {
            $this->lblLegajo = new QLabel($this->objParentObject, $strControlId);
            $this->lblLegajo->Name = QApplication::Translate('Legajo');
            $this->lblLegajo->Text = $this->objRegistracion->Legajo;
            return $this->lblLegajo;
        }

        /**
         * Create and setup QTextBox txtFolio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFolio_Create($strControlId = null) {
            $this->txtFolio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFolio->Name = QApplication::Translate('Folio');
            $this->txtFolio->Text = $this->objRegistracion->Folio;
            $this->txtFolio->MaxLength = Registracion::FolioMaxLength;
            
            return $this->txtFolio;
        }

        /**
         * Create and setup QLabel lblFolio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFolio_Create($strControlId = null) {
            $this->lblFolio = new QLabel($this->objParentObject, $strControlId);
            $this->lblFolio->Name = QApplication::Translate('Folio');
            $this->lblFolio->Text = $this->objRegistracion->Folio;
            return $this->lblFolio;
        }

        /**
         * Create and setup QDateTimePicker calFecha
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFecha_Create($strControlId = null) {
            $this->calFecha = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFecha->Name = QApplication::Translate('Fecha');
            $this->calFecha->DateTime = $this->objRegistracion->Fecha;
            $this->calFecha->DateTimePickerType = QDateTimePickerType::Date;
            
            return $this->calFecha;
        }

        /**
         * Create and setup QLabel lblFecha
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFecha_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFecha = new QLabel($this->objParentObject, $strControlId);
            $this->lblFecha->Name = QApplication::Translate('Fecha');
            $this->strFechaDateTimeFormat = $strDateTimeFormat;
            $this->lblFecha->Text = sprintf($this->objRegistracion->Fecha) ? $this->objRegistracion->Fecha->__toString($this->strFechaDateTimeFormat) : null;
            return $this->lblFecha;
        }

        protected $strFechaDateTimeFormat;






        /**
         * Refresh this MetaControl with Data from the local Registracion object.
         * @param boolean $blnReload reload Registracion from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objRegistracion->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objRegistracion->Id;

            if ($this->lstIdFolioObject) {
                if($this->objRegistracion->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objRegistracion->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objRegistracion->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objRegistracion->IdFolioObject) ? $this->objRegistracion->IdFolioObject->__toString() : null;

            if ($this->txtLegajo) $this->txtLegajo->Text = $this->objRegistracion->Legajo;
            if ($this->lblLegajo) $this->lblLegajo->Text = $this->objRegistracion->Legajo;

            if ($this->txtFolio) $this->txtFolio->Text = $this->objRegistracion->Folio;
            if ($this->lblFolio) $this->lblFolio->Text = $this->objRegistracion->Folio;

            if ($this->calFecha) $this->calFecha->DateTime = $this->objRegistracion->Fecha;
            if ($this->lblFecha) $this->lblFecha->Text = sprintf($this->objRegistracion->Fecha) ? $this->objRegistracion->Fecha->__toString($this->strFechaDateTimeFormat) : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC REGISTRACION OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objRegistracion->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->txtLegajo) $this->objRegistracion->Legajo = $this->txtLegajo->Text;
                if ($this->txtFolio) $this->objRegistracion->Folio = $this->txtFolio->Text;
                if ($this->calFecha) $this->objRegistracion->Fecha = $this->calFecha->DateTime;


        }

        public function SaveRegistracion() {
            return $this->Save();
        }
        /**
         * This will save this object's Registracion instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Registracion object
                $idReturn = $this->objRegistracion->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Registracion instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteRegistracion() {
            $this->objRegistracion->Delete();
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
                case 'Registracion': return $this->objRegistracion;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Registracion fields -- will be created dynamically if not yet created
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
                case 'LegajoControl':
                    if (!$this->txtLegajo) return $this->txtLegajo_Create();
                    return $this->txtLegajo;
                case 'LegajoLabel':
                    if (!$this->lblLegajo) return $this->lblLegajo_Create();
                    return $this->lblLegajo;
                case 'FolioControl':
                    if (!$this->txtFolio) return $this->txtFolio_Create();
                    return $this->txtFolio;
                case 'FolioLabel':
                    if (!$this->lblFolio) return $this->lblFolio_Create();
                    return $this->lblFolio;
                case 'FechaControl':
                    if (!$this->calFecha) return $this->calFecha_Create();
                    return $this->calFecha;
                case 'FechaLabel':
                    if (!$this->lblFecha) return $this->lblFecha_Create();
                    return $this->lblFecha;
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
                    // Controls that point to Registracion fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'LegajoControl':
                        return ($this->txtLegajo = QType::Cast($mixValue, 'QControl'));
                    case 'FolioControl':
                        return ($this->txtFolio = QType::Cast($mixValue, 'QControl'));
                    case 'FechaControl':
                        return ($this->calFecha = QType::Cast($mixValue, 'QControl'));
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
