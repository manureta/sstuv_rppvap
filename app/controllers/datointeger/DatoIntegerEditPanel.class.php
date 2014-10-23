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
	class DatoIntegerEditPanel extends DatoIntegerEditPanelGen {
		
		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatoInteger = null, $strControlId = null) {
									
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strClosePanelMethod , $intIdDatoInteger , $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
						
			
		}

		
	}
?>