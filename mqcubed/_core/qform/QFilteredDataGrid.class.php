<?php

class QFilteredDataGrid extends QDataGrid {

    ///////////////////////////
    // DataGrid Preferences
    ///////////////////////////
    public $objFilterWaitIcon = null;
    protected $objFilterRowStyle = null;
    protected $blnFilterShow = false;
    protected $blnFilterButtonShow = false;
    protected $blnFilterResetButtonShow = false;
    protected $intCurrentColumnId = 1;
    protected $strAction;
    protected $btnFilter;
    protected $btnFilterReset;
    protected $objConditionsArray = array();
    protected $arrRowClickMethod;
    protected $strEntidad;

    // Feel free to specify global display preferences/defaults for all QDataGrid controls
    public function __construct($objParentObject, $strControlId = null) {
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->RemoveAllActions('onclick');
        
        // Labels
        $this->strLabelForNoneFound = QApplication::Translate('<b>Results:</b> No %s found.');
        $this->strLabelForOneFound = QApplication::Translate('<b>Results:</b> 1 %s found.');
        $this->strLabelForMultipleFound = QApplication::Translate('<b>Results:</b> %s %s found.');
        $this->strLabelForPaginated = QApplication::Translate('<b>Results:</b>&nbsp;Viewing&nbsp;%s&nbsp;%s-%s&nbsp;of&nbsp;%s.');

        $this->strCssClass = "table table-striped table-bordered table-hover dataTable";
        //$this->objWaitIcon_Create();
        $this->objFilterRowStyle = new QDataGridRowStyle();
        $this->btnFilter_Create();
        $this->btnFilterReset_Create();
    }

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

    public function OrderColumnByPosition($iPosFrom, $iPosTo){
        if(isset($this->objColumnArray[$iPosFrom]) && isset($this->objColumnArray[$iPosTo])){
            $objFrom = $this->objColumnArray[$iPosFrom];
            $objTo = $this->objColumnArray[$iPosTo];
            $this->objColumnArray[$iPosFrom] = $objTo;
            $this->objColumnArray[$iPosTo] = $objFrom;
        }
    }
    
    public function SetColumnNameByPosition($iPos,$strNewName){
        if(isset($this->objColumnArray[$iPos])){
            $this->objColumnArray[$iPos]->Title = $strNewName;
        }
    }
    
    protected function GetHeaderRowHtml() {
        $objHeaderStyle = $this->objRowStyle->ApplyOverride($this->objHeaderRowStyle);

        $strToReturn = sprintf("  <tr %s>\r\n", $objHeaderStyle->GetAttributes());
        $intColumnIndex = 0;
        if ($this->objColumnArray)
            foreach ($this->objColumnArray as $objColumn) {
                $objColumn->ActionParameter = $intColumnIndex;

                $strColumnHtml = ($intColumnIndex == $this->intSortColumnIndex) ?
                    $this->GetHeaderSortedHtml($objColumn) : $objColumn->Render(false);

                $strToReturn .= sprintf("    <th %s>%s</th>\r\n", $this->objHeaderRowStyle->GetAttributes(), $strColumnHtml);

                $intColumnIndex++;
            }
        $strToReturn .= "  </tr>\r\n";


        // Filter Row (if applicable)
        if ($this->blnFilterShow)
            $strToReturn .= $this->GetFilterRowHtml();

        return $strToReturn;
    }

    protected function GetPaginatorRowHtml($objPaginator) {
        $strToReturn = '<div class="pull-left col-sm-7">';
        if ($this->TotalItemCount > 0) {
            $intStart = (($this->PageNumber - 1) * $this->ItemsPerPage) + 1;
            $intEnd = $intStart + count($this->DataSource) - 1;
            $strToReturn .= sprintf($this->strLabelForPaginated, $this->strNounPlural, $intStart, $intEnd, $this->TotalItemCount);
        } else {
            $intCount = count($this->objDataSource);
            if ($intCount == 0)
                $strToReturn .= sprintf($this->strLabelForNoneFound, $this->strNounPlural);
            else if ($intCount == 1)
                $strToReturn .= sprintf($this->strLabelForOneFound, $this->strNoun);
            else
                $strToReturn .= sprintf($this->strLabelForMultipleFound, $intCount, $this->strNounPlural);
        }
        $strToReturn .= '</div><div class="pull-right col-sm-5 text-right">';
        $strToReturn .= $objPaginator->Render(false);
        $strToReturn .= "</div>";

        return $strToReturn;
    }

