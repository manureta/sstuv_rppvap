<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the ElementoHijo class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single ElementoHijo object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a ElementoHijoMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read ElementoHijo $ElementoHijo the actual ElementoHijo data class being edited
     * property QLabel $IdElementoHijoControl
     * property-read QLabel $IdElementoHijoLabel
     * property QListBox $IdElementoControl
     * property-read QLabel $IdElementoLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QListBox $IdPerfilControl
     * property-read QLabel $IdPerfilLabel
     * property QTextBox $UndatoControl
     * property-read QLabel $UndatoLabel
     * property QTextBox $OtrodatoControl
     * property-read QLabel $OtrodatoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class ElementoHijoMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var ElementoHijo
                */
        public $objElementoHijo;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of ElementoHijo's individual data fields
        protected $lblIdElementoHijo;
        protected $lstIdElementoObject;
        protected $txtNombre;
        protected $lstIdPerfilObject;
        protected $txtUndato;
        protected $txtOtrodato;

        // Controls that allow the viewing of ElementoHijo's individual data fields
        protected $lblIdElemento;
        protected $lblNombre;
        protected $lblIdPerfil;
        protected $lblUndato;
        protected $lblOtrodato;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * ElementoHijoMetaControl to edit a single ElementoHijo object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single ElementoHijo object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoHijoMetaControl
         * @param ElementoHijo $objElementoHijo new or existing ElementoHijo object
         */
         public function __construct($objParentObject, ElementoHijo $objElementoHijo) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this ElementoHijoMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked ElementoHijo object
            $this->objElementoHijo = $objElementoHijo;

            // Figure out if we're Editing or Creating New
            if ($this->objElementoHijo->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoHijoMetaControl
         * @param integer $intIdElementoHijo primary key value
         * @param QMetaControlCreateType $intCreateType rules governing ElementoHijo object creation - defaults to CreateOrEdit
          * @return ElementoHijoMetaControl
         */
        public static function Create($objParentObject, $intIdElementoHijo = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdElementoHijo)) {
                $objElementoHijo = ElementoHijo::Load($intIdElementoHijo);

                // ElementoHijo was found -- return it!
                if ($objElementoHijo)
                    return new ElementoHijoMetaControl($objParentObject, $objElementoHijo);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a ElementoHijo object with PK arguments: ' . $intIdElementoHijo);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new ElementoHijoMetaControl($objParentObject, new ElementoHijo());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoHijoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing ElementoHijo object creation - defaults to CreateOrEdit
         * @return ElementoHijoMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdElementoHijo = QApplication::PathInfo(0);
            return ElementoHijoMetaControl::Create($objParentObject, $intIdElementoHijo, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoHijoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing ElementoHijo object creation - defaults to CreateOrEdit
         * @return ElementoHijoMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdElementoHijo = QApplication::QueryString('id');
            return ElementoHijoMetaControl::Create($objParentObject, $intIdElementoHijo, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblIdElementoHijo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdElementoHijo_Create($strControlId = null) {
            $this->lblIdElementoHijo = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdElementoHijo->Name = QApplication::Translate('IdElementoHijo');
            if ($this->blnEditMode)
                $this->lblIdElementoHijo->Text = $this->objElementoHijo->IdElementoHijo;
            else
                $this->lblIdElementoHijo->Text = 'N/A';
            return $this->lblIdElementoHijo;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdElementoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdElementoObject_Create($strControlId = null) {
            $this->lstIdElementoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Elemento', 'IdElemento' , $strControlId);
            if($this->objElementoHijo->IdElementoObject){
                $this->lstIdElementoObject->Text = $this->objElementoHijo->IdElementoObject->__toString();
                $this->lstIdElementoObject->Value = $this->objElementoHijo->IdElementoObject->IdElemento;
            }
            $this->lstIdElementoObject->Name = QApplication::Translate('IdElementoObject');
            $this->lstIdElementoObject->Required = true;
            return $this->lstIdElementoObject;
        }

        /**
         * Create and setup QLabel lblIdElemento
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdElemento_Create($strControlId = null) {
            $this->lblIdElemento = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdElemento->Name = QApplication::Translate('IdElementoObject');
            $this->lblIdElemento->Text = ($this->objElementoHijo->IdElementoObject) ? $this->objElementoHijo->IdElementoObject->__toString() : null;
            $this->lblIdElemento->Required = true;
            return $this->lblIdElemento;
        }

        /**
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('Nombre');
            $this->txtNombre->Text = $this->objElementoHijo->Nombre;
            
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
            $this->lblNombre->Text = $this->objElementoHijo->Nombre;
            return $this->lblNombre;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdPerfilObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdPerfilObject_Create($strControlId = null) {
            $this->lstIdPerfilObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Perfil', 'IdPerfil' , $strControlId);
            if($this->objElementoHijo->IdPerfilObject){
                $this->lstIdPerfilObject->Text = $this->objElementoHijo->IdPerfilObject->__toString();
                $this->lstIdPerfilObject->Value = $this->objElementoHijo->IdPerfilObject->IdPerfil;
            }
            $this->lstIdPerfilObject->Name = QApplication::Translate('IdPerfilObject');
            return $this->lstIdPerfilObject;
        }

        /**
         * Create and setup QLabel lblIdPerfil
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdPerfil_Create($strControlId = null) {
            $this->lblIdPerfil = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdPerfil->Name = QApplication::Translate('IdPerfilObject');
            $this->lblIdPerfil->Text = ($this->objElementoHijo->IdPerfilObject) ? $this->objElementoHijo->IdPerfilObject->__toString() : null;
            return $this->lblIdPerfil;
        }

        /**
         * Create and setup QTextBox txtUndato
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtUndato_Create($strControlId = null) {
            $this->txtUndato = new QTextBox($this->objParentObject, $strControlId);
            $this->txtUndato->Name = QApplication::Translate('Undato');
            $this->txtUndato->Text = $this->objElementoHijo->Undato;
            
            return $this->txtUndato;
        }

        /**
         * Create and setup QLabel lblUndato
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblUndato_Create($strControlId = null) {
            $this->lblUndato = new QLabel($this->objParentObject, $strControlId);
            $this->lblUndato->Name = QApplication::Translate('Undato');
            $this->lblUndato->Text = $this->objElementoHijo->Undato;
            return $this->lblUndato;
        }

        /**
         * Create and setup QTextBox txtOtrodato
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOtrodato_Create($strControlId = null) {
            $this->txtOtrodato = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOtrodato->Name = QApplication::Translate('Otrodato');
            $this->txtOtrodato->Text = $this->objElementoHijo->Otrodato;
            
            return $this->txtOtrodato;
        }

        /**
         * Create and setup QLabel lblOtrodato
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOtrodato_Create($strControlId = null) {
            $this->lblOtrodato = new QLabel($this->objParentObject, $strControlId);
            $this->lblOtrodato->Name = QApplication::Translate('Otrodato');
            $this->lblOtrodato->Text = $this->objElementoHijo->Otrodato;
            return $this->lblOtrodato;
        }





        /**
         * Refresh this MetaControl with Data from the local ElementoHijo object.
         * @param boolean $blnReload reload ElementoHijo from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objElementoHijo->Reload();

            if ($this->lblIdElementoHijo) if ($this->blnEditMode) $this->lblIdElementoHijo->Text = $this->objElementoHijo->IdElementoHijo;

            if ($this->lstIdElementoObject) {
                if($this->objElementoHijo->IdElementoObject){
                    $this->lstIdElementoObject->Text = $this->objElementoHijo->IdElementoObject->__toString();
                    $this->lstIdElementoObject->Value = $this->objElementoHijo->IdElemento->IdElemento;
                }                
            }
            if ($this->lblIdElemento) $this->lblIdElemento->Text = ($this->objElementoHijo->IdElementoObject) ? $this->objElementoHijo->IdElementoObject->__toString() : null;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objElementoHijo->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objElementoHijo->Nombre;

            if ($this->lstIdPerfilObject) {
                if($this->objElementoHijo->IdPerfilObject){
                    $this->lstIdPerfilObject->Text = $this->objElementoHijo->IdPerfilObject->__toString();
                    $this->lstIdPerfilObject->Value = $this->objElementoHijo->IdPerfil->IdPerfil;
                }                
            }
            if ($this->lblIdPerfil) $this->lblIdPerfil->Text = ($this->objElementoHijo->IdPerfilObject) ? $this->objElementoHijo->IdPerfilObject->__toString() : null;

            if ($this->txtUndato) $this->txtUndato->Text = $this->objElementoHijo->Undato;
            if ($this->lblUndato) $this->lblUndato->Text = $this->objElementoHijo->Undato;

            if ($this->txtOtrodato) $this->txtOtrodato->Text = $this->objElementoHijo->Otrodato;
            if ($this->lblOtrodato) $this->lblOtrodato->Text = $this->objElementoHijo->Otrodato;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ELEMENTOHIJO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdElementoObject) $this->objElementoHijo->IdElemento = $this->lstIdElementoObject->SelectedValue;
                if ($this->txtNombre) $this->objElementoHijo->Nombre = $this->txtNombre->Text;
                if ($this->lstIdPerfilObject) $this->objElementoHijo->IdPerfil = $this->lstIdPerfilObject->SelectedValue;
                if ($this->txtUndato) $this->objElementoHijo->Undato = $this->txtUndato->Text;
                if ($this->txtOtrodato) $this->objElementoHijo->Otrodato = $this->txtOtrodato->Text;


        }

        public function SaveElementoHijo() {
            return $this->Save();
        }
        /**
         * This will save this object's ElementoHijo instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the ElementoHijo object
                $idReturn = $this->objElementoHijo->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's ElementoHijo instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteElementoHijo() {
            $this->objElementoHijo->Delete();
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
                case 'ElementoHijo': return $this->objElementoHijo;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to ElementoHijo fields -- will be created dynamically if not yet created
                case 'IdElementoHijoControl':
                    if (!$this->lblIdElementoHijo) return $this->lblIdElementoHijo_Create();
                    return $this->lblIdElementoHijo;
                case 'IdElementoHijoLabel':
                    if (!$this->lblIdElementoHijo) return $this->lblIdElementoHijo_Create();
                    return $this->lblIdElementoHijo;
                case 'IdElementoControl':
                    if (!$this->lstIdElementoObject) return $this->lstIdElementoObject_Create();
                    return $this->lstIdElementoObject;
                case 'IdElementoLabel':
                    if (!$this->lblIdElemento) return $this->lblIdElemento_Create();
                    return $this->lblIdElemento;
                case 'NombreControl':
                    if (!$this->txtNombre) return $this->txtNombre_Create();
                    return $this->txtNombre;
                case 'NombreLabel':
                    if (!$this->lblNombre) return $this->lblNombre_Create();
                    return $this->lblNombre;
                case 'IdPerfilControl':
                    if (!$this->lstIdPerfilObject) return $this->lstIdPerfilObject_Create();
                    return $this->lstIdPerfilObject;
                case 'IdPerfilLabel':
                    if (!$this->lblIdPerfil) return $this->lblIdPerfil_Create();
                    return $this->lblIdPerfil;
                case 'UndatoControl':
                    if (!$this->txtUndato) return $this->txtUndato_Create();
                    return $this->txtUndato;
                case 'UndatoLabel':
                    if (!$this->lblUndato) return $this->lblUndato_Create();
                    return $this->lblUndato;
                case 'OtrodatoControl':
                    if (!$this->txtOtrodato) return $this->txtOtrodato_Create();
                    return $this->txtOtrodato;
                case 'OtrodatoLabel':
                    if (!$this->lblOtrodato) return $this->lblOtrodato_Create();
                    return $this->lblOtrodato;
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
                    // Controls that point to ElementoHijo fields
                    case 'IdElementoHijoControl':
                        return ($this->lblIdElementoHijo = QType::Cast($mixValue, 'QControl'));
                    case 'IdElementoControl':
                        return ($this->lstIdElementoObject = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
                    case 'IdPerfilControl':
                        return ($this->lstIdPerfilObject = QType::Cast($mixValue, 'QControl'));
                    case 'UndatoControl':
                        return ($this->txtUndato = QType::Cast($mixValue, 'QControl'));
                    case 'OtrodatoControl':
                        return ($this->txtOtrodato = QType::Cast($mixValue, 'QControl'));
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
