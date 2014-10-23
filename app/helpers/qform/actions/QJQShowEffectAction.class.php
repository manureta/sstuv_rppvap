<?php
/**
 * Show a control (if it's hidden) using additional visual effects.
 * 
 * @package Actions
 */
class QJQShowEffectAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strMethod = "default", $strOptions = "", $strSpeed = 1000) {        
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);
		
		parent::__construct($objControl, $strMethod);
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').show('%s', {%s}, %s);", $this->strControlId, $this->strMethod, $this->strOptions, $this->strSpeed);
	}
}	
