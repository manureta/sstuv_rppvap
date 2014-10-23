<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the DefinicionCapitulo class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single DefinicionCapitulo object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a DefinicionCapituloMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read DefinicionCapitulo $DefinicionCapitulo the actual DefinicionCapitulo data class being edited
     * property QIntegerTextBox $IdDefinicionCapituloControl
     * property-read QLabel $IdDefinicionCapituloLabel
     * property QTextBox $DescripcionControl
     * property-read QLabel $DescripcionLabel
     * property QListBox $IdDefinicionCuadernilloControl
     * property-read QLabel $IdDefinicionCuadernilloLabel
     * property QIntegerTextBox $OrdenControl
     * property-read QLabel $OrdenLabel
     * property QIntegerTextBox $COfertaAgregadaControl
     * property-read QLabel $COfertaAgregadaLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class DefinicionCapituloMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var DefinicionCapitulo
                */
        public $objDefinicionCapitulo;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of DefinicionCapitulo's individual data fields
        protected $txtIdDefinicionCapitulo;
        protected $txtDescripcion;
        protected $lstIdDefinicionCuadernilloObject;
        protected $txtOrden;
        protected $txtCOfertaAgregada;

        // Controls that allow the viewing of DefinicionCapitulo's individual data fields
        protected $lblIdDefinicionCapitulo;
        protected $lblDescripcion;
        protected $lblIdDefinicionCuadernillo;
        protected $lblOrden;
        protected $lblCOfertaAgregada;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * DefinicionCapituloMetaControl to edit a single DefinicionCapitulo object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single DefinicionCapitulo object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCapituloMetaControl
         * @param DefinicionCapitulo $objDefinicionCapitulo new or existing DefinicionCapitulo object
         */
         public function __construct($objParentObject, DefinicionCapitulo $objDefinicionCapitulo) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this DefinicionCapituloMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked DefinicionCapitulo object
            $this->objDefinicionCapitulo = $objDefinicionCapitulo;

            // Figure out if we're Editing or Creating New
            if ($this->objDefinicionCapitulo->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCapituloMetaControl
         * @param integer $intIdDefinicionCapitulo primary key value
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCapitulo object creation - defaults to CreateOrEdit
          * @return DefinicionCapituloMetaControl
         */
        public static function Create($objParentObject, $intIdDefinicionCapitulo = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdDefinicionCapitulo)) {
                $objDefinicionCapitulo = DefinicionCapitulo::Load($intIdDefinicionCapitulo);

                // DefinicionCapitulo was found -- return it!
                if ($objDefinicionCapitulo)
                    return new DefinicionCapituloMetaControl($objParentObject, $objDefinicionCapitulo);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a DefinicionCapitulo object with PK arguments: ' . $intIdDefinicionCapitulo);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new DefinicionCapituloMetaControl($objParentObject, new DefinicionCapitulo());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCapituloMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCapitulo object creation - defaults to CreateOrEdit
         * @return DefinicionCapituloMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionCapitulo = QApplication::PathInfo(0);
            return DefinicionCapituloMetaControl::Create($objParentObject, $intIdDefinicionCapitulo, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCapituloMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCapitulo object creation - defaults to CreateOrEdit
         * @return DefinicionCapituloMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionCapitulo = QApplication::QueryString('id');
            return DefinicionCapituloMetaControl::Create($objParentObject, $intIdDefinicionCapitulo, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QIntegerTextBox txtIdDefinicionCapitulo
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtIdDefinicionCapitulo_Create($strControlId = null) {
            $this->txtIdDefinicionCapitulo = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionCapitulo->Name = QApplication::Translate('IdDefinicionCapitulo');
            $this->txtIdDefinicionCapitulo->Text = $this->objDefinicionCapitulo->IdDefinicionCapitulo;
            $this->txtIdDefinicionCapitulo->Required = true;
                        $this->txtIdDefinicionCapitulo->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtIdDefinicionCapitulo->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtIdDefinicionCapitulo;
        }

        /**
         * Create and setup QLabel lblIdDefinicionCapitulo
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblIdDefinicionCapitulo_Create($strControlId = null, $strFormat = null) {
            $this->lblIdDefinicionCapitulo = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionCapitulo->Name = QApplication::Translate('IdDefinicionCapitulo');
            $this->lblIdDefinicionCapitulo->Text = $this->objDefinicionCapitulo->IdDefinicionCapitulo;
            $this->lblIdDefinicionCapitulo->Required = true;
            $this->lblIdDefinicionCapitulo->Format = $strFormat;
            return $this->lblIdDefinicionCapitulo;
        }

        /**
         * Create and setup QTextBox txtDescripcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDescripcion_Create($strControlId = null) {
            $this->txtDescripcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDescripcion->Name = QApplication::Translate('Descripcion');
            $this->txtDescripcion->Text = $this->objDefinicionCapitulo->Descripcion;
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
            $this->lblDescripcion->Text = $this->objDefinicionCapitulo->Descripcion;
            $this->lblDescripcion->Required = true;
            return $this->lblDescripcion;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdDefinicionCuadernilloObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdDefinicionCuadernilloObject_Create($strControlId = null) {
            $this->lstIdDefinicionCuadernilloObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'DefinicionCuadernillo', 'IdDefinicionCuadernillo' , $strControlId);
            if($this->objDefinicionCapitulo->IdDefinicionCuadernilloObject){
                $this->lstIdDefinicionCuadernilloObject->Text = $this->objDefinicionCapitulo->IdDefinicionCuadernilloObject->__toString();
                $this->lstIdDefinicionCuadernilloObject->Value = $this->objDefinicionCapitulo->IdDefinicionCuadernilloObject->IdDefinicionCuadernillo;
            }
            $this->lstIdDefinicionCuadernilloObject->Name = QApplication::Translate('IdDefinicionCuadernilloObject');
            $this->lstIdDefinicionCuadernilloObject->Required = true;
            return $this->lstIdDefinicionCuadernilloObject;
        }

        /**
         * Create and setup QLabel lblIdDefinicionCuadernillo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDefinicionCuadernillo_Create($strControlId = null) {
            $this->lblIdDefinicionCuadernillo = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionCuadernillo->Name = QApplication::Translate('IdDefinicionCuadernilloObject');
            $this->lblIdDefinicionCuadernillo->Text = ($this->objDefinicionCapitulo->IdDefinicionCuadernilloObject) ? $this->objDefinicionCapitulo->IdDefinicionCuadernilloObject->__toString() : null;
            $this->lblIdDefinicionCuadernillo->Required = true;
            return $this->lblIdDefinicionCuadernillo;
        }

        /**
         * Create and setup QIntegerTextBox txtOrden
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtOrden_Create($strControlId = null) {
            $this->txtOrden = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtOrden->Name = QApplication::Translate('Orden');
            $this->txtOrden->Text = $this->objDefinicionCapitulo->Orden;
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
            $this->lblOrden->Text = $this->objDefinicionCapitulo->Orden;
            $this->lblOrden->Format = $strFormat;
            return $this->lblOrden;
        }

        /**
         * Create and setup QIntegerTextBox txtCOfertaAgregada
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtCOfertaAgregada_Create($strControlId = null) {
            $this->txtCOfertaAgregada = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtCOfertaAgregada->Name = QApplication::Translate('COfertaAgregada');
            $this->txtCOfertaAgregada->Text = $this->objDefinicionCapitulo->COfertaAgregada;
                        $this->txtCOfertaAgregada->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this->txtCOfertaAgregada->Minimum = QDatabaseNumberFieldMin::Smallint;
            return $this->txtCOfertaAgregada;
        }

        /**
         * Create and setup QLabel lblCOfertaAgregada
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblCOfertaAgregada_Create($strControlId = null, $strFormat = null) {
            $this->lblCOfertaAgregada = new QLabel($this->objParentObject, $strControlId);
            $this->lblCOfertaAgregada->Name = QApplication::Translate('COfertaAgregada');
            $this->lblCOfertaAgregada->Text = $this->objDefinicionCapitulo->COfertaAgregada;
            $this->lblCOfertaAgregada->Format = $strFormat;
            return $this->lblCOfertaAgregada;
        }



    public $lstDatosCapituloAsId;
    /**
     * Gets all associated DatosCapitulosAsId as an array of DatosCapitulo objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DatosCapitulo[]
    */ 
    public function lstDatosCapituloAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DatosCapitulo';
        $strConfigArray['strRefreshMethod'] = 'DatosCapituloAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCapitulo';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDatosCapitulo';
        $strConfigArray['strAddMethod'] = 'AddDatosCapituloAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDatosCapituloAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['CEstado'] = QApplication::Translate('CEstado');
        $strConfigArray['Columns']['IdDatosCuadernilloObject'] = QApplication::Translate('IdDatosCuadernilloObject');

        $this->lstDatosCapituloAsId = new QListPanel($this->objParentObject, $this->objDefinicionCapitulo, $strConfigArray, $strControlId);
        $this->lstDatosCapituloAsId->Name = DatosCapitulo::Noun();
        $this->lstDatosCapituloAsId->SetNewMethod($this, "lstDatosCapituloAsId_New");
        $this->lstDatosCapituloAsId->SetEditMethod($this, "lstDatosCapituloAsId_Edit");
        return $this->lstDatosCapituloAsId;
    }

    public function lstDatosCapituloAsId_New() {
        DatosCapituloModalPanel::$strControlsArray['lstIdDefinicionCapituloObject'] = false;
        $strControlsArray = array_keys(DatosCapituloModalPanel::$strControlsArray, true);
        $this->lstDatosCapituloAsId->ModalPanel = new DatosCapituloModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDatosCapituloAsId->ModalPanel->objCallerControl = $this->lstDatosCapituloAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDatosCapituloAsId_Edit($intKey) {
        DatosCapituloModalPanel::$strControlsArray['lstIdDefinicionCapituloObject'] = false;
        $strControlsArray = array_keys(DatosCapituloModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCapitulo->DatosCapituloAsIdArray[$intKey];
        $this->lstDatosCapituloAsId->ModalPanel = new DatosCapituloModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDatosCapituloAsId->ModalPanel->objCallerControl = $this->lstDatosCapituloAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstDefinicionPaginaAsId;
    /**
     * Gets all associated DefinicionPaginasAsId as an array of DefinicionPagina objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefinicionPagina[]
    */ 
    public function lstDefinicionPaginaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefinicionPagina';
        $strConfigArray['strRefreshMethod'] = 'DefinicionPaginaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCapitulo';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefinicionPagina';
        $strConfigArray['strAddMethod'] = 'AddDefinicionPaginaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefinicionPaginaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Descripcion'] = QApplication::Translate('Descripcion');
        $strConfigArray['Columns']['Numero'] = QApplication::Translate('Numero');

        $this->lstDefinicionPaginaAsId = new QListPanel($this->objParentObject, $this->objDefinicionCapitulo, $strConfigArray, $strControlId);
        $this->lstDefinicionPaginaAsId->Name = DefinicionPagina::Noun();
        $this->lstDefinicionPaginaAsId->SetNewMethod($this, "lstDefinicionPaginaAsId_New");
        $this->lstDefinicionPaginaAsId->SetEditMethod($this, "lstDefinicionPaginaAsId_Edit");
        return $this->lstDefinicionPaginaAsId;
    }

    public function lstDefinicionPaginaAsId_New() {
        DefinicionPaginaModalPanel::$strControlsArray['lstIdDefinicionCapituloObject'] = false;
        $strControlsArray = array_keys(DefinicionPaginaModalPanel::$strControlsArray, true);
        $this->lstDefinicionPaginaAsId->ModalPanel = new DefinicionPaginaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefinicionPaginaAsId->ModalPanel->objCallerControl = $this->lstDefinicionPaginaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefinicionPaginaAsId_Edit($intKey) {
        DefinicionPaginaModalPanel::$strControlsArray['lstIdDefinicionCapituloObject'] = false;
        $strControlsArray = array_keys(DefinicionPaginaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCapitulo->DefinicionPaginaAsIdArray[$intKey];
        $this->lstDefinicionPaginaAsId->ModalPanel = new DefinicionPaginaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefinicionPaginaAsId->ModalPanel->objCallerControl = $this->lstDefinicionPaginaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local DefinicionCapitulo object.
         * @param boolean $blnReload reload DefinicionCapitulo from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objDefinicionCapitulo->Reload();

            if ($this->txtIdDefinicionCapitulo) $this->txtIdDefinicionCapitulo->Text = $this->objDefinicionCapitulo->IdDefinicionCapitulo;
            if ($this->lblIdDefinicionCapitulo) $this->lblIdDefinicionCapitulo->Text = $this->objDefinicionCapitulo->IdDefinicionCapitulo;

            if ($this->txtDescripcion) $this->txtDescripcion->Text = $this->objDefinicionCapitulo->Descripcion;
            if ($this->lblDescripcion) $this->lblDescripcion->Text = $this->objDefinicionCapitulo->Descripcion;

            if ($this->lstIdDefinicionCuadernilloObject) {
                if($this->objDefinicionCapitulo->IdDefinicionCuadernilloObject){
                    $this->lstIdDefinicionCuadernilloObject->Text = $this->objDefinicionCapitulo->IdDefinicionCuadernilloObject->__toString();
                    $this->lstIdDefinicionCuadernilloObject->Value = $this->objDefinicionCapitulo->IdDefinicionCuadernillo->IdDefinicionCuadernillo;
                }                
            }
            if ($this->lblIdDefinicionCuadernillo) $this->lblIdDefinicionCuadernillo->Text = ($this->objDefinicionCapitulo->IdDefinicionCuadernilloObject) ? $this->objDefinicionCapitulo->IdDefinicionCuadernilloObject->__toString() : null;

            if ($this->txtOrden) $this->txtOrden->Text = $this->objDefinicionCapitulo->Orden;
            if ($this->lblOrden) $this->lblOrden->Text = $this->objDefinicionCapitulo->Orden;

            if ($this->txtCOfertaAgregada) $this->txtCOfertaAgregada->Text = $this->objDefinicionCapitulo->COfertaAgregada;
            if ($this->lblCOfertaAgregada) $this->lblCOfertaAgregada->Text = $this->objDefinicionCapitulo->COfertaAgregada;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC DEFINICIONCAPITULO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtIdDefinicionCapitulo) $this->objDefinicionCapitulo->IdDefinicionCapitulo = $this->txtIdDefinicionCapitulo->Text;
                if ($this->txtDescripcion) $this->objDefinicionCapitulo->Descripcion = $this->txtDescripcion->Text;
                if ($this->lstIdDefinicionCuadernilloObject) $this->objDefinicionCapitulo->IdDefinicionCuadernillo = $this->lstIdDefinicionCuadernilloObject->SelectedValue;
                if ($this->txtOrden) $this->objDefinicionCapitulo->Orden = $this->txtOrden->Text;
                if ($this->txtCOfertaAgregada) $this->objDefinicionCapitulo->COfertaAgregada = $this->txtCOfertaAgregada->Text;


        }

        public function SaveDefinicionCapitulo() {
            return $this->Save();
        }
        /**
         * This will save this object's DefinicionCapitulo instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the DefinicionCapitulo object
                $idReturn = $this->objDefinicionCapitulo->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's DefinicionCapitulo instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteDefinicionCapitulo() {
            $this->objDefinicionCapitulo->Delete();
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
                case 'DefinicionCapitulo': return $this->objDefinicionCapitulo;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to DefinicionCapitulo fields -- will be created dynamically if not yet created
                case 'IdDefinicionCapituloControl':
                    if (!$this->txtIdDefinicionCapitulo) return $this->txtIdDefinicionCapitulo_Create();
                    return $this->txtIdDefinicionCapitulo;
                case 'IdDefinicionCapituloLabel':
                    if (!$this->lblIdDefinicionCapitulo) return $this->lblIdDefinicionCapitulo_Create();
                    return $this->lblIdDefinicionCapitulo;
                case 'DescripcionControl':
                    if (!$this->txtDescripcion) return $this->txtDescripcion_Create();
                    return $this->txtDescripcion;
                case 'DescripcionLabel':
                    if (!$this->lblDescripcion) return $this->lblDescripcion_Create();
                    return $this->lblDescripcion;
                case 'IdDefinicionCuadernilloControl':
                    if (!$this->lstIdDefinicionCuadernilloObject) return $this->lstIdDefinicionCuadernilloObject_Create();
                    return $this->lstIdDefinicionCuadernilloObject;
                case 'IdDefinicionCuadernilloLabel':
                    if (!$this->lblIdDefinicionCuadernillo) return $this->lblIdDefinicionCuadernillo_Create();
                    return $this->lblIdDefinicionCuadernillo;
                case 'OrdenControl':
                    if (!$this->txtOrden) return $this->txtOrden_Create();
                    return $this->txtOrden;
                case 'OrdenLabel':
                    if (!$this->lblOrden) return $this->lblOrden_Create();
                    return $this->lblOrden;
                case 'COfertaAgregadaControl':
                    if (!$this->txtCOfertaAgregada) return $this->txtCOfertaAgregada_Create();
                    return $this->txtCOfertaAgregada;
                case 'COfertaAgregadaLabel':
                    if (!$this->lblCOfertaAgregada) return $this->lblCOfertaAgregada_Create();
                    return $this->lblCOfertaAgregada;
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
                    // Controls that point to DefinicionCapitulo fields
                    case 'IdDefinicionCapituloControl':
                        return ($this->txtIdDefinicionCapitulo = QType::Cast($mixValue, 'QControl'));
                    case 'DescripcionControl':
                        return ($this->txtDescripcion = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionCuadernilloControl':
                        return ($this->lstIdDefinicionCuadernilloObject = QType::Cast($mixValue, 'QControl'));
                    case 'OrdenControl':
                        return ($this->txtOrden = QType::Cast($mixValue, 'QControl'));
                    case 'COfertaAgregadaControl':
                        return ($this->txtCOfertaAgregada = QType::Cast($mixValue, 'QControl'));
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
