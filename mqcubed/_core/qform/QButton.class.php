<?php

class QButton extends QButtonBase {

    ///////////////////////////
    // Button Preferences
    ///////////////////////////
    // Feel free to specify global display preferences/defaults for all QButton controls
    protected $strCssClass = 'btn';
//		protected $strFontNames = QFontFamily::Verdana;
//		protected $strFontSize = '10px';
//		protected $blnFontBold = true;
    protected $strPlaceHolder;
    protected $strIcon;

    //////////
    // Methods
    //////////
    protected function GetControlHtml() {
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strStyle = sprintf('style="%s"', $strStyle);

        if ($this->blnPrimaryButton)
            $strCommand = "submit";
        else
            $strCommand = "button";

        $strToReturn = sprintf('<button type="%s" class="%s%s" name="%s" id="%s" %s%s>%s%s</button>', 
                $strCommand, 
                ($this->blnPrimaryButton) ? 'btn-primary' : '', 
                ($this->strCssClass) ? ' '.$this->strCssClass : '', 
                $this->strControlId, $this->strControlId, 
                $this->GetAttributes(), 
                $strStyle,
                ($this->strIcon) ? '<i class="icon-'.$this->strIcon.'"></i>' : '',
                ($this->blnHtmlEntities) ? QApplication::HtmlEntities($this->strText) : $this->strText
                );

        return $strToReturn;
    }

    public function GetAttributes($blnIncludeCustom = true, $blnIncludeAction = true) {
        $strToReturn = "";

        if (!$this->blnEnabled)
            $strToReturn .= 'disabled="disabled" ';
        if ($this->intTabIndex)
            $strToReturn .= sprintf('tabindex="%s" ', $this->intTabIndex);
        if ($this->strToolTip)
            $strToReturn .= sprintf('title="%s" ', $this->strToolTip);
        if ($this->strAccessKey)
            $strToReturn .= sprintf('accesskey="%s" ', $this->strAccessKey);

        if ($blnIncludeCustom)
            $strToReturn .= $this->GetCustomAttributes();

        if ($blnIncludeAction)
            $strToReturn .= $this->GetActionAttributes();

        return $strToReturn;
    }

    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            // APPEARANCE
            case "Icon": return $this->strIcon;
            case "PlaceHolder": return $this->strPlaceHolder;

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
            case "Icon":
                try {
                    $this->strIcon = QType::Cast($mixValue, QType::String);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case "PlaceHolder":
                try {
                    $this->strPlaceHolder = QType::Cast($mixValue, QType::String);
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