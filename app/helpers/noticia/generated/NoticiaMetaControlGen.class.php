<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Noticia class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Noticia object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a NoticiaMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read Noticia $Noticia the actual Noticia data class being edited
	 * property QLabel $IdNoticiaControl
	 * property-read QLabel $IdNoticiaLabel
	 * property QTextBox $TituloControl
	 * property-read QLabel $TituloLabel
	 * property QTextBox $TextoControl
	 * property-read QLabel $TextoLabel
	 * property QDateTimePicker $FechaControl
	 * property-read QLabel $FechaLabel
	 * property QCheckBox $MostrarControl
	 * property-read QLabel $MostrarLabel
	 * property QCheckBox $ArribaControl
	 * property-read QLabel $ArribaLabel
	 * property QCheckBox $LoginControl
	 * property-read QLabel $LoginLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class NoticiaMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Noticia
                */
		public $objNoticia;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Noticia's individual data fields
		protected $lblIdNoticia;
		protected $txtTitulo;
		protected $txtTexto;
		protected $calFecha;
		protected $chkMostrar;
		protected $chkArriba;
		protected $chkLogin;

		// Controls that allow the viewing of Noticia's individual data fields
		protected $lblTitulo;
		protected $lblTexto;
		protected $lblFecha;
		protected $lblMostrar;
		protected $lblArriba;
		protected $lblLogin;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * NoticiaMetaControl to edit a single Noticia object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Noticia object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NoticiaMetaControl
		 * @param Noticia $objNoticia new or existing Noticia object
		 */
		 public function __construct($objParentObject, Noticia $objNoticia) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this NoticiaMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Noticia object
			$this->objNoticia = $objNoticia;

			// Figure out if we're Editing or Creating New
			if ($this->objNoticia->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this NoticiaMetaControl
		 * @param integer $intIdNoticia primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Noticia object creation - defaults to CreateOrEdit
 		 * @return NoticiaMetaControl
		 */
		public static function Create($objParentObject, $intIdNoticia = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdNoticia)) {
				$objNoticia = Noticia::Load($intIdNoticia);

				// Noticia was found -- return it!
				if ($objNoticia)
					return new NoticiaMetaControl($objParentObject, $objNoticia);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Noticia object with PK arguments: ' . $intIdNoticia);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new NoticiaMetaControl($objParentObject, new Noticia());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NoticiaMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Noticia object creation - defaults to CreateOrEdit
		 * @return NoticiaMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdNoticia = QApplication::PathInfo(0);
			return NoticiaMetaControl::Create($objParentObject, $intIdNoticia, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NoticiaMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Noticia object creation - defaults to CreateOrEdit
		 * @return NoticiaMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdNoticia = QApplication::QueryString('id');
			return NoticiaMetaControl::Create($objParentObject, $intIdNoticia, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdNoticia
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdNoticia_Create($strControlId = null) {
			$this->lblIdNoticia = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdNoticia->Name = QApplication::Translate('Id Noticia');
			if ($this->blnEditMode)
				$this->lblIdNoticia->Text = $this->objNoticia->IdNoticia;
			else
				$this->lblIdNoticia->Text = 'N/A';
			return $this->lblIdNoticia;
		}

		/**
		 * Create and setup QTextBox txtTitulo
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitulo_Create($strControlId = null) {
			$this->txtTitulo = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitulo->Name = QApplication::Translate('Titulo');
			$this->txtTitulo->Text = $this->objNoticia->Titulo;
			
			return $this->txtTitulo;
		}

		/**
		 * Create and setup QLabel lblTitulo
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitulo_Create($strControlId = null) {
			$this->lblTitulo = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitulo->Name = QApplication::Translate('Titulo');
			$this->lblTitulo->Text = $this->objNoticia->Titulo;
			return $this->lblTitulo;
		}

		/**
		 * Create and setup QTextBox txtTexto
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTexto_Create($strControlId = null) {
			$this->txtTexto = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTexto->Name = QApplication::Translate('Texto');
			$this->txtTexto->Text = $this->objNoticia->Texto;
			
			return $this->txtTexto;
		}

		/**
		 * Create and setup QLabel lblTexto
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTexto_Create($strControlId = null) {
			$this->lblTexto = new QLabel($this->objParentObject, $strControlId);
			$this->lblTexto->Name = QApplication::Translate('Texto');
			$this->lblTexto->Text = $this->objNoticia->Texto;
			return $this->lblTexto;
		}

		/**
		 * Create and setup QDateTimePicker calFecha
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calFecha_Create($strControlId = null) {
			$this->calFecha = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calFecha->Name = QApplication::Translate('Fecha');
			$this->calFecha->DateTime = $this->objNoticia->Fecha;
			$this->calFecha->DateTimePickerType = QDateTimePickerType::Date;
			
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
			$this->lblFecha->Text = sprintf($this->objNoticia->Fecha) ? $this->objNoticia->Fecha->__toString($this->strFechaDateTimeFormat) : null;
			return $this->lblFecha;
		}

		protected $strFechaDateTimeFormat;


		/**
		 * Create and setup QCheckBox chkMostrar
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkMostrar_Create($strControlId = null) {
			$this->chkMostrar = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkMostrar->Name = QApplication::Translate('Mostrar');
			$this->chkMostrar->Checked = $this->objNoticia->Mostrar;
                        return $this->chkMostrar;
		}

		/**
		 * Create and setup QLabel lblMostrar
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMostrar_Create($strControlId = null) {
			$this->lblMostrar = new QLabel($this->objParentObject, $strControlId);
			$this->lblMostrar->Name = QApplication::Translate('Mostrar');
			$this->lblMostrar->Text = ($this->objNoticia->Mostrar) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblMostrar;
		}

		/**
		 * Create and setup QCheckBox chkArriba
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkArriba_Create($strControlId = null) {
			$this->chkArriba = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkArriba->Name = QApplication::Translate('Arriba');
			$this->chkArriba->Checked = $this->objNoticia->Arriba;
                        return $this->chkArriba;
		}

		/**
		 * Create and setup QLabel lblArriba
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArriba_Create($strControlId = null) {
			$this->lblArriba = new QLabel($this->objParentObject, $strControlId);
			$this->lblArriba->Name = QApplication::Translate('Arriba');
			$this->lblArriba->Text = ($this->objNoticia->Arriba) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblArriba;
		}

		/**
		 * Create and setup QCheckBox chkLogin
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkLogin_Create($strControlId = null) {
			$this->chkLogin = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkLogin->Name = QApplication::Translate('Login');
			$this->chkLogin->Checked = $this->objNoticia->Login;
                        return $this->chkLogin;
		}

		/**
		 * Create and setup QLabel lblLogin
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLogin_Create($strControlId = null) {
			$this->lblLogin = new QLabel($this->objParentObject, $strControlId);
			$this->lblLogin->Name = QApplication::Translate('Login');
			$this->lblLogin->Text = ($this->objNoticia->Login) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblLogin;
		}



		/**
		 * Refresh this MetaControl with Data from the local Noticia object.
		 * @param boolean $blnReload reload Noticia from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objNoticia->Reload();

			if ($this->lblIdNoticia) if ($this->blnEditMode) $this->lblIdNoticia->Text = $this->objNoticia->IdNoticia;

			if ($this->txtTitulo) $this->txtTitulo->Text = $this->objNoticia->Titulo;
			if ($this->lblTitulo) $this->lblTitulo->Text = $this->objNoticia->Titulo;

			if ($this->txtTexto) $this->txtTexto->Text = $this->objNoticia->Texto;
			if ($this->lblTexto) $this->lblTexto->Text = $this->objNoticia->Texto;

			if ($this->calFecha) $this->calFecha->DateTime = $this->objNoticia->Fecha;
			if ($this->lblFecha) $this->lblFecha->Text = sprintf($this->objNoticia->Fecha) ? $this->objNoticia->Fecha->__toString($this->strFechaDateTimeFormat) : null;

			if ($this->chkMostrar) $this->chkMostrar->Checked = $this->objNoticia->Mostrar;
			if ($this->lblMostrar) $this->lblMostrar->Text = ($this->objNoticia->Mostrar) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkArriba) $this->chkArriba->Checked = $this->objNoticia->Arriba;
			if ($this->lblArriba) $this->lblArriba->Text = ($this->objNoticia->Arriba) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkLogin) $this->chkLogin->Checked = $this->objNoticia->Login;
			if ($this->lblLogin) $this->lblLogin->Text = ($this->objNoticia->Login) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC NOTICIA OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->txtTitulo) $this->objNoticia->Titulo = $this->txtTitulo->Text;
				if ($this->txtTexto) $this->objNoticia->Texto = $this->txtTexto->Text;
				if ($this->calFecha) $this->objNoticia->Fecha = $this->calFecha->DateTime;
				if ($this->chkMostrar) $this->objNoticia->Mostrar = $this->chkMostrar->Checked;
				if ($this->chkArriba) $this->objNoticia->Arriba = $this->chkArriba->Checked;
				if ($this->chkLogin) $this->objNoticia->Login = $this->chkLogin->Checked;


		}


		/**
		 * This will save this object's Noticia instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveNoticia() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Noticia object
				$idReturn = $this->objNoticia->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's Noticia instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteNoticia() {
			$this->objNoticia->Delete();
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
				case 'Noticia': return $this->objNoticia;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Noticia fields -- will be created dynamically if not yet created
				case 'IdNoticiaControl':
					if (!$this->lblIdNoticia) return $this->lblIdNoticia_Create();
					return $this->lblIdNoticia;
				case 'IdNoticiaLabel':
					if (!$this->lblIdNoticia) return $this->lblIdNoticia_Create();
					return $this->lblIdNoticia;
				case 'TituloControl':
					if (!$this->txtTitulo) return $this->txtTitulo_Create();
					return $this->txtTitulo;
				case 'TituloLabel':
					if (!$this->lblTitulo) return $this->lblTitulo_Create();
					return $this->lblTitulo;
				case 'TextoControl':
					if (!$this->txtTexto) return $this->txtTexto_Create();
					return $this->txtTexto;
				case 'TextoLabel':
					if (!$this->lblTexto) return $this->lblTexto_Create();
					return $this->lblTexto;
				case 'FechaControl':
					if (!$this->calFecha) return $this->calFecha_Create();
					return $this->calFecha;
				case 'FechaLabel':
					if (!$this->lblFecha) return $this->lblFecha_Create();
					return $this->lblFecha;
				case 'MostrarControl':
					if (!$this->chkMostrar) return $this->chkMostrar_Create();
					return $this->chkMostrar;
				case 'MostrarLabel':
					if (!$this->lblMostrar) return $this->lblMostrar_Create();
					return $this->lblMostrar;
				case 'ArribaControl':
					if (!$this->chkArriba) return $this->chkArriba_Create();
					return $this->chkArriba;
				case 'ArribaLabel':
					if (!$this->lblArriba) return $this->lblArriba_Create();
					return $this->lblArriba;
				case 'LoginControl':
					if (!$this->chkLogin) return $this->chkLogin_Create();
					return $this->chkLogin;
				case 'LoginLabel':
					if (!$this->lblLogin) return $this->lblLogin_Create();
					return $this->lblLogin;
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
					// Controls that point to Noticia fields
					case 'IdNoticiaControl':
						return ($this->lblIdNoticia = QType::Cast($mixValue, 'QControl'));
					case 'TituloControl':
						return ($this->txtTitulo = QType::Cast($mixValue, 'QControl'));
					case 'TextoControl':
						return ($this->txtTexto = QType::Cast($mixValue, 'QControl'));
					case 'FechaControl':
						return ($this->calFecha = QType::Cast($mixValue, 'QControl'));
					case 'MostrarControl':
						return ($this->chkMostrar = QType::Cast($mixValue, 'QControl'));
					case 'ArribaControl':
						return ($this->chkArriba = QType::Cast($mixValue, 'QControl'));
					case 'LoginControl':
						return ($this->chkLogin = QType::Cast($mixValue, 'QControl'));
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