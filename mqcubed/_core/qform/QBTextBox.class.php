<?php

class QBTextBox extends QTextBoxBase {

    ///////////////////////////
    // TextBox Preferences
    ///////////////////////////
    // Feel free to specify global display preferences/defaults for all QTextBox controls
    protected $strCssClass = 'form-control';
    protected $strPlaceHolder;
    protected $strIcon;

    //////////
    // Methods
    //////////

    protected function GetControlHtml() {
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strStyle = sprintf('style="%s"', $strStyle);
        $str = (strpos($this->strCssClass, 'block')) ? '<label class="block"><span class="block' : '<label><span class="';
        if ($this->strIcon) {
            $str .= ' input-icon input-icon-right">%s<i class="icon-' . $this->strIcon . '"></i></span></label>';
        } else {
            $str .= '">%s</span></label>';
        }
        switch ($this->strTextMode) {
            case QTextMode::MultiLine:
                $strToReturn = sprintf($str, sprintf('<textarea name="%s" id="%s" %s%s  ##PLACEHOLDER##>' . $this->strFormat . '</textarea>', $this->strControlId, $this->strControlId, $this->GetAttributes(), $strStyle, QApplication::HtmlEntities($this->strText)));
                break;
            case QTextMode::Password:
                $strToReturn = sprintf($str, sprintf('<input type="password" name="%s" id="%s" value="' . $this->strFormat . '" %s%s ##PLACEHOLDER## />', $this->strControlId, $this->strControlId, QApplication::HtmlEntities($this->strText), $this->GetAttributes(), $strStyle));
                break;
            case QTextMode::SingleLine:
            default:
                $strToReturn = sprintf($str, sprintf('<input type="text" name="%s" id="%s" value="' . $this->strFormat . '" %s%s  ##PLACEHOLDER## />', $this->strControlId, $this->strControlId, QApplication::HtmlEntities($this->strText), $this->GetAttributes(), $strStyle));
        }
        $strToReturn = str_replace('##PLACEHOLDER##', ($this->strPlaceHolder ? ' placeholder="' . $this->strPlaceHolder . '"' : ''), $strToReturn);
        return $strToReturn;
    }

    public function RenderWithError($blnDisplayOutput = true) {
        // Call RenderHelper
        $this->RenderHelper(func_get_args(), __FUNCTION__);

        try {
            $strOutput = $this->GetControlHtml();
            if ($this->strValidationError) {
                $strOutput = sprintf('<div class="has-error">%s<div class="help-block">%s</div></div>', $strOutput, $this->strValidationError);
            } else if ($this->strWarning) {
                $strOutput = sprintf('<div class="has-warning">%s<div class="help-block">%s</div></div>', $strOutput, $this->strWarning);
            }
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
//<div class="alert alert-danger">
//<button class="close" data-dismiss="alert" type="button">
//<i class="icon-remove"></i>
//</button>
//<strong>
//<i class="icon-remove"></i>
//Oh snap!
//</strong>
//Change a few things up and try submitting again.
//<br>
//</div>
        // Call RenderOutput, Returning its Contents
        return $this->RenderOutput($strOutput, $blnDisplayOutput);
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