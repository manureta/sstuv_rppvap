<?php

/**
 * Es una clase que genera un TextBox autocompletable que funciona presentando
 * los objetos correspondientes a la Clase $strEntidad. Se pueden predefinir
 * filtros para acotar los posibles resultados.
 *
 * @property string $Text corresponde al toString del Objeto seleccionado
 * @property integer $Value corresponde al PK del Objeto seleccionado
 * @package Controls
 */

class QAjaxAutoCompleteEntidadTextBox extends QAutoCompleteTextBox {

    public $btnCreate;
    protected $strEntidad;
    protected $strPK;
    protected $intItemLimit;
    protected $strValue;
    protected $strLabelForError;
    protected $strJavaScripts = '_core/typeahead.js';
    protected $arrData;
    protected $intRegistrosTotales;
    protected $arrCreateMethod;

    public function __construct($objParentObject, $strEntidad, $strPK, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->strLabelForError = 'El valor no es válido';
        $this->strCssClass = 'typeahead form-control';
        $this->PlaceHolder = sprintf('Seleccione un%s %s', ($strEntidad::GenderMale() ? '' : 'a'), $strEntidad::Noun());
        //HACK comportamiento especial para SI/NO
        if ($strEntidad === 'SinoTipo')
            $this->PlaceHolder = 'Indique Si / No';
        $this->strEntidad = $strEntidad;
        $this->strPK = $strPK;
        $this->MinChars = 1;
        $this->intItemLimit = 30;
        $this->AddAction(new QAutoCompleteTextBoxEvent(), new QAjaxControlAction($this, 'callbackAjax'));

        $this->btnCreate = new QLinkButton($this, $this->ControlId . 'btnAdd');
        //$this->btnCreate->AddCssClass("btn_add");
        //$this->btnCreate->ToolTip = sprintf('Crear un%s %s', ($strEntidad::GenderMale() ? '' : 'a'), $strEntidad::Noun());
        $this->btnCreate->Visible = false;
        $this->btnCreate->Display = QDisplayStyle::None;
    }

    public function Validate() {
        if(!$this->Visible || $this->ReadOnly || !$this->Enabled)
            return true;

        if (!$this->Value) {
            if ($this->strText) {
                $this->ValidationError = $this->strLabelForError;
                return false;
            }
            if ($this->Required) {
                $this->ValidationError = ($this->strName) ? sprintf($this->strLabelForRequired, $this->strName) : $this->strLabelForRequiredUnnamed;
                return false;
            }
            return true;
        }

        foreach ($this->arrData as $arr) {
            if ($arr['id'] == $this->Value) {
                if ($arr['name'] == $this->strText)
                    return true;
            }
        }
        $strEntidad = $this->strEntidad;
        $strPK = $this->strPK;
        $obj = $strEntidad::Load($this->Value);
        if ((string)$obj == $this->Text)
            return true;
        $this->ValidationError = $this->strLabelForError;
        return false;
    }

    protected function GetControlHtml() {
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strStyle = sprintf('style="%s"', $strStyle);

        $str = (strpos($this->strCssClass, 'block')) ? '<label class="block control-label no-padding-right"><span class="block' : '<label><span class="';
        $strIcon = ($this->Enabled)?sprintf('<i id="%s_icon" class="icon-caret-down"></i>', $this->ControlId):'';
        $str .= ' input-icon input-icon-right">%s' . $strIcon . '</span></label>';
        $str = sprintf($str, sprintf('<input autocomplete="off" type="text" name="%s" id="%s" value="%s" %s%s  ##PLACEHOLDER## />', $this->strControlId, $this->strControlId, $this->strText, $this->GetAttributes(), $strStyle));
        $str .= sprintf('<input type="hidden" id="%s_selected_value" name="%s_selected_value" value="%s" />', $this->ControlId, $this->ControlId, $this->strValue);
        if ($this->btnCreate->Visible)
            $str .= $this->btnCreate->GetControlHtml();
        $str = str_replace('##PLACEHOLDER##', ($this->strPlaceHolder ? ' placeholder="' . $this->strPlaceHolder . '"' : ''), $str);
        return $str;
    }

    // Consultas
    protected $objConditionsArray = array();

    public function SetCondition(QQCondition $objCondition) {
        $this->ResetConditions();
        $this->AddCondition($objCondition);
    }

