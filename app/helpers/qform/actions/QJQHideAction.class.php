<?php
/**
 * Hide a control (if it's visible)
 * 
 * @package Actions
 */
class QJQHideAction extends QJQAction {
	public function __construct(QControl $objControl, $strMethod = "slow") {
		parent::__construct($objControl, $strMethod);
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').hide('%s');", $this->strControlId, $this->strMethod);		  
	}
}
