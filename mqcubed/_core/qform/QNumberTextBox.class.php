<?php
class QNumberTextBox extends QIntegerTextBox {
    protected $intDecimals = 0;

    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetCustomStyle('text-align', 'right');
        $this->strJavaScripts = '_core/number.js';
    }

    public function GetEndScript() {
        $strScript = parent::GetEndScript();
        $strScript .= sprintf("qc.getC('%s').onkeyup = function () { solonumeros(this, %d); };", $this->ControlId, $this->intDecimals);
        $strScript .= sprintf("qc.getC('%s').onfocus = function () { this.select(); };", $this->ControlId);
        return $strScript;
    }

    //TODO set y get de decimals


}
?>
