<?php
/**
 * This is the "Meta" DataGrid class for the List functionality
 * of the DefinicionCapitulo class.  This code-generated class
 * contains a QDataGrid class which can be used by any QForm or QPanel,
 * listing a collection of DefinicionCapitulo objects.  It includes
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
class DefinicionCapituloDataGridGen extends QFilteredDataGrid {

    //array de controles para omitir antes del construct
    public static $strColumnsArray = array(
        'IdDefinicionCapitulo' => true,
        'Descripcion' => true,
        'IdDefinicionCuadernilloObject' => true,
        'Orden' => true,
        'COfertaAgregada' => true,
    );
    
    public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->SetDataBinder('MetaDataBinder', $this);
        $this->UseAjax = true;
        $this->strEntidad = 'DefinicionCapitulo';
        $this->strNoun = DefinicionCapitulo::Noun();
        $this->strNounPlural = DefinicionCapitulo::NounPlural();
        
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

        // Create the Columns (note that you can use strings for definicion_capitulo's properties, or you
        // can traverse down QQN::definicion_capitulo() to display fields that are down the hierarchy)
        if (DefinicionCapituloDataGrid::$strColumnsArray['IdDefinicionCapitulo']) $this->MetaAddColumn('IdDefinicionCapitulo')->Title = QApplication::Translate('IdDefinicionCapitulo');
        if (DefinicionCapituloDataGrid::$strColumnsArray['Descripcion']) $this->MetaAddColumn('Descripcion')->Title = QApplication::Translate('Descripcion');
        if (DefinicionCapituloDataGrid::$strColumnsArray['IdDefinicionCuadernilloObject']) $this->MetaAddColumn(QQN::DefinicionCapitulo()->IdDefinicionCuadernilloObject)->Title = QApplication::Translate('IdDefinicionCuadernilloObject');
        if (DefinicionCapituloDataGrid::$strColumnsArray['Orden']) $this->MetaAddColumn('Orden')->Title = QApplication::Translate('Orden');
        if (DefinicionCapituloDataGrid::$strColumnsArray['COfertaAgregada']) $this->MetaAddColumn('COfertaAgregada')->Title = QApplication::Translate('COfertaAgregada');
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
					$strLinkUrl .= '?intIdDefinicionCapitulo=<?=urlencode($_ITEM->IdDefinicionCapitulo)?>';
					break;
				case QMetaControlArgumentType::PathInfo:
					$strLinkUrl .= '/<?=urlencode($_ITEM->IdDefinicionCapitulo)?>';
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
			$intId="IdDefinicionCapitulo";
			$strHtml = '<a href="definicioncapitulo/edit/<?=$_ITEM->'.$intId.'?>" <?= $_FORM->GetControl("' . $pxyControl->ControlId . '")->RenderAsEvents($_ITEM->IdDefinicionCapitulo, false); ?>>' . $strLinkHtml . '</a>';
			$colEditColumn = new QDataGridColumn($strColumnTitle, $strHtml, 'HtmlEntities=False');
			$this->AddColumn($colEditColumn);
			return $colEditColumn;
		}
		
		public function EditColumn_Render(DefinicionCapitulo $objDefinicionCapitulo) {
                        // se concatenan todos los campos PK
                        $strControlId = "";
                        $strControlId .= "x" . $objDefinicionCapitulo->IdDefinicionCapitulo;
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
					if (isset($this->ParentControl->pnlEditDefinicionCapitulo)){
		                if ($this->ParentControl->pnlEditDefinicionCapitulo->Visible)
		                    $btnEdit->Enabled = false;
		                else
		                    $btnEdit->Enabled = true;
		            }
	
	                // Return the rendered Edit button
	                return $btnEdit->Render(false);
	            
	     }
	        
		 public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

                         if ($this->ParentControl instanceof DefinicionCapituloIndexPanelGen){
                             $this->ParentControl->pnlEditDefinicionCapitulo = new DefinicionCapituloEditPanel($this->ParentControl,null,$strParameter);
                             $this->ParentControl->pnlEditDefinicionCapitulo->Visible=true;
                             $this->ParentControl->dtgDefinicionCapitulos->Visible=false;
                             $this->ParentControl->btnCreateNew->Visible=false;
                          }else{
                             QApplication::Redirect(__VIRTUAL_DIRECTORY__."/definicioncapitulo/edit/".$strParameter);
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
                $this->TotalItemCount = DefinicionCapitulo::QueryCount($this->Conditions);
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

            // Set the DataSource to be a Query result from DefinicionCapitulo, given the clauses above
            $this->DataSource = DefinicionCapitulo::QueryArray($this->Conditions, $objClauses);
        }

/**
		 * Used internally by the Meta-based Add Column tools.
		 *
		 * Given a QQNode or a Text String, this will return a DefinicionCapitulo-based QQNode.
		 * It will also verify that it is a proper DefinicionCapitulo-based QQNode, and will throw an exception otherwise.
		 *
		 * @param mixed $mixContent
		 * @return QQNode
		 */
		protected function ResolveContentItem($mixContent) {
			if ($mixContent instanceof QQNode) {
				if (!$mixContent->_ParentNode)
					throw new QCallerException('Content QQNode cannot be a Top Level Node');
				if ($mixContent->_RootTableName == 'definicion_capitulo') {
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
					throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "definicion_capitulo".');
			} else if (is_string($mixContent)) switch ($mixContent) {
				case 'IdDefinicionCapitulo': return QQN::DefinicionCapitulo()->IdDefinicionCapitulo;
				case 'Descripcion': return QQN::DefinicionCapitulo()->Descripcion;
				case 'IdDefinicionCuadernillo': return QQN::DefinicionCapitulo()->IdDefinicionCuadernillo;
				case 'IdDefinicionCuadernilloObject': return QQN::DefinicionCapitulo()->IdDefinicionCuadernilloObject;
				case 'Orden': return QQN::DefinicionCapitulo()->Orden;
				case 'COfertaAgregada': return QQN::DefinicionCapitulo()->COfertaAgregada;
				default: throw new QCallerException('Simple Property not found in DefinicionCapituloDataGrid content: ' . $mixContent);
			} else if ($mixContent instanceof QQAssociationNode)
				throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
			else
				throw new QCallerException('Invalid Content type');
		}

    public static function SetValor($strColumnName, $mixValue) {
        DefinicionCapituloDataGrid::$strColumnsArray[$strColumnName] = false;
        DefinicionCapituloDataGrid::$objStaticConditionsArray[$strColumnName] = QQ::Equal(QQN::DefinicionCapitulo()->$strColumnName, $mixValue);
    }


}
?>