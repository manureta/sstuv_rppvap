<?php
    /**
     * This is a MetaControl class, providing a QForm or QPanel access to event handlers
     * and QControls to perform the Create, Edit, and Delete functionality
     * of the Nomenclatura class.  This code-generated class
     * contains all the basic elements to help a QPanel or QForm display an HTML form that can
     * manipulate a single Nomenclatura object.
     *
     * To take advantage of some (or all) of these control objects, you
     * must create a new QForm or QPanel which instantiates a NomenclaturaMetaControl
     * class.
     *
     * Any and all changes to this file will be overwritten with any subsequent
     * code re-generation.
     * 
     * @package Relevamiento Anual
     * @subpackage MetaControls
     * property-read Nomenclatura $Nomenclatura the actual Nomenclatura data class being edited
     * property QLabel $IdControl
     * property-read QLabel $IdLabel
     * property QListBox $IdFolioControl
     * property-read QLabel $IdFolioLabel
     * property QTextBox $PartidaInmobiliariaControl
     * property-read QLabel $PartidaInmobiliariaLabel
     * property QTextBox $TitularDominioControl
     * property-read QLabel $TitularDominioLabel
     * property QTextBox $CircControl
     * property-read QLabel $CircLabel
     * property QTextBox $SeccControl
     * property-read QLabel $SeccLabel
     * property QTextBox $ChacQuintaControl
     * property-read QLabel $ChacQuintaLabel
     * property QTextBox $FracControl
     * property-read QLabel $FracLabel
     * property QTextBox $MzaControl
     * property-read QLabel $MzaLabel
     * property QTextBox $ParcControl
     * property-read QLabel $ParcLabel
     * property QTextBox $InscripcionDominioControl
     * property-read QLabel $InscripcionDominioLabel
     * property QIntegerTextBox $DatoVerificadoRegPropiedadControl
     * property-read QLabel $DatoVerificadoRegPropiedadLabel
     * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
     * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
     */

    class NomenclaturaMetaControlGen extends QBaseClass {
        // General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Nomenclatura
                */
        public $objNomenclatura;
        protected $objParentObject;
        protected $strTitleVerb;
        protected $blnEditMode;

        // Controls that allow the editing of Nomenclatura's individual data fields
        protected $lblId;
        protected $lstIdFolioObject;
        protected $txtPartidaInmobiliaria;
        protected $txtTitularDominio;
        protected $txtCirc;
        protected $txtSecc;
        protected $txtChacQuinta;
        protected $txtFrac;
        protected $txtMza;
        protected $txtParc;
        protected $txtInscripcionDominio;
        protected $txtDatoVerificadoRegPropiedad;

        // Controls that allow the viewing of Nomenclatura's individual data fields
        protected $lblIdFolio;
        protected $lblPartidaInmobiliaria;
        protected $lblTitularDominio;
        protected $lblCirc;
        protected $lblSecc;
        protected $lblChacQuinta;
        protected $lblFrac;
        protected $lblMza;
        protected $lblParc;
        protected $lblInscripcionDominio;
        protected $lblDatoVerificadoRegPropiedad;

        // QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

        // QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


        /**
         * Main constructor.  Constructor OR static create methods are designed to be called in either
         * a parent QPanel or the main QForm when wanting to create a
         * NomenclaturaMetaControl to edit a single Nomenclatura object within the
         * QPanel or QForm.
         *
         * This constructor takes in a single Nomenclatura object, while any of the static
         * create methods below can be used to construct based off of individual PK ID(s).
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this NomenclaturaMetaControl
         * @param Nomenclatura $objNomenclatura new or existing Nomenclatura object
         */
         public function __construct($objParentObject, Nomenclatura $objNomenclatura) {
            // Setup Parent Object (e.g. QForm or QPanel which will be using this NomenclaturaMetaControl)
            $this->objParentObject = $objParentObject;

            // Setup linked Nomenclatura object
            $this->objNomenclatura = $objNomenclatura;

            // Figure out if we're Editing or Creating New
            if ($this->objNomenclatura->__Restored) {
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
         * @param mixed $objParentObject QForm or QPanel which will be using this NomenclaturaMetaControl
         * @param integer $intId primary key value
         * @param QMetaControlCreateType $intCreateType rules governing Nomenclatura object creation - defaults to CreateOrEdit
          * @return NomenclaturaMetaControl
         */
        public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            // Attempt to Load from PK Arguments
            if (strlen($intId)) {
                $objNomenclatura = Nomenclatura::Load($intId);

                // Nomenclatura was found -- return it!
                if ($objNomenclatura)
                    return new NomenclaturaMetaControl($objParentObject, $objNomenclatura);

                // If CreateOnRecordNotFound not specified, throw an exception
                else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
                    throw new QCallerException('Could not find a Nomenclatura object with PK arguments: ' . $intId);

            // If EditOnly is specified, throw an exception
            } else if ($intCreateType == QMetaControlCreateType::EditOnly)
                throw new QCallerException('No PK arguments specified');

            // If we are here, then we need to create a new record
            return new NomenclaturaMetaControl($objParentObject, new Nomenclatura());
        }

        /**
         * Static Helper Method to Create using PathInfo arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this NomenclaturaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Nomenclatura object creation - defaults to CreateOrEdit
         * @return NomenclaturaMetaControl
         */
        public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::PathInfo(0);
            return NomenclaturaMetaControl::Create($objParentObject, $intId, $intCreateType);
        }

        /**
         * Static Helper Method to Create using QueryString arguments
         *
         * @param mixed $objParentObject QForm or QPanel which will be using this NomenclaturaMetaControl
         * @param QMetaControlCreateType $intCreateType rules governing Nomenclatura object creation - defaults to CreateOrEdit
         * @return NomenclaturaMetaControl
         */
        public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
            $intId = QApplication::QueryString('id');
            return NomenclaturaMetaControl::Create($objParentObject, $intId, $intCreateType);
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
                $this->lblId->Text = $this->objNomenclatura->Id;
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
            if($this->objNomenclatura->IdFolioObject){
                $this->lstIdFolioObject->Text = $this->objNomenclatura->IdFolioObject->__toString();
                $this->lstIdFolioObject->Value = $this->objNomenclatura->IdFolioObject->Id;
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
            $this->lblIdFolio->Text = ($this->objNomenclatura->IdFolioObject) ? $this->objNomenclatura->IdFolioObject->__toString() : null;
            return $this->lblIdFolio;
        }

        /**
         * Create and setup QTextBox txtPartidaInmobiliaria
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtPartidaInmobiliaria_Create($strControlId = null) {
            $this->txtPartidaInmobiliaria = new QTextBox($this->objParentObject, $strControlId);
            $this->txtPartidaInmobiliaria->Name = QApplication::Translate('PartidaInmobiliaria');
            $this->txtPartidaInmobiliaria->Text = $this->objNomenclatura->PartidaInmobiliaria;
            $this->txtPartidaInmobiliaria->MaxLength = Nomenclatura::PartidaInmobiliariaMaxLength;
            
            return $this->txtPartidaInmobiliaria;
        }

        /**
         * Create and setup QLabel lblPartidaInmobiliaria
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblPartidaInmobiliaria_Create($strControlId = null) {
            $this->lblPartidaInmobiliaria = new QLabel($this->objParentObject, $strControlId);
            $this->lblPartidaInmobiliaria->Name = QApplication::Translate('PartidaInmobiliaria');
            $this->lblPartidaInmobiliaria->Text = $this->objNomenclatura->PartidaInmobiliaria;
            return $this->lblPartidaInmobiliaria;
        }

        /**
         * Create and setup QTextBox txtTitularDominio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtTitularDominio_Create($strControlId = null) {
            $this->txtTitularDominio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtTitularDominio->Name = QApplication::Translate('TitularDominio');
            $this->txtTitularDominio->Text = $this->objNomenclatura->TitularDominio;
            $this->txtTitularDominio->MaxLength = Nomenclatura::TitularDominioMaxLength;
            
            return $this->txtTitularDominio;
        }

        /**
         * Create and setup QLabel lblTitularDominio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblTitularDominio_Create($strControlId = null) {
            $this->lblTitularDominio = new QLabel($this->objParentObject, $strControlId);
            $this->lblTitularDominio->Name = QApplication::Translate('TitularDominio');
            $this->lblTitularDominio->Text = $this->objNomenclatura->TitularDominio;
            return $this->lblTitularDominio;
        }

        /**
         * Create and setup QTextBox txtCirc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtCirc_Create($strControlId = null) {
            $this->txtCirc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtCirc->Name = QApplication::Translate('Circ');
            $this->txtCirc->Text = $this->objNomenclatura->Circ;
            $this->txtCirc->MaxLength = Nomenclatura::CircMaxLength;
            
            return $this->txtCirc;
        }

        /**
         * Create and setup QLabel lblCirc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblCirc_Create($strControlId = null) {
            $this->lblCirc = new QLabel($this->objParentObject, $strControlId);
            $this->lblCirc->Name = QApplication::Translate('Circ');
            $this->lblCirc->Text = $this->objNomenclatura->Circ;
            return $this->lblCirc;
        }

        /**
         * Create and setup QTextBox txtSecc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtSecc_Create($strControlId = null) {
            $this->txtSecc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtSecc->Name = QApplication::Translate('Secc');
            $this->txtSecc->Text = $this->objNomenclatura->Secc;
            $this->txtSecc->MaxLength = Nomenclatura::SeccMaxLength;
            
            return $this->txtSecc;
        }

        /**
         * Create and setup QLabel lblSecc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblSecc_Create($strControlId = null) {
            $this->lblSecc = new QLabel($this->objParentObject, $strControlId);
            $this->lblSecc->Name = QApplication::Translate('Secc');
            $this->lblSecc->Text = $this->objNomenclatura->Secc;
            return $this->lblSecc;
        }

        /**
         * Create and setup QTextBox txtChacQuinta
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtChacQuinta_Create($strControlId = null) {
            $this->txtChacQuinta = new QTextBox($this->objParentObject, $strControlId);
            $this->txtChacQuinta->Name = QApplication::Translate('ChacQuinta');
            $this->txtChacQuinta->Text = $this->objNomenclatura->ChacQuinta;
            $this->txtChacQuinta->MaxLength = Nomenclatura::ChacQuintaMaxLength;
            
            return $this->txtChacQuinta;
        }

        /**
         * Create and setup QLabel lblChacQuinta
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblChacQuinta_Create($strControlId = null) {
            $this->lblChacQuinta = new QLabel($this->objParentObject, $strControlId);
            $this->lblChacQuinta->Name = QApplication::Translate('ChacQuinta');
            $this->lblChacQuinta->Text = $this->objNomenclatura->ChacQuinta;
            return $this->lblChacQuinta;
        }

        /**
         * Create and setup QTextBox txtFrac
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtFrac_Create($strControlId = null) {
            $this->txtFrac = new QTextBox($this->objParentObject, $strControlId);
            $this->txtFrac->Name = QApplication::Translate('Frac');
            $this->txtFrac->Text = $this->objNomenclatura->Frac;
            $this->txtFrac->MaxLength = Nomenclatura::FracMaxLength;
            
            return $this->txtFrac;
        }

        /**
         * Create and setup QLabel lblFrac
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblFrac_Create($strControlId = null) {
            $this->lblFrac = new QLabel($this->objParentObject, $strControlId);
            $this->lblFrac->Name = QApplication::Translate('Frac');
            $this->lblFrac->Text = $this->objNomenclatura->Frac;
            return $this->lblFrac;
        }

        /**
         * Create and setup QTextBox txtMza
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtMza_Create($strControlId = null) {
            $this->txtMza = new QTextBox($this->objParentObject, $strControlId);
            $this->txtMza->Name = QApplication::Translate('Mza');
            $this->txtMza->Text = $this->objNomenclatura->Mza;
            $this->txtMza->MaxLength = Nomenclatura::MzaMaxLength;
            
            return $this->txtMza;
        }

        /**
         * Create and setup QLabel lblMza
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblMza_Create($strControlId = null) {
            $this->lblMza = new QLabel($this->objParentObject, $strControlId);
            $this->lblMza->Name = QApplication::Translate('Mza');
            $this->lblMza->Text = $this->objNomenclatura->Mza;
            return $this->lblMza;
        }

        /**
         * Create and setup QTextBox txtParc
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtParc_Create($strControlId = null) {
            $this->txtParc = new QTextBox($this->objParentObject, $strControlId);
            $this->txtParc->Name = QApplication::Translate('Parc');
            $this->txtParc->Text = $this->objNomenclatura->Parc;
            $this->txtParc->MaxLength = Nomenclatura::ParcMaxLength;
            
            return $this->txtParc;
        }

        /**
         * Create and setup QLabel lblParc
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblParc_Create($strControlId = null) {
            $this->lblParc = new QLabel($this->objParentObject, $strControlId);
            $this->lblParc->Name = QApplication::Translate('Parc');
            $this->lblParc->Text = $this->objNomenclatura->Parc;
            return $this->lblParc;
        }

        /**
         * Create and setup QTextBox txtInscripcionDominio
         * @param string $strControlId optional ControlId to use
         * @return QTextBox
         */
        public function txtInscripcionDominio_Create($strControlId = null) {
            $this->txtInscripcionDominio = new QTextBox($this->objParentObject, $strControlId);
            $this->txtInscripcionDominio->Name = QApplication::Translate('InscripcionDominio');
            $this->txtInscripcionDominio->Text = $this->objNomenclatura->InscripcionDominio;
            $this->txtInscripcionDominio->MaxLength = Nomenclatura::InscripcionDominioMaxLength;
            
            return $this->txtInscripcionDominio;
        }

        /**
         * Create and setup QLabel lblInscripcionDominio
         * @param string $strControlId optional ControlId to use
         * @return QLabel
         */
        public function lblInscripcionDominio_Create($strControlId = null) {
            $this->lblInscripcionDominio = new QLabel($this->objParentObject, $strControlId);
            $this->lblInscripcionDominio->Name = QApplication::Translate('InscripcionDominio');
            $this->lblInscripcionDominio->Text = $this->objNomenclatura->InscripcionDominio;
            return $this->lblInscripcionDominio;
        }

        /**
         * Create and setup QIntegerTextBox txtDatoVerificadoRegPropiedad
         * @param string $strControlId optional ControlId to use
         * @return QIntegerTextBox
         */
        public function txtDatoVerificadoRegPropiedad_Create($strControlId = null) {
            $this->txtDatoVerificadoRegPropiedad = new QIntegerTextBox($this->objParentObject, $strControlId);
            $this->txtDatoVerificadoRegPropiedad->Name = QApplication::Translate('DatoVerificadoRegPropiedad');
            $this->txtDatoVerificadoRegPropiedad->Text = $this->objNomenclatura->DatoVerificadoRegPropiedad;
                        $this->txtDatoVerificadoRegPropiedad->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this->txtDatoVerificadoRegPropiedad->Minimum = QDatabaseNumberFieldMin::Smallint;
            return $this->txtDatoVerificadoRegPropiedad;
        }

        /**
         * Create and setup QLabel lblDatoVerificadoRegPropiedad
         * @param string $strControlId optional ControlId to use
         * @param string $strFormat optional sprintf format to use
         * @return QLabel
         */
        public function lblDatoVerificadoRegPropiedad_Create($strControlId = null, $strFormat = null) {
            $this->lblDatoVerificadoRegPropiedad = new QLabel($this->objParentObject, $strControlId);
            $this->lblDatoVerificadoRegPropiedad->Name = QApplication::Translate('DatoVerificadoRegPropiedad');
            $this->lblDatoVerificadoRegPropiedad->Text = $this->objNomenclatura->DatoVerificadoRegPropiedad;
            $this->lblDatoVerificadoRegPropiedad->Format = $strFormat;
            return $this->lblDatoVerificadoRegPropiedad;
        }





        /**
         * Refresh this MetaControl with Data from the local Nomenclatura object.
         * @param boolean $blnReload reload Nomenclatura from the database
         * @return void
         */
        public function Refresh($blnReload = false) {
            if ($blnReload)
                $this->objNomenclatura->Reload();

            if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objNomenclatura->Id;

            if ($this->lstIdFolioObject) {
                if($this->objNomenclatura->IdFolioObject){
                    $this->lstIdFolioObject->Text = $this->objNomenclatura->IdFolioObject->__toString();
                    $this->lstIdFolioObject->Value = $this->objNomenclatura->IdFolio->Id;
                }                
            }
            if ($this->lblIdFolio) $this->lblIdFolio->Text = ($this->objNomenclatura->IdFolioObject) ? $this->objNomenclatura->IdFolioObject->__toString() : null;

            if ($this->txtPartidaInmobiliaria) $this->txtPartidaInmobiliaria->Text = $this->objNomenclatura->PartidaInmobiliaria;
            if ($this->lblPartidaInmobiliaria) $this->lblPartidaInmobiliaria->Text = $this->objNomenclatura->PartidaInmobiliaria;

            if ($this->txtTitularDominio) $this->txtTitularDominio->Text = $this->objNomenclatura->TitularDominio;
            if ($this->lblTitularDominio) $this->lblTitularDominio->Text = $this->objNomenclatura->TitularDominio;

            if ($this->txtCirc) $this->txtCirc->Text = $this->objNomenclatura->Circ;
            if ($this->lblCirc) $this->lblCirc->Text = $this->objNomenclatura->Circ;

            if ($this->txtSecc) $this->txtSecc->Text = $this->objNomenclatura->Secc;
            if ($this->lblSecc) $this->lblSecc->Text = $this->objNomenclatura->Secc;

            if ($this->txtChacQuinta) $this->txtChacQuinta->Text = $this->objNomenclatura->ChacQuinta;
            if ($this->lblChacQuinta) $this->lblChacQuinta->Text = $this->objNomenclatura->ChacQuinta;

            if ($this->txtFrac) $this->txtFrac->Text = $this->objNomenclatura->Frac;
            if ($this->lblFrac) $this->lblFrac->Text = $this->objNomenclatura->Frac;

            if ($this->txtMza) $this->txtMza->Text = $this->objNomenclatura->Mza;
            if ($this->lblMza) $this->lblMza->Text = $this->objNomenclatura->Mza;

            if ($this->txtParc) $this->txtParc->Text = $this->objNomenclatura->Parc;
            if ($this->lblParc) $this->lblParc->Text = $this->objNomenclatura->Parc;

            if ($this->txtInscripcionDominio) $this->txtInscripcionDominio->Text = $this->objNomenclatura->InscripcionDominio;
            if ($this->lblInscripcionDominio) $this->lblInscripcionDominio->Text = $this->objNomenclatura->InscripcionDominio;

            if ($this->txtDatoVerificadoRegPropiedad) $this->txtDatoVerificadoRegPropiedad->Text = $this->objNomenclatura->DatoVerificadoRegPropiedad;
            if ($this->lblDatoVerificadoRegPropiedad) $this->lblDatoVerificadoRegPropiedad->Text = $this->objNomenclatura->DatoVerificadoRegPropiedad;

        }



        ///////////////////////////////////////////////
        // PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
        ///////////////////////////////////////////////





        ///////////////////////////////////////////////
        // PUBLIC NOMENCLATURA OBJECT MANIPULATORS
        ///////////////////////////////////////////////

        public function Bind(){
                // Update any fields for controls that have been created
                if ($this->lstIdFolioObject) $this->objNomenclatura->IdFolio = $this->lstIdFolioObject->SelectedValue;
                if ($this->txtPartidaInmobiliaria) $this->objNomenclatura->PartidaInmobiliaria = $this->txtPartidaInmobiliaria->Text;
                if ($this->txtTitularDominio) $this->objNomenclatura->TitularDominio = $this->txtTitularDominio->Text;
                if ($this->txtCirc) $this->objNomenclatura->Circ = $this->txtCirc->Text;
                if ($this->txtSecc) $this->objNomenclatura->Secc = $this->txtSecc->Text;
                if ($this->txtChacQuinta) $this->objNomenclatura->ChacQuinta = $this->txtChacQuinta->Text;
                if ($this->txtFrac) $this->objNomenclatura->Frac = $this->txtFrac->Text;
                if ($this->txtMza) $this->objNomenclatura->Mza = $this->txtMza->Text;
                if ($this->txtParc) $this->objNomenclatura->Parc = $this->txtParc->Text;
                if ($this->txtInscripcionDominio) $this->objNomenclatura->InscripcionDominio = $this->txtInscripcionDominio->Text;
                if ($this->txtDatoVerificadoRegPropiedad) $this->objNomenclatura->DatoVerificadoRegPropiedad = $this->txtDatoVerificadoRegPropiedad->Text;


        }

        public function SaveNomenclatura() {
            return $this->Save();
        }
        /**
         * This will save this object's Nomenclatura instance,
         * updating only the fields which have had a control created for it.
         */
        public function Save() {
            try {
                $this->Bind();
                // Update any UniqueReverseReferences (if any) for controls that have been created for it

                // Save the Nomenclatura object
                $idReturn = $this->objNomenclatura->Save();

                // Finally, update any ManyToManyReferences (if any)
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            return $idReturn;
        }

        /**
         * This will DELETE this object's Nomenclatura instance from the database.
         * It will also unassociate itself from any ManyToManyReferences.
         */
        public function DeleteNomenclatura() {
            $this->objNomenclatura->Delete();
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
                case 'Nomenclatura': return $this->objNomenclatura;
                case 'TitleVerb': return $this->strTitleVerb;
                case 'EditMode': return $this->blnEditMode;

                // Controls that point to Nomenclatura fields -- will be created dynamically if not yet created
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
                case 'PartidaInmobiliariaControl':
                    if (!$this->txtPartidaInmobiliaria) return $this->txtPartidaInmobiliaria_Create();
                    return $this->txtPartidaInmobiliaria;
                case 'PartidaInmobiliariaLabel':
                    if (!$this->lblPartidaInmobiliaria) return $this->lblPartidaInmobiliaria_Create();
                    return $this->lblPartidaInmobiliaria;
                case 'TitularDominioControl':
                    if (!$this->txtTitularDominio) return $this->txtTitularDominio_Create();
                    return $this->txtTitularDominio;
                case 'TitularDominioLabel':
                    if (!$this->lblTitularDominio) return $this->lblTitularDominio_Create();
                    return $this->lblTitularDominio;
                case 'CircControl':
                    if (!$this->txtCirc) return $this->txtCirc_Create();
                    return $this->txtCirc;
                case 'CircLabel':
                    if (!$this->lblCirc) return $this->lblCirc_Create();
                    return $this->lblCirc;
                case 'SeccControl':
                    if (!$this->txtSecc) return $this->txtSecc_Create();
                    return $this->txtSecc;
                case 'SeccLabel':
                    if (!$this->lblSecc) return $this->lblSecc_Create();
                    return $this->lblSecc;
                case 'ChacQuintaControl':
                    if (!$this->txtChacQuinta) return $this->txtChacQuinta_Create();
                    return $this->txtChacQuinta;
                case 'ChacQuintaLabel':
                    if (!$this->lblChacQuinta) return $this->lblChacQuinta_Create();
                    return $this->lblChacQuinta;
                case 'FracControl':
                    if (!$this->txtFrac) return $this->txtFrac_Create();
                    return $this->txtFrac;
                case 'FracLabel':
                    if (!$this->lblFrac) return $this->lblFrac_Create();
                    return $this->lblFrac;
                case 'MzaControl':
                    if (!$this->txtMza) return $this->txtMza_Create();
                    return $this->txtMza;
                case 'MzaLabel':
                    if (!$this->lblMza) return $this->lblMza_Create();
                    return $this->lblMza;
                case 'ParcControl':
                    if (!$this->txtParc) return $this->txtParc_Create();
                    return $this->txtParc;
                case 'ParcLabel':
                    if (!$this->lblParc) return $this->lblParc_Create();
                    return $this->lblParc;
                case 'InscripcionDominioControl':
                    if (!$this->txtInscripcionDominio) return $this->txtInscripcionDominio_Create();
                    return $this->txtInscripcionDominio;
                case 'InscripcionDominioLabel':
                    if (!$this->lblInscripcionDominio) return $this->lblInscripcionDominio_Create();
                    return $this->lblInscripcionDominio;
                case 'DatoVerificadoRegPropiedadControl':
                    if (!$this->txtDatoVerificadoRegPropiedad) return $this->txtDatoVerificadoRegPropiedad_Create();
                    return $this->txtDatoVerificadoRegPropiedad;
                case 'DatoVerificadoRegPropiedadLabel':
                    if (!$this->lblDatoVerificadoRegPropiedad) return $this->lblDatoVerificadoRegPropiedad_Create();
                    return $this->lblDatoVerificadoRegPropiedad;
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
                    // Controls that point to Nomenclatura fields
                    case 'IdControl':
                        return ($this->lblId = QType::Cast($mixValue, 'QControl'));
                    case 'IdFolioControl':
                        return ($this->lstIdFolioObject = QType::Cast($mixValue, 'QControl'));
                    case 'PartidaInmobiliariaControl':
                        return ($this->txtPartidaInmobiliaria = QType::Cast($mixValue, 'QControl'));
                    case 'TitularDominioControl':
                        return ($this->txtTitularDominio = QType::Cast($mixValue, 'QControl'));
                    case 'CircControl':
                        return ($this->txtCirc = QType::Cast($mixValue, 'QControl'));
                    case 'SeccControl':
                        return ($this->txtSecc = QType::Cast($mixValue, 'QControl'));
                    case 'ChacQuintaControl':
                        return ($this->txtChacQuinta = QType::Cast($mixValue, 'QControl'));
                    case 'FracControl':
                        return ($this->txtFrac = QType::Cast($mixValue, 'QControl'));
                    case 'MzaControl':
                        return ($this->txtMza = QType::Cast($mixValue, 'QControl'));
                    case 'ParcControl':
                        return ($this->txtParc = QType::Cast($mixValue, 'QControl'));
                    case 'InscripcionDominioControl':
                        return ($this->txtInscripcionDominio = QType::Cast($mixValue, 'QControl'));
                    case 'DatoVerificadoRegPropiedadControl':
                        return ($this->txtDatoVerificadoRegPropiedad = QType::Cast($mixValue, 'QControl'));
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
