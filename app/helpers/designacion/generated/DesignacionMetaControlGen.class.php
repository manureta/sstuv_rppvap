<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Designacion class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Designacion object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DesignacionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read Designacion $Designacion the actual Designacion data class being edited
	 * property QLabel $IdDesignacionControl
	 * property-read QLabel $IdDesignacionLabel
	 * property QTextBox $NombreControl
	 * property-read QLabel $NombreLabel
	 * property QTextBox $DescripcionControl
	 * property-read QLabel $DescripcionLabel
	 * property QListBox $IdUnidadServicioControl
	 * property-read QLabel $IdUnidadServicioLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DesignacionMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Designacion
                */
		public $objDesignacion;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Designacion's individual data fields
		protected $lblIdDesignacion;
		protected $txtNombre;
		protected $txtDescripcion;
		protected $lstIdUnidadServicioObject;

		// Controls that allow the viewing of Designacion's individual data fields
		protected $lblNombre;
		protected $lblDescripcion;
		protected $lblIdUnidadServicio;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DesignacionMetaControl to edit a single Designacion object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Designacion object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DesignacionMetaControl
		 * @param Designacion $objDesignacion new or existing Designacion object
		 */
		 public function __construct($objParentObject, Designacion $objDesignacion) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DesignacionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Designacion object
			$this->objDesignacion = $objDesignacion;

			// Figure out if we're Editing or Creating New
			if ($this->objDesignacion->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DesignacionMetaControl
		 * @param integer $intIdDesignacion primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Designacion object creation - defaults to CreateOrEdit
 		 * @return DesignacionMetaControl
		 */
		public static function Create($objParentObject, $intIdDesignacion = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdDesignacion)) {
				$objDesignacion = Designacion::Load($intIdDesignacion);

				// Designacion was found -- return it!
				if ($objDesignacion)
					return new DesignacionMetaControl($objParentObject, $objDesignacion);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Designacion object with PK arguments: ' . $intIdDesignacion);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DesignacionMetaControl($objParentObject, new Designacion());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DesignacionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Designacion object creation - defaults to CreateOrEdit
		 * @return DesignacionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDesignacion = QApplication::PathInfo(0);
			return DesignacionMetaControl::Create($objParentObject, $intIdDesignacion, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DesignacionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Designacion object creation - defaults to CreateOrEdit
		 * @return DesignacionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdDesignacion = QApplication::QueryString('id');
			return DesignacionMetaControl::Create($objParentObject, $intIdDesignacion, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdDesignacion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdDesignacion_Create($strControlId = null) {
			$this->lblIdDesignacion = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdDesignacion->Name = QApplication::Translate('Id Designacion');
			if ($this->blnEditMode)
				$this->lblIdDesignacion->Text = $this->objDesignacion->IdDesignacion;
			else
				$this->lblIdDesignacion->Text = 'N/A';
			return $this->lblIdDesignacion;
		}

		/**
		 * Create and setup QTextBox txtNombre
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNombre_Create($strControlId = null) {
			$this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNombre->Name = QApplication::Translate('Nombre');
			$this->txtNombre->Text = $this->objDesignacion->Nombre;
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
			$this->lblNombre->Text = $this->objDesignacion->Nombre;
			$this->lblNombre->Required = true;
			return $this->lblNombre;
		}

		/**
		 * Create and setup QTextBox txtDescripcion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescripcion_Create($strControlId = null) {
			$this->txtDescripcion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescripcion->Name = QApplication::Translate('Descripcion');
			$this->txtDescripcion->Text = $this->objDesignacion->Descripcion;
			$this->txtDescripcion->Required = true;
			
			return $this->txtDescripcion;
		}

		/**
		 * Create and setup QLabel lblDescripcion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescripcion_Create($strControlId = null) {
			$this->lblDescripcion = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescripcion->Name = QApplication::Translate('Descripcion');
			$this->lblDescripcion->Text = $this->objDesignacion->Descripcion;
			$this->lblDescripcion->Required = true;
			return $this->lblDescripcion;
		}

		/**
		 * Create and setup QListBox lstIdUnidadServicioObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdUnidadServicioObject_Create($strControlId = null) {
			$this->lstIdUnidadServicioObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdUnidadServicioObject->Name = QApplication::Translate('Id Unidad Servicio Object');
			$this->lstIdUnidadServicioObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdUnidadServicioObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdUnidadServicioObjectArray = UnidadServicio::LoadAll();
			if ($objIdUnidadServicioObjectArray) foreach ($objIdUnidadServicioObjectArray as $objIdUnidadServicioObject) {
				$objListItem = new QListItem($objIdUnidadServicioObject->__toString(), $objIdUnidadServicioObject->IdUnidadServicio);
				if (($this->objDesignacion->IdUnidadServicioObject) && ($this->objDesignacion->IdUnidadServicioObject->IdUnidadServicio == $objIdUnidadServicioObject->IdUnidadServicio))
					$objListItem->Selected = true;
				$this->lstIdUnidadServicioObject->AddItem($objListItem);
			}
			
			return $this->lstIdUnidadServicioObject;
		}

		/**
		 * Create and setup QLabel lblIdUnidadServicio
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdUnidadServicio_Create($strControlId = null) {
			$this->lblIdUnidadServicio = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdUnidadServicio->Name = QApplication::Translate('Id Unidad Servicio Object');
			$this->lblIdUnidadServicio->Text = ($this->objDesignacion->IdUnidadServicioObject) ? $this->objDesignacion->IdUnidadServicioObject->__toString() : null;
			$this->lblIdUnidadServicio->Required = true;
			return $this->lblIdUnidadServicio;
		}



		/**
		 * Refresh this MetaControl with Data from the local Designacion object.
		 * @param boolean $blnReload reload Designacion from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDesignacion->Reload();

			if ($this->lblIdDesignacion) if ($this->blnEditMode) $this->lblIdDesignacion->Text = $this->objDesignacion->IdDesignacion;

			if ($this->txtNombre) $this->txtNombre->Text = $this->objDesignacion->Nombre;
			if ($this->lblNombre) $this->lblNombre->Text = $this->objDesignacion->Nombre;

			if ($this->txtDescripcion) $this->txtDescripcion->Text = $this->objDesignacion->Descripcion;
			if ($this->lblDescripcion) $this->lblDescripcion->Text = $this->objDesignacion->Descripcion;

			if ($this->lstIdUnidadServicioObject) {
					$this->lstIdUnidadServicioObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdUnidadServicioObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdUnidadServicioObjectArray = UnidadServicio::LoadAll();
				if ($objIdUnidadServicioObjectArray) foreach ($objIdUnidadServicioObjectArray as $objIdUnidadServicioObject) {
					$objListItem = new QListItem($objIdUnidadServicioObject->__toString(), $objIdUnidadServicioObject->IdUnidadServicio);
					if (($this->objDesignacion->IdUnidadServicioObject) && ($this->objDesignacion->IdUnidadServicioObject->IdUnidadServicio == $objIdUnidadServicioObject->IdUnidadServicio))
						$objListItem->Selected = true;
					$this->lstIdUnidadServicioObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdUnidadServicio) $this->lblIdUnidadServicio->Text = ($this->objDesignacion->IdUnidadServicioObject) ? $this->objDesignacion->IdUnidadServicioObject->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DESIGNACION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->txtNombre) $this->objDesignacion->Nombre = $this->txtNombre->Text;
				if ($this->txtDescripcion) $this->objDesignacion->Descripcion = $this->txtDescripcion->Text;
				if ($this->lstIdUnidadServicioObject) $this->objDesignacion->IdUnidadServicio = $this->lstIdUnidadServicioObject->SelectedValue;


		}


		/**
		 * This will save this object's Designacion instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDesignacion() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Designacion object
				$idReturn = $this->objDesignacion->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's Designacion instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDesignacion() {
			$this->objDesignacion->Delete();
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
				case 'Designacion': return $this->objDesignacion;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Designacion fields -- will be created dynamically if not yet created
				case 'IdDesignacionControl':
					if (!$this->lblIdDesignacion) return $this->lblIdDesignacion_Create();
					return $this->lblIdDesignacion;
				case 'IdDesignacionLabel':
					if (!$this->lblIdDesignacion) return $this->lblIdDesignacion_Create();
					return $this->lblIdDesignacion;
				case 'NombreControl':
					if (!$this->txtNombre) return $this->txtNombre_Create();
					return $this->txtNombre;
				case 'NombreLabel':
					if (!$this->lblNombre) return $this->lblNombre_Create();
					return $this->lblNombre;
				case 'DescripcionControl':
					if (!$this->txtDescripcion) return $this->txtDescripcion_Create();
					return $this->txtDescripcion;
				case 'DescripcionLabel':
					if (!$this->lblDescripcion) return $this->lblDescripcion_Create();
					return $this->lblDescripcion;
				case 'IdUnidadServicioControl':
					if (!$this->lstIdUnidadServicioObject) return $this->lstIdUnidadServicioObject_Create();
					return $this->lstIdUnidadServicioObject;
				case 'IdUnidadServicioLabel':
					if (!$this->lblIdUnidadServicio) return $this->lblIdUnidadServicio_Create();
					return $this->lblIdUnidadServicio;
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
					// Controls that point to Designacion fields
					case 'IdDesignacionControl':
						return ($this->lblIdDesignacion = QType::Cast($mixValue, 'QControl'));
					case 'NombreControl':
						return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
					case 'DescripcionControl':
						return ($this->txtDescripcion = QType::Cast($mixValue, 'QControl'));
					case 'IdUnidadServicioControl':
						return ($this->lstIdUnidadServicioObject = QType::Cast($mixValue, 'QControl'));
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