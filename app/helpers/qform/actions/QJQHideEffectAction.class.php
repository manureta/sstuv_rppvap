<?php
/**
 * Hide a control, using additional visual effects.
 * 
 * @package Actions
 */
class QJQHideEffectAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strMethod = "blind", $strOptions = "", $strSpeed = 1000) {
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);
		
		parent::__construct($objControl, $strMethod);
		
	}

	public function RenderScript(QControl $objControl) {
		$objControl->Text = "";
		return sprintf("$('#%s').hide('%s', {%s}, %s);", $this->strControlId, $this->strMethod, $this->strOptions, $this->strSpeed);		  
	}
}
