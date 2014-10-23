<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the MapaCuadros class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single MapaCuadros object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MapaCuadrosMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read MapaCuadros $MapaCuadros the actual MapaCuadros data class being edited
	 * property QListBox $IdDefinicionCuadroControl
	 * property-read QLabel $IdDefinicionCuadroLabel
	 * property QIntegerTextBox $COfertaControl
	 * property-read QLabel $COfertaLabel
	 * property QIntegerTextBox $CEstadoControl
	 * property-read QLabel $CEstadoLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MapaCuadrosMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var MapaCuadros
                */
		public $objMapaCuadros;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of MapaCuadros's individual data fields
		protected $lstIdDefinicionCuadroObject;
		protected $txtCOferta;
		protected $txtCEstado;

		// Controls that allow the viewing of MapaCuadros's individual data fields
		protected $lblIdDefinicionCuadro;
		protected $lblCOferta;
		protected $lblCEstado;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MapaCuadrosMetaControl to edit a single MapaCuadros object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single MapaCuadros object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MapaCuadrosMetaControl
		 * @param MapaCuadros $objMapaCuadros new or existing MapaCuadros object
		 */
		 public function __construct($objParentObject, MapaCuadros $objMapaCuadros) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MapaCuadrosMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked MapaCuadros object
			$this->objMapaCuadros = $objMapaCuadros;

			// Figure out if we're Editing or Creating New
			if ($this->objMapaCuadros->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MapaCuadrosMetaControl
		 * @param integer $intIdDefinicionCuadro primary key value
		 * @param integer $intCOferta primary key value
		 * @param integer $intCEstado primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing MapaCuadros object creation - defaults to CreateOrEdit
 		 * @return MapaCuadrosMetaControl
		 */
		public static function Create($objParentObject, $intIdDefinicionCuadro = null, $intCOferta = null, $intCEstado = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdDefinicionCuadro) && strlen($intCOferta) && strlen($intCEstado)) {
				$objMapaCuadros = MapaCuadros::Load($intIdDefinicionCuadro, $intCOferta, $intCEstado);

				// MapaCuadros was found -- return it!
				if ($objMapaCuadros)
					return new MapaCuadrosMetaControl($objParentObject, $objMapaCuadros);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a MapaCuadros object with PK arguments: ' . $intIdDefinicionCuadro . ', ' . $intCOferta . ', ' . $intCEstado);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MapaCuadrosMetaControl($objParentObject, new MapaCuadros());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MapaCuadrosMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MapaCuadros object creation - defaults to CreateOrEdit
		 * @return MapaCuadrosMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDefinicionCuadro = QApplication::PathInfo(0);
			$intCOferta = QApplication::PathInfo(1);
			$intCEstado = QApplication::PathInfo(2);
			return MapaCuadrosMetaControl::Create($objParentObject, $intIdDefinicionCuadro, $intCOferta, $intCEstado, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MapaCuadrosMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MapaCuadros object creation - defaults to CreateOrEdit
		 * @return MapaCuadrosMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDefinicionCuadro = QApplication::QueryString('id');
			$intCOferta = QApplication::QueryString('id');
			$intCEstado = QApplication::QueryString('id');
			return MapaCuadrosMetaControl::Create($objParentObject, $intIdDefinicionCuadro, $intCOferta, $intCEstado, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstIdDefinicionCuadroObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdDefinicionCuadroObject_Create($strControlId = null) {
			$this->lstIdDefinicionCuadroObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdDefinicionCuadroObject->Name = QApplication::Translate('Id Definicion Cuadro Object');
			$this->lstIdDefinicionCuadroObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdDefinicionCuadroObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdDefinicionCuadroObjectArray = DefinicionCuadro::LoadAll();
			if ($objIdDefinicionCuadroObjectArray) foreach ($objIdDefinicionCuadroObjectArray as $objIdDefinicionCuadroObject) {
				$objListItem = new QListItem($objIdDefinicionCuadroObject->__toString(), $objIdDefinicionCuadroObject->IdDefinicionCuadro);
				if (($this->objMapaCuadros->IdDefinicionCuadroObject) && ($this->objMapaCuadros->IdDefinicionCuadroObject->IdDefinicionCuadro == $objIdDefinicionCuadroObject->IdDefinicionCuadro))
					$objListItem->Selected = true;
				$this->lstIdDefinicionCuadroObject->AddItem($objListItem);
			}
			
			return $this->lstIdDefinicionCuadroObject;
		}

		/**
		 * Create and setup QLabel lblIdDefinicionCuadro
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdDefinicionCuadro_Create($strControlId = null) {
			$this->lblIdDefinicionCuadro = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdDefinicionCuadro->Name = QApplication::Translate('Id Definicion Cuadro Object');
			$this->lblIdDefinicionCuadro->Text = ($this->objMapaCuadros->IdDefinicionCuadroObject) ? $this->objMapaCuadros->IdDefinicionCuadroObject->__toString() : null;
			$this->lblIdDefinicionCuadro->Required = true;
			return $this->lblIdDefinicionCuadro;
		}

		/**
		 * Create and setup QIntegerTextBox txtCOferta
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCOferta_Create($strControlId = null) {
			$this->txtCOferta = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCOferta->Name = QApplication::Translate('C Oferta');
			$this->txtCOferta->Text = $this->objMapaCuadros->COferta;
			$this->txtCOferta->Required = true;
                        $this->txtCOferta->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this->txtCOferta->Minimum = QDatabaseNumberFieldMin::Smallint;
			return $this->txtCOferta;
		}

		/**
		 * Create and setup QLabel lblCOferta
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCOferta_Create($strControlId = null, $strFormat = null) {
			$this->lblCOferta = new QLabel($this->objParentObject, $strControlId);
			$this->lblCOferta->Name = QApplication::Translate('C Oferta');
			$this->lblCOferta->Text = $this->objMapaCuadros->COferta;
			$this->lblCOferta->Required = true;
			$this->lblCOferta->Format = $strFormat;
			return $this->lblCOferta;
		}

		/**
		 * Create and setup QIntegerTextBox txtCEstado
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCEstado_Create($strControlId = null) {
			$this->txtCEstado = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCEstado->Name = QApplication::Translate('C Estado');
			$this->txtCEstado->Text = $this->objMapaCuadros->CEstado;
			$this->txtCEstado->Required = true;
                        $this->txtCEstado->Maximum = QDatabaseNumberFieldMax::Integer;
                        $this->txtCEstado->Minimum = QDatabaseNumberFieldMin::Integer;
			return $this->txtCEstado;
		}

		/**
		 * Create and setup QLabel lblCEstado
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCEstado_Create($strControlId = null, $strFormat = null) {
			$this->lblCEstado = new QLabel($this->objParentObject, $strControlId);
			$this->lblCEstado->Name = QApplication::Translate('C Estado');
			$this->lblCEstado->Text = $this->objMapaCuadros->CEstado;
			$this->lblCEstado->Required = true;
			$this->lblCEstado->Format = $strFormat;
			return $this->lblCEstado;
		}



		/**
		 * Refresh this MetaControl with Data from the local MapaCuadros object.
		 * @param boolean $blnReload reload MapaCuadros from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMapaCuadros->Reload();

			if ($this->lstIdDefinicionCuadroObject) {
					$this->lstIdDefinicionCuadroObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdDefinicionCuadroObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdDefinicionCuadroObjectArray = DefinicionCuadro::LoadAll();
				if ($objIdDefinicionCuadroObjectArray) foreach ($objIdDefinicionCuadroObjectArray as $objIdDefinicionCuadroObject) {
					$objListItem = new QListItem($objIdDefinicionCuadroObject->__toString(), $objIdDefinicionCuadroObject->IdDefinicionCuadro);
					if (($this->objMapaCuadros->IdDefinicionCuadroObject) && ($this->objMapaCuadros->IdDefinicionCuadroObject->IdDefinicionCuadro == $objIdDefinicionCuadroObject->IdDefinicionCuadro))
						$objListItem->Selected = true;
					$this->lstIdDefinicionCuadroObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdDefinicionCuadro) $this->lblIdDefinicionCuadro->Text = ($this->objMapaCuadros->IdDefinicionCuadroObject) ? $this->objMapaCuadros->IdDefinicionCuadroObject->__toString() : null;

			if ($this->txtCOferta) $this->txtCOferta->Text = $this->objMapaCuadros->COferta;
			if ($this->lblCOferta) $this->lblCOferta->Text = $this->objMapaCuadros->COferta;

			if ($this->txtCEstado) $this->txtCEstado->Text = $this->objMapaCuadros->CEstado;
			if ($this->lblCEstado) $this->lblCEstado->Text = $this->objMapaCuadros->CEstado;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MAPACUADROS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->lstIdDefinicionCuadroObject) $this->objMapaCuadros->IdDefinicionCuadro = $this->lstIdDefinicionCuadroObject->SelectedValue;
				if ($this->txtCOferta) $this->objMapaCuadros->COferta = $this->txtCOferta->Text;
				if ($this->txtCEstado) $this->objMapaCuadros->CEstado = $this->txtCEstado->Text;


		}


		/**
		 * This will save this object's MapaCuadros instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMapaCuadros() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the MapaCuadros object
				$idReturn = $this->objMapaCuadros->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's MapaCuadros instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMapaCuadros() {
			$this->objMapaCuadros->Delete();
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
				case 'MapaCuadros': return $this->objMapaCuadros;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to MapaCuadros fields -- will be created dynamically if not yet created
				case 'IdDefinicionCuadroControl':
					if (!$this->lstIdDefinicionCuadroObject) return $this->lstIdDefinicionCuadroObject_Create();
					return $this->lstIdDefinicionCuadroObject;
				case 'IdDefinicionCuadroLabel':
					if (!$this->lblIdDefinicionCuadro) return $this->lblIdDefinicionCuadro_Create();
					return $this->lblIdDefinicionCuadro;
				case 'COfertaControl':
					if (!$this->txtCOferta) return $this->txtCOferta_Create();
					return $this->txtCOferta;
				case 'COfertaLabel':
					if (!$this->lblCOferta) return $this->lblCOferta_Create();
					return $this->lblCOferta;
				case 'CEstadoControl':
					if (!$this->txtCEstado) return $this->txtCEstado_Create();
					return $this->txtCEstado;
				case 'CEstadoLabel':
					if (!$this->lblCEstado) return $this->lblCEstado_Create();
					return $this->lblCEstado;
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
					// Controls that point to MapaCuadros fields
					case 'IdDefinicionCuadroControl':
						return ($this->lstIdDefinicionCuadroObject = QType::Cast($mixValue, 'QControl'));
					case 'COfertaControl':
						return ($this->txtCOferta = QType::Cast($mixValue, 'QControl'));
					case 'CEstadoControl':
						return ($this->txtCEstado = QType::Cast($mixValue, 'QControl'));
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