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
	class DatoStringViewPanelGen extends QPanel {
		// Local instance of the DatoStringMetaControl
		public $mctDatoString;

		// Controls for DatoString's Data Fields
		public $lblIdDatoString;
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

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatoString = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
/*
			if(is_null($intIdDatoString))
			$intIdDatoString = QApplication::QueryString('id');
 */
			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/datostring/DatoStringViewPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DatoStringMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDatoString = DatoStringMetaControl::Create($this, $intIdDatoString);

			// Call MetaControl's methods to create qcontrols based on DatoString's data fields
			$this->lblIdDatoString = $this->mctDatoString->lblIdDatoString_Create();
			$this->lblIdCampo = $this->mctDatoString->lblIdCampo_Create();
			$this->lblIdPersonal = $this->mctDatoString->lblIdPersonal_Create();
			$this->lblIdDesignacion = $this->mctDatoString->lblIdDesignacion_Create();
			$this->lblValor = $this->mctDatoString->lblValor_Create();
			$this->lblFechaModificacion = $this->mctDatoString->lblFechaModificacion_Create();

			$this->btnEdit = new QButton($this);
                        $this->btnEdit->Text = QApplication::Translate('Edit');
                        $this->btnEdit->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='". __VIRTUAL_DIRECTORY__ ."/datostring/edit/". $this->mctDatoString->objDatoString->IdDatoString."';"));
		}

		
	}
?>