<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Dato class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Dato object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DatoMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read Dato $Dato the actual Dato data class being edited
	 * property QLabel $IdDatoControl
	 * property-read QLabel $IdDatoLabel
	 * property QListBox $IdCampoControl
	 * property-read QLabel $IdCampoLabel
	 * property QListBox $IdPersonalControl
	 * property-read QLabel $IdPersonalLabel
	 * property QListBox $IdDesignacionControl
	 * property-read QLabel $IdDesignacionLabel
	 * property QTextBox $ValorControl
	 * property-read QLabel $ValorLabel
	 * property QDateTimePicker $FechaModificacionControl
	 * property-read QLabel $FechaModificacionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DatoMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Dato
                */
		public $objDato;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Dato's individual data fields
		protected $lblIdDato;
		protected $lstIdCampoObject;
		protected $lstIdPersonalObject;
		protected $lstIdDesignacionObject;
		protected $txtValor;
		protected $calFechaModificacion;

		// Controls that allow the viewing of Dato's individual data fields
		protected $lblIdCampo;
		protected $lblIdPersonal;
		protected $lblIdDesignacion;
		protected $lblValor;
		protected $lblFechaModificacion;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DatoMetaControl to edit a single Dato object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Dato object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatoMetaControl
		 * @param Dato $objDato new or existing Dato object
		 */
		 public function __construct($objParentObject, Dato $objDato) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DatoMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Dato object
			$this->objDato = $objDato;

			// Figure out if we're Editing or Creating New
			if ($this->objDato->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatoMetaControl
		 * @param integer $intIdDato primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Dato object creation - defaults to CreateOrEdit
 		 * @return DatoMetaControl
		 */
		public static function Create($objParentObject, $intIdDato = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdDato)) {
				$objDato = Dato::Load($intIdDato);

				// Dato was found -- return it!
				if ($objDato)
					return new DatoMetaControl($objParentObject, $objDato);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Dato object with PK arguments: ' . $intIdDato);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DatoMetaControl($objParentObject, new Dato());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatoMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Dato object creation - defaults to CreateOrEdit
		 * @return DatoMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDato = QApplication::PathInfo(0);
			return DatoMetaControl::Create($objParentObject, $intIdDato, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatoMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Dato object creation - defaults to CreateOrEdit
		 * @return DatoMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDato = QApplication::QueryString('id');
			return DatoMetaControl::Create($objParentObject, $intIdDato, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdDato
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdDato_Create($strControlId = null) {
			$this->lblIdDato = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdDato->Name = QApplication::Translate('Id Dato');
			if ($this->blnEditMode)
				$this->lblIdDato->Text = $this->objDato->IdDato;
			else
				$this->lblIdDato->Text = 'N/A';
			return $this->lblIdDato;
		}

		/**
		 * Create and setup QListBox lstIdCampoObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdCampoObject_Create($strControlId = null) {
			$this->lstIdCampoObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdCampoObject->Name = QApplication::Translate('Id Campo Object');
			$this->lstIdCampoObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdCampoObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdCampoObjectArray = Campo::LoadAll();
			if ($objIdCampoObjectArray) foreach ($objIdCampoObjectArray as $objIdCampoObject) {
				$objListItem = new QListItem($objIdCampoObject->__toString(), $objIdCampoObject->IdCampo);
				if (($this->objDato->IdCampoObject) && ($this->objDato->IdCampoObject->IdCampo == $objIdCampoObject->IdCampo))
					$objListItem->Selected = true;
				$this->lstIdCampoObject->AddItem($objListItem);
			}
			
			return $this->lstIdCampoObject;
		}

		/**
		 * Create and setup QLabel lblIdCampo
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdCampo_Create($strControlId = null) {
			$this->lblIdCampo = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdCampo->Name = QApplication::Translate('Id Campo Object');
			$this->lblIdCampo->Text = ($this->objDato->IdCampoObject) ? $this->objDato->IdCampoObject->__toString() : null;
			$this->lblIdCampo->Required = true;
			return $this->lblIdCampo;
		}

		/**
		 * Create and setup QListBox lstIdPersonalObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdPersonalObject_Create($strControlId = null) {
			$this->lstIdPersonalObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdPersonalObject->Name = QApplication::Translate('Id Personal Object');
			$this->lstIdPersonalObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdPersonalObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdPersonalObjectArray = Personal::LoadAll();
			if ($objIdPersonalObjectArray) foreach ($objIdPersonalObjectArray as $objIdPersonalObject) {
				$objListItem = new QListItem($objIdPersonalObject->__toString(), $objIdPersonalObject->IdPersonal);
				if (($this->objDato->IdPersonalObject) && ($this->objDato->IdPersonalObject->IdPersonal == $objIdPersonalObject->IdPersonal))
					$objListItem->Selected = true;
				$this->lstIdPersonalObject->AddItem($objListItem);
			}
			
			return $this->lstIdPersonalObject;
		}

		/**
		 * Create and setup QLabel lblIdPersonal
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdPersonal_Create($strControlId = null) {
			$this->lblIdPersonal = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdPersonal->Name = QApplication::Translate('Id Personal Object');
			$this->lblIdPersonal->Text = ($this->objDato->IdPersonalObject) ? $this->objDato->IdPersonalObject->__toString() : null;
			$this->lblIdPersonal->Required = true;
			return $this->lblIdPersonal;
		}

		/**
		 * Create and setup QListBox lstIdDesignacionObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdDesignacionObject_Create($strControlId = null) {
			$this->lstIdDesignacionObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdDesignacionObject->Name = QApplication::Translate('Id Designacion Object');
			$this->lstIdDesignacionObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdDesignacionObjectArray = Designacion::LoadAll();
			if ($objIdDesignacionObjectArray) foreach ($objIdDesignacionObjectArray as $objIdDesignacionObject) {
				$objListItem = new QListItem($objIdDesignacionObject->__toString(), $objIdDesignacionObject->IdDesignacion);
				if (($this->objDato->IdDesignacionObject) && ($this->objDato->IdDesignacionObject->IdDesignacion == $objIdDesignacionObject->IdDesignacion))
					$objListItem->Selected = true;
				$this->lstIdDesignacionObject->AddItem($objListItem);
			}
			
			return $this->lstIdDesignacionObject;
		}

		/**
		 * Create and setup QLabel lblIdDesignacion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdDesignacion_Create($strControlId = null) {
			$this->lblIdDesignacion = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdDesignacion->Name = QApplication::Translate('Id Designacion Object');
			$this->lblIdDesignacion->Text = ($this->objDato->IdDesignacionObject) ? $this->objDato->IdDesignacionObject->__toString() : null;
			return $this->lblIdDesignacion;
		}

		/**
		 * Create and setup QTextBox txtValor
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtValor_Create($strControlId = null) {
			$this->txtValor = new QTextBox($this->objParentObject, $strControlId);
			$this->txtValor->Name = QApplication::Translate('Valor');
			$this->txtValor->Text = $this->objDato->Valor;
			
			return $this->txtValor;
		}

		/**
		 * Create and setup QLabel lblValor
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblValor_Create($strControlId = null) {
			$this->lblValor = new QLabel($this->objParentObject, $strControlId);
			$this->lblValor->Name = QApplication::Translate('Valor');
			$this->lblValor->Text = $this->objDato->Valor;
			return $this->lblValor;
		}

		/**
		 * Create and setup QDateTimePicker calFechaModificacion
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calFechaModificacion_Create($strControlId = null) {
			$this->calFechaModificacion = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calFechaModificacion->Name = QApplication::Translate('Fecha Modificacion');
			$this->calFechaModificacion->DateTime = $this->objDato->FechaModificacion;
			$this->calFechaModificacion->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calFechaModificacion->Required = true;
			
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
			$this->lblFechaModificacion->Name = QApplication::Translate('Fecha Modificacion');
			$this->strFechaModificacionDateTimeFormat = $strDateTimeFormat;
			$this->lblFechaModificacion->Text = sprintf($this->objDato->FechaModificacion) ? $this->objDato->FechaModificacion->__toString($this->strFechaModificacionDateTimeFormat) : null;
			$this->lblFechaModificacion->Required = true;
			return $this->lblFechaModificacion;
		}

		protected $strFechaModificacionDateTimeFormat;




		/**
		 * Refresh this MetaControl with Data from the local Dato object.
		 * @param boolean $blnReload reload Dato from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDato->Reload();

			if ($this->lblIdDato) if ($this->blnEditMode) $this->lblIdDato->Text = $this->objDato->IdDato;

			if ($this->lstIdCampoObject) {
					$this->lstIdCampoObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdCampoObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdCampoObjectArray = Campo::LoadAll();
				if ($objIdCampoObjectArray) foreach ($objIdCampoObjectArray as $objIdCampoObject) {
					$objListItem = new QListItem($objIdCampoObject->__toString(), $objIdCampoObject->IdCampo);
					if (($this->objDato->IdCampoObject) && ($this->objDato->IdCampoObject->IdCampo == $objIdCampoObject->IdCampo))
						$objListItem->Selected = true;
					$this->lstIdCampoObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdCampo) $this->lblIdCampo->Text = ($this->objDato->IdCampoObject) ? $this->objDato->IdCampoObject->__toString() : null;

			if ($this->lstIdPersonalObject) {
					$this->lstIdPersonalObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdPersonalObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdPersonalObjectArray = Personal::LoadAll();
				if ($objIdPersonalObjectArray) foreach ($objIdPersonalObjectArray as $objIdPersonalObject) {
					$objListItem = new QListItem($objIdPersonalObject->__toString(), $objIdPersonalObject->IdPersonal);
					if (($this->objDato->IdPersonalObject) && ($this->objDato->IdPersonalObject->IdPersonal == $objIdPersonalObject->IdPersonal))
						$objListItem->Selected = true;
					$this->lstIdPersonalObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdPersonal) $this->lblIdPersonal->Text = ($this->objDato->IdPersonalObject) ? $this->objDato->IdPersonalObject->__toString() : null;

			if ($this->lstIdDesignacionObject) {
					$this->lstIdDesignacionObject->RemoveAllItems();
				$this->lstIdDesignacionObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdDesignacionObjectArray = Designacion::LoadAll();
				if ($objIdDesignacionObjectArray) foreach ($objIdDesignacionObjectArray as $objIdDesignacionObject) {
					$objListItem = new QListItem($objIdDesignacionObject->__toString(), $objIdDesignacionObject->IdDesignacion);
					if (($this->objDato->IdDesignacionObject) && ($this->objDato->IdDesignacionObject->IdDesignacion == $objIdDesignacionObject->IdDesignacion))
						$objListItem->Selected = true;
					$this->lstIdDesignacionObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdDesignacion) $this->lblIdDesignacion->Text = ($this->objDato->IdDesignacionObject) ? $this->objDato->IdDesignacionObject->__toString() : null;

			if ($this->txtValor) $this->txtValor->Text = $this->objDato->Valor;
			if ($this->lblValor) $this->lblValor->Text = $this->objDato->Valor;

			if ($this->calFechaModificacion) $this->calFechaModificacion->DateTime = $this->objDato->FechaModificacion;
			if ($this->lblFechaModificacion) $this->lblFechaModificacion->Text = sprintf($this->objDato->FechaModificacion) ? $this->objDato->FechaModificacion->__toString($this->strFechaModificacionDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DATO OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->lstIdCampoObject) $this->objDato->IdCampo = $this->lstIdCampoObject->SelectedValue;
				if ($this->lstIdPersonalObject) $this->objDato->IdPersonal = $this->lstIdPersonalObject->SelectedValue;
				if ($this->lstIdDesignacionObject) $this->objDato->IdDesignacion = $this->lstIdDesignacionObject->SelectedValue;
				if ($this->txtValor) $this->objDato->Valor = $this->txtValor->Text;
				if ($this->calFechaModificacion) $this->objDato->FechaModificacion = $this->calFechaModificacion->DateTime;


		}


		/**
		 * This will save this object's Dato instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDato() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Dato object
				$idReturn = $this->objDato->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's Dato instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDato() {
			$this->objDato->Delete();
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
				case 'Dato': return $this->objDato;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Dato fields -- will be created dynamically if not yet created
				case 'IdDatoControl':
					if (!$this->lblIdDato) return $this->lblIdDato_Create();
					return $this->lblIdDato;
				case 'IdDatoLabel':
					if (!$this->lblIdDato) return $this->lblIdDato_Create();
					return $this->lblIdDato;
				case 'IdCampoControl':
					if (!$this->lstIdCampoObject) return $this->lstIdCampoObject_Create();
					return $this->lstIdCampoObject;
				case 'IdCampoLabel':
					if (!$this->lblIdCampo) return $this->lblIdCampo_Create();
					return $this->lblIdCampo;
				case 'IdPersonalControl':
					if (!$this->lstIdPersonalObject) return $this->lstIdPersonalObject_Create();
					return $this->lstIdPersonalObject;
				case 'IdPersonalLabel':
					if (!$this->lblIdPersonal) return $this->lblIdPersonal_Create();
					return $this->lblIdPersonal;
				case 'IdDesignacionControl':
					if (!$this->lstIdDesignacionObject) return $this->lstIdDesignacionObject_Create();
					return $this->lstIdDesignacionObject;
				case 'IdDesignacionLabel':
					if (!$this->lblIdDesignacion) return $this->lblIdDesignacion_Create();
					return $this->lblIdDesignacion;
				case 'ValorControl':
					if (!$this->txtValor) return $this->txtValor_Create();
					return $this->txtValor;
				case 'ValorLabel':
					if (!$this->lblValor) return $this->lblValor_Create();
					return $this->lblValor;
				case 'FechaModificacionControl':
					if (!$this->calFechaModificacion) return $this->calFechaModificacion_Create();
					return $this->calFechaModificacion;
				case 'FechaModificacionLabel':
					if (!$this->lblFechaModificacion) return $this->lblFechaModificacion_Create();
					return $this->lblFechaModificacion;
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
					// Controls that point to Dato fields
					case 'IdDatoControl':
						return ($this->lblIdDato = QType::Cast($mixValue, 'QControl'));
					case 'IdCampoControl':
						return ($this->lstIdCampoObject = QType::Cast($mixValue, 'QControl'));
					case 'IdPersonalControl':
						return ($this->lstIdPersonalObject = QType::Cast($mixValue, 'QControl'));
					case 'IdDesignacionControl':
						return ($this->lstIdDesignacionObject = QType::Cast($mixValue, 'QControl'));
					case 'ValorControl':
						return ($this->txtValor = QType::Cast($mixValue, 'QControl'));
					case 'FechaModificacionControl':
						return ($this->calFechaModificacion = QType::Cast($mixValue, 'QControl'));
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