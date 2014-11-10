<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Equipamiento class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Equipamiento object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a EquipamientoMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Equipamiento $Equipamiento the actual Equipamiento data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QListBox $UnidadSanitariaControl
     * property-read QLabel $UnidadSanitariaLabel
     * property QListBox $JardinInfantesControl
     * property-read QLabel $JardinInfantesLabel
     * property QListBox $EscuelaPrimariaControl
     * property-read QLabel $EscuelaPrimariaLabel
     * property QListBox $EscuelaSecundariaControl
     * property-read QLabel $EscuelaSecundariaLabel
     * property QListBox $ComedorControl
     * property-read QLabel $ComedorLabel
     * property QListBox $SalonUsosMultiplesControl
     * property-read QLabel $SalonUsosMultiplesLabel
     * property QListBox $CentroIntegracionComunitariaControl
     * property-read QLabel $CentroIntegracionComunitariaLabel
     * property QTextBox $OtroControl
     * property-read QLabel $OtroLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class EquipamientoMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Equipamiento
                */
        public $objEquipamiento;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Equipamiento's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $lstUnidadSanitariaObject;
        protected $lstJardinInfantesObject;
        protected $lstEscuelaPrimariaObject;
        protected $lstEscuelaSecundariaObject;
        protected $lstComedorObject;
        protected $lstSalonUsosMultiplesObject;
        protected $lstCentroIntegracionComunitariaObject;
        protected $txtOtro;

        // Controls that allow the viewing of Equipamiento's individual data fields
        protected $lblIdFolio;
        protected $lblUnidadSanitaria;
        protected $lblJardinInfantes;
        protected $lblEscuelaPrimaria;
        protected $lblEscuelaSecundaria;
        protected $lblComedor;
        protected $lblSalonUsosMultiples;
        protected $lblCentroIntegracionComunitaria;
        protected $lblOtro;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * EquipamientoMetaControl to edit a single Equipamiento object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Equipamiento object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EquipamientoMetaControl
         * @param Equipamiento $objEquipamiento new or existing Equipamiento object
         */
         public function __construct($objParentObject, Equipamiento $objEquipamiento) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this EquipamientoMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Equipamiento object
            $this->objEquipamiento = $objEquipamiento;

            // Figure out if we're Editing or Creating New
            if ($this->objEquipamiento->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this EquipamientoMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Equipamiento object creation - defaults to CreateOrEdit
          * @return EquipamientoMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objEquipamiento = Equipamiento::Load($intId);

                // Equipamiento was found -- return it!
                if ($objEquipamiento)
                    return new EquipamientoMetaControl($objParentObject, $objEquipamiento);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Equipamiento object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new EquipamientoMetaControl($objParentObject, new Equipamiento());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EquipamientoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Equipamiento object creation - defaults to CreateOrEdit
         * @return EquipamientoMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return EquipamientoMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this EquipamientoMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Equipamiento object creation - defaults to CreateOrEdit
         * @return EquipamientoMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return EquipamientoMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objEquipamiento->Id;
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
            if($this->objEquipamiento->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objEquipamiento->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objEquipamiento->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objEquipamiento->IdFolioObject) ? $this->objEquipamiento->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstUnidadSanitariaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstUnidadSanitariaObject_Create($strControlId = null) {
            $this->lstUnidadSanitariaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->UnidadSanitariaObject){
                $this->lstUnidadSanitariaObject->Text = $this->objEquipamiento->UnidadSanitariaObject->__toString();
                $this->lstUnidadSanitariaObject->Value = $this->objEquipamiento->UnidadSanitariaObject->Id;
            }
            $this->lstUnidadSanitariaObject->Name = QApplication::Translate('UnidadSanitariaObject');
            return $this->lstUnidadSanitariaObject;
        }

        /**
         * Create and setup QLabel lblUnidadSanitaria
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblUnidadSanitaria_Create($strControlId = null) {
            $this->lblUnidadSanitaria = new QLabel($this->objParentObject, $strControlId);
            $this->lblUnidadSanitaria->Name = QApplication::Translate('UnidadSanitariaObject');
            $this->lblUnidadSanitaria->Text = ($this->objEquipamiento->UnidadSanitariaObject) ? $this->objEquipamiento->UnidadSanitariaObject->__toString() : null;
            return $this->lblUnidadSanitaria;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstJardinInfantesObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstJardinInfantesObject_Create($strControlId = null) {
            $this->lstJardinInfantesObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->JardinInfantesObject){
                $this->lstJardinInfantesObject->Text = $this->objEquipamiento->JardinInfantesObject->__toString();
                $this->lstJardinInfantesObject->Value = $this->objEquipamiento->JardinInfantesObject->Id;
            }
            $this->lstJardinInfantesObject->Name = QApplication::Translate('JardinInfantesObject');
            return $this->lstJardinInfantesObject;
        }

        /**
         * Create and setup QLabel lblJardinInfantes
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblJardinInfantes_Create($strControlId = null) {
            $this->lblJardinInfantes = new QLabel($this->objParentObject, $strControlId);
            $this->lblJardinInfantes->Name = QApplication::Translate('JardinInfantesObject');
            $this->lblJardinInfantes->Text = ($this->objEquipamiento->JardinInfantesObject) ? $this->objEquipamiento->JardinInfantesObject->__toString() : null;
            return $this->lblJardinInfantes;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstEscuelaPrimariaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstEscuelaPrimariaObject_Create($strControlId = null) {
            $this->lstEscuelaPrimariaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->EscuelaPrimariaObject){
                $this->lstEscuelaPrimariaObject->Text = $this->objEquipamiento->EscuelaPrimariaObject->__toString();
                $this->lstEscuelaPrimariaObject->Value = $this->objEquipamiento->EscuelaPrimariaObject->Id;
            }
            $this->lstEscuelaPrimariaObject->Name = QApplication::Translate('EscuelaPrimariaObject');
            return $this->lstEscuelaPrimariaObject;
        }

        /**
         * Create and setup QLabel lblEscuelaPrimaria
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEscuelaPrimaria_Create($strControlId = null) {
            $this->lblEscuelaPrimaria = new QLabel($this->objParentObject, $strControlId);
            $this->lblEscuelaPrimaria->Name = QApplication::Translate('EscuelaPrimariaObject');
            $this->lblEscuelaPrimaria->Text = ($this->objEquipamiento->EscuelaPrimariaObject) ? $this->objEquipamiento->EscuelaPrimariaObject->__toString() : null;
            return $this->lblEscuelaPrimaria;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstEscuelaSecundariaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstEscuelaSecundariaObject_Create($strControlId = null) {
            $this->lstEscuelaSecundariaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->EscuelaSecundariaObject){
                $this->lstEscuelaSecundariaObject->Text = $this->objEquipamiento->EscuelaSecundariaObject->__toString();
                $this->lstEscuelaSecundariaObject->Value = $this->objEquipamiento->EscuelaSecundariaObject->Id;
            }
            $this->lstEscuelaSecundariaObject->Name = QApplication::Translate('EscuelaSecundariaObject');
            return $this->lstEscuelaSecundariaObject;
        }

        /**
         * Create and setup QLabel lblEscuelaSecundaria
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEscuelaSecundaria_Create($strControlId = null) {
            $this->lblEscuelaSecundaria = new QLabel($this->objParentObject, $strControlId);
            $this->lblEscuelaSecundaria->Name = QApplication::Translate('EscuelaSecundariaObject');
            $this->lblEscuelaSecundaria->Text = ($this->objEquipamiento->EscuelaSecundariaObject) ? $this->objEquipamiento->EscuelaSecundariaObject->__toString() : null;
            return $this->lblEscuelaSecundaria;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstComedorObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstComedorObject_Create($strControlId = null) {
            $this->lstComedorObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->ComedorObject){
                $this->lstComedorObject->Text = $this->objEquipamiento->ComedorObject->__toString();
                $this->lstComedorObject->Value = $this->objEquipamiento->ComedorObject->Id;
            }
            $this->lstComedorObject->Name = QApplication::Translate('ComedorObject');
            return $this->lstComedorObject;
        }

        /**
         * Create and setup QLabel lblComedor
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblComedor_Create($strControlId = null) {
            $this->lblComedor = new QLabel($this->objParentObject, $strControlId);
            $this->lblComedor->Name = QApplication::Translate('ComedorObject');
            $this->lblComedor->Text = ($this->objEquipamiento->ComedorObject) ? $this->objEquipamiento->ComedorObject->__toString() : null;
            return $this->lblComedor;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstSalonUsosMultiplesObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstSalonUsosMultiplesObject_Create($strControlId = null) {
            $this->lstSalonUsosMultiplesObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->SalonUsosMultiplesObject){
                $this->lstSalonUsosMultiplesObject->Text = $this->objEquipamiento->SalonUsosMultiplesObject->__toString();
                $this->lstSalonUsosMultiplesObject->Value = $this->objEquipamiento->SalonUsosMultiplesObject->Id;
            }
            $this->lstSalonUsosMultiplesObject->Name = QApplication::Translate('SalonUsosMultiplesObject');
            return $this->lstSalonUsosMultiplesObject;
        }

        /**
         * Create and setup QLabel lblSalonUsosMultiples
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSalonUsosMultiples_Create($strControlId = null) {
            $this->lblSalonUsosMultiples = new QLabel($this->objParentObject, $strControlId);
            $this->lblSalonUsosMultiples->Name = QApplication::Translate('SalonUsosMultiplesObject');
            $this->lblSalonUsosMultiples->Text = ($this->objEquipamiento->SalonUsosMultiplesObject) ? $this->objEquipamiento->SalonUsosMultiplesObject->__toString() : null;
            return $this->lblSalonUsosMultiples;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstCentroIntegracionComunitariaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstCentroIntegracionComunitariaObject_Create($strControlId = null) {
            $this->lstCentroIntegracionComunitariaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesEquipamientos', 'Id' , $strControlId);
            if($this->objEquipamiento->CentroIntegracionComunitariaObject){
                $this->lstCentroIntegracionComunitariaObject->Text = $this->objEquipamiento->CentroIntegracionComunitariaObject->__toString();
                $this->lstCentroIntegracionComunitariaObject->Value = $this->objEquipamiento->CentroIntegracionComunitariaObject->Id;
            }
            $this->lstCentroIntegracionComunitariaObject->Name = QApplication::Translate('CentroIntegracionComunitariaObject');
            return $this->lstCentroIntegracionComunitariaObject;
        }

        /**
         * Create and setup QLabel lblCentroIntegracionComunitaria
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCentroIntegracionComunitaria_Create($strControlId = null) {
            $this->lblCentroIntegracionComunitaria = new QLabel($this->objParentObject, $strControlId);
            $this->lblCentroIntegracionComunitaria->Name = QApplication::Translate('CentroIntegracionComunitariaObject');
            $this->lblCentroIntegracionComunitaria->Text = ($this->objEquipamiento->CentroIntegracionComunitariaObject) ? $this->objEquipamiento->CentroIntegracionComunitariaObject->__toString() : null;
            return $this->lblCentroIntegracionComunitaria;
        }

        /**
         * Create and setup QTextBox txtOtro
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOtro_Create($strControlId = null) {
            $this->txtOtro = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOtro->Name = QApplication::Translate('Otro');
            $this->txtOtro->Text = $this->objEquipamiento->Otro;
            
            return $this->txtOtro;
        }

        /**
         * Create and setup QLabel lblOtro
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOtro_Create($strControlId = null) {
            $this->lblOtro = new QLabel($this->objParentObject, $strControlId);
            $this->lblOtro->Name = QApplication::Translate('Otro');
            $this->lblOtro->Text = $this->objEquipamiento->Otro;
            return $this->lblOtro;
        }





        /**
         * Refresh this MetaControl with Data from the local Equipamiento object.
         * @param boolean $blnReload reload Equipamiento from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objEquipamiento->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEquipamiento->Id;

            if ($this->lstIdFolioObject) {
                if($this->objEquipamiento->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objEquipamiento->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objEquipamiento->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objEquipamiento->IdFolioObject) ? $this->objEquipamiento->IdFolioObject->__toString() : null;

            if ($this->lstUnidadSanitariaObject) {
                if($this->objEquipamiento->UnidadSanitariaObject){
                    $this->lstUnidadSanitariaObject->Text = $this->objEquipamiento->UnidadSanitariaObject->__toString();
                    $this->lstUnidadSanitariaObject->Value = $this->objEquipamiento->UnidadSanitaria->Id;
                }                
            }
            if ($this->lblUnidadSanitaria) $this->lblUnidadSanitaria->Text = ($this->objEquipamiento->UnidadSanitariaObject) ? $this->objEquipamiento->UnidadSanitariaObject->__toString() : null;

            if ($this->lstJardinInfantesObject) {
                if($this->objEquipamiento->JardinInfantesObject){
                    $this->lstJardinInfantesObject->Text = $this->objEquipamiento->JardinInfantesObject->__toString();
                    $this->lstJardinInfantesObject->Value = $this->objEquipamiento->JardinInfantes->Id;
                }                
            }
            if ($this->lblJardinInfantes) $this->lblJardinInfantes->Text = ($this->objEquipamiento->JardinInfantesObject) ? $this->objEquipamiento->JardinInfantesObject->__toString() : null;

            if ($this->lstEscuelaPrimariaObject) {
                if($this->objEquipamiento->EscuelaPrimariaObject){
                    $this->lstEscuelaPrimariaObject->Text = $this->objEquipamiento->EscuelaPrimariaObject->__toString();
                    $this->lstEscuelaPrimariaObject->Value = $this->objEquipamiento->EscuelaPrimaria->Id;
                }                
            }
            if ($this->lblEscuelaPrimaria) $this->lblEscuelaPrimaria->Text = ($this->objEquipamiento->EscuelaPrimariaObject) ? $this->objEquipamiento->EscuelaPrimariaObject->__toString() : null;

            if ($this->lstEscuelaSecundariaObject) {
                if($this->objEquipamiento->EscuelaSecundariaObject){
                    $this->lstEscuelaSecundariaObject->Text = $this->objEquipamiento->EscuelaSecundariaObject->__toString();
                    $this->lstEscuelaSecundariaObject->Value = $this->objEquipamiento->EscuelaSecundaria->Id;
                }                
            }
            if ($this->lblEscuelaSecundaria) $this->lblEscuelaSecundaria->Text = ($this->objEquipamiento->EscuelaSecundariaObject) ? $this->objEquipamiento->EscuelaSecundariaObject->__toString() : null;

            if ($this->lstComedorObject) {
                if($this->objEquipamiento->ComedorObject){
                    $this->lstComedorObject->Text = $this->objEquipamiento->ComedorObject->__toString();
                    $this->lstComedorObject->Value = $this->objEquipamiento->Comedor->Id;
                }                
            }
            if ($this->lblComedor) $this->lblComedor->Text = ($this->objEquipamiento->ComedorObject) ? $this->objEquipamiento->ComedorObject->__toString() : null;

            if ($this->lstSalonUsosMultiplesObject) {
                if($this->objEquipamiento->SalonUsosMultiplesObject){
                    $this->lstSalonUsosMultiplesObject->Text = $this->objEquipamiento->SalonUsosMultiplesObject->__toString();
                    $this->lstSalonUsosMultiplesObject->Value = $this->objEquipamiento->SalonUsosMultiples->Id;
                }                
            }
            if ($this->lblSalonUsosMultiples) $this->lblSalonUsosMultiples->Text = ($this->objEquipamiento->SalonUsosMultiplesObject) ? $this->objEquipamiento->SalonUsosMultiplesObject->__toString() : null;

            if ($this->lstCentroIntegracionComunitariaObject) {
                if($this->objEquipamiento->CentroIntegracionComunitariaObject){
                    $this->lstCentroIntegracionComunitariaObject->Text = $this->objEquipamiento->CentroIntegracionComunitariaObject->__toString();
                    $this->lstCentroIntegracionComunitariaObject->Value = $this->objEquipamiento->CentroIntegracionComunitaria->Id;
                }                
            }
            if ($this->lblCentroIntegracionComunitaria) $this->lblCentroIntegracionComunitaria->Text = ($this->objEquipamiento->CentroIntegracionComunitariaObject) ? $this->objEquipamiento->CentroIntegracionComunitariaObject->__toString() : null;

            if ($this->txtOtro) $this->txtOtro->Text = $this->objEquipamiento->Otro;
            if ($this->lblOtro) $this->lblOtro->Text = $this->objEquipamiento->Otro;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC EQUIPAMIENTO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objEquipamiento->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->lstUnidadSanitariaObject) $this->objEquipamiento->UnidadSanitaria = $this->lstUnidadSanitariaObject->SelectedValue;
                if ($this->lstJardinInfantesObject) $this->objEquipamiento->JardinInfantes = $this->lstJardinInfantesObject->SelectedValue;
                if ($this->lstEscuelaPrimariaObject) $this->objEquipamiento->EscuelaPrimaria = $this->lstEscuelaPrimariaObject->SelectedValue;
                if ($this->lstEscuelaSecundariaObject) $this->objEquipamiento->EscuelaSecundaria = $this->lstEscuelaSecundariaObject->SelectedValue;
                if ($this->lstComedorObject) $this->objEquipamiento->Comedor = $this->lstComedorObject->SelectedValue;
                if ($this->lstSalonUsosMultiplesObject) $this->objEquipamiento->SalonUsosMultiples = $this->lstSalonUsosMultiplesObject->SelectedValue;
                if ($this->lstCentroIntegracionComunitariaObject) $this->objEquipamiento->CentroIntegracionComunitaria = $this->lstCentroIntegracionComunitariaObject->SelectedValue;
                if ($this->txtOtro) $this->objEquipamiento->Otro = $this->txtOtro->Text;


        }

        public function SaveEquipamiento() {
            return $this->Save();
        }
        /**
         * This will save this object's Equipamiento instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Equipamiento object
                $idReturn = $this->objEquipamiento->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Equipamiento instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteEquipamiento() {
            $this->objEquipamiento->Delete();
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
                case 'Equipamiento': return $this->objEquipamiento;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Equipamiento fields -- will be created dynamically if not yet created
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
                case 'UnidadSanitariaControl':
                    if (!$this->lstUnidadSanitariaObject) return $this->lstUnidadSanitariaObject_Create();
                    return $this->lstUnidadSanitariaObject;
                case 'UnidadSanitariaLabel':
                    if (!$this->lblUnidadSanitaria) return $this->lblUnidadSanitaria_Create();
                    return $this->lblUnidadSanitaria;
                case 'JardinInfantesControl':
                    if (!$this->lstJardinInfantesObject) return $this->lstJardinInfantesObject_Create();
                    return $this->lstJardinInfantesObject;
                case 'JardinInfantesLabel':
                    if (!$this->lblJardinInfantes) return $this->lblJardinInfantes_Create();
                    return $this->lblJardinInfantes;
                case 'EscuelaPrimariaControl':
                    if (!$this->lstEscuelaPrimariaObject) return $this->lstEscuelaPrimariaObject_Create();
                    return $this->lstEscuelaPrimariaObject;
                case 'EscuelaPrimariaLabel':
                    if (!$this->lblEscuelaPrimaria) return $this->lblEscuelaPrimaria_Create();
                    return $this->lblEscuelaPrimaria;
                case 'EscuelaSecundariaControl':
                    if (!$this->lstEscuelaSecundariaObject) return $this->lstEscuelaSecundariaObject_Create();
                    return $this->lstEscuelaSecundariaObject;
                case 'EscuelaSecundariaLabel':
                    if (!$this->lblEscuelaSecundaria) return $this->lblEscuelaSecundaria_Create();
                    return $this->lblEscuelaSecundaria;
                case 'ComedorControl':
                    if (!$this->lstComedorObject) return $this->lstComedorObject_Create();
                    return $this->lstComedorObject;
                case 'ComedorLabel':
                    if (!$this->lblComedor) return $this->lblComedor_Create();
                    return $this->lblComedor;
                case 'SalonUsosMultiplesControl':
                    if (!$this->lstSalonUsosMultiplesObject) return $this->lstSalonUsosMultiplesObject_Create();
                    return $this->lstSalonUsosMultiplesObject;
                case 'SalonUsosMultiplesLabel':
                    if (!$this->lblSalonUsosMultiples) return $this->lblSalonUsosMultiples_Create();
                    return $this->lblSalonUsosMultiples;
                case 'CentroIntegracionComunitariaControl':
                    if (!$this->lstCentroIntegracionComunitariaObject) return $this->lstCentroIntegracionComunitariaObject_Create();
                    return $this->lstCentroIntegracionComunitariaObject;
                case 'CentroIntegracionComunitariaLabel':
                    if (!$this->lblCentroIntegracionComunitaria) return $this->lblCentroIntegracionComunitaria_Create();
                    return $this->lblCentroIntegracionComunitaria;
                case 'OtroControl':
                    if (!$this->txtOtro) return $this->txtOtro_Create();
                    return $this->txtOtro;
                case 'OtroLabel':
                    if (!$this->lblOtro) return $this->lblOtro_Create();
                    return $this->lblOtro;
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
                    // Controls that point to Equipamiento fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'UnidadSanitariaControl':
                        return ($this->lstUnidadSanitariaObject = QType::Cast($mixValue, 'QControl'));
                    case 'JardinInfantesControl':
                        return ($this->lstJardinInfantesObject = QType::Cast($mixValue, 'QControl'));
                    case 'EscuelaPrimariaControl':
                        return ($this->lstEscuelaPrimariaObject = QType::Cast($mixValue, 'QControl'));
                    case 'EscuelaSecundariaControl':
                        return ($this->lstEscuelaSecundariaObject = QType::Cast($mixValue, 'QControl'));
                    case 'ComedorControl':
                        return ($this->lstComedorObject = QType::Cast($mixValue, 'QControl'));
                    case 'SalonUsosMultiplesControl':
                        return ($this->lstSalonUsosMultiplesObject = QType::Cast($mixValue, 'QControl'));
                    case 'CentroIntegracionComunitariaControl':
                        return ($this->lstCentroIntegracionComunitariaObject = QType::Cast($mixValue, 'QControl'));
                    case 'OtroControl':
                        return ($this->txtOtro = QType::Cast($mixValue, 'QControl'));
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
