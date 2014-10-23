<?php

class QDataGrid extends QDataGridBase {

    protected $intCellSpacing = 0;
    protected $intCellPadding = 0;
    protected $objDownloader = null;

    ///////////////////////////
    // DataGrid Preferences
    ///////////////////////////
    // Feel free to specify global display preferences/defaults for all QDataGrid controls
    public function __construct($objParentObject, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Paginator = new QPaginator($this);
        $this->Paginator->ItemsPerPage = 12;
        // For example... let's default the CssClass to datagrid
        $this->strCssClass = 'datagrid';
    }

    // Override any of these methods/variables below to alter the way the DataGrid gets rendered
//		protected function GetPaginatorRowHtml() {}
//		protected function GetHeaderRowHtml() {}
//		protected $blnShowFooter = true;		
//		protected function GetFooterRowHtml() {
//			return sprintf('<tr><td colspan="%s" style="text-align: center">Some Footer Can Go Here</td></tr>', count($this->objColumnArray));
//		}
//		protected function GetDataGridRowHtml($objObject) {}
    // Este metodo recibe fruta como primer parametro como compatibilidad de api de qcubed trunk
    public static function ParseHtml($fruta, $dtg, $column, $item) {
        return $dtg->ParseColumnHtml($column, $item);
    }

    protected function GetControlHtml() {
        $this->DataBind();

        $strToReturn = "";

        if ($this->HtmlBefore)
            $strToReturn .= $this->HtmlBefore;

        // Table Tag
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strStyle = sprintf('style="%s" ', $strStyle);
        $strToReturn .= sprintf("<table id=\"%s\" %s%s>\r\n", $this->strControlId, $this->GetAttributes(), $strStyle);

        // Paginator Row (if applicable)
        if ($this->objPaginator || $this->objDownloader) {
            $strToReturn .= "<caption>\r\n";
            if ($this->objPaginator)
                $strToReturn .= $this->GetPaginatorRowHtml($this->objPaginator);
            if ($this->objDownloader)
                $strToReturn .= $this->GetDownloaderHtml($this->objDownloader);
            $strToReturn .= "</caption>\r\n";
        }

        // Header Row (if applicable)
        if ($this->blnShowHeader)
            $strToReturn .= "<thead>\r\n" . $this->GetHeaderRowHtml() . "</thead>\r\n";

        // Footer Row (if applicable)
        if ($this->blnShowFooter)
            $strToReturn .= "<tfoot>\r\n" . $this->GetFooterRowHtml() . "</tfoot>\r\n";

        // DataGrid Rows
        $strToReturn .= "<tbody>\r\n";
        $this->intCurrentRowIndex = 0;
        if ($this->objDataSource)
            foreach ($this->objDataSource as $objObject)
                $strToReturn .= $this->GetDataGridRowHtml($objObject);
        $strToReturn .= "</tbody>\r\n";

        // Finish Up
        $strToReturn .= '</table>';

        if ($this->HtmlAfter)
            $strToReturn .= $this->HtmlAfter;
        $this->objDataSource = null;
        return $strToReturn;
    }

    protected function GetDownloaderHtml($objDownloader) {
        $strToReturn = "  <span class=\"right\">";
        $strToReturn .= $objDownloader->Render(false);
        $strToReturn .= "</span>";
        return $strToReturn;
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            // BEHAVIOR
            case "Downloadable":
                if ($mixValue) {
                    $this->objDownloader = new QDataGridExporter($this, $this);
                    $this->objDownloader->AddDownloadMode(QDataGridExporter::DOWNLOAD_ENTIRE_DATAGRID);
                    //$this->objDownloader->AddExportFormat(QDataGridExporter::EXPORT_AS_CSV);
                } else {
                    $this->objDownloader = null;
                }
                return $mixValue;

            default:
                try {
                    parent::__set($strName, $mixValue);
                    break;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    public function __get($strName) {
        switch ($strName) {
            // BEHAVIOR
            case "Downloadable":
                return isset($this->objDownloader);
            default:
            case "Downloader":
                return $this->objDownloader;
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

}

?>
