<?php
/**
 * Transfer the border of a control to another control
 * 
 * @package Actions
 */
class QJQTransferAction extends QJQAction {
	protected $strTargetControlId = null;
	protected $strOptions = null;
	protected $strSpeed = null;

	public function __construct(QControl $objControl, QControl $objTargetControl, $strOptions = "", $strSpeed = 1000) {
		$this->strTargetControlId = $objTargetControl->ControlId;

		$this->strOptions = QType::Cast($strOptions, QType::String);
		$this->strSpeed = QType::Cast($strSpeed, QType::String);

		parent::__construct($objControl, 'transfer');
	}

	public function RenderScript(QControl $objControl) {
		return sprintf("$('#%s').effect('transfer', {to: '#%s_ctl' %s}, %s);", $this->strControlId, $this->strTargetControlId, $this->strOptions, $this->strSpeed);
	}
}
