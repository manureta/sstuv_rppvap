<?php

class LogsIndexPanel extends QPanel {

    public $lblCommon;
    public $lblError;
    public $lblDebug;

    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Template = __VIEW_DIR__ . '/logs/LogsIndexPanel.tpl.php';

        $this->lblCommon = new QLabel($this);
        $this->lblCommon->Name = "Log";
        $this->lblCommon->HtmlEntities = false;
        $this->lblCommon->Height = '10px';
        $this->lblCommon->Text = sprintf("<pre>%s</pre>",LogHelper::Tail());

        $this->lblDebug = new QLabel($this);
        $this->lblDebug->Name = "Debug";
        $this->lblDebug->HtmlEntities = false;
        $this->lblDebug->Height = '10px';
        $this->lblDebug->Text = sprintf("<pre>%s</pre>",LogHelper::Tail('debug.log',500));

        $this->lblError = new QLabel($this);
        $this->lblError->Name = "Error";
        $this->lblError->HtmlEntities = false;
        $this->lblError->Height = '10px';
        $this->lblError->Text = sprintf("<pre>%s</pre>",LogHelper::Tail('error.log',100));
    }

}

?>
