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
	class DatoEditPanel extends DatoEditPanelGen {
		
		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDato = null, $strControlId = null) {
									
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strClosePanelMethod , $intIdDato , $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
						
			
		}

		
	}
?>