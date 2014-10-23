<?php

/**
 * Server-side autocomplete text box. Whenever the user types stuff
 * in this text box, an asynchronous Ajax request to the server will
 * be sent, looking for potential matches.
 *
 * @package Controls
 */
class QAjaxAutoCompleteTextBox extends QAutoCompleteTextBox {

    protected $strCallback;
    protected $strEntidad;
    protected $objEntidadObject;
    private $strSelectedValue;
    private $strSelectedText;
    public $blnMustExists = true;
    //private $objResponsable;
    private $arrControlIDs = array();

    public function __construct($objParentObject, $strCallback = null, $strControlId = null, $strEntidad = null, $blnMustExists = true) {
        parent::__construct($objParentObject, $strControlId);
        $this->blnMustExists = $blnMustExists;
        $this->strEntidad = $strEntidad;
        //$this->objEntidad = new $strEntidad;
        $this->strCallback = $strCallback;
        $this->AddAction(new QAutoCompleteTextBoxEvent(), new QAjaxControlAction($this, 'callbackAjax'));
        $strjavaScriptAction = $this->GetActionJS();
        $this->AddAction(new QKeyUpEvent(), new QJavaScriptAction($strjavaScriptAction));
    }

//Funciones llamadas desde el navegador. No se Ejecutan en el Test.
// @codeCoverageIgnoreStart
    public function callbackAjax($strFormId, $strControlId, $strParameter) {

        if (is_null($this->strEntidad)) {
            $parent = isset($this->objParentControl) ? $this->objParentControl : $this->objForm;

            try {
                $arrReturn = $parent->{$this->strCallback}($strParameter);
            } catch (Exception $e) {
                echo "There's been an error processing auto-complete matches: \n";
                throw $e;
            }

        } else {

            if (!method_exists($this->strEntidad, 'AutoCompleteSearch')) {
                throw new QCallerException("No existe el metodo estatico AutoCompleteSearch en el controlador ".  $this->strEntidad);
            }

            switch ($this->strEntidad) {
                case 'Responsable':
                    $arrReturn = Responsable::AutoCompleteSearch($strParameter);
                break;
                case 'LocalidadTipo':
                    $arrReturn = LocalidadTipo::AutoCompleteSearch($strParameter);
                break;
                case 'TituloOfertaTipo':
                    $arrReturn = TituloOfertaTipo::AutoCompleteSearch($strParameter, $this->objParentControl->mctPlanEstudioLocal->objPlanEstudioLocal->IdOfertaLocalObject->COferta);
                break;
            }
        }

        if (is_null($arrReturn)) {
            return;
        }

        if (!is_array($arrReturn)) {
            echo 'Error: the callback method for QAutoCompleteTextBox must return an array of strings';
            throw new QCallerException("callback method for QAutoCompleteTextBox must return an array of strings");
        }

        //echo json_encode($arrReturn);
        //exit;
        
        foreach ($arrReturn as $arrItem) {
            foreach ($arrItem as $item)
                echo $item . "|";
            echo "\n";
        }

        // Critically important - stop the processing and don't allow any other
        // QCubed events to fire in this case
        exit;
    }

    public function GetScript() {
        if (!$this->blnVisible || !$this->blnEnabled) {
            return '';
        }
        $strReturn = sprintf('$("#%s").autocomplete("%s",
                                {extraParams:{Qform__FormId:"%s",Qform__FormControl:"%s"},
                                %s%s%s%s%s%s%s%s}).result(function(event, data, formatted) {
                                $("#%s").val(data[1]);
                                $("#%s_selected_text").val(data[1]);
                                $("#%s_selected_value").val(data[2]);
                                $("#%s_tilde_ok").show();
                                %s
                            })',
                        $this->strControlId,
                        QApplication::$RequestUri,
                        $this->objForm->FormId,
                        $this->strControlId,
                        "minChars:" . $this->intMinChars,
                        (($this->blnAutoFill) ? ",autoFill:true" : ""),
                        (($this->blnMatchContains) ? ",matchContains:true" : ""),
                        (($this->blnMatchCase) ? ",matchCase:true" : ""),
                        (($this->blnMustMatch) ? ",mustMatch:true" : ""),
                        (($this->Width) ? ",width:" . $this->Width : ""),
                        (($this->strTextMode == QTextMode::MultiLine) ? ",multiple:true" : ""),
                        ",max:60",
                        $this->strControlId,
                        $this->strControlId,
                        $this->strControlId,
                        $this->strControlId,
                        $this->GetControlsJS()
        );

        //$strReturn .= sprintf('$("#%s").result = ');


