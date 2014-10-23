<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Docente class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Docente object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DocenteMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read Docente $Docente the actual Docente data class being edited
	 * property QLabel $IdDocenteControl
	 * property-read QLabel $IdDocenteLabel
	 * property QListBox $IdPerfilControl
	 * property-read QLabel $IdPerfilLabel
	 * property QTextBox $NombreControl
	 * property-read QLabel $NombreLabel
	 * property QTextBox $ApellidoControl
	 * property-read QLabel $ApellidoLabel
	 * property QTextBox $CuitControl
	 * property-read QLabel $CuitLabel
	 * property QCheckBox $ActivoControl
	 * property-read QLabel $ActivoLabel
	 * property QIntegerTextBox $DniControl
	 * property-read QLabel $DniLabel
	 * property QTextBox $SexoControl
	 * property-read QLabel $SexoLabel
	 * property QDateTimePicker $FechaNacimientoControl
	 * property-read QLabel $FechaNacimientoLabel
	 * property QTextBox $ModalidadControl
	 * property-read QLabel $ModalidadLabel
	 * property QTextBox $NivelControl
	 * property-read QLabel $NivelLabel
	 * property QCheckBox $EnActividadControl
	 * property-read QLabel $EnActividadLabel
	 * property QDateTimePicker $FechaInicioLicenciaControl
	 * property-read QLabel $FechaInicioLicenciaLabel
	 * property QDateTimePicker $FechaFinLicenciaControl
	 * property-read QLabel $FechaFinLicenciaLabel
	 * property QTextBox $MotivoLicenciaControl
	 * property-read QLabel $MotivoLicenciaLabel
	 * property QCheckBox $LicenciaGoceHaberesControl
	 * property-read QLabel $LicenciaGoceHaberesLabel
	 * property QListBox $DesignacionControl
	 * property-read QLabel $DesignacionLabel
	 * property QListBox $LocalizacionControl
	 * property-read QLabel $LocalizacionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DocenteMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Docente
                */
		public $objDocente;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Docente's individual data fields
		protected $lblIdDocente;
		protected $lstIdPerfilObject;
		protected $txtNombre;
		protected $txtApellido;
		protected $txtCuit;
		protected $chkActivo;
		protected $txtDni;
		protected $txtSexo;
		protected $calFechaNacimiento;
		protected $txtModalidad;
		protected $txtNivel;
		protected $chkEnActividad;
		protected $calFechaInicioLicencia;
		protected $calFechaFinLicencia;
		protected $txtMotivoLicencia;
		protected $chkLicenciaGoceHaberes;

		// Controls that allow the viewing of Docente's individual data fields
		protected $lblIdPerfil;
		protected $lblNombre;
		protected $lblApellido;
		protected $lblCuit;
		protected $lblActivo;
		protected $lblDni;
		protected $lblSexo;
		protected $lblFechaNacimiento;
		protected $lblModalidad;
		protected $lblNivel;
		protected $lblEnActividad;
		protected $lblFechaInicioLicencia;
		protected $lblFechaFinLicencia;
		protected $lblMotivoLicencia;
		protected $lblLicenciaGoceHaberes;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstDesignaciones;
		protected $lstLocalizaciones;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblDesignaciones;
		protected $lblLocalizaciones;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DocenteMetaControl to edit a single Docente object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Docente object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DocenteMetaControl
		 * @param Docente $objDocente new or existing Docente object
		 */
		 public function __construct($objParentObject, Docente $objDocente) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DocenteMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Docente object
			$this->objDocente = $objDocente;

			// Figure out if we're Editing or Creating New
			if ($this->objDocente->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DocenteMetaControl
		 * @param integer $intIdDocente primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Docente object creation - defaults to CreateOrEdit
 		 * @return DocenteMetaControl
		 */
		public static function Create($objParentObject, $intIdDocente = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdDocente)) {
				$objDocente = Docente::Load($intIdDocente);

				// Docente was found -- return it!
				if ($objDocente)
					return new DocenteMetaControl($objParentObject, $objDocente);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Docente object with PK arguments: ' . $intIdDocente);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DocenteMetaControl($objParentObject, new Docente());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DocenteMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Docente object creation - defaults to CreateOrEdit
		 * @return DocenteMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDocente = QApplication::PathInfo(0);
			return DocenteMetaControl::Create($objParentObject, $intIdDocente, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DocenteMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Docente object creation - defaults to CreateOrEdit
		 * @return DocenteMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDocente = QApplication::QueryString('id');
			return DocenteMetaControl::Create($objParentObject, $intIdDocente, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdDocente
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdDocente_Create($strControlId = null) {
			$this->lblIdDocente = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdDocente->Name = QApplication::Translate('Id Docente');
			if ($this->blnEditMode)
				$this->lblIdDocente->Text = $this->objDocente->IdDocente;
			else
				$this->lblIdDocente->Text = 'N/A';
			return $this->lblIdDocente;
		}

		/**
		 * Create and setup QListBox lstIdPerfilObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdPerfilObject_Create($strControlId = null) {
			$this->lstIdPerfilObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdPerfilObject->Name = QApplication::Translate('Id Perfil Object');
			$this->lstIdPerfilObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdPerfilObjectArray = Perfil::LoadAll();
			if ($objIdPerfilObjectArray) foreach ($objIdPerfilObjectArray as $objIdPerfilObject) {
				$objListItem = new QListItem($objIdPerfilObject->__toString(), $objIdPerfilObject->IdPerfil);
				if (($this->objDocente->IdPerfilObject) && ($this->objDocente->IdPerfilObject->IdPerfil == $objIdPerfilObject->IdPerfil))
					$objListItem->Selected = true;
				$this->lstIdPerfilObject->AddItem($objListItem);
			}
			
			return $this->lstIdPerfilObject;
		}

		/**
		 * Create and setup QLabel lblIdPerfil
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdPerfil_Create($strControlId = null) {
			$this->lblIdPerfil = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdPerfil->Name = QApplication::Translate('Id Perfil Object');
			$this->lblIdPerfil->Text = ($this->objDocente->IdPerfilObject) ? $this->objDocente->IdPerfilObject->__toString() : null;
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
			$this->txtNombre->Text = $this->objDocente->Nombre;
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
			$this->lblNombre->Text = $this->objDocente->Nombre;
			$this->lblNombre->Required = true;
			return $this->lblNombre;
		}

		/**
		 * Create and setup QTextBox txtApellido
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtApellido_Create($strControlId = null) {
			$this->txtApellido = new QTextBox($this->objParentObject, $strControlId);
			$this->txtApellido->Name = QApplication::Translate('Apellido');
			$this->txtApellido->Text = $this->objDocente->Apellido;
			
			return $this->txtApellido;
		}

		/**
		 * Create and setup QLabel lblApellido
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblApellido_Create($strControlId = null) {
			$this->lblApellido = new QLabel($this->objParentObject, $strControlId);
			$this->lblApellido->Name = QApplication::Translate('Apellido');
			$this->lblApellido->Text = $this->objDocente->Apellido;
			return $this->lblApellido;
		}

		/**
		 * Create and setup QTextBox txtCuit
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCuit_Create($strControlId = null) {
			$this->txtCuit = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCuit->Name = QApplication::Translate('Cuit');
			$this->txtCuit->Text = $this->objDocente->Cuit;
			$this->txtCuit->Required = true;
			
			return $this->txtCuit;
		}

		/**
		 * Create and setup QLabel lblCuit
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCuit_Create($strControlId = null) {
			$this->lblCuit = new QLabel($this->objParentObject, $strControlId);
			$this->lblCuit->Name = QApplication::Translate('Cuit');
			$this->lblCuit->Text = $this->objDocente->Cuit;
			$this->lblCuit->Required = true;
			return $this->lblCuit;
		}

		/**
		 * Create and setup QCheckBox chkActivo
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActivo_Create($strControlId = null) {
			$this->chkActivo = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActivo->Name = QApplication::Translate('Activo');
			$this->chkActivo->Checked = $this->objDocente->Activo;
                        return $this->chkActivo;
		}

		/**
		 * Create and setup QLabel lblActivo
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActivo_Create($strControlId = null) {
			$this->lblActivo = new QLabel($this->objParentObject, $strControlId);
			$this->lblActivo->Name = QApplication::Translate('Activo');
			$this->lblActivo->Text = ($this->objDocente->Activo) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActivo;
		}

		/**
		 * Create and setup QIntegerTextBox txtDni
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtDni_Create($strControlId = null) {
			$this->txtDni = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDni->Name = QApplication::Translate('Dni');
			$this->txtDni->Text = $this->objDocente->Dni;
                        $this->txtDni->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtDni->Minimum = QDatabaseNumberFieldMin::Integer;
			return $this->txtDni;
		}

		/**
		 * Create and setup QLabel lblDni
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblDni_Create($strControlId = null, $strFormat = null) {
			$this->lblDni = new QLabel($this->objParentObject, $strControlId);
			$this->lblDni->Name = QApplication::Translate('Dni');
			$this->lblDni->Text = $this->objDocente->Dni;
			$this->lblDni->Format = $strFormat;
			return $this->lblDni;
		}

		/**
		 * Create and setup QTextBox txtSexo
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSexo_Create($strControlId = null) {
			$this->txtSexo = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSexo->Name = QApplication::Translate('Sexo');
			$this->txtSexo->Text = $this->objDocente->Sexo;
			$this->txtSexo->MaxLength = Docente::SexoMaxLength;
			
			return $this->txtSexo;
		}

		/**
		 * Create and setup QLabel lblSexo
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSexo_Create($strControlId = null) {
			$this->lblSexo = new QLabel($this->objParentObject, $strControlId);
			$this->lblSexo->Name = QApplication::Translate('Sexo');
			$this->lblSexo->Text = $this->objDocente->Sexo;
			return $this->lblSexo;
		}

		/**
		 * Create and setup QDateTimePicker calFechaNacimiento
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calFechaNacimiento_Create($strControlId = null) {
			$this->calFechaNacimiento = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calFechaNacimiento->Name = QApplication::Translate('Fecha Nacimiento');
			$this->calFechaNacimiento->DateTime = $this->objDocente->FechaNacimiento;
			$this->calFechaNacimiento->DateTimePickerType = QDateTimePickerType::Date;
			
			return $this->calFechaNacimiento;
		}

		/**
		 * Create and setup QLabel lblFechaNacimiento
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblFechaNacimiento_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblFechaNacimiento = new QLabel($this->objParentObject, $strControlId);
			$this->lblFechaNacimiento->Name = QApplication::Translate('Fecha Nacimiento');
			$this->strFechaNacimientoDateTimeFormat = $strDateTimeFormat;
			$this->lblFechaNacimiento->Text = sprintf($this->objDocente->FechaNacimiento) ? $this->objDocente->FechaNacimiento->__toString($this->strFechaNacimientoDateTimeFormat) : null;
			return $this->lblFechaNacimiento;
		}

		protected $strFechaNacimientoDateTimeFormat;


		/**
		 * Create and setup QTextBox txtModalidad
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtModalidad_Create($strControlId = null) {
			$this->txtModalidad = new QTextBox($this->objParentObject, $strControlId);
			$this->txtModalidad->Name = QApplication::Translate('Modalidad');
			$this->txtModalidad->Text = $this->objDocente->Modalidad;
			
			return $this->txtModalidad;
		}

		/**
		 * Create and setup QLabel lblModalidad
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModalidad_Create($strControlId = null) {
			$this->lblModalidad = new QLabel($this->objParentObject, $strControlId);
			$this->lblModalidad->Name = QApplication::Translate('Modalidad');
			$this->lblModalidad->Text = $this->objDocente->Modalidad;
			return $this->lblModalidad;
		}

		/**
		 * Create and setup QTextBox txtNivel
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNivel_Create($strControlId = null) {
			$this->txtNivel = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNivel->Name = QApplication::Translate('Nivel');
			$this->txtNivel->Text = $this->objDocente->Nivel;
			
			return $this->txtNivel;
		}

		/**
		 * Create and setup QLabel lblNivel
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNivel_Create($strControlId = null) {
			$this->lblNivel = new QLabel($this->objParentObject, $strControlId);
			$this->lblNivel->Name = QApplication::Translate('Nivel');
			$this->lblNivel->Text = $this->objDocente->Nivel;
			return $this->lblNivel;
		}

		/**
		 * Create and setup QCheckBox chkEnActividad
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkEnActividad_Create($strControlId = null) {
			$this->chkEnActividad = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkEnActividad->Name = QApplication::Translate('En Actividad');
			$this->chkEnActividad->Checked = $this->objDocente->EnActividad;
                        return $this->chkEnActividad;
		}

		/**
		 * Create and setup QLabel lblEnActividad
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEnActividad_Create($strControlId = null) {
			$this->lblEnActividad = new QLabel($this->objParentObject, $strControlId);
			$this->lblEnActividad->Name = QApplication::Translate('En Actividad');
			$this->lblEnActividad->Text = ($this->objDocente->EnActividad) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblEnActividad;
		}

		/**
		 * Create and setup QDateTimePicker calFechaInicioLicencia
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calFechaInicioLicencia_Create($strControlId = null) {
			$this->calFechaInicioLicencia = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calFechaInicioLicencia->Name = QApplication::Translate('Fecha Inicio Licencia');
			$this->calFechaInicioLicencia->DateTime = $this->objDocente->FechaInicioLicencia;
			$this->calFechaInicioLicencia->DateTimePickerType = QDateTimePickerType::DateTime;
			
			return $this->calFechaInicioLicencia;
		}

		/**
		 * Create and setup QLabel lblFechaInicioLicencia
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblFechaInicioLicencia_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblFechaInicioLicencia = new QLabel($this->objParentObject, $strControlId);
			$this->lblFechaInicioLicencia->Name = QApplication::Translate('Fecha Inicio Licencia');
			$this->strFechaInicioLicenciaDateTimeFormat = $strDateTimeFormat;
			$this->lblFechaInicioLicencia->Text = sprintf($this->objDocente->FechaInicioLicencia) ? $this->objDocente->FechaInicioLicencia->__toString($this->strFechaInicioLicenciaDateTimeFormat) : null;
			return $this->lblFechaInicioLicencia;
		}

		protected $strFechaInicioLicenciaDateTimeFormat;


		/**
		 * Create and setup QDateTimePicker calFechaFinLicencia
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calFechaFinLicencia_Create($strControlId = null) {
			$this->calFechaFinLicencia = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calFechaFinLicencia->Name = QApplication::Translate('Fecha Fin Licencia');
			$this->calFechaFinLicencia->DateTime = $this->objDocente->FechaFinLicencia;
			$this->calFechaFinLicencia->DateTimePickerType = QDateTimePickerType::DateTime;
			
			return $this->calFechaFinLicencia;
		}

		/**
		 * Create and setup QLabel lblFechaFinLicencia
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblFechaFinLicencia_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblFechaFinLicencia = new QLabel($this->objParentObject, $strControlId);
			$this->lblFechaFinLicencia->Name = QApplication::Translate('Fecha Fin Licencia');
			$this->strFechaFinLicenciaDateTimeFormat = $strDateTimeFormat;
			$this->lblFechaFinLicencia->Text = sprintf($this->objDocente->FechaFinLicencia) ? $this->objDocente->FechaFinLicencia->__toString($this->strFechaFinLicenciaDateTimeFormat) : null;
			return $this->lblFechaFinLicencia;
		}

		protected $strFechaFinLicenciaDateTimeFormat;


		/**
		 * Create and setup QTextBox txtMotivoLicencia
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMotivoLicencia_Create($strControlId = null) {
			$this->txtMotivoLicencia = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMotivoLicencia->Name = QApplication::Translate('Motivo Licencia');
			$this->txtMotivoLicencia->Text = $this->objDocente->MotivoLicencia;
			
			return $this->txtMotivoLicencia;
		}

		/**
		 * Create and setup QLabel lblMotivoLicencia
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMotivoLicencia_Create($strControlId = null) {
			$this->lblMotivoLicencia = new QLabel($this->objParentObject, $strControlId);
			$this->lblMotivoLicencia->Name = QApplication::Translate('Motivo Licencia');
			$this->lblMotivoLicencia->Text = $this->objDocente->MotivoLicencia;
			return $this->lblMotivoLicencia;
		}

		/**
		 * Create and setup QCheckBox chkLicenciaGoceHaberes
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkLicenciaGoceHaberes_Create($strControlId = null) {
			$this->chkLicenciaGoceHaberes = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkLicenciaGoceHaberes->Name = QApplication::Translate('Licencia Goce Haberes');
			$this->chkLicenciaGoceHaberes->Checked = $this->objDocente->LicenciaGoceHaberes;
                        return $this->chkLicenciaGoceHaberes;
		}

		/**
		 * Create and setup QLabel lblLicenciaGoceHaberes
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLicenciaGoceHaberes_Create($strControlId = null) {
			$this->lblLicenciaGoceHaberes = new QLabel($this->objParentObject, $strControlId);
			$this->lblLicenciaGoceHaberes->Name = QApplication::Translate('Licencia Goce Haberes');
			$this->lblLicenciaGoceHaberes->Text = ($this->objDocente->LicenciaGoceHaberes) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblLicenciaGoceHaberes;
		}

		/**
		 * Create and setup QListBox lstDesignaciones
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstDesignaciones_Create($strControlId = null) {
			$this->lstDesignaciones = new QListBox($this->objParentObject, $strControlId);
			$this->lstDesignaciones->Name = QApplication::Translate('Designaciones');
			$this->lstDesignaciones->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objDocente->GetDesignacionArray();
			$objDesignacionArray = Designacion::LoadAll();
			if ($objDesignacionArray) foreach ($objDesignacionArray as $objDesignacion) {
				$objListItem = new QListItem($objDesignacion->__toString(), $objDesignacion->IdDesignacion);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->IdDesignacion == $objDesignacion->IdDesignacion)
						$objListItem->Selected = true;
				}
				$this->lstDesignaciones->AddItem($objListItem);
			}
			
			return $this->lstDesignaciones;
		}

		/**
		 * Create and setup QLabel lblDesignaciones
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblDesignaciones_Create($strControlId = null, $strGlue = ', ') {
			$this->lblDesignaciones = new QLabel($this->objParentObject, $strControlId);
			$this->lblDesignaciones->Name = QApplication::Translate('Designaciones');
			
			$objAssociatedArray = $this->objDocente->GetDesignacionArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblDesignaciones->Text = implode($strGlue, $strItems);
			return $this->lblDesignaciones;
		}


		/**
		 * Create and setup QListBox lstLocalizaciones
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstLocalizaciones_Create($strControlId = null) {
			$this->lstLocalizaciones = new QListBox($this->objParentObject, $strControlId);
			$this->lstLocalizaciones->Name = QApplication::Translate('Localizaciones');
			$this->lstLocalizaciones->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objDocente->GetLocalizacionArray();
			$objLocalizacionArray = Localizacion::LoadAll();
			if ($objLocalizacionArray) foreach ($objLocalizacionArray as $objLocalizacion) {
				$objListItem = new QListItem($objLocalizacion->__toString(), $objLocalizacion->IdLocalizacion);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->IdLocalizacion == $objLocalizacion->IdLocalizacion)
						$objListItem->Selected = true;
				}
				$this->lstLocalizaciones->AddItem($objListItem);
			}
			
			return $this->lstLocalizaciones;
		}

		/**
		 * Create and setup QLabel lblLocalizaciones
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblLocalizaciones_Create($strControlId = null, $strGlue = ', ') {
			$this->lblLocalizaciones = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocalizaciones->Name = QApplication::Translate('Localizaciones');
			
			$objAssociatedArray = $this->objDocente->GetLocalizacionArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblLocalizaciones->Text = implode($strGlue, $strItems);
			return $this->lblLocalizaciones;
		}




		/**
		 * Refresh this MetaControl with Data from the local Docente object.
		 * @param boolean $blnReload reload Docente from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDocente->Reload();

			if ($this->lblIdDocente) if ($this->blnEditMode) $this->lblIdDocente->Text = $this->objDocente->IdDocente;

			if ($this->lstIdPerfilObject) {
					$this->lstIdPerfilObject->RemoveAllItems();
				$this->lstIdPerfilObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdPerfilObjectArray = Perfil::LoadAll();
				if ($objIdPerfilObjectArray) foreach ($objIdPerfilObjectArray as $objIdPerfilObject) {
					$objListItem = new QListItem($objIdPerfilObject->__toString(), $objIdPerfilObject->IdPerfil);
					if (($this->objDocente->IdPerfilObject) && ($this->objDocente->IdPerfilObject->IdPerfil == $objIdPerfilObject->IdPerfil))
						$objListItem->Selected = true;
					$this->lstIdPerfilObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdPerfil) $this->lblIdPerfil->Text = ($this->objDocente->IdPerfilObject) ? $this->objDocente->IdPerfilObject->__toString() : null;

			if ($this->txtNombre) $this->txtNombre->Text = $this->objDocente->Nombre;
			if ($this->lblNombre) $this->lblNombre->Text = $this->objDocente->Nombre;

			if ($this->txtApellido) $this->txtApellido->Text = $this->objDocente->Apellido;
			if ($this->lblApellido) $this->lblApellido->Text = $this->objDocente->Apellido;

			if ($this->txtCuit) $this->txtCuit->Text = $this->objDocente->Cuit;
			if ($this->lblCuit) $this->lblCuit->Text = $this->objDocente->Cuit;

			if ($this->chkActivo) $this->chkActivo->Checked = $this->objDocente->Activo;
			if ($this->lblActivo) $this->lblActivo->Text = ($this->objDocente->Activo) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtDni) $this->txtDni->Text = $this->objDocente->Dni;
			if ($this->lblDni) $this->lblDni->Text = $this->objDocente->Dni;

			if ($this->txtSexo) $this->txtSexo->Text = $this->objDocente->Sexo;
			if ($this->lblSexo) $this->lblSexo->Text = $this->objDocente->Sexo;

			if ($this->calFechaNacimiento) $this->calFechaNacimiento->DateTime = $this->objDocente->FechaNacimiento;
			if ($this->lblFechaNacimiento) $this->lblFechaNacimiento->Text = sprintf($this->objDocente->FechaNacimiento) ? $this->objDocente->FechaNacimiento->__toString($this->strFechaNacimientoDateTimeFormat) : null;

			if ($this->txtModalidad) $this->txtModalidad->Text = $this->objDocente->Modalidad;
			if ($this->lblModalidad) $this->lblModalidad->Text = $this->objDocente->Modalidad;

			if ($this->txtNivel) $this->txtNivel->Text = $this->objDocente->Nivel;
			if ($this->lblNivel) $this->lblNivel->Text = $this->objDocente->Nivel;

			if ($this->chkEnActividad) $this->chkEnActividad->Checked = $this->objDocente->EnActividad;
			if ($this->lblEnActividad) $this->lblEnActividad->Text = ($this->objDocente->EnActividad) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calFechaInicioLicencia) $this->calFechaInicioLicencia->DateTime = $this->objDocente->FechaInicioLicencia;
			if ($this->lblFechaInicioLicencia) $this->lblFechaInicioLicencia->Text = sprintf($this->objDocente->FechaInicioLicencia) ? $this->objDocente->FechaInicioLicencia->__toString($this->strFechaInicioLicenciaDateTimeFormat) : null;

			if ($this->calFechaFinLicencia) $this->calFechaFinLicencia->DateTime = $this->objDocente->FechaFinLicencia;
			if ($this->lblFechaFinLicencia) $this->lblFechaFinLicencia->Text = sprintf($this->objDocente->FechaFinLicencia) ? $this->objDocente->FechaFinLicencia->__toString($this->strFechaFinLicenciaDateTimeFormat) : null;

			if ($this->txtMotivoLicencia) $this->txtMotivoLicencia->Text = $this->objDocente->MotivoLicencia;
			if ($this->lblMotivoLicencia) $this->lblMotivoLicencia->Text = $this->objDocente->MotivoLicencia;

			if ($this->chkLicenciaGoceHaberes) $this->chkLicenciaGoceHaberes->Checked = $this->objDocente->LicenciaGoceHaberes;
			if ($this->lblLicenciaGoceHaberes) $this->lblLicenciaGoceHaberes->Text = ($this->objDocente->LicenciaGoceHaberes) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstDesignaciones) {
				$this->lstDesignaciones->RemoveAllItems();
				$objAssociatedArray = $this->objDocente->GetDesignacionArray();
				$objDesignacionArray = Designacion::LoadAll();
				if ($objDesignacionArray) foreach ($objDesignacionArray as $objDesignacion) {
					$objListItem = new QListItem($objDesignacion->__toString(), $objDesignacion->IdDesignacion);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->IdDesignacion == $objDesignacion->IdDesignacion)
							$objListItem->Selected = true;
					}
					$this->lstDesignaciones->AddItem($objListItem);
				}
			}
			if ($this->lblDesignaciones) {
				$objAssociatedArray = $this->objDocente->GetDesignacionArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblDesignaciones->Text = implode($this->strDesignacionGlue, $strItems);
			}

			if ($this->lstLocalizaciones) {
				$this->lstLocalizaciones->RemoveAllItems();
				$objAssociatedArray = $this->objDocente->GetLocalizacionArray();
				$objLocalizacionArray = Localizacion::LoadAll();
				if ($objLocalizacionArray) foreach ($objLocalizacionArray as $objLocalizacion) {
					$objListItem = new QListItem($objLocalizacion->__toString(), $objLocalizacion->IdLocalizacion);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->IdLocalizacion == $objLocalizacion->IdLocalizacion)
							$objListItem->Selected = true;
					}
					$this->lstLocalizaciones->AddItem($objListItem);
				}
			}
			if ($this->lblLocalizaciones) {
				$objAssociatedArray = $this->objDocente->GetLocalizacionArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblLocalizaciones->Text = implode($this->strLocalizacionGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstDesignaciones_Update() {
			if ($this->lstDesignaciones) {
				$this->objDocente->UnassociateAllDesignaciones();
				$objSelectedListItems = $this->lstDesignaciones->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objDocente->AssociateDesignacion(Designacion::Load($objListItem->Value));
				}
			}
		}

		protected function lstLocalizaciones_Update() {
			if ($this->lstLocalizaciones) {
				$this->objDocente->UnassociateAllLocalizaciones();
				$objSelectedListItems = $this->lstLocalizaciones->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objDocente->AssociateLocalizacion(Localizacion::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC DOCENTE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->lstIdPerfilObject) $this->objDocente->IdPerfil = $this->lstIdPerfilObject->SelectedValue;
				if ($this->txtNombre) $this->objDocente->Nombre = $this->txtNombre->Text;
				if ($this->txtApellido) $this->objDocente->Apellido = $this->txtApellido->Text;
				if ($this->txtCuit) $this->objDocente->Cuit = $this->txtCuit->Text;
				if ($this->chkActivo) $this->objDocente->Activo = $this->chkActivo->Checked;
				if ($this->txtDni) $this->objDocente->Dni = $this->txtDni->Text;
				if ($this->txtSexo) $this->objDocente->Sexo = $this->txtSexo->Text;
				if ($this->calFechaNacimiento) $this->objDocente->FechaNacimiento = $this->calFechaNacimiento->DateTime;
				if ($this->txtModalidad) $this->objDocente->Modalidad = $this->txtModalidad->Text;
				if ($this->txtNivel) $this->objDocente->Nivel = $this->txtNivel->Text;
				if ($this->chkEnActividad) $this->objDocente->EnActividad = $this->chkEnActividad->Checked;
				if ($this->calFechaInicioLicencia) $this->objDocente->FechaInicioLicencia = $this->calFechaInicioLicencia->DateTime;
				if ($this->calFechaFinLicencia) $this->objDocente->FechaFinLicencia = $this->calFechaFinLicencia->DateTime;
				if ($this->txtMotivoLicencia) $this->objDocente->MotivoLicencia = $this->txtMotivoLicencia->Text;
				if ($this->chkLicenciaGoceHaberes) $this->objDocente->LicenciaGoceHaberes = $this->chkLicenciaGoceHaberes->Checked;


		}


		/**
		 * This will save this object's Docente instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDocente() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Docente object
				$idReturn = $this->objDocente->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstDesignaciones_Update();
				$this->lstLocalizaciones_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's Docente instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDocente() {
			$this->objDocente->UnassociateAllDesignaciones();
			$this->objDocente->UnassociateAllLocalizaciones();
			$this->objDocente->Delete();
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
				case 'Docente': return $this->objDocente;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Docente fields -- will be created dynamically if not yet created
				case 'IdDocenteControl':
					if (!$this->lblIdDocente) return $this->lblIdDocente_Create();
					return $this->lblIdDocente;
				case 'IdDocenteLabel':
					if (!$this->lblIdDocente) return $this->lblIdDocente_Create();
					return $this->lblIdDocente;
				case 'IdPerfilControl':
					if (!$this->lstIdPerfilObject) return $this->lstIdPerfilObject_Create();
					return $this->lstIdPerfilObject;
				case 'IdPerfilLabel':
					if (!$this->lblIdPerfil) return $this->lblIdPerfil_Create();
					return $this->lblIdPerfil;
				case 'NombreControl':
					if (!$this->txtNombre) return $this->txtNombre_Create();
					return $this->txtNombre;
				case 'NombreLabel':
					if (!$this->lblNombre) return $this->lblNombre_Create();
					return $this->lblNombre;
				case 'ApellidoControl':
					if (!$this->txtApellido) return $this->txtApellido_Create();
					return $this->txtApellido;
				case 'ApellidoLabel':
					if (!$this->lblApellido) return $this->lblApellido_Create();
					return $this->lblApellido;
				case 'CuitControl':
					if (!$this->txtCuit) return $this->txtCuit_Create();
					return $this->txtCuit;
				case 'CuitLabel':
					if (!$this->lblCuit) return $this->lblCuit_Create();
					return $this->lblCuit;
				case 'ActivoControl':
					if (!$this->chkActivo) return $this->chkActivo_Create();
					return $this->chkActivo;
				case 'ActivoLabel':
					if (!$this->lblActivo) return $this->lblActivo_Create();
					return $this->lblActivo;
				case 'DniControl':
					if (!$this->txtDni) return $this->txtDni_Create();
					return $this->txtDni;
				case 'DniLabel':
					if (!$this->lblDni) return $this->lblDni_Create();
					return $this->lblDni;
				case 'SexoControl':
					if (!$this->txtSexo) return $this->txtSexo_Create();
					return $this->txtSexo;
				case 'SexoLabel':
					if (!$this->lblSexo) return $this->lblSexo_Create();
					return $this->lblSexo;
				case 'FechaNacimientoControl':
					if (!$this->calFechaNacimiento) return $this->calFechaNacimiento_Create();
					return $this->calFechaNacimiento;
				case 'FechaNacimientoLabel':
					if (!$this->lblFechaNacimiento) return $this->lblFechaNacimiento_Create();
					return $this->lblFechaNacimiento;
				case 'ModalidadControl':
					if (!$this->txtModalidad) return $this->txtModalidad_Create();
					return $this->txtModalidad;
				case 'ModalidadLabel':
					if (!$this->lblModalidad) return $this->lblModalidad_Create();
					return $this->lblModalidad;
				case 'NivelControl':
					if (!$this->txtNivel) return $this->txtNivel_Create();
					return $this->txtNivel;
				case 'NivelLabel':
					if (!$this->lblNivel) return $this->lblNivel_Create();
					return $this->lblNivel;
				case 'EnActividadControl':
					if (!$this->chkEnActividad) return $this->chkEnActividad_Create();
					return $this->chkEnActividad;
				case 'EnActividadLabel':
					if (!$this->lblEnActividad) return $this->lblEnActividad_Create();
					return $this->lblEnActividad;
				case 'FechaInicioLicenciaControl':
					if (!$this->calFechaInicioLicencia) return $this->calFechaInicioLicencia_Create();
					return $this->calFechaInicioLicencia;
				case 'FechaInicioLicenciaLabel':
					if (!$this->lblFechaInicioLicencia) return $this->lblFechaInicioLicencia_Create();
					return $this->lblFechaInicioLicencia;
				case 'FechaFinLicenciaControl':
					if (!$this->calFechaFinLicencia) return $this->calFechaFinLicencia_Create();
					return $this->calFechaFinLicencia;
				case 'FechaFinLicenciaLabel':
					if (!$this->lblFechaFinLicencia) return $this->lblFechaFinLicencia_Create();
					return $this->lblFechaFinLicencia;
				case 'MotivoLicenciaControl':
					if (!$this->txtMotivoLicencia) return $this->txtMotivoLicencia_Create();
					return $this->txtMotivoLicencia;
				case 'MotivoLicenciaLabel':
					if (!$this->lblMotivoLicencia) return $this->lblMotivoLicencia_Create();
					return $this->lblMotivoLicencia;
				case 'LicenciaGoceHaberesControl':
					if (!$this->chkLicenciaGoceHaberes) return $this->chkLicenciaGoceHaberes_Create();
					return $this->chkLicenciaGoceHaberes;
				case 'LicenciaGoceHaberesLabel':
					if (!$this->lblLicenciaGoceHaberes) return $this->lblLicenciaGoceHaberes_Create();
					return $this->lblLicenciaGoceHaberes;
				case 'DesignacionControl':
					if (!$this->lstDesignaciones) return $this->lstDesignaciones_Create();
					return $this->lstDesignaciones;
				case 'DesignacionLabel':
					if (!$this->lblDesignaciones) return $this->lblDesignaciones_Create();
					return $this->lblDesignaciones;
				case 'LocalizacionControl':
					if (!$this->lstLocalizaciones) return $this->lstLocalizaciones_Create();
					return $this->lstLocalizaciones;
				case 'LocalizacionLabel':
					if (!$this->lblLocalizaciones) return $this->lblLocalizaciones_Create();
					return $this->lblLocalizaciones;
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
					// Controls that point to Docente fields
					case 'IdDocenteControl':
						return ($this->lblIdDocente = QType::Cast($mixValue, 'QControl'));
					case 'IdPerfilControl':
						return ($this->lstIdPerfilObject = QType::Cast($mixValue, 'QControl'));
					case 'NombreControl':
						return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
					case 'ApellidoControl':
						return ($this->txtApellido = QType::Cast($mixValue, 'QControl'));
					case 'CuitControl':
						return ($this->txtCuit = QType::Cast($mixValue, 'QControl'));
					case 'ActivoControl':
						return ($this->chkActivo = QType::Cast($mixValue, 'QControl'));
					case 'DniControl':
						return ($this->txtDni = QType::Cast($mixValue, 'QControl'));
					case 'SexoControl':
						return ($this->txtSexo = QType::Cast($mixValue, 'QControl'));
					case 'FechaNacimientoControl':
						return ($this->calFechaNacimiento = QType::Cast($mixValue, 'QControl'));
					case 'ModalidadControl':
						return ($this->txtModalidad = QType::Cast($mixValue, 'QControl'));
					case 'NivelControl':
						return ($this->txtNivel = QType::Cast($mixValue, 'QControl'));
					case 'EnActividadControl':
						return ($this->chkEnActividad = QType::Cast($mixValue, 'QControl'));
					case 'FechaInicioLicenciaControl':
						return ($this->calFechaInicioLicencia = QType::Cast($mixValue, 'QControl'));
					case 'FechaFinLicenciaControl':
						return ($this->calFechaFinLicencia = QType::Cast($mixValue, 'QControl'));
					case 'MotivoLicenciaControl':
						return ($this->txtMotivoLicencia = QType::Cast($mixValue, 'QControl'));
					case 'LicenciaGoceHaberesControl':
						return ($this->chkLicenciaGoceHaberes = QType::Cast($mixValue, 'QControl'));
					case 'DesignacionControl':
						return ($this->lstDesignaciones = QType::Cast($mixValue, 'QControl'));
					case 'LocalizacionControl':
						return ($this->lstLocalizaciones = QType::Cast($mixValue, 'QControl'));
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