<?php
class PageReportesPanel extends QPanel {

	public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
		// Call the Parent

		try {
			parent::__construct($objParentObject, $strControlId);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}

		$this->Template = __VIEW_DIR__.'/page/reportes.tpl.php';
	}



}
?>