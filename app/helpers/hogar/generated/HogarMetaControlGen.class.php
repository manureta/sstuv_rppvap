<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Hogar class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Hogar object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a HogarMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Hogar $Hogar the actual Hogar data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QDateTimePicker $FechaAltaControl
     * property-read QLabel $FechaAltaLabel
     * property QTextBox $CircControl
     * property-read QLabel $CircLabel
     * property QTextBox $SeccControl
     * property-read QLabel $SeccLabel
     * property QTextBox $MzControl
     * property-read QLabel $MzLabel
     * property QTextBox $PcControl
     * property-read QLabel $PcLabel
     * property QTextBox $TelefonoControl
     * property-read QLabel $TelefonoLabel
     * property QCheckBox $DeclaracionNoOcupacionControl
     * property-read QLabel $DeclaracionNoOcupacionLabel
     * property QTextBox $TipoDocAdjControl
     * property-read QLabel $TipoDocAdjLabel
     * property QTextBox $DocTerrenoControl
     * property-read QLabel $DocTerrenoLabel
     * property QTextBox $TipoBeneficioControl
     * property-read QLabel $TipoBeneficioLabel
     * property QTextBox $FormaOcupacionControl
     * property-read QLabel $FormaOcupacionLabel
     * property QTextBox $FechaIngresoControl
     * property-read QLabel $FechaIngresoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class HogarMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Hogar
                */
        public $objHogar;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Hogar's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $calFechaAlta;
        protected $txtCirc;
        protected $txtSecc;
        protected $txtMz;
        protected $txtPc;
        protected $txtTelefono;
        protected $chkDeclaracionNoOcupacion;
        protected $txtTipoDocAdj;
        protected $txtDocTerreno;
        protected $txtTipoBeneficio;
        protected $txtFormaOcupacion;
        protected $txtFechaIngreso;

        // Controls that allow the viewing of Hogar's individual data fields
        protected $lblIdFolio;
        protected $lblFechaAlta;
        protected $lblCirc;
        protected $lblSecc;
        protected $lblMz;
        protected $lblPc;
        protected $lblTelefono;
        protected $lblDeclaracionNoOcupacion;
        protected $lblTipoDocAdj;
        protected $lblDocTerreno;
        protected $lblTipoBeneficio;
        protected $lblFormaOcupacion;
        protected $lblFechaIngreso;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * HogarMetaControl to edit a single Hogar object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Hogar object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this HogarMetaControl
         * @param Hogar $objHogar new or existing Hogar object
         */
         public function __construct($objParentObject, Hogar $objHogar) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this HogarMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Hogar object
            $this->objHogar = $objHogar;

            // Figure out if we're Editing or Creating New
            if ($this->objHogar->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this HogarMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Hogar object creation - defaults to CreateOrEdit
          * @return HogarMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objHogar = Hogar::Load($intId);

                // Hogar was found -- return it!
                if ($objHogar)
                    return new HogarMetaControl($objParentObject, $objHogar);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Hogar object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new HogarMetaControl($objParentObject, new Hogar());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this HogarMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Hogar object creation - defaults to CreateOrEdit
         * @return HogarMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return HogarMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this HogarMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Hogar object creation - defaults to CreateOrEdit
         * @return HogarMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return HogarMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objHogar->Id;
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
            if($this->objHogar->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objHogar->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objHogar->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objHogar->IdFolioObject) ? $this->objHogar->IdFolioObject->__toString() : null;
            $this->lblIdFolio->Required = true;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QDateTimePicker calFechaAlta
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaAlta_Create($strControlId = null) {
            $this->calFechaAlta = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaAlta->Name = QApplication::Translate('FechaAlta');
            $this->calFechaAlta->DateTime = $this->objHogar->FechaAlta;
            $this->calFechaAlta->DateTimePickerType = QDateTimePickerType::Date;
            $this->calFechaAlta->Required = true;
            
            return $this->calFechaAlta;
        }

        /**
         * Create and setup QLabel lblFechaAlta
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaAlta_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaAlta = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaAlta->Name = QApplication::Translate('FechaAlta');
            $this->strFechaAltaDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaAlta->Text = sprintf($this->objHogar->FechaAlta) ? $this->objHogar->FechaAlta->__toString($this->strFechaAltaDateTimeFormat) : null;
            $this->lblFechaAlta->Required = true;
            return $this->lblFechaAlta;
        }

        protected $strFechaAltaDateTimeFormat;


        /**
         * Create and setup QTextBox txtCirc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCirc_Create($strControlId = null) {
            $this->txtCirc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCirc->Name = QApplication::Translate('Circ');
            $this->txtCirc->Text = $this->objHogar->Circ;
            $this->txtCirc->Required = true;
            $this->txtCirc->MaxLength = Hogar::CircMaxLength;
            
            return $this->txtCirc;
        }

        /**
         * Create and setup QLabel lblCirc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCirc_Create($strControlId = null) {
            $this->lblCirc = new QLabel($this->objParentObject, $strControlId);
            $this->lblCirc->Name = QApplication::Translate('Circ');
            $this->lblCirc->Text = $this->objHogar->Circ;
            $this->lblCirc->Required = true;
            return $this->lblCirc;
        }

        /**
         * Create and setup QTextBox txtSecc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtSecc_Create($strControlId = null) {
            $this->txtSecc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtSecc->Name = QApplication::Translate('Secc');
            $this->txtSecc->Text = $this->objHogar->Secc;
            $this->txtSecc->Required = true;
            $this->txtSecc->MaxLength = Hogar::SeccMaxLength;
            
            return $this->txtSecc;
        }

        /**
         * Create and setup QLabel lblSecc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSecc_Create($strControlId = null) {
            $this->lblSecc = new QLabel($this->objParentObject, $strControlId);
            $this->lblSecc->Name = QApplication::Translate('Secc');
            $this->lblSecc->Text = $this->objHogar->Secc;
            $this->lblSecc->Required = true;
            return $this->lblSecc;
        }

        /**
         * Create and setup QTextBox txtMz
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtMz_Create($strControlId = null) {
            $this->txtMz = new QTextBox($this->objParentObject, $strControlId);
            $this->txtMz->Name = QApplication::Translate('Mz');
            $this->txtMz->Text = $this->objHogar->Mz;
            $this->txtMz->Required = true;
            $this->txtMz->MaxLength = Hogar::MzMaxLength;
            
            return $this->txtMz;
        }

        /**
         * Create and setup QLabel lblMz
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMz_Create($strControlId = null) {
            $this->lblMz = new QLabel($this->objParentObject, $strControlId);
            $this->lblMz->Name = QApplication::Translate('Mz');
            $this->lblMz->Text = $this->objHogar->Mz;
            $this->lblMz->Required = true;
            return $this->lblMz;
        }

        /**
         * Create and setup QTextBox txtPc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtPc_Create($strControlId = null) {
            $this->txtPc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtPc->Name = QApplication::Translate('Pc');
            $this->txtPc->Text = $this->objHogar->Pc;
            $this->txtPc->Required = true;
            $this->txtPc->MaxLength = Hogar::PcMaxLength;
            
            return $this->txtPc;
        }

        /**
         * Create and setup QLabel lblPc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblPc_Create($strControlId = null) {
            $this->lblPc = new QLabel($this->objParentObject, $strControlId);
            $this->lblPc->Name = QApplication::Translate('Pc');
            $this->lblPc->Text = $this->objHogar->Pc;
            $this->lblPc->Required = true;
            return $this->lblPc;
        }

        /**
         * Create and setup QTextBox txtTelefono
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTelefono_Create($strControlId = null) {
            $this->txtTelefono = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTelefono->Name = QApplication::Translate('Telefono');
            $this->txtTelefono->Text = $this->objHogar->Telefono;
            $this->txtTelefono->MaxLength = Hogar::TelefonoMaxLength;
            
            return $this->txtTelefono;
        }

        /**
         * Create and setup QLabel lblTelefono
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTelefono_Create($strControlId = null) {
            $this->lblTelefono = new QLabel($this->objParentObject, $strControlId);
            $this->lblTelefono->Name = QApplication::Translate('Telefono');
            $this->lblTelefono->Text = $this->objHogar->Telefono;
            return $this->lblTelefono;
        }

        /**
         * Create and setup QCheckBox chkDeclaracionNoOcupacion
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkDeclaracionNoOcupacion_Create($strControlId = null) {
            $this->chkDeclaracionNoOcupacion = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkDeclaracionNoOcupacion->Name = QApplication::Translate('DeclaracionNoOcupacion');
            $this->chkDeclaracionNoOcupacion->Checked = $this->objHogar->DeclaracionNoOcupacion;
                        return $this->chkDeclaracionNoOcupacion;
        }

        /**
         * Create and setup QLabel lblDeclaracionNoOcupacion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDeclaracionNoOcupacion_Create($strControlId = null) {
            $this->lblDeclaracionNoOcupacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblDeclaracionNoOcupacion->Name = QApplication::Translate('DeclaracionNoOcupacion');
            $this->lblDeclaracionNoOcupacion->Text = ($this->objHogar->DeclaracionNoOcupacion) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblDeclaracionNoOcupacion;
        }

        /**
         * Create and setup QTextBox txtTipoDocAdj
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTipoDocAdj_Create($strControlId = null) {
            $this->txtTipoDocAdj = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTipoDocAdj->Name = QApplication::Translate('TipoDocAdj');
            $this->txtTipoDocAdj->Text = $this->objHogar->TipoDocAdj;
            $this->txtTipoDocAdj->MaxLength = Hogar::TipoDocAdjMaxLength;
            
            return $this->txtTipoDocAdj;
        }

        /**
         * Create and setup QLabel lblTipoDocAdj
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTipoDocAdj_Create($strControlId = null) {
            $this->lblTipoDocAdj = new QLabel($this->objParentObject, $strControlId);
            $this->lblTipoDocAdj->Name = QApplication::Translate('TipoDocAdj');
            $this->lblTipoDocAdj->Text = $this->objHogar->TipoDocAdj;
            return $this->lblTipoDocAdj;
        }

        /**
         * Create and setup QTextBox txtDocTerreno
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDocTerreno_Create($strControlId = null) {
            $this->txtDocTerreno = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDocTerreno->Name = QApplication::Translate('DocTerreno');
            $this->txtDocTerreno->Text = $this->objHogar->DocTerreno;
            $this->txtDocTerreno->TextMode = QTextMode::MultiLine;
            
            return $this->txtDocTerreno;
        }

        /**
         * Create and setup QLabel lblDocTerreno
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDocTerreno_Create($strControlId = null) {
            $this->lblDocTerreno = new QLabel($this->objParentObject, $strControlId);
            $this->lblDocTerreno->Name = QApplication::Translate('DocTerreno');
            $this->lblDocTerreno->Text = $this->objHogar->DocTerreno;
            return $this->lblDocTerreno;
        }

        /**
         * Create and setup QTextBox txtTipoBeneficio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTipoBeneficio_Create($strControlId = null) {
            $this->txtTipoBeneficio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTipoBeneficio->Name = QApplication::Translate('TipoBeneficio');
            $this->txtTipoBeneficio->Text = $this->objHogar->TipoBeneficio;
            $this->txtTipoBeneficio->TextMode = QTextMode::MultiLine;
            
            return $this->txtTipoBeneficio;
        }

        /**
         * Create and setup QLabel lblTipoBeneficio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTipoBeneficio_Create($strControlId = null) {
            $this->lblTipoBeneficio = new QLabel($this->objParentObject, $strControlId);
            $this->lblTipoBeneficio->Name = QApplication::Translate('TipoBeneficio');
            $this->lblTipoBeneficio->Text = $this->objHogar->TipoBeneficio;
            return $this->lblTipoBeneficio;
        }

        /**
         * Create and setup QTextBox txtFormaOcupacion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFormaOcupacion_Create($strControlId = null) {
            $this->txtFormaOcupacion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFormaOcupacion->Name = QApplication::Translate('FormaOcupacion');
            $this->txtFormaOcupacion->Text = $this->objHogar->FormaOcupacion;
            $this->txtFormaOcupacion->MaxLength = Hogar::FormaOcupacionMaxLength;
            
            return $this->txtFormaOcupacion;
        }

        /**
         * Create and setup QLabel lblFormaOcupacion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFormaOcupacion_Create($strControlId = null) {
            $this->lblFormaOcupacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblFormaOcupacion->Name = QApplication::Translate('FormaOcupacion');
            $this->lblFormaOcupacion->Text = $this->objHogar->FormaOcupacion;
            return $this->lblFormaOcupacion;
        }

        /**
         * Create and setup QTextBox txtFechaIngreso
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFechaIngreso_Create($strControlId = null) {
            $this->txtFechaIngreso = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFechaIngreso->Name = QApplication::Translate('FechaIngreso');
            $this->txtFechaIngreso->Text = $this->objHogar->FechaIngreso;
            $this->txtFechaIngreso->MaxLength = Hogar::FechaIngresoMaxLength;
            
            return $this->txtFechaIngreso;
        }

        /**
         * Create and setup QLabel lblFechaIngreso
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFechaIngreso_Create($strControlId = null) {
            $this->lblFechaIngreso = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaIngreso->Name = QApplication::Translate('FechaIngreso');
            $this->lblFechaIngreso->Text = $this->objHogar->FechaIngreso;
            return $this->lblFechaIngreso;
        }



    public $lstOcupanteAsId;
    /**
     * Gets all associated OcupantesAsId as an array of Ocupante objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Ocupante[]
    */ 
    public function lstOcupanteAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Ocupante';
        $strConfigArray['strRefreshMethod'] = 'OcupanteAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdHogar';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddOcupanteAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveOcupanteAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Apellido'] = QApplication::Translate('Apellido');
        $strConfigArray['Columns']['Nombres'] = QApplication::Translate('Nombres');
        $strConfigArray['Columns']['FechaNacimiento'] = QApplication::Translate('FechaNacimiento');
        $strConfigArray['Columns']['Edad'] = QApplication::Translate('Edad');
        $strConfigArray['Columns']['EstadoCivil'] = QApplication::Translate('EstadoCivil');
        $strConfigArray['Columns']['DeOConQuien'] = QApplication::Translate('DeOConQuien');
        $strConfigArray['Columns']['Ocupacion'] = QApplication::Translate('Ocupacion');
        $strConfigArray['Columns']['Ingreso'] = QApplication::Translate('Ingreso');
        $strConfigArray['Columns']['TipoDoc'] = QApplication::Translate('TipoDoc');
        $strConfigArray['Columns']['Doc'] = QApplication::Translate('Doc');
        $strConfigArray['Columns']['Nacionalidad'] = QApplication::Translate('Nacionalidad');
        $strConfigArray['Columns']['NyaMadre'] = QApplication::Translate('NyaMadre');
        $strConfigArray['Columns']['NyaPadre'] = QApplication::Translate('NyaPadre');
        $strConfigArray['Columns']['RelacionParentescoJefeHogar'] = QApplication::Translate('RelacionParentescoJefeHogar');
        $strConfigArray['Columns']['Referente'] = QApplication::Translate('Referente');

        $this->lstOcupanteAsId = new QListPanel($this->objParentObject, $this->objHogar, $strConfigArray, $strControlId);
        $this->lstOcupanteAsId->Name = Ocupante::Noun();
        $this->lstOcupanteAsId->SetNewMethod($this, "lstOcupanteAsId_New");
        $this->lstOcupanteAsId->SetEditMethod($this, "lstOcupanteAsId_Edit");
        return $this->lstOcupanteAsId;
    }

    public function lstOcupanteAsId_New() {
        OcupanteModalPanel::$strControlsArray['lstIdHogarObject'] = false;
        $strControlsArray = array_keys(OcupanteModalPanel::$strControlsArray, true);
        $this->lstOcupanteAsId->ModalPanel = new OcupanteModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstOcupanteAsId->ModalPanel->objCallerControl = $this->lstOcupanteAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstOcupanteAsId_Edit($intKey) {
        OcupanteModalPanel::$strControlsArray['lstIdHogarObject'] = false;
        $strControlsArray = array_keys(OcupanteModalPanel::$strControlsArray, true);
        $obj = $this->objHogar->OcupanteAsIdArray[$intKey];
        $this->lstOcupanteAsId->ModalPanel = new OcupanteModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstOcupanteAsId->ModalPanel->objCallerControl = $this->lstOcupanteAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Hogar object.
         * @param boolean $blnReload reload Hogar from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objHogar->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objHogar->Id;

            if ($this->lstIdFolioObject) {
                if($this->objHogar->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objHogar->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objHogar->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objHogar->IdFolioObject) ? $this->objHogar->IdFolioObject->__toString() : null;

            if ($this->calFechaAlta) $this->calFechaAlta->DateTime = $this->objHogar->FechaAlta;
            if ($this->lblFechaAlta) $this->lblFechaAlta->Text = sprintf($this->objHogar->FechaAlta) ? $this->objHogar->FechaAlta->__toString($this->strFechaAltaDateTimeFormat) : null;

            if ($this->txtCirc) $this->txtCirc->Text = $this->objHogar->Circ;
            if ($this->lblCirc) $this->lblCirc->Text = $this->objHogar->Circ;

            if ($this->txtSecc) $this->txtSecc->Text = $this->objHogar->Secc;
            if ($this->lblSecc) $this->lblSecc->Text = $this->objHogar->Secc;

            if ($this->txtMz) $this->txtMz->Text = $this->objHogar->Mz;
            if ($this->lblMz) $this->lblMz->Text = $this->objHogar->Mz;

            if ($this->txtPc) $this->txtPc->Text = $this->objHogar->Pc;
            if ($this->lblPc) $this->lblPc->Text = $this->objHogar->Pc;

            if ($this->txtTelefono) $this->txtTelefono->Text = $this->objHogar->Telefono;
            if ($this->lblTelefono) $this->lblTelefono->Text = $this->objHogar->Telefono;

            if ($this->chkDeclaracionNoOcupacion) $this->chkDeclaracionNoOcupacion->Checked = $this->objHogar->DeclaracionNoOcupacion;
            if ($this->lblDeclaracionNoOcupacion) $this->lblDeclaracionNoOcupacion->Text = ($this->objHogar->DeclaracionNoOcupacion) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtTipoDocAdj) $this->txtTipoDocAdj->Text = $this->objHogar->TipoDocAdj;
            if ($this->lblTipoDocAdj) $this->lblTipoDocAdj->Text = $this->objHogar->TipoDocAdj;

            if ($this->txtDocTerreno) $this->txtDocTerreno->Text = $this->objHogar->DocTerreno;
            if ($this->lblDocTerreno) $this->lblDocTerreno->Text = $this->objHogar->DocTerreno;

            if ($this->txtTipoBeneficio) $this->txtTipoBeneficio->Text = $this->objHogar->TipoBeneficio;
            if ($this->lblTipoBeneficio) $this->lblTipoBeneficio->Text = $this->objHogar->TipoBeneficio;

            if ($this->txtFormaOcupacion) $this->txtFormaOcupacion->Text = $this->objHogar->FormaOcupacion;
            if ($this->lblFormaOcupacion) $this->lblFormaOcupacion->Text = $this->objHogar->FormaOcupacion;

            if ($this->txtFechaIngreso) $this->txtFechaIngreso->Text = $this->objHogar->FechaIngreso;
            if ($this->lblFechaIngreso) $this->lblFechaIngreso->Text = $this->objHogar->FechaIngreso;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC HOGAR OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objHogar->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->calFechaAlta) $this->objHogar->FechaAlta = $this->calFechaAlta->DateTime;
                if ($this->txtCirc) $this->objHogar->Circ = $this->txtCirc->Text;
                if ($this->txtSecc) $this->objHogar->Secc = $this->txtSecc->Text;
                if ($this->txtMz) $this->objHogar->Mz = $this->txtMz->Text;
                if ($this->txtPc) $this->objHogar->Pc = $this->txtPc->Text;
                if ($this->txtTelefono) $this->objHogar->Telefono = $this->txtTelefono->Text;
                if ($this->chkDeclaracionNoOcupacion) $this->objHogar->DeclaracionNoOcupacion = $this->chkDeclaracionNoOcupacion->Checked;
                if ($this->txtTipoDocAdj) $this->objHogar->TipoDocAdj = $this->txtTipoDocAdj->Text;
                if ($this->txtDocTerreno) $this->objHogar->DocTerreno = $this->txtDocTerreno->Text;
                if ($this->txtTipoBeneficio) $this->objHogar->TipoBeneficio = $this->txtTipoBeneficio->Text;
                if ($this->txtFormaOcupacion) $this->objHogar->FormaOcupacion = $this->txtFormaOcupacion->Text;
                if ($this->txtFechaIngreso) $this->objHogar->FechaIngreso = $this->txtFechaIngreso->Text;


        }

        public function SaveHogar() {
            return $this->Save();
        }
        /**
         * This will save this object's Hogar instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Hogar object
                $idReturn = $this->objHogar->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Hogar instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteHogar() {
            $this->objHogar->Delete();
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
                case 'Hogar': return $this->objHogar;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Hogar fields -- will be created dynamically if not yet created
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
                case 'FechaAltaControl':
                    if (!$this->calFechaAlta) return $this->calFechaAlta_Create();
                    return $this->calFechaAlta;
                case 'FechaAltaLabel':
                    if (!$this->lblFechaAlta) return $this->lblFechaAlta_Create();
                    return $this->lblFechaAlta;
                case 'CircControl':
                    if (!$this->txtCirc) return $this->txtCirc_Create();
                    return $this->txtCirc;
                case 'CircLabel':
                    if (!$this->lblCirc) return $this->lblCirc_Create();
                    return $this->lblCirc;
                case 'SeccControl':
                    if (!$this->txtSecc) return $this->txtSecc_Create();
                    return $this->txtSecc;
                case 'SeccLabel':
                    if (!$this->lblSecc) return $this->lblSecc_Create();
                    return $this->lblSecc;
                case 'MzControl':
                    if (!$this->txtMz) return $this->txtMz_Create();
                    return $this->txtMz;
                case 'MzLabel':
                    if (!$this->lblMz) return $this->lblMz_Create();
                    return $this->lblMz;
                case 'PcControl':
                    if (!$this->txtPc) return $this->txtPc_Create();
                    return $this->txtPc;
                case 'PcLabel':
                    if (!$this->lblPc) return $this->lblPc_Create();
                    return $this->lblPc;
                case 'TelefonoControl':
                    if (!$this->txtTelefono) return $this->txtTelefono_Create();
                    return $this->txtTelefono;
                case 'TelefonoLabel':
                    if (!$this->lblTelefono) return $this->lblTelefono_Create();
                    return $this->lblTelefono;
                case 'DeclaracionNoOcupacionControl':
                    if (!$this->chkDeclaracionNoOcupacion) return $this->chkDeclaracionNoOcupacion_Create();
                    return $this->chkDeclaracionNoOcupacion;
                case 'DeclaracionNoOcupacionLabel':
                    if (!$this->lblDeclaracionNoOcupacion) return $this->lblDeclaracionNoOcupacion_Create();
                    return $this->lblDeclaracionNoOcupacion;
                case 'TipoDocAdjControl':
                    if (!$this->txtTipoDocAdj) return $this->txtTipoDocAdj_Create();
                    return $this->txtTipoDocAdj;
                case 'TipoDocAdjLabel':
                    if (!$this->lblTipoDocAdj) return $this->lblTipoDocAdj_Create();
                    return $this->lblTipoDocAdj;
                case 'DocTerrenoControl':
                    if (!$this->txtDocTerreno) return $this->txtDocTerreno_Create();
                    return $this->txtDocTerreno;
                case 'DocTerrenoLabel':
                    if (!$this->lblDocTerreno) return $this->lblDocTerreno_Create();
                    return $this->lblDocTerreno;
                case 'TipoBeneficioControl':
                    if (!$this->txtTipoBeneficio) return $this->txtTipoBeneficio_Create();
                    return $this->txtTipoBeneficio;
                case 'TipoBeneficioLabel':
                    if (!$this->lblTipoBeneficio) return $this->lblTipoBeneficio_Create();
                    return $this->lblTipoBeneficio;
                case 'FormaOcupacionControl':
                    if (!$this->txtFormaOcupacion) return $this->txtFormaOcupacion_Create();
                    return $this->txtFormaOcupacion;
                case 'FormaOcupacionLabel':
                    if (!$this->lblFormaOcupacion) return $this->lblFormaOcupacion_Create();
                    return $this->lblFormaOcupacion;
                case 'FechaIngresoControl':
                    if (!$this->txtFechaIngreso) return $this->txtFechaIngreso_Create();
                    return $this->txtFechaIngreso;
                case 'FechaIngresoLabel':
                    if (!$this->lblFechaIngreso) return $this->lblFechaIngreso_Create();
                    return $this->lblFechaIngreso;
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
                    // Controls that point to Hogar fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'FechaAltaControl':
                        return ($this->calFechaAlta = QType::Cast($mixValue, 'QControl'));
                    case 'CircControl':
                        return ($this->txtCirc = QType::Cast($mixValue, 'QControl'));
                    case 'SeccControl':
                        return ($this->txtSecc = QType::Cast($mixValue, 'QControl'));
                    case 'MzControl':
                        return ($this->txtMz = QType::Cast($mixValue, 'QControl'));
                    case 'PcControl':
                        return ($this->txtPc = QType::Cast($mixValue, 'QControl'));
                    case 'TelefonoControl':
                        return ($this->txtTelefono = QType::Cast($mixValue, 'QControl'));
                    case 'DeclaracionNoOcupacionControl':
                        return ($this->chkDeclaracionNoOcupacion = QType::Cast($mixValue, 'QControl'));
                    case 'TipoDocAdjControl':
                        return ($this->txtTipoDocAdj = QType::Cast($mixValue, 'QControl'));
                    case 'DocTerrenoControl':
                        return ($this->txtDocTerreno = QType::Cast($mixValue, 'QControl'));
                    case 'TipoBeneficioControl':
                        return ($this->txtTipoBeneficio = QType::Cast($mixValue, 'QControl'));
                    case 'FormaOcupacionControl':
                        return ($this->txtFormaOcupacion = QType::Cast($mixValue, 'QControl'));
                    case 'FechaIngresoControl':
                        return ($this->txtFechaIngreso = QType::Cast($mixValue, 'QControl'));
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
