<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the CensoPersona class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single CensoPersona object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a CensoPersonaMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read CensoPersona $CensoPersona the actual CensoPersona data class being edited
     * property QLabel $CensoPersonaIdControl
     * property-read QLabel $CensoPersonaIdLabel
     * property QListBox $CensoGrupoFamiliarIdControl
     * property-read QLabel $CensoGrupoFamiliarIdLabel
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
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class CensoPersonaMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var CensoPersona
                */
        public $objCensoPersona;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of CensoPersona's individual data fields
        protected $lblCensoPersonaId;
        protected $lstCensoGrupoFamiliar;
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

        // Controls that allow the viewing of CensoPersona's individual data fields
        protected $lblCensoGrupoFamiliarId;
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

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * CensoPersonaMetaControl to edit a single CensoPersona object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single CensoPersona object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoPersonaMetaControl
         * @param CensoPersona $objCensoPersona new or existing CensoPersona object
         */
         public function __construct($objParentObject, CensoPersona $objCensoPersona) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this CensoPersonaMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked CensoPersona object
            $this->objCensoPersona = $objCensoPersona;

            // Figure out if we're Editing or Creating New
            if ($this->objCensoPersona->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoPersonaMetaControl
         * @param integer $intCensoPersonaId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing CensoPersona object creation - defaults to CreateOrEdit
          * @return CensoPersonaMetaControl
         */
        public static function Create($objParentObject, $intCensoPersonaId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intCensoPersonaId)) {
                $objCensoPersona = CensoPersona::Load($intCensoPersonaId);

                // CensoPersona was found -- return it!
                if ($objCensoPersona)
                    return new CensoPersonaMetaControl($objParentObject, $objCensoPersona);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a CensoPersona object with PK arguments: ' . $intCensoPersonaId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new CensoPersonaMetaControl($objParentObject, new CensoPersona());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoPersonaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing CensoPersona object creation - defaults to CreateOrEdit
         * @return CensoPersonaMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intCensoPersonaId = QApplication::PathInfo(0);
            return CensoPersonaMetaControl::Create($objParentObject, $intCensoPersonaId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoPersonaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing CensoPersona object creation - defaults to CreateOrEdit
         * @return CensoPersonaMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intCensoPersonaId = QApplication::QueryString('id');
            return CensoPersonaMetaControl::Create($objParentObject, $intCensoPersonaId, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblCensoPersonaId
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCensoPersonaId_Create($strControlId = null) {
            $this->lblCensoPersonaId = new QLabel($this->objParentObject, $strControlId);
            $this->lblCensoPersonaId->Name = QApplication::Translate('CensoPersonaId');
            if ($this->blnEditMode)
                $this->lblCensoPersonaId->Text = $this->objCensoPersona->CensoPersonaId;
            else
                $this->lblCensoPersonaId->Text = 'N/A';
            return $this->lblCensoPersonaId;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstCensoGrupoFamiliar
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstCensoGrupoFamiliar_Create($strControlId = null) {
            $this->lstCensoGrupoFamiliar = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'CensoGrupoFamiliar', 'CensoGrupoFamiliarId' , $strControlId);
            if($this->objCensoPersona->CensoGrupoFamiliar){
                $this->lstCensoGrupoFamiliar->Text = $this->objCensoPersona->CensoGrupoFamiliar->__toString();
                $this->lstCensoGrupoFamiliar->Value = $this->objCensoPersona->CensoGrupoFamiliar->CensoGrupoFamiliarId;
            }
            $this->lstCensoGrupoFamiliar->Name = QApplication::Translate('CensoGrupoFamiliar');
            $this->lstCensoGrupoFamiliar->Required = true;
            return $this->lstCensoGrupoFamiliar;
        }

        /**
         * Create and setup QLabel lblCensoGrupoFamiliarId
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCensoGrupoFamiliarId_Create($strControlId = null) {
            $this->lblCensoGrupoFamiliarId = new QLabel($this->objParentObject, $strControlId);
            $this->lblCensoGrupoFamiliarId->Name = QApplication::Translate('CensoGrupoFamiliar');
            $this->lblCensoGrupoFamiliarId->Text = ($this->objCensoPersona->CensoGrupoFamiliar) ? $this->objCensoPersona->CensoGrupoFamiliar->__toString() : null;
            $this->lblCensoGrupoFamiliarId->Required = true;
            return $this->lblCensoGrupoFamiliarId;
        }

        /**
         * Create and setup QTextBox txtApellido
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtApellido_Create($strControlId = null) {
            $this->txtApellido = new QTextBox($this->objParentObject, $strControlId);
            $this->txtApellido->Name = QApplication::Translate('Apellido');
            $this->txtApellido->Text = $this->objCensoPersona->Apellido;
            $this->txtApellido->Required = true;
            $this->txtApellido->MaxLength = CensoPersona::ApellidoMaxLength;
            
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
            $this->lblApellido->Text = $this->objCensoPersona->Apellido;
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
            $this->txtNombres->Text = $this->objCensoPersona->Nombres;
            $this->txtNombres->Required = true;
            $this->txtNombres->MaxLength = CensoPersona::NombresMaxLength;
            
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
            $this->lblNombres->Text = $this->objCensoPersona->Nombres;
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
            $this->calFechaNacimiento->DateTime = $this->objCensoPersona->FechaNacimiento;
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
            $this->lblFechaNacimiento->Text = sprintf($this->objCensoPersona->FechaNacimiento) ? $this->objCensoPersona->FechaNacimiento->__toString($this->strFechaNacimientoDateTimeFormat) : null;
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
            $this->txtEdad->Text = $this->objCensoPersona->Edad;
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
            $this->lblEdad->Text = $this->objCensoPersona->Edad;
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
            $this->txtEstadoCivil->Text = $this->objCensoPersona->EstadoCivil;
            $this->txtEstadoCivil->MaxLength = CensoPersona::EstadoCivilMaxLength;
            
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
            $this->lblEstadoCivil->Text = $this->objCensoPersona->EstadoCivil;
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
            $this->txtDeOConQuien->Text = $this->objCensoPersona->DeOConQuien;
            $this->txtDeOConQuien->MaxLength = CensoPersona::DeOConQuienMaxLength;
            
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
            $this->lblDeOConQuien->Text = $this->objCensoPersona->DeOConQuien;
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
            $this->txtOcupacion->Text = $this->objCensoPersona->Ocupacion;
            $this->txtOcupacion->MaxLength = CensoPersona::OcupacionMaxLength;
            
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
            $this->lblOcupacion->Text = $this->objCensoPersona->Ocupacion;
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
            $this->txtIngreso->Text = $this->objCensoPersona->Ingreso;
            
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
            $this->lblIngreso->Text = $this->objCensoPersona->Ingreso;
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
            $this->txtTipoDoc->Text = $this->objCensoPersona->TipoDoc;
            $this->txtTipoDoc->MaxLength = CensoPersona::TipoDocMaxLength;
            
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
            $this->lblTipoDoc->Text = $this->objCensoPersona->TipoDoc;
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
            $this->txtDoc->Text = $this->objCensoPersona->Doc;
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
            $this->lblDoc->Text = $this->objCensoPersona->Doc;
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
            $this->txtNacionalidad->Text = $this->objCensoPersona->Nacionalidad;
            $this->txtNacionalidad->MaxLength = CensoPersona::NacionalidadMaxLength;
            
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
            $this->lblNacionalidad->Text = $this->objCensoPersona->Nacionalidad;
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
            $this->txtNyaMadre->Text = $this->objCensoPersona->NyaMadre;
            $this->txtNyaMadre->MaxLength = CensoPersona::NyaMadreMaxLength;
            
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
            $this->lblNyaMadre->Text = $this->objCensoPersona->NyaMadre;
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
            $this->txtNyaPadre->Text = $this->objCensoPersona->NyaPadre;
            $this->txtNyaPadre->MaxLength = CensoPersona::NyaPadreMaxLength;
            
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
            $this->lblNyaPadre->Text = $this->objCensoPersona->NyaPadre;
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
            $this->txtRelacionParentescoJefeHogar->Text = $this->objCensoPersona->RelacionParentescoJefeHogar;
            $this->txtRelacionParentescoJefeHogar->MaxLength = CensoPersona::RelacionParentescoJefeHogarMaxLength;
            
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
            $this->lblRelacionParentescoJefeHogar->Text = $this->objCensoPersona->RelacionParentescoJefeHogar;
            return $this->lblRelacionParentescoJefeHogar;
        }





        /**
         * Refresh this MetaControl with Data from the local CensoPersona object.
         * @param boolean $blnReload reload CensoPersona from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objCensoPersona->Reload();

            if ($this->lblCensoPersonaId) if ($this->blnEditMode) $this->lblCensoPersonaId->Text = $this->objCensoPersona->CensoPersonaId;

            if ($this->lstCensoGrupoFamiliar) {
                if($this->objCensoPersona->CensoGrupoFamiliar){
                    $this->lstCensoGrupoFamiliar->Text = $this->objCensoPersona->CensoGrupoFamiliar->__toString();
                    $this->lstCensoGrupoFamiliar->Value = $this->objCensoPersona->CensoGrupoFamiliarId->CensoGrupoFamiliarId;
                }                
            }
            if ($this->lblCensoGrupoFamiliarId) $this->lblCensoGrupoFamiliarId->Text = ($this->objCensoPersona->CensoGrupoFamiliar) ? $this->objCensoPersona->CensoGrupoFamiliar->__toString() : null;

            if ($this->txtApellido) $this->txtApellido->Text = $this->objCensoPersona->Apellido;
            if ($this->lblApellido) $this->lblApellido->Text = $this->objCensoPersona->Apellido;

            if ($this->txtNombres) $this->txtNombres->Text = $this->objCensoPersona->Nombres;
            if ($this->lblNombres) $this->lblNombres->Text = $this->objCensoPersona->Nombres;

            if ($this->calFechaNacimiento) $this->calFechaNacimiento->DateTime = $this->objCensoPersona->FechaNacimiento;
            if ($this->lblFechaNacimiento) $this->lblFechaNacimiento->Text = sprintf($this->objCensoPersona->FechaNacimiento) ? $this->objCensoPersona->FechaNacimiento->__toString($this->strFechaNacimientoDateTimeFormat) : null;

            if ($this->txtEdad) $this->txtEdad->Text = $this->objCensoPersona->Edad;
            if ($this->lblEdad) $this->lblEdad->Text = $this->objCensoPersona->Edad;

            if ($this->txtEstadoCivil) $this->txtEstadoCivil->Text = $this->objCensoPersona->EstadoCivil;
            if ($this->lblEstadoCivil) $this->lblEstadoCivil->Text = $this->objCensoPersona->EstadoCivil;

            if ($this->txtDeOConQuien) $this->txtDeOConQuien->Text = $this->objCensoPersona->DeOConQuien;
            if ($this->lblDeOConQuien) $this->lblDeOConQuien->Text = $this->objCensoPersona->DeOConQuien;

            if ($this->txtOcupacion) $this->txtOcupacion->Text = $this->objCensoPersona->Ocupacion;
            if ($this->lblOcupacion) $this->lblOcupacion->Text = $this->objCensoPersona->Ocupacion;

            if ($this->txtIngreso) $this->txtIngreso->Text = $this->objCensoPersona->Ingreso;
            if ($this->lblIngreso) $this->lblIngreso->Text = $this->objCensoPersona->Ingreso;

            if ($this->txtTipoDoc) $this->txtTipoDoc->Text = $this->objCensoPersona->TipoDoc;
            if ($this->lblTipoDoc) $this->lblTipoDoc->Text = $this->objCensoPersona->TipoDoc;

            if ($this->txtDoc) $this->txtDoc->Text = $this->objCensoPersona->Doc;
            if ($this->lblDoc) $this->lblDoc->Text = $this->objCensoPersona->Doc;

            if ($this->txtNacionalidad) $this->txtNacionalidad->Text = $this->objCensoPersona->Nacionalidad;
            if ($this->lblNacionalidad) $this->lblNacionalidad->Text = $this->objCensoPersona->Nacionalidad;

            if ($this->txtNyaMadre) $this->txtNyaMadre->Text = $this->objCensoPersona->NyaMadre;
            if ($this->lblNyaMadre) $this->lblNyaMadre->Text = $this->objCensoPersona->NyaMadre;

            if ($this->txtNyaPadre) $this->txtNyaPadre->Text = $this->objCensoPersona->NyaPadre;
            if ($this->lblNyaPadre) $this->lblNyaPadre->Text = $this->objCensoPersona->NyaPadre;

            if ($this->txtRelacionParentescoJefeHogar) $this->txtRelacionParentescoJefeHogar->Text = $this->objCensoPersona->RelacionParentescoJefeHogar;
            if ($this->lblRelacionParentescoJefeHogar) $this->lblRelacionParentescoJefeHogar->Text = $this->objCensoPersona->RelacionParentescoJefeHogar;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC CENSOPERSONA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstCensoGrupoFamiliar) $this->objCensoPersona->CensoGrupoFamiliarId = $this->lstCensoGrupoFamiliar->SelectedValue;
                if ($this->txtApellido) $this->objCensoPersona->Apellido = $this->txtApellido->Text;
                if ($this->txtNombres) $this->objCensoPersona->Nombres = $this->txtNombres->Text;
                if ($this->calFechaNacimiento) $this->objCensoPersona->FechaNacimiento = $this->calFechaNacimiento->DateTime;
                if ($this->txtEdad) $this->objCensoPersona->Edad = $this->txtEdad->Text;
                if ($this->txtEstadoCivil) $this->objCensoPersona->EstadoCivil = $this->txtEstadoCivil->Text;
                if ($this->txtDeOConQuien) $this->objCensoPersona->DeOConQuien = $this->txtDeOConQuien->Text;
                if ($this->txtOcupacion) $this->objCensoPersona->Ocupacion = $this->txtOcupacion->Text;
                if ($this->txtIngreso) $this->objCensoPersona->Ingreso = $this->txtIngreso->Text;
                if ($this->txtTipoDoc) $this->objCensoPersona->TipoDoc = $this->txtTipoDoc->Text;
                if ($this->txtDoc) $this->objCensoPersona->Doc = $this->txtDoc->Text;
                if ($this->txtNacionalidad) $this->objCensoPersona->Nacionalidad = $this->txtNacionalidad->Text;
                if ($this->txtNyaMadre) $this->objCensoPersona->NyaMadre = $this->txtNyaMadre->Text;
                if ($this->txtNyaPadre) $this->objCensoPersona->NyaPadre = $this->txtNyaPadre->Text;
                if ($this->txtRelacionParentescoJefeHogar) $this->objCensoPersona->RelacionParentescoJefeHogar = $this->txtRelacionParentescoJefeHogar->Text;


        }

        public function SaveCensoPersona() {
            return $this->Save();
        }
        /**
         * This will save this object's CensoPersona instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the CensoPersona object
                $idReturn = $this->objCensoPersona->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's CensoPersona instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteCensoPersona() {
            $this->objCensoPersona->Delete();
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
                case 'CensoPersona': return $this->objCensoPersona;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to CensoPersona fields -- will be created dynamically if not yet created
                case 'CensoPersonaIdControl':
                    if (!$this->lblCensoPersonaId) return $this->lblCensoPersonaId_Create();
                    return $this->lblCensoPersonaId;
                case 'CensoPersonaIdLabel':
                    if (!$this->lblCensoPersonaId) return $this->lblCensoPersonaId_Create();
                    return $this->lblCensoPersonaId;
                case 'CensoGrupoFamiliarIdControl':
                    if (!$this->lstCensoGrupoFamiliar) return $this->lstCensoGrupoFamiliar_Create();
                    return $this->lstCensoGrupoFamiliar;
                case 'CensoGrupoFamiliarIdLabel':
                    if (!$this->lblCensoGrupoFamiliarId) return $this->lblCensoGrupoFamiliarId_Create();
                    return $this->lblCensoGrupoFamiliarId;
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
                    // Controls that point to CensoPersona fields
                    case 'CensoPersonaIdControl':
                        return ($this->lblCensoPersonaId = QType::Cast($mixValue, 'QControl'));
                    case 'CensoGrupoFamiliarIdControl':
                        return ($this->lstCensoGrupoFamiliar = QType::Cast($mixValue, 'QControl'));
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
