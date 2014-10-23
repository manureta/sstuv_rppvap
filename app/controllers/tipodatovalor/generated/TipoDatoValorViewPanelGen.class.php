<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the TipoDatoValor class.  It uses the code-generated
	 * TipoDatoValorMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a TipoDatoValor columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both tipo_dato_valor_edit.php AND
	 * tipo_dato_valor_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package Relevamiento Anual
	 * @subpackage Drafts
	 */
	class TipoDatoValorViewPanelGen extends QPanel {
		// Local instance of the TipoDatoValorMetaControl
		public $mctTipoDatoValor;

		// Controls for TipoDatoValor's Data Fields
		public $lblIdTipoDatoValor;
		public $lblDescripcion;
		public $lblCodigo;
		public $lblCTipoDato;
		public $lblOrden;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
                // button Edit
                public $btnEdit;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdTipoDatoValor = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
/*
			if(is_null($intIdTipoDatoValor))
			$intIdTipoDatoValor = QApplication::QueryString('id');
 */
			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/tipodatovalor/TipoDatoValorViewPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the TipoDatoValorMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctTipoDatoValor = TipoDatoValorMetaControl::Create($this, $intIdTipoDatoValor);

			// Call MetaControl's methods to create qcontrols based on TipoDatoValor's data fields
			$this->lblIdTipoDatoValor = $this->mctTipoDatoValor->lblIdTipoDatoValor_Create();
			$this->lblDescripcion = $this->mctTipoDatoValor->lblDescripcion_Create();
			$this->lblCodigo = $this->mctTipoDatoValor->lblCodigo_Create();
			$this->lblCTipoDato = $this->mctTipoDatoValor->lblCTipoDato_Create();
			$this->lblOrden = $this->mctTipoDatoValor->lblOrden_Create();

			$this->btnEdit = new QButton($this);
                        $this->btnEdit->Text = QApplication::Translate('Edit');
                        $this->btnEdit->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='". __VIRTUAL_DIRECTORY__ ."/tipodatovalor/edit/". $this->mctTipoDatoValor->objTipoDatoValor->IdTipoDatoValor."';"));
		}

		
	}
?>