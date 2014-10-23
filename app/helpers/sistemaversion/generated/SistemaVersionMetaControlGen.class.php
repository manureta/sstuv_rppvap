<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SistemaVersion class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SistemaVersion object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SistemaVersionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read SistemaVersion $SistemaVersion the actual SistemaVersion data class being edited
	 * property QLabel $IdSistemaVersionControl
	 * property-read QLabel $IdSistemaVersionLabel
	 * property QTextBox $CodigoVersionControl
	 * property-read QLabel $CodigoVersionLabel
	 * property QTextBox $NombreVersionControl
	 * property-read QLabel $NombreVersionLabel
	 * property QTextBox $DescripcionVersionControl
	 * property-read QLabel $DescripcionVersionLabel
	 * property QTextBox $FilePathControl
	 * property-read QLabel $FilePathLabel
	 * property QDateTimePicker $FechaControl
	 * property-read QLabel $FechaLabel
	 * property QIntegerTextBox $OrdenControl
	 * property-read QLabel $OrdenLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SistemaVersionMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var SistemaVersion
                */
		public $objSistemaVersion;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of SistemaVersion's individual data fields
		protected $lblIdSistemaVersion;
		protected $txtCodigoVersion;
		protected $txtNombreVersion;
		protected $txtDescripcionVersion;
		protected $txtFilePath;
		protected $calFecha;
		protected $txtOrden;

		// Controls that allow the viewing of SistemaVersion's individual data fields
		protected $lblCodigoVersion;
		protected $lblNombreVersion;
		protected $lblDescripcionVersion;
		protected $lblFilePath;
		protected $lblFecha;
		protected $lblOrden;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SistemaVersionMetaControl to edit a single SistemaVersion object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SistemaVersion object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SistemaVersionMetaControl
		 * @param SistemaVersion $objSistemaVersion new or existing SistemaVersion object
		 */
		 public function __construct($objParentObject, SistemaVersion $objSistemaVersion) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SistemaVersionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SistemaVersion object
			$this->objSistemaVersion = $objSistemaVersion;

			// Figure out if we're Editing or Creating New
			if ($this->objSistemaVersion->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SistemaVersionMetaControl
		 * @param integer $intIdSistemaVersion primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SistemaVersion object creation - defaults to CreateOrEdit
 		 * @return SistemaVersionMetaControl
		 */
		public static function Create($objParentObject, $intIdSistemaVersion = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdSistemaVersion)) {
				$objSistemaVersion = SistemaVersion::Load($intIdSistemaVersion);

				// SistemaVersion was found -- return it!
				if ($objSistemaVersion)
					return new SistemaVersionMetaControl($objParentObject, $objSistemaVersion);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SistemaVersion object with PK arguments: ' . $intIdSistemaVersion);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SistemaVersionMetaControl($objParentObject, new SistemaVersion());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SistemaVersionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SistemaVersion object creation - defaults to CreateOrEdit
		 * @return SistemaVersionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdSistemaVersion = QApplication::PathInfo(0);
			return SistemaVersionMetaControl::Create($objParentObject, $intIdSistemaVersion, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SistemaVersionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SistemaVersion object creation - defaults to CreateOrEdit
		 * @return SistemaVersionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdSistemaVersion = QApplication::QueryString('id');
			return SistemaVersionMetaControl::Create($objParentObject, $intIdSistemaVersion, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdSistemaVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdSistemaVersion_Create($strControlId = null) {
			$this->lblIdSistemaVersion = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdSistemaVersion->Name = QApplication::Translate('Id Sistema Version');
			if ($this->blnEditMode)
				$this->lblIdSistemaVersion->Text = $this->objSistemaVersion->IdSistemaVersion;
			else
				$this->lblIdSistemaVersion->Text = 'N/A';
			return $this->lblIdSistemaVersion;
		}

		/**
		 * Create and setup QTextBox txtCodigoVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCodigoVersion_Create($strControlId = null) {
			$this->txtCodigoVersion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCodigoVersion->Name = QApplication::Translate('Codigo Version');
			$this->txtCodigoVersion->Text = $this->objSistemaVersion->CodigoVersion;
			$this->txtCodigoVersion->Required = true;
			
			return $this->txtCodigoVersion;
		}

		/**
		 * Create and setup QLabel lblCodigoVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCodigoVersion_Create($strControlId = null) {
			$this->lblCodigoVersion = new QLabel($this->objParentObject, $strControlId);
			$this->lblCodigoVersion->Name = QApplication::Translate('Codigo Version');
			$this->lblCodigoVersion->Text = $this->objSistemaVersion->CodigoVersion;
			$this->lblCodigoVersion->Required = true;
			return $this->lblCodigoVersion;
		}

		/**
		 * Create and setup QTextBox txtNombreVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNombreVersion_Create($strControlId = null) {
			$this->txtNombreVersion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNombreVersion->Name = QApplication::Translate('Nombre Version');
			$this->txtNombreVersion->Text = $this->objSistemaVersion->NombreVersion;
			$this->txtNombreVersion->Required = true;
			
			return $this->txtNombreVersion;
		}

		/**
		 * Create and setup QLabel lblNombreVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNombreVersion_Create($strControlId = null) {
			$this->lblNombreVersion = new QLabel($this->objParentObject, $strControlId);
			$this->lblNombreVersion->Name = QApplication::Translate('Nombre Version');
			$this->lblNombreVersion->Text = $this->objSistemaVersion->NombreVersion;
			$this->lblNombreVersion->Required = true;
			return $this->lblNombreVersion;
		}

		/**
		 * Create and setup QTextBox txtDescripcionVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescripcionVersion_Create($strControlId = null) {
			$this->txtDescripcionVersion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescripcionVersion->Name = QApplication::Translate('Descripcion Version');
			$this->txtDescripcionVersion->Text = $this->objSistemaVersion->DescripcionVersion;
			
			return $this->txtDescripcionVersion;
		}

		/**
		 * Create and setup QLabel lblDescripcionVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescripcionVersion_Create($strControlId = null) {
			$this->lblDescripcionVersion = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescripcionVersion->Name = QApplication::Translate('Descripcion Version');
			$this->lblDescripcionVersion->Text = $this->objSistemaVersion->DescripcionVersion;
			return $this->lblDescripcionVersion;
		}

		/**
		 * Create and setup QTextBox txtFilePath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFilePath_Create($strControlId = null) {
			$this->txtFilePath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFilePath->Name = QApplication::Translate('File Path');
			$this->txtFilePath->Text = $this->objSistemaVersion->FilePath;
			
			return $this->txtFilePath;
		}

		/**
		 * Create and setup QLabel lblFilePath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFilePath_Create($strControlId = null) {
			$this->lblFilePath = new QLabel($this->objParentObject, $strControlId);
			$this->lblFilePath->Name = QApplication::Translate('File Path');
			$this->lblFilePath->Text = $this->objSistemaVersion->FilePath;
			return $this->lblFilePath;
		}

		/**
		 * Create and setup QDateTimePicker calFecha
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calFecha_Create($strControlId = null) {
			$this->calFecha = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calFecha->Name = QApplication::Translate('Fecha');
			$this->calFecha->DateTime = $this->objSistemaVersion->Fecha;
			$this->calFecha->DateTimePickerType = QDateTimePickerType::DateTime;
			
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
			$this->lblFecha->Text = sprintf($this->objSistemaVersion->Fecha) ? $this->objSistemaVersion->Fecha->__toString($this->strFechaDateTimeFormat) : null;
			return $this->lblFecha;
		}

		protected $strFechaDateTimeFormat;


		/**
		 * Create and setup QIntegerTextBox txtOrden
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrden_Create($strControlId = null) {
			$this->txtOrden = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrden->Name = QApplication::Translate('Orden');
			$this->txtOrden->Text = $this->objSistemaVersion->Orden;
			$this->txtOrden->Required = true;
                        $this->txtOrden->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtOrden->Minimum = QDatabaseNumberFieldMin::Integer;
			return $this->txtOrden;
		}

		/**
		 * Create and setup QLabel lblOrden
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblOrden_Create($strControlId = null, $strFormat = null) {
			$this->lblOrden = new QLabel($this->objParentObject, $strControlId);
			$this->lblOrden->Name = QApplication::Translate('Orden');
			$this->lblOrden->Text = $this->objSistemaVersion->Orden;
			$this->lblOrden->Required = true;
			$this->lblOrden->Format = $strFormat;
			return $this->lblOrden;
		}



		/**
		 * Refresh this MetaControl with Data from the local SistemaVersion object.
		 * @param boolean $blnReload reload SistemaVersion from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSistemaVersion->Reload();

			if ($this->lblIdSistemaVersion) if ($this->blnEditMode) $this->lblIdSistemaVersion->Text = $this->objSistemaVersion->IdSistemaVersion;

			if ($this->txtCodigoVersion) $this->txtCodigoVersion->Text = $this->objSistemaVersion->CodigoVersion;
			if ($this->lblCodigoVersion) $this->lblCodigoVersion->Text = $this->objSistemaVersion->CodigoVersion;

			if ($this->txtNombreVersion) $this->txtNombreVersion->Text = $this->objSistemaVersion->NombreVersion;
			if ($this->lblNombreVersion) $this->lblNombreVersion->Text = $this->objSistemaVersion->NombreVersion;

			if ($this->txtDescripcionVersion) $this->txtDescripcionVersion->Text = $this->objSistemaVersion->DescripcionVersion;
			if ($this->lblDescripcionVersion) $this->lblDescripcionVersion->Text = $this->objSistemaVersion->DescripcionVersion;

			if ($this->txtFilePath) $this->txtFilePath->Text = $this->objSistemaVersion->FilePath;
			if ($this->lblFilePath) $this->lblFilePath->Text = $this->objSistemaVersion->FilePath;

			if ($this->calFecha) $this->calFecha->DateTime = $this->objSistemaVersion->Fecha;
			if ($this->lblFecha) $this->lblFecha->Text = sprintf($this->objSistemaVersion->Fecha) ? $this->objSistemaVersion->Fecha->__toString($this->strFechaDateTimeFormat) : null;

			if ($this->txtOrden) $this->txtOrden->Text = $this->objSistemaVersion->Orden;
			if ($this->lblOrden) $this->lblOrden->Text = $this->objSistemaVersion->Orden;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SISTEMAVERSION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->txtCodigoVersion) $this->objSistemaVersion->CodigoVersion = $this->txtCodigoVersion->Text;
				if ($this->txtNombreVersion) $this->objSistemaVersion->NombreVersion = $this->txtNombreVersion->Text;
				if ($this->txtDescripcionVersion) $this->objSistemaVersion->DescripcionVersion = $this->txtDescripcionVersion->Text;
				if ($this->txtFilePath) $this->objSistemaVersion->FilePath = $this->txtFilePath->Text;
				if ($this->calFecha) $this->objSistemaVersion->Fecha = $this->calFecha->DateTime;
				if ($this->txtOrden) $this->objSistemaVersion->Orden = $this->txtOrden->Text;


		}


		/**
		 * This will save this object's SistemaVersion instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSistemaVersion() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SistemaVersion object
				$idReturn = $this->objSistemaVersion->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's SistemaVersion instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSistemaVersion() {
			$this->objSistemaVersion->Delete();
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
				case 'SistemaVersion': return $this->objSistemaVersion;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SistemaVersion fields -- will be created dynamically if not yet created
				case 'IdSistemaVersionControl':
					if (!$this->lblIdSistemaVersion) return $this->lblIdSistemaVersion_Create();
					return $this->lblIdSistemaVersion;
				case 'IdSistemaVersionLabel':
					if (!$this->lblIdSistemaVersion) return $this->lblIdSistemaVersion_Create();
					return $this->lblIdSistemaVersion;
				case 'CodigoVersionControl':
					if (!$this->txtCodigoVersion) return $this->txtCodigoVersion_Create();
					return $this->txtCodigoVersion;
				case 'CodigoVersionLabel':
					if (!$this->lblCodigoVersion) return $this->lblCodigoVersion_Create();
					return $this->lblCodigoVersion;
				case 'NombreVersionControl':
					if (!$this->txtNombreVersion) return $this->txtNombreVersion_Create();
					return $this->txtNombreVersion;
				case 'NombreVersionLabel':
					if (!$this->lblNombreVersion) return $this->lblNombreVersion_Create();
					return $this->lblNombreVersion;
				case 'DescripcionVersionControl':
					if (!$this->txtDescripcionVersion) return $this->txtDescripcionVersion_Create();
					return $this->txtDescripcionVersion;
				case 'DescripcionVersionLabel':
					if (!$this->lblDescripcionVersion) return $this->lblDescripcionVersion_Create();
					return $this->lblDescripcionVersion;
				case 'FilePathControl':
					if (!$this->txtFilePath) return $this->txtFilePath_Create();
					return $this->txtFilePath;
				case 'FilePathLabel':
					if (!$this->lblFilePath) return $this->lblFilePath_Create();
					return $this->lblFilePath;
				case 'FechaControl':
					if (!$this->calFecha) return $this->calFecha_Create();
					return $this->calFecha;
				case 'FechaLabel':
					if (!$this->lblFecha) return $this->lblFecha_Create();
					return $this->lblFecha;
				case 'OrdenControl':
					if (!$this->txtOrden) return $this->txtOrden_Create();
					return $this->txtOrden;
				case 'OrdenLabel':
					if (!$this->lblOrden) return $this->lblOrden_Create();
					return $this->lblOrden;
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
					// Controls that point to SistemaVersion fields
					case 'IdSistemaVersionControl':
						return ($this->lblIdSistemaVersion = QType::Cast($mixValue, 'QControl'));
					case 'CodigoVersionControl':
						return ($this->txtCodigoVersion = QType::Cast($mixValue, 'QControl'));
					case 'NombreVersionControl':
						return ($this->txtNombreVersion = QType::Cast($mixValue, 'QControl'));
					case 'DescripcionVersionControl':
						return ($this->txtDescripcionVersion = QType::Cast($mixValue, 'QControl'));
					case 'FilePathControl':
						return ($this->txtFilePath = QType::Cast($mixValue, 'QControl'));
					case 'FechaControl':
						return ($this->calFecha = QType::Cast($mixValue, 'QControl'));
					case 'OrdenControl':
						return ($this->txtOrden = QType::Cast($mixValue, 'QControl'));
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