<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the UsoInterno class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single UsoInterno object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a UsoInternoMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read UsoInterno $UsoInterno the actual UsoInterno data class being edited
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QTextBox $InformeUrbanisticoFechaControl
     * property-read QLabel $InformeUrbanisticoFechaLabel
     * property QCheckBox $MapeoPreliminarControl
     * property-read QLabel $MapeoPreliminarLabel
     * property QCheckBox $NoCorrespondeInscripcionControl
     * property-read QLabel $NoCorrespondeInscripcionLabel
     * property QTextBox $ResolucionInscripcionProvisoriaControl
     * property-read QLabel $ResolucionInscripcionProvisoriaLabel
     * property QTextBox $ResolucionInscripcionDefinitivaControl
     * property-read QLabel $ResolucionInscripcionDefinitivaLabel
     * property QDateTimePicker $RegularizacionFechaInicioControl
     * property-read QLabel $RegularizacionFechaInicioLabel
     * property QCheckBox $RegularizacionTienePlanoControl
     * property-read QLabel $RegularizacionTienePlanoLabel
     * property QCheckBox $RegularizacionCircular10CatastroControl
     * property-read QLabel $RegularizacionCircular10CatastroLabel
     * property QIntegerTextBox $RegularizacionEstadoProcesoControl
     * property-read QLabel $RegularizacionEstadoProcesoLabel
     * property QTextBox $NumExpedienteControl
     * property-read QLabel $NumExpedienteLabel
     * property QTextBox $RegistracionLegajoControl
     * property-read QLabel $RegistracionLegajoLabel
     * property QTextBox $RegistracionFechaControl
     * property-read QLabel $RegistracionFechaLabel
     * property QTextBox $RegistracionFolioControl
     * property-read QLabel $RegistracionFolioLabel
     * property QTextBox $GeodesiaNumControl
     * property-read QLabel $GeodesiaNumLabel
     * property QTextBox $GeodesiaAnioControl
     * property-read QLabel $GeodesiaAnioLabel
     * property QCheckBox $Ley14449Control
     * property-read QLabel $Ley14449Label
     * property QCheckBox $TieneCensoControl
     * property-read QLabel $TieneCensoLabel
     * property QTextBox $FechaCensoControl
     * property-read QLabel $FechaCensoLabel
     * property QTextBox $GeodesiaPartidoControl
     * property-read QLabel $GeodesiaPartidoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class UsoInternoMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var UsoInterno
                */
        public $objUsoInterno;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of UsoInterno's individual data fields
        protected $lstIdFolioObject;
        protected $txtInformeUrbanisticoFecha;
        protected $chkMapeoPreliminar;
        protected $chkNoCorrespondeInscripcion;
        protected $txtResolucionInscripcionProvisoria;
        protected $txtResolucionInscripcionDefinitiva;
        protected $calRegularizacionFechaInicio;
        protected $chkRegularizacionTienePlano;
        protected $chkRegularizacionCircular10Catastro;
        protected $txtRegularizacionEstadoProceso;
        protected $txtNumExpediente;
        protected $txtRegistracionLegajo;
        protected $txtRegistracionFecha;
        protected $txtRegistracionFolio;
        protected $txtGeodesiaNum;
        protected $txtGeodesiaAnio;
        protected $chkLey14449;
        protected $chkTieneCenso;
        protected $txtFechaCenso;
        protected $txtGeodesiaPartido;

        // Controls that allow the viewing of UsoInterno's individual data fields
        protected $lblIdFolio;
        protected $lblInformeUrbanisticoFecha;
        protected $lblMapeoPreliminar;
        protected $lblNoCorrespondeInscripcion;
        protected $lblResolucionInscripcionProvisoria;
        protected $lblResolucionInscripcionDefinitiva;
        protected $lblRegularizacionFechaInicio;
        protected $lblRegularizacionTienePlano;
        protected $lblRegularizacionCircular10Catastro;
        protected $lblRegularizacionEstadoProceso;
        protected $lblNumExpediente;
        protected $lblRegistracionLegajo;
        protected $lblRegistracionFecha;
        protected $lblRegistracionFolio;
        protected $lblGeodesiaNum;
        protected $lblGeodesiaAnio;
        protected $lblLey14449;
        protected $lblTieneCenso;
        protected $lblFechaCenso;
        protected $lblGeodesiaPartido;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * UsoInternoMetaControl to edit a single UsoInterno object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single UsoInterno object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this UsoInternoMetaControl
         * @param UsoInterno $objUsoInterno new or existing UsoInterno object
         */
         public function __construct($objParentObject, UsoInterno $objUsoInterno) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this UsoInternoMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked UsoInterno object
            $this->objUsoInterno = $objUsoInterno;

            // Figure out if we're Editing or Creating New
            if ($this->objUsoInterno->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this UsoInternoMetaControl
         * @param integer $intIdFolio primary key value
         * @param QMetaControlCreateType $intCreateType rules governing UsoInterno object creation - defaults to CreateOrEdit
          * @return UsoInternoMetaControl
         */
        public static function Create($objParentObject, $intIdFolio = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdFolio)) {
                $objUsoInterno = UsoInterno::Load($intIdFolio);

                // UsoInterno was found -- return it!
                if ($objUsoInterno)
                    return new UsoInternoMetaControl($objParentObject, $objUsoInterno);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a UsoInterno object with PK arguments: ' . $intIdFolio);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new UsoInternoMetaControl($objParentObject, new UsoInterno());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this UsoInternoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing UsoInterno object creation - defaults to CreateOrEdit
         * @return UsoInternoMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdFolio = QApplication::PathInfo(0);
            return UsoInternoMetaControl::Create($objParentObject, $intIdFolio, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this UsoInternoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing UsoInterno object creation - defaults to CreateOrEdit
         * @return UsoInternoMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdFolio = QApplication::QueryString('id');
            return UsoInternoMetaControl::Create($objParentObject, $intIdFolio, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdFolioObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdFolioObject_Create($strControlId = null) {
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Folio', 'Id' , $strControlId);
            if($this->objUsoInterno->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objUsoInterno->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objUsoInterno->IdFolioObject->Id;
            }
            $this->lstIdFolioObject->Name = QApplication::Translate('IdFolioObject');
            $this->lstIdFolioObject->Required = true;
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
            $this->lblIdFolio->Text = ($this->objUsoInterno->IdFolioObject) ? $this->objUsoInterno->IdFolioObject->__toString() : null;
            $this->lblIdFolio->Required = true;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QTextBox txtInformeUrbanisticoFecha
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtInformeUrbanisticoFecha_Create($strControlId = null) {
            $this->txtInformeUrbanisticoFecha = new QTextBox($this->objParentObject, $strControlId);
            $this->txtInformeUrbanisticoFecha->Name = QApplication::Translate('InformeUrbanisticoFecha');
            $this->txtInformeUrbanisticoFecha->Text = $this->objUsoInterno->InformeUrbanisticoFecha;
            $this->txtInformeUrbanisticoFecha->MaxLength = UsoInterno::InformeUrbanisticoFechaMaxLength;
            
            return $this->txtInformeUrbanisticoFecha;
        }

        /**
         * Create and setup QLabel lblInformeUrbanisticoFecha
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblInformeUrbanisticoFecha_Create($strControlId = null) {
            $this->lblInformeUrbanisticoFecha = new QLabel($this->objParentObject, $strControlId);
            $this->lblInformeUrbanisticoFecha->Name = QApplication::Translate('InformeUrbanisticoFecha');
            $this->lblInformeUrbanisticoFecha->Text = $this->objUsoInterno->InformeUrbanisticoFecha;
            return $this->lblInformeUrbanisticoFecha;
        }

        /**
         * Create and setup QCheckBox chkMapeoPreliminar
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkMapeoPreliminar_Create($strControlId = null) {
            $this->chkMapeoPreliminar = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkMapeoPreliminar->Name = QApplication::Translate('MapeoPreliminar');
            $this->chkMapeoPreliminar->Checked = $this->objUsoInterno->MapeoPreliminar;
                        return $this->chkMapeoPreliminar;
        }

        /**
         * Create and setup QLabel lblMapeoPreliminar
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMapeoPreliminar_Create($strControlId = null) {
            $this->lblMapeoPreliminar = new QLabel($this->objParentObject, $strControlId);
            $this->lblMapeoPreliminar->Name = QApplication::Translate('MapeoPreliminar');
            $this->lblMapeoPreliminar->Text = ($this->objUsoInterno->MapeoPreliminar) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblMapeoPreliminar;
        }

        /**
         * Create and setup QCheckBox chkNoCorrespondeInscripcion
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkNoCorrespondeInscripcion_Create($strControlId = null) {
            $this->chkNoCorrespondeInscripcion = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkNoCorrespondeInscripcion->Name = QApplication::Translate('NoCorrespondeInscripcion');
            $this->chkNoCorrespondeInscripcion->Checked = $this->objUsoInterno->NoCorrespondeInscripcion;
                        return $this->chkNoCorrespondeInscripcion;
        }

        /**
         * Create and setup QLabel lblNoCorrespondeInscripcion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNoCorrespondeInscripcion_Create($strControlId = null) {
            $this->lblNoCorrespondeInscripcion = new QLabel($this->objParentObject, $strControlId);
            $this->lblNoCorrespondeInscripcion->Name = QApplication::Translate('NoCorrespondeInscripcion');
            $this->lblNoCorrespondeInscripcion->Text = ($this->objUsoInterno->NoCorrespondeInscripcion) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblNoCorrespondeInscripcion;
        }

        /**
         * Create and setup QTextBox txtResolucionInscripcionProvisoria
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtResolucionInscripcionProvisoria_Create($strControlId = null) {
            $this->txtResolucionInscripcionProvisoria = new QTextBox($this->objParentObject, $strControlId);
            $this->txtResolucionInscripcionProvisoria->Name = QApplication::Translate('ResolucionInscripcionProvisoria');
            $this->txtResolucionInscripcionProvisoria->Text = $this->objUsoInterno->ResolucionInscripcionProvisoria;
            $this->txtResolucionInscripcionProvisoria->MaxLength = UsoInterno::ResolucionInscripcionProvisoriaMaxLength;
            
            return $this->txtResolucionInscripcionProvisoria;
        }

        /**
         * Create and setup QLabel lblResolucionInscripcionProvisoria
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblResolucionInscripcionProvisoria_Create($strControlId = null) {
            $this->lblResolucionInscripcionProvisoria = new QLabel($this->objParentObject, $strControlId);
            $this->lblResolucionInscripcionProvisoria->Name = QApplication::Translate('ResolucionInscripcionProvisoria');
            $this->lblResolucionInscripcionProvisoria->Text = $this->objUsoInterno->ResolucionInscripcionProvisoria;
            return $this->lblResolucionInscripcionProvisoria;
        }

        /**
         * Create and setup QTextBox txtResolucionInscripcionDefinitiva
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtResolucionInscripcionDefinitiva_Create($strControlId = null) {
            $this->txtResolucionInscripcionDefinitiva = new QTextBox($this->objParentObject, $strControlId);
            $this->txtResolucionInscripcionDefinitiva->Name = QApplication::Translate('ResolucionInscripcionDefinitiva');
            $this->txtResolucionInscripcionDefinitiva->Text = $this->objUsoInterno->ResolucionInscripcionDefinitiva;
            $this->txtResolucionInscripcionDefinitiva->MaxLength = UsoInterno::ResolucionInscripcionDefinitivaMaxLength;
            
            return $this->txtResolucionInscripcionDefinitiva;
        }

        /**
         * Create and setup QLabel lblResolucionInscripcionDefinitiva
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblResolucionInscripcionDefinitiva_Create($strControlId = null) {
            $this->lblResolucionInscripcionDefinitiva = new QLabel($this->objParentObject, $strControlId);
            $this->lblResolucionInscripcionDefinitiva->Name = QApplication::Translate('ResolucionInscripcionDefinitiva');
            $this->lblResolucionInscripcionDefinitiva->Text = $this->objUsoInterno->ResolucionInscripcionDefinitiva;
            return $this->lblResolucionInscripcionDefinitiva;
        }

        /**
         * Create and setup QDateTimePicker calRegularizacionFechaInicio
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calRegularizacionFechaInicio_Create($strControlId = null) {
            $this->calRegularizacionFechaInicio = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calRegularizacionFechaInicio->Name = QApplication::Translate('RegularizacionFechaInicio');
            $this->calRegularizacionFechaInicio->DateTime = $this->objUsoInterno->RegularizacionFechaInicio;
            $this->calRegularizacionFechaInicio->DateTimePickerType = QDateTimePickerType::Date;
            
            return $this->calRegularizacionFechaInicio;
        }

        /**
         * Create and setup QLabel lblRegularizacionFechaInicio
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblRegularizacionFechaInicio_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblRegularizacionFechaInicio = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegularizacionFechaInicio->Name = QApplication::Translate('RegularizacionFechaInicio');
            $this->strRegularizacionFechaInicioDateTimeFormat = $strDateTimeFormat;
            $this->lblRegularizacionFechaInicio->Text = sprintf($this->objUsoInterno->RegularizacionFechaInicio) ? $this->objUsoInterno->RegularizacionFechaInicio->__toString($this->strRegularizacionFechaInicioDateTimeFormat) : null;
            return $this->lblRegularizacionFechaInicio;
        }

        protected $strRegularizacionFechaInicioDateTimeFormat;


        /**
         * Create and setup QCheckBox chkRegularizacionTienePlano
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkRegularizacionTienePlano_Create($strControlId = null) {
            $this->chkRegularizacionTienePlano = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkRegularizacionTienePlano->Name = QApplication::Translate('RegularizacionTienePlano');
            $this->chkRegularizacionTienePlano->Checked = $this->objUsoInterno->RegularizacionTienePlano;
                        return $this->chkRegularizacionTienePlano;
        }

        /**
         * Create and setup QLabel lblRegularizacionTienePlano
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRegularizacionTienePlano_Create($strControlId = null) {
            $this->lblRegularizacionTienePlano = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegularizacionTienePlano->Name = QApplication::Translate('RegularizacionTienePlano');
            $this->lblRegularizacionTienePlano->Text = ($this->objUsoInterno->RegularizacionTienePlano) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblRegularizacionTienePlano;
        }

        /**
         * Create and setup QCheckBox chkRegularizacionCircular10Catastro
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkRegularizacionCircular10Catastro_Create($strControlId = null) {
            $this->chkRegularizacionCircular10Catastro = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkRegularizacionCircular10Catastro->Name = QApplication::Translate('RegularizacionCircular10Catastro');
            $this->chkRegularizacionCircular10Catastro->Checked = $this->objUsoInterno->RegularizacionCircular10Catastro;
                        return $this->chkRegularizacionCircular10Catastro;
        }

        /**
         * Create and setup QLabel lblRegularizacionCircular10Catastro
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRegularizacionCircular10Catastro_Create($strControlId = null) {
            $this->lblRegularizacionCircular10Catastro = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegularizacionCircular10Catastro->Name = QApplication::Translate('RegularizacionCircular10Catastro');
            $this->lblRegularizacionCircular10Catastro->Text = ($this->objUsoInterno->RegularizacionCircular10Catastro) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblRegularizacionCircular10Catastro;
        }

        /**
         * Create and setup QIntegerTextBox txtRegularizacionEstadoProceso
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtRegularizacionEstadoProceso_Create($strControlId = null) {
            $this->txtRegularizacionEstadoProceso = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtRegularizacionEstadoProceso->Name = QApplication::Translate('RegularizacionEstadoProceso');
            $this->txtRegularizacionEstadoProceso->Text = $this->objUsoInterno->RegularizacionEstadoProceso;
                        $this->txtRegularizacionEstadoProceso->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtRegularizacionEstadoProceso->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtRegularizacionEstadoProceso;
        }

        /**
         * Create and setup QLabel lblRegularizacionEstadoProceso
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblRegularizacionEstadoProceso_Create($strControlId = null, $strFormat = null) {
            $this->lblRegularizacionEstadoProceso = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegularizacionEstadoProceso->Name = QApplication::Translate('RegularizacionEstadoProceso');
            $this->lblRegularizacionEstadoProceso->Text = $this->objUsoInterno->RegularizacionEstadoProceso;
            $this->lblRegularizacionEstadoProceso->Format = $strFormat;
            return $this->lblRegularizacionEstadoProceso;
        }

        /**
         * Create and setup QTextBox txtNumExpediente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNumExpediente_Create($strControlId = null) {
            $this->txtNumExpediente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNumExpediente->Name = QApplication::Translate('NumExpediente');
            $this->txtNumExpediente->Text = $this->objUsoInterno->NumExpediente;
            
            return $this->txtNumExpediente;
        }

        /**
         * Create and setup QLabel lblNumExpediente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNumExpediente_Create($strControlId = null) {
            $this->lblNumExpediente = new QLabel($this->objParentObject, $strControlId);
            $this->lblNumExpediente->Name = QApplication::Translate('NumExpediente');
            $this->lblNumExpediente->Text = $this->objUsoInterno->NumExpediente;
            return $this->lblNumExpediente;
        }

        /**
         * Create and setup QTextBox txtRegistracionLegajo
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtRegistracionLegajo_Create($strControlId = null) {
            $this->txtRegistracionLegajo = new QTextBox($this->objParentObject, $strControlId);
            $this->txtRegistracionLegajo->Name = QApplication::Translate('RegistracionLegajo');
            $this->txtRegistracionLegajo->Text = $this->objUsoInterno->RegistracionLegajo;
            
            return $this->txtRegistracionLegajo;
        }

        /**
         * Create and setup QLabel lblRegistracionLegajo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRegistracionLegajo_Create($strControlId = null) {
            $this->lblRegistracionLegajo = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegistracionLegajo->Name = QApplication::Translate('RegistracionLegajo');
            $this->lblRegistracionLegajo->Text = $this->objUsoInterno->RegistracionLegajo;
            return $this->lblRegistracionLegajo;
        }

        /**
         * Create and setup QTextBox txtRegistracionFecha
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtRegistracionFecha_Create($strControlId = null) {
            $this->txtRegistracionFecha = new QTextBox($this->objParentObject, $strControlId);
            $this->txtRegistracionFecha->Name = QApplication::Translate('RegistracionFecha');
            $this->txtRegistracionFecha->Text = $this->objUsoInterno->RegistracionFecha;
            
            return $this->txtRegistracionFecha;
        }

        /**
         * Create and setup QLabel lblRegistracionFecha
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRegistracionFecha_Create($strControlId = null) {
            $this->lblRegistracionFecha = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegistracionFecha->Name = QApplication::Translate('RegistracionFecha');
            $this->lblRegistracionFecha->Text = $this->objUsoInterno->RegistracionFecha;
            return $this->lblRegistracionFecha;
        }

        /**
         * Create and setup QTextBox txtRegistracionFolio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtRegistracionFolio_Create($strControlId = null) {
            $this->txtRegistracionFolio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtRegistracionFolio->Name = QApplication::Translate('RegistracionFolio');
            $this->txtRegistracionFolio->Text = $this->objUsoInterno->RegistracionFolio;
            
            return $this->txtRegistracionFolio;
        }

        /**
         * Create and setup QLabel lblRegistracionFolio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRegistracionFolio_Create($strControlId = null) {
            $this->lblRegistracionFolio = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegistracionFolio->Name = QApplication::Translate('RegistracionFolio');
            $this->lblRegistracionFolio->Text = $this->objUsoInterno->RegistracionFolio;
            return $this->lblRegistracionFolio;
        }

        /**
         * Create and setup QTextBox txtGeodesiaNum
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtGeodesiaNum_Create($strControlId = null) {
            $this->txtGeodesiaNum = new QTextBox($this->objParentObject, $strControlId);
            $this->txtGeodesiaNum->Name = QApplication::Translate('GeodesiaNum');
            $this->txtGeodesiaNum->Text = $this->objUsoInterno->GeodesiaNum;
            
            return $this->txtGeodesiaNum;
        }

        /**
         * Create and setup QLabel lblGeodesiaNum
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblGeodesiaNum_Create($strControlId = null) {
            $this->lblGeodesiaNum = new QLabel($this->objParentObject, $strControlId);
            $this->lblGeodesiaNum->Name = QApplication::Translate('GeodesiaNum');
            $this->lblGeodesiaNum->Text = $this->objUsoInterno->GeodesiaNum;
            return $this->lblGeodesiaNum;
        }

        /**
         * Create and setup QTextBox txtGeodesiaAnio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtGeodesiaAnio_Create($strControlId = null) {
            $this->txtGeodesiaAnio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtGeodesiaAnio->Name = QApplication::Translate('GeodesiaAnio');
            $this->txtGeodesiaAnio->Text = $this->objUsoInterno->GeodesiaAnio;
            
            return $this->txtGeodesiaAnio;
        }

        /**
         * Create and setup QLabel lblGeodesiaAnio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblGeodesiaAnio_Create($strControlId = null) {
            $this->lblGeodesiaAnio = new QLabel($this->objParentObject, $strControlId);
            $this->lblGeodesiaAnio->Name = QApplication::Translate('GeodesiaAnio');
            $this->lblGeodesiaAnio->Text = $this->objUsoInterno->GeodesiaAnio;
            return $this->lblGeodesiaAnio;
        }

        /**
         * Create and setup QCheckBox chkLey14449
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkLey14449_Create($strControlId = null) {
            $this->chkLey14449 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkLey14449->Name = QApplication::Translate('Ley14449');
            $this->chkLey14449->Checked = $this->objUsoInterno->Ley14449;
                        return $this->chkLey14449;
        }

        /**
         * Create and setup QLabel lblLey14449
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblLey14449_Create($strControlId = null) {
            $this->lblLey14449 = new QLabel($this->objParentObject, $strControlId);
            $this->lblLey14449->Name = QApplication::Translate('Ley14449');
            $this->lblLey14449->Text = ($this->objUsoInterno->Ley14449) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblLey14449;
        }

        /**
         * Create and setup QCheckBox chkTieneCenso
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkTieneCenso_Create($strControlId = null) {
            $this->chkTieneCenso = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkTieneCenso->Name = QApplication::Translate('TieneCenso');
            $this->chkTieneCenso->Checked = $this->objUsoInterno->TieneCenso;
                        return $this->chkTieneCenso;
        }

        /**
         * Create and setup QLabel lblTieneCenso
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTieneCenso_Create($strControlId = null) {
            $this->lblTieneCenso = new QLabel($this->objParentObject, $strControlId);
            $this->lblTieneCenso->Name = QApplication::Translate('TieneCenso');
            $this->lblTieneCenso->Text = ($this->objUsoInterno->TieneCenso) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblTieneCenso;
        }

        /**
         * Create and setup QTextBox txtFechaCenso
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFechaCenso_Create($strControlId = null) {
            $this->txtFechaCenso = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFechaCenso->Name = QApplication::Translate('FechaCenso');
            $this->txtFechaCenso->Text = $this->objUsoInterno->FechaCenso;
            
            return $this->txtFechaCenso;
        }

        /**
         * Create and setup QLabel lblFechaCenso
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFechaCenso_Create($strControlId = null) {
            $this->lblFechaCenso = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaCenso->Name = QApplication::Translate('FechaCenso');
            $this->lblFechaCenso->Text = $this->objUsoInterno->FechaCenso;
            return $this->lblFechaCenso;
        }

        /**
         * Create and setup QTextBox txtGeodesiaPartido
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtGeodesiaPartido_Create($strControlId = null) {
            $this->txtGeodesiaPartido = new QTextBox($this->objParentObject, $strControlId);
            $this->txtGeodesiaPartido->Name = QApplication::Translate('GeodesiaPartido');
            $this->txtGeodesiaPartido->Text = $this->objUsoInterno->GeodesiaPartido;
            $this->txtGeodesiaPartido->MaxLength = UsoInterno::GeodesiaPartidoMaxLength;
            
            return $this->txtGeodesiaPartido;
        }

        /**
         * Create and setup QLabel lblGeodesiaPartido
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblGeodesiaPartido_Create($strControlId = null) {
            $this->lblGeodesiaPartido = new QLabel($this->objParentObject, $strControlId);
            $this->lblGeodesiaPartido->Name = QApplication::Translate('GeodesiaPartido');
            $this->lblGeodesiaPartido->Text = $this->objUsoInterno->GeodesiaPartido;
            return $this->lblGeodesiaPartido;
        }





        /**
         * Refresh this MetaControl with Data from the local UsoInterno object.
         * @param boolean $blnReload reload UsoInterno from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objUsoInterno->Reload();

            if ($this->lstIdFolioObject) {
                if($this->objUsoInterno->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objUsoInterno->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objUsoInterno->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objUsoInterno->IdFolioObject) ? $this->objUsoInterno->IdFolioObject->__toString() : null;

            if ($this->txtInformeUrbanisticoFecha) $this->txtInformeUrbanisticoFecha->Text = $this->objUsoInterno->InformeUrbanisticoFecha;
            if ($this->lblInformeUrbanisticoFecha) $this->lblInformeUrbanisticoFecha->Text = $this->objUsoInterno->InformeUrbanisticoFecha;

            if ($this->chkMapeoPreliminar) $this->chkMapeoPreliminar->Checked = $this->objUsoInterno->MapeoPreliminar;
            if ($this->lblMapeoPreliminar) $this->lblMapeoPreliminar->Text = ($this->objUsoInterno->MapeoPreliminar) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkNoCorrespondeInscripcion) $this->chkNoCorrespondeInscripcion->Checked = $this->objUsoInterno->NoCorrespondeInscripcion;
            if ($this->lblNoCorrespondeInscripcion) $this->lblNoCorrespondeInscripcion->Text = ($this->objUsoInterno->NoCorrespondeInscripcion) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtResolucionInscripcionProvisoria) $this->txtResolucionInscripcionProvisoria->Text = $this->objUsoInterno->ResolucionInscripcionProvisoria;
            if ($this->lblResolucionInscripcionProvisoria) $this->lblResolucionInscripcionProvisoria->Text = $this->objUsoInterno->ResolucionInscripcionProvisoria;

            if ($this->txtResolucionInscripcionDefinitiva) $this->txtResolucionInscripcionDefinitiva->Text = $this->objUsoInterno->ResolucionInscripcionDefinitiva;
            if ($this->lblResolucionInscripcionDefinitiva) $this->lblResolucionInscripcionDefinitiva->Text = $this->objUsoInterno->ResolucionInscripcionDefinitiva;

            if ($this->calRegularizacionFechaInicio) $this->calRegularizacionFechaInicio->DateTime = $this->objUsoInterno->RegularizacionFechaInicio;
            if ($this->lblRegularizacionFechaInicio) $this->lblRegularizacionFechaInicio->Text = sprintf($this->objUsoInterno->RegularizacionFechaInicio) ? $this->objUsoInterno->RegularizacionFechaInicio->__toString($this->strRegularizacionFechaInicioDateTimeFormat) : null;

            if ($this->chkRegularizacionTienePlano) $this->chkRegularizacionTienePlano->Checked = $this->objUsoInterno->RegularizacionTienePlano;
            if ($this->lblRegularizacionTienePlano) $this->lblRegularizacionTienePlano->Text = ($this->objUsoInterno->RegularizacionTienePlano) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkRegularizacionCircular10Catastro) $this->chkRegularizacionCircular10Catastro->Checked = $this->objUsoInterno->RegularizacionCircular10Catastro;
            if ($this->lblRegularizacionCircular10Catastro) $this->lblRegularizacionCircular10Catastro->Text = ($this->objUsoInterno->RegularizacionCircular10Catastro) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtRegularizacionEstadoProceso) $this->txtRegularizacionEstadoProceso->Text = $this->objUsoInterno->RegularizacionEstadoProceso;
            if ($this->lblRegularizacionEstadoProceso) $this->lblRegularizacionEstadoProceso->Text = $this->objUsoInterno->RegularizacionEstadoProceso;

            if ($this->txtNumExpediente) $this->txtNumExpediente->Text = $this->objUsoInterno->NumExpediente;
            if ($this->lblNumExpediente) $this->lblNumExpediente->Text = $this->objUsoInterno->NumExpediente;

            if ($this->txtRegistracionLegajo) $this->txtRegistracionLegajo->Text = $this->objUsoInterno->RegistracionLegajo;
            if ($this->lblRegistracionLegajo) $this->lblRegistracionLegajo->Text = $this->objUsoInterno->RegistracionLegajo;

            if ($this->txtRegistracionFecha) $this->txtRegistracionFecha->Text = $this->objUsoInterno->RegistracionFecha;
            if ($this->lblRegistracionFecha) $this->lblRegistracionFecha->Text = $this->objUsoInterno->RegistracionFecha;

            if ($this->txtRegistracionFolio) $this->txtRegistracionFolio->Text = $this->objUsoInterno->RegistracionFolio;
            if ($this->lblRegistracionFolio) $this->lblRegistracionFolio->Text = $this->objUsoInterno->RegistracionFolio;

            if ($this->txtGeodesiaNum) $this->txtGeodesiaNum->Text = $this->objUsoInterno->GeodesiaNum;
            if ($this->lblGeodesiaNum) $this->lblGeodesiaNum->Text = $this->objUsoInterno->GeodesiaNum;

            if ($this->txtGeodesiaAnio) $this->txtGeodesiaAnio->Text = $this->objUsoInterno->GeodesiaAnio;
            if ($this->lblGeodesiaAnio) $this->lblGeodesiaAnio->Text = $this->objUsoInterno->GeodesiaAnio;

            if ($this->chkLey14449) $this->chkLey14449->Checked = $this->objUsoInterno->Ley14449;
            if ($this->lblLey14449) $this->lblLey14449->Text = ($this->objUsoInterno->Ley14449) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkTieneCenso) $this->chkTieneCenso->Checked = $this->objUsoInterno->TieneCenso;
            if ($this->lblTieneCenso) $this->lblTieneCenso->Text = ($this->objUsoInterno->TieneCenso) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtFechaCenso) $this->txtFechaCenso->Text = $this->objUsoInterno->FechaCenso;
            if ($this->lblFechaCenso) $this->lblFechaCenso->Text = $this->objUsoInterno->FechaCenso;

            if ($this->txtGeodesiaPartido) $this->txtGeodesiaPartido->Text = $this->objUsoInterno->GeodesiaPartido;
            if ($this->lblGeodesiaPartido) $this->lblGeodesiaPartido->Text = $this->objUsoInterno->GeodesiaPartido;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC USOINTERNO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objUsoInterno->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->txtInformeUrbanisticoFecha) $this->objUsoInterno->InformeUrbanisticoFecha = $this->txtInformeUrbanisticoFecha->Text;
                if ($this->chkMapeoPreliminar) $this->objUsoInterno->MapeoPreliminar = $this->chkMapeoPreliminar->Checked;
                if ($this->chkNoCorrespondeInscripcion) $this->objUsoInterno->NoCorrespondeInscripcion = $this->chkNoCorrespondeInscripcion->Checked;
                if ($this->txtResolucionInscripcionProvisoria) $this->objUsoInterno->ResolucionInscripcionProvisoria = $this->txtResolucionInscripcionProvisoria->Text;
                if ($this->txtResolucionInscripcionDefinitiva) $this->objUsoInterno->ResolucionInscripcionDefinitiva = $this->txtResolucionInscripcionDefinitiva->Text;
                if ($this->calRegularizacionFechaInicio) $this->objUsoInterno->RegularizacionFechaInicio = $this->calRegularizacionFechaInicio->DateTime;
                if ($this->chkRegularizacionTienePlano) $this->objUsoInterno->RegularizacionTienePlano = $this->chkRegularizacionTienePlano->Checked;
                if ($this->chkRegularizacionCircular10Catastro) $this->objUsoInterno->RegularizacionCircular10Catastro = $this->chkRegularizacionCircular10Catastro->Checked;
                if ($this->txtRegularizacionEstadoProceso) $this->objUsoInterno->RegularizacionEstadoProceso = $this->txtRegularizacionEstadoProceso->Text;
                if ($this->txtNumExpediente) $this->objUsoInterno->NumExpediente = $this->txtNumExpediente->Text;
                if ($this->txtRegistracionLegajo) $this->objUsoInterno->RegistracionLegajo = $this->txtRegistracionLegajo->Text;
                if ($this->txtRegistracionFecha) $this->objUsoInterno->RegistracionFecha = $this->txtRegistracionFecha->Text;
                if ($this->txtRegistracionFolio) $this->objUsoInterno->RegistracionFolio = $this->txtRegistracionFolio->Text;
                if ($this->txtGeodesiaNum) $this->objUsoInterno->GeodesiaNum = $this->txtGeodesiaNum->Text;
                if ($this->txtGeodesiaAnio) $this->objUsoInterno->GeodesiaAnio = $this->txtGeodesiaAnio->Text;
                if ($this->chkLey14449) $this->objUsoInterno->Ley14449 = $this->chkLey14449->Checked;
                if ($this->chkTieneCenso) $this->objUsoInterno->TieneCenso = $this->chkTieneCenso->Checked;
                if ($this->txtFechaCenso) $this->objUsoInterno->FechaCenso = $this->txtFechaCenso->Text;
                if ($this->txtGeodesiaPartido) $this->objUsoInterno->GeodesiaPartido = $this->txtGeodesiaPartido->Text;


        }

        public function SaveUsoInterno() {
            return $this->Save();
        }
        /**
         * This will save this object's UsoInterno instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the UsoInterno object
                $idReturn = $this->objUsoInterno->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's UsoInterno instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteUsoInterno() {
            $this->objUsoInterno->Delete();
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
                case 'UsoInterno': return $this->objUsoInterno;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to UsoInterno fields -- will be created dynamically if not yet created
                case 'IdFolioControl':
                    if (!$this->lstIdFolioObject) return $this->lstIdFolioObject_Create();
                    return $this->lstIdFolioObject;
                case 'IdFolioLabel':
                    if (!$this->lblIdFolio) return $this->lblIdFolio_Create();
                    return $this->lblIdFolio;
                case 'InformeUrbanisticoFechaControl':
                    if (!$this->txtInformeUrbanisticoFecha) return $this->txtInformeUrbanisticoFecha_Create();
                    return $this->txtInformeUrbanisticoFecha;
                case 'InformeUrbanisticoFechaLabel':
                    if (!$this->lblInformeUrbanisticoFecha) return $this->lblInformeUrbanisticoFecha_Create();
                    return $this->lblInformeUrbanisticoFecha;
                case 'MapeoPreliminarControl':
                    if (!$this->chkMapeoPreliminar) return $this->chkMapeoPreliminar_Create();
                    return $this->chkMapeoPreliminar;
                case 'MapeoPreliminarLabel':
                    if (!$this->lblMapeoPreliminar) return $this->lblMapeoPreliminar_Create();
                    return $this->lblMapeoPreliminar;
                case 'NoCorrespondeInscripcionControl':
                    if (!$this->chkNoCorrespondeInscripcion) return $this->chkNoCorrespondeInscripcion_Create();
                    return $this->chkNoCorrespondeInscripcion;
                case 'NoCorrespondeInscripcionLabel':
                    if (!$this->lblNoCorrespondeInscripcion) return $this->lblNoCorrespondeInscripcion_Create();
                    return $this->lblNoCorrespondeInscripcion;
                case 'ResolucionInscripcionProvisoriaControl':
                    if (!$this->txtResolucionInscripcionProvisoria) return $this->txtResolucionInscripcionProvisoria_Create();
                    return $this->txtResolucionInscripcionProvisoria;
                case 'ResolucionInscripcionProvisoriaLabel':
                    if (!$this->lblResolucionInscripcionProvisoria) return $this->lblResolucionInscripcionProvisoria_Create();
                    return $this->lblResolucionInscripcionProvisoria;
                case 'ResolucionInscripcionDefinitivaControl':
                    if (!$this->txtResolucionInscripcionDefinitiva) return $this->txtResolucionInscripcionDefinitiva_Create();
                    return $this->txtResolucionInscripcionDefinitiva;
                case 'ResolucionInscripcionDefinitivaLabel':
                    if (!$this->lblResolucionInscripcionDefinitiva) return $this->lblResolucionInscripcionDefinitiva_Create();
                    return $this->lblResolucionInscripcionDefinitiva;
                case 'RegularizacionFechaInicioControl':
                    if (!$this->calRegularizacionFechaInicio) return $this->calRegularizacionFechaInicio_Create();
                    return $this->calRegularizacionFechaInicio;
                case 'RegularizacionFechaInicioLabel':
                    if (!$this->lblRegularizacionFechaInicio) return $this->lblRegularizacionFechaInicio_Create();
                    return $this->lblRegularizacionFechaInicio;
                case 'RegularizacionTienePlanoControl':
                    if (!$this->chkRegularizacionTienePlano) return $this->chkRegularizacionTienePlano_Create();
                    return $this->chkRegularizacionTienePlano;
                case 'RegularizacionTienePlanoLabel':
                    if (!$this->lblRegularizacionTienePlano) return $this->lblRegularizacionTienePlano_Create();
                    return $this->lblRegularizacionTienePlano;
                case 'RegularizacionCircular10CatastroControl':
                    if (!$this->chkRegularizacionCircular10Catastro) return $this->chkRegularizacionCircular10Catastro_Create();
                    return $this->chkRegularizacionCircular10Catastro;
                case 'RegularizacionCircular10CatastroLabel':
                    if (!$this->lblRegularizacionCircular10Catastro) return $this->lblRegularizacionCircular10Catastro_Create();
                    return $this->lblRegularizacionCircular10Catastro;
                case 'RegularizacionEstadoProcesoControl':
                    if (!$this->txtRegularizacionEstadoProceso) return $this->txtRegularizacionEstadoProceso_Create();
                    return $this->txtRegularizacionEstadoProceso;
                case 'RegularizacionEstadoProcesoLabel':
                    if (!$this->lblRegularizacionEstadoProceso) return $this->lblRegularizacionEstadoProceso_Create();
                    return $this->lblRegularizacionEstadoProceso;
                case 'NumExpedienteControl':
                    if (!$this->txtNumExpediente) return $this->txtNumExpediente_Create();
                    return $this->txtNumExpediente;
                case 'NumExpedienteLabel':
                    if (!$this->lblNumExpediente) return $this->lblNumExpediente_Create();
                    return $this->lblNumExpediente;
                case 'RegistracionLegajoControl':
                    if (!$this->txtRegistracionLegajo) return $this->txtRegistracionLegajo_Create();
                    return $this->txtRegistracionLegajo;
                case 'RegistracionLegajoLabel':
                    if (!$this->lblRegistracionLegajo) return $this->lblRegistracionLegajo_Create();
                    return $this->lblRegistracionLegajo;
                case 'RegistracionFechaControl':
                    if (!$this->txtRegistracionFecha) return $this->txtRegistracionFecha_Create();
                    return $this->txtRegistracionFecha;
                case 'RegistracionFechaLabel':
                    if (!$this->lblRegistracionFecha) return $this->lblRegistracionFecha_Create();
                    return $this->lblRegistracionFecha;
                case 'RegistracionFolioControl':
                    if (!$this->txtRegistracionFolio) return $this->txtRegistracionFolio_Create();
                    return $this->txtRegistracionFolio;
                case 'RegistracionFolioLabel':
                    if (!$this->lblRegistracionFolio) return $this->lblRegistracionFolio_Create();
                    return $this->lblRegistracionFolio;
                case 'GeodesiaNumControl':
                    if (!$this->txtGeodesiaNum) return $this->txtGeodesiaNum_Create();
                    return $this->txtGeodesiaNum;
                case 'GeodesiaNumLabel':
                    if (!$this->lblGeodesiaNum) return $this->lblGeodesiaNum_Create();
                    return $this->lblGeodesiaNum;
                case 'GeodesiaAnioControl':
                    if (!$this->txtGeodesiaAnio) return $this->txtGeodesiaAnio_Create();
                    return $this->txtGeodesiaAnio;
                case 'GeodesiaAnioLabel':
                    if (!$this->lblGeodesiaAnio) return $this->lblGeodesiaAnio_Create();
                    return $this->lblGeodesiaAnio;
                case 'Ley14449Control':
                    if (!$this->chkLey14449) return $this->chkLey14449_Create();
                    return $this->chkLey14449;
                case 'Ley14449Label':
                    if (!$this->lblLey14449) return $this->lblLey14449_Create();
                    return $this->lblLey14449;
                case 'TieneCensoControl':
                    if (!$this->chkTieneCenso) return $this->chkTieneCenso_Create();
                    return $this->chkTieneCenso;
                case 'TieneCensoLabel':
                    if (!$this->lblTieneCenso) return $this->lblTieneCenso_Create();
                    return $this->lblTieneCenso;
                case 'FechaCensoControl':
                    if (!$this->txtFechaCenso) return $this->txtFechaCenso_Create();
                    return $this->txtFechaCenso;
                case 'FechaCensoLabel':
                    if (!$this->lblFechaCenso) return $this->lblFechaCenso_Create();
                    return $this->lblFechaCenso;
                case 'GeodesiaPartidoControl':
                    if (!$this->txtGeodesiaPartido) return $this->txtGeodesiaPartido_Create();
                    return $this->txtGeodesiaPartido;
                case 'GeodesiaPartidoLabel':
                    if (!$this->lblGeodesiaPartido) return $this->lblGeodesiaPartido_Create();
                    return $this->lblGeodesiaPartido;
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
                    // Controls that point to UsoInterno fields
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'InformeUrbanisticoFechaControl':
                        return ($this->txtInformeUrbanisticoFecha = QType::Cast($mixValue, 'QControl'));
                    case 'MapeoPreliminarControl':
                        return ($this->chkMapeoPreliminar = QType::Cast($mixValue, 'QControl'));
                    case 'NoCorrespondeInscripcionControl':
                        return ($this->chkNoCorrespondeInscripcion = QType::Cast($mixValue, 'QControl'));
                    case 'ResolucionInscripcionProvisoriaControl':
                        return ($this->txtResolucionInscripcionProvisoria = QType::Cast($mixValue, 'QControl'));
                    case 'ResolucionInscripcionDefinitivaControl':
                        return ($this->txtResolucionInscripcionDefinitiva = QType::Cast($mixValue, 'QControl'));
                    case 'RegularizacionFechaInicioControl':
                        return ($this->calRegularizacionFechaInicio = QType::Cast($mixValue, 'QControl'));
                    case 'RegularizacionTienePlanoControl':
                        return ($this->chkRegularizacionTienePlano = QType::Cast($mixValue, 'QControl'));
                    case 'RegularizacionCircular10CatastroControl':
                        return ($this->chkRegularizacionCircular10Catastro = QType::Cast($mixValue, 'QControl'));
                    case 'RegularizacionEstadoProcesoControl':
                        return ($this->txtRegularizacionEstadoProceso = QType::Cast($mixValue, 'QControl'));
                    case 'NumExpedienteControl':
                        return ($this->txtNumExpediente = QType::Cast($mixValue, 'QControl'));
                    case 'RegistracionLegajoControl':
                        return ($this->txtRegistracionLegajo = QType::Cast($mixValue, 'QControl'));
                    case 'RegistracionFechaControl':
                        return ($this->txtRegistracionFecha = QType::Cast($mixValue, 'QControl'));
                    case 'RegistracionFolioControl':
                        return ($this->txtRegistracionFolio = QType::Cast($mixValue, 'QControl'));
                    case 'GeodesiaNumControl':
                        return ($this->txtGeodesiaNum = QType::Cast($mixValue, 'QControl'));
                    case 'GeodesiaAnioControl':
                        return ($this->txtGeodesiaAnio = QType::Cast($mixValue, 'QControl'));
                    case 'Ley14449Control':
                        return ($this->chkLey14449 = QType::Cast($mixValue, 'QControl'));
                    case 'TieneCensoControl':
                        return ($this->chkTieneCenso = QType::Cast($mixValue, 'QControl'));
                    case 'FechaCensoControl':
                        return ($this->txtFechaCenso = QType::Cast($mixValue, 'QControl'));
                    case 'GeodesiaPartidoControl':
                        return ($this->txtGeodesiaPartido = QType::Cast($mixValue, 'QControl'));
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
