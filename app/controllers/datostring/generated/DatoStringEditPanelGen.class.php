<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the DatoString class.  It uses the code-generated
	 * DatoStringMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a DatoString columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both dato_string_edit.php AND
	 * dato_string_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package Relevamiento Anual
	 * @subpackage Drafts
	 */
	class DatoStringEditPanelGen extends QPanel {
		// Local instance of the DatoStringMetaControl
		public $mctDatoString;

		// Controls for DatoString's Data Fields
		public $lblIdDatoString;
		public $lstIdCampoObject;
		public $lstIdPersonalObject;
		public $txtIdDesignacion;
		public $txtValor;
		public $calFechaModificacion;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

                //id variables for meta_create
                protected $intIdDatoString;

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatoString = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}


			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/datostring/DatoStringEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

                        $this->intIdDatoString = $intIdDatoString;

			$this->metaControl_Create();
		}

                protected function metaControl_Create(){
                    // Construct the DatoStringMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDatoString = DatoStringMetaControl::Create($this, $this->intIdDatoString);

			// Call MetaControl's methods to create qcontrols based on DatoString's data fields
			$this->lblIdDatoString = $this->mctDatoString->lblIdDatoString_Create();
			$this->lstIdCampoObject = $this->mctDatoString->lstIdCampoObject_Create();
			$this->lstIdPersonalObject = $this->mctDatoString->lstIdPersonalObject_Create();
			$this->txtIdDesignacion = $this->mctDatoString->txtIdDesignacion_Create();
			$this->txtValor = $this->mctDatoString->txtValor_Create();
			$this->calFechaModificacion = $this->mctDatoString->calFechaModificacion_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('DatoString') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctDatoString->EditMode;
			
                }
		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the DatoStringMetaControl
			$this->mctDatoString->SaveDatoString();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the DatoStringMetaControl
			$this->mctDatoString->DeleteDatoString();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			if(isset($this->ParentControl->pnlEditDatoString)){
				$this->ParentControl->pnlEditDatoString->Visible=false;
				$this->ParentControl->btnCreateNew->Enabled=true;
				$this->ParentControl->Refresh();
			}else{
			QApplication::Redirect(__VIRTUAL_DIRECTORY__."/datostring/list");
			}
		}
	}
?>