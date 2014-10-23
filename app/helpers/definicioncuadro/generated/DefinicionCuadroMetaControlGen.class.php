<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the DefinicionCuadro class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single DefinicionCuadro object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a DefinicionCuadroMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read DefinicionCuadro $DefinicionCuadro the actual DefinicionCuadro data class being edited
     * property QIntegerTextBox $IdDefinicionCuadroControl
     * property-read QLabel $IdDefinicionCuadroLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QTextBox $NumeroControl
     * property-read QLabel $NumeroLabel
     * property QIntegerTextBox $CantidadFilasPrecargadasControl
     * property-read QLabel $CantidadFilasPrecargadasLabel
     * property QIntegerTextBox $OrdenControl
     * property-read QLabel $OrdenLabel
     * property QTextBox $TituloFilasControl
     * property-read QLabel $TituloFilasLabel
     * property QListBox $CCriterioCompletitudControl
     * property-read QLabel $CCriterioCompletitudLabel
     * property QListBox $IdDefinicionMigracionControl
     * property-read QLabel $IdDefinicionMigracionLabel
     * property QCheckBox $ObligatorioControl
     * property-read QLabel $ObligatorioLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class DefinicionCuadroMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var DefinicionCuadro
                */
        public $objDefinicionCuadro;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of DefinicionCuadro's individual data fields
        protected $txtIdDefinicionCuadro;
        protected $txtNombre;
        protected $txtNumero;
        protected $txtCantidadFilasPrecargadas;
        protected $txtOrden;
        protected $txtTituloFilas;
        protected $lstCCriterioCompletitudObject;
        protected $lstIdDefinicionMigracionObject;
        protected $chkObligatorio;

        // Controls that allow the viewing of DefinicionCuadro's individual data fields
        protected $lblIdDefinicionCuadro;
        protected $lblNombre;
        protected $lblNumero;
        protected $lblCantidadFilasPrecargadas;
        protected $lblOrden;
        protected $lblTituloFilas;
        protected $lblCCriterioCompletitud;
        protected $lblIdDefinicionMigracion;
        protected $lblObligatorio;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * DefinicionCuadroMetaControl to edit a single DefinicionCuadro object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single DefinicionCuadro object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCuadroMetaControl
         * @param DefinicionCuadro $objDefinicionCuadro new or existing DefinicionCuadro object
         */
         public function __construct($objParentObject, DefinicionCuadro $objDefinicionCuadro) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this DefinicionCuadroMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked DefinicionCuadro object
            $this->objDefinicionCuadro = $objDefinicionCuadro;

            // Figure out if we're Editing or Creating New
            if ($this->objDefinicionCuadro->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCuadroMetaControl
         * @param integer $intIdDefinicionCuadro primary key value
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCuadro object creation - defaults to CreateOrEdit
          * @return DefinicionCuadroMetaControl
         */
        public static function Create($objParentObject, $intIdDefinicionCuadro = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdDefinicionCuadro)) {
                $objDefinicionCuadro = DefinicionCuadro::Load($intIdDefinicionCuadro);

                // DefinicionCuadro was found -- return it!
                if ($objDefinicionCuadro)
                    return new DefinicionCuadroMetaControl($objParentObject, $objDefinicionCuadro);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a DefinicionCuadro object with PK arguments: ' . $intIdDefinicionCuadro);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new DefinicionCuadroMetaControl($objParentObject, new DefinicionCuadro());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCuadroMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCuadro object creation - defaults to CreateOrEdit
         * @return DefinicionCuadroMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionCuadro = QApplication::PathInfo(0);
            return DefinicionCuadroMetaControl::Create($objParentObject, $intIdDefinicionCuadro, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this DefinicionCuadroMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing DefinicionCuadro object creation - defaults to CreateOrEdit
         * @return DefinicionCuadroMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdDefinicionCuadro = QApplication::QueryString('id');
            return DefinicionCuadroMetaControl::Create($objParentObject, $intIdDefinicionCuadro, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QIntegerTextBox txtIdDefinicionCuadro
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtIdDefinicionCuadro_Create($strControlId = null) {
            $this->txtIdDefinicionCuadro = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtIdDefinicionCuadro->Name = QApplication::Translate('IdDefinicionCuadro');
            $this->txtIdDefinicionCuadro->Text = $this->objDefinicionCuadro->IdDefinicionCuadro;
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
            $this->lblIdDefinicionCuadro->Text = $this->objDefinicionCuadro->IdDefinicionCuadro;
            $this->lblIdDefinicionCuadro->Required = true;
            $this->lblIdDefinicionCuadro->Format = $strFormat;
            return $this->lblIdDefinicionCuadro;
        }

        /**
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('Nombre');
            $this->txtNombre->Text = $this->objDefinicionCuadro->Nombre;
            $this->txtNombre->Required = true;
            
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
            $this->lblNombre->Text = $this->objDefinicionCuadro->Nombre;
            $this->lblNombre->Required = true;
            return $this->lblNombre;
        }

        /**
         * Create and setup QTextBox txtNumero
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNumero_Create($strControlId = null) {
            $this->txtNumero = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNumero->Name = QApplication::Translate('Numero');
            $this->txtNumero->Text = $this->objDefinicionCuadro->Numero;
            $this->txtNumero->Required = true;
            
            return $this->txtNumero;
        }

        /**
         * Create and setup QLabel lblNumero
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNumero_Create($strControlId = null) {
            $this->lblNumero = new QLabel($this->objParentObject, $strControlId);
            $this->lblNumero->Name = QApplication::Translate('Numero');
            $this->lblNumero->Text = $this->objDefinicionCuadro->Numero;
            $this->lblNumero->Required = true;
            return $this->lblNumero;
        }

        /**
         * Create and setup QIntegerTextBox txtCantidadFilasPrecargadas
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtCantidadFilasPrecargadas_Create($strControlId = null) {
            $this->txtCantidadFilasPrecargadas = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtCantidadFilasPrecargadas->Name = QApplication::Translate('CantidadFilasPrecargadas');
            $this->txtCantidadFilasPrecargadas->Text = $this->objDefinicionCuadro->CantidadFilasPrecargadas;
                        $this->txtCantidadFilasPrecargadas->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtCantidadFilasPrecargadas->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtCantidadFilasPrecargadas;
        }

        /**
         * Create and setup QLabel lblCantidadFilasPrecargadas
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblCantidadFilasPrecargadas_Create($strControlId = null, $strFormat = null) {
            $this->lblCantidadFilasPrecargadas = new QLabel($this->objParentObject, $strControlId);
            $this->lblCantidadFilasPrecargadas->Name = QApplication::Translate('CantidadFilasPrecargadas');
            $this->lblCantidadFilasPrecargadas->Text = $this->objDefinicionCuadro->CantidadFilasPrecargadas;
            $this->lblCantidadFilasPrecargadas->Format = $strFormat;
            return $this->lblCantidadFilasPrecargadas;
        }

        /**
         * Create and setup QIntegerTextBox txtOrden
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtOrden_Create($strControlId = null) {
            $this->txtOrden = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtOrden->Name = QApplication::Translate('Orden');
            $this->txtOrden->Text = $this->objDefinicionCuadro->Orden;
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
            $this->lblOrden->Text = $this->objDefinicionCuadro->Orden;
            $this->lblOrden->Format = $strFormat;
            return $this->lblOrden;
        }

        /**
         * Create and setup QTextBox txtTituloFilas
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTituloFilas_Create($strControlId = null) {
            $this->txtTituloFilas = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTituloFilas->Name = QApplication::Translate('TituloFilas');
            $this->txtTituloFilas->Text = $this->objDefinicionCuadro->TituloFilas;
            
            return $this->txtTituloFilas;
        }

        /**
         * Create and setup QLabel lblTituloFilas
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTituloFilas_Create($strControlId = null) {
            $this->lblTituloFilas = new QLabel($this->objParentObject, $strControlId);
            $this->lblTituloFilas->Name = QApplication::Translate('TituloFilas');
            $this->lblTituloFilas->Text = $this->objDefinicionCuadro->TituloFilas;
            return $this->lblTituloFilas;
        }

        /**
         * Create and setup QListBox lstCCriterioCompletitudObject
         * @param string $strControlId optional ControlId to use
         * @return QListBox
         */
        public function lstCCriterioCompletitudObject_Create($strControlId = null) {
            $this->lstCCriterioCompletitudObject = new QListBox($this->objParentObject, $strControlId);
            $this->lstCCriterioCompletitudObject->Name = QApplication::Translate('CCriterioCompletitudObject');
            $this->lstCCriterioCompletitudObject->Required = true;
            foreach (CriterioCompletitudType::$NameArray as $intId => $strValue)
                $this->lstCCriterioCompletitudObject->AddItem(new QListItem($strValue, $intId, $this->objDefinicionCuadro->CCriterioCompletitud == $intId));
                        return $this->lstCCriterioCompletitudObject;
        }

        /**
         * Create and setup QLabel lblCCriterioCompletitud
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCCriterioCompletitud_Create($strControlId = null) {
            $this->lblCCriterioCompletitud = new QLabel($this->objParentObject, $strControlId);
            $this->lblCCriterioCompletitud->Name = QApplication::Translate('CCriterioCompletitudObject');
            $this->lblCCriterioCompletitud->Text = ($this->objDefinicionCuadro->CCriterioCompletitud) ? CriterioCompletitudType::$NameArray[$this->objDefinicionCuadro->CCriterioCompletitud] : null;
            $this->lblCCriterioCompletitud->Required = true;
            return $this->lblCCriterioCompletitud;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdDefinicionMigracionObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdDefinicionMigracionObject_Create($strControlId = null) {
            $this->lstIdDefinicionMigracionObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'DefinicionMigracion', 'IdDefinicionMigracion' , $strControlId);
            if($this->objDefinicionCuadro->IdDefinicionMigracionObject){
                $this->lstIdDefinicionMigracionObject->Text = $this->objDefinicionCuadro->IdDefinicionMigracionObject->__toString();
                $this->lstIdDefinicionMigracionObject->Value = $this->objDefinicionCuadro->IdDefinicionMigracionObject->IdDefinicionMigracion;
            }
            $this->lstIdDefinicionMigracionObject->Name = QApplication::Translate('IdDefinicionMigracionObject');
            return $this->lstIdDefinicionMigracionObject;
        }

        /**
         * Create and setup QLabel lblIdDefinicionMigracion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdDefinicionMigracion_Create($strControlId = null) {
            $this->lblIdDefinicionMigracion = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdDefinicionMigracion->Name = QApplication::Translate('IdDefinicionMigracionObject');
            $this->lblIdDefinicionMigracion->Text = ($this->objDefinicionCuadro->IdDefinicionMigracionObject) ? $this->objDefinicionCuadro->IdDefinicionMigracionObject->__toString() : null;
            return $this->lblIdDefinicionMigracion;
        }

        /**
         * Create and setup QCheckBox chkObligatorio
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkObligatorio_Create($strControlId = null) {
            $this->chkObligatorio = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkObligatorio->Name = QApplication::Translate('Obligatorio');
            $this->chkObligatorio->Checked = $this->objDefinicionCuadro->Obligatorio;
                        return $this->chkObligatorio;
        }

        /**
         * Create and setup QLabel lblObligatorio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblObligatorio_Create($strControlId = null) {
            $this->lblObligatorio = new QLabel($this->objParentObject, $strControlId);
            $this->lblObligatorio->Name = QApplication::Translate('Obligatorio');
            $this->lblObligatorio->Text = ($this->objDefinicionCuadro->Obligatorio) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblObligatorio;
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
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDatosCuadro';
        $strConfigArray['strAddMethod'] = 'AddDatosCuadroAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDatosCuadroAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdDatosCapituloObject'] = QApplication::Translate('IdDatosCapituloObject');
        $strConfigArray['Columns']['CEstado'] = QApplication::Translate('CEstado');
        $strConfigArray['Columns']['IdUsuario'] = QApplication::Translate('IdUsuario');
        $strConfigArray['Columns']['FechaModificacion'] = QApplication::Translate('FechaModificacion');
        $strConfigArray['Columns']['Conflicto'] = QApplication::Translate('Conflicto');

        $this->lstDatosCuadroAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDatosCuadroAsId->Name = DatosCuadro::Noun();
        $this->lstDatosCuadroAsId->SetNewMethod($this, "lstDatosCuadroAsId_New");
        $this->lstDatosCuadroAsId->SetEditMethod($this, "lstDatosCuadroAsId_Edit");
        return $this->lstDatosCuadroAsId;
    }

    public function lstDatosCuadroAsId_New() {
        DatosCuadroModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DatosCuadroModalPanel::$strControlsArray, true);
        $this->lstDatosCuadroAsId->ModalPanel = new DatosCuadroModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDatosCuadroAsId->ModalPanel->objCallerControl = $this->lstDatosCuadroAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDatosCuadroAsId_Edit($intKey) {
        DatosCuadroModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DatosCuadroModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DatosCuadroAsIdArray[$intKey];
        $this->lstDatosCuadroAsId->ModalPanel = new DatosCuadroModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDatosCuadroAsId->ModalPanel->objCallerControl = $this->lstDatosCuadroAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstDefcuadroDefcolumnaAsId;
    /**
     * Gets all associated DefcuadroDefcolumnasAsId as an array of DefcuadroDefcolumna objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefcuadroDefcolumna[]
    */ 
    public function lstDefcuadroDefcolumnaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefcuadroDefcolumna';
        $strConfigArray['strRefreshMethod'] = 'DefcuadroDefcolumnaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDefcolumnaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDefcolumnaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Orden'] = QApplication::Translate('Orden');

        $this->lstDefcuadroDefcolumnaAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDefcuadroDefcolumnaAsId->Name = DefcuadroDefcolumna::Noun();
        $this->lstDefcuadroDefcolumnaAsId->SetNewMethod($this, "lstDefcuadroDefcolumnaAsId_New");
        $this->lstDefcuadroDefcolumnaAsId->SetEditMethod($this, "lstDefcuadroDefcolumnaAsId_Edit");
        return $this->lstDefcuadroDefcolumnaAsId;
    }

    public function lstDefcuadroDefcolumnaAsId_New() {
        DefcuadroDefcolumnaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefcolumnaModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDefcolumnaAsId->ModalPanel = new DefcuadroDefcolumnaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDefcolumnaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefcolumnaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDefcolumnaAsId_Edit($intKey) {
        DefcuadroDefcolumnaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefcolumnaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DefcuadroDefcolumnaAsIdArray[$intKey];
        $this->lstDefcuadroDefcolumnaAsId->ModalPanel = new DefcuadroDefcolumnaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDefcolumnaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefcolumnaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstDefcuadroDefcolumnaCodvalorAsId;
    /**
     * Gets all associated DefcuadroDefcolumnaCodvaloresAsId as an array of DefcuadroDefcolumnaCodvalor objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefcuadroDefcolumnaCodvalor[]
    */ 
    public function lstDefcuadroDefcolumnaCodvalorAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefcuadroDefcolumnaCodvalor';
        $strConfigArray['strRefreshMethod'] = 'DefcuadroDefcolumnaCodvalorAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefinicionColumna';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDefcolumnaCodvalorAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDefcolumnaCodvalorAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Orden'] = QApplication::Translate('Orden');

        $this->lstDefcuadroDefcolumnaCodvalorAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDefcuadroDefcolumnaCodvalorAsId->Name = DefcuadroDefcolumnaCodvalor::Noun();
        $this->lstDefcuadroDefcolumnaCodvalorAsId->SetNewMethod($this, "lstDefcuadroDefcolumnaCodvalorAsId_New");
        $this->lstDefcuadroDefcolumnaCodvalorAsId->SetEditMethod($this, "lstDefcuadroDefcolumnaCodvalorAsId_Edit");
        return $this->lstDefcuadroDefcolumnaCodvalorAsId;
    }

    public function lstDefcuadroDefcolumnaCodvalorAsId_New() {
        DefcuadroDefcolumnaCodvalorModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefcolumnaCodvalorModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDefcolumnaCodvalorAsId->ModalPanel = new DefcuadroDefcolumnaCodvalorModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDefcolumnaCodvalorAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefcolumnaCodvalorAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDefcolumnaCodvalorAsId_Edit($intKey) {
        DefcuadroDefcolumnaCodvalorModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefcolumnaCodvalorModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DefcuadroDefcolumnaCodvalorAsIdArray[$intKey];
        $this->lstDefcuadroDefcolumnaCodvalorAsId->ModalPanel = new DefcuadroDefcolumnaCodvalorModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDefcolumnaCodvalorAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefcolumnaCodvalorAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstDefcuadroDefconsistenciaAsId;
    /**
     * Gets all associated DefcuadroDefconsistenciasAsId as an array of DefcuadroDefconsistencia objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefcuadroDefconsistencia[]
    */ 
    public function lstDefcuadroDefconsistenciaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefcuadroDefconsistencia';
        $strConfigArray['strRefreshMethod'] = 'DefcuadroDefconsistenciaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefcuadroDefconsistencia';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDefconsistenciaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDefconsistenciaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdDefinicionConsistenciaObject'] = QApplication::Translate('IdDefinicionConsistenciaObject');

        $this->lstDefcuadroDefconsistenciaAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDefcuadroDefconsistenciaAsId->Name = DefcuadroDefconsistencia::Noun();
        $this->lstDefcuadroDefconsistenciaAsId->SetNewMethod($this, "lstDefcuadroDefconsistenciaAsId_New");
        $this->lstDefcuadroDefconsistenciaAsId->SetEditMethod($this, "lstDefcuadroDefconsistenciaAsId_Edit");
        return $this->lstDefcuadroDefconsistenciaAsId;
    }

    public function lstDefcuadroDefconsistenciaAsId_New() {
        DefcuadroDefconsistenciaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefconsistenciaModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDefconsistenciaAsId->ModalPanel = new DefcuadroDefconsistenciaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDefconsistenciaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefconsistenciaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDefconsistenciaAsId_Edit($intKey) {
        DefcuadroDefconsistenciaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefconsistenciaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DefcuadroDefconsistenciaAsIdArray[$intKey];
        $this->lstDefcuadroDefconsistenciaAsId->ModalPanel = new DefcuadroDefconsistenciaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDefconsistenciaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefconsistenciaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstDefcuadroDefconsistenciaDefcuadroAsId;
    /**
     * Gets all associated DefcuadroDefconsistenciaDefcuadrosAsId as an array of DefcuadroDefconsistenciaDefcuadro objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefcuadroDefconsistenciaDefcuadro[]
    */ 
    public function lstDefcuadroDefconsistenciaDefcuadroAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefcuadroDefconsistenciaDefcuadro';
        $strConfigArray['strRefreshMethod'] = 'DefcuadroDefconsistenciaDefcuadroAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefcuadroDefconsistenciaDefcuadro';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDefconsistenciaDefcuadroAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDefconsistenciaDefcuadroAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdDefcuadroDefconsistenciaObject'] = QApplication::Translate('IdDefcuadroDefconsistenciaObject');
        $strConfigArray['Columns']['Orden'] = QApplication::Translate('Orden');

        $this->lstDefcuadroDefconsistenciaDefcuadroAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->Name = DefcuadroDefconsistenciaDefcuadro::Noun();
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->SetNewMethod($this, "lstDefcuadroDefconsistenciaDefcuadroAsId_New");
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->SetEditMethod($this, "lstDefcuadroDefconsistenciaDefcuadroAsId_Edit");
        return $this->lstDefcuadroDefconsistenciaDefcuadroAsId;
    }

    public function lstDefcuadroDefconsistenciaDefcuadroAsId_New() {
        DefcuadroDefconsistenciaDefcuadroModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefconsistenciaDefcuadroModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->ModalPanel = new DefcuadroDefconsistenciaDefcuadroModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefconsistenciaDefcuadroAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDefconsistenciaDefcuadroAsId_Edit($intKey) {
        DefcuadroDefconsistenciaDefcuadroModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefconsistenciaDefcuadroModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DefcuadroDefconsistenciaDefcuadroAsIdArray[$intKey];
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->ModalPanel = new DefcuadroDefconsistenciaDefcuadroModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDefconsistenciaDefcuadroAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefconsistenciaDefcuadroAsId;
        $this->objParentObject->Modal->ShowDialogBox();
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
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefinicionFila';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDeffilaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDeffilaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Orden'] = QApplication::Translate('Orden');

        $this->lstDefcuadroDeffilaAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDefcuadroDeffilaAsId->Name = DefcuadroDeffila::Noun();
        $this->lstDefcuadroDeffilaAsId->SetNewMethod($this, "lstDefcuadroDeffilaAsId_New");
        $this->lstDefcuadroDeffilaAsId->SetEditMethod($this, "lstDefcuadroDeffilaAsId_Edit");
        return $this->lstDefcuadroDeffilaAsId;
    }

    public function lstDefcuadroDeffilaAsId_New() {
        DefcuadroDeffilaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDeffilaModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDeffilaAsId->ModalPanel = new DefcuadroDeffilaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDeffilaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDeffilaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDeffilaAsId_Edit($intKey) {
        DefcuadroDeffilaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDeffilaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DefcuadroDeffilaAsIdArray[$intKey];
        $this->lstDefcuadroDeffilaAsId->ModalPanel = new DefcuadroDeffilaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDeffilaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDeffilaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstDefcuadroDefpaginaAsId;
    /**
     * Gets all associated DefcuadroDefpaginasAsId as an array of DefcuadroDefpagina objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DefcuadroDefpagina[]
    */ 
    public function lstDefcuadroDefpaginaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'DefcuadroDefpagina';
        $strConfigArray['strRefreshMethod'] = 'DefcuadroDefpaginaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdDefinicionCuadro';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdDefinicionPagina';
        $strConfigArray['strAddMethod'] = 'AddDefcuadroDefpaginaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveDefcuadroDefpaginaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Orden'] = QApplication::Translate('Orden');

        $this->lstDefcuadroDefpaginaAsId = new QListPanel($this->objParentObject, $this->objDefinicionCuadro, $strConfigArray, $strControlId);
        $this->lstDefcuadroDefpaginaAsId->Name = DefcuadroDefpagina::Noun();
        $this->lstDefcuadroDefpaginaAsId->SetNewMethod($this, "lstDefcuadroDefpaginaAsId_New");
        $this->lstDefcuadroDefpaginaAsId->SetEditMethod($this, "lstDefcuadroDefpaginaAsId_Edit");
        return $this->lstDefcuadroDefpaginaAsId;
    }

    public function lstDefcuadroDefpaginaAsId_New() {
        DefcuadroDefpaginaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefpaginaModalPanel::$strControlsArray, true);
        $this->lstDefcuadroDefpaginaAsId->ModalPanel = new DefcuadroDefpaginaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstDefcuadroDefpaginaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefpaginaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstDefcuadroDefpaginaAsId_Edit($intKey) {
        DefcuadroDefpaginaModalPanel::$strControlsArray['lstIdDefinicionCuadroObject'] = false;
        $strControlsArray = array_keys(DefcuadroDefpaginaModalPanel::$strControlsArray, true);
        $obj = $this->objDefinicionCuadro->DefcuadroDefpaginaAsIdArray[$intKey];
        $this->lstDefcuadroDefpaginaAsId->ModalPanel = new DefcuadroDefpaginaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstDefcuadroDefpaginaAsId->ModalPanel->objCallerControl = $this->lstDefcuadroDefpaginaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local DefinicionCuadro object.
         * @param boolean $blnReload reload DefinicionCuadro from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objDefinicionCuadro->Reload();

            if ($this->txtIdDefinicionCuadro) $this->txtIdDefinicionCuadro->Text = $this->objDefinicionCuadro->IdDefinicionCuadro;
            if ($this->lblIdDefinicionCuadro) $this->lblIdDefinicionCuadro->Text = $this->objDefinicionCuadro->IdDefinicionCuadro;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objDefinicionCuadro->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objDefinicionCuadro->Nombre;

            if ($this->txtNumero) $this->txtNumero->Text = $this->objDefinicionCuadro->Numero;
            if ($this->lblNumero) $this->lblNumero->Text = $this->objDefinicionCuadro->Numero;

            if ($this->txtCantidadFilasPrecargadas) $this->txtCantidadFilasPrecargadas->Text = $this->objDefinicionCuadro->CantidadFilasPrecargadas;
            if ($this->lblCantidadFilasPrecargadas) $this->lblCantidadFilasPrecargadas->Text = $this->objDefinicionCuadro->CantidadFilasPrecargadas;

            if ($this->txtOrden) $this->txtOrden->Text = $this->objDefinicionCuadro->Orden;
            if ($this->lblOrden) $this->lblOrden->Text = $this->objDefinicionCuadro->Orden;

            if ($this->txtTituloFilas) $this->txtTituloFilas->Text = $this->objDefinicionCuadro->TituloFilas;
            if ($this->lblTituloFilas) $this->lblTituloFilas->Text = $this->objDefinicionCuadro->TituloFilas;

            if ($this->lstCCriterioCompletitudObject) $this->lstCCriterioCompletitudObject->SelectedValue = $this->objDefinicionCuadro->CCriterioCompletitud;
            if ($this->lblCCriterioCompletitud) $this->lblCCriterioCompletitud->Text = ($this->objDefinicionCuadro->CCriterioCompletitud) ? CriterioCompletitudType::$NameArray[$this->objDefinicionCuadro->CCriterioCompletitud] : null;

            if ($this->lstIdDefinicionMigracionObject) {
                if($this->objDefinicionCuadro->IdDefinicionMigracionObject){
                    $this->lstIdDefinicionMigracionObject->Text = $this->objDefinicionCuadro->IdDefinicionMigracionObject->__toString();
                    $this->lstIdDefinicionMigracionObject->Value = $this->objDefinicionCuadro->IdDefinicionMigracion->IdDefinicionMigracion;
                }                
            }
            if ($this->lblIdDefinicionMigracion) $this->lblIdDefinicionMigracion->Text = ($this->objDefinicionCuadro->IdDefinicionMigracionObject) ? $this->objDefinicionCuadro->IdDefinicionMigracionObject->__toString() : null;

            if ($this->chkObligatorio) $this->chkObligatorio->Checked = $this->objDefinicionCuadro->Obligatorio;
            if ($this->lblObligatorio) $this->lblObligatorio->Text = ($this->objDefinicionCuadro->Obligatorio) ? QApplication::Translate('Yes') : QApplication::Translate('No');

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC DEFINICIONCUADRO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtIdDefinicionCuadro) $this->objDefinicionCuadro->IdDefinicionCuadro = $this->txtIdDefinicionCuadro->Text;
                if ($this->txtNombre) $this->objDefinicionCuadro->Nombre = $this->txtNombre->Text;
                if ($this->txtNumero) $this->objDefinicionCuadro->Numero = $this->txtNumero->Text;
                if ($this->txtCantidadFilasPrecargadas) $this->objDefinicionCuadro->CantidadFilasPrecargadas = $this->txtCantidadFilasPrecargadas->Text;
                if ($this->txtOrden) $this->objDefinicionCuadro->Orden = $this->txtOrden->Text;
                if ($this->txtTituloFilas) $this->objDefinicionCuadro->TituloFilas = $this->txtTituloFilas->Text;
                if ($this->lstCCriterioCompletitudObject) $this->objDefinicionCuadro->CCriterioCompletitud = $this->lstCCriterioCompletitudObject->SelectedValue;
                if ($this->lstIdDefinicionMigracionObject) $this->objDefinicionCuadro->IdDefinicionMigracion = $this->lstIdDefinicionMigracionObject->SelectedValue;
                if ($this->chkObligatorio) $this->objDefinicionCuadro->Obligatorio = $this->chkObligatorio->Checked;


        }

        public function SaveDefinicionCuadro() {
            return $this->Save();
        }
        /**
         * This will save this object's DefinicionCuadro instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the DefinicionCuadro object
                $idReturn = $this->objDefinicionCuadro->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's DefinicionCuadro instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteDefinicionCuadro() {
            $this->objDefinicionCuadro->Delete();
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
                case 'DefinicionCuadro': return $this->objDefinicionCuadro;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to DefinicionCuadro fields -- will be created dynamically if not yet created
                case 'IdDefinicionCuadroControl':
                    if (!$this->txtIdDefinicionCuadro) return $this->txtIdDefinicionCuadro_Create();
                    return $this->txtIdDefinicionCuadro;
                case 'IdDefinicionCuadroLabel':
                    if (!$this->lblIdDefinicionCuadro) return $this->lblIdDefinicionCuadro_Create();
                    return $this->lblIdDefinicionCuadro;
                case 'NombreControl':
                    if (!$this->txtNombre) return $this->txtNombre_Create();
                    return $this->txtNombre;
                case 'NombreLabel':
                    if (!$this->lblNombre) return $this->lblNombre_Create();
                    return $this->lblNombre;
                case 'NumeroControl':
                    if (!$this->txtNumero) return $this->txtNumero_Create();
                    return $this->txtNumero;
                case 'NumeroLabel':
                    if (!$this->lblNumero) return $this->lblNumero_Create();
                    return $this->lblNumero;
                case 'CantidadFilasPrecargadasControl':
                    if (!$this->txtCantidadFilasPrecargadas) return $this->txtCantidadFilasPrecargadas_Create();
                    return $this->txtCantidadFilasPrecargadas;
                case 'CantidadFilasPrecargadasLabel':
                    if (!$this->lblCantidadFilasPrecargadas) return $this->lblCantidadFilasPrecargadas_Create();
                    return $this->lblCantidadFilasPrecargadas;
                case 'OrdenControl':
                    if (!$this->txtOrden) return $this->txtOrden_Create();
                    return $this->txtOrden;
                case 'OrdenLabel':
                    if (!$this->lblOrden) return $this->lblOrden_Create();
                    return $this->lblOrden;
                case 'TituloFilasControl':
                    if (!$this->txtTituloFilas) return $this->txtTituloFilas_Create();
                    return $this->txtTituloFilas;
                case 'TituloFilasLabel':
                    if (!$this->lblTituloFilas) return $this->lblTituloFilas_Create();
                    return $this->lblTituloFilas;
                case 'CCriterioCompletitudControl':
                    if (!$this->lstCCriterioCompletitudObject) return $this->lstCCriterioCompletitudObject_Create();
                    return $this->lstCCriterioCompletitudObject;
                case 'CCriterioCompletitudLabel':
                    if (!$this->lblCCriterioCompletitud) return $this->lblCCriterioCompletitud_Create();
                    return $this->lblCCriterioCompletitud;
                case 'IdDefinicionMigracionControl':
                    if (!$this->lstIdDefinicionMigracionObject) return $this->lstIdDefinicionMigracionObject_Create();
                    return $this->lstIdDefinicionMigracionObject;
                case 'IdDefinicionMigracionLabel':
                    if (!$this->lblIdDefinicionMigracion) return $this->lblIdDefinicionMigracion_Create();
                    return $this->lblIdDefinicionMigracion;
                case 'ObligatorioControl':
                    if (!$this->chkObligatorio) return $this->chkObligatorio_Create();
                    return $this->chkObligatorio;
                case 'ObligatorioLabel':
                    if (!$this->lblObligatorio) return $this->lblObligatorio_Create();
                    return $this->lblObligatorio;
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
                    // Controls that point to DefinicionCuadro fields
                    case 'IdDefinicionCuadroControl':
                        return ($this->txtIdDefinicionCuadro = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
                    case 'NumeroControl':
                        return ($this->txtNumero = QType::Cast($mixValue, 'QControl'));
                    case 'CantidadFilasPrecargadasControl':
                        return ($this->txtCantidadFilasPrecargadas = QType::Cast($mixValue, 'QControl'));
                    case 'OrdenControl':
                        return ($this->txtOrden = QType::Cast($mixValue, 'QControl'));
                    case 'TituloFilasControl':
                        return ($this->txtTituloFilas = QType::Cast($mixValue, 'QControl'));
                    case 'CCriterioCompletitudControl':
                        return ($this->lstCCriterioCompletitudObject = QType::Cast($mixValue, 'QControl'));
                    case 'IdDefinicionMigracionControl':
                        return ($this->lstIdDefinicionMigracionObject = QType::Cast($mixValue, 'QControl'));
                    case 'ObligatorioControl':
                        return ($this->chkObligatorio = QType::Cast($mixValue, 'QControl'));
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
