<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the EncuadreLegal class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of EncuadreLegal objects.  It includes
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
class EncuadreLegalDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'Id' => false,
        'IdFolioObject' => true,
        'Decreto222595' => true,
        'Ley24374' => true,
        'Decreto81588' => true,
        'Ley23073' => true,
        'Decreto468696' => true,
        'Expropiacion' => true,
        'Otros' => true,
        'Ley14449' => true,
        'TieneExpropiacion' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'EncuadreLegal';
        $this->strNoun = EncuadreLegal::Noun();
        $this->strNounPlural = EncuadreLegal::NounPlural();
        
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

        // Create the Columns (note that you can use strings for encuadre_legal's properties, or you
        // can traverse down QQN::encuadre_legal() to display fields that are down the hierarchy)
        if (EncuadreLegalDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
        if (EncuadreLegalDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::EncuadreLegal()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
        if (EncuadreLegalDataGrid::$strColumnsArray['Decreto222595']) $this->MetaAddColumn('Decreto222595')->Title = QApplication::Translate('Decreto222595');
        if (EncuadreLegalDataGrid::$strColumnsArray['Ley24374']) $this->MetaAddColumn('Ley24374')->Title = QApplication::Translate('Ley24374');
        if (EncuadreLegalDataGrid::$strColumnsArray['Decreto81588']) $this->MetaAddColumn('Decreto81588')->Title = QApplication::Translate('Decreto81588');
        if (EncuadreLegalDataGrid::$strColumnsArray['Ley23073']) $this->MetaAddColumn('Ley23073')->Title = QApplication::Translate('Ley23073');
        if (EncuadreLegalDataGrid::$strColumnsArray['Decreto468696']) $this->MetaAddColumn('Decreto468696')->Title = QApplication::Translate('Decreto468696');
        if (EncuadreLegalDataGrid::$strColumnsArray['Expropiacion']) $this->MetaAddColumn('Expropiacion')->Title = QApplication::Translate('Expropiacion');
        if (EncuadreLegalDataGrid::$strColumnsArray['Otros']) $this->MetaAddColumn('Otros')->Title = QApplication::Translate('Otros');
        if (EncuadreLegalDataGrid::$strColumnsArray['Ley14449']) $this->MetaAddColumn('Ley14449')->Title = QApplication::Translate('Ley14449');
        if (EncuadreLegalDataGrid::$strColumnsArray['TieneExpropiacion']) $this->MetaAddColumn('TieneExpropiacion')->Title = QApplication::Translate('TieneExpropiacion');
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
					$strLinkUrl .= '?intId=<?=urlencode($_ITEM->Id)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->Id)?>';
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
			$intId="IdEncuadreLegal";
			$strHtml = '<a href="encuadrelegal/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->Id, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(EncuadreLegal $objEncuadreLegal) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objEncuadreLegal->Id;
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
					if (isset($this->ParentControl->pnlEditEncuadreLegal)){
		                if ($this->ParentControl->pnlEditEncuadreLegal->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof EncuadreLegalIndexPanelGen){
                             $this->ParentControl->pnlEditEncuadreLegal = new EncuadreLegalEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditEncuadreLegal->Visible=true;
                             $this->ParentControl->dtgEncuadreLegales->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/encuadrelegal/edit/".$strParameter);
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
                $this->TotalItemCount = EncuadreLegal::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from EncuadreLegal, given the clauses above
            $this->DataSource = EncuadreLegal::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a EncuadreLegal-based QQNode.
		 * It will also verify that it is a proper EncuadreLegal-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'encuadre_legal') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "encuadre_legal".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'Id': return QQN::EncuadreLegal()->Id;
				case 'IdFolio': return QQN::EncuadreLegal()->IdFolio;
				case 'IdFolioObject': return QQN::EncuadreLegal()->IdFolioObject;
				case 'Decreto222595': return QQN::EncuadreLegal()->Decreto222595;
				case 'Ley24374': return QQN::EncuadreLegal()->Ley24374;
				case 'Decreto81588': return QQN::EncuadreLegal()->Decreto81588;
				case 'Ley23073': return QQN::EncuadreLegal()->Ley23073;
				case 'Decreto468696': return QQN::EncuadreLegal()->Decreto468696;
				case 'Expropiacion': return QQN::EncuadreLegal()->Expropiacion;
				case 'Otros': return QQN::EncuadreLegal()->Otros;
				case 'Ley14449': return QQN::EncuadreLegal()->Ley14449;
				case 'TieneExpropiacion': return QQN::EncuadreLegal()->TieneExpropiacion;
				default: throw new QCallerException('Simple Property not found in EncuadreLegalDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        EncuadreLegalDataGrid::$strColumnsArray[$strColumnName] = false;
        EncuadreLegalDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::EncuadreLegal()->$strColumnName, $mixValue);
    }


}
?>