    protected function GetHeaderSortedHtml(QDataGridColumn $objColumn) {
        $strToReturn = $objColumn->Render(false);

        if ($this->intSortDirection == 0)
            $strToReturn .= sprintf(' <img src="%s/sort_arrow.png" width="7" height="7" border="0" alt="Orden Ascendente" />', __IMAGE_ASSETS__);
        else
            $strToReturn .= sprintf(' <img src="%s/sort_arrow_reverse.png" width="7" height="7" border="0" alt="Orden Descendente" />', __IMAGE_ASSETS__);

        return $strToReturn;
    }

    protected function GetFooterRowHtml() {
        return parent::GetFooterRowHtml();
    }

    /**
     * Create the row used for datagrid filtering
     * @return string $strToReturn of html table row
     */
    protected function GetFilterRowHtml() {
        $objFilterStyle = $this->objRowStyle->ApplyOverride($this->objFilterRowStyle);
        $strToReturn = '  <tr class="qfiltereddatagrid-filterrow">' . "\r\n";
        $intColumnIndex = 0;
        if ($this->objColumnArray !== null) {
            for ($intIndex = 0; $intIndex < count($this->objColumnArray); $intIndex++) {
                $objColumn = $this->objColumnArray[$intIndex];

                $colContent = '&nbsp;';

                if ($objColumn instanceof QFilteredDataGridColumn && ($objColumn->Filter !== null || $objColumn->FilterByCommand !== null || $objColumn->FilterType != QFilterType::None)) {
                    // This Column is Filterable
                    $ctlFilter = $this->GetFilterControl($objColumn);

                    if (null !== $ctlFilter)
                    //display the control
                        $colContent = $ctlFilter->Render(false);
                }

                if ($intIndex == count($this->objColumnArray) - 1) {
                    if ($this->FilterResetButtonShow)
                        $colContent .= $this->btnFilterReset->Render(false);
                    if ($this->FilterResetButtonShow && $this->FilterButtonShow)
                        $colContent .= '&nbsp;';
                    if ($this->FilterButtonShow)
                        $colContent .= $this->btnFilter->Render(false);
                    if ($this->objFilterWaitIcon)
                        $colContent .= $this->objFilterWaitIcon->Render(false);
                }

                $strToReturn .= sprintf('    <th %s><span class="block input-icon input-icon-right">%s<i class="icon-search"></i></span></th>' . "\r\n", $this->objFilterRowStyle->GetAttributes(), $colContent);
            }
        }
        $strToReturn .= '  </tr>' . "\r\n";
        return $strToReturn;
    }

    protected function GetColumnFilterControlId($objColumn) {
        if ($objColumn->FilterColId === null) {
            $objColumn->FilterColId = $this->intCurrentColumnId++;
        }
        return 'ctl' . $this->ControlId . 'flt' . $objColumn->FilterColId;
    }

    protected function GetFilterControl($objColumn) {
        $intControlId = $this->GetColumnFilterControlId($objColumn);
        //find/build the control
        if (($ctlFilter = $this->GetChildControl($intControlId)) === null) {
            //create the control this first time
            $ctlFilter = $this->CreateFilterControl($intControlId, $objColumn);
        }
        return $ctlFilter;
    }

    /**
     * CreateControls used in the filter row and set their fiter values if available. 
     * @param string $intControlId id based on the column that the control is contained
     * @param QFilteredDataGridColumn $objColumn the QFilteredDataGridColumn that contains the filter data. 
     * @return QControl $control the input control used for filtering
     */
    //this, btnReset_Click and GetControlValue are the functions to override/change if you want to add new types

