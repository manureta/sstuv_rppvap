<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Comentarios class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Comentarios object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a ComentariosMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Comentarios $Comentarios the actual Comentarios data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QListBox $IdUsuarioControl
     * property-read QLabel $IdUsuarioLabel
     * property QDateTimePicker $FechaCreacionControl
     * property-read QLabel $FechaCreacionLabel
     * property QDateTimePicker $FechaModificacionControl
     * property-read QLabel $FechaModificacionLabel
     * property QTextBox $ComentarioControl
     * property-read QLabel $ComentarioLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class ComentariosMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Comentarios
                */
        public $objComentarios;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Comentarios's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $lstIdUsuarioObject;
        protected $calFechaCreacion;
        protected $calFechaModificacion;
        protected $txtComentario;

        // Controls that allow the viewing of Comentarios's individual data fields
        protected $lblIdFolio;
        protected $lblIdUsuario;
        protected $lblFechaCreacion;
        protected $lblFechaModificacion;
        protected $lblComentario;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * ComentariosMetaControl to edit a single Comentarios object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Comentarios object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ComentariosMetaControl
         * @param Comentarios $objComentarios new or existing Comentarios object
         */
         public function __construct($objParentObject, Comentarios $objComentarios) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this ComentariosMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Comentarios object
            $this->objComentarios = $objComentarios;

            // Figure out if we're Editing or Creating New
            if ($this->objComentarios->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this ComentariosMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Comentarios object creation - defaults to CreateOrEdit
          * @return ComentariosMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objComentarios = Comentarios::Load($intId);

                // Comentarios was found -- return it!
                if ($objComentarios)
                    return new ComentariosMetaControl($objParentObject, $objComentarios);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Comentarios object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new ComentariosMetaControl($objParentObject, new Comentarios());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ComentariosMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Comentarios object creation - defaults to CreateOrEdit
         * @return ComentariosMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return ComentariosMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this ComentariosMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Comentarios object creation - defaults to CreateOrEdit
         * @return ComentariosMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return ComentariosMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objComentarios->Id;
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
            $this->lstIdFolioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Folio', 'Id' , $strControlId);
            if($this->objComentarios->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objComentarios->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objComentarios->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objComentarios->IdFolioObject) ? $this->objComentarios->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdUsuarioObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdUsuarioObject_Create($strControlId = null) {
            $this->lstIdUsuarioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Usuario', 'IdUsuario' , $strControlId);
            if($this->objComentarios->IdUsuarioObject){
                $this->lstIdUsuarioObject->Text = $this->objComentarios->IdUsuarioObject->__toString();
                $this->lstIdUsuarioObject->Value = $this->objComentarios->IdUsuarioObject->IdUsuario;
            }
            $this->lstIdUsuarioObject->Name = QApplication::Translate('IdUsuarioObject');
            return $this->lstIdUsuarioObject;
        }

        /**
         * Create and setup QLabel lblIdUsuario
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblIdUsuario_Create($strControlId = null) {
            $this->lblIdUsuario = new QLabel($this->objParentObject, $strControlId);
            $this->lblIdUsuario->Name = QApplication::Translate('IdUsuarioObject');
            $this->lblIdUsuario->Text = ($this->objComentarios->IdUsuarioObject) ? $this->objComentarios->IdUsuarioObject->__toString() : null;
            return $this->lblIdUsuario;
        }

        /**
         * Create and setup QDateTimePicker calFechaCreacion
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaCreacion_Create($strControlId = null) {
            $this->calFechaCreacion = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaCreacion->Name = QApplication::Translate('FechaCreacion');
            $this->calFechaCreacion->DateTime = $this->objComentarios->FechaCreacion;
            $this->calFechaCreacion->DateTimePickerType = QDateTimePickerType::DateTime;
            
            return $this->calFechaCreacion;
        }

        /**
         * Create and setup QLabel lblFechaCreacion
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaCreacion_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaCreacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaCreacion->Name = QApplication::Translate('FechaCreacion');
            $this->strFechaCreacionDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaCreacion->Text = sprintf($this->objComentarios->FechaCreacion) ? $this->objComentarios->FechaCreacion->__toString($this->strFechaCreacionDateTimeFormat) : null;
            return $this->lblFechaCreacion;
        }

        protected $strFechaCreacionDateTimeFormat;


        /**
         * Create and setup QDateTimePicker calFechaModificacion
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFechaModificacion_Create($strControlId = null) {
            $this->calFechaModificacion = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFechaModificacion->Name = QApplication::Translate('FechaModificacion');
            $this->calFechaModificacion->DateTime = $this->objComentarios->FechaModificacion;
            $this->calFechaModificacion->DateTimePickerType = QDateTimePickerType::DateTime;
            
            return $this->calFechaModificacion;
        }

        /**
         * Create and setup QLabel lblFechaModificacion
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFechaModificacion_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFechaModificacion = new QLabel($this->objParentObject, $strControlId);
            $this->lblFechaModificacion->Name = QApplication::Translate('FechaModificacion');
            $this->strFechaModificacionDateTimeFormat = $strDateTimeFormat;
            $this->lblFechaModificacion->Text = sprintf($this->objComentarios->FechaModificacion) ? $this->objComentarios->FechaModificacion->__toString($this->strFechaModificacionDateTimeFormat) : null;
            return $this->lblFechaModificacion;
        }

        protected $strFechaModificacionDateTimeFormat;


        /**
         * Create and setup QTextBox txtComentario
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtComentario_Create($strControlId = null) {
            $this->txtComentario = new QTextBox($this->objParentObject, $strControlId);
            $this->txtComentario->Name = QApplication::Translate('Comentario');
            $this->txtComentario->Text = $this->objComentarios->Comentario;
            $this->txtComentario->TextMode = QTextMode::MultiLine;
            
            return $this->txtComentario;
        }

        /**
         * Create and setup QLabel lblComentario
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblComentario_Create($strControlId = null) {
            $this->lblComentario = new QLabel($this->objParentObject, $strControlId);
            $this->lblComentario->Name = QApplication::Translate('Comentario');
            $this->lblComentario->Text = $this->objComentarios->Comentario;
            return $this->lblComentario;
        }





        /**
         * Refresh this MetaControl with Data from the local Comentarios object.
         * @param boolean $blnReload reload Comentarios from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objComentarios->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objComentarios->Id;

            if ($this->lstIdFolioObject) {
                if($this->objComentarios->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objComentarios->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objComentarios->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objComentarios->IdFolioObject) ? $this->objComentarios->IdFolioObject->__toString() : null;

            if ($this->lstIdUsuarioObject) {
                if($this->objComentarios->IdUsuarioObject){
                    $this->lstIdUsuarioObject->Text = $this->objComentarios->IdUsuarioObject->__toString();
                    $this->lstIdUsuarioObject->Value = $this->objComentarios->IdUsuario->IdUsuario;
                }                
            }
            if ($this->lblIdUsuario) $this->lblIdUsuario->Text = ($this->objComentarios->IdUsuarioObject) ? $this->objComentarios->IdUsuarioObject->__toString() : null;

            if ($this->calFechaCreacion) $this->calFechaCreacion->DateTime = $this->objComentarios->FechaCreacion;
            if ($this->lblFechaCreacion) $this->lblFechaCreacion->Text = sprintf($this->objComentarios->FechaCreacion) ? $this->objComentarios->FechaCreacion->__toString($this->strFechaCreacionDateTimeFormat) : null;

            if ($this->calFechaModificacion) $this->calFechaModificacion->DateTime = $this->objComentarios->FechaModificacion;
            if ($this->lblFechaModificacion) $this->lblFechaModificacion->Text = sprintf($this->objComentarios->FechaModificacion) ? $this->objComentarios->FechaModificacion->__toString($this->strFechaModificacionDateTimeFormat) : null;

            if ($this->txtComentario) $this->txtComentario->Text = $this->objComentarios->Comentario;
            if ($this->lblComentario) $this->lblComentario->Text = $this->objComentarios->Comentario;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC COMENTARIOS OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objComentarios->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->lstIdUsuarioObject) $this->objComentarios->IdUsuario = $this->lstIdUsuarioObject->SelectedValue;
                if ($this->calFechaCreacion) $this->objComentarios->FechaCreacion = $this->calFechaCreacion->DateTime;
                if ($this->calFechaModificacion) $this->objComentarios->FechaModificacion = $this->calFechaModificacion->DateTime;
                if ($this->txtComentario) $this->objComentarios->Comentario = $this->txtComentario->Text;


        }

        public function SaveComentarios() {
            return $this->Save();
        }
        /**
         * This will save this object's Comentarios instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Comentarios object
                $idReturn = $this->objComentarios->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Comentarios instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteComentarios() {
            $this->objComentarios->Delete();
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
                case 'Comentarios': return $this->objComentarios;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Comentarios fields -- will be created dynamically if not yet created
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
                case 'IdUsuarioControl':
                    if (!$this->lstIdUsuarioObject) return $this->lstIdUsuarioObject_Create();
                    return $this->lstIdUsuarioObject;
                case 'IdUsuarioLabel':
                    if (!$this->lblIdUsuario) return $this->lblIdUsuario_Create();
                    return $this->lblIdUsuario;
                case 'FechaCreacionControl':
                    if (!$this->calFechaCreacion) return $this->calFechaCreacion_Create();
                    return $this->calFechaCreacion;
                case 'FechaCreacionLabel':
                    if (!$this->lblFechaCreacion) return $this->lblFechaCreacion_Create();
                    return $this->lblFechaCreacion;
                case 'FechaModificacionControl':
                    if (!$this->calFechaModificacion) return $this->calFechaModificacion_Create();
                    return $this->calFechaModificacion;
                case 'FechaModificacionLabel':
                    if (!$this->lblFechaModificacion) return $this->lblFechaModificacion_Create();
                    return $this->lblFechaModificacion;
                case 'ComentarioControl':
                    if (!$this->txtComentario) return $this->txtComentario_Create();
                    return $this->txtComentario;
                case 'ComentarioLabel':
                    if (!$this->lblComentario) return $this->lblComentario_Create();
                    return $this->lblComentario;
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
                    // Controls that point to Comentarios fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'IdUsuarioControl':
                        return ($this->lstIdUsuarioObject = QType::Cast($mixValue, 'QControl'));
                    case 'FechaCreacionControl':
                        return ($this->calFechaCreacion = QType::Cast($mixValue, 'QControl'));
                    case 'FechaModificacionControl':
                        return ($this->calFechaModificacion = QType::Cast($mixValue, 'QControl'));
                    case 'ComentarioControl':
                        return ($this->txtComentario = QType::Cast($mixValue, 'QControl'));
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
