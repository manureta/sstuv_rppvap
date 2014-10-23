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
		public function __construct($objParentObject, $strCallback, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
                        
			$this->strCallback = $strCallback;
			$this->AddAction(new QAutoCompleteTextBoxEvent(), new QAjaxControlAction($this, 'callbackAjax'));
		}
//Funciones llamadas desde el navegador. No se Ejecutan en el Test.
// @codeCoverageIgnoreStart
		public function callbackAjax($strFormId, $strControlId, $strParameter) {
			$parent = isset($this->objParentControl) ? $this->objParentControl : $this->objForm;
            ob_clean(); //HACK hasta que encontremos donde imprime un pipe

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
                foreach ($arrItem as $item) {
                    echo $item . "|";
                }
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
									%s%s%s%s%s%s%s})',
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
							(($this->strTextMode == QTextMode::MultiLine) ? ",multiple:true" : "")

			);

                        //$strReturn .= sprintf('$("#%s").result = ');


            return $strReturn;
		}
// @codeCoverageIgnoreEnd

        }

?>