    protected function CreateFilterControl($intControlId, $objColumn) {
        //show the current filter in the control
        $value = null;
        if (isset($objColumn->FilterByCommand['value']))
            $value = $objColumn->FilterByCommand['value'];
        if (null !== $objColumn->Filter && $objColumn->Filter instanceof Filter)
            $value = $objColumn->Filter->Value;
        if (null !== $objColumn->Filter && $objColumn->FilterType == QFilterType::ListFilter)
            $value = array_search($objColumn->Filter, $objColumn->FilterList);
        if (null !== $objColumn->FilterList && count($objColumn->FilterList) > 0 && $objColumn->FilterType == QFilterType::TextFilter) {

            $value = null;
            if ($objColumn->FilterList[0] instanceof QQConditionComparison)
                $value = $objColumn->FilterList[0]->mixOperand;
            if (null !== $value) {
                //Strip prefix and postfix
                if (null !== $objColumn->FilterPrefix) {
                    $prefixLength = strlen($objColumn->FilterPrefix);
                    if (substr($value, 0, $prefixLength) == $objColumn->FilterPrefix)
                        $value = substr($value, $prefixLength);
                }
                if (null !== $objColumn->FilterPostfix) {
                    $postfixLength = strlen($objColumn->FilterPostfix);
                    if (substr($value, strlen($value) - $postfixLength) == $objColumn->FilterPostfix)
                        $value = substr($value, 0, strlen($value) - $postfixLength);
                }
            }
        }

        //create the appropriate kind of control
        $actionName = 'btnFilter_Click';
        $ctlFilter = null;
        switch ($objColumn->FilterType) {
            default:
            case QFilterType::TextFilter:
                $ctlFilter = $this->filterTextBox_Create($intControlId, $objColumn->Name, $objColumn->FilterBoxSize, $value);
                break;
            case QFilterType::DateFilter:
                $ctlFilter = $this->filterDateBox_Create($intControlId, $objColumn->Name, $objColumn->FilterBoxSize, $value);
                break;
            case QFilterType::NumericTextFilter:
                $ctlFilter = $this->filterNumberTextBox_Create($intControlId, $objColumn->Name, $objColumn->FilterBoxSize, $value);
                break;
            case "List":
                $ctlFilter = $this->listBox_Create($intControlId, $objColumn->Name, $objColumn->FilterList, $value);
                break;
            case QFilterType::ListFilter:
                $ctlFilter = $this->filterListBox_Create($intControlId, $objColumn->Name, $objColumn->FilterList, $value);
                break;
        }

        if (null !== $ctlFilter) {
            //make sure hitting enter applies the filter
            $this->SetEvents($ctlFilter);
        }

        return $ctlFilter;
    }
    
    protected function SetEvents(QControl $objControl, $strActionName = 'btnFilter_Click') {
        if ($objControl instanceof QButton || $objControl instanceof QFilteredDataGridColumn) {
            $Event = 'QClickEvent';
            $objControl->RemoveAllActions('onclick');
        }
        else if ($objControl instanceof QListBox) {
            $Event = 'QChangeEvent';
            $objControl->RemoveAllActions('onchange');
        }
        else {
            $Event = 'QEnterKeyEvent';
            $objControl->RemoveAllActions('onkeydown');
        }
        
        $Action = ($this->blnUseAjax) ? 'QAjaxControlAction' : 'QServerControlAction';

        $objControl->AddAction(new $Event(), new $Action($this, $strActionName));
        $objControl->AddAction(new $Event(), new QTerminateAction());
    }
    
    /**
     * Get the control's filter input for filtering
     * @param string $type id based on the column that the control is contained
     * @param obj $control the filter control to get the filter input 
     * @return string $value the input used for filtering
     */
    //this, btnReset_Click and CreateControl are the functions to override/change if you want to add new types
    protected function GetFilterControlValue($strFilterType, $ctlControl) {
        //depending on the control, the members used to store the value are different
        $strValue = null;
        switch ($strFilterType) {
            default:
            case QFilterType::TextFilter:            
                $strValue = $ctlControl->Text;
                if ($strValue == '')
                    $strValue = null;
                break;
            case QFilterType::SimpleListFilter:
            case QFilterType::ListFilter:
                $strValue = $ctlControl->SelectedValue;
                break;
            case QFilterType::DateFilter:
                $strValue = $ctlControl->Date;
                break;
        }
        return $strValue;
    }

    protected function filterTextBox_Create($intControlId, $strControlName, $columns, $strValue) {
        $ctlFilterTextBox = new QTextBox($this, $intControlId);
        $ctlFilterTextBox->Name = $strControlName;
        $ctlFilterTextBox->Text = QType::Cast($strValue, QType::String);
        $ctlFilterTextBox->FontSize = $this->RowStyle->FontSize;
        $ctlFilterTextBox->Columns = $columns;

        return $ctlFilterTextBox;
    }
    
