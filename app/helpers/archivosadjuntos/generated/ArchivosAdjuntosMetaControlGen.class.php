<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the ArchivosAdjuntos class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single ArchivosAdjuntos object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a ArchivosAdjuntosMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read ArchivosAdjuntos $ArchivosAdjuntos the actual ArchivosAdjuntos data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QTextBox $TipoControl
     * property-read QLabel $TipoLabel
     * property QTextBox $PathFileControl
     * property-read QLabel $PathFileLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class ArchivosAdjuntosMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var ArchivosAdjuntos
                */
        public $objArchivosAdjuntos;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of ArchivosAdjuntos's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $txtTipo;
        protected $txtPathFile;

        // Controls that allow the viewing of ArchivosAdjuntos's individual data fields
        protected $lblIdFolio;
        protected $lblTipo;
        protected $lblPathFile;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * ArchivosAdjuntosMetaControl to edit a single ArchivosAdjuntos object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single ArchivosAdjuntos object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ArchivosAdjuntosMetaControl
         * @param ArchivosAdjuntos $objArchivosAdjuntos new or existing ArchivosAdjuntos object
         */
         public function __construct($objParentObject, ArchivosAdjuntos $objArchivosAdjuntos) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this ArchivosAdjuntosMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked ArchivosAdjuntos object
            $this->objArchivosAdjuntos = $objArchivosAdjuntos;

            // Figure out if we're Editing or Creating New
            if ($this->objArchivosAdjuntos->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this ArchivosAdjuntosMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing ArchivosAdjuntos object creation - defaults to CreateOrEdit
          * @return ArchivosAdjuntosMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objArchivosAdjuntos = ArchivosAdjuntos::Load($intId);

                // ArchivosAdjuntos was found -- return it!
                if ($objArchivosAdjuntos)
                    return new ArchivosAdjuntosMetaControl($objParentObject, $objArchivosAdjuntos);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a ArchivosAdjuntos object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new ArchivosAdjuntosMetaControl($objParentObject, new ArchivosAdjuntos());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ArchivosAdjuntosMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing ArchivosAdjuntos object creation - defaults to CreateOrEdit
         * @return ArchivosAdjuntosMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return ArchivosAdjuntosMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ArchivosAdjuntosMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing ArchivosAdjuntos object creation - defaults to CreateOrEdit
         * @return ArchivosAdjuntosMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return ArchivosAdjuntosMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objArchivosAdjuntos->Id;
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
            if($this->objArchivosAdjuntos->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objArchivosAdjuntos->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objArchivosAdjuntos->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objArchivosAdjuntos->IdFolioObject) ? $this->objArchivosAdjuntos->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QTextBox txtTipo
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTipo_Create($strControlId = null) {
            $this->txtTipo = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTipo->Name = QApplication::Translate('Tipo');
            $this->txtTipo->Text = $this->objArchivosAdjuntos->Tipo;
            
            return $this->txtTipo;
        }

        /**
         * Create and setup QLabel lblTipo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTipo_Create($strControlId = null) {
            $this->lblTipo = new QLabel($this->objParentObject, $strControlId);
            $this->lblTipo->Name = QApplication::Translate('Tipo');
            $this->lblTipo->Text = $this->objArchivosAdjuntos->Tipo;
            return $this->lblTipo;
        }

        /**
         * Create and setup QTextBox txtPathFile
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtPathFile_Create($strControlId = null) {
            $this->txtPathFile = new QTextBox($this->objParentObject, $strControlId);
            $this->txtPathFile->Name = QApplication::Translate('PathFile');
            $this->txtPathFile->Text = $this->objArchivosAdjuntos->PathFile;
            
            return $this->txtPathFile;
        }

        /**
         * Create and setup QLabel lblPathFile
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblPathFile_Create($strControlId = null) {
            $this->lblPathFile = new QLabel($this->objParentObject, $strControlId);
            $this->lblPathFile->Name = QApplication::Translate('PathFile');
            $this->lblPathFile->Text = $this->objArchivosAdjuntos->PathFile;
            return $this->lblPathFile;
        }





        /**
         * Refresh this MetaControl with Data from the local ArchivosAdjuntos object.
         * @param boolean $blnReload reload ArchivosAdjuntos from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objArchivosAdjuntos->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objArchivosAdjuntos->Id;

            if ($this->lstIdFolioObject) {
                if($this->objArchivosAdjuntos->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objArchivosAdjuntos->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objArchivosAdjuntos->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objArchivosAdjuntos->IdFolioObject) ? $this->objArchivosAdjuntos->IdFolioObject->__toString() : null;

            if ($this->txtTipo) $this->txtTipo->Text = $this->objArchivosAdjuntos->Tipo;
            if ($this->lblTipo) $this->lblTipo->Text = $this->objArchivosAdjuntos->Tipo;

            if ($this->txtPathFile) $this->txtPathFile->Text = $this->objArchivosAdjuntos->PathFile;
            if ($this->lblPathFile) $this->lblPathFile->Text = $this->objArchivosAdjuntos->PathFile;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ARCHIVOSADJUNTOS OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objArchivosAdjuntos->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->txtTipo) $this->objArchivosAdjuntos->Tipo = $this->txtTipo->Text;
                if ($this->txtPathFile) $this->objArchivosAdjuntos->PathFile = $this->txtPathFile->Text;


        }

        public function SaveArchivosAdjuntos() {
            return $this->Save();
        }
        /**
         * This will save this object's ArchivosAdjuntos instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the ArchivosAdjuntos object
                $idReturn = $this->objArchivosAdjuntos->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's ArchivosAdjuntos instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteArchivosAdjuntos() {
            $this->objArchivosAdjuntos->Delete();
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
                case 'ArchivosAdjuntos': return $this->objArchivosAdjuntos;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to ArchivosAdjuntos fields -- will be created dynamically if not yet created
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
                case 'TipoControl':
                    if (!$this->txtTipo) return $this->txtTipo_Create();
                    return $this->txtTipo;
                case 'TipoLabel':
                    if (!$this->lblTipo) return $this->lblTipo_Create();
                    return $this->lblTipo;
                case 'PathFileControl':
                    if (!$this->txtPathFile) return $this->txtPathFile_Create();
                    return $this->txtPathFile;
                case 'PathFileLabel':
                    if (!$this->lblPathFile) return $this->lblPathFile_Create();
                    return $this->lblPathFile;
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
                    // Controls that point to ArchivosAdjuntos fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'TipoControl':
                        return ($this->txtTipo = QType::Cast($mixValue, 'QControl'));
                    case 'PathFileControl':
                        return ($this->txtPathFile = QType::Cast($mixValue, 'QControl'));
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
