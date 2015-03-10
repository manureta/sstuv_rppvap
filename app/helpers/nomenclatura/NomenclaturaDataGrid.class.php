<?php	
class NomenclaturaDataGrid extends NomenclaturaDataGridGen {

	public static $strColumnsArray = array(
        'Id' => true,
        'IdFolioObject' => true,
        'PartidaInmobiliaria' => true,
        'TitularDominio' => false,
        'Partido' => true,
        'Circ' => true,
        'Secc' => true,
        'ChacQuinta' => true,
        'Frac' => true,
        'Mza' => true,
        'Parc' => true,
        'InscripcionDominio' => false,
        'TitularRegPropiedad' => false,
        'DatoVerificadoRegPropiedad' => false,
        'EstadoGeografico' => true,
    );


    protected function GetControlHtml() {
        if (!$this->blnVisible)
            return '';
        //return parent::GetControlHtml();

        $this->DataBind();

        $strToReturn = sprintf('<div class="dataTables_wrapper" role="grid" %s>', $this->GetActionAttributes());

        if ($this->HtmlBefore)
            $strToReturn .= $this->HtmlBefore;

        // Table Tag
        $strStyle = $this->GetStyleAttributes();
        if ($strStyle)
            $strStyle = sprintf('style="%s" ', $strStyle);
        $strToReturn .= sprintf("<table id=\"%s\" %s%s>\r\n", $this->strControlId, $this->GetAttributes(), $strStyle);


        // Header Row (if applicable)
        if ($this->blnShowHeader)
            $strToReturn .= "<thead>\r\n" . $this->GetHeaderRowHtml() . "</thead>\r\n";

        // Footer Row (if applicable)
        if ($this->blnShowFooter)
            $strToReturn .= "<tfoot>\r\n" . $this->GetFooterRowHtml() . "</tfoot>\r\n";

        // DataGrid Rows
        $strToReturn .= "<tbody>\r\n";
        $this->intCurrentRowIndex = 0;
        if ($this->objDataSource) {
            foreach ($this->objDataSource as $objObject) {
                $this->intCurrentRowIndex++;
                $objRow = new QFilteredDataGridRow($this, $objObject, $this->intCurrentRowIndex % 2);
                if($objObject->EstadoGeografico !== 'completo'){
         
                	$objRow->AddCssClass('danger');
                }
                $strToReturn .= $objRow->Render(false);
            }
        } else {
            $strToReturn .= sprintf('<tr><td colspan="%d" class="center">%s</td></tr>', count($this->objColumnArray), 'Aún no existen elementos');
        }
        $strToReturn .= "</tbody>\r\n";

        // Finish Up
        $strToReturn .= '</table>';

        // Paginator Row (if applicable)
        if ($this->objPaginator || $this->objDownloader) {
            $strToReturn .= '<div class="row paginator">';
            if ($this->objPaginator)
                $strToReturn .= $this->GetPaginatorRowHtml($this->objPaginator);
            if ($this->objDownloader)
                $strToReturn .= $this->GetDownloaderHtml($this->objDownloader);
            $strToReturn .= "</div>";
        }

        if ($this->HtmlAfter)
            $strToReturn .= $this->HtmlAfter;
        $this->objDataSource = null;
        return $strToReturn . '</div>';
    }  

}
?>
