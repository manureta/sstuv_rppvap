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
	class DatoStringViewPanel extends DatoStringViewPanelGen {
		
		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdDatoString = null, $strControlId = null) {
									
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strClosePanelMethod , $intIdDatoString , $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
						
			
		}

		
	}
?>