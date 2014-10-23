<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the DefcuadroDefcolumna class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single DefcuadroDefcolumna object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a DefcuadroDefcolumnaMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read DefcuadroDefcolumna $DefcuadroDefcolumna the actual DefcuadroDefcolumna data class being edited
     * property QListBox $IdDefinicionCuadroControl
     * property-read QLabel $IdDefinicionCuadroLabel
     * property QListBox $IdDefinicionColumnaControl
     * property-read QLabel $IdDefinicionColumnaLabel
     * property QIntegerTextBox $OrdenControl
     * property-read QLabel $OrdenLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class DefcuadroDefcolumnaMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var DefcuadroDefcolumna
                */
        public $objDefcuadroDefcolumna;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of DefcuadroDefcolumna's individual data fields
        protected $lstIdDefinicionCuadroObject;
        protected $lstIdDefinicionColumnaObject;
        protected $txtOrden;

        // Controls that allow the viewing of DefcuadroDefcolumna's individual data fields
        protected $lblIdDefinicionCuadro;
        protected $lblIdDefinicionColumna;
        protected $lblOrden;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * DefcuadroDefcolumnaMetaControl to edit a single DefcuadroDefcolumna object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single DefcuadroDefcolumna object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefcuadroDefcolumnaMetaControl
         * @param DefcuadroDefcolumna $objDefcuadroDefcolumna new or existing DefcuadroDefcolumna object
         */
         public function __construct($objParentObject, DefcuadroDefcolumna $objDefcuadroDefcolumna) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this DefcuadroDefcolumnaMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked DefcuadroDefcolumna object
            $this->objDefcuadroDefcolumna = $objDefcuadroDefcolumna;

            // Figure out if we're Editing or Creating New
            if ($this->objDefcuadroDefcolumna->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this DefcuadroDefcolumnaMetaControl
         * @param integer $intIdDefinicionCuadro primary key value
         * @param integer $intIdDefinicionColumna primary key value
         * @param QMetaControlCreateType $intCreateType rules governing DefcuadroDefcolumna object creation - defaults to CreateOrEdit
          * @return DefcuadroDefcolumnaMetaControl
         */
        public static function Create($objParentObject, $intIdDefinicionCuadro = null, $intIdDefinicionColumna = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdDefinicionCuadro) && strlen($intIdDefinicionColumna)) {
                $objDefcuadroDefcolumna = DefcuadroDefcolumna::Load($intIdDefinicionCuadro, $intIdDefinicionColumna);

                // DefcuadroDefcolumna was found -- return it!
                if ($objDefcuadroDefcolumna)
                    return new DefcuadroDefcolumnaMetaControl($objParentObject, $objDefcuadroDefcolumna);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a DefcuadroDefcolumna object with PK arguments: ' . $intIdDefinicionCuadro . ', ' . $intIdDefinicionColumna);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new DefcuadroDefcolumnaMetaControl($objParentObject, new DefcuadroDefcolumna());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefcuadroDefcolumnaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefcuadroDefcolumna object creation - defaults to CreateOrEdit
         * @return DefcuadroDefcolumnaMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionCuadro = QApplication::PathInfo(0);
            $intIdDefinicionColumna = QApplication::PathInfo(1);
            return DefcuadroDefcolumnaMetaControl::Create($objParentObject, $intIdDefinicionCuadro, $intIdDefinicionColumna, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefcuadroDefcolumnaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefcuadroDefcolumna object creation - defaults to CreateOrEdit
         * @return DefcuadroDefcolumnaMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionCuadro = QApplication::QueryString('id');
            $intIdDefinicionColumna = QApplication::QueryString('id');
            return DefcuadroDefcolumnaMetaControl::Create($objParentObject, $intIdDefinicionCuadro, $intIdDefinicionColumna, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdDefinicionCuadroObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdDefinicionCuadroObject_Create($strControlId = null) {
            $this->lstIdDefinicionCuadroObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'DefinicionCuadro', 'IdDefinicionCuadro' , $strControlId);
            if($this->objDefcuadroDefcolumna->IdDefinicionCuadroObject){
                $this->lstIdDefinicionCuadroObject->Text = $this->objDefcuadroDefcolumna->IdDefinicionCuadroObject->__toString();
                $this->lstIdDefinicionCuadroObject->Value = $this->objDefcuadroDefcolumna->IdDefinicionCuadroObject->IdDefinicionCuadro;
            }
            $this->lstIdDefinicionCuadroObject->Name = QApplication::Translate('IdDefinicionCuadroObject');
            $this->lstIdDefinicionCuadroObject->Required = true;
            return $this->lstIdDefinicionCuadroObject;
        }

        /**
         * Create and setup QLabel lblIdDefinicionCuadro
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDefinicionCuadro_Create($strControlId = null) {
            $this->lblIdDefinicionCuadro = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionCuadro->Name = QApplication::Translate('IdDefinicionCuadroObject');
            $this->lblIdDefinicionCuadro->Text = ($this->objDefcuadroDefcolumna->IdDefinicionCuadroObject) ? $this->objDefcuadroDefcolumna->IdDefinicionCuadroObject->__toString() : null;
            $this->lblIdDefinicionCuadro->Required = true;
            return $this->lblIdDefinicionCuadro;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdDefinicionColumnaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdDefinicionColumnaObject_Create($strControlId = null) {
            $this->lstIdDefinicionColumnaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'DefinicionColumna', 'IdDefinicionColumna' , $strControlId);
            if($this->objDefcuadroDefcolumna->IdDefinicionColumnaObject){
                $this->lstIdDefinicionColumnaObject->Text = $this->objDefcuadroDefcolumna->IdDefinicionColumnaObject->__toString();
                $this->lstIdDefinicionColumnaObject->Value = $this->objDefcuadroDefcolumna->IdDefinicionColumnaObject->IdDefinicionColumna;
            }
            $this->lstIdDefinicionColumnaObject->Name = QApplication::Translate('IdDefinicionColumnaObject');
            $this->lstIdDefinicionColumnaObject->Required = true;
            return $this->lstIdDefinicionColumnaObject;
        }

        /**
         * Create and setup QLabel lblIdDefinicionColumna
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDefinicionColumna_Create($strControlId = null) {
            $this->lblIdDefinicionColumna = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionColumna->Name = QApplication::Translate('IdDefinicionColumnaObject');
            $this->lblIdDefinicionColumna->Text = ($this->objDefcuadroDefcolumna->IdDefinicionColumnaObject) ? $this->objDefcuadroDefcolumna->IdDefinicionColumnaObject->__toString() : null;
            $this->lblIdDefinicionColumna->Required = true;
            return $this->lblIdDefinicionColumna;
        }

        /**
         * Create and setup QIntegerTextBox txtOrden
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtOrden_Create($strControlId = null) {
            $this->txtOrden = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtOrden->Name = QApplication::Translate('Orden');
            $this->txtOrden->Text = $this->objDefcuadroDefcolumna->Orden;
                        $this->txtOrden->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtOrden->Minimum = QDatabaseNumberFieldMin::Integer;
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
            $this->lblOrden->Text = $this->objDefcuadroDefcolumna->Orden;
            $this->lblOrden->Format = $strFormat;
            return $this->lblOrden;
        }





        /**
         * Refresh this MetaControl with Data from the local DefcuadroDefcolumna object.
         * @param boolean $blnReload reload DefcuadroDefcolumna from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objDefcuadroDefcolumna->Reload();

            if ($this->lstIdDefinicionCuadroObject) {
                if($this->objDefcuadroDefcolumna->IdDefinicionCuadroObject){
                    $this->lstIdDefinicionCuadroObject->Text = $this->objDefcuadroDefcolumna->IdDefinicionCuadroObject->__toString();
                    $this->lstIdDefinicionCuadroObject->Value = $this->objDefcuadroDefcolumna->IdDefinicionCuadro->IdDefinicionCuadro;
                }                
            }
            if ($this->lblIdDefinicionCuadro) $this->lblIdDefinicionCuadro->Text = ($this->objDefcuadroDefcolumna->IdDefinicionCuadroObject) ? $this->objDefcuadroDefcolumna->IdDefinicionCuadroObject->__toString() : null;

            if ($this->lstIdDefinicionColumnaObject) {
                if($this->objDefcuadroDefcolumna->IdDefinicionColumnaObject){
                    $this->lstIdDefinicionColumnaObject->Text = $this->objDefcuadroDefcolumna->IdDefinicionColumnaObject->__toString();
                    $this->lstIdDefinicionColumnaObject->Value = $this->objDefcuadroDefcolumna->IdDefinicionColumna->IdDefinicionColumna;
                }                
            }
            if ($this->lblIdDefinicionColumna) $this->lblIdDefinicionColumna->Text = ($this->objDefcuadroDefcolumna->IdDefinicionColumnaObject) ? $this->objDefcuadroDefcolumna->IdDefinicionColumnaObject->__toString() : null;

            if ($this->txtOrden) $this->txtOrden->Text = $this->objDefcuadroDefcolumna->Orden;
            if ($this->lblOrden) $this->lblOrden->Text = $this->objDefcuadroDefcolumna->Orden;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC DEFCUADRODEFCOLUMNA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdDefinicionCuadroObject) $this->objDefcuadroDefcolumna->IdDefinicionCuadro = $this->lstIdDefinicionCuadroObject->SelectedValue;
                if ($this->lstIdDefinicionColumnaObject) $this->objDefcuadroDefcolumna->IdDefinicionColumna = $this->lstIdDefinicionColumnaObject->SelectedValue;
                if ($this->txtOrden) $this->objDefcuadroDefcolumna->Orden = $this->txtOrden->Text;


        }

        public function SaveDefcuadroDefcolumna() {
            return $this->Save();
        }
        /**
         * This will save this object's DefcuadroDefcolumna instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the DefcuadroDefcolumna object
                $idReturn = $this->objDefcuadroDefcolumna->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's DefcuadroDefcolumna instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteDefcuadroDefcolumna() {
            $this->objDefcuadroDefcolumna->Delete();
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
                case 'DefcuadroDefcolumna': return $this->objDefcuadroDefcolumna;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to DefcuadroDefcolumna fields -- will be created dynamically if not yet created
                case 'IdDefinicionCuadroControl':
                    if (!$this->lstIdDefinicionCuadroObject) return $this->lstIdDefinicionCuadroObject_Create();
                    return $this->lstIdDefinicionCuadroObject;
                case 'IdDefinicionCuadroLabel':
                    if (!$this->lblIdDefinicionCuadro) return $this->lblIdDefinicionCuadro_Create();
                    return $this->lblIdDefinicionCuadro;
                case 'IdDefinicionColumnaControl':
                    if (!$this->lstIdDefinicionColumnaObject) return $this->lstIdDefinicionColumnaObject_Create();
                    return $this->lstIdDefinicionColumnaObject;
                case 'IdDefinicionColumnaLabel':
                    if (!$this->lblIdDefinicionColumna) return $this->lblIdDefinicionColumna_Create();
                    return $this->lblIdDefinicionColumna;
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
                    // Controls that point to DefcuadroDefcolumna fields
                    case 'IdDefinicionCuadroControl':
                        return ($this->lstIdDefinicionCuadroObject = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionColumnaControl':
                        return ($this->lstIdDefinicionColumnaObject = QType::Cast($mixValue, 'QControl'));
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
