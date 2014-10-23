<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the DatosCapitulo class.  It uses the code-generated
	 * DatosCapituloMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a DatosCapitulo columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both datos_capitulo_edit.php AND
	 * datos_capitulo_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package Relevamiento Anual
	 * @subpackage Drafts
	 */
	class DatosCapituloViewPanelGen extends QPanel {
		// Local instance of the DatosCapituloMetaControl
		public $mctDatosCapitulo;

		// Controls for DatosCapitulo's Data Fields
		public $lblIdDatosCapitulo;
		public $lblIdDefinicionCapitulo;
		public $lblCEstado;
		public $lblIdDatosCuadernillo;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
                // button Edit
                public $btnEdit;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatosCapitulo = null, $strControlId = null) {


			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
/*
			if(is_null($intIdDatosCapitulo))
			$intIdDatosCapitulo = QApplication::QueryString('id');
 */
			// Setup Callback and Template
			$this->strTemplate = __VIEW_DIR__.'/datoscapitulo/DatosCapituloViewPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DatosCapituloMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDatosCapitulo = DatosCapituloMetaControl::Create($this, $intIdDatosCapitulo);

			// Call MetaControl's methods to create qcontrols based on DatosCapitulo's data fields
			$this->lblIdDatosCapitulo = $this->mctDatosCapitulo->lblIdDatosCapitulo_Create();
			$this->lblIdDefinicionCapitulo = $this->mctDatosCapitulo->lblIdDefinicionCapitulo_Create();
			$this->lblCEstado = $this->mctDatosCapitulo->lblCEstado_Create();
			$this->lblIdDatosCuadernillo = $this->mctDatosCapitulo->lblIdDatosCuadernillo_Create();

			$this->btnEdit = new QButton($this);
                        $this->btnEdit->Text = QApplication::Translate('Edit');
                        $this->btnEdit->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='". __VIRTUAL_DIRECTORY__ ."/datoscapitulo/edit/". $this->mctDatosCapitulo->objDatosCapitulo->IdDatosCapitulo."';"));
		}

		
	}
?>