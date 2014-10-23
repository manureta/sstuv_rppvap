<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the DatoInteger class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of DatoInteger objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this DatoIntegerListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package Relevamiento Anual
	 * @subpackage Drafts
	 * 
	 */
	class DatoIntegerListPanel extends DatoIntegerListPanelGen {
		
		
		public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {									
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
                }
			

			
	}
?>