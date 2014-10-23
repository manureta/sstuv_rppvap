<?php

class QDateFilterBox extends QTextBox {
    protected $strFormatDate;
    protected $strDate;
    
    public function __construct($objParentObject, $strControlId = null, $strFormat = 'dd/mm/aaaa') {
        $this->strFormatDate = $strFormat;
        $this->AddJavascriptFile("_core/datefilter.js");
        parent::__construct($objParentObject, $strControlId);
    }
    
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
        $strToReturn = sprintf($str, sprintf('<input type="text" name="%s" onkeyup="DateFilterMask(this);" id="%s" value="' . $this->strFormat . '" %s%s  ##PLACEHOLDER## />', $this->strControlId, $this->strControlId, QApplication::HtmlEntities($this->strText), $this->GetAttributes(), $strStyle));
        $strToReturn = str_replace('##PLACEHOLDER##', ($this->strPlaceHolder ? ' placeholder="' . $this->strPlaceHolder . '"' : ''), $strToReturn);
        return $strToReturn;
    }

    public function ParsePostData() {
        parent::ParsePostData();
        $arrDate = explode('/', $this->strText);
        switch($this->strFormatDate){
            case 'dd/mm/aaaa':
            case 'dd/mm/yyyy':
                switch(count($arrDate)){
                    case 2:
                        switch(strlen($arrDate[1])){
                            case 3:
                            case 1:
                                $this->strDate = $arrDate[1] . '_-' . $arrDate[0];
                                break;
                            default:
                                $this->strDate = $arrDate[1] . '-' . $arrDate[0];
                        }                        
                        return;
                    case 3:
                        if(strlen($arrDate[1])==1)
                            $arrDate[1] = '_' . $arrDate[1];
                        if(strlen($arrDate[0])==1)
                            $arrDate[0] = '_' . $arrDate[0];
                        switch(strlen($arrDate[2])){
                            case 1:
                                $arrDate[2] = $arrDate[2] . '___';
                                break;
                            case 2:
                                $arrDate[2] = $arrDate[2] . '__';
                                break;
                            case 3:
                                $arrDate[2] = $arrDate[2] . '_';
                                break;
                        }
                        $this->strDate = $arrDate[2] . '-' . $arrDate[1] . '-' . $arrDate[0];
                        return;
                    default:
                        $this->strDate = $this->strText;
                }
                return;
            case 'mm/dd/aaaa':
            case 'mm/dd/yyyy':
                $this->strDate = str_replace('/', '-', $this->strText);
        }
    }
    
    public function __get($strName) {
        if($strName == 'Date')
            return $this->strDate;
        return parent::__get($strName);
    }

}

?>