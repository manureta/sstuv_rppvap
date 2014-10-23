<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Localidad class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Localidad object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a LocalidadMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Localidad $Localidad the actual Localidad data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QListBox $IdPartidoControl
     * property-read QLabel $IdPartidoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class LocalidadMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Localidad
                */
        public $objLocalidad;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Localidad's individual data fields
        protected $lblId;
        protected $txtNombre;
        protected $lstIdPartidoObject;

        // Controls that allow the viewing of Localidad's individual data fields
        protected $lblNombre;
        protected $lblIdPartido;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * LocalidadMetaControl to edit a single Localidad object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Localidad object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this LocalidadMetaControl
         * @param Localidad $objLocalidad new or existing Localidad object
         */
         public function __construct($objParentObject, Localidad $objLocalidad) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this LocalidadMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Localidad object
            $this->objLocalidad = $objLocalidad;

            // Figure out if we're Editing or Creating New
            if ($this->objLocalidad->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this LocalidadMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Localidad object creation - defaults to CreateOrEdit
          * @return LocalidadMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objLocalidad = Localidad::Load($intId);

                // Localidad was found -- return it!
                if ($objLocalidad)
                    return new LocalidadMetaControl($objParentObject, $objLocalidad);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Localidad object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new LocalidadMetaControl($objParentObject, new Localidad());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this LocalidadMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Localidad object creation - defaults to CreateOrEdit
         * @return LocalidadMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return LocalidadMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this LocalidadMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Localidad object creation - defaults to CreateOrEdit
         * @return LocalidadMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return LocalidadMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objLocalidad->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('Nombre');
            $this->txtNombre->Text = $this->objLocalidad->Nombre;
            $this->txtNombre->Required = true;
            $this->txtNombre->MaxLength = Localidad::NombreMaxLength;
            
            return $this->txtNombre;
        }

        /**
         * Create and setup QLabel lblNombre
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombre_Create($strControlId = null) {
            $this->lblNombre = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombre->Name = QApplication::Translate('Nombre');
            $this->lblNombre->Text = $this->objLocalidad->Nombre;
            $this->lblNombre->Required = true;
            return $this->lblNombre;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdPartidoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdPartidoObject_Create($strControlId = null) {
            $this->lstIdPartidoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Partido', 'Id' , $strControlId);
            if($this->objLocalidad->IdPartidoObject){
                $this->lstIdPartidoObject->Text = $this->objLocalidad->IdPartidoObject->__toString();
                $this->lstIdPartidoObject->Value = $this->objLocalidad->IdPartidoObject->Id;
            }
            $this->lstIdPartidoObject->Name = QApplication::Translate('IdPartidoObject');
            $this->lstIdPartidoObject->Required = true;
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
            $this->lblIdPartido->Text = ($this->objLocalidad->IdPartidoObject) ? $this->objLocalidad->IdPartidoObject->__toString() : null;
            $this->lblIdPartido->Required = true;
            return $this->lblIdPartido;
        }



    public $lstFolioAsId;
    /**
     * Gets all associated FoliosAsId as an array of Folio objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Folio[]
    */ 
    public function lstFolioAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Folio';
        $strConfigArray['strRefreshMethod'] = 'FolioAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdLocalidad';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddFolioAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveFolioAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdPartidoObject'] = QApplication::Translate('IdPartidoObject');
        $strConfigArray['Columns']['IdMatricula'] = QApplication::Translate('IdMatricula');
        $strConfigArray['Columns']['Fecha'] = QApplication::Translate('Fecha');
        $strConfigArray['Columns']['Encargado'] = QApplication::Translate('Encargado');
        $strConfigArray['Columns']['NombreBarrioOficial'] = QApplication::Translate('NombreBarrioOficial');
        $strConfigArray['Columns']['NombreBarrioAlternativo1'] = QApplication::Translate('NombreBarrioAlternativo1');
        $strConfigArray['Columns']['NombreBarrioAlternativo2'] = QApplication::Translate('NombreBarrioAlternativo2');
        $strConfigArray['Columns']['AnioOrigen'] = QApplication::Translate('AnioOrigen');
        $strConfigArray['Columns']['Superficie'] = QApplication::Translate('Superficie');
        $strConfigArray['Columns']['CantidadFamilias'] = QApplication::Translate('CantidadFamilias');
        $strConfigArray['Columns']['TipoBarrioObject'] = QApplication::Translate('TipoBarrioObject');
        $strConfigArray['Columns']['ObservacionCasoDudoso'] = QApplication::Translate('ObservacionCasoDudoso');
        $strConfigArray['Columns']['Judicializado'] = QApplication::Translate('Judicializado');
        $strConfigArray['Columns']['Direccion'] = QApplication::Translate('Direccion');
        $strConfigArray['Columns']['MapeoPreliminar'] = QApplication::Translate('MapeoPreliminar');
        $strConfigArray['Columns']['ResolucionInscripcionProvisoria'] = QApplication::Translate('ResolucionInscripcionProvisoria');
        $strConfigArray['Columns']['ResolucionInscripcionDefinitiva'] = QApplication::Translate('ResolucionInscripcionDefinitiva');
        $strConfigArray['Columns']['NumExpedientes'] = QApplication::Translate('NumExpedientes');

        $this->lstFolioAsId = new QListPanel($this->objParentObject, $this->objLocalidad, $strConfigArray, $strControlId);
        $this->lstFolioAsId->Name = Folio::Noun();
        $this->lstFolioAsId->SetNewMethod($this, "lstFolioAsId_New");
        $this->lstFolioAsId->SetEditMethod($this, "lstFolioAsId_Edit");
        return $this->lstFolioAsId;
    }

    public function lstFolioAsId_New() {
        FolioModalPanel::$strControlsArray['lstIdLocalidadObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $this->lstFolioAsId->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstFolioAsId->ModalPanel->objCallerControl = $this->lstFolioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstFolioAsId_Edit($intKey) {
        FolioModalPanel::$strControlsArray['lstIdLocalidadObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $obj = $this->objLocalidad->FolioAsIdArray[$intKey];
        $this->lstFolioAsId->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstFolioAsId->ModalPanel->objCallerControl = $this->lstFolioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Localidad object.
         * @param boolean $blnReload reload Localidad from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objLocalidad->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLocalidad->Id;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objLocalidad->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objLocalidad->Nombre;

            if ($this->lstIdPartidoObject) {
                if($this->objLocalidad->IdPartidoObject){
                    $this->lstIdPartidoObject->Text = $this->objLocalidad->IdPartidoObject->__toString();
                    $this->lstIdPartidoObject->Value = $this->objLocalidad->IdPartido->Id;
                }                
            }
            if ($this->lblIdPartido) $this->lblIdPartido->Text = ($this->objLocalidad->IdPartidoObject) ? $this->objLocalidad->IdPartidoObject->__toString() : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC LOCALIDAD OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtNombre) $this->objLocalidad->Nombre = $this->txtNombre->Text;
                if ($this->lstIdPartidoObject) $this->objLocalidad->IdPartido = $this->lstIdPartidoObject->SelectedValue;


        }

        public function SaveLocalidad() {
            return $this->Save();
        }
        /**
         * This will save this object's Localidad instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Localidad object
                $idReturn = $this->objLocalidad->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Localidad instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteLocalidad() {
            $this->objLocalidad->Delete();
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
                case 'Localidad': return $this->objLocalidad;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Localidad fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'NombreControl':
                    if (!$this->txtNombre) return $this->txtNombre_Create();
                    return $this->txtNombre;
                case 'NombreLabel':
                    if (!$this->lblNombre) return $this->lblNombre_Create();
                    return $this->lblNombre;
                case 'IdPartidoControl':
                    if (!$this->lstIdPartidoObject) return $this->lstIdPartidoObject_Create();
                    return $this->lstIdPartidoObject;
                case 'IdPartidoLabel':
                    if (!$this->lblIdPartido) return $this->lblIdPartido_Create();
                    return $this->lblIdPartido;
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
                    // Controls that point to Localidad fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
                    case 'IdPartidoControl':
                        return ($this->lstIdPartidoObject = QType::Cast($mixValue, 'QControl'));
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
