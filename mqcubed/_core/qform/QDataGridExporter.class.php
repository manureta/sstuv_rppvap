<?php

class QDataGridExporter extends QControl {
    private $dtgSourceDatagrid = array();

    const DOWNLOAD_ENTIRE_DATAGRID = 1;
    const DOWNLOAD_CURRENT_PAGE = 2;
    private $intDownloadMode;
    
    const EXPORT_AS_XLS = 1;
    const EXPORT_AS_CSV = 2;
    private $intExportFormat;

    private $arrExportFormat = array();
    private $arrDownloadMode = array();

    private $arrButtons = array();
    protected $strInformationText;

    public function __construct($objParentObject, QDataGrid $dtgobj, $strControlId = null)  {
        parent::__construct($objParentObject, $strControlId);

        $this->dtgSourceDatagrid = $dtgobj;
        $this->arrExportFormat[] = self::EXPORT_AS_XLS;
        //$this->arrDownloadMode[] = self::DOWNLOAD_ENTIRE_DATAGRID;
        $this->arrDownloadMode[] = self::DOWNLOAD_CURRENT_PAGE;
        $this->CreateButtons();
        
    }

    public function Validate() {return true;}
    public function ParsePostData() {}

    protected function GetControlHtml() {
        $strToReturn = "";
        foreach($this->arrButtons as $btn) {
            $strToReturn .= $btn->GetControlHtml();
        }
        return $strToReturn;
    }

    protected function CreateButtons() {
        $this->arrButtons = array();
        foreach($this->arrExportFormat as $intExportFormat) {
            foreach($this->arrDownloadMode as $intDownloadMode) {
                $tmpButton = new QButton($this);
                $tmpButton->Text = QApplication::Translate($this->GetDownloadLabel($intExportFormat, $intDownloadMode));
                $tmpButton->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnExport_clicked'));
                $tmpButton->ActionParameter = "$intExportFormat$intDownloadMode";
                $tmpButton->AddCssClass(($intDownloadMode == self::DOWNLOAD_ENTIRE_DATAGRID)?"excelentirebuttonM":"excelcurrentbuttonM");
                $this->arrButtons[] = $tmpButton;
            }
        }
    }

    public function AddDownloadMode($intDownloadMode) {
        if($intDownloadMode == self::DOWNLOAD_ENTIRE_DATAGRID ||
           $intDownloadMode == self::DOWNLOAD_CURRENT_PAGE) {
        } else {
            throw new QCallerException("Invalid download mode: ") . $intDownloadMode;
        } 
        if(!in_array($intDownloadMode, $this->arrDownloadMode)) {
            $this->arrDownloadMode[] = $intDownloadMode;
            $this->CreateButtons();
        }
    }

    public function AddExportFormat($intExportFormat) {
        if($intExportFormat == self::EXPORT_AS_XLS ||
            $intExportFormat == self::EXPORT_AS_CSV) {
        } else {
            throw new QCallerException("Invalid export format: ") . $intExportFormat;
        } 
        if(!in_array($intExportFormat, $this->arrExportFormat)) {
            $this->arrExportFormat[] = $intExportFormat;
            $this->CreateButtons();
        }
    }

