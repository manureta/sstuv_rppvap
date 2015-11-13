<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the CensoGrupoFamiliar class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single CensoGrupoFamiliar object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a CensoGrupoFamiliarMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read CensoGrupoFamiliar $CensoGrupoFamiliar the actual CensoGrupoFamiliar data class being edited
     * property QLabel $CensoGrupoFamiliarIdControl
     * property-read QLabel $CensoGrupoFamiliarIdLabel
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
     * property QTextBox $TipoBeneficioControl
     * property-read QLabel $TipoBeneficioLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class CensoGrupoFamiliarMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var CensoGrupoFamiliar
                */
        public $objCensoGrupoFamiliar;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of CensoGrupoFamiliar's individual data fields
        protected $lblCensoGrupoFamiliarId;
        protected $lstIdFolioObject;
        protected $calFechaAlta;
        protected $txtCirc;
        protected $txtSecc;
        protected $txtMz;
        protected $txtPc;
        protected $txtTelefono;
        protected $chkDeclaracionNoOcupacion;
        protected $txtTipoDocAdj;
        protected $txtTipoBeneficio;

        // Controls that allow the viewing of CensoGrupoFamiliar's individual data fields
        protected $lblIdFolio;
        protected $lblFechaAlta;
        protected $lblCirc;
        protected $lblSecc;
        protected $lblMz;
        protected $lblPc;
        protected $lblTelefono;
        protected $lblDeclaracionNoOcupacion;
        protected $lblTipoDocAdj;
        protected $lblTipoBeneficio;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * CensoGrupoFamiliarMetaControl to edit a single CensoGrupoFamiliar object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single CensoGrupoFamiliar object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoGrupoFamiliarMetaControl
         * @param CensoGrupoFamiliar $objCensoGrupoFamiliar new or existing CensoGrupoFamiliar object
         */
         public function __construct($objParentObject, CensoGrupoFamiliar $objCensoGrupoFamiliar) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this CensoGrupoFamiliarMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked CensoGrupoFamiliar object
            $this->objCensoGrupoFamiliar = $objCensoGrupoFamiliar;

            // Figure out if we're Editing or Creating New
            if ($this->objCensoGrupoFamiliar->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoGrupoFamiliarMetaControl
         * @param integer $intCensoGrupoFamiliarId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing CensoGrupoFamiliar object creation - defaults to CreateOrEdit
          * @return CensoGrupoFamiliarMetaControl
         */
        public static function Create($objParentObject, $intCensoGrupoFamiliarId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intCensoGrupoFamiliarId)) {
                $objCensoGrupoFamiliar = CensoGrupoFamiliar::Load($intCensoGrupoFamiliarId);

                // CensoGrupoFamiliar was found -- return it!
                if ($objCensoGrupoFamiliar)
                    return new CensoGrupoFamiliarMetaControl($objParentObject, $objCensoGrupoFamiliar);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a CensoGrupoFamiliar object with PK arguments: ' . $intCensoGrupoFamiliarId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new CensoGrupoFamiliarMetaControl($objParentObject, new CensoGrupoFamiliar());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoGrupoFamiliarMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing CensoGrupoFamiliar object creation - defaults to CreateOrEdit
         * @return CensoGrupoFamiliarMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intCensoGrupoFamiliarId = QApplication::PathInfo(0);
            return CensoGrupoFamiliarMetaControl::Create($objParentObject, $intCensoGrupoFamiliarId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this CensoGrupoFamiliarMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing CensoGrupoFamiliar object creation - defaults to CreateOrEdit
         * @return CensoGrupoFamiliarMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intCensoGrupoFamiliarId = QApplication::QueryString('id');
            return CensoGrupoFamiliarMetaControl::Create($objParentObject, $intCensoGrupoFamiliarId, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblCensoGrupoFamiliarId
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCensoGrupoFamiliarId_Create($strControlId = null) {
            $this->lblCensoGrupoFamiliarId = new QLabel($this->objParentObject, $strControlId);
            $this->lblCensoGrupoFamiliarId->Name = QApplication::Translate('CensoGrupoFamiliarId');
            if ($this->blnEditMode)
                $this->lblCensoGrupoFamiliarId->Text = $this->objCensoGrupoFamiliar->CensoGrupoFamiliarId;
            else
                $this->lblCensoGrupoFamiliarId->Text = 'N/A';
            return $this->lblCensoGrupoFamiliarId;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdFolioObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdFolioObject_Create($strControlId = null) {
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Folio', 'Id' , $strControlId);
            if($this->objCensoGrupoFamiliar->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objCensoGrupoFamiliar->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objCensoGrupoFamiliar->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objCensoGrupoFamiliar->IdFolioObject) ? $this->objCensoGrupoFamiliar->IdFolioObject->__toString() : null;
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
            $this->calFechaAlta->DateTime = $this->objCensoGrupoFamiliar->FechaAlta;
            $this->calFechaAlta->DateTimePickerType = QDateTimePickerType::DateTime;
            
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
            $this->lblFechaAlta->Text = sprintf($this->objCensoGrupoFamiliar->FechaAlta) ? $this->objCensoGrupoFamiliar->FechaAlta->__toString($this->strFechaAltaDateTimeFormat) : null;
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
            $this->txtCirc->Text = $this->objCensoGrupoFamiliar->Circ;
            $this->txtCirc->MaxLength = CensoGrupoFamiliar::CircMaxLength;
            
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
            $this->lblCirc->Text = $this->objCensoGrupoFamiliar->Circ;
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
            $this->txtSecc->Text = $this->objCensoGrupoFamiliar->Secc;
            $this->txtSecc->MaxLength = CensoGrupoFamiliar::SeccMaxLength;
            
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
            $this->lblSecc->Text = $this->objCensoGrupoFamiliar->Secc;
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
            $this->txtMz->Text = $this->objCensoGrupoFamiliar->Mz;
            $this->txtMz->MaxLength = CensoGrupoFamiliar::MzMaxLength;
            
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
            $this->lblMz->Text = $this->objCensoGrupoFamiliar->Mz;
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
            $this->txtPc->Text = $this->objCensoGrupoFamiliar->Pc;
            $this->txtPc->MaxLength = CensoGrupoFamiliar::PcMaxLength;
            
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
            $this->lblPc->Text = $this->objCensoGrupoFamiliar->Pc;
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
            $this->txtTelefono->Text = $this->objCensoGrupoFamiliar->Telefono;
            $this->txtTelefono->MaxLength = CensoGrupoFamiliar::TelefonoMaxLength;
            
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
            $this->lblTelefono->Text = $this->objCensoGrupoFamiliar->Telefono;
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
            $this->chkDeclaracionNoOcupacion->Checked = $this->objCensoGrupoFamiliar->DeclaracionNoOcupacion;
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
            $this->lblDeclaracionNoOcupacion->Text = ($this->objCensoGrupoFamiliar->DeclaracionNoOcupacion) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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
            $this->txtTipoDocAdj->Text = $this->objCensoGrupoFamiliar->TipoDocAdj;
            $this->txtTipoDocAdj->TextMode = QTextMode::MultiLine;
            
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
            $this->lblTipoDocAdj->Text = $this->objCensoGrupoFamiliar->TipoDocAdj;
            return $this->lblTipoDocAdj;
        }

        /**
         * Create and setup QTextBox txtTipoBeneficio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTipoBeneficio_Create($strControlId = null) {
            $this->txtTipoBeneficio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTipoBeneficio->Name = QApplication::Translate('TipoBeneficio');
            $this->txtTipoBeneficio->Text = $this->objCensoGrupoFamiliar->TipoBeneficio;
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
            $this->lblTipoBeneficio->Text = $this->objCensoGrupoFamiliar->TipoBeneficio;
            return $this->lblTipoBeneficio;
        }



    public $lstCensoPersona;
    /**
     * Gets all associated CensoPersonas as an array of CensoPersona objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return CensoPersona[]
    */ 
    public function lstCensoPersona_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'CensoPersona';
        $strConfigArray['strRefreshMethod'] = 'CensoPersonaArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'CensoGrupoFamiliarId';
        $strConfigArray['strPrimaryKeyProperty'] = 'CensoPersonaId';
        $strConfigArray['strAddMethod'] = 'AddCensoPersona';
        $strConfigArray['strRemoveMethod'] = 'RemoveCensoPersona';
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

        $this->lstCensoPersona = new QListPanel($this->objParentObject, $this->objCensoGrupoFamiliar, $strConfigArray, $strControlId);
        $this->lstCensoPersona->Name = CensoPersona::Noun();
        $this->lstCensoPersona->SetNewMethod($this, "lstCensoPersona_New");
        $this->lstCensoPersona->SetEditMethod($this, "lstCensoPersona_Edit");
        return $this->lstCensoPersona;
    }

    public function lstCensoPersona_New() {
        CensoPersonaModalPanel::$strControlsArray['lstCensoGrupoFamiliarIdObject'] = false;
        $strControlsArray = array_keys(CensoPersonaModalPanel::$strControlsArray, true);
        $this->lstCensoPersona->ModalPanel = new CensoPersonaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstCensoPersona->ModalPanel->objCallerControl = $this->lstCensoPersona;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstCensoPersona_Edit($intKey) {
        CensoPersonaModalPanel::$strControlsArray['lstCensoGrupoFamiliarIdObject'] = false;
        $strControlsArray = array_keys(CensoPersonaModalPanel::$strControlsArray, true);
        $obj = $this->objCensoGrupoFamiliar->CensoPersonaArray[$intKey];
        $this->lstCensoPersona->ModalPanel = new CensoPersonaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstCensoPersona->ModalPanel->objCallerControl = $this->lstCensoPersona;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local CensoGrupoFamiliar object.
         * @param boolean $blnReload reload CensoGrupoFamiliar from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objCensoGrupoFamiliar->Reload();

            if ($this->lblCensoGrupoFamiliarId) if ($this->blnEditMode) $this->lblCensoGrupoFamiliarId->Text = $this->objCensoGrupoFamiliar->CensoGrupoFamiliarId;

            if ($this->lstIdFolioObject) {
                if($this->objCensoGrupoFamiliar->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objCensoGrupoFamiliar->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objCensoGrupoFamiliar->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objCensoGrupoFamiliar->IdFolioObject) ? $this->objCensoGrupoFamiliar->IdFolioObject->__toString() : null;

            if ($this->calFechaAlta) $this->calFechaAlta->DateTime = $this->objCensoGrupoFamiliar->FechaAlta;
            if ($this->lblFechaAlta) $this->lblFechaAlta->Text = sprintf($this->objCensoGrupoFamiliar->FechaAlta) ? $this->objCensoGrupoFamiliar->FechaAlta->__toString($this->strFechaAltaDateTimeFormat) : null;

            if ($this->txtCirc) $this->txtCirc->Text = $this->objCensoGrupoFamiliar->Circ;
            if ($this->lblCirc) $this->lblCirc->Text = $this->objCensoGrupoFamiliar->Circ;

            if ($this->txtSecc) $this->txtSecc->Text = $this->objCensoGrupoFamiliar->Secc;
            if ($this->lblSecc) $this->lblSecc->Text = $this->objCensoGrupoFamiliar->Secc;

            if ($this->txtMz) $this->txtMz->Text = $this->objCensoGrupoFamiliar->Mz;
            if ($this->lblMz) $this->lblMz->Text = $this->objCensoGrupoFamiliar->Mz;

            if ($this->txtPc) $this->txtPc->Text = $this->objCensoGrupoFamiliar->Pc;
            if ($this->lblPc) $this->lblPc->Text = $this->objCensoGrupoFamiliar->Pc;

            if ($this->txtTelefono) $this->txtTelefono->Text = $this->objCensoGrupoFamiliar->Telefono;
            if ($this->lblTelefono) $this->lblTelefono->Text = $this->objCensoGrupoFamiliar->Telefono;

            if ($this->chkDeclaracionNoOcupacion) $this->chkDeclaracionNoOcupacion->Checked = $this->objCensoGrupoFamiliar->DeclaracionNoOcupacion;
            if ($this->lblDeclaracionNoOcupacion) $this->lblDeclaracionNoOcupacion->Text = ($this->objCensoGrupoFamiliar->DeclaracionNoOcupacion) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtTipoDocAdj) $this->txtTipoDocAdj->Text = $this->objCensoGrupoFamiliar->TipoDocAdj;
            if ($this->lblTipoDocAdj) $this->lblTipoDocAdj->Text = $this->objCensoGrupoFamiliar->TipoDocAdj;

            if ($this->txtTipoBeneficio) $this->txtTipoBeneficio->Text = $this->objCensoGrupoFamiliar->TipoBeneficio;
            if ($this->lblTipoBeneficio) $this->lblTipoBeneficio->Text = $this->objCensoGrupoFamiliar->TipoBeneficio;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC CENSOGRUPOFAMILIAR OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objCensoGrupoFamiliar->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->calFechaAlta) $this->objCensoGrupoFamiliar->FechaAlta = $this->calFechaAlta->DateTime;
                if ($this->txtCirc) $this->objCensoGrupoFamiliar->Circ = $this->txtCirc->Text;
                if ($this->txtSecc) $this->objCensoGrupoFamiliar->Secc = $this->txtSecc->Text;
                if ($this->txtMz) $this->objCensoGrupoFamiliar->Mz = $this->txtMz->Text;
                if ($this->txtPc) $this->objCensoGrupoFamiliar->Pc = $this->txtPc->Text;
                if ($this->txtTelefono) $this->objCensoGrupoFamiliar->Telefono = $this->txtTelefono->Text;
                if ($this->chkDeclaracionNoOcupacion) $this->objCensoGrupoFamiliar->DeclaracionNoOcupacion = $this->chkDeclaracionNoOcupacion->Checked;
                if ($this->txtTipoDocAdj) $this->objCensoGrupoFamiliar->TipoDocAdj = $this->txtTipoDocAdj->Text;
                if ($this->txtTipoBeneficio) $this->objCensoGrupoFamiliar->TipoBeneficio = $this->txtTipoBeneficio->Text;


        }

        public function SaveCensoGrupoFamiliar() {
            return $this->Save();
        }
        /**
         * This will save this object's CensoGrupoFamiliar instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the CensoGrupoFamiliar object
                $idReturn = $this->objCensoGrupoFamiliar->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's CensoGrupoFamiliar instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteCensoGrupoFamiliar() {
            $this->objCensoGrupoFamiliar->Delete();
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
                case 'CensoGrupoFamiliar': return $this->objCensoGrupoFamiliar;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to CensoGrupoFamiliar fields -- will be created dynamically if not yet created
                case 'CensoGrupoFamiliarIdControl':
                    if (!$this->lblCensoGrupoFamiliarId) return $this->lblCensoGrupoFamiliarId_Create();
                    return $this->lblCensoGrupoFamiliarId;
                case 'CensoGrupoFamiliarIdLabel':
                    if (!$this->lblCensoGrupoFamiliarId) return $this->lblCensoGrupoFamiliarId_Create();
                    return $this->lblCensoGrupoFamiliarId;
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
                case 'TipoBeneficioControl':
                    if (!$this->txtTipoBeneficio) return $this->txtTipoBeneficio_Create();
                    return $this->txtTipoBeneficio;
                case 'TipoBeneficioLabel':
                    if (!$this->lblTipoBeneficio) return $this->lblTipoBeneficio_Create();
                    return $this->lblTipoBeneficio;
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
                    // Controls that point to CensoGrupoFamiliar fields
                    case 'CensoGrupoFamiliarIdControl':
                        return ($this->lblCensoGrupoFamiliarId = QType::Cast($mixValue, 'QControl'));
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
                    case 'TipoBeneficioControl':
                        return ($this->txtTipoBeneficio = QType::Cast($mixValue, 'QControl'));
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
