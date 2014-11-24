<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Partido class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Partido object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a PartidoMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Partido $Partido the actual Partido data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QTextBox $CodPartidoControl
     * property-read QLabel $CodPartidoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class PartidoMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Partido
                */
        public $objPartido;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Partido's individual data fields
        protected $lblId;
        protected $txtNombre;
        protected $txtCodPartido;

        // Controls that allow the viewing of Partido's individual data fields
        protected $lblNombre;
        protected $lblCodPartido;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * PartidoMetaControl to edit a single Partido object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Partido object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this PartidoMetaControl
         * @param Partido $objPartido new or existing Partido object
         */
         public function __construct($objParentObject, Partido $objPartido) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this PartidoMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Partido object
            $this->objPartido = $objPartido;

            // Figure out if we're Editing or Creating New
            if ($this->objPartido->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this PartidoMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Partido object creation - defaults to CreateOrEdit
          * @return PartidoMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objPartido = Partido::Load($intId);

                // Partido was found -- return it!
                if ($objPartido)
                    return new PartidoMetaControl($objParentObject, $objPartido);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Partido object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new PartidoMetaControl($objParentObject, new Partido());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this PartidoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Partido object creation - defaults to CreateOrEdit
         * @return PartidoMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return PartidoMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this PartidoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Partido object creation - defaults to CreateOrEdit
         * @return PartidoMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return PartidoMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objPartido->Id;
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
            $this->txtNombre->Text = $this->objPartido->Nombre;
            $this->txtNombre->Required = true;
            $this->txtNombre->MaxLength = Partido::NombreMaxLength;
            
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
            $this->lblNombre->Text = $this->objPartido->Nombre;
            $this->lblNombre->Required = true;
            return $this->lblNombre;
        }

        /**
         * Create and setup QTextBox txtCodPartido
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCodPartido_Create($strControlId = null) {
            $this->txtCodPartido = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCodPartido->Name = QApplication::Translate('CodPartido');
            $this->txtCodPartido->Text = $this->objPartido->CodPartido;
            $this->txtCodPartido->MaxLength = Partido::CodPartidoMaxLength;
            
            return $this->txtCodPartido;
        }

        /**
         * Create and setup QLabel lblCodPartido
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCodPartido_Create($strControlId = null) {
            $this->lblCodPartido = new QLabel($this->objParentObject, $strControlId);
            $this->lblCodPartido->Name = QApplication::Translate('CodPartido');
            $this->lblCodPartido->Text = $this->objPartido->CodPartido;
            return $this->lblCodPartido;
        }



    public $lstAprobacionGeodesiaAsId;
    /**
     * Gets all associated AprobacionGeodesiasAsId as an array of AprobacionGeodesia objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return AprobacionGeodesia[]
    */ 
    public function lstAprobacionGeodesiaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'AprobacionGeodesia';
        $strConfigArray['strRefreshMethod'] = 'AprobacionGeodesiaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdPartido';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddAprobacionGeodesiaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveAprobacionGeodesiaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Num'] = QApplication::Translate('Num');
        $strConfigArray['Columns']['Anio'] = QApplication::Translate('Anio');

        $this->lstAprobacionGeodesiaAsId = new QListPanel($this->objParentObject, $this->objPartido, $strConfigArray, $strControlId);
        $this->lstAprobacionGeodesiaAsId->Name = AprobacionGeodesia::Noun();
        $this->lstAprobacionGeodesiaAsId->SetNewMethod($this, "lstAprobacionGeodesiaAsId_New");
        $this->lstAprobacionGeodesiaAsId->SetEditMethod($this, "lstAprobacionGeodesiaAsId_Edit");
        return $this->lstAprobacionGeodesiaAsId;
    }

    public function lstAprobacionGeodesiaAsId_New() {
        AprobacionGeodesiaModalPanel::$strControlsArray['lstIdPartidoObject'] = false;
        $strControlsArray = array_keys(AprobacionGeodesiaModalPanel::$strControlsArray, true);
        $this->lstAprobacionGeodesiaAsId->ModalPanel = new AprobacionGeodesiaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstAprobacionGeodesiaAsId->ModalPanel->objCallerControl = $this->lstAprobacionGeodesiaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstAprobacionGeodesiaAsId_Edit($intKey) {
        AprobacionGeodesiaModalPanel::$strControlsArray['lstIdPartidoObject'] = false;
        $strControlsArray = array_keys(AprobacionGeodesiaModalPanel::$strControlsArray, true);
        $obj = $this->objPartido->AprobacionGeodesiaAsIdArray[$intKey];
        $this->lstAprobacionGeodesiaAsId->ModalPanel = new AprobacionGeodesiaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstAprobacionGeodesiaAsId->ModalPanel->objCallerControl = $this->lstAprobacionGeodesiaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
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
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdPartido';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddFolioAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveFolioAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['CodFolio'] = QApplication::Translate('CodFolio');
        $strConfigArray['Columns']['IdLocalidadObject'] = QApplication::Translate('IdLocalidadObject');
        $strConfigArray['Columns']['Matricula'] = QApplication::Translate('Matricula');
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
        $strConfigArray['Columns']['NumExpedientes'] = QApplication::Translate('NumExpedientes');
        $strConfigArray['Columns']['Geom'] = QApplication::Translate('Geom');

        $this->lstFolioAsId = new QListPanel($this->objParentObject, $this->objPartido, $strConfigArray, $strControlId);
        $this->lstFolioAsId->Name = Folio::Noun();
        $this->lstFolioAsId->SetNewMethod($this, "lstFolioAsId_New");
        $this->lstFolioAsId->SetEditMethod($this, "lstFolioAsId_Edit");
        return $this->lstFolioAsId;
    }

    public function lstFolioAsId_New() {
        FolioModalPanel::$strControlsArray['lstIdPartidoObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $this->lstFolioAsId->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstFolioAsId->ModalPanel->objCallerControl = $this->lstFolioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstFolioAsId_Edit($intKey) {
        FolioModalPanel::$strControlsArray['lstIdPartidoObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $obj = $this->objPartido->FolioAsIdArray[$intKey];
        $this->lstFolioAsId->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstFolioAsId->ModalPanel->objCallerControl = $this->lstFolioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstLocalidadAsId;
    /**
     * Gets all associated LocalidadesAsId as an array of Localidad objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Localidad[]
    */ 
    public function lstLocalidadAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Localidad';
        $strConfigArray['strRefreshMethod'] = 'LocalidadAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdPartido';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddLocalidadAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveLocalidadAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Nombre'] = QApplication::Translate('Nombre');

        $this->lstLocalidadAsId = new QListPanel($this->objParentObject, $this->objPartido, $strConfigArray, $strControlId);
        $this->lstLocalidadAsId->Name = Localidad::Noun();
        $this->lstLocalidadAsId->SetNewMethod($this, "lstLocalidadAsId_New");
        $this->lstLocalidadAsId->SetEditMethod($this, "lstLocalidadAsId_Edit");
        return $this->lstLocalidadAsId;
    }

    public function lstLocalidadAsId_New() {
        LocalidadModalPanel::$strControlsArray['lstIdPartidoObject'] = false;
        $strControlsArray = array_keys(LocalidadModalPanel::$strControlsArray, true);
        $this->lstLocalidadAsId->ModalPanel = new LocalidadModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstLocalidadAsId->ModalPanel->objCallerControl = $this->lstLocalidadAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstLocalidadAsId_Edit($intKey) {
        LocalidadModalPanel::$strControlsArray['lstIdPartidoObject'] = false;
        $strControlsArray = array_keys(LocalidadModalPanel::$strControlsArray, true);
        $obj = $this->objPartido->LocalidadAsIdArray[$intKey];
        $this->lstLocalidadAsId->ModalPanel = new LocalidadModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstLocalidadAsId->ModalPanel->objCallerControl = $this->lstLocalidadAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Partido object.
         * @param boolean $blnReload reload Partido from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objPartido->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPartido->Id;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objPartido->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objPartido->Nombre;

            if ($this->txtCodPartido) $this->txtCodPartido->Text = $this->objPartido->CodPartido;
            if ($this->lblCodPartido) $this->lblCodPartido->Text = $this->objPartido->CodPartido;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC PARTIDO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtNombre) $this->objPartido->Nombre = $this->txtNombre->Text;
                if ($this->txtCodPartido) $this->objPartido->CodPartido = $this->txtCodPartido->Text;


        }

        public function SavePartido() {
            return $this->Save();
        }
        /**
         * This will save this object's Partido instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Partido object
                $idReturn = $this->objPartido->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Partido instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeletePartido() {
            $this->objPartido->Delete();
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
                case 'Partido': return $this->objPartido;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Partido fields -- will be created dynamically if not yet created
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
                case 'CodPartidoControl':
                    if (!$this->txtCodPartido) return $this->txtCodPartido_Create();
                    return $this->txtCodPartido;
                case 'CodPartidoLabel':
                    if (!$this->lblCodPartido) return $this->lblCodPartido_Create();
                    return $this->lblCodPartido;
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
                    // Controls that point to Partido fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
                    case 'CodPartidoControl':
                        return ($this->txtCodPartido = QType::Cast($mixValue, 'QControl'));
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
