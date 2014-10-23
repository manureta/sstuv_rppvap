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
	class TipoDatoValorViewresumenPanel extends TipoDatoValorViewPanelGen {
		
		public function __construct($objParentObject, $strClosePanelMethod = null, $intIdTipoDatoValor = null, $strControlId = null) {
									
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strClosePanelMethod , $intIdTipoDatoValor , $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
						
			
		}

		
	}
?>
