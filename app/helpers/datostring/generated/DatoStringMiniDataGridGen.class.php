<?php
	/**
	 * This is the Mini DataGrid class for the List functionality
	 * of the DatoString class.  This code-generated class
	 * contains a QDataGrid class which can be used by any QForm or QPanel,
	 * listing a collection of DatoString objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create an instance of this DataGrid in a QForm or QPanel.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package Relevamiento Anual
	 * @subpackage MetaControls
	 *
	 */


class DatoStringMiniDataGridGen extends DatoStringDataGrid {

        public function __construct($objParentObject, $strControlId = null) {

            parent::__construct($objParentObject, $strControlId);

            $this->blnFilterShow = false;
            $this->Paginator->Visible = false;
            $this->strLabelForNoneFound = '';
            $this->strLabelForOneFound = '';
            $this->strLabelForMultipleFound = '';
            $this->strLabelForPaginated = '';

        }

        protected function addColumns() {

            $this->AddColumn(new QDataGridColumn(QApplication::Translate("DatoString"), '<?= $_CONTROL->item_Render($_ITEM) ?>', 'HtmlEntities=false'));

        }


        public function item_Render(DatoString $objDatoString) {

                $ctrItem = new DatoStringItemPanel($this,$objDatoString);
                $strToReturn = $ctrItem->Render(false);

                return $strToReturn;

     }

}
?>