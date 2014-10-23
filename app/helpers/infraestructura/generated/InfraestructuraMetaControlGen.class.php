<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Infraestructura class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Infraestructura object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a InfraestructuraMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Infraestructura $Infraestructura the actual Infraestructura data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QListBox $EnergiaElectricaMedidorIndividualControl
     * property-read QLabel $EnergiaElectricaMedidorIndividualLabel
     * property QListBox $EnergiaElectricaMedidorColectivoControl
     * property-read QLabel $EnergiaElectricaMedidorColectivoLabel
     * property QListBox $AlumbradoPublicoControl
     * property-read QLabel $AlumbradoPublicoLabel
     * property QListBox $AguaCorrienteControl
     * property-read QLabel $AguaCorrienteLabel
     * property QListBox $AguaPotableControl
     * property-read QLabel $AguaPotableLabel
     * property QListBox $RedCloacalControl
     * property-read QLabel $RedCloacalLabel
     * property QListBox $SistAlternativoEliminacionExcretasControl
     * property-read QLabel $SistAlternativoEliminacionExcretasLabel
     * property QListBox $RedGasControl
     * property-read QLabel $RedGasLabel
     * property QListBox $PavimentoControl
     * property-read QLabel $PavimentoLabel
     * property QListBox $CordonCunetaControl
     * property-read QLabel $CordonCunetaLabel
     * property QListBox $DesaguesPluvialesControl
     * property-read QLabel $DesaguesPluvialesLabel
     * property QListBox $RecoleccionResiduosControl
     * property-read QLabel $RecoleccionResiduosLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class InfraestructuraMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Infraestructura
                */
        public $objInfraestructura;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Infraestructura's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $lstEnergiaElectricaMedidorIndividualObject;
        protected $lstEnergiaElectricaMedidorColectivoObject;
        protected $lstAlumbradoPublicoObject;
        protected $lstAguaCorrienteObject;
        protected $lstAguaPotableObject;
        protected $lstRedCloacalObject;
        protected $lstSistAlternativoEliminacionExcretasObject;
        protected $lstRedGasObject;
        protected $lstPavimentoObject;
        protected $lstCordonCunetaObject;
        protected $lstDesaguesPluvialesObject;
        protected $lstRecoleccionResiduosObject;

        // Controls that allow the viewing of Infraestructura's individual data fields
        protected $lblIdFolio;
        protected $lblEnergiaElectricaMedidorIndividual;
        protected $lblEnergiaElectricaMedidorColectivo;
        protected $lblAlumbradoPublico;
        protected $lblAguaCorriente;
        protected $lblAguaPotable;
        protected $lblRedCloacal;
        protected $lblSistAlternativoEliminacionExcretas;
        protected $lblRedGas;
        protected $lblPavimento;
        protected $lblCordonCuneta;
        protected $lblDesaguesPluviales;
        protected $lblRecoleccionResiduos;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * InfraestructuraMetaControl to edit a single Infraestructura object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Infraestructura object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this InfraestructuraMetaControl
         * @param Infraestructura $objInfraestructura new or existing Infraestructura object
         */
         public function __construct($objParentObject, Infraestructura $objInfraestructura) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this InfraestructuraMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Infraestructura object
            $this->objInfraestructura = $objInfraestructura;

            // Figure out if we're Editing or Creating New
            if ($this->objInfraestructura->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this InfraestructuraMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Infraestructura object creation - defaults to CreateOrEdit
          * @return InfraestructuraMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objInfraestructura = Infraestructura::Load($intId);

                // Infraestructura was found -- return it!
                if ($objInfraestructura)
                    return new InfraestructuraMetaControl($objParentObject, $objInfraestructura);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Infraestructura object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new InfraestructuraMetaControl($objParentObject, new Infraestructura());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this InfraestructuraMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Infraestructura object creation - defaults to CreateOrEdit
         * @return InfraestructuraMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return InfraestructuraMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this InfraestructuraMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Infraestructura object creation - defaults to CreateOrEdit
         * @return InfraestructuraMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return InfraestructuraMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objInfraestructura->Id;
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
            if($this->objInfraestructura->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objInfraestructura->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objInfraestructura->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objInfraestructura->IdFolioObject) ? $this->objInfraestructura->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstEnergiaElectricaMedidorIndividualObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstEnergiaElectricaMedidorIndividualObject_Create($strControlId = null) {
            $this->lstEnergiaElectricaMedidorIndividualObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->EnergiaElectricaMedidorIndividualObject){
                $this->lstEnergiaElectricaMedidorIndividualObject->Text = $this->objInfraestructura->EnergiaElectricaMedidorIndividualObject->__toString();
                $this->lstEnergiaElectricaMedidorIndividualObject->Value = $this->objInfraestructura->EnergiaElectricaMedidorIndividualObject->Id;
            }
            $this->lstEnergiaElectricaMedidorIndividualObject->Name = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
            return $this->lstEnergiaElectricaMedidorIndividualObject;
        }

        /**
         * Create and setup QLabel lblEnergiaElectricaMedidorIndividual
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEnergiaElectricaMedidorIndividual_Create($strControlId = null) {
            $this->lblEnergiaElectricaMedidorIndividual = new QLabel($this->objParentObject, $strControlId);
            $this->lblEnergiaElectricaMedidorIndividual->Name = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
            $this->lblEnergiaElectricaMedidorIndividual->Text = ($this->objInfraestructura->EnergiaElectricaMedidorIndividualObject) ? $this->objInfraestructura->EnergiaElectricaMedidorIndividualObject->__toString() : null;
            return $this->lblEnergiaElectricaMedidorIndividual;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstEnergiaElectricaMedidorColectivoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstEnergiaElectricaMedidorColectivoObject_Create($strControlId = null) {
            $this->lstEnergiaElectricaMedidorColectivoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->EnergiaElectricaMedidorColectivoObject){
                $this->lstEnergiaElectricaMedidorColectivoObject->Text = $this->objInfraestructura->EnergiaElectricaMedidorColectivoObject->__toString();
                $this->lstEnergiaElectricaMedidorColectivoObject->Value = $this->objInfraestructura->EnergiaElectricaMedidorColectivoObject->Id;
            }
            $this->lstEnergiaElectricaMedidorColectivoObject->Name = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
            return $this->lstEnergiaElectricaMedidorColectivoObject;
        }

        /**
         * Create and setup QLabel lblEnergiaElectricaMedidorColectivo
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEnergiaElectricaMedidorColectivo_Create($strControlId = null) {
            $this->lblEnergiaElectricaMedidorColectivo = new QLabel($this->objParentObject, $strControlId);
            $this->lblEnergiaElectricaMedidorColectivo->Name = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
            $this->lblEnergiaElectricaMedidorColectivo->Text = ($this->objInfraestructura->EnergiaElectricaMedidorColectivoObject) ? $this->objInfraestructura->EnergiaElectricaMedidorColectivoObject->__toString() : null;
            return $this->lblEnergiaElectricaMedidorColectivo;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstAlumbradoPublicoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstAlumbradoPublicoObject_Create($strControlId = null) {
            $this->lstAlumbradoPublicoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->AlumbradoPublicoObject){
                $this->lstAlumbradoPublicoObject->Text = $this->objInfraestructura->AlumbradoPublicoObject->__toString();
                $this->lstAlumbradoPublicoObject->Value = $this->objInfraestructura->AlumbradoPublicoObject->Id;
            }
            $this->lstAlumbradoPublicoObject->Name = QApplication::Translate('AlumbradoPublicoObject');
            return $this->lstAlumbradoPublicoObject;
        }

        /**
         * Create and setup QLabel lblAlumbradoPublico
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAlumbradoPublico_Create($strControlId = null) {
            $this->lblAlumbradoPublico = new QLabel($this->objParentObject, $strControlId);
            $this->lblAlumbradoPublico->Name = QApplication::Translate('AlumbradoPublicoObject');
            $this->lblAlumbradoPublico->Text = ($this->objInfraestructura->AlumbradoPublicoObject) ? $this->objInfraestructura->AlumbradoPublicoObject->__toString() : null;
            return $this->lblAlumbradoPublico;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstAguaCorrienteObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstAguaCorrienteObject_Create($strControlId = null) {
            $this->lstAguaCorrienteObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->AguaCorrienteObject){
                $this->lstAguaCorrienteObject->Text = $this->objInfraestructura->AguaCorrienteObject->__toString();
                $this->lstAguaCorrienteObject->Value = $this->objInfraestructura->AguaCorrienteObject->Id;
            }
            $this->lstAguaCorrienteObject->Name = QApplication::Translate('AguaCorrienteObject');
            return $this->lstAguaCorrienteObject;
        }

        /**
         * Create and setup QLabel lblAguaCorriente
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAguaCorriente_Create($strControlId = null) {
            $this->lblAguaCorriente = new QLabel($this->objParentObject, $strControlId);
            $this->lblAguaCorriente->Name = QApplication::Translate('AguaCorrienteObject');
            $this->lblAguaCorriente->Text = ($this->objInfraestructura->AguaCorrienteObject) ? $this->objInfraestructura->AguaCorrienteObject->__toString() : null;
            return $this->lblAguaCorriente;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstAguaPotableObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstAguaPotableObject_Create($strControlId = null) {
            $this->lstAguaPotableObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->AguaPotableObject){
                $this->lstAguaPotableObject->Text = $this->objInfraestructura->AguaPotableObject->__toString();
                $this->lstAguaPotableObject->Value = $this->objInfraestructura->AguaPotableObject->Id;
            }
            $this->lstAguaPotableObject->Name = QApplication::Translate('AguaPotableObject');
            return $this->lstAguaPotableObject;
        }

        /**
         * Create and setup QLabel lblAguaPotable
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAguaPotable_Create($strControlId = null) {
            $this->lblAguaPotable = new QLabel($this->objParentObject, $strControlId);
            $this->lblAguaPotable->Name = QApplication::Translate('AguaPotableObject');
            $this->lblAguaPotable->Text = ($this->objInfraestructura->AguaPotableObject) ? $this->objInfraestructura->AguaPotableObject->__toString() : null;
            return $this->lblAguaPotable;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstRedCloacalObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstRedCloacalObject_Create($strControlId = null) {
            $this->lstRedCloacalObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->RedCloacalObject){
                $this->lstRedCloacalObject->Text = $this->objInfraestructura->RedCloacalObject->__toString();
                $this->lstRedCloacalObject->Value = $this->objInfraestructura->RedCloacalObject->Id;
            }
            $this->lstRedCloacalObject->Name = QApplication::Translate('RedCloacalObject');
            return $this->lstRedCloacalObject;
        }

        /**
         * Create and setup QLabel lblRedCloacal
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRedCloacal_Create($strControlId = null) {
            $this->lblRedCloacal = new QLabel($this->objParentObject, $strControlId);
            $this->lblRedCloacal->Name = QApplication::Translate('RedCloacalObject');
            $this->lblRedCloacal->Text = ($this->objInfraestructura->RedCloacalObject) ? $this->objInfraestructura->RedCloacalObject->__toString() : null;
            return $this->lblRedCloacal;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstSistAlternativoEliminacionExcretasObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstSistAlternativoEliminacionExcretasObject_Create($strControlId = null) {
            $this->lstSistAlternativoEliminacionExcretasObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->SistAlternativoEliminacionExcretasObject){
                $this->lstSistAlternativoEliminacionExcretasObject->Text = $this->objInfraestructura->SistAlternativoEliminacionExcretasObject->__toString();
                $this->lstSistAlternativoEliminacionExcretasObject->Value = $this->objInfraestructura->SistAlternativoEliminacionExcretasObject->Id;
            }
            $this->lstSistAlternativoEliminacionExcretasObject->Name = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
            return $this->lstSistAlternativoEliminacionExcretasObject;
        }

        /**
         * Create and setup QLabel lblSistAlternativoEliminacionExcretas
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSistAlternativoEliminacionExcretas_Create($strControlId = null) {
            $this->lblSistAlternativoEliminacionExcretas = new QLabel($this->objParentObject, $strControlId);
            $this->lblSistAlternativoEliminacionExcretas->Name = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
            $this->lblSistAlternativoEliminacionExcretas->Text = ($this->objInfraestructura->SistAlternativoEliminacionExcretasObject) ? $this->objInfraestructura->SistAlternativoEliminacionExcretasObject->__toString() : null;
            return $this->lblSistAlternativoEliminacionExcretas;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstRedGasObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstRedGasObject_Create($strControlId = null) {
            $this->lstRedGasObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->RedGasObject){
                $this->lstRedGasObject->Text = $this->objInfraestructura->RedGasObject->__toString();
                $this->lstRedGasObject->Value = $this->objInfraestructura->RedGasObject->Id;
            }
            $this->lstRedGasObject->Name = QApplication::Translate('RedGasObject');
            return $this->lstRedGasObject;
        }

        /**
         * Create and setup QLabel lblRedGas
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRedGas_Create($strControlId = null) {
            $this->lblRedGas = new QLabel($this->objParentObject, $strControlId);
            $this->lblRedGas->Name = QApplication::Translate('RedGasObject');
            $this->lblRedGas->Text = ($this->objInfraestructura->RedGasObject) ? $this->objInfraestructura->RedGasObject->__toString() : null;
            return $this->lblRedGas;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstPavimentoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstPavimentoObject_Create($strControlId = null) {
            $this->lstPavimentoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->PavimentoObject){
                $this->lstPavimentoObject->Text = $this->objInfraestructura->PavimentoObject->__toString();
                $this->lstPavimentoObject->Value = $this->objInfraestructura->PavimentoObject->Id;
            }
            $this->lstPavimentoObject->Name = QApplication::Translate('PavimentoObject');
            return $this->lstPavimentoObject;
        }

        /**
         * Create and setup QLabel lblPavimento
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblPavimento_Create($strControlId = null) {
            $this->lblPavimento = new QLabel($this->objParentObject, $strControlId);
            $this->lblPavimento->Name = QApplication::Translate('PavimentoObject');
            $this->lblPavimento->Text = ($this->objInfraestructura->PavimentoObject) ? $this->objInfraestructura->PavimentoObject->__toString() : null;
            return $this->lblPavimento;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstCordonCunetaObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstCordonCunetaObject_Create($strControlId = null) {
            $this->lstCordonCunetaObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->CordonCunetaObject){
                $this->lstCordonCunetaObject->Text = $this->objInfraestructura->CordonCunetaObject->__toString();
                $this->lstCordonCunetaObject->Value = $this->objInfraestructura->CordonCunetaObject->Id;
            }
            $this->lstCordonCunetaObject->Name = QApplication::Translate('CordonCunetaObject');
            return $this->lstCordonCunetaObject;
        }

        /**
         * Create and setup QLabel lblCordonCuneta
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCordonCuneta_Create($strControlId = null) {
            $this->lblCordonCuneta = new QLabel($this->objParentObject, $strControlId);
            $this->lblCordonCuneta->Name = QApplication::Translate('CordonCunetaObject');
            $this->lblCordonCuneta->Text = ($this->objInfraestructura->CordonCunetaObject) ? $this->objInfraestructura->CordonCunetaObject->__toString() : null;
            return $this->lblCordonCuneta;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstDesaguesPluvialesObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstDesaguesPluvialesObject_Create($strControlId = null) {
            $this->lstDesaguesPluvialesObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->DesaguesPluvialesObject){
                $this->lstDesaguesPluvialesObject->Text = $this->objInfraestructura->DesaguesPluvialesObject->__toString();
                $this->lstDesaguesPluvialesObject->Value = $this->objInfraestructura->DesaguesPluvialesObject->Id;
            }
            $this->lstDesaguesPluvialesObject->Name = QApplication::Translate('DesaguesPluvialesObject');
            return $this->lstDesaguesPluvialesObject;
        }

        /**
         * Create and setup QLabel lblDesaguesPluviales
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDesaguesPluviales_Create($strControlId = null) {
            $this->lblDesaguesPluviales = new QLabel($this->objParentObject, $strControlId);
            $this->lblDesaguesPluviales->Name = QApplication::Translate('DesaguesPluvialesObject');
            $this->lblDesaguesPluviales->Text = ($this->objInfraestructura->DesaguesPluvialesObject) ? $this->objInfraestructura->DesaguesPluvialesObject->__toString() : null;
            return $this->lblDesaguesPluviales;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstRecoleccionResiduosObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstRecoleccionResiduosObject_Create($strControlId = null) {
            $this->lstRecoleccionResiduosObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'OpcionesInfraestructura', 'Id' , $strControlId);
            if($this->objInfraestructura->RecoleccionResiduosObject){
                $this->lstRecoleccionResiduosObject->Text = $this->objInfraestructura->RecoleccionResiduosObject->__toString();
                $this->lstRecoleccionResiduosObject->Value = $this->objInfraestructura->RecoleccionResiduosObject->Id;
            }
            $this->lstRecoleccionResiduosObject->Name = QApplication::Translate('RecoleccionResiduosObject');
            return $this->lstRecoleccionResiduosObject;
        }

        /**
         * Create and setup QLabel lblRecoleccionResiduos
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRecoleccionResiduos_Create($strControlId = null) {
            $this->lblRecoleccionResiduos = new QLabel($this->objParentObject, $strControlId);
            $this->lblRecoleccionResiduos->Name = QApplication::Translate('RecoleccionResiduosObject');
            $this->lblRecoleccionResiduos->Text = ($this->objInfraestructura->RecoleccionResiduosObject) ? $this->objInfraestructura->RecoleccionResiduosObject->__toString() : null;
            return $this->lblRecoleccionResiduos;
        }





        /**
         * Refresh this MetaControl with Data from the local Infraestructura object.
         * @param boolean $blnReload reload Infraestructura from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objInfraestructura->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objInfraestructura->Id;

            if ($this->lstIdFolioObject) {
                if($this->objInfraestructura->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objInfraestructura->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objInfraestructura->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objInfraestructura->IdFolioObject) ? $this->objInfraestructura->IdFolioObject->__toString() : null;

            if ($this->lstEnergiaElectricaMedidorIndividualObject) {
                if($this->objInfraestructura->EnergiaElectricaMedidorIndividualObject){
                    $this->lstEnergiaElectricaMedidorIndividualObject->Text = $this->objInfraestructura->EnergiaElectricaMedidorIndividualObject->__toString();
                    $this->lstEnergiaElectricaMedidorIndividualObject->Value = $this->objInfraestructura->EnergiaElectricaMedidorIndividual->Id;
                }                
            }
            if ($this->lblEnergiaElectricaMedidorIndividual) $this->lblEnergiaElectricaMedidorIndividual->Text = ($this->objInfraestructura->EnergiaElectricaMedidorIndividualObject) ? $this->objInfraestructura->EnergiaElectricaMedidorIndividualObject->__toString() : null;

            if ($this->lstEnergiaElectricaMedidorColectivoObject) {
                if($this->objInfraestructura->EnergiaElectricaMedidorColectivoObject){
                    $this->lstEnergiaElectricaMedidorColectivoObject->Text = $this->objInfraestructura->EnergiaElectricaMedidorColectivoObject->__toString();
                    $this->lstEnergiaElectricaMedidorColectivoObject->Value = $this->objInfraestructura->EnergiaElectricaMedidorColectivo->Id;
                }                
            }
            if ($this->lblEnergiaElectricaMedidorColectivo) $this->lblEnergiaElectricaMedidorColectivo->Text = ($this->objInfraestructura->EnergiaElectricaMedidorColectivoObject) ? $this->objInfraestructura->EnergiaElectricaMedidorColectivoObject->__toString() : null;

            if ($this->lstAlumbradoPublicoObject) {
                if($this->objInfraestructura->AlumbradoPublicoObject){
                    $this->lstAlumbradoPublicoObject->Text = $this->objInfraestructura->AlumbradoPublicoObject->__toString();
                    $this->lstAlumbradoPublicoObject->Value = $this->objInfraestructura->AlumbradoPublico->Id;
                }                
            }
            if ($this->lblAlumbradoPublico) $this->lblAlumbradoPublico->Text = ($this->objInfraestructura->AlumbradoPublicoObject) ? $this->objInfraestructura->AlumbradoPublicoObject->__toString() : null;

            if ($this->lstAguaCorrienteObject) {
                if($this->objInfraestructura->AguaCorrienteObject){
                    $this->lstAguaCorrienteObject->Text = $this->objInfraestructura->AguaCorrienteObject->__toString();
                    $this->lstAguaCorrienteObject->Value = $this->objInfraestructura->AguaCorriente->Id;
                }                
            }
            if ($this->lblAguaCorriente) $this->lblAguaCorriente->Text = ($this->objInfraestructura->AguaCorrienteObject) ? $this->objInfraestructura->AguaCorrienteObject->__toString() : null;

            if ($this->lstAguaPotableObject) {
                if($this->objInfraestructura->AguaPotableObject){
                    $this->lstAguaPotableObject->Text = $this->objInfraestructura->AguaPotableObject->__toString();
                    $this->lstAguaPotableObject->Value = $this->objInfraestructura->AguaPotable->Id;
                }                
            }
            if ($this->lblAguaPotable) $this->lblAguaPotable->Text = ($this->objInfraestructura->AguaPotableObject) ? $this->objInfraestructura->AguaPotableObject->__toString() : null;

            if ($this->lstRedCloacalObject) {
                if($this->objInfraestructura->RedCloacalObject){
                    $this->lstRedCloacalObject->Text = $this->objInfraestructura->RedCloacalObject->__toString();
                    $this->lstRedCloacalObject->Value = $this->objInfraestructura->RedCloacal->Id;
                }                
            }
            if ($this->lblRedCloacal) $this->lblRedCloacal->Text = ($this->objInfraestructura->RedCloacalObject) ? $this->objInfraestructura->RedCloacalObject->__toString() : null;

            if ($this->lstSistAlternativoEliminacionExcretasObject) {
                if($this->objInfraestructura->SistAlternativoEliminacionExcretasObject){
                    $this->lstSistAlternativoEliminacionExcretasObject->Text = $this->objInfraestructura->SistAlternativoEliminacionExcretasObject->__toString();
                    $this->lstSistAlternativoEliminacionExcretasObject->Value = $this->objInfraestructura->SistAlternativoEliminacionExcretas->Id;
                }                
            }
            if ($this->lblSistAlternativoEliminacionExcretas) $this->lblSistAlternativoEliminacionExcretas->Text = ($this->objInfraestructura->SistAlternativoEliminacionExcretasObject) ? $this->objInfraestructura->SistAlternativoEliminacionExcretasObject->__toString() : null;

            if ($this->lstRedGasObject) {
                if($this->objInfraestructura->RedGasObject){
                    $this->lstRedGasObject->Text = $this->objInfraestructura->RedGasObject->__toString();
                    $this->lstRedGasObject->Value = $this->objInfraestructura->RedGas->Id;
                }                
            }
            if ($this->lblRedGas) $this->lblRedGas->Text = ($this->objInfraestructura->RedGasObject) ? $this->objInfraestructura->RedGasObject->__toString() : null;

            if ($this->lstPavimentoObject) {
                if($this->objInfraestructura->PavimentoObject){
                    $this->lstPavimentoObject->Text = $this->objInfraestructura->PavimentoObject->__toString();
                    $this->lstPavimentoObject->Value = $this->objInfraestructura->Pavimento->Id;
                }                
            }
            if ($this->lblPavimento) $this->lblPavimento->Text = ($this->objInfraestructura->PavimentoObject) ? $this->objInfraestructura->PavimentoObject->__toString() : null;

            if ($this->lstCordonCunetaObject) {
                if($this->objInfraestructura->CordonCunetaObject){
                    $this->lstCordonCunetaObject->Text = $this->objInfraestructura->CordonCunetaObject->__toString();
                    $this->lstCordonCunetaObject->Value = $this->objInfraestructura->CordonCuneta->Id;
                }                
            }
            if ($this->lblCordonCuneta) $this->lblCordonCuneta->Text = ($this->objInfraestructura->CordonCunetaObject) ? $this->objInfraestructura->CordonCunetaObject->__toString() : null;

            if ($this->lstDesaguesPluvialesObject) {
                if($this->objInfraestructura->DesaguesPluvialesObject){
                    $this->lstDesaguesPluvialesObject->Text = $this->objInfraestructura->DesaguesPluvialesObject->__toString();
                    $this->lstDesaguesPluvialesObject->Value = $this->objInfraestructura->DesaguesPluviales->Id;
                }                
            }
            if ($this->lblDesaguesPluviales) $this->lblDesaguesPluviales->Text = ($this->objInfraestructura->DesaguesPluvialesObject) ? $this->objInfraestructura->DesaguesPluvialesObject->__toString() : null;

            if ($this->lstRecoleccionResiduosObject) {
                if($this->objInfraestructura->RecoleccionResiduosObject){
                    $this->lstRecoleccionResiduosObject->Text = $this->objInfraestructura->RecoleccionResiduosObject->__toString();
                    $this->lstRecoleccionResiduosObject->Value = $this->objInfraestructura->RecoleccionResiduos->Id;
                }                
            }
            if ($this->lblRecoleccionResiduos) $this->lblRecoleccionResiduos->Text = ($this->objInfraestructura->RecoleccionResiduosObject) ? $this->objInfraestructura->RecoleccionResiduosObject->__toString() : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC INFRAESTRUCTURA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objInfraestructura->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->lstEnergiaElectricaMedidorIndividualObject) $this->objInfraestructura->EnergiaElectricaMedidorIndividual = $this->lstEnergiaElectricaMedidorIndividualObject->SelectedValue;
                if ($this->lstEnergiaElectricaMedidorColectivoObject) $this->objInfraestructura->EnergiaElectricaMedidorColectivo = $this->lstEnergiaElectricaMedidorColectivoObject->SelectedValue;
                if ($this->lstAlumbradoPublicoObject) $this->objInfraestructura->AlumbradoPublico = $this->lstAlumbradoPublicoObject->SelectedValue;
                if ($this->lstAguaCorrienteObject) $this->objInfraestructura->AguaCorriente = $this->lstAguaCorrienteObject->SelectedValue;
                if ($this->lstAguaPotableObject) $this->objInfraestructura->AguaPotable = $this->lstAguaPotableObject->SelectedValue;
                if ($this->lstRedCloacalObject) $this->objInfraestructura->RedCloacal = $this->lstRedCloacalObject->SelectedValue;
                if ($this->lstSistAlternativoEliminacionExcretasObject) $this->objInfraestructura->SistAlternativoEliminacionExcretas = $this->lstSistAlternativoEliminacionExcretasObject->SelectedValue;
                if ($this->lstRedGasObject) $this->objInfraestructura->RedGas = $this->lstRedGasObject->SelectedValue;
                if ($this->lstPavimentoObject) $this->objInfraestructura->Pavimento = $this->lstPavimentoObject->SelectedValue;
                if ($this->lstCordonCunetaObject) $this->objInfraestructura->CordonCuneta = $this->lstCordonCunetaObject->SelectedValue;
                if ($this->lstDesaguesPluvialesObject) $this->objInfraestructura->DesaguesPluviales = $this->lstDesaguesPluvialesObject->SelectedValue;
                if ($this->lstRecoleccionResiduosObject) $this->objInfraestructura->RecoleccionResiduos = $this->lstRecoleccionResiduosObject->SelectedValue;


        }

        public function SaveInfraestructura() {
            return $this->Save();
        }
        /**
         * This will save this object's Infraestructura instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Infraestructura object
                $idReturn = $this->objInfraestructura->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Infraestructura instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteInfraestructura() {
            $this->objInfraestructura->Delete();
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
                case 'Infraestructura': return $this->objInfraestructura;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Infraestructura fields -- will be created dynamically if not yet created
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
                case 'EnergiaElectricaMedidorIndividualControl':
                    if (!$this->lstEnergiaElectricaMedidorIndividualObject) return $this->lstEnergiaElectricaMedidorIndividualObject_Create();
                    return $this->lstEnergiaElectricaMedidorIndividualObject;
                case 'EnergiaElectricaMedidorIndividualLabel':
                    if (!$this->lblEnergiaElectricaMedidorIndividual) return $this->lblEnergiaElectricaMedidorIndividual_Create();
                    return $this->lblEnergiaElectricaMedidorIndividual;
                case 'EnergiaElectricaMedidorColectivoControl':
                    if (!$this->lstEnergiaElectricaMedidorColectivoObject) return $this->lstEnergiaElectricaMedidorColectivoObject_Create();
                    return $this->lstEnergiaElectricaMedidorColectivoObject;
                case 'EnergiaElectricaMedidorColectivoLabel':
                    if (!$this->lblEnergiaElectricaMedidorColectivo) return $this->lblEnergiaElectricaMedidorColectivo_Create();
                    return $this->lblEnergiaElectricaMedidorColectivo;
                case 'AlumbradoPublicoControl':
                    if (!$this->lstAlumbradoPublicoObject) return $this->lstAlumbradoPublicoObject_Create();
                    return $this->lstAlumbradoPublicoObject;
                case 'AlumbradoPublicoLabel':
                    if (!$this->lblAlumbradoPublico) return $this->lblAlumbradoPublico_Create();
                    return $this->lblAlumbradoPublico;
                case 'AguaCorrienteControl':
                    if (!$this->lstAguaCorrienteObject) return $this->lstAguaCorrienteObject_Create();
                    return $this->lstAguaCorrienteObject;
                case 'AguaCorrienteLabel':
                    if (!$this->lblAguaCorriente) return $this->lblAguaCorriente_Create();
                    return $this->lblAguaCorriente;
                case 'AguaPotableControl':
                    if (!$this->lstAguaPotableObject) return $this->lstAguaPotableObject_Create();
                    return $this->lstAguaPotableObject;
                case 'AguaPotableLabel':
                    if (!$this->lblAguaPotable) return $this->lblAguaPotable_Create();
                    return $this->lblAguaPotable;
                case 'RedCloacalControl':
                    if (!$this->lstRedCloacalObject) return $this->lstRedCloacalObject_Create();
                    return $this->lstRedCloacalObject;
                case 'RedCloacalLabel':
                    if (!$this->lblRedCloacal) return $this->lblRedCloacal_Create();
                    return $this->lblRedCloacal;
                case 'SistAlternativoEliminacionExcretasControl':
                    if (!$this->lstSistAlternativoEliminacionExcretasObject) return $this->lstSistAlternativoEliminacionExcretasObject_Create();
                    return $this->lstSistAlternativoEliminacionExcretasObject;
                case 'SistAlternativoEliminacionExcretasLabel':
                    if (!$this->lblSistAlternativoEliminacionExcretas) return $this->lblSistAlternativoEliminacionExcretas_Create();
                    return $this->lblSistAlternativoEliminacionExcretas;
                case 'RedGasControl':
                    if (!$this->lstRedGasObject) return $this->lstRedGasObject_Create();
                    return $this->lstRedGasObject;
                case 'RedGasLabel':
                    if (!$this->lblRedGas) return $this->lblRedGas_Create();
                    return $this->lblRedGas;
                case 'PavimentoControl':
                    if (!$this->lstPavimentoObject) return $this->lstPavimentoObject_Create();
                    return $this->lstPavimentoObject;
                case 'PavimentoLabel':
                    if (!$this->lblPavimento) return $this->lblPavimento_Create();
                    return $this->lblPavimento;
                case 'CordonCunetaControl':
                    if (!$this->lstCordonCunetaObject) return $this->lstCordonCunetaObject_Create();
                    return $this->lstCordonCunetaObject;
                case 'CordonCunetaLabel':
                    if (!$this->lblCordonCuneta) return $this->lblCordonCuneta_Create();
                    return $this->lblCordonCuneta;
                case 'DesaguesPluvialesControl':
                    if (!$this->lstDesaguesPluvialesObject) return $this->lstDesaguesPluvialesObject_Create();
                    return $this->lstDesaguesPluvialesObject;
                case 'DesaguesPluvialesLabel':
                    if (!$this->lblDesaguesPluviales) return $this->lblDesaguesPluviales_Create();
                    return $this->lblDesaguesPluviales;
                case 'RecoleccionResiduosControl':
                    if (!$this->lstRecoleccionResiduosObject) return $this->lstRecoleccionResiduosObject_Create();
                    return $this->lstRecoleccionResiduosObject;
                case 'RecoleccionResiduosLabel':
                    if (!$this->lblRecoleccionResiduos) return $this->lblRecoleccionResiduos_Create();
                    return $this->lblRecoleccionResiduos;
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
                    // Controls that point to Infraestructura fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'EnergiaElectricaMedidorIndividualControl':
                        return ($this->lstEnergiaElectricaMedidorIndividualObject = QType::Cast($mixValue, 'QControl'));
                    case 'EnergiaElectricaMedidorColectivoControl':
                        return ($this->lstEnergiaElectricaMedidorColectivoObject = QType::Cast($mixValue, 'QControl'));
                    case 'AlumbradoPublicoControl':
                        return ($this->lstAlumbradoPublicoObject = QType::Cast($mixValue, 'QControl'));
                    case 'AguaCorrienteControl':
                        return ($this->lstAguaCorrienteObject = QType::Cast($mixValue, 'QControl'));
                    case 'AguaPotableControl':
                        return ($this->lstAguaPotableObject = QType::Cast($mixValue, 'QControl'));
                    case 'RedCloacalControl':
                        return ($this->lstRedCloacalObject = QType::Cast($mixValue, 'QControl'));
                    case 'SistAlternativoEliminacionExcretasControl':
                        return ($this->lstSistAlternativoEliminacionExcretasObject = QType::Cast($mixValue, 'QControl'));
                    case 'RedGasControl':
                        return ($this->lstRedGasObject = QType::Cast($mixValue, 'QControl'));
                    case 'PavimentoControl':
                        return ($this->lstPavimentoObject = QType::Cast($mixValue, 'QControl'));
                    case 'CordonCunetaControl':
                        return ($this->lstCordonCunetaObject = QType::Cast($mixValue, 'QControl'));
                    case 'DesaguesPluvialesControl':
                        return ($this->lstDesaguesPluvialesObject = QType::Cast($mixValue, 'QControl'));
                    case 'RecoleccionResiduosControl':
                        return ($this->lstRecoleccionResiduosObject = QType::Cast($mixValue, 'QControl'));
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
