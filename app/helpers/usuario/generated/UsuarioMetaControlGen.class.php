<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Usuario class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Usuario object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a UsuarioMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Usuario $Usuario the actual Usuario data class being edited
     * property QLabel $IdUsuarioControl
     * property-read QLabel $IdUsuarioLabel
     * property QTextBox $PasswordControl
     * property-read QLabel $PasswordLabel
     * property QTextBox $EmailControl
     * property-read QLabel $EmailLabel
     * property QCheckBox $SuperAdminControl
     * property-read QLabel $SuperAdminLabel
     * property QDateTimePicker $FechaActivacionControl
     * property-read QLabel $FechaActivacionLabel
     * property QTextBox $NombreControl
     * property-read QLabel $NombreLabel
     * property QListBox $IdPerfilControl
     * property-read QLabel $IdPerfilLabel
     * property QTextBox $CodPartidoControl
     * property-read QLabel $CodPartidoLabel
     * property QTextBox $NombreCompletoControl
     * property-read QLabel $NombreCompletoLabel
     * property QTextBox $ReparticionControl
     * property-read QLabel $ReparticionLabel
     * property QTextBox $TelefonoControl
     * property-read QLabel $TelefonoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class UsuarioMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Usuario
                */
        public $objUsuario;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Usuario's individual data fields
        protected $lblIdUsuario;
        protected $txtPassword;
        protected $txtEmail;
        protected $chkSuperAdmin;
        protected $calFechaActivacion;
        protected $txtNombre;
        protected $lstIdPerfilObject;
        protected $txtCodPartido;
        protected $txtNombreCompleto;
        protected $txtReparticion;
        protected $txtTelefono;

        // Controls that allow the viewing of Usuario's individual data fields
        protected $lblPassword;
        protected $lblEmail;
        protected $lblSuperAdmin;
        protected $lblFechaActivacion;
        protected $lblNombre;
        protected $lblIdPerfil;
        protected $lblCodPartido;
        protected $lblNombreCompleto;
        protected $lblReparticion;
        protected $lblTelefono;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * UsuarioMetaControl to edit a single Usuario object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Usuario object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this UsuarioMetaControl
         * @param Usuario $objUsuario new or existing Usuario object
         */
         public function __construct($objParentObject, Usuario $objUsuario) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this UsuarioMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Usuario object
            $this->objUsuario = $objUsuario;

            // Figure out if we're Editing or Creating New
            if ($this->objUsuario->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this UsuarioMetaControl
         * @param integer $intIdUsuario primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Usuario object creation - defaults to CreateOrEdit
          * @return UsuarioMetaControl
         */
        public static function Create($objParentObject, $intIdUsuario = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intIdUsuario)) {
                $objUsuario = Usuario::Load($intIdUsuario);

                // Usuario was found -- return it!
                if ($objUsuario)
                    return new UsuarioMetaControl($objParentObject, $objUsuario);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Usuario object with PK arguments: ' . $intIdUsuario);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new UsuarioMetaControl($objParentObject, new Usuario());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this UsuarioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Usuario object creation - defaults to CreateOrEdit
         * @return UsuarioMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdUsuario = QApplication::PathInfo(0);
            return UsuarioMetaControl::Create($objParentObject, $intIdUsuario, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this UsuarioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Usuario object creation - defaults to CreateOrEdit
         * @return UsuarioMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intIdUsuario = QApplication::QueryString('id');
            return UsuarioMetaControl::Create($objParentObject, $intIdUsuario, $intCreateType);
        }



        ///////////////////////////////////////////////
        // PUBLIC CREATE and REFRESH METHODS
        ///////////////////////////////////////////////

        /**
         * Create and setup QLabel lblIdUsuario
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdUsuario_Create($strControlId = null) {
            $this->lblIdUsuario = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdUsuario->Name = QApplication::Translate('IdUsuario');
            if ($this->blnEditMode)
                $this->lblIdUsuario->Text = $this->objUsuario->IdUsuario;
            else
                $this->lblIdUsuario->Text = 'N/A';
            return $this->lblIdUsuario;
        }

        /**
         * Create and setup QTextBox txtPassword
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtPassword_Create($strControlId = null) {
            $this->txtPassword = new QTextBox($this->objParentObject, $strControlId);
            $this->txtPassword->Name = QApplication::Translate('Password');
            $this->txtPassword->Text = $this->objUsuario->Password;
            $this->txtPassword->Required = true;
            
            return $this->txtPassword;
        }

        /**
         * Create and setup QLabel lblPassword
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblPassword_Create($strControlId = null) {
            $this->lblPassword = new QLabel($this->objParentObject, $strControlId);
            $this->lblPassword->Name = QApplication::Translate('Password');
            $this->lblPassword->Text = $this->objUsuario->Password;
            $this->lblPassword->Required = true;
            return $this->lblPassword;
        }

        /**
         * Create and setup QTextBox txtEmail
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtEmail_Create($strControlId = null) {
            $this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
            $this->txtEmail->Name = QApplication::Translate('Email');
            $this->txtEmail->Text = $this->objUsuario->Email;
            $this->txtEmail->Required = true;
            
            return $this->txtEmail;
        }

        /**
         * Create and setup QLabel lblEmail
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEmail_Create($strControlId = null) {
            $this->lblEmail = new QLabel($this->objParentObject, $strControlId);
            $this->lblEmail->Name = QApplication::Translate('Email');
            $this->lblEmail->Text = $this->objUsuario->Email;
            $this->lblEmail->Required = true;
            return $this->lblEmail;
        }

        /**
         * Create and setup QCheckBox chkSuperAdmin
         * @param string $strControlId optional ControlId to use
         * @return QCheckBox
         */
        public function chkSuperAdmin_Create($strControlId = null) {
            $this->chkSuperAdmin = new QCheckBox($this->objParentObject, $strControlId);
            $this->chkSuperAdmin->Name = QApplication::Translate('SuperAdmin');
            $this->chkSuperAdmin->Checked = $this->objUsuario->SuperAdmin;
                        return $this->chkSuperAdmin;
        }

        /**
         * Create and setup QLabel lblSuperAdmin
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSuperAdmin_Create($strControlId = null) {
            $this->lblSuperAdmin = new QLabel($this->objParentObject, $strControlId);
            $this->lblSuperAdmin->Name = QApplication::Translate('SuperAdmin');
            $this->lblSuperAdmin->Text = ($this->objUsuario->SuperAdmin) ? QApplication::Translate('Yes') : QApplication::Translate('No');
            return $this->lblSuperAdmin;
        }

        /**
         * Create and setup QDateTimePicker calFechaActivacion
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaActivacion_Create($strControlId = null) {
            $this->calFechaActivacion = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaActivacion->Name = QApplication::Translate('FechaActivacion');
            $this->calFechaActivacion->DateTime = $this->objUsuario->FechaActivacion;
            $this->calFechaActivacion->DateTimePickerType = QDateTimePickerType::Date;
            $this->calFechaActivacion->Required = true;
            
            return $this->calFechaActivacion;
        }

        /**
         * Create and setup QLabel lblFechaActivacion
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaActivacion_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaActivacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaActivacion->Name = QApplication::Translate('FechaActivacion');
            $this->strFechaActivacionDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaActivacion->Text = sprintf($this->objUsuario->FechaActivacion) ? $this->objUsuario->FechaActivacion->__toString($this->strFechaActivacionDateTimeFormat) : null;
            $this->lblFechaActivacion->Required = true;
            return $this->lblFechaActivacion;
        }

        protected $strFechaActivacionDateTimeFormat;


        /**
         * Create and setup QTextBox txtNombre
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombre_Create($strControlId = null) {
            $this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombre->Name = QApplication::Translate('Nombre');
            $this->txtNombre->Text = $this->objUsuario->Nombre;
            
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
            $this->lblNombre->Text = $this->objUsuario->Nombre;
            return $this->lblNombre;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdPerfilObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdPerfilObject_Create($strControlId = null) {
            $this->lstIdPerfilObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Perfil', 'IdPerfil' , $strControlId);
            if($this->objUsuario->IdPerfilObject){
                $this->lstIdPerfilObject->Text = $this->objUsuario->IdPerfilObject->__toString();
                $this->lstIdPerfilObject->Value = $this->objUsuario->IdPerfilObject->IdPerfil;
            }
            $this->lstIdPerfilObject->Name = QApplication::Translate('IdPerfilObject');
            return $this->lstIdPerfilObject;
        }

        /**
         * Create and setup QLabel lblIdPerfil
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdPerfil_Create($strControlId = null) {
            $this->lblIdPerfil = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdPerfil->Name = QApplication::Translate('IdPerfilObject');
            $this->lblIdPerfil->Text = ($this->objUsuario->IdPerfilObject) ? $this->objUsuario->IdPerfilObject->__toString() : null;
            return $this->lblIdPerfil;
        }

        /**
         * Create and setup QTextBox txtCodPartido
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCodPartido_Create($strControlId = null) {
            $this->txtCodPartido = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCodPartido->Name = QApplication::Translate('CodPartido');
            $this->txtCodPartido->Text = $this->objUsuario->CodPartido;
            $this->txtCodPartido->MaxLength = Usuario::CodPartidoMaxLength;
            
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
            $this->lblCodPartido->Text = $this->objUsuario->CodPartido;
            return $this->lblCodPartido;
        }

        /**
         * Create and setup QTextBox txtNombreCompleto
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombreCompleto_Create($strControlId = null) {
            $this->txtNombreCompleto = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombreCompleto->Name = QApplication::Translate('NombreCompleto');
            $this->txtNombreCompleto->Text = $this->objUsuario->NombreCompleto;
            $this->txtNombreCompleto->Required = true;
            
            return $this->txtNombreCompleto;
        }

        /**
         * Create and setup QLabel lblNombreCompleto
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombreCompleto_Create($strControlId = null) {
            $this->lblNombreCompleto = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombreCompleto->Name = QApplication::Translate('NombreCompleto');
            $this->lblNombreCompleto->Text = $this->objUsuario->NombreCompleto;
            $this->lblNombreCompleto->Required = true;
            return $this->lblNombreCompleto;
        }

        /**
         * Create and setup QTextBox txtReparticion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtReparticion_Create($strControlId = null) {
            $this->txtReparticion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtReparticion->Name = QApplication::Translate('Reparticion');
            $this->txtReparticion->Text = $this->objUsuario->Reparticion;
            $this->txtReparticion->Required = true;
            
            return $this->txtReparticion;
        }

        /**
         * Create and setup QLabel lblReparticion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblReparticion_Create($strControlId = null) {
            $this->lblReparticion = new QLabel($this->objParentObject, $strControlId);
            $this->lblReparticion->Name = QApplication::Translate('Reparticion');
            $this->lblReparticion->Text = $this->objUsuario->Reparticion;
            $this->lblReparticion->Required = true;
            return $this->lblReparticion;
        }

        /**
         * Create and setup QTextBox txtTelefono
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTelefono_Create($strControlId = null) {
            $this->txtTelefono = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTelefono->Name = QApplication::Translate('Telefono');
            $this->txtTelefono->Text = $this->objUsuario->Telefono;
            
            return $this->txtTelefono;
        }

        /**
         * Create and setup QLabel lblTelefono
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTelefono_Create($strControlId = null) {
            $this->lblTelefono = new QLabel($this->objParentObject, $strControlId);
            $this->lblTelefono->Name = QApplication::Translate('Telefono');
            $this->lblTelefono->Text = $this->objUsuario->Telefono;
            return $this->lblTelefono;
        }



    public $lstComentariosAsId;
    /**
     * Gets all associated ComentariosesAsId as an array of Comentarios objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Comentarios[]
    */ 
    public function lstComentariosAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Comentarios';
        $strConfigArray['strRefreshMethod'] = 'ComentariosAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdUsuario';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddComentariosAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveComentariosAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['FechaCreacion'] = QApplication::Translate('FechaCreacion');
        $strConfigArray['Columns']['FechaModificacion'] = QApplication::Translate('FechaModificacion');
        $strConfigArray['Columns']['Comentario'] = QApplication::Translate('Comentario');

        $this->lstComentariosAsId = new QListPanel($this->objParentObject, $this->objUsuario, $strConfigArray, $strControlId);
        $this->lstComentariosAsId->Name = Comentarios::Noun();
        $this->lstComentariosAsId->SetNewMethod($this, "lstComentariosAsId_New");
        $this->lstComentariosAsId->SetEditMethod($this, "lstComentariosAsId_Edit");
        return $this->lstComentariosAsId;
    }

    public function lstComentariosAsId_New() {
        ComentariosModalPanel::$strControlsArray['lstIdUsuarioObject'] = false;
        $strControlsArray = array_keys(ComentariosModalPanel::$strControlsArray, true);
        $this->lstComentariosAsId->ModalPanel = new ComentariosModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstComentariosAsId->ModalPanel->objCallerControl = $this->lstComentariosAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstComentariosAsId_Edit($intKey) {
        ComentariosModalPanel::$strControlsArray['lstIdUsuarioObject'] = false;
        $strControlsArray = array_keys(ComentariosModalPanel::$strControlsArray, true);
        $obj = $this->objUsuario->ComentariosAsIdArray[$intKey];
        $this->lstComentariosAsId->ModalPanel = new ComentariosModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstComentariosAsId->ModalPanel->objCallerControl = $this->lstComentariosAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstFolioAsCreador;
    /**
     * Gets all associated FoliosAsCreador as an array of Folio objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Folio[]
    */ 
    public function lstFolioAsCreador_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Folio';
        $strConfigArray['strRefreshMethod'] = 'FolioAsCreadorArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'Creador';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddFolioAsCreador';
        $strConfigArray['strRemoveMethod'] = 'RemoveFolioAsCreador';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['CodFolio'] = QApplication::Translate('CodFolio');
        $strConfigArray['Columns']['IdPartidoObject'] = QApplication::Translate('IdPartidoObject');
        $strConfigArray['Columns']['Matricula'] = QApplication::Translate('Matricula');
        $strConfigArray['Columns']['Fecha'] = QApplication::Translate('Fecha');
        $strConfigArray['Columns']['NombreBarrioOficial'] = QApplication::Translate('NombreBarrioOficial');
        $strConfigArray['Columns']['NombreBarrioAlternativo1'] = QApplication::Translate('NombreBarrioAlternativo1');
        $strConfigArray['Columns']['NombreBarrioAlternativo2'] = QApplication::Translate('NombreBarrioAlternativo2');
        $strConfigArray['Columns']['AnioOrigen'] = QApplication::Translate('AnioOrigen');
        $strConfigArray['Columns']['CantidadFamilias'] = QApplication::Translate('CantidadFamilias');
        $strConfigArray['Columns']['TipoBarrioObject'] = QApplication::Translate('TipoBarrioObject');
        $strConfigArray['Columns']['ObservacionCasoDudoso'] = QApplication::Translate('ObservacionCasoDudoso');
        $strConfigArray['Columns']['Direccion'] = QApplication::Translate('Direccion');
        $strConfigArray['Columns']['Geom'] = QApplication::Translate('Geom');
        $strConfigArray['Columns']['Judicializado'] = QApplication::Translate('Judicializado');
        $strConfigArray['Columns']['Localidad'] = QApplication::Translate('Localidad');
        $strConfigArray['Columns']['Superficie'] = QApplication::Translate('Superficie');
        $strConfigArray['Columns']['Encargado'] = QApplication::Translate('Encargado');
        $strConfigArray['Columns']['Reparticion'] = QApplication::Translate('Reparticion');
        $strConfigArray['Columns']['FolioOriginal'] = QApplication::Translate('FolioOriginal');

        $this->lstFolioAsCreador = new QListPanel($this->objParentObject, $this->objUsuario, $strConfigArray, $strControlId);
        $this->lstFolioAsCreador->Name = Folio::Noun();
        $this->lstFolioAsCreador->SetNewMethod($this, "lstFolioAsCreador_New");
        $this->lstFolioAsCreador->SetEditMethod($this, "lstFolioAsCreador_Edit");
        return $this->lstFolioAsCreador;
    }

    public function lstFolioAsCreador_New() {
        FolioModalPanel::$strControlsArray['lstCreadorObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $this->lstFolioAsCreador->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstFolioAsCreador->ModalPanel->objCallerControl = $this->lstFolioAsCreador;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstFolioAsCreador_Edit($intKey) {
        FolioModalPanel::$strControlsArray['lstCreadorObject'] = false;
        $strControlsArray = array_keys(FolioModalPanel::$strControlsArray, true);
        $obj = $this->objUsuario->FolioAsCreadorArray[$intKey];
        $this->lstFolioAsCreador->ModalPanel = new FolioModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstFolioAsCreador->ModalPanel->objCallerControl = $this->lstFolioAsCreador;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Usuario object.
         * @param boolean $blnReload reload Usuario from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objUsuario->Reload();

            if ($this->lblIdUsuario) if ($this->blnEditMode) $this->lblIdUsuario->Text = $this->objUsuario->IdUsuario;

            if ($this->txtPassword) $this->txtPassword->Text = $this->objUsuario->Password;
            if ($this->lblPassword) $this->lblPassword->Text = $this->objUsuario->Password;

            if ($this->txtEmail) $this->txtEmail->Text = $this->objUsuario->Email;
            if ($this->lblEmail) $this->lblEmail->Text = $this->objUsuario->Email;

            if ($this->chkSuperAdmin) $this->chkSuperAdmin->Checked = $this->objUsuario->SuperAdmin;
            if ($this->lblSuperAdmin) $this->lblSuperAdmin->Text = ($this->objUsuario->SuperAdmin) ? QApplication::Translate('Yes') : QApplication::Translate('No');

            if ($this->calFechaActivacion) $this->calFechaActivacion->DateTime = $this->objUsuario->FechaActivacion;
            if ($this->lblFechaActivacion) $this->lblFechaActivacion->Text = sprintf($this->objUsuario->FechaActivacion) ? $this->objUsuario->FechaActivacion->__toString($this->strFechaActivacionDateTimeFormat) : null;

            if ($this->txtNombre) $this->txtNombre->Text = $this->objUsuario->Nombre;
            if ($this->lblNombre) $this->lblNombre->Text = $this->objUsuario->Nombre;

            if ($this->lstIdPerfilObject) {
                if($this->objUsuario->IdPerfilObject){
                    $this->lstIdPerfilObject->Text = $this->objUsuario->IdPerfilObject->__toString();
                    $this->lstIdPerfilObject->Value = $this->objUsuario->IdPerfil->IdPerfil;
                }                
            }
            if ($this->lblIdPerfil) $this->lblIdPerfil->Text = ($this->objUsuario->IdPerfilObject) ? $this->objUsuario->IdPerfilObject->__toString() : null;

            if ($this->txtCodPartido) $this->txtCodPartido->Text = $this->objUsuario->CodPartido;
            if ($this->lblCodPartido) $this->lblCodPartido->Text = $this->objUsuario->CodPartido;

            if ($this->txtNombreCompleto) $this->txtNombreCompleto->Text = $this->objUsuario->NombreCompleto;
            if ($this->lblNombreCompleto) $this->lblNombreCompleto->Text = $this->objUsuario->NombreCompleto;

            if ($this->txtReparticion) $this->txtReparticion->Text = $this->objUsuario->Reparticion;
            if ($this->lblReparticion) $this->lblReparticion->Text = $this->objUsuario->Reparticion;

            if ($this->txtTelefono) $this->txtTelefono->Text = $this->objUsuario->Telefono;
            if ($this->lblTelefono) $this->lblTelefono->Text = $this->objUsuario->Telefono;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC USUARIO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtPassword) $this->objUsuario->Password = $this->txtPassword->Text;
                if ($this->txtEmail) $this->objUsuario->Email = $this->txtEmail->Text;
                if ($this->chkSuperAdmin) $this->objUsuario->SuperAdmin = $this->chkSuperAdmin->Checked;
                if ($this->calFechaActivacion) $this->objUsuario->FechaActivacion = $this->calFechaActivacion->DateTime;
                if ($this->txtNombre) $this->objUsuario->Nombre = $this->txtNombre->Text;
                if ($this->lstIdPerfilObject) $this->objUsuario->IdPerfil = $this->lstIdPerfilObject->SelectedValue;
                if ($this->txtCodPartido) $this->objUsuario->CodPartido = $this->txtCodPartido->Text;
                if ($this->txtNombreCompleto) $this->objUsuario->NombreCompleto = $this->txtNombreCompleto->Text;
                if ($this->txtReparticion) $this->objUsuario->Reparticion = $this->txtReparticion->Text;
                if ($this->txtTelefono) $this->objUsuario->Telefono = $this->txtTelefono->Text;


        }

        public function SaveUsuario() {
            return $this->Save();
        }
        /**
         * This will save this object's Usuario instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Usuario object
                $idReturn = $this->objUsuario->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Usuario instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteUsuario() {
            $this->objUsuario->Delete();
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
                case 'Usuario': return $this->objUsuario;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Usuario fields -- will be created dynamically if not yet created
                case 'IdUsuarioControl':
                    if (!$this->lblIdUsuario) return $this->lblIdUsuario_Create();
                    return $this->lblIdUsuario;
                case 'IdUsuarioLabel':
                    if (!$this->lblIdUsuario) return $this->lblIdUsuario_Create();
                    return $this->lblIdUsuario;
                case 'PasswordControl':
                    if (!$this->txtPassword) return $this->txtPassword_Create();
                    return $this->txtPassword;
                case 'PasswordLabel':
                    if (!$this->lblPassword) return $this->lblPassword_Create();
                    return $this->lblPassword;
                case 'EmailControl':
                    if (!$this->txtEmail) return $this->txtEmail_Create();
                    return $this->txtEmail;
                case 'EmailLabel':
                    if (!$this->lblEmail) return $this->lblEmail_Create();
                    return $this->lblEmail;
                case 'SuperAdminControl':
                    if (!$this->chkSuperAdmin) return $this->chkSuperAdmin_Create();
                    return $this->chkSuperAdmin;
                case 'SuperAdminLabel':
                    if (!$this->lblSuperAdmin) return $this->lblSuperAdmin_Create();
                    return $this->lblSuperAdmin;
                case 'FechaActivacionControl':
                    if (!$this->calFechaActivacion) return $this->calFechaActivacion_Create();
                    return $this->calFechaActivacion;
                case 'FechaActivacionLabel':
                    if (!$this->lblFechaActivacion) return $this->lblFechaActivacion_Create();
                    return $this->lblFechaActivacion;
                case 'NombreControl':
                    if (!$this->txtNombre) return $this->txtNombre_Create();
                    return $this->txtNombre;
                case 'NombreLabel':
                    if (!$this->lblNombre) return $this->lblNombre_Create();
                    return $this->lblNombre;
                case 'IdPerfilControl':
                    if (!$this->lstIdPerfilObject) return $this->lstIdPerfilObject_Create();
                    return $this->lstIdPerfilObject;
                case 'IdPerfilLabel':
                    if (!$this->lblIdPerfil) return $this->lblIdPerfil_Create();
                    return $this->lblIdPerfil;
                case 'CodPartidoControl':
                    if (!$this->txtCodPartido) return $this->txtCodPartido_Create();
                    return $this->txtCodPartido;
                case 'CodPartidoLabel':
                    if (!$this->lblCodPartido) return $this->lblCodPartido_Create();
                    return $this->lblCodPartido;
                case 'NombreCompletoControl':
                    if (!$this->txtNombreCompleto) return $this->txtNombreCompleto_Create();
                    return $this->txtNombreCompleto;
                case 'NombreCompletoLabel':
                    if (!$this->lblNombreCompleto) return $this->lblNombreCompleto_Create();
                    return $this->lblNombreCompleto;
                case 'ReparticionControl':
                    if (!$this->txtReparticion) return $this->txtReparticion_Create();
                    return $this->txtReparticion;
                case 'ReparticionLabel':
                    if (!$this->lblReparticion) return $this->lblReparticion_Create();
                    return $this->lblReparticion;
                case 'TelefonoControl':
                    if (!$this->txtTelefono) return $this->txtTelefono_Create();
                    return $this->txtTelefono;
                case 'TelefonoLabel':
                    if (!$this->lblTelefono) return $this->lblTelefono_Create();
                    return $this->lblTelefono;
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
                    // Controls that point to Usuario fields
                    case 'IdUsuarioControl':
                        return ($this->lblIdUsuario = QType::Cast($mixValue, 'QControl'));
                    case 'PasswordControl':
                        return ($this->txtPassword = QType::Cast($mixValue, 'QControl'));
                    case 'EmailControl':
                        return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
                    case 'SuperAdminControl':
                        return ($this->chkSuperAdmin = QType::Cast($mixValue, 'QControl'));
                    case 'FechaActivacionControl':
                        return ($this->calFechaActivacion = QType::Cast($mixValue, 'QControl'));
                    case 'NombreControl':
                        return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
                    case 'IdPerfilControl':
                        return ($this->lstIdPerfilObject = QType::Cast($mixValue, 'QControl'));
                    case 'CodPartidoControl':
                        return ($this->txtCodPartido = QType::Cast($mixValue, 'QControl'));
                    case 'NombreCompletoControl':
                        return ($this->txtNombreCompleto = QType::Cast($mixValue, 'QControl'));
                    case 'ReparticionControl':
                        return ($this->txtReparticion = QType::Cast($mixValue, 'QControl'));
                    case 'TelefonoControl':
                        return ($this->txtTelefono = QType::Cast($mixValue, 'QControl'));
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
