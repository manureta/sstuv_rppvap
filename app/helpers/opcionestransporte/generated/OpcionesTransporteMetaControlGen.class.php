<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the OpcionesTransporte class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single OpcionesTransporte object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a OpcionesTransporteMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read OpcionesTransporte $OpcionesTransporte the actual OpcionesTransporte data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $OpcionControl
     * property-read QLabel $OpcionLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class OpcionesTransporteMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var OpcionesTransporte
                */
        public $objOpcionesTransporte;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of OpcionesTransporte's individual data fields
        protected $lblId;
        protected $txtOpcion;

        // Controls that allow the viewing of OpcionesTransporte's individual data fields
        protected $lblOpcion;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * OpcionesTransporteMetaControl to edit a single OpcionesTransporte object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single OpcionesTransporte object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesTransporteMetaControl
         * @param OpcionesTransporte $objOpcionesTransporte new or existing OpcionesTransporte object
         */
         public function __construct($objParentObject, OpcionesTransporte $objOpcionesTransporte) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this OpcionesTransporteMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked OpcionesTransporte object
            $this->objOpcionesTransporte = $objOpcionesTransporte;

            // Figure out if we're Editing or Creating New
            if ($this->objOpcionesTransporte->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesTransporteMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesTransporte object creation - defaults to CreateOrEdit
          * @return OpcionesTransporteMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objOpcionesTransporte = OpcionesTransporte::Load($intId);

                // OpcionesTransporte was found -- return it!
                if ($objOpcionesTransporte)
                    return new OpcionesTransporteMetaControl($objParentObject, $objOpcionesTransporte);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a OpcionesTransporte object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new OpcionesTransporteMetaControl($objParentObject, new OpcionesTransporte());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesTransporteMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesTransporte object creation - defaults to CreateOrEdit
         * @return OpcionesTransporteMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return OpcionesTransporteMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesTransporteMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesTransporte object creation - defaults to CreateOrEdit
         * @return OpcionesTransporteMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return OpcionesTransporteMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objOpcionesTransporte->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtOpcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOpcion_Create($strControlId = null) {
            $this->txtOpcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOpcion->Name = QApplication::Translate('Opcion');
            $this->txtOpcion->Text = $this->objOpcionesTransporte->Opcion;
            $this->txtOpcion->MaxLength = OpcionesTransporte::OpcionMaxLength;
            
            return $this->txtOpcion;
        }

        /**
         * Create and setup QLabel lblOpcion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOpcion_Create($strControlId = null) {
            $this->lblOpcion = new QLabel($this->objParentObject, $strControlId);
            $this->lblOpcion->Name = QApplication::Translate('Opcion');
            $this->lblOpcion->Text = $this->objOpcionesTransporte->Opcion;
            return $this->lblOpcion;
        }



    public $lstTransporteAsColectivos;
    /**
     * Gets all associated TransportesAsColectivos as an array of Transporte objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Transporte[]
    */ 
    public function lstTransporteAsColectivos_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Transporte';
        $strConfigArray['strRefreshMethod'] = 'TransporteAsColectivosArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'Colectivos';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddTransporteAsColectivos';
        $strConfigArray['strRemoveMethod'] = 'RemoveTransporteAsColectivos';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['FerrocarrilObject'] = QApplication::Translate('FerrocarrilObject');
        $strConfigArray['Columns']['RemisCombisObject'] = QApplication::Translate('RemisCombisObject');

        $this->lstTransporteAsColectivos = new QListPanel($this->objParentObject, $this->objOpcionesTransporte, $strConfigArray, $strControlId);
        $this->lstTransporteAsColectivos->Name = Transporte::Noun();
        $this->lstTransporteAsColectivos->SetNewMethod($this, "lstTransporteAsColectivos_New");
        $this->lstTransporteAsColectivos->SetEditMethod($this, "lstTransporteAsColectivos_Edit");
        return $this->lstTransporteAsColectivos;
    }

    public function lstTransporteAsColectivos_New() {
        TransporteModalPanel::$strControlsArray['lstColectivosObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $this->lstTransporteAsColectivos->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstTransporteAsColectivos->ModalPanel->objCallerControl = $this->lstTransporteAsColectivos;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstTransporteAsColectivos_Edit($intKey) {
        TransporteModalPanel::$strControlsArray['lstColectivosObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesTransporte->TransporteAsColectivosArray[$intKey];
        $this->lstTransporteAsColectivos->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstTransporteAsColectivos->ModalPanel->objCallerControl = $this->lstTransporteAsColectivos;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstTransporteAsFerrocarril;
    /**
     * Gets all associated TransportesAsFerrocarril as an array of Transporte objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Transporte[]
    */ 
    public function lstTransporteAsFerrocarril_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Transporte';
        $strConfigArray['strRefreshMethod'] = 'TransporteAsFerrocarrilArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'Ferrocarril';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddTransporteAsFerrocarril';
        $strConfigArray['strRemoveMethod'] = 'RemoveTransporteAsFerrocarril';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['ColectivosObject'] = QApplication::Translate('ColectivosObject');
        $strConfigArray['Columns']['RemisCombisObject'] = QApplication::Translate('RemisCombisObject');

        $this->lstTransporteAsFerrocarril = new QListPanel($this->objParentObject, $this->objOpcionesTransporte, $strConfigArray, $strControlId);
        $this->lstTransporteAsFerrocarril->Name = Transporte::Noun();
        $this->lstTransporteAsFerrocarril->SetNewMethod($this, "lstTransporteAsFerrocarril_New");
        $this->lstTransporteAsFerrocarril->SetEditMethod($this, "lstTransporteAsFerrocarril_Edit");
        return $this->lstTransporteAsFerrocarril;
    }

    public function lstTransporteAsFerrocarril_New() {
        TransporteModalPanel::$strControlsArray['lstFerrocarrilObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $this->lstTransporteAsFerrocarril->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstTransporteAsFerrocarril->ModalPanel->objCallerControl = $this->lstTransporteAsFerrocarril;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstTransporteAsFerrocarril_Edit($intKey) {
        TransporteModalPanel::$strControlsArray['lstFerrocarrilObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesTransporte->TransporteAsFerrocarrilArray[$intKey];
        $this->lstTransporteAsFerrocarril->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstTransporteAsFerrocarril->ModalPanel->objCallerControl = $this->lstTransporteAsFerrocarril;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstTransporteAsRemisCombis;
    /**
     * Gets all associated TransportesAsRemisCombis as an array of Transporte objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Transporte[]
    */ 
    public function lstTransporteAsRemisCombis_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Transporte';
        $strConfigArray['strRefreshMethod'] = 'TransporteAsRemisCombisArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'RemisCombis';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddTransporteAsRemisCombis';
        $strConfigArray['strRemoveMethod'] = 'RemoveTransporteAsRemisCombis';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['ColectivosObject'] = QApplication::Translate('ColectivosObject');
        $strConfigArray['Columns']['FerrocarrilObject'] = QApplication::Translate('FerrocarrilObject');

        $this->lstTransporteAsRemisCombis = new QListPanel($this->objParentObject, $this->objOpcionesTransporte, $strConfigArray, $strControlId);
        $this->lstTransporteAsRemisCombis->Name = Transporte::Noun();
        $this->lstTransporteAsRemisCombis->SetNewMethod($this, "lstTransporteAsRemisCombis_New");
        $this->lstTransporteAsRemisCombis->SetEditMethod($this, "lstTransporteAsRemisCombis_Edit");
        return $this->lstTransporteAsRemisCombis;
    }

    public function lstTransporteAsRemisCombis_New() {
        TransporteModalPanel::$strControlsArray['lstRemisCombisObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $this->lstTransporteAsRemisCombis->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstTransporteAsRemisCombis->ModalPanel->objCallerControl = $this->lstTransporteAsRemisCombis;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstTransporteAsRemisCombis_Edit($intKey) {
        TransporteModalPanel::$strControlsArray['lstRemisCombisObject'] = false;
        $strControlsArray = array_keys(TransporteModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesTransporte->TransporteAsRemisCombisArray[$intKey];
        $this->lstTransporteAsRemisCombis->ModalPanel = new TransporteModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstTransporteAsRemisCombis->ModalPanel->objCallerControl = $this->lstTransporteAsRemisCombis;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local OpcionesTransporte object.
         * @param boolean $blnReload reload OpcionesTransporte from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objOpcionesTransporte->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOpcionesTransporte->Id;

            if ($this->txtOpcion) $this->txtOpcion->Text = $this->objOpcionesTransporte->Opcion;
            if ($this->lblOpcion) $this->lblOpcion->Text = $this->objOpcionesTransporte->Opcion;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC OPCIONESTRANSPORTE OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtOpcion) $this->objOpcionesTransporte->Opcion = $this->txtOpcion->Text;


        }

        public function SaveOpcionesTransporte() {
            return $this->Save();
        }
        /**
         * This will save this object's OpcionesTransporte instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the OpcionesTransporte object
                $idReturn = $this->objOpcionesTransporte->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's OpcionesTransporte instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteOpcionesTransporte() {
            $this->objOpcionesTransporte->Delete();
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
                case 'OpcionesTransporte': return $this->objOpcionesTransporte;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to OpcionesTransporte fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'OpcionControl':
                    if (!$this->txtOpcion) return $this->txtOpcion_Create();
                    return $this->txtOpcion;
                case 'OpcionLabel':
                    if (!$this->lblOpcion) return $this->lblOpcion_Create();
                    return $this->lblOpcion;
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
                    // Controls that point to OpcionesTransporte fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'OpcionControl':
                        return ($this->txtOpcion = QType::Cast($mixValue, 'QControl'));
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
