<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the TipoDatoValor class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single TipoDatoValor object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a TipoDatoValorMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read TipoDatoValor $TipoDatoValor the actual TipoDatoValor data class being edited
     * property QLabel $IdTipoDatoValorControl
     * property-read QLabel $IdTipoDatoValorLabel
     * property QTextBox $DescripcionControl
     * property-read QLabel $DescripcionLabel
     * property QTextBox $CodigoControl
     * property-read QLabel $CodigoLabel
     * property QIntegerTextBox $CTipoDatoControl
     * property-read QLabel $CTipoDatoLabel
     * property QIntegerTextBox $OrdenControl
     * property-read QLabel $OrdenLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class TipoDatoValorMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var TipoDatoValor
                */
        public $objTipoDatoValor;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of TipoDatoValor's individual data fields
        protected $lblIdTipoDatoValor;
        protected $txtDescripcion;
        protected $txtCodigo;
        protected $txtCTipoDato;
        protected $txtOrden;

        // Controls that allow the viewing of TipoDatoValor's individual data fields
        protected $lblDescripcion;
        protected $lblCodigo;
        protected $lblCTipoDato;
        protected $lblOrden;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * TipoDatoValorMetaControl to edit a single TipoDatoValor object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single TipoDatoValor object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoDatoValorMetaControl
         * @param TipoDatoValor $objTipoDatoValor new or existing TipoDatoValor object
         */
         public function __construct($objParentObject, TipoDatoValor $objTipoDatoValor) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this TipoDatoValorMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked TipoDatoValor object
            $this->objTipoDatoValor = $objTipoDatoValor;

            // Figure out if we're Editing or Creating New
            if ($this->objTipoDatoValor->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoDatoValorMetaControl
         * @param integer $intIdTipoDatoValor primary key value
         * @param QMetaControlCreateType $intCreateType rules governing TipoDatoValor object creation - defaults to CreateOrEdit
          * @return TipoDatoValorMetaControl
         */
        public static function Create($objParentObject, $intIdTipoDatoValor = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdTipoDatoValor)) {
                $objTipoDatoValor = TipoDatoValor::Load($intIdTipoDatoValor);

                // TipoDatoValor was found -- return it!
                if ($objTipoDatoValor)
                    return new TipoDatoValorMetaControl($objParentObject, $objTipoDatoValor);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a TipoDatoValor object with PK arguments: ' . $intIdTipoDatoValor);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new TipoDatoValorMetaControl($objParentObject, new TipoDatoValor());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoDatoValorMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing TipoDatoValor object creation - defaults to CreateOrEdit
         * @return TipoDatoValorMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdTipoDatoValor = QApplication::PathInfo(0);
            return TipoDatoValorMetaControl::Create($objParentObject, $intIdTipoDatoValor, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoDatoValorMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing TipoDatoValor object creation - defaults to CreateOrEdit
         * @return TipoDatoValorMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdTipoDatoValor = QApplication::QueryString('id');
            return TipoDatoValorMetaControl::Create($objParentObject, $intIdTipoDatoValor, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblIdTipoDatoValor
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdTipoDatoValor_Create($strControlId = null) {
            $this->lblIdTipoDatoValor = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdTipoDatoValor->Name = QApplication::Translate('IdTipoDatoValor');
            if ($this->blnEditMode)
                $this->lblIdTipoDatoValor->Text = $this->objTipoDatoValor->IdTipoDatoValor;
            else
                $this->lblIdTipoDatoValor->Text = 'N/A';
            return $this->lblIdTipoDatoValor;
        }

        /**
         * Create and setup QTextBox txtDescripcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDescripcion_Create($strControlId = null) {
            $this->txtDescripcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDescripcion->Name = QApplication::Translate('Descripcion');
            $this->txtDescripcion->Text = $this->objTipoDatoValor->Descripcion;
            $this->txtDescripcion->Required = true;
            
            return $this->txtDescripcion;
        }

        /**
         * Create and setup QLabel lblDescripcion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDescripcion_Create($strControlId = null) {
            $this->lblDescripcion = new QLabel($this->objParentObject, $strControlId);
            $this->lblDescripcion->Name = QApplication::Translate('Descripcion');
            $this->lblDescripcion->Text = $this->objTipoDatoValor->Descripcion;
            $this->lblDescripcion->Required = true;
            return $this->lblDescripcion;
        }

        /**
         * Create and setup QTextBox txtCodigo
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCodigo_Create($strControlId = null) {
            $this->txtCodigo = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCodigo->Name = QApplication::Translate('Codigo');
            $this->txtCodigo->Text = $this->objTipoDatoValor->Codigo;
            $this->txtCodigo->MaxLength = TipoDatoValor::CodigoMaxLength;
            
            return $this->txtCodigo;
        }

        /**
         * Create and setup QLabel lblCodigo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCodigo_Create($strControlId = null) {
            $this->lblCodigo = new QLabel($this->objParentObject, $strControlId);
            $this->lblCodigo->Name = QApplication::Translate('Codigo');
            $this->lblCodigo->Text = $this->objTipoDatoValor->Codigo;
            return $this->lblCodigo;
        }

        /**
         * Create and setup QIntegerTextBox txtCTipoDato
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtCTipoDato_Create($strControlId = null) {
            $this->txtCTipoDato = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtCTipoDato->Name = QApplication::Translate('CTipoDato');
            $this->txtCTipoDato->Text = $this->objTipoDatoValor->CTipoDato;
                        $this->txtCTipoDato->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtCTipoDato->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtCTipoDato;
        }

        /**
         * Create and setup QLabel lblCTipoDato
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblCTipoDato_Create($strControlId = null, $strFormat = null) {
            $this->lblCTipoDato = new QLabel($this->objParentObject, $strControlId);
            $this->lblCTipoDato->Name = QApplication::Translate('CTipoDato');
            $this->lblCTipoDato->Text = $this->objTipoDatoValor->CTipoDato;
            $this->lblCTipoDato->Format = $strFormat;
            return $this->lblCTipoDato;
        }

        /**
         * Create and setup QIntegerTextBox txtOrden
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtOrden_Create($strControlId = null) {
            $this->txtOrden = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtOrden->Name = QApplication::Translate('Orden');
            $this->txtOrden->Text = $this->objTipoDatoValor->Orden;
                        $this->txtOrden->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this->txtOrden->Minimum = QDatabaseNumberFieldMin::Smallint;
            return $this->txtOrden;
        }

        /**
         * Create and setup QLabel lblOrden
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblOrden_Create($strControlId = null, $strFormat = null) {
            $this->lblOrden = new QLabel($this->objParentObject, $strControlId);
            $this->lblOrden->Name = QApplication::Translate('Orden');
            $this->lblOrden->Text = $this->objTipoDatoValor->Orden;
            $this->lblOrden->Format = $strFormat;
            return $this->lblOrden;
        }





        /**
         * Refresh this MetaControl with Data from the local TipoDatoValor object.
         * @param boolean $blnReload reload TipoDatoValor from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objTipoDatoValor->Reload();

            if ($this->lblIdTipoDatoValor) if ($this->blnEditMode) $this->lblIdTipoDatoValor->Text = $this->objTipoDatoValor->IdTipoDatoValor;

            if ($this->txtDescripcion) $this->txtDescripcion->Text = $this->objTipoDatoValor->Descripcion;
            if ($this->lblDescripcion) $this->lblDescripcion->Text = $this->objTipoDatoValor->Descripcion;

            if ($this->txtCodigo) $this->txtCodigo->Text = $this->objTipoDatoValor->Codigo;
            if ($this->lblCodigo) $this->lblCodigo->Text = $this->objTipoDatoValor->Codigo;

            if ($this->txtCTipoDato) $this->txtCTipoDato->Text = $this->objTipoDatoValor->CTipoDato;
            if ($this->lblCTipoDato) $this->lblCTipoDato->Text = $this->objTipoDatoValor->CTipoDato;

            if ($this->txtOrden) $this->txtOrden->Text = $this->objTipoDatoValor->Orden;
            if ($this->lblOrden) $this->lblOrden->Text = $this->objTipoDatoValor->Orden;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC TIPODATOVALOR OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtDescripcion) $this->objTipoDatoValor->Descripcion = $this->txtDescripcion->Text;
                if ($this->txtCodigo) $this->objTipoDatoValor->Codigo = $this->txtCodigo->Text;
                if ($this->txtCTipoDato) $this->objTipoDatoValor->CTipoDato = $this->txtCTipoDato->Text;
                if ($this->txtOrden) $this->objTipoDatoValor->Orden = $this->txtOrden->Text;


        }

        public function SaveTipoDatoValor() {
            return $this->Save();
        }
        /**
         * This will save this object's TipoDatoValor instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the TipoDatoValor object
                $idReturn = $this->objTipoDatoValor->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's TipoDatoValor instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteTipoDatoValor() {
            $this->objTipoDatoValor->Delete();
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
                case 'TipoDatoValor': return $this->objTipoDatoValor;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to TipoDatoValor fields -- will be created dynamically if not yet created
                case 'IdTipoDatoValorControl':
                    if (!$this->lblIdTipoDatoValor) return $this->lblIdTipoDatoValor_Create();
                    return $this->lblIdTipoDatoValor;
                case 'IdTipoDatoValorLabel':
                    if (!$this->lblIdTipoDatoValor) return $this->lblIdTipoDatoValor_Create();
                    return $this->lblIdTipoDatoValor;
                case 'DescripcionControl':
                    if (!$this->txtDescripcion) return $this->txtDescripcion_Create();
                    return $this->txtDescripcion;
                case 'DescripcionLabel':
                    if (!$this->lblDescripcion) return $this->lblDescripcion_Create();
                    return $this->lblDescripcion;
                case 'CodigoControl':
                    if (!$this->txtCodigo) return $this->txtCodigo_Create();
                    return $this->txtCodigo;
                case 'CodigoLabel':
                    if (!$this->lblCodigo) return $this->lblCodigo_Create();
                    return $this->lblCodigo;
                case 'CTipoDatoControl':
                    if (!$this->txtCTipoDato) return $this->txtCTipoDato_Create();
                    return $this->txtCTipoDato;
                case 'CTipoDatoLabel':
                    if (!$this->lblCTipoDato) return $this->lblCTipoDato_Create();
                    return $this->lblCTipoDato;
                case 'OrdenControl':
                    if (!$this->txtOrden) return $this->txtOrden_Create();
                    return $this->txtOrden;
                case 'OrdenLabel':
                    if (!$this->lblOrden) return $this->lblOrden_Create();
                    return $this->lblOrden;
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
                    // Controls that point to TipoDatoValor fields
                    case 'IdTipoDatoValorControl':
                        return ($this->lblIdTipoDatoValor = QType::Cast($mixValue, 'QControl'));
                    case 'DescripcionControl':
                        return ($this->txtDescripcion = QType::Cast($mixValue, 'QControl'));
                    case 'CodigoControl':
                        return ($this->txtCodigo = QType::Cast($mixValue, 'QControl'));
                    case 'CTipoDatoControl':
                        return ($this->txtCTipoDato = QType::Cast($mixValue, 'QControl'));
                    case 'OrdenControl':
                        return ($this->txtOrden = QType::Cast($mixValue, 'QControl'));
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