    public function AddCondition(QQCondition $objCondition) {
        //TODO optimizar
        $this->blnModified = true;
        array_push($this->objConditionsArray, $objCondition);
        $strEntidad = $this->strEntidad;
        $this->intRegistrosTotales = $strEntidad::QueryCount($this->Conditions);
        $blnAjaxNuevo = ($this->intRegistrosTotales > $this->intItemLimit);
        if($blnAjaxNuevo){
            $x = sprintf("InitializeTypeahead('%s', %d, '%s', %s, %s, '%s', %d, '%s');", 
                $this->ControlId, $this->intItemLimit, "Crear " . QApplication::Translate($this->strEntidad),                 "true", $this->GetInitialData($this->intItemLimit), QApplication::$RequestUri, $this->MinChars, $this->objForm->FormId);
            QApplication::ExecuteJavaScript($x);
        }
        else{
            $x = sprintf("InitializeTypeahead('%s', %d, '%s', %s, %s, '%s', %d, '%s');", 
                $this->ControlId, $this->intItemLimit, "Crear " . QApplication::Translate($this->strEntidad),                 "false", $this->GetInitialData($this->intItemLimit), QApplication::$RequestUri, $this->MinChars, $this->objForm->FormId);
            QApplication::ExecuteJavaScript($x);
        }
    }

    public function ResetConditions() {
        $this->blnModified = true;
        return $this->objConditionsArray = array();
    }

    protected $objOrderByArray = array();

    public function SetOrderBy(QQOrderBy $objQQOrderBy) {
        $this->objOrderByArray = $objQQOrderBy;
    }

    public function ResetOrderBy() {
        $this->blnModified = true;
        return $this->objOrderByArray = null;
    }

    protected function LoadByText() {
        $strEntidad = $this->strEntidad;

        $arr = $strEntidad::QueryArray($this->Conditions);
        foreach($arr as $obj){
            if((string) $obj == $this->strText)
                return $obj;
        }
        return null;
    }
    
    protected function GetInitialData() {
        $arrObjects = array();

        $strEntidad = $this->strEntidad;
        $objQClause = QQ::LimitInfo($this->intItemLimit);
        if ($this->OrderBy) {
            $objQClause = array($this->OrderBy, $objQClause);
        }
        $arrObjects = $strEntidad::QueryArray($this->Conditions, $objQClause);
        if (!is_null($this->Value) && $this->intRegistrosTotales > $this->intItemLimit) {
            $strEntidad = $this->strEntidad;
            $obj = $strEntidad::Load($this->Value);
            if(!in_array($obj, $arrObjects)){
                $arrObjects = array_merge(array($obj), $arrObjects);
                unset($arrObjects[$this->intItemLimit]);
            }
        }
        return json_encode($this->PrepareArray($arrObjects));
    }

    protected function PrepareArray($arrObjects) {
        $strPK = $this->strPK;
        $arrToSerialize = array();
        if($arrObjects){
            foreach ($arrObjects as $obj) {
                if(!$obj) continue;
                $arrToSerialize[] = array('name' => (string) $obj, 'id' => $obj->$strPK);
            }
        }
        $this->arrData = $arrToSerialize;
        return $arrToSerialize;
    }

    public function callbackAjax($strFormId, $strControlId, $strParameter) {
        $arrToSerialize = array();
        $arr = array();
        try {
            $strEntidad = $this->strEntidad;
            $objCondition = $strEntidad::GetQueryTextConditions($strParameter);
            if ($this->Conditions && $this->Conditions != QQ::All()) {
                $objCondition = QQ::AndCondition(array($objCondition, $this->Conditions));
            }
            $objQClause = QQ::LimitInfo($this->intItemLimit);
            if ($this->OrderBy) {
                $objQClause = array($this->OrderBy, $objQClause);
            }
            $arr = $strEntidad::QueryArray($objCondition, $objQClause);
        } catch (Exception $e) {
            LogHelper::Debug($this->strEntidad . ' falla en GetQueryTextConditions ('.$e->getMessage().')');
            //throw $e;
        }
        if (count($arr))
            $arrToSerialize = $this->PrepareArray($arr);
        echo json_encode($arrToSerialize);

        // Critically important - stop the processing and don't allow any other
        // QCubed events to fire in this case
        exit;
    }

