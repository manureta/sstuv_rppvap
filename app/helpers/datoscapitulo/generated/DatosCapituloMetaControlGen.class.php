<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the DatosCapitulo class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single DatosCapitulo object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a DatosCapituloMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read DatosCapitulo $DatosCapitulo the actual DatosCapitulo data class being edited
     * property QLabel $IdDatosCapituloControl
     * property-read QLabel $IdDatosCapituloLabel
     * property QListBox $IdDefinicionCapituloControl
     * property-read QLabel $IdDefinicionCapituloLabel
     * property QIntegerTextBox $CEstadoControl
     * property-read QLabel $CEstadoLabel
     * property QListBox $IdDatosCuadernilloControl
     * property-read QLabel $IdDatosCuadernilloLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class DatosCapituloMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var DatosCapitulo
                */
        public $objDatosCapitulo;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of DatosCapitulo's individual data fields
        protected $lblIdDatosCapitulo;
        protected $lstIdDefinicionCapituloObject;
        protected $txtCEstado;
        protected $lstIdDatosCuadernilloObject;

        // Controls that allow the viewing of DatosCapitulo's individual data fields
        protected $lblIdDefinicionCapitulo;
        protected $lblCEstado;
        protected $lblIdDatosCuadernillo;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * DatosCapituloMetaControl to edit a single DatosCapitulo object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single DatosCapitulo object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DatosCapituloMetaControl
         * @param DatosCapitulo $objDatosCapitulo new or existing DatosCapitulo object
         */
         public function __construct($objParentObject, DatosCapitulo $objDatosCapitulo) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this DatosCapituloMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked DatosCapitulo object
            $this->objDatosCapitulo = $objDatosCapitulo;

            // Figure out if we're Editing or Creating New
            if ($this->objDatosCapitulo->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this DatosCapituloMetaControl
         * @param integer $intIdDatosCapitulo primary key value
         * @param QMetaControlCreateType $intCreateType rules governing DatosCapitulo object creation - defaults to CreateOrEdit
          * @return DatosCapituloMetaControl
         */
        public static function Create($objParentObject, $intIdDatosCapitulo = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdDatosCapitulo)) {
                $objDatosCapitulo = DatosCapitulo::Load($intIdDatosCapitulo);

                // DatosCapitulo was found -- return it!
                if ($objDatosCapitulo)
                    return new DatosCapituloMetaControl($objParentObject, $objDatosCapitulo);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a DatosCapitulo object with PK arguments: ' . $intIdDatosCapitulo);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new DatosCapituloMetaControl($objParentObject, new DatosCapitulo());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DatosCapituloMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DatosCapitulo object creation - defaults to CreateOrEdit
         * @return DatosCapituloMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDatosCapitulo = QApplication::PathInfo(0);
            return DatosCapituloMetaControl::Create($objParentObject, $intIdDatosCapitulo, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DatosCapituloMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DatosCapitulo object creation - defaults to CreateOrEdit
         * @return DatosCapituloMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDatosCapitulo = QApplication::QueryString('id');
            return DatosCapituloMetaControl::Create($objParentObject, $intIdDatosCapitulo, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblIdDatosCapitulo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDatosCapitulo_Create($strControlId = null) {
            $this->lblIdDatosCapitulo = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDatosCapitulo->Name = QApplication::Translate('IdDatosCapitulo');
            if ($this->blnEditMode)
                $this->lblIdDatosCapitulo->Text = $this->objDatosCapitulo->IdDatosCapitulo;
            else
                $this->lblIdDatosCapitulo->Text = 'N/A';
            return $this->lblIdDatosCapitulo;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdDefinicionCapituloObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdDefinicionCapituloObject_Create($strControlId = null) {
            $this->lstIdDefinicionCapituloObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'DefinicionCapitulo', 'IdDefinicionCapitulo' , $strControlId);
            if($this->objDatosCapitulo->IdDefinicionCapituloObject){
                $this->lstIdDefinicionCapituloObject->Text = $this->objDatosCapitulo->IdDefinicionCapituloObject->__toString();
                $this->lstIdDefinicionCapituloObject->Value = $this->objDatosCapitulo->IdDefinicionCapituloObject->IdDefinicionCapitulo;
            }
            $this->lstIdDefinicionCapituloObject->Name = QApplication::Translate('IdDefinicionCapituloObject');
            $this->lstIdDefinicionCapituloObject->Required = true;
            return $this->lstIdDefinicionCapituloObject;
        }

        /**
         * Create and setup QLabel lblIdDefinicionCapitulo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDefinicionCapitulo_Create($strControlId = null) {
            $this->lblIdDefinicionCapitulo = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionCapitulo->Name = QApplication::Translate('IdDefinicionCapituloObject');
            $this->lblIdDefinicionCapitulo->Text = ($this->objDatosCapitulo->IdDefinicionCapituloObject) ? $this->objDatosCapitulo->IdDefinicionCapituloObject->__toString() : null;
            $this->lblIdDefinicionCapitulo->Required = true;
            return $this->lblIdDefinicionCapitulo;
        }

        /**
         * Create and setup QIntegerTextBox txtCEstado
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtCEstado_Create($strControlId = null) {
            $this->txtCEstado = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtCEstado->Name = QApplication::Translate('CEstado');
            $this->txtCEstado->Text = $this->objDatosCapitulo->CEstado;
            $this->txtCEstado->Required = true;
                        $this->txtCEstado->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtCEstado->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtCEstado;
        }

        /**
         * Create and setup QLabel lblCEstado
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblCEstado_Create($strControlId = null, $strFormat = null) {
            $this->lblCEstado = new QLabel($this->objParentObject, $strControlId);
            $this->lblCEstado->Name = QApplication::Translate('CEstado');
            $this->lblCEstado->Text = $this->objDatosCapitulo->CEstado;
            $this->lblCEstado->Required = true;
            $this->lblCEstado->Format = $strFormat;
            return $this->lblCEstado;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdDatosCuadernilloObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdDatosCuadernilloObject_Create($strControlId = null) {
            $this->lstIdDatosCuadernilloObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'DatosCuadernillo', 'IdDatosCuadernillo' , $strControlId);
            if($this->objDatosCapitulo->IdDatosCuadernilloObject){
                $this->lstIdDatosCuadernilloObject->Text = $this->objDatosCapitulo->IdDatosCuadernilloObject->__toString();
                $this->lstIdDatosCuadernilloObject->Value = $this->objDatosCapitulo->IdDatosCuadernilloObject->IdDatosCuadernillo;
            }
            $this->lstIdDatosCuadernilloObject->Name = QApplication::Translate('IdDatosCuadernilloObject');
            $this->lstIdDatosCuadernilloObject->Required = true;
            return $this->lstIdDatosCuadernilloObject;
        }

        /**
         * Create and setup QLabel lblIdDatosCuadernillo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDatosCuadernillo_Create($strControlId = null) {
            $this->lblIdDatosCuadernillo = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDatosCuadernillo->Name = QApplication::Translate('IdDatosCuadernilloObject');
            $this->lblIdDatosCuadernillo->Text = ($this->objDatosCapitulo->IdDatosCuadernilloObject) ? $this->objDatosCapitulo->IdDatosCuadernilloObject->__toString() : null;
            $this->lblIdDatosCuadernillo->Required = true;
            return $this->lblIdDatosCuadernillo;
        }



    public $lstDatosCuadroAsId;
    /**
     * Gets all associated DatosCuadrosAsId as an array of DatosCuadro objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DatosCuadro[]
    */ 
    public function lstDatosCuadroAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DatosCuadro';
        $strConfigArray['strRefreshMethod'] = 'DatosCuadroAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDatosCapitulo';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDatosCuadro';
        $strConfigArray['strAddMethod'] = 'AddDatosCuadroAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDatosCuadroAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdDefinicionCuadroObject'] = QApplication::Translate('IdDefinicionCuadroObject');
        $strConfigArray['Columns']['CEstado'] = QApplication::Translate('CEstado');
        $strConfigArray['Columns']['IdUsuario'] = QApplication::Translate('IdUsuario');
        $strConfigArray['Columns']['FechaModificacion'] = QApplication::Translate('FechaModificacion');
        $strConfigArray['Columns']['Conflicto'] = QApplication::Translate('Conflicto');

        $this->lstDatosCuadroAsId = new QListPanel($this->objParentObject, $this->objDatosCapitulo, $strConfigArray, $strControlId);
        $this->lstDatosCuadroAsId->Name = DatosCuadro::Noun();
        $this->lstDatosCuadroAsId->SetNewMethod($this, "lstDatosCuadroAsId_New");
        $this->lstDatosCuadroAsId->SetEditMethod($this, "lstDatosCuadroAsId_Edit");
        return $this->lstDatosCuadroAsId;
    }

    public function lstDatosCuadroAsId_New() {
        DatosCuadroModalPanel::$strControlsArray['lstIdDatosCapituloObject'] = false;
        $strControlsArray = array_keys(DatosCuadroModalPanel::$strControlsArray, true);
        $this->lstDatosCuadroAsId->ModalPanel = new DatosCuadroModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDatosCuadroAsId->ModalPanel->objCallerControl = $this->lstDatosCuadroAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDatosCuadroAsId_Edit($intKey) {
        DatosCuadroModalPanel::$strControlsArray['lstIdDatosCapituloObject'] = false;
        $strControlsArray = array_keys(DatosCuadroModalPanel::$strControlsArray, true);
        $obj = $this->objDatosCapitulo->DatosCuadroAsIdArray[$intKey];
        $this->lstDatosCuadroAsId->ModalPanel = new DatosCuadroModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDatosCuadroAsId->ModalPanel->objCallerControl = $this->lstDatosCuadroAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local DatosCapitulo object.
         * @param boolean $blnReload reload DatosCapitulo from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objDatosCapitulo->Reload();

            if ($this->lblIdDatosCapitulo) if ($this->blnEditMode) $this->lblIdDatosCapitulo->Text = $this->objDatosCapitulo->IdDatosCapitulo;

            if ($this->lstIdDefinicionCapituloObject) {
                if($this->objDatosCapitulo->IdDefinicionCapituloObject){
                    $this->lstIdDefinicionCapituloObject->Text = $this->objDatosCapitulo->IdDefinicionCapituloObject->__toString();
                    $this->lstIdDefinicionCapituloObject->Value = $this->objDatosCapitulo->IdDefinicionCapitulo->IdDefinicionCapitulo;
                }                
            }
            if ($this->lblIdDefinicionCapitulo) $this->lblIdDefinicionCapitulo->Text = ($this->objDatosCapitulo->IdDefinicionCapituloObject) ? $this->objDatosCapitulo->IdDefinicionCapituloObject->__toString() : null;

            if ($this->txtCEstado) $this->txtCEstado->Text = $this->objDatosCapitulo->CEstado;
            if ($this->lblCEstado) $this->lblCEstado->Text = $this->objDatosCapitulo->CEstado;

            if ($this->lstIdDatosCuadernilloObject) {
                if($this->objDatosCapitulo->IdDatosCuadernilloObject){
                    $this->lstIdDatosCuadernilloObject->Text = $this->objDatosCapitulo->IdDatosCuadernilloObject->__toString();
                    $this->lstIdDatosCuadernilloObject->Value = $this->objDatosCapitulo->IdDatosCuadernillo->IdDatosCuadernillo;
                }                
            }
            if ($this->lblIdDatosCuadernillo) $this->lblIdDatosCuadernillo->Text = ($this->objDatosCapitulo->IdDatosCuadernilloObject) ? $this->objDatosCapitulo->IdDatosCuadernilloObject->__toString() : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC DATOSCAPITULO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdDefinicionCapituloObject) $this->objDatosCapitulo->IdDefinicionCapitulo = $this->lstIdDefinicionCapituloObject->SelectedValue;
                if ($this->txtCEstado) $this->objDatosCapitulo->CEstado = $this->txtCEstado->Text;
                if ($this->lstIdDatosCuadernilloObject) $this->objDatosCapitulo->IdDatosCuadernillo = $this->lstIdDatosCuadernilloObject->SelectedValue;


        }

        public function SaveDatosCapitulo() {
            return $this->Save();
        }
        /**
         * This will save this object's DatosCapitulo instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the DatosCapitulo object
                $idReturn = $this->objDatosCapitulo->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's DatosCapitulo instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteDatosCapitulo() {
            $this->objDatosCapitulo->Delete();
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
                case 'DatosCapitulo': return $this->objDatosCapitulo;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to DatosCapitulo fields -- will be created dynamically if not yet created
                case 'IdDatosCapituloControl':
                    if (!$this->lblIdDatosCapitulo) return $this->lblIdDatosCapitulo_Create();
                    return $this->lblIdDatosCapitulo;
                case 'IdDatosCapituloLabel':
                    if (!$this->lblIdDatosCapitulo) return $this->lblIdDatosCapitulo_Create();
                    return $this->lblIdDatosCapitulo;
                case 'IdDefinicionCapituloControl':
                    if (!$this->lstIdDefinicionCapituloObject) return $this->lstIdDefinicionCapituloObject_Create();
                    return $this->lstIdDefinicionCapituloObject;
                case 'IdDefinicionCapituloLabel':
                    if (!$this->lblIdDefinicionCapitulo) return $this->lblIdDefinicionCapitulo_Create();
                    return $this->lblIdDefinicionCapitulo;
                case 'CEstadoControl':
                    if (!$this->txtCEstado) return $this->txtCEstado_Create();
                    return $this->txtCEstado;
                case 'CEstadoLabel':
                    if (!$this->lblCEstado) return $this->lblCEstado_Create();
                    return $this->lblCEstado;
                case 'IdDatosCuadernilloControl':
                    if (!$this->lstIdDatosCuadernilloObject) return $this->lstIdDatosCuadernilloObject_Create();
                    return $this->lstIdDatosCuadernilloObject;
                case 'IdDatosCuadernilloLabel':
                    if (!$this->lblIdDatosCuadernillo) return $this->lblIdDatosCuadernillo_Create();
                    return $this->lblIdDatosCuadernillo;
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
                    // Controls that point to DatosCapitulo fields
                    case 'IdDatosCapituloControl':
                        return ($this->lblIdDatosCapitulo = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionCapituloControl':
                        return ($this->lstIdDefinicionCapituloObject = QType::Cast($mixValue, 'QControl'));
                    case 'CEstadoControl':
                        return ($this->txtCEstado = QType::Cast($mixValue, 'QControl'));
                    case 'IdDatosCuadernilloControl':
                        return ($this->lstIdDatosCuadernilloObject = QType::Cast($mixValue, 'QControl'));
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
