<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Dato class.  It uses the code-generated
	 * DatoMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Dato columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both dato_edit.php AND
	 * dato_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package Relevamiento Anual
	 * @subpackage Drafts
	 */
	class DatoEditPanelGen extends QPanel {
		// Local instance of the DatoMetaControl
		public $mctDato;

		// Controls for Dato's Data Fields
		public $lblIdDato;
		public $lstIdCampoObject;
		public $lstIdPersonalObject;
		public $lstIdDesignacionObject;
		public $txtValor;
		public $calFechaModificacion;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

                //id variables for meta_create
                protected $intIdDato;

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDato = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}


			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/dato/DatoEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

                        $this->intIdDato = $intIdDato;

			$this->metaControl_Create();
		}

                protected function metaControl_Create(){
                    // Construct the DatoMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDato = DatoMetaControl::Create($this, $this->intIdDato);

			// Call MetaControl's methods to create qcontrols based on Dato's data fields
			$this->lblIdDato = $this->mctDato->lblIdDato_Create();
			$this->lstIdCampoObject = $this->mctDato->lstIdCampoObject_Create();
			$this->lstIdPersonalObject = $this->mctDato->lstIdPersonalObject_Create();
			$this->lstIdDesignacionObject = $this->mctDato->lstIdDesignacionObject_Create();
			$this->txtValor = $this->mctDato->txtValor_Create();
			$this->calFechaModificacion = $this->mctDato->calFechaModificacion_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Dato') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctDato->EditMode;
			
                }
		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the DatoMetaControl
			$this->mctDato->SaveDato();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the DatoMetaControl
			$this->mctDato->DeleteDato();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			if(isset($this->ParentControl->pnlEditDato)){
				$this->ParentControl->pnlEditDato->Visible=false;
				$this->ParentControl->btnCreateNew->Enabled=true;
				$this->ParentControl->Refresh();
			}else{
			QApplication::Redirect(__VIRTUAL_DIRECTORY__."/dato/list");
			}
		}
	}
?>