    // hago que tome el valor del input hidden en lugar del textbox, para que tome el valor (PK) y no la descripcion (__toString)
    public function ParsePostData() {
        parent::ParsePostData();
        // Check to see if this Control's Value was passed in via the POST data
        if (array_key_exists($this->strControlId, $_POST)) {
            // It was -- update this Control's value with the new value passed in via the POST arguments
            $this->strValue = filter_input(INPUT_POST, sprintf('%s_selected_value', $this->strControlId));
            $this->strText = filter_input(INPUT_POST, sprintf('%s', $this->strControlId));
            //Si por algún motivo no viene el ID en el hidden lo intento cargar de la base
            if (!$this->Value && $this->strText) {
                $strPK = $this->strPK;
                $obj = $this->LoadByText();
                $this->Value = ($obj) ? $obj->$strPK : null;
            }
        }
    }

    public function btnCreate_Click() {
        return call_user_func($this->arrCreateMethod, $this->strText);
    }
    
    public function __get($strName) {
        switch ($strName) {
            case "LabelForError": 
                return $this->strLabelForError;
            case "ItemLimit":
                return $this->intItemLimit;
            case "SelectedValue":
            case "Value":
                return ($this->strValue == "") ? null : $this->strValue;
            case "SelectedValues":
                return array(($this->strValue == "") ? null : $this->strValue);
            case "SelectedItem":
                return new QListItem($this->strText, $this->strValue);
            case "SelectedItems":
                return array(new QListItem($this->strText, $this->strValue));
            case "SelectedName":
                return $this->strText;
            case "SelectedNames":
                return array($this->strText);
            case 'Conditions':
                switch (count($this->objConditionsArray)) {
                    case 0:
                        return QQ::All();
                    case 1:
                        return $this->objConditionsArray[0];
                    default:
                        return QQ::AndCondition($this->objConditionsArray);
                }
            case 'OrderBy':
                if (!$this->objOrderByArray) {
                    $strEntidad = $this->strEntidad;
                    if (property_exists($strEntidad, 'intOrden')) {
                        return QQ::OrderBy(QQN::$strEntidad()->Orden);
                    }
                    if (property_exists($strEntidad, 'strDescripcion')) {
                        return QQ::OrderBy(QQN::$strEntidad()->Descripcion);
                    }
                    return null;
                } else {
                    return $this->objOrderByArray;
                }
            case "ItemCount":
                return 0; // la cantidad de items es dinamico y se maneja en javascript (con el grep)
            case "SelectedIndex":
                return -1; // la cantidad de items es dinamico y se maneja en javascript (con el grep), lo cual afecta al indice seleccionado

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
            case "LabelForError":
                return $this->strLabelForError = (string) $mixValue;
            case "ItemLimit":
                return $this->intItemLimit = (int) $mixValue;
            case "Value":
                try {
                    $this->strValue = QType::Cast($mixValue, QType::String);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case "CreateMethod":
                try {
                    if (!is_array($mixValue) || count($mixValue) !== 2)
                        throw new QCallerException('Parametro de creacion incorrecto. Se espera un array($objControl, $strMetodo)');
                    $this->arrCreateMethod = $mixValue;
                    $this->btnCreate->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreate_Click'));
                    $this->btnCreate->ActionParameter = $this->strValue;
                    $this->btnCreate->Visible = true;
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case "Enabled":
                $this->btnCreate->Visible =  ($mixValue) ? (boolean) $this->arrCreateMethod : false;
                return parent::__set($strName, $mixValue);
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

    public function GetScript() {
        $strEntidad = $this->strEntidad;
        $this->intRegistrosTotales = $strEntidad::QueryCount($this->Conditions);
        $blnAjaxActive = ($this->intRegistrosTotales > $this->intItemLimit) ? "true" : "false";
        // InitializeTypeahead(controlId, itemLimit, strMsg, blnActive, JSONData, strUrl, intTrigger, formId)
        $x = sprintf("InitializeTypeahead('%s', %d, '%s', %s, %s, '%s', %d, '%s');", $this->ControlId, $this->intItemLimit, "Crear " . QApplication::Translate($this->strEntidad), $blnAjaxActive, $this->GetInitialData($this->intItemLimit), QApplication::$RequestUri, $this->MinChars, $this->objForm->FormId);
        if ($this->btnCreate->Visible) {
            $x .= sprintf('
$("#%s").focus(function(){
    $(this).focusNextInputField();
})', $this->btnCreate->ControlId);
            $x .= sprintf('
document.getElementById("%s").style.display = "none"', $this->btnCreate->ControlId);
        }
        return $x;
    }

}
?>


