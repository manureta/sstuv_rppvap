<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Perfil class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Perfil object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a PerfilMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Perfil $Perfil the actual Perfil data class being edited
     * property QLabel $IdPerfilControl
     * property-read QLabel $IdPerfilLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QTextBox $DescripcionControl
     * property-read QLabel $DescripcionLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class PerfilMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Perfil
                */
        public $objPerfil;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Perfil's individual data fields
        protected $lblIdPerfil;
        protected $txtNombre;
        protected $txtDescripcion;

        // Controls that allow the viewing of Perfil's individual data fields
        protected $lblNombre;
        protected $lblDescripcion;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * PerfilMetaControl to edit a single Perfil object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Perfil object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this PerfilMetaControl
         * @param Perfil $objPerfil new or existing Perfil object
         */
         public function __construct($objParentObject, Perfil $objPerfil) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this PerfilMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Perfil object
            $this->objPerfil = $objPerfil;

            // Figure out if we're Editing or Creating New
            if ($this->objPerfil->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this PerfilMetaControl
         * @param integer $intIdPerfil primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Perfil object creation - defaults to CreateOrEdit
          * @return PerfilMetaControl
         */
        public static function Create($objParentObject, $intIdPerfil = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdPerfil)) {
                $objPerfil = Perfil::Load($intIdPerfil);

                // Perfil was found -- return it!
                if ($objPerfil)
                    return new PerfilMetaControl($objParentObject, $objPerfil);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Perfil object with PK arguments: ' . $intIdPerfil);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new PerfilMetaControl($objParentObject, new Perfil());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this PerfilMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Perfil object creation - defaults to CreateOrEdit
         * @return PerfilMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdPerfil = QApplication::PathInfo(0);
            return PerfilMetaControl::Create($objParentObject, $intIdPerfil, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this PerfilMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Perfil object creation - defaults to CreateOrEdit
         * @return PerfilMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdPerfil = QApplication::QueryString('id');
            return PerfilMetaControl::Create($objParentObject, $intIdPerfil, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblIdPerfil
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdPerfil_Create($strControlId = null) {
            $this->lblIdPerfil = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdPerfil->Name = QApplication::Translate('IdPerfil');
            if ($this->blnEditMode)
                $this->lblIdPerfil->Text = $this->objPerfil->IdPerfil;
            else
                $this->lblIdPerfil->Text = 'N/A';
            return $this->lblIdPerfil;
        }

        /**
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('Nombre');
            $this->txtNombre->Text = $this->objPerfil->Nombre;
            $this->txtNombre->Required = true;
            
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
            $this->lblNombre->Text = $this->objPerfil->Nombre;
            $this->lblNombre->Required = true;
            return $this->lblNombre;
        }

        /**
         * Create and setup QTextBox txtDescripcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDescripcion_Create($strControlId = null) {
            $this->txtDescripcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDescripcion->Name = QApplication::Translate('Descripcion');
            $this->txtDescripcion->Text = $this->objPerfil->Descripcion;
            
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
            $this->lblDescripcion->Text = $this->objPerfil->Descripcion;
            return $this->lblDescripcion;
        }



    public $lstUsuarioAsId;
    /**
     * Gets all associated UsuariosAsId as an array of Usuario objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Usuario[]
    */ 
    public function lstUsuarioAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Usuario';
        $strConfigArray['strRefreshMethod'] = 'UsuarioAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdPerfil';
        $strConfigArray['strPrimaryKeyProperty'] = 'IdUsuario';
        $strConfigArray['strAddMethod'] = 'AddUsuarioAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveUsuarioAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Password'] = QApplication::Translate('Password');
        $strConfigArray['Columns']['Email'] = QApplication::Translate('Email');
        $strConfigArray['Columns']['SuperAdmin'] = QApplication::Translate('SuperAdmin');
        $strConfigArray['Columns']['FechaActivacion'] = QApplication::Translate('FechaActivacion');
        $strConfigArray['Columns']['Nombre'] = QApplication::Translate('Nombre');
        $strConfigArray['Columns']['RespuestaA'] = QApplication::Translate('RespuestaA');
        $strConfigArray['Columns']['RespuestaB'] = QApplication::Translate('RespuestaB');
        $strConfigArray['Columns']['PreguntaSecretaA'] = QApplication::Translate('PreguntaSecretaA');
        $strConfigArray['Columns']['PreguntaSecretaB'] = QApplication::Translate('PreguntaSecretaB');

        $this->lstUsuarioAsId = new QListPanel($this->objParentObject, $this->objPerfil, $strConfigArray, $strControlId);
        $this->lstUsuarioAsId->Name = Usuario::Noun();
        $this->lstUsuarioAsId->SetNewMethod($this, "lstUsuarioAsId_New");
        $this->lstUsuarioAsId->SetEditMethod($this, "lstUsuarioAsId_Edit");
        return $this->lstUsuarioAsId;
    }

    public function lstUsuarioAsId_New() {
        UsuarioModalPanel::$strControlsArray['lstIdPerfilObject'] = false;
        $strControlsArray = array_keys(UsuarioModalPanel::$strControlsArray, true);
        $this->lstUsuarioAsId->ModalPanel = new UsuarioModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstUsuarioAsId->ModalPanel->objCallerControl = $this->lstUsuarioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstUsuarioAsId_Edit($intKey) {
        UsuarioModalPanel::$strControlsArray['lstIdPerfilObject'] = false;
        $strControlsArray = array_keys(UsuarioModalPanel::$strControlsArray, true);
        $obj = $this->objPerfil->UsuarioAsIdArray[$intKey];
        $this->lstUsuarioAsId->ModalPanel = new UsuarioModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstUsuarioAsId->ModalPanel->objCallerControl = $this->lstUsuarioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Perfil object.
         * @param boolean $blnReload reload Perfil from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objPerfil->Reload();

            if ($this->lblIdPerfil) if ($this->blnEditMode) $this->lblIdPerfil->Text = $this->objPerfil->IdPerfil;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objPerfil->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objPerfil->Nombre;

            if ($this->txtDescripcion) $this->txtDescripcion->Text = $this->objPerfil->Descripcion;
            if ($this->lblDescripcion) $this->lblDescripcion->Text = $this->objPerfil->Descripcion;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC PERFIL OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtNombre) $this->objPerfil->Nombre = $this->txtNombre->Text;
                if ($this->txtDescripcion) $this->objPerfil->Descripcion = $this->txtDescripcion->Text;


        }

        public function SavePerfil() {
            return $this->Save();
        }
        /**
         * This will save this object's Perfil instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Perfil object
                $idReturn = $this->objPerfil->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Perfil instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeletePerfil() {
            $this->objPerfil->Delete();
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
                case 'Perfil': return $this->objPerfil;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Perfil fields -- will be created dynamically if not yet created
                case 'IdPerfilControl':
                    if (!$this->lblIdPerfil) return $this->lblIdPerfil_Create();
                    return $this->lblIdPerfil;
                case 'IdPerfilLabel':
                    if (!$this->lblIdPerfil) return $this->lblIdPerfil_Create();
                    return $this->lblIdPerfil;
                case 'NombreControl':
                    if (!$this->txtNombre) return $this->txtNombre_Create();
                    return $this->txtNombre;
                case 'NombreLabel':
                    if (!$this->lblNombre) return $this->lblNombre_Create();
                    return $this->lblNombre;
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
                    // Controls that point to Perfil fields
                    case 'IdPerfilControl':
                        return ($this->lblIdPerfil = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
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