    public function GetDownloadLabel($intExportFormat, $intDownloadMode) {
        $strToReturn = "Download";
        switch($intDownloadMode) {
            case self::DOWNLOAD_ENTIRE_DATAGRID:
                $strToReturn .= " all";
                break;
            case self::DOWNLOAD_CURRENT_PAGE:
                $strToReturn .= " page";
                break;
            default: 
                throw new QCallerException("Invalid download mode: ") . $intDownloadMode;
        }
        switch($intExportFormat) {
          case self::EXPORT_AS_XLS:
              $strToReturn .= " to Excel";
              break;
          case self::EXPORT_AS_CSV:
              $strToReturn .= " as CSV";
              break;
          default: 
              throw new QCallerException("Invalid export format: ") . $intExportFormat;
        }
        return $strToReturn;
    }
//*
    public function __get($strName) {
        switch ($strName) {
            case "Buttons": return $this->arrButtons;
            default:
                try {
                    return parent::__get($strName);
                    break;
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }
//*/
    public function __set($strName,$mixValue) {
        switch ($strName) {
            case "DownloadFormats":
                try {
                        $this->arrExportFormat = QType::Cast($mixValue, QType::ArrayType);
                        break;
                } catch (QInvalidCastException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                }
            
            case "DownloadModes":
                try {
                        $this->arrDownloadMode = QType::Cast($mixValue, QType::ArrayType);
                        break;
                } catch (QInvalidCastException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                }
            case "InformationText":
                try {
                        $this->strInformationText = QType::Cast($mixValue, QType::String);
                        break;
                } catch (QInvalidCastException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                }
                    
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
    
    private function streamCSV($blnAllPages) {
        $GLOBALS['__DISABLE_CACHE__'] = true;
        /************************************************************************************
         * Ugly hack to ommit columns with "render" in it's html, this avoids the "Control
         * cannot be rendered until RenderBegin() has been called on the form" error
         * on columns with buttons or other Render()able objects
         ************************************************************************************/
        foreach($this->dtgSourceDatagrid->GetAllColumns() as $column) {
            if(preg_match('/render/i', $column->Html)) {
                $this->dtgSourceDatagrid->RemoveColumnByName($column->Name);
            }
        }

        $columns = $this->dtgSourceDatagrid->GetAllColumns();

        // Get header names
        $header = $infoheader = array();
        $blnAddedInfoText = false;
        foreach($columns as $column){
            if (($strInformationHeader = $this->GetInformationControlHtml(true)) && !$blnAddedInfoText) {
                $infoheader[] = $strInformationHeader;
                $blnAddedInfoText = true;
            } else {
                $infoheader[] = '';
            }
            // Get the column names but strip off any html tags in case we have got a sort ref.
            $header[] = strip_tags($column->Name);
        }
        //QFirebug::log($header);

        // Change heaser info
        session_cache_limiter('must-revalidate');       // Blaine's fix for SSL & PHP Sessions
        header("Pragma: hack"); // IE chokes on "no cache", so set to something, anything, else.
        $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT";
        header($ExpStr);

        header("Content-type: text/csv");
        header("Content-disposition: csv; filename=" . date("Y-m-d") ."_datagrid_export.csv");

        $out = fopen('php://output', 'w');
        fputcsv($out, $header, ',', '"');
        if($blnAllPages) {
            $this->dtgSourceDatagrid->ItemsPerPage = 100;
            $this->dtgSourceDatagrid->PageNumber = 1;
        }

        do {
            $this->dtgSourceDatagrid->DataBind();
            $data = $this->dtgSourceDatagrid->DataSource;
            foreach($data as $item) {
                $row = array();
                foreach($columns as $column) {
                    // Get the values but strip off any html tags in case we have got a button or so.
                    // $values[] = strip_tags(QDataGrid::ParseHtml($column->Html,$this->dtgSourceDatagrid,$column,$item));
                    $tmp = strip_tags(QDataGrid::ParseHtml($column->Html,$this->dtgSourceDatagrid,$column,$item));
                    #$tmp = strip_tags($this->dtgSourceDatagrid->ParseColumnHtml($column,$item));
                    // Excel get confused..and loose precision forcing exponential
                    // if $column content is numeric, but more than 15 character
                    //$tmp = $this->excel_patch_num($tmp);
                    $row[] = $tmp;
                }
                fputcsv($out, $row, ',', '"');
            }
            while (@ob_end_flush());
            $this->dtgSourceDatagrid->DataSource = null;
            $this->dtgSourceDatagrid->MarkAsModified();
        } while ($blnAllPages && 
                ($this->dtgSourceDatagrid->PageNumber+1) <= $this->dtgSourceDatagrid->PageCount && 
                 $this->dtgSourceDatagrid->PageNumber = $this->dtgSourceDatagrid->PageNumber+1);

        fclose($out);
    }
    
    private function streamXLS($blnAllPages) {
        $GLOBALS['__DISABLE_CACHE__'] = true;
        /************************************************************************************
         * Ugly hack to ommit columns with "render" in it's html, this avoids the "Control
         * cannot be rendered until RenderBegin() has been called on the form" error
         * on columns with buttons or other Render()able objects
         ************************************************************************************/
        $columns = $this->dtgSourceDatagrid->GetAllColumns();
        // omito las columnas de accion (botones de edit o view)
        foreach($columns as $key => $column) {
            if(preg_match('/ViewColumn/i', $column->Html)||preg_match('/EditColumn/i', $column->Html)) {
                unset($columns[$key]);
            }
        }
        // Get table header names
        $theader = array();
        $theader[] = "<table>";
        $theader[] = "<thead>";
        if ($strInformationHeader = $this->GetInformationControlHtml())
            $theader[] = $strInformationHeader;
        $theader[] = "<tr>";

        foreach($columns as $column) {
            // Get the column names but strip off any html tags in case we have got a sort ref.
            $column->Crop = false;
            $theader[] = sprintf("\n<th>%s</th>" ,strip_tags($column->Name));
        }
        $theader[] = "\n</tr></thead>";

        //QFirebug::log($theader);

        $Html_open='<html xmlns:o="urn:schemas-microsoft-com:office:office"
            xmlns:x="urn:schemas-microsoft-com:office:excel"
            xmlns="http://www.w3.org/TR/REC-html40">
            <head>';
        $Html_open = str_replace("\t","", $Html_open);
        echo $Html_open;

        // Change header info
        session_cache_limiter('must-revalidate');       // Blaine's fix for SSL & PHP Sessions
        header("Pragma: hack"); // IE chokes on "no cache", so set to something, anything, else.
        $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT";
        header($ExpStr);

        header("Content-type: text/xls ; charset=UTF-8");
        header("Content-disposition: xls; filename=" . date("Y-m-d") ."_datagrid_export.xls");
        // excel xml info ( tested with my office 2000 - to have datagrid and active cell a1)

        echo $this->format_XLS_head();
        // Spit out table header
        echo implode("", $theader);
        echo "\n<tbody>";
        if($blnAllPages) {
            $this->dtgSourceDatagrid->ItemsPerPage = 100;
            $this->dtgSourceDatagrid->PageNumber = 1;
        }
        do {
            @ob_start();
            $this->dtgSourceDatagrid->DataBind();
            $data = $this->dtgSourceDatagrid->DataSource;
            foreach($data as $item) {
                echo "\n<tr>";
                foreach($columns as $column) {
                    // Get the values but strip off any html tags in case we have got a button or so.
                    $tmp = strip_tags(QDataGrid::ParseHtml($column->Html,$this->dtgSourceDatagrid,$column,$item));
                    #$tmp = strip_tags($this->dtgSourceDatagrid->ParseColumnHtml($column,$item));
                    // Excel get confused..and loose precision forcing exponential
                    // if $column content is numeric, but more than 15 character
                    //$tmp = $this->excel_patch_num($tmp);
                    echo "\n<td>$tmp</td>";
                }
                echo "\n</tr>";
            }
            while (@ob_end_flush());
            $this->dtgSourceDatagrid->DataSource = null;
            $this->dtgSourceDatagrid->MarkAsModified();
        } while ($blnAllPages && 
                ($this->dtgSourceDatagrid->PageNumber+1) <= $this->dtgSourceDatagrid->PageCount && 
                 $this->dtgSourceDatagrid->PageNumber = $this->dtgSourceDatagrid->PageNumber+1);
        echo "</tbody>\n</table>\n</body>\n</html>";
    }

    public function GetInformationControlHtml($blnStripTags = false) {
        if ($blnStripTags) {
            $this->strInformationText = strip_tags($this->strInformationText);
        }
        if ($this->strInformationText) {
            $intCountColumnas = count($this->dtgSourceDatagrid->GetAllColumns());
            return sprintf("\n<tr><td colspan='%d' align='center'>%s</td></tr>", $intCountColumnas, $this->strInformationText);
        }
        return false;
    }

    public function btnExport_clicked ($strFormId, $strControlId, $strParameter) {
        set_time_limit(0);
        //QFirebug::log($this->intDownloadMode);
        $arrOptions = str_split($strParameter);
        $intExportFormat = $arrOptions[0];
        $intDownloadMode = $arrOptions[1];

        switch ($intExportFormat) {
            case self::EXPORT_AS_CSV:
                $this->streamCSV($intDownloadMode == self::DOWNLOAD_ENTIRE_DATAGRID);
                break;
            case self::EXPORT_AS_XLS: 
                $this->streamXLS($intDownloadMode == self::DOWNLOAD_ENTIRE_DATAGRID);
                break;
            default: 
                throw new QCallerException("Invalid export format: ") . $intExportFormat;
        }
        exit();
    }

    private function format_XLS_head() {
        $result = "\n";
        $result .= '<!--[if gte mso 9]><xml>
                 <x:ExcelWorkbook>
                  <x:ExcelWorksheets>
                   <x:ExcelWorksheet>
                    <x:Name>'.date('Y-m-d').'_export</x:Name>
                    <x:WorksheetOptions>
                     <x:Selected/>
                     <x:DisplayGridlines/>
                     <x:Panes>
                      <x:Pane>
                       <x:Number>3</x:Number>
                       <x:ActiveRow>1</x:ActiveRow>
                       <x:ActiveCol>1</x:ActiveCol>
                      </x:Pane>
                     </x:Panes>
                     <x:ProtectContents>False</x:ProtectContents>
                     <x:ProtectObjects>False</x:ProtectObjects>
                     <x:ProtectScenarios>False</x:ProtectScenarios>
                    </x:WorksheetOptions>
                   </x:ExcelWorksheet>
                  </x:ExcelWorksheets>
                  <x:WindowHeight>10230</x:WindowHeight>
                  <x:WindowWidth>18075</x:WindowWidth>
                  <x:WindowTopX>360</x:WindowTopX>
                  <x:WindowTopY>60</x:WindowTopY>
                  <x:ProtectStructure>False</x:ProtectStructure>
                  <x:ProtectWindows>False</x:ProtectWindows>
                 </x:ExcelWorkbook>
                </xml><![endif]-->
                <meta http-equiv="Content-Type" content="text/xls; charset=UTF-8"
                </head>
                <body>';

        // remove tabs
        $result = str_replace("\t","",$result);
        return $result;
    }

    private function excel_patch_num($tmp){
        // Excel get confused..and loose precision forcing exponential
        // if $item is numeric, but more than 15 character
        $test = "";
        if ((is_numeric($tmp)=== true)) {
            if ((strlen($tmp)>=16)) {
                $test = "C:" . $tmp;
            } else {
                $test = $tmp;
            }
        }
        else {
            $test=$tmp;
        }
        return $test;
    }
}
?>
