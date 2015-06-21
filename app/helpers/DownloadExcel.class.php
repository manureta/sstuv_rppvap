<?php
class DownloadExcel  {
    public static function DownloadArrayAsExcel($arrToExport,$filename = null,$header = '') {
        $GLOBALS['__DISABLE_CACHE__'] = true;
        
        $filename = (isset($filename)&& $filename!="" ? $filename : date("Y-m-d"));
        
        /************************************************************************************
         * Ugly hack to ommit columns with "render" in it's html, this avoids the "Control
         * cannot be rendered until RenderBegin() has been called on the form" error
         * on columns with buttons or other Render()able objects
         ************************************************************************************/
        $columns = array_keys($arrToExport[0]);

        // Get table header names
        $theader = array();
        $theader[] = "<table>";
        $theader[] = "<thead>";
        //if ($strInformationHeader = $this->GetInformationControlHtml())
        //    $theader[] = $strInformationHeader;
        $theader[] = "<tr>";

        foreach($columns as $column) {
            // Get the column names but strip off any html tags in case we have got a sort ref.
            $theader[] = sprintf("\n<th>%s</th>" ,strip_tags($column));
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

        header("Content-type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=" . $filename  .".xls");
        // excel xml info ( tested with my office 2000 - to have datagrid and active cell a1)

        echo self::format_XLS_head($filename);
        
        if ($header) echo "<h3>$header</h3>";
        
        // Spit out table header
        echo implode("", $theader);
        echo "\n<tbody>";
        foreach($arrToExport as $row) {
            echo "\n<tr>";
            foreach($columns as $column) {
                // Get the values but strip off any html tags in case we have got a button or so.
                $tmp = $row[$column];//strip_tags(QDataGrid::ParseHtml($column->Html,$this->dtgSourceDatagrid,$column,$item));
                #$tmp = strip_tags($this->dtgSourceDatagrid->ParseColumnHtml($column,$item));
                // Excel get confused..and loose precision forcing exponential
                // if $column content is numeric, but more than 15 character
                //$tmp = $this->excel_patch_num($tmp);
                echo "\n<td>$tmp</td>";
            }
            echo "\n</tr>";
        }
        while (@ob_end_flush());
        echo "</tbody>\n</table>\n";
        echo "<h6>Fuente: Registro Público Provincial de Villas y Asentamientos (Ley 14.449).<br />Subsecretaría Social de Tierras, Urbanismo y Vivienda.<br />Ministerio de Infraestructura de la Provincia de Buenos Aires.</h6>";
        echo "</body>\n</html>";
        exit();
    }

    private static function format_XLS_head($filename) {
        $result = "\n";
        $result .= '<!--[if gte mso 9]><xml>
                 <x:ExcelWorkbook>
                  <x:ExcelWorksheets>
                   <x:ExcelWorksheet>
                    <x:Name>'.$filename.'</x:Name>
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
}
?>
