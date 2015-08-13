<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the SituacionAmbiental class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single SituacionAmbiental object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a SituacionAmbientalMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read SituacionAmbiental $SituacionAmbiental the actual SituacionAmbiental data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $SinProblemasControl
     * property-read QLabel $SinProblemasLabel
     * property QCheckBox $ReservaElectroductoControl
     * property-read QLabel $ReservaElectroductoLabel
     * property QCheckBox $InundableControl
     * property-read QLabel $InundableLabel
     * property QCheckBox $SobreTerraplenFerroviarioControl
     * property-read QLabel $SobreTerraplenFerroviarioLabel
     * property QCheckBox $SobreCaminoSirgaControl
     * property-read QLabel $SobreCaminoSirgaLabel
     * property QCheckBox $ExpuestoContaminacionIndustrialControl
     * property-read QLabel $ExpuestoContaminacionIndustrialLabel
     * property QCheckBox $SobreSueloDegradadoControl
     * property-read QLabel $SobreSueloDegradadoLabel
     * property QTextBox $OtroControl
     * property-read QLabel $OtroLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class SituacionAmbientalMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var SituacionAmbiental
                */
        public $objSituacionAmbiental;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of SituacionAmbiental's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkSinProblemas;
        protected $chkReservaElectroducto;
        protected $chkInundable;
        protected $chkSobreTerraplenFerroviario;
        protected $chkSobreCaminoSirga;
        protected $chkExpuestoContaminacionIndustrial;
        protected $chkSobreSueloDegradado;
        protected $txtOtro;

        // Controls that allow the viewing of SituacionAmbiental's individual data fields
        protected $lblIdFolio;
        protected $lblSinProblemas;
        protected $lblReservaElectroducto;
        protected $lblInundable;
        protected $lblSobreTerraplenFerroviario;
        protected $lblSobreCaminoSirga;
        protected $lblExpuestoContaminacionIndustrial;
        protected $lblSobreSueloDegradado;
        protected $lblOtro;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * SituacionAmbientalMetaControl to edit a single SituacionAmbiental object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single SituacionAmbiental object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this SituacionAmbientalMetaControl
         * @param SituacionAmbiental $objSituacionAmbiental new or existing SituacionAmbiental object
         */
         public function __construct($objParentObject, SituacionAmbiental $objSituacionAmbiental) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this SituacionAmbientalMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked SituacionAmbiental object
            $this->objSituacionAmbiental = $objSituacionAmbiental;

            // Figure out if we're Editing or Creating New
            if ($this->objSituacionAmbiental->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this SituacionAmbientalMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing SituacionAmbiental object creation - defaults to CreateOrEdit
          * @return SituacionAmbientalMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objSituacionAmbiental = SituacionAmbiental::Load($intId);

                // SituacionAmbiental was found -- return it!
                if ($objSituacionAmbiental)
                    return new SituacionAmbientalMetaControl($objParentObject, $objSituacionAmbiental);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a SituacionAmbiental object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new SituacionAmbientalMetaControl($objParentObject, new SituacionAmbiental());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this SituacionAmbientalMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing SituacionAmbiental object creation - defaults to CreateOrEdit
         * @return SituacionAmbientalMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return SituacionAmbientalMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this SituacionAmbientalMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing SituacionAmbiental object creation - defaults to CreateOrEdit
         * @return SituacionAmbientalMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return SituacionAmbientalMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objSituacionAmbiental->Id;
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
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'CondicionesSocioUrbanisticas', 'Id' , $strControlId);
            if($this->objSituacionAmbiental->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objSituacionAmbiental->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objSituacionAmbiental->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objSituacionAmbiental->IdFolioObject) ? $this->objSituacionAmbiental->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkSinProblemas
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSinProblemas_Create($strControlId = null) {
            $this->chkSinProblemas = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSinProblemas->Name = QApplication::Translate('SinProblemas');
            $this->chkSinProblemas->Checked = $this->objSituacionAmbiental->SinProblemas;
                        return $this->chkSinProblemas;
        }

        /**
         * Create and setup QLabel lblSinProblemas
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSinProblemas_Create($strControlId = null) {
            $this->lblSinProblemas = new QLabel($this->objParentObject, $strControlId);
            $this->lblSinProblemas->Name = QApplication::Translate('SinProblemas');
            $this->lblSinProblemas->Text = ($this->objSituacionAmbiental->SinProblemas) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSinProblemas;
        }

        /**
         * Create and setup QCheckBox chkReservaElectroducto
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkReservaElectroducto_Create($strControlId = null) {
            $this->chkReservaElectroducto = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkReservaElectroducto->Name = QApplication::Translate('ReservaElectroducto');
            $this->chkReservaElectroducto->Checked = $this->objSituacionAmbiental->ReservaElectroducto;
                        return $this->chkReservaElectroducto;
        }

        /**
         * Create and setup QLabel lblReservaElectroducto
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblReservaElectroducto_Create($strControlId = null) {
            $this->lblReservaElectroducto = new QLabel($this->objParentObject, $strControlId);
            $this->lblReservaElectroducto->Name = QApplication::Translate('ReservaElectroducto');
            $this->lblReservaElectroducto->Text = ($this->objSituacionAmbiental->ReservaElectroducto) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblReservaElectroducto;
        }

        /**
         * Create and setup QCheckBox chkInundable
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkInundable_Create($strControlId = null) {
            $this->chkInundable = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkInundable->Name = QApplication::Translate('Inundable');
            $this->chkInundable->Checked = $this->objSituacionAmbiental->Inundable;
                        return $this->chkInundable;
        }

        /**
         * Create and setup QLabel lblInundable
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblInundable_Create($strControlId = null) {
            $this->lblInundable = new QLabel($this->objParentObject, $strControlId);
            $this->lblInundable->Name = QApplication::Translate('Inundable');
            $this->lblInundable->Text = ($this->objSituacionAmbiental->Inundable) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblInundable;
        }

        /**
         * Create and setup QCheckBox chkSobreTerraplenFerroviario
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSobreTerraplenFerroviario_Create($strControlId = null) {
            $this->chkSobreTerraplenFerroviario = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSobreTerraplenFerroviario->Name = QApplication::Translate('SobreTerraplenFerroviario');
            $this->chkSobreTerraplenFerroviario->Checked = $this->objSituacionAmbiental->SobreTerraplenFerroviario;
                        return $this->chkSobreTerraplenFerroviario;
        }

        /**
         * Create and setup QLabel lblSobreTerraplenFerroviario
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSobreTerraplenFerroviario_Create($strControlId = null) {
            $this->lblSobreTerraplenFerroviario = new QLabel($this->objParentObject, $strControlId);
            $this->lblSobreTerraplenFerroviario->Name = QApplication::Translate('SobreTerraplenFerroviario');
            $this->lblSobreTerraplenFerroviario->Text = ($this->objSituacionAmbiental->SobreTerraplenFerroviario) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSobreTerraplenFerroviario;
        }

        /**
         * Create and setup QCheckBox chkSobreCaminoSirga
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSobreCaminoSirga_Create($strControlId = null) {
            $this->chkSobreCaminoSirga = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSobreCaminoSirga->Name = QApplication::Translate('SobreCaminoSirga');
            $this->chkSobreCaminoSirga->Checked = $this->objSituacionAmbiental->SobreCaminoSirga;
                        return $this->chkSobreCaminoSirga;
        }

        /**
         * Create and setup QLabel lblSobreCaminoSirga
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSobreCaminoSirga_Create($strControlId = null) {
            $this->lblSobreCaminoSirga = new QLabel($this->objParentObject, $strControlId);
            $this->lblSobreCaminoSirga->Name = QApplication::Translate('SobreCaminoSirga');
            $this->lblSobreCaminoSirga->Text = ($this->objSituacionAmbiental->SobreCaminoSirga) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSobreCaminoSirga;
        }

        /**
         * Create and setup QCheckBox chkExpuestoContaminacionIndustrial
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkExpuestoContaminacionIndustrial_Create($strControlId = null) {
            $this->chkExpuestoContaminacionIndustrial = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkExpuestoContaminacionIndustrial->Name = QApplication::Translate('ExpuestoContaminacionIndustrial');
            $this->chkExpuestoContaminacionIndustrial->Checked = $this->objSituacionAmbiental->ExpuestoContaminacionIndustrial;
                        return $this->chkExpuestoContaminacionIndustrial;
        }

        /**
         * Create and setup QLabel lblExpuestoContaminacionIndustrial
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblExpuestoContaminacionIndustrial_Create($strControlId = null) {
            $this->lblExpuestoContaminacionIndustrial = new QLabel($this->objParentObject, $strControlId);
            $this->lblExpuestoContaminacionIndustrial->Name = QApplication::Translate('ExpuestoContaminacionIndustrial');
            $this->lblExpuestoContaminacionIndustrial->Text = ($this->objSituacionAmbiental->ExpuestoContaminacionIndustrial) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblExpuestoContaminacionIndustrial;
        }

        /**
         * Create and setup QCheckBox chkSobreSueloDegradado
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSobreSueloDegradado_Create($strControlId = null) {
            $this->chkSobreSueloDegradado = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSobreSueloDegradado->Name = QApplication::Translate('SobreSueloDegradado');
            $this->chkSobreSueloDegradado->Checked = $this->objSituacionAmbiental->SobreSueloDegradado;
                        return $this->chkSobreSueloDegradado;
        }

        /**
         * Create and setup QLabel lblSobreSueloDegradado
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSobreSueloDegradado_Create($strControlId = null) {
            $this->lblSobreSueloDegradado = new QLabel($this->objParentObject, $strControlId);
            $this->lblSobreSueloDegradado->Name = QApplication::Translate('SobreSueloDegradado');
            $this->lblSobreSueloDegradado->Text = ($this->objSituacionAmbiental->SobreSueloDegradado) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSobreSueloDegradado;
        }

        /**
         * Create and setup QTextBox txtOtro
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOtro_Create($strControlId = null) {
            $this->txtOtro = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOtro->Name = QApplication::Translate('Otro');
            $this->txtOtro->Text = $this->objSituacionAmbiental->Otro;
            $this->txtOtro->MaxLength = SituacionAmbiental::OtroMaxLength;
            
            return $this->txtOtro;
        }

        /**
         * Create and setup QLabel lblOtro
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOtro_Create($strControlId = null) {
            $this->lblOtro = new QLabel($this->objParentObject, $strControlId);
            $this->lblOtro->Name = QApplication::Translate('Otro');
            $this->lblOtro->Text = $this->objSituacionAmbiental->Otro;
            return $this->lblOtro;
        }





        /**
         * Refresh this MetaControl with Data from the local SituacionAmbiental object.
         * @param boolean $blnReload reload SituacionAmbiental from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objSituacionAmbiental->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSituacionAmbiental->Id;

            if ($this->lstIdFolioObject) {
                if($this->objSituacionAmbiental->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objSituacionAmbiental->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objSituacionAmbiental->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objSituacionAmbiental->IdFolioObject) ? $this->objSituacionAmbiental->IdFolioObject->__toString() : null;

            if ($this->chkSinProblemas) $this->chkSinProblemas->Checked = $this->objSituacionAmbiental->SinProblemas;
            if ($this->lblSinProblemas) $this->lblSinProblemas->Text = ($this->objSituacionAmbiental->SinProblemas) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkReservaElectroducto) $this->chkReservaElectroducto->Checked = $this->objSituacionAmbiental->ReservaElectroducto;
            if ($this->lblReservaElectroducto) $this->lblReservaElectroducto->Text = ($this->objSituacionAmbiental->ReservaElectroducto) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkInundable) $this->chkInundable->Checked = $this->objSituacionAmbiental->Inundable;
            if ($this->lblInundable) $this->lblInundable->Text = ($this->objSituacionAmbiental->Inundable) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkSobreTerraplenFerroviario) $this->chkSobreTerraplenFerroviario->Checked = $this->objSituacionAmbiental->SobreTerraplenFerroviario;
            if ($this->lblSobreTerraplenFerroviario) $this->lblSobreTerraplenFerroviario->Text = ($this->objSituacionAmbiental->SobreTerraplenFerroviario) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkSobreCaminoSirga) $this->chkSobreCaminoSirga->Checked = $this->objSituacionAmbiental->SobreCaminoSirga;
            if ($this->lblSobreCaminoSirga) $this->lblSobreCaminoSirga->Text = ($this->objSituacionAmbiental->SobreCaminoSirga) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkExpuestoContaminacionIndustrial) $this->chkExpuestoContaminacionIndustrial->Checked = $this->objSituacionAmbiental->ExpuestoContaminacionIndustrial;
            if ($this->lblExpuestoContaminacionIndustrial) $this->lblExpuestoContaminacionIndustrial->Text = ($this->objSituacionAmbiental->ExpuestoContaminacionIndustrial) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkSobreSueloDegradado) $this->chkSobreSueloDegradado->Checked = $this->objSituacionAmbiental->SobreSueloDegradado;
            if ($this->lblSobreSueloDegradado) $this->lblSobreSueloDegradado->Text = ($this->objSituacionAmbiental->SobreSueloDegradado) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtOtro) $this->txtOtro->Text = $this->objSituacionAmbiental->Otro;
            if ($this->lblOtro) $this->lblOtro->Text = $this->objSituacionAmbiental->Otro;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC SITUACIONAMBIENTAL OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objSituacionAmbiental->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkSinProblemas) $this->objSituacionAmbiental->SinProblemas = $this->chkSinProblemas->Checked;
                if ($this->chkReservaElectroducto) $this->objSituacionAmbiental->ReservaElectroducto = $this->chkReservaElectroducto->Checked;
                if ($this->chkInundable) $this->objSituacionAmbiental->Inundable = $this->chkInundable->Checked;
                if ($this->chkSobreTerraplenFerroviario) $this->objSituacionAmbiental->SobreTerraplenFerroviario = $this->chkSobreTerraplenFerroviario->Checked;
                if ($this->chkSobreCaminoSirga) $this->objSituacionAmbiental->SobreCaminoSirga = $this->chkSobreCaminoSirga->Checked;
                if ($this->chkExpuestoContaminacionIndustrial) $this->objSituacionAmbiental->ExpuestoContaminacionIndustrial = $this->chkExpuestoContaminacionIndustrial->Checked;
                if ($this->chkSobreSueloDegradado) $this->objSituacionAmbiental->SobreSueloDegradado = $this->chkSobreSueloDegradado->Checked;
                if ($this->txtOtro) $this->objSituacionAmbiental->Otro = $this->txtOtro->Text;


        }

        public function SaveSituacionAmbiental() {
            return $this->Save();
        }
        /**
         * This will save this object's SituacionAmbiental instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the SituacionAmbiental object
                $idReturn = $this->objSituacionAmbiental->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's SituacionAmbiental instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteSituacionAmbiental() {
            $this->objSituacionAmbiental->Delete();
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
                case 'SituacionAmbiental': return $this->objSituacionAmbiental;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to SituacionAmbiental fields -- will be created dynamically if not yet created
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
                case 'SinProblemasControl':
                    if (!$this->chkSinProblemas) return $this->chkSinProblemas_Create();
                    return $this->chkSinProblemas;
                case 'SinProblemasLabel':
                    if (!$this->lblSinProblemas) return $this->lblSinProblemas_Create();
                    return $this->lblSinProblemas;
                case 'ReservaElectroductoControl':
                    if (!$this->chkReservaElectroducto) return $this->chkReservaElectroducto_Create();
                    return $this->chkReservaElectroducto;
                case 'ReservaElectroductoLabel':
                    if (!$this->lblReservaElectroducto) return $this->lblReservaElectroducto_Create();
                    return $this->lblReservaElectroducto;
                case 'InundableControl':
                    if (!$this->chkInundable) return $this->chkInundable_Create();
                    return $this->chkInundable;
                case 'InundableLabel':
                    if (!$this->lblInundable) return $this->lblInundable_Create();
                    return $this->lblInundable;
                case 'SobreTerraplenFerroviarioControl':
                    if (!$this->chkSobreTerraplenFerroviario) return $this->chkSobreTerraplenFerroviario_Create();
                    return $this->chkSobreTerraplenFerroviario;
                case 'SobreTerraplenFerroviarioLabel':
                    if (!$this->lblSobreTerraplenFerroviario) return $this->lblSobreTerraplenFerroviario_Create();
                    return $this->lblSobreTerraplenFerroviario;
                case 'SobreCaminoSirgaControl':
                    if (!$this->chkSobreCaminoSirga) return $this->chkSobreCaminoSirga_Create();
                    return $this->chkSobreCaminoSirga;
                case 'SobreCaminoSirgaLabel':
                    if (!$this->lblSobreCaminoSirga) return $this->lblSobreCaminoSirga_Create();
                    return $this->lblSobreCaminoSirga;
                case 'ExpuestoContaminacionIndustrialControl':
                    if (!$this->chkExpuestoContaminacionIndustrial) return $this->chkExpuestoContaminacionIndustrial_Create();
                    return $this->chkExpuestoContaminacionIndustrial;
                case 'ExpuestoContaminacionIndustrialLabel':
                    if (!$this->lblExpuestoContaminacionIndustrial) return $this->lblExpuestoContaminacionIndustrial_Create();
                    return $this->lblExpuestoContaminacionIndustrial;
                case 'SobreSueloDegradadoControl':
                    if (!$this->chkSobreSueloDegradado) return $this->chkSobreSueloDegradado_Create();
                    return $this->chkSobreSueloDegradado;
                case 'SobreSueloDegradadoLabel':
                    if (!$this->lblSobreSueloDegradado) return $this->lblSobreSueloDegradado_Create();
                    return $this->lblSobreSueloDegradado;
                case 'OtroControl':
                    if (!$this->txtOtro) return $this->txtOtro_Create();
                    return $this->txtOtro;
                case 'OtroLabel':
                    if (!$this->lblOtro) return $this->lblOtro_Create();
                    return $this->lblOtro;
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
                    // Controls that point to SituacionAmbiental fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'SinProblemasControl':
                        return ($this->chkSinProblemas = QType::Cast($mixValue, 'QControl'));
                    case 'ReservaElectroductoControl':
                        return ($this->chkReservaElectroducto = QType::Cast($mixValue, 'QControl'));
                    case 'InundableControl':
                        return ($this->chkInundable = QType::Cast($mixValue, 'QControl'));
                    case 'SobreTerraplenFerroviarioControl':
                        return ($this->chkSobreTerraplenFerroviario = QType::Cast($mixValue, 'QControl'));
                    case 'SobreCaminoSirgaControl':
                        return ($this->chkSobreCaminoSirga = QType::Cast($mixValue, 'QControl'));
                    case 'ExpuestoContaminacionIndustrialControl':
                        return ($this->chkExpuestoContaminacionIndustrial = QType::Cast($mixValue, 'QControl'));
                    case 'SobreSueloDegradadoControl':
                        return ($this->chkSobreSueloDegradado = QType::Cast($mixValue, 'QControl'));
                    case 'OtroControl':
                        return ($this->txtOtro = QType::Cast($mixValue, 'QControl'));
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
