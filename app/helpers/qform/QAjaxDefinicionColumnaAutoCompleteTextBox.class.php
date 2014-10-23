<?php
    /**
	 * Server-side autocomplete text box. Whenever the user types stuff
	 * in this text box, an asynchronous Ajax request to the server will
	 * be sent, looking for potential matches.
	 *
	 * @package Controls
	 */
	class QAjaxDefinicionColumnaAutoCompleteTextBox extends QAjaxAutoCompleteTextBox {

                private $strSelectedValue;
                private $strSelectedText;
                private $objDefinicionColumna;
                private $arrControlIDs;

		public function __construct($objParentObject, $strCallback, $ArrayControlId = array(),$strControlId = null) {
			parent::__construct($objParentObject, $strCallback, $strControlId);

                        $this->arrControlIDs = $ArrayControlId;

                        $strjavaScriptAction = $this->GetActionJS();
                        $this->AddAction(new QKeyUpEvent(), new QJavaScriptAction($strjavaScriptAction));
		}

//Funciones llamadas desde el navegador. No se Ejecutan en el Test.
// @codeCoverageIgnoreStart
		public function callbackAjax($strFormId, $strControlId, $strParameter) {
			$parent = isset($this->objParentControl) ? $this->objParentControl : $this->objForm;

			try {
				$arrToSerialize = $parent->{$this->strCallback}($strParameter);
			} catch (Exception $e) {
				echo "There's been an error processing auto-complete matches: \n";
				throw $e;
			}

			if (is_null($arrToSerialize)) {
				return;
			}

			if (!is_array($arrToSerialize)) {
				echo 'Error: the callback method for QAutoCompleteTextBox must return an array of strings';
				throw new QCallerException("callback method for QAutoCompleteTextBox must return an array of strings");
			}

			foreach ($arrToSerialize as $arrItem) {
                            foreach($arrItem as $item)
				echo $item. "|";
                            echo "\n";

			}

			// Critically important - stop the processing and don't allow any other
			// QCubed events to fire in this case
			exit;
		}

		public function GetScript(){
			if(!$this->blnVisible || !$this->blnEnabled) {
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
							(($this->blnAutoFill)		? ",autoFill:true" : ""),
							(($this->blnMatchContains)	? ",matchContains:true" : ""),
							(($this->blnMatchCase) 		? ",matchCase:true" : ""),
							(($this->blnMustMatch)		? ",mustMatch:true" : ""),
							(($this->Width)			? ",width:" . $this->Width : ""),
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


                protected function GetActionJS(){
                    $strToReturn = sprintf("if($('#%s').val() != $('#%s_selected_text').val()){ $('#%s_selected_text').val('0');$('#%s_tilde_ok').hide();$('#%s_selected_value').val('0');",
                                    $this->strControlId,
                                    $this->strControlId,
                                    $this->strControlId,
                                    $this->strControlId,
                                    $this->strControlId
                    );
                    foreach ($this->arrControlIDs as $strControlId)
                        $strToReturn .= sprintf("$('#%s').removeAttr('disabled');$('#%s').val('');",$strControlId,$strControlId);
                    $strToReturn .="}";
                    return $strToReturn;
                }

                protected function GetControlsJS(){
                    $i=3;
                    $strToReturn = "";
                    foreach($this->arrControlIDs as $strControlID){
                        $strToReturn .= sprintf('$("#%s").val(data[%s]);',$strControlID, $i);
                        $strToReturn .= sprintf('$("#%s").attr("disabled","disabled");',$strControlID);
                        $i++;
                    }
                    return $strToReturn;
                }

                protected function GetControlHtml() {
                    $strReturn = parent::GetControlHtml();
                    $strReturn .= sprintf("<img src='%s/images/tilde_ok.gif' id='%s_tilde_ok' style='display:%s'/>
                                           <input type='hidden' id='%s_selected_value' name='%s_selected_value' value ='%s'/>
                                           <input type='hidden' id='%s_selected_text' name='%s_selected_text' value ='0'/>",
                                        __VIRTUAL_DIRECTORY__, $this->strControlId,(!is_null($this->objDefinicionColumna))?'inline':'none',
                                        $this->strControlId,$this->strControlId,(!is_null($this->strSelectedValue))?$this->strSelectedValue:'0',
                                        $this->strControlId,$this->strControlId,(!is_null($this->strSelectedText))?$this->strSelectedText:'0');
                    return $strReturn;
                }

		public function ParsePostData() {

                        parent::ParsePostData();
			// Check to see if this Control's Value was passed in via the POST data
			if (array_key_exists($this->strControlId.'_selected_value', $_POST)) {
				if($_POST[$this->strControlId.'_selected_value']!='0')
                                    $this->strSelectedValue = $_POST[$this->strControlId.'_selected_value'];
                                else
                                    $this->strSelectedValue = null;
                        }
			if (array_key_exists($this->strControlId.'_selected_text', $_POST)) {
				// It was -- update this Control's value with the new value passed in via the POST arguments
				if($_POST[$this->strControlId.'_selected_text']!='0')
                                    $this->strSelectedText = $_POST[$this->strControlId.'_selected_text'];
                                else
                                    $this->strSelectedText = null;
                        }
                }

                public function Validate() {
                    return true;
                    if(parent::Validate()){
                        if(!empty($this->strText) && is_null($this->strSelectedValue)){
                            $this->strValidationError = "Debe Seleccionar una localidad o dejar vacio el Campo";
                            return false;
                        }
                        return true;

                    }
                    return false;
                }
// @codeCoverageIgnoreEnd
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "SelectedValue": return $this->strSelectedValue;
                                case "SelectedText": return $this->strSelectedText;
                                case "DefinicionColumna": return $this->objDefinicionColumna;
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

                                case "DefinicionColumna":
                                        try {
                                                $this->objDefinicionColumna = QType::Cast($mixValue, 'DefinicionColumna');
                                                if($this->objDefinicionColumna){
                                                    $this->strSelectedText = $this->strText = $this->objDefinicionColumna->Nombre;
                                                    $this->strSelectedValue = $this->objDefinicionColumna->IdDefinicionColumna;
                                                }
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