    protected function filterDateBox_Create($intControlId, $strControlName, $columns, $strValue) {
        $ctlFilterTextBox = new QDateFilterBox($this, $intControlId);
        $ctlFilterTextBox->Name = $strControlName;
        $ctlFilterTextBox->Text = QType::Cast($strValue, QType::String);
        $ctlFilterTextBox->FontSize = $this->RowStyle->FontSize;
        $ctlFilterTextBox->Columns = $columns;
        return $ctlFilterTextBox;
    }

    protected function filterNumberTextBox_Create($intControlId, $strControlName, $columns, $strValue) {
        $ctlFilterTextBox = new QNumberTextBox($this, $intControlId);
        $ctlFilterTextBox->Name = $strControlName;
        $ctlFilterTextBox->Text = QType::Cast($strValue, QType::Float);
        $ctlFilterTextBox->FontSize = $this->RowStyle->FontSize;
        $ctlFilterTextBox->Columns = $columns;

        return $ctlFilterTextBox;
    }

    protected function listBox_Create($controlId, $controlName, $list, $value) {
        $listbox = new QListBox($this, $controlId);
        $listbox->Name = $controlName;
        $listbox->AddItem(' ', null);

        //fill it with the supplied name=>value pairs, ensuring any current choices are selected
        foreach ($list as $itemName => $itemValue) {
            if(!is_int($itemValue) && !is_string($itemValue)) continue;
            $objListItem = new QListItem($itemName, $itemValue);
            if ($value === $itemValue)
                $objListItem->Selected = true;            
            $listbox->AddItem($objListItem);
        }        
        
        return $listbox;
    }

    protected function filterListBox_Create($intControlId, $strControlName, $arrListValues, $strSelectedValue) {
        $ctlFilterListbox = new QListBox($this, $intControlId);
        $ctlFilterListbox->Name = $strControlName;
        $ctlFilterListbox->AddItem(' ');
        
        //Now fill up the advanced list
        foreach (array_keys($arrListValues) as $strFilterName) {
            $ctlFilterListbox->AddItem($strFilterName, $strFilterName);
        }
        $ctlFilterListbox->SelectedName = $strSelectedValue;
        return $ctlFilterListbox;
    }

    protected function btnFilterReset_Create() {
        $this->btnFilterReset = new QButton($this);
        $this->btnFilterReset->Text = QApplication::Translate('Reset');
        $this->SetEvents($this->btnFilter, 'btnFilterReset_Click');
    }

    //create the filter button
    protected function btnFilter_Create() {
        $this->btnFilter = new QButton($this);
        $this->btnFilter->Name = QApplication::Translate('Filter');
        $this->btnFilter->Text = QApplication::Translate('Filter');
        $this->SetEvents($this->btnFilter);
    }

    public function objWaitIcon_Create() {
        $this->objFilterWaitIcon = new QWaitIcon($this);
        //$this->objDefaultWaitIcon->Display = true;
    }

    /**
     * For each column, get its input filter value and set the columns filter with it.
     * @param $strFormId, $strControlId, $strParameter
     */
    public function btnFilter_Click($strFormId, $strControlId, $strParameter) {
        //set the filter commands
        foreach ($this->objColumnArray as $objColumn) {
            if ($objColumn instanceof QFilteredDataGridColumn && ($objColumn->FilterByCommand !== null || $objColumn->FilterType != QFilterType::None)) {
                $ctlFilter = $this->GetChildControl($this->GetColumnFilterControlId($objColumn));
                if ($ctlFilter !== null) {
                    $strValue = $this->GetFilterControlValue($objColumn->FilterType, $ctlFilter);

                    if ($objColumn->FilterByCommand !== null) {
                        //update the column's filterByCommand with the user-entered value
                        $filter = $objColumn->FilterByCommand;

                        if ($strValue !== null && $objColumn->FilterType !== "Reset")
                            $filter['value'] = $strValue;
                        else if (isset($filter['value']))
                            unset($filter['value']);

                        $objColumn->FilterByCommand = $filter;
                    }
                    //Handle the other methods differently
                    elseif ($strValue !== null) {
                        switch ($objColumn->FilterType) {
                            case QFilterType::ListFilter:
                            case QFilterType::SimpleListFilter:
                                $objColumn->FilterActivate($strValue);
                                break;
                            default:
                            case QFilterType::TextFilter;
                                $objColumn->FilterActivate();
                                $objColumn->FilterSetOperand($strValue);
                                break;
                        }
                    } else
                        $objColumn->FilterClear();
                }
            }
        }
        //reset to page 1
        if ($this->objPaginator)
            $this->PageNumber = 1;

        $this->DataBind();

        $this->MarkAsModified();
    }

