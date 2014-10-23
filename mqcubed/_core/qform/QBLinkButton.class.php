<?php

class QBLinkButton extends QLinkButton {

    ///////////////////////////
    // Private Member Variables
    ///////////////////////////
    // APPEARANCE
    protected $strIcon;

    //////////
    // Methods
    //////////
    protected function GetControlHtml() {
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle) {
            $strStyle = sprintf('style="%s"', $strStyle);
        }
        $strToReturn = sprintf('<a href="#" id="%s" %s%s>%s%s</a>', 
                $this->strControlId, 
                $this->GetAttributes(), 
                $strStyle, 
                ($this->blnHtmlEntities) ? QApplication::HtmlEntities($this->strText) : $this->strText,
                ($this->strIcon) ? '<i class="icon-' . $this->strIcon . '"></i>' : '');

        return $strToReturn;
    }

    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            // APPEARANCE
            case "Icon": return $this->strIcon;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////
    public function __set($strName, $mixValue) {
        $this->blnModified = true;

        switch ($strName) {
            // APPEARANCE
            case "Icon":
                try {
                    $this->strIcon = QType::Cast($mixValue, QType::String);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            default:
                try {
                    parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;
        }
    }

}

?>