<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Folio class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Folio object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a FolioMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Folio $Folio the actual Folio data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QTextBox $CodFolioControl
     * property-read QLabel $CodFolioLabel
     * property QListBox $IdPartidoControl
     * property-read QLabel $IdPartidoLabel
     * property QTextBox $MatriculaControl
     * property-read QLabel $MatriculaLabel
     * property QDateTimePicker $FechaControl
     * property-read QLabel $FechaLabel
     * property QTextBox $NombreBarrioOficialControl
     * property-read QLabel $NombreBarrioOficialLabel
     * property QTextBox $NombreBarrioAlternativo1Control
     * property-read QLabel $NombreBarrioAlternativo1Label
     * property QTextBox $NombreBarrioAlternativo2Control
     * property-read QLabel $NombreBarrioAlternativo2Label
     * property QTextBox $AnioOrigenControl
     * property-read QLabel $AnioOrigenLabel
     * property QIntegerTextBox $CantidadFamiliasControl
     * property-read QLabel $CantidadFamiliasLabel
     * property QListBox $TipoBarrioControl
     * property-read QLabel $TipoBarrioLabel
     * property QTextBox $ObservacionCasoDudosoControl
     * property-read QLabel $ObservacionCasoDudosoLabel
     * property QTextBox $DireccionControl
     * property-read QLabel $DireccionLabel
     * property QTextBox $GeomControl
     * property-read QLabel $GeomLabel
     * property QTextBox $JudicializadoControl
     * property-read QLabel $JudicializadoLabel
     * property QTextBox $LocalidadControl
     * property-read QLabel $LocalidadLabel
     * property QListBox $CreadorControl
     * property-read QLabel $CreadorLabel
     * property QFloatTextBox $SuperficieControl
     * property-read QLabel $SuperficieLabel
     * property QTextBox $EncargadoControl
     * property-read QLabel $EncargadoLabel
     * property QTextBox $ReparticionControl
     * property-read QLabel $ReparticionLabel
     * property QIntegerTextBox $FolioOriginalControl
     * property-read QLabel $FolioOriginalLabel
     * property QListBox $CondicionesSocioUrbanisticasAsIdControl
     * property-read QLabel $CondicionesSocioUrbanisticasAsIdLabel
     * property QListBox $RegularizacionAsIdControl
     * property-read QLabel $RegularizacionAsIdLabel
     * property QListBox $UsoInternoControl
     * property-read QLabel $UsoInternoLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class FolioMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Folio
                */
        public $objFolio;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Folio's individual data fields
        protected $lblId;
        protected $txtCodFolio;
        protected $lstIdPartidoObject;
        protected $txtMatricula;
        protected $calFecha;
        protected $txtNombreBarrioOficial;
        protected $txtNombreBarrioAlternativo1;
        protected $txtNombreBarrioAlternativo2;
        protected $txtAnioOrigen;
        protected $txtCantidadFamilias;
        protected $lstTipoBarrioObject;
        protected $txtObservacionCasoDudoso;
        protected $txtDireccion;
        protected $txtGeom;
        protected $txtJudicializado;
        protected $txtLocalidad;
        protected $lstCreadorObject;
        protected $txtSuperficie;
        protected $txtEncargado;
        protected $txtReparticion;
        protected $txtFolioOriginal;

        // Controls that allow the viewing of Folio's individual data fields
        protected $lblCodFolio;
        protected $lblIdPartido;
        protected $lblMatricula;
        protected $lblFecha;
        protected $lblNombreBarrioOficial;
        protected $lblNombreBarrioAlternativo1;
        protected $lblNombreBarrioAlternativo2;
        protected $lblAnioOrigen;
        protected $lblCantidadFamilias;
        protected $lblTipoBarrio;
        protected $lblObservacionCasoDudoso;
        protected $lblDireccion;
        protected $lblGeom;
        protected $lblJudicializado;
        protected $lblLocalidad;
        protected $lblCreador;
        protected $lblSuperficie;
        protected $lblEncargado;
        protected $lblReparticion;
        protected $lblFolioOriginal;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        protected $lstCondicionesSocioUrbanisticasAsId;
        protected $lstRegularizacionAsId;
        protected $lstUsoInterno;

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        protected $lblCondicionesSocioUrbanisticasAsId;
        protected $lblRegularizacionAsId;
        protected $lblUsoInterno;


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * FolioMetaControl to edit a single Folio object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Folio object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this FolioMetaControl
         * @param Folio $objFolio new or existing Folio object
         */
         public function __construct($objParentObject, Folio $objFolio) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this FolioMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Folio object
            $this->objFolio = $objFolio;

            // Figure out if we're Editing or Creating New
            if ($this->objFolio->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this FolioMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Folio object creation - defaults to CreateOrEdit
          * @return FolioMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objFolio = Folio::Load($intId);

                // Folio was found -- return it!
                if ($objFolio)
                    return new FolioMetaControl($objParentObject, $objFolio);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Folio object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new FolioMetaControl($objParentObject, new Folio());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this FolioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Folio object creation - defaults to CreateOrEdit
         * @return FolioMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return FolioMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this FolioMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Folio object creation - defaults to CreateOrEdit
         * @return FolioMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return FolioMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objFolio->Id;
            else
                $this->lblId->Text = 'N/A';
            return $this->lblId;
        }

        /**
         * Create and setup QTextBox txtCodFolio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCodFolio_Create($strControlId = null) {
            $this->txtCodFolio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCodFolio->Name = QApplication::Translate('CodFolio');
            $this->txtCodFolio->Text = $this->objFolio->CodFolio;
            $this->txtCodFolio->Required = true;
            $this->txtCodFolio->MaxLength = Folio::CodFolioMaxLength;
            
            return $this->txtCodFolio;
        }

        /**
         * Create and setup QLabel lblCodFolio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCodFolio_Create($strControlId = null) {
            $this->lblCodFolio = new QLabel($this->objParentObject, $strControlId);
            $this->lblCodFolio->Name = QApplication::Translate('CodFolio');
            $this->lblCodFolio->Text = $this->objFolio->CodFolio;
            $this->lblCodFolio->Required = true;
            return $this->lblCodFolio;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstIdPartidoObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstIdPartidoObject_Create($strControlId = null) {
            $this->lstIdPartidoObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Partido', 'Id' , $strControlId);
            if($this->objFolio->IdPartidoObject){
                $this->lstIdPartidoObject->Text = $this->objFolio->IdPartidoObject->__toString();
                $this->lstIdPartidoObject->Value = $this->objFolio->IdPartidoObject->Id;
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
            $this->lblIdPartido->Text = ($this->objFolio->IdPartidoObject) ? $this->objFolio->IdPartidoObject->__toString() : null;
            $this->lblIdPartido->Required = true;
            return $this->lblIdPartido;
        }

        /**
         * Create and setup QTextBox txtMatricula
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtMatricula_Create($strControlId = null) {
            $this->txtMatricula = new QTextBox($this->objParentObject, $strControlId);
            $this->txtMatricula->Name = QApplication::Translate('Matricula');
            $this->txtMatricula->Text = $this->objFolio->Matricula;
            $this->txtMatricula->Required = true;
            $this->txtMatricula->MaxLength = Folio::MatriculaMaxLength;
            
            return $this->txtMatricula;
        }

        /**
         * Create and setup QLabel lblMatricula
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMatricula_Create($strControlId = null) {
            $this->lblMatricula = new QLabel($this->objParentObject, $strControlId);
            $this->lblMatricula->Name = QApplication::Translate('Matricula');
            $this->lblMatricula->Text = $this->objFolio->Matricula;
            $this->lblMatricula->Required = true;
            return $this->lblMatricula;
        }

        /**
         * Create and setup QDateTimePicker calFecha
         * @param string $strControlId optional ControlId to use
         * @return QDateTimePicker
         */
        public function calFecha_Create($strControlId = null) {
            $this->calFecha = new QDateTimePicker($this->objParentObject, $strControlId);
            $this->calFecha->Name = QApplication::Translate('Fecha');
            $this->calFecha->DateTime = $this->objFolio->Fecha;
            $this->calFecha->DateTimePickerType = QDateTimePickerType::Date;
            $this->calFecha->Required = true;
            
            return $this->calFecha;
        }

        /**
         * Create and setup QLabel lblFecha
         * @param string $strControlId optional ControlId to use
         * @param string $strDateTimeFormat optional DateTimeFormat to use
         * @return QLabel
         */
        public function lblFecha_Create($strControlId = null, $strDateTimeFormat = null) {
            $this->lblFecha = new QLabel($this->objParentObject, $strControlId);
            $this->lblFecha->Name = QApplication::Translate('Fecha');
            $this->strFechaDateTimeFormat = $strDateTimeFormat;
            $this->lblFecha->Text = sprintf($this->objFolio->Fecha) ? $this->objFolio->Fecha->__toString($this->strFechaDateTimeFormat) : null;
            $this->lblFecha->Required = true;
            return $this->lblFecha;
        }

        protected $strFechaDateTimeFormat;


        /**
         * Create and setup QTextBox txtNombreBarrioOficial
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombreBarrioOficial_Create($strControlId = null) {
            $this->txtNombreBarrioOficial = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombreBarrioOficial->Name = QApplication::Translate('NombreBarrioOficial');
            $this->txtNombreBarrioOficial->Text = $this->objFolio->NombreBarrioOficial;
            $this->txtNombreBarrioOficial->Required = true;
            $this->txtNombreBarrioOficial->MaxLength = Folio::NombreBarrioOficialMaxLength;
            
            return $this->txtNombreBarrioOficial;
        }

        /**
         * Create and setup QLabel lblNombreBarrioOficial
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombreBarrioOficial_Create($strControlId = null) {
            $this->lblNombreBarrioOficial = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombreBarrioOficial->Name = QApplication::Translate('NombreBarrioOficial');
            $this->lblNombreBarrioOficial->Text = $this->objFolio->NombreBarrioOficial;
            $this->lblNombreBarrioOficial->Required = true;
            return $this->lblNombreBarrioOficial;
        }

        /**
         * Create and setup QTextBox txtNombreBarrioAlternativo1
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombreBarrioAlternativo1_Create($strControlId = null) {
            $this->txtNombreBarrioAlternativo1 = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombreBarrioAlternativo1->Name = QApplication::Translate('NombreBarrioAlternativo1');
            $this->txtNombreBarrioAlternativo1->Text = $this->objFolio->NombreBarrioAlternativo1;
            $this->txtNombreBarrioAlternativo1->MaxLength = Folio::NombreBarrioAlternativo1MaxLength;
            
            return $this->txtNombreBarrioAlternativo1;
        }

        /**
         * Create and setup QLabel lblNombreBarrioAlternativo1
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombreBarrioAlternativo1_Create($strControlId = null) {
            $this->lblNombreBarrioAlternativo1 = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombreBarrioAlternativo1->Name = QApplication::Translate('NombreBarrioAlternativo1');
            $this->lblNombreBarrioAlternativo1->Text = $this->objFolio->NombreBarrioAlternativo1;
            return $this->lblNombreBarrioAlternativo1;
        }

        /**
         * Create and setup QTextBox txtNombreBarrioAlternativo2
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtNombreBarrioAlternativo2_Create($strControlId = null) {
            $this->txtNombreBarrioAlternativo2 = new QTextBox($this->objParentObject, $strControlId);
            $this->txtNombreBarrioAlternativo2->Name = QApplication::Translate('NombreBarrioAlternativo2');
            $this->txtNombreBarrioAlternativo2->Text = $this->objFolio->NombreBarrioAlternativo2;
            $this->txtNombreBarrioAlternativo2->MaxLength = Folio::NombreBarrioAlternativo2MaxLength;
            
            return $this->txtNombreBarrioAlternativo2;
        }

        /**
         * Create and setup QLabel lblNombreBarrioAlternativo2
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblNombreBarrioAlternativo2_Create($strControlId = null) {
            $this->lblNombreBarrioAlternativo2 = new QLabel($this->objParentObject, $strControlId);
            $this->lblNombreBarrioAlternativo2->Name = QApplication::Translate('NombreBarrioAlternativo2');
            $this->lblNombreBarrioAlternativo2->Text = $this->objFolio->NombreBarrioAlternativo2;
            return $this->lblNombreBarrioAlternativo2;
        }

        /**
         * Create and setup QTextBox txtAnioOrigen
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtAnioOrigen_Create($strControlId = null) {
            $this->txtAnioOrigen = new QTextBox($this->objParentObject, $strControlId);
            $this->txtAnioOrigen->Name = QApplication::Translate('AnioOrigen');
            $this->txtAnioOrigen->Text = $this->objFolio->AnioOrigen;
            $this->txtAnioOrigen->Required = true;
            $this->txtAnioOrigen->MaxLength = Folio::AnioOrigenMaxLength;
            
            return $this->txtAnioOrigen;
        }

        /**
         * Create and setup QLabel lblAnioOrigen
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblAnioOrigen_Create($strControlId = null) {
            $this->lblAnioOrigen = new QLabel($this->objParentObject, $strControlId);
            $this->lblAnioOrigen->Name = QApplication::Translate('AnioOrigen');
            $this->lblAnioOrigen->Text = $this->objFolio->AnioOrigen;
            $this->lblAnioOrigen->Required = true;
            return $this->lblAnioOrigen;
        }

        /**
         * Create and setup QIntegerTextBox txtCantidadFamilias
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtCantidadFamilias_Create($strControlId = null) {
            $this->txtCantidadFamilias = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtCantidadFamilias->Name = QApplication::Translate('CantidadFamilias');
            $this->txtCantidadFamilias->Text = $this->objFolio->CantidadFamilias;
                        $this->txtCantidadFamilias->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtCantidadFamilias->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtCantidadFamilias;
        }

        /**
         * Create and setup QLabel lblCantidadFamilias
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblCantidadFamilias_Create($strControlId = null, $strFormat = null) {
            $this->lblCantidadFamilias = new QLabel($this->objParentObject, $strControlId);
            $this->lblCantidadFamilias->Name = QApplication::Translate('CantidadFamilias');
            $this->lblCantidadFamilias->Text = $this->objFolio->CantidadFamilias;
            $this->lblCantidadFamilias->Format = $strFormat;
            return $this->lblCantidadFamilias;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstTipoBarrioObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstTipoBarrioObject_Create($strControlId = null) {
            $this->lstTipoBarrioObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'TipoBarrio', 'Id' , $strControlId);
            if($this->objFolio->TipoBarrioObject){
                $this->lstTipoBarrioObject->Text = $this->objFolio->TipoBarrioObject->__toString();
                $this->lstTipoBarrioObject->Value = $this->objFolio->TipoBarrioObject->Id;
            }
            $this->lstTipoBarrioObject->Name = QApplication::Translate('TipoBarrioObject');
            $this->lstTipoBarrioObject->Required = true;
            return $this->lstTipoBarrioObject;
        }

        /**
         * Create and setup QLabel lblTipoBarrio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTipoBarrio_Create($strControlId = null) {
            $this->lblTipoBarrio = new QLabel($this->objParentObject, $strControlId);
            $this->lblTipoBarrio->Name = QApplication::Translate('TipoBarrioObject');
            $this->lblTipoBarrio->Text = ($this->objFolio->TipoBarrioObject) ? $this->objFolio->TipoBarrioObject->__toString() : null;
            $this->lblTipoBarrio->Required = true;
            return $this->lblTipoBarrio;
        }

        /**
         * Create and setup QTextBox txtObservacionCasoDudoso
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtObservacionCasoDudoso_Create($strControlId = null) {
            $this->txtObservacionCasoDudoso = new QTextBox($this->objParentObject, $strControlId);
            $this->txtObservacionCasoDudoso->Name = QApplication::Translate('ObservacionCasoDudoso');
            $this->txtObservacionCasoDudoso->Text = $this->objFolio->ObservacionCasoDudoso;
            $this->txtObservacionCasoDudoso->MaxLength = Folio::ObservacionCasoDudosoMaxLength;
            
            return $this->txtObservacionCasoDudoso;
        }

        /**
         * Create and setup QLabel lblObservacionCasoDudoso
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblObservacionCasoDudoso_Create($strControlId = null) {
            $this->lblObservacionCasoDudoso = new QLabel($this->objParentObject, $strControlId);
            $this->lblObservacionCasoDudoso->Name = QApplication::Translate('ObservacionCasoDudoso');
            $this->lblObservacionCasoDudoso->Text = $this->objFolio->ObservacionCasoDudoso;
            return $this->lblObservacionCasoDudoso;
        }

        /**
         * Create and setup QTextBox txtDireccion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtDireccion_Create($strControlId = null) {
            $this->txtDireccion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtDireccion->Name = QApplication::Translate('Direccion');
            $this->txtDireccion->Text = $this->objFolio->Direccion;
            $this->txtDireccion->MaxLength = Folio::DireccionMaxLength;
            
            return $this->txtDireccion;
        }

        /**
         * Create and setup QLabel lblDireccion
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblDireccion_Create($strControlId = null) {
            $this->lblDireccion = new QLabel($this->objParentObject, $strControlId);
            $this->lblDireccion->Name = QApplication::Translate('Direccion');
            $this->lblDireccion->Text = $this->objFolio->Direccion;
            return $this->lblDireccion;
        }

        /**
         * Create and setup QTextBox txtGeom
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtGeom_Create($strControlId = null) {
            $this->txtGeom = new QTextBox($this->objParentObject, $strControlId);
            $this->txtGeom->Name = QApplication::Translate('Geom');
            $this->txtGeom->Text = $this->objFolio->Geom;
            $this->txtGeom->Required = true;
            $this->txtGeom->TextMode = QTextMode::MultiLine;
            
            return $this->txtGeom;
        }

        /**
         * Create and setup QLabel lblGeom
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblGeom_Create($strControlId = null) {
            $this->lblGeom = new QLabel($this->objParentObject, $strControlId);
            $this->lblGeom->Name = QApplication::Translate('Geom');
            $this->lblGeom->Text = $this->objFolio->Geom;
            $this->lblGeom->Required = true;
            return $this->lblGeom;
        }

        /**
         * Create and setup QTextBox txtJudicializado
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtJudicializado_Create($strControlId = null) {
            $this->txtJudicializado = new QTextBox($this->objParentObject, $strControlId);
            $this->txtJudicializado->Name = QApplication::Translate('Judicializado');
            $this->txtJudicializado->Text = $this->objFolio->Judicializado;
            
            return $this->txtJudicializado;
        }

        /**
         * Create and setup QLabel lblJudicializado
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblJudicializado_Create($strControlId = null) {
            $this->lblJudicializado = new QLabel($this->objParentObject, $strControlId);
            $this->lblJudicializado->Name = QApplication::Translate('Judicializado');
            $this->lblJudicializado->Text = $this->objFolio->Judicializado;
            return $this->lblJudicializado;
        }

        /**
         * Create and setup QTextBox txtLocalidad
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtLocalidad_Create($strControlId = null) {
            $this->txtLocalidad = new QTextBox($this->objParentObject, $strControlId);
            $this->txtLocalidad->Name = QApplication::Translate('Localidad');
            $this->txtLocalidad->Text = $this->objFolio->Localidad;
            
            return $this->txtLocalidad;
        }

        /**
         * Create and setup QLabel lblLocalidad
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblLocalidad_Create($strControlId = null) {
            $this->lblLocalidad = new QLabel($this->objParentObject, $strControlId);
            $this->lblLocalidad->Name = QApplication::Translate('Localidad');
            $this->lblLocalidad->Text = $this->objFolio->Localidad;
            return $this->lblLocalidad;
        }

        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstCreadorObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstCreadorObject_Create($strControlId = null) {
            $this->lstCreadorObject = new QAjaxAutoCompleteEntidadTextBox($this->objParentObject, 'Usuario', 'IdUsuario' , $strControlId);
            if($this->objFolio->CreadorObject){
                $this->lstCreadorObject->Text = $this->objFolio->CreadorObject->__toString();
                $this->lstCreadorObject->Value = $this->objFolio->CreadorObject->IdUsuario;
            }
            $this->lstCreadorObject->Name = QApplication::Translate('CreadorObject');
            return $this->lstCreadorObject;
        }

        /**
         * Create and setup QLabel lblCreador
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCreador_Create($strControlId = null) {
            $this->lblCreador = new QLabel($this->objParentObject, $strControlId);
            $this->lblCreador->Name = QApplication::Translate('CreadorObject');
            $this->lblCreador->Text = ($this->objFolio->CreadorObject) ? $this->objFolio->CreadorObject->__toString() : null;
            return $this->lblCreador;
        }

        /**
         * Create and setup QFloatTextBox txtSuperficie
         * @param string $strControlId optional ControlId to use
         * @return QFloatTextBox
         */
        public function txtSuperficie_Create($strControlId = null) {
            $this->txtSuperficie = new QFloatTextBox($this->objParentObject, $strControlId);
            $this->txtSuperficie->Name = QApplication::Translate('Superficie');
            $this->txtSuperficie->Text = $this->objFolio->Superficie;
            return $this->txtSuperficie;
        }

        /**
         * Create and setup QLabel lblSuperficie
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblSuperficie_Create($strControlId = null, $strFormat = null) {
            $this->lblSuperficie = new QLabel($this->objParentObject, $strControlId);
            $this->lblSuperficie->Name = QApplication::Translate('Superficie');
            $this->lblSuperficie->Text = $this->objFolio->Superficie;
            $this->lblSuperficie->Format = $strFormat;
            return $this->lblSuperficie;
        }

        /**
         * Create and setup QTextBox txtEncargado
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtEncargado_Create($strControlId = null) {
            $this->txtEncargado = new QTextBox($this->objParentObject, $strControlId);
            $this->txtEncargado->Name = QApplication::Translate('Encargado');
            $this->txtEncargado->Text = $this->objFolio->Encargado;
            
            return $this->txtEncargado;
        }

        /**
         * Create and setup QLabel lblEncargado
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblEncargado_Create($strControlId = null) {
            $this->lblEncargado = new QLabel($this->objParentObject, $strControlId);
            $this->lblEncargado->Name = QApplication::Translate('Encargado');
            $this->lblEncargado->Text = $this->objFolio->Encargado;
            return $this->lblEncargado;
        }

        /**
         * Create and setup QTextBox txtReparticion
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtReparticion_Create($strControlId = null) {
            $this->txtReparticion = new QTextBox($this->objParentObject, $strControlId);
            $this->txtReparticion->Name = QApplication::Translate('Reparticion');
            $this->txtReparticion->Text = $this->objFolio->Reparticion;
            
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
            $this->lblReparticion->Text = $this->objFolio->Reparticion;
            return $this->lblReparticion;
        }

        /**
         * Create and setup QIntegerTextBox txtFolioOriginal
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtFolioOriginal_Create($strControlId = null) {
            $this->txtFolioOriginal = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtFolioOriginal->Name = QApplication::Translate('FolioOriginal');
            $this->txtFolioOriginal->Text = $this->objFolio->FolioOriginal;
                        $this->txtFolioOriginal->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtFolioOriginal->Minimum = QDatabaseNumberFieldMin::Integer;
            return $this->txtFolioOriginal;
        }

        /**
         * Create and setup QLabel lblFolioOriginal
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblFolioOriginal_Create($strControlId = null, $strFormat = null) {
            $this->lblFolioOriginal = new QLabel($this->objParentObject, $strControlId);
            $this->lblFolioOriginal->Name = QApplication::Translate('FolioOriginal');
            $this->lblFolioOriginal->Text = $this->objFolio->FolioOriginal;
            $this->lblFolioOriginal->Format = $strFormat;
            return $this->lblFolioOriginal;
        }

        /**
         * Create and setup QListBox lstCondicionesSocioUrbanisticasAsId ES ACA?
         * @param string $strControlId optional ControlId to use
         * @return QListBox
         */
        public function lstCondicionesSocioUrbanisticasAsId_Create($strControlId = null) {
            $this->lstCondicionesSocioUrbanisticasAsId = new QListBox($this->objParentObject, $strControlId);
            $this->lstCondicionesSocioUrbanisticasAsId->Name = QApplication::Translate('CondicionesSocioUrbanisticasAsId');
                $this->lstCondicionesSocioUrbanisticasAsId->AddItem(QApplication::Translate('- Select One -'), null);
                $objCondicionesSocioUrbanisticasArray = CondicionesSocioUrbanisticas::LoadAll();
                if ($objCondicionesSocioUrbanisticasArray) foreach ($objCondicionesSocioUrbanisticasArray as $objCondicionesSocioUrbanisticas) {
                    $objListItem = new QListItem($objCondicionesSocioUrbanisticas->__toString(), $objCondicionesSocioUrbanisticas->Id);
                    if ($objCondicionesSocioUrbanisticas->IdFolio == $this->objFolio->Id)
                        $objListItem->Selected = true;
                    $this->lstCondicionesSocioUrbanisticasAsId->AddItem($objListItem);
                }
                // Because CondicionesSocioUrbanisticas's CondicionesSocioUrbanisticasAsId is not null, if a value is already selected, it cannot be changed.
                if ($this->lstCondicionesSocioUrbanisticasAsId->SelectedValue)
                    $this->lstCondicionesSocioUrbanisticasAsId->Enabled = false;
            return $this->lstCondicionesSocioUrbanisticasAsId;
        }

        /**
         * Create and setup QLabel lblCondicionesSocioUrbanisticasAsId
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCondicionesSocioUrbanisticasAsId_Create($strControlId = null) {
            $this->lblCondicionesSocioUrbanisticasAsId = new QLabel($this->objParentObject, $strControlId);
            $this->lblCondicionesSocioUrbanisticasAsId->Name = QApplication::Translate('CondicionesSocioUrbanisticasAsId');
            $this->lblCondicionesSocioUrbanisticasAsId->Text = ($this->objFolio->CondicionesSocioUrbanisticasAsId) ? $this->objFolio->CondicionesSocioUrbanisticasAsId->__toString() : null;
            return $this->lblCondicionesSocioUrbanisticasAsId;
        }

        /**
         * Create and setup QListBox lstRegularizacionAsId ES ACA?
         * @param string $strControlId optional ControlId to use
         * @return QListBox
         */
        public function lstRegularizacionAsId_Create($strControlId = null) {
            $this->lstRegularizacionAsId = new QListBox($this->objParentObject, $strControlId);
            $this->lstRegularizacionAsId->Name = QApplication::Translate('RegularizacionAsId');
                $this->lstRegularizacionAsId->AddItem(QApplication::Translate('- Select One -'), null);
                $objRegularizacionArray = Regularizacion::LoadAll();
                if ($objRegularizacionArray) foreach ($objRegularizacionArray as $objRegularizacion) {
                    $objListItem = new QListItem($objRegularizacion->__toString(), $objRegularizacion->Id);
                    if ($objRegularizacion->IdFolio == $this->objFolio->Id)
                        $objListItem->Selected = true;
                    $this->lstRegularizacionAsId->AddItem($objListItem);
                }
            return $this->lstRegularizacionAsId;
        }

        /**
         * Create and setup QLabel lblRegularizacionAsId
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblRegularizacionAsId_Create($strControlId = null) {
            $this->lblRegularizacionAsId = new QLabel($this->objParentObject, $strControlId);
            $this->lblRegularizacionAsId->Name = QApplication::Translate('RegularizacionAsId');
            $this->lblRegularizacionAsId->Text = ($this->objFolio->RegularizacionAsId) ? $this->objFolio->RegularizacionAsId->__toString() : null;
            return $this->lblRegularizacionAsId;
        }

        /**
         * Create and setup QListBox lstUsoInterno ES ACA?
         * @param string $strControlId optional ControlId to use
         * @return QListBox
         */
        public function lstUsoInterno_Create($strControlId = null) {
            $this->lstUsoInterno = new QListBox($this->objParentObject, $strControlId);
            $this->lstUsoInterno->Name = QApplication::Translate('UsoInterno');
                $this->lstUsoInterno->AddItem(QApplication::Translate('- Select One -'), null);
                $objUsoInternoArray = UsoInterno::LoadAll();
                if ($objUsoInternoArray) foreach ($objUsoInternoArray as $objUsoInterno) {
                    $objListItem = new QListItem($objUsoInterno->__toString(), $objUsoInterno->IdFolio);
                    if ($objUsoInterno->IdFolio == $this->objFolio->Id)
                        $objListItem->Selected = true;
                    $this->lstUsoInterno->AddItem($objListItem);
                }
                // Because UsoInterno's UsoInterno is not null, if a value is already selected, it cannot be changed.
                if ($this->lstUsoInterno->SelectedValue)
                    $this->lstUsoInterno->Enabled = false;
            return $this->lstUsoInterno;
        }

        /**
         * Create and setup QLabel lblUsoInterno
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblUsoInterno_Create($strControlId = null) {
            $this->lblUsoInterno = new QLabel($this->objParentObject, $strControlId);
            $this->lblUsoInterno->Name = QApplication::Translate('UsoInterno');
            $this->lblUsoInterno->Text = ($this->objFolio->UsoInterno) ? $this->objFolio->UsoInterno->__toString() : null;
            return $this->lblUsoInterno;
        }



    public $lstEvolucionFolioAsId;
    /**
     * Gets all associated EvolucionFoliosAsId as an array of EvolucionFolio objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return EvolucionFolio[]
    */ 
    public function lstEvolucionFolioAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'EvolucionFolio';
        $strConfigArray['strRefreshMethod'] = 'EvolucionFolioAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddEvolucionFolioAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveEvolucionFolioAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['Contenido'] = QApplication::Translate('Contenido');
        $strConfigArray['Columns']['Fecha'] = QApplication::Translate('Fecha');
        $strConfigArray['Columns']['Estado'] = QApplication::Translate('Estado');

        $this->lstEvolucionFolioAsId = new QListPanel($this->objParentObject, $this->objFolio, $strConfigArray, $strControlId);
        $this->lstEvolucionFolioAsId->Name = EvolucionFolio::Noun();
        $this->lstEvolucionFolioAsId->SetNewMethod($this, "lstEvolucionFolioAsId_New");
        $this->lstEvolucionFolioAsId->SetEditMethod($this, "lstEvolucionFolioAsId_Edit");
        return $this->lstEvolucionFolioAsId;
    }

    public function lstEvolucionFolioAsId_New() {
        EvolucionFolioModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(EvolucionFolioModalPanel::$strControlsArray, true);
        $this->lstEvolucionFolioAsId->ModalPanel = new EvolucionFolioModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstEvolucionFolioAsId->ModalPanel->objCallerControl = $this->lstEvolucionFolioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstEvolucionFolioAsId_Edit($intKey) {
        EvolucionFolioModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(EvolucionFolioModalPanel::$strControlsArray, true);
        $obj = $this->objFolio->EvolucionFolioAsIdArray[$intKey];
        $this->lstEvolucionFolioAsId->ModalPanel = new EvolucionFolioModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstEvolucionFolioAsId->ModalPanel->objCallerControl = $this->lstEvolucionFolioAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }


    public $lstNomenclaturaAsId;
    /**
     * Gets all associated NomenclaturasAsId as an array of Nomenclatura objects
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return Nomenclatura[]
    */ 
    public function lstNomenclaturaAsId_Create($strControlId = null) {

        $strConfigArray = array();
        $strConfigArray['strEntity'] = 'Nomenclatura';
        $strConfigArray['strRefreshMethod'] = 'NomenclaturaAsIdArray';
        $strConfigArray['strParentPrimaryKeyProperty'] = 'IdFolio';
        $strConfigArray['strPrimaryKeyProperty'] = 'Id';
        $strConfigArray['strAddMethod'] = 'AddNomenclaturaAsId';
        $strConfigArray['strRemoveMethod'] = 'RemoveNomenclaturaAsId';
        $strConfigArray['Columns'] = array();
        $strConfigArray['Columns']['PartidaInmobiliaria'] = QApplication::Translate('PartidaInmobiliaria');
        $strConfigArray['Columns']['TitularDominio'] = QApplication::Translate('TitularDominio');
        $strConfigArray['Columns']['Circ'] = QApplication::Translate('Circ');
        $strConfigArray['Columns']['Secc'] = QApplication::Translate('Secc');
        $strConfigArray['Columns']['ChacQuinta'] = QApplication::Translate('ChacQuinta');
        $strConfigArray['Columns']['Frac'] = QApplication::Translate('Frac');
        $strConfigArray['Columns']['Mza'] = QApplication::Translate('Mza');
        $strConfigArray['Columns']['Parc'] = QApplication::Translate('Parc');
        $strConfigArray['Columns']['InscripcionDominio'] = QApplication::Translate('InscripcionDominio');
        $strConfigArray['Columns']['Partido'] = QApplication::Translate('Partido');
        $strConfigArray['Columns']['DatoVerificadoRegPropiedad'] = QApplication::Translate('DatoVerificadoRegPropiedad');
        $strConfigArray['Columns']['EstadoGeografico'] = QApplication::Translate('EstadoGeografico');

        $this->lstNomenclaturaAsId = new QListPanel($this->objParentObject, $this->objFolio, $strConfigArray, $strControlId);
        $this->lstNomenclaturaAsId->Name = Nomenclatura::Noun();
        $this->lstNomenclaturaAsId->SetNewMethod($this, "lstNomenclaturaAsId_New");
        $this->lstNomenclaturaAsId->SetEditMethod($this, "lstNomenclaturaAsId_Edit");
        return $this->lstNomenclaturaAsId;
    }

    public function lstNomenclaturaAsId_New() {
        NomenclaturaModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(NomenclaturaModalPanel::$strControlsArray, true);
        $this->lstNomenclaturaAsId->ModalPanel = new NomenclaturaModalPanel($this->objParentObject->Modal,$strControlsArray);
        $this->lstNomenclaturaAsId->ModalPanel->objCallerControl = $this->lstNomenclaturaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }

    public function lstNomenclaturaAsId_Edit($intKey) {
        NomenclaturaModalPanel::$strControlsArray['lstIdFolioObject'] = false;
        $strControlsArray = array_keys(NomenclaturaModalPanel::$strControlsArray, true);
        $obj = $this->objFolio->NomenclaturaAsIdArray[$intKey];
        $this->lstNomenclaturaAsId->ModalPanel = new NomenclaturaModalPanel($this->objParentObject->Modal,$strControlsArray, $obj);
        $this->lstNomenclaturaAsId->ModalPanel->objCallerControl = $this->lstNomenclaturaAsId;
        $this->objParentObject->Modal->ShowDialogBox();
    }




        /**
         * Refresh this MetaControl with Data from the local Folio object.
         * @param boolean $blnReload reload Folio from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objFolio->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objFolio->Id;

            if ($this->txtCodFolio) $this->txtCodFolio->Text = $this->objFolio->CodFolio;
            if ($this->lblCodFolio) $this->lblCodFolio->Text = $this->objFolio->CodFolio;

            if ($this->lstIdPartidoObject) {
                if($this->objFolio->IdPartidoObject){
                    $this->lstIdPartidoObject->Text = $this->objFolio->IdPartidoObject->__toString();
                    $this->lstIdPartidoObject->Value = $this->objFolio->IdPartido->Id;
                }                
            }
            if ($this->lblIdPartido) $this->lblIdPartido->Text = ($this->objFolio->IdPartidoObject) ? $this->objFolio->IdPartidoObject->__toString() : null;

            if ($this->txtMatricula) $this->txtMatricula->Text = $this->objFolio->Matricula;
            if ($this->lblMatricula) $this->lblMatricula->Text = $this->objFolio->Matricula;

            if ($this->calFecha) $this->calFecha->DateTime = $this->objFolio->Fecha;
            if ($this->lblFecha) $this->lblFecha->Text = sprintf($this->objFolio->Fecha) ? $this->objFolio->Fecha->__toString($this->strFechaDateTimeFormat) : null;

            if ($this->txtNombreBarrioOficial) $this->txtNombreBarrioOficial->Text = $this->objFolio->NombreBarrioOficial;
            if ($this->lblNombreBarrioOficial) $this->lblNombreBarrioOficial->Text = $this->objFolio->NombreBarrioOficial;

            if ($this->txtNombreBarrioAlternativo1) $this->txtNombreBarrioAlternativo1->Text = $this->objFolio->NombreBarrioAlternativo1;
            if ($this->lblNombreBarrioAlternativo1) $this->lblNombreBarrioAlternativo1->Text = $this->objFolio->NombreBarrioAlternativo1;

            if ($this->txtNombreBarrioAlternativo2) $this->txtNombreBarrioAlternativo2->Text = $this->objFolio->NombreBarrioAlternativo2;
            if ($this->lblNombreBarrioAlternativo2) $this->lblNombreBarrioAlternativo2->Text = $this->objFolio->NombreBarrioAlternativo2;

            if ($this->txtAnioOrigen) $this->txtAnioOrigen->Text = $this->objFolio->AnioOrigen;
            if ($this->lblAnioOrigen) $this->lblAnioOrigen->Text = $this->objFolio->AnioOrigen;

            if ($this->txtCantidadFamilias) $this->txtCantidadFamilias->Text = $this->objFolio->CantidadFamilias;
            if ($this->lblCantidadFamilias) $this->lblCantidadFamilias->Text = $this->objFolio->CantidadFamilias;

            if ($this->lstTipoBarrioObject) {
                if($this->objFolio->TipoBarrioObject){
                    $this->lstTipoBarrioObject->Text = $this->objFolio->TipoBarrioObject->__toString();
                    $this->lstTipoBarrioObject->Value = $this->objFolio->TipoBarrio->Id;
                }                
            }
            if ($this->lblTipoBarrio) $this->lblTipoBarrio->Text = ($this->objFolio->TipoBarrioObject) ? $this->objFolio->TipoBarrioObject->__toString() : null;

            if ($this->txtObservacionCasoDudoso) $this->txtObservacionCasoDudoso->Text = $this->objFolio->ObservacionCasoDudoso;
            if ($this->lblObservacionCasoDudoso) $this->lblObservacionCasoDudoso->Text = $this->objFolio->ObservacionCasoDudoso;

            if ($this->txtDireccion) $this->txtDireccion->Text = $this->objFolio->Direccion;
            if ($this->lblDireccion) $this->lblDireccion->Text = $this->objFolio->Direccion;

            if ($this->txtGeom) $this->txtGeom->Text = $this->objFolio->Geom;
            if ($this->lblGeom) $this->lblGeom->Text = $this->objFolio->Geom;

            if ($this->txtJudicializado) $this->txtJudicializado->Text = $this->objFolio->Judicializado;
            if ($this->lblJudicializado) $this->lblJudicializado->Text = $this->objFolio->Judicializado;

            if ($this->txtLocalidad) $this->txtLocalidad->Text = $this->objFolio->Localidad;
            if ($this->lblLocalidad) $this->lblLocalidad->Text = $this->objFolio->Localidad;

            if ($this->lstCreadorObject) {
                if($this->objFolio->CreadorObject){
                    $this->lstCreadorObject->Text = $this->objFolio->CreadorObject->__toString();
                    $this->lstCreadorObject->Value = $this->objFolio->Creador->IdUsuario;
                }                
            }
            if ($this->lblCreador) $this->lblCreador->Text = ($this->objFolio->CreadorObject) ? $this->objFolio->CreadorObject->__toString() : null;

            if ($this->txtSuperficie) $this->txtSuperficie->Text = $this->objFolio->Superficie;
            if ($this->lblSuperficie) $this->lblSuperficie->Text = $this->objFolio->Superficie;

            if ($this->txtEncargado) $this->txtEncargado->Text = $this->objFolio->Encargado;
            if ($this->lblEncargado) $this->lblEncargado->Text = $this->objFolio->Encargado;

            if ($this->txtReparticion) $this->txtReparticion->Text = $this->objFolio->Reparticion;
            if ($this->lblReparticion) $this->lblReparticion->Text = $this->objFolio->Reparticion;

            if ($this->txtFolioOriginal) $this->txtFolioOriginal->Text = $this->objFolio->FolioOriginal;
            if ($this->lblFolioOriginal) $this->lblFolioOriginal->Text = $this->objFolio->FolioOriginal;

            if ($this->lstCondicionesSocioUrbanisticasAsId) {
                $this->lstCondicionesSocioUrbanisticasAsId->RemoveAllItems();
                $this->lstCondicionesSocioUrbanisticasAsId->AddItem(QApplication::Translate('- Select One -'), null);
                $objCondicionesSocioUrbanisticasArray = CondicionesSocioUrbanisticas::LoadAll();
                if ($objCondicionesSocioUrbanisticasArray) foreach ($objCondicionesSocioUrbanisticasArray as $objCondicionesSocioUrbanisticas) {
                    $objListItem = new QListItem($objCondicionesSocioUrbanisticas->__toString(), $objCondicionesSocioUrbanisticas->Id);
                    if ($objCondicionesSocioUrbanisticas->IdFolio == $this->objFolio->Id)
                        $objListItem->Selected = true;
                    $this->lstCondicionesSocioUrbanisticasAsId->AddItem($objListItem);
                }
                // Because CondicionesSocioUrbanisticas's CondicionesSocioUrbanisticasAsId is not null, if a value is already selected, it cannot be changed.
                if ($this->lstCondicionesSocioUrbanisticasAsId->SelectedValue)
                    $this->lstCondicionesSocioUrbanisticasAsId->Enabled = false;
                else
                    $this->lstCondicionesSocioUrbanisticasAsId->Enabled = true;
            }
            if ($this->lblCondicionesSocioUrbanisticasAsId) $this->lblCondicionesSocioUrbanisticasAsId->Text = ($this->objFolio->CondicionesSocioUrbanisticasAsId) ? $this->objFolio->CondicionesSocioUrbanisticasAsId->__toString() : null;

            if ($this->lstRegularizacionAsId) {
                $this->lstRegularizacionAsId->RemoveAllItems();
                $this->lstRegularizacionAsId->AddItem(QApplication::Translate('- Select One -'), null);
                $objRegularizacionArray = Regularizacion::LoadAll();
                if ($objRegularizacionArray) foreach ($objRegularizacionArray as $objRegularizacion) {
                    $objListItem = new QListItem($objRegularizacion->__toString(), $objRegularizacion->Id);
                    if ($objRegularizacion->IdFolio == $this->objFolio->Id)
                        $objListItem->Selected = true;
                    $this->lstRegularizacionAsId->AddItem($objListItem);
                }
            }
            if ($this->lblRegularizacionAsId) $this->lblRegularizacionAsId->Text = ($this->objFolio->RegularizacionAsId) ? $this->objFolio->RegularizacionAsId->__toString() : null;

            if ($this->lstUsoInterno) {
                $this->lstUsoInterno->RemoveAllItems();
                $this->lstUsoInterno->AddItem(QApplication::Translate('- Select One -'), null);
                $objUsoInternoArray = UsoInterno::LoadAll();
                if ($objUsoInternoArray) foreach ($objUsoInternoArray as $objUsoInterno) {
                    $objListItem = new QListItem($objUsoInterno->__toString(), $objUsoInterno->IdFolio);
                    if ($objUsoInterno->IdFolio == $this->objFolio->Id)
                        $objListItem->Selected = true;
                    $this->lstUsoInterno->AddItem($objListItem);
                }
                // Because UsoInterno's UsoInterno is not null, if a value is already selected, it cannot be changed.
                if ($this->lstUsoInterno->SelectedValue)
                    $this->lstUsoInterno->Enabled = false;
                else
                    $this->lstUsoInterno->Enabled = true;
            }
            if ($this->lblUsoInterno) $this->lblUsoInterno->Text = ($this->objFolio->UsoInterno) ? $this->objFolio->UsoInterno->__toString() : null;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC FOLIO OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->txtCodFolio) $this->objFolio->CodFolio = $this->txtCodFolio->Text;
                if ($this->lstIdPartidoObject) $this->objFolio->IdPartido = $this->lstIdPartidoObject->SelectedValue;
                if ($this->txtMatricula) $this->objFolio->Matricula = $this->txtMatricula->Text;
                if ($this->calFecha) $this->objFolio->Fecha = $this->calFecha->DateTime;
                if ($this->txtNombreBarrioOficial) $this->objFolio->NombreBarrioOficial = $this->txtNombreBarrioOficial->Text;
                if ($this->txtNombreBarrioAlternativo1) $this->objFolio->NombreBarrioAlternativo1 = $this->txtNombreBarrioAlternativo1->Text;
                if ($this->txtNombreBarrioAlternativo2) $this->objFolio->NombreBarrioAlternativo2 = $this->txtNombreBarrioAlternativo2->Text;
                if ($this->txtAnioOrigen) $this->objFolio->AnioOrigen = $this->txtAnioOrigen->Text;
                if ($this->txtCantidadFamilias) $this->objFolio->CantidadFamilias = $this->txtCantidadFamilias->Text;
                if ($this->lstTipoBarrioObject) $this->objFolio->TipoBarrio = $this->lstTipoBarrioObject->SelectedValue;
                if ($this->txtObservacionCasoDudoso) $this->objFolio->ObservacionCasoDudoso = $this->txtObservacionCasoDudoso->Text;
                if ($this->txtDireccion) $this->objFolio->Direccion = $this->txtDireccion->Text;
                if ($this->txtGeom) $this->objFolio->Geom = $this->txtGeom->Text;
                if ($this->txtJudicializado) $this->objFolio->Judicializado = $this->txtJudicializado->Text;
                if ($this->txtLocalidad) $this->objFolio->Localidad = $this->txtLocalidad->Text;
                if ($this->lstCreadorObject) $this->objFolio->Creador = $this->lstCreadorObject->SelectedValue;
                if ($this->txtSuperficie) $this->objFolio->Superficie = $this->txtSuperficie->Text;
                if ($this->txtEncargado) $this->objFolio->Encargado = $this->txtEncargado->Text;
                if ($this->txtReparticion) $this->objFolio->Reparticion = $this->txtReparticion->Text;
                if ($this->txtFolioOriginal) $this->objFolio->FolioOriginal = $this->txtFolioOriginal->Text;


        }

        public function SaveFolio() {
            return $this->Save();
        }
        /**
         * This will save this object's Folio instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it
                if ($this->lstCondicionesSocioUrbanisticasAsId) $this->objFolio->CondicionesSocioUrbanisticasAsId = CondicionesSocioUrbanisticas::Load($this->lstCondicionesSocioUrbanisticasAsId->SelectedValue);
                if ($this->lstRegularizacionAsId) $this->objFolio->RegularizacionAsId = Regularizacion::Load($this->lstRegularizacionAsId->SelectedValue);
                if ($this->lstUsoInterno) $this->objFolio->UsoInterno = UsoInterno::Load($this->lstUsoInterno->SelectedValue);

                // Save the Folio object
                $idReturn = $this->objFolio->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Folio instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteFolio() {
            $this->objFolio->Delete();
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
                case 'Folio': return $this->objFolio;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Folio fields -- will be created dynamically if not yet created
                case 'IdControl':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'IdLabel':
                    if (!$this->lblId) return $this->lblId_Create();
                    return $this->lblId;
                case 'CodFolioControl':
                    if (!$this->txtCodFolio) return $this->txtCodFolio_Create();
                    return $this->txtCodFolio;
                case 'CodFolioLabel':
                    if (!$this->lblCodFolio) return $this->lblCodFolio_Create();
                    return $this->lblCodFolio;
                case 'IdPartidoControl':
                    if (!$this->lstIdPartidoObject) return $this->lstIdPartidoObject_Create();
                    return $this->lstIdPartidoObject;
                case 'IdPartidoLabel':
                    if (!$this->lblIdPartido) return $this->lblIdPartido_Create();
                    return $this->lblIdPartido;
                case 'MatriculaControl':
                    if (!$this->txtMatricula) return $this->txtMatricula_Create();
                    return $this->txtMatricula;
                case 'MatriculaLabel':
                    if (!$this->lblMatricula) return $this->lblMatricula_Create();
                    return $this->lblMatricula;
                case 'FechaControl':
                    if (!$this->calFecha) return $this->calFecha_Create();
                    return $this->calFecha;
                case 'FechaLabel':
                    if (!$this->lblFecha) return $this->lblFecha_Create();
                    return $this->lblFecha;
                case 'NombreBarrioOficialControl':
                    if (!$this->txtNombreBarrioOficial) return $this->txtNombreBarrioOficial_Create();
                    return $this->txtNombreBarrioOficial;
                case 'NombreBarrioOficialLabel':
                    if (!$this->lblNombreBarrioOficial) return $this->lblNombreBarrioOficial_Create();
                    return $this->lblNombreBarrioOficial;
                case 'NombreBarrioAlternativo1Control':
                    if (!$this->txtNombreBarrioAlternativo1) return $this->txtNombreBarrioAlternativo1_Create();
                    return $this->txtNombreBarrioAlternativo1;
                case 'NombreBarrioAlternativo1Label':
                    if (!$this->lblNombreBarrioAlternativo1) return $this->lblNombreBarrioAlternativo1_Create();
                    return $this->lblNombreBarrioAlternativo1;
                case 'NombreBarrioAlternativo2Control':
                    if (!$this->txtNombreBarrioAlternativo2) return $this->txtNombreBarrioAlternativo2_Create();
                    return $this->txtNombreBarrioAlternativo2;
                case 'NombreBarrioAlternativo2Label':
                    if (!$this->lblNombreBarrioAlternativo2) return $this->lblNombreBarrioAlternativo2_Create();
                    return $this->lblNombreBarrioAlternativo2;
                case 'AnioOrigenControl':
                    if (!$this->txtAnioOrigen) return $this->txtAnioOrigen_Create();
                    return $this->txtAnioOrigen;
                case 'AnioOrigenLabel':
                    if (!$this->lblAnioOrigen) return $this->lblAnioOrigen_Create();
                    return $this->lblAnioOrigen;
                case 'CantidadFamiliasControl':
                    if (!$this->txtCantidadFamilias) return $this->txtCantidadFamilias_Create();
                    return $this->txtCantidadFamilias;
                case 'CantidadFamiliasLabel':
                    if (!$this->lblCantidadFamilias) return $this->lblCantidadFamilias_Create();
                    return $this->lblCantidadFamilias;
                case 'TipoBarrioControl':
                    if (!$this->lstTipoBarrioObject) return $this->lstTipoBarrioObject_Create();
                    return $this->lstTipoBarrioObject;
                case 'TipoBarrioLabel':
                    if (!$this->lblTipoBarrio) return $this->lblTipoBarrio_Create();
                    return $this->lblTipoBarrio;
                case 'ObservacionCasoDudosoControl':
                    if (!$this->txtObservacionCasoDudoso) return $this->txtObservacionCasoDudoso_Create();
                    return $this->txtObservacionCasoDudoso;
                case 'ObservacionCasoDudosoLabel':
                    if (!$this->lblObservacionCasoDudoso) return $this->lblObservacionCasoDudoso_Create();
                    return $this->lblObservacionCasoDudoso;
                case 'DireccionControl':
                    if (!$this->txtDireccion) return $this->txtDireccion_Create();
                    return $this->txtDireccion;
                case 'DireccionLabel':
                    if (!$this->lblDireccion) return $this->lblDireccion_Create();
                    return $this->lblDireccion;
                case 'GeomControl':
                    if (!$this->txtGeom) return $this->txtGeom_Create();
                    return $this->txtGeom;
                case 'GeomLabel':
                    if (!$this->lblGeom) return $this->lblGeom_Create();
                    return $this->lblGeom;
                case 'JudicializadoControl':
                    if (!$this->txtJudicializado) return $this->txtJudicializado_Create();
                    return $this->txtJudicializado;
                case 'JudicializadoLabel':
                    if (!$this->lblJudicializado) return $this->lblJudicializado_Create();
                    return $this->lblJudicializado;
                case 'LocalidadControl':
                    if (!$this->txtLocalidad) return $this->txtLocalidad_Create();
                    return $this->txtLocalidad;
                case 'LocalidadLabel':
                    if (!$this->lblLocalidad) return $this->lblLocalidad_Create();
                    return $this->lblLocalidad;
                case 'CreadorControl':
                    if (!$this->lstCreadorObject) return $this->lstCreadorObject_Create();
                    return $this->lstCreadorObject;
                case 'CreadorLabel':
                    if (!$this->lblCreador) return $this->lblCreador_Create();
                    return $this->lblCreador;
                case 'SuperficieControl':
                    if (!$this->txtSuperficie) return $this->txtSuperficie_Create();
                    return $this->txtSuperficie;
                case 'SuperficieLabel':
                    if (!$this->lblSuperficie) return $this->lblSuperficie_Create();
                    return $this->lblSuperficie;
                case 'EncargadoControl':
                    if (!$this->txtEncargado) return $this->txtEncargado_Create();
                    return $this->txtEncargado;
                case 'EncargadoLabel':
                    if (!$this->lblEncargado) return $this->lblEncargado_Create();
                    return $this->lblEncargado;
                case 'ReparticionControl':
                    if (!$this->txtReparticion) return $this->txtReparticion_Create();
                    return $this->txtReparticion;
                case 'ReparticionLabel':
                    if (!$this->lblReparticion) return $this->lblReparticion_Create();
                    return $this->lblReparticion;
                case 'FolioOriginalControl':
                    if (!$this->txtFolioOriginal) return $this->txtFolioOriginal_Create();
                    return $this->txtFolioOriginal;
                case 'FolioOriginalLabel':
                    if (!$this->lblFolioOriginal) return $this->lblFolioOriginal_Create();
                    return $this->lblFolioOriginal;
                case 'CondicionesSocioUrbanisticasAsIdControl':
                    if (!$this->lstCondicionesSocioUrbanisticasAsId) return $this->lstCondicionesSocioUrbanisticasAsId_Create();
                    return $this->lstCondicionesSocioUrbanisticasAsId;
                case 'CondicionesSocioUrbanisticasAsIdLabel':
                    if (!$this->lblCondicionesSocioUrbanisticasAsId) return $this->lblCondicionesSocioUrbanisticasAsId_Create();
                    return $this->lblCondicionesSocioUrbanisticasAsId;
                case 'RegularizacionAsIdControl':
                    if (!$this->lstRegularizacionAsId) return $this->lstRegularizacionAsId_Create();
                    return $this->lstRegularizacionAsId;
                case 'RegularizacionAsIdLabel':
                    if (!$this->lblRegularizacionAsId) return $this->lblRegularizacionAsId_Create();
                    return $this->lblRegularizacionAsId;
                case 'UsoInternoControl':
                    if (!$this->lstUsoInterno) return $this->lstUsoInterno_Create();
                    return $this->lstUsoInterno;
                case 'UsoInternoLabel':
                    if (!$this->lblUsoInterno) return $this->lblUsoInterno_Create();
                    return $this->lblUsoInterno;
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
                    // Controls that point to Folio fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'CodFolioControl':
                        return ($this->txtCodFolio = QType::Cast($mixValue, 'QControl'));
                    case 'IdPartidoControl':
                        return ($this->lstIdPartidoObject = QType::Cast($mixValue, 'QControl'));
                    case 'MatriculaControl':
                        return ($this->txtMatricula = QType::Cast($mixValue, 'QControl'));
                    case 'FechaControl':
                        return ($this->calFecha = QType::Cast($mixValue, 'QControl'));
                    case 'NombreBarrioOficialControl':
                        return ($this->txtNombreBarrioOficial = QType::Cast($mixValue, 'QControl'));
                    case 'NombreBarrioAlternativo1Control':
                        return ($this->txtNombreBarrioAlternativo1 = QType::Cast($mixValue, 'QControl'));
                    case 'NombreBarrioAlternativo2Control':
                        return ($this->txtNombreBarrioAlternativo2 = QType::Cast($mixValue, 'QControl'));
                    case 'AnioOrigenControl':
                        return ($this->txtAnioOrigen = QType::Cast($mixValue, 'QControl'));
                    case 'CantidadFamiliasControl':
                        return ($this->txtCantidadFamilias = QType::Cast($mixValue, 'QControl'));
                    case 'TipoBarrioControl':
                        return ($this->lstTipoBarrioObject = QType::Cast($mixValue, 'QControl'));
                    case 'ObservacionCasoDudosoControl':
                        return ($this->txtObservacionCasoDudoso = QType::Cast($mixValue, 'QControl'));
                    case 'DireccionControl':
                        return ($this->txtDireccion = QType::Cast($mixValue, 'QControl'));
                    case 'GeomControl':
                        return ($this->txtGeom = QType::Cast($mixValue, 'QControl'));
                    case 'JudicializadoControl':
                        return ($this->txtJudicializado = QType::Cast($mixValue, 'QControl'));
                    case 'LocalidadControl':
                        return ($this->txtLocalidad = QType::Cast($mixValue, 'QControl'));
                    case 'CreadorControl':
                        return ($this->lstCreadorObject = QType::Cast($mixValue, 'QControl'));
                    case 'SuperficieControl':
                        return ($this->txtSuperficie = QType::Cast($mixValue, 'QControl'));
                    case 'EncargadoControl':
                        return ($this->txtEncargado = QType::Cast($mixValue, 'QControl'));
                    case 'ReparticionControl':
                        return ($this->txtReparticion = QType::Cast($mixValue, 'QControl'));
                    case 'FolioOriginalControl':
                        return ($this->txtFolioOriginal = QType::Cast($mixValue, 'QControl'));
                    case 'CondicionesSocioUrbanisticasAsIdControl':
                        return ($this->lstCondicionesSocioUrbanisticasAsId = QType::Cast($mixValue, 'QControl'));
                    case 'RegularizacionAsIdControl':
                        return ($this->lstRegularizacionAsId = QType::Cast($mixValue, 'QControl'));
                    case 'UsoInternoControl':
                        return ($this->lstUsoInterno = QType::Cast($mixValue, 'QControl'));
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
