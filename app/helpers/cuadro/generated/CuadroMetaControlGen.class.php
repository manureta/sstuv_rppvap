<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Cuadro class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Cuadro object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CuadroMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 * property-read Cuadro $Cuadro the actual Cuadro data class being edited
	 * property QLabel $IdCuadroControl
	 * property-read QLabel $IdCuadroLabel
	 * property QIntegerTextBox $PaginaControl
	 * property-read QLabel $PaginaLabel
	 * property QIntegerTextBox $OrdenControl
	 * property-read QLabel $OrdenLabel
	 * property QTextBox $NombreControl
	 * property-read QLabel $NombreLabel
	 * property QTextBox $NumeroControl
	 * property-read QLabel $NumeroLabel
	 * property QCheckBox $ErrorControl
	 * property-read QLabel $ErrorLabel
	 * property QListBox $ConsistenciaControl
	 * property-read QLabel $ConsistenciaLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CuadroMetaControlGen extends QBaseClass {
		// General Variables
                /**
                * public access class for anpersistence assotiations
                *@var Cuadro
                */
		public $objCuadro;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Cuadro's individual data fields
		protected $lblIdCuadro;
		protected $txtPagina;
		protected $txtOrden;
		protected $txtNombre;
		protected $txtNumero;
		protected $chkError;

		// Controls that allow the viewing of Cuadro's individual data fields
		protected $lblPagina;
		protected $lblOrden;
		protected $lblNombre;
		protected $lblNumero;
		protected $lblError;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstConsistencias;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblConsistencias;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CuadroMetaControl to edit a single Cuadro object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Cuadro object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CuadroMetaControl
		 * @param Cuadro $objCuadro new or existing Cuadro object
		 */
		 public function __construct($objParentObject, Cuadro $objCuadro) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CuadroMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Cuadro object
			$this->objCuadro = $objCuadro;

			// Figure out if we're Editing or Creating New
			if ($this->objCuadro->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CuadroMetaControl
		 * @param integer $intIdCuadro primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Cuadro object creation - defaults to CreateOrEdit
 		 * @return CuadroMetaControl
		 */
		public static function Create($objParentObject, $intIdCuadro = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdCuadro)) {
				$objCuadro = Cuadro::Load($intIdCuadro);

				// Cuadro was found -- return it!
				if ($objCuadro)
					return new CuadroMetaControl($objParentObject, $objCuadro);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Cuadro object with PK arguments: ' . $intIdCuadro);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CuadroMetaControl($objParentObject, new Cuadro());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CuadroMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Cuadro object creation - defaults to CreateOrEdit
		 * @return CuadroMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdCuadro = QApplication::PathInfo(0);
			return CuadroMetaControl::Create($objParentObject, $intIdCuadro, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CuadroMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Cuadro object creation - defaults to CreateOrEdit
		 * @return CuadroMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdCuadro = QApplication::QueryString('id');
			return CuadroMetaControl::Create($objParentObject, $intIdCuadro, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdCuadro
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdCuadro_Create($strControlId = null) {
			$this->lblIdCuadro = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdCuadro->Name = QApplication::Translate('Id Cuadro');
			if ($this->blnEditMode)
				$this->lblIdCuadro->Text = $this->objCuadro->IdCuadro;
			else
				$this->lblIdCuadro->Text = 'N/A';
			return $this->lblIdCuadro;
		}

		/**
		 * Create and setup QIntegerTextBox txtPagina
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPagina_Create($strControlId = null) {
			$this->txtPagina = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPagina->Name = QApplication::Translate('Pagina');
			$this->txtPagina->Text = $this->objCuadro->Pagina;
			$this->txtPagina->Required = true;
                        $this->txtPagina->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this->txtPagina->Minimum = QDatabaseNumberFieldMin::Smallint;
			return $this->txtPagina;
		}

		/**
		 * Create and setup QLabel lblPagina
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPagina_Create($strControlId = null, $strFormat = null) {
			$this->lblPagina = new QLabel($this->objParentObject, $strControlId);
			$this->lblPagina->Name = QApplication::Translate('Pagina');
			$this->lblPagina->Text = $this->objCuadro->Pagina;
			$this->lblPagina->Required = true;
			$this->lblPagina->Format = $strFormat;
			return $this->lblPagina;
		}

		/**
		 * Create and setup QIntegerTextBox txtOrden
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrden_Create($strControlId = null) {
			$this->txtOrden = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrden->Name = QApplication::Translate('Orden');
			$this->txtOrden->Text = $this->objCuadro->Orden;
                        $this->txtOrden->Maximum = QDatabaseNumberFieldMax::Smallint;
                        $this->txtOrden->Minimum = QDatabaseNumberFieldMin::Smallint;
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
			$this->lblOrden->Text = $this->objCuadro->Orden;
			$this->lblOrden->Format = $strFormat;
			return $this->lblOrden;
		}

		/**
		 * Create and setup QTextBox txtNombre
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNombre_Create($strControlId = null) {
			$this->txtNombre = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNombre->Name = QApplication::Translate('Nombre');
			$this->txtNombre->Text = $this->objCuadro->Nombre;
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
			$this->lblNombre->Text = $this->objCuadro->Nombre;
			$this->lblNombre->Required = true;
			return $this->lblNombre;
		}

		/**
		 * Create and setup QTextBox txtNumero
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNumero_Create($strControlId = null) {
			$this->txtNumero = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNumero->Name = QApplication::Translate('Numero');
			$this->txtNumero->Text = $this->objCuadro->Numero;
			$this->txtNumero->Required = true;
			
			return $this->txtNumero;
		}

		/**
		 * Create and setup QLabel lblNumero
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNumero_Create($strControlId = null) {
			$this->lblNumero = new QLabel($this->objParentObject, $strControlId);
			$this->lblNumero->Name = QApplication::Translate('Numero');
			$this->lblNumero->Text = $this->objCuadro->Numero;
			$this->lblNumero->Required = true;
			return $this->lblNumero;
		}

		/**
		 * Create and setup QCheckBox chkError
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkError_Create($strControlId = null) {
			$this->chkError = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkError->Name = QApplication::Translate('Error');
			$this->chkError->Checked = $this->objCuadro->Error;
                        return $this->chkError;
		}

		/**
		 * Create and setup QLabel lblError
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblError_Create($strControlId = null) {
			$this->lblError = new QLabel($this->objParentObject, $strControlId);
			$this->lblError->Name = QApplication::Translate('Error');
			$this->lblError->Text = ($this->objCuadro->Error) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblError;
		}

		/**
		 * Create and setup QListBox lstConsistencias
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstConsistencias_Create($strControlId = null) {
			$this->lstConsistencias = new QListBox($this->objParentObject, $strControlId);
			$this->lstConsistencias->Name = QApplication::Translate('Consistencias');
			$this->lstConsistencias->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objCuadro->GetConsistenciaArray();
			$objConsistenciaArray = Consistencia::LoadAll();
			if ($objConsistenciaArray) foreach ($objConsistenciaArray as $objConsistencia) {
				$objListItem = new QListItem($objConsistencia->__toString(), $objConsistencia->IdDefinicionConsistencia);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->IdDefinicionConsistencia == $objConsistencia->IdDefinicionConsistencia)
						$objListItem->Selected = true;
				}
				$this->lstConsistencias->AddItem($objListItem);
			}
			
			return $this->lstConsistencias;
		}

		/**
		 * Create and setup QLabel lblConsistencias
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblConsistencias_Create($strControlId = null, $strGlue = ', ') {
			$this->lblConsistencias = new QLabel($this->objParentObject, $strControlId);
			$this->lblConsistencias->Name = QApplication::Translate('Consistencias');
			
			$objAssociatedArray = $this->objCuadro->GetConsistenciaArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblConsistencias->Text = implode($strGlue, $strItems);
			return $this->lblConsistencias;
		}




		/**
		 * Refresh this MetaControl with Data from the local Cuadro object.
		 * @param boolean $blnReload reload Cuadro from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCuadro->Reload();

			if ($this->lblIdCuadro) if ($this->blnEditMode) $this->lblIdCuadro->Text = $this->objCuadro->IdCuadro;

			if ($this->txtPagina) $this->txtPagina->Text = $this->objCuadro->Pagina;
			if ($this->lblPagina) $this->lblPagina->Text = $this->objCuadro->Pagina;

			if ($this->txtOrden) $this->txtOrden->Text = $this->objCuadro->Orden;
			if ($this->lblOrden) $this->lblOrden->Text = $this->objCuadro->Orden;

			if ($this->txtNombre) $this->txtNombre->Text = $this->objCuadro->Nombre;
			if ($this->lblNombre) $this->lblNombre->Text = $this->objCuadro->Nombre;

			if ($this->txtNumero) $this->txtNumero->Text = $this->objCuadro->Numero;
			if ($this->lblNumero) $this->lblNumero->Text = $this->objCuadro->Numero;

			if ($this->chkError) $this->chkError->Checked = $this->objCuadro->Error;
			if ($this->lblError) $this->lblError->Text = ($this->objCuadro->Error) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstConsistencias) {
				$this->lstConsistencias->RemoveAllItems();
				$objAssociatedArray = $this->objCuadro->GetConsistenciaArray();
				$objConsistenciaArray = Consistencia::LoadAll();
				if ($objConsistenciaArray) foreach ($objConsistenciaArray as $objConsistencia) {
					$objListItem = new QListItem($objConsistencia->__toString(), $objConsistencia->IdDefinicionConsistencia);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->IdDefinicionConsistencia == $objConsistencia->IdDefinicionConsistencia)
							$objListItem->Selected = true;
					}
					$this->lstConsistencias->AddItem($objListItem);
				}
			}
			if ($this->lblConsistencias) {
				$objAssociatedArray = $this->objCuadro->GetConsistenciaArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblConsistencias->Text = implode($this->strConsistenciaGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstConsistencias_Update() {
			if ($this->lstConsistencias) {
				$this->objCuadro->UnassociateAllConsistencias();
				$objSelectedListItems = $this->lstConsistencias->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCuadro->AssociateConsistencia(Consistencia::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC CUADRO OBJECT MANIPULATORS
		///////////////////////////////////////////////

		public function Bind(){
				// Update any fields for controls that have been created
				if ($this->txtPagina) $this->objCuadro->Pagina = $this->txtPagina->Text;
				if ($this->txtOrden) $this->objCuadro->Orden = $this->txtOrden->Text;
				if ($this->txtNombre) $this->objCuadro->Nombre = $this->txtNombre->Text;
				if ($this->txtNumero) $this->objCuadro->Numero = $this->txtNumero->Text;
				if ($this->chkError) $this->objCuadro->Error = $this->chkError->Checked;


		}


		/**
		 * This will save this object's Cuadro instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCuadro() {
			try {
                                $this->Bind();
				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Cuadro object
				$idReturn = $this->objCuadro->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstConsistencias_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                        return $idReturn;
		}

		/**
		 * This will DELETE this object's Cuadro instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCuadro() {
			$this->objCuadro->UnassociateAllConsistencias();
			$this->objCuadro->Delete();
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
				case 'Cuadro': return $this->objCuadro;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Cuadro fields -- will be created dynamically if not yet created
				case 'IdCuadroControl':
					if (!$this->lblIdCuadro) return $this->lblIdCuadro_Create();
					return $this->lblIdCuadro;
				case 'IdCuadroLabel':
					if (!$this->lblIdCuadro) return $this->lblIdCuadro_Create();
					return $this->lblIdCuadro;
				case 'PaginaControl':
					if (!$this->txtPagina) return $this->txtPagina_Create();
					return $this->txtPagina;
				case 'PaginaLabel':
					if (!$this->lblPagina) return $this->lblPagina_Create();
					return $this->lblPagina;
				case 'OrdenControl':
					if (!$this->txtOrden) return $this->txtOrden_Create();
					return $this->txtOrden;
				case 'OrdenLabel':
					if (!$this->lblOrden) return $this->lblOrden_Create();
					return $this->lblOrden;
				case 'NombreControl':
					if (!$this->txtNombre) return $this->txtNombre_Create();
					return $this->txtNombre;
				case 'NombreLabel':
					if (!$this->lblNombre) return $this->lblNombre_Create();
					return $this->lblNombre;
				case 'NumeroControl':
					if (!$this->txtNumero) return $this->txtNumero_Create();
					return $this->txtNumero;
				case 'NumeroLabel':
					if (!$this->lblNumero) return $this->lblNumero_Create();
					return $this->lblNumero;
				case 'ErrorControl':
					if (!$this->chkError) return $this->chkError_Create();
					return $this->chkError;
				case 'ErrorLabel':
					if (!$this->lblError) return $this->lblError_Create();
					return $this->lblError;
				case 'ConsistenciaControl':
					if (!$this->lstConsistencias) return $this->lstConsistencias_Create();
					return $this->lstConsistencias;
				case 'ConsistenciaLabel':
					if (!$this->lblConsistencias) return $this->lblConsistencias_Create();
					return $this->lblConsistencias;
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
					// Controls that point to Cuadro fields
					case 'IdCuadroControl':
						return ($this->lblIdCuadro = QType::Cast($mixValue, 'QControl'));
					case 'PaginaControl':
						return ($this->txtPagina = QType::Cast($mixValue, 'QControl'));
					case 'OrdenControl':
						return ($this->txtOrden = QType::Cast($mixValue, 'QControl'));
					case 'NombreControl':
						return ($this->txtNombre = QType::Cast($mixValue, 'QControl'));
					case 'NumeroControl':
						return ($this->txtNumero = QType::Cast($mixValue, 'QControl'));
					case 'ErrorControl':
						return ($this->chkError = QType::Cast($mixValue, 'QControl'));
					case 'ConsistenciaControl':
						return ($this->lstConsistencias = QType::Cast($mixValue, 'QControl'));
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