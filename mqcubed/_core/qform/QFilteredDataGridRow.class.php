<?php

class QFilteredDataGridRow extends QControl {

    protected $objObject;
    
    public function __construct(QDataGrid $objParentObject, $objObject, $blnAlternateRow = false, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objObject = $objObject;
        $this->strCssClass = "datagrid-row";
        if ($blnAlternateRow) {
            $this->AddCssClass('alternate-row');
        }
    }

    protected function GetControlHtml() {

        // Iterate through the Columns
        $strColumnsHtml = '';
        foreach ($this->objParentControl->GetAllColumns() as $objColumn) {
            try {
                $strHtml = $this->objParentControl->ParseColumnHtml($objColumn, $this->objObject);

                if ($objColumn->HtmlEntities)
                    $strHtml = QApplication::HtmlEntities($strHtml);

                $objColumn->Tooltip = null;
                if ($strHtml == '') {
                    $strHtml = '&nbsp;';
                } else {
                    if ($objColumn->Crop && strlen(strip_tags($strHtml)) == strlen($strHtml)) {
                        if (strlen($strHtml) > $objColumn->MaxChars) {
                            $objColumn->Tooltip = strip_tags($strHtml);
                            $strHtml = utf8_encode(substr(utf8_decode($strHtml), 0, $objColumn->MaxChars)) . "...";
                        }
                    }
                }
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            $strColumnsHtml .= sprintf("  <td %s>%s</td>\r\n", $objColumn->GetAttributes(), $strHtml);
        }

        // si tiene metodo de rowclick
        if ($this->objParentControl->RowClickMethod) {
            $this->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'RowClick'));
            $this->AddAction(new QClickEvent(), new QTerminateAction());
//            $strRowClick = sprintf("onclick=\"qc.pA('%s', '%s', '%s', '%s', '');\"", $this->Form->FormId, $this->ControlId, 'QClickEvent', $this->intCurrentRowIndex);
            $this->AddCssClass('cursor-pointer');
        }

        // Finish up
        $strToReturn = sprintf('<tr id="%s" %s>%s</tr>', $this->strControlId, $this->GetAttributes(), $strColumnsHtml);
        return $strToReturn;
    }
    
    public function RowClick() {
        return call_user_func($this->objParentControl->RowClickMethod, $this->objObject);
    }

    public function ParsePostData() {
        
    }

    public function Validate() {
        
    }

}