        return $strReturn;
    }

    public function GetActionJS() {

        $strToReturn = sprintf("if($('#%s').val() != $('#%s_selected_text').val()){ $('#%s_selected_text').val('0');$('#%s_tilde_ok').hide();$('#%s_selected_value').val('0');%s",
                        $this->strControlId,
                        $this->strControlId,
                        $this->strControlId,
                        $this->strControlId,
                        $this->strControlId,
                        $this->EmptyControlsJS()
        );
//        foreach ($this->arrControlIDs as $strControlId)
//            $strToReturn .= sprintf("$('#%s').removeAttr('disabled');$('#%s').val('');", $strControlId, $strControlId);
        $strToReturn .="}";
        return $strToReturn;
    }

    public function AddControlId($strControlId){
        $this->arrControlIDs[] = $strControlId;
        $this->RemoveAllActions(QKeyUpEvent::EventName);
        $strjavaScriptAction = $this->GetActionJS();
        $this->AddAction(new QKeyUpEvent(), new QJavaScriptAction($strjavaScriptAction));
    }
    
    protected function GetControlsJS() {
        //return '';
        $i = 3;
        $strToReturn = "";
        foreach ($this->arrControlIDs as $strControlID) {
            $strToReturn .= sprintf('$("#%s").val(data[%s]);', $strControlID, $i);
            $strToReturn .= sprintf('$("#%s").attr("disabled","disabled");', $strControlID);
            //$strToReturn .= sprintf("alert(data[%s]);",$i);
            $i++;
        }
        return $strToReturn;
    }

    protected function EmptyControlsJS() {
        $strToReturn = "";
        foreach ($this->arrControlIDs as $strControlID) {
            $strToReturn .= sprintf("$('#%s').val('');", $strControlID);
            $strToReturn .= sprintf("$('#%s').attr('disabled','');", $strControlID);
        }
        return $strToReturn;
    }
    
    protected function GetControlHtml() {
        $strReturn = parent::GetControlHtml();
        $strReturn .= sprintf("<img src='%s/images/tilde_ok.gif' id='%s_tilde_ok' style='display:%s'/>",
                        __VIRTUAL_DIRECTORY__, $this->strControlId, (!is_null($this->objEntidadObject)) ? 'inline' : 'none');
        $strReturn .= sprintf("<input type='hidden' id='%s_selected_value' name='%s_selected_value' value ='%s'/>", 
                        $this->strControlId, $this->strControlId, (!is_null($this->strSelectedValue)) ? $this->strSelectedValue : '0');
        $strReturn .= sprintf("<input type='hidden' id='%s_selected_text' name='%s_selected_text' for='%s' value ='%s'/>",
                        $this->strControlId, $this->strControlId, (!is_null($this->strSelectedText)) ? $this->strSelectedText : '0', (!is_null($this->strSelectedText)) ? $this->strSelectedText : '0');
        return $strReturn;
    }

    public function ParsePostData() {
        parent::ParsePostData();
        // Check to see if this Control's Value was passed in via the POST data
        if (array_key_exists($this->strControlId . '_selected_value', $_POST)) {
            if ($_POST[$this->strControlId . '_selected_value'] != '0')
                $this->strSelectedValue = $_POST[$this->strControlId . '_selected_value'];
            else
                $this->strSelectedValue = null;
        }
        if (array_key_exists($this->strControlId . '_selected_text', $_POST)) {
            // It was -- update this Control's value with the new value passed in via the POST arguments
            if ($_POST[$this->strControlId . '_selected_text'] != '0')
                $this->strSelectedText = $_POST[$this->strControlId . '_selected_text'];
            else
                $this->strSelectedText = null;
        }
    }

    public function Validate() {
        //return true;
        if (parent::Validate()) {
            if (!empty($this->strText) && !$this->strSelectedValue && $this->blnMustExists) {
                if ($this->Required ) {
                    $this->strValidationError = "Debe seleccionar un valor existente";
                } else {
                    $this->strValidationError = "Debe seleccionar un valor existente o dejar vacío el campo";
                }
                return false;
            }
            return true;
        }
        return false;
    }

    public function PuedeSerNuevaEntidad() {
        if ($this->objEntidadObject) {
            if ($this->objEntidadObject instanceof Responsable) {
                return true;//!($this->objEntidadObject->IdResponsable > 0);
            /*
            } else if ($this->objEntidadObject instanceof LocalidadTipo) {
                return !($this->objEntidadObject->CLocalidad > 0);
            } else if ($this->objEntidadObject instanceof TituloOfertaTipo) {
                return !($this->objEntidadObject->CTituloOferta > 0);
             }
        
        } else {*/
            }
        }
            return false;
    } 


// @codeCoverageIgnoreEnd
    public function __get($strName) {
        //error_log("entro en ".__FUNCTION__." de ".__CLASS__);
        switch ($strName) {
            // APPEARANCE
            case "SelectedValue": return $this->strSelectedValue;
            case "MustExists": return $this->blnMustExists;
            case "SelectedText": return $this->strSelectedText;
            case "EntidadObject": return $this->objEntidadObject;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function __set($strName, $mixValue) {
        $this->blnModified = true;

        switch ($strName) {
            case "MustExists":
                try {
                    return $this->blnMustExists = $mixValue;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;

            case "EntidadObject":
                try {
                    $this->objEntidadObject = $mixValue;
                    if ($this->objEntidadObject) {
                        if (!method_exists($this->objEntidadObject, '__toAutoComplete')) {
                            throw new QCallerException("No existe el metodo estatico __toAutoComplete en el controlador ".  $this->strEntidad);
                        }
                        $arrVals = (array)$this->objEntidadObject->__toAutoComplete();
                        $this->strSelectedText = $this->Text = $arrVals[1];
                        $this->strSelectedValue = $arrVals[0];
                    }
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            default:
                try {
                    return parent::__set($strName, $mixValue);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
                break;
        }
    }

// @codeCoverageIgnoreEnd
}
?>
