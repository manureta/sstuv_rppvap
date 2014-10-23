<?php
/**
 * Show a control (if it's hidden)
 * 
 * @package Actions
 */
class QJQShowAction extends QJQAction {
	public function __construct(QControl $objControl, $strMethod = "slow") {        
		parent::__construct($objControl, $strMethod);
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').show('%s');", $this->strControlId, $this->strMethod);
	}
}
