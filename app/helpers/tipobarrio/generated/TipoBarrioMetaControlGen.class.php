<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the TipoBarrio class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single TipoBarrio object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a TipoBarrioMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read TipoBarrio $TipoBarrio the actual TipoBarrio data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $TipoControl
     * property-read QLabel $TipoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class TipoBarrioMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var TipoBarrio
                */
        public $objTipoBarrio;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of TipoBarrio's individual data fields
        protected $lblId;
        protected $txtTipo;

        // Controls that allow the viewing of TipoBarrio's individual data fields
        protected $lblTipo;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * TipoBarrioMetaControl to edit a single TipoBarrio object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single TipoBarrio object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoBarrioMetaControl
         * @param TipoBarrio $objTipoBarrio new or existing TipoBarrio object
         */
         public function __construct($objParentObject, TipoBarrio $objTipoBarrio) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this TipoBarrioMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked TipoBarrio object
            $this->objTipoBarrio = $objTipoBarrio;

            // Figure out if we're Editing or Creating New
            if ($this->objTipoBarrio->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoBarrioMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing TipoBarrio object creation - defaults to CreateOrEdit
          * @return TipoBarrioMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objTipoBarrio = TipoBarrio::Load($intId);

                // TipoBarrio was found -- return it!
                if ($objTipoBarrio)
                    return new TipoBarrioMetaControl($objParentObject, $objTipoBarrio);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a TipoBarrio object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new TipoBarrioMetaControl($objParentObject, new TipoBarrio());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoBarrioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing TipoBarrio object creation - defaults to CreateOrEdit
         * @return TipoBarrioMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return TipoBarrioMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this TipoBarrioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing TipoBarrio object creation - defaults to CreateOrEdit
         * @return TipoBarrioMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return TipoBarrioMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objTipoBarrio->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtTipo
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTipo_Create($strControlId = null) {
            $this->txtTipo = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTipo->Name = QApplication::Translate('Tipo');
            $this->txtTipo->Text = $this->objTipoBarrio->Tipo;
            $this->txtTipo->Required = true;
            $this->txtTipo->MaxLength = TipoBarrio::TipoMaxLength;
            
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
            $this->lblTipo->Text = $this->objTipoBarrio->Tipo;
            $this->lblTipo->Required = true;
            return $this->lblTipo;
        }



    public $lstFolio;
    /**
     * Gets all associated Folios as an array of Folio objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Folio[]
    */ 
    public function lstFolio_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Folio';
        $strConfigArray['strRefreshMethod'] = 'FolioArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'TipoBarrio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddFolio';
        $strConfigArray['strRemoveMethod'] = 'RemoveFolio';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['CodFolio'] = QApplication::Translate('CodFolio');
        $strConfigArray['Columns']['IdPartidoObject'] = QApplication::Translate('IdPartidoObject');
        $strConfigArray['Columns']['Matricula'] = QApplication::Translate('Matricula');
        $strConfigArray['Columns']['Fecha'] = QApplication::Translate('Fecha');
        $strConfigArray['Columns']['Encargado'] = QApplication::Translate('Encargado');
        $strConfigArray['Columns']['NombreBarrioOficial'] = QApplication::Translate('NombreBarrioOficial');
        $strConfigArray['Columns']['NombreBarrioAlternativo1'] = QApplication::Translate('NombreBarrioAlternativo1');
        $strConfigArray['Columns']['NombreBarrioAlternativo2'] = QApplication::Translate('NombreBarrioAlternativo2');
        $strConfigArray['Columns']['AnioOrigen'] = QApplication::Translate('AnioOrigen');
        $strConfigArray['Columns']['Superficie'] = QApplication::Translate('Superficie');
        $strConfigArray['Columns']['CantidadFamilias'] = QApplication::Translate('CantidadFamilias');
        $strConfigArray['Columns']['ObservacionCasoDudoso'] = QApplication::Translate('ObservacionCasoDudoso');
        $strConfigArray['Columns']['Direccion'] = QApplication::Translate('Direccion');
        $strConfigArray['Columns']['Geom'] = QApplication::Translate('Geom');
        $strConfigArray['Columns']['Judicializado'] = QApplication::Translate('Judicializado');
        $strConfigArray['Columns']['Localidad'] = QApplication::Translate('Localidad');

        $this->lstFolio = new QListPanel($this->objParentObject, $this->objTipoBarrio, $strConfigArray, $strControlId);
        $this->lstFolio->Name = Folio::Noun();
        $this->lstFolio->SetNewMethod($this, "lstFolio_New");
        $this->lstFolio->SetEditMethod($this, "lstFolio_Edit");
        return $this->lstFolio;
    }

    public function lstFolio_New() {
        FolioModalPanel::$strControlsArray['lstTipoBarrioObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $this->lstFolio->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstFolio->ModalPanel->objCallerControl = $this->lstFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstFolio_Edit($intKey) {
        FolioModalPanel::$strControlsArray['lstTipoBarrioObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $obj = $this->objTipoBarrio->FolioArray[$intKey];
        $this->lstFolio->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstFolio->ModalPanel->objCallerControl = $this->lstFolio;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local TipoBarrio object.
         * @param boolean $blnReload reload TipoBarrio from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objTipoBarrio->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTipoBarrio->Id;

            if ($this->txtTipo) $this->txtTipo->Text = $this->objTipoBarrio->Tipo;
            if ($this->lblTipo) $this->lblTipo->Text = $this->objTipoBarrio->Tipo;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC TIPOBARRIO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtTipo) $this->objTipoBarrio->Tipo = $this->txtTipo->Text;


        }

        public function SaveTipoBarrio() {
            return $this->Save();
        }
        /**
         * This will save this object's TipoBarrio instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the TipoBarrio object
                $idReturn = $this->objTipoBarrio->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's TipoBarrio instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteTipoBarrio() {
            $this->objTipoBarrio->Delete();
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
                case 'TipoBarrio': return $this->objTipoBarrio;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to TipoBarrio fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'TipoControl':
                    if (!$this->txtTipo) return $this->txtTipo_Create();
                    return $this->txtTipo;
                case 'TipoLabel':
                    if (!$this->lblTipo) return $this->lblTipo_Create();
                    return $this->lblTipo;
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
                    // Controls that point to TipoBarrio fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'TipoControl':
                        return ($this->txtTipo = QType::Cast($mixValue, 'QControl'));
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
