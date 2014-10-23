<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the DatoInteger class.  It uses the code-generated
	 * DatoIntegerMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a DatoInteger columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both dato_integer_edit.php AND
	 * dato_integer_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package Relevamiento Anual
	 * @subpackage Drafts
	 */
	class DatoIntegerEditPanelGen extends QPanel {
		// Local instance of the DatoIntegerMetaControl
		public $mctDatoInteger;

		// Controls for DatoInteger's Data Fields
		public $lblIdDatoInteger;
		public $lstIdCampoObject;
		public $lstIdPersonalObject;
		public $txtIdDesignacion;
		public $txtValor;
		public $calFechaModificacion;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

                //id variables for meta_create
                protected $intIdDatoInteger;

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatoInteger = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}


			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/datointeger/DatoIntegerEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

                        $this->intIdDatoInteger = $intIdDatoInteger;

			$this->metaControl_Create();
		}

                protected function metaControl_Create(){
                    // Construct the DatoIntegerMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDatoInteger = DatoIntegerMetaControl::Create($this, $this->intIdDatoInteger);

			// Call MetaControl's methods to create qcontrols based on DatoInteger's data fields
			$this->lblIdDatoInteger = $this->mctDatoInteger->lblIdDatoInteger_Create();
			$this->lstIdCampoObject = $this->mctDatoInteger->lstIdCampoObject_Create();
			$this->lstIdPersonalObject = $this->mctDatoInteger->lstIdPersonalObject_Create();
			$this->txtIdDesignacion = $this->mctDatoInteger->txtIdDesignacion_Create();
			$this->txtValor = $this->mctDatoInteger->txtValor_Create();
			$this->calFechaModificacion = $this->mctDatoInteger->calFechaModificacion_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('DatoInteger') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctDatoInteger->EditMode;
			
                }
		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the DatoIntegerMetaControl
			$this->mctDatoInteger->SaveDatoInteger();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the DatoIntegerMetaControl
			$this->mctDatoInteger->DeleteDatoInteger();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			if(isset($this->ParentControl->pnlEditDatoInteger)){
				$this->ParentControl->pnlEditDatoInteger->Visible=false;
				$this->ParentControl->btnCreateNew->Enabled=true;
				$this->ParentControl->Refresh();
			}else{
			QApplication::Redirect(__VIRTUAL_DIRECTORY__."/datointeger/list");
			}
		}
	}
?>