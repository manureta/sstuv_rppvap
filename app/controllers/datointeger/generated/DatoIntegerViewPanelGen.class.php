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
	class DatoIntegerViewPanelGen extends QPanel {
		// Local instance of the DatoIntegerMetaControl
		public $mctDatoInteger;

		// Controls for DatoInteger's Data Fields
		public $lblIdDatoInteger;
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

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatoInteger = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
/*
			if(is_null($intIdDatoInteger))
			$intIdDatoInteger = QApplication::QueryString('id');
 */
			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/datointeger/DatoIntegerViewPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DatoIntegerMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDatoInteger = DatoIntegerMetaControl::Create($this, $intIdDatoInteger);

			// Call MetaControl's methods to create qcontrols based on DatoInteger's data fields
			$this->lblIdDatoInteger = $this->mctDatoInteger->lblIdDatoInteger_Create();
			$this->lblIdCampo = $this->mctDatoInteger->lblIdCampo_Create();
			$this->lblIdPersonal = $this->mctDatoInteger->lblIdPersonal_Create();
			$this->lblIdDesignacion = $this->mctDatoInteger->lblIdDesignacion_Create();
			$this->lblValor = $this->mctDatoInteger->lblValor_Create();
			$this->lblFechaModificacion = $this->mctDatoInteger->lblFechaModificacion_Create();

			$this->btnEdit = new QButton($this);
                        $this->btnEdit->Text = QApplication::Translate('Edit');
                        $this->btnEdit->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='". __VIRTUAL_DIRECTORY__ ."/datointeger/edit/". $this->mctDatoInteger->objDatoInteger->IdDatoInteger."';"));
		}

		
	}
?>