<?php
/**
 * Resize a control
 * 
 * @package Actions
 */
class QJQSizeAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strOptions, $strSpeed = 1000) {
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);
		
		parent::__construct($objControl, 'pulsate');
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').effect('size', {%s}, %s);", $this->strControlId, $this->strOptions, $this->strSpeed);
	}
}