    /**
     * Clear all  filter column control input values.
     * @param $strFormId = null, $strControlId = null, $strParameter = null
     */
    //this, GetControlValue and CreateControl are the functions to override/change if you want to add new types
    public function btnFilterReset_Click($strFormId, $strControlId, $strParameter) {
        //set the filter commands
        foreach ($this->objColumnArray as $objColumn) {
            if ($objColumn instanceof QFilteredDataGridColumn) {
                if ($objColumn->FilterByCommand !== null) {
                    //legacy mode
                    $filter = $this->GetChildControl($this->GetColumnFilterControlId($objColumn));
                    if ($filter)
                        switch ($objColumn->FilterType) {
                            default:
                            case QFilterType::TextFilter:
                                $filter->Text = '';
                                break;
                            case QFilterType::ListFilter:
                            case QFilterType::SimpleListFilter:
                                $filter->SelectedIndex = 0;
                                break;
                            case "Reset":
                                break;
                        }
                    $objColumn->FilterClear();
                } elseif ($objColumn->FilterType != QFilterType::None) {
                    //normal mode
                    $ctlFilter = $this->GetChildControl($this->GetColumnFilterControlId($objColumn));
                    if ($ctlFilter !== null) {
                        switch ($objColumn->FilterType) {
                            default:
                            case QFilterType::TextFilter:
                                $ctlFilter->Text = '';
                                break;
                            case QFilterType::SimpleListFilter:
                            case QFilterType::ListFilter:
                                $ctlFilter->SelectedIndex = 0;
                                break;
                        }
                        $objColumn->FilterClear();
                    }
                }
            }
        }

        //reset to page 1
        if ($this->objPaginator)
            $this->PageNumber = 1;
        $this->MarkAsModified();
    }

    public function ParseColumnHtml($objColumn, $objObject) {
        return parent::ParseColumnHtml($objColumn, $objObject);
    }

    /**
     * Set Filter values as passed through session upon preRender
     * @param array $filters array of filters indexed by column name
     * contain either a string or a filter object
     */
    public function SetFilters($filters) {
        foreach ($this->objColumnArray as $col) {
            if (isset($filters[$col->Name])) {
                if ($col instanceof QFilteredDataGridColumn && (isset($col->FilterByCommand['operator']))) {
                    //if filterbycommand is used
                    $filterCommand = $col->FilterByCommand;
                    $filterCommand['value'] = $filters[$col->Name];
                    $col->FilterByCommand = $filterCommand;
                }
                //AddListItem with filters dont enter this check until filter button clicked
                elseif ($col instanceof QFilteredDataGridColumn && $col->Filter !== null) {
                    if ($col->Filter instanceof QQConditionComparison) {
                        $col->Filter = $filters[$col->Name];
                    } elseif ($col->Filter instanceof Filter) {
                        if ($col->Filter->Node === null) {
                            $col->Filter = $filters[$col->Name];
                        } else {
                            $col->Filter->Value = $filters[$col->Name];
                        }
                    }
                } elseif ($col instanceof QFilteredDataGridColumn && $col->FilterType == "Advanced List") {
                    $col->Filter = $filters[$col->Name];
                }
            }
        }
    }

    /**
     * Get Filter values from each column to be passed to session
     * @return array $filters array of filters indexed by column name
     */
    public function GetFilters() {
        $filters = array();
        foreach ($this->objColumnArray as $col) {

            if ($col instanceof QFilteredDataGridColumn && (isset($col->FilterByCommand['value']))) {
                $filterCommand = $col->FilterByCommand;
                $filters[$col->Name] = $filterCommand['value'];
            } elseif ($col instanceof QFilteredDataGridColumn && $col->Filter !== null) {
                if ($col->Filter instanceof QQConditionComparison) {
                    $filters[$col->Name] = $col->Filter;
                } elseif ($col->Filter instanceof Filter) {
                    if ($col->Filter->Node === null) {
                        $filters[$col->Name] = $col->Filter;
                    } elseif ($col->Filter->Value !== null) {
                        $filters[$col->Name] = $col->Filter->Value;
                    }
                } else
                    throw new exception(QApplication::Translate("Unknown Filter type"));
            }
        }
        return $filters;
    }
    
