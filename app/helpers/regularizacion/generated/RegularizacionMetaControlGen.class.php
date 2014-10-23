<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Regularizacion class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Regularizacion object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a RegularizacionMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Regularizacion $Regularizacion the actual Regularizacion data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $ProcesoIniciadoControl
     * property-read QLabel $ProcesoIniciadoLabel
     * property QDateTimePicker $FechaInicioControl
     * property-read QLabel $FechaInicioLabel
     * property QCheckBox $TienePlanoControl
     * property-read QLabel $TienePlanoLabel
     * property QCheckBox $Circular10CatastroControl
     * property-read QLabel $Circular10CatastroLabel
     * property QListBox $AprobacionGeodesiaControl
     * property-read QLabel $AprobacionGeodesiaLabel
     * property QIntegerTextBox $RegistracionControl
     * property-read QLabel $RegistracionLabel
     * property QListBox $EstadoProcesoControl
     * property-read QLabel $EstadoProcesoLabel
     * property QListBox $AntecedentesAsIdFolioControl
     * property-read QLabel $AntecedentesAsIdFolioLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class RegularizacionMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Regularizacion
                */
        public $objRegularizacion;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Regularizacion's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkProcesoIniciado;
        protected $calFechaInicio;
        protected $chkTienePlano;
        protected $chkCircular10Catastro;
        protected $lstAprobacionGeodesiaObject;
        protected $txtRegistracion;
        protected $lstEstadoProcesoObject;

        // Controls that allow the viewing of Regularizacion's individual data fields
        protected $lblIdFolio;
        protected $lblProcesoIniciado;
        protected $lblFechaInicio;
        protected $lblTienePlano;
        protected $lblCircular10Catastro;
        protected $lblAprobacionGeodesia;
        protected $lblRegistracion;
        protected $lblEstadoProceso;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        protected $lstAntecedentesAsIdFolio;

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        protected $lblAntecedentesAsIdFolio;


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * RegularizacionMetaControl to edit a single Regularizacion object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Regularizacion object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this RegularizacionMetaControl
         * @param Regularizacion $objRegularizacion new or existing Regularizacion object
         */
         public function __construct($objParentObject, Regularizacion $objRegularizacion) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this RegularizacionMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Regularizacion object
            $this->objRegularizacion = $objRegularizacion;

            // Figure out if we're Editing or Creating New
            if ($this->objRegularizacion->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this RegularizacionMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Regularizacion object creation - defaults to CreateOrEdit
          * @return RegularizacionMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objRegularizacion = Regularizacion::Load($intId);

                // Regularizacion was found -- return it!
                if ($objRegularizacion)
                    return new RegularizacionMetaControl($objParentObject, $objRegularizacion);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Regularizacion object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new RegularizacionMetaControl($objParentObject, new Regularizacion());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this RegularizacionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Regularizacion object creation - defaults to CreateOrEdit
         * @return RegularizacionMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return RegularizacionMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this RegularizacionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Regularizacion object creation - defaults to CreateOrEdit
         * @return RegularizacionMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return RegularizacionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objRegularizacion->Id;
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
            if($this->objRegularizacion->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objRegularizacion->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objRegularizacion->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objRegularizacion->IdFolioObject) ? $this->objRegularizacion->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkProcesoIniciado
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkProcesoIniciado_Create($strControlId = null) {
            $this->chkProcesoIniciado = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkProcesoIniciado->Name = QApplication::Translate('ProcesoIniciado');
            $this->chkProcesoIniciado->Checked = $this->objRegularizacion->ProcesoIniciado;
                        return $this->chkProcesoIniciado;
        }

        /**
         * Create and setup QLabel lblProcesoIniciado
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblProcesoIniciado_Create($strControlId = null) {
            $this->lblProcesoIniciado = new QLabel($this->objParentObject, $strControlId);
            $this->lblProcesoIniciado->Name = QApplication::Translate('ProcesoIniciado');
            $this->lblProcesoIniciado->Text = ($this->objRegularizacion->ProcesoIniciado) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblProcesoIniciado;
        }

        /**
         * Create and setup QDateTimePicker calFechaInicio
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaInicio_Create($strControlId = null) {
            $this->calFechaInicio = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaInicio->Name = QApplication::Translate('FechaInicio');
            $this->calFechaInicio->DateTime = $this->objRegularizacion->FechaInicio;
            $this->calFechaInicio->DateTimePickerType = QDateTimePickerType::Date;
            
            return $this->calFechaInicio;
        }

        /**
         * Create and setup QLabel lblFechaInicio
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaInicio_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaInicio = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaInicio->Name = QApplication::Translate('FechaInicio');
            $this->strFechaInicioDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaInicio->Text = sprintf($this->objRegularizacion->FechaInicio) ? $this->objRegularizacion->FechaInicio->__toString($this->strFechaInicioDateTimeFormat) : null;
            return $this->lblFechaInicio;
        }

        protected $strFechaInicioDateTimeFormat;


        /**
         * Create and setup QCheckBox chkTienePlano
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkTienePlano_Create($strControlId = null) {
            $this->chkTienePlano = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkTienePlano->Name = QApplication::Translate('TienePlano');
            $this->chkTienePlano->Checked = $this->objRegularizacion->TienePlano;
                        return $this->chkTienePlano;
        }

        /**
         * Create and setup QLabel lblTienePlano
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTienePlano_Create($strControlId = null) {
            $this->lblTienePlano = new QLabel($this->objParentObject, $strControlId);
            $this->lblTienePlano->Name = QApplication::Translate('TienePlano');
            $this->lblTienePlano->Text = ($this->objRegularizacion->TienePlano) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblTienePlano;
        }

        /**
         * Create and setup QCheckBox chkCircular10Catastro
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkCircular10Catastro_Create($strControlId = null) {
            $this->chkCircular10Catastro = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkCircular10Catastro->Name = QApplication::Translate('Circular10Catastro');
            $this->chkCircular10Catastro->Checked = $this->objRegularizacion->Circular10Catastro;
                        return $this->chkCircular10Catastro;
        }

        /**
         * Create and setup QLabel lblCircular10Catastro
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCircular10Catastro_Create($strControlId = null) {
            $this->lblCircular10Catastro = new QLabel($this->objParentObject, $strControlId);
            $this->lblCircular10Catastro->Name = QApplication::Translate('Circular10Catastro');
            $this->lblCircular10Catastro->Text = ($this->objRegularizacion->Circular10Catastro) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblCircular10Catastro;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstAprobacionGeodesiaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstAprobacionGeodesiaObject_Create($strControlId = null) {
            $this->lstAprobacionGeodesiaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'AprobacionGeodesia', 'Id' , $strControlId);
            if($this->objRegularizacion->AprobacionGeodesiaObject){
                $this->lstAprobacionGeodesiaObject->Text = $this->objRegularizacion->AprobacionGeodesiaObject->__toString();
                $this->lstAprobacionGeodesiaObject->Value = $this->objRegularizacion->AprobacionGeodesiaObject->Id;
            }
            $this->lstAprobacionGeodesiaObject->Name = QApplication::Translate('AprobacionGeodesiaObject');
            return $this->lstAprobacionGeodesiaObject;
        }

        /**
         * Create and setup QLabel lblAprobacionGeodesia
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAprobacionGeodesia_Create($strControlId = null) {
            $this->lblAprobacionGeodesia = new QLabel($this->objParentObject, $strControlId);
            $this->lblAprobacionGeodesia->Name = QApplication::Translate('AprobacionGeodesiaObject');
            $this->lblAprobacionGeodesia->Text = ($this->objRegularizacion->AprobacionGeodesiaObject) ? $this->objRegularizacion->AprobacionGeodesiaObject->__toString() : null;
            return $this->lblAprobacionGeodesia;
        }

        /**
         * Create and setup QIntegerTextBox txtRegistracion
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtRegistracion_Create($strControlId = null) {
            $this->txtRegistracion = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtRegistracion->Name = QApplication::Translate('Registracion');
            $this->txtRegistracion->Text = $this->objRegularizacion->Registracion;
                        $this->txtRegistracion->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtRegistracion->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtRegistracion;
        }

        /**
         * Create and setup QLabel lblRegistracion
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblRegistracion_Create($strControlId = null, $strFormat = null) {
            $this->lblRegistracion = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegistracion->Name = QApplication::Translate('Registracion');
            $this->lblRegistracion->Text = $this->objRegularizacion->Registracion;
            $this->lblRegistracion->Format = $strFormat;
            return $this->lblRegistracion;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstEstadoProcesoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstEstadoProcesoObject_Create($strControlId = null) {
            $this->lstEstadoProcesoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'EstadoProceso', 'Id' , $strControlId);
            if($this->objRegularizacion->EstadoProcesoObject){
                $this->lstEstadoProcesoObject->Text = $this->objRegularizacion->EstadoProcesoObject->__toString();
                $this->lstEstadoProcesoObject->Value = $this->objRegularizacion->EstadoProcesoObject->Id;
            }
            $this->lstEstadoProcesoObject->Name = QApplication::Translate('EstadoProcesoObject');
            return $this->lstEstadoProcesoObject;
        }

        /**
         * Create and setup QLabel lblEstadoProceso
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEstadoProceso_Create($strControlId = null) {
            $this->lblEstadoProceso = new QLabel($this->objParentObject, $strControlId);
            $this->lblEstadoProceso->Name = QApplication::Translate('EstadoProcesoObject');
            $this->lblEstadoProceso->Text = ($this->objRegularizacion->EstadoProcesoObject) ? $this->objRegularizacion->EstadoProcesoObject->__toString() : null;
            return $this->lblEstadoProceso;
        }

        /**
         * Create and setup QListBox lstAntecedentesAsIdFolio ES ACA?
         * @param string $strControlId optional ControlId to use
         * @return QListBox
         */
        public function lstAntecedentesAsIdFolio_Create($strControlId = null) {
            $this->lstAntecedentesAsIdFolio = new QListBox($this->objParentObject, $strControlId);
            $this->lstAntecedentesAsIdFolio->Name = QApplication::Translate('AntecedentesAsIdFolio');
                $this->lstAntecedentesAsIdFolio->AddItem(QApplication::Translate('- Select One -'), null);
                $objAntecedentesArray = Antecedentes::LoadAll();
                if ($objAntecedentesArray) foreach ($objAntecedentesArray as $objAntecedentes) {
                    $objListItem = new QListItem($objAntecedentes->__toString(), $objAntecedentes->Id);
                    if ($objAntecedentes->IdFolio == $this->objRegularizacion->Id)
                        $objListItem->Selected = true;
                    $this->lstAntecedentesAsIdFolio->AddItem($objListItem);
                }
            return $this->lstAntecedentesAsIdFolio;
        }

        /**
         * Create and setup QLabel lblAntecedentesAsIdFolio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAntecedentesAsIdFolio_Create($strControlId = null) {
            $this->lblAntecedentesAsIdFolio = new QLabel($this->objParentObject, $strControlId);
            $this->lblAntecedentesAsIdFolio->Name = QApplication::Translate('AntecedentesAsIdFolio');
            $this->lblAntecedentesAsIdFolio->Text = ($this->objRegularizacion->AntecedentesAsIdFolio) ? $this->objRegularizacion->AntecedentesAsIdFolio->__toString() : null;
            return $this->lblAntecedentesAsIdFolio;
        }



    public $lstEncuadreLegalAsIdFolio;
    /**
     * Gets all associated EncuadreLegalesAsIdFolio as an array of EncuadreLegal objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return EncuadreLegal[]
    */ 
    public function lstEncuadreLegalAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'EncuadreLegal';
        $strConfigArray['strRefreshMethod'] = 'EncuadreLegalAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEncuadreLegalAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveEncuadreLegalAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Decreto222595'] = QApplication::Translate('Decreto222595');
        $strConfigArray['Columns']['Ley24374'] = QApplication::Translate('Ley24374');
        $strConfigArray['Columns']['Decreto81588'] = QApplication::Translate('Decreto81588');
        $strConfigArray['Columns']['Ley23073'] = QApplication::Translate('Ley23073');
        $strConfigArray['Columns']['Decreto468696'] = QApplication::Translate('Decreto468696');
        $strConfigArray['Columns']['Expropiacion'] = QApplication::Translate('Expropiacion');
        $strConfigArray['Columns']['Otros'] = QApplication::Translate('Otros');

        $this->lstEncuadreLegalAsIdFolio = new QListPanel($this->objParentObject, $this->objRegularizacion, $strConfigArray, $strControlId);
        $this->lstEncuadreLegalAsIdFolio->Name = EncuadreLegal::Noun();
        $this->lstEncuadreLegalAsIdFolio->SetNewMethod($this, "lstEncuadreLegalAsIdFolio_New");
        $this->lstEncuadreLegalAsIdFolio->SetEditMethod($this, "lstEncuadreLegalAsIdFolio_Edit");
        return $this->lstEncuadreLegalAsIdFolio;
    }

    public function lstEncuadreLegalAsIdFolio_New() {
        EncuadreLegalModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(EncuadreLegalModalPanel::$strControlsArray, true);
        $this->lstEncuadreLegalAsIdFolio->ModalPanel = new EncuadreLegalModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEncuadreLegalAsIdFolio->ModalPanel->objCallerControl = $this->lstEncuadreLegalAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEncuadreLegalAsIdFolio_Edit($intKey) {
        EncuadreLegalModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(EncuadreLegalModalPanel::$strControlsArray, true);
        $obj = $this->objRegularizacion->EncuadreLegalAsIdFolioArray[$intKey];
        $this->lstEncuadreLegalAsIdFolio->ModalPanel = new EncuadreLegalModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEncuadreLegalAsIdFolio->ModalPanel->objCallerControl = $this->lstEncuadreLegalAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstRegistracionAsIdFolio;
    /**
     * Gets all associated RegistracionesAsIdFolio as an array of Registracion objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Registracion[]
    */ 
    public function lstRegistracionAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Registracion';
        $strConfigArray['strRefreshMethod'] = 'RegistracionAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddRegistracionAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveRegistracionAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Legajo'] = QApplication::Translate('Legajo');
        $strConfigArray['Columns']['Folio'] = QApplication::Translate('Folio');
        $strConfigArray['Columns']['Fecha'] = QApplication::Translate('Fecha');

        $this->lstRegistracionAsIdFolio = new QListPanel($this->objParentObject, $this->objRegularizacion, $strConfigArray, $strControlId);
        $this->lstRegistracionAsIdFolio->Name = Registracion::Noun();
        $this->lstRegistracionAsIdFolio->SetNewMethod($this, "lstRegistracionAsIdFolio_New");
        $this->lstRegistracionAsIdFolio->SetEditMethod($this, "lstRegistracionAsIdFolio_Edit");
        return $this->lstRegistracionAsIdFolio;
    }

    public function lstRegistracionAsIdFolio_New() {
        RegistracionModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(RegistracionModalPanel::$strControlsArray, true);
        $this->lstRegistracionAsIdFolio->ModalPanel = new RegistracionModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstRegistracionAsIdFolio->ModalPanel->objCallerControl = $this->lstRegistracionAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstRegistracionAsIdFolio_Edit($intKey) {
        RegistracionModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(RegistracionModalPanel::$strControlsArray, true);
        $obj = $this->objRegularizacion->RegistracionAsIdFolioArray[$intKey];
        $this->lstRegistracionAsIdFolio->ModalPanel = new RegistracionModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstRegistracionAsIdFolio->ModalPanel->objCallerControl = $this->lstRegistracionAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Regularizacion object.
         * @param boolean $blnReload reload Regularizacion from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objRegularizacion->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objRegularizacion->Id;

            if ($this->lstIdFolioObject) {
                if($this->objRegularizacion->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objRegularizacion->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objRegularizacion->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objRegularizacion->IdFolioObject) ? $this->objRegularizacion->IdFolioObject->__toString() : null;

            if ($this->chkProcesoIniciado) $this->chkProcesoIniciado->Checked = $this->objRegularizacion->ProcesoIniciado;
            if ($this->lblProcesoIniciado) $this->lblProcesoIniciado->Text = ($this->objRegularizacion->ProcesoIniciado) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->calFechaInicio) $this->calFechaInicio->DateTime = $this->objRegularizacion->FechaInicio;
            if ($this->lblFechaInicio) $this->lblFechaInicio->Text = sprintf($this->objRegularizacion->FechaInicio) ? $this->objRegularizacion->FechaInicio->__toString($this->strFechaInicioDateTimeFormat) : null;

            if ($this->chkTienePlano) $this->chkTienePlano->Checked = $this->objRegularizacion->TienePlano;
            if ($this->lblTienePlano) $this->lblTienePlano->Text = ($this->objRegularizacion->TienePlano) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkCircular10Catastro) $this->chkCircular10Catastro->Checked = $this->objRegularizacion->Circular10Catastro;
            if ($this->lblCircular10Catastro) $this->lblCircular10Catastro->Text = ($this->objRegularizacion->Circular10Catastro) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->lstAprobacionGeodesiaObject) {
                if($this->objRegularizacion->AprobacionGeodesiaObject){
                    $this->lstAprobacionGeodesiaObject->Text = $this->objRegularizacion->AprobacionGeodesiaObject->__toString();
                    $this->lstAprobacionGeodesiaObject->Value = $this->objRegularizacion->AprobacionGeodesia->Id;
                }                
            }
            if ($this->lblAprobacionGeodesia) $this->lblAprobacionGeodesia->Text = ($this->objRegularizacion->AprobacionGeodesiaObject) ? $this->objRegularizacion->AprobacionGeodesiaObject->__toString() : null;

            if ($this->txtRegistracion) $this->txtRegistracion->Text = $this->objRegularizacion->Registracion;
            if ($this->lblRegistracion) $this->lblRegistracion->Text = $this->objRegularizacion->Registracion;

            if ($this->lstEstadoProcesoObject) {
                if($this->objRegularizacion->EstadoProcesoObject){
                    $this->lstEstadoProcesoObject->Text = $this->objRegularizacion->EstadoProcesoObject->__toString();
                    $this->lstEstadoProcesoObject->Value = $this->objRegularizacion->EstadoProceso->Id;
                }                
            }
            if ($this->lblEstadoProceso) $this->lblEstadoProceso->Text = ($this->objRegularizacion->EstadoProcesoObject) ? $this->objRegularizacion->EstadoProcesoObject->__toString() : null;

            if ($this->lstAntecedentesAsIdFolio) {
                $this->lstAntecedentesAsIdFolio->RemoveAllItems();
                $this->lstAntecedentesAsIdFolio->AddItem(QApplication::Translate('- Select One -'), null);
                $objAntecedentesArray = Antecedentes::LoadAll();
                if ($objAntecedentesArray) foreach ($objAntecedentesArray as $objAntecedentes) {
                    $objListItem = new QListItem($objAntecedentes->__toString(), $objAntecedentes->Id);
                    if ($objAntecedentes->IdFolio == $this->objRegularizacion->Id)
                        $objListItem->Selected = true;
                    $this->lstAntecedentesAsIdFolio->AddItem($objListItem);
                }
            }
            if ($this->lblAntecedentesAsIdFolio) $this->lblAntecedentesAsIdFolio->Text = ($this->objRegularizacion->AntecedentesAsIdFolio) ? $this->objRegularizacion->AntecedentesAsIdFolio->__toString() : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC REGULARIZACION OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objRegularizacion->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkProcesoIniciado) $this->objRegularizacion->ProcesoIniciado = $this->chkProcesoIniciado->Checked;
                if ($this->calFechaInicio) $this->objRegularizacion->FechaInicio = $this->calFechaInicio->DateTime;
                if ($this->chkTienePlano) $this->objRegularizacion->TienePlano = $this->chkTienePlano->Checked;
                if ($this->chkCircular10Catastro) $this->objRegularizacion->Circular10Catastro = $this->chkCircular10Catastro->Checked;
                if ($this->lstAprobacionGeodesiaObject) $this->objRegularizacion->AprobacionGeodesia = $this->lstAprobacionGeodesiaObject->SelectedValue;
                if ($this->txtRegistracion) $this->objRegularizacion->Registracion = $this->txtRegistracion->Text;
                if ($this->lstEstadoProcesoObject) $this->objRegularizacion->EstadoProceso = $this->lstEstadoProcesoObject->SelectedValue;


        }

        public function SaveRegularizacion() {
            return $this->Save();
        }
        /**
         * This will save this object's Regularizacion instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it
                if ($this->lstAntecedentesAsIdFolio) $this->objRegularizacion->AntecedentesAsIdFolio = Antecedentes::Load($this->lstAntecedentesAsIdFolio->SelectedValue);

                // Save the Regularizacion object
                $idReturn = $this->objRegularizacion->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Regularizacion instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteRegularizacion() {
            $this->objRegularizacion->Delete();
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
                case 'Regularizacion': return $this->objRegularizacion;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Regularizacion fields -- will be created dynamically if not yet created
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
                case 'ProcesoIniciadoControl':
                    if (!$this->chkProcesoIniciado) return $this->chkProcesoIniciado_Create();
                    return $this->chkProcesoIniciado;
                case 'ProcesoIniciadoLabel':
                    if (!$this->lblProcesoIniciado) return $this->lblProcesoIniciado_Create();
                    return $this->lblProcesoIniciado;
                case 'FechaInicioControl':
                    if (!$this->calFechaInicio) return $this->calFechaInicio_Create();
                    return $this->calFechaInicio;
                case 'FechaInicioLabel':
                    if (!$this->lblFechaInicio) return $this->lblFechaInicio_Create();
                    return $this->lblFechaInicio;
                case 'TienePlanoControl':
                    if (!$this->chkTienePlano) return $this->chkTienePlano_Create();
                    return $this->chkTienePlano;
                case 'TienePlanoLabel':
                    if (!$this->lblTienePlano) return $this->lblTienePlano_Create();
                    return $this->lblTienePlano;
                case 'Circular10CatastroControl':
                    if (!$this->chkCircular10Catastro) return $this->chkCircular10Catastro_Create();
                    return $this->chkCircular10Catastro;
                case 'Circular10CatastroLabel':
                    if (!$this->lblCircular10Catastro) return $this->lblCircular10Catastro_Create();
                    return $this->lblCircular10Catastro;
                case 'AprobacionGeodesiaControl':
                    if (!$this->lstAprobacionGeodesiaObject) return $this->lstAprobacionGeodesiaObject_Create();
                    return $this->lstAprobacionGeodesiaObject;
                case 'AprobacionGeodesiaLabel':
                    if (!$this->lblAprobacionGeodesia) return $this->lblAprobacionGeodesia_Create();
                    return $this->lblAprobacionGeodesia;
                case 'RegistracionControl':
                    if (!$this->txtRegistracion) return $this->txtRegistracion_Create();
                    return $this->txtRegistracion;
                case 'RegistracionLabel':
                    if (!$this->lblRegistracion) return $this->lblRegistracion_Create();
                    return $this->lblRegistracion;
                case 'EstadoProcesoControl':
                    if (!$this->lstEstadoProcesoObject) return $this->lstEstadoProcesoObject_Create();
                    return $this->lstEstadoProcesoObject;
                case 'EstadoProcesoLabel':
                    if (!$this->lblEstadoProceso) return $this->lblEstadoProceso_Create();
                    return $this->lblEstadoProceso;
                case 'AntecedentesAsIdFolioControl':
                    if (!$this->lstAntecedentesAsIdFolio) return $this->lstAntecedentesAsIdFolio_Create();
                    return $this->lstAntecedentesAsIdFolio;
                case 'AntecedentesAsIdFolioLabel':
                    if (!$this->lblAntecedentesAsIdFolio) return $this->lblAntecedentesAsIdFolio_Create();
                    return $this->lblAntecedentesAsIdFolio;
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
                    // Controls that point to Regularizacion fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'ProcesoIniciadoControl':
                        return ($this->chkProcesoIniciado = QType::Cast($mixValue, 'QControl'));
                    case 'FechaInicioControl':
                        return ($this->calFechaInicio = QType::Cast($mixValue, 'QControl'));
                    case 'TienePlanoControl':
                        return ($this->chkTienePlano = QType::Cast($mixValue, 'QControl'));
                    case 'Circular10CatastroControl':
                        return ($this->chkCircular10Catastro = QType::Cast($mixValue, 'QControl'));
                    case 'AprobacionGeodesiaControl':
                        return ($this->lstAprobacionGeodesiaObject = QType::Cast($mixValue, 'QControl'));
                    case 'RegistracionControl':
                        return ($this->txtRegistracion = QType::Cast($mixValue, 'QControl'));
                    case 'EstadoProcesoControl':
                        return ($this->lstEstadoProcesoObject = QType::Cast($mixValue, 'QControl'));
                    case 'AntecedentesAsIdFolioControl':
                        return ($this->lstAntecedentesAsIdFolio = QType::Cast($mixValue, 'QControl'));
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
