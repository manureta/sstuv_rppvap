<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the OrganismosDeIntervencion class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single OrganismosDeIntervencion object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a OrganismosDeIntervencionMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read OrganismosDeIntervencion $OrganismosDeIntervencion the actual OrganismosDeIntervencion data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $NacionalControl
     * property-read QLabel $NacionalLabel
     * property QCheckBox $ProvincialControl
     * property-read QLabel $ProvincialLabel
     * property QCheckBox $MunicipalControl
     * property-read QLabel $MunicipalLabel
     * property QDateTimePicker $FechaIntervencionControl
     * property-read QLabel $FechaIntervencionLabel
     * property QTextBox $ProgramasControl
     * property-read QLabel $ProgramasLabel
     * property QTextBox $ObservacionesControl
     * property-read QLabel $ObservacionesLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class OrganismosDeIntervencionMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var OrganismosDeIntervencion
                */
        public $objOrganismosDeIntervencion;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of OrganismosDeIntervencion's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkNacional;
        protected $chkProvincial;
        protected $chkMunicipal;
        protected $calFechaIntervencion;
        protected $txtProgramas;
        protected $txtObservaciones;

        // Controls that allow the viewing of OrganismosDeIntervencion's individual data fields
        protected $lblIdFolio;
        protected $lblNacional;
        protected $lblProvincial;
        protected $lblMunicipal;
        protected $lblFechaIntervencion;
        protected $lblProgramas;
        protected $lblObservaciones;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * OrganismosDeIntervencionMetaControl to edit a single OrganismosDeIntervencion object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single OrganismosDeIntervencion object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OrganismosDeIntervencionMetaControl
         * @param OrganismosDeIntervencion $objOrganismosDeIntervencion new or existing OrganismosDeIntervencion object
         */
         public function __construct($objParentObject, OrganismosDeIntervencion $objOrganismosDeIntervencion) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this OrganismosDeIntervencionMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked OrganismosDeIntervencion object
            $this->objOrganismosDeIntervencion = $objOrganismosDeIntervencion;

            // Figure out if we're Editing or Creating New
            if ($this->objOrganismosDeIntervencion->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this OrganismosDeIntervencionMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing OrganismosDeIntervencion object creation - defaults to CreateOrEdit
          * @return OrganismosDeIntervencionMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objOrganismosDeIntervencion = OrganismosDeIntervencion::Load($intId);

                // OrganismosDeIntervencion was found -- return it!
                if ($objOrganismosDeIntervencion)
                    return new OrganismosDeIntervencionMetaControl($objParentObject, $objOrganismosDeIntervencion);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a OrganismosDeIntervencion object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new OrganismosDeIntervencionMetaControl($objParentObject, new OrganismosDeIntervencion());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OrganismosDeIntervencionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OrganismosDeIntervencion object creation - defaults to CreateOrEdit
         * @return OrganismosDeIntervencionMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return OrganismosDeIntervencionMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OrganismosDeIntervencionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OrganismosDeIntervencion object creation - defaults to CreateOrEdit
         * @return OrganismosDeIntervencionMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return OrganismosDeIntervencionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objOrganismosDeIntervencion->Id;
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
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Antecedentes', 'Id' , $strControlId);
            if($this->objOrganismosDeIntervencion->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objOrganismosDeIntervencion->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objOrganismosDeIntervencion->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objOrganismosDeIntervencion->IdFolioObject) ? $this->objOrganismosDeIntervencion->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkNacional
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkNacional_Create($strControlId = null) {
            $this->chkNacional = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkNacional->Name = QApplication::Translate('Nacional');
            $this->chkNacional->Checked = $this->objOrganismosDeIntervencion->Nacional;
                        return $this->chkNacional;
        }

        /**
         * Create and setup QLabel lblNacional
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNacional_Create($strControlId = null) {
            $this->lblNacional = new QLabel($this->objParentObject, $strControlId);
            $this->lblNacional->Name = QApplication::Translate('Nacional');
            $this->lblNacional->Text = ($this->objOrganismosDeIntervencion->Nacional) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblNacional;
        }

        /**
         * Create and setup QCheckBox chkProvincial
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkProvincial_Create($strControlId = null) {
            $this->chkProvincial = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkProvincial->Name = QApplication::Translate('Provincial');
            $this->chkProvincial->Checked = $this->objOrganismosDeIntervencion->Provincial;
                        return $this->chkProvincial;
        }

        /**
         * Create and setup QLabel lblProvincial
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblProvincial_Create($strControlId = null) {
            $this->lblProvincial = new QLabel($this->objParentObject, $strControlId);
            $this->lblProvincial->Name = QApplication::Translate('Provincial');
            $this->lblProvincial->Text = ($this->objOrganismosDeIntervencion->Provincial) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblProvincial;
        }

        /**
         * Create and setup QCheckBox chkMunicipal
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkMunicipal_Create($strControlId = null) {
            $this->chkMunicipal = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkMunicipal->Name = QApplication::Translate('Municipal');
            $this->chkMunicipal->Checked = $this->objOrganismosDeIntervencion->Municipal;
                        return $this->chkMunicipal;
        }

        /**
         * Create and setup QLabel lblMunicipal
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMunicipal_Create($strControlId = null) {
            $this->lblMunicipal = new QLabel($this->objParentObject, $strControlId);
            $this->lblMunicipal->Name = QApplication::Translate('Municipal');
            $this->lblMunicipal->Text = ($this->objOrganismosDeIntervencion->Municipal) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblMunicipal;
        }

        /**
         * Create and setup QDateTimePicker calFechaIntervencion
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaIntervencion_Create($strControlId = null) {
            $this->calFechaIntervencion = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaIntervencion->Name = QApplication::Translate('FechaIntervencion');
            $this->calFechaIntervencion->DateTime = $this->objOrganismosDeIntervencion->FechaIntervencion;
            $this->calFechaIntervencion->DateTimePickerType = QDateTimePickerType::Date;
            
            return $this->calFechaIntervencion;
        }

        /**
         * Create and setup QLabel lblFechaIntervencion
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaIntervencion_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaIntervencion = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaIntervencion->Name = QApplication::Translate('FechaIntervencion');
            $this->strFechaIntervencionDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaIntervencion->Text = sprintf($this->objOrganismosDeIntervencion->FechaIntervencion) ? $this->objOrganismosDeIntervencion->FechaIntervencion->__toString($this->strFechaIntervencionDateTimeFormat) : null;
            return $this->lblFechaIntervencion;
        }

        protected $strFechaIntervencionDateTimeFormat;


        /**
         * Create and setup QTextBox txtProgramas
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtProgramas_Create($strControlId = null) {
            $this->txtProgramas = new QTextBox($this->objParentObject, $strControlId);
            $this->txtProgramas->Name = QApplication::Translate('Programas');
            $this->txtProgramas->Text = $this->objOrganismosDeIntervencion->Programas;
            $this->txtProgramas->TextMode = QTextMode::MultiLine;
            
            return $this->txtProgramas;
        }

        /**
         * Create and setup QLabel lblProgramas
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblProgramas_Create($strControlId = null) {
            $this->lblProgramas = new QLabel($this->objParentObject, $strControlId);
            $this->lblProgramas->Name = QApplication::Translate('Programas');
            $this->lblProgramas->Text = $this->objOrganismosDeIntervencion->Programas;
            return $this->lblProgramas;
        }

        /**
         * Create and setup QTextBox txtObservaciones
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtObservaciones_Create($strControlId = null) {
            $this->txtObservaciones = new QTextBox($this->objParentObject, $strControlId);
            $this->txtObservaciones->Name = QApplication::Translate('Observaciones');
            $this->txtObservaciones->Text = $this->objOrganismosDeIntervencion->Observaciones;
            $this->txtObservaciones->MaxLength = OrganismosDeIntervencion::ObservacionesMaxLength;
            
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
            $this->lblObservaciones->Text = $this->objOrganismosDeIntervencion->Observaciones;
            return $this->lblObservaciones;
        }





        /**
         * Refresh this MetaControl with Data from the local OrganismosDeIntervencion object.
         * @param boolean $blnReload reload OrganismosDeIntervencion from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objOrganismosDeIntervencion->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOrganismosDeIntervencion->Id;

            if ($this->lstIdFolioObject) {
                if($this->objOrganismosDeIntervencion->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objOrganismosDeIntervencion->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objOrganismosDeIntervencion->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objOrganismosDeIntervencion->IdFolioObject) ? $this->objOrganismosDeIntervencion->IdFolioObject->__toString() : null;

            if ($this->chkNacional) $this->chkNacional->Checked = $this->objOrganismosDeIntervencion->Nacional;
            if ($this->lblNacional) $this->lblNacional->Text = ($this->objOrganismosDeIntervencion->Nacional) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkProvincial) $this->chkProvincial->Checked = $this->objOrganismosDeIntervencion->Provincial;
            if ($this->lblProvincial) $this->lblProvincial->Text = ($this->objOrganismosDeIntervencion->Provincial) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkMunicipal) $this->chkMunicipal->Checked = $this->objOrganismosDeIntervencion->Municipal;
            if ($this->lblMunicipal) $this->lblMunicipal->Text = ($this->objOrganismosDeIntervencion->Municipal) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->calFechaIntervencion) $this->calFechaIntervencion->DateTime = $this->objOrganismosDeIntervencion->FechaIntervencion;
            if ($this->lblFechaIntervencion) $this->lblFechaIntervencion->Text = sprintf($this->objOrganismosDeIntervencion->FechaIntervencion) ? $this->objOrganismosDeIntervencion->FechaIntervencion->__toString($this->strFechaIntervencionDateTimeFormat) : null;

            if ($this->txtProgramas) $this->txtProgramas->Text = $this->objOrganismosDeIntervencion->Programas;
            if ($this->lblProgramas) $this->lblProgramas->Text = $this->objOrganismosDeIntervencion->Programas;

            if ($this->txtObservaciones) $this->txtObservaciones->Text = $this->objOrganismosDeIntervencion->Observaciones;
            if ($this->lblObservaciones) $this->lblObservaciones->Text = $this->objOrganismosDeIntervencion->Observaciones;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ORGANISMOSDEINTERVENCION OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objOrganismosDeIntervencion->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkNacional) $this->objOrganismosDeIntervencion->Nacional = $this->chkNacional->Checked;
                if ($this->chkProvincial) $this->objOrganismosDeIntervencion->Provincial = $this->chkProvincial->Checked;
                if ($this->chkMunicipal) $this->objOrganismosDeIntervencion->Municipal = $this->chkMunicipal->Checked;
                if ($this->calFechaIntervencion) $this->objOrganismosDeIntervencion->FechaIntervencion = $this->calFechaIntervencion->DateTime;
                if ($this->txtProgramas) $this->objOrganismosDeIntervencion->Programas = $this->txtProgramas->Text;
                if ($this->txtObservaciones) $this->objOrganismosDeIntervencion->Observaciones = $this->txtObservaciones->Text;


        }

        public function SaveOrganismosDeIntervencion() {
            return $this->Save();
        }
        /**
         * This will save this object's OrganismosDeIntervencion instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the OrganismosDeIntervencion object
                $idReturn = $this->objOrganismosDeIntervencion->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's OrganismosDeIntervencion instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteOrganismosDeIntervencion() {
            $this->objOrganismosDeIntervencion->Delete();
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
                case 'OrganismosDeIntervencion': return $this->objOrganismosDeIntervencion;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to OrganismosDeIntervencion fields -- will be created dynamically if not yet created
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
                case 'NacionalControl':
                    if (!$this->chkNacional) return $this->chkNacional_Create();
                    return $this->chkNacional;
                case 'NacionalLabel':
                    if (!$this->lblNacional) return $this->lblNacional_Create();
                    return $this->lblNacional;
                case 'ProvincialControl':
                    if (!$this->chkProvincial) return $this->chkProvincial_Create();
                    return $this->chkProvincial;
                case 'ProvincialLabel':
                    if (!$this->lblProvincial) return $this->lblProvincial_Create();
                    return $this->lblProvincial;
                case 'MunicipalControl':
                    if (!$this->chkMunicipal) return $this->chkMunicipal_Create();
                    return $this->chkMunicipal;
                case 'MunicipalLabel':
                    if (!$this->lblMunicipal) return $this->lblMunicipal_Create();
                    return $this->lblMunicipal;
                case 'FechaIntervencionControl':
                    if (!$this->calFechaIntervencion) return $this->calFechaIntervencion_Create();
                    return $this->calFechaIntervencion;
                case 'FechaIntervencionLabel':
                    if (!$this->lblFechaIntervencion) return $this->lblFechaIntervencion_Create();
                    return $this->lblFechaIntervencion;
                case 'ProgramasControl':
                    if (!$this->txtProgramas) return $this->txtProgramas_Create();
                    return $this->txtProgramas;
                case 'ProgramasLabel':
                    if (!$this->lblProgramas) return $this->lblProgramas_Create();
                    return $this->lblProgramas;
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
                    // Controls that point to OrganismosDeIntervencion fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'NacionalControl':
                        return ($this->chkNacional = QType::Cast($mixValue, 'QControl'));
                    case 'ProvincialControl':
                        return ($this->chkProvincial = QType::Cast($mixValue, 'QControl'));
                    case 'MunicipalControl':
                        return ($this->chkMunicipal = QType::Cast($mixValue, 'QControl'));
                    case 'FechaIntervencionControl':
                        return ($this->calFechaIntervencion = QType::Cast($mixValue, 'QControl'));
                    case 'ProgramasControl':
                        return ($this->txtProgramas = QType::Cast($mixValue, 'QControl'));
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
