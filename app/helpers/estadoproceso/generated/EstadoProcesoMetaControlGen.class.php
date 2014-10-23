<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the EstadoProceso class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single EstadoProceso object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a EstadoProcesoMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read EstadoProceso $EstadoProceso the actual EstadoProceso data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $DescripcionControl
     * property-read QLabel $DescripcionLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class EstadoProcesoMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var EstadoProceso
                */
        public $objEstadoProceso;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of EstadoProceso's individual data fields
        protected $lblId;
        protected $txtDescripcion;

        // Controls that allow the viewing of EstadoProceso's individual data fields
        protected $lblDescripcion;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * EstadoProcesoMetaControl to edit a single EstadoProceso object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single EstadoProceso object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EstadoProcesoMetaControl
         * @param EstadoProceso $objEstadoProceso new or existing EstadoProceso object
         */
         public function __construct($objParentObject, EstadoProceso $objEstadoProceso) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this EstadoProcesoMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked EstadoProceso object
            $this->objEstadoProceso = $objEstadoProceso;

            // Figure out if we're Editing or Creating New
            if ($this->objEstadoProceso->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this EstadoProcesoMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing EstadoProceso object creation - defaults to CreateOrEdit
          * @return EstadoProcesoMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objEstadoProceso = EstadoProceso::Load($intId);

                // EstadoProceso was found -- return it!
                if ($objEstadoProceso)
                    return new EstadoProcesoMetaControl($objParentObject, $objEstadoProceso);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a EstadoProceso object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new EstadoProcesoMetaControl($objParentObject, new EstadoProceso());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EstadoProcesoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing EstadoProceso object creation - defaults to CreateOrEdit
         * @return EstadoProcesoMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return EstadoProcesoMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EstadoProcesoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing EstadoProceso object creation - defaults to CreateOrEdit
         * @return EstadoProcesoMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return EstadoProcesoMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objEstadoProceso->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtDescripcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDescripcion_Create($strControlId = null) {
            $this->txtDescripcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDescripcion->Name = QApplication::Translate('Descripcion');
            $this->txtDescripcion->Text = $this->objEstadoProceso->Descripcion;
            $this->txtDescripcion->MaxLength = EstadoProceso::DescripcionMaxLength;
            
            return $this->txtDescripcion;
        }

        /**
         * Create and setup QLabel lblDescripcion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDescripcion_Create($strControlId = null) {
            $this->lblDescripcion = new QLabel($this->objParentObject, $strControlId);
            $this->lblDescripcion->Name = QApplication::Translate('Descripcion');
            $this->lblDescripcion->Text = $this->objEstadoProceso->Descripcion;
            return $this->lblDescripcion;
        }



    public $lstRegularizacionAs;
    /**
     * Gets all associated RegularizacionesAs as an array of Regularizacion objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Regularizacion[]
    */ 
    public function lstRegularizacionAs_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Regularizacion';
        $strConfigArray['strRefreshMethod'] = 'RegularizacionAsArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'EstadoProceso';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddRegularizacionAs';
        $strConfigArray['strRemoveMethod'] = 'RemoveRegularizacionAs';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['ProcesoIniciado'] = QApplication::Translate('ProcesoIniciado');
        $strConfigArray['Columns']['FechaInicio'] = QApplication::Translate('FechaInicio');
        $strConfigArray['Columns']['TienePlano'] = QApplication::Translate('TienePlano');
        $strConfigArray['Columns']['Circular10Catastro'] = QApplication::Translate('Circular10Catastro');
        $strConfigArray['Columns']['AprobacionGeodesiaObject'] = QApplication::Translate('AprobacionGeodesiaObject');
        $strConfigArray['Columns']['Registracion'] = QApplication::Translate('Registracion');

        $this->lstRegularizacionAs = new QListPanel($this->objParentObject, $this->objEstadoProceso, $strConfigArray, $strControlId);
        $this->lstRegularizacionAs->Name = Regularizacion::Noun();
        $this->lstRegularizacionAs->SetNewMethod($this, "lstRegularizacionAs_New");
        $this->lstRegularizacionAs->SetEditMethod($this, "lstRegularizacionAs_Edit");
        return $this->lstRegularizacionAs;
    }

    public function lstRegularizacionAs_New() {
        RegularizacionModalPanel::$strControlsArray['lstEstadoProcesoObject'] = false;
        $strControlsArray = array_keys(RegularizacionModalPanel::$strControlsArray, true);
        $this->lstRegularizacionAs->ModalPanel = new RegularizacionModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstRegularizacionAs->ModalPanel->objCallerControl = $this->lstRegularizacionAs;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstRegularizacionAs_Edit($intKey) {
        RegularizacionModalPanel::$strControlsArray['lstEstadoProcesoObject'] = false;
        $strControlsArray = array_keys(RegularizacionModalPanel::$strControlsArray, true);
        $obj = $this->objEstadoProceso->RegularizacionAsArray[$intKey];
        $this->lstRegularizacionAs->ModalPanel = new RegularizacionModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstRegularizacionAs->ModalPanel->objCallerControl = $this->lstRegularizacionAs;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local EstadoProceso object.
         * @param boolean $blnReload reload EstadoProceso from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objEstadoProceso->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEstadoProceso->Id;

            if ($this->txtDescripcion) $this->txtDescripcion->Text = $this->objEstadoProceso->Descripcion;
            if ($this->lblDescripcion) $this->lblDescripcion->Text = $this->objEstadoProceso->Descripcion;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC ESTADOPROCESO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtDescripcion) $this->objEstadoProceso->Descripcion = $this->txtDescripcion->Text;


        }

        public function SaveEstadoProceso() {
            return $this->Save();
        }
        /**
         * This will save this object's EstadoProceso instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the EstadoProceso object
                $idReturn = $this->objEstadoProceso->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's EstadoProceso instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteEstadoProceso() {
            $this->objEstadoProceso->Delete();
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
                case 'EstadoProceso': return $this->objEstadoProceso;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to EstadoProceso fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'DescripcionControl':
                    if (!$this->txtDescripcion) return $this->txtDescripcion_Create();
                    return $this->txtDescripcion;
                case 'DescripcionLabel':
                    if (!$this->lblDescripcion) return $this->lblDescripcion_Create();
                    return $this->lblDescripcion;
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
                    // Controls that point to EstadoProceso fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'DescripcionControl':
                        return ($this->txtDescripcion = QType::Cast($mixValue, 'QControl'));
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
