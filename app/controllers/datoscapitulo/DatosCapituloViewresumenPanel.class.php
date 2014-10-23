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
	class DatosCapituloViewresumenPanel extends DatosCapituloViewPanelGen {
		
		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatosCapitulo = null, $strControlId = null) {
									
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strClosePanelMethod , $intIdDatosCapitulo , $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
						
			
		}

		
	}
?>
