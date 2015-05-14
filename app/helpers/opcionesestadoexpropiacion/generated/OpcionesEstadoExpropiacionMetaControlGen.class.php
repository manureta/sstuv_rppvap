<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the OpcionesEstadoExpropiacion class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single OpcionesEstadoExpropiacion object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a OpcionesEstadoExpropiacionMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read OpcionesEstadoExpropiacion $OpcionesEstadoExpropiacion the actual OpcionesEstadoExpropiacion data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $DescripcionControl
     * property-read QLabel $DescripcionLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class OpcionesEstadoExpropiacionMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var OpcionesEstadoExpropiacion
                */
        public $objOpcionesEstadoExpropiacion;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of OpcionesEstadoExpropiacion's individual data fields
        protected $lblId;
        protected $txtDescripcion;

        // Controls that allow the viewing of OpcionesEstadoExpropiacion's individual data fields
        protected $lblDescripcion;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * OpcionesEstadoExpropiacionMetaControl to edit a single OpcionesEstadoExpropiacion object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single OpcionesEstadoExpropiacion object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEstadoExpropiacionMetaControl
         * @param OpcionesEstadoExpropiacion $objOpcionesEstadoExpropiacion new or existing OpcionesEstadoExpropiacion object
         */
         public function __construct($objParentObject, OpcionesEstadoExpropiacion $objOpcionesEstadoExpropiacion) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this OpcionesEstadoExpropiacionMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked OpcionesEstadoExpropiacion object
            $this->objOpcionesEstadoExpropiacion = $objOpcionesEstadoExpropiacion;

            // Figure out if we're Editing or Creating New
            if ($this->objOpcionesEstadoExpropiacion->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEstadoExpropiacionMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesEstadoExpropiacion object creation - defaults to CreateOrEdit
          * @return OpcionesEstadoExpropiacionMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objOpcionesEstadoExpropiacion = OpcionesEstadoExpropiacion::Load($intId);

                // OpcionesEstadoExpropiacion was found -- return it!
                if ($objOpcionesEstadoExpropiacion)
                    return new OpcionesEstadoExpropiacionMetaControl($objParentObject, $objOpcionesEstadoExpropiacion);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a OpcionesEstadoExpropiacion object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new OpcionesEstadoExpropiacionMetaControl($objParentObject, new OpcionesEstadoExpropiacion());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEstadoExpropiacionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesEstadoExpropiacion object creation - defaults to CreateOrEdit
         * @return OpcionesEstadoExpropiacionMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return OpcionesEstadoExpropiacionMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesEstadoExpropiacionMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesEstadoExpropiacion object creation - defaults to CreateOrEdit
         * @return OpcionesEstadoExpropiacionMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return OpcionesEstadoExpropiacionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objOpcionesEstadoExpropiacion->Id;
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
            $this->txtDescripcion->Text = $this->objOpcionesEstadoExpropiacion->Descripcion;
            
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
            $this->lblDescripcion->Text = $this->objOpcionesEstadoExpropiacion->Descripcion;
            return $this->lblDescripcion;
        }



    public $lstEncuadreLegalAsEstadoProcesoExpropiacion;
    /**
     * Gets all associated EncuadreLegalesAsEstadoProcesoExpropiacion as an array of EncuadreLegal objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return EncuadreLegal[]
    */ 
    public function lstEncuadreLegalAsEstadoProcesoExpropiacion_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'EncuadreLegal';
        $strConfigArray['strRefreshMethod'] = 'EncuadreLegalAsEstadoProcesoExpropiacionArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'EstadoProcesoExpropiacion';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEncuadreLegalAsEstadoProcesoExpropiacion';
        $strConfigArray['strRemoveMethod'] = 'RemoveEncuadreLegalAsEstadoProcesoExpropiacion';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['Decreto222595'] = QApplication::Translate('Decreto222595');
        $strConfigArray['Columns']['Ley24374'] = QApplication::Translate('Ley24374');
        $strConfigArray['Columns']['Decreto81588'] = QApplication::Translate('Decreto81588');
        $strConfigArray['Columns']['Ley23073'] = QApplication::Translate('Ley23073');
        $strConfigArray['Columns']['Decreto468696'] = QApplication::Translate('Decreto468696');
        $strConfigArray['Columns']['Expropiacion'] = QApplication::Translate('Expropiacion');
        $strConfigArray['Columns']['Ley14449'] = QApplication::Translate('Ley14449');
        $strConfigArray['Columns']['TieneExpropiacion'] = QApplication::Translate('TieneExpropiacion');
        $strConfigArray['Columns']['Otros'] = QApplication::Translate('Otros');
        $strConfigArray['Columns']['FechaSancion'] = QApplication::Translate('FechaSancion');
        $strConfigArray['Columns']['FechaVencimiento'] = QApplication::Translate('FechaVencimiento');
        $strConfigArray['Columns']['NomenclaturaTextoLey'] = QApplication::Translate('NomenclaturaTextoLey');
        $strConfigArray['Columns']['TasacionAdministrativa'] = QApplication::Translate('TasacionAdministrativa');
        $strConfigArray['Columns']['PrecioPagado'] = QApplication::Translate('PrecioPagado');
        $strConfigArray['Columns']['Juzgado'] = QApplication::Translate('Juzgado');
        $strConfigArray['Columns']['MemoriaDescriptiva'] = QApplication::Translate('MemoriaDescriptiva');

        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion = new QListPanel($this->objParentObject, $this->objOpcionesEstadoExpropiacion, $strConfigArray, $strControlId);
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->Name = EncuadreLegal::Noun();
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->SetNewMethod($this, "lstEncuadreLegalAsEstadoProcesoExpropiacion_New");
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->SetEditMethod($this, "lstEncuadreLegalAsEstadoProcesoExpropiacion_Edit");
        return $this->lstEncuadreLegalAsEstadoProcesoExpropiacion;
    }

    public function lstEncuadreLegalAsEstadoProcesoExpropiacion_New() {
        EncuadreLegalModalPanel::$strControlsArray['lstEstadoProcesoExpropiacionObject'] = false;
        $strControlsArray = array_keys(EncuadreLegalModalPanel::$strControlsArray, true);
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->ModalPanel = new EncuadreLegalModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->ModalPanel->objCallerControl = $this->lstEncuadreLegalAsEstadoProcesoExpropiacion;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEncuadreLegalAsEstadoProcesoExpropiacion_Edit($intKey) {
        EncuadreLegalModalPanel::$strControlsArray['lstEstadoProcesoExpropiacionObject'] = false;
        $strControlsArray = array_keys(EncuadreLegalModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesEstadoExpropiacion->EncuadreLegalAsEstadoProcesoExpropiacionArray[$intKey];
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->ModalPanel = new EncuadreLegalModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEncuadreLegalAsEstadoProcesoExpropiacion->ModalPanel->objCallerControl = $this->lstEncuadreLegalAsEstadoProcesoExpropiacion;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local OpcionesEstadoExpropiacion object.
         * @param boolean $blnReload reload OpcionesEstadoExpropiacion from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objOpcionesEstadoExpropiacion->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOpcionesEstadoExpropiacion->Id;

            if ($this->txtDescripcion) $this->txtDescripcion->Text = $this->objOpcionesEstadoExpropiacion->Descripcion;
            if ($this->lblDescripcion) $this->lblDescripcion->Text = $this->objOpcionesEstadoExpropiacion->Descripcion;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC OPCIONESESTADOEXPROPIACION OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtDescripcion) $this->objOpcionesEstadoExpropiacion->Descripcion = $this->txtDescripcion->Text;


        }

        public function SaveOpcionesEstadoExpropiacion() {
            return $this->Save();
        }
        /**
         * This will save this object's OpcionesEstadoExpropiacion instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the OpcionesEstadoExpropiacion object
                $idReturn = $this->objOpcionesEstadoExpropiacion->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's OpcionesEstadoExpropiacion instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteOpcionesEstadoExpropiacion() {
            $this->objOpcionesEstadoExpropiacion->Delete();
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
                case 'OpcionesEstadoExpropiacion': return $this->objOpcionesEstadoExpropiacion;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to OpcionesEstadoExpropiacion fields -- will be created dynamically if not yet created
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
                    // Controls that point to OpcionesEstadoExpropiacion fields
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
