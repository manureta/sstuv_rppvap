<?php
	class QLabel extends QBlockControl {
		///////////////////////////
		// Private Member Variables
		///////////////////////////
		protected $strTagName = 'span';
		protected $blnHtmlEntities = true;

		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				// APPEARANCE
				case "Text":
					try {
                                                if($mixValue == ""){
                                                    $mixValue = "&nbsp;";
                                                    $this->blnHtmlEntities=false;
                                                }
						$this->strText = QType::Cast($mixValue, QType::String);

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