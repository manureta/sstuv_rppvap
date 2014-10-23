<?php

/**
 * Server-side autocomplete text box. Whenever the user types stuff
 * in this text box, an asynchronous Ajax request to the server will
 * be sent, looking for potential matches.
 *
 * @package Controls
 */

class QCuilCuitTextBox extends QAutoCompleteTextBox {
    private $blnAutoComplete;
    private $objTxtSexo;
    private $objTxtDni;
            
    // TODO IMPLEMENTAR COMPORTAMIENTO AUTOCOMPLETE
    public function __construct($objParentObject, $strControlId = null, $objTxtSexo = null, $objTxtDni = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->MinChars = 1;
//        $this->strWidth = "400";
        $this->AddAction(new QAutoCompleteTextBoxEvent(), new QAjaxControlAction($this, 'callbackAjax'));
        if($objTxtSexo && objTxtSexo instanceof QTextBox && $objTxtDni && $objTxtDni)
            $this->blnAutoComplete = false;
        else{
            $this->AddJavascriptFile("_core/typeahead.js");
            $this->strCssClass = 'typeahead';        
            $this->blnAutoComplete = true;
            $this->objTxtDni = $objTxtDni;
            $this->objTxtSexo = $objTxtSexo;
        }
        $this->blnAutoComplete = false;
        $this->AddJavascriptFile("_core/cuilcuit.js");
    }
    
    public function Validate(){
        if (strlen($this->strText) == 0) {
            if ($this->blnRequired) {
                if ($this->strName) {
                    $this->strValidationError = sprintf($this->strLabelForRequired, $this->strName);
                } else {
                    $this->strValidationError = $this->strLabelForRequiredUnnamed;
                }
                return false;
            }
            return true;
        }
        if(!parent::Validate())
            return false;        
        if(!$this->ValidarCuit()){
            $this->strValidationError="El CUIT/CUIL es erróneo";
            return false;
        }else{
            return true;
        }
    }
    
    public function ValidarCuit() {
        $cuit = $this->strText;
        $arrCuit = str_split($cuit);
        $arrNumCuit = array();
        $cuit = "";
        $i = 0;

        // verifico que solo contenga digitos o "-" y que tenga hasta 13 caracteres
        foreach ($arrCuit as $char) {
            if ($i++ == 13)
                return false;
            if ($char >= '0' && $char <= '9') {
                $cuit .= $char;
                $arrNumCuit[] = (int) $char;
            } elseif ($char != '-')
                return false;
        }
        // verifico que tenga 11 caracteres (que ya se que son digitos)
        if (strlen($cuit) != 11)
            return false;
        // verifico que los primeros dos digitos sean validos    
        switch (substr($cuit, 0, 2)) {
            case "20":
            case "23":
            case "24":
            case "27": break;
            default: return false;
        }
       $verif = $this->GetDigitoVerificador($arrNumCuit);
        if ($verif != $arrNumCuit[10])
            return false;
        return true;
    }
    
