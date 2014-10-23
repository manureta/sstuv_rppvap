<?php
/**
 * Pulsate the contents of a control
 * 
 * @package Actions
 */
class QJQPulsateAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strOptions = "", $strSpeed = 1000) {
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);
		
		parent::__construct($objControl, 'pulsate');
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').effect('pulsate', {%s}, %s);", $this->strControlId, $this->strOptions, $this->strSpeed);
	}
}
