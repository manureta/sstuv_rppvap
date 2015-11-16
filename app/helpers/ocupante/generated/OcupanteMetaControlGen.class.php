<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Ocupante class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Ocupante object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a OcupanteMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Ocupante $Ocupante the actual Ocupante data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdHogarControl
     * property-read QLabel $IdHogarLabel
     * property QTextBox $ApellidoControl
     * property-read QLabel $ApellidoLabel
     * property QTextBox $NombresControl
     * property-read QLabel $NombresLabel
     * property QDateTimePicker $FechaNacimientoControl
     * property-read QLabel $FechaNacimientoLabel
     * property QIntegerTextBox $EdadControl
     * property-read QLabel $EdadLabel
     * property QTextBox $EstadoCivilControl
     * property-read QLabel $EstadoCivilLabel
     * property QTextBox $DeOConQuienControl
     * property-read QLabel $DeOConQuienLabel
     * property QTextBox $OcupacionControl
     * property-read QLabel $OcupacionLabel
     * property QTextBox $IngresoControl
     * property-read QLabel $IngresoLabel
     * property QTextBox $TipoDocControl
     * property-read QLabel $TipoDocLabel
     * property QIntegerTextBox $DocControl
     * property-read QLabel $DocLabel
     * property QTextBox $NacionalidadControl
     * property-read QLabel $NacionalidadLabel
     * property QTextBox $NyaMadreControl
     * property-read QLabel $NyaMadreLabel
     * property QTextBox $NyaPadreControl
     * property-read QLabel $NyaPadreLabel
     * property QTextBox $RelacionParentescoJefeHogarControl
     * property-read QLabel $RelacionParentescoJefeHogarLabel
     * property QCheckBox $ReferenteControl
     * property-read QLabel $ReferenteLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class OcupanteMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Ocupante
                */
        public $objOcupante;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Ocupante's individual data fields
        protected $lblId;
        protected $lstIdHogarObject;
        protected $txtApellido;
        protected $txtNombres;
        protected $calFechaNacimiento;
        protected $txtEdad;
        protected $txtEstadoCivil;
        protected $txtDeOConQuien;
        protected $txtOcupacion;
        protected $txtIngreso;
        protected $txtTipoDoc;
        protected $txtDoc;
        protected $txtNacionalidad;
        protected $txtNyaMadre;
        protected $txtNyaPadre;
        protected $txtRelacionParentescoJefeHogar;
        protected $chkReferente;

        // Controls that allow the viewing of Ocupante's individual data fields
        protected $lblIdHogar;
        protected $lblApellido;
        protected $lblNombres;
        protected $lblFechaNacimiento;
        protected $lblEdad;
        protected $lblEstadoCivil;
        protected $lblDeOConQuien;
        protected $lblOcupacion;
        protected $lblIngreso;
        protected $lblTipoDoc;
        protected $lblDoc;
        protected $lblNacionalidad;
        protected $lblNyaMadre;
        protected $lblNyaPadre;
        protected $lblRelacionParentescoJefeHogar;
        protected $lblReferente;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * OcupanteMetaControl to edit a single Ocupante object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Ocupante object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OcupanteMetaControl
         * @param Ocupante $objOcupante new or existing Ocupante object
         */
         public function __construct($objParentObject, Ocupante $objOcupante) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this OcupanteMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Ocupante object
            $this->objOcupante = $objOcupante;

            // Figure out if we're Editing or Creating New
            if ($this->objOcupante->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this OcupanteMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Ocupante object creation - defaults to CreateOrEdit
          * @return OcupanteMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objOcupante = Ocupante::Load($intId);

                // Ocupante was found -- return it!
                if ($objOcupante)
                    return new OcupanteMetaControl($objParentObject, $objOcupante);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Ocupante object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new OcupanteMetaControl($objParentObject, new Ocupante());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OcupanteMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Ocupante object creation - defaults to CreateOrEdit
         * @return OcupanteMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return OcupanteMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OcupanteMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Ocupante object creation - defaults to CreateOrEdit
         * @return OcupanteMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return OcupanteMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objOcupante->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdHogarObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdHogarObject_Create($strControlId = null) {
            $this->lstIdHogarObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Hogar', 'Id' , $strControlId);
            if($this->objOcupante->IdHogarObject){
                $this->lstIdHogarObject->Text = $this->objOcupante->IdHogarObject->__toString();
                $this->lstIdHogarObject->Value = $this->objOcupante->IdHogarObject->Id;
            }
            $this->lstIdHogarObject->Name = QApplication::Translate('IdHogarObject');
            return $this->lstIdHogarObject;
        }

        /**
         * Create and setup QLabel lblIdHogar
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdHogar_Create($strControlId = null) {
            $this->lblIdHogar = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdHogar->Name = QApplication::Translate('IdHogarObject');
            $this->lblIdHogar->Text = ($this->objOcupante->IdHogarObject) ? $this->objOcupante->IdHogarObject->__toString() : null;
            return $this->lblIdHogar;
        }

        /**
         * Create and setup QTextBox txtApellido
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtApellido_Create($strControlId = null) {
            $this->txtApellido = new QTextBox($this->objParentObject, $strControlId);
            $this->txtApellido->Name = QApplication::Translate('Apellido');
            $this->txtApellido->Text = $this->objOcupante->Apellido;
            $this->txtApellido->Required = true;
            $this->txtApellido->MaxLength = Ocupante::ApellidoMaxLength;
            
            return $this->txtApellido;
        }

        /**
         * Create and setup QLabel lblApellido
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblApellido_Create($strControlId = null) {
            $this->lblApellido = new QLabel($this->objParentObject, $strControlId);
            $this->lblApellido->Name = QApplication::Translate('Apellido');
            $this->lblApellido->Text = $this->objOcupante->Apellido;
            $this->lblApellido->Required = true;
            return $this->lblApellido;
        }

        /**
         * Create and setup QTextBox txtNombres
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombres_Create($strControlId = null) {
            $this->txtNombres = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombres->Name = QApplication::Translate('Nombres');
            $this->txtNombres->Text = $this->objOcupante->Nombres;
            $this->txtNombres->Required = true;
            $this->txtNombres->MaxLength = Ocupante::NombresMaxLength;
            
            return $this->txtNombres;
        }

        /**
         * Create and setup QLabel lblNombres
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombres_Create($strControlId = null) {
            $this->lblNombres = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombres->Name = QApplication::Translate('Nombres');
            $this->lblNombres->Text = $this->objOcupante->Nombres;
            $this->lblNombres->Required = true;
            return $this->lblNombres;
        }

        /**
         * Create and setup QDateTimePicker calFechaNacimiento
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaNacimiento_Create($strControlId = null) {
            $this->calFechaNacimiento = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaNacimiento->Name = QApplication::Translate('FechaNacimiento');
            $this->calFechaNacimiento->DateTime = $this->objOcupante->FechaNacimiento;
            $this->calFechaNacimiento->DateTimePickerType = QDateTimePickerType::Date;
            $this->calFechaNacimiento->Required = true;
            
            return $this->calFechaNacimiento;
        }

        /**
         * Create and setup QLabel lblFechaNacimiento
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaNacimiento_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaNacimiento = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaNacimiento->Name = QApplication::Translate('FechaNacimiento');
            $this->strFechaNacimientoDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaNacimiento->Text = sprintf($this->objOcupante->FechaNacimiento) ? $this->objOcupante->FechaNacimiento->__toString($this->strFechaNacimientoDateTimeFormat) : null;
            $this->lblFechaNacimiento->Required = true;
            return $this->lblFechaNacimiento;
        }

        protected $strFechaNacimientoDateTimeFormat;


        /**
         * Create and setup QIntegerTextBox txtEdad
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtEdad_Create($strControlId = null) {
            $this->txtEdad = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtEdad->Name = QApplication::Translate('Edad');
            $this->txtEdad->Text = $this->objOcupante->Edad;
                        $this->txtEdad->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtEdad->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtEdad;
        }

        /**
         * Create and setup QLabel lblEdad
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblEdad_Create($strControlId = null, $strFormat = null) {
            $this->lblEdad = new QLabel($this->objParentObject, $strControlId);
            $this->lblEdad->Name = QApplication::Translate('Edad');
            $this->lblEdad->Text = $this->objOcupante->Edad;
            $this->lblEdad->Format = $strFormat;
            return $this->lblEdad;
        }

        /**
         * Create and setup QTextBox txtEstadoCivil
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtEstadoCivil_Create($strControlId = null) {
            $this->txtEstadoCivil = new QTextBox($this->objParentObject, $strControlId);
            $this->txtEstadoCivil->Name = QApplication::Translate('EstadoCivil');
            $this->txtEstadoCivil->Text = $this->objOcupante->EstadoCivil;
            $this->txtEstadoCivil->MaxLength = Ocupante::EstadoCivilMaxLength;
            
            return $this->txtEstadoCivil;
        }

        /**
         * Create and setup QLabel lblEstadoCivil
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEstadoCivil_Create($strControlId = null) {
            $this->lblEstadoCivil = new QLabel($this->objParentObject, $strControlId);
            $this->lblEstadoCivil->Name = QApplication::Translate('EstadoCivil');
            $this->lblEstadoCivil->Text = $this->objOcupante->EstadoCivil;
            return $this->lblEstadoCivil;
        }

        /**
         * Create and setup QTextBox txtDeOConQuien
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDeOConQuien_Create($strControlId = null) {
            $this->txtDeOConQuien = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDeOConQuien->Name = QApplication::Translate('DeOConQuien');
            $this->txtDeOConQuien->Text = $this->objOcupante->DeOConQuien;
            $this->txtDeOConQuien->MaxLength = Ocupante::DeOConQuienMaxLength;
            
            return $this->txtDeOConQuien;
        }

        /**
         * Create and setup QLabel lblDeOConQuien
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDeOConQuien_Create($strControlId = null) {
            $this->lblDeOConQuien = new QLabel($this->objParentObject, $strControlId);
            $this->lblDeOConQuien->Name = QApplication::Translate('DeOConQuien');
            $this->lblDeOConQuien->Text = $this->objOcupante->DeOConQuien;
            return $this->lblDeOConQuien;
        }

        /**
         * Create and setup QTextBox txtOcupacion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOcupacion_Create($strControlId = null) {
            $this->txtOcupacion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOcupacion->Name = QApplication::Translate('Ocupacion');
            $this->txtOcupacion->Text = $this->objOcupante->Ocupacion;
            $this->txtOcupacion->MaxLength = Ocupante::OcupacionMaxLength;
            
            return $this->txtOcupacion;
        }

        /**
         * Create and setup QLabel lblOcupacion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOcupacion_Create($strControlId = null) {
            $this->lblOcupacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblOcupacion->Name = QApplication::Translate('Ocupacion');
            $this->lblOcupacion->Text = $this->objOcupante->Ocupacion;
            return $this->lblOcupacion;
        }

        /**
         * Create and setup QTextBox txtIngreso
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtIngreso_Create($strControlId = null) {
            $this->txtIngreso = new QTextBox($this->objParentObject, $strControlId);
            $this->txtIngreso->Name = QApplication::Translate('Ingreso');
            $this->txtIngreso->Text = $this->objOcupante->Ingreso;
            $this->txtIngreso->MaxLength = Ocupante::IngresoMaxLength;
            
            return $this->txtIngreso;
        }

        /**
         * Create and setup QLabel lblIngreso
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIngreso_Create($strControlId = null) {
            $this->lblIngreso = new QLabel($this->objParentObject, $strControlId);
            $this->lblIngreso->Name = QApplication::Translate('Ingreso');
            $this->lblIngreso->Text = $this->objOcupante->Ingreso;
            return $this->lblIngreso;
        }

        /**
         * Create and setup QTextBox txtTipoDoc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTipoDoc_Create($strControlId = null) {
            $this->txtTipoDoc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTipoDoc->Name = QApplication::Translate('TipoDoc');
            $this->txtTipoDoc->Text = $this->objOcupante->TipoDoc;
            $this->txtTipoDoc->Required = true;
            $this->txtTipoDoc->MaxLength = Ocupante::TipoDocMaxLength;
            
            return $this->txtTipoDoc;
        }

        /**
         * Create and setup QLabel lblTipoDoc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTipoDoc_Create($strControlId = null) {
            $this->lblTipoDoc = new QLabel($this->objParentObject, $strControlId);
            $this->lblTipoDoc->Name = QApplication::Translate('TipoDoc');
            $this->lblTipoDoc->Text = $this->objOcupante->TipoDoc;
            $this->lblTipoDoc->Required = true;
            return $this->lblTipoDoc;
        }

        /**
         * Create and setup QIntegerTextBox txtDoc
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtDoc_Create($strControlId = null) {
            $this->txtDoc = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtDoc->Name = QApplication::Translate('Doc');
            $this->txtDoc->Text = $this->objOcupante->Doc;
            $this->txtDoc->Required = true;
                        $this->txtDoc->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtDoc->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtDoc;
        }

        /**
         * Create and setup QLabel lblDoc
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblDoc_Create($strControlId = null, $strFormat = null) {
            $this->lblDoc = new QLabel($this->objParentObject, $strControlId);
            $this->lblDoc->Name = QApplication::Translate('Doc');
            $this->lblDoc->Text = $this->objOcupante->Doc;
            $this->lblDoc->Required = true;
            $this->lblDoc->Format = $strFormat;
            return $this->lblDoc;
        }

        /**
         * Create and setup QTextBox txtNacionalidad
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNacionalidad_Create($strControlId = null) {
            $this->txtNacionalidad = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNacionalidad->Name = QApplication::Translate('Nacionalidad');
            $this->txtNacionalidad->Text = $this->objOcupante->Nacionalidad;
            $this->txtNacionalidad->MaxLength = Ocupante::NacionalidadMaxLength;
            
            return $this->txtNacionalidad;
        }

        /**
         * Create and setup QLabel lblNacionalidad
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNacionalidad_Create($strControlId = null) {
            $this->lblNacionalidad = new QLabel($this->objParentObject, $strControlId);
            $this->lblNacionalidad->Name = QApplication::Translate('Nacionalidad');
            $this->lblNacionalidad->Text = $this->objOcupante->Nacionalidad;
            return $this->lblNacionalidad;
        }

        /**
         * Create and setup QTextBox txtNyaMadre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNyaMadre_Create($strControlId = null) {
            $this->txtNyaMadre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNyaMadre->Name = QApplication::Translate('NyaMadre');
            $this->txtNyaMadre->Text = $this->objOcupante->NyaMadre;
            $this->txtNyaMadre->MaxLength = Ocupante::NyaMadreMaxLength;
            
            return $this->txtNyaMadre;
        }

        /**
         * Create and setup QLabel lblNyaMadre
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNyaMadre_Create($strControlId = null) {
            $this->lblNyaMadre = new QLabel($this->objParentObject, $strControlId);
            $this->lblNyaMadre->Name = QApplication::Translate('NyaMadre');
            $this->lblNyaMadre->Text = $this->objOcupante->NyaMadre;
            return $this->lblNyaMadre;
        }

        /**
         * Create and setup QTextBox txtNyaPadre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNyaPadre_Create($strControlId = null) {
            $this->txtNyaPadre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNyaPadre->Name = QApplication::Translate('NyaPadre');
            $this->txtNyaPadre->Text = $this->objOcupante->NyaPadre;
            $this->txtNyaPadre->MaxLength = Ocupante::NyaPadreMaxLength;
            
            return $this->txtNyaPadre;
        }

        /**
         * Create and setup QLabel lblNyaPadre
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNyaPadre_Create($strControlId = null) {
            $this->lblNyaPadre = new QLabel($this->objParentObject, $strControlId);
            $this->lblNyaPadre->Name = QApplication::Translate('NyaPadre');
            $this->lblNyaPadre->Text = $this->objOcupante->NyaPadre;
            return $this->lblNyaPadre;
        }

        /**
         * Create and setup QTextBox txtRelacionParentescoJefeHogar
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtRelacionParentescoJefeHogar_Create($strControlId = null) {
            $this->txtRelacionParentescoJefeHogar = new QTextBox($this->objParentObject, $strControlId);
            $this->txtRelacionParentescoJefeHogar->Name = QApplication::Translate('RelacionParentescoJefeHogar');
            $this->txtRelacionParentescoJefeHogar->Text = $this->objOcupante->RelacionParentescoJefeHogar;
            $this->txtRelacionParentescoJefeHogar->MaxLength = Ocupante::RelacionParentescoJefeHogarMaxLength;
            
            return $this->txtRelacionParentescoJefeHogar;
        }

        /**
         * Create and setup QLabel lblRelacionParentescoJefeHogar
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRelacionParentescoJefeHogar_Create($strControlId = null) {
            $this->lblRelacionParentescoJefeHogar = new QLabel($this->objParentObject, $strControlId);
            $this->lblRelacionParentescoJefeHogar->Name = QApplication::Translate('RelacionParentescoJefeHogar');
            $this->lblRelacionParentescoJefeHogar->Text = $this->objOcupante->RelacionParentescoJefeHogar;
            return $this->lblRelacionParentescoJefeHogar;
        }

        /**
         * Create and setup QCheckBox chkReferente
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkReferente_Create($strControlId = null) {
            $this->chkReferente = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkReferente->Name = QApplication::Translate('Referente');
            $this->chkReferente->Checked = $this->objOcupante->Referente;
                        return $this->chkReferente;
        }

        /**
         * Create and setup QLabel lblReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblReferente_Create($strControlId = null) {
            $this->lblReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblReferente->Name = QApplication::Translate('Referente');
            $this->lblReferente->Text = ($this->objOcupante->Referente) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblReferente;
        }





        /**
         * Refresh this MetaControl with Data from the local Ocupante object.
         * @param boolean $blnReload reload Ocupante from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objOcupante->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOcupante->Id;

            if ($this->lstIdHogarObject) {
                if($this->objOcupante->IdHogarObject){
                    $this->lstIdHogarObject->Text = $this->objOcupante->IdHogarObject->__toString();
                    $this->lstIdHogarObject->Value = $this->objOcupante->IdHogar->Id;
                }                
            }
            if ($this->lblIdHogar) $this->lblIdHogar->Text = ($this->objOcupante->IdHogarObject) ? $this->objOcupante->IdHogarObject->__toString() : null;

            if ($this->txtApellido) $this->txtApellido->Text = $this->objOcupante->Apellido;
            if ($this->lblApellido) $this->lblApellido->Text = $this->objOcupante->Apellido;

            if ($this->txtNombres) $this->txtNombres->Text = $this->objOcupante->Nombres;
            if ($this->lblNombres) $this->lblNombres->Text = $this->objOcupante->Nombres;

            if ($this->calFechaNacimiento) $this->calFechaNacimiento->DateTime = $this->objOcupante->FechaNacimiento;
            if ($this->lblFechaNacimiento) $this->lblFechaNacimiento->Text = sprintf($this->objOcupante->FechaNacimiento) ? $this->objOcupante->FechaNacimiento->__toString($this->strFechaNacimientoDateTimeFormat) : null;

            if ($this->txtEdad) $this->txtEdad->Text = $this->objOcupante->Edad;
            if ($this->lblEdad) $this->lblEdad->Text = $this->objOcupante->Edad;

            if ($this->txtEstadoCivil) $this->txtEstadoCivil->Text = $this->objOcupante->EstadoCivil;
            if ($this->lblEstadoCivil) $this->lblEstadoCivil->Text = $this->objOcupante->EstadoCivil;

            if ($this->txtDeOConQuien) $this->txtDeOConQuien->Text = $this->objOcupante->DeOConQuien;
            if ($this->lblDeOConQuien) $this->lblDeOConQuien->Text = $this->objOcupante->DeOConQuien;

            if ($this->txtOcupacion) $this->txtOcupacion->Text = $this->objOcupante->Ocupacion;
            if ($this->lblOcupacion) $this->lblOcupacion->Text = $this->objOcupante->Ocupacion;

            if ($this->txtIngreso) $this->txtIngreso->Text = $this->objOcupante->Ingreso;
            if ($this->lblIngreso) $this->lblIngreso->Text = $this->objOcupante->Ingreso;

            if ($this->txtTipoDoc) $this->txtTipoDoc->Text = $this->objOcupante->TipoDoc;
            if ($this->lblTipoDoc) $this->lblTipoDoc->Text = $this->objOcupante->TipoDoc;

            if ($this->txtDoc) $this->txtDoc->Text = $this->objOcupante->Doc;
            if ($this->lblDoc) $this->lblDoc->Text = $this->objOcupante->Doc;

            if ($this->txtNacionalidad) $this->txtNacionalidad->Text = $this->objOcupante->Nacionalidad;
            if ($this->lblNacionalidad) $this->lblNacionalidad->Text = $this->objOcupante->Nacionalidad;

            if ($this->txtNyaMadre) $this->txtNyaMadre->Text = $this->objOcupante->NyaMadre;
            if ($this->lblNyaMadre) $this->lblNyaMadre->Text = $this->objOcupante->NyaMadre;

            if ($this->txtNyaPadre) $this->txtNyaPadre->Text = $this->objOcupante->NyaPadre;
            if ($this->lblNyaPadre) $this->lblNyaPadre->Text = $this->objOcupante->NyaPadre;

            if ($this->txtRelacionParentescoJefeHogar) $this->txtRelacionParentescoJefeHogar->Text = $this->objOcupante->RelacionParentescoJefeHogar;
            if ($this->lblRelacionParentescoJefeHogar) $this->lblRelacionParentescoJefeHogar->Text = $this->objOcupante->RelacionParentescoJefeHogar;

            if ($this->chkReferente) $this->chkReferente->Checked = $this->objOcupante->Referente;
            if ($this->lblReferente) $this->lblReferente->Text = ($this->objOcupante->Referente) ? QApplication::Translate('Yes') : QApplication::Translate('No');

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC OCUPANTE OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdHogarObject) $this->objOcupante->IdHogar = $this->lstIdHogarObject->SelectedValue;
                if ($this->txtApellido) $this->objOcupante->Apellido = $this->txtApellido->Text;
                if ($this->txtNombres) $this->objOcupante->Nombres = $this->txtNombres->Text;
                if ($this->calFechaNacimiento) $this->objOcupante->FechaNacimiento = $this->calFechaNacimiento->DateTime;
                if ($this->txtEdad) $this->objOcupante->Edad = $this->txtEdad->Text;
                if ($this->txtEstadoCivil) $this->objOcupante->EstadoCivil = $this->txtEstadoCivil->Text;
                if ($this->txtDeOConQuien) $this->objOcupante->DeOConQuien = $this->txtDeOConQuien->Text;
                if ($this->txtOcupacion) $this->objOcupante->Ocupacion = $this->txtOcupacion->Text;
                if ($this->txtIngreso) $this->objOcupante->Ingreso = $this->txtIngreso->Text;
                if ($this->txtTipoDoc) $this->objOcupante->TipoDoc = $this->txtTipoDoc->Text;
                if ($this->txtDoc) $this->objOcupante->Doc = $this->txtDoc->Text;
                if ($this->txtNacionalidad) $this->objOcupante->Nacionalidad = $this->txtNacionalidad->Text;
                if ($this->txtNyaMadre) $this->objOcupante->NyaMadre = $this->txtNyaMadre->Text;
                if ($this->txtNyaPadre) $this->objOcupante->NyaPadre = $this->txtNyaPadre->Text;
                if ($this->txtRelacionParentescoJefeHogar) $this->objOcupante->RelacionParentescoJefeHogar = $this->txtRelacionParentescoJefeHogar->Text;
                if ($this->chkReferente) $this->objOcupante->Referente = $this->chkReferente->Checked;


        }

        public function SaveOcupante() {
            return $this->Save();
        }
        /**
         * This will save this object's Ocupante instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Ocupante object
                $idReturn = $this->objOcupante->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Ocupante instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteOcupante() {
            $this->objOcupante->Delete();
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
                case 'Ocupante': return $this->objOcupante;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Ocupante fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdHogarControl':
                    if (!$this->lstIdHogarObject) return $this->lstIdHogarObject_Create();
                    return $this->lstIdHogarObject;
                case 'IdHogarLabel':
                    if (!$this->lblIdHogar) return $this->lblIdHogar_Create();
                    return $this->lblIdHogar;
                case 'ApellidoControl':
                    if (!$this->txtApellido) return $this->txtApellido_Create();
                    return $this->txtApellido;
                case 'ApellidoLabel':
                    if (!$this->lblApellido) return $this->lblApellido_Create();
                    return $this->lblApellido;
                case 'NombresControl':
                    if (!$this->txtNombres) return $this->txtNombres_Create();
                    return $this->txtNombres;
                case 'NombresLabel':
                    if (!$this->lblNombres) return $this->lblNombres_Create();
                    return $this->lblNombres;
                case 'FechaNacimientoControl':
                    if (!$this->calFechaNacimiento) return $this->calFechaNacimiento_Create();
                    return $this->calFechaNacimiento;
                case 'FechaNacimientoLabel':
                    if (!$this->lblFechaNacimiento) return $this->lblFechaNacimiento_Create();
                    return $this->lblFechaNacimiento;
                case 'EdadControl':
                    if (!$this->txtEdad) return $this->txtEdad_Create();
                    return $this->txtEdad;
                case 'EdadLabel':
                    if (!$this->lblEdad) return $this->lblEdad_Create();
                    return $this->lblEdad;
                case 'EstadoCivilControl':
                    if (!$this->txtEstadoCivil) return $this->txtEstadoCivil_Create();
                    return $this->txtEstadoCivil;
                case 'EstadoCivilLabel':
                    if (!$this->lblEstadoCivil) return $this->lblEstadoCivil_Create();
                    return $this->lblEstadoCivil;
                case 'DeOConQuienControl':
                    if (!$this->txtDeOConQuien) return $this->txtDeOConQuien_Create();
                    return $this->txtDeOConQuien;
                case 'DeOConQuienLabel':
                    if (!$this->lblDeOConQuien) return $this->lblDeOConQuien_Create();
                    return $this->lblDeOConQuien;
                case 'OcupacionControl':
                    if (!$this->txtOcupacion) return $this->txtOcupacion_Create();
                    return $this->txtOcupacion;
                case 'OcupacionLabel':
                    if (!$this->lblOcupacion) return $this->lblOcupacion_Create();
                    return $this->lblOcupacion;
                case 'IngresoControl':
                    if (!$this->txtIngreso) return $this->txtIngreso_Create();
                    return $this->txtIngreso;
                case 'IngresoLabel':
                    if (!$this->lblIngreso) return $this->lblIngreso_Create();
                    return $this->lblIngreso;
                case 'TipoDocControl':
                    if (!$this->txtTipoDoc) return $this->txtTipoDoc_Create();
                    return $this->txtTipoDoc;
                case 'TipoDocLabel':
                    if (!$this->lblTipoDoc) return $this->lblTipoDoc_Create();
                    return $this->lblTipoDoc;
                case 'DocControl':
                    if (!$this->txtDoc) return $this->txtDoc_Create();
                    return $this->txtDoc;
                case 'DocLabel':
                    if (!$this->lblDoc) return $this->lblDoc_Create();
                    return $this->lblDoc;
                case 'NacionalidadControl':
                    if (!$this->txtNacionalidad) return $this->txtNacionalidad_Create();
                    return $this->txtNacionalidad;
                case 'NacionalidadLabel':
                    if (!$this->lblNacionalidad) return $this->lblNacionalidad_Create();
                    return $this->lblNacionalidad;
                case 'NyaMadreControl':
                    if (!$this->txtNyaMadre) return $this->txtNyaMadre_Create();
                    return $this->txtNyaMadre;
                case 'NyaMadreLabel':
                    if (!$this->lblNyaMadre) return $this->lblNyaMadre_Create();
                    return $this->lblNyaMadre;
                case 'NyaPadreControl':
                    if (!$this->txtNyaPadre) return $this->txtNyaPadre_Create();
                    return $this->txtNyaPadre;
                case 'NyaPadreLabel':
                    if (!$this->lblNyaPadre) return $this->lblNyaPadre_Create();
                    return $this->lblNyaPadre;
                case 'RelacionParentescoJefeHogarControl':
                    if (!$this->txtRelacionParentescoJefeHogar) return $this->txtRelacionParentescoJefeHogar_Create();
                    return $this->txtRelacionParentescoJefeHogar;
                case 'RelacionParentescoJefeHogarLabel':
                    if (!$this->lblRelacionParentescoJefeHogar) return $this->lblRelacionParentescoJefeHogar_Create();
                    return $this->lblRelacionParentescoJefeHogar;
                case 'ReferenteControl':
                    if (!$this->chkReferente) return $this->chkReferente_Create();
                    return $this->chkReferente;
                case 'ReferenteLabel':
                    if (!$this->lblReferente) return $this->lblReferente_Create();
                    return $this->lblReferente;
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
                    // Controls that point to Ocupante fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdHogarControl':
                        return ($this->lstIdHogarObject = QType::Cast($mixValue, 'QControl'));
                    case 'ApellidoControl':
                        return ($this->txtApellido = QType::Cast($mixValue, 'QControl'));
                    case 'NombresControl':
                        return ($this->txtNombres = QType::Cast($mixValue, 'QControl'));
                    case 'FechaNacimientoControl':
                        return ($this->calFechaNacimiento = QType::Cast($mixValue, 'QControl'));
                    case 'EdadControl':
                        return ($this->txtEdad = QType::Cast($mixValue, 'QControl'));
                    case 'EstadoCivilControl':
                        return ($this->txtEstadoCivil = QType::Cast($mixValue, 'QControl'));
                    case 'DeOConQuienControl':
                        return ($this->txtDeOConQuien = QType::Cast($mixValue, 'QControl'));
                    case 'OcupacionControl':
                        return ($this->txtOcupacion = QType::Cast($mixValue, 'QControl'));
                    case 'IngresoControl':
                        return ($this->txtIngreso = QType::Cast($mixValue, 'QControl'));
                    case 'TipoDocControl':
                        return ($this->txtTipoDoc = QType::Cast($mixValue, 'QControl'));
                    case 'DocControl':
                        return ($this->txtDoc = QType::Cast($mixValue, 'QControl'));
                    case 'NacionalidadControl':
                        return ($this->txtNacionalidad = QType::Cast($mixValue, 'QControl'));
                    case 'NyaMadreControl':
                        return ($this->txtNyaMadre = QType::Cast($mixValue, 'QControl'));
                    case 'NyaPadreControl':
                        return ($this->txtNyaPadre = QType::Cast($mixValue, 'QControl'));
                    case 'RelacionParentescoJefeHogarControl':
                        return ($this->txtRelacionParentescoJefeHogar = QType::Cast($mixValue, 'QControl'));
                    case 'ReferenteControl':
                        return ($this->chkReferente = QType::Cast($mixValue, 'QControl'));
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
