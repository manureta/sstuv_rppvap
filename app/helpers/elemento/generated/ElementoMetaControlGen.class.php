<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Elemento class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Elemento object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a ElementoMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Elemento $Elemento the actual Elemento data class being edited
     * property QLabel $IdElementoControl
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

    class ElementoMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Elemento
                */
        public $objElemento;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Elemento's individual data fields
        protected $lblIdElemento;
        protected $txtNombre;
        protected $lstIdPerfilObject;
        protected $txtUndato;
        protected $txtOtrodato;

        // Controls that allow the viewing of Elemento's individual data fields
        protected $lblNombre;
        protected $lblIdPerfil;
        protected $lblUndato;
        protected $lblOtrodato;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * ElementoMetaControl to edit a single Elemento object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Elemento object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoMetaControl
         * @param Elemento $objElemento new or existing Elemento object
         */
         public function __construct($objParentObject, Elemento $objElemento) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this ElementoMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Elemento object
            $this->objElemento = $objElemento;

            // Figure out if we're Editing or Creating New
            if ($this->objElemento->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoMetaControl
         * @param integer $intIdElemento primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Elemento object creation - defaults to CreateOrEdit
          * @return ElementoMetaControl
         */
        public static function Create($objParentObject, $intIdElemento = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdElemento)) {
                $objElemento = Elemento::Load($intIdElemento);

                // Elemento was found -- return it!
                if ($objElemento)
                    return new ElementoMetaControl($objParentObject, $objElemento);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Elemento object with PK arguments: ' . $intIdElemento);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new ElementoMetaControl($objParentObject, new Elemento());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Elemento object creation - defaults to CreateOrEdit
         * @return ElementoMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdElemento = QApplication::PathInfo(0);
            return ElementoMetaControl::Create($objParentObject, $intIdElemento, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ElementoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Elemento object creation - defaults to CreateOrEdit
         * @return ElementoMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdElemento = QApplication::QueryString('id');
            return ElementoMetaControl::Create($objParentObject, $intIdElemento, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblIdElemento
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdElemento_Create($strControlId = null) {
            $this->lblIdElemento = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdElemento->Name = QApplication::Translate('IdElemento');
            if ($this->blnEditMode)
                $this->lblIdElemento->Text = $this->objElemento->IdElemento;
            else
                $this->lblIdElemento->Text = 'N/A';
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
            $this->txtNombre->Text = $this->objElemento->Nombre;
            
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
            $this->lblNombre->Text = $this->objElemento->Nombre;
            return $this->lblNombre;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdPerfilObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdPerfilObject_Create($strControlId = null) {
            $this->lstIdPerfilObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Perfil', 'IdPerfil' , $strControlId);
            if($this->objElemento->IdPerfilObject){
                $this->lstIdPerfilObject->Text = $this->objElemento->IdPerfilObject->__toString();
                $this->lstIdPerfilObject->Value = $this->objElemento->IdPerfilObject->IdPerfil;
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
            $this->lblIdPerfil->Text = ($this->objElemento->IdPerfilObject) ? $this->objElemento->IdPerfilObject->__toString() : null;
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
            $this->txtUndato->Text = $this->objElemento->Undato;
            
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
            $this->lblUndato->Text = $this->objElemento->Undato;
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
            $this->txtOtrodato->Text = $this->objElemento->Otrodato;
            
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
            $this->lblOtrodato->Text = $this->objElemento->Otrodato;
            return $this->lblOtrodato;
        }



    public $lstElementoHijoAsId;
    /**
     * Gets all associated ElementoHijosAsId as an array of ElementoHijo objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return ElementoHijo[]
    */ 
    public function lstElementoHijoAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'ElementoHijo';
        $strConfigArray['strRefreshMethod'] = 'ElementoHijoAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdElemento';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdElementoHijo';
        $strConfigArray['strAddMethod'] = 'AddElementoHijoAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveElementoHijoAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Nombre'] = QApplication::Translate('Nombre');
        $strConfigArray['Columns']['IdPerfilObject'] = QApplication::Translate('IdPerfilObject');
        $strConfigArray['Columns']['Undato'] = QApplication::Translate('Undato');
        $strConfigArray['Columns']['Otrodato'] = QApplication::Translate('Otrodato');

        $this->lstElementoHijoAsId = new QListPanel($this->objParentObject, $this->objElemento, $strConfigArray, $strControlId);
        $this->lstElementoHijoAsId->Name = ElementoHijo::Noun();
        $this->lstElementoHijoAsId->SetNewMethod($this, "lstElementoHijoAsId_New");
        $this->lstElementoHijoAsId->SetEditMethod($this, "lstElementoHijoAsId_Edit");
        return $this->lstElementoHijoAsId;
    }

    public function lstElementoHijoAsId_New() {
        ElementoHijoModalPanel::$strControlsArray['lstIdElementoObject'] = false;
        $strControlsArray = array_keys(ElementoHijoModalPanel::$strControlsArray, true);
        $this->lstElementoHijoAsId->ModalPanel = new ElementoHijoModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstElementoHijoAsId->ModalPanel->objCallerControl = $this->lstElementoHijoAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstElementoHijoAsId_Edit($intKey) {
        ElementoHijoModalPanel::$strControlsArray['lstIdElementoObject'] = false;
        $strControlsArray = array_keys(ElementoHijoModalPanel::$strControlsArray, true);
        $obj = $this->objElemento->ElementoHijoAsIdArray[$intKey];
        $this->lstElementoHijoAsId->ModalPanel = new ElementoHijoModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstElementoHijoAsId->ModalPanel->objCallerControl = $this->lstElementoHijoAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Elemento object.
         * @param boolean $blnReload reload Elemento from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objElemento->Reload();

            if ($this->lblIdElemento) if ($this->blnEditMode) $this->lblIdElemento->Text = $this->objElemento->IdElemento;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objElemento->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objElemento->Nombre;

            if ($this->lstIdPerfilObject) {
                if($this->objElemento->IdPerfilObject){
                    $this->lstIdPerfilObject->Text = $this->objElemento->IdPerfilObject->__toString();
                    $this->lstIdPerfilObject->Value = $this->objElemento->IdPerfil->IdPerfil;
                }                
            }
            if ($this->lblIdPerfil) $this->lblIdPerfil->Text = ($this->objElemento->IdPerfilObject) ? $this->objElemento->IdPerfilObject->__toString() : null;

            if ($this->txtUndato) $this->txtUndato->Text = $this->objElemento->Undato;
            if ($this->lblUndato) $this->lblUndato->Text = $this->objElemento->Undato;

            if ($this->txtOtrodato) $this->txtOtrodato->Text = $this->objElemento->Otrodato;
            if ($this->lblOtrodato) $this->lblOtrodato->Text = $this->objElemento->Otrodato;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ELEMENTO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtNombre) $this->objElemento->Nombre = $this->txtNombre->Text;
                if ($this->lstIdPerfilObject) $this->objElemento->IdPerfil = $this->lstIdPerfilObject->SelectedValue;
                if ($this->txtUndato) $this->objElemento->Undato = $this->txtUndato->Text;
                if ($this->txtOtrodato) $this->objElemento->Otrodato = $this->txtOtrodato->Text;


        }

        public function SaveElemento() {
            return $this->Save();
        }
        /**
         * This will save this object's Elemento instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Elemento object
                $idReturn = $this->objElemento->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Elemento instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteElemento() {
            $this->objElemento->Delete();
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
                case 'Elemento': return $this->objElemento;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Elemento fields -- will be created dynamically if not yet created
                case 'IdElementoControl':
                    if (!$this->lblIdElemento) return $this->lblIdElemento_Create();
                    return $this->lblIdElemento;
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
                    // Controls that point to Elemento fields
                    case 'IdElementoControl':
                        return ($this->lblIdElemento = QType::Cast($mixValue, 'QControl'));
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
