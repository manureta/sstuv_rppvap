<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the DefinicionFila class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of DefinicionFila objects.  It includes
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
class DefinicionFilaDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'IdDefinicionFila' => true,
        'NombreCorto' => true,
        'Nombre' => true,
        'TablaTipo' => true,
        'CodigoRelacional' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'DefinicionFila';
        $this->strNoun = DefinicionFila::Noun();
        $this->strNounPlural = DefinicionFila::NounPlural();
        
        if ($strColumnsArray) {
            foreach ($strColumnsArray as $strColumn => $bln) {
                if (is_string($bln)) $strColumn = $bln;
                if ($bln) {
                    try {
                        $this->MetaAddColumn($strColumn)->Title = QApplication::Translate($strColumn);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
                }
            }
        } else {
            $this->addAllColumns();
        }
    }

    protected function addAllColumns() {
        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Columns (note that you can use strings for definicion_fila's properties, or you
        // can traverse down QQN::definicion_fila() to display fields that are down the hierarchy)
        if (DefinicionFilaDataGrid::$strColumnsArray['IdDefinicionFila']) $this->MetaAddColumn('IdDefinicionFila')->Title = QApplication::Translate('IdDefinicionFila');
        if (DefinicionFilaDataGrid::$strColumnsArray['NombreCorto']) $this->MetaAddColumn('NombreCorto')->Title = QApplication::Translate('NombreCorto');
        if (DefinicionFilaDataGrid::$strColumnsArray['Nombre']) $this->MetaAddColumn('Nombre')->Title = QApplication::Translate('Nombre');
        if (DefinicionFilaDataGrid::$strColumnsArray['TablaTipo']) $this->MetaAddColumn('TablaTipo')->Title = QApplication::Translate('TablaTipo');
        if (DefinicionFilaDataGrid::$strColumnsArray['CodigoRelacional']) $this->MetaAddColumn('CodigoRelacional')->Title = QApplication::Translate('CodigoRelacional');
    }

/**
		 * Will add an "edit" link-based column, using a standard HREF link to redirect the user to a page
		 * that must be specified.
		 *
		 * @param string $strLinkUrl the URL to redirect the user to
		 * @param string $strLinkHtml the HTML of the link text
		 * @param string $strColumnTitle the HTML of the link text
		 * @param string $intArgumentType the method used to pass information to the edit page (defaults to PathInfo)
		 */
		public function MetaAddEditLinkColumn($strLinkUrl, $strLinkHtml = 'Edit', $strColumnTitle = 'Edit', $intArgumentType = QMetaControlArgumentType::PathInfo) {
			switch ($intArgumentType) {
				case QMetaControlArgumentType::QueryString:
					$strLinkUrl .= '?intIdDefinicionFila=<?=urlencode($_ITEM->IdDefinicionFila)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdDefinicionFila)?>';
					break;
				default:
					throw new QCallerException('Unable to pass arguments with this intArgumentType: ' . $intArgumentType);
			}

			$strHtml = '<a href="' . $strLinkUrl . '">' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}

		/**
		 * Will add an "edit" control proxy-based column, calling any actions on a given control proxy
		 * that must be specified.
		 *
		 * @param QControlProxy $pxyControl the control proxy to use
		 * @param string $strLinkHtml the HTML of the link text
		 * @param string $strColumnTitle the HTML of the link text
		 */
		public function MetaAddEditProxyColumn(QControlProxy $pxyControl, $strLinkHtml = 'Edit', $strColumnTitle = 'Edit') {
			$intId="IdDefinicionFila";
			$strHtml = '<a href="definicionfila/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdDefinicionFila, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(DefinicionFila $objDefinicionFila) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objDefinicionFila->IdDefinicionFila;
                        $strControlId = str_replace("-","n",substr($strControlId, 1));
	                $btnEdit = $this->objForm->GetControl("btnEdit".$strControlId);
	                if (!$btnEdit) {
	                    // Create the Edit button for this row in the DataGrid
	                    // Use ActionParameter to specify the ID of the person
	                    $btnEdit = new QButton($this, "btnEdit".$strControlId);
	                    $btnEdit->Text = 'Editar';
	                    $btnEdit->ActionParameter = $strControlId;
	                    $btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnEdit_Click'));
	                    $btnEdit->CausesValidation = false;
	                    $btnEdit->Icon = "edit";
	                    $btnEdit->CssClass = "btn-xs";
	                }
	
	                // If we are currently editing a person, then set this Edit button to be disabled
					if (isset($this->ParentControl->pnlEditDefinicionFila)){
		                if ($this->ParentControl->pnlEditDefinicionFila->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof DefinicionFilaIndexPanelGen){
                             $this->ParentControl->pnlEditDefinicionFila = new DefinicionFilaEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditDefinicionFila->Visible=true;
                             $this->ParentControl->dtgDefinicionFilas->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/definicionfila/edit/".$strParameter);
                          }
                 }
                     


/**
         * Default / simple DataBinder for this Meta DataGrid.  This can easily be overridden
         * by calling SetDataBinder() on this DataGrid with another DataBinder of your choice.
         *
         * If a paginator is set on this DataBinder, it will use it.  If not, then no pagination will be used.
         * It will also perform any sorting (if applicable).
         */
        public function MetaDataBinder() {
            // Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
            if ($this->Paginator) {
                $this->TotalItemCount = DefinicionFila::QueryCount($this->Conditions);
            }

            // Setup the $objClauses Array
            $objClauses = array();

            // If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
            // the OrderByClause to the $objClauses array
            if ($objClause = $this->OrderByClause)
                array_push($objClauses, $objClause);

            // Add the LimitClause information, as well
            if ($objClause = $this->LimitClause)
                array_push($objClauses, $objClause);

            // Set the DataSource to be a Query result from DefinicionFila, given the clauses above
            $this->DataSource = DefinicionFila::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a DefinicionFila-based QQNode.
		 * It will also verify that it is a proper DefinicionFila-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'definicion_fila') {
					if (($mixContent instanceof QQReverseReferenceNode) && !($mixContent->_PropertyName))
						throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
					$objCurrentNode = $mixContent;
					while ($objCurrentNode = $objCurrentNode->_ParentNode) {
						if (!($objCurrentNode instanceof QQNode))
							throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
						if (($objCurrentNode instanceof QQReverseReferenceNode) && !($objCurrentNode->_PropertyName))
							throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
					}
					return $mixContent;
				} else
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "definicion_fila".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdDefinicionFila': return QQN::DefinicionFila()->IdDefinicionFila;
				case 'NombreCorto': return QQN::DefinicionFila()->NombreCorto;
				case 'Nombre': return QQN::DefinicionFila()->Nombre;
				case 'TablaTipo': return QQN::DefinicionFila()->TablaTipo;
				case 'CodigoRelacional': return QQN::DefinicionFila()->CodigoRelacional;
				default: throw new QCallerException('Simple Property not found in DefinicionFilaDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        DefinicionFilaDataGrid::$strColumnsArray[$strColumnName] = false;
        DefinicionFilaDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::DefinicionFila()->$strColumnName, $mixValue);
    }


}
?>