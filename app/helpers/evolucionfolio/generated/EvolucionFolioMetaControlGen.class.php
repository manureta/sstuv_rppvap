<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the EvolucionFolio class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single EvolucionFolio object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a EvolucionFolioMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read EvolucionFolio $EvolucionFolio the actual EvolucionFolio data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QTextBox $ContenidoControl
     * property-read QLabel $ContenidoLabel
     * property QDateTimePicker $FechaControl
     * property-read QLabel $FechaLabel
     * property QTextBox $EstadoControl
     * property-read QLabel $EstadoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class EvolucionFolioMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var EvolucionFolio
                */
        public $objEvolucionFolio;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of EvolucionFolio's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $txtContenido;
        protected $calFecha;
        protected $txtEstado;

        // Controls that allow the viewing of EvolucionFolio's individual data fields
        protected $lblIdFolio;
        protected $lblContenido;
        protected $lblFecha;
        protected $lblEstado;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * EvolucionFolioMetaControl to edit a single EvolucionFolio object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single EvolucionFolio object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EvolucionFolioMetaControl
         * @param EvolucionFolio $objEvolucionFolio new or existing EvolucionFolio object
         */
         public function __construct($objParentObject, EvolucionFolio $objEvolucionFolio) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this EvolucionFolioMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked EvolucionFolio object
            $this->objEvolucionFolio = $objEvolucionFolio;

            // Figure out if we're Editing or Creating New
            if ($this->objEvolucionFolio->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this EvolucionFolioMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing EvolucionFolio object creation - defaults to CreateOrEdit
          * @return EvolucionFolioMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objEvolucionFolio = EvolucionFolio::Load($intId);

                // EvolucionFolio was found -- return it!
                if ($objEvolucionFolio)
                    return new EvolucionFolioMetaControl($objParentObject, $objEvolucionFolio);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a EvolucionFolio object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new EvolucionFolioMetaControl($objParentObject, new EvolucionFolio());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EvolucionFolioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing EvolucionFolio object creation - defaults to CreateOrEdit
         * @return EvolucionFolioMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return EvolucionFolioMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EvolucionFolioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing EvolucionFolio object creation - defaults to CreateOrEdit
         * @return EvolucionFolioMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return EvolucionFolioMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objEvolucionFolio->Id;
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
            if($this->objEvolucionFolio->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objEvolucionFolio->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objEvolucionFolio->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objEvolucionFolio->IdFolioObject) ? $this->objEvolucionFolio->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QTextBox txtContenido
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtContenido_Create($strControlId = null) {
            $this->txtContenido = new QTextBox($this->objParentObject, $strControlId);
            $this->txtContenido->Name = QApplication::Translate('Contenido');
            $this->txtContenido->Text = $this->objEvolucionFolio->Contenido;
            
            return $this->txtContenido;
        }

        /**
         * Create and setup QLabel lblContenido
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblContenido_Create($strControlId = null) {
            $this->lblContenido = new QLabel($this->objParentObject, $strControlId);
            $this->lblContenido->Name = QApplication::Translate('Contenido');
            $this->lblContenido->Text = $this->objEvolucionFolio->Contenido;
            return $this->lblContenido;
        }

        /**
         * Create and setup QDateTimePicker calFecha
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFecha_Create($strControlId = null) {
            $this->calFecha = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFecha->Name = QApplication::Translate('Fecha');
            $this->calFecha->DateTime = $this->objEvolucionFolio->Fecha;
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
            $this->lblFecha->Text = sprintf($this->objEvolucionFolio->Fecha) ? $this->objEvolucionFolio->Fecha->__toString($this->strFechaDateTimeFormat) : null;
            return $this->lblFecha;
        }

        protected $strFechaDateTimeFormat;


        /**
         * Create and setup QTextBox txtEstado
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtEstado_Create($strControlId = null) {
            $this->txtEstado = new QTextBox($this->objParentObject, $strControlId);
            $this->txtEstado->Name = QApplication::Translate('Estado');
            $this->txtEstado->Text = $this->objEvolucionFolio->Estado;
            
            return $this->txtEstado;
        }

        /**
         * Create and setup QLabel lblEstado
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEstado_Create($strControlId = null) {
            $this->lblEstado = new QLabel($this->objParentObject, $strControlId);
            $this->lblEstado->Name = QApplication::Translate('Estado');
            $this->lblEstado->Text = $this->objEvolucionFolio->Estado;
            return $this->lblEstado;
        }





        /**
         * Refresh this MetaControl with Data from the local EvolucionFolio object.
         * @param boolean $blnReload reload EvolucionFolio from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objEvolucionFolio->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEvolucionFolio->Id;

            if ($this->lstIdFolioObject) {
                if($this->objEvolucionFolio->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objEvolucionFolio->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objEvolucionFolio->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objEvolucionFolio->IdFolioObject) ? $this->objEvolucionFolio->IdFolioObject->__toString() : null;

            if ($this->txtContenido) $this->txtContenido->Text = $this->objEvolucionFolio->Contenido;
            if ($this->lblContenido) $this->lblContenido->Text = $this->objEvolucionFolio->Contenido;

            if ($this->calFecha) $this->calFecha->DateTime = $this->objEvolucionFolio->Fecha;
            if ($this->lblFecha) $this->lblFecha->Text = sprintf($this->objEvolucionFolio->Fecha) ? $this->objEvolucionFolio->Fecha->__toString($this->strFechaDateTimeFormat) : null;

            if ($this->txtEstado) $this->txtEstado->Text = $this->objEvolucionFolio->Estado;
            if ($this->lblEstado) $this->lblEstado->Text = $this->objEvolucionFolio->Estado;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC EVOLUCIONFOLIO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objEvolucionFolio->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->txtContenido) $this->objEvolucionFolio->Contenido = $this->txtContenido->Text;
                if ($this->calFecha) $this->objEvolucionFolio->Fecha = $this->calFecha->DateTime;
                if ($this->txtEstado) $this->objEvolucionFolio->Estado = $this->txtEstado->Text;


        }

        public function SaveEvolucionFolio() {
            return $this->Save();
        }
        /**
         * This will save this object's EvolucionFolio instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the EvolucionFolio object
                $idReturn = $this->objEvolucionFolio->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's EvolucionFolio instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteEvolucionFolio() {
            $this->objEvolucionFolio->Delete();
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
                case 'EvolucionFolio': return $this->objEvolucionFolio;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to EvolucionFolio fields -- will be created dynamically if not yet created
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
                case 'ContenidoControl':
                    if (!$this->txtContenido) return $this->txtContenido_Create();
                    return $this->txtContenido;
                case 'ContenidoLabel':
                    if (!$this->lblContenido) return $this->lblContenido_Create();
                    return $this->lblContenido;
                case 'FechaControl':
                    if (!$this->calFecha) return $this->calFecha_Create();
                    return $this->calFecha;
                case 'FechaLabel':
                    if (!$this->lblFecha) return $this->lblFecha_Create();
                    return $this->lblFecha;
                case 'EstadoControl':
                    if (!$this->txtEstado) return $this->txtEstado_Create();
                    return $this->txtEstado;
                case 'EstadoLabel':
                    if (!$this->lblEstado) return $this->lblEstado_Create();
                    return $this->lblEstado;
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
                    // Controls that point to EvolucionFolio fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'ContenidoControl':
                        return ($this->txtContenido = QType::Cast($mixValue, 'QControl'));
                    case 'FechaControl':
                        return ($this->calFecha = QType::Cast($mixValue, 'QControl'));
                    case 'EstadoControl':
                        return ($this->txtEstado = QType::Cast($mixValue, 'QControl'));
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
