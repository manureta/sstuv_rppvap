<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class QAjaxSingleResultAutoCompleteTextBox extends QAjaxAutoCompleteTextBox {

    public function GetScript() {
        if(!$this->blnVisible || !$this->blnEnabled) {
            return '';
        }
        $strReturn = sprintf('$("#%s").autocomplete("%s",
									{extraParams:{Qform__FormId:"%s",Qform__FormControl:"%s"},
									%s%s%s%s%s%s%s}).result(function(event, data, formatted){$("#%s").val(data[0]);})',
            $this->strControlId,
            QApplication::$RequestUri,
            $this->objForm->FormId,
            $this->strControlId,
            "minChars:" . $this->intMinChars,
            (($this->blnAutoFill)		? ",autoFill:true" : ""),
            (($this->blnMatchContains)	? ",matchContains:true" : ""),
            (($this->blnMatchCase) 		? ",matchCase:true" : ""),
            (($this->blnMustMatch)		? ",mustMatch:true" : ""),
            (($this->Width)				? ",width:" . $this->Width : ""),
            (($this->strTextMode == QTextMode::MultiLine) ? ",multiple:true" : ""),
            $this->strControlId

        );

        //$strReturn .= sprintf('$("#%s").result = ');


        return $strReturn;
    }

    public function Refresh() {
        parent::Refresh();
    }

}

?>
