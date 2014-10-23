<?php
/**
 * Toggle visibility of a control.
 * 
 * @package Actions
 */
class QJQToggleAction extends QJQAction {
	public function __construct(QControl $objControl, $strMethod = "slow") {
		parent::__construct($objControl, $strMethod);
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').toggle('%s');", $this->strControlId, $this->strMethod);		  
	}
}
