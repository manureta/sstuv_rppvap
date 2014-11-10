<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the AprobacionGeodesia class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single AprobacionGeodesia object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a AprobacionGeodesiaMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read AprobacionGeodesia $AprobacionGeodesia the actual AprobacionGeodesia data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdPartidoControl
     * property-read QLabel $IdPartidoLabel
     * property QIntegerTextBox $NumControl
     * property-read QLabel $NumLabel
     * property QTextBox $AnioControl
     * property-read QLabel $AnioLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class AprobacionGeodesiaMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var AprobacionGeodesia
                */
        public $objAprobacionGeodesia;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of AprobacionGeodesia's individual data fields
        protected $lblId;
        protected $lstIdPartidoObject;
        protected $txtNum;
        protected $txtAnio;

        // Controls that allow the viewing of AprobacionGeodesia's individual data fields
        protected $lblIdPartido;
        protected $lblNum;
        protected $lblAnio;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * AprobacionGeodesiaMetaControl to edit a single AprobacionGeodesia object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single AprobacionGeodesia object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this AprobacionGeodesiaMetaControl
         * @param AprobacionGeodesia $objAprobacionGeodesia new or existing AprobacionGeodesia object
         */
         public function __construct($objParentObject, AprobacionGeodesia $objAprobacionGeodesia) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this AprobacionGeodesiaMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked AprobacionGeodesia object
            $this->objAprobacionGeodesia = $objAprobacionGeodesia;

            // Figure out if we're Editing or Creating New
            if ($this->objAprobacionGeodesia->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this AprobacionGeodesiaMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing AprobacionGeodesia object creation - defaults to CreateOrEdit
          * @return AprobacionGeodesiaMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objAprobacionGeodesia = AprobacionGeodesia::Load($intId);

                // AprobacionGeodesia was found -- return it!
                if ($objAprobacionGeodesia)
                    return new AprobacionGeodesiaMetaControl($objParentObject, $objAprobacionGeodesia);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a AprobacionGeodesia object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new AprobacionGeodesiaMetaControl($objParentObject, new AprobacionGeodesia());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this AprobacionGeodesiaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing AprobacionGeodesia object creation - defaults to CreateOrEdit
         * @return AprobacionGeodesiaMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return AprobacionGeodesiaMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this AprobacionGeodesiaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing AprobacionGeodesia object creation - defaults to CreateOrEdit
         * @return AprobacionGeodesiaMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return AprobacionGeodesiaMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objAprobacionGeodesia->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdPartidoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdPartidoObject_Create($strControlId = null) {
            $this->lstIdPartidoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Partido', 'Id' , $strControlId);
            if($this->objAprobacionGeodesia->IdPartidoObject){
                $this->lstIdPartidoObject->Text = $this->objAprobacionGeodesia->IdPartidoObject->__toString();
                $this->lstIdPartidoObject->Value = $this->objAprobacionGeodesia->IdPartidoObject->Id;
            }
            $this->lstIdPartidoObject->Name = QApplication::Translate('IdPartidoObject');
            return $this->lstIdPartidoObject;
        }

        /**
         * Create and setup QLabel lblIdPartido
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdPartido_Create($strControlId = null) {
            $this->lblIdPartido = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdPartido->Name = QApplication::Translate('IdPartidoObject');
            $this->lblIdPartido->Text = ($this->objAprobacionGeodesia->IdPartidoObject) ? $this->objAprobacionGeodesia->IdPartidoObject->__toString() : null;
            return $this->lblIdPartido;
        }

        /**
         * Create and setup QIntegerTextBox txtNum
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtNum_Create($strControlId = null) {
            $this->txtNum = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtNum->Name = QApplication::Translate('Num');
            $this->txtNum->Text = $this->objAprobacionGeodesia->Num;
                        $this->txtNum->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtNum->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtNum;
        }

        /**
         * Create and setup QLabel lblNum
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblNum_Create($strControlId = null, $strFormat = null) {
            $this->lblNum = new QLabel($this->objParentObject, $strControlId);
            $this->lblNum->Name = QApplication::Translate('Num');
            $this->lblNum->Text = $this->objAprobacionGeodesia->Num;
            $this->lblNum->Format = $strFormat;
            return $this->lblNum;
        }

        /**
         * Create and setup QTextBox txtAnio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtAnio_Create($strControlId = null) {
            $this->txtAnio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtAnio->Name = QApplication::Translate('Anio');
            $this->txtAnio->Text = $this->objAprobacionGeodesia->Anio;
            $this->txtAnio->MaxLength = AprobacionGeodesia::AnioMaxLength;
            
            return $this->txtAnio;
        }

        /**
         * Create and setup QLabel lblAnio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAnio_Create($strControlId = null) {
            $this->lblAnio = new QLabel($this->objParentObject, $strControlId);
            $this->lblAnio->Name = QApplication::Translate('Anio');
            $this->lblAnio->Text = $this->objAprobacionGeodesia->Anio;
            return $this->lblAnio;
        }





        /**
         * Refresh this MetaControl with Data from the local AprobacionGeodesia object.
         * @param boolean $blnReload reload AprobacionGeodesia from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objAprobacionGeodesia->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAprobacionGeodesia->Id;

            if ($this->lstIdPartidoObject) {
                if($this->objAprobacionGeodesia->IdPartidoObject){
                    $this->lstIdPartidoObject->Text = $this->objAprobacionGeodesia->IdPartidoObject->__toString();
                    $this->lstIdPartidoObject->Value = $this->objAprobacionGeodesia->IdPartido->Id;
                }                
            }
            if ($this->lblIdPartido) $this->lblIdPartido->Text = ($this->objAprobacionGeodesia->IdPartidoObject) ? $this->objAprobacionGeodesia->IdPartidoObject->__toString() : null;

            if ($this->txtNum) $this->txtNum->Text = $this->objAprobacionGeodesia->Num;
            if ($this->lblNum) $this->lblNum->Text = $this->objAprobacionGeodesia->Num;

            if ($this->txtAnio) $this->txtAnio->Text = $this->objAprobacionGeodesia->Anio;
            if ($this->lblAnio) $this->lblAnio->Text = $this->objAprobacionGeodesia->Anio;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC APROBACIONGEODESIA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdPartidoObject) $this->objAprobacionGeodesia->IdPartido = $this->lstIdPartidoObject->SelectedValue;
                if ($this->txtNum) $this->objAprobacionGeodesia->Num = $this->txtNum->Text;
                if ($this->txtAnio) $this->objAprobacionGeodesia->Anio = $this->txtAnio->Text;


        }

        public function SaveAprobacionGeodesia() {
            return $this->Save();
        }
        /**
         * This will save this object's AprobacionGeodesia instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the AprobacionGeodesia object
                $idReturn = $this->objAprobacionGeodesia->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's AprobacionGeodesia instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteAprobacionGeodesia() {
            $this->objAprobacionGeodesia->Delete();
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
                case 'AprobacionGeodesia': return $this->objAprobacionGeodesia;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to AprobacionGeodesia fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdPartidoControl':
                    if (!$this->lstIdPartidoObject) return $this->lstIdPartidoObject_Create();
                    return $this->lstIdPartidoObject;
                case 'IdPartidoLabel':
                    if (!$this->lblIdPartido) return $this->lblIdPartido_Create();
                    return $this->lblIdPartido;
                case 'NumControl':
                    if (!$this->txtNum) return $this->txtNum_Create();
                    return $this->txtNum;
                case 'NumLabel':
                    if (!$this->lblNum) return $this->lblNum_Create();
                    return $this->lblNum;
                case 'AnioControl':
                    if (!$this->txtAnio) return $this->txtAnio_Create();
                    return $this->txtAnio;
                case 'AnioLabel':
                    if (!$this->lblAnio) return $this->lblAnio_Create();
                    return $this->lblAnio;
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
                    // Controls that point to AprobacionGeodesia fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdPartidoControl':
                        return ($this->lstIdPartidoObject = QType::Cast($mixValue, 'QControl'));
                    case 'NumControl':
                        return ($this->txtNum = QType::Cast($mixValue, 'QControl'));
                    case 'AnioControl':
                        return ($this->txtAnio = QType::Cast($mixValue, 'QControl'));
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
