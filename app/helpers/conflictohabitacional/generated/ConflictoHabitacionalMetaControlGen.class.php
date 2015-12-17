<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the ConflictoHabitacional class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single ConflictoHabitacional object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a ConflictoHabitacionalMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read ConflictoHabitacional $ConflictoHabitacional the actual ConflictoHabitacional data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $IntervinoAreaControl
     * property-read QLabel $IntervinoAreaLabel
     * property QTextBox $FueroIntervinienteControl
     * property-read QLabel $FueroIntervinienteLabel
     * property QTextBox $JuzgadoIntervinienteControl
     * property-read QLabel $JuzgadoIntervinienteLabel
     * property QTextBox $CaratulaExpedienteControl
     * property-read QLabel $CaratulaExpedienteLabel
     * property QCheckBox $MinisterioDesarrolloControl
     * property-read QLabel $MinisterioDesarrolloLabel
     * property QTextBox $MinisterioDesarrolloReferenteControl
     * property-read QLabel $MinisterioDesarrolloReferenteLabel
     * property QCheckBox $DefensorPuebloControl
     * property-read QLabel $DefensorPuebloLabel
     * property QTextBox $DefensorPuebloReferenteControl
     * property-read QLabel $DefensorPuebloReferenteLabel
     * property QCheckBox $SecretariaNacionalControl
     * property-read QLabel $SecretariaNacionalLabel
     * property QTextBox $SecretariaNacionalReferenteControl
     * property-read QLabel $SecretariaNacionalReferenteLabel
     * property QCheckBox $MunicipalidadControl
     * property-read QLabel $MunicipalidadLabel
     * property QTextBox $MunicipalidadReferenteControl
     * property-read QLabel $MunicipalidadReferenteLabel
     * property QCheckBox $OrganizacionBarrialControl
     * property-read QLabel $OrganizacionBarrialLabel
     * property QTextBox $OrganizacionBarrialReferenteControl
     * property-read QLabel $OrganizacionBarrialReferenteLabel
     * property QTextBox $OtrosOrganismosControl
     * property-read QLabel $OtrosOrganismosLabel
     * property QCheckBox $OrdenDesalojoControl
     * property-read QLabel $OrdenDesalojoLabel
     * property QTextBox $FechaEjecucionControl
     * property-read QLabel $FechaEjecucionLabel
     * property QCheckBox $SuspensionHechoControl
     * property-read QLabel $SuspensionHechoLabel
     * property QCheckBox $SolicitudSuspensionControl
     * property-read QLabel $SolicitudSuspensionLabel
     * property QTextBox $FechaSuspensionControl
     * property-read QLabel $FechaSuspensionLabel
     * property QTextBox $DuracionSuspensionControl
     * property-read QLabel $DuracionSuspensionLabel
     * property QCheckBox $MesaGestionControl
     * property-read QLabel $MesaGestionLabel
     * property QTextBox $ObservacionesControl
     * property-read QLabel $ObservacionesLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class ConflictoHabitacionalMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var ConflictoHabitacional
                */
        public $objConflictoHabitacional;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of ConflictoHabitacional's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkIntervinoArea;
        protected $txtFueroInterviniente;
        protected $txtJuzgadoInterviniente;
        protected $txtCaratulaExpediente;
        protected $chkMinisterioDesarrollo;
        protected $txtMinisterioDesarrolloReferente;
        protected $chkDefensorPueblo;
        protected $txtDefensorPuebloReferente;
        protected $chkSecretariaNacional;
        protected $txtSecretariaNacionalReferente;
        protected $chkMunicipalidad;
        protected $txtMunicipalidadReferente;
        protected $chkOrganizacionBarrial;
        protected $txtOrganizacionBarrialReferente;
        protected $txtOtrosOrganismos;
        protected $chkOrdenDesalojo;
        protected $txtFechaEjecucion;
        protected $chkSuspensionHecho;
        protected $chkSolicitudSuspension;
        protected $txtFechaSuspension;
        protected $txtDuracionSuspension;
        protected $chkMesaGestion;
        protected $txtObservaciones;

        // Controls that allow the viewing of ConflictoHabitacional's individual data fields
        protected $lblIdFolio;
        protected $lblIntervinoArea;
        protected $lblFueroInterviniente;
        protected $lblJuzgadoInterviniente;
        protected $lblCaratulaExpediente;
        protected $lblMinisterioDesarrollo;
        protected $lblMinisterioDesarrolloReferente;
        protected $lblDefensorPueblo;
        protected $lblDefensorPuebloReferente;
        protected $lblSecretariaNacional;
        protected $lblSecretariaNacionalReferente;
        protected $lblMunicipalidad;
        protected $lblMunicipalidadReferente;
        protected $lblOrganizacionBarrial;
        protected $lblOrganizacionBarrialReferente;
        protected $lblOtrosOrganismos;
        protected $lblOrdenDesalojo;
        protected $lblFechaEjecucion;
        protected $lblSuspensionHecho;
        protected $lblSolicitudSuspension;
        protected $lblFechaSuspension;
        protected $lblDuracionSuspension;
        protected $lblMesaGestion;
        protected $lblObservaciones;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * ConflictoHabitacionalMetaControl to edit a single ConflictoHabitacional object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single ConflictoHabitacional object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ConflictoHabitacionalMetaControl
         * @param ConflictoHabitacional $objConflictoHabitacional new or existing ConflictoHabitacional object
         */
         public function __construct($objParentObject, ConflictoHabitacional $objConflictoHabitacional) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this ConflictoHabitacionalMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked ConflictoHabitacional object
            $this->objConflictoHabitacional = $objConflictoHabitacional;

            // Figure out if we're Editing or Creating New
            if ($this->objConflictoHabitacional->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this ConflictoHabitacionalMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing ConflictoHabitacional object creation - defaults to CreateOrEdit
          * @return ConflictoHabitacionalMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objConflictoHabitacional = ConflictoHabitacional::Load($intId);

                // ConflictoHabitacional was found -- return it!
                if ($objConflictoHabitacional)
                    return new ConflictoHabitacionalMetaControl($objParentObject, $objConflictoHabitacional);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a ConflictoHabitacional object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new ConflictoHabitacionalMetaControl($objParentObject, new ConflictoHabitacional());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ConflictoHabitacionalMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing ConflictoHabitacional object creation - defaults to CreateOrEdit
         * @return ConflictoHabitacionalMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return ConflictoHabitacionalMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ConflictoHabitacionalMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing ConflictoHabitacional object creation - defaults to CreateOrEdit
         * @return ConflictoHabitacionalMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return ConflictoHabitacionalMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objConflictoHabitacional->Id;
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
            if($this->objConflictoHabitacional->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objConflictoHabitacional->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objConflictoHabitacional->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objConflictoHabitacional->IdFolioObject) ? $this->objConflictoHabitacional->IdFolioObject->__toString() : null;
            $this->lblIdFolio->Required = true;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkIntervinoArea
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkIntervinoArea_Create($strControlId = null) {
            $this->chkIntervinoArea = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkIntervinoArea->Name = QApplication::Translate('IntervinoArea');
            $this->chkIntervinoArea->Checked = $this->objConflictoHabitacional->IntervinoArea;
                        return $this->chkIntervinoArea;
        }

        /**
         * Create and setup QLabel lblIntervinoArea
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIntervinoArea_Create($strControlId = null) {
            $this->lblIntervinoArea = new QLabel($this->objParentObject, $strControlId);
            $this->lblIntervinoArea->Name = QApplication::Translate('IntervinoArea');
            $this->lblIntervinoArea->Text = ($this->objConflictoHabitacional->IntervinoArea) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblIntervinoArea;
        }

        /**
         * Create and setup QTextBox txtFueroInterviniente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFueroInterviniente_Create($strControlId = null) {
            $this->txtFueroInterviniente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFueroInterviniente->Name = QApplication::Translate('FueroInterviniente');
            $this->txtFueroInterviniente->Text = $this->objConflictoHabitacional->FueroInterviniente;
            $this->txtFueroInterviniente->MaxLength = ConflictoHabitacional::FueroIntervinienteMaxLength;
            
            return $this->txtFueroInterviniente;
        }

        /**
         * Create and setup QLabel lblFueroInterviniente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFueroInterviniente_Create($strControlId = null) {
            $this->lblFueroInterviniente = new QLabel($this->objParentObject, $strControlId);
            $this->lblFueroInterviniente->Name = QApplication::Translate('FueroInterviniente');
            $this->lblFueroInterviniente->Text = $this->objConflictoHabitacional->FueroInterviniente;
            return $this->lblFueroInterviniente;
        }

        /**
         * Create and setup QTextBox txtJuzgadoInterviniente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtJuzgadoInterviniente_Create($strControlId = null) {
            $this->txtJuzgadoInterviniente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtJuzgadoInterviniente->Name = QApplication::Translate('JuzgadoInterviniente');
            $this->txtJuzgadoInterviniente->Text = $this->objConflictoHabitacional->JuzgadoInterviniente;
            $this->txtJuzgadoInterviniente->MaxLength = ConflictoHabitacional::JuzgadoIntervinienteMaxLength;
            
            return $this->txtJuzgadoInterviniente;
        }

        /**
         * Create and setup QLabel lblJuzgadoInterviniente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblJuzgadoInterviniente_Create($strControlId = null) {
            $this->lblJuzgadoInterviniente = new QLabel($this->objParentObject, $strControlId);
            $this->lblJuzgadoInterviniente->Name = QApplication::Translate('JuzgadoInterviniente');
            $this->lblJuzgadoInterviniente->Text = $this->objConflictoHabitacional->JuzgadoInterviniente;
            return $this->lblJuzgadoInterviniente;
        }

        /**
         * Create and setup QTextBox txtCaratulaExpediente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCaratulaExpediente_Create($strControlId = null) {
            $this->txtCaratulaExpediente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCaratulaExpediente->Name = QApplication::Translate('CaratulaExpediente');
            $this->txtCaratulaExpediente->Text = $this->objConflictoHabitacional->CaratulaExpediente;
            $this->txtCaratulaExpediente->MaxLength = ConflictoHabitacional::CaratulaExpedienteMaxLength;
            
            return $this->txtCaratulaExpediente;
        }

        /**
         * Create and setup QLabel lblCaratulaExpediente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCaratulaExpediente_Create($strControlId = null) {
            $this->lblCaratulaExpediente = new QLabel($this->objParentObject, $strControlId);
            $this->lblCaratulaExpediente->Name = QApplication::Translate('CaratulaExpediente');
            $this->lblCaratulaExpediente->Text = $this->objConflictoHabitacional->CaratulaExpediente;
            return $this->lblCaratulaExpediente;
        }

        /**
         * Create and setup QCheckBox chkMinisterioDesarrollo
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkMinisterioDesarrollo_Create($strControlId = null) {
            $this->chkMinisterioDesarrollo = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkMinisterioDesarrollo->Name = QApplication::Translate('MinisterioDesarrollo');
            $this->chkMinisterioDesarrollo->Checked = $this->objConflictoHabitacional->MinisterioDesarrollo;
                        return $this->chkMinisterioDesarrollo;
        }

        /**
         * Create and setup QLabel lblMinisterioDesarrollo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMinisterioDesarrollo_Create($strControlId = null) {
            $this->lblMinisterioDesarrollo = new QLabel($this->objParentObject, $strControlId);
            $this->lblMinisterioDesarrollo->Name = QApplication::Translate('MinisterioDesarrollo');
            $this->lblMinisterioDesarrollo->Text = ($this->objConflictoHabitacional->MinisterioDesarrollo) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblMinisterioDesarrollo;
        }

        /**
         * Create and setup QTextBox txtMinisterioDesarrolloReferente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtMinisterioDesarrolloReferente_Create($strControlId = null) {
            $this->txtMinisterioDesarrolloReferente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtMinisterioDesarrolloReferente->Name = QApplication::Translate('MinisterioDesarrolloReferente');
            $this->txtMinisterioDesarrolloReferente->Text = $this->objConflictoHabitacional->MinisterioDesarrolloReferente;
            $this->txtMinisterioDesarrolloReferente->MaxLength = ConflictoHabitacional::MinisterioDesarrolloReferenteMaxLength;
            
            return $this->txtMinisterioDesarrolloReferente;
        }

        /**
         * Create and setup QLabel lblMinisterioDesarrolloReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMinisterioDesarrolloReferente_Create($strControlId = null) {
            $this->lblMinisterioDesarrolloReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblMinisterioDesarrolloReferente->Name = QApplication::Translate('MinisterioDesarrolloReferente');
            $this->lblMinisterioDesarrolloReferente->Text = $this->objConflictoHabitacional->MinisterioDesarrolloReferente;
            return $this->lblMinisterioDesarrolloReferente;
        }

        /**
         * Create and setup QCheckBox chkDefensorPueblo
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkDefensorPueblo_Create($strControlId = null) {
            $this->chkDefensorPueblo = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkDefensorPueblo->Name = QApplication::Translate('DefensorPueblo');
            $this->chkDefensorPueblo->Checked = $this->objConflictoHabitacional->DefensorPueblo;
                        return $this->chkDefensorPueblo;
        }

        /**
         * Create and setup QLabel lblDefensorPueblo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDefensorPueblo_Create($strControlId = null) {
            $this->lblDefensorPueblo = new QLabel($this->objParentObject, $strControlId);
            $this->lblDefensorPueblo->Name = QApplication::Translate('DefensorPueblo');
            $this->lblDefensorPueblo->Text = ($this->objConflictoHabitacional->DefensorPueblo) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblDefensorPueblo;
        }

        /**
         * Create and setup QTextBox txtDefensorPuebloReferente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDefensorPuebloReferente_Create($strControlId = null) {
            $this->txtDefensorPuebloReferente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDefensorPuebloReferente->Name = QApplication::Translate('DefensorPuebloReferente');
            $this->txtDefensorPuebloReferente->Text = $this->objConflictoHabitacional->DefensorPuebloReferente;
            $this->txtDefensorPuebloReferente->MaxLength = ConflictoHabitacional::DefensorPuebloReferenteMaxLength;
            
            return $this->txtDefensorPuebloReferente;
        }

        /**
         * Create and setup QLabel lblDefensorPuebloReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDefensorPuebloReferente_Create($strControlId = null) {
            $this->lblDefensorPuebloReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblDefensorPuebloReferente->Name = QApplication::Translate('DefensorPuebloReferente');
            $this->lblDefensorPuebloReferente->Text = $this->objConflictoHabitacional->DefensorPuebloReferente;
            return $this->lblDefensorPuebloReferente;
        }

        /**
         * Create and setup QCheckBox chkSecretariaNacional
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSecretariaNacional_Create($strControlId = null) {
            $this->chkSecretariaNacional = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSecretariaNacional->Name = QApplication::Translate('SecretariaNacional');
            $this->chkSecretariaNacional->Checked = $this->objConflictoHabitacional->SecretariaNacional;
                        return $this->chkSecretariaNacional;
        }

        /**
         * Create and setup QLabel lblSecretariaNacional
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSecretariaNacional_Create($strControlId = null) {
            $this->lblSecretariaNacional = new QLabel($this->objParentObject, $strControlId);
            $this->lblSecretariaNacional->Name = QApplication::Translate('SecretariaNacional');
            $this->lblSecretariaNacional->Text = ($this->objConflictoHabitacional->SecretariaNacional) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSecretariaNacional;
        }

        /**
         * Create and setup QTextBox txtSecretariaNacionalReferente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtSecretariaNacionalReferente_Create($strControlId = null) {
            $this->txtSecretariaNacionalReferente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtSecretariaNacionalReferente->Name = QApplication::Translate('SecretariaNacionalReferente');
            $this->txtSecretariaNacionalReferente->Text = $this->objConflictoHabitacional->SecretariaNacionalReferente;
            $this->txtSecretariaNacionalReferente->MaxLength = ConflictoHabitacional::SecretariaNacionalReferenteMaxLength;
            
            return $this->txtSecretariaNacionalReferente;
        }

        /**
         * Create and setup QLabel lblSecretariaNacionalReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSecretariaNacionalReferente_Create($strControlId = null) {
            $this->lblSecretariaNacionalReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblSecretariaNacionalReferente->Name = QApplication::Translate('SecretariaNacionalReferente');
            $this->lblSecretariaNacionalReferente->Text = $this->objConflictoHabitacional->SecretariaNacionalReferente;
            return $this->lblSecretariaNacionalReferente;
        }

        /**
         * Create and setup QCheckBox chkMunicipalidad
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkMunicipalidad_Create($strControlId = null) {
            $this->chkMunicipalidad = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkMunicipalidad->Name = QApplication::Translate('Municipalidad');
            $this->chkMunicipalidad->Checked = $this->objConflictoHabitacional->Municipalidad;
                        return $this->chkMunicipalidad;
        }

        /**
         * Create and setup QLabel lblMunicipalidad
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMunicipalidad_Create($strControlId = null) {
            $this->lblMunicipalidad = new QLabel($this->objParentObject, $strControlId);
            $this->lblMunicipalidad->Name = QApplication::Translate('Municipalidad');
            $this->lblMunicipalidad->Text = ($this->objConflictoHabitacional->Municipalidad) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblMunicipalidad;
        }

        /**
         * Create and setup QTextBox txtMunicipalidadReferente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtMunicipalidadReferente_Create($strControlId = null) {
            $this->txtMunicipalidadReferente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtMunicipalidadReferente->Name = QApplication::Translate('MunicipalidadReferente');
            $this->txtMunicipalidadReferente->Text = $this->objConflictoHabitacional->MunicipalidadReferente;
            $this->txtMunicipalidadReferente->MaxLength = ConflictoHabitacional::MunicipalidadReferenteMaxLength;
            
            return $this->txtMunicipalidadReferente;
        }

        /**
         * Create and setup QLabel lblMunicipalidadReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMunicipalidadReferente_Create($strControlId = null) {
            $this->lblMunicipalidadReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblMunicipalidadReferente->Name = QApplication::Translate('MunicipalidadReferente');
            $this->lblMunicipalidadReferente->Text = $this->objConflictoHabitacional->MunicipalidadReferente;
            return $this->lblMunicipalidadReferente;
        }

        /**
         * Create and setup QCheckBox chkOrganizacionBarrial
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkOrganizacionBarrial_Create($strControlId = null) {
            $this->chkOrganizacionBarrial = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkOrganizacionBarrial->Name = QApplication::Translate('OrganizacionBarrial');
            $this->chkOrganizacionBarrial->Checked = $this->objConflictoHabitacional->OrganizacionBarrial;
                        return $this->chkOrganizacionBarrial;
        }

        /**
         * Create and setup QLabel lblOrganizacionBarrial
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOrganizacionBarrial_Create($strControlId = null) {
            $this->lblOrganizacionBarrial = new QLabel($this->objParentObject, $strControlId);
            $this->lblOrganizacionBarrial->Name = QApplication::Translate('OrganizacionBarrial');
            $this->lblOrganizacionBarrial->Text = ($this->objConflictoHabitacional->OrganizacionBarrial) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblOrganizacionBarrial;
        }

        /**
         * Create and setup QTextBox txtOrganizacionBarrialReferente
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOrganizacionBarrialReferente_Create($strControlId = null) {
            $this->txtOrganizacionBarrialReferente = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOrganizacionBarrialReferente->Name = QApplication::Translate('OrganizacionBarrialReferente');
            $this->txtOrganizacionBarrialReferente->Text = $this->objConflictoHabitacional->OrganizacionBarrialReferente;
            $this->txtOrganizacionBarrialReferente->MaxLength = ConflictoHabitacional::OrganizacionBarrialReferenteMaxLength;
            
            return $this->txtOrganizacionBarrialReferente;
        }

        /**
         * Create and setup QLabel lblOrganizacionBarrialReferente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOrganizacionBarrialReferente_Create($strControlId = null) {
            $this->lblOrganizacionBarrialReferente = new QLabel($this->objParentObject, $strControlId);
            $this->lblOrganizacionBarrialReferente->Name = QApplication::Translate('OrganizacionBarrialReferente');
            $this->lblOrganizacionBarrialReferente->Text = $this->objConflictoHabitacional->OrganizacionBarrialReferente;
            return $this->lblOrganizacionBarrialReferente;
        }

        /**
         * Create and setup QTextBox txtOtrosOrganismos
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOtrosOrganismos_Create($strControlId = null) {
            $this->txtOtrosOrganismos = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOtrosOrganismos->Name = QApplication::Translate('OtrosOrganismos');
            $this->txtOtrosOrganismos->Text = $this->objConflictoHabitacional->OtrosOrganismos;
            $this->txtOtrosOrganismos->TextMode = QTextMode::MultiLine;
            
            return $this->txtOtrosOrganismos;
        }

        /**
         * Create and setup QLabel lblOtrosOrganismos
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOtrosOrganismos_Create($strControlId = null) {
            $this->lblOtrosOrganismos = new QLabel($this->objParentObject, $strControlId);
            $this->lblOtrosOrganismos->Name = QApplication::Translate('OtrosOrganismos');
            $this->lblOtrosOrganismos->Text = $this->objConflictoHabitacional->OtrosOrganismos;
            return $this->lblOtrosOrganismos;
        }

        /**
         * Create and setup QCheckBox chkOrdenDesalojo
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkOrdenDesalojo_Create($strControlId = null) {
            $this->chkOrdenDesalojo = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkOrdenDesalojo->Name = QApplication::Translate('OrdenDesalojo');
            $this->chkOrdenDesalojo->Checked = $this->objConflictoHabitacional->OrdenDesalojo;
                        return $this->chkOrdenDesalojo;
        }

        /**
         * Create and setup QLabel lblOrdenDesalojo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOrdenDesalojo_Create($strControlId = null) {
            $this->lblOrdenDesalojo = new QLabel($this->objParentObject, $strControlId);
            $this->lblOrdenDesalojo->Name = QApplication::Translate('OrdenDesalojo');
            $this->lblOrdenDesalojo->Text = ($this->objConflictoHabitacional->OrdenDesalojo) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblOrdenDesalojo;
        }

        /**
         * Create and setup QTextBox txtFechaEjecucion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFechaEjecucion_Create($strControlId = null) {
            $this->txtFechaEjecucion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFechaEjecucion->Name = QApplication::Translate('FechaEjecucion');
            $this->txtFechaEjecucion->Text = $this->objConflictoHabitacional->FechaEjecucion;
            $this->txtFechaEjecucion->MaxLength = ConflictoHabitacional::FechaEjecucionMaxLength;
            
            return $this->txtFechaEjecucion;
        }

        /**
         * Create and setup QLabel lblFechaEjecucion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFechaEjecucion_Create($strControlId = null) {
            $this->lblFechaEjecucion = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaEjecucion->Name = QApplication::Translate('FechaEjecucion');
            $this->lblFechaEjecucion->Text = $this->objConflictoHabitacional->FechaEjecucion;
            return $this->lblFechaEjecucion;
        }

        /**
         * Create and setup QCheckBox chkSuspensionHecho
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSuspensionHecho_Create($strControlId = null) {
            $this->chkSuspensionHecho = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSuspensionHecho->Name = QApplication::Translate('SuspensionHecho');
            $this->chkSuspensionHecho->Checked = $this->objConflictoHabitacional->SuspensionHecho;
                        return $this->chkSuspensionHecho;
        }

        /**
         * Create and setup QLabel lblSuspensionHecho
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSuspensionHecho_Create($strControlId = null) {
            $this->lblSuspensionHecho = new QLabel($this->objParentObject, $strControlId);
            $this->lblSuspensionHecho->Name = QApplication::Translate('SuspensionHecho');
            $this->lblSuspensionHecho->Text = ($this->objConflictoHabitacional->SuspensionHecho) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSuspensionHecho;
        }

        /**
         * Create and setup QCheckBox chkSolicitudSuspension
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSolicitudSuspension_Create($strControlId = null) {
            $this->chkSolicitudSuspension = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSolicitudSuspension->Name = QApplication::Translate('SolicitudSuspension');
            $this->chkSolicitudSuspension->Checked = $this->objConflictoHabitacional->SolicitudSuspension;
                        return $this->chkSolicitudSuspension;
        }

        /**
         * Create and setup QLabel lblSolicitudSuspension
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSolicitudSuspension_Create($strControlId = null) {
            $this->lblSolicitudSuspension = new QLabel($this->objParentObject, $strControlId);
            $this->lblSolicitudSuspension->Name = QApplication::Translate('SolicitudSuspension');
            $this->lblSolicitudSuspension->Text = ($this->objConflictoHabitacional->SolicitudSuspension) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSolicitudSuspension;
        }

        /**
         * Create and setup QTextBox txtFechaSuspension
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFechaSuspension_Create($strControlId = null) {
            $this->txtFechaSuspension = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFechaSuspension->Name = QApplication::Translate('FechaSuspension');
            $this->txtFechaSuspension->Text = $this->objConflictoHabitacional->FechaSuspension;
            $this->txtFechaSuspension->MaxLength = ConflictoHabitacional::FechaSuspensionMaxLength;
            
            return $this->txtFechaSuspension;
        }

        /**
         * Create and setup QLabel lblFechaSuspension
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFechaSuspension_Create($strControlId = null) {
            $this->lblFechaSuspension = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaSuspension->Name = QApplication::Translate('FechaSuspension');
            $this->lblFechaSuspension->Text = $this->objConflictoHabitacional->FechaSuspension;
            return $this->lblFechaSuspension;
        }

        /**
         * Create and setup QTextBox txtDuracionSuspension
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDuracionSuspension_Create($strControlId = null) {
            $this->txtDuracionSuspension = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDuracionSuspension->Name = QApplication::Translate('DuracionSuspension');
            $this->txtDuracionSuspension->Text = $this->objConflictoHabitacional->DuracionSuspension;
            $this->txtDuracionSuspension->MaxLength = ConflictoHabitacional::DuracionSuspensionMaxLength;
            
            return $this->txtDuracionSuspension;
        }

        /**
         * Create and setup QLabel lblDuracionSuspension
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDuracionSuspension_Create($strControlId = null) {
            $this->lblDuracionSuspension = new QLabel($this->objParentObject, $strControlId);
            $this->lblDuracionSuspension->Name = QApplication::Translate('DuracionSuspension');
            $this->lblDuracionSuspension->Text = $this->objConflictoHabitacional->DuracionSuspension;
            return $this->lblDuracionSuspension;
        }

        /**
         * Create and setup QCheckBox chkMesaGestion
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkMesaGestion_Create($strControlId = null) {
            $this->chkMesaGestion = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkMesaGestion->Name = QApplication::Translate('MesaGestion');
            $this->chkMesaGestion->Checked = $this->objConflictoHabitacional->MesaGestion;
                        return $this->chkMesaGestion;
        }

        /**
         * Create and setup QLabel lblMesaGestion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMesaGestion_Create($strControlId = null) {
            $this->lblMesaGestion = new QLabel($this->objParentObject, $strControlId);
            $this->lblMesaGestion->Name = QApplication::Translate('MesaGestion');
            $this->lblMesaGestion->Text = ($this->objConflictoHabitacional->MesaGestion) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblMesaGestion;
        }

        /**
         * Create and setup QTextBox txtObservaciones
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtObservaciones_Create($strControlId = null) {
            $this->txtObservaciones = new QTextBox($this->objParentObject, $strControlId);
            $this->txtObservaciones->Name = QApplication::Translate('Observaciones');
            $this->txtObservaciones->Text = $this->objConflictoHabitacional->Observaciones;
            $this->txtObservaciones->TextMode = QTextMode::MultiLine;
            
            return $this->txtObservaciones;
        }

        /**
         * Create and setup QLabel lblObservaciones
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblObservaciones_Create($strControlId = null) {
            $this->lblObservaciones = new QLabel($this->objParentObject, $strControlId);
            $this->lblObservaciones->Name = QApplication::Translate('Observaciones');
            $this->lblObservaciones->Text = $this->objConflictoHabitacional->Observaciones;
            return $this->lblObservaciones;
        }





        /**
         * Refresh this MetaControl with Data from the local ConflictoHabitacional object.
         * @param boolean $blnReload reload ConflictoHabitacional from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objConflictoHabitacional->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objConflictoHabitacional->Id;

            if ($this->lstIdFolioObject) {
                if($this->objConflictoHabitacional->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objConflictoHabitacional->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objConflictoHabitacional->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objConflictoHabitacional->IdFolioObject) ? $this->objConflictoHabitacional->IdFolioObject->__toString() : null;

            if ($this->chkIntervinoArea) $this->chkIntervinoArea->Checked = $this->objConflictoHabitacional->IntervinoArea;
            if ($this->lblIntervinoArea) $this->lblIntervinoArea->Text = ($this->objConflictoHabitacional->IntervinoArea) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtFueroInterviniente) $this->txtFueroInterviniente->Text = $this->objConflictoHabitacional->FueroInterviniente;
            if ($this->lblFueroInterviniente) $this->lblFueroInterviniente->Text = $this->objConflictoHabitacional->FueroInterviniente;

            if ($this->txtJuzgadoInterviniente) $this->txtJuzgadoInterviniente->Text = $this->objConflictoHabitacional->JuzgadoInterviniente;
            if ($this->lblJuzgadoInterviniente) $this->lblJuzgadoInterviniente->Text = $this->objConflictoHabitacional->JuzgadoInterviniente;

            if ($this->txtCaratulaExpediente) $this->txtCaratulaExpediente->Text = $this->objConflictoHabitacional->CaratulaExpediente;
            if ($this->lblCaratulaExpediente) $this->lblCaratulaExpediente->Text = $this->objConflictoHabitacional->CaratulaExpediente;

            if ($this->chkMinisterioDesarrollo) $this->chkMinisterioDesarrollo->Checked = $this->objConflictoHabitacional->MinisterioDesarrollo;
            if ($this->lblMinisterioDesarrollo) $this->lblMinisterioDesarrollo->Text = ($this->objConflictoHabitacional->MinisterioDesarrollo) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtMinisterioDesarrolloReferente) $this->txtMinisterioDesarrolloReferente->Text = $this->objConflictoHabitacional->MinisterioDesarrolloReferente;
            if ($this->lblMinisterioDesarrolloReferente) $this->lblMinisterioDesarrolloReferente->Text = $this->objConflictoHabitacional->MinisterioDesarrolloReferente;

            if ($this->chkDefensorPueblo) $this->chkDefensorPueblo->Checked = $this->objConflictoHabitacional->DefensorPueblo;
            if ($this->lblDefensorPueblo) $this->lblDefensorPueblo->Text = ($this->objConflictoHabitacional->DefensorPueblo) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtDefensorPuebloReferente) $this->txtDefensorPuebloReferente->Text = $this->objConflictoHabitacional->DefensorPuebloReferente;
            if ($this->lblDefensorPuebloReferente) $this->lblDefensorPuebloReferente->Text = $this->objConflictoHabitacional->DefensorPuebloReferente;

            if ($this->chkSecretariaNacional) $this->chkSecretariaNacional->Checked = $this->objConflictoHabitacional->SecretariaNacional;
            if ($this->lblSecretariaNacional) $this->lblSecretariaNacional->Text = ($this->objConflictoHabitacional->SecretariaNacional) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtSecretariaNacionalReferente) $this->txtSecretariaNacionalReferente->Text = $this->objConflictoHabitacional->SecretariaNacionalReferente;
            if ($this->lblSecretariaNacionalReferente) $this->lblSecretariaNacionalReferente->Text = $this->objConflictoHabitacional->SecretariaNacionalReferente;

            if ($this->chkMunicipalidad) $this->chkMunicipalidad->Checked = $this->objConflictoHabitacional->Municipalidad;
            if ($this->lblMunicipalidad) $this->lblMunicipalidad->Text = ($this->objConflictoHabitacional->Municipalidad) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtMunicipalidadReferente) $this->txtMunicipalidadReferente->Text = $this->objConflictoHabitacional->MunicipalidadReferente;
            if ($this->lblMunicipalidadReferente) $this->lblMunicipalidadReferente->Text = $this->objConflictoHabitacional->MunicipalidadReferente;

            if ($this->chkOrganizacionBarrial) $this->chkOrganizacionBarrial->Checked = $this->objConflictoHabitacional->OrganizacionBarrial;
            if ($this->lblOrganizacionBarrial) $this->lblOrganizacionBarrial->Text = ($this->objConflictoHabitacional->OrganizacionBarrial) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtOrganizacionBarrialReferente) $this->txtOrganizacionBarrialReferente->Text = $this->objConflictoHabitacional->OrganizacionBarrialReferente;
            if ($this->lblOrganizacionBarrialReferente) $this->lblOrganizacionBarrialReferente->Text = $this->objConflictoHabitacional->OrganizacionBarrialReferente;

            if ($this->txtOtrosOrganismos) $this->txtOtrosOrganismos->Text = $this->objConflictoHabitacional->OtrosOrganismos;
            if ($this->lblOtrosOrganismos) $this->lblOtrosOrganismos->Text = $this->objConflictoHabitacional->OtrosOrganismos;

            if ($this->chkOrdenDesalojo) $this->chkOrdenDesalojo->Checked = $this->objConflictoHabitacional->OrdenDesalojo;
            if ($this->lblOrdenDesalojo) $this->lblOrdenDesalojo->Text = ($this->objConflictoHabitacional->OrdenDesalojo) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtFechaEjecucion) $this->txtFechaEjecucion->Text = $this->objConflictoHabitacional->FechaEjecucion;
            if ($this->lblFechaEjecucion) $this->lblFechaEjecucion->Text = $this->objConflictoHabitacional->FechaEjecucion;

            if ($this->chkSuspensionHecho) $this->chkSuspensionHecho->Checked = $this->objConflictoHabitacional->SuspensionHecho;
            if ($this->lblSuspensionHecho) $this->lblSuspensionHecho->Text = ($this->objConflictoHabitacional->SuspensionHecho) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkSolicitudSuspension) $this->chkSolicitudSuspension->Checked = $this->objConflictoHabitacional->SolicitudSuspension;
            if ($this->lblSolicitudSuspension) $this->lblSolicitudSuspension->Text = ($this->objConflictoHabitacional->SolicitudSuspension) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtFechaSuspension) $this->txtFechaSuspension->Text = $this->objConflictoHabitacional->FechaSuspension;
            if ($this->lblFechaSuspension) $this->lblFechaSuspension->Text = $this->objConflictoHabitacional->FechaSuspension;

            if ($this->txtDuracionSuspension) $this->txtDuracionSuspension->Text = $this->objConflictoHabitacional->DuracionSuspension;
            if ($this->lblDuracionSuspension) $this->lblDuracionSuspension->Text = $this->objConflictoHabitacional->DuracionSuspension;

            if ($this->chkMesaGestion) $this->chkMesaGestion->Checked = $this->objConflictoHabitacional->MesaGestion;
            if ($this->lblMesaGestion) $this->lblMesaGestion->Text = ($this->objConflictoHabitacional->MesaGestion) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtObservaciones) $this->txtObservaciones->Text = $this->objConflictoHabitacional->Observaciones;
            if ($this->lblObservaciones) $this->lblObservaciones->Text = $this->objConflictoHabitacional->Observaciones;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC CONFLICTOHABITACIONAL OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objConflictoHabitacional->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkIntervinoArea) $this->objConflictoHabitacional->IntervinoArea = $this->chkIntervinoArea->Checked;
                if ($this->txtFueroInterviniente) $this->objConflictoHabitacional->FueroInterviniente = $this->txtFueroInterviniente->Text;
                if ($this->txtJuzgadoInterviniente) $this->objConflictoHabitacional->JuzgadoInterviniente = $this->txtJuzgadoInterviniente->Text;
                if ($this->txtCaratulaExpediente) $this->objConflictoHabitacional->CaratulaExpediente = $this->txtCaratulaExpediente->Text;
                if ($this->chkMinisterioDesarrollo) $this->objConflictoHabitacional->MinisterioDesarrollo = $this->chkMinisterioDesarrollo->Checked;
                if ($this->txtMinisterioDesarrolloReferente) $this->objConflictoHabitacional->MinisterioDesarrolloReferente = $this->txtMinisterioDesarrolloReferente->Text;
                if ($this->chkDefensorPueblo) $this->objConflictoHabitacional->DefensorPueblo = $this->chkDefensorPueblo->Checked;
                if ($this->txtDefensorPuebloReferente) $this->objConflictoHabitacional->DefensorPuebloReferente = $this->txtDefensorPuebloReferente->Text;
                if ($this->chkSecretariaNacional) $this->objConflictoHabitacional->SecretariaNacional = $this->chkSecretariaNacional->Checked;
                if ($this->txtSecretariaNacionalReferente) $this->objConflictoHabitacional->SecretariaNacionalReferente = $this->txtSecretariaNacionalReferente->Text;
                if ($this->chkMunicipalidad) $this->objConflictoHabitacional->Municipalidad = $this->chkMunicipalidad->Checked;
                if ($this->txtMunicipalidadReferente) $this->objConflictoHabitacional->MunicipalidadReferente = $this->txtMunicipalidadReferente->Text;
                if ($this->chkOrganizacionBarrial) $this->objConflictoHabitacional->OrganizacionBarrial = $this->chkOrganizacionBarrial->Checked;
                if ($this->txtOrganizacionBarrialReferente) $this->objConflictoHabitacional->OrganizacionBarrialReferente = $this->txtOrganizacionBarrialReferente->Text;
                if ($this->txtOtrosOrganismos) $this->objConflictoHabitacional->OtrosOrganismos = $this->txtOtrosOrganismos->Text;
                if ($this->chkOrdenDesalojo) $this->objConflictoHabitacional->OrdenDesalojo = $this->chkOrdenDesalojo->Checked;
                if ($this->txtFechaEjecucion) $this->objConflictoHabitacional->FechaEjecucion = $this->txtFechaEjecucion->Text;
                if ($this->chkSuspensionHecho) $this->objConflictoHabitacional->SuspensionHecho = $this->chkSuspensionHecho->Checked;
                if ($this->chkSolicitudSuspension) $this->objConflictoHabitacional->SolicitudSuspension = $this->chkSolicitudSuspension->Checked;
                if ($this->txtFechaSuspension) $this->objConflictoHabitacional->FechaSuspension = $this->txtFechaSuspension->Text;
                if ($this->txtDuracionSuspension) $this->objConflictoHabitacional->DuracionSuspension = $this->txtDuracionSuspension->Text;
                if ($this->chkMesaGestion) $this->objConflictoHabitacional->MesaGestion = $this->chkMesaGestion->Checked;
                if ($this->txtObservaciones) $this->objConflictoHabitacional->Observaciones = $this->txtObservaciones->Text;


        }

        public function SaveConflictoHabitacional() {
            return $this->Save();
        }
        /**
         * This will save this object's ConflictoHabitacional instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the ConflictoHabitacional object
                $idReturn = $this->objConflictoHabitacional->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's ConflictoHabitacional instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteConflictoHabitacional() {
            $this->objConflictoHabitacional->Delete();
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
                case 'ConflictoHabitacional': return $this->objConflictoHabitacional;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to ConflictoHabitacional fields -- will be created dynamically if not yet created
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
                case 'IntervinoAreaControl':
                    if (!$this->chkIntervinoArea) return $this->chkIntervinoArea_Create();
                    return $this->chkIntervinoArea;
                case 'IntervinoAreaLabel':
                    if (!$this->lblIntervinoArea) return $this->lblIntervinoArea_Create();
                    return $this->lblIntervinoArea;
                case 'FueroIntervinienteControl':
                    if (!$this->txtFueroInterviniente) return $this->txtFueroInterviniente_Create();
                    return $this->txtFueroInterviniente;
                case 'FueroIntervinienteLabel':
                    if (!$this->lblFueroInterviniente) return $this->lblFueroInterviniente_Create();
                    return $this->lblFueroInterviniente;
                case 'JuzgadoIntervinienteControl':
                    if (!$this->txtJuzgadoInterviniente) return $this->txtJuzgadoInterviniente_Create();
                    return $this->txtJuzgadoInterviniente;
                case 'JuzgadoIntervinienteLabel':
                    if (!$this->lblJuzgadoInterviniente) return $this->lblJuzgadoInterviniente_Create();
                    return $this->lblJuzgadoInterviniente;
                case 'CaratulaExpedienteControl':
                    if (!$this->txtCaratulaExpediente) return $this->txtCaratulaExpediente_Create();
                    return $this->txtCaratulaExpediente;
                case 'CaratulaExpedienteLabel':
                    if (!$this->lblCaratulaExpediente) return $this->lblCaratulaExpediente_Create();
                    return $this->lblCaratulaExpediente;
                case 'MinisterioDesarrolloControl':
                    if (!$this->chkMinisterioDesarrollo) return $this->chkMinisterioDesarrollo_Create();
                    return $this->chkMinisterioDesarrollo;
                case 'MinisterioDesarrolloLabel':
                    if (!$this->lblMinisterioDesarrollo) return $this->lblMinisterioDesarrollo_Create();
                    return $this->lblMinisterioDesarrollo;
                case 'MinisterioDesarrolloReferenteControl':
                    if (!$this->txtMinisterioDesarrolloReferente) return $this->txtMinisterioDesarrolloReferente_Create();
                    return $this->txtMinisterioDesarrolloReferente;
                case 'MinisterioDesarrolloReferenteLabel':
                    if (!$this->lblMinisterioDesarrolloReferente) return $this->lblMinisterioDesarrolloReferente_Create();
                    return $this->lblMinisterioDesarrolloReferente;
                case 'DefensorPuebloControl':
                    if (!$this->chkDefensorPueblo) return $this->chkDefensorPueblo_Create();
                    return $this->chkDefensorPueblo;
                case 'DefensorPuebloLabel':
                    if (!$this->lblDefensorPueblo) return $this->lblDefensorPueblo_Create();
                    return $this->lblDefensorPueblo;
                case 'DefensorPuebloReferenteControl':
                    if (!$this->txtDefensorPuebloReferente) return $this->txtDefensorPuebloReferente_Create();
                    return $this->txtDefensorPuebloReferente;
                case 'DefensorPuebloReferenteLabel':
                    if (!$this->lblDefensorPuebloReferente) return $this->lblDefensorPuebloReferente_Create();
                    return $this->lblDefensorPuebloReferente;
                case 'SecretariaNacionalControl':
                    if (!$this->chkSecretariaNacional) return $this->chkSecretariaNacional_Create();
                    return $this->chkSecretariaNacional;
                case 'SecretariaNacionalLabel':
                    if (!$this->lblSecretariaNacional) return $this->lblSecretariaNacional_Create();
                    return $this->lblSecretariaNacional;
                case 'SecretariaNacionalReferenteControl':
                    if (!$this->txtSecretariaNacionalReferente) return $this->txtSecretariaNacionalReferente_Create();
                    return $this->txtSecretariaNacionalReferente;
                case 'SecretariaNacionalReferenteLabel':
                    if (!$this->lblSecretariaNacionalReferente) return $this->lblSecretariaNacionalReferente_Create();
                    return $this->lblSecretariaNacionalReferente;
                case 'MunicipalidadControl':
                    if (!$this->chkMunicipalidad) return $this->chkMunicipalidad_Create();
                    return $this->chkMunicipalidad;
                case 'MunicipalidadLabel':
                    if (!$this->lblMunicipalidad) return $this->lblMunicipalidad_Create();
                    return $this->lblMunicipalidad;
                case 'MunicipalidadReferenteControl':
                    if (!$this->txtMunicipalidadReferente) return $this->txtMunicipalidadReferente_Create();
                    return $this->txtMunicipalidadReferente;
                case 'MunicipalidadReferenteLabel':
                    if (!$this->lblMunicipalidadReferente) return $this->lblMunicipalidadReferente_Create();
                    return $this->lblMunicipalidadReferente;
                case 'OrganizacionBarrialControl':
                    if (!$this->chkOrganizacionBarrial) return $this->chkOrganizacionBarrial_Create();
                    return $this->chkOrganizacionBarrial;
                case 'OrganizacionBarrialLabel':
                    if (!$this->lblOrganizacionBarrial) return $this->lblOrganizacionBarrial_Create();
                    return $this->lblOrganizacionBarrial;
                case 'OrganizacionBarrialReferenteControl':
                    if (!$this->txtOrganizacionBarrialReferente) return $this->txtOrganizacionBarrialReferente_Create();
                    return $this->txtOrganizacionBarrialReferente;
                case 'OrganizacionBarrialReferenteLabel':
                    if (!$this->lblOrganizacionBarrialReferente) return $this->lblOrganizacionBarrialReferente_Create();
                    return $this->lblOrganizacionBarrialReferente;
                case 'OtrosOrganismosControl':
                    if (!$this->txtOtrosOrganismos) return $this->txtOtrosOrganismos_Create();
                    return $this->txtOtrosOrganismos;
                case 'OtrosOrganismosLabel':
                    if (!$this->lblOtrosOrganismos) return $this->lblOtrosOrganismos_Create();
                    return $this->lblOtrosOrganismos;
                case 'OrdenDesalojoControl':
                    if (!$this->chkOrdenDesalojo) return $this->chkOrdenDesalojo_Create();
                    return $this->chkOrdenDesalojo;
                case 'OrdenDesalojoLabel':
                    if (!$this->lblOrdenDesalojo) return $this->lblOrdenDesalojo_Create();
                    return $this->lblOrdenDesalojo;
                case 'FechaEjecucionControl':
                    if (!$this->txtFechaEjecucion) return $this->txtFechaEjecucion_Create();
                    return $this->txtFechaEjecucion;
                case 'FechaEjecucionLabel':
                    if (!$this->lblFechaEjecucion) return $this->lblFechaEjecucion_Create();
                    return $this->lblFechaEjecucion;
                case 'SuspensionHechoControl':
                    if (!$this->chkSuspensionHecho) return $this->chkSuspensionHecho_Create();
                    return $this->chkSuspensionHecho;
                case 'SuspensionHechoLabel':
                    if (!$this->lblSuspensionHecho) return $this->lblSuspensionHecho_Create();
                    return $this->lblSuspensionHecho;
                case 'SolicitudSuspensionControl':
                    if (!$this->chkSolicitudSuspension) return $this->chkSolicitudSuspension_Create();
                    return $this->chkSolicitudSuspension;
                case 'SolicitudSuspensionLabel':
                    if (!$this->lblSolicitudSuspension) return $this->lblSolicitudSuspension_Create();
                    return $this->lblSolicitudSuspension;
                case 'FechaSuspensionControl':
                    if (!$this->txtFechaSuspension) return $this->txtFechaSuspension_Create();
                    return $this->txtFechaSuspension;
                case 'FechaSuspensionLabel':
                    if (!$this->lblFechaSuspension) return $this->lblFechaSuspension_Create();
                    return $this->lblFechaSuspension;
                case 'DuracionSuspensionControl':
                    if (!$this->txtDuracionSuspension) return $this->txtDuracionSuspension_Create();
                    return $this->txtDuracionSuspension;
                case 'DuracionSuspensionLabel':
                    if (!$this->lblDuracionSuspension) return $this->lblDuracionSuspension_Create();
                    return $this->lblDuracionSuspension;
                case 'MesaGestionControl':
                    if (!$this->chkMesaGestion) return $this->chkMesaGestion_Create();
                    return $this->chkMesaGestion;
                case 'MesaGestionLabel':
                    if (!$this->lblMesaGestion) return $this->lblMesaGestion_Create();
                    return $this->lblMesaGestion;
                case 'ObservacionesControl':
                    if (!$this->txtObservaciones) return $this->txtObservaciones_Create();
                    return $this->txtObservaciones;
                case 'ObservacionesLabel':
                    if (!$this->lblObservaciones) return $this->lblObservaciones_Create();
                    return $this->lblObservaciones;
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
                    // Controls that point to ConflictoHabitacional fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'IntervinoAreaControl':
                        return ($this->chkIntervinoArea = QType::Cast($mixValue, 'QControl'));
                    case 'FueroIntervinienteControl':
                        return ($this->txtFueroInterviniente = QType::Cast($mixValue, 'QControl'));
                    case 'JuzgadoIntervinienteControl':
                        return ($this->txtJuzgadoInterviniente = QType::Cast($mixValue, 'QControl'));
                    case 'CaratulaExpedienteControl':
                        return ($this->txtCaratulaExpediente = QType::Cast($mixValue, 'QControl'));
                    case 'MinisterioDesarrolloControl':
                        return ($this->chkMinisterioDesarrollo = QType::Cast($mixValue, 'QControl'));
                    case 'MinisterioDesarrolloReferenteControl':
                        return ($this->txtMinisterioDesarrolloReferente = QType::Cast($mixValue, 'QControl'));
                    case 'DefensorPuebloControl':
                        return ($this->chkDefensorPueblo = QType::Cast($mixValue, 'QControl'));
                    case 'DefensorPuebloReferenteControl':
                        return ($this->txtDefensorPuebloReferente = QType::Cast($mixValue, 'QControl'));
                    case 'SecretariaNacionalControl':
                        return ($this->chkSecretariaNacional = QType::Cast($mixValue, 'QControl'));
                    case 'SecretariaNacionalReferenteControl':
                        return ($this->txtSecretariaNacionalReferente = QType::Cast($mixValue, 'QControl'));
                    case 'MunicipalidadControl':
                        return ($this->chkMunicipalidad = QType::Cast($mixValue, 'QControl'));
                    case 'MunicipalidadReferenteControl':
                        return ($this->txtMunicipalidadReferente = QType::Cast($mixValue, 'QControl'));
                    case 'OrganizacionBarrialControl':
                        return ($this->chkOrganizacionBarrial = QType::Cast($mixValue, 'QControl'));
                    case 'OrganizacionBarrialReferenteControl':
                        return ($this->txtOrganizacionBarrialReferente = QType::Cast($mixValue, 'QControl'));
                    case 'OtrosOrganismosControl':
                        return ($this->txtOtrosOrganismos = QType::Cast($mixValue, 'QControl'));
                    case 'OrdenDesalojoControl':
                        return ($this->chkOrdenDesalojo = QType::Cast($mixValue, 'QControl'));
                    case 'FechaEjecucionControl':
                        return ($this->txtFechaEjecucion = QType::Cast($mixValue, 'QControl'));
                    case 'SuspensionHechoControl':
                        return ($this->chkSuspensionHecho = QType::Cast($mixValue, 'QControl'));
                    case 'SolicitudSuspensionControl':
                        return ($this->chkSolicitudSuspension = QType::Cast($mixValue, 'QControl'));
                    case 'FechaSuspensionControl':
                        return ($this->txtFechaSuspension = QType::Cast($mixValue, 'QControl'));
                    case 'DuracionSuspensionControl':
                        return ($this->txtDuracionSuspension = QType::Cast($mixValue, 'QControl'));
                    case 'MesaGestionControl':
                        return ($this->chkMesaGestion = QType::Cast($mixValue, 'QControl'));
                    case 'ObservacionesControl':
                        return ($this->txtObservaciones = QType::Cast($mixValue, 'QControl'));
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
