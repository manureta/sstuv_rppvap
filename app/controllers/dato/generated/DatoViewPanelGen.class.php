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
	class DatoViewPanelGen extends QPanel {
		// Local instance of the DatoMetaControl
		public $mctDato;

		// Controls for Dato's Data Fields
		public $lblIdDato;
		public $lblIdCampo;
		public $lblIdPersonal;
		public $lblIdDesignacion;
		public $lblValor;
		public $lblFechaModificacion;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
                // button Edit
                public $btnEdit;

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
/*
			if(is_null($intIdDato))
			$intIdDato = QApplication::QueryString('id');
 */
			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/dato/DatoViewPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DatoMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDato = DatoMetaControl::Create($this, $intIdDato);

			// Call MetaControl's methods to create qcontrols based on Dato's data fields
			$this->lblIdDato = $this->mctDato->lblIdDato_Create();
			$this->lblIdCampo = $this->mctDato->lblIdCampo_Create();
			$this->lblIdPersonal = $this->mctDato->lblIdPersonal_Create();
			$this->lblIdDesignacion = $this->mctDato->lblIdDesignacion_Create();
			$this->lblValor = $this->mctDato->lblValor_Create();
			$this->lblFechaModificacion = $this->mctDato->lblFechaModificacion_Create();

			$this->btnEdit = new QButton($this);
                        $this->btnEdit->Text = QApplication::Translate('Edit');
                        $this->btnEdit->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='". __VIRTUAL_DIRECTORY__ ."/dato/edit/". $this->mctDato->objDato->IdDato."';"));
		}

		
	}
?>