    private function GetDigitoVerificador($arrNumCuit){
        $arrMult = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);
        $verif = 0;
        for ($i = 0; $i < 10; $i++) {
            $verif += (int) $arrNumCuit[$i] * $arrMult[$i];
        }
        $verif = $verif % 11;
        $verif = 11 - $verif;
        if($verif == 11)
            $verif = 0;
        if ($verif == 10)
            $verif = 9;
        return $verif;
    }
    
    protected function GetControlHtml(){
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strStyle = sprintf('style="%s"', $strStyle);

        $str = (strpos($this->strCssClass, 'block')) ? '<label class="block control-label no-padding-right"><span class="block' : '<label><span class="';
            $str .= ' input-icon input-icon-right">%s' . sprintf('<i id="%s_icon" class="icon-caret-down" %s></i></span></label>', $this->ControlId, ($this->blnAutoComplete) ? '' : 'style="display: none;"');
        $str = sprintf($str, sprintf('<input onkeyup="MaskCuilCuit(this);" onblur="ValidateCuilCuit(this);" onchange="ValidateCuilCuit(this);" autocomplete="off" type="text" name="%s" id="%s" value="' . $this->strFormat . '" %s%s  ##PLACEHOLDER## />', $this->strControlId, $this->strControlId, QApplication::HtmlEntities($this->strText), $this->GetAttributes(), $strStyle));
        $str .= sprintf('<input type="hidden" id="%s_selected_value" name="%s_selected_value" value="%s" />',$this->ControlId, $this->ControlId, 0);
        $str = str_replace('##PLACEHOLDER##', ($this->strPlaceHolder ? ' placeholder="' . $this->strPlaceHolder . '"' : ''), $str);
        return $str;
    }
    
    private function getData($strSexo, $strDni){
        switch($strSexo){
            case 'Masculino':
                $arrCodigos = array(20,23,24,30,33);
                break;
            case 'Femenino':
                $arrCodigos = array(27,23,24,30,33);
                break;
            default:
                $arrCodigos = array(20,23,24,27,30,33);
        }        
        $arrCuits = array();        
        foreach($arrCodigos as $strCodigo){
            $arrNumCuit = str_split(sprintf('%s%8d', $strCodigo, $strDni));
            $strCuit = sprintf('%s-%8d-%d', $strCodigo, $strDni, $this->GetDigitoVerificador($arrNumCuit));
            $arrCuits[] = array('name'=>$strCuit , 'id'=>0);
        }
        return json_encode($arrCuits);
    }
    
    private function getInitialData(){
        if($this->objTxtDni->Text == '' || is_nan($this->objTxtDni->Text))
            return json_encode(array());;
        return $this->getData($this->objTxtSexo->Text, $this->objTxtDni->Text);
    }
    

//Funciones llamadas desde el navegador. No se Ejecutan en el Test.
// @codeCoverageIgnoreStart
    public function callbackAjax($strFormId, $strControlId, $strParameter) {
        ob_clean(); //HACK hasta que encontremos donde imprime un pipe
        // TODO OBTENER PARAMETROS
        echo $this->getData($strSexo, $strDni);

        // Critically important - stop the processing and don't allow any other
        // QCubed events to fire in this case
        exit;
    }
        
    public function GetScript() {  
        //if(!$this->blnAutoComplete)
            return '';
        $strEntidad = $this->strEntidad;
        $x= sprintf(
'
    $("#%s").typeahead({   
        items: %d,
        ajax: {
            add_msg: "%s",
            active: %s,
            data: %s,
            url: "%s",
            timeout: 500,
            displayField: "name",
            dataType: "json",
            triggerLength: %d,
            method: "post",            
            preDispatch: function (query) {
                return {
                Qform__FormId: "%s",
                Qform__FormState: $("#Qform__FormState").val(),
                Qform__FormUpdates: "",
                Qform__FormCheckableControls: "",
                Qform__FormParameter: $("#%s").val(),
                Qform__FormEvent: "QAutoCompleteTextBoxEvent",
                Qform__FormCallType: "Ajax",
                Qform__FormControl: "%s"
                }
            },
            preProcess: function (data) {
                return JSON.parse(data);
            }
    }
});
', $this->ControlId, $this->intItemLimit, "Crear " . QApplication::Translate($this->strEntidad),($strEntidad::CountAll() > $this->intItemLimit)?"true":"false",$this->getInitialData($this->intItemLimit), QApplication::$RequestUri, $this->MinChars, $this->objForm->FormId, $this->ControlId, $this->ControlId);
        if($this->btnCreate->Visible){
            $x .= sprintf('
$("#%s").focus(function(){
    $(this).focusNextInputField();
})', $this->btnCreate->ControlId);
            $x .= sprintf('
document.getElementById("%s").style.display = "none"', $this->btnCreate->ControlId);
        }        
        return $x;
    }
    
// @codeCoverageIgnoreEnd
}

?>


