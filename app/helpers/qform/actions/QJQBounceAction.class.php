<?php
/**
 * Make a control bounce up and down.
 * 
 * @package Actions
 */
class QJQBounceAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strOptions = "", $strSpeed = 1000) {
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);        

		parent::__construct($objControl, 'bounce');
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s_ctl').effect('bounce', {%s}, %s);", $this->strControlId, $this->strOptions, $this->strSpeed);
	}
}
