<?php
	/**
	 * This is the "Meta" DataGrid class for the List functionality
	 * of the DatoInteger class.  This code-generated class
	 * contains a QDataGrid class which can be used by any QForm or QPanel,
	 * listing a collection of DatoInteger objects.  It includes
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
	class DatoIntegerDataGridGen extends QFilteredDataGrid {
		/**
		 * Standard DataGrid constructor which also pre-configures the DataBinder
		 * to its own SimpleDataBinder.  Also pre-configures UseAjax to true.
		 *
		 * @param mixed $objParentObject either a QPanel or QForm which would be this DataGrid's parent
		 * @param string $strControlId optional explicitly-defined ControlId for this DataGrid
		 */
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->SetDataBinder('MetaDataBinder', $this);
			$this->UseAjax = true;
			$this->addColumns();
		}

		protected function addColumns() {
		 // Use the MetaDataGrid functionality to add Columns for this datagrid
	
			// Create an Edit Column
			//Setup DatoInteger Panel
			$this->AddColumn(new QDataGridColumn(QApplication::Translate("Edit"), '<?= $_CONTROL->EditColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false'));

			// Create the Other Columns (note that you can use strings for dato_integer's properties, or you
			// can traverse down QQN::dato_integer() to display fields that are down the hierarchy)
			$this->MetaAddColumn('IdDatoInteger')->Name = QApplication::Translate('IdDatoInteger');
			$this->MetaAddColumn(QQN::DatoInteger()->IdCampoObject)->Name = QApplication::Translate('IdCampoObject');
			$this->MetaAddColumn(QQN::DatoInteger()->IdPersonalObject)->Name = QApplication::Translate('IdPersonalObject');
			$this->MetaAddColumn('IdDesignacion')->Name = QApplication::Translate('IdDesignacion');
			$this->MetaAddColumn('Valor')->Name = QApplication::Translate('Valor');
			$this->MetaAddColumn('FechaModificacion')->Name = QApplication::Translate('FechaModificacion');
		}


		/**
         * Given the description of the Column's contents, this is a simple, express
         * way of adding a column to this DatoInteger datagrid.  The description of a column's
         * content can be either a text string description of a simple field name
         * in the DatoInteger object, or it can be any QQNode extending from QQN::DatoInteger().
         * 
         * MetaAddColumn will automatically pre-configure the column with the name, html
         * and sort rules given the content being specified.
         * 
         * Any of these things can be overridden with OverrideParameters.
         * 
         * Finally, $mixContents can also be an array of contents, if displaying and/or
         * sorting using two fields from the DatoInteger object.
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
                    $strNameArray[] = QApplication::Translate(QConvertNotation::WordsFromCamelCase($objNode->_PropertyName));
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
                    QApplication::Translate(QConvertNotation::WordsFromCamelCase($objNode->_PropertyName)),
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
		 * @param mixed $mixContent string or QQNode from DatoInteger
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
			$strName = QConvertNotation::WordsFromCamelCase($objNode->_PropertyName);
			if (strtolower(substr($strName, strlen($strName) - 3)) == ' id')
				$strName = substr($strName, 0, strlen($strName) - 3);
			$strProperty = $objNode->GetDataGridHtml();
			$objNewColumn = new QFilteredDataGridColumn(
				QApplication::Translate($strName),
				sprintf('<?=(%s) ? %s::$NameArray[%s] : null;?>', $strProperty, $strTypeClassName, $strProperty),
				array(
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
					$strLinkUrl .= '?intIdDatoInteger=<?=urlencode($_ITEM->IdDatoInteger)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdDatoInteger)?>';
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
			$intId="IdDatoInteger";
			$strHtml = '<a href="datointeger/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdDatoInteger, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(DatoInteger $objDatoInteger) {
                        $strControlId = "";
                        $strControlId .= "x" . $objDatoInteger->IdDatoInteger;
                        $strControlId = substr($strControlId, 1);
	                $btnEdit = $this->objForm->GetControl("btnEdit".$strControlId);
	                if (!$btnEdit) {
	                    // Create the Edit button for this row in the DataGrid
	                    // Use ActionParameter to specify the ID of the person
	                    $btnEdit = new QButton($this, "btnEdit".$strControlId);
	                    $btnEdit->Text = QApplication::Translate('Edit This DatoInteger');
	                    $btnEdit->ActionParameter = $strControlId;
	                    $btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnEdit_Click'));
	                    $btnEdit->CausesValidation = false;
	                    $btnEdit->CssClass="button editbuttonM";
	                }
	
	                // If we are currently editing a person, then set this Edit button to be disabled
					if (isset($this->ParentControl->pnlEditDatoInteger)){
		                if ($this->ParentControl->pnlEditDatoInteger->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof DatoIntegerIndexPanel){
                             $this->ParentControl->pnlEditDatoInteger = new DatoIntegerEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditDatoInteger->Visible=true;
                             $this->ParentControl->btnCreateNew->Enabled=false;
                             $this->ParentControl->Refresh();
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/datointeger/edit/".$strParameter);
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
                $this->TotalItemCount = DatoInteger::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from DatoInteger, given the clauses above
            $this->DataSource = DatoInteger::QueryArray($this->Conditions, $objClauses);
        }


		/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a DatoInteger-based QQNode.
		 * It will also verify that it is a proper DatoInteger-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'dato_integer') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "dato_integer".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdDatoInteger': return QQN::DatoInteger()->IdDatoInteger;
				case 'IdCampo': return QQN::DatoInteger()->IdCampo;
				case 'IdCampoObject': return QQN::DatoInteger()->IdCampoObject;
				case 'IdPersonal': return QQN::DatoInteger()->IdPersonal;
				case 'IdPersonalObject': return QQN::DatoInteger()->IdPersonalObject;
				case 'IdDesignacion': return QQN::DatoInteger()->IdDesignacion;
				case 'Valor': return QQN::DatoInteger()->Valor;
				case 'FechaModificacion': return QQN::DatoInteger()->FechaModificacion;
				default: throw new QCallerException('Simple Property not found in DatoIntegerDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}
	}
?>