    protected static $objStaticConditionsArray = array();
    
    public function SetCondition(QQCondition $objCondition) {
        $this->ResetConditions();
        $this->AddCondition($objCondition);
    }

    public function AddCondition(QQCondition $objCondition) {
        //TODO optimizar
        $this->blnModified = true;
        array_push($this->objConditionsArray, $objCondition);
    }

    public function ResetConditions() {
        $this->blnModified = true;
        return $this->objConditionsArray = array();
    }
    
    /**
     * Given the description of the Column's contents, this is a simple, express
     * way of adding a column to this Class datagrid.  The description of a column's
     * content can be either a text string description of a simple field name
     * in the object, or it can be any QQNode extending from QQN::Class().
     * 
     * MetaAddColumn will automatically pre-configure the column with the name, html
     * and sort rules given the content being specified.
     * 
     * Any of these things can be overridden with OverrideParameters.
     * 
     * Finally, $mixContents can also be an array of contents, if displaying and/or
     * sorting using two fields from the Class object.
     *
     * @param mixed $mixContents
     * @param string $objOverrideParameters[]
     * @return QFilteredDataGridColumn
     */
    public function MetaAddColumn($mixContent, $objOverrideParameters = null) {
       if (is_array($mixContent)) {
           $objNodeArray = array();

           try {
               foreach ($mixContent as $mixItem) {
                   $objNodeArray[] = $this->ResolveContentItem($mixItem);
               }
           } catch (QCallerException $objExc) {
               $objExc->IncrementOffset();
               throw $objExc;
           }

           if (count($objNodeArray) == 0)
               throw new QCallerException('No content specified');

           // Create Various Arrays to be used by DGC
           $strNameArray = '';
           $strHtmlArray = '';
           $objSort = array();
           $objSortDescending = array();
           foreach ($objNodeArray as $objNode) {
               $strNameArray[] = $objNode->_PropertyName;
               $strHtmlArray[] = $objNode->GetDataGridHtml();
               $objSort[] = $objNode->GetDataGridOrderByNode();
               $objSortDescending[] = $objNode->GetDataGridOrderByNode();
               $objSortDescending[] = false;
           }

           $objNewColumn = new QFilteredDataGridColumn(
               implode(', ', $strNameArray), 
               '<?=' . implode(' . ", " . ', $strHtmlArray) . '?>',
               array(
                   'OrderByClause' => new QQOrderBy($objNodeArray),
                   'ReverseOrderByClause' => new QQOrderBy($objSortDescending)
               )
           );
       } else {
           try {
               $objNode = $this->ResolveContentItem($mixContent);
           } catch (QCallerException $objExc) {
               $objExc->IncrementOffset();
               throw $objExc;
           }

           $objNewColumn = new QFilteredDataGridColumn(
               $objNode->_PropertyName,
               '<?=' . $objNode->GetDataGridHtml() . '?>',
               array(
                   'OrderByClause' => QQ::OrderBy($objNode->GetDataGridOrderByNode()),
                   'ReverseOrderByClause' => QQ::OrderBy($objNode->GetDataGridOrderByNode(), false)
               )
           );

           $objNode->SetFilteredDataGridColumnFilter($objNewColumn);
       }

       $objOverrideArray = func_get_args();
       if (count($objOverrideArray) > 1)
           try {
               unset($objOverrideArray[0]);
               $objNewColumn->OverrideAttributes($objOverrideArray);
           } catch (QCallerException $objExc) {
               $objExc->IncrementOffset();
               throw $objExc;
           }

       $this->AddColumn($objNewColumn);
       return $objNewColumn;
    }    
    
