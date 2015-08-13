<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the OpcionesInfraestructura class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single OpcionesInfraestructura object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a OpcionesInfraestructuraMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read OpcionesInfraestructura $OpcionesInfraestructura the actual OpcionesInfraestructura data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $OpcionControl
     * property-read QLabel $OpcionLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class OpcionesInfraestructuraMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var OpcionesInfraestructura
                */
        public $objOpcionesInfraestructura;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of OpcionesInfraestructura's individual data fields
        protected $lblId;
        protected $txtOpcion;

        // Controls that allow the viewing of OpcionesInfraestructura's individual data fields
        protected $lblOpcion;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * OpcionesInfraestructuraMetaControl to edit a single OpcionesInfraestructura object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single OpcionesInfraestructura object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesInfraestructuraMetaControl
         * @param OpcionesInfraestructura $objOpcionesInfraestructura new or existing OpcionesInfraestructura object
         */
         public function __construct($objParentObject, OpcionesInfraestructura $objOpcionesInfraestructura) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this OpcionesInfraestructuraMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked OpcionesInfraestructura object
            $this->objOpcionesInfraestructura = $objOpcionesInfraestructura;

            // Figure out if we're Editing or Creating New
            if ($this->objOpcionesInfraestructura->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesInfraestructuraMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesInfraestructura object creation - defaults to CreateOrEdit
          * @return OpcionesInfraestructuraMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objOpcionesInfraestructura = OpcionesInfraestructura::Load($intId);

                // OpcionesInfraestructura was found -- return it!
                if ($objOpcionesInfraestructura)
                    return new OpcionesInfraestructuraMetaControl($objParentObject, $objOpcionesInfraestructura);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a OpcionesInfraestructura object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new OpcionesInfraestructuraMetaControl($objParentObject, new OpcionesInfraestructura());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesInfraestructuraMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesInfraestructura object creation - defaults to CreateOrEdit
         * @return OpcionesInfraestructuraMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return OpcionesInfraestructuraMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this OpcionesInfraestructuraMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing OpcionesInfraestructura object creation - defaults to CreateOrEdit
         * @return OpcionesInfraestructuraMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return OpcionesInfraestructuraMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objOpcionesInfraestructura->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtOpcion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtOpcion_Create($strControlId = null) {
            $this->txtOpcion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtOpcion->Name = QApplication::Translate('Opcion');
            $this->txtOpcion->Text = $this->objOpcionesInfraestructura->Opcion;
            $this->txtOpcion->MaxLength = OpcionesInfraestructura::OpcionMaxLength;
            
            return $this->txtOpcion;
        }

        /**
         * Create and setup QLabel lblOpcion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblOpcion_Create($strControlId = null) {
            $this->lblOpcion = new QLabel($this->objParentObject, $strControlId);
            $this->lblOpcion->Name = QApplication::Translate('Opcion');
            $this->lblOpcion->Text = $this->objOpcionesInfraestructura->Opcion;
            return $this->lblOpcion;
        }



    public $lstInfraestructuraAsAguaCorriente;
    /**
     * Gets all associated InfraestructurasAsAguaCorriente as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsAguaCorriente_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsAguaCorrienteArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'AguaCorriente';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsAguaCorriente';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsAguaCorriente';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsAguaCorriente = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsAguaCorriente->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsAguaCorriente->SetNewMethod($this, "lstInfraestructuraAsAguaCorriente_New");
        $this->lstInfraestructuraAsAguaCorriente->SetEditMethod($this, "lstInfraestructuraAsAguaCorriente_Edit");
        return $this->lstInfraestructuraAsAguaCorriente;
    }

    public function lstInfraestructuraAsAguaCorriente_New() {
        InfraestructuraModalPanel::$strControlsArray['lstAguaCorrienteObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsAguaCorriente->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsAguaCorriente->ModalPanel->objCallerControl = $this->lstInfraestructuraAsAguaCorriente;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsAguaCorriente_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstAguaCorrienteObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsAguaCorrienteArray[$intKey];
        $this->lstInfraestructuraAsAguaCorriente->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsAguaCorriente->ModalPanel->objCallerControl = $this->lstInfraestructuraAsAguaCorriente;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsAguaPotable;
    /**
     * Gets all associated InfraestructurasAsAguaPotable as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsAguaPotable_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsAguaPotableArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'AguaPotable';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsAguaPotable';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsAguaPotable';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsAguaPotable = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsAguaPotable->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsAguaPotable->SetNewMethod($this, "lstInfraestructuraAsAguaPotable_New");
        $this->lstInfraestructuraAsAguaPotable->SetEditMethod($this, "lstInfraestructuraAsAguaPotable_Edit");
        return $this->lstInfraestructuraAsAguaPotable;
    }

    public function lstInfraestructuraAsAguaPotable_New() {
        InfraestructuraModalPanel::$strControlsArray['lstAguaPotableObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsAguaPotable->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsAguaPotable->ModalPanel->objCallerControl = $this->lstInfraestructuraAsAguaPotable;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsAguaPotable_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstAguaPotableObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsAguaPotableArray[$intKey];
        $this->lstInfraestructuraAsAguaPotable->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsAguaPotable->ModalPanel->objCallerControl = $this->lstInfraestructuraAsAguaPotable;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsAlumbradoPublico;
    /**
     * Gets all associated InfraestructurasAsAlumbradoPublico as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsAlumbradoPublico_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsAlumbradoPublicoArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'AlumbradoPublico';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsAlumbradoPublico';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsAlumbradoPublico';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsAlumbradoPublico = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsAlumbradoPublico->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsAlumbradoPublico->SetNewMethod($this, "lstInfraestructuraAsAlumbradoPublico_New");
        $this->lstInfraestructuraAsAlumbradoPublico->SetEditMethod($this, "lstInfraestructuraAsAlumbradoPublico_Edit");
        return $this->lstInfraestructuraAsAlumbradoPublico;
    }

    public function lstInfraestructuraAsAlumbradoPublico_New() {
        InfraestructuraModalPanel::$strControlsArray['lstAlumbradoPublicoObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsAlumbradoPublico->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsAlumbradoPublico->ModalPanel->objCallerControl = $this->lstInfraestructuraAsAlumbradoPublico;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsAlumbradoPublico_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstAlumbradoPublicoObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsAlumbradoPublicoArray[$intKey];
        $this->lstInfraestructuraAsAlumbradoPublico->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsAlumbradoPublico->ModalPanel->objCallerControl = $this->lstInfraestructuraAsAlumbradoPublico;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsCordonCuneta;
    /**
     * Gets all associated InfraestructurasAsCordonCuneta as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsCordonCuneta_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsCordonCunetaArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'CordonCuneta';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsCordonCuneta';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsCordonCuneta';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsCordonCuneta = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsCordonCuneta->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsCordonCuneta->SetNewMethod($this, "lstInfraestructuraAsCordonCuneta_New");
        $this->lstInfraestructuraAsCordonCuneta->SetEditMethod($this, "lstInfraestructuraAsCordonCuneta_Edit");
        return $this->lstInfraestructuraAsCordonCuneta;
    }

    public function lstInfraestructuraAsCordonCuneta_New() {
        InfraestructuraModalPanel::$strControlsArray['lstCordonCunetaObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsCordonCuneta->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsCordonCuneta->ModalPanel->objCallerControl = $this->lstInfraestructuraAsCordonCuneta;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsCordonCuneta_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstCordonCunetaObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsCordonCunetaArray[$intKey];
        $this->lstInfraestructuraAsCordonCuneta->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsCordonCuneta->ModalPanel->objCallerControl = $this->lstInfraestructuraAsCordonCuneta;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsDesaguesPluviales;
    /**
     * Gets all associated InfraestructurasAsDesaguesPluviales as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsDesaguesPluviales_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsDesaguesPluvialesArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'DesaguesPluviales';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsDesaguesPluviales';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsDesaguesPluviales';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsDesaguesPluviales = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsDesaguesPluviales->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsDesaguesPluviales->SetNewMethod($this, "lstInfraestructuraAsDesaguesPluviales_New");
        $this->lstInfraestructuraAsDesaguesPluviales->SetEditMethod($this, "lstInfraestructuraAsDesaguesPluviales_Edit");
        return $this->lstInfraestructuraAsDesaguesPluviales;
    }

    public function lstInfraestructuraAsDesaguesPluviales_New() {
        InfraestructuraModalPanel::$strControlsArray['lstDesaguesPluvialesObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsDesaguesPluviales->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsDesaguesPluviales->ModalPanel->objCallerControl = $this->lstInfraestructuraAsDesaguesPluviales;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsDesaguesPluviales_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstDesaguesPluvialesObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsDesaguesPluvialesArray[$intKey];
        $this->lstInfraestructuraAsDesaguesPluviales->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsDesaguesPluviales->ModalPanel->objCallerControl = $this->lstInfraestructuraAsDesaguesPluviales;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsEnergiaElectricaMedidorColectivo;
    /**
     * Gets all associated InfraestructurasAsEnergiaElectricaMedidorColectivo as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsEnergiaElectricaMedidorColectivo_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsEnergiaElectricaMedidorColectivoArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'EnergiaElectricaMedidorColectivo';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsEnergiaElectricaMedidorColectivo';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsEnergiaElectricaMedidorColectivo';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->SetNewMethod($this, "lstInfraestructuraAsEnergiaElectricaMedidorColectivo_New");
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->SetEditMethod($this, "lstInfraestructuraAsEnergiaElectricaMedidorColectivo_Edit");
        return $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo;
    }

    public function lstInfraestructuraAsEnergiaElectricaMedidorColectivo_New() {
        InfraestructuraModalPanel::$strControlsArray['lstEnergiaElectricaMedidorColectivoObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->ModalPanel->objCallerControl = $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsEnergiaElectricaMedidorColectivo_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstEnergiaElectricaMedidorColectivoObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsEnergiaElectricaMedidorColectivoArray[$intKey];
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo->ModalPanel->objCallerControl = $this->lstInfraestructuraAsEnergiaElectricaMedidorColectivo;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsEnergiaElectricaMedidorIndividual;
    /**
     * Gets all associated InfraestructurasAsEnergiaElectricaMedidorIndividual as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsEnergiaElectricaMedidorIndividual_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsEnergiaElectricaMedidorIndividualArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'EnergiaElectricaMedidorIndividual';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsEnergiaElectricaMedidorIndividual';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsEnergiaElectricaMedidorIndividual';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->SetNewMethod($this, "lstInfraestructuraAsEnergiaElectricaMedidorIndividual_New");
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->SetEditMethod($this, "lstInfraestructuraAsEnergiaElectricaMedidorIndividual_Edit");
        return $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual;
    }

    public function lstInfraestructuraAsEnergiaElectricaMedidorIndividual_New() {
        InfraestructuraModalPanel::$strControlsArray['lstEnergiaElectricaMedidorIndividualObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->ModalPanel->objCallerControl = $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsEnergiaElectricaMedidorIndividual_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstEnergiaElectricaMedidorIndividualObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsEnergiaElectricaMedidorIndividualArray[$intKey];
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual->ModalPanel->objCallerControl = $this->lstInfraestructuraAsEnergiaElectricaMedidorIndividual;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsPavimento;
    /**
     * Gets all associated InfraestructurasAsPavimento as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsPavimento_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsPavimentoArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'Pavimento';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsPavimento';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsPavimento';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsPavimento = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsPavimento->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsPavimento->SetNewMethod($this, "lstInfraestructuraAsPavimento_New");
        $this->lstInfraestructuraAsPavimento->SetEditMethod($this, "lstInfraestructuraAsPavimento_Edit");
        return $this->lstInfraestructuraAsPavimento;
    }

    public function lstInfraestructuraAsPavimento_New() {
        InfraestructuraModalPanel::$strControlsArray['lstPavimentoObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsPavimento->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsPavimento->ModalPanel->objCallerControl = $this->lstInfraestructuraAsPavimento;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsPavimento_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstPavimentoObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsPavimentoArray[$intKey];
        $this->lstInfraestructuraAsPavimento->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsPavimento->ModalPanel->objCallerControl = $this->lstInfraestructuraAsPavimento;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsRecoleccionResiduos;
    /**
     * Gets all associated InfraestructurasAsRecoleccionResiduos as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsRecoleccionResiduos_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsRecoleccionResiduosArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'RecoleccionResiduos';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsRecoleccionResiduos';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsRecoleccionResiduos';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');

        $this->lstInfraestructuraAsRecoleccionResiduos = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsRecoleccionResiduos->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsRecoleccionResiduos->SetNewMethod($this, "lstInfraestructuraAsRecoleccionResiduos_New");
        $this->lstInfraestructuraAsRecoleccionResiduos->SetEditMethod($this, "lstInfraestructuraAsRecoleccionResiduos_Edit");
        return $this->lstInfraestructuraAsRecoleccionResiduos;
    }

    public function lstInfraestructuraAsRecoleccionResiduos_New() {
        InfraestructuraModalPanel::$strControlsArray['lstRecoleccionResiduosObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsRecoleccionResiduos->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsRecoleccionResiduos->ModalPanel->objCallerControl = $this->lstInfraestructuraAsRecoleccionResiduos;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsRecoleccionResiduos_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstRecoleccionResiduosObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsRecoleccionResiduosArray[$intKey];
        $this->lstInfraestructuraAsRecoleccionResiduos->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsRecoleccionResiduos->ModalPanel->objCallerControl = $this->lstInfraestructuraAsRecoleccionResiduos;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsRedCloacal;
    /**
     * Gets all associated InfraestructurasAsRedCloacal as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsRedCloacal_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsRedCloacalArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'RedCloacal';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsRedCloacal';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsRedCloacal';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsRedCloacal = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsRedCloacal->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsRedCloacal->SetNewMethod($this, "lstInfraestructuraAsRedCloacal_New");
        $this->lstInfraestructuraAsRedCloacal->SetEditMethod($this, "lstInfraestructuraAsRedCloacal_Edit");
        return $this->lstInfraestructuraAsRedCloacal;
    }

    public function lstInfraestructuraAsRedCloacal_New() {
        InfraestructuraModalPanel::$strControlsArray['lstRedCloacalObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsRedCloacal->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsRedCloacal->ModalPanel->objCallerControl = $this->lstInfraestructuraAsRedCloacal;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsRedCloacal_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstRedCloacalObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsRedCloacalArray[$intKey];
        $this->lstInfraestructuraAsRedCloacal->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsRedCloacal->ModalPanel->objCallerControl = $this->lstInfraestructuraAsRedCloacal;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsRedGas;
    /**
     * Gets all associated InfraestructurasAsRedGas as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsRedGas_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsRedGasArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'RedGas';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsRedGas';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsRedGas';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['SistAlternativoEliminacionExcretasObject'] = QApplication::Translate('SistAlternativoEliminacionExcretasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsRedGas = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsRedGas->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsRedGas->SetNewMethod($this, "lstInfraestructuraAsRedGas_New");
        $this->lstInfraestructuraAsRedGas->SetEditMethod($this, "lstInfraestructuraAsRedGas_Edit");
        return $this->lstInfraestructuraAsRedGas;
    }

    public function lstInfraestructuraAsRedGas_New() {
        InfraestructuraModalPanel::$strControlsArray['lstRedGasObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsRedGas->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsRedGas->ModalPanel->objCallerControl = $this->lstInfraestructuraAsRedGas;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsRedGas_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstRedGasObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsRedGasArray[$intKey];
        $this->lstInfraestructuraAsRedGas->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsRedGas->ModalPanel->objCallerControl = $this->lstInfraestructuraAsRedGas;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstInfraestructuraAsSistAlternativoEliminacionExcretas;
    /**
     * Gets all associated InfraestructurasAsSistAlternativoEliminacionExcretas as an array of Infraestructura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Infraestructura[]
    */ 
    public function lstInfraestructuraAsSistAlternativoEliminacionExcretas_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Infraestructura';
        $strConfigArray['strRefreshMethod'] = 'InfraestructuraAsSistAlternativoEliminacionExcretasArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'SistAlternativoEliminacionExcretas';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddInfraestructuraAsSistAlternativoEliminacionExcretas';
        $strConfigArray['strRemoveMethod'] = 'RemoveInfraestructuraAsSistAlternativoEliminacionExcretas';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['IdFolioObject'] = QApplication::Translate('IdFolioObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorIndividualObject'] = QApplication::Translate('EnergiaElectricaMedidorIndividualObject');
        $strConfigArray['Columns']['EnergiaElectricaMedidorColectivoObject'] = QApplication::Translate('EnergiaElectricaMedidorColectivoObject');
        $strConfigArray['Columns']['AlumbradoPublicoObject'] = QApplication::Translate('AlumbradoPublicoObject');
        $strConfigArray['Columns']['AguaCorrienteObject'] = QApplication::Translate('AguaCorrienteObject');
        $strConfigArray['Columns']['AguaPotableObject'] = QApplication::Translate('AguaPotableObject');
        $strConfigArray['Columns']['RedCloacalObject'] = QApplication::Translate('RedCloacalObject');
        $strConfigArray['Columns']['RedGasObject'] = QApplication::Translate('RedGasObject');
        $strConfigArray['Columns']['PavimentoObject'] = QApplication::Translate('PavimentoObject');
        $strConfigArray['Columns']['CordonCunetaObject'] = QApplication::Translate('CordonCunetaObject');
        $strConfigArray['Columns']['DesaguesPluvialesObject'] = QApplication::Translate('DesaguesPluvialesObject');
        $strConfigArray['Columns']['RecoleccionResiduosObject'] = QApplication::Translate('RecoleccionResiduosObject');

        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas = new QListPanel($this->objParentObject, $this->objOpcionesInfraestructura, $strConfigArray, $strControlId);
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->Name = Infraestructura::Noun();
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->SetNewMethod($this, "lstInfraestructuraAsSistAlternativoEliminacionExcretas_New");
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->SetEditMethod($this, "lstInfraestructuraAsSistAlternativoEliminacionExcretas_Edit");
        return $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas;
    }

    public function lstInfraestructuraAsSistAlternativoEliminacionExcretas_New() {
        InfraestructuraModalPanel::$strControlsArray['lstSistAlternativoEliminacionExcretasObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->ModalPanel->objCallerControl = $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstInfraestructuraAsSistAlternativoEliminacionExcretas_Edit($intKey) {
        InfraestructuraModalPanel::$strControlsArray['lstSistAlternativoEliminacionExcretasObject'] = false;
        $strControlsArray = array_keys(InfraestructuraModalPanel::$strControlsArray, true);
        $obj = $this->objOpcionesInfraestructura->InfraestructuraAsSistAlternativoEliminacionExcretasArray[$intKey];
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->ModalPanel = new InfraestructuraModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas->ModalPanel->objCallerControl = $this->lstInfraestructuraAsSistAlternativoEliminacionExcretas;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local OpcionesInfraestructura object.
         * @param boolean $blnReload reload OpcionesInfraestructura from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objOpcionesInfraestructura->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOpcionesInfraestructura->Id;

            if ($this->txtOpcion) $this->txtOpcion->Text = $this->objOpcionesInfraestructura->Opcion;
            if ($this->lblOpcion) $this->lblOpcion->Text = $this->objOpcionesInfraestructura->Opcion;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC OPCIONESINFRAESTRUCTURA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtOpcion) $this->objOpcionesInfraestructura->Opcion = $this->txtOpcion->Text;


        }

        public function SaveOpcionesInfraestructura() {
            return $this->Save();
        }
        /**
         * This will save this object's OpcionesInfraestructura instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the OpcionesInfraestructura object
                $idReturn = $this->objOpcionesInfraestructura->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's OpcionesInfraestructura instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteOpcionesInfraestructura() {
            $this->objOpcionesInfraestructura->Delete();
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
                case 'OpcionesInfraestructura': return $this->objOpcionesInfraestructura;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to OpcionesInfraestructura fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'OpcionControl':
                    if (!$this->txtOpcion) return $this->txtOpcion_Create();
                    return $this->txtOpcion;
                case 'OpcionLabel':
                    if (!$this->lblOpcion) return $this->lblOpcion_Create();
                    return $this->lblOpcion;
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
                    // Controls that point to OpcionesInfraestructura fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'OpcionControl':
                        return ($this->txtOpcion = QType::Cast($mixValue, 'QControl'));
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
