<?php
/**
 * Make a control shake left and right
 * 
 * @package Actions
 */
class QJQShakeAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strOptions = "", $strSpeed = 1000) {
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);
		
		parent::__construct($objControl, 'shake');
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s_ctl').effect('shake', {%s}, %s);", $this->strControlId, $this->strOptions, $this->strSpeed);		  
	}
}