    /**
     * Similar to MetaAddColumn, except it creates a column for a Type-based Id.  You MUST specify
     * the name of the Type class that this will attempt to use $NameArray against.
     * 
     * Also, $mixContent cannot be an array.  Only a single field can be specified.
     *
     * @param mixed $mixContent string or QQNode from Class
     * @param string $strTypeClassName the name of the TypeClass to use $NameArray against
     * @param mixed $objOverrideParameters
     */
    public function MetaAddTypeColumn($mixContent, $strTypeClassName, $objOverrideParameters = null) {
        // Validate TypeClassName
        if (!class_exists($strTypeClassName) || !property_exists($strTypeClassName, 'NameArray'))
            throw new QCallerException('Invalid TypeClass Name: ' . $strTypeClassName);

        // Validate Node
        try {
            $objNode = $this->ResolveContentItem($mixContent);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        // Create the Column
        $strName = $objNode->_PropertyName;
        if (strtolower(substr($strName, strlen($strName) - 3)) == ' id')
            $strName = substr($strName, 0, strlen($strName) - 3);
        $strProperty = $objNode->GetDataGridHtml();
        $objNewColumn = new QFilteredDataGridColumn(
                QApplication::Translate($strName), sprintf('<?=(%s) ? %s::$NameArray[%s] : null;?>', $strProperty, $strTypeClassName, $strProperty), array(
            'OrderByClause' => QQ::OrderBy($objNode),
            'ReverseOrderByClause' => QQ::OrderBy($objNode, false)
                )
        );
        $objNode->SetFilteredDataGridColumnFilter($objNewColumn);

        // Perform Overrides
        $objOverrideArray = func_get_args();
        if (count($objOverrideArray) > 2)
            try {
                unset($objOverrideArray[0]);
                unset($objOverrideArray[1]);
                $objNewColumn->OverrideAttributes($objOverrideArray);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }

        $this->AddColumn($objNewColumn);
        return $objNewColumn;
    }

    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            case "RowClickMethod":
                return $this->arrRowClickMethod;
            // APPEARANCE
            case "FilterRowStyle": return $this->objFilterRowStyle;
            // LAYOUT
            case "FilterShow":
            case "ShowFilter":
                return $this->blnFilterShow;
            case "ShowFilterButton":
            case "FilterButtonShow":
                return $this->blnFilterButtonShow;
            case 'FilterResetButtonShow': return $this->blnFilterResetButtonShow;
            // MISC
            case 'Entidad': return $this->strEntidad;
            case "FilterInfo":
                $filterArray = array();
                foreach ($this->objColumnArray as $col) {
                    if (isset($col->FilterByCommand['value'])) {
                        $filterCommand = $col->FilterByCommand;
                        $filterCommand['clause_operator'] = 'AND';
                        //apply the pre and postfix
                        $filterCommand['value'] = $filterCommand['prefix'] . $filterCommand['value'] . $filterCommand['postfix'];
                        $filterArray[] = $filterCommand;
                    }
                }
                return $filterArray;
            case 'FilterConditions':
            case "Conditions":
                //Calculate the conditions to apply to the entire grid based on the column's filters
                $dtgConditions = QQ::All();
                foreach ($this->objColumnArray as $objColumn) {
                    if ($objColumn instanceof QFilteredDataGridColumn) {
                        $colCondition = null;
                        if (isset($objColumn->FilterByCommand['value'])) {
                            //old style filter
                            $filterCommand = $objColumn->FilterByCommand;
                            //apply the pre and postfix
                            $filterCommand['value'] = $filterCommand['prefix'] . $filterCommand['value'] . $filterCommand['postfix'];

                            $colCondition = QQ::_($filterCommand['node'], $filterCommand['operator'], $filterCommand['value']);
                        } elseif ($objColumn->FilterType != QFilterType::None) {
                            //new condition based filter
                            //if we are using node, operator, value and value returned by control is null we
                            //do not want to apply the filter
                            if ($objColumn->Filter instanceof Filter) {
                                if ($objColumn->Filter->Node !== null && $objColumn->Filter->Operator !== null && $objColumn->Filter->Value === null)
                                    $colCondition = null;
                                else
                                //A filter was set. Use it
                                    $colCondition = $objColumn->Filter->Condition;
                            }
                            else {
                                $colCondition = null;
                                if ($objColumn->Filter !== null)
                                    $colCondition = $objColumn->Filter;
                            }
                        }

                        /* CustomFilter allows us to specify a custom QQuery that applies in addition to any 
                          user-specified filters. EG: If the user enters a Cost to filter on, also filter on
                          object actually being sold */
                        if (null !== $colCondition && null !== $objColumn->FilterCustom)
                            $colCondition = QQ::AndCondition($colCondition, $objColumn->FilterCustom);

                        //now after all the above checks if the column has a condition to be specified
                        //we add it to overall conditions. but if the column conditions are null we leave
                        //overall conditions as is
                        if ($colCondition !== null) {
                            //if there are no overall conditions yet change them to reflect the column condition
                            if ($dtgConditions == QQ::All()) {
                                $dtgConditions = $colCondition;
                            }
                            else {
                            //combine the overall conditions with the column conditions
                                $dtgConditions = QQ::AndCondition($dtgConditions, $colCondition);
                            }
                        }
                    }
                }
                $x = array_merge($this->objConditionsArray, self::$objStaticConditionsArray);
                if ($dtgConditions != QQ::All()) {
                    $x = array_merge($x, array($dtgConditions));
                }
                switch (count($x)) {
                    case 0: return QQ::All();
                    case 1: return array_pop($x);
                    default: return QQ::AndCondition($x);
                }
            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////
    public function __set($strName, $mixValue) {
        switch ($strName) {
            case "RowClickMethod":
                if (is_string($mixValue)) {
                    $object = $this;
                    while (!method_exists($object, $mixValue)) {
                        if ($object instanceof QForm) {
                            throw new QCallerException('Ningún control padre tiene definido el método para RowClick llamado '.$mixValue);
                        }
                        $object = $object->objParentControl;
                    }       
                    return $this->arrRowClickMethod = array($object, $mixValue);
                }
                if (!is_callable($mixValue))
                    throw new QCallerException('Parametro de RowClickMethod incorrecto. Se espera un array($obj, $strMetodo)');
                return $this->arrRowClickMethod = $mixValue;
            // APPEARANCE
            case "FilterRowStyle":
                try {
                    $this->objFilterRowStyle = QType::Cast($mixValue, "QDataGridRowStyle");
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            // LAYOUT
            case 'FilterShow':
            case "ShowFilter":
                try {
                    $this->blnFilterShow = QType::Cast($mixValue, QType::Boolean);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case 'FilterButtonShow':
            case "ShowFilterButton":
                try {
                    $this->blnFilterButtonShow = QType::Cast($mixValue, QType::Boolean);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            case 'FilterResetButtonShow':
                try {
                    $this->blnFilterResetButtonShow = QType::Cast($mixValue, QType::Boolean);
                    break;
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
            // BEHAVIOR
            case "Paginator":
                //do whatever needs done
                try {
                    $blnToReturn = parent::__set($strName, $mixValue);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

                //Now make sure it knows about our spinner
                try {
                    if ($blnToReturn)
                        $this->objPaginator->WaitIcon = $this->objFilterWaitIcon;
                } catch (exception $exp) {
                    //do nothing
                }
                return $blnToReturn;
                break;

            case "PaginatorAlternate":
                //do whatever needs done
                try {
                    $blnToReturn = parent::__set($strName, $mixValue);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

                //Now make sure it knows about our spinner
                try {
                    $this->objPaginatorAlternate->WaitIcon = $this->objFilterWaitIcon;
                } catch (exception $exp) {
                    //do nothing
                }
                return $blnToReturn;
                break;

            case "UseAjax":
                try {
                    //QDataGrid implementa onclick en todo el datagrid para manejar el SORT y no lo quiero así que me salteo la clase
                    $blnToReturn = QPaginatedControl::__set($strName, $mixValue);
                } catch (QInvalidCastException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

                // Because we are switching to/from Ajax, we need to reset the events
                foreach ($this->objColumnArray as $objColumn) {
                    if ($objColumn instanceof QFilteredDataGridColumn && ($objColumn->FilterByCommand !== null || $objColumn->FilterType != QFilterType::None)) {
                        $ctlFilter = $this->GetChildControl($this->GetColumnFilterControlId($objColumn));
                        if ($ctlFilter !== null) {
                            $this->SetEvents($ctlFilter);
                        }
                    }
                }
                $this->SetEvents($this->btnFilter);
                $this->SetEvents($this->btnFilterReset, 'btnFilterReset_Click');
                return $blnToReturn;
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
    
    /**
     * HACK las columnas no trabajan como QControl, el primer parámetro del constructor
     * es el nombre de la columna, no el parent control, por lo que no tiene referencia
     * al QForm, lo que hace que no se pueda renderear.
     * Como lo quiero renderear para poder manejar el QClickEvent tengo que hacer este hack
     */
    public function AddColumn(\QDataGridColumn $objColumn) {
        parent::AddColumn($objColumn);
        $this->GetColumnFilterControlId($objColumn); //le fijo un id
        $objColumn->SetDataGrid($this);
        if ($objColumn->OrderByClause) {
            $this->SetEvents($objColumn,'Sort_Click');
        }

    }

}

?>
