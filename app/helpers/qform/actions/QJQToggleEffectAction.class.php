<?php
/**
 * Toggle visibility of a control, using additional visual effects
 *
 * @package Actions
 */
class QJQToggleEffectAction extends QJQAction {
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, $strMethod = "slow", $strOptions = "", $strSpeed = 1000) {
		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);

		parent::__construct($objControl, $strMethod);
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').toggle('%s', {%s}, %s);", $this->strControlId, $this->strMethod, $this->strOptions, $this->strSpeed);
	}
}	

