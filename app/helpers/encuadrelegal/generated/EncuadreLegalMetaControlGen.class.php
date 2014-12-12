<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the EncuadreLegal class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single EncuadreLegal object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a EncuadreLegalMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read EncuadreLegal $EncuadreLegal the actual EncuadreLegal data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QCheckBox $Decreto222595Control
     * property-read QLabel $Decreto222595Label
     * property QCheckBox $Ley24374Control
     * property-read QLabel $Ley24374Label
     * property QCheckBox $Decreto81588Control
     * property-read QLabel $Decreto81588Label
     * property QCheckBox $Ley23073Control
     * property-read QLabel $Ley23073Label
     * property QCheckBox $Decreto468696Control
     * property-read QLabel $Decreto468696Label
     * property QTextBox $ExpropiacionControl
     * property-read QLabel $ExpropiacionLabel
     * property QTextBox $OtrosControl
     * property-read QLabel $OtrosLabel
     * property QCheckBox $Ley14449Control
     * property-read QLabel $Ley14449Label
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class EncuadreLegalMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var EncuadreLegal
                */
        public $objEncuadreLegal;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of EncuadreLegal's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $chkDecreto222595;
        protected $chkLey24374;
        protected $chkDecreto81588;
        protected $chkLey23073;
        protected $chkDecreto468696;
        protected $txtExpropiacion;
        protected $txtOtros;
        protected $chkLey14449;

        // Controls that allow the viewing of EncuadreLegal's individual data fields
        protected $lblIdFolio;
        protected $lblDecreto222595;
        protected $lblLey24374;
        protected $lblDecreto81588;
        protected $lblLey23073;
        protected $lblDecreto468696;
        protected $lblExpropiacion;
        protected $lblOtros;
        protected $lblLey14449;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * EncuadreLegalMetaControl to edit a single EncuadreLegal object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single EncuadreLegal object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EncuadreLegalMetaControl
         * @param EncuadreLegal $objEncuadreLegal new or existing EncuadreLegal object
         */
         public function __construct($objParentObject, EncuadreLegal $objEncuadreLegal) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this EncuadreLegalMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked EncuadreLegal object
            $this->objEncuadreLegal = $objEncuadreLegal;

            // Figure out if we're Editing or Creating New
            if ($this->objEncuadreLegal->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this EncuadreLegalMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing EncuadreLegal object creation - defaults to CreateOrEdit
          * @return EncuadreLegalMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objEncuadreLegal = EncuadreLegal::Load($intId);

                // EncuadreLegal was found -- return it!
                if ($objEncuadreLegal)
                    return new EncuadreLegalMetaControl($objParentObject, $objEncuadreLegal);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a EncuadreLegal object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new EncuadreLegalMetaControl($objParentObject, new EncuadreLegal());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EncuadreLegalMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing EncuadreLegal object creation - defaults to CreateOrEdit
         * @return EncuadreLegalMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return EncuadreLegalMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EncuadreLegalMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing EncuadreLegal object creation - defaults to CreateOrEdit
         * @return EncuadreLegalMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return EncuadreLegalMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objEncuadreLegal->Id;
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
            if($this->objEncuadreLegal->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objEncuadreLegal->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objEncuadreLegal->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objEncuadreLegal->IdFolioObject) ? $this->objEncuadreLegal->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QCheckBox chkDecreto222595
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkDecreto222595_Create($strControlId = null) {
            $this->chkDecreto222595 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkDecreto222595->Name = QApplication::Translate('Decreto222595');
            $this->chkDecreto222595->Checked = $this->objEncuadreLegal->Decreto222595;
                        return $this->chkDecreto222595;
        }

        /**
         * Create and setup QLabel lblDecreto222595
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDecreto222595_Create($strControlId = null) {
            $this->lblDecreto222595 = new QLabel($this->objParentObject, $strControlId);
            $this->lblDecreto222595->Name = QApplication::Translate('Decreto222595');
            $this->lblDecreto222595->Text = ($this->objEncuadreLegal->Decreto222595) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblDecreto222595;
        }

        /**
         * Create and setup QCheckBox chkLey24374
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkLey24374_Create($strControlId = null) {
            $this->chkLey24374 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkLey24374->Name = QApplication::Translate('Ley24374');
            $this->chkLey24374->Checked = $this->objEncuadreLegal->Ley24374;
                        return $this->chkLey24374;
        }

        /**
         * Create and setup QLabel lblLey24374
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblLey24374_Create($strControlId = null) {
            $this->lblLey24374 = new QLabel($this->objParentObject, $strControlId);
            $this->lblLey24374->Name = QApplication::Translate('Ley24374');
            $this->lblLey24374->Text = ($this->objEncuadreLegal->Ley24374) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblLey24374;
        }

        /**
         * Create and setup QCheckBox chkDecreto81588
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkDecreto81588_Create($strControlId = null) {
            $this->chkDecreto81588 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkDecreto81588->Name = QApplication::Translate('Decreto81588');
            $this->chkDecreto81588->Checked = $this->objEncuadreLegal->Decreto81588;
                        return $this->chkDecreto81588;
        }

        /**
         * Create and setup QLabel lblDecreto81588
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDecreto81588_Create($strControlId = null) {
            $this->lblDecreto81588 = new QLabel($this->objParentObject, $strControlId);
            $this->lblDecreto81588->Name = QApplication::Translate('Decreto81588');
            $this->lblDecreto81588->Text = ($this->objEncuadreLegal->Decreto81588) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblDecreto81588;
        }

        /**
         * Create and setup QCheckBox chkLey23073
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkLey23073_Create($strControlId = null) {
            $this->chkLey23073 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkLey23073->Name = QApplication::Translate('Ley23073');
            $this->chkLey23073->Checked = $this->objEncuadreLegal->Ley23073;
                        return $this->chkLey23073;
        }

        /**
         * Create and setup QLabel lblLey23073
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblLey23073_Create($strControlId = null) {
            $this->lblLey23073 = new QLabel($this->objParentObject, $strControlId);
            $this->lblLey23073->Name = QApplication::Translate('Ley23073');
            $this->lblLey23073->Text = ($this->objEncuadreLegal->Ley23073) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblLey23073;
        }

        /**
         * Create and setup QCheckBox chkDecreto468696
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkDecreto468696_Create($strControlId = null) {
            $this->chkDecreto468696 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkDecreto468696->Name = QApplication::Translate('Decreto468696');
            $this->chkDecreto468696->Checked = $this->objEncuadreLegal->Decreto468696;
                        return $this->chkDecreto468696;
        }

        /**
         * Create and setup QLabel lblDecreto468696
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDecreto468696_Create($strControlId = null) {
            $this->lblDecreto468696 = new QLabel($this->objParentObject, $strControlId);
            $this->lblDecreto468696->Name = QApplication::Translate('Decreto468696');
            $this->lblDecreto468696->Text = ($this->objEncuadreLegal->Decreto468696) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblDecreto468696;
        }

        /**
         * Create and setup QTextBox txtExpropiacion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtExpropiacion_Create($strControlId = null) {
            $this->txtExpropiacion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtExpropiacion->Name = QApplication::Translate('Expropiacion');
            $this->txtExpropiacion->Text = $this->objEncuadreLegal->Expropiacion;
            $this->txtExpropiacion->MaxLength = EncuadreLegal::ExpropiacionMaxLength;
            
            return $this->txtExpropiacion;
        }

        /**
         * Create and setup QLabel lblExpropiacion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblExpropiacion_Create($strControlId = null) {
            $this->lblExpropiacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblExpropiacion->Name = QApplication::Translate('Expropiacion');
            $this->lblExpropiacion->Text = $this->objEncuadreLegal->Expropiacion;
            return $this->lblExpropiacion;
        }

        /**
         * Create and setup QTextBox txtOtros
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOtros_Create($strControlId = null) {
            $this->txtOtros = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOtros->Name = QApplication::Translate('Otros');
            $this->txtOtros->Text = $this->objEncuadreLegal->Otros;
            $this->txtOtros->MaxLength = EncuadreLegal::OtrosMaxLength;
            
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
            $this->lblOtros->Text = $this->objEncuadreLegal->Otros;
            return $this->lblOtros;
        }

        /**
         * Create and setup QCheckBox chkLey14449
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkLey14449_Create($strControlId = null) {
            $this->chkLey14449 = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkLey14449->Name = QApplication::Translate('Ley14449');
            $this->chkLey14449->Checked = $this->objEncuadreLegal->Ley14449;
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
            $this->lblLey14449->Text = ($this->objEncuadreLegal->Ley14449) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblLey14449;
        }





        /**
         * Refresh this MetaControl with Data from the local EncuadreLegal object.
         * @param boolean $blnReload reload EncuadreLegal from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objEncuadreLegal->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEncuadreLegal->Id;

            if ($this->lstIdFolioObject) {
                if($this->objEncuadreLegal->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objEncuadreLegal->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objEncuadreLegal->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objEncuadreLegal->IdFolioObject) ? $this->objEncuadreLegal->IdFolioObject->__toString() : null;

            if ($this->chkDecreto222595) $this->chkDecreto222595->Checked = $this->objEncuadreLegal->Decreto222595;
            if ($this->lblDecreto222595) $this->lblDecreto222595->Text = ($this->objEncuadreLegal->Decreto222595) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkLey24374) $this->chkLey24374->Checked = $this->objEncuadreLegal->Ley24374;
            if ($this->lblLey24374) $this->lblLey24374->Text = ($this->objEncuadreLegal->Ley24374) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkDecreto81588) $this->chkDecreto81588->Checked = $this->objEncuadreLegal->Decreto81588;
            if ($this->lblDecreto81588) $this->lblDecreto81588->Text = ($this->objEncuadreLegal->Decreto81588) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkLey23073) $this->chkLey23073->Checked = $this->objEncuadreLegal->Ley23073;
            if ($this->lblLey23073) $this->lblLey23073->Text = ($this->objEncuadreLegal->Ley23073) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->chkDecreto468696) $this->chkDecreto468696->Checked = $this->objEncuadreLegal->Decreto468696;
            if ($this->lblDecreto468696) $this->lblDecreto468696->Text = ($this->objEncuadreLegal->Decreto468696) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->txtExpropiacion) $this->txtExpropiacion->Text = $this->objEncuadreLegal->Expropiacion;
            if ($this->lblExpropiacion) $this->lblExpropiacion->Text = $this->objEncuadreLegal->Expropiacion;

            if ($this->txtOtros) $this->txtOtros->Text = $this->objEncuadreLegal->Otros;
            if ($this->lblOtros) $this->lblOtros->Text = $this->objEncuadreLegal->Otros;

            if ($this->chkLey14449) $this->chkLey14449->Checked = $this->objEncuadreLegal->Ley14449;
            if ($this->lblLey14449) $this->lblLey14449->Text = ($this->objEncuadreLegal->Ley14449) ? QApplication::Translate('Yes') : QApplication::Translate('No');

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ENCUADRELEGAL OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objEncuadreLegal->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->chkDecreto222595) $this->objEncuadreLegal->Decreto222595 = $this->chkDecreto222595->Checked;
                if ($this->chkLey24374) $this->objEncuadreLegal->Ley24374 = $this->chkLey24374->Checked;
                if ($this->chkDecreto81588) $this->objEncuadreLegal->Decreto81588 = $this->chkDecreto81588->Checked;
                if ($this->chkLey23073) $this->objEncuadreLegal->Ley23073 = $this->chkLey23073->Checked;
                if ($this->chkDecreto468696) $this->objEncuadreLegal->Decreto468696 = $this->chkDecreto468696->Checked;
                if ($this->txtExpropiacion) $this->objEncuadreLegal->Expropiacion = $this->txtExpropiacion->Text;
                if ($this->txtOtros) $this->objEncuadreLegal->Otros = $this->txtOtros->Text;
                if ($this->chkLey14449) $this->objEncuadreLegal->Ley14449 = $this->chkLey14449->Checked;


        }

        public function SaveEncuadreLegal() {
            return $this->Save();
        }
        /**
         * This will save this object's EncuadreLegal instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the EncuadreLegal object
                $idReturn = $this->objEncuadreLegal->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's EncuadreLegal instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteEncuadreLegal() {
            $this->objEncuadreLegal->Delete();
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
                case 'EncuadreLegal': return $this->objEncuadreLegal;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to EncuadreLegal fields -- will be created dynamically if not yet created
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
                case 'Decreto222595Control':
                    if (!$this->chkDecreto222595) return $this->chkDecreto222595_Create();
                    return $this->chkDecreto222595;
                case 'Decreto222595Label':
                    if (!$this->lblDecreto222595) return $this->lblDecreto222595_Create();
                    return $this->lblDecreto222595;
                case 'Ley24374Control':
                    if (!$this->chkLey24374) return $this->chkLey24374_Create();
                    return $this->chkLey24374;
                case 'Ley24374Label':
                    if (!$this->lblLey24374) return $this->lblLey24374_Create();
                    return $this->lblLey24374;
                case 'Decreto81588Control':
                    if (!$this->chkDecreto81588) return $this->chkDecreto81588_Create();
                    return $this->chkDecreto81588;
                case 'Decreto81588Label':
                    if (!$this->lblDecreto81588) return $this->lblDecreto81588_Create();
                    return $this->lblDecreto81588;
                case 'Ley23073Control':
                    if (!$this->chkLey23073) return $this->chkLey23073_Create();
                    return $this->chkLey23073;
                case 'Ley23073Label':
                    if (!$this->lblLey23073) return $this->lblLey23073_Create();
                    return $this->lblLey23073;
                case 'Decreto468696Control':
                    if (!$this->chkDecreto468696) return $this->chkDecreto468696_Create();
                    return $this->chkDecreto468696;
                case 'Decreto468696Label':
                    if (!$this->lblDecreto468696) return $this->lblDecreto468696_Create();
                    return $this->lblDecreto468696;
                case 'ExpropiacionControl':
                    if (!$this->txtExpropiacion) return $this->txtExpropiacion_Create();
                    return $this->txtExpropiacion;
                case 'ExpropiacionLabel':
                    if (!$this->lblExpropiacion) return $this->lblExpropiacion_Create();
                    return $this->lblExpropiacion;
                case 'OtrosControl':
                    if (!$this->txtOtros) return $this->txtOtros_Create();
                    return $this->txtOtros;
                case 'OtrosLabel':
                    if (!$this->lblOtros) return $this->lblOtros_Create();
                    return $this->lblOtros;
                case 'Ley14449Control':
                    if (!$this->chkLey14449) return $this->chkLey14449_Create();
                    return $this->chkLey14449;
                case 'Ley14449Label':
                    if (!$this->lblLey14449) return $this->lblLey14449_Create();
                    return $this->lblLey14449;
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
                    // Controls that point to EncuadreLegal fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'Decreto222595Control':
                        return ($this->chkDecreto222595 = QType::Cast($mixValue, 'QControl'));
                    case 'Ley24374Control':
                        return ($this->chkLey24374 = QType::Cast($mixValue, 'QControl'));
                    case 'Decreto81588Control':
                        return ($this->chkDecreto81588 = QType::Cast($mixValue, 'QControl'));
                    case 'Ley23073Control':
                        return ($this->chkLey23073 = QType::Cast($mixValue, 'QControl'));
                    case 'Decreto468696Control':
                        return ($this->chkDecreto468696 = QType::Cast($mixValue, 'QControl'));
                    case 'ExpropiacionControl':
                        return ($this->txtExpropiacion = QType::Cast($mixValue, 'QControl'));
                    case 'OtrosControl':
                        return ($this->txtOtros = QType::Cast($mixValue, 'QControl'));
                    case 'Ley14449Control':
                        return ($this->chkLey14449 = QType::Cast($mixValue, 'QControl'));
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
