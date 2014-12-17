<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Antecedentes class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Antecedentes object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a AntecedentesMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Antecedentes $Antecedentes the actual Antecedentes data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $SinIntervencionControl
     * property-read QLabel $SinIntervencionLabel
     * property QCheckBox $ObrasInfraestructuraControl
     * property-read QLabel $ObrasInfraestructuraLabel
     * property QCheckBox $EquipamientosControl
     * property-read QLabel $EquipamientosLabel
     * property QCheckBox $IntervencionesEnViviendasControl
     * property-read QLabel $IntervencionesEnViviendasLabel
     * property QTextBox $OtrosControl
     * property-read QLabel $OtrosLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class AntecedentesMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Antecedentes
                */
        public $objAntecedentes;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Antecedentes's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkSinIntervencion;
        protected $chkObrasInfraestructura;
        protected $chkEquipamientos;
        protected $chkIntervencionesEnViviendas;
        protected $txtOtros;

        // Controls that allow the viewing of Antecedentes's individual data fields
        protected $lblIdFolio;
        protected $lblSinIntervencion;
        protected $lblObrasInfraestructura;
        protected $lblEquipamientos;
        protected $lblIntervencionesEnViviendas;
        protected $lblOtros;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * AntecedentesMetaControl to edit a single Antecedentes object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Antecedentes object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this AntecedentesMetaControl
         * @param Antecedentes $objAntecedentes new or existing Antecedentes object
         */
         public function __construct($objParentObject, Antecedentes $objAntecedentes) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this AntecedentesMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Antecedentes object
            $this->objAntecedentes = $objAntecedentes;

            // Figure out if we're Editing or Creating New
            if ($this->objAntecedentes->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this AntecedentesMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Antecedentes object creation - defaults to CreateOrEdit
          * @return AntecedentesMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objAntecedentes = Antecedentes::Load($intId);

                // Antecedentes was found -- return it!
                if ($objAntecedentes)
                    return new AntecedentesMetaControl($objParentObject, $objAntecedentes);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Antecedentes object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new AntecedentesMetaControl($objParentObject, new Antecedentes());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this AntecedentesMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Antecedentes object creation - defaults to CreateOrEdit
         * @return AntecedentesMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return AntecedentesMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this AntecedentesMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Antecedentes object creation - defaults to CreateOrEdit
         * @return AntecedentesMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return AntecedentesMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objAntecedentes->Id;
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
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Regularizacion', 'Id' , $strControlId);
            if($this->objAntecedentes->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objAntecedentes->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objAntecedentes->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objAntecedentes->IdFolioObject) ? $this->objAntecedentes->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkSinIntervencion
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSinIntervencion_Create($strControlId = null) {
            $this->chkSinIntervencion = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSinIntervencion->Name = QApplication::Translate('SinIntervencion');
            $this->chkSinIntervencion->Checked = $this->objAntecedentes->SinIntervencion;
                        return $this->chkSinIntervencion;
        }

        /**
         * Create and setup QLabel lblSinIntervencion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSinIntervencion_Create($strControlId = null) {
            $this->lblSinIntervencion = new QLabel($this->objParentObject, $strControlId);
            $this->lblSinIntervencion->Name = QApplication::Translate('SinIntervencion');
            $this->lblSinIntervencion->Text = ($this->objAntecedentes->SinIntervencion) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSinIntervencion;
        }

        /**
         * Create and setup QCheckBox chkObrasInfraestructura
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkObrasInfraestructura_Create($strControlId = null) {
            $this->chkObrasInfraestructura = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkObrasInfraestructura->Name = QApplication::Translate('ObrasInfraestructura');
            $this->chkObrasInfraestructura->Checked = $this->objAntecedentes->ObrasInfraestructura;
                        return $this->chkObrasInfraestructura;
        }

        /**
         * Create and setup QLabel lblObrasInfraestructura
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblObrasInfraestructura_Create($strControlId = null) {
            $this->lblObrasInfraestructura = new QLabel($this->objParentObject, $strControlId);
            $this->lblObrasInfraestructura->Name = QApplication::Translate('ObrasInfraestructura');
            $this->lblObrasInfraestructura->Text = ($this->objAntecedentes->ObrasInfraestructura) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblObrasInfraestructura;
        }

        /**
         * Create and setup QCheckBox chkEquipamientos
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkEquipamientos_Create($strControlId = null) {
            $this->chkEquipamientos = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkEquipamientos->Name = QApplication::Translate('Equipamientos');
            $this->chkEquipamientos->Checked = $this->objAntecedentes->Equipamientos;
                        return $this->chkEquipamientos;
        }

        /**
         * Create and setup QLabel lblEquipamientos
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEquipamientos_Create($strControlId = null) {
            $this->lblEquipamientos = new QLabel($this->objParentObject, $strControlId);
            $this->lblEquipamientos->Name = QApplication::Translate('Equipamientos');
            $this->lblEquipamientos->Text = ($this->objAntecedentes->Equipamientos) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblEquipamientos;
        }

        /**
         * Create and setup QCheckBox chkIntervencionesEnViviendas
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkIntervencionesEnViviendas_Create($strControlId = null) {
            $this->chkIntervencionesEnViviendas = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkIntervencionesEnViviendas->Name = QApplication::Translate('IntervencionesEnViviendas');
            $this->chkIntervencionesEnViviendas->Checked = $this->objAntecedentes->IntervencionesEnViviendas;
                        return $this->chkIntervencionesEnViviendas;
        }

        /**
         * Create and setup QLabel lblIntervencionesEnViviendas
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIntervencionesEnViviendas_Create($strControlId = null) {
            $this->lblIntervencionesEnViviendas = new QLabel($this->objParentObject, $strControlId);
            $this->lblIntervencionesEnViviendas->Name = QApplication::Translate('IntervencionesEnViviendas');
            $this->lblIntervencionesEnViviendas->Text = ($this->objAntecedentes->IntervencionesEnViviendas) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblIntervencionesEnViviendas;
        }

        /**
         * Create and setup QTextBox txtOtros
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOtros_Create($strControlId = null) {
            $this->txtOtros = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOtros->Name = QApplication::Translate('Otros');
            $this->txtOtros->Text = $this->objAntecedentes->Otros;
            $this->txtOtros->MaxLength = Antecedentes::OtrosMaxLength;
            
            return $this->txtOtros;
        }

        /**
         * Create and setup QLabel lblOtros
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOtros_Create($strControlId = null) {
            $this->lblOtros = new QLabel($this->objParentObject, $strControlId);
            $this->lblOtros->Name = QApplication::Translate('Otros');
            $this->lblOtros->Text = $this->objAntecedentes->Otros;
            return $this->lblOtros;
        }



    public $lstOrganismosDeIntervencionAsIdFolio;
    /**
     * Gets all associated OrganismosDeIntervencionesAsIdFolio as an array of OrganismosDeIntervencion objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return OrganismosDeIntervencion[]
    */ 
    public function lstOrganismosDeIntervencionAsIdFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'OrganismosDeIntervencion';
        $strConfigArray['strRefreshMethod'] = 'OrganismosDeIntervencionAsIdFolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddOrganismosDeIntervencionAsIdFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveOrganismosDeIntervencionAsIdFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Nacional'] = QApplication::Translate('Nacional');
        $strConfigArray['Columns']['Provincial'] = QApplication::Translate('Provincial');
        $strConfigArray['Columns']['Municipal'] = QApplication::Translate('Municipal');
        $strConfigArray['Columns']['FechaIntervencion'] = QApplication::Translate('FechaIntervencion');
        $strConfigArray['Columns']['Programas'] = QApplication::Translate('Programas');

        $this->lstOrganismosDeIntervencionAsIdFolio = new QListPanel($this->objParentObject, $this->objAntecedentes, $strConfigArray, $strControlId);
        $this->lstOrganismosDeIntervencionAsIdFolio->Name = OrganismosDeIntervencion::Noun();
        $this->lstOrganismosDeIntervencionAsIdFolio->SetNewMethod($this, "lstOrganismosDeIntervencionAsIdFolio_New");
        $this->lstOrganismosDeIntervencionAsIdFolio->SetEditMethod($this, "lstOrganismosDeIntervencionAsIdFolio_Edit");
        return $this->lstOrganismosDeIntervencionAsIdFolio;
    }

    public function lstOrganismosDeIntervencionAsIdFolio_New() {
        OrganismosDeIntervencionModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(OrganismosDeIntervencionModalPanel::$strControlsArray, true);
        $this->lstOrganismosDeIntervencionAsIdFolio->ModalPanel = new OrganismosDeIntervencionModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstOrganismosDeIntervencionAsIdFolio->ModalPanel->objCallerControl = $this->lstOrganismosDeIntervencionAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstOrganismosDeIntervencionAsIdFolio_Edit($intKey) {
        OrganismosDeIntervencionModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(OrganismosDeIntervencionModalPanel::$strControlsArray, true);
        $obj = $this->objAntecedentes->OrganismosDeIntervencionAsIdFolioArray[$intKey];
        $this->lstOrganismosDeIntervencionAsIdFolio->ModalPanel = new OrganismosDeIntervencionModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstOrganismosDeIntervencionAsIdFolio->ModalPanel->objCallerControl = $this->lstOrganismosDeIntervencionAsIdFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Antecedentes object.
         * @param boolean $blnReload reload Antecedentes from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objAntecedentes->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAntecedentes->Id;

            if ($this->lstIdFolioObject) {
                if($this->objAntecedentes->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objAntecedentes->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objAntecedentes->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objAntecedentes->IdFolioObject) ? $this->objAntecedentes->IdFolioObject->__toString() : null;

            if ($this->chkSinIntervencion) $this->chkSinIntervencion->Checked = $this->objAntecedentes->SinIntervencion;
            if ($this->lblSinIntervencion) $this->lblSinIntervencion->Text = ($this->objAntecedentes->SinIntervencion) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkObrasInfraestructura) $this->chkObrasInfraestructura->Checked = $this->objAntecedentes->ObrasInfraestructura;
            if ($this->lblObrasInfraestructura) $this->lblObrasInfraestructura->Text = ($this->objAntecedentes->ObrasInfraestructura) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkEquipamientos) $this->chkEquipamientos->Checked = $this->objAntecedentes->Equipamientos;
            if ($this->lblEquipamientos) $this->lblEquipamientos->Text = ($this->objAntecedentes->Equipamientos) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkIntervencionesEnViviendas) $this->chkIntervencionesEnViviendas->Checked = $this->objAntecedentes->IntervencionesEnViviendas;
            if ($this->lblIntervencionesEnViviendas) $this->lblIntervencionesEnViviendas->Text = ($this->objAntecedentes->IntervencionesEnViviendas) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtOtros) $this->txtOtros->Text = $this->objAntecedentes->Otros;
            if ($this->lblOtros) $this->lblOtros->Text = $this->objAntecedentes->Otros;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ANTECEDENTES OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objAntecedentes->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkSinIntervencion) $this->objAntecedentes->SinIntervencion = $this->chkSinIntervencion->Checked;
                if ($this->chkObrasInfraestructura) $this->objAntecedentes->ObrasInfraestructura = $this->chkObrasInfraestructura->Checked;
                if ($this->chkEquipamientos) $this->objAntecedentes->Equipamientos = $this->chkEquipamientos->Checked;
                if ($this->chkIntervencionesEnViviendas) $this->objAntecedentes->IntervencionesEnViviendas = $this->chkIntervencionesEnViviendas->Checked;
                if ($this->txtOtros) $this->objAntecedentes->Otros = $this->txtOtros->Text;


        }

        public function SaveAntecedentes() {
            return $this->Save();
        }
        /**
         * This will save this object's Antecedentes instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Antecedentes object
                $idReturn = $this->objAntecedentes->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Antecedentes instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteAntecedentes() {
            $this->objAntecedentes->Delete();
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
                case 'Antecedentes': return $this->objAntecedentes;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Antecedentes fields -- will be created dynamically if not yet created
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
                case 'SinIntervencionControl':
                    if (!$this->chkSinIntervencion) return $this->chkSinIntervencion_Create();
                    return $this->chkSinIntervencion;
                case 'SinIntervencionLabel':
                    if (!$this->lblSinIntervencion) return $this->lblSinIntervencion_Create();
                    return $this->lblSinIntervencion;
                case 'ObrasInfraestructuraControl':
                    if (!$this->chkObrasInfraestructura) return $this->chkObrasInfraestructura_Create();
                    return $this->chkObrasInfraestructura;
                case 'ObrasInfraestructuraLabel':
                    if (!$this->lblObrasInfraestructura) return $this->lblObrasInfraestructura_Create();
                    return $this->lblObrasInfraestructura;
                case 'EquipamientosControl':
                    if (!$this->chkEquipamientos) return $this->chkEquipamientos_Create();
                    return $this->chkEquipamientos;
                case 'EquipamientosLabel':
                    if (!$this->lblEquipamientos) return $this->lblEquipamientos_Create();
                    return $this->lblEquipamientos;
                case 'IntervencionesEnViviendasControl':
                    if (!$this->chkIntervencionesEnViviendas) return $this->chkIntervencionesEnViviendas_Create();
                    return $this->chkIntervencionesEnViviendas;
                case 'IntervencionesEnViviendasLabel':
                    if (!$this->lblIntervencionesEnViviendas) return $this->lblIntervencionesEnViviendas_Create();
                    return $this->lblIntervencionesEnViviendas;
                case 'OtrosControl':
                    if (!$this->txtOtros) return $this->txtOtros_Create();
                    return $this->txtOtros;
                case 'OtrosLabel':
                    if (!$this->lblOtros) return $this->lblOtros_Create();
                    return $this->lblOtros;
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
                    // Controls that point to Antecedentes fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'SinIntervencionControl':
                        return ($this->chkSinIntervencion = QType::Cast($mixValue, 'QControl'));
                    case 'ObrasInfraestructuraControl':
                        return ($this->chkObrasInfraestructura = QType::Cast($mixValue, 'QControl'));
                    case 'EquipamientosControl':
                        return ($this->chkEquipamientos = QType::Cast($mixValue, 'QControl'));
                    case 'IntervencionesEnViviendasControl':
                        return ($this->chkIntervencionesEnViviendas = QType::Cast($mixValue, 'QControl'));
                    case 'OtrosControl':
                        return ($this->txtOtros = QType::Cast($mixValue, 'QControl'));
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
