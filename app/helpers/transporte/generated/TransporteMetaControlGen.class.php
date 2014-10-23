<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Transporte class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Transporte object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a TransporteMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Transporte $Transporte the actual Transporte data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QListBox $ColectivosControl
     * property-read QLabel $ColectivosLabel
     * property QListBox $FerrocarrilControl
     * property-read QLabel $FerrocarrilLabel
     * property QListBox $RemisCombisControl
     * property-read QLabel $RemisCombisLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class TransporteMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Transporte
                */
        public $objTransporte;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Transporte's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $lstColectivosObject;
        protected $lstFerrocarrilObject;
        protected $lstRemisCombisObject;

        // Controls that allow the viewing of Transporte's individual data fields
        protected $lblIdFolio;
        protected $lblColectivos;
        protected $lblFerrocarril;
        protected $lblRemisCombis;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * TransporteMetaControl to edit a single Transporte object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Transporte object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TransporteMetaControl
         * @param Transporte $objTransporte new or existing Transporte object
         */
         public function __construct($objParentObject, Transporte $objTransporte) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this TransporteMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Transporte object
            $this->objTransporte = $objTransporte;

            // Figure out if we're Editing or Creating New
            if ($this->objTransporte->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this TransporteMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Transporte object creation - defaults to CreateOrEdit
          * @return TransporteMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objTransporte = Transporte::Load($intId);

                // Transporte was found -- return it!
                if ($objTransporte)
                    return new TransporteMetaControl($objParentObject, $objTransporte);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Transporte object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new TransporteMetaControl($objParentObject, new Transporte());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TransporteMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Transporte object creation - defaults to CreateOrEdit
         * @return TransporteMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return TransporteMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TransporteMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Transporte object creation - defaults to CreateOrEdit
         * @return TransporteMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return TransporteMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objTransporte->Id;
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
            if($this->objTransporte->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objTransporte->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objTransporte->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objTransporte->IdFolioObject) ? $this->objTransporte->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstColectivosObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstColectivosObject_Create($strControlId = null) {
            $this->lstColectivosObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesTransporte', 'Id' , $strControlId);
            if($this->objTransporte->ColectivosObject){
                $this->lstColectivosObject->Text = $this->objTransporte->ColectivosObject->__toString();
                $this->lstColectivosObject->Value = $this->objTransporte->ColectivosObject->Id;
            }
            $this->lstColectivosObject->Name = QApplication::Translate('ColectivosObject');
            return $this->lstColectivosObject;
        }

        /**
         * Create and setup QLabel lblColectivos
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblColectivos_Create($strControlId = null) {
            $this->lblColectivos = new QLabel($this->objParentObject, $strControlId);
            $this->lblColectivos->Name = QApplication::Translate('ColectivosObject');
            $this->lblColectivos->Text = ($this->objTransporte->ColectivosObject) ? $this->objTransporte->ColectivosObject->__toString() : null;
            return $this->lblColectivos;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstFerrocarrilObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstFerrocarrilObject_Create($strControlId = null) {
            $this->lstFerrocarrilObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesTransporte', 'Id' , $strControlId);
            if($this->objTransporte->FerrocarrilObject){
                $this->lstFerrocarrilObject->Text = $this->objTransporte->FerrocarrilObject->__toString();
                $this->lstFerrocarrilObject->Value = $this->objTransporte->FerrocarrilObject->Id;
            }
            $this->lstFerrocarrilObject->Name = QApplication::Translate('FerrocarrilObject');
            return $this->lstFerrocarrilObject;
        }

        /**
         * Create and setup QLabel lblFerrocarril
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFerrocarril_Create($strControlId = null) {
            $this->lblFerrocarril = new QLabel($this->objParentObject, $strControlId);
            $this->lblFerrocarril->Name = QApplication::Translate('FerrocarrilObject');
            $this->lblFerrocarril->Text = ($this->objTransporte->FerrocarrilObject) ? $this->objTransporte->FerrocarrilObject->__toString() : null;
            return $this->lblFerrocarril;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstRemisCombisObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstRemisCombisObject_Create($strControlId = null) {
            $this->lstRemisCombisObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesTransporte', 'Id' , $strControlId);
            if($this->objTransporte->RemisCombisObject){
                $this->lstRemisCombisObject->Text = $this->objTransporte->RemisCombisObject->__toString();
                $this->lstRemisCombisObject->Value = $this->objTransporte->RemisCombisObject->Id;
            }
            $this->lstRemisCombisObject->Name = QApplication::Translate('RemisCombisObject');
            return $this->lstRemisCombisObject;
        }

        /**
         * Create and setup QLabel lblRemisCombis
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRemisCombis_Create($strControlId = null) {
            $this->lblRemisCombis = new QLabel($this->objParentObject, $strControlId);
            $this->lblRemisCombis->Name = QApplication::Translate('RemisCombisObject');
            $this->lblRemisCombis->Text = ($this->objTransporte->RemisCombisObject) ? $this->objTransporte->RemisCombisObject->__toString() : null;
            return $this->lblRemisCombis;
        }





        /**
         * Refresh this MetaControl with Data from the local Transporte object.
         * @param boolean $blnReload reload Transporte from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objTransporte->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTransporte->Id;

            if ($this->lstIdFolioObject) {
                if($this->objTransporte->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objTransporte->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objTransporte->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objTransporte->IdFolioObject) ? $this->objTransporte->IdFolioObject->__toString() : null;

            if ($this->lstColectivosObject) {
                if($this->objTransporte->ColectivosObject){
                    $this->lstColectivosObject->Text = $this->objTransporte->ColectivosObject->__toString();
                    $this->lstColectivosObject->Value = $this->objTransporte->Colectivos->Id;
                }                
            }
            if ($this->lblColectivos) $this->lblColectivos->Text = ($this->objTransporte->ColectivosObject) ? $this->objTransporte->ColectivosObject->__toString() : null;

            if ($this->lstFerrocarrilObject) {
                if($this->objTransporte->FerrocarrilObject){
                    $this->lstFerrocarrilObject->Text = $this->objTransporte->FerrocarrilObject->__toString();
                    $this->lstFerrocarrilObject->Value = $this->objTransporte->Ferrocarril->Id;
                }                
            }
            if ($this->lblFerrocarril) $this->lblFerrocarril->Text = ($this->objTransporte->FerrocarrilObject) ? $this->objTransporte->FerrocarrilObject->__toString() : null;

            if ($this->lstRemisCombisObject) {
                if($this->objTransporte->RemisCombisObject){
                    $this->lstRemisCombisObject->Text = $this->objTransporte->RemisCombisObject->__toString();
                    $this->lstRemisCombisObject->Value = $this->objTransporte->RemisCombis->Id;
                }                
            }
            if ($this->lblRemisCombis) $this->lblRemisCombis->Text = ($this->objTransporte->RemisCombisObject) ? $this->objTransporte->RemisCombisObject->__toString() : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC TRANSPORTE OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objTransporte->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->lstColectivosObject) $this->objTransporte->Colectivos = $this->lstColectivosObject->SelectedValue;
                if ($this->lstFerrocarrilObject) $this->objTransporte->Ferrocarril = $this->lstFerrocarrilObject->SelectedValue;
                if ($this->lstRemisCombisObject) $this->objTransporte->RemisCombis = $this->lstRemisCombisObject->SelectedValue;


        }

        public function SaveTransporte() {
            return $this->Save();
        }
        /**
         * This will save this object's Transporte instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Transporte object
                $idReturn = $this->objTransporte->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Transporte instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteTransporte() {
            $this->objTransporte->Delete();
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
                case 'Transporte': return $this->objTransporte;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Transporte fields -- will be created dynamically if not yet created
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
                case 'ColectivosControl':
                    if (!$this->lstColectivosObject) return $this->lstColectivosObject_Create();
                    return $this->lstColectivosObject;
                case 'ColectivosLabel':
                    if (!$this->lblColectivos) return $this->lblColectivos_Create();
                    return $this->lblColectivos;
                case 'FerrocarrilControl':
                    if (!$this->lstFerrocarrilObject) return $this->lstFerrocarrilObject_Create();
                    return $this->lstFerrocarrilObject;
                case 'FerrocarrilLabel':
                    if (!$this->lblFerrocarril) return $this->lblFerrocarril_Create();
                    return $this->lblFerrocarril;
                case 'RemisCombisControl':
                    if (!$this->lstRemisCombisObject) return $this->lstRemisCombisObject_Create();
                    return $this->lstRemisCombisObject;
                case 'RemisCombisLabel':
                    if (!$this->lblRemisCombis) return $this->lblRemisCombis_Create();
                    return $this->lblRemisCombis;
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
                    // Controls that point to Transporte fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'ColectivosControl':
                        return ($this->lstColectivosObject = QType::Cast($mixValue, 'QControl'));
                    case 'FerrocarrilControl':
                        return ($this->lstFerrocarrilObject = QType::Cast($mixValue, 'QControl'));
                    case 'RemisCombisControl':
                        return ($this->lstRemisCombisObject = QType::Cast($mixValue, 'QControl'